<?php
include 'navbarn.php';
error_reporting(E_ALL ^ E_NOTICE);
$product_id = $_GET['aid'];
$total_price = $_GET['price'];
$total_qty = $_GET['quantity'];
// echo "$total_qty";
$rn=$_SESSION['username'];
// echo "$rn";
// echo "$product_id";
// echo "$total_price";
include 'db_connect.php';

$result = $connect->query("SELECT Phone from user where username='$rn'");


if($result->num_rows > 0){
    
        while($row = $result->fetch_assoc()){ 
          $id = $row['Phone'];
          echo "$id";
               $otp = rand(100000, 999999);
  $_SESSION['session_otp'] = $otp;
$fields = array(
    "sender_id" => "FSTSMS",
    "message" => "Your One Time Password is " . $otp,
    "language" => "english",
    "route" => "p",
    "numbers" => "$id",
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: ANeJbNp5ef7gt3yv6XNWWMGNqhEgCt4FwRqKIlCxXLxFXXLfibTvCBFqgtZ7",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}


      }
  }



    $query = "INSERT INTO `otpdata`(`otp`,`username`,`Date`) VALUES ('".$otp."','".$rn."',now())";
    
    $result = mysqli_query($connect,$query);



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Obaju : e-commerce template</title>
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
    
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Checkout - Address</li>
                </ol>
              </nav>
            </div>
            
            <div id="checkout" class="col-lg-9">
              <div class="box" style="position: center; width: 100%;">
                <form action="verification.php?Aid=<?php echo $product_id; ?>&price=<?php echo $total_price; ?>" method="post">
                  <h1><center>OTP Verification</center></h1>          
                  <div class="content py-3">
                    <div class="row" style="position: center;">
                      
                          <center><p>JUST ONE MORE STEP.</p><br/>
                          <P>LET'S VERIFIY YOUR MOBILE NUMBER.</P><br/>
                          <P>We already send a code to your mobile number (<?PHP echo $id; ?>).Please check your inbox and insert the code in form below to verify your mobile number.</P><br/>
                          <input type='text' name='code' required placeholder="Enter Otp">
                          <br/><br/>
                          <input type='submit' name='csubmit' class="btn btn-outline-secondary" value='submit'>  
                        </center>
                      

                    </div>
                  </div>
                  <div class="box-footer d-flex justify-content-between"><a href="basket.php" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Basket</a>
<!--                     <a href="verification.php" class="btn btn-outline-secondary">Check<i class="fa fa-chevron-right"></i></a> -->
                    
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
<?php
include 'footer.php';

?>