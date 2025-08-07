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
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->

    <style type="text/css">
.all_appointment{
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
            <!-- <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/admin2/admin_add_customer.php">ADD NEW CUSTOMER</a></li> -->
              <!-- <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/">Home</a></li> -->
              <!-- <a href="/beauty_parlour_management_system/admin2/admin_add_customer.php" style="text-decoration: none;">
         <button class="btn btn-success"style= "border: none; cursor: pointer;"> 
           <li class="breadcrumb-item " style= "color: white;" >ADD NEW CUSTOMER</li> 
</a>  -->
           <ol>
            <ol class="breadcrumb float-sm-right">
  <button class="btn" style="background-color: rgb(51, 139, 139);;border: none; cursor: pointer;  padding: 7px 7px;">
    <i class="fa fa-user-plus fa-lg" style="margin-right: 2px; color: black; font-size: 14px;"></i>
    <!-- <a href="/beauty_parlour_management_system/admin2/admin_add_customer2.php"  -->
    <a href="#" class="text-white mx-1" data-toggle="modal" data-target="#modal-default" 
       style="text-decoration: none; color:  rgb(238, 230, 217) !important; font-size: 14px; font-weight: 700;  margin: 4px 2px;">
     New Appointment
    </a>
  </button>
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
        
            <form id="appointment_form" >
                <div id="message"></div>
               <div class="form-group">
                 <label for="branch_id" style="color:rgb(51, 139, 139);">Select Branch:</label>
                 <?php 
                $branch_result = mysqli_query($conn, "SELECT * FROM branch_details  WHERE status='active'"); 
            ?>
                <select name="branch_id" id="branch_id"  class="form-control" required>
                    <option value="" selected disabled>Select Branch</option>
                    <?php while ($row = mysqli_fetch_assoc($branch_result)) { ?>
                        <option value="<?= $row['id'] ?>"><?= $row['branch_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
          
         
                        <label for="mobile" style="color:rgb(51, 139, 139);" >Mobile</label>
                        <input type="tel" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile number" pattern="[0-9]{10}"
       maxlength="10"
       minlength="10" required>
                      
                    </div>
                    <span id="error-message" style="color: red; display: block; font-weight:600; margin-bottom: 15px; text-align:  justify; padding-left: 50px; "></span>
                    <div class="form-group">
                        <label for="name" style="color:rgb(51, 139, 139);">Name</label>
                        <input type="text" name="name" pattern="[A-Za-z\s]+" class="form-control" id="name" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email" style="color:rgb(51, 139, 139);">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="address" style="color:rgb(51, 139, 139);">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" required>
                    </div>
                    <div class="form-group">
                        <label for="date" style="color:rgb(51, 139, 139);">Date</label>
                        <input type="date" name="date" id="date" class="form-control"  placeholder="Enter Date" required>
                    </div>
                 
                    <div class="form-group">
                        <label for="time" style="color:rgb(51, 139, 139);">Time</label>
                        <input type="time" name="time" class="form-control" id="time" placeholder="Enter Time" required>
                    </div>
                    <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                <h5 class="m-0"> Appointment Details </h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: rgb(51, 139, 139) ">
                  <tr>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">S no.</th>
                   
                      <th style="color: rgb(238, 230, 217); font-weight: 500;">Branch Name</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Name</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Email</th>
                     <th style="color: rgb(238, 230, 217); font-weight: 500;">Mobile</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Date</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Time</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Appointment for</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Action</th>
                    <!-- <th>Actions</th> -->
                  </tr>
                  </thead>
                  <tbody>
                  <?php
//   $sql = "SELECT * FROM tb_appointment";
// // Step 3: Execute the query
// $result = mysqli_query($conn, $sql);
// $count = 0;
// // Step 4: Check if the query returned any results
// if (mysqli_num_rows($result) > 0) {
//     // Step 5: Use a while loop to fetch each row of data
//     while ($row = mysqli_fetch_assoc($result)) {
//       $count = $count+1 ;
//       echo"<tr>
//       <th scope='row'>".$count."</th> 
//       <td>".$row['name']."</td>
//       <td>".$row['email']."</td> 
//        <td>".$row['date']."</td> 
//         <td>".$row['prefered_time']."</td> 
//          <td>".$row['appointment_for']."</td>  
//         <td> 
//   <a href='/beauty_parlour_management_system/admin2/admin_edit_customer.php?id={$row["id"]}'>

//     <button style='background-color: rgb(23, 162, 184); color: white; border: none; padding: 5px 10px; cursor: pointer;'>EDIT</button>
//   </a> 
//   <a href='/beauty_parlour_management_system/admin2/delete_appointment.php?id={$row["id"]}'>
//     <button style='background-color: #f44336; color: white; border: none; padding: 5px 10px; cursor: pointer;'>DELETE</button>
//   </a> 
// </td>
//  <td>
//   <a href='/beauty_parlour_management_system/admin2/admin_edit_customer.php?id={$row["id"]}'>
//       <i class='fas fa-pencil-alt' style='margin-right: 10px; text-decoration: none; border: none; '></i>
//   </a> 
//   <a href='/beauty_parlour_management_system/admin2/delete_appointment.php?id={$row["id"]}'>
//    <i class='fa fa-trash' style='margin-right: 5px; color: red;text-decoration: none; border: none;'></i>
 
//   </a> 
// </td>
//     </tr>";
// $sql = "SELECT * FROM tb_appointment order BY id DESC";
$sql = "
SELECT 
    ta.*, 
    bd.branch_name 
FROM 
    tb_appointment ta
JOIN 
    branch_details bd 
ON 
    ta.branch_details_id = bd.id
   
ORDER BY 
    ta.id DESC
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
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
             <td><?php echo $row['mobile']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['prefered_time']; ?></td>
            <td><?php echo $row['appointment_for']; ?></td>
            <!-- <td> 
  <a href='/beauty_parlour_management_system/admin2/admin_edit_customer.php?id=<?php echo $row["id"]; ?>'>

    <button style='background-color: rgb(23, 162, 184); color: white; border: none; padding: 5px 10px; '>EDIT</button>
  </a> 
  <a href='/beauty_parlour_management_system/admin2/delete_appointment.php?id=<?php echo $row["id"]; ?>'>
    <button style='background-color: #f44336; color: white; border: none; padding: 5px 10px; '>DELETE</button>
  </a> 
</td> -->
<td>
    <div style="display: inline-block; margin-right: 20px;">
        <a href='admin_edit_customer6?id=<?php echo $row["id"]; ?>&appointment_for=<?php echo urlencode($row["appointment_for"]); ?>'>
            <i class='fas fa-pencil-alt' style='color:rgb(10, 90, 34);'></i> <!-- Edit icon -->
        </a> 
    </div>
    <!-- <div style="display: inline-block;">
        <a href='/beauty_parlour_management_system/admin2/delete_appointment.php?id=<?php echo $row["id"]; ?>'>
            <i class='fa fa-trash' style='color: red;'></i>
        </a>
    </div> -->

  <div style="display: inline-block;">
        <a href='delete_data?id=<?php echo $row["id"]; ?>&table=tb_appointment'
         onclick="return confirm('Are you sure you want to delete this?')">
            <i class='fa fa-trash' style='color: red;'></i>
        </a>
    </div>
</td>

        </tr>
        <?php
    }
} 
 else {
    echo "No Appointment found.";
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
        $(document).ready(function() {
            // Trigger AJAX when the user types in the mobile number
            $("#mobile").on("keyup", function() {
                var mobile = $("#mobile").val(); // Get the mobile number entered
                if (mobile.length >= 8) { // Start searching after 3 characters (adjust as needed)
                    $.ajax({
                        url: "fetch_customer.php", // PHP file to fetch customer data
                        method: "POST",
                        data: { mobile: mobile },
                        success: function(response) {
                            // Handle the response from fetch_customer.php
                            var data = JSON.parse(response); // Parse the JSON response
                            if (data.success) {
                                // Populate the fields with data
                                $("#name").val(data.name);
                                $("#email").val(data.email);
                                $("#address").val(data.address);
                                $("#error-message").hide();
                            } else {
                                // If customer not found
                                $("#name").val("");
                                $("#email").val("");
                                $("#address").val("");
                               // alert("Customer not found!");
                               $("#error-message").text("No Record Found Please Fill Up The Details").show();
                            }
                        },
                        error: function() {
                            alert("An error occurred while fetching the data.");
                        }
                    });
                }
            });
        });
  
        $(document).ready(function () {
            $("#submitBtn1").click(function (e) {
                e.preventDefault(); // Prevent form submission
                 const form = document.getElementById("appointment_form");

        // Check if form is valid
        if (!form.checkValidity()) {
            form.reportValidity(); // Show built-in HTML5 error messages
            return; // Stop if invalid
        }
        
                var branch_id = $("#branch_id").val();
                var mobile = $("#mobile").val();
                var name = $("#name").val();
                var email = $("#email").val();
                var address = $("#address").val();
                var date = $("#date").val();
                var time = $("#time").val();
                console.log("Mobile:", mobile, "Name:", name, "Email:", email, "Address:", address, "Date:", date, "Time:", time);
                $.ajax({
                    type: "POST",
                    url: "add_appointment.php", // PHP file that will handle the request
                    data: {
                       branch_id :branch_id,
                       mobile: mobile,
                      name: name,
                      email: email,
                      address: address,
                      date : date,
                      time : time
                      },
                    success: function (response) {
                        $("#message").html(response); // Display response message
                       $("#appointment_form")[0].reset(); // Reset form fields
                     $("#appointment_form").trigger("reset");
                     $("#error-message").hide();
                    }
                });
            });
        });
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
</main>
<?php
include('includes/footer.php');
?>
