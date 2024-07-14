<?php
require 'adminhead.php';
require '../includes/conn.php';

$sqlearn="SELECT users.id as uid,users.fullname,users.phone_number,commissions.amount,commissions.created_at FROM users JOIN commissions ON users.id=commissions.user_id ORDER BY commissions.created_at DESC";
$resultearn=mysqli_query($connection,$sqlearn);

$sqltotalearn="SELECT SUM(amount) AS totalearn FROM commissions";
$resulttotalearn=mysqli_query($connection,$sqltotalearn);
?>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Total Earnings From Product's Commissions</strong>
                                <?php
                                while($rowtotalearn=mysqli_fetch_array($resulttotalearn))
                                    {?>
                                <span style="color:#6A0DAD;font-style: italic;font-weight: bold;"><?php echo "Your Total Earnings is:AUD ". $rowtotalearn['totalearn']?></span>
                                <?php } ?>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Contributor Name</th>
                                            <th>Contributor Contact</th>
                                            <th>Amount Contributed (AUD)</th>
                                            <th>Date Contributed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while($rowearn=mysqli_fetch_array($resultearn))
                                            {
                                        ?>
                                        <tr>
                                            <td><?php echo $rowearn['fullname']?></td>
                                            <td><?php echo $rowearn['phone_number']?></td>
                                            <td><?php echo $rowearn['amount']?></td>
                                            <td><?php echo $rowearn['created_at']?></td>
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