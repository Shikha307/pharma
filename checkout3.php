<?php
  include 'navbarn.php';
include 'db_connect.php';
// session_start();
  error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Select Payment type:</title>
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
                  <li aria-current="page" class="breadcrumb-item active">Checkout - Payment method</li>
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
                        <th>₹ 10.00</th>
                      </tr>

                      <tr>
                        <td>Tax</td>
                        <th>₹ 0.00</th>
                      </tr>
                      <tr class="total">
                        <td>Total</td>
                        <th><?php
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
                  <div class="nav flex-column flex-sm-row nav-pills"><a href="checkout1.php" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker">                  </i>Address</a><a href="checkout2.php" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-truck">                       </i>Delivery Method</a><a href="checkout3.php" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-money">                      </i>Payment Method</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye">                     </i>Order Review</a></div>
                  <div class="content py-3">
                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="box payment-method">
                          <h4>Cash on delivery</h4>
                          <p>You pay when you get it.</p>
                          <div class="box-footer text-center">
                            <input type="radio" name="payment" value="payment3">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                  </div>
                  <!-- /.content-->
                  <div class="box-footer d-flex justify-content-between"><a href="checkout2.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Shipping Method</a>
                    <?php
                      $a_id = $_GET['aid'];
                      if ($a_id == "") {
                        # code...
                      ?>
                      <a href="checkout1.php" class="btn btn-outline-secondary">Address Not selected<i class="fa fa-chevron-right"></i></a>
                      <?php
                      }else{
                    ?>
                    <a href="checkout4.php?aid=<?php echo $a_id; ?>" class="btn btn-outline-secondary">Continue to Payment Method<i class="fa fa-chevron-right"></i></a>
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
<?php
include 'footer.php';

?>