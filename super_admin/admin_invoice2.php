<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');
?>

<main class="app-main">
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
.invoice1 {
  /* background : #157daf !important; */
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
            <!-- <h5 class="m-0">RECENT INVOICE DETAILS</h5> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
          <!-- <i class="fa fa-user-plus " style="float: right;" aria-hidden="true"></i> -->
          <!-- <i class="fa fa-user-plus" aria-hidden="true"></i> -->
          <!-- <i class="fa fa-user-plus" style="margin-right: 5px; color: white;" aria-hidden="true"></i> -->
            <!-- <ol class="breadcrumb float-sm-right">
            <i class="fa fa-user-plus fa-lg " style="margin-right: 1px; color: black;"></i>
            <a href="/beauty_parlour_management_system/admin2/admin_add_customer.php" style="text-decoration: none; ">
         <button class="btn btn-info"style= "border: none; cursor: pointer;"> 
          
          <li class="breadcrumb-item " style= "color: white;  font-size: 14px; font-weight: 500; padding: 2px;" >Add New Customer</li>     
</a> 
</button> 
            </ol> -->  
            <ol class="breadcrumb float-sm-right">
  <button class="btn" style="background-color: rgb(51, 139, 139);border: none; cursor: pointer;  padding: 7px 7px;" >
    <i class="fa fa-user-plus fa-lg" style="margin-right: 2px; color: black; font-size: 14px;"></i>
    <a href="admin_add_customer2" 
       style="text-decoration: none; color: white; font-size: 14px; font-weight: 700;  margin: 4px 2px;">
   Add Appointment
    </a>
  </button>
</ol>

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
   
 
    
  <!-- </tbody>
</table> -->
<!-- <a href="/beauty_parlour_management_system/sign_up.php">Create a new account</a> -->
<div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">Appointment Details</h3> -->
                <h5 class="m-0">RECENT INVOICE DETAILS</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <!-- <thead style="background-color:rgb(23, 162, 184); color: white;"> -->
                <thead style="background-color:rgb(51, 139, 139); color: white;">
                  <tr>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">S no.</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Invoice number</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Customer name</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Mobile number</th>
                     <th style="color: rgb(238, 230, 217); font-weight: 500;">Type</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Date</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Time</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
//   = "SELECT distinct FROM tb_selected_services";
//   $sql= "SELECT DISTINCT * FROM tb_selected_services";
 // $sql=" SELECT DISTINCT appointment_id FROM tb_selected_services";
//  $sql ="p.name, p.date from tb_appointment p inner join tb_selected_services c on p.id = c.appointment_id";
// $sql="SELECT distinct p.name, p.date 
// FROM tb_appointment p 
// INNER JOIN tb_selected_services c 
// ON p.id = c.appointment_id";
//
// $sql="SELECT DISTINCT p.id AS appointment_id, p.name, p.date
// FROM tb_appointment p
// INNER JOIN tb_selected_services c
// ON p.id = c.appointment_id";

$count = 0;
$sql = "
    (SELECT 
        ta.appointment_id AS appointment_id, 
        ta.name AS name, 
        ta.date,
        ta.mobile, 
        ts.billing_number,
        ts.created_at AS time,
        ts.created_at,
        'Service' AS invoice_type,
        NULL AS package1_id
    FROM tb_invoice ta
    JOIN tb_selected_services ts ON ta.appointment_id = ts.appointment_id
    GROUP BY ts.billing_number)

    UNION ALL

    
    (SELECT 
        ta.appointment_id AS appointment_id, 
        ta.name AS name, 
        ta.date,
        ta.mobile, 
        sp.billing_number,
        NULL AS time,
        sp.created_at,
        'Package' AS invoice_type,
        sp.package1_id
    FROM tb_invoice ta
    JOIN package_selected sp ON ta.appointment_id = sp.appointment_id
    GROUP BY sp.billing_number)

    ORDER BY created_at DESC
";

// Execute the query
$result = mysqli_query($conn, $sql);

// Display results
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
        echo "<tr>
            <th scope='row'>$count</th> 
            <td>{$row['billing_number']}</td>
            <td>{$row['name']}</td>
            <td>{$row['mobile']}</td>
            <td>{$row['invoice_type']}</td>
            <td>{$row['date']}</td>
            <td>" . ($row['time'] ? date("h:i", strtotime($row['time'])) : date("h:i", strtotime($row['created_at']))) . "</td>
            <td>";
        
        if ($row['invoice_type'] === 'Service') {
            echo "<a href='invoice_details2?appointment_id={$row["appointment_id"]}&billing_number={$row["billing_number"]}'>";
        } else {
            echo "<a href='invoice_package?package1_id={$row["package1_id"]}&appointment_id={$row["appointment_id"]}&billing_number={$row["billing_number"]}'>";
        }

        echo "<button class='btn' style='background-color: rgb(51, 139, 139); color: white; border: none; cursor: pointer; padding: 7px 12px;'>
                <i class='fa fa-eye fa-lg' style='margin-right: 2px; color: black; font-size: 14px;'></i>
                View
              </button>
              </a>
            </td>
        </tr>";
    }
} else {
    echo "No invoice found.";
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