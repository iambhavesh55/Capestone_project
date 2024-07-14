<?php
session_start();
require 'includes/conn.php';
if(isset($_POST['register'])){
  $fullname = preg_replace("#[^\w]#", "", $_POST['fname']);
  $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
  $phonenumber = preg_replace("#[^\w]#", "", $_POST['pnumber']);
  $password = preg_replace("#[^\w]#", "", $_POST['password']);
  $address=$_POST['address'];
  
//checking if user with same email exists.
  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($connection,$sql);
  $resultcheck = mysqli_num_rows($result);

  if($resultcheck > 0){
    echo '<script type="text/javascript">';
    echo 'alert("Email address already exists")';
    echo '</script>';
  }else{
    //encrypting the password.
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $sql1="INSERT INTO users(fullname,email,phone_number,address,usertype,password)VALUES('$fullname','$email','$phonenumber','$address','Other User','$passwordHash')";
    mysqli_query($connection,$sql1);
    echo '<script type="text/javascript">';
    echo 'alert("User Account Created Successfully")';
    echo '</script>';
    $_SESSION["email"]=$email;
    header("location:login.php");
    //exit();
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/login.css" rel="stylesheet">
	<title>Register | Buy | Sell | System</title>
</head>
<body>
<form class="login" action="" method="POST">
  <h2>Create User Account</h2>
  <input type="text" placeholder="Enter User Full Name" name="fname" required />
  <input type="email" placeholder="Enter User Email" name="email" required />
  <input type="number" placeholder="Enter User Phone Number" name="pnumber" required />
  <input type="text" placeholder="Enter Your House|Physical Address" name="address" required />
  <input type="password" placeholder="Enter User Password" name="password" required />
  <input type="submit" value="Add New User" name="register" />
  <div class="links">
    <a href="#">Already Have Account?</a>
    <a href="login.php">Login</a>
  </div>
</form>
</body>
</html>
