<?php
include 'user_session.php';

if (!isset($_SESSION["name"])) {
    header("Location: user_login.php");
    exit();
}
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');
?>
<main class="app-main">
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style type="text/css">
.available_package
{
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
            <!-- <h5 class="m-0">RECENT INVOICE DETAILS</h5> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
          
            <!-- <ol class="breadcrumb float-sm-right">
  <button class="btn" style="background-color: rgb(51, 139, 139);border: none; cursor: pointer;  padding: 7px 7px;" >
    <i class="fa fa-user-plus fa-lg" style="margin-right: 2px; color: black; font-size: 14px;"></i>
    <a href="/beauty_parlour_management_system/admin2/admin_add_customer2.php" 
       style="text-decoration: none; color: white; font-size: 14px; font-weight: 700;  margin: 4px 2px;">
   Add Appointment
    </a>
  </button>
</ol> -->

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
 

<div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">Appointment Details</h3> -->
                <h5 class="m-0">Available packages</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <!-- <thead style="background-color:rgb(23, 162, 184); color: white;"> -->
                <thead style="background-color:rgb(51, 139, 139); color: white;">
                  <tr>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">S no.</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Package name</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Description</th>
                     <th style="color: rgb(238, 230, 217); font-weight: 500;">Image</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Actions </th> 
                  </tr>
                  </thead>
                  <tbody>
                  <!-- <a href="#" class="text-white mx-1" data-toggle="modal" data-target="#modal-default" 
       style="text-decoration: none; color:  rgb(238, 230, 217) !important; font-size: 14px; font-weight: 700;  margin: 4px 2px;">
     New Appointment
    </a> -->
  </button>
  <!-- modal start -->
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> View Package details </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          <!-- <h4 style="color:rgb(1, 12, 6);" >Add New Services </h4> -->
            <form id="package_form">
            <div class="form-group">
              <p><strong>Package Name:</strong> <span id="modalPackageName"></span></p>
        <p><strong>Description:</strong> <span id="modalDescription"></span></p>
        <p><strong> Services available in the Package </strong> <span id="modalServices"></span></p>
        <!-- <p><strong>Price Rs:</strong> <span id="modalPrice"></span></p> -->
        <p><strong>Total Price :</strong> <span id="modalTotalPrice"></span></p>
<p><strong>Package discount (%) :</strong> <span id="modalTotalDiscount"></span></p>
<p><strong>Total Price After Discount:</strong> <span id="modalPriceAfterDiscount"></span></p>
                    <div class="modal-footer justify-content-between">                
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <!-- <button type="submit" name="submit" id="submitBtn1" class="btn btn-secondary">Add</button> -->
            </div>
                </form>
                <div id="message"></div>
            </div>
          </div>
        </div>
      <!-- modal end -->
                  <?php
// $sql ="SELECT DISTINCT package_name, description FROM package " ;
$sql = "SELECT *
        FROM package1
        order BY id DESC";

// Step 3: Execute the query
$result = mysqli_query($conn, $sql);
$count = 0;
// Step 4: Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
    // Step 5: Use a while loop to fetch each row of data
   
    while ($row = mysqli_fetch_assoc($result)) {
          $imagePath = "../admin2/" . $row['file'];
      $count = $count+1 ;
      echo '<tr>
      <th scope="row">' . $count . '</th>
      <td>' . $row['package_name'] . '</td>
      <td>' . $row['description'] . '</td>
   <td><img src="' . $imagePath . '" alt="Image" style="width: 50px; height: 50px; object-fit: cover;"></td>   
      <td>
           <div style="display: inline-block; margin-right: 20px;">
      <a href="#" class="view-btn" data-toggle="modal" data-target="#modal-default" data-package_number="' . $row["package_number"] . '">
        <i class="fa fa-eye" style="color: rgb(10, 90, 34);"></i>
      </a>
    </div>
    
      
      </td>
    </tr>';
    }
} else {
    echo "No package found.";
}
?>
<script>
$(document).on('click', '.view-btn', function () {
    const package_number = $(this).data('package_number');
  console.log("Clicked Package package_number:", package_number ); // Check if ID is correct
    $.ajax({
        url: 'get_package.php',
        type: 'POST',
        data: { package_number: package_number },
        dataType: 'json',
        success: function (data) {
            if (data.error) {
                alert(data.error);
            } else {
                // $('#modalPackageName').text(data.package_name);
                // $('#modalDescription').text(data.description);
                // $('#modalServices').text(data.selected_services); // coming directly from package table
                // $('#modalPrice').text(data.total_price_after_discount);
                 $('#modalPackageName').text(data.package_name);
        $('#modalDescription').text(data.description);
        $('#modalServices').text(data.selected_services);
        $('#modalTotalPrice').text(data.price);
        $('#modalTotalDiscount').text(data.discount);
        $('#modalPriceAfterDiscount').text(data.price_after_discount);
            }
        },
        error: function () {
            alert('Error fetching package details.');
        }
    });
});
</script>


                  </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</body>
</html>
</main>
<?php
include('includes/footer.php');
?>