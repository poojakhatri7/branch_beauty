
<?php
include 'db_connection.php';

if (isset($_POST['service_number'])) {
    $service_number = intval($_POST['service_number']);

    $sql = "SELECT * FROM all_services WHERE a_id = $service_number";
    $result = mysqli_query($conn, $sql);


    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $images = [];
        if (!empty($row['file']))  $images[] = "admin2/" . $row['file'];
        if (!empty($row['file1'])) $images[] = "admin2/" . $row['file1'];
        if (!empty($row['file2'])) $images[] = "admin2/" . $row['file2'];

        echo json_encode([
            'images' => $images,
            'all_service' => $row['all_service'],
            'price' => $row['price'],
             'price_after_discount' => $row['price_after_discount'],
               'discount_percentage' => $row['discount_percentage'],
            'description' => $row['description']
        ]);
    } else {
        echo json_encode(['error' => 'Service not found']);
    }
} else {
    echo json_encode(['error' => 'No service_number received']);
}
?>



