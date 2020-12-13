<?php include 'navbarn.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Product List</title>
  <link rel="icon" href="offer/icon1.png">
  <link rel="stylesheet" type="text/css" href="list.css">
  <style>
body {
  background-color: white;
}

.flip-card {
  background-color: transparent;
  width: 200px;
  height: 200px;
  perspective: 1000px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}
table, th, td {

}

table.center {
  margin-left: auto; 
  margin-right: auto;
}
td{
  width: 300px;
}

.flip-card-front {
  /*background-color: #bbb;*/
  color: black;
}

.flip-card-back {
  /*background-color: #2980b9;*/
  color: white;
  transform: rotateY(180deg);
}
</style>
</head>
<body>
  <?php 
// Insertedclude the database configuration file  

$dbHost     = "localhost";  
$dbUsername = "root";  
$dbPassword = "";  
$dbName     = "pharma";  
  
// Create database connection  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
 // echo "$product_id";
// Get image data from database 
$result = $db->query("SELECT * FROM product WHERE username='$user' ORDER BY p_id DESC"); 
$count=mysqli_num_rows($result);

            if($count>0){
              //echo "result was found";
            }
            else {
              echo " result was not found";
            }

 // if($result->num_rows > 0){ 
 //   while($row = $result->fetch_assoc()){ 
 //    $id = $row['product_id'];
    ?>
<div style="overflow-x: auto;" align="center">
 <table class="tbl-cart" cellpadding="10" cellspacing="1" style="width: 500px;" class="center">
    <thead>
 <?php if($result->num_rows > 0){ ?> 
        
        <?php while($row = $result->fetch_assoc()){ ?>
          <?php
                  
                        $pro_id    = $row['p_id'];
                        $pro_cat   = $row['product_name'];
                        $pro_brand = $row['product_price'];                        
                        echo "";

                        echo "<input type='hidden' value='$pro_id' name='priceid'>";
                        echo "<tr class='button3' height='50px'><th class='th4'>";
                        echo "<a href='details.php?proid=$pro_id' class='logo'>";
                        echo '
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="data:image/jpeg;base64,'.base64_encode($row['product_img'] ).'" height="200" width="200"/>
    </div>
    <div class="flip-card-back">
      <img src="data:image/jpeg;base64,'.base64_encode($row['product_img'] ).'" height="200" width="200"/>
    </div>
  </div>
</div>
';
                       // echo '<img src="data:image/jpeg;base64,'.base64_encode($row['product_image'] ).'" height="200" width="200"/>';
                    echo "</a>";
                    echo "</th>";

                    echo "<th class='th2' style=''>";
                    echo "<a href='details.php?proid=$pro_id' class='logo'>";

                    echo "<div class='product-img'><input type='hidden' name='lblname' value='$pro_cat'>$pro_cat";
                    
                    echo "<br/>";
                            
          echo "</a>";
          echo "<h3>Price : $pro_brand</h3>";
          echo "<a href='addimage.php?proid=$pro_id'><input type='button' class='button button2' href='addcart.php?proid=$pro_id' value='Add Images'></a>";
                    echo "<br/>";
          echo "</th>";        
          echo "</tr>";
                echo "</form>";        

    }
  }
?>
</thead>  
</table>
</div>
</body>
</html>