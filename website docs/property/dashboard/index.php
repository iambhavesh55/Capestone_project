<?php
session_start();
require 'header.php';
require '../includes/conn.php';
if(!isset($_SESSION["email"])){
    header("Location:../login.php");
}
$email=$_SESSION['email'];
$uid="";
$sql="SELECT * FROM users WHERE email='$email'";
$result=mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($result)){
    $uid=$row['id'];
    }

$sqlcount1="SELECT * FROM product WHERE user_id='$uid'";
$resultcount1=mysqli_query($connection,$sqlcount1);
$productcount=mysqli_num_rows($resultcount1);

$sqlcount2="SELECT * FROM orders WHERE user_id='$uid'";
$resultcount2=mysqli_query($connection,$sqlcount2);
$ordercount=mysqli_num_rows($resultcount2);

$sqlcount3="SELECT * FROM users WHERE usertype='Other User'";
$resultcount3=mysqli_query($connection,$sqlcount3);
$ordercount3=mysqli_num_rows($resultcount3);

$sqlcount4="SELECT SUM(amount) AS totals FROM orders  WHERE user_id='$uid'";
$resultcount3=mysqli_query($connection,$sqlcount4);
$ordercount4="";
while($row9=mysqli_fetch_array($resultcount3))
{
    $ordercount4=$row9['totals'];
}
?>     
<div class="content" >
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row" >
                    <div class="col-lg-3 col-md-6">
                        <div class="card" style="background-color:#0A2A29;color"#fff>
                            <div class="card-body" >
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $ordercount4?></span></div>
                                            <div class="stat-heading">Total Amount Spent</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card" style="background-color:#0B173B;color"#fff>
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $ordercount?></span></div>
                                            <div class="stat-heading">Orders</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card" style="background-color:#0B4C5F;color"#fff>
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-browser"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $productcount?></span></div>
                                            <div class="stat-heading">Products</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card" style="background-color:#070719;color"#fff>
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $ordercount3?></span></div>
                                            <div class="stat-heading">Buyers/Sellers</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                
                <div class="clearfix"></div>
                
            </div>
            <!-- .animated -->
        </div>
    </div>
        <?php
        require 'footer.php';
    ?>