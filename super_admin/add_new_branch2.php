<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');

if(isset($_POST["submit"])) {
  $branch_name = mysqli_real_escape_string($conn, $_POST["branch_name"]);
  $branch_city = mysqli_real_escape_string($conn, $_POST["branch_city"]);
  $branch_email = mysqli_real_escape_string($conn, $_POST["branch_email"]);
  $branch_mobile = mysqli_real_escape_string($conn, $_POST["branch_mobile"]);
  $branch_address = mysqli_real_escape_string($conn, $_POST["branch_address"]);
  $manager_name = mysqli_real_escape_string($conn, $_POST["manager_name"]);
  $owner_mobile = mysqli_real_escape_string($conn, $_POST["owner_mobile"]);
$owner_email = mysqli_real_escape_string($conn, $_POST["owner_email"]);
$owner_address = mysqli_real_escape_string($conn, $_POST["owner_address"]);
$role = 1;
$password =1234;
$branch_status = "Active";
// Step 1: Insert manager into admin_login_details
$sql1 = "INSERT INTO admin_login_details (name, branch_details_id, mobile, email, address, password , role) 
         VALUES ('$manager_name', 1 ,'$owner_mobile ','$owner_email','$owner_address','$password', $role )";
mysqli_query($conn, $sql1);

// Get the last inserted manager ID
$manager_id = mysqli_insert_id($conn);

    $query1 = "INSERT INTO branch_details values ('','$branch_status','$manager_id', '$branch_name','$branch_city','$branch_email','$branch_address','$branch_mobile')";
     mysqli_query($conn, $query1);

// Step 3: Get new branch ID
$branch_id = mysqli_insert_id($conn);

// ✅ Step 4: Update the manager’s branch_id
$sql3 = "UPDATE admin_login_details SET branch_details_id = $branch_id WHERE id = $manager_id";
 if(mysqli_query($conn, $sql3))

     {
        echo "<script>
        alert('Branch successfully created and manager is assigned');
       
            window.location.href='add_new_branch2';
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
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .add_new_branch{
            /* background: #157daf !important; */
            background :rgb(33, 70, 77) !important;
        }
        #error-message {
    color: red;
    font-weight: bold;
    margin-top: 10px;
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
          
                    <h3 class="card-title">ADD NEW BRANCH</h3>
                </div>
                <form class="form-horizontal" action="" method="post" onsubmit="return validateMobile();">
            
    <div class="card-body">
 

        <div class="row">
     
            <!-- Left Column -->
            <div class="col-md-6">
   
              <div class="text-center mt-2 mb-4">
      <h4 class="m-0">BRANCH DETAILS</h4>
    </div>
        <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label">BRANCH NAME</label>
                    <div class="col-sm-8">
                        <input type="text" name="branch_name"  pattern="[A-Za-z\s]+" class="form-control" id="name" placeholder="Enter branch name" required>
                    </div>
                </div>
             
                
                      <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label">CITY</label>
                    <div class="col-sm-8">
                        <input type="text" name="branch_city"  pattern="[A-Za-z\s]+" class="form-control" id="name" placeholder="Enter city of the branch" required>
                    </div>
                </div>
      
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">EMAIL </label>
                    <div class="col-sm-8">
                        <input type="email" name="branch_email" class="form-control" id="email" placeholder="Enter email"required>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="text" class="col-sm-4 col-form-label">ADDRESS</label>
                    <div class="col-sm-8">
                        <input type="text" name="branch_address" class="form-control" id="email" placeholder="Enter address"required>
                    </div>
                </div>
               
                   <div class="form-group row">
             
                    <label for="mobile" class="col-sm-4 col-form-label">MOBILE NUMBER</label>
                    <div class="col-sm-8">
                        <input type="tel" name="branch_mobile" class="form-control" id="mobile" placeholder="Enter mobile number"  required >
                         <span id="mobileError" style="color: red;"></span>
                    </div>
                </div>
                
            </div>

            <!-- Right Column -->
            <div class="col-md-6">

                    <div class="text-center mt-2 mb-4">
      <h4 class="m-0">MANAGER DETAILS</h4>
    </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label"> BRANCH MANAGER NAME (ADMIN) </label>
                    <div class="col-sm-8">
                        <input type="text" name="manager_name"  pattern="[A-Za-z\s]+" class="form-control" id="name" placeholder="Enter name" required>
                    </div>
                </div>
                     <div class="form-group row">
             
                    <label for="mobile" class="col-sm-4 col-form-label">MOBILE NUMBER</label>
                    <div class="col-sm-8">
                        <input type="tel" name="owner_mobile" class="form-control" id="mobile" placeholder="Enter mobile number"  required >
                         <span id="mobileError" style="color: red;"></span>
                    </div>
</div>
                       <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">EMAIL </label>
                    <div class="col-sm-8">
                        <input type="email" name="owner_email" class="form-control" id="email" placeholder="Enter email"required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-4 col-form-label">ADDRESS</label>
                    <div class="col-sm-8">
                        <input type="text" name="owner_address" class="form-control" id="address" placeholder="Enter address" required>
                    </div>
                </div>
              
            </div>
        </div>

        <!-- Error message -->
        <div class="row">
    <div class="col-12 text-center">
        <span id="error-message" style="color: red; font-weight: 600; margin-bottom: 15px; display: inline-block;"></span>
    </div>
</div>

        <!-- Footer -->
        <div class="card-footer">
            <button type="submit" name="submit" class="btn" style="background-color:rgb(51, 139, 139); color: rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px;">Add</button>
            <button type="reset" class="btn btn-danger float-right">Cancel</button> 
        </div>
    </div>
</form>
       
            </div>
        </div>
 <div class="container-fluid">
  
  <div class="card">

              <div class="card-header">
                <h5 class="m-0">Manager Details (Admin)</h5>                                                                                  
              </div>
              
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
          
             <td><?php echo $row['admin_name']; ?></td>
  <td><?php echo $row['branch_name']; ?></td>
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

    </div>
    <script>
function validateMobile() {
    var mobile = document.getElementById("mobile").value;
    var error = document.getElementById("mobileError");

    if (!/^\d{10}$/.test(mobile)) {
        error.textContent = "Please enter exactly 10 digits.";
        return false; // prevent form submission
    }

    error.textContent = ""; // clear error if valid
    return true;
}
</script>

    <script>
    // Set today's date as min value
    document.addEventListener('DOMContentLoaded', function () {
        const dateInput = document.getElementById('date');
        const today = new Date().toISOString().split('T')[0];
        dateInput.setAttribute('min', today);
    });
</script>
</body>
</html>
<?php
include('includes/footer.php');
?>