<?php
  session_start();
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
              <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span>cart</span></a></div>
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
    <div id="all">
      <div id="content">
        

<form method='POST' action="xyz1.php">
<?php 
// Include the database configuration file  

$dbHost     = "localhost";  
$dbUsername = "root";  
$dbPassword = "";  
$dbName     = "pharma";  
  
// Create database connection  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
 //          $product_id = $_GET['proid'];
 // echo "$product_id";

// Get image data from database 
$orders = $db->query("SELECT * from orders where username='$user'");

 if($orders->num_rows > 0){ 
        
        while($row1 = $orders->fetch_assoc()){ 
          $pro_id = $row1['pro_id'];
          $userid = $row1['aid'];
          $price = $row1['total_price'];
          $qty = $row1['total_quantity'];
          $date = $row1['date'];
          //echo "$qty";

          // echo "$userid";
          // echo "$pro_id";

$result = $db->query("SELECT * FROM product where p_id = $pro_id"); 
echo '<table class="tbl-cart" cellpadding="10" cellspacing="1" border="0.4px" style="" align="center">';
    if($result->num_rows > 0){
      echo "<div class='gallery'> ";
      while($row = $result->fetch_assoc()){
    
                        $pro_id    = $row['p_id'];
                        $pro_cat   = $row['product_name'];
                        $pro_brand = $row['product_price'];
                        
                        echo "<br/>";

                        echo "<input type='hidden' value='$pro_id' name='priceid'>";
                        echo "<tr class='button3'><th class='th4' >";
                        echo "<a href='details.php?proid=$pro_id' class='logo'>";
                       echo '<img src="data:image/jpeg;base64,'.base64_encode($row['product_img'] ).'" height="100" width="150"/>';
                       // echo '<img src="data:image/jpeg;base64,'.base64_encode($row['product_image'] ).'" height="200" width="200" style="margin-top:-60px;"/>';
                    echo "</a>";
                    echo "</th>";

                    echo "<th class='th2' style='margin-left:10px;'>";
                    echo "<a href='details.php?proid=$pro_id&Aid=$userid' class='logo'>";
                    // echo "$date";
                    // echo date("d/m/Y", strtotime($date));
                    echo "<div class='product-img'><input type='hidden' name='lblname' value='$pro_cat'><h5>$pro_cat</h5>";
                    
                    echo "<br/>";
          // echo "<div class='price2'>Price:</div>";
          // echo "Price:";
               $tp = $pro_brand * $qty;
          echo "<h5>Product Price:$pro_brand</h5>";   
          echo "<h5>Quantity:$qty</h5>";
          echo "<label style='color:red;'>Expected Delivery in two days</label>";
   //        $date1 = strtotime("+2 day", strtotime($date));
   //        $tomarrow = strtotime("+1 day", strtotime($date));
     //  // echo date("d-m-Y", $date1);
     //  $date13 = "2018-11-24";
   // $date2 = "2019-03-26";
   // if($date > $tomarrow && $date < $date1)
   //   echo "Your item has been placed";
   
   // else
   //   echo "Your item has been Delivered";
          echo "<br/>";
          echo "<br/>";
          
          echo "</a>";
          echo "</th>";
          echo "<th class='th3' >";
          echo "<h5>Date:".date("d/m/Y", strtotime($date));
          echo "<br/>";
          // echo date("d.m.Y H:i:s", strtotime($date));
          $today = date("d/m/Y"); 

          // echo "$today";
          echo "<br/></h5>";
          
   // }
   //   echo "$date13 is older than $date2";
     //  if ($date < $today) {
   //         # code...
   //         echo "Your item is out for Delivery";
   //        }
   //        if ($today == $date1) {
   //         # code...
   //         echo "Your order has been placed";
   //        }// }else{
          //  echo "Your item has been Delivered";
          // }
          echo "Time".date(" H:i:s", strtotime($date));
          echo "<br/>";
          echo "<h5>Paid Price: $price</h5>";
          echo "<br/>";

          // echo "<a href='addcart.php?proid=$pro_id'><input type='button' class='button button2' href='addcart.php?proid=$pro_id' value='Add To Cart'></a>";
                    echo "<br/>";
          
          echo "</th>";
          echo "</tr>";
                echo "</form>";

      }
    }
          }
      }





// $result1 = $db->query("SELECT * from address WHERE id = $userid");
// if ($result1->num_rows > 0) {
//  # code...
//  while ($row1 = $result1->fetch_assoc()) {
//    # code...
//    $city = $row1['Address'];
//    echo "$city";
//  }
// }
          ?>
        
    
      

  
</thead>
  </table>
</form>          
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

