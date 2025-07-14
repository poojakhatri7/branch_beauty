<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');
?>
  <div class="content-wrapper">
  <style type="text/css">
.dashboard1{
  /* background : #157daf !important; */
  background :rgb(33, 70, 77) !important;
}
</style>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/">Home</a></li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box " style= "background-color:rgb(68, 151, 184)" >
              <div class="inner">
              <?php $query1=mysqli_query($conn,"Select * from  all_services");
$total_services=mysqli_num_rows($query1);
?>
                <h3 style="color: black;"><?php echo $total_services;?></h3>
                <!-- <p>TOTAL SERVICES</p> -->
                <p style="color: black;">TOTAL SERVICES</p>
                
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
                <div class="small-box-footer d-flex justify-content-center">
    <a href="manage_service" class="text-white mx-3">
        More Info <i class="fas fa-arrow-circle-right"></i>
    </a>
    <!-- <a href="#" class="text-white mx-3">
        Add Services <i class="fas fa-plus-circle"></i>
    </a> -->
    <!-- <a href="#" class="text-white mx-3" data-toggle="modal" data-target="#modal-default">
    Add Services <i class="fas fa-plus-circle"></i>
</a> -->
</div>
<!-- <div class="card-body">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                  Launch Default Modal
                </button>
</div> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          <h4 style="color:rgb(1, 12, 6);" >Add New Services </h4>
            <form id="serviceForm">
                    <div class="form-group">
                        <label for="serviceName" style="color:rgb(51, 139, 139);" >Service Name</label>
                        <input type="text" name="service_name" class="form-control" id="serviceName" placeholder="Enter service name">
                    </div>
                    <div class="form-group">
                        <label for="servicePrice" style="color:rgb(51, 139, 139);">Price</label>
                        <input type="number" name="service_price" class="form-control" id="servicePrice" placeholder="Enter price">
                    </div>
                    <div id="message"></div>
                    <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" name="submit" id="submitBtn" class="btn btn-secondary">Add</button>
            </div>
                </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php $query2=mysqli_query($conn,"Select * from tb_appointment");
$totalappointment=mysqli_num_rows($query2);?>
            <div class="small-box " style="background-color:rgb(211, 122, 93)">
              <div class="inner">
                <h3 style="color: black;"><?php echo $totalappointment;?></h3>
                <p style="color: black;">ALL APPOINTMENT</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <div class="small-box-footer d-flex justify-content-center">
    <a href="admin_appointment" class="text-white mx-3">
        More Info <i class="fas fa-arrow-circle-right"></i>
    </a>
    <!-- <a href="/beauty_parlour_management_system/admin2/add_service.php" class="text-white " data-toggle="modal" data-target="#modal-default1">
        Add Appointment  <i class="fas fa-plus-circle"></i>
    </a> -->
</div>
<div class="modal fade" id="modal-default1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          <h4 style="color:rgb(1, 12, 6);" >Add New Appointment </h4>
            <form id="serviceForm1">
                    <div class="form-group">
                        <label for="serviceName" style="color:rgb(31, 184, 100);" >Mobile</label>
                        <input type="number" name="service_name" class="form-control" id="mobile" placeholder="Enter Mobile number">
                    </div>
                    <span id="error-message" style="color: red; display: block; font-weight:600; margin-bottom: 15px; text-align:  justify; padding-left: 200px; "></span>
                    <div class="form-group">
                        <label for="servicePrice" style="color:rgb(31, 184, 100);">Name</label>
                        <input type="text" name="service_price" class="form-control" id="servicePrice" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="servicePrice" style="color:rgb(31, 184, 100);">Email</label>
                        <input type="text" name="service_price" class="form-control" id="servicePrice" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="servicePrice" style="color:rgb(31, 184, 100);">Address</label>
                        <input type="text" name="service_price" class="form-control" id="servicePrice" placeholder="Enter Address">
                    </div>
                    <div class="form-group">
                        <label for="servicePrice" style="color:rgb(31, 184, 100);">Date</label>
                        <input type="date" name="service_price" class="form-control" id="servicePrice" placeholder="Enter Date">
                    </div>
                    <div id="message"></div>
                    <div class="form-group">
                        <label for="servicePrice" style="color:rgb(31, 184, 100);">Time</label>
                        <input type="time" name="service_price" class="form-control" id="servicePrice" placeholder="Enter Time">
                    </div>
                    <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" name="submit1" id="submitBtn1" class="btn btn-secondary">Add</button>
            </div>
                </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
              <!-- <a href="/beauty_parlour_management_system/admin2/admin_appointment.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php $query3=mysqli_query($conn,"Select * from users");
$user_registration=mysqli_num_rows($query3);?>
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3 style="color: black;"><?php echo $user_registration;?></h3>
                <p style="color: black;">TOTAL REGISTRATION</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="total_registration"  class="small-box-footer" >More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php
//              $query4=mysqli_query($conn,"SELECT 
//     ta.id AS appointment_id, 
//     ta.name AS name, 
//     ta.date, 
//     ts.billing_number
// FROM tb_appointment ta
// JOIN tb_selected_services ts ON ta.id = ts.appointment_id
// GROUP BY ta.id, ts.billing_number");


// $query5 =mysqli_query ($conn,"SELECT * 
// FROM package_selected 
// GROUP BY appointment_id 
// ");
$query5 = mysqli_query($conn, "
    SELECT 
        ta.id AS appointment_id, 
        ta.name, 
        ta.date, 
        ts.billing_number
    FROM tb_invoice ta
    JOIN tb_selected_services ts ON ta.appointment_id = ts.appointment_id GROUP BY ts.billing_number

    UNION 
    
    SELECT 
        ta.id AS appointment_id, 
        ta.name, 
        ta.date, 
        ps.billing_number
    FROM tb_invoice ta
    JOIN package_selected ps ON ta.appointment_id = ps.appointment_id GROUP BY ps.billing_number
");



$invoice=mysqli_num_rows($query5);?>
            <!-- <div class="small-box bg-secondary"> -->
            <div class="small-box" style="background-color:rgb(147, 88, 177);">
              <div class="inner">
                <h3 style="color: black;"><?php echo $invoice;?></h3>
                <p style="color: black;">Total Invoice</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="admin_invoice2" class="small-box-footer" >More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
</div>
 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
      <div class="container mt-4">
        <div class="row">
          <div class="col-md-6">

            <div class="card card-info">
              <div class="card-header" style="background-color:rgb(61, 136, 165)">
                <h3 class="card-title">Dashboard Data</h3>
                <div class="card-tools">
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button> -->
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
</div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
              <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header" style="background-color:rgb(201, 111, 81)">
                <h3 class="card-title">Dashboard Data</h3>
                <div class="card-tools">
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button> -->
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button> -->
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
</section>       
            
<!-- Page specific script -->
<!-- jQuery -->
<!-- Chart.js -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- Chart.js -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> -->

<script>
  $(function () {
    // Data from PHP
    const totalServices = <?php echo json_encode($total_services); ?>;
    const totalAppointments = <?php echo json_encode($totalappointment); ?>;
    const totalRegistration = <?php echo json_encode($user_registration); ?>;
    const totalInvoice = <?php echo json_encode($invoice); ?>;

    // Area Chart
    const areaChartCanvas = $('#areaChart').get(0).getContext('2d');
    const areaChartData = {
      labels: ['', 'Total Services', '', 'All Appointments', '', 'Total Registration', '', 'Total Invoice'],
      datasets: [
        { 
          label: 'Dashboard Data',
          backgroundColor: 'rgba(68, 151,184, 0.69)', 
          borderColor: 'rgba(68, 151, 184, 0.8)',
          data: [0, totalServices, 0, totalAppointments, 0, totalRegistration, 0, totalInvoice]
        }
      ]
    };
    const areaChartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: true
        }
      },
      scales: {
        x: {
          grid: {
            display: false
          }
        },
        y: {
          grid: {
            display: false
          }
        }
      }
    };

    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    });

    // Bar Chart
    const barChartCanvas = $('#barChart').get(0).getContext('2d');
    const barChartData = {
      labels: ['', 'Total Services', '', 'All Appointments', '', 'Total Registration', '', 'Total Invoice'],
      datasets: [
        {
          label: 'Dashboard Data',
          backgroundColor: [
            'rgba(211, 122, 93,0.9)',
            'rgba(211, 122, 93,0.9)',
            'rgba(211, 122, 93,0.9)',
            'rgba(211, 122, 93,0.9)',
            'rgba(211, 122, 93,0.9)',
            'rgba(211, 122, 93,0.9)',
            'rgba(211, 122, 93,0.9)',
            'rgba(211, 122, 93,0.9)',
          ],
          borderColor: 'rgba(163, 95, 72, 0.9)',
          borderWidth: 1,
          data: [0, totalServices, 0, totalAppointments, 0, totalRegistration, 0, totalInvoice]
        }
      ]
    };
    const barChartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: true
        }
      },
      scales: {
        x: {
          grid: {
            display: false
          }
        },
        y: {
          grid: {
            display: true
          }
        }
      }
    };

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    });
  });
</script>
<script>
        $(document).ready(function () {
            $("#submitBtn").click(function (e) {
                e.preventDefault(); // Prevent form submission

                var serviceName = $("#serviceName").val();
                var servicePrice = $("#servicePrice").val();
                $.ajax({
                    type: "POST",
                    url: "add_services.php", // PHP file that will handle the request
                    data: {
                       service_name: serviceName,
                       service_price: servicePrice 
                      },
                    success: function (response) {
                        $("#message").html(response); // Display response message
                     //   $("#serviceForm")[0].reset(); // Reset form fields
                     $("#serviceForm").trigger("reset");
                    }
                });
            });
        });
    </script>
    <!-- <script>
$(document).ready(function () {
    $(document).on("click", "#submitBtn", function () { // Fix for dynamically loaded modal
        var serviceName = $("#serviceName").val();
        var servicePrice = $("#servicePrice").val();

        $.ajax({
            type: "POST",
            url: "add_services.php",
            data: {
                service_name: serviceName,
                service_price: servicePrice
            },
            success: function (response) {
                $("#message").html(response); // Display response message
                $("#serviceForm")[0].reset(); // Reset form fields
            },
            error: function (xhr, status, error) {
                console.log("AJAX Error: " + status + " - " + error);
            }
        });
    });
});
</script> -->
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
    </script>
<?php
include('includes/footer.php');
?>
