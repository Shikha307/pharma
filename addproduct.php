<?php  
include 'navbarn.php';
include 'db_connect.php';
// Check connection  
//session_start();

// $status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 

  $name=$_POST['name'];
    $price=$_POST['price']; 
    $quantity = $_POST['quantity']; 
    $des=$_POST['des'];

    if (isset($_SESSION["username"])) {
            $rn = $_SESSION["username"]; 
            echo $rn;
          }else{
            $rn = "";
                
        } 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image));         
        // $connect = mysqli_connect('localhost', 'root', '', 'pharma');
        
    
    // mysql query to insert data

    $query = "INSERT INTO `product`(`product_name`, `product_price`,`quantity`, `product_desc`,`product_img`,`username`) VALUES ('".$name."','".$price."','".$quantity."','".$des."','".$imgContent."','".$rn."')";
    
    $result = mysqli_query($connect,$query);
                        
    //         $query = "INSERT INTO `product`(`product_name`,`product_price`,`quantity`,`product_desc`,`product_img`,`username`) VALUES ('".$name."','".$price."','".$quantity."','".$des."','".$imgContent."','".$rn."')";

    
    // $result = mysqli_query($connect,$query);
            if($result){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
  // echo $status;
  //   echo $statusMsg;
// Display status message 

// $result = $db->query("SELECT image FROM images ORDER BY uploaded DESC"); 
?>


<!DOCTYPE html>
<html>
<head>
  <title>Add Product</title>
  <link rel="icon" href="offer/icon1.png">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <style type="text/css">
      
.main {
    width: 50%;
    margin: 50px auto;
}

/* Bootstrap 4 text input with search icon */

.has-search .form-control {
    padding-left: 2.375rem;
}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
}
</style>
</head>
<body>
    
  <form action="#" method="post" enctype="multipart/form-data">
  <div id="all" style="margin-top: -35px;">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">New Product</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-12">
              <div class="box">
                <h1>New Product</h1><!-- 
                <p class="lead">Not our registered customer yet?</p>
                <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
                -->
                <hr>
                <form  method="post">
                  <div class="form-group">
                    <label>Product name:</label>
          <input type="text" name="name" required placeholder="Product Name" class="form-control rounded-pill form-control-lg" >    
                    <!-- <input id="name" type="text" class="form-control"> -->
                  </div>                
                  <div class="form-group">
                    <label>Product price:</label>
          <input type="text" name="price" required placeholder="price" class="form-control rounded-pill form-control-lg" style="margin-top: 20px;">    
                    <!-- <input id="name" type="text" class="form-control"> -->
                  </div>
                  <div class="form-group">
                    <label>Quantity:</label>
          <input type="text" name="quantity" required placeholder="quantity" class="form-control rounded-pill form-control-lg" style="margin-top: 20px;">
                    <!-- <input id="name" type="text" class="form-control"> -->
                  </div>
                  <div class="form-group">
                    <label>Description:</label>
          <input type="text" name="des" required placeholder="Product description" class="form-control rounded-pill form-control-lg" style="margin-top: 20px;">
                    <!-- <input id="email" type="text" class="form-control"> -->
                  </div>            
                  <div class="form-group">
                    <label>Image File:</label>
            <input type="file" name="image" required placeholder="Add image" class="form-control rounded-pill form-control-lg">
                    <!-- <input id="name" type="text" class="form-control"> -->
                  </div>                  
                  <div class="text-center">
                              <center><button type="submit" style="margin-top: 20px;" name="submit" value="Upload" class="btn btn-primary"><i class="fa fa-user-md"></i> Upload</button></center>
                  </div>
                </form>
              </div>
            </div>
            
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- *** COPYRIGHT END ***-->
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="js/front.js"></script>

</form>
</body>
</html>