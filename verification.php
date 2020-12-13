    <?php
// include 'nav.php';
include 'db_connect.php';
$total_price = $_GET['price'];
session_start();
$rn=$_SESSION['username'];
$otp = $_POST['code'];
$query = "SELECT * from otpdata where otp=$otp";
    // echo "$otp";
    $result = mysqli_query($connect,$query);
        if (isset($_SESSION["username"])) {
            $rn = $_SESSION["username"]; 
            //echo $rn;
          }else{
            $rn = "rk";
                
        } 
                foreach($connect->query("SELECT SUM(price) FROM addtocart  WHERE username='$rn'") as $row) {
                
                // echo "$" . $row['SUM(price)'] . "";
                // $total_price = $row['SUM(price)'];
                }
    
    if($result->num_rows > 0){
    	while($row = $result->fetch_assoc()){
               
                if ($otp == $row['otp']) {                
                    echo "OTP verification Done!";                    
                    $result1 = $connect->query("SELECT DISTINCT addtocart.product_id,addtocart.name,addtocart.price,product.p_id,product.product_img,product.product_name,product.product_price FROM addtocart INNER JOIN product ON addtocart.name=product.product_name WHERE addtocart.username='$rn'");

    if($result1->num_rows > 0){    
        while($row1 = $result1->fetch_assoc()){ 
          $id = $row1['product_id'];
          $qry_appr = "SELECT COUNT(*) FROM addtocart WHERE product_id ='$id'";
            $qry_data = mysqli_query($connect, $qry_appr);
            $approve_count = mysqli_fetch_array($qry_data);
            $toatalCount = array_shift($approve_count);
            echo $toatalCount;
			echo "$id";
            
                $product_id = $_GET['Aid'];
						$query5 = "INSERT INTO `orders` (`aid`,`date`,`id`,`pro_id`,`total_price`,`total_quantity`,`username`) VALUES ('".$product_id."',now(),'".$id."','".$id."','".$total_price."','".$toatalCount."','".$rn."')";
						    $result2 = mysqli_query($connect,$query5);
						    if ($result2) {
						    	# code...
						    	
						    	echo "abcdefgh";
                                echo $toatalCount;
                                // exit(header("Location: deletecart.php"));
						    	header("Location: deletecart.php?c=".$toatalCount);
                                exit();
						    }
						    else{
						    	echo "NOT OK";
						    }
         }
    }
                    //echo json_encode(array("type"=>"success", "message"=>"Your mobile number is verified!"));
                } else {
                	echo "Not done";
                    //echo json_encode(array("type"=>"error", "message"=>"Mobile number verification failed"));
                }
            }
        }
        else{
        	echo "Not done123";
        }

?>