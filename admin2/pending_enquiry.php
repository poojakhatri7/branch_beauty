<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');
$branch_details_id = $_SESSION['branch_details_id'];
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
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->

    <style type="text/css">
.admin_complete_enquiry{
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
            <!-- <h5 class="m-0"> APPOINTMENT DETAILS</h5> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
           
           <!--<ol>-->
           <!-- <ol class="breadcrumb float-sm-right">-->
  <!--<button class="btn" style="background-color: rgb(51, 139, 139);;border: none; cursor: pointer;  padding: 7px 7px;">-->
  <!--  <i class="fa fa-user-plus fa-lg" style="margin-right: 2px; color: black; font-size: 14px;"></i>-->
    <!-- <a href="/beauty_parlour_management_system/admin2/admin_add_customer2.php"  -->
  <!--  <a href="#" class="text-white mx-1" data-toggle="modal" data-target="#modal-default" -->
  <!--     style="text-decoration: none; color:  rgb(238, 230, 217) !important; font-size: 14px; font-weight: 700;  margin: 4px 2px;">-->
  <!--    Add Appointment-->
  <!--  </a>-->
  <!--</button>-->
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New Appointment </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          <!-- <h4 style="color:rgb(1, 12, 6);" >Add New Services </h4> -->
            <form id="appointment_form">
            <div class="form-group">
            <div id="message"></div>
                        <label for="mobile" style="color:rgb(51, 139, 139);" >Mobile</label>
                        <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile number">
                    </div>
                    <span id="error-message" style="color: red; display: block; font-weight:600; margin-bottom: 15px; text-align:  justify; padding-left: 50px; "></span>
                    <div class="form-group">
                        <label for="name" style="color:rgb(51, 139, 139);">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="email" style="color:rgb(51, 139, 139);">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="address" style="color:rgb(51, 139, 139);">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address">
                    </div>
                    <div class="form-group">
                        <label for="date" style="color:rgb(51, 139, 139);">Date</label>
                        <input type="date" name="date" class="form-control" id="date" placeholder="Enter Date">
                    </div>
                 
                    <div class="form-group">
                        <label for="time" style="color:rgb(51, 139, 139);">Time</label>
                        <input type="time" name="time" class="form-control" id="time" placeholder="Enter Time">
                    </div>
                    <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="submit" id="submitBtn1" class="btn btn-secondary">Add</button>
            </div>
                </form>
                <div id="message"></div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
<div class="card">
              <div class="card-header">
                <h5 class="m-0"> Pending Enquires </h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: rgb(51, 139, 139) ">
                  <tr>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">S no.</th>
                    
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Name</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Email</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Mobile</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Message</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Date and Time</th>
                      <th style="color: rgb(238, 230, 217); font-weight: 500;">Status</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Actions</th>
                    <!-- <th>Actions</th> -->
                  </tr>
                  </thead>
                  <tbody>


                  <?php
// $sql = "SELECT * FROM enquiry_message where status ='complete' order BY id DESC ";



$sql = "SELECT * FROM enquiry_message 
        WHERE branch_details_id = '$branch_details_id' 
          AND status = 'Pending' 
        ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$count = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
        ?>
        <tr>
            <th scope='row'><?php echo $count; ?></th>
        
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><?php echo $row['message']; ?></td>
          
            <td><?php echo date("d-m-Y h:i", strtotime($row['created_at'])); ?></td>
           
   <td><?php echo $row['status']; ?></td>
            <!-- <td> 
  <a href='/beauty_parlour_management_system/admin2/admin_edit_customer.php?id=<?php echo $row["id"]; ?>'>

    <button style='background-color: rgb(23, 162, 184); color: white; border: none; padding: 5px 10px; '>EDIT</button>
  </a> 
  <a href='/beauty_parlour_management_system/admin2/delete_appointment.php?id=<?php echo $row["id"]; ?>'>
    <button style='background-color: #f44336; color: white; border: none; padding: 5px 10px; '>DELETE</button>
  </a> 
</td> -->
<td>
    <!-- <div style="display: inline-block; margin-right: 20px;">
        <a href='/beauty_parlour_management_system/admin2/admin_edit_customer.php?id=<?php echo $row["id"]; ?>'>
            <i class='fas fa-pencil-alt' style='color:rgb(10, 90, 34);'></i> 
         </a> 
    </div> --> 
    <div style="display: inline-block;">
        <a href='delete_data?id=<?php echo $row["id"]; ?>&table=enquiry_message'
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
    echo "No Enquiry message found";
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