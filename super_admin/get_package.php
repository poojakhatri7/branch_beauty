
<?php
include 'session.php';
if (isset($_POST['package_number'])) {
    $package_number = intval($_POST['package_number']);

    // Step 1: Get the first row to fetch common package details
    $main_sql = "SELECT * FROM package1 WHERE package_number = {$package_number} ";
     $main_result = mysqli_query($conn, $main_sql);

    
    if ($row = mysqli_fetch_assoc($main_result)) {
        // Step 2: Get all services for this package_number
        $services = [];
          $total_price = 0;
        $total_discount = 0;
        $total_price_after_discount = 0;
        // $service_sql = "SELECT * FROM package1 WHERE package_number = {$package_number}";
        $service_sql = "
    SELECT 
        p1.package_name,
        p1.package_number,
        p1.description,
        p1.discount,
        p1.file,
        ps.service_name,
        ps.price,
        ps.price_after_discount
    FROM 
        package1 p1
    INNER JOIN 
        package_services ps ON p1.id = ps.package_id
    WHERE 
        p1.package_number = {$package_number}
";

        $service_result = mysqli_query($conn, $service_sql);
        
        while ($s = mysqli_fetch_assoc($service_result)) {
            $services[] = $s['service_name'];
             $total_price += $s['price'];
            $total_discount += $s['discount'];
            $total_price_after_discount += $s['price_after_discount'];
        }
        echo json_encode([
            'package_name' => $row['package_name'],
            'description' => $row['description'],
            'selected_services' => implode(', ', $services), // All services combined
             'price' =>  $total_price , // You can change to show total if needed
               'discount' => $row['discount'], // You can change to show total if needed
            'price_after_discount' => $total_price_after_discount // You can change to show total if needed
        ]);
    } else {
        echo json_encode(['error' => 'Package not found']);
    }
} else {
    echo json_encode(['error' => 'No package_number received']);
}
?>


