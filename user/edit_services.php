<?php
include 'user_session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');

$id = $_GET ['id'];
if (isset($_POST["submit"])) {
    // Get the form data
   
    $service_name = $_POST["service_name"];
    $service_price = $_POST["service_price"];
    // SQL query to insert data
  //  $query = "UPDATE tb_services  SET  service_name='$service_name', service_price = '$service_price' WHERE id={$id}";
    $query = "UPDATE `tb_services` SET service_name='$service_name', service_price='$service_price' WHERE id=$id";
    // Execute the query and check for success
    if (mysqli_query($conn, $query)) {
        echo "<script> alert('SERVICE UPDATED SUCCESFULLY'); </script>";
    } else {
        echo "<script> alert('Something went wrong'); </script>";
    }
}
//$id = $_GET ['id'];
$sql = "SELECT * FROM tb_services WHERE id={$id}";
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
  <title>AdminLTE 3 | General Form Elements</title>

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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
<div class="card card-info">  
              <div class="card-header">
                <h3 style=" align-items: center" class="card-title">UPDATE SERVICES</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method= "post">
                <div class="card-body">
                  <!-- <div class="form-group row"> -->
                    <!-- <label for="inputEmail3" class="col-sm-2 col-form-label">S.NO</label> -->
                    <!-- <div class="col-sm-10">
                      <input type="text" name="id" class="form-control" id="inputEmail3" placeholder="ENTER SERIAL NUMBER " value = "<?php echo $row['id'] ?>">
                    </div> -->
                  
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">SERVICE NAME</label>
                    <div class="col-sm-10">
                      <input type="text" name="service_name" class="form-control" id="inputPassword3" placeholder="ENTER SERVICE NAME" value = "<?php echo $row['service_name'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">SERVICE PRICE</label>
                    <div class="col-sm-10">
                      <input type="text" name="service_price" class="form-control" id="inputPassword3" placeholder="ENTER NEW PRICE" value = "<?php echo $row['service_price'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-info">UPDATE</button>
                  <button type="submit" class="btn btn-default float-right">CANCEL</button>
                </div>
                <!-- /.card-footer -->
              </form>
              <?php     
              }
              }  ?>

            </div>
</div>
<?php

?>
</body>
</html>
<?php
include('includes/footer.php');
?>