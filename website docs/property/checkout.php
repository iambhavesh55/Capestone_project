<?php
require 'header.php';
require 'includes/conn.php';

$uid="";
if(isset($_SESSION["email"])){
    $email=$_SESSION['email'];
    $sql="SELECT * FROM users WHERE email='$email'";
    $result=mysqli_query($connection,$sql);
    while($row=mysqli_fetch_array($result))
        {
            $uid=$row['id'];
        }
}

if(isset($_POST['ship']))
{
	/*$total=$_POST['totals'];
    $orderdata=[];

	$sql6="SELECT product.id as pid,product.productname,product.price,orders.id as oid,orders.user_id,orders.quantity,orders.amount FROM product JOIN orders ON product.id=orders.product_id WHERE orders.user_id='$uid' AND orders.payment_status='Not Paid'";
	$result6=mysqli_query($connection,$sql6);

	while($row6=mysqli_fetch_array($result6)){
		$orderdata=[$row6];
	}
        /*$orderid= $orderdata['oid'];
        $productid=$orderdata['pid'];
        if(isset($_POST['ship'])){
            $cardnumber=$_POST['cardnumber'];
            $holdername=$_POST['holdername'];
            $month=$_POST['mm'];
            $year=$_POST['yyyy'];
            $cvv=$_POST['cvv'];
            $note=$_POST['deliverynote'];
            $address=$_POST['address'];

            $sql7="INSERT INTO payments(user_id,order_id,product_id,total,card_number,holder_name,month,year,cvv,delivery_note,address)VALUES('$uid','$orderid','$productid','$total','$cardnumber','$holdername','$month','$year','$cvv','$note','$address')";
            mysqli_query($connection,$sql7);*/

            echo '<script type="text/javascript">';
            echo 'alert("Thank you for shopping with us, we will process your Order")';
            echo '</script>';

        //}
}
if(isset($_POST['subs']))
{
    $email=$_POST['subscribe'];

    $sqlemail="INSERT INTO subs(email)VALUES('$email')";
    mysqli_query($connection,$sqlemail);
    echo '<script type="text/javascript">';
    echo 'alert("Thank you for Subscribing with our News")';
    echo '</script>';
}
?>
      <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/checkout.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Checkout</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Payment-Shipping Details</h6>
                </div>
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form action="" method="POST">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" placeholder="Enter Your Card Number" name="cardnumber">
                                            <label for="name">Card Number</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" placeholder="Enter Card Holder Name" name="holdername">
                                            <label for="email">Card Holder Name</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" placeholder="MM" name="mm">
                                            <label for="subject">MM</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" placeholder="YYYY" name="yyyy">
                                            <label for="subject">YYYY</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" placeholder="CVV" name="cvv">
                                            <label for="subject">CVV</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="deliverynote" id="message" style="height: 150px"></textarea>
                                            <label for="message">Delivery Note</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="address" id="message" style="height: 150px"></textarea>
                                            <label for="message">House Address</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" name="ship" type="submit">Submit Shipping Information</button>
                                    </div>
                                </div>
                            </form>
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