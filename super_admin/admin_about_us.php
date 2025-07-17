<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');

if (isset($_FILES['image'])) {

  $photo = $_FILES["image"]["name"];
  $photo2 = $_FILES["image"]["tmp_name"];
  $uploadPath = "upload-images/" . $photo;

  if (move_uploaded_file($photo2, $uploadPath)) {
      // echo "Image uploaded successfully! <br>";
      // $sql = "INSERT INTO users (file) VALUES ('$uploadPath')";
      $sql = "UPDATE tb_about_us SET file1 = '$uploadPath' WHERE id = 1";
      if ($conn->query($sql) === TRUE) {
        echo "Image ";
      } else {
          echo "Error saving to database: " . $conn->error;
      }
    } else {
      echo "Failed to upload image.";
  } 
  // header("Location: " . $_SERVER['PHP_SELF']); 
  echo "<script>window.location.href='" . $_SERVER['PHP_SELF'] . "';</script>";
}
 ?>
 <?php

if (isset($_FILES['image1'])) {
 
  $photo = $_FILES["image1"]["name"];
  $photo2 = $_FILES["image1"]["tmp_name"];
  $uploadPath = "upload-images/" . $photo;

  if (move_uploaded_file($photo2, $uploadPath)) {
      // echo "Image uploaded successfully! <br>";
      // $sql = "INSERT INTO users (file) VALUES ('$uploadPath')";
      $sql = "UPDATE tb_about_us SET file2 = '$uploadPath' WHERE id = 1";
      if ($conn->query($sql) === TRUE) {
        echo "Image ";
      } else {
          echo "Error saving to database: " . $conn->error;
      }
    } else {
      echo "Failed to upload image.";
  } 
  // header("Location: " . $_SERVER['PHP_SELF']); 
  echo "<script>window.location.href='" . $_SERVER['PHP_SELF'] . "';</script>";
}

 ?>
<?php

if (isset($_POST['submit'])) {
    // Get the form data
    // $page_title = $_POST['page_title'];  // 'page_title' is used for title input
    // $page_description = $_POST['page_description'];  // 'page_description' is used for description input
    $page_title = mysqli_real_escape_string($conn, $_POST['page_title']);
    $heading = mysqli_real_escape_string($conn, $_POST['heading']);
    $text_area = mysqli_real_escape_string($conn, $_POST['text_area']);
   
    // SQL query to update the data (Not safe - vulnerable to SQL injection)
    $query = "UPDATE tb_about_us SET page_title = '$page_title', heading = '$heading', text_area = '$text_area' WHERE id = 1";
    mysqli_query($conn,$query);
    echo"<script> alert('updated successful') </script>";
    // Execute the query directly
    // if ($conn->query($sql) === TRUE) {
    //     echo "Data updated successfully!";
    // } else {
    //     echo "Error updating data: " . $conn->error;
    // }
    echo "<script>window.location.href='" . $_SERVER['PHP_SELF'] . "';</script>";
}
?>
<html lang="en"> 
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
   <script src = "ckeditor/ckeditor.js"> </script>
  <!-- <script src="admin2/ckeditor/ckeditor.js"></script>  -->
  <!-- <script src="http://localhost/beauty_parlour_management_system/admin2/ckeditor/ckeditor.js"></script> -->
  <style type="text/css">
.about_us{
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
          <h4>About Us</h4>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
    <div class="container-fluid">

<div class="card card-info">
    <div class="card-header" style="background-color: rgb(51, 139, 139);">
        <h3 class="card-title">Update Image </h3>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label for="image1" class="col-sm-2 col-form-label"> IMAGE-1</label>
                <div class="col-sm-10">
                    <input type="file" name="image" id="image1" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="image2" class="col-sm-2 col-form-label"> IMAGE-2</label>
                <div class="col-sm-10">
                    <input type="file" name="image1" id="image2" class="form-control">
                </div>
            </div>
        </div>
        <!-- /.card-body -->

         <div class="card-footer">
            <button type="submit" name="submit1" class="btn" style="background-color:rgb(51, 139, 139);color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 15px;">Update Images</button>
            <button type="reset" class="btn btn-danger float-right">Cancel</button>
        </div>
        <!-- /.card-footer  -->
    </form>
</div>
<div class="card card-info">
    <div class="card-header" style="background-color: rgb(51, 139, 139);">
        <h3 class="card-title">UPDATE ABOUT US</h3>
    </div>
    <!-- /.card-header -->
    <?php

$sql = "SELECT * FROM tb_about_us WHERE id = 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
       
        $title = $row['page_title'];
        $heading = $row['heading'];
        $text_area = $row['text_area'];

        ?>

    <!-- form start -->
    <form class="form-horizontal" action="" method="post">
        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">PAGE TITLE</label>
                <div class="col-sm-10">
                    <input type="text" name="page_title" class="form-control" id="inputEmail3" placeholder="Enter Page Title" value = "<?php echo $title  ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">HEADING</label>
                <div class="col-sm-10">
                    <input type="text" name="heading" class="form-control" id="inputEmail3" placeholder="Enter Heading of the Description" value = "<?php echo $heading ?>" >
                </div>
            </div>
        

            <div class="form-group row">
                <label for="editor1" class="col-sm-2 col-form-label">PAGE DESCRIPTION</label>
                <div class="col-sm-10">
                    <!-- <textarea name="text_area" id="editor1" class="form-control" placeholder="ENTER PAGE DESCRIPTION" value = "<?php echo $text_area ?>"></textarea> -->
                    <textarea name="text_area" id="editor1" class="form-control" placeholder="ENTER PAGE DESCRIPTION"><?php echo htmlspecialchars($text_area); ?></textarea>

                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="submit" class="btn" style="background-color:rgb(51, 139, 139); color:  rgb(238, 230, 217);font-weight: 500; font-size: 16px; padding: 7px 15px;">Update</button>
            <button type="reset" class="btn btn-danger float-right">Cancel</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>


<script> CKEDITOR.replace('editor1');</script>
<?php }} ?>
</body>
</html>
<?php
include('includes/footer.php');
?>





