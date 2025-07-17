<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');

if(isset($_POST["submit"])) {
  $name = mysqli_real_escape_string($conn, $_POST["name"]);
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);
  $address = mysqli_real_escape_string($conn, $_POST["address"]);
  $date = mysqli_real_escape_string($conn, $_POST["date"]);
  $preferd_time = mysqli_real_escape_string($conn, $_POST["time"]);
  $appointment_for = "offline booking";

    $query1 = "INSERT INTO tb_appointment values ('','$name','$email','$mobile','$address','$date','$preferd_time','$appointment_for','')";
     if(mysqli_query($conn, $query1))
     {
        echo "<script>
        alert('Appointment successful');
       
            window.location.href='admin_appointment';
    </script>";
  
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }

  $check_user = "SELECT * FROM users WHERE mobile = '$mobile'";
  $result_user = mysqli_query($conn, $check_user);

  if(mysqli_num_rows($result_user) > 0) {
      // Update the user record (no success/error message)
      $query2 = "UPDATE users 
                 SET name='$name', email='$email', address='$address',password='123' 
                 WHERE mobile='$mobile'";
      mysqli_query($conn, $query2);
  } else {
    $pass = 123;
      $query2 = "INSERT INTO users values ('','$name','$mobile','$email','$address','$pass','')";
      mysqli_query($conn, $query2);
  }
}
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style type="text/css">
        .add_cutomer{
            /* background: #157daf !important; */
            background :rgb(33, 70, 77) !important;
        }
        #error-message {
    color: red;
    font-weight: bold;
    margin-top: 10px;
}
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Add jQuery -->

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0">Appointment Booking</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card card-info">
            <div class="card-header"style="background-color: rgb(51, 139, 139);">
          
                    <h3 class="card-title">ADD CUSTOMER DETAILS</h3>
                </div>
                <form class="form-horizontal" action="" method="post" onsubmit="return validateMobile();">
             
    <div class="card-body">
 

        <div class="row">
     
            <!-- Left Column -->
            <div class="col-md-6">
   
                <div class="form-group row">
             
                    <label for="mobile" class="col-sm-4 col-form-label">MOBILE NUMBER</label>
                    <div class="col-sm-8">
                        <input type="tel" name="mobile" class="form-control" id="mobile" placeholder="Enter mobile number"  required >
                         <span id="mobileError" style="color: red;"></span>
                    </div>
                </div>
               

                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">EMAIL US</label>
                    <div class="col-sm-8">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email"required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date" class="col-sm-4 col-form-label">DATE</label>
                    <div class="col-sm-8">
                        <input type="date" name="date" class="form-control" id="date" required>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label">NAME</label>
                    <div class="col-sm-8">
                        <input type="text" name="name"  pattern="[A-Za-z\s]+" class="form-control" id="name" placeholder="Enter name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-4 col-form-label">ADDRESS</label>
                    <div class="col-sm-8">
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter address" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-sm-4 col-form-label">TIME</label>
                    <div class="col-sm-8">
                        <input type="time" name="time" class="form-control" id="time" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden field -->
        <input type="hidden" name="appointment_for" value="offline booking">

        <!-- Error message -->
        <div class="row">
    <div class="col-12 text-center">
        <span id="error-message" style="color: red; font-weight: 600; margin-bottom: 15px; display: inline-block;"></span>
    </div>
</div>

        <!-- Footer -->
        <div class="card-footer">
            <button type="submit" name="submit" class="btn" style="background-color:rgb(51, 139, 139); color: rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px;">Add</button>
            <button type="reset" class="btn btn-danger float-right">Cancel</button> 
        </div>
    </div>
</form>
       
            </div>
        </div>
    </div>
    <script>
function validateMobile() {
    var mobile = document.getElementById("mobile").value;
    var error = document.getElementById("mobileError");

    if (!/^\d{10}$/.test(mobile)) {
        error.textContent = "Please enter exactly 10 digits.";
        return false; // prevent form submission
    }

    error.textContent = ""; // clear error if valid
    return true;
}
</script>
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
    </script>
    <script>
    // Set today's date as min value
    document.addEventListener('DOMContentLoaded', function () {
        const dateInput = document.getElementById('date');
        const today = new Date().toISOString().split('T')[0];
        dateInput.setAttribute('min', today);
    });
</script>
</body>
</html>
<?php
include('includes/footer.php');
?>