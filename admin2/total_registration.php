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
.total_registration{
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
          <!-- <div class="col-sm-6">
            <h5 class="m-0">TOTAL REGISTRATIONS OF CUSTOMER</h5> -->
          <!-- </div>/.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right"> -->
            <!-- <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/admin2/admin_add_customer.php">ADD NEW CUSTOMER</a></li> -->
              <!-- <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/">Home</a></li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
    <!-- <h2>REGISTRATION DETAILS</h2>  -->
  <!-- <br> -->
   <!-- <table class="table">
  <thead style="background-color:rgb(23, 162, 184); color: white;">
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">FIRST NAME</th>
      <th scope="col">LAST NAME</th>
      <th scope="col">MOBILE</th>
      <th scope="col">EMAIL</th>
      </tr>
    </tr>
  </thead>
  <tbody> -->
  <?php
//   = "SELECT distinct FROM tb_selected_services";
//   $sql= "SELECT DISTINCT * FROM tb_selected_services";
 // $sql=" SELECT DISTINCT appointment_id FROM tb_selected_services";
//  $sql ="p.name, p.date from tb_appointment p inner join tb_selected_services c on p.id = c.appointment_id";
// $sql="SELECT distinct p.name, p.date 
// FROM tb_appointment p 
// INNER JOIN tb_selected_services c 
// ON p.id = c.appointment_id";
// $sql = "SELECT * FROM client";
// // Step 3: Execute the query
// $result = mysqli_query($conn, $sql);
// $count = 0;
// // Step 4: Check if the query returned any results
// if (mysqli_num_rows($result) > 0) {
    // Step 5: Use a while loop to fetch each row of data
   
//     while ($row = mysqli_fetch_assoc($result)) {
//       $count = $count+1 ;
//       echo"<tr>
//       <th scope='row'>".$count."</th> 
//      <td>".$row['firstname']."</td>
//       <td>".$row['lastname']."</td>
//        <td>".$row['mobile']."</td>
//        <td>".$row['email']."</td>
//     </tr>";
//     }
// } else {
//     echo "No services found.";
// }
?>
  </tbody>
</table>
<div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">TOTAL REGISTRATIONS OF CUSTOMER</h3> -->
                <h5 class="m-0">TOTAL REGISTRATIONS OF CUSTOMER</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
               
                <thead style="background-color:rgb(51, 139, 139); color: white;">
                  <tr>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">S.no</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">name</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Mobile no</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Email</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Address</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
$sql = "SELECT * FROM users order BY id DESC";
$result = mysqli_query($conn, $sql);
$count = 0;
if (mysqli_num_rows($result) > 0) {
  // Step 5: Use a while loop to fetch each row of data
 
  while ($row = mysqli_fetch_assoc($result)) {
    $count = $count+1 ;
    echo"<tr>
    <th scope='row'>".$count."</th> 
   <td>".$row['name']."</td>
     <td>".$row['mobile']."</td>
     <td>".$row['email']."</td>
      <td>".$row['address']."</td>
  </tr>";
  }
} else {
  echo "No registration  found.";
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
<!-- <a href="/beauty_parlour_management_system/sign_up.php">Create a new account</a> -->
</body>
</html>
</main>
<?php
include('includes/footer.php');
?>

