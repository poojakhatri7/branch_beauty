<?php
session_start();
include 'db_connection.php';
include 'asset.php';


// Redirect if already logged in
// if (isset($_SESSION["name"])) {
//     header("Location: login_page.php");
//     exit();
// }
if (isset($_SESSION["name"])) {
    if (isset($_SESSION["user_role"])) {
      
        header("Location: admin2");
    } else {
        // It's a user
        header("Location: user");
    }
    exit();
}

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // 1. Check admin table
    $admin_result = mysqli_query($conn, "SELECT * FROM `admin_login_details` WHERE email = '$email'");
    if (mysqli_num_rows($admin_result) > 0) {
        $admin = mysqli_fetch_assoc($admin_result);
        if ($password == $admin["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $admin["id"];
            $_SESSION["name"] = $admin["name"];
            $_SESSION["mobile"] = $admin["mobile"];
            $_SESSION["email"] = $admin["email"];
            $_SESSION["address"] = $admin["address"];
            $_SESSION["gst_number"] = $admin["gst_number"];
            $_SESSION["user_role"] = (int)$admin["role"];

            echo "<script> window.location.href = 'admin2'; </script>";
            exit();
        } else {
            echo "<script> alert('Wrong password ');  window.location.href = 'login_page'; </script>";
            exit();
        }
    }

    // 2. Check user table
    $user_result = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'");
    if (mysqli_num_rows($user_result) > 0) {
        $user = mysqli_fetch_assoc($user_result);
        if ($password == $user["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $user["id"];
            $_SESSION["name"] = $user["name"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["mobile"] = $user["mobile"];
            $_SESSION["address"] = $user["address"];

            echo "<script> window.location.href = 'user'; </script>";
            exit();
        } else {
            echo "<script> alert('Wrong password for user');  window.location.href = 'login_page'; </script>";
            exit();
        }
    }

    // Not found in either
    echo "<script> alert('User not registered');  window.location.href = 'login_page'; </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   	<title> Login | <?php echo $brand_name ;   ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* background: #f4f4f9; */
            font-family: 'Arial', sans-serif;
            background-image: url('./images/login5.jpg');

display: flex;
justify-content: center;
align-items: center;
height: 100vh;
background-attachment: fixed;  
background-repeat: no-repeat;
background-size: cover;
        }

        .login-container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-form {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #5a2d77;
        }

        .form-control {
            margin-bottom: 20px;
            border-radius: 4px;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .btn-primary {
            background-color: #5a2d77;
            border: none;
            padding: 10px 20px;
            width: 100%;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #42185e;
        }

        .forgot-password {
            text-align: center;
            margin-top: 10px;
        }

        .forgot-password a {
            color: #5a2d77;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .footer {
            text-align: center;
            position: absolute;
            bottom: 10px;
            width: 100%;
            color: #777;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h2>Login</h2>
            <form class ="" action="" method= "post" >
                <!-- Email field -->
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" >
                </div>
                <!-- Password field -->
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter your password">
                </div>
                <!-- Submit button -->
                <!-- <button type="submit" name="submit" class="btn btn-primary">Login</button> -->                  
<!-- <a href='/beauty_parlour_management_system/user'> -->
    <button type="submit" name="submit" class="btn btn-primary">Login</button>
</a>

            </form>
            <div class="forgot-password" style="text-align: center;">
    <p style="display: inline; margin-right: 5px;">Don't have an account?</p>
    <a href="user_registration" 
       style="text-decoration: none; color: #5a2d77; font-weight: bold;">
        Sign up
    </a>
</div>

         
            <div class="forgot-password">
                <a href="./">Home</a>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2025 Beauty Parlour Management System. All rights reserved.</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

