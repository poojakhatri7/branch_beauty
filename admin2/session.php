<?php
session_start();
 include '../db_connection.php';

 if (!isset($_SESSION["name"])) {
  header("Location: ../login_page");
  exit();
}
?>
