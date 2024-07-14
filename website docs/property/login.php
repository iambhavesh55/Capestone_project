
<?php
session_start();
/*if(isset($_SESSION['email'])){
  header("location:dashboard.php");
}*/
require 'includes/conn.php';
if(isset($_POST['login'])){
  $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
  $password=preg_replace("#[^\w]#", "", $_POST['password']);
  $usertype=preg_replace("#[^\w]#", "", $_POST['usertype']);

  $sql="SELECT * FROM users WHERE email='$email'";
  $result=mysqli_query($connection,$sql);
  $resultcheck=mysqli_num_rows($result);

  if($resultcheck>0){
    while($row=mysqli_fetch_array($result)){
      if(password_verify($password, $row['password']) && ($row['usertype']=="Admin")){
        $_SESSION["email"]=$email;
        header("location:dashboard/dashboard.php");
        //exit();
      }
      elseif(password_verify($password, $row['password']) && ($row['usertype']=="Other User")){
        $_SESSION["email"]=$email;
        header("location:dashboard");
        //exit();
      }
      else{
    echo '<script type="text/javascript">';
    echo 'alert("Wrong Password")';
    echo '</script>';
}
    }
  } 
else{
    echo '<script type="text/javascript">';
    echo 'alert("Email Not Existing")';
    echo '</script>';
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/login.css" rel="stylesheet">
	<title>Login | Buy | Sell | System</title>
</head>
<body>
<form class="login" action="" method="POST">
  <h2>Welcome, Client!</h2>
  <p>Please Enter Login Credentials</p>
  <select name="usertype" required>
  	<option selected disabled>Please Choose System user</option>
  	<option value="Admin">Admin</option>
  	<option value="Other User">Buyer/Seller</option>
  </select>
  <input type="email" placeholder="Enter User Email" name="email" required />
  <input type="password" placeholder="Enter User Password" name="password" required />
  <input type="submit" value="Log In" name="login" />
  <div class="links">
    <a href="forgot.php">Forgot password</a>
    <a href="register.php">Register</a>
  </div>
</form>
</body>
</html>
