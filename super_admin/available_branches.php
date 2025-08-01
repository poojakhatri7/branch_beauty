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
.admin_available_branches {
  background :rgb(33, 70, 77) !important;
}
   .btn.active {
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.5);
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
                      <th style="color: rgb(238, 230, 217); font-weight: 500;">Status</th>
                     <th style="color: rgb(238, 230, 217); font-weight: 500;">Toggle</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                    
                  <?php
// $sql = "SELECT * FROM branch_details ";
$sql ="SELECT 
    bd.id AS branch_id,
    bd.branch_name,
     bd.status,
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
             <td id="statusText<?= $row['branch_id'] ?>"> <?= $row['status']; ?> </td>
                <td>
                

<div class="d-flex justify-content-center">
  <button class="btn btn-success" id="statusBtn" onclick="toggleStatus(<?= $row['branch_id'] ?>, '<?= $row['status'] ?>')">
    <?= $row['status'] === 'active' ? 'Deactivate' : 'Activate' ?>
  </button>
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

<!-- <script>
let currentStatus = 'Activate';

function toggleStatus() {
  const btn = document.getElementById('statusBtn');
  if (currentStatus === 'Activate') {
    currentStatus = 'deactive';
    btn.textContent = 'Deactivate';
    btn.classList.remove('btn-success');
    btn.classList.add('btn-danger');
  } else {
    currentStatus = 'Activate';
    btn.textContent = 'Activate';
    btn.classList.remove('btn-danger');
    btn.classList.add('btn-success');
  }
}
</script> -->
<!-- <script>
function toggleStatus(branchId, newStatus) {
  
   console.log("Branch ID:", branchId, "New Status:", newStatus); 
  fetch('get_status_update.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: `action=toggle_status&branch_id=${branchId}&new_status=${newStatus}`
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      console.log("Status updated!");

      // Get the button element
      const btn = document.getElementById('statusBtn');

      // Update text based on new status
      const updatedStatus = newStatus === 'active' ? 'Deactivate' : 'Activate';
      btn.textContent = updatedStatus;

      // Update the onclick with toggled status
      btn.setAttribute("onclick", `toggleStatus(${branchId}, '${newStatus === 'active' ? 'inactive' : 'active'}')`);

      // Toggle button color
      btn.classList.toggle('btn-success');
      btn.classList.toggle('btn-danger');
    } else {
      console.error("Update failed:", data.error);
    }
  });
}
</script> -->
<script>
function toggleStatus(branchId, currentStatus) {
   
  const newStatus = currentStatus === 'active' ? 'inactive' : 'active';

  const confirmed = confirm(`Are you sure you want to ${newStatus === 'active' ? 'activate' : 'deactivate'} this branch?`);
  if (!confirmed) return;
 console.log("Branch ID:", branchId, "New Status:", newStatus); 
  fetch('get_status_update.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: `action=toggle_status&branch_id=${branchId}&new_status=${newStatus}`
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
       console.log("Status updated!");
      const btn = document.getElementById('statusBtn');
      btn.textContent = newStatus === 'active' ? 'Deactivate' : 'Activate';
      btn.setAttribute("onclick", `toggleStatus(${branchId}, '${newStatus}')`);
      btn.classList.toggle('btn-danger');
      btn.classList.toggle('btn-success');
    }
       // ✅ Update the <td> status text dynamically
      const statusTd = document.getElementById('statusText' + branchId);
      if (statusTd) {
        statusTd.textContent = newStatus;
      }
    else {
      console.error("Update failed:", data.error);
    }
  });
}
</script>



</body>

</html>
</main>

<?php
include('includes/footer.php');
?>
