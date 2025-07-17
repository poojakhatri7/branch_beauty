<?php
include 'session.php';
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style type="text/css">
.manage_services{
  /* background : #157daf !important; */
  background :rgb(33, 70, 77) !important;
}
</style>
  </head>
  <body>
 
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      <div class="row mb-2">
      <div class="col-sm-6">
      </div><!-- /.col -->
      <div class="col-sm-6">
<?php
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1)
{
?>
      <ol class="breadcrumb float-sm-right">
      <button class="btn" style="background-color:rgb(51, 139, 139);border: none; cursor: pointer;  padding: 7px 7px;">
    <i class="fa fa-magic" style="margin-right: 2px; color: black; font-size: 14px;"></i>
    <!-- <a href="#" class="text-white mx-1" data-toggle="modal" data-target="#modal-default"
       style="text-decoration: none; color: black; font-size: 14px; font-weight: 650;  margin: 4px 2px;">
      Add Services
    </a> -->
    <a href="admin_services2" class="text-white mx-1" 
       style="text-decoration: none; color: black; font-size: 14px; font-weight: 650;  margin: 4px 2px;">
      Add Services
    </a>
  </button>
</ol>
<?php  } ?>

  </div><!-- /.col -->
        </div><!-- /.row -->
      
     
    </div>
    <div class="container-fluid">
      
<div class="row">
                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" id="service">
                        <option>Select Service Category </option>
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
  
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New Services</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          <!-- <h4 style="color:rgb(1, 12, 6);" >Add New Services </h4> -->
            <form id="serviceForm">
                    <div class="form-group">
                        <label for="serviceName" style="color:rgb(51, 139, 139);" >Service Name</label>
                        <input type="text" name="service_name" class="form-control" id="serviceName" placeholder="Enter service name" required>
                    </div>
                    <div class="form-group">
                        <label for="servicePrice" style="color:rgb(51, 139, 139);">Price</label>
                        <input type="number" name="service_price" class="form-control" id="servicePrice" placeholder="Enter price">
                    </div>
                    <div id="message"></div>
                    <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" name="submit" id="submitBtn" class="btn btn-secondary">Add</button>
            </div>
                </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

</div>
<!-- <div id="service_table"></div>             -->
                <!-- <h3 class="card-title">Appointment Details</h3> -->
              
     <!-- <div class="card-body">      
    <table id="example1" class="table table-bordered table-striped">
       
    </table>
</div> -->
              <!-- /.card-body -->
     
            <!-- /.card -->
         
          <!-- /.col -->
       
        <!-- /.row -->
           <div class="container-fluid">
        <div class="card">
        <div class="card-header">
            <h5 class="m-0 card-title" >Our Services</h5>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: rgb(51, 139, 139); color: white;">
                    <tr>
                        <th>S No.</th>
                        <th>Service Name</th>
                        <th>Service Price (Rs)</th>
                         <th>Discount (%)</th>
                          <th>Offer Price (Rs)</th>
                         <th>Image </th>
                          <th>Image </th>
                            <th>Image </th>
                        <!-- <th>Service Number</th> -->
                         
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td colspan="100%" class="text-center">Select a Service and Sub-service  to see details</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
  

  <script>
        $(document).ready(function () {
            $("#submitBtn").click(function (e) {
                e.preventDefault(); // Prevent form submission

                var serviceName = $("#serviceName").val();
                var servicePrice = $("#servicePrice").val();
                $.ajax({
                    type: "POST",
                    url: "add_services.php", // PHP file that will handle the request
                    data: {
                       service_name: serviceName,
                       service_price: servicePrice 
                      },
                    success: function (response) {
                        $("#message").html(response); // Display response message
                       $("#serviceForm")[0].reset(); // Reset form fields
                     $("#serviceForm").trigger("reset");
                    }
                });
            });
        });
    </script>
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
  </body>
</html>
<?php
include('includes/footer.php');
?>
