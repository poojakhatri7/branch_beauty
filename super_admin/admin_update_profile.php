<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');

$defaultImage = "../user/assets/dist/img/dp.webp"; 
$uploadPath = $defaultImage; 
if (isset($_FILES['image'])) {
 
  $mobile=   $_SESSION["mobile"];
  $photo = $_FILES["image"]["name"];
  $photo2 = $_FILES["image"]["tmp_name"];
  $uploadPath = "upload-images/" . $photo;

  if (move_uploaded_file($photo2, $uploadPath)) {
      echo "Image uploaded successfully! <br>";
      // $sql = "INSERT INTO users (file) VALUES ('$uploadPath')";
      $sql = "UPDATE admin_login_details SET file = '$uploadPath' WHERE mobile = '$mobile'";
      if ($conn->query($sql) === TRUE) {
        echo "Image path saved to database!";
      } else {
          echo "Error saving to database: " . $conn->error;
      }
    } else {
      echo "Failed to upload image.";
  } 
}
 
$updated_name ='';
$name= $_SESSION["name"];
$email=$_SESSION["email"];
$mobile= $_SESSION["mobile"];
$address=$_SESSION["address"];

if(isset($_POST["submit1"])) {

  $updated_name = mysqli_real_escape_string($conn, $_POST["name"]);
  $updated_email = mysqli_real_escape_string($conn, $_POST["email"]);
  $mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);
  $updated_address = mysqli_real_escape_string($conn, $_POST["address"]);
  $gst_number = mysqli_real_escape_string($conn, $_POST["gst_number"]);
  $check_user = "SELECT * FROM admin_login_details WHERE mobile = '$mobile'";
  $result_user = mysqli_query($conn, $check_user);

  if(mysqli_num_rows($result_user) > 0) {
      // Update the user record (no success/error message)
      // $query2 = "UPDATE users 
      //            SET name='$updated_name', email='$updated_email', address='$updated_address',password='123' 
      //            WHERE mobile='$mobile'"; 
                 $query_admin = "UPDATE admin_login_details 
                 SET name='$updated_name', email='$updated_email' ,gst_number='$gst_number', address='$updated_address'
                 WHERE mobile='$mobile'";  
                 $result_admin = mysqli_query($conn, $query_admin);       
     if (mysqli_query($conn, $query_admin))
     {
      $_SESSION['name'] = $updated_name;
       $_SESSION['email'] = $updated_email;
        $_SESSION['address'] = $updated_address;
      echo"<script> alert('Updation successful') </script>";
     }
     else
     {
      echo "Error inserting record: " . mysqli_error($conn);
     }
  }
}
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
.update_profile{
  background :rgb(33, 70, 77) !important;
}
</style>
  </head>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <h4>Manage Your Account</h4>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">    
            <div class="col-md-4">
                <div class="card card-info">
              <div class="card-header"style="background-color: rgb(51, 139, 139);">
                <h3 class="card-title">User Profile Photo</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="form_1" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                  <?php
 $mobile = $_SESSION["mobile"];
        $sql = "SELECT * FROM admin_login_details WHERE mobile = '$mobile'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $imagePath = "../admin2/".$row['file'] ;
        $gst_number =$row['gst_number'];
        }
        ?>
					    <div class="col-12">
        			     <div  style="text-align: center; margin-top:-15px;"><br>
                   <img src="<?php echo  $imagePath; ?>" width="200" height="200" class="img3" id="profile-img-tag" height="240" width="300">
                          </div>
        			   </div>
					      <div class="col-12" align="center">
					          <br/>
						<div class="item form-group">
							<label for="photo">Select Photo<span class="required">*</span>
							</label>
							<div class="col-12 ">
								<input type="file" name="image" id="profile-img" value="" class="form-control">
                <button type="submit" name="submit" class="btn" style="background-color:  rgb(51, 139, 139); color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px; margin-top: 15px;">Upload</button>
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
            
             <div class="col-md-8">
                <div class="card card-info">
              <div class="card-header"style="background-color: rgb(51, 139, 139);">
                <h3 class="card-title">Update profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" name="form_2">
                <div class="card-body ">
                <div class="row">
                  <div class="col-md-6">
                       <lable>Mobile number</lable>
                      <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Enter mobile number"  value = "<?php echo $mobile ?>" readonly>
                  </div>
                  <!-- <div class="col-md-6">
                    <lable>Owner/Admin Name </lable>
                      <input type="text"   name="father_name" id="father_name"   value="">
                  </div> -->
                  <div class="col-md-6">
                      <lable>Name </lable>
                      <!-- <input type="text" name="mobile" value="" class="form-control"> -->
                      <input type="text" name="name" class="form-control" id="name" placeholder="Enter name"  value = "<?php echo $name ?>">
                  </div>
                  <div class="col-md-6">
                      <lable>Email ID. </lable>
                      <!-- <input type="email"  name="email" id="email"  value="" class="form-control" pattern=".+@.+"> -->
                      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value = "<?php echo $email ?>" >
                  </div>
                  <div class="col-md-6 form-group">
                      <lable>Address</lable>
                      <input type="text" name="address" class="form-control" id="address" placeholder="Enter address" value = "<?php echo $address ?>">
                      <!-- <textarea class="form-control"  name="full_add" id="full_add"   value=""></textarea> --> 
                  </div>
                  <div class="col-md-6 form-group">
                      <lable>GST Number</lable>
                      <input type="text" name="gst_number" class="form-control" id="address" placeholder="Enter address" value = "<?php echo $gst_number ?>">
                      <!-- <textarea class="form-control"  name="full_add" id="full_add"   value=""></textarea> --> 
                  </div>
                  <div class="card-footer">
                            <button type="submit" name="submit1" class="btn" style="background-color: rgb(51, 139, 139); color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px;">Save Details</button>
                            <!-- <button type="cancel" class="btn btn-danger float-right">Cancel</button> -->
                        </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <!--<button type="submit" name="update" class="btn btn-primary">Update</button>-->
                </div>
              </form>
            </div>
            </div>
            
          </div>
        </div>
     </section>
    
  </div>
<?php
include('includes/footer.php');
?>