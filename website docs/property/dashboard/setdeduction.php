<?php
require 'adminhead.php';
require '../includes/conn.php';

if(isset($_POST['setdeduction']))
{
    $amount=$_POST['deduct'];
    $sqlamount="INSERT INTO deductions(amount)VALUES('$amount')";
    mysqli_query($connection,$sqlamount);
}
?>
 <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                   <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>Product Deductions</strong></div>
                            <div class="card-body card-block">
                            	<form method="POST" action="">
                                <div class="form-group"><label for="company" class=" form-control-label">Amount to Deduct</label><input type="text" id="company" name="deduct" placeholder="Enter Amount to Deduct" class="form-control">
                                </div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="setdeduction">Set Product(s) Deduction</button>
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