<?php
session_start();
include 'db_connection.php';

if (isset($_SESSION["name"])) {
   header("Location: index.php");
   exit();
}
// include 'db_connection.php';

if(isset($_POST["submit"]))
{
  
  $email = $_POST["email"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM `admin_login_details` WHERE email = '$email'");
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result)>0)
  {
if($password== $row["password"])
{
   
$_SESSION["login"] = true ;
$_SESSION["id"] = $row["id"];
$_SESSION["name"] = $row["name"];
$_SESSION["mobile"] = $row["mobile"];
$_SESSION["email"] = $row["email"];
$_SESSION["address"] = $row["address"];
$_SESSION["user_role"] = (int)$row["role"];
// if ((int)$row["role"] == 1) {
//     session_name("admin_session");
// } else {
//     session_name("staff_session");
// }
 
echo "<script> window.location.href = 'admin2'; </script>";
}
else {
  echo
  "<script> alert('wrong password') </script>";
}
  }
  else{
    echo
    "<script> alert('User not registered') </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Beauty Parlour Management System</title>
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
            color:rgb(12, 62, 82);
        }

        .form-control {
            margin-bottom: 20px;
            border-radius: 4px;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .btn-primary {
            background-color:rgb(56, 89, 121);
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
        .Home {
            text-align: center;
            margin-top: 10px;
        }

        .forgot-password a {
            color:rgb(40, 85, 99);
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
            <h2> Admin Login </h2>
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
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
            </form>
            <!-- <div class="forgot-password">
                <a href="#">Forgot Password?</a>
            </div> -->
            <div class="Home">
                <a href="/beauty_parlour_management_system/">Home</a>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 Beauty Parlour Management System. All rights reserved.</p>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
