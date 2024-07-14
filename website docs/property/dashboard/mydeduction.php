<?php
require 'adminhead.php';
require '../includes/conn.php';

$sql11="SELECT * FROM deductions";
$result11=mysqli_query($connection,$sql11);

if(isset($_POST['del'])){
	//$id=intval($_GET['delete']);
	$id=$_POST['dels'];
	$sql="DELETE FROM deductions WHERE id='$id'";
	mysqli_query($connection,$sql);
}
?>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Available Deductions</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Amount to Deduct</th>
                                            <th>Date Set</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    	while($row11=mysqli_fetch_array($result11))
                                    	{ ?>
                                        <tr>
                                        	
                                            <td><?php echo $row11['amount']?></td>
                                            <td><?php echo $row11['created_at']?></td>
                                            <form method="POST" action="mydeduction.php">
                                            	<td>
                                            		<input type="hidden" name="dels" value="<?php echo $row11['id']?>">
                                            	<button type="submit" name="del" value="<?php echo $row11['id']?>"class="btn btn-sm btn-danger">Delete</button>
                                            </td>
                                        </form>
                                        </tr>
                                    	<?php }?>
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