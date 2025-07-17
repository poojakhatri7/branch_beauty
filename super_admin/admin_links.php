<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');

// $defaultImage = "/beauty_parlour_management_system/user/assets/dist/img/dp.webp"; 
$uploadPath = ""; 
if(isset($_POST["submit"])) {
    $photo = $_FILES["image"]["name"];
    $photo2 = $_FILES["image"]["tmp_name"];
    $uploadPath = "upload-images/" . $photo;
    $mobile = $_POST['mobile'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    move_uploaded_file($photo2, $uploadPath);
       // Check if email already exists for another user (not same mobile)
    // $duplicate = mysqli_query($conn, "SELECT * FROM `admin_login_details` WHERE email = '$email' ");
    // if (mysqli_num_rows($duplicate) > 0) {
    //     echo "<script> alert('Already registered with this email ID'); window.location.href='{$_SERVER['PHP_SELF']}'; </script>";
    //     exit;
    // }
    // Check if email exists in admin_login_details
$duplicate_admin = mysqli_query($conn, "SELECT * FROM `admin_login_details` WHERE email = '$email'");

// Check if email exists in users table
$duplicate_user = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'");

if (mysqli_num_rows($duplicate_admin) > 0 || mysqli_num_rows($duplicate_user) > 0) {
    echo "<script> alert('Already registered with this email ID'); window.location.href='{$_SERVER['PHP_SELF']}'; </script>";
    exit;
}


    $check_user = "SELECT * FROM admin_login_details  WHERE mobile = '$mobile'";
    $result_user = mysqli_query($conn, $check_user);
  
    if(mysqli_num_rows($result_user) > 0) {
        // Update the user record (no success/error message)
        $query2 = "UPDATE admin_login_details 
                   SET name='$name', email='$email', address='$address',password='$password',role='$role'
                   WHERE mobile='$mobile'";
      if ( mysqli_query($conn, $query2))
      {
        echo"<script> alert('updated successfully') </script>";
       }
    } else {
        $query2 = "INSERT INTO admin_login_details (name , mobile , email, address , password , role , file )  values ('$name','$mobile','$email','$address','$password','$role','$uploadPath')";
        if ( mysqli_query($conn, $query2))
        {
            echo"<script> alert('New Staff added Successfully') </script>";
           }
    }
    echo "<script>window.location.href='".$_SERVER['PHP_SELF']."';</script>";
}
// if(mysqli_query($conn, $query1))
// {
//  echo"<script> alert('Appointment successful') </script>";
// } else {
//    echo "Error inserting record: " . mysqli_error($conn);
// }
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style type="text/css">
        .staff_details{
            /* background: #157daf !important; */
            background :rgb(33, 70, 77) !important;
        }
 
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Add jQuery -->

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0"></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card card-info">
            <div class="card-header"style="background-color: rgb(51, 139, 139);">
                    <h3 class="card-title">Add links details</h3>
                </div>
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                    <div class="form-group row">          
                    <label for="mobile" class="col-sm-2 col-form-label">FACEBOOK LINK</label>
                    <div class="col-sm-6">
                        <input type="text" name="facebook" class="form-control" id="mobile" placeholder="Enter facebook link here "  required>
                    </div>
                </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">TWITTER LINK</label>
                            <div class="col-sm-6">
                                <input type="text" name="twitter" class="form-control" id="name" placeholder="Enter twitter link here " >
                            </div>
                        </div>
                        <!-- <div class="form-group row">          
                    <label for="mobile" class="col-sm-2 col-form-label">MOBILE NUMBER</label>
                    <div class="col-sm-6">
                        <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Enter mobile number"  required>
                    </div>
                </div> -->
                <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">INSTAGRAM LINK</label>
                            <div class="col-sm-6">
                                <input type="text" name="Instagram" class="form-control" id="email" placeholder="Enter Instagram link here" >
                            </div>
                        </div>     
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn" style="background-color:rgb(51, 139, 139); color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px;">Update Links</button>
                            <button type="submit" class="btn btn-danger float-right">Cancel</button>
                        </div>
                    </div>
                </form>       
            </div>
        </div>
    </div>
<?php
include('includes/footer.php');
?>