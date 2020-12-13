<?php include 'navbarn.php';
$host="localhost";
$user="root";
$password="";
$db="pharma";
$connect = new mysqli('localhost',$user,$password, $db) or die("Unable to connect");
 ?>
<!DOCTYPE html>
<html>
<head>
   <title></title>
   <link rel="stylesheet" type="text/css" href="list.css">
  <style type="text/css">
    body{
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
<body style="width: 100%;">
  <?php
   $query = $_GET['query']; 
   // gets value sent over search form
   echo "<center>";
   echo "Showing result for ".$query;
   echo "</center>";
   $min_length = 3;
   // you can set minimum length of the query if you want
   
   if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
      
      $query = htmlspecialchars($query); 
      // changes characters used in html to their equivalents, for example: < to &gt;
      
      $query = mysqli_real_escape_string($connect,$query);
      // makes sure nobody uses SQL injection
      
      $raw_results = mysqli_query($connect,"SELECT * FROM product
         WHERE (`product_name` LIKE '%".$query."%')");
         
      // * means that it selects all fields, you can also write: `id`, `title`, `text`
      // articles is the name of our table
      
      // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
      // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
      // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
      
      if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
         
         while($results = mysqli_fetch_array($raw_results)){
         // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
            $pro_id = $results['p_id'];
            echo "<div style='overflow-x:auto;'>";
echo '<table class="tbl-cart" cellpadding="10" cellspacing="1" border="0.4px" style="width:600px;" align="center" >
            <thead>
               <tr class="button3" style="margin-left:100px;">
               <th class="th4" style="">
               <a href="details.php?proid='.$pro_id.'" class="logo">
               <div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="data:image/jpeg;base64,'.base64_encode($results['product_img'] ).'" height="200" width="200"/>
    </div>
    <div class="flip-card-back">
      <img src="data:image/jpeg;base64,'.base64_encode($results['product_img'] ).'" height="200" width="200"/>
    </div>
  </div>
</div>
</a>

               </a>
               </th>
               <th class="th2" style="margin-left:10px;">
               <a href="details.php?proid='.$pro_id.'" class="logo">
               <div class="product-img"><input type="hidden" name="lblname" value=$row["product_name"]>'.$results["product_name"].'</a>
               
                  <br/>
                  <h3 style="margin-left:20px;">'.$results['product_price'].'</h3>
                  
                  <a href="addcart.php?proid='.$pro_id.'"><input type="button" class="button button2" value="Add To Cart"></a>

                  <br/>
                  <br/>
               </a>
               </th>            
               </tr>
               </thead>
         </table></div>'
         ;
            // posts results gotten from database(title and text) you can also show id ($results['id'])
         }
         
      }
      else{ // if there is no matching rows do following
         echo "No results";
      }
      
   }
   else{ // if query length is less than minimum
      echo "Minimum length is ".$min_length;
   }
?>
</body>



</html>