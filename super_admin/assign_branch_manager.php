<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');

if(isset($_POST["submit"])) 
 {
    $name = $_POST['branch_manager_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $branch_id = $_POST['branch_id'];
    $role = 1;

    // Fetch branch name using ID
    $query = "SELECT branch_name FROM branch_details WHERE id = '$branch_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $branch_name = $row['branch_name'];

    // Check if this branch already has an admin
    $check_branch = mysqli_query($conn, "SELECT * FROM admin_login_details WHERE branch_details_id = '$branch_id'");
    if (mysqli_num_rows($check_branch) > 0) {
        echo "<script>alert('This branch already has an assigned admin.');</script>";
    } else {
        // Check for duplicate mobile or email
        $duplicate = mysqli_query($conn, "SELECT * FROM admin_login_details WHERE mobile = '$mobile' OR email = '$email'");
        if (mysqli_num_rows($duplicate) > 0) {
            $row = mysqli_fetch_assoc($duplicate);
            if ($row['mobile'] == $mobile) {
                echo "<script>alert('Already registered with this Mobile number');</script>";
            } elseif ($row['email'] == $email) {
                echo "<script>alert('Already registered with this Email ID');</script>";
            }
        } else {
            // Insert new admin
            $query = "INSERT INTO admin_login_details 
                (branch_details_id, branch_name, name, mobile, email, address, password, role)
                VALUES ('$branch_id', '$branch_name', '$name', '$mobile', '$email', '$address', '$password', '$role')";
            
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Manager assigned successfully');</script>";
            } else {
                echo "<script>alert('Manager already present in this branch');</script>";
            }
        }
    }
}

 

?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style type="text/css">
        .assign_branch_manager{
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
                    <h3 class="card-title">Add Branch Manager (Admin)</h3>
                </div>
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                         <div class="form-group row">
                <?php 
                  $staff_result = mysqli_query($conn, "SELECT * FROM branch_details"); 
                ?>
                <label for="id" class="col-sm-2 col-form-label">SELECT BRANCH NAME</label>
                <div class="col-sm-10">
                  <select name="branch_id" id="id" class="form-control" required>
                    <option  value="" selected disabled>Select Branch</option>
                    <?php while ($row = mysqli_fetch_assoc($staff_result)) { ?>
                      <option value="<?= $row['id'] ?>"><?= $row['branch_name'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              
                   <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">BRANCH MANAGER NAME (ADMIN)</label>
                            <div class="col-sm-6">
                                <input type="text" name="branch_manager_name" class="form-control" id="address" placeholder="Enter Branch Manager Name " required>
                            </div>
                        </div>
                           <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">MOBILE</label>
                            <div class="col-sm-6">
                                <input type="tel" name="mobile" class="form-control" id="address" placeholder="Enter Mobile Number" required>
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">EMAIL </label>
                            <div class="col-sm-6">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required>
                            </div>
                        </div>
                             <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">ADDRESS</label>
                            <div class="col-sm-6">
                                <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">PASSWORD</label>
                            <div class="col-sm-6">
                                <input type="text" name="password" class="form-control" id="name" placeholder="Enter Password" required>
                            </div>
                        </div>
                        <!-- <div class="form-group row">          
                    <label for="mobile" class="col-sm-2 col-form-label">MOBILE NUMBER</label>
                    <div class="col-sm-6">
                        <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Enter mobile number"  required>
                    </div>
                </div> -->
              
                   
                        
                        
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn" style="background-color:rgb(51, 139, 139); color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px;">Add Branch Manager</button>
                            <button type="reset" class="btn btn-danger float-right">Cancel</button>
                        </div>
                    </div>
                </form>       
            </div>
        </div>
    </div>
<?php
include('includes/footer.php');
?>