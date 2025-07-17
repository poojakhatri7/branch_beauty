<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');

if(isset($_POST["submit"])) {
 
    $branch_name = $_POST['branch_name'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $branch_manager_name = $_POST['branch_manager_name'];
    $mobile = $_POST['mobile'];

  $query1 = "INSERT INTO branch_details values ('','$branch_name','$city','$email','$address','$branch_manager_name','$mobile')";
     if(mysqli_query($conn, $query1))
     {
        echo "<script>
        alert('Branch added successful');
   
          window.location.href='available_branches';
    </script>";
  
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
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
        .add_new_branch{
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
                    <h3 class="card-title">Add New Branch</h3>
                </div>
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                    <div class="form-group row">          
                    <label for="branch_name" class="col-sm-2 col-form-label">BRANCH NAME </label>
                    <div class="col-sm-6">
                        <input type="text" name="branch_name" class="form-control" id="mobile" placeholder="Enter branch name" required> 
                    </div>
                </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">CITY</label>
                            <div class="col-sm-6">
                                <input type="text" name="city" class="form-control" id="name" placeholder="Enter city of the branch" required>
                            </div>
                        </div>
                        <!-- <div class="form-group row">          
                    <label for="mobile" class="col-sm-2 col-form-label">MOBILE NUMBER</label>
                    <div class="col-sm-6">
                        <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Enter mobile number"  required>
                    </div>
                </div> -->
                <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">EMAIL </label>
                            <div class="col-sm-6">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">ADDRESS</label>
                            <div class="col-sm-6">
                                <input type="text" name="address" class="form-control" id="address" placeholder="Enter address" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">BRANCH MANAGER NAME</label>
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
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn" style="background-color:rgb(51, 139, 139); color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px;">Add New Branch</button>
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