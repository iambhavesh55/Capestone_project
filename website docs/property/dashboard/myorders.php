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

$sql8="SELECT product.id as pid,product.productname,product.image,product.price,users.id as uid,users.fullname,users.phone_number,orders.quantity,orders.amount,orders.created_at FROM product JOIN users ON product.user_id=users.id JOIN orders ON product.id=orders.product_id WHERE orders.user_id='$uid'";
$result8=mysqli_query($connection,$sql8);
?>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">My Order Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Amount</th>
                                            <th>Product Owner</th>
                                            <th>Owner Contact</th>
                                            <th>Date Ordered</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while($row8=mysqli_fetch_array($result8)){
                                        ?>
                                        <tr>
                                            <td><img width="50" height="50" src="<?php echo $row8['image']?>"></td>
                                            <td><?php echo $row8['productname']?></td>
                                            <td><?php echo $row8['price']?></td>
                                            <td><?php echo $row8['quantity']?></td>
                                            <td><?php echo $row8['amount']?></td>
                                            <td><?php echo $row8['fullname']?></td>
                                            <td><?php echo $row8['phone_number']?></td>
                                            <td><?php echo $row8['created_at']?></td>
                                        </tr>
                                    <?php } ?>

                                        <p style="color:blue;"><?php echo "Your Order Id: #202304".$uid?></p>                                   
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
<?php
require 'footer.php';
?>