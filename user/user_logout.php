<?php
include 'user_session.php';
session_unset();
session_destroy();
 header("Location: ../login_page");
//  header("Location: /beauty_parlour_management_system/admin2/admin_login1.php");
?>