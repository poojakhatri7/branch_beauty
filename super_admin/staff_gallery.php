<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');

if (isset($_POST['submit1'])) {
  $add_designation = $_POST['add_designation'];
  $query = "INSERT INTO staff_designation (designation ) VALUES ( '$add_designation')";
  if (mysqli_query($conn, $query)) {
      // header("Location: ".$_SERVER['PHP_SELF']); // Redirect to the same page to prevent resubmission
      // exit();
      echo "<script>window.location.href='".$_SERVER['PHP_SELF']."';</script>";
      echo "Category added successfully!";
  } else {
      echo "Error: " . mysqli_error($conn);
  }
}
?>
<?php
$defaultImage = "../user/assets/dist/img/dp.webp"; 
$uploadPath = $defaultImage; 
// if (isset($_POST['submit']) && isset($_FILES['image']) && isset($_POST['designation']) && isset($_POST['name'])) {
if ( isset($_FILES['image']) && isset($_POST['staff_id'] ) && isset($_POST['name'])) {
 
  $mobile=   $_SESSION["mobile"];
  $photo = $_FILES["image"]["name"];
  $photo2 = $_FILES["image"]["tmp_name"];
  $uploadPath = "upload-images/" . $photo;
  $staff_designation_id = $_POST['staff_id'];
  $name = $_POST['name'];
  $bios = $_POST['bios'];
  $experience = $_POST['experience'];
  $availability = $_POST['availability'];
  if (move_uploaded_file($photo2, $uploadPath)) {
    
      // $sql = "INSERT INTO users (file) VALUES ('$uploadPath')";
      // $sql = "UPDATE portfolio SET file = '$uploadPath' WHERE mobile = '$mobile'";
    //   $sql = "INSERT INTO staff_gallery (file) VALUES ('$uploadPath')";
    // $sql = "INSERT INTO staff_gallery (file, designation) VALUES ('$uploadPath', '$designation')";
    $sql = "INSERT INTO staff_gallery (name, file ,  staff_designation_id , Short_bio , Experience , Availability) VALUES ('$name', '$uploadPath', '$staff_designation_id' , '$bios', '$experience' ,'$availability' )";
      if ($conn->query($sql) === TRUE) {
        // echo "Image path saved to database!";
      } else {
          echo "Error saving to database: " . $conn->error;
      }
    } else {
      echo "Failed to upload image.";
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
.update_staff{
  background :rgb(33, 70, 77) !important;
}
</style>
  </head>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <h4>Update Staff Gallery</h4> -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
  <div class="container-fluid">
    <div class="row">    
      <div class="col-md-10 ">
        <div class="card card-info">
          <div class="card-header" style="background-color: rgb(51, 139, 139);">
            <h3 class="card-title"> Update Staff Gallery</h3>
          </div>
          <!-- /.card-header -->

          <div class="card-body">
            <!-- First Form: Add Designation -->
            <form class="form-horizontal" action="" method="post">
              <div class="row align-items-center">
                <label for="name" class="col-sm-2 col-form-label">Add Designation</label>
                
                <div class="col-sm-6">
                  <input type="text" name="add_designation" class="form-control" id="name" placeholder="Add new designation" required>
                </div>
                
                <div class="col-sm-4">
                  <button type="submit" name="submit1" class="btn" style="background-color: rgb(51, 139, 139); color: rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px;">Add</button>
                </div>
              </div>
            </form>
            <hr>

            <!-- Second Form: Upload Photo & Select Designation -->
             
            <form name="form_1" method="post" enctype="multipart/form-data">
              
              <div class="form-group row">
                <?php 
                  $staff_result = mysqli_query($conn, "SELECT * FROM staff_designation"); 
                ?>
                <label for="id" class="col-sm-2 col-form-label">Designation</label>
                <div class="col-sm-10">
                  <select name="staff_id" id="id" class="form-control" required>
                    <option value="">Select</option>
                    <?php while ($row = mysqli_fetch_assoc($staff_result)) { ?>
                      <option value="<?= $row['id'] ?>"><?= $row['designation'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required>
                </div>
              </div>
               <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Bios</label>
                <div class="col-sm-10">
                  <input type="text" name="bios" class="form-control" id="name" placeholder="Write short bios" required>
                </div>
              </div>
               <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Experience</label>
                <div class="col-sm-10">
                  <input type="text" name="experience" class="form-control" id="name" placeholder="Write experience in years" required>
                </div>
              </div>
               <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Availability</label>
                <div class="col-sm-10">
                  <input type="text" name="availability" class="form-control" id="name" placeholder="Enter time of availability">
                </div>
              </div>

              <div style="text-align: center; margin-top: -15px;"><br>
                <img src="<?php echo $uploadPath; ?>" width="100" height="100" class="img3" id="profile-img-tag">
              </div>

              <div class="col-12 text-center mt-3">
                <label for="photo">Select Photo <span class="required"></span></label>
                <input type="file" name="image" id="profile-img" class="form-control" required>
                <br>
                <button type="submit" name="submit" class="btn" style="background-color: rgb(51, 139, 139); color: rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px;">Upload</button>
              </div>
            </form>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <!--<button type="submit" name="update_photo" class="btn btn-success">Update</button>-->
          </div>
        </div> <!-- Closing .card.card-info -->
      </div> <!-- Closing .col-md-10 -->
    </div> <!-- Closing .row -->
    </div>
            <div class="card">
        <div class="card-header">
            <h5 class="m-0"> Delete Designation  </h5>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: rgb(51, 139, 139)">
                    <tr>
                        <th style="color: rgb(238, 230, 217); font-weight: 500;">S no.</th>
                        <th style="color: rgb(238, 230, 217); font-weight: 500;">Staff Designation</th>
                        <th style="color: rgb(238, 230, 217); font-weight: 500;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM staff_designation ";
                    $result = mysqli_query($conn, $sql);
                    $count = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $count++;
                    ?>
                            <tr>
                                <th scope='row'><?php echo $count; ?></th>
                               
                                <td><?php echo $row['designation']; ?></td>
                                <td>
                                    <div style="display: inline-block;">
                                        <a href='delete_data?id=<?php echo $row["id"]; ?>&table=staff_designation'>
                                            <i class='fa fa-trash' style='color: red;'></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center text-danger'>No Category Found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            
        </div>
        <div class="card">
        <div class="card-header">
            <h5 class="m-0">Delete Staff Gallery</h5>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: rgb(51, 139, 139)">
                    <tr>
                        <th style="color: rgb(238, 230, 217); font-weight: 500;">S no.</th>
                        <th style="color: rgb(238, 230, 217); font-weight: 500;">Name</th>
                        <th style="color: rgb(238, 230, 217); font-weight: 500;">Designation</th>
                        <!-- <th style="color: rgb(238, 230, 217); font-weight: 500;">Image</th> -->
                        <th style="color: rgb(238, 230, 217); font-weight: 500;">Image</th>
                        <th style="color: rgb(238, 230, 217); font-weight: 500;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // $sql = "SELECT * FROM staff_designation ";
                    $sql = "SELECT sg.id, sg.name, sd.designation, sg.file
        FROM staff_gallery sg
        JOIN staff_designation sd ON sg.staff_designation_id = sd.id";
                    $result = mysqli_query($conn, $sql);
                    $count = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                          $image = "../admin2/" . $row['file'];
                            $count++;
                    ?>
                            <tr>
                                <th scope='row'><?php echo $count; ?></th>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['designation']; ?></td>
                             
                                <td><img src="<?php echo $image; ?>" alt="Image" style="width: 50px; height: 50px; object-fit: cover;"></td>
                                <td>
                                    <div style="display: inline-block;">
                                        <a href='delete_data?id=<?php echo $row["id"]; ?>&table=staff_gallery'>
                                            <i class='fa fa-trash' style='color: red;'></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center text-danger'>No Category Found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
    </div>
            </div>

          </div>
        </div>
   
    
  </div>
    
  </div> <!-- Closing .container-fluid -->
</section> <!-- Closing .content -->


          
  
<?php
include('includes/footer.php');
?>