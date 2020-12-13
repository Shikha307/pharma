<?php
include 'navbarn.php';
      if(isset($_POST['insert']))
    {
      $hostname = "localhost";
      $username = "root";
      $password = "";
      $databaseName = "pharma";
    // get values form input text and number
 $connect = new mysqli('localhost',$username,$password, $databaseName) or die("Unable to connect");
      $name = $_POST['lblItemName'];
      $price = $_POST['lblItemprice'];
      $id = $_POST['id'];
      echo "$id";
     // session_start();
      if (isset($_SESSION["username"])) {
            $rn = $_SESSION["username"]; 
            $query = "INSERT INTO `addtocart`(`name`, `price`,`username`) VALUES ('".$name."','".$price."','".$rn."')";
    
            $result = mysqli_query($connect,$query);

            if($result)
            {
                 echo "<script>alert('Product added to cart $id successfully')</script>";
                header('Location: addtocart.php?proid=$id');
            }
            
            else{
                echo 'Data Not Inserted';
            }
      }else{
            echo "<script>alert('Login Required')</script>";
                
      }
     
    
    // mysql query to insert data


    /*if($result1)
    {
        echo 'Data Inserted';
    }
    
    else{
        echo 'Data Not Inserted';
    }
    */
    //mysqli_free_result($result);
    mysqli_close($connect);
}
?>
<!DOCTYPE html>
<html>
<head>

  <title>Product Description</title>
  <link rel="icon" href="offer/icon1.png">
  <script type="text/javascript">
    $(function() {
            $('.pop').on('click', function() {
                $('.imagepreview').attr('src', $(this).find('img').attr('src'));
                $('#imagemodal').modal('show');   
            });     
    });
  </script>
  <style type="text/css">

    .split {
  margin-top: 80px;
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
  background-color: white;
}

.left {
  left: 0;
  width: 100%;

  background-color: white;
}
.right {
  right: 0;
  width: 70%;
  height: 88%;
  overflow-y: scroll;

  /*background-color: black;*/
}

    .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  width: 150px;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}

.button1 {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
.txt-heading {
  color: #211a1a;
  border-bottom: 1px solid #E0E0E0;
  overflow: auto;
  margin-right: 50px;
  }
  ::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 15px;
  display: flex;
}

/* Columns */
.left-column {
  width: 65%;
  position: relative;
}
.right-column {
  width: 85%;
  margin-top: 60px;
}


/* Left Column */
.left-column img {
  width: 100%;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
  transition: all 0.3s ease;
}

.left-column img.active {
  opacity: 1;
}

table, th, td {
 
  border-collapse: collapse;
}
td{
  width: 300px;
}
table.center {
  margin-left: auto; 
  margin-right: auto;
}

  </style>
 
 </head>
<body style="background-color: white;">
<div style="background-color: white; margin-top: -40px;">


  <?php 
// Insertedclude the database configuration file  

$dbHost     = "localhost";  
$dbUsername = "root";  
$dbPassword = "";  
$dbName     = "pharma";  
  
// Create database connection  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
 $product_id = $_GET['proid'];
 // echo "$product_id";
// Get image data from database 
$result = $db->query("SELECT * FROM product WHERE p_id='$product_id'"); 
?>
<?php if($result->num_rows > 0){ ?> 
  <?php while($row = $result->fetch_assoc()){ 
    $id = $row['p_id'];
          
          ?> 
  
    <?php
      $result1 = $db->query("SELECT * FROM images WHERE product_id='$id'");
      if($result1->num_rows > 0){
        while($row1 = $result1->fetch_assoc()){ 
          $id1 = $row1['product_id'];
           

    ?>
<center>
    <div id="divi" style="margin-right: 300px;">
      <a href="#" class="pop">
    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row1['image']); ?>" width="70px" height="90px" class="img-responsive" style="margin-left: 20px; margin-top: 20px;"/>
</a>
  


        <!-- $('img').click(function(){
          alert(this.$row1['product_id']);
        }); -->
      </div>
      <?php
        }
      }
      ?>
     <div class="imagemodal" style="margin-top: -400px; margin-left: 80px;">
    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['product_img']); ?>" class="imagepreview" height="400px" width="300px" />
  </div></center>
</div>
 
<center>
  <table style="background-color: white;">
      <tr>
        <div style="margin-top: 20px; background-color: white;"><h2>
          <?php echo $row['product_name'] ?>
                    <input type="hidden" name="id" value="<?php echo $row['p_id']; ?>">
                    <input type="hidden" name="lblItemName" value="<?php echo $row['product_name']; ?>">
        </h2>
      </div>
      </tr>
      <tr>
        <div style="background-color: white"><h2>
          <?php echo "₹ ".$row['product_price']."" ?>
                    <input type="hidden" name="lblItemprice" value="<?php echo $row['product_price'] ; ?>">
        </h2>
      </div>
      </tr>
      <tr>
        <div style=" background-color: white;">
          <h4>Available offers</h4>
          <div style="margin-top: 10px;"><i class="fas fa-tags" style="color: green"></i><b> Bank Offer </b><label>10% off on SBI Credit Cards, up to ₹1750. On orders of ₹5000 and above</label><br/>          </div>
          <div style="margin-top: 10px;"><i class="fas fa-tags" style="color: green"></i><b> Bank Offer </b><label>10% off on SBI Debit Cards, up to ₹1250. On orders of ₹5000 and above</label><br/></div>
          <div style="margin-top: 10px;"><i class="fas fa-tags" style="color: green"></i><b> Bank Offer </b><label>₹125 Instant Cashback on Paytm Wallet. Min Order Value ₹1,250. Valid once per Paytm account</label><br/></div>
          <div style="margin-top: 10px;"><i class="fas fa-tags" style="color: green"></i><b> Bank Offer </b><label>5% off* with Axis Bank Buzz Credit Card</label></div>
          <div style="margin-top: 10px;"><i class="fas fa-tags" style="color: green"></i><b> Bank Offer </b><label>Extra ₹1250 Off on SBI Credit Cards. On orders of ₹30000 and above</label></div>
          
          
        </div>
      </tr>
      <tr>
        <div style="background-color: white;"><h1>
          <?php
                  echo "<a href='addcart.php?proid=$id'><input type='button' class='button button1' value='Buy Now'></a>";
                  ?>
                    <?php
                  echo "<a href='addcart.php?proid=$id'><input type='button' class='button button1' value='Add to cart' style='margin-left:10px;'> </a>";
                  ?>
        </h1>
      </div>
      </tr>
      <tr>
        <div style=" background-color: white;">
          <h4><div class="txt-heading"><h3>Description:</h3></div></h4><br/>
        <h5>  <?php echo $row['product_desc'] ?></h5>
        <h4>Quantity:<?php echo $row['quantity'] ?></h4>
        </div>

      </tr>

      <tr>
      
      </tr>
      
      
  </table>
  <table class="center" style="background-color: white;">
      <tr>
        
      <h4><div style="background-color: white;" class="txt-heading">Seller Information:</div></h4>
      </tr>
      <?php
        $usern = $row['username'];
        $userdetails = $db->query("SELECT * FROM user WHERE username='$usern'"); 
        if($userdetails->num_rows > 0){
        while($row1 = $userdetails->fetch_assoc()){
      ?>

      <tr>
        <td><div style="margin-top: 10px;">
          <?php echo 'Seller name:' ?>
          </div></td>
        <td><div style="margin-left: 90px; margin-top: 10px;">
          <?php
            echo "".$row1['Name']."";
            ?>
                   
        </div></td>                    
      </tr>
      <tr>
        <td><div style="margin-top: 10px;">
          <?php echo 'Seller Username:' ?>
          </div></td>
        <td><div style="margin-left: 90px; margin-top: 10px;">
          <?php
            echo "".$row1['username'];
            ?>
                   
        </div></td>                    
      </tr>
      <tr>
        <td><div style="margin-top: 10px;">
          <?php echo 'Seller contact no.:' ?>
          </div></td>
        <td><div style="margin-left: 90px; margin-top: 10px;">
          <?php
            echo "".$row1['Phone'];
            ?>
                   
        </div></td>                    
      </tr>
      <?php 
        }
      }
       ?>
    </table>

</center> 
          <?php } ?> 
                  <?php } ?> 

</div>
</body>
</html>
