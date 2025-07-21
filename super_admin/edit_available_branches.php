<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');

$id = $_GET ['id'];
if (isset($_POST["submit"])) {

  $branch_name = $_POST["branch_name"];
  $city = $_POST["city"];
  $email = $_POST["email"];
  $address = $_POST["address"];
  $branch_manager_name = $_POST["branch_manager_name"];
  $mobile = $_POST["mobile"];
  $query1 = "UPDATE `branch_details` SET branch_name ='$branch_name', city='$city', email='$email', address='$address', branch_manager_name='$branch_manager_name' WHERE id=$id";
if( mysqli_query($conn, $query1))
{
   echo"<script> alert('updated successfully')
     window.location.href='available_branches';
      </script>";
}
else {
   echo"<script> alert('error while updation')</script>";
}
}
$sql = "SELECT * FROM branch_details WHERE id={$id}";
// Step 3: Execute the query
$result = mysqli_query($conn, $sql);
// Step 4: Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
  // Step 5: Use a while loop to fetch each row of data
  while ($row = mysqli_fetch_assoc($result)) {
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style type="text/css">
        .edit_available_branches
        {
            background :rgb(33, 70, 77) !important;
        }
    </style>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">Dashboard</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/">Home</a></li> -->
              <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
                <div class="container-fluid">
            <div class="card card-info">
            <div class="card-header"style="background-color: rgb(51, 139, 139);">
                    <h3 class="card-title">Edit Branch Details</h3>
                </div>
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                    <div class="form-group row">          
                    <label for="mobile" class="col-sm-2 col-form-label">BRANCH NAME</label>
                    <div class="col-sm-6">
                        <input type="text" name="branch_name" class="form-control" id="branch_name" value = "<?php echo $row['branch_name'] ?>"  required>
                    </div>
                </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">CITY</label>
                            <div class="col-sm-6">
                                <input type="text" name="city" class="form-control" id="name"  value = "<?php echo $row['city'] ?>">
                            </div>
                        </div>
                <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">EMAIL </label>
                            <div class="col-sm-6">
                                <input type="email" name="email" class="form-control" id="email"  value = "<?php echo $row['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">ADDRESS</label>
                            <div class="col-sm-6">
                                <input type="text" name="address" class="form-control"   value = "<?php echo $row['address'] ?>">
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">BRANCH MANAGER NAME </label>
                            <div class="col-sm-6">
                                <input type="text" name="branch_manager_name" class="form-control"   value = "<?php echo $row['branch_manager_name'] ?>">
                            </div>
                        </div> -->
                          <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">MOBILE</label>
                            <div class="col-sm-6">
                                <input type="tel" name="mobile" class="form-control" 
                                  value = "<?php echo $row['mobile'] ?>">
                            </div>
                        </div>   
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn" style="background-color:rgb(51, 139, 139);  color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px;">Edit Branch Details</button>
                          
                        </div>
                    </div>
                </form>       
            </div>
        </div>
    </div>
                <!-- <div class="card-footer">
                  <button type="submit" name="submit1" class="btn" style="background-color:rgb(51, 139, 139);">UPDATE</button>
                  <button type="submit" class="btn btn-default float-right">CANCEL</button>
                </div> -->
                <!-- /.card-footer -->
              </form>
              <?php     
              }
              }  ?>

            </div>
</div>
</body>
</html>
<?php
include('includes/footer.php');
?>