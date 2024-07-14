<?php
require 'header.php';
require 'includes/conn.php';
if(isset($_POST['subs']))
{
    $email=$_POST['subscribe'];

    $sqlemail="INSERT INTO subs(email)VALUES('$email')";
    mysqli_query($connection,$sqlemail);
    echo '<script type="text/javascript">';
    echo 'alert("Thank you for Subscribing with our News")';
    echo '</script>';
}
$sqlcount="SELECT * FROM product";
$resultcount=mysqli_query($connection,$sqlcount);
$productcount=mysqli_num_rows($resultcount);

$sqlcount1="SELECT * FROM users WHERE usertype='Other User'";
$resultcount1=mysqli_query($connection,$sqlcount1);
$usercount=mysqli_num_rows($resultcount1);

$sqlcount11="SELECT * FROM orders";
$resultcount11=mysqli_query($connection,$sqlcount11);
$soldorders=mysqli_num_rows($resultcount11);
?>
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/about.png);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase">About Us</h6>
                        <h1 class="mb-4">Welcome to <span class="text-primary text-uppercase">Buy/Sell Online System</span></h1>
                        <p class="mb-4">A buy/sell online system is a digital platform that allows users to buy and sell goods and services online. The system is a website connects buyers and sellers from all over the world. Here's how it typically works:</p>
                        <ul>
                            <li>To use the System one must Register</li>
                            <li>Once registered, user can List their Products</li>
                            <li>Search and Purchase</li>
                            <li>Do the Payment</li>
                            <li>Shipping</li>
                            <li>Give us Feedback</li>
                        </ul>
                        <div class="row g-3 pb-4">
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up"><?php echo $productcount?></h2>
                                        <p class="mb-0">Products</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up"><?php echo $usercount?></h2>
                                        <p class="mb-0">Customers</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up"><?php echo $soldorders?></h2>
                                        <p class="mb-0">Sold Products</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-12 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="img/abt.jpg" style="margin-top: 1%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="row justify-content-center">
                <div class="col-lg-10 border rounded p-1">
                    <div class="border rounded text-center p-1">
                        <div class="bg-white rounded text-center p-5">
                            <h4 class="mb-4">Subscribe Our <span class="text-primary text-uppercase">Newsletter</span></h4>
                            <form action="" method="POST">
                            <div class="position-relative mx-auto" style="max-width: 400px;">
                                <input class="form-control w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email" name="subscribe">
                                <button type="submit" class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2" name="subs">Submit</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        require 'footer.php';
    ?>