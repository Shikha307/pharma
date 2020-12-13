<?php
include 'navbarn.php';
include 'db_connect.php';
error_reporting(E_ALL ^ E_NOTICE);
// session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Select Address</title>
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
                  <li aria-current="page" class="breadcrumb-item active">Checkout - Address</li>
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
                <form method="get" action="checkout2.html">
                  <h1>Checkout - Address</h1>
                  <div class="nav flex-column flex-md-row nav-pills text-center"><a href="checkout1.html" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-map-marker">                  </i>Address</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-truck">                       </i>Delivery Method</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-money">                      </i>Payment Method</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye">                     </i>Order Review</a></div>

                  <div class="content py-3">
                    <div class="row">

  <?php 
// Include the database configuration file  

$dbHost     = "localhost";  
$dbUsername = "root";  
$dbPassword = "";  
$dbName     = "pharma";  
  
// Create database connection  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
if (isset($_SESSION["username"])) {
            $rn = $_SESSION["username"]; 
            
          }else{
            $rn = "";
                
        } 
 //         $product_id = $_GET['proid'];
 // echo "$product_id";
// Get image data from database 
// Get image data from database 
//$result = $db->query("SELECT name,price FROM addtocart WHERE username='".$_SESSION["username"]."'"); 
$result = $db->query("SELECT * FROM address WHERE username= '$rn'");

                
            
        
?>
   <h3><label class="txt-heading">SELECT ADDRESS</label>
        <label style="text-align: right; margin-left: 200px;"><a href="newadd.php" class="logo">+ Click here to add new address</a></label>
   </h3>
<?php
if($result->num_rows > 0){ 
    while($row = $result->fetch_assoc()){
        // echo $row['mob'];
        $id = $row['id'];

?>
     
<table style="margin-left: 10px;">
    <tr style="border: 1px solid black;">
        
        
        <td  style="border: 1px solid black; width: 900px; margin-left: 10px;">
        <br/>
        
        <?php echo "<a href='checkout2.php?aid=$id'>";  ?>
        <label style="margin-left: 10px;border: 1px solid black; font-size: 20px;"><?php echo $row['type']; ?></label>
        <br/><br/>
        <label style="margin-left: 10px; font-size: 20px;"><?php echo $row['name']; ?></label>
        <label style="margin-left: 100px; font-size: 20px;"><?php echo $row['mob']; ?>/</label>
        <label style="margin-left: 10px; font-size: 20px;"><?php echo $row['mob1']; ?></label>
        <br/><br/>
        <label style="margin-left: 10px;font-size: 20px;"><?php echo $row['Address'];?></label>
        <?php echo "<a/>"; ?>
        <br/>
        <br/>
    </td>
    </tr>

</table>

<?php
}

}
?>
                    </div>
                  </div>
                  <div class="box-footer d-flex justify-content-between"><a href="basket.php" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Basket</a>
                    <a class="btn btn-outline-secondary">Click on Address to Continue<i class="fa fa-chevron-right"></i></a>
                    
                  </div>
                </form>
              </div>
              <!-- /.box-->
            </div>
            <!-- /.col-lg-9-->
            <!-- /.col-lg-3-->
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
  </body>
</html>
