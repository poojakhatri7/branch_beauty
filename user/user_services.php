<?php
include 'user_session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');
?>
<?php
$sql = "SELECT * FROM tb_services";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
.manage_services{
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
      
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
    <!-- <h4>MANAGE SERVICES</h4> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- <table class="table table-bordered">
  <thead style="background-color:rgb(23, 162, 184); color: white;">
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">SERVICE NAME</th>
      <th scope="col">SERVICE PRICE</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody> -->
  <?php
//   $sql = "SELECT * FROM tb_services";
// // Step 3: Execute the query
// $result = mysqli_query($conn, $sql);
// $count = 0;
// // Step 4: Check if the query returned any results
// if (mysqli_num_rows($result) > 0) {
//   $count = 0;
//     // Step 5: Use a while loop to fetch each row of data
//     while ($row = mysqli_fetch_assoc($result)) {
//       $count=$count +1;
//       echo"<tr>
//       <th scope='row'>".$count."</th>
//       <td>".$row['service_name']."</td>
//       <td>".$row['service_price']."</td>  
// <td> <a href='/beauty_parlour_management_system/admin2/edit_services.php?id={$row["id"]}'>
//   <button style='background-color:rgb(23, 162, 184); color: white; border: none; padding: 5px 10px; cursor: pointer;'>Edit</button>
// <a href='/beauty_parlour_management_system/admin2/delete_service.php?id={$row["id"]}'>
//  <button style='background-color: #f44336; color: white; border: none; padding: 5px 10px; cursor: pointer;'> Delete </button></td>
//     </tr>";
        // // Step 6: Display the data (ID, service name, price, and creation date)
        // echo "ID: " . $row['id'] . "<br>";
        // echo "Service Name: " . $row['service_name'] . "<br>";
        // echo "Service Price: $" . $row['service_price'] . "<br>";
        // echo "Creation Date: " . $row['creation_date'] . "<br><br>";
//     }
// } else {
//     echo "No services found.";
// }
// ?>
<!-- //   </tbody>
// </table>
// </div> -->
<div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">Appointment Details</h3> -->
                <h5 class="m-0"> SERVICES AVAILABLE</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: rgb(51, 139, 139) ">
                  <tr> 
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">S no.</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Service name</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Service Price </th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
  $sql = "SELECT * FROM tb_services";
// Step 3: Execute the query
$result = mysqli_query($conn, $sql);
$count = 0;
// Step 4: Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
  $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
      $count=$count +1;
      ?>
      <tr>
      <th scope='row'><?php echo $count; ?></th>
      <td><?php echo $row['service_name']; ?></td>
      <td><?php echo $row['service_price']; ?>
<!-- <td> <a href='/beauty_parlour_management_system/admin2/edit_services.php?id=<?php echo $row["id"]; ?>'>
  <button style='background-color:rgb(23, 162, 184); color: white; border: none; padding: 5px 10px; cursor: pointer;'>Edit</button>
<a href='/beauty_parlour_management_system/admin2/delete_service.php?id=<?php echo $row["id"]; ?>'>
 <button style='background-color: #f44336; color: white; border: none; padding: 5px 10px; cursor: pointer;'> Delete </button></td>
 <td> -->
  <!-- <td>
    <div style="display: inline-block; margin-right: 20px;">
        <a href='/beauty_parlour_management_system/admin2/edit_services.php?id=<?php echo $row["id"]; ?>'>
            <i class='fas fa-pencil-alt' style='color:rgb(18, 110, 40);'></i> Edit icon -->
        <!-- </a>  -->
    <!-- </div>
    <div style="display: inline-block;">
        <a href='/beauty_parlour_management_system/admin2/delete_service.php?id=<?php echo $row["id"]; ?>'>
            <i class='fa fa-trash' style='color: red;'></i> 
        </a>
    </div>
</td> -->
    </tr> 
        <?php
    }
} else {
    echo "No services found.";
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
<?php
include('includes/footer.php');
?>
