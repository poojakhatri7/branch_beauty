<?php
include 'user_session.php';

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
.manage_services{
  background :rgb(33, 70, 77) !important;
}
</style>
  </head>
  <body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="content-wrapper">
  
    <div class="content-header">
      <div class="container-fluid">
      
      </div>
    </div>
    <div class="container-fluid">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    <div class="card">
    <div class="card-header">
        <h5 class="m-0">SERVICES AVAILABLE</h5>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead style="background-color: rgb(51, 139, 139);">
                <tr> 
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">S No.</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Service Name</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Service Price</th>
                </tr>
            </thead>

            <tbody>
                <?php
                // Query to fetch services
                $sql = "SELECT * FROM tb_services";
                $result = mysqli_query($conn, $sql);
                $count = 0;

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $count++;
                        ?>
                        <tr>
                            <th scope="row"><?php echo $count; ?></th>
                            <td><?php echo $row['service_name']; ?></td>
                            <td><?php echo $row['service_price']; ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No services found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>



  </body>
</html>
<?php
include('includes/footer.php');
?>
