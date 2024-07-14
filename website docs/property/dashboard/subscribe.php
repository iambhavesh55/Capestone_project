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

//delete product.
if(isset($_REQUEST['delete'])){
    $id=intval($_GET['delete']);

    $sql="DELETE FROM users WHERE id='$id'";
    mysqli_query($connection,$sql);
}
?>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">All Subscribers Data</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Email Subscriber</th>
                                            <th>Date Joined</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql1="SELECT * FROM subs ORDER BY id DESC";
                                        $result1=mysqli_query($connection,$sql1);
                                        while($row1=mysqli_fetch_array($result1)){
                                        ?>
                                        <tr>
                                            <td><?php echo $row1['email']?></td>
                                            <td><?php echo $row1['created_at']?></td>
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