<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');
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
.staff{
  background :rgb(33, 70, 77)!important;
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
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 
     <div class="container-fluid">
    <!-- <h2 style="text-align: center;">Apointment History</h2> -->
  <div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">Appointment Details</h3> -->
                <h5 class="m-0"> Staff  Details </h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color:rgb(51, 139, 139);">
                  <tr>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">S no.</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Branch Name </th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Name</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Mobile </th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Email</th>
                       <th style="color: rgb(238, 230, 217); font-weight: 500;">Role</th>
                         <th style="color: rgb(238, 230, 217); font-weight: 500;">IMAGE</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Address</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Action</th>
                  </tr>
                  </thead>
                  <tbody>

              
                  <?php
// $sql = "SELECT * FROM admin_login_details ";
$sql = "SELECT 
    ad.*, 
    bd.branch_name 
FROM 
    admin_login_details ad
JOIN 
    branch_details bd 
ON 
    ad.branch_details_id = bd.id where role = 2 
ORDER BY 
    ad.id DESC ";
$result = mysqli_query($conn, $sql);
$count = 0;
$staff_role = "";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
          $imagePath = "../admin2/" . $row['file'];
        ?>
        <tr>
            <th scope='row'><?php echo $count; ?></th>
             <td><?php echo $row['branch_name']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><?php echo $row['email']; ?></td>
            
            <?php
             if ($row['role'] == 1) 
             {
              $staff_role = "Admin";
             }
              else 
             {
               $staff_role = "Staff Member";
             }
             ?>
             <td> <?php echo  $staff_role ?></td>
               <td><img src="<?php echo $imagePath; ?>" alt="Image" style="width: 50px; height: 50px; object-fit: cover;"></td>
            <td><?php echo $row['address']; ?></td>
            <td>
    <div style="display: inline-block; margin-right: 20px;">
        <a href='edit_staff_details?id=<?php echo $row["id"]; ?>'>
            <i class='fas fa-pencil-alt' style='color:rgb(10, 90, 34);'></i> <!-- Edit icon -->
        </a> 
    </div>
    <div style="display: inline-block;">
        <a href='delete_data?id=<?php echo $row["id"]; ?>&table=admin_login_details'>
            <i class='fa fa-trash' style='color: red;'></i> <!-- Trash icon -->
        </a>
    </div>
</td>
        </tr>
        <?php
    }
} 
 else {
    echo "No Details found.";
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