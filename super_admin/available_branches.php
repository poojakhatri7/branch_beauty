<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');
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
.admin_available_branches{
  background :rgb(33, 70, 77) !important;
}


/* Increase toggle size */
.form-check-input {
  width: 4rem;      /* wider */
  height: 1rem;     /* taller */
  cursor: pointer;
  transform: scale(1.5); /* optional: scales the whole switch */
}

/* Adjust the knob inside */
.form-check-input:checked {
  background-color: #28a745; /* green */
  border-color: #28a745;
}

.form-check-input:not(:checked) {
  background-color: #dc3545; /* red */
  border-color: #dc3545;
}

/* Optional: smoother transition */
.form-check-input {
  transition: all 0.3s ease;
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
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 
     <div class="container-fluid">
    <!-- <h2 style="text-align: center;">Apointment History</h2> -->
  <div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">Appointment Details</h3> -->
                <h5 class="m-0"> Branch  Details </h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color:rgb(51, 139, 139);">
                  <tr>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">S no.</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Branch Name</th>
                     <th style="color: rgb(238, 230, 217); font-weight: 500;">Branch Manager (Admin)</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">City </th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Email</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Address</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Mobile</th>
                     <th style="color: rgb(238, 230, 217); font-weight: 500;">Active</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  <?php
// $sql = "SELECT * FROM branch_details ";
$sql ="SELECT 
    bd.id AS branch_id,
    bd.branch_name,
    bd.city,
    bd.email,
     bd.address,
       bd.mobile,
    ald.name AS admin_name
FROM branch_details bd
LEFT JOIN admin_login_details ald
    ON bd.id = ald.branch_details_id AND ald.role = 1; ";

$result = mysqli_query($conn, $sql);
$count = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
         
        ?>
        <tr>
            <th scope='row'><?php echo $count; ?></th>
            <td><?php echo $row['branch_name']; ?></td>
             <td>  <?php 
    echo !empty($row['admin_name']) ? $row['admin_name'] : "<span style='color:Black;'>No admin is assigned</span>"; 
    ?></td>
            <td><?php echo $row['city']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['address']; ?></td>
            
               <td><?php echo $row['mobile']; ?></td>
                <td>
                <div class="form-check form-switch d-flex justify-content-center align-items-center gap-2">
  <input class="form-check-input" type="checkbox" id="branchToggle" onchange="toggleStatus(this)" checked>
  <label class="form-check-label mb-0" for="branchToggle" id="statusLabel"></label>
</div>
</td>
            <td>
    <!-- <div style="display: inline-block; margin-right: 20px;">
        <a href='edit_available_branches?id=<?php echo $row["branch_id"]; ?>'>
            <i class='fas fa-pencil-alt' style='color:rgb(10, 90, 34);'></i> 
        </a>  -->
    </div>
    <div style="display: inline-block;">
        <a href='delete_data?id=<?php echo $row["branch_id"]; ?>&table=branch_details'
         onclick="return confirm('Are you sure you want to delete this?')">
            <i class='fa fa-trash' style='color: red;'></i> <!-- Trash icon -->
        </a>
    </div>
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


</body>

</html>
</main>

<?php
include('includes/footer.php');
?>
