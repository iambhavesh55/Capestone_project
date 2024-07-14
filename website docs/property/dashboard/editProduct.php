<?php
session_start();
require 'header.php';
require '../includes/conn.php';
if(!isset($_SESSION["email"])){
    header("Location:../login.php");
}
$email=$_SESSION['email'];

$sql="SELECT * FROM users WHERE email='$email'";
$result=mysqli_query($connection,$sql);
$resultcheck=mysqli_num_rows($result);

/*if(isset($_POST['newproduct'])){
    $uid=$_POST['uid'];
    $productname=$_POST['product'];
    $price=$_POST['price'];
    $description=$_POST['description'];

$type=$_FILES['fileToUpload']['type'];  
     $image=$_FILES['fileToUpload']['name']; 
     $size=$_FILES['fileToUpload']['size'];                  
     $file_temp_loc=$_FILES['fileToUpload']['tmp_name'];
     $file_store="uploads/".$image;
     $imageFileType = strtolower(pathinfo($image,PATHINFO_EXTENSION));

    // Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png"
       && $imageFileType != "jpeg"
       && $imageFileType != "gif" ) {
    $msg="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}else{

  //check if the file has been uploaded 
if (move_uploaded_file($file_temp_loc,$file_store)) {

     $url="http://localhost/property/dashboard/uploads/".$image;
     $sql = "INSERT INTO product(user_id, productname,
      price, description, image)
     VALUES ('$uid', '$productname', '$price',
      '$description','$url');";
     mysqli_query($connection,$sql);

    $msg="Product Added successfully ";

    } else {
        $msg="Sorry, there was an error uploading your file.";
    }
}
}*/
if(isset($_REQUEST['edit']))
{
$id=intval($_GET['edit']);
$sqledit="SELECT * FROM product WHERE id='$id'";
$resultedit=mysqli_query($connection,$sqledit);
}
if(isset($_POST['newproduct']))
{
    $uid=$_POST['uid'];
    $pid=$_POST['pid'];
    $productname=$_POST['product'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $condition=$_POST['condition'];
    $finalprice=0.9*$price;
    $comm=0.1*$price;

    $sqlupdate="UPDATE product SET productname='$productname', price='$finalprice',description='$description',product_condition='$condition' WHERE id='$pid'";
    mysqli_query($connection,$sqlupdate);

    echo '<script type="text/javascript">';
    echo 'alert("Product Information Updated successfully")';
    echo '</script>';

}
?>
 <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                   <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>Products Form</strong></div>
                            <?php 
                            while($rowedit=mysqli_fetch_array($resultedit)){?>
                            <div class="card-body card-block">
                            	<form method="POST" action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="uid" value="<?php echo $rowedit['user_id']?>">
                                <input type="hidden" name="pid" value="<?php echo $rowedit['id']?>">
                                <div class="form-group"><label for="company" class=" form-control-label">Product Name</label><input type="text" id="company" placeholder="Enter your product name" name="product" class="form-control"value="<?php echo $rowedit['productname']?>">
                                </div>
                                <div class="form-group"><label for="vat" class=" form-control-label">Product Price</label><input type="number" id="vat" placeholder="Enter Product Price" name="price" class="form-control"value="<?php echo $rowedit['price']?>">
                                </div>
                                <div class="form-group"><label for="vat" class="form-control-label">Product Condition</label>
                                    <select name="condition" class="form-control">
                                        <option selected value="<?php echo $rowedit['product_condition']?>"><?php echo $rowedit['product_condition']?></option>
                                        <option  disabled>Please Choose Product Condition</option>
                                        <option value="Repaired Product">Repaired Product</option>
                                        <option value="Damaged Product">Damaged Product</option>
                                    </select>
                                </div>
                                <div class="form-group"><label for="street" class=" form-control-label">Product Description</label><textarea  class="form-control" name="description"><?php echo $rowedit['description']?>
                                </textarea></div>
                                <div class="form-group"><label for="city" class=" form-control-label">Product Image:</label><br>
                                    <img src="<?php echo $rowedit['image']?>" width="70" height="70">
                                 </div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="newproduct">Update Product For Sell</button>
                            </form>
                            </div>
                        <?php } ?>
                        </div>
                    </div>

                   
                </div>

            </div>


        </div><!-- .animated -->
<?php
require 'footer.php';
?>