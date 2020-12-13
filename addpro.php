<?php  
session_start();
// Database configuration  
$dbHost     = "localhost";  
$dbUsername = "root";  
$dbPassword = "";  
$dbName     = "demo";  
  
// Create database connection  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
  
// Check connection  
if ($db->connect_error) {  
    die("Connection failed: " . $db>connect_error);  

}

$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    $name=$_POST['name'];
    $brand = $_POST['brand'];
  $price=$_POST['price']; 
  $ram=$_POST['RAM'];
  $istorage=$_POST['internalstorage'];
  $camera = $_POST['camera'];
  $quantity = $_POST['quantity'];
  $status = $_POST['status'];
  $des=$_POST['des'];
  $inbox=$_POST['inbox'];
  $model=$_POST['Model_Number'];     
  $color=$_POST['color'];
  $Hybrid_Sim_Slot=$_POST['Hybrid_Sim_Slot'];
  $Display_Size=$_POST['Display_Size'];
  $Resolution=$_POST['Resolution'];
  $Processor_Type=$_POST['Processor_Type'];
  $Processor_core=$_POST['Processor_core'];
  $Camera_Features=$_POST['Camera_Features'];
  $Other_Features=$_POST['Other_Features'];
  $Expandable_Storage=$_POST['Expandable_Storage'];

  if (isset($_SESSION["username"])) {
            $rn = $_SESSION["username"]; 
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
         
            // // Insert image content into database 
            // $insert = $db->query("INSERT into images (`name`,`price`,`des`,`image`, `uploaded`) VALUES ('$name','$price','$des','$imgContent', NOW())"); 
            
            $connect = new mysqli('localhost','root','', 'demo') or die("Unable to connect");
            $query = "INSERT INTO `product`(`product_name`,`product_brand`,`product_price`,`product_ram`,`product_storage`,`product_camera`,`product_image`,`product_quantity`,`product_status`,`product_desc`,`product_inbox`,`Model_Number`,`color`,`Hybrid_Sim_Slot`,`Display_Size`,`Resolution`,`Processor_Type`,`Processor_core`,`Expandable_Storage`,`Camera_Features`,`Other_Features`,`username`) VALUES ('".$name."','".$brand."','".$price."','".$ram."','".$istorage."','".$camera."','".$imgContent."','".$quantity."','".$status."','".$des."','".$inbox."','".$model."','".$color."','".$Hybrid_Sim_Slot."','".$Display_Size."','".$Resolution."','".$Processor_Type."','".$Processor_core."','".$Expandable_Storage."','".$Camera_Features."','".$Other_Features."','".$rn."')";

    
    $result = mysqli_query($connect,$query);
            if($query){ 
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
 
// Display status message 
echo $statusMsg; 
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
  <header class="header mb-5">    
      <nav class="navbar navbar-expand-lg">
        <div class="container"><a href="index.php" class="navbar-brand home"><img src="offer/icon1.png" style="height: 50px; margin-left: -40px;" alt="Obaju logo" class="d-none d-md-inline-block"><img src="offer/icon1.png" alt="Website logo" style="height: 50px;" class="d-inline-block d-md-none">WebShopping.com<span class="sr-only">WebShopping - go to homepage</span></a>
          <div class="navbar-buttons">
            <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button><a href="basket.php" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
          </div>
          <div class="navbar-buttons d-flex justify-content-end" style="margin-left: 100px;">
              <!-- /.nav-collapse-->
              <div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></a>
              <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span>cart</span></a></div>
            </div>
          <div id="navigation" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
              <li class="nav-item"><a href="price.php" class="nav-link ">Products</a></li>
              <li class="nav-item"><a href="orders.php" class="nav-link ">My Orders</a></li>
              <li class="nav-item"><a href="aboutus.php" class="nav-link ">About Us</a></li>
                           <li class="nav-item dropdown">
            <?php


          if (isset($_SESSION["username"])) {

            echo "<a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'>";
            echo "<label>Welcome, ".$_SESSION["username"]."</label>"; 
            echo "</a>";
            $hostname = "localhost";
                      $username = "root";
                      $password = "";
                      $databaseName = "demo";
                    // get values form input text and number
                 $connect = new mysqli('localhost',$username,$password, $databaseName) or die("Unable to connect");
                 $user = $_SESSION['username'];
                 
                 $orders = $connect->query("SELECT * from user where username='$user'");
                 if($orders->num_rows > 0){ 
        
                        while($row = $orders->fetch_assoc()){ 

                        $type = $row['type'];
                 
                        if ($type == 'admin') {
           ?>
            <div class="dropdown-menu dropdown-menu-right">

                <a href="example.php" class="dropdown-item"> Add Product</a>
                <a href="products.php" class="dropdown-item">Manage Product List</a>                
                <a href="product1.php" class="dropdown-item">Add Product Images</a>                
                <a href="changepass.php" class="dropdown-item">Change Password</a>                
                <a href="aboutus.php" class="dropdown-item">About Us</a>
                <div class="dropdown-divider"></div>
                <a href="logout.php"class="dropdown-item">Logout</a>
            </div>
            <?php
            }else{
            ?><div class="dropdown-menu dropdown-menu-right">
                <a href="upgrade.php" class="dropdown-item">Upgrade account to add Products</a>                
                <div class="dropdown-divider"></div>
                <a href="logout.php"class="dropdown-item">Logout</a>
            </div>
            <?php
                }
            }
        }
    }else{
        ?>
            <a href="login.php" class="nav-link">Log in</a>
        <?php
    }

            ?>
        </li>
             
            </ul>
            
          </div>
        </div>
      </nav>
      <div id="search" class="collapse">
        <div class="container">
          <form role="search" class="ml-auto" action="search.php">
            <div class="input-group">
                     <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" name="query" class="form-control" style="width: 400px;" placeholder="Search">
              </div>

              <div class="input-group-append">
                <!-- <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button> -->
              </div>
            </div>
          </form>
        </div>
      </div>
    </header>
    
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
                <p class="text-muted">If you have any questions, please feel free to <a href="aboutus.php">contact us</a>, our customer service center is working for you 24/7.</p> -->
                <hr>
                
  <form action="#" method="post" enctype="multipart/form-data">
    <input type="text" name="name" required placeholder="Product Name" class="form-control rounded-pill form-control-lg" >    
     <input type="text" name="price" required placeholder="price" class="form-control rounded-pill form-control-lg" style="margin-top: 20px;">    
                  
          <input type="text" name="quantity" required placeholder="quantity" class="form-control rounded-pill form-control-lg" style="margin-top: 20px;">
                    
            <input type="file" name="image" required placeholder="Add image" class="form-control rounded-pill form-control-lg" style="margin-top: 20px;">
                   
          <input type="text" name="des" required placeholder="Product description" class="form-control rounded-pill form-control-lg" style="margin-top: 20px;">
                    
                  
          <center><button type="submit" style="margin-top: 20px;" name="submit" value="Upload" class="btn btn-primary"><i class="fa fa-user-md"></i> Upload</button></center>
        
                </form>
              
    <!-- *** COPYRIGHT END ***-->
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="js/front.js"></script>

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