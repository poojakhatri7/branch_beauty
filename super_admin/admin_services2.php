<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');
 $defaultImage = "../user/assets/dist/img/dp.webp"; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
 $photo = $_FILES["image"]["name"];
    $photo2 = $_FILES["image"]["tmp_name"];
    $uploadPath = "upload-images/" . $photo;
  $sub_service_id = $_POST['s']; // Gets the selected service ID
  $category_id = $_POST['c_id'];
  $service_name = mysqli_real_escape_string($conn, $_POST['service_name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
     $discount_percentage = mysqli_real_escape_string($conn, $_POST['discount']);
      $offer_price = mysqli_real_escape_string($conn, $_POST['offer_price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
      move_uploaded_file($photo2, $uploadPath);
    $sql = "INSERT INTO all_services (a_id, all_service,  price, discount_percentage ,price_after_discount, description , file , file1 , file2, service_number, c_id_category_service) VALUES ('','$service_name','$price', '$discount_percentage','$offer_price','$description','$uploadPath','$defaultImage','$defaultImage','$sub_service_id','$category_id')";

      if (mysqli_query($conn, $sql)) {
          echo "<script>alert('Service added successfully!'); window.location.href='manage_service';</script>";
      } else {
          echo "<script>alert('Error: " . mysqli_error($conn) . "'); </script>";
      }
  echo "Selected Sub-Service ID: " . $sub_service_id;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <style type="text/css">
.admin_services{
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
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h4 class="m-0">Repairing </h4> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/">Home</a></li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
    <div class="container-fluid">
<div class="card card-info">
              <div class="card-header"style="background-color: rgb(51, 139, 139);">
                <h3 style=" align-items: center" class="card-title">ADD SERVICES</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method= "post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group row">
    <label for="serviceSelect" class="col-sm-2 col-form-label"> CATEGORY</label>
    <div class="col-sm-4">
        <select name="c_id" class="form-control" id="service">
            <option value="">Select category</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="serviceSelect" class="col-sm-2 col-form-label"> SUB CATEGORY</label>
    <div class="col-sm-4">
        <select name="s" class="form-control" id="sub_service">
            <option value="">Select Sub category</option>
        </select>
    </div>
</div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">ENTER SERVICE NAME</label>
                    <div class="col-sm-4">
                      <input type="text" name="service_name" class="form-control" id="inputPassword3" placeholder="Enter New Service" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">ENTER SERVICE PRICE</label>
                    <div class="col-sm-4">
                      <input type="number" name="price" class="form-control" id="service_price" placeholder="Enter Price" required>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">ENTER DISCOUNT (%) </label>
                    <div class="col-sm-4">
                      <input type="number" name="discount" class="form-control" id="discount_percentage" placeholder="Enter discount percentage " required>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> OFFER PRICE </label>
                    <div class="col-sm-4">
                      <input type="number" name="offer_price" class="form-control" id="price_after_discount" placeholder="offer price">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">DESCRIPTION</label>
                    <div class="col-sm-4">
                      <input type="text" name="description" class="form-control" id="inputPassword3" placeholder="Any Description of the service">
                    </div>
                  </div>
                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">IMAGE</label>
                    <div class="col-sm-4">
                      <input type="file" name="image" class="form-control" id="inputPassword3" placeholder="Any Description of the service" required>
                    </div>
                  </div>
                  <!-- <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                      </div>
                    </div>
                  </div> -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn" style="background-color: rgb(51, 139, 139); color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px;  padding: 7px 15px; ">Add</button>
                  <button type="reset" class="btn btn-danger float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
</div>

<script>
$(document).ready(function () {

    // Function to load service categories
    function loadServices() {
        $.ajax({
            url: "load_service.php",
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
            url: "load_service.php",
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
            url: "load_service.php",
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
<script>
const priceInput = document.getElementById('service_price');
const discountInput = document.getElementById('discount_percentage');
const offerPriceInput = document.getElementById('price_after_discount');

function calculateOfferPrice() {
    const price = parseFloat(priceInput.value);
    const discount = parseFloat(discountInput.value);

    if (!isNaN(price) && !isNaN(discount)) {
        const discountAmount = (price * discount) / 100;
        const finalPrice = price - discountAmount;
        offerPriceInput.value = finalPrice.toFixed(2); // Round to 2 decimals
    } else {
        offerPriceInput.value = ''; // Clear if invalid input
    }
}

priceInput.addEventListener('input', calculateOfferPrice);
discountInput.addEventListener('input', calculateOfferPrice);
</script>
</body>
</html>
<?php
include('includes/footer.php');
?>