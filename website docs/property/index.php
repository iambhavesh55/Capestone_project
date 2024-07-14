<?php
    require 'header.php';
    require 'includes/conn.php';

    $sql= "SELECT * FROM product ORDER BY created_at DESC LIMIT 5";
    $result=mysqli_query($connection,$sql);

    $sql1= "SELECT * FROM product WHERE product_status='Not Sold' ORDER BY created_at DESC LIMIT 12";
    $result1=mysqli_query($connection,$sql1);

    $sql2= "SELECT * FROM product WHERE product_status='Not Sold' ORDER BY created_at DESC LIMIT 6";
    $result2=mysqli_query($connection,$sql2); 

    /*$sql1= "SELECT * FROM product ORDER BY created_at DESC";
$result1=mysqli_query($connection,$sql1);*/

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
  
        <div class="container-fluid p-0 mb-5">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    
                    <div class="carousel-item active">
                        <img class="w-100" src="img/home.jpg" alt="Image" height="700">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Buy 🙵 Sell</h6>
                                <h5 class="display-3 text-white mb-4 animated slideInDown">With Our Number one Damaged-Repaired Products</h5>
                                <a href="service.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Shop Now</a>
                                <a href="service.php" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Our Products</a>
                            </div>
                        </div>
                    </div>
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
                    <h6 class="section-title text-center text-primary text-uppercase">Latest Products</h6>
                    <h1 class="mb-5">A Glimpse of Our <span class="text-primary text-uppercase">New Products</span></h1>
                </div>
                <div class="row g-4">
                    <?php
                        while($row1=mysqli_fetch_array($result1)){
                    ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="room-item shadow rounded overflow-hidden" >
                            <div class="position-relative">
                                <img class="img-fluid" src="<?php echo $row1['image']?>" alt="" style="height:300px;">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"><?php echo "AUD. ". $row1['price'].",  ".$row1['product_condition']?></small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0"><?php echo $row1['productname']?></h5>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-lg btn-primary rounded py-2 px-4" href="service.php">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>

        <div class="container-xxl py-5 px-0 wow zoomIn" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5">
                        <h6 class="section-title text-start text-white text-uppercase mb-3">Buy 🙵 Sell</h6>
                        <h1 class="text-white mb-4">Discover Our Products</h1>
                        <p class="text-white mb-4">Buying and selling second-hand electronics has become a popular trend in recent years due to the cost-effectiveness and environmental benefits:</p><ul style="color:#fff">
                            <li>We Research</li>
                            <li>Find a Reliable Seller</li>
                            <li>We Carry out Inspection</li>
                            <li>Negotiate, and</li>
                            <li>Purchase</li>
                        </ul>
                        <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">BUY</a>
                        <a href="" class="btn btn-light py-md-3 px-md-5">SELL</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="video">
                        <img src="img/buy.jpg" width="650" >
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Single Products</h6>
                </div>
                <div class="row g-4">
                    <?php
                    while($rows1=mysqli_fetch_array($result2)){?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="service-item rounded" href="singleproduct.php?view=<?php echo $rows1['id']?>">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <img src="<?php echo $rows1['image']?>" width="60" height="60">
                                </div>
                            </div>
                            <h5 class="mb-3"><?php echo $rows1['productname']?></h5>
                            <p class="text-body mb-0"><?php echo"AUD. ". $rows1['price']?></p>
                        </a>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>

        <div class="container-xxl testimonial my-5 py-5 bg-dark wow zoomIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="owl-carousel testimonial-carousel py-5">
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>I bought this laptop and I'm very impressed with its speed and overall performance. It's also very easy to use and navigate. The only downside is that the battery life is not as long as I would have liked.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>This smartwatch is fantastic! It has all the features I need, including heart rate monitoring and fitness tracking. The battery life is also excellent. The only thing I wish it had was a bigger screen.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>I had some issues with the software on this tablet, but the customer support team was very responsive and helped me resolve the issue quickly. Overall, I'm very happy with the product and the level of support I received.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
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