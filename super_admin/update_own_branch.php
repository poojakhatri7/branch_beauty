<?php
include 'session.php';

if (isset($_POST['id']) && isset($_POST['own_branch'])) {
    $id = $_POST['id'];
    $own_branch = $_POST['own_branch']; // 'Yes' or 'No'

    // Basic sanitization
    $id = (int)$id; // force integer
    $own_branch = mysqli_real_escape_string($conn, $own_branch);

    $sql = "UPDATE branch_details SET own_branch = '$own_branch' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }

    mysqli_close($conn);
} else {
    echo "invalid";
}
?>
