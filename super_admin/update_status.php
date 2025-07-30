<?php
include 'session.php';


// if (isset($_POST['id']) && isset($_POST['status'])) {
//     $id = intval($_GET['id']);
//     $status = mysqli_real_escape_string($conn, $_GET['status']);

//     $update = "UPDATE enquiry_message SET status = '$status' WHERE id = $id";
//     mysqli_query($conn, $update);
// }



if (isset($_POST['id']) && isset($_POST['status'])) {
    $id = intval($_POST['id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $update = "UPDATE enquiry_message SET status = '$status' WHERE id = $id";
    if (mysqli_query($conn, $update)) {
        echo "Status updated successfully.";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
?>






