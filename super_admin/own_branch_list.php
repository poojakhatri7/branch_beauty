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
   
 

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS (if needed) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.min.js"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Toggle -->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

   <style type="text/css">

.admin_available_branches {
  background :rgb(33, 70, 77) !important;
}
  .big-switch .form-check-input {
    transform: scale(1.5); /* Resize switch */
    margin-right: 10px;
  }

  .big-switch .form-check-label::after {
    content: attr(data-label);
    font-weight: bold;
    font-size: 1.1rem;
    margin-left: 8px;
  }
 

 
  .big-switch .form-check-input:checked {
    background-color: #28a745; /* Green for Yes */
    border-color: #28a745;
     transform: scale(1.5); /* Increase size: 1.5x */
     
  }

  .big-switch .form-check-input:not(:checked) {
    background-color: #dc3545; /* Red for No */
    border-color: #dc3545;
       transform: scale(1.5); /* Increase size: 1.5x */
  }

  .custom-switch .form-check-label::after {
    content: attr(data-label);
    font-weight: bold;
  
     margin-right: 40px;
    margin-left: 10px;
    color: #000;
  }
   
</style>


  </head>
  <body>
   
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
                      <th style="color: rgb(238, 230, 217); font-weight: 500;">Own Branch</th>
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
      bd.own_branch,
     bd.status,
    bd.city,
    bd.email,
     bd.address,
       bd.mobile,
    ald.name AS admin_name
FROM branch_details bd
LEFT JOIN admin_login_details ald
    ON bd.id = ald.branch_details_id AND ald.role = 1
     WHERE bd.own_branch = 'Yes'";

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
<td class="text-center align-middle">
  <div class="form-check form-switch big-switch d-inline-block">
    <input class="form-check-input toggle-own-branch"
           type="checkbox"
           role="switch"
           data-id="<?php echo $row['branch_id']; ?>"
           id="branchSwitch<?php echo $row['branch_id']; ?>"
           <?php echo $row['own_branch'] === 'Yes' ? 'checked' : ''; ?>
           onchange="this.nextElementSibling.setAttribute('data-label', this.checked ? 'Yes' : 'No')">
    <label class="form-check-label"
           for="branchSwitch<?php echo $row['branch_id']; ?>"
           data-label="<?php echo $row['own_branch'] === 'Yes' ? 'Yes' : 'No'; ?>">
    </label>
  </div>
</td>


<td id="statusText<?= $row['branch_id'] ?>"> <?= $row['status']; ?> </td>

<td>
                
<div class="d-flex justify-content-center">
  <button 
    class="<?= $row['status'] === 'active' ? 'btn btn-danger' : 'btn btn-success' ?>" 
    id="statusBtn<?= $row['branch_id'] ?>" 
    onclick="toggleStatus(<?= $row['branch_id'] ?>, '<?= $row['status'] ?>')">
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


<script>
function toggleStatus(branchId, currentStatus) {
  const newStatus = currentStatus === 'active' ? 'inactive' : 'active';

  const confirmed = confirm(`Are you sure you want to ${newStatus === 'active' ? 'activate' : 'deactivate'} this branch?`);
  if (!confirmed) return;

  fetch('get_status_update.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: `action=toggle_status&branch_id=${branchId}&new_status=${newStatus}`
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      // ✅ Update button text and style
      const btn = document.getElementById('statusBtn' + branchId);
      btn.textContent = newStatus === 'active' ? 'Deactivate' : 'Activate';
      btn.setAttribute("onclick", `toggleStatus(${branchId}, '${newStatus}')`);
      btn.classList.toggle('btn-danger');
      btn.classList.toggle('btn-success');

      // ✅ Update the status column dynamically
      const statusTd = document.getElementById('statusText' + branchId);
      if (statusTd) {
        statusTd.textContent = newStatus;
      }
    } else {
      console.error("Update failed:", data.error);
    }
  });
}
</script>
<!-- <script>
document.addEventListener("DOMContentLoaded", function () {
  console.log("Page loaded");
 
    
  const checkboxes = document.querySelectorAll(".toggle-own-branch");

   console.log("Found", checkboxes.length, "checkboxes"); // is this printing a number > 0?

  checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener("change", function () {
      const id = this.dataset.id;
      const status = this.checked ? "Yes" : "No";

      console.log("Branch ID:", id);
      console.log("Own Branch Status:", status);
      console.log("hello");
      fetch("update_own_branch.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `id=${encodeURIComponent(id)}&own_branch=${encodeURIComponent(status)}`
      })
      .then(response => response.text())
      .then(data => {
        console.log("Server response:", data);
        if (data.trim() === "success") {
          alert("Updated successfully");
        } else {
          alert("Server returned: " + data);
        }
      })
      .catch(error => {
        console.error("Error:", error);
        alert("AJAX request failed");
      });
    });
  });
});
</script> -->
<!-- <script>
  $(document).ready(function () {
    $(".toggle-own-branch").on("change", function () {
      const id = $(this).data("id");
      const own_branch = $(this).is(":checked") ? "Yes" : "No";

      console.log("Branch ID:", id);
      console.log("Own Branch Status:", own_branch);

    
      $.post("update_own_branch.php", { id: id, own_branch: own_branch }, function(response) {
        console.log("Server response:", response);
      });
    });
  });
</script> -->
<script>
  $(document).ready(function () {
    $(".toggle-own-branch").on("change", function () {
      const checkbox = $(this);
      const id = checkbox.data("id");
      const own_branch = checkbox.is(":checked") ? "Yes" : "No";

       console.log("Branch ID:", id);
      console.log("Own Branch Status:", own_branch); 
      // Show confirmation dialog
      const confirmChange = confirm(`Are you sure you want to set "Own Branch" to ${own_branch}?`);

      if (confirmChange) {
        // Proceed with update
        $.post("update_own_branch.php", { id: id, own_branch: own_branch }, function(response) {
          console.log("Server response:", response);
        });
      } else {
        // Revert the checkbox if canceled
        checkbox.prop("checked", !checkbox.is(":checked"));
      }
    });
  });
</script>


</body>

</html>
</main>

<?php
include('includes/footer.php');
?>
