<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');

if (isset($_POST["submit"])) {
 $photo = $_FILES["package_image"]["name"];
    $photo2 = $_FILES["image"]["tmp_name"];
    $uploadPath = "upload-images/" . $photo;
  $package_name = $_POST['package_name'];
  $description = $_POST['description'];
  $discount = $_POST['discount'];
     move_uploaded_file($photo2, $uploadPath);
    $package_number = random_int(100000, 999999);

    if (isset($_POST["selectedServices"]) && !empty($_POST["selectedServices"])) {
        $selected_services = explode(",", $_POST["selectedServices"]);
        $totalPrice = 0;

        // Calculate total price
        foreach ($selected_services as $service_name) {
            $service_name = mysqli_real_escape_string($conn, trim($service_name));
            $sql = "SELECT price FROM all_services WHERE all_service = '$service_name'";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $totalPrice += $row['price'];
            } else {
                echo "Service '$service_name' not found.<br>";
            }
        }

        // Insert into package1 table
        $insert_package_sql = "
            INSERT INTO package1 (package_name, package_number, description, discount, file) 
            VALUES ('$package_name', '$package_number', '$description', '$discount', '$uploadPath')";

        if (mysqli_query($conn, $insert_package_sql)) {
            $package_id = mysqli_insert_id($conn); // Get inserted ID for foreign key

            // Insert each service into package_services table
            foreach ($selected_services as $service_name) {
                $service_name = mysqli_real_escape_string($conn, trim($service_name));

                $sql = "SELECT price FROM all_services WHERE all_service = '$service_name'";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $service_price = $row['price'];
                    $price_after_discount = $service_price - ($service_price * ($discount / 100));

                    $insert_service_sql = "
                        INSERT INTO package_services (package_id, service_name, price, price_after_discount) 
                        VALUES ('$package_id', '$service_name', '$service_price', '$price_after_discount')";
                    
                    mysqli_query($conn, $insert_service_sql);
                }
            }

            echo "<script>
                alert('Package and related services inserted successfully');
                window.location.href='admin_available_package';
            </script>";
        } else {
            echo "Error inserting package: " . mysqli_error($conn);
        }
    } else {
        echo "No services selected.";
    }
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style type="text/css">
.package{
  /* background : #157daf !important; */
  background :rgb(33, 70, 77) !important;
}
</style>
</head>
  <body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="col-sm-6">
          <div class="col-sm-6">
          </div>
        </div>
      </div>
    </div> 
     <div class="container-fluid">
<div class="card card-info">
<div class="card-header"style="background-color: rgb(51, 139, 139);">
                <h3 class="card-title">ADD PACKAGE DETAILS</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  id="categoryForm" class="form-horizontal" action="" method= "post" enctype="multipart/form-data">
                <div class="card-body">
                   <span id="error" style="color: red; display: inline-block; margin: 10px 0;"></span><br>
                  <div class="form-group row">
                    <label for="inputEmail3"  class="col-sm-2 col-form-label">PACKAGE NAME</label>
                    <div class="col-sm-10">
                      <input type="text" name="package_name" id="package" class="form-control" id="inputEmail3" placeholder="Enter package name" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">DESCRIPTION</label>
                    <div class="col-sm-10">
                      <input type="text" name="description" class="form-control" id="inputEmail3" placeholder="Enter package description" required>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">IMAGE</label>
                    <div class="col-sm-10">
                      <input type="file" name="package_image" class="form-control" id="inputEmail3" placeholder="Enter package description" required>
                    </div>
                  </div>
                  <h5 class="my-4">Add Services to the Package</h5>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" id="service">
                        <option>Select Service Category</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4 ">
                      <!-- select -->
                      <div class="form-group">
                        <label>Select Sub Category</label>
                        <select class="form-control"  id="sub_service">
                        <option>Select category first </option>
                        </select>
                      </div>
                    </div>
</div>
<div class="card">
        <div class="card-header">
            <h3 class="card-title">Our Services</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: rgb(51, 139, 139); color: white;">
                    <tr>
                        <th>S No.</th>
                        <th>Service Name</th>
                        <th>Service Price</th>
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td colspan="5" class="text-center">Select a Service and Sub-service  to see details</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {

    // Function to load service categories
    function loadServices() {
        $.ajax({
            url: "load_appointment_service1.php",
            type: "POST",
            data: { request_type: "service_data" },
            success: function (data) {
                $("#service").html(data);
            }
        });
    }

    // Function to load sub-services based on selected category
    function loadSubServices(service_id) {
        $.ajax({
            url: "load_appointment_service1.php",
            type: "POST",
            data: { request_type: "sub_service_data", id: service_id },
            success: function (data) {
                $("#sub_service").html(data);
            }
        });
    }

    // Load categories on page load
    loadServices();

    // On change of service category, load corresponding sub-services
    $("#service").on("change", function () {
        var service_id = $(this).val();
        if (service_id !== "") {
            loadSubServices(service_id);
        } else {
            $("#sub_service").html('<option value="">Select Sub-Service</option>');
        }
    });

    // On change of sub-service, load corresponding service details in the table
    $("#sub_service").on("change", function () {
        var sub_service = $(this).val();
        $.ajax({
            url: "load_appointment_service1.php",
            type: "POST",
            data: { sub_service: sub_service },
            success: function (response) {
                var tableBody = $(response).find("tbody").html();
                if (tableBody) {
                    $("#example1 tbody").html(tableBody);
                } else {
                    $("#example1 tbody").html("<tr><td colspan='5' class='text-center'>No services found.</td></tr>");
                }
            }
        });
    });

});
</script>

<h3>Selected Services for the Package</h3>
<div id="selectedServices"></div>

<!-- Display total price -->
<div id="totalPrice" style="font-weight: bold; margin-top: 20px;">Total: Rs 0.00</div>

<!-- Discount input field -->
<div class="form-group">
    <label for="discount" style="display: inline-block; width: 200px;"> Discount price of package</label>
    <input type="number" step="0.01" id="discount" name="discount" class="form-control d-inline-block" 
        style="width: calc(35% - 100px);" placeholder="Enter discount in percentage" required>
</div>
<!-- Discount input field -->
<div class="form-group">
    <label for="discountAmount" style="display: inline-block; width: 200px;"> Discount in Amount</label>
    <input type="number"  step="0.01" id="discountAmount" name="discountAmount" class="form-control d-inline-block" 
        style="width: calc(35% - 100px);" placeholder="Enter discount in amount">
</div>

<!-- Display total after discount -->
<div id="totalAfterDiscount" style="font-weight: bold; margin-top: 20px;">Package Price After Discount: Rs 0.00</div>

<!-- Hidden inputs for storing values before form submission -->
<input type="hidden" id="hiddenTotalPrice" name="totalPrice">
<input type="hidden" id="hiddenDiscountedPrice" name="totalAfterDiscount">

<!-- ✅ New hidden input for selected services -->
<input type="hidden" id="hiddenSelectedServices" name="selectedServices">

<div class="card-footer">
<button type="submit" name="submit" class="btn" style="background-color:rgb(51, 139, 139); font-weight: 500; font-size: 16px;  padding: 7px 20px;  color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px; ">ADD PACKAGE</button>
  <button type="reset" class="btn btn-danger float-right">Cancel</button>
</div>
               
              </form>
          
            </div>
</div>
<script>
$(document).ready(function () {

// When percentage is typed
$("#discount").on("input", function () {
    updateTotalAfterDiscount(parseFloat($("#hiddenTotalPrice").val()) || 0, "percent");
});

// When amount is typed
$("#discountAmount").on("input", function () {
    updateTotalAfterDiscount(parseFloat($("#hiddenTotalPrice").val()) || 0, "amount");
});

    let selectedServices = new Map(); // Store selected services

    function updateSelectedServices() {
        let totalPrice = 0;
        let selectedServiceArray = [];
        $("#selectedServices").empty(); // Clear previous list

        selectedServices.forEach((service, serviceName) => {
            totalPrice += service.price;
            selectedServiceArray.push(serviceName); // Collect all services

            let serviceDiv = $(`
                <div>
                    ${serviceName} (Rs ${service.price.toFixed(2)}) 
                    <button class="remove-service" data-service="${serviceName}" style="color: red !important; border: none; background: none; cursor: pointer;"><i class="fas fa-times"></i></button>
                </div>
            `);

            $("#selectedServices").append(serviceDiv);
        });
        console.log("Selected Services:");
    selectedServices.forEach((service, serviceName) => {
        console.log(`${serviceName}`);
    });

        // ✅ Correctly update hidden input (store all selected services, not just the last one)
        $("#hiddenSelectedServices").val(selectedServiceArray.join(",")); 

        // ✅ Update total price
        $("#totalPrice").text(`Total: Rs ${totalPrice.toFixed(2)}`);
        $("#hiddenTotalPrice").val(totalPrice.toFixed(2));

        // ✅ Update total after discount
        updateTotalAfterDiscount(totalPrice);
    }
    function updateTotalAfterDiscount(totalPrice, triggerSource = "percent") {
    let discountPercent = parseFloat($("#discount").val()) || 0;
    let discountAmount = parseFloat($("#discountAmount").val()) || 0;
    let finalPrice;

    if (triggerSource === "percent") {
        
        discountAmount = (totalPrice * discountPercent) / 100;
        $("#discountAmount").val(discountAmount.toFixed(2));

    } else if (triggerSource === "amount") {
        discountPercent = (discountAmount / totalPrice) * 100;
        $("#discount").val(discountPercent.toFixed(2));
    }

    finalPrice = totalPrice - discountAmount;

    // Update total after discount
    $("#totalAfterDiscount").text(`Package Price After Discount: Rs ${finalPrice.toFixed(2)}`);
    $("#hiddenDiscountedPrice").val(finalPrice.toFixed(2));
}


    // ✅ Event Delegation: Handle checkbox changes (for dynamically loaded checkboxes)
    $(document).on("change", ".service-checkbox", function () {
        let serviceName = $(this).val();
        let servicePrice = parseFloat($(this).data("price"));

        if ($(this).is(":checked")) {
            selectedServices.set(serviceName, { price: servicePrice });
        } else {
            selectedServices.delete(serviceName);
        }

        updateSelectedServices();
    });

    // ✅ Remove service from list when clicking the "✖" button
    $(document).on("click", ".remove-service", function () {
        let serviceName = $(this).data("service");
        selectedServices.delete(serviceName);

        // Uncheck the corresponding checkbox
        $(`.service-checkbox[value="${serviceName}"]`).prop("checked", false);

        updateSelectedServices();
    });

    // ✅ Update total when discount is applied
    $("#discount").on("input", function () {
        updateTotalAfterDiscount(parseFloat($("#hiddenTotalPrice").val()) || 0);
    });

    // ✅ Handle AJAX request completion
    $(document).ajaxComplete(function () {
        $(".service-checkbox").each(function () {
            if (selectedServices.has($(this).val())) {
                $(this).prop("checked", true);
            }
        });
        updateSelectedServices();
    });
});
</script>
<script>
document.getElementById('categoryForm').addEventListener('submit', function (e) {
  const package = document.getElementById('package');
  const errorEl = document.getElementById('error');
  const categoryValue = package.value.trim();

  // Clear any previous error message
//   errorEl.textContent = "";

  // Validation logic
  if (categoryValue === "") {
    //  alert("Package name is required!");
    errorEl.textContent = "Package  name is required!";
    package.focus();
    e.preventDefault(); // Prevent form from submitting
  } else if (categoryValue.length < 3) {
    errorEl.textContent = "Category name must be at least 3 characters.";
    package.focus();
    e.preventDefault(); // Prevent form from submitting
  }
});
</script>
</body>
</html>
<?php
include('includes/footer.php');
?>