<?php
require 'header.php';
require 'includes/conn.php';

$sql1= "SELECT * FROM product WHERE product_status='Not Sold' ORDER BY created_at DESC";
$result1=mysqli_query($connection,$sql1);

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
if(isset($_POST['addcart']))
{
    if(isset($_SESSION["email"])){
    $productid=$_POST['pid'];
    $quantity=$_POST['quantity'];

    $sql2="INSERT INTO cart(user_id,product_id,quantity) VALUES('$uid','$productid','$quantity')";
    mysqli_query($connection,$sql2);
    }else
        {
            echo '<script type="text/javascript">';
            echo 'alert("Please Login to Shop Products")';
            echo '</script>';
        }
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
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/products.png);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Products</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Our Products</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="bg-white shadow" style="padding: 35px;">
                    <div class="row g-2">
                        <div class="col-md-10">
                                <form action="filterproduct.php" method="POST">
                            <div class="row g-12">
                                <div class="col-md-6">
                                    <select class="form-select" name="filter">
                                        <option selected disabled>Please Select Condition to view</option>
                                        <option value="Damaged Product">Damaged Product</option>
                                        <option value="Repaired Product">Repaired Product</option>
                                    </select>
                                </div>                                
                                <div class="col-md-6">
                                    <button class="btn btn-primary w-100" name="filterbutton">Filter Products</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Explore Our Products</h6>
                </div>
                <div class="row g-4">
                    <?php
                        while($row1=mysqli_fetch_array($result1)){
                    ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="room-item shadow rounded overflow-hidden">
                        <form method="POST" action="">
                            <input type="hidden" name="pid" value="<?php echo $row1['id']?>">
                            <input type="hidden" name="quantity" value="1">
                            <div class="position-relative">
                                <img class="img-fluid" src="<?php echo $row1['image']?>" alt=""style="height:300px;">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"><?php echo "AUD. ". $row1['price'].",  ".$row1['product_condition']?></small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0"><?php echo $row1['productname']?></h5>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-lg btn-primary rounded py-2 px-4" name="addcart">Add to Cart</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                <?php } ?>
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