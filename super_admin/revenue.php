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
.revenue{
  background :rgb(33, 70, 77) !important;
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



<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Manager Details</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
          <form id="manager_details">
            <div class="form-group">
               <!-- <p><strong>Branch Name : </strong> <span id="modalManagerName"></span></p> -->
              <p><strong> Branch Manager Name (Admin) :</strong> <span id="modalManagerName"></span></p>
        <p><strong>Mobile : </strong> <span id="modalMobile"></span></p>
        <p><strong> Email :</strong> <span id="modalEmail"></span></p>
        <!-- <p><strong>Price Rs:</strong> <span id="modalPrice"></span></p> -->
        <p><strong> Address : </strong> <span id="modalAddress"></span></p>


                </form>
         </div>
         <div class="modal-footer justify-content-between">                
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            
            </div>
      </div>
    </div>
  </div>
</div>
 

 

     <div class="container-fluid">
    <!-- <h2 style="text-align: center;">Apointment History</h2> -->
  <div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">Appointment Details</h3> -->
                <h5 class="m-0"> Revenue Details </h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color:rgb(51, 139, 139);">
                  <tr>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">S no.</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Branch Name</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">City </th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;"> Email</th>
                      <th style="color: rgb(238, 230, 217); font-weight: 500;"> Location </th>
                        <th style="color: rgb(238, 230, 217); font-weight: 500;"> Invoice </th>
                       <th style="color: rgb(238, 230, 217); font-weight: 500;">Revenue (Rs)</th>
                         <th style="color: rgb(238, 230, 217); font-weight: 500;"> Branch Status</th>
                     <th style="color: rgb(238, 230, 217); font-weight: 500;">Action</th>
                    <!-- <th style="color: rgb(238, 230, 217); font-weight: 500;">Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    
                  <?php
// $sql = "
// SELECT 
//     bd.id,
//     bd.branch_name,
//     bd.email,
//     bd.city,
//     bd.address,
//     bd.mobile,
//     COALESCE(SUM(b.round_off_bill), 0) AS total_revenue,
//     COUNT(DISTINCT ti.id) AS total_invoices
// FROM 
//     branch_details bd
// LEFT JOIN 
//     bill b ON b.branch_details_id = bd.id
// LEFT JOIN 
//     tb_invoice ti ON ti.branch_details_id = bd.id
// GROUP BY 
//     bd.id, bd.branch_name, bd.email, bd.city, bd.address, bd.mobile
// ORDER BY 
//     total_revenue DESC;
// ";
$sql = "
SELECT 
    bd.id,
      bd.status,
    bd.branch_manager_id, 
    bd.branch_name,
    bd.email,
    bd.city,
    bd.address,
    bd.mobile,
    COALESCE(SUM(b.round_off_bill), 0) AS total_revenue,
    COUNT(DISTINCT b.Sno) AS total_invoices
FROM 
    branch_details bd
LEFT JOIN 
    bill b ON b.branch_details_id = bd.id
GROUP BY 
    bd.id, bd.branch_name, bd.email, bd.city, bd.address, bd.mobile
ORDER BY 
    total_revenue DESC;
";

$count = 0;
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
   $count++;
    echo "<tr>
     <th scope='row'> $count</th>
     
            <td>{$row['branch_name']}</td>
              <td>{$row['city']}</td>
               <td>{$row['email']}</td>
                 <td>{$row['address']}</td>
                  <td>{$row['total_invoices']}</td>
                  <td>Rs " . number_format($row['total_revenue'], 2) . "</td>   
 <td>
    <span style='color: " . ($row['status'] === 'active' ? 'green' : 'red') . "; font-weight: bold;'>
        " . strtoupper($row['status']) . "
    </span>
</td>

                 <td>
    <a href='#' 
    class='view-btn'
       data-toggle='modal' 
       data-target='#modal-default' 
       data-manager_id='{$row['branch_manager_id']}' 
       style='background-color: rgb(51, 139, 139); color: white; border: none; cursor: pointer; padding: 7px 12px; text-decoration: none;'>
      Details
    </a>
  </td>

          </tr>";
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
$(document).on('click', '.view-btn', function () {
    const admin_details = $(this).data('manager_id');
  console.log("Clicked branch-manager id :", admin_details ); // Check if ID is correct
    $.ajax({
        url: 'get_revenue_details.php',
        type: 'POST',
        data: { admin_details: admin_details },
        dataType: 'json',
        success: function (data) {
            if (data.error) {
                alert(data.error);
            } else {
                 $('#modalManagerName').text(data.name);
        $('#modalMobile').text(data.mobile);
        $('#modalEmail').text(data.email);
        $('#modalAddress').text(data.address);
     
            }
        },
        error: function () {
            alert('branch_manager_id not found');
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
