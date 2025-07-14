<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');

$defaultImage = "../user/assets/dist/img/dp.webp"; 
$uploadPath = $defaultImage; 

if (isset($_FILES['image'])) {
  // echo "<pre>";
  // print_r($_FILES);
  // echo "</pre>";
  $mobile=   $_SESSION["mobile"];
  $photo = $_FILES["image"]["name"];
  $photo2 = $_FILES["image"]["tmp_name"];
  $uploadPath = "upload-images/" . $photo;

  if (move_uploaded_file($photo2, $uploadPath)) {
      // echo "Image uploaded successfully! <br>";
      // $sql = "INSERT INTO users (file) VALUES ('$uploadPath')";
      // $sql = "UPDATE portfolio SET file = '$uploadPath' WHERE mobile = '$mobile'";
      $sql = "INSERT INTO portfolio (file) VALUES ('$uploadPath')";
      if ($conn->query($sql) === TRUE) {
        // echo "Image path saved to database!";
      } else {
          echo "Error saving to database: " . $conn->error;
      }
    } else {
      echo "Failed to upload image.";
  } 
}


$updated_name ='';
$name= $_SESSION["name"];
$email=  $_SESSION["email"];
$mobile=   $_SESSION["mobile"];
$address=  $_SESSION["address"];
// if(isset($_POST["submit1"])) {

//   $updated_name = mysqli_real_escape_string($conn, $_POST["name"]);
//   $updated_email = mysqli_real_escape_string($conn, $_POST["email"]);
//   $mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);
//   $updated_address = mysqli_real_escape_string($conn, $_POST["address"]);
//   $check_user = "SELECT * FROM users WHERE mobile = '$mobile'";
//   $result_user = mysqli_query($conn, $check_user);

//   if(mysqli_num_rows($result_user) > 0) {
//       // Update the user record (no success/error message)
//       $query2 = "UPDATE users 
//                  SET name='$updated_name', email='$updated_email', address='$updated_address',password='123' 
//                  WHERE mobile='$mobile'";          
//      if (mysqli_query($conn, $query2))
//      {
//       $_SESSION['name'] = $updated_name;
//       echo"<script> alert('Updation successful') </script>";
//      }
//      else
//      {
//       echo "Error inserting record: " . mysqli_error($conn);
//      }
//   }
// }
// ?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
.update_portfolio{
  background :rgb(33, 70, 77) !important;
}
</style>
  </head>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <h4>Gallery Section</h4>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">    
            <div class="col-md-4 mx-auto">
                <div class="card card-info">
              <div class="card-header"style="background-color: rgb(51, 139, 139);">
                <h3 class="card-title">Update Gallery</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="form_1" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
					    <div class="col-12">
        			     <div  style="text-align: center; margin-top:-15px;">
                    <br>
                   <!-- <img src="<?php echo $uploadPath; ?>" width="100" height="100" class="img3" id="profile-img-tag" height="240" width="300">
                          </div> -->
                          
        			   </div>
					      <div class="col-12" align="center">
					          <br/>
						<div class="item form-group">
							<label for="photo">Select Photo<span class="required">*</span>
							</label>
							<div class="col-12 ">
								<input type="file" name="image" id="profile-img" value="" class="form-control" required>
               
                <img id="preview-img" src="" alt="Image Preview" style="max-width: 200px; margin-top: 10px; display: none;" />
                <br>
                <button type="submit" name="submit" class="btn" style="background-color:  rgb(51, 139, 139); color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px;">Upload</button>
							</div>
						</div>
						 </div>
						</div> 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <!--<button type="submit" name="update_photo" class="btn btn-success">Update</button>-->
                </div>
              </form>
            </div>
            </div>
  </div>
  <div class="container-fluid">
<div class="card">
              <div class="card-header">
                <h5 class="m-0">  Update Gallery</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: rgb(51, 139, 139) ">
                  <tr>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">S no.</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Image</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Action</th>
                    <!-- <th>Actions</th> -->
                  </tr>
                  </thead>
                  <tbody>
                  <?php

$sql = "SELECT * FROM portfolio order BY id DESC";
$result = mysqli_query($conn, $sql);
$count = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
        $imagePath = "../admin2/" . $row['file'];
        ?>
        <tr>
            <th scope='row'><?php echo $count; ?></th>
            <td><img src="<?php echo $imagePath; ?>" alt="Image" style="width: 50px; height: 50px; object-fit: cover;"></td>

<td>
    <div style="display: inline-block;">
        <a href='delete_data?id=<?php echo $row["id"]; ?>&table=portfolio'>
            <i class='fa fa-trash' style='color: red;'></i> <!-- Trash icon -->
        </a>
    </div>
</td>
        </tr>
        <?php
    }
} 

?>

<script>
  document.getElementById('profile-img').addEventListener('change', function (event) {
    const file = event.target.files[0];

    if (file) {
      const reader = new FileReader();

      reader.onload = function (e) {
        const previewImg = document.getElementById('preview-img');
        previewImg.src = e.target.result;
        previewImg.style.display = 'block';
      };

      reader.readAsDataURL(file);
    }
  });
</script>

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
<?php
include('includes/footer.php');
?>