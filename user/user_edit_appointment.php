<?php
include 'user_session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');

$id = $_GET ['id'];

$name= $_SESSION["name"];
$email=  $_SESSION["email"];
$mobile=   $_SESSION["mobile"];
$address=  $_SESSION["address"];
if(isset($_POST["submit"])) {
    $updated_date = mysqli_real_escape_string($conn, $_POST["date"]);
    $updated_time = mysqli_real_escape_string($conn, $_POST["time"]);
    $appointment_for = mysqli_real_escape_string($conn, $_POST["appointment_for"]);
    $check_user = "SELECT * FROM tb_appointment WHERE id = '$id'";
    $result_user = mysqli_query($conn, $check_user);
    if(mysqli_num_rows($result_user) > 0) {
   
        $query2 = "UPDATE tb_appointment 
                   SET name='$name', email='$email', address='$address',date='$updated_date',prefered_time='$updated_time',appointment_for= '$appointment_for'
                   WHERE id='$id'";          
       if (mysqli_query($conn, $query2))
       {
        echo"<script> alert('Updation successful') </script>";
       }
       else
       {
        echo "Error inserting record: " . mysqli_error($conn);
       }
    }
}
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
         
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right"> -->
            <!-- <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/admin2/admin_add_customer.php">ADD NEW CUSTOMER</a></li> -->
              <!-- <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/">Home</a></li> -->
            <!-- </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 
    <?php
$sql = "SELECT * FROM tb_appointment WHERE id={$id}";
// Step 3: Execute the query
$result = mysqli_query($conn, $sql);
// Step 4: Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
  // Step 5: Use a while loop to fetch each row of data
  while ($row = mysqli_fetch_assoc($result)) {
?>
 
     <div class="container-fluid">
<div class="card card-info">
              <div class="card-header"style="background-color: rgb(51, 139, 139);">
                <h3 class="card-title">Edit Appointment Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method= "post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-5">
                      <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="ENTER NAME OF THE VISITING CUSTOMER" value = "<?php echo $name ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Mobile number</label>
                    <div class="col-sm-5">
                      <input type="text" name="mobile" class="form-control" id="inputEmail3" placeholder="ENTER MOBILE NUMBER OF THE VISITING CUSTOMER " value = "<?php echo $mobile ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-5">
                                <input type="date" name="date" class="form-control" id="date" placeholder="Enter Date Of The Visiting Customer"  value = "<?php echo $row['date']; ?>" required>
                            </div>
                        </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Time</label>
                    <div class="col-sm-5">
                      <input type="time"name="time" class="form-control" id="inputEmail3" placeholder="ENTER VISITING TIME"  value = "<?php echo $row['prefered_time']; ?>">
                    </div>
                    <?php }}  ?>
                  </div>
                  <?php
                                $sql = "SELECT * FROM category_service";
$result = $conn->query($sql);
// $options = "";
if ($result->num_rows > 0) {
    $options = "<option value='' selected disabled>Select Service</option>\n";
    while($row = $result->fetch_assoc()) {
        $service_name = $row["c_service"];
        // $options .= "<option value=\"$service_name\">$service_name</option>\n";
        // $service_price = $row["price"];
        $options .= "<option value=\"$service_name\">$service_name  </option>\n";
    }
} else {
    $options .= "<option>No services available</option>\n";
}
?>
                        <div class="form-group row">
                            <label for="appointment_for" class="col-sm-2 col-form-label"> Appointment for </label>
                            <div class="col-sm-5">
                                <!-- <input type="text" name="appointment_for" class="form-control" id="appointment_for" > -->
                                <select id="appointmentfor" name="appointment_for" class="form-control">
                                        <?php echo $options; ?>
                                        </select>
                            </div>
</div>
<div class="card-footer">
<button type="submit" name="submit" class="btn" style="background-color: rgb(51, 139, 139); color: white; font-weight: 500; font-size: 16px;  padding: 7px 20px; ">Update</button>
  <!-- <button type="submit" class="btn btn-default float-right">Cancel</button> -->
</div>
                <!-- /.card-footer -->
              </form>
             
            </div>
</div>
</body>
</html>
<?php
include('includes/footer.php');
?>