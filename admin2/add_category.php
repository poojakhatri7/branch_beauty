<?php ob_start(); ?>
<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');

// Handle category form submission
$defaultImage = "user/assets/dist/img/dp.webp"; 
$uploadPath = $defaultImage; 
if (isset($_POST['add_category'])) {
  $photo = $_FILES["image"]["name"];
  $photo2 = $_FILES["image"]["tmp_name"];
  $uploadPath = "upload-images/" . $photo;
    $c_service = $_POST['c_service'];
    $c_description = $_POST['c_description'];
   move_uploaded_file($photo2, $uploadPath);
 // 1. Check for duplicate category
 $check_query = "SELECT * FROM category_service WHERE c_service = '$c_service'";
 $result = mysqli_query($conn, $check_query);

 if (mysqli_num_rows($result) > 0) {
     // Category already exists
    //  $error_message = "Category already exists!";
    header("Location: " . $_SERVER['PHP_SELF'] . "?error=1");
    exit();
 }  else { 
    $query = "INSERT INTO category_service (c_service, description ,file) VALUES ('$c_service', '$c_description','$uploadPath')";
    if (mysqli_query($conn, $query)) {
        // header("Location: ".$_SERVER['PHP_SELF']); // Redirect to the same page to prevent resubmission
        // exit();
        // $show_message = true;
          // header("Location: ".$_SERVER['PHP_SELF']); // Redirect to the same page to prevent resubmission
        // echo "<script>window.location.href='".$_SERVER['PHP_SELF']."';</script>";
        // echo "<script>window.location.href='" . $_SERVER['PHP_SELF'] . "?success=1';</script>";
        header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
        exit();
        // echo "Category added successfully!";
        // exit();
      
        
    } else {
        echo "Error: " . mysqli_error($conn);
    }
  }
 

}

$defaultImage = "user/assets/dist/img/dp.webp"; 
$uploadPath = $defaultImage; 
if (isset($_POST['add_sub_category'])) {
   $photo = $_FILES["sub_image"]["name"];
  $photo2 = $_FILES["sub_image"]["tmp_name"];
  $uploadPath = "upload-images/" . $photo;
    $s_name = $_POST['s_name'];
    $s_description = $_POST['s_description'];
    $c_id = $_POST['c_id']; // Selected category
    // $sub_image = $_POST['sub_image']; // Selected category
      move_uploaded_file($photo2, $uploadPath);

       $check_query1 = "SELECT * FROM sub_category_service WHERE s_name = '$s_name'";
 $result = mysqli_query($conn, $check_query1);
 if (mysqli_num_rows($result) > 0) {
     // Category already exists
    //  $error_message = "Category already exists!";
    header("Location: " . $_SERVER['PHP_SELF'] . "?error=1");
    exit();
 }
 else {
 
    $query = "INSERT INTO sub_category_service (s_name, description, sub_service , file ) VALUES ('$s_name', '$s_description', '$c_id','$uploadPath')";
    if(mysqli_query($conn, $query));
    {
        header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
        exit();
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
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <style type="text/css">
.add_category{
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
          <div class="col-sm-6">
            <!-- <h4 class="m-0">Repairing </h4> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/">Home</a></li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
 <div class="container-fluid">
<div class="card card-info">


<!-- Span for success message -->

              <div class="card-header"style="background-color: rgb(51, 139, 139);">
                <h3 style=" align-items: center" class="card-title">Add Category and Sub-Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method= "post" enctype="multipart/form-data">
                <div class="card-body">
                <span id="message" style="color: green; font-weight: 600; margin-bottom: 15px; display: inline-block;"></span>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> ADD CATEGORY</label>
                    <div class="col-sm-4">
                      <input type="text" name="c_service" class="form-control" id="add_category" placeholder="Category Name" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> DESCRIPTION </label>
                    <div class="col-sm-4">
                      <!-- <input type="text" name="c_description" class="form-control" id="inputPassword3" placeholder=" Description "> -->
                      <textarea name="c_description" class="form-control" id="descrption1" placeholder="Description" rows="4"></textarea>
                    </div>
                  </div>
                     <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> IMAGE </label>
                    <div class="col-sm-4">
                      <input type="file" name="image" class="form-control" id="add_category" placeholder="Add category image" required>
                    </div>
                  </div>
                  <!-- <button type="submit" name="add_category">Add Category</button> -->
                  <button type="submit" name="add_category" style="background-color: rgb(51, 139, 139); color: white; 
    border: none; padding: 10px 5px; font-size: 15px; cursor: pointer; border-radius: 7px; font-weight: 500">
    Add Category
</button>
</form>
<hr>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
   <span id="message" style="color: green; font-weight: 600; margin-bottom: 15px; display: inline-block;"></span>
    <?php 
    $category_result = mysqli_query($conn, "SELECT * FROM category_service"); 
    ?>
    <div class="form-group row">
        <label for="c_id" class="col-sm-2 col-form-label">SELECT</label>
        <div class="col-sm-4">
            <select name="c_id" id="c_id" class="form-control" required>
                <option value="">Select Category</option>
                <?php while ($row = mysqli_fetch_assoc($category_result)) { ?>
                    <option value="<?= $row['c_id'] ?>"><?= $row['c_service'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> ADD SUB CATEGORY</label>
                    <div class="col-sm-4">
                      <input type="text" name="s_name" class="form-control" id="sub" placeholder="Sub-Category-Name" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> DESCRIPTION </label>
                    <div class="col-sm-4">
                      <!-- <input type="text" name="s_description" class="form-control" id="inputPassword3" placeholder=" Description "> -->
                      <textarea name="s_description" class="form-control" id="description" placeholder="Description" rows="4"></textarea>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> IMAGE </label>
                    <div class="col-sm-4">
                      <input type="file" name="sub_image" class="form-control" id="add_sub_category" placeholder="Add sub category image" required>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <!-- <div class="card-footer"> -->
                <div class="card-footer">
                <button type="submit" name="add_sub_category" style="background-color: rgb(51, 139, 139); color: white; 
    border: none; padding: 10px 5px; font-size: 15px; cursor: pointer; border-radius: 7px; font-weight: 500">
    Add Sub Category
</button>
                </div>
                  <!-- <button type="submit" name="add_sub_category" class="btn" style="background-color: rgb(51, 139, 139); color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px;  padding: 7px 15px; ">Add Sub Category</button> -->
                  <!-- <button type="submit" class="btn btn-default float-right">Cancel</button> -->
                <!-- </div> -->
                <!-- /.card-footer -->
              </form>
            </div>
</div>
<div class="container-fluid">
    <!-- First Table: Delete Category -->
    <div class="card">
        <div class="card-header">
            <h5 class="m-0"> Delete Category </h5>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: rgb(51, 139, 139)">
                    <tr>
                        <th style="color: rgb(238, 230, 217); font-weight: 500;">S no.</th>
                        <th style="color: rgb(238, 230, 217); font-weight: 500;">Service</th>
                        <th style="color: rgb(238, 230, 217); font-weight: 500;">Description</th>
                         <th style="color: rgb(238, 230, 217); font-weight: 500;">Image</th>
                        <th style="color: rgb(238, 230, 217); font-weight: 500;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM category_service ORDER BY c_id DESC";
                    $result = mysqli_query($conn, $sql);
                    $count = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $imagePath = "../admin2/" .  $row['file'];
                            $count++;
                    ?>
                            <tr>
                                <th scope='row'><?php echo $count; ?></th>
                                <td><?php echo $row['c_service']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                 <td><img src="<?php echo $imagePath; ?>" alt="Image" style="width: 50px; height: 50px; object-fit: cover;"></td>
                                <td>
                                    <div style="display: inline-block;">
                                        <a href='delete_data?id=<?php echo $row["c_id"]; ?>&table=category_service'
                                          onclick="return confirm('Are you sure you want to delete this?')">
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

    <!-- Second Table: Delete Sub Category -->
    <div class="card">
        <div class="card-header">
            <h5 class="m-0"> Delete Sub Category </h5>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-striped">
                <thead style="background-color: rgb(51, 139, 139)">
                    <tr>
                        <th style="color: rgb(238, 230, 217); font-weight: 500;">S no.</th>
                        <th style="color: rgb(238, 230, 217); font-weight: 500;">Category</th>
                        <th style="color: rgb(238, 230, 217); font-weight: 500;">Sub Category</th>
                        <th style="color: rgb(238, 230, 217); font-weight: 500;"> Description</th>
                          <th style="color: rgb(238, 230, 217); font-weight: 500;"> Image</th>
                        <th style="color: rgb(238, 230, 217); font-weight: 500;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql2  = "SELECT * FROM category_service cc INNER JOIN sub_category_service ss ON
                    cc.c_id = ss.sub_service";
                    // $sql2 = "SELECT * FROM sub_category_service ORDER BY s_id DESC";
                    $result2 = mysqli_query($conn, $sql2);
                    $count2 = 0;
                    if (mysqli_num_rows($result2) > 0) {
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                             $imagePath = "../admin2/" . $row2['file'];
                            $count2++;
                    ?>
                            <tr>
                                <th scope='row'><?php echo $count2; ?></th>
                                <td><?php echo $row2['c_service']; ?></td>
                                <td><?php echo $row2['s_name']; ?></td>
                                <td><?php echo $row2['description']; ?></td>
                             <td><img src="<?php echo $imagePath; ?>" alt="Image" style="width: 50px; height: 50px; object-fit: cover;"></td>
                                <td>
                                    <div style="display: inline-block;">
                                        <a href='delete_data?id=<?php echo $row2["s_id"]; ?>&table=sub_category_service'
                                          onclick="return confirm('Are you sure you want to delete this?')">
                                            <i class='fa fa-trash' style='color: red;'></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center text-danger'>No Sub Category Found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- DataTable Scripts -->
  <!-- If $show_message is true, display the success message -->
  <script>
window.onload = function () {
    const params = new URLSearchParams(window.location.search);
    const messageEl = document.getElementById('message');

   if (params.get('success') === '1') {
    messageEl.style.color = "green";
    messageEl.innerHTML = "Category added successfully. You can add sub-category!";
    window.history.replaceState({}, document.title, window.location.pathname);

    setTimeout(() => {
        messageEl.innerHTML = "";
    }, 4000);
} else if (params.get('error') === '1') {
    messageEl.style.color = "red";
    messageEl.innerHTML = "Category already exists!";
    window.history.replaceState({}, document.title, window.location.pathname);

    setTimeout(() => {
        messageEl.innerHTML = "";
    }, 8000);
}
}
</script>
 <script>
window.onload = function () {
    const params = new URLSearchParams(window.location.search);
    const messageEl = document.getElementById('message');

   if (params.get('success') === '1') {
    messageEl.style.color = "green";
    messageEl.innerHTML = "Category added successfully. You can add sub-category!";
    window.history.replaceState({}, document.title, window.location.pathname);

    setTimeout(() => {
        messageEl.innerHTML = "";
    }, 3000);
} else if (params.get('error') === '1') {
    messageEl.style.color = "red";
    messageEl.innerHTML = "Category already exists!";
    window.history.replaceState({}, document.title, window.location.pathname);

    setTimeout(() => {
        messageEl.innerHTML = "";
    }, 5000);
}
}
</script>

  </body>

<?php
include('includes/footer.php');
?>