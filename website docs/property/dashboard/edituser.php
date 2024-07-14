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
    $uid=$_POST['uid'];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sqlupdate ="UPDATE users SET fullname='$fullname',email='$email',phone_number='$phonenumber',address='$address',usertype='$usertype',password='$passwordHash' WHERE id='$uid'";
    mysqli_query($connection,$sqlupdate);
}

if(isset($_REQUEST['edit'])){
    $id=intval($_GET['edit']);

    $sqledit="SELECT * FROM users WHERE id='$id'";
    $resultedit=mysqli_query($connection,$sqledit);
}
?>
 <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                   <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>Update User Account Details</strong></div>
                            <div class="card-body card-block">
                            	<?php
                            	while($rowedit=mysqli_fetch_array($resultedit))
                            		{?>
                            	<form method="POST" action="">
                            		<input type="hidden" name="uid" value="<?php echo $rowedit['id']?>">
                                <div class="form-group"><label for="company" class=" form-control-label">Full Name</label><input type="text" id="company" placeholder="Enter your fullname" name="fullname" class="form-control" required value="<?php echo $rowedit['fullname']?>">
                                </div>
                                <div class="form-group"><label for="vat" class=" form-control-label">Email</label><input type="email" id="vat" placeholder="Enter your Email Address" name="email" class="form-control" required value="<?php echo $rowedit['email']?>">
                                </div>
                                <div class="form-group"><label for="street" class=" form-control-label">Contact Number</label><input type="number" id="street" placeholder="Enter your Contact Number" name="contact" class="form-control" required value="<?php echo $rowedit['phone_number']?>">
                                </div>
                                <div class="form-group"><label for="city" class=" form-control-label">Physical Address</label><input type="text" id="city" placeholder="Enter your Physical Address" name="address" class="form-control" required value="<?php echo $rowedit['address']?>">
                                 </div>
                                 <div class="form-group"><label for="postal-code" class=" form-control-label">User Type</label>
                                    <select class="form-control" name="usertype">
                                    	<option selected value="<?php echo $rowedit['usertype']?>"><?php echo $rowedit['usertype']?></option>
                                        <option  disabled>Please Select UserType</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Other User">Buyer/Sell</option>
                                    </select>
                                </div>
                                <div class="form-group"><label for="country" class=" form-control-label">Password</label><input type="password" id="country" placeholder="Enter your password" name="password" class="form-control" required>
                                </div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="usercreate">Update User Details</button>
                            </form>
                        <?php } ?>
                            </div>
                        </div>
                    </div>

                   
                </div>

            </div>


        </div><!-- .animated -->
<?php
require 'adminfooter.php';
?>