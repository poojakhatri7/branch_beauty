<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');
?>

<?php 
$error = '';
$success = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $old_password = mysqli_real_escape_string($conn, $_POST['old_password']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    
    // Fetch the current password from the database
     $email = $_SESSION['email'];
    $mobile = $_SESSION['mobile'];  // Assuming user is logged in and their ID is stored in session
    // $query = "SELECT password FROM admin_login_details WHERE mobile = '$mobile'";
    $query = "SELECT password FROM admin_login_details WHERE mobile = '$mobile' AND email = '$email'";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Check if the old password is correct
    if (($old_password==$row['password'])) {
        // Check if the new password and confirm password match
        if ($new_password === $confirm_password) {
            // Password validation (optional, can be customized as needed)
            if (strlen($new_password) >= 2) {  // Example: New password must be at least 6 characters long
                // Hash the new password before saving it
                // $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

                // Update the new password in the database
                // $update_query = "UPDATE admin_login_details SET password = '$new_password' WHERE mobile = '$mobile'";
                $update_query = "UPDATE admin_login_details SET password = '$new_password' WHERE mobile = '$mobile' AND email = '$email'";

                if (mysqli_query($conn, $update_query)) {
                    $success = "Password updated successfully!";
                } else {
                    $error = "Error updating password.";
                }
            } else {
                $error = "New password must be at least 2 characters long.";
            }
        } else {
            $error = "New password and confirm password do not match.";
        }
    } else {
        $error = "Old password is incorrect.";
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
.change_password{
  background :rgb(33, 70, 77) !important;
}
</style>
</head>
<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0">Manage Your Account</h5>
                    </div>
                </div>
            </div>
        </div>
      
        <div class="container-fluid">
            <div class="card card-info">
           
                <div class="card-header" style="background-color: rgb(51, 139, 139); color: white;">
               
                    <h3 class="card-title">Change Password </h3>
                </div>
                <form class="form-horizontal" action="" method="post">
                    <div class="card-body">
                        <div class="form-group row">
                        <br>
                        <?php if ($error): ?>
    <p style="color: red; font-weight:700"><?php echo $error; ?></p>
<?php endif; ?>
<?php if ($success): ?>
    <p style="color: green;font-weight:700;"><?php echo $success; ?></p>
<?php endif; ?>
                            <label for="mobile" class="col-sm-2 col-form-label">Old Password</label>
                            <div class="col-sm-4">
                                <input type="text" name="old_password" class="form-control" id="mobile" placeholder="Enter old password" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-4">
                                <input type="text" name="new_password" class="form-control" id="name" placeholder="Enter new password" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-4">
                                <input type="text" name="confirm_password" class="form-control" id="email" placeholder="Confirm password" >
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn" style="background-color:  rgb(51, 139, 139); color:  rgb(238, 230, 217);  font-weight: 500; font-size: 16px; padding: 7px 20px;">Reset Password</button>
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