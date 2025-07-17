<?php
include 'session.php';

if (isset($_POST['service_name']) && isset($_POST['service_price'])) {
    $service_name = $conn->real_escape_string($_POST['service_name']);
    $service_price = $conn->real_escape_string($_POST['service_price']);

    // $query = "INSERT INTO tb_services (service_name, service_price) VALUES ('$service_name', '$service_price')";
    

    $checkQuery = "SELECT * FROM tb_services WHERE service_name = '$service_name'";
$result = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($result) > 0) {
    // Update existing service
    $query = "UPDATE tb_services SET service_price = '$service_price' WHERE service_name = '$service_name'";
    if(mysqli_query($conn, $query));
    {
      echo "<span style='color: green;'>Service updated successfully!</span>";
      // echo"<script> alert('Appointment successful') </script>";
    }
} else {
    // Insert new service
    $query = "INSERT INTO tb_services (service_name, service_price) VALUES ('$service_name', '$service_price')";
    if(mysqli_query($conn, $query));
    {
      echo "<span style='color:rgb(51, 139, 139)'>Service added successfully!</span>";
      // echo"<script> alert('Appointment successful') </script>";
    } 
}
}
$conn->close();
?>
