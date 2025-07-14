<?php
include 'db_connection.php';

if (isset($_POST['id'])) {
    $id = intval($_POST['id']); // Ensure it's a number for security

    // Fetch staff details by ID
    $sql = "SELECT * FROM staff_gallery WHERE id = {$id}";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Send data as JSON
        echo json_encode([
            'status' => 'success',
            'name' => $row['name'],
            'Availability' => $row['Availability'],
            'bios' => $row['Short_bio'],
            'experience' => $row['Experience']
        ]);
    } else {
        // No record found
        echo json_encode([
            'status' => 'error',
            'message' => 'No staff found with this ID'
        ]);
    }
} else {
    // ID not sent
    echo json_encode([
        'status' => 'error',
        'message' => 'ID not provided'
    ]);
}
?>
