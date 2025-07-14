<?php
include 'session.php';
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
echo "<script> window.location.href = 'admin2'; </script>";
}
else{
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
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <form class ="" action="" method= "post" >
    <h3>LOGIN TO CONTINUE</h3>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name="submit"class="btn btn-primary">LOGIN</button>
</form>
</body>
</html>