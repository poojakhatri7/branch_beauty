<?php
include 'session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'toggle_status') {
        $branchId = intval($_POST['branch_id']);
        $newStatus = $_POST['new_status'];

        $update = "UPDATE branch_details SET status = '$newStatus' WHERE id = $branchId";
        if (mysqli_query($conn, $update)) {
            echo json_encode(['success'=>true]);
        } else {
            echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
        }
    }
}
?>