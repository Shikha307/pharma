<?php include 'navbarn.php'; ?>
<?php
$dbHost     = "localhost";  
$dbUsername = "root";  
$dbPassword = "";  
$dbName     = "pharma";  
  
// Create database connection  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
         $product_id = $_GET['proid'];
// echo "$product_id";
$result1 = $db->query("SELECT * FROM product WHERE p_id like '%".$product_id."%'");
if($result1->num_rows > 0){
  while($row = $result1->fetch_assoc()){
    $id = $row['p_id'];
    $pro_id = $row['product_name'];
    $pro_price = $row['product_price'];
if (isset($_SESSION["username"])) {
            $rn = $_SESSION["username"]; 
          
    $query = "INSERT INTO `addtocart`(`id`,`name`, `price`,`username`) VALUES ('".$id."','".$pro_id."','".$pro_price."','".$rn."')";
    
            $result = mysqli_query($db,$query);

}else{
	 //echo "<center><label style='font-size:30px; color:red;'>Login</label></center>";
  header("Location:login.php");
}
   
  }
}


?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Cart</title>
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
  </head>
  <body>
    <div>
    <div id="all" style="margin-top: -35px;">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Shopping cart</li>
                </ol>
              </nav>
            </div>
            <div id="basket" class="col-lg-9">
              <div class="box">
                <form method="post" action="checkout1.html">
                  <h1>Shopping cart</h1>
                  <p class="text-muted">
                    <?php
                                if (isset($_SESSION["username"])) {
            $rn = $_SESSION["username"]; 
          }else{
            $rn = "";                
        } 
                                $hostname = "localhost";
                                $username = "root";
                                $password = "";
                                $databaseName = "pharma";          
                                $connect = new mysqli('localhost',$username,$password, $databaseName) or die("Unable to connect");
                                $qry_appr1 = "SELECT COUNT(*) FROM addtocart WHERE `username` = '$rn'";
                                $qry_data1 = mysqli_query($connect, $qry_appr1);
                                $approve_count1 = mysqli_fetch_array($qry_data1);
                                $toatalCount1 = array_shift($approve_count1);
                                echo "You currently have ". $toatalCount1 ." item(s) in your cart.";              
                            ?>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th colspan="2">Product</th>
                          <th>Quantity</th>
                          <th>Unit price</th>
                          <th>Discount</th>
                          <th colspan="2">Total</th>
                        </tr>
                      </thead>
<?php 
$dbHost     = "localhost";  
$dbUsername = "root";  
$dbPassword = "";  
$dbName     = "pharma";  

$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  

$result = $db->query("SELECT DISTINCT addtocart.id,addtocart.name,addtocart.price,product.product_img,product.product_name,product.product_price FROM addtocart INNER JOIN product ON addtocart.name=product.product_name WHERE addtocart.username='$rn'");

$result1 = $db->query("SELECT name FROM addtocart WHERE `username` = '$rn'"); 

$row123 = mysqli_fetch_array($result1, MYSQLI_ASSOC) ;

if(!$row123){
echo "<center><img src='offer/empty-cart.png'></center>";
echo "<center><p class='oops'><b>oops!</b></p></center>";
echo "<center><p class='empty'><b>Your Cart Is Empty...</b></p></center>";
echo "<center><p class='empty1'>You have no items in your shopping cart. Maybe the product was moved or deleted, or perhaps you just mistyped the address. Start shopping by searching, Browsing, Going to the Homepage, Navigation Bar or Click on the logo to return to our home page.</p></center>";
}
else {

    if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              $pro_id = $row['id'];              
              //echo $pro_id;
?>
                      <tbody>
                        <tr>
                          <td><a href="realme7pro.php?p=<?php echo "$pro_id";?>"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['product_image']); ?>" class="cart-item-image" style="margin-top: 20px;"/></a></td>                          
                          <td><a href="realme7pro.php?p=<?php echo "$pro_id";?>"class='logo'>
                            <?php
                              echo $row['product_name'];
                              $name = $row['product_name'];
                            ?>
                          </a></td>
                          <td>
                            <?php
                                $hostname = "localhost";
                                $username = "root";
                                $password = "";
                                $databaseName = "pharma";          
                                $connect = new mysqli('localhost',$username,$password, $databaseName) or die("Unable to connect");
                                $qry_appr = "SELECT COUNT(*) FROM addtocart WHERE id ='$pro_id'";
                                $qry_data = mysqli_query($connect, $qry_appr);
                                $approve_count = mysqli_fetch_array($qry_data);
                                $toatalCount = array_shift($approve_count);
                                echo "<center>".$toatalCount."</center>";
                            ?>
                          </td>
                          <td>
                            <?php echo "₹".$row["product_price"]; ?></td>
                          <td>₹ 0.00</td>
                          <td>
                            <?php
                              foreach($connect->query("SELECT SUM(price) FROM addtocart  WHERE id='$pro_id'") as $row){        
                                echo "₹" . $row['SUM(price)'] . "";
        
                              }
                            ?>

                          </td>
                          <td><a href="delete.php?name=<?php echo $name; ?>"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                        <?php
                        }
                      }
                    }
                    ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="5">Total</th>
                          <th colspan="2">
                            <?php
                              foreach($connect->query("SELECT SUM(price) FROM addtocart  WHERE username='$rn'") as $row) {
        
                                echo "₹" . $row['SUM(price)'] . "";
                                $total_amount = $row['SUM(price)'];
                              }
                            ?>
                          </th>
                        </tr>
                      </tfoot>
                    </table>
                    
                  </div>
                  <!-- /.table-responsive-->
                  <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                    <div class="left"><a href="price.php" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continue shopping</a></div>
                    <div class="right">
                      <!-- <a href="basket.php"><button class="btn btn-outline-secondary"><i class="fa fa-refresh"></i> Update cart</button></a> -->
                      <?php
                      if(!$row123){
                        # code...
                        echo '';
                      }else{
                      echo '<a href="checkout1.php" class="btn btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i></a>';
                      }
                      ?>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.box-->
              <!-- <div class="row same-height-row" style="background-color: transparent;">
                <div class="col-lg-3 col-md-6">
                  <div class="box same-height" style="background-color: transparent;">
                     <h3>You may also like these products</h3> 
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="detail.html">
                          <img src="product/Realme-7-Pro-1.jpg" alt="" class="img-fluid"> 
                        </a></div>
                        <div class="back"><a href="detail.html">
                          <img src="img/Realme-7-Pro-1.jpg" alt="" class="img-fluid"> 
                        </a></div>
                      </div>
                    </div><a href="detail.html" class="invisible"><img src="img/product2.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Realme 7 Pro</h3> 
                      <p class="price">
                        
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
                          $result = $db->query("SELECT * FROM product WHERE (`product_name` LIKE '%Realme 7 Pro%')");
                          if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                              $pro_id = $row['product_price'];              
                              // echo "₹".$pro_id;
                            }
                          }
                          ?>
                      </p>
                    </div>
                  </div>
                  
                </div>
              </div> -->
            </div>
            <!-- /.col-lg-9-->
            <div class="col-lg-3">
              <div id="order-summary" class="box">
                <div class="box-header">
                  <h3 class="mb-0">Order summary</h3>
                </div>
                <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Order subtotal</td>
                        <th><?php echo "₹".$total_amount; ?></th>
                      </tr>
                      <tr>
                        <td>Discount (10%)</td>
                        <th>
                          <?php
                            $discount = $total_amount*10/100;
                            echo "₹".$discount."";
                          ?>
                        </th>
                      </tr>
                      <tr>
                        <td>Shipping and handling</td>
                        <th>₹ 10.00</th>
                      </tr>
                      <tr>
                        <td>Tax</td>
                        <th>₹ 0.00</th>
                      </tr>
                      <tr class="total">
                        <td>Total</td>
                        <th>
                          <?php
                            $total = $total_amount-$discount+10.00;
                            echo "₹".$total."";
                          ?>
                        </th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              </div>
            </div>
            <!-- /.col-md-3-->
          </div>
        </div>
      </div>
    </div>
    
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="js/front.js"></script>
  </div>
<?php
  $result12 = $db->query("SELECT p_id FROM test"); 

  $row123 = mysqli_fetch_array($result12, MYSQLI_ASSOC) ;
  if(!$row123){
    ?>
            <div class="row same-height-row" style="margin-left: 90px; width: 80%; height: 250px;">
                <div class="col-lg-3 col-md-6" style="height: 50px;">
                  <div class="box same-height" style="height: 20px;">
                     <h3>Recently viewed products are 0</h3> 
                  </div>
                </div>
                </div>  
  <?php
  }
  else{
?>
            <div class="row same-height-row" style="margin-left: 90px; width: 80%; height: 250px;">
                <div class="col-lg-3 col-md-6" style="height: 50px;">
                  <div class="box same-height" style="height: 20px;">
                     <h3>Recently viewed products</h3> 
                  </div>
                </div>
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
$result = $db->query("SELECT DISTINCT * FROM test WHERE S_username= '$rn' ORDER BY tbl_id DESC LIMIT 3");
        if($result->num_rows > 0){ 
    while($row = $result->fetch_assoc()){
        // echo $row['mob'];
        $id = $row['p_id'];
        // echo $id;
        $result12 = $db->query("SELECT DISTINCT * FROM product WHERE product_id= '$id'");
        if($result12->num_rows > 0){ 
          while($row12 = $result12->fetch_assoc()){
            // echo $row12['product_name'];

            ?>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front" style="margin-top: 5px;"><a href="realme7pro.php?p=<?php echo $row12['product_id'] ?>">
                          <center><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row12['product_image']); ?>" alt="" class="img-fluid" style="height: 200px;"> </center>
                        </a></div>
                        <div class="back"><a href="realme7pro.php?p=<?php echo $row12['product_id'] ?>">
                          
                        </a></div>
                      </div>
                    </div><!-- <a href="detail.html" class="invisible"><img src="img/product2.jpg" alt="" class="img-fluid"></a> -->
                    <div class="text">
                      <center>
                        <?php
                          $name12 = $row12['product_name'];
                          echo $name12;
                        ?>                        
                      </center>
                      <p class="price">
                        <center>
                        <?php
                              $pro_id = $row12['product_price'];              
                               echo "₹".$pro_id;
                        ?>      
                        </center>                      
                      </p>
                    </div>
                  </div>
                  
                </div>
              
      <?php
          }
        }
        }
      }
                          ?>
    </div>
    <?php
      }
    ?>
  </body>
</html>
<?php
include 'footer.php';
?>