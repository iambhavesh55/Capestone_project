<?php
require 'adminhead.php';
require '../includes/conn.php';

$sqlsold="SELECT orders.user_id,orders.product_id,orders.quantity,orders.amount,users.id,users.fullname,product.id,product.productname,product.price,product.image FROM orders JOIN product ON orders.product_id=product.id JOIN users ON orders.user_id=users.id";
$resultsold=mysqli_query($connection,$sqlsold);

?>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
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
                                            <th>Sold To</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while($rowsold=mysqli_fetch_array($resultsold))
                                        { ?>
                                        <tr>
                                            <td><img width="50" height="50" src="<?php echo $rowsold['image']?>"></td>
                                            <td><?php echo $rowsold['productname']?></td>
                                            <td><?php echo $rowsold['price']?></td>
                                            <td><?php echo $rowsold['quantity']?></td>
                                            <td><?php echo $rowsold['amount']?></td>
                                            <td><?php echo $rowsold['fullname']?></td>
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