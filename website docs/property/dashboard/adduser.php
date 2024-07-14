<?php
require 'adminhead.php';
require '../includes/conn.php';

if(isset($_POST['usercreate']))
{
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $phonenumber=$_POST['contact'];
    $address=$_POST['address'];
    $usertype=$_POST['usertype'];
    $password=$_POST['password'];

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
        $sql1="INSERT INTO users(fullname,email,phone_number,address,usertype,password)VALUES('$fullname','$email','$phonenumber','$address','$usertype','$passwordHash')";
        mysqli_query($connection,$sql1);
        echo '<script type="text/javascript">';
        echo 'alert("User Account Created Successfully")';
        echo '</script>';
      }
}
?>
 <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                   <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>User Account Details</strong></div>
                            <div class="card-body card-block">
                            	<form method="POST" action="">
                                <div class="form-group"><label for="company" class=" form-control-label">Full Name</label><input type="text" id="company" placeholder="Enter your fullname" name="fullname" class="form-control" required>
                                </div>
                                <div class="form-group"><label for="vat" class=" form-control-label">Email</label><input type="email" id="vat" placeholder="Enter your Email Address" name="email" class="form-control" required>
                                </div>
                                <div class="form-group"><label for="street" class=" form-control-label">Contact Number</label><input type="number" id="street" placeholder="Enter your Contact Number" name="contact" class="form-control" required>
                                </div>
                                <div class="form-group"><label for="city" class=" form-control-label">Physical Address</label><input type="text" id="city" placeholder="Enter your Physical Address" name="address" class="form-control" required>
                                 </div>
                                 <div class="form-group"><label for="postal-code" class=" form-control-label">User Type</label>
                                    <select class="form-control" name="usertype">
                                        <option selected disabled>Please Select UserType</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Other User">Buyer/Sell</option>
                                    </select>
                                </div>
                                <div class="form-group"><label for="country" class=" form-control-label">Password</label><input type="password" id="country" placeholder="Enter your password" name="password" class="form-control" required>
                                </div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="usercreate">Add New User</button>
                            </form>
                            </div>
                        </div>
                    </div>

                   
                </div>

            </div>


        </div><!-- .animated -->
<?php
require 'adminfooter.php';
?>