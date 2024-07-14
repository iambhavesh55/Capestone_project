<?php
require 'header.php';
require 'includes/conn.php';

$sql1= "SELECT * FROM product ORDER BY created_at DESC";
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

$sql2="SELECT product.id as pid,product.productname,product.price,cart.id as cid,cart.user_id,cart.quantity FROM product JOIN cart ON product.id=cart.product_id WHERE cart.user_id='$uid'";
$result2=mysqli_query($connection,$sql2);

if(isset($_POST['order']))
{
    $userid=$_POST['uid'];
    $productid=$_POST['pid'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $amount=($price*$quantity);
    $cartid=$_POST['cid'];

    $sql3="INSERT INTO orders(user_id,product_id,quantity,amount)VALUES('$userid','$productid','$quantity','$amount')";
    mysqli_query($connection,$sql3);

    $sqlprostats="UPDATE product SET product_status='Sold' WHERE id='$productid'";
    mysqli_query($connection,$sqlprostats);

    $sql4="DELETE FROM cart WHERE id='$cartid'";
   mysqli_query($connection,$sql4);
   echo '<script type="text/javascript">';
   echo 'alert("Order Placed Successfully")';
    echo '</script>';

   //delete cart.
/*if(isset($_REQUEST['delete'])){
    $id=intval($_GET['delete']);

    $sql5="DELETE FROM cart WHERE id='$id'";
    mysqli_query($connection,$sql5);
}*/
/*if(isset($_POST['remove']))
{
    $id=$_POST['cid'];
    $sql5="DELETE FROM cart WHERE id='$id'";
    mysqli_query($connection,$sql5);
}*/
}
if(isset($_REQUEST['delete'])){
    $id=intval($_GET['delete']);

    $sql5="DELETE FROM cart WHERE id='$id'";
    mysqli_query($connection,$sql5);
    echo '<script type="text/javascript">';
   echo 'alert("Product Removed from Cart Successfully")';
    echo '</script>';


}
?>
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/products.png);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">My Cart</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">My Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="row justify-content-center">
                <div class="col-lg-12 border rounded p-1">
                    <div class="border rounded text-center p-1">
                        <div class="bg-white rounded text-center p-5">
                            <h4 class="mb-4">My <span class="text-primary text-uppercase">Cart</span></h4>
                            <div class="position-relative mx-auto" style="max-width: 1050px;">
                                
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while($row2=mysqli_fetch_array($result2)){
                                            ?>
                                            <tr>
                                                <form action="" method="POST">
                                                <td><?php echo $row2['productname']?></td>
                                                <td><input type="text" readonly name="price" value="<?php echo $row2['price']?>"></td>
                                                <td><input  type="number" name="quantity" value="<?php echo $row2['quantity']?>"></td>
                                                <td>
                                                    <input type="hidden" name="uid" value="<?php echo $row2['user_id']?>">
                                                    <input type="hidden" name="pid" value="<?php echo $row2['pid']?>">
                                                    <input type="hidden" name="cid" value="<?php echo $row2['cid']?>">
                                                    <button  type="submit" class="btn btn-sm btn-primary" name="order" value="<?php echo $row2['cid']?>">Order</button>
                                                    <a href="mycart.php?delete=<?php echo $row2['cid']?>" class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                                </form>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require 'footer.php';
        ?>