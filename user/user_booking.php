<?php
include 'user_session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');

if(isset($_POST["submit"])) {
   $name= $_SESSION["name"];
   $email=  $_SESSION["email"];
   $mobile=   $_SESSION["mobile"];
   $address=  $_SESSION["address"];
  $date = mysqli_real_escape_string($conn, $_POST["date"]);
  $preferd_time = mysqli_real_escape_string($conn, $_POST["time"]);
$appointment_for = mysqli_real_escape_string($conn, $_POST["appointment_for"]);
// $appointment_for = "pooja";
$staff ="any";

// Check if the mobile number exists in tb_appointment
$check_appointment = "SELECT * FROM users WHERE mobile = '$mobile'";
$result_appointment = mysqli_query($conn, $check_appointment);
if(mysqli_num_rows($result_appointment) > 0) {
    $query1 = "INSERT INTO tb_appointment (name, email, mobile, address, date, prefered_time, appointment_for,staff) 
           VALUES ('$name', '$email', '$mobile', '$address', '$date', '$preferd_time', '$appointment_for','$staff')"; 
    // $query1 = "INSERT INTO tb_appointment values ('','$name','$email','$mobile','$address','$date','$preferd_time','$appointment_for','')";
   if(mysqli_query($conn, $query1))
   {
    echo"<script> alert('Booking successful') 
            window.location.href='appointment_history.php';
       
    </script>";
    
  } else {
      echo "Error inserting record: " . mysqli_error($conn);
  }
}
}
 // Update the appointment record
    // $query1 = "UPDATE tb_appointment 
    //            SET name='$name', email='$email', address='$address', date='$date', prefered_time='$preferd_time', appointment_for='$appointment_for' 
    //            WHERE mobile='$mobile'";
// } else {
//     // Insert a new appointment
//     // $query1 = "INSERT INTO tb_appointment (name, email, mobile, address, date, preferd_time, appointment_for) 
//     //            VALUES ('$name', '$email', '$mobile', '$address', '$date', '$preferd_time', '$appointment_for')";
//     $query1 = "INSERT INTO tb_appointment values ('','$name','$email','$mobile','$address','$date','$preferd_time','$appointment_for')";
//     if(mysqli_query($conn, $query1))
//     {
//     echo"<script> alert('Appointment successful') </script>";
//   } else {
//       echo "Error inserting record: " . mysqli_error($conn);
//   }

  // Check if the mobile number exists in tb_appointment
//   $query = "INSERT INTO tb_appointment values ('','$name','$email','$mobile','$address','$date','$preferd_time','$appointment_for')";
//   if (mysqli_query($conn, $query)) {
//     echo "<script> alert('New service added successfully'); </script>";
// } else {
//     echo "<script> alert('Something went wrong'); </script>";
// }
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
    <style type="text/css">
        .user_booking{
            background:rgb(33, 70, 77) !important;
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
        <div class="content-header" >
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0">Book an appointment</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header"style="background-color: rgb(51, 139, 139);">
                    <h3 class="card-title" style="color: rgb(238, 230, 217); font-weight: 500;">Please select date and time </h3>
                </div>
                <form class="form-horizontal" action="" method="post">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-4">
                                <input type="date" name="date" class="form-control" id="date" placeholder="Enter Date Of The Visiting Customer" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="time" class="col-sm-2 col-form-label">Time</label>
                            <div class="col-sm-4">
                                <input type="time" name="time" class="form-control" id="time" placeholder="Enter Time Of Visiting" required>
                            </div>
                        </div>
                        <?php
                                $sql = "SELECT * FROM category_service";
$result = $conn->query($sql);
// $options = "";
if ($result->num_rows > 0) {
    $options = "<option value='' selected disabled>Select Service</option>\n";
    while($row = $result->fetch_assoc()) {
        $service_name = $row["c_service"];
        // $service_price = $row["price"];
        $options .= "<option value=\"$service_name\">$service_name  </option>\n";
    }
} else {
    $options .= "<option>No services available</option>\n";
}
?>
                        <div class="form-group row">
                            <label for="appointment_for" class="col-sm-2 col-form-label"> Appointment for </label>
                            <div class="col-sm-4">
                                <!-- <input type="text" name="appointment_for" class="form-control" id="appointment_for" > -->
                                <select id="appointmentfor" name="appointment_for" class="form-control">
                                        <?php echo $options; ?>
                                        </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn" style="background-color:  rgb(51, 139, 139); color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px;">Book an appointment</button>
                            <button type="submit" class="btn btn-danger float-right">Cancel</button>
                        </div>
                    </div>
                </form>       
            </div>
        </div>
    </div>
</body>
</html>
<?php
include('includes/footer.php');
?>