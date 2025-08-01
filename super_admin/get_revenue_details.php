<?php
include 'session.php';

if (isset($_POST['admin_details'])) {
    $admin_details = intval($_POST['admin_details']);

    $main_sql = "SELECT * FROM admin_login_details WHERE id = $admin_details";
    $main_result = mysqli_query($conn, $main_sql);

    if ($row = mysqli_fetch_assoc($main_result)) {
        echo json_encode([
            'name' => $row['name'],
            'mobile' => $row['mobile'],
            'email' => $row['email'],
            'address' => $row['address']
        ]);
    } else {
        echo json_encode(['error' => 'Admin not found']);
        exit;
    }
} else {
    echo json_encode(['error' => 'No admin_details received']);
    exit;
}



// code to fetch toggle button status 


// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $action = $_POST['action'];

//     if ($action === 'toggle_status') {
//         $branchId = intval($_POST['branch_id']);
//         $newStatus = $_POST['new_status'];

//         $update = "UPDATE branch_details SET status = '$newStatus' WHERE id = $branchId";
//         if (mysqli_query($conn, $update)) {
//             echo json_encode(['success'=>true]);
//             exit;
//         } else {
//             echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
//             exit;
//         }
//     }
// }
?>

