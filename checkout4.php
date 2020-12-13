<?php
  include 'navbarn.php';
include 'db_connect.php';
// session_start();
  // error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cart Review</title>
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
    <div id="all" style="margin-top: -35px;">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Checkout - Product</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-3">
              <div id="order-summary" class="card">
                <div class="card-header">
                  <h3 class="mt-4 mb-4">Order summary</h3>
                </div>
                <div class="card-body">
                  <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                      <tr>
                         <?php
                         if (isset($_SESSION["username"])) {
                              $rn = $_SESSION["username"]; 
                              
                            }else{
                              $rn = "";                                
                          } 
                              foreach($connect->query("SELECT SUM(price) FROM addtocart  WHERE username='$rn'") as $row) {
                                $total_amount = $row['SUM(price)'];
                              }
                              
                            ?>
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
                        <th>₹10.00</th>
                      </tr>

                      <tr>
                        <td>Tax</td>
                        <th>₹0.00</th>
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
            <div id="checkout" class="col-lg-9">
              <div class="box">
                <form method="get" action="checkout4.php">
                  <h1>Checkout - Payment method</h1>
                  <div class="nav flex-column flex-sm-row nav-pills"><a href="checkout1.php" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker">                  </i>Address</a><a href="checkout2.php" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-truck">                       </i>Delivery Method</a><a href="checkout3.php" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-money">                      </i>Payment Method</a><a href="checkout4.php" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-eye">                     </i>Order Review</a></div>
                  <div class="content">
                    <div class="table-responsive">
                      
                      <table class="table">
                        
                        <thead>
                          <tr>
                            <th colspan="1">Product Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Unit price</th>
                            <th>Discount</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>
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
                          $result = $db->query("SELECT DISTINCT addtocart.product_id,addtocart.name,addtocart.price,product.product_img,product.product_name,product.product_price FROM addtocart INNER JOIN product ON addtocart.name=product.product_name WHERE addtocart.username='$rn'");

                          $result1 = $db->query("SELECT name FROM addtocart"); 

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
                                        $pro_id = $row['product_id'];              
                                        //echo $pro_id;
                          ?>
                          <tr>
                            <td><a href="details.php?p=<?php echo "$pro_id";?>"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['product_img']); ?>" class="cart-item-image" style="margin-top: 20px;"/></a></td>
                            <td><a href="realme7pro.php?p=<?php echo "$pro_id";?>"class='logo'>
                            <?php
                              echo $row['product_name'];
                              $name = $row['product_name'];
                            ?>
                          </a></td>
                            <td><?php
                                $hostname = "localhost";
                                $username = "root";
                                $password = "";
                                $databaseName = "pharma";          
                                $connect = new mysqli('localhost',$username,$password, $databaseName) or die("Unable to connect");
                                $qry_appr = "SELECT COUNT(*) FROM addtocart WHERE product_id ='$pro_id'";
                                $qry_data = mysqli_query($connect, $qry_appr);
                                $approve_count = mysqli_fetch_array($qry_data);
                                $toatalCount = array_shift($approve_count);
                                echo "<center>".$toatalCount."</center>";
                            ?></td>
                            <td><?php echo "₹".$row["product_price"]; ?></td></td>
                            <td>₹ 0.00</td>
                            <td><?php
                              foreach($connect->query("SELECT SUM(price) FROM addtocart  WHERE product_id='$pro_id'") as $row){        
                                 echo "₹" . $row['SUM(price)'] . "";
                              
                              }
                            ?></td>
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
                            <th><?php
                              foreach($connect->query("SELECT SUM(price) FROM addtocart  WHERE username='$rn'") as $row) {
                                echo "₹".$total."";
                                // echo "₹" . $row['SUM(price)'] . "";
                                $total_amount = $row['SUM(price)'];
                              }
                            ?></th>
                          </tr>
                        </tfoot>
                      </table>
                      
                    </div>
                    <!-- /.table-responsive-->
                  </div>
                  
                  <!-- /.content-->
                  <div class="box-footer d-flex justify-content-between"><a href="checkout3.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Payment Method</a>
                    <?php
                      $a_id = $_GET['aid'];
                      if ($a_id == "") {
                        # code...
                      ?>
                      <a href="checkout1.php" class="btn btn-outline-secondary">Address Not selected<i class="fa fa-chevron-right"></i></a>
                      <?php
                      }else{
                    ?>
                    <a href="otp-verify.php?aid=<?php echo $a_id; ?>&price=<?php echo $total; ?>&quantity=<?php echo $toatalCount; ?>" class="btn btn-outline-secondary" >Place Order ❯</a>
                    <?php
                  }
                  ?>
                    
                    
                  </div>
                </form>
                <!-- /.box-->
              </div>
            </div>
            <!-- /.col-lg-9-->
            
            <!-- /.col-lg-3-->
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
  </body>
</html>
