<?php
  session_start();
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $databaseName = "pharma";
                    // get values form input text and number
//   $connect = new mysqli('localhost',$username,$password, $databaseName) or die("Unable to connect");
//   $user12 = $_SESSION['username'];
//   if (!$user12) {
//     # code...
//   }else{
//   $orders = $connect->query("INSERT INTO SESSIONS (username,datet) values(".$user12.",now;)");   
// }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WebShopping.com - Home</title>
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
      
body {
  background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%);
}
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
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
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
              <li class="nav-item"><a href="products.php" class="nav-link ">Products</a></li>
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
                      $databaseName = "pharma";
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
                <a href="deleteproduct.php" class="dropdown-item">Manage Product List</a>                
                <a href="list.php" class="dropdown-item">Add Product Images</a>                
                <a href="changepass.php" class="dropdown-item">Change Password</a>                
                <a href="users.php" class="dropdown-item">Users</a>
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
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-md-10">
              <div id="main-slider" class="owl-carousel owl-theme">
                <div class="item">        <a href="desc.php?p=25"><img src="med3.jpg" alt="" class="img-fluid"></a></div>
                <div class="item">
                  <a href="desc.php?p=22">
                  <img src="med3.jpg" alt="" class="img-fluid"></a></div>
                <div class="item">

                  <img src="med3.jpg" alt="" class="img-fluid"></div>
                <!-- <div class="item"><img src="img/main-slider4.jpg" alt="" class="img-fluid"></div> -->
              </div>
              <!-- /#main-slider-->
            </div>
          </div>
        </div>
      
        <div id="hot">
          <div class="box py-4">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="mb-0">Hot this week</h2>
                </div>
              </div>
            </div>
          </div>          
          

        
<div class="container">
          <div class="col-md-12">
            <div class="box slideshow">
          
              <div id="get-inspired" class="owl-carousel owl-theme">
                
                
          <?php                                       
$dbHost     = "localhost";  
$dbUsername = "root";  
$dbPassword = "";  
$dbName     = "pharma";  

$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
if (isset($_SESSION["username"])) {
            $rn = $_SESSION["username"]; 
            
          }else{
            $rn = "";
                
        } 
$result = $db->query("SELECT DISTINCT * FROM product WHERE username='$rn' LIMIT 10");
        if($result->num_rows > 0){ 
    while($row = $result->fetch_assoc()){
        // echo $row['mob'];
        $id = $row['p_id'];
        // echo $id;
        $result12 = $db->query("SELECT * FROM product WHERE p_id= '$id'");
        if($result12->num_rows > 0){ 
          while($row12 = $result12->fetch_assoc()){
            



            ?>
  <div class="item"><a href="details.php?proid=<?php echo $row12['p_id'] ?>"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row12['product_img']); ?>" alt="" class="img-fluid" style="height: 300px;">
  <h3><?php  echo $row12['product_name']; ?></h3>
    
  </a></div>
    
        
               <?php
          }
        }
        }
      }
      ?>

              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="col-md-12">
            <div id="blog-homepage" class="row">
              <div class="col-sm-6">
                <div class="post">
                  <h4><a href="post.html"></a></h4>                
                  <hr>
                    <a href="desc.php?p=27"><img src="med.jpg" width="100%" height="240px"></a>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="post">
                  <h4><a href="desc.php?p=40"></a></h4>                
                  <hr>
                    <a href="desc.php?p=40"><img src="med2.jpg" width="100%" height="240px"></a>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="post">
                  <h4><a href='desc.php?p=59'></a>
                  <hr>
                    <a href='desc.php?p=59'><img src="med2.jpg" width="100%" height="240px"></a>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="post">
                  <h4><a href="desc.php?p=42"></a></h4>                
                  <hr>
                    <a href="desc.php?p=42"><img src="med3.jpg"width="100%" height="240px"></a>
                </div>
              </div>
              <div class="col-sm-6">
                
                  
                    
                
              </div>
              
            </div>
           
            <div id="advantages">
          <div class="container">
            <div class="row mb-4">
              <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                  <div class="icon"><i class="fa fa-heart"></i></div>
                  <h3><a href="#">We love our customers</a></h3>
                  <p class="mb-0">We are known to provide best possible service ever</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                  <div class="icon"><i class="fa fa-tags"></i></div>
                  <h3><a href="#">Best prices</a></h3>
                  <p class="mb-0">You can check that the height of the boxes adjust when longer text like this one is used in one of them.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                  <div class="icon"><i class="fa fa-thumbs-up"></i></div>
                  <h3><a href="#">100% satisfaction guaranteed</a></h3>
                  <p class="mb-0">Free returns on everything for 3 months.</p>
                </div>
              </div>
            </div>
            <!-- /.row-->
          </div>
          <!-- /.container-->
        </div>
        
          </div>
        </div>
        <!-- /.container-->
        <!-- *** BLOG HOMEPAGE END ***-->
      </div>
    </div>
    <!--
    *** FOOTER ***
    _________________________________________________________
    -->
    
    <!-- *** COPYRIGHT END ***-->
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>
<?php
  include 'footer.php';
?>