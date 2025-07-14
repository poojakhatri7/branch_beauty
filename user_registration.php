<?php
include 'db_connection.php';
if(isset($_POST["submit"]))
{
    $name = $_POST["name"];
    $mobile =  $_POST["mobile"];
    $email =  $_POST["email"]; 
    $address =  $_POST["address"]; 
    $password =  $_POST["password"];
    // $confirmpassword =  $_POST["confirmpassword"];
//     $duplicate = mysqli_query($conn, "SELECT * FROM `users` WHERE mobile = '$mobile'");
//     if (mysqli_num_rows($duplicate)>0)
//     {
//     echo "<script> alert('Already registerted with this Mobile number ') </script>";
// }
// else 
// {
//  $query = "INSERT INTO users values ('','$name','$mobile','$email','$address',
//     '$password','')";
//     mysqli_query($conn,$query);
//  echo"<script> alert('registration successful you can login now') </script>"; 
//  echo "<script> window.location.href = 'login_page'; </script>";
// }
// Check for duplicate mobile or email
$duplicate = mysqli_query($conn, "SELECT * FROM `users` WHERE mobile = '$mobile' OR email = '$email'");

if (mysqli_num_rows($duplicate) > 0) {
    $row = mysqli_fetch_assoc($duplicate);
    
    if ($row['mobile'] == $mobile) {
        echo "<script>alert('Already registered with this Mobile number'); window.location.href = 'user_registration';</script>";
    } elseif ($row['email'] == $email) {
        echo "<script>alert('Already registered with this Email ID'); window.location.href = 'user_registration';</script>";
    }
} else {
   $query = "INSERT INTO users values ('','$name','$mobile','$email','$address', '$password','')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Registration successful! You can login now.'); window.location.href = 'login_page.php';</script>";
    } else {
        echo "<script>alert('Error occurred while registering.'); window.location.href = 'user_registration';</script>";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Parlour Registration</title>
    <style>
        /* Google Font */
        
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            /* background: url('https://source.unsplash.com/1600x900/?spa,beauty') no-repeat center center/cover; */
            /* background: url('../images/barber_01.jpg') no-repeat center center/cover; */
            /* background-image: url('image/banner-1.jpg'); */
            background-image: url('images/login5.jpg');

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-attachment: fixed;  
            background-repeat: no-repeat;
            background-size: cover;
            /* background-image: url('login.jpg'); */

        }

        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            width: 350px;
            backdrop-filter: blur(8px);
        }

        .form-container h2 {
            text-align: center;
            color: #42185e;
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 12px;
        }

        .form-group label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        .form-group input:focus {
            border-color: #d63384;
            outline: none;
            box-shadow: 0px 0px 5px rgba(214, 51, 132, 0.5);
        }

        .submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #42185e;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #b82a6d;
        }

        /* Responsive Design */
        @media (max-width: 400px) {
            .form-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Register Now</h2>
         <form class ="" action="" method= "post" onsubmit="return validateMobile();">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Number:</label>
                <input type="text" id="mobile" name="mobile" required>
            </div>
              <span id="mobileError" style="color: red;"></span>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="submit" class="submit-btn">Create Account</button>
            <div class="form-group" style="text-align: center; margin-top: 10px;">
        <a href="login_page">Already have a account</a>
            </div>
        </form>
    </div>
    <script>
function validateMobile() {
    var mobile = document.getElementById("mobile").value;
    var error = document.getElementById("mobileError");

    if (!/^\d{10}$/.test(mobile)) {
        error.textContent = "Please enter exactly 10 digits.";
        return false; // prevent form submission
    }

    error.textContent = ""; // clear error if valid
    return true;
}
</script>
</body>
</html>
