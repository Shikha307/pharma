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
$result = $db->query("SELECT * FROM user"); 
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
<div>
 <table class="tbl-cart" cellpadding="10" cellspacing="1" width="90%" class="center">
    <thead>
 <?php if($result->num_rows > 0){ ?> 
        
        <?php while($row = $result->fetch_assoc()){ ?>
          <?php
                  
                        $name   = $row['Name'];
                        $phone   = $row['Phone'];
                        $id = $row['username'];                        
                        $email = $row['Email'];
                        $type = $row['type'];
                        echo "";

                        
                        echo "<tr class='button3' height='50px'><th class='th4'>";
                        
                    echo "</th>";

                    echo "<th class='th2' style='border: 1px solid #ccc;'>";
                    

                    echo "<div class='product-img'><input type='hidden' name='lblname' value='$name'>Name :$name";
                    if ($type == "") {
                      echo "<label style='color:gold; border: 1px solid #ccc; margin-left:10px;'>Customer</label>";
                    }else{
                    echo "<label style='color:gold; border: 1px solid #ccc; margin-left:10px;'>$type</label>";
                    }
                    echo "<br/>";
                    echo "Phone Number : $phone";
                    echo "<br/>";
                    echo "Username : $id";
                    echo "<br/>";                  
                    echo "Email : $email";
                    echo "<br/>";
                    
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
<?php
  include 'footer.php';
?>