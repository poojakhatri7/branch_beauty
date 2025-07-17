<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ids = $_POST['id'];
    $open_times = $_POST['open_time'];
    $close_times = $_POST['close_time'];

    for ($i = 0; $i < count($ids); $i++) {
        $id = mysqli_real_escape_string($conn, $ids[$i]);
        $open = mysqli_real_escape_string($conn, $open_times[$i]);
        $close = mysqli_real_escape_string($conn, $close_times[$i]);

        $sql = "UPDATE business_hours SET open_time='$open', close_time='$close' WHERE id=$id";
       $result = mysqli_query($conn, $sql);
    }
    if ($result) {
         echo "<script>alert('business hour changed successfully'); window.location.href='business_hour.php';</script>";
    } else {
         echo "<script>alert('Error in changing business hour'); window.location.href='business_hour.php';</script>";
    }

}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style type="text/css">
.business_hour {
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
            <h4 class="m-0">Business hours </h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
          
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 
  <div class="container-fluid">

  <div class="card card-info">
    <div class="card-header" style="background-color: rgb(51, 139, 139);">
      <h3 class="card-title">Update Business Hours</h3>
    </div>

    <!-- form start -->
    <form method="POST">
      <table class="table">
        <thead>
          <tr>
            <th>Day</th>
            <th>Open Time</th>
            <th>Close Time</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $result = mysqli_query($conn, "SELECT * FROM business_hours ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')");
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
                <td><input type='hidden' name='id[]' value='{$row['id']}'>{$row['day']}</td>
                <td><input type='time' name='open_time[]' value='{$row['open_time']}' class='form-control'></td>
                <td><input type='time' name='close_time[]' value='{$row['close_time']}' class='form-control'></td>
              </tr>";
            }
          ?>
        </tbody>
      </table>
      <div class="card-footer">
        <button type="submit" class="btn"  style="background-color:rgb(51, 139, 139); font-weight: 500; font-size: 16px;  padding: 7px 20px;  color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px; ">Update Hours</button>
      </div>
    </form>
    <!-- form end -->

  </div> <!-- /.card -->

</div> <!-- /.container-fluid -->


</body>
</html>
<?php
include('includes/footer.php');
?>

