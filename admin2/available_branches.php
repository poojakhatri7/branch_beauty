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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style type="text/css">
.admin_available_branches{
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
            <!-- <h5 class="m-0"> APPOINTMENT DETAILS</h5> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
           

  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New Appointment </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          <!-- <h4 style="color:rgb(1, 12, 6);" >Add New Services </h4> -->
            <form id="appointment_form">
            <div class="form-group">
            <div id="message"></div>
                        <label for="mobile" style="color:rgb(51, 139, 139);" >Mobile</label>
                        <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile number">
                    </div>
                    <span id="error-message" style="color: red; display: block; font-weight:600; margin-bottom: 15px; text-align:  justify; padding-left: 50px; "></span>
                    <div class="form-group">
                        <label for="name" style="color:rgb(51, 139, 139);">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="email" style="color:rgb(51, 139, 139);">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="address" style="color:rgb(51, 139, 139);">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address">
                    </div>
                    <div class="form-group">
                        <label for="date" style="color:rgb(51, 139, 139);">Date</label>
                        <input type="date" name="date" class="form-control" id="date" placeholder="Enter Date">
                    </div>
                 
                    <div class="form-group">
                        <label for="time" style="color:rgb(51, 139, 139);">Time</label>
                        <input type="time" name="time" class="form-control" id="time" placeholder="Enter Time">
                    </div>
                    <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="submit" id="submitBtn1" class="btn btn-secondary">Add</button>
            </div>
                </form>
                <div id="message"></div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
<div class="card">
              <div class="card-header">
                <h5 class="m-0"> Available Branches</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: rgb(51, 139, 139) ">
                  <tr>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">S no.</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Name</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Email</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Mobile</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Message</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Date and Time</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Actions</th>
                    <!-- <th>Actions</th> -->
                  </tr>
                  </thead>
                  <tbody>
 

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

  <script>
        $(document).ready(function() {
            // Trigger AJAX when the user types in the mobile number
            $("#mobile").on("keyup", function() {
                var mobile = $("#mobile").val(); // Get the mobile number entered
                if (mobile.length >= 8) { // Start searching after 3 characters (adjust as needed)
                    $.ajax({
                        url: "fetch_customer.php", // PHP file to fetch customer data
                        method: "POST",
                        data: { mobile: mobile },
                        success: function(response) {
                            // Handle the response from fetch_customer.php
                            var data = JSON.parse(response); // Parse the JSON response
                            if (data.success) {
                                // Populate the fields with data
                                $("#name").val(data.name);
                                $("#email").val(data.email);
                                $("#address").val(data.address);
                                $("#error-message").hide();
                            } else {
                                // If customer not found
                                $("#name").val("");
                                $("#email").val("");
                                $("#address").val("");
                               // alert("Customer not found!");
                               $("#error-message").text("No Record Found Please Fill Up The Details").show();
                            }
                        },
                        error: function() {
                            alert("An error occurred while fetching the data.");
                        }
                    });
                }
            });
        });
  
        $(document).ready(function () {
            $("#submitBtn1").click(function (e) {
                e.preventDefault(); // Prevent form submission
                var mobile = $("#mobile").val();
                var name = $("#name").val();
                var email = $("#email").val();
                var address = $("#address").val();
                var date = $("#date").val();
                var time = $("#time").val();
                console.log("Mobile:", mobile, "Name:", name, "Email:", email, "Address:", address, "Date:", date, "Time:", time);
                $.ajax({
                    type: "POST",
                    url: "add_appointment.php", // PHP file that will handle the request
                    data: {
                       mobile: mobile,
                      name: name,
                      email: email,
                      address: address,
                      date : date,
                      time : time
                      },
                    success: function (response) {
                        $("#message").html(response); // Display response message
                       $("#appointment_form")[0].reset(); // Reset form fields
                     $("#appointment_form").trigger("reset");
                     $("#error-message").hide();
                    }
                });
            });
        });
    </script>
</body>
</html>
</main>
<?php
include('includes/footer.php');
?>
