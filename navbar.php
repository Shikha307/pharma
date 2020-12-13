<?php
    session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <style type="text/css">
          /* Styles for wrapping the search box */

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
    <!-- navbar-->
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
              <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="basket.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span>cart</span></a></div>
            </div>
          <div id="navigation" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
              <li class="nav-item"><a href="price.php" class="nav-link ">Products</a></li>
              <li class="nav-item"><a href="orders.php" class="nav-link ">My Orders</a></li>
  
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

                <a href="addproduct.php" class="dropdown-item"> Add Product</a>
                <a href="products.php" class="dropdown-item">Manage Product List</a>                
                <a href="addimage.php" class="dropdown-item">Add Product Images</a>                
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
          <form action="search.php" role="search" class="ml-auto" method="get">
            <div class="input-group">
              <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" name="query" class="form-control" style="width: 400px;" placeholder="Search">
              </div>

              <!-- <input type="text" placeholder="Search" name="query" class="form-control"> -->
              <div class="input-group-append">
                <!-- <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button> -->
 
              </div>
            </div>
          </form>
        </div>
      </div>
    </header>
    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>