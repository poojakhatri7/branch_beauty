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
    $check_branch = mysqli_query($conn, "SELECT * FROM admin_login_details WHERE branch_details_id = '$branch_id'   AND role = 1");
    if (mysqli_num_rows($check_branch) > 0) {
        echo "<script>alert('This branch already has an assigned admin.');</script>";
    } else {
        // Check for duplicate mobile or email
        $duplicate = mysqli_query($conn, "SELECT * FROM admin_login_details WHERE mobile = '$mobile' OR email = '$email'  AND role = 1");
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
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Add jQuery -->
    <style type="text/css">
        .assign_branch_manager{
            /* background: #157daf !important; */
            background :rgb(33, 70, 77) !important;
        }
 
    </style>
</head>
<body>
  

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
                                <input type="tel" name="mobile" class="form-control" id="address" placeholder="Enter Mobile Number" pattern="[0-9]{10}" maxlength="10" minlength="10" required>
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

  <div class="container-fluid">
    <!-- <h2 style="text-align: center;">Apointment History</h2> -->
  <div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">Appointment Details</h3> -->
                <h5 class="m-0"> Admin Details </h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color:rgb(51, 139, 139);">
                  <tr>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">S no.</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Branch Name</th>
                     <th style="color: rgb(238, 230, 217); font-weight: 500;">Branch Manager (Admin)</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Mobile</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Email</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Address</th>
                   <th style="color: rgb(238, 230, 217); font-weight: 500;">Password</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  <?php
// $sql = "SELECT * FROM admin_login_details where role = 1 ";
// $sql ="SELECT 
//     ald.id AS branch_id,
//     ald.branch_name,
//     ald.email,
//      ald.address,
//        ald.mobile,
//     ald.name AS admin_name
// FROM admin_login_details ald
// LEFT JOIN branch_details bd
//     ON  ald.branch_details_id = bd.id WHERE ald.role = 1; ";

$sql="
SELECT 
    ald.id AS admin_id,
    ald.name AS admin_name,
    ald.email,
    ald.address,
    ald.mobile,
     ald.password,
    bd.branch_name,
    bd.city,
    bd.id AS branch_id
FROM admin_login_details ald
JOIN branch_details bd 
    ON ald.branch_details_id = bd.id
WHERE ald.role = 1
";

$result = mysqli_query($conn, $sql);
$count = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
         
        ?>
        <tr>
            <th scope='row'><?php echo $count; ?></th>
            <td><?php echo $row['branch_name']; ?></td>
      <td><?php echo $row['admin_name']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['address']; ?></td>
              <td><?php echo $row['password']; ?></td>
             
            <td>
    <div style="display: inline-block; margin-right: 20px;">
        <a href='edit_admin_details?id=<?php echo $row["admin_id"]; ?>'>
            <i class='fas fa-pencil-alt' style='color:rgb(10, 90, 34);'></i> <!-- Edit icon -->
        </a> 
    </div>
    <!-- <div style="display: inline-block;">
        <a href='delete_data?id=<?php echo $row["admin_id"]; ?>&table=admin_login_details'>
            <i class='fa fa-trash' style='color: red;'></i>
        </a>
    </div> -->
</td>
        </tr>
        <?php
    }
} 
 else {
    echo "No Details found.";
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