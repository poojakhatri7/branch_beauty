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
.admin_enquiry_message{
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
         <br>
<div id="branch-data" class="mt-3"></div>
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
</script>
</body>
</html>
</main>
<?php
include('includes/footer.php');
?>
