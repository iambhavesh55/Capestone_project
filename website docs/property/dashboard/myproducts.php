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
//delete product.
if(isset($_REQUEST['delete'])){
    $id=intval($_GET['delete']);

    $sql="DELETE FROM product WHERE id='$id'";
    mysqli_query($connection,$sql);
    $msg="Product Deleted Successfully";
}
?>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">My Products</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Product Status</th>
                                            <th>Product Condition</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql1="SELECT * FROM product WHERE user_id='$uid' ORDER BY created_at DESC";
                                        $result1=mysqli_query($connection,$sql1);
                                        while($row=mysqli_fetch_array($result1)){
                                            $images=$row['image'];
                                        ?>
                                        <tr>
                                            <td><?php echo'<img width="50" height="50" src="'.$images.'">'?></td>
                                            <td><?php echo $row['productname']?></td>
                                            <td><?php echo $row['price']?></td>
                                            <td><?php echo $row['product_status']?></td>
                                            <td><?php echo $row['product_condition']?></td>
                                            <td>
                                                <a href="editProduct.php?edit=<?php echo $row["id"]; ?>"
                                                   onclick="return confirm('Do you really want to edit this product')" class="btn-sm btn-primary">Edit
                                                  </a>
                                                  &nbsp;
                                                  <a href="myproducts.php?delete=<?php echo $row["id"]; ?>"
                                                   onclick="return confirm('Do you really want to delete this product')" class="btn-sm btn-danger">Delete
                                                  </a>
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
require 'footer.php';
?>