<?php
	include('db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="list.css">
	  <!-- <link rel="stylesheet" type="text/css" href="style2.css"/> -->
	<title></title>
	<style type="text/css">
		
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
<body>

</body>
</html>
<?php

//fetch_data.php


date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
$time1 = date("h:i:sa");
//echo $time1;
// echo $date;


// echo $date;



if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM product WHERE 
	";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		  product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$pro_id = $row['p_id'];
			$p_n = $row['product_name'];
			$output .= '
			
			  <table class="tbl-cart" cellpadding="10" cellspacing="1" border="0.4px" style="margin-left: 10px; margin-right: 60px; font-family:Verdana;">
    			<thead>
    				<tr class="button3" style="margin-left:100px;">
    				<th class="th4">
    				
    				<a href="details.php?p='.$pro_id.'&date='.$date.'&username='.$rn.'&p_name='.$p_n.'&time2='.$time1.'" class="logo">
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
    				</a>
    				</th>
    				<th class="th2" style="margin-left:10px;">
    				<a href="details.php?p='.$pro_id.'&date='.$date.'&username='.$rn.'&p_name='.$p_n.'&time2='.$time1.'" class="logo">
    				<div class="product-img"><input type="hidden" name="lblname" value=$row["product_name"]>'.$row["product_name"].'
    				
    				</a>
    				</th>
    				<th class="th3">
    				<div class="price2" style="margin-left:10px; margin-top:-40px;">Price:</div>
    				<h3 style="margin-left:20px;">'.$row['product_price'].'</h3>
    				<a href="addtocart.php?proid='.$pro_id.'"><input type="button" class="button button2" value="Add To Cart"></a>

    				</th>
    				</tr>
    				</thead>
  			</table>
  			<br/>






			
			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?><!-- 
<div class="col-sm-4 col-lg-3 col-md-3">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
					<img src="image/'. $row['product_image'] .'" alt="" class="img-responsive" >
					<p align="center"><strong><a href="#">'. $row['product_name'] .'</a></strong></p>
					<h4 style="text-align:center;" class="text-danger" >'. $row['product_price'] .'</h4>
					<p>Camera : '. $row['product_camera'].' MP<br />
					Brand : '. $row['product_brand'] .' <br />
					RAM : '. $row['product_ram'] .' GB<br />
					Storage : '. $row['product_storage'] .' GB </p>
				</div>

			</div> -->