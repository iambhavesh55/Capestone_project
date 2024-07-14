<?php
require 'header.php';
require 'includes/conn.php';

if(isset($_REQUEST['view'])){
    $id=intval($_GET['view']);

    $sqlsingle="SELECT product.id as pid,product.productname,product.price,product.image,product.description,product.product_condition,users.fullname,users.phone_number,users.address FROM product JOIN users ON product.user_id=users.id WHERE product.id='$id'";
    $resultsingle=mysqli_query($connection,$sqlsingle);
}
?>
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/about.png);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Product Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Single Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                	<?php
                	while($rosingle=mysqli_fetch_array($resultsingle))
                		{ ?>
                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase">Product Details</h6>
                        <h1 class="mb-4"><span class="text-primary text-uppercase"><?php echo $rosingle['productname']?></span></h1>
                        <p class="mb-4"><?php echo $rosingle['description']?></p>
                        <div class="row g-3 pb-4">
                            <div class="col-sm-5 wow fadeIn" data-wow-delay="0.1s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up"><?php echo $rosingle['price']?></h2>
                                        <p class="mb-0">Price(AUD)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5 wow fadeIn" data-wow-delay="0.3s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" ><?php echo $rosingle['product_condition']?></h2>
                                        <p class="mb-0">Condition</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5 wow fadeIn" data-wow-delay="0.5s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" ><?php echo $rosingle['fullname']?></h2>
                                        <p class="mb-0">Owner</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-12 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="<?php echo $rosingle['image']?>" style="margin-top: 15%;">
                            </div>
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
                            <div class="position-relative mx-auto" style="max-width: 400px;">
                                <input class="form-control w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                                <button type="button" class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        require 'footer.php';
    ?>