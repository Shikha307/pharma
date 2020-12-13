<?php include 'navbarn.php'; ?>
<?php
      if(isset($_POST['insert22']))
    {
      $hostname = "localhost";
      $username = "root";
      $password = "";
      $databaseName = "pharma";
    // get values form input text and number

      $connect = new mysqli('localhost',$username,$password, $databaseName) or die("Unable to connect");
      // $name = $_POST['fname'];
      // $price = $_POST['lname'];

//       $result = $connect->query("SELECT image,name,price,des,inbox,Model_Number,Color,Browse_Type,Hybrid_Sim_Slot,Touchscreen,Display_Size,Resolution,Processor_Type,  Processor_Core,internalstorage,RAM,Expandable_Storage,Camera_Features,Other_Features FROM images WHERE price BETWEEN $name AND $price");
// if($result->num_rows > 0){
//   while($row = $result->fetch_assoc()){
//     $pro_id    = $row['name'];
//     echo "$pro_id";
//     echo '<script>alert("Welcome to Geeks for Geeks $pro_id")</script>';
//     echo "".$row['name']."";
//   }
// }
// else{
//   echo "Error";
// }
     // session_start();
    
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
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Price Range slider</title>
  <link rel="stylesheet" href="jQuery.UI.css" type="text/css" media="all" />
  <link rel="stylesheet" type="text/css" href="style2.css"/>
<script src="js/jquery-3.1.0.js"></script>
<script src="jquery_ui/jquery-ui.js"></script>
<link rel="stylesheet" href="jquery_ui/jquery-ui.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial;
  color: green;

}
.price2{
  margin-left: -125px;
  
  font-weight: bold;
}
.img3{
  width: 100%;
  height: 100%;
  align-content: left;
}
.split {
  margin-top: 60px;
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}

.left {
  left: 0;
  width: 35%;

  /*background-color: #d1cec7;*/
}
a.logo{
      
      text-decoration: none;
        
        
        text-align: left;
    }
.right {
  right: 0;
  width: 75%;
 /* background-color: #d1cec7;*/
}

.centered {
  position: absolute;
  top: 40%;
  margin-top: 0px;
  transform: translate(-50%, -50%);
  
}
.centered img {
  width: 150px;
  border-radius: 50%;
}
tbl-cart {
  font-size: 0.9em;
  margin-top: 0px;
  border-collapse:separate; 
  border-spacing:0 15px; 
  margin-left: 9px;

}

.th4 {
  font-weight: normal;
  width: 180px;
  height: 200px;
  text-align: top;
  margin-left: 10px;

}
.btn{
  align-items: left;
  margin-top: 0px;
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
.th2{
  width: 890px; 
  height: 100px;
  text-align: left;
  margin-left: 10px;
  padding: 10px;
  margin-top: 2px;
}
.th3{
  width: 200px; 
  margin-top: 0px; 
  margin-left: 0px;
}
.button1 {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
  margin-top: 5px;
  margin-left: 5px;
}
.button3:hover {
  box-shadow: 10px 12px 16px 10px rgba(0,0,0,0.24),30px 17px 70px 0 rgba(0,0,0,0.19);
  margin-top: 5px;
  margin-left: 5px;
}
::-webkit-scrollbar {
  width: 15px;
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
</style>
</head>
<body>
 
<center>
<div>
  <form method='POST' action="basket.php">
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
// echo "$user";
// Get image data from database 
$result = $db->query("SELECT DISTINCT * FROM product GROUP BY product_name"); 

    /*if($result1)
    {
        echo 'Data Inserted';
    }
    
    else{
        echo 'Data Not Inserted';
    }
    */
    //mysqli_free_result($result);
    // mysqli_close($connect);      

?>
<center>
  <div style="overflow-x: auto;">
  <table class="tbl-cart" cellpadding="10" cellspacing="1" border="0.4px">
    <thead>
 <?php if($result->num_rows > 0){ ?> 
        <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?>
          <?php
                        $pro_id    = $row['p_id'];
                        $pro_cat   = $row['product_name'];
                        $pro_brand = $row['product_price'];
                        
                        echo "";

                        echo "<input type='hidden' value='$pro_id' name='priceid'>";
                        echo "<tr class='button3'><th class='th4'>";
                        echo "<a href='details.php?proid=$pro_id' class='logo'>";
                       echo '<img src="data:image/jpeg;base64,'.base64_encode($row['product_img'] ).'" height="200" width="200"/>';
                    echo "</a>";
                    echo "</th>";

                    echo "<th style='width:700px;'>";
                    echo "
                    <center>
                    <a href='details.php?proid=$pro_id' class='logo'>";

                    echo "<div class='product-img'><input type='hidden' name='lblname' value='$pro_cat'>$pro_cat";

                    
                    
          echo "</a>";
          
          echo "<br/>";          
          echo "<h3>Price : $pro_brand</h3>";
          echo "<br/>";
          echo "</center>";
          echo "<center><a href='addtocart.php?proid=$pro_id'><input type='button' class='button button2' href='addcart.php?proid=$pro_id' value='Add To Cart'></a></center>";
          echo "</th>";
          echo "</tr>";
                echo "</form>";




          ?>
        
    
      

  <?php } ?> 
<!--     </div>  -->
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>
</thead>
  </table>
</div>
</center>
</form>
</div>
</center>
</body>
</html>
  