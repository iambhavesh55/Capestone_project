<?php
session_start();
require 'adminhead.php';
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

if(isset($_REQUEST['delete'])){
    $id=intval($_GET['delete']);

    $sql5="DELETE FROM product WHERE id='$id'";
    mysqli_query($connection,$sql5);
    echo '<script type="text/javascript">';
    echo 'alert("Product Deleted Successfully")';
    echo '</script>';
}
?>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">All Products Data</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Owner</th>
                                            <th>Product Status</th>
                                            <th>Posted On</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql1="SELECT product.id as pid,product.productname,product.price,product.image,product.created_at,product.product_status,users.fullname FROM product JOIN users ON product.user_id=users.id ORDER BY created_at DESC";
                                        $result1=mysqli_query($connection,$sql1);
                                        while($row1=mysqli_fetch_array($result1)){
                                        ?>
                                        <tr>
                                            <td><img width="50" height="50" src="<?php echo $row1['image']?>"></td>
                                            <td><?php echo $row1['productname']?></td>
                                            <td><?php echo $row1['price']?></td>
                                            <td><?php echo $row1['fullname']?></td>
                                            <td><?php echo $row1['product_status']?></td>
                                            <td><?php echo $row1['created_at']?></td>
                                            <td>
                                                <a href="allproducts.php?delete=<?php echo $row1['pid']?>" class="btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
<?php
require 'adminfooter.php';
?>