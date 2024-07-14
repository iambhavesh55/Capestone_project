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

$sql2="SELECT product.id as pid,product.productname,product.price,orders.id as oid,orders.user_id,orders.quantity,orders.amount FROM product JOIN orders ON product.id=orders.product_id WHERE orders.user_id='$uid' AND orders.payment_status='Paid'";
$result2=mysqli_query($connection,$sql2);

$sqlcount="SELECT SUM(amount) AS totals FROM orders WHERE user_id='$uid' AND orders.payment_status='Paid'";
$resultcount=mysqli_query($connection,$sqlcount);


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

    $sql4="DELETE FROM cart WHERE id='$cartid'";
   mysqli_query($connection,$sql4);

   //delete cart.
if(isset($_REQUEST['delete'])){
    $id=intval($_GET['delete']);

    $sql5="DELETE FROM cart WHERE id='$id'";
    mysqli_query($connection,$sql5);
}
}
?>
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/products.png);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">My Orders</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">My Orders</li>
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
                            <h4 class="mb-4">My <span class="text-primary text-uppercase">Orders</span></h4>
                            <div class="position-relative mx-auto" style="max-width: 1050px;">
                                
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while($row2=mysqli_fetch_array($result2)){

                                            ?>
                                            <tr>
                                                <form action="checkout.php" method="POST">
                                                <td><?php echo $row2['productname']?></td>
                                                <td><input type="text" readonly name="price" value="<?php echo $row2['price']?>" class="form-control"></td>
                                                <td><input  type="text" readonly name="quantity" value="<?php echo $row2['quantity']?>" class="form-control"></td>
                                                <td><?php echo $row2['amount']?>
                                                    <input type="hidden" name="uid" value="<?php echo $row2['user_id']?>">
                                                    <input type="hidden" name="pid" value="<?php echo $row2['pid']?>">
                                                    <input type="hidden" name="cid" value="<?php echo $row2['oid']?>">
                                                    
                                                </td>
                                        <?php } ?>
                                                 
                                                	<?php 
                                                	while($rows=mysqli_fetch_array($resultcount))
                                                        $newtotal= $rows['totals'];
                                                        $newt=$newtotal+200;
                                                		{?>
                                                    <div class="row col-lg-12">
                                                        <div class="col-lg-3">
                                                            <label><b>Sub Total:</b></label>
                                                			<input type="text" name="totals" readonly value="<?php echo $newtotal?>" class="form-control">
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <label><b>Shipping Fee:</b></label>
                                                        <input type="text" name="shippingfee" readonly value="200" class="form-control">
                                                    </div>
                                                    <div class="col-lg-3">
                                                            <label><b>Total Cost:</b></label>
                                                        <input type="text" name="totalcost" readonly value="<?php echo $newt?>" class="form-control">
                                                    </div>
                                                    <div class="col-lg-3">
                                                            <label><b>Order No:</b></label>
                                                        <input type="text" name="totalcost" readonly value="<?php echo "#202304". $uid?>" class="form-control">
                                                    </div>
                                                </div>
                                                    <?php }?>
                                                            <br>
                                                <button type="submit" class="btn btn-lg btn-primary" name="checkout">Checkout-Payment</button>

                                                </p>


                                                </form>
                                            </tr>
                                            
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