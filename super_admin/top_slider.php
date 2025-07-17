<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');
$defaultImage = "../user/assets/dist/img/dp.webp"; 
$uploadPath = $defaultImage; 
if(isset($_POST["submit"])) {
  // echo "<pre>";
  // print_r($_FILES);
  // echo "</pre>";
  $mobile=   $_SESSION["mobile"];
  $photo = $_FILES["image"]["name"];
  $photo2 = $_FILES["image"]["tmp_name"];
  $uploadPath = "upload-images/" . $photo;
  $content = $_POST['content'];
  $buttonName = $_POST['buttonName'];
  $buttonLink = $_POST['buttonLink'];
  if (move_uploaded_file($photo2, $uploadPath)) {
      echo "Image uploaded successfully! <br>";
    //   $sql = "INSERT INTO banner_management (file) VALUES ('$uploadPath')";
    $sql = "INSERT INTO banner_management (file, content, buttonName, buttonLink) VALUES ('$uploadPath', '$content', '$buttonName', '$buttonLink')";
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
$email= $_SESSION["email"];
$mobile=   $_SESSION["mobile"];
$address=  $_SESSION["address"];
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
.top_slider {
  background :rgb(33, 70, 77) !important;
}
</style>
  </head>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <h4>Slider Section</h4>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">    
            <div class="col-md-6 mx-auto">
                <div class="card card-info">
              <div class="card-header"style="background-color: rgb(51, 139, 139);">
                <h3 class="card-title">Update Slider</h3>
              </div>
              <form name="form_1" method="post" enctype="multipart/form-data">
                <div class="card-body">
               
                <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                  <input type="text" name="content" class="form-control" id="name" placeholder="Enter content of the slider">
                </div>
              </div>

                  <div class="form-group row">
					
        			     <div  style="text-align: center; margin-top:-15px; " class="mb-3"><br>
                   <img src="<?php echo $uploadPath; ?>" width="90" height="90" class="img3" id="profile-img-tag" height="240" width="300">
                          </div>
						<div class="form-group row">
							<label for="photo" class="col-sm-2 col-form-label">Select Slider<span class="required"></span> 	</label>
              <div class="col-sm-10">
								<input type="file" name="image" id="profile-img" value="" class="form-control" required>
</div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Button</label>
                    <div class="col-sm-10">
                      <input type="text" name="buttonName" class="form-control" id="inputEmail3" placeholder="Button Name ">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Button Link</label>
                    <div class="col-sm-10">
                      <input type="text" name="buttonLink" class="form-control" id="inputEmail3" placeholder="Button Link">
                    </div>
                  </div>
                <div style="display: flex; justify-content: center;">   
                <button type="submit" name="submit" class="btn" style="background-color:  rgb(51, 139, 139); color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px; margin-top: 20px; ">Upload</button>
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
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Content</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Button Name</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Button Link</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">file</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Action</th>
                    <!-- <th>Actions</th> -->
                  </tr>
                  </thead>
                  <tbody>
                  <?php
$sql = "SELECT * FROM banner_management order BY id DESC";
$result = mysqli_query($conn, $sql);
$count = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
        $imagePath = "../admin2/" .$row['file'];
        ?>
        <tr>
            <th scope='row'><?php echo $count; ?></th>
            <td><?php echo $row['content']; ?></td>
            <td><?php echo $row['buttonName']; ?></td>
            <td><?php echo $row['buttonLink']; ?></td>
            <td><img src="<?php echo $imagePath; ?>" alt="Image" style="width: 50px; height: 50px; object-fit: cover;"></td>

<td>
    <div style="display: inline-block;">
        <a href='delete_data?id=<?php echo $row["id"]; ?>&table=banner_management'>
            <i class='fa fa-trash' style='color: red;'></i> <!-- Trash icon -->
        </a>
    </div>
</td>
        </tr>
        <?php
    }
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
<?php
include('includes/footer.php');
?>