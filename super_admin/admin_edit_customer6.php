<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');

$id = $_GET ['id'];
$appointment_for = $_GET['appointment_for'];

// echo "<div style='text-align: center; font-weight: bold;'>$appointment_for</div>";
if (isset($_POST["submit"])) {
    // Get the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];
     $date = $_POST["date"];
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

//  $tb_invoice = "INSERT INTO tb_invoice values ('','$appointment_id','$name','$mobile','$address','$email','$date')";
//      mysqli_query($conn, $tb_invoice);
$check_sql = "SELECT * FROM tb_invoice WHERE appointment_id = '$appointment_id'";
$check_result = mysqli_query($conn, $check_sql);

if (mysqli_num_rows($check_result) > 0) {
    // Update existing invoice
    $update_sql = "UPDATE tb_invoice 
                   SET name = '$name', mobile = '$mobile', address = '$address', email = '$email', date = '$date' 
                   WHERE appointment_id = '$appointment_id'";
    mysqli_query($conn, $update_sql);
} else {
    // Insert new invoice
    $insert_sql = "INSERT INTO tb_invoice 
                   VALUES ('', '$appointment_id', '$name', '$mobile', '$address', '$email', '$date')";
    mysqli_query($conn, $insert_sql);
}

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
             $discount_percentage = $row['discount_percentage'];
             $discount_price = $row['price_after_discount'];
            $totalPrice += $service_price; // Add price to total

            // Insert into tb_selected_services
            $insert_sql = "
            INSERT INTO tb_selected_services (appointment_id, c_id,s_id, a_id, service_name, service_price, discount_percentage, price_after_discount, billing_number) 
            VALUES ('$appointment_id','$c_id','$s_id','$a_id', '$service_name', '$service_price','$discount_percentage','$discount_price', '$billing_number')";
            
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
            window.location.href='admin_invoice2';
        </script>";
    } else {
        echo "Error inserting into orders: " . mysqli_error($conn);
    }
} else {
    echo "No services selected.";
}
 }


// inserting packages into database 



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitpackage'])) {
  
  $appointment_id = $_GET['id'];  // Fetch appointment ID from the GET method
 $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];
     $date = $_POST["date"];
  $prefix = "92"; 
  $billing_number = $prefix . '000001'; 
//  $tb_invoice = "INSERT INTO tb_invoice values ('','$appointment_id','$name','$mobile','$address','$email','$date')";
//      mysqli_query($conn, $tb_invoice);
$check_sql = "SELECT * FROM tb_invoice WHERE appointment_id = '$appointment_id'";
$check_result = mysqli_query($conn, $check_sql);

if (mysqli_num_rows($check_result) > 0) {
    // Update existing invoice
    $update_sql = "UPDATE tb_invoice 
                   SET name = '$name', mobile = '$mobile', address = '$address', email = '$email', date = '$date' 
                   WHERE appointment_id = '$appointment_id'";
    mysqli_query($conn, $update_sql);
} else {
    // Insert new invoice
    $insert_sql = "INSERT INTO tb_invoice 
                   VALUES ('', '$appointment_id', '$name', '$mobile', '$address', '$email', '$date')";
    mysqli_query($conn, $insert_sql);
}

$query = "SELECT billing_number FROM package_selected ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

  if ($row) {
    $lastNumber = (int)substr($row['billing_number'], 2); // remove prefix '98'
    $nextNumber = $lastNumber + 1;
} else {
    $nextNumber = 1; // First billing number
}
$billing_number = $prefix . str_pad($nextNumber, 6, "0", STR_PAD_LEFT);
    if (!empty($_POST['selectpackage'])) {
        $selectedPackages = $_POST['selectpackage']; // array of package IDs
        // $packageNames = $_POST['package_names'];     // associative array: [package_id => package_name]
       

        foreach ($selectedPackages as $packageId) {
            // Sanitize inputs
            $packageId = mysqli_real_escape_string($conn, $packageId);
          


              // Optional: Fetch package_name and package_number if you want to use or store them
            $query = "SELECT * FROM package1 WHERE id = '$packageId'";
            $result = mysqli_query($conn, $query);
            if ($row = mysqli_fetch_assoc($result)) {
                $packageName = $row['package_name'];
                $packageNumber = $row['package_number'];
                $discount = $row['discount'];

 $sql_insert = "INSERT INTO orders (appointment_id,  discount, billing_number, created_at) 
                   VALUES ('$appointment_id',  '$discount', '$billing_number', NOW())";

  mysqli_query($conn, $sql_insert);

            $sql = "INSERT INTO package_selected ( package1_id , appointment_id , billing_number , package_name ) 
                    VALUES ( '$packageId' , '$appointment_id' , '$billing_number' , '$packageName' )";

            if (!mysqli_query($conn, $sql)) {
                echo "Error inserting package ID $packageId: " . mysqli_error($conn);
            }
        }
      }
        echo "<script>alert('Package booked successfully.'); window.location.href='admin_invoice2';</script>";
    } else {
        echo "<script>alert('Please select at least one package.'); window.history.back();</script>";
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
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                      <input type="hidden"name="date" class="form-control" id="inputEmail3" placeholder="ENTER VISITING TIME" value = "<?php echo $row['date'] ?>"readonly>
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

<!-- package section -->
  <!-- package form start -->
              <form class="form-horizontal" action="" method= "post">
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
		
			 $imagePath =  $s['package_image']; 
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
      <input type="radio" id="selectpackage"  class="package-checkbox" name="selectpackage[]" value="<?php echo $s['package_id']; ?>" data-package-name="<?php echo htmlspecialchars($s['package_name']); ?>">
      <input type="hidden" name="package_names[<?php echo $s['package_id']; ?>]" value="<?php echo $s['package_name']; ?>">
    </div>
            <h5 class="card-title" style="font-size: 1.5rem;"><?php echo $s['package_name']; ?></h5>

 <img src="<?php echo $imagePath; ?>" class="card-img-top" alt="..." style="width: 200px; height: 200px; object-fit: cover; ">


<p class="card-text " style="font-size: 0.95rem; margin: 0;"> <strong>Price : </strong> <s> Rs <?php echo $s['total_price']; ?> </s> </p>
<?php
 $services = explode(',', $s['services']);  ?>
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
    <button type="submit" name="submitpackage" class="btn" style="background-color:rgb(51, 139, 139); font-weight: 500; font-size: 16px;  padding: 7px 20px;  color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px; ">Book Package</button>
 
</div>
</div>
</form>
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