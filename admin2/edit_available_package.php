<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');
?>
<?php

$id = $_GET ['id'];
// if (isset($_POST["submit"])) {
//   $mobile = $_POST["mobile"];
//   $name = $_POST["name"];
//   $email = $_POST["email"];
//   $address = $_POST["address"];
//   $password = $_POST["password"];
// }

//  ?>
 <?php
 $sql = "SELECT * FROM package WHERE id={$id}";
// Step 3: Execute the query
$result = mysqli_query($conn, $sql);
// Step 4: Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
  // Step 5: Use a while loop to fetch each row of data
  while ($row = mysqli_fetch_assoc($result)) {
// ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <title>AdminLTE 3 | General Form Elements</title>
  <style type="text/css">
        .staff_details{
         
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
                    <h3 class="card-title">Edit Package Details</h3>
                </div>
                <form class="form-horizontal" action="" method="post">
                    <div class="card-body">
                    <div class="form-group row">          
                    <label for="mobile" class="col-sm-2 col-form-label">PACKAGE NAME </label>
                    <div class="col-sm-6">
                        <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter mobile number" value = "<?php echo $row['package_name'] ?>"  required>
                    </div>
                </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">DESCRIPTION </label>
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value = "<?php echo $row['description'] ?>" >
                            </div>
                        </div>
                        <!-- <div class="form-group row">          
                    <label for="mobile" class="col-sm-2 col-form-label">MOBILE NUMBER</label>
                    <div class="col-sm-6">
                        <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Enter mobile number"  required>
                    </div>
                </div> -->
                <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">PRICE</label>
                            <div class="col-sm-6">
                                <input type="number" name="email" class="form-control" id="email" placeholder="Enter price" value = "<?php echo $row['price'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">DISCOUNT</label>
                            <div class="col-sm-6">
                                <input type="text" name="address" class="form-control" id="address" placeholder="Enter address" value = "<?php echo $row['discount'] ?>" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">PRICE AFTER DISCOUNT</label>
                            <div class="col-sm-6">
                                <input type="text" name="password" class="form-control" id="address" placeholder="Enter Password" value = "<?php echo $row['price_after_discount'] ?>">
                            </div>
                            
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn" style="background-color:rgb(51, 139, 139);  color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px;">Edit Package Details</button>
                            <button type="submit" class="btn btn-danger float-right">Cancel</button>
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