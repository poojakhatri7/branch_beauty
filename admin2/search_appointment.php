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
    <style type="text/css">
.search_appointment{
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
            <!-- <h5 class="m-0"> APPOINTMENT DETAILS</h5> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <!-- <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/admin2/admin_add_customer.php">ADD NEW CUSTOMER</a></li> -->
              <!-- <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/">Home</a></li> -->
              <!-- <a href="/beauty_parlour_management_system/admin2/admin_add_customer.php" style="text-decoration: none;">
         <button class="btn btn-danger"style= "border: none; cursor: pointer;"> 
           <li class="breadcrumb-item " style= "color: white;" >ADD NEW CUSTOMER</li> 
</a>  -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
    <div class="card card-info">
    <div class="card-header"style="background-color: rgb(51, 139, 139);">
                <h3 class="card-title" style='font-weight: 500; color : rgb(238, 230, 217)'>Appointment Details Search By Mobile Number</h3>
              </div>
    <body class="cbp-spmenu-push">
    <div class="main-content">
        <div id="page-wrapper">
            <div class="main-page">
                    <!-- <h3 class="title1">Search Appointment</h3> -->
                    <div class="table-responsive bs-example widget-shadow">
                        <!-- <h4>Search Appointment / Contact number:</h4> -->
                        <div class="card-body">
                        <div class="form-group row">
                            <form  class="form-horizontal" method="post" name="search" action="">
                                <div class="form-group">
                                    <label for="mobile" style="padding-bottom: 20px;">Mobile Number</label> 
                                    <input id="searchdata" type="number" name="searchdata" required="true" class="form-control col-sm-3 col-md-3" placeholder="Enter Registered Mobile Number">
                                    <br>
                                    <button class = "btn" style='background-color:rgb(51, 139, 139); color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px;  padding: 7px 15px;' type="submit" name="search" >Search</button>
                                </div> <!-- Closing the form-group -->
                            </form> <!-- Closing the form -->
                        </div> <!-- Closing the form-body -->
                    </div> <!-- Closing the table-responsive -->
            </div> <!-- Closing the main-page -->
        </div> <!-- Closing the page-wrapper -->
    </div> <!-- Closing the main-content -->
</div>
</div>
</body>

<?php
if(isset($_POST['search']))
{ 
$sdata=$_POST['searchdata'];
  ?>
 

      <table id="example1" class="table table-bordered table-striped">
  <thead style="background-color:rgb(51, 139, 139); color: white;">
         <tr> <th>Sno</th> 
         <th>Name</th>
         <th>Email</th>
         <th>Date</th>
         <th>Time</th>
         <th>Mobile</th>
         <th>Address</th>
         <!-- <th>Action</th> -->
           <h4 >Result against mobile number "<?php echo $sdata;?>" </h4> 
</thead>
<tbody>
<?php
$sql = "SELECT * FROM tb_appointment WHERE mobile = '$sdata'";
$result = mysqli_query($conn, $sql);
$count = 0;
$appointment_id = null;  // Initialize variable to store appointment_id

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $appointment_id = $row['id']; // Store the latest appointment_id
        $count++;
?>
        <tr>
            <th scope='row'><?php echo $count; ?></th> 
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td> 
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['prefered_time']; ?></td>  
            <td><?php echo $row['mobile']; ?></td> 
            <td><?php echo $row['address']; ?></td>

<?php 
    } // Close the while loop here to prevent multiple button iterations

    if ($appointment_id) { // Ensure appointment_id is available
        $sql1 = "SELECT appointment_id FROM tb_selected_services WHERE appointment_id = {$appointment_id}";
        $result1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result1) > 0) {
            // Button for invoices
?>
            <!-- <td>  
                <a href='/beauty_parlour_management_system/admin2/invoice_details2.php?appointment_id=<?php echo $appointment_id; ?>'>
                    <button class='btn' style='background-color:rgb(51, 139, 139); color: white; border: none; padding: 5px 10px; cursor: pointer;'>
                        <i class='fa fa-eye fa-lg' style='margin-right: 2px; color: black; font-size: 14px;'></i>
                        View
                    </button>
                </a> 
            </td> -->
<?php
        }
         else 
        { 
            // Button for editing customer info
?>
            <!-- <td>  
                <a href='/beauty_parlour_management_system/admin2/admin_edit_customer.php?id=<?php echo $appointment_id; ?>'>
                    <button class='btn' style='background-color:rgb(51, 139, 139); color: white; border: none; padding: 5px 10px; cursor: pointer;'>
                        <i class='fa fa-eye fa-lg' style='margin-right: 2px; color: black; font-size: 14px;'></i>
                        View
                    </button>
                </a> 
            </td> -->
<?php
        }
    }
} 
// else {
//     echo "<tr><td colspan='100%' style='color: red; font-weight:700; text-align: center; '>No Appointment has been booked from this number</td></tr>";
// }
}
?>

</tbody>
</table>
<?php
include('includes/footer.php');
?>