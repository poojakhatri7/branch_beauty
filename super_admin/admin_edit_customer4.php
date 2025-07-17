<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');


//$id = $_GET ['id'];
$id = $_GET ['id'];
$appointment_for = $_GET['appointment_for'];

// echo "<div style='text-align: center; font-weight: bold;'>$appointment_for</div>";
if (isset($_POST["submit"])) {
    // Get the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];
 // Convert string to array
    // echo "<pre>";
    // print_r($selected_services); // Debug: Check if multiple services are received correctly
    // echo "</pre>";
$totalPrice = $_POST['totalPrice'];
$discount = $_POST['discount'];
$totalAfterDiscount = $_POST['totalAfterDiscount'];
// $billing_number = random_int(100000, 999999);
$prefix = "98";  // Fixed starting digits
// $randomNumber = random_int(1000, 9999); // Generate remaining random digits
// $billing_number = $prefix . $randomNumber;
$billing_number = $prefix . '000001'; // → 980001, 980002, ...
$query = "SELECT billing_number FROM tb_selected_services ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($row) {
    $lastNumber = (int)substr($row['billing_number'], 2); // remove prefix '98'
    $nextNumber = $lastNumber + 1;
} else {
    $nextNumber = 1; // First billing number
}

$billing_number = $prefix . str_pad($nextNumber, 6, "0", STR_PAD_LEFT);
$updateQuery = "UPDATE admin_login_details SET last_invoice_no = '$billing_number' WHERE role = '1'";
mysqli_query($conn, $updateQuery);


$appointment_id = $_GET['id'];  // Fetch appointment ID from the GET method

// Update tb_appointment table
$query1 = "UPDATE `tb_appointment` SET name='$name', email='$email', mobile='$mobile', address='$address' WHERE id=$appointment_id";
$result = mysqli_query($conn, $query1);

// Check if services are selected
if (isset($_POST['services']) && !empty($_POST['services'])) {
    $selected_services = $_POST['services']; // Array of selected services
    $totalPrice = 0; // Initialize total price
    $selected_services = $_POST["selectedServices"];
    $selected_services = explode(",", $_POST["selectedServices"]);
    foreach ($selected_services as $service_name) {
        $service_name = mysqli_real_escape_string($conn, $service_name);

        // Fetch service price
        $sql = "SELECT * FROM all_services WHERE all_service = '$service_name'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $c_id = $row['c_id_category_service'];
            $s_id = $row['service_number'];
            $a_id = $row['a_id'];
            $service_price = $row['price'];
            $totalPrice += $service_price; // Add price to total

            // Insert into tb_selected_services
            $insert_sql = "
            INSERT INTO tb_selected_services (appointment_id, c_id,s_id, a_id, service_name, service_price, billing_number) 
            VALUES ('$appointment_id','$c_id','$s_id','$a_id', '$service_name', '$service_price', '$billing_number')";
            
            if (!mysqli_query($conn, $insert_sql)) {
                echo "Error inserting service: " . mysqli_error($conn);
            }
        } else {
            echo "Service '$service_name' not found in the database.<br>";
        }
    }
    // Insert into orders table
    $discount = $_POST['discount'];
    // $billing_number = $_POST['billing_number'];
    $totalAfterDiscount = $totalPrice - ($totalPrice * ($discount / 100));

    $sql_insert = "INSERT INTO orders (appointment_id, totalPrice, discount, billing_number, created_at) 
                   VALUES ('$appointment_id', '$totalPrice', '$discount', '$billing_number', NOW())";

    if (mysqli_query($conn, $sql_insert)) {
        echo "<script>
            alert('Invoice generated successfully');
            window.location.href='admin_invoice.php';
        </script>";
    } else {
        echo "Error inserting into orders: " . mysqli_error($conn);
    }
} else {
    echo "No services selected.";
}

 }

$sql = "SELECT * FROM tb_appointment WHERE id={$id}";
// Step 3: Execute the query
$result = mysqli_query($conn, $sql);
// Step 4: Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
  // Step 5: Use a while loop to fetch each row of data
  while ($row = mysqli_fetch_assoc($result)) {
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="col-sm-6">
          <div class="col-sm-6">
          
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 
     <div class="container-fluid">
<div class="card card-info">
<div class="card-header"style="background-color: rgb(51, 139, 139);">
                <h3 class="card-title">EDIT CUSTOMER DETAILS</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method= "post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">NAME</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="ENTER NAME OF THE VISITING CUSTOMER" value = "<?php echo $row['name'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">EMAIL US </label>
                    <div class="col-sm-10">
                      <input type="text" name="email" class="form-control" id="inputEmail3" placeholder="ENTER EMAIL OF THE VISITING CUSTOMER" value = "<?php echo $row['email'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">MOBILE NUMBER</label>
                    <div class="col-sm-10">
                      <input type="text" name="mobile" class="form-control" id="inputEmail3" placeholder="ENTER MOBILE NUMBER OF THE VISITING CUSTOMER" value = "<?php echo $row['mobile'] ?>"readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"> ADDRESS</label>
                    <div class="col-sm-10">
                      <input type="text"name="address" class="form-control" id="inputEmail3" placeholder="ENTER ADDRESS OF THE VISITING CUSTOMER" value = "<?php echo $row['address'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">TIME</label>
                    <div class="col-sm-10">
                      <input type="text"name="time" class="form-control" id="inputEmail3" placeholder="ENTER VISITING TIME" value = "<?php echo $row['prefered_time'] ?>">
                    </div>
                  </div>
<div class="d-flex justify-content-center">
  <div class="btn-group" data-toggle="buttons">
    <label class="btn btn-secondary active mx-4 my-5">
      <input type="radio" name="options" value="services" autocomplete="off" checked> Services
    </label>
    <label class="btn btn-secondary mx-4 my-5">
      <input type="radio" name="options" value="packages" autocomplete="off"> Packages
    </label>
  </div>
</div>
<script>
$(document).ready(function() {
  $('input[name="options"]').on('change', function () {
    const selected = $(this).val();
    if (selected === 'packages') {
      $('#packages-section').show();
      $('#services-section').hide();
    } else {
      $('#services-section').show();
      $('#packages-section').hide();
    }
  });
});
</script>
<div id="packages-section" style="display: none;">
    <div id="selected-package-message" class="mt-3 text-dark" style="font-weight: 500;"></div>
  <div class="container-fluid">
    <div class="row"> 
        <div id="selected-package-message"></div>
        <?php
    $sql ="SELECT 
    p.id AS package_id,
    p.package_name,
    p.file AS package_image,
    p.description,
    p.discount,
    GROUP_CONCAT(ps.service_name SEPARATOR ',') AS services,
    SUM(ps.price) AS total_price,
    SUM(ps.price_after_discount) AS total_price_after_discount
FROM 
    package1 p
LEFT JOIN 
    package_services ps 
ON 
    p.id = ps.package_id
GROUP BY 
    p.id " ;

$services = [];
$result_subcategories = mysqli_query($conn, $sql);

if (mysqli_num_rows($result_subcategories) > 0) {

?>

 <div style="display: flex; flex-wrap: wrap; gap: 3 rem; justify-content: center; padding: 0 2rem;">
<?php
    while ($s = mysqli_fetch_assoc($result_subcategories)) {
		
			 $imagePath = "/beauty_parlour_management_system/admin2/" . $s['package_image']; 
          $services[] = $s['services'];
    //          $total_price += $s['price'];
    //         $total_discount += $s['discount'];
    //         $total_price_after_discount += $s['price_after_discount'];
	//  $imagePath = "/beauty_parlour_management_system/admin2/" . $s['file']; 
        // $s_id = $row['s_id'];
?>
<?php $serviceList = implode(',', $services); ?>
        <div class="card mx-4 mt-5" style="width: 15rem; font-size: 0.875rem;" >
          <div class="card-body">
         <div class="mb-2"> <!-- Bootstrap margin-bottom utility -->
      <input type="checkbox" id="selectpackage" name="selectpackage"  class="package-checkbox" name="selectpackage[]" value="<?php echo $s['package_id']; ?>" data-package-name="<?php echo htmlspecialchars($s['package_name']); ?>">
    </div>
            <h5 class="card-title" style="font-size: 1.5rem;"><?php echo $s['package_name']; ?></h5>

 <img src="<?php echo $imagePath; ?>" class="card-img-top" alt="..." style="width: 200px; height: 200px; object-fit: cover; ">


<p class="card-text " style="font-size: 0.95rem; margin: 0;"> <strong>Price : </strong> <s> Rs <?php echo $s['total_price']; ?> </s> </p>
<?php $services = explode(',', $s['services']);  ?>
    <p class="card-text" style="font-size: 0.98rem; margin: 0;">
        <strong>Services available :</strong>
    </p>
    <ol style="padding-left: 20px; margin-top: 4px; font-size: 0.9rem; color: #444;">
        <?php foreach ($services as $service): ?>
            <li><?php echo htmlspecialchars($service); ?></li>
        <?php endforeach; ?>
    </ol>
<p class="card-text" style="font-size: 0.95rem; margin: 0;"> <strong>Description : </strong> <?php echo $s['description']; ?> </p>
<p class="card-text" style="font-size: 0.99rem; margin: 0; color:rgb(81, 46, 97);"> <strong>Discount (%) : </strong> <?php echo $s['discount']; ?> </p>
<p class="card-text" style="font-size: 0.99rem; margin: 0; color:rgb(81, 46, 97);  "><strong>Price after discount : </strong> Rs <?php echo $s['total_price_after_discount']; ?> </p>



          </div>
        </div>
<?php
    }
?>
    </div> <!-- Flex container ends -->
<?php
}
?>
    </div> 
    <button type="submit" name="submit" class="btn" style="background-color:rgb(51, 139, 139); font-weight: 500; font-size: 16px;  padding: 7px 20px;  color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px; ">Book Package</button>
  <!-- <script>
$(document).ready(function () {
  $('.select-package').on('click', function () {
    const selectedId = $(this).data('id');
    // Optional: Allow only one selection at a time
    $('.select-package')
      .removeClass('btn-success')
      .addClass('btn-outline-primary')
      .text('Select')
      .prop('disabled', false);

    // Update the clicked button
    $(this)
      .removeClass('btn-outline-primary')
      .addClass('btn-success')
      .text('Package Selected ✅')
      .prop('disabled', true); // optional: disable after selection

    // Optionally show a message elsewhere on screen
    $('#selected-package-message').html(
      `<div class="">Package <strong>${selectedId}</strong> is selected </div>`
    );
  });
});
</script> -->
<!-- <script>
$(document).ready(function () {
  let selectedPackages = [];

  $('.select-package').on('click', function () {
    const packageId = $(this).data('id');

    // Mark button as selected
    $(this)
      .removeClass('btn-outline-primary')
      .addClass('btn-success')
      .text('Package Selected ✅')
      .prop('disabled', true);

    // Add package to selected list
    selectedPackages.push(packageId);

    // Display all selected packages
     // Update the message box
    $('#selected-package-message')
      .html('Selected Package Numbers: <strong>' + selectedPackages.join(', ') + '</strong>')
      .show();
  });
});
</script> -->

</div>
</div>
<div id="services-section">
                  <h4>CHOOSE YOUR SERVICES</h4>
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
                         <th>Service Image</th> 
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

<!-- <script>
document.addEventListener('change', function(event) {
    if (event.target.classList.contains('service-checkbox')) {
        if (event.target.checked) {
            console.log("Selected Service:", event.target.dataset.name);
            console.log("Price:", event.target.dataset.price);
        }
    }
});
</script> -->
<!-- <script>
document.addEventListener('change', function(event) {
    if (event.target.classList.contains('service-checkbox')) {
        updateSelectedServices();
    }
});

function updateSelectedServices() {
    let selectedServices = [];
    document.querySelectorAll('.service-checkbox:checked').forEach(checkbox => {
        selectedServices.push({
            name: checkbox.dataset.name,
            price: checkbox.dataset.price
        });
    });

    let selectedDiv = document.getElementById('selected-services');
    if (selectedServices.length > 0) {
        let html = "<ul>";
        selectedServices.forEach(service => {
            html += `<li>${service.name} - ₹${service.price}</li>`;
        });
        html += "</ul>";
        selectedDiv.innerHTML = html;
    } else {
        selectedDiv.innerHTML = "<p>No services selected.</p>";
    }
}
</script>              -->
<!-- <script>
$(document).on('change', '.service-checkbox', function () {
    var selectedServices = [];
    $(".service-checkbox:checked").each(function () {
        var serviceName = $(this).data("name");
        var servicePrice = $(this).data("price");
        selectedServices.push(serviceName + " - ₹" + servicePrice);
    });

    if (selectedServices.length > 0) {
        $("#selectedServices").html( selectedServices.join("<br>"));
    } else {
        $("#selectedServices").html("");
    }
});
</script> -->
<!-- <script>
$(document).on('change', '.service-checkbox', function () {
    var serviceName = $(this).data("name");
    var servicePrice = $(this).data("price");
    var serviceId = $(this).val(); // Use checkbox value as unique identifier
    var selectedDiv = $("#selectedServices");

    if (this.checked) {
        // Append new service if checked
        selectedDiv.append(`<p id="service-${serviceId}">${serviceName} - ₹${servicePrice}</p>`);
    } else {
        // Remove service if unchecked
        $(`#service-${serviceId}`).remove();
    }
});
</script> -->
<script>
    var appointment_for = "<?php echo $appointment_for; ?>";
</script>

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
<!-- <h3>Selected Services:</h3>
  <div id="selectedServices"></div>
  <div id="totalPrice" name="totalPrice" style="font-weight: bold; margin-top: 20px;">Total: Rs 0.00</div>
  <div class="form-group">
    <label for="discount" style="display: inline-block; width: 200px;">Enter discount percentage </label>
    <input type="number"  id="discount" name="discount" class="form-control d-inline-block" style="width: calc(30% - 100px);" placeholder="Enter discount amount">
</div>
<div id="totalAfterDiscount" name="totalAfterDiscount" style="font-weight: bold; margin-top: 20px;">Total after discount: Rs 0.00</div> -->
 <!-- Hidden inputs for storing total and selected services -->

 <!-- <input type="hidden" id="hiddenTotalPrice" name="totalPrice">

    <input type="hidden" id="hiddenDiscountedPrice" name="totalAfterDiscount"> -->
<!-- Button section for adding and cancelling -->
<h3>Selected Services:</h3>
<div id="selectedServices"></div>

<!-- Display total price -->
<div id="totalPrice" style="font-weight: bold; margin-top: 20px;">Total: Rs 0.00</div>

<!-- Discount input field -->
<div class="form-group">
    <label for="discount" style="display: inline-block; width: 200px;"> Discount percentage (%)</label>
    <input type="number" step="0.01" id="discount" name="discount" class="form-control d-inline-block" 
        style="width: calc(35% - 100px);" placeholder="Enter discount in percentage">
</div>
<!-- Discount input field -->
<div class="form-group">
    <label for="discountAmount" style="display: inline-block; width: 200px;"> Discount in Amount</label>
    <input type="number"  step="0.01" id="discountAmount" name="discountAmount" class="form-control d-inline-block" 
        style="width: calc(35% - 100px);" placeholder="Enter discount in amount">
</div>

<!-- Display total after discount -->
<div id="totalAfterDiscount" style="font-weight: bold; margin-top: 20px;">Total after discount: Rs 0.00</div>

<!-- Hidden inputs for storing values before form submission -->
<input type="hidden" id="hiddenTotalPrice" name="totalPrice">
<input type="hidden" id="hiddenDiscountedPrice" name="totalAfterDiscount">

<!-- ✅ New hidden input for selected services -->
<input type="hidden" id="hiddenSelectedServices" name="selectedServices">

<div class="card-footer">
<button type="submit" name="submit" class="btn" style="background-color:rgb(51, 139, 139); font-weight: 500; font-size: 16px;  padding: 7px 20px;  color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px; ">Book Services</button>
  <button type="reset" class="btn btn-danger float-right">Cancel</button>
</div>
                <!-- /.card-footer -->
              </form>
              <?php     
              }
              }  ?>
            </div>
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

    // function updateTotalAfterDiscount(totalPrice) {
    //     let discountValue = parseFloat($("#discount").val()) || 0;
    //     let discountAmount = (totalPrice * discountValue) / 100;
    //     let finalPrice = totalPrice - (totalPrice * discountValue / 100);

    //     $("#discountAmount").val(discountAmount.toFixed(2));

    //     $("#totalAfterDiscount").text(`Total after discount: Rs ${finalPrice.toFixed(2)}`);
    //     $("#hiddenDiscountedPrice").val(finalPrice.toFixed(2));
    // }
    function updateTotalAfterDiscount(totalPrice, triggerSource = "percent") {
    let discountPercent = parseFloat($("#discount").val()) || 0;
    let discountAmount = parseFloat($("#discountAmount").val()) || 0;
    let finalPrice;

    if (triggerSource === "percent") {
        
        discountAmount = (totalPrice * discountPercent) / 100;
        $("#discountAmount").val(discountAmount.toFixed(2));
//         if (discountAmount > 0) {
//     $("#discountAmount").val(discountAmount.toFixed(2));
// } else {
//     $("#discountAmount").val(""); // Clear the input if zero
// }

    } else if (triggerSource === "amount") {
        discountPercent = (discountAmount / totalPrice) * 100;
        $("#discount").val(discountPercent.toFixed(2));
    }

    finalPrice = totalPrice - discountAmount;

    // Update total after discount
    $("#totalAfterDiscount").text(`Total after discount: Rs ${finalPrice.toFixed(2)}`);
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
document.addEventListener('DOMContentLoaded', function () {
  const checkboxes = document.querySelectorAll('.package-checkbox');
  const messageDiv = document.getElementById('selected-package-message');

  checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function () {
      let selectedPackages = [];

      checkboxes.forEach(cb => {
        if (cb.checked) {
          const packageName = cb.getAttribute('data-package-name');
          selectedPackages.push(packageName);
        }
      });

      if (selectedPackages.length > 0) {
        messageDiv.innerHTML = "Selected package(s): <strong>" + selectedPackages.join(', ') + "</strong>";
      } else {
        messageDiv.innerHTML = "";
      }
    });
  });
});
</script>

</body>
</html>
<?php
include('includes/footer.php');
?>