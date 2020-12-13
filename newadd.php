<?php 
session_start();
if(isset($_POST['insert']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "pharma";
    // get values form input text and number
    
    $fname = $_POST['Fname'];
    $lname = $_POST['mob'];
    $pass = $_POST['pincode'];
    $phone = $_POST['locality'];
    $email = $_POST['city'];
    $que = $_POST['landmark'];
    $user = $_POST['Address'];
    $age = $_POST['mob1'];
    $type = $_POST['radio1'];
    
    // connect to mysql database using mysqli

    //$connect = mysqli_connect('localhost', $username, $password, 'demo');
    $connect = new mysqli('localhost',$username,$password, $databaseName) or die("Unable to connect");
    
    // mysql query to insert data

    $query = "INSERT INTO `address`(`name`, `mob`, `pincode`,`locality`,`city`,`landmark`,`Address`,`type`,`mob1`,`username`) VALUES ('".$fname."','".$lname."','".$pass."','".$phone."','".$email."','".$que."','".$user."','".$type."','".$age."','".$_SESSION["username"]."')";
    
    $result = mysqli_query($connect,$query);

    //$query1 = "INSERT INTO `user`(`confirmp`) VALUES ('$phone')";

    //$result1 = mysqli_query($connect,$query1);    
    // check if mysql query successful

    if($result)
    {
        echo 'Data Inserted';
    }
    
    else{
        echo 'Data Not Inserted';
    }
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
	<title>Add New Address</title>

	<style type="text/css">
	body{
		background-color: #FBC5B8;

	}
    .txt-heading {
	color: #211a1a;
	margin-left: 50px;
	margin-top: 20px;
	border-bottom: 1px solid #E0E0E0;
	overflow: auto;
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
		.div1 {
		  width: 1320px;
		  height: 570px;
		  padding: 10px;
		  
		  border: 5px solid gray;
		  margin-left: 20px;
		  margin-top: 20px;
		  margin-right: 20px;
		  margin-bottom: 20px;
			background-color: transparent;  
		  /*background-color:grey;*/
		}
		.input1{
			width: 200px;
			height: 40px;
		}
		</style>
</head>
<body>
	<form method="POST" action="#">
	<div class="div1">
		<h1><label class="txt-heading">ADD A NEW ADDRESS</label></h1>
		<table style="margin-top: 20px; margin-left: 200px;">
			<tr>
	<td><label style="margin-left: 60px;">First Name:</label></td>
	<td><input type="text" style="margin-left: 30px; width: 540px; height: 40px;" name="Fname" required="" placeholder="first name"></td>
	</tr>
	</table>
	<table style="margin-top: 20px; margin-left: 200px;">
	<tr>
	<td><label style="margin-left: 60px;">Mobile Number:</label></td>
	<td><input type="text" class="input1" name="mob" required="" placeholder="10 Digit Mobile Number"></td>
	<td><label style="margin-left: 60px;">Pincode:</label></td>
	<td><input type="number" name="pincode" class="input1" required="" placeholder="Pincode"></td>
	</tr>

	<tr>
	<td><label style="margin-left: 60px;">Locality:</label></td>
	<td><input type="text" class="input1" name="locality" placeholder="locality"></td>
	</tr>
	<tr>
	<td><label style="margin-left: 60px;">City:</label></td>
	<td><input type="text" class="input1" name="city" placeholder="City/District/Town"></td>
	<td><label style="margin-left: 60px;">Landmark:</label></td>
	<td><input type="text" class="input1" name="landmark" placeholder="Landmark(optional)"></td>
	</tr>
</table>
	
	<label style="margin-left: 255px;">Address:</label>
	<textarea name="Address" style="width: 540px; height: 100px; margin-left: 50px; margin-top: 10px;" placeholder="Address(Area and Street)"></textarea>
	
	
	<table>
	
	<br/>
	<tr>
	<td><label style="margin-left: 202px;">Another Mobile(optional):</label></td>
	<td><input type="text" class="input1" name="mob1" placeholder="Another Mobile Number(optional)"></td>
</tr>
</table>
	<h1><label class="txt-heading">Address Type</label></h1>
	<br/>
	<div style="margin-left: 250px;">
	<input type="radio" checked="checked" name="radio1" value="Home"><label>Home</label>
	<input type="radio" style="margin-left: 30px;" name="radio1" value="Work"><label>Work</label>
	</div>
	<center><input type='submit' name="insert" class='button' value='Add Address'></center>

	</div>
</form>
</body>
</html>