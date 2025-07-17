<?php
include 'session.php';
$response = [
    'success' => false,
    'message' => 'No customer found'
];

if (isset($_POST['mobile'])) {
    $mobile = $_POST['mobile'];
    
    // Query to fetch customer details based on the mobile number
    $sql = "SELECT * FROM users WHERE mobile = '$mobile' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // Customer found, return data as JSON
        while ($row = mysqli_fetch_assoc($result)) {
            $response = [
                'success' => true,
                'name' => $row['name'],
                'email' => $row['email'],
                'address' => $row['address']
            ];
        }
    }
}
// Output the response as JSON
echo json_encode($response);
// Close the database connection
$conn->close();
?>