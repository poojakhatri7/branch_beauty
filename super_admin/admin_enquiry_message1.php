<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');


// if (isset($_GET['id']) && isset($_GET['status'])) {
//     $id = intval($_GET['id']);
//     $status = mysqli_real_escape_string($conn, $_GET['status']);

//     $update = "UPDATE enquiry_message SET status = '$status' WHERE id = $id";
//     mysqli_query($conn, $update);
// }
// ?>

<main class="app-main">
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->

    <style >
.admin_enquiry_message {
  /* background : #157daf !important; */
  background :rgb(33, 70, 77) !important;
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
            <!-- <h5 class="m-0"> APPOINTMENT DETAILS</h5> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
           
         
           
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
   
    <div class="container-fluid">

       <div class="col-sm-6">
    <h4> All Enquiry Details </h4>
     </div>
       <div class="col-sm-6">
<label> Search By Branch </label>

<?php
$sql = "SELECT * FROM branch_details"; 
$result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            // echo '<li aria-haspopup="true"><a href="pprice.php?c_id=' . $row['c_id'] . '">' . htmlspecialchars($row['c_service']) . '</a></li>';
        }
      ?>  
<select class="form-control" id="branchSelect">
   <option  value="" selected disabled>Select Branch</option>
     <?php
        // Reset the result pointer and fetch again for the select box
        mysqli_data_seek($result, 0);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['branch_name']) . '</option>';
        }
        ?>
</select>
         </div>
    <div class="container-fluid">    
<div id="branch-data" class="mt-3"></div>
      </div>
  </div>



    <!-- <script>
  document.getElementById("branchSelect").addEventListener("change", function () {
    const branchId = this.value;

    fetch(`get_enquiry_message.php?branch_details_id=${branchId}`)
      .then(response => {
        if (!response.ok) {
          throw new Error("Network response was not OK");
        }
        return response.text(); // Expecting HTML
      })
      .then(data => {
        document.getElementById("branch-data").innerHTML = data;
          // IMPORTANT: Reinitialize DataTable after injecting HTML
   
      })
      
      .catch(error => {
        console.error("There was a problem with the fetch operation:", error);
      });
  });
</script> -->

<script>
document.getElementById("branchSelect").addEventListener("change", function () {
  const branchId = this.value;

  fetch(`get_enquiry_message.php?branch_details_id=${branchId}`)
    .then(response => {
      if (!response.ok) throw new Error("Network error");
      return response.text();
    })
    .then(data => {
      const container = document.getElementById("branch-data");
      container.innerHTML = data;

      setTimeout(() => {
        // Destroy existing DataTable if it exists
        if ($.fn.DataTable.isDataTable('#branchTable')) {
          $('#branchTable').DataTable().destroy();
        }

        // ✅ Correct: Assign to a variable
        const table = $('#branchTable').DataTable({
          responsive: true,
          lengthChange: false,
          autoWidth: false,
        dom: '<"row align-items-center mb-2"<"col-sm-6"B><"col-sm-6"f>>' + 
         'rt' +
         '<"row mt-2"<"col-sm-6"i><"col-sm-6"p>>',
          buttons: [
            "copy", "csv", "excel", "pdf", "print", "colvis"
          ],
        });

        // ✅ Adjust placement for Bootstrap 5 layout
        table.buttons().container().appendTo('#branchTable_wrapper .row:eq(0) .col-sm-6:eq(0)');

      }, 100);
    })
    .catch(error => {
      console.error("Fetch error:", error);
    });
});


// ✅ Event delegation for dropdown status update
document.getElementById("branch-data").addEventListener("change", function (e) {
  if (e.target.classList.contains("status-dropdown")) {
    const status = e.target.value;
    const id = e.target.getAttribute("data-id");

    fetch("update_status.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `id=${id}&status=${status}`,
    })
    .then(res => res.text())
    .then(response => {
      console.log("Status updated:", response);
      // Optionally show a toast or success message here
      const row = this.closest("tr");
if (row) {
    const statusCell = row.querySelector(".status-cell");
    if (statusCell) {
        statusCell.textContent = status.charAt(0).toUpperCase() + status.slice(1);
    }
} else {
    console.warn("Row not found for dropdown with id:", id);
}
    })
    .catch(err => {
      console.error("Update error:", err);
    });
  }
});
</script>



</body>
</html>
</main>
<?php
include('includes/footer.php');
?>
