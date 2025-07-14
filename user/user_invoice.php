<?php
include 'user_session.php';
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
.user_invoice{
  background : rgb(51, 139, 139); !important;
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
          <!-- <i class="fa fa-user-plus " style="float: right;" aria-hidden="true"></i> -->
          <!-- <i class="fa fa-user-plus" aria-hidden="true"></i> -->
          <!-- <i class="fa fa-user-plus" style="margin-right: 5px; color: white;" aria-hidden="true"></i> -->
            <!-- <ol class="breadcrumb float-sm-right">
            <i class="fa fa-user-plus fa-lg " style="margin-right: 1px; color: black;"></i>
            <a href="/beauty_parlour_management_system/admin2/admin_add_customer.php" style="text-decoration: none; ">
         <button class="btn btn-info"style= "border: none; cursor: pointer;"> 
          
          <li class="breadcrumb-item " style= "color: white;  font-size: 14px; font-weight: 500; padding: 2px;" >Add New Customer</li>     
</a> 
</button> 
            </ol> -->
            <!-- <ol class="breadcrumb float-sm-right">
  <button class="btn" style="background-color: rgb(33, 165, 100);border: none; cursor: pointer;  padding: 7px 7px;" >
    <i class="fa fa-user-plus fa-lg" style="margin-right: 2px; color: black; font-size: 14px;"></i>
    <a href="/beauty_parlour_management_system/admin2/admin_add_customer.php" 
       style="text-decoration: none; color: white; font-size: 14px; font-weight: 700;  margin: 4px 2px;">
      Add New Customer
    </a>
  </button>
</ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
   
<!-- <a href="/beauty_parlour_management_system/sign_up.php">Create a new account</a> -->
<div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">Appointment Details</h3> -->
                <h5 class="m-0">RECENT INVOICE DETAILS</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color:rgb(51, 139, 139); color: white;">
                  <tr>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">S no.</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Appointment Id</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Customer name</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Date</th>
                     <th style="color: rgb(238, 230, 217); font-weight: 500;"> Bill number</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;"> Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
$mobile= $_SESSION["mobile"];
$sql="SELECT DISTINCT p.appointment_id AS appointment_id, p.name, p.date,  c.billing_number
FROM tb_invoice p
INNER JOIN tb_selected_services c
ON p.appointment_id = c.appointment_id  WHERE mobile = $mobile" ;
// Step 3: Execute the query
$result = mysqli_query($conn, $sql);
$count = 0;
// Step 4: Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
    // Step 5: Use a while loop to fetch each row of data
   
    while ($row = mysqli_fetch_assoc($result)) {
      $count = $count+1 ;
      echo"<tr>
      <th scope='row'>".$count."</th> 
     <td>".$row['appointment_id']."</td>
      <td>".$row['name']."</td>
       <td>".$row['date']."</td>
         <td>{$row['billing_number']}</td>
        <td> 
  <a href='user_invoice_details?appointment_id={$row["appointment_id"]}&billing_number={$row["billing_number"]}'>
     <button class='btn' style='background-color:rgb(51, 139, 139); color: white; border: none; cursor: pointer;  padding: 7px 12px; border: none;  cursor: pointer;'>
      <i class='fa fa-eye fa-lg' style='margin-right: 2px; color: black; font-size: 14px;'></i>
      View
     </button>
  </a> 
</td>
    </tr>";
    }
} else {
    echo "No invoice found.";
}
?>
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