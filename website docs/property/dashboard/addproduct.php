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

if(isset($_POST['newproduct'])){
    $uid=$_POST['uid'];
    $productname=$_POST['product'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $condition=$_POST['condition'];
    $finalprice=0.9*$price;
    $comm=0.1*$price;

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
      price, description, image,product_condition)
     VALUES ('$uid', '$productname', '$finalprice',
      '$description','$url','$condition');";
     mysqli_query($connection,$sql);

     $sqlcomm="INSERT INTO commissions(user_id,amount)VALUES('$uid','$comm')";
     mysqli_query($connection,$sqlcomm);

    echo '<script type="text/javascript">';
    echo 'alert("Product Added successfully")';
    echo '</script>';

    } else {
        $msg="Sorry, there was an error uploading your file.";
    }
}
}
?>
 <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                   <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>Products Form </strong><span style="color:red">Note: 10% of product price is removed as service fee!!!!</span></div>
                            <div class="card-body card-block">
                            	<form method="POST" action="" method="post" enctype="multipart/form-data">
                                <?php
                                while($row=mysqli_fetch_array($result)){
                                    ?>
                                    <input type="hidden" name="uid" value="<?php echo $row['id']?>">
                                <?php }
                                ?>
                                <div class="form-group"><label for="company" class=" form-control-label">Product Name</label><input type="text" id="company" placeholder="Enter your product name" name="product" class="form-control">
                                </div>
                                <div class="form-group"><label for="vat" class=" form-control-label">Product Price</label><input type="number" id="vat" placeholder="Enter Product Price in AUD" name="price" class="form-control">
                                </div>
                                <div class="form-group"><label for="vat" class="form-control-label">Product Condition</label>
                                    <select name="condition" class="form-control">
                                        <option selected disabled>Please Choose Product Condition</option>
                                        <option value="Repaired Product">Repaired Product</option>
                                        <option value="Damaged Product">Damaged Product</option>
                                    </select>
                                </div>
                                <div class="form-group"><label for="street" class=" form-control-label">Product Description</label><textarea  class="form-control" name="description">
                                </textarea></div>
                                <div class="form-group"><label for="city" class=" form-control-label">Product Image</label><input type="file" id="city" name="fileToUpload" class="form-control" accept="image/png, image/gif, image/jpeg, image/jpg">
                                 </div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="newproduct">Add New Product For Sell</button>
                            </form>
                            </div>
                        </div>
                    </div>

                   
                </div>

            </div>


        </div><!-- .animated -->
<?php
require 'footer.php';
?>