<?php
if(isset($_POST['insert']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "pharma";
    // get values form input text and number

    $name = $_POST['name'];
    $pass = $_POST['psw'];
    $phone = $_POST['number'];
    $email = $_POST['email'];
    $user = $_POST['username'];
    $psw = $_POST['psw-repeat'];
    
    
    // connect to mysql database using mysqli

    $connect = mysqli_connect('localhost', $username, $password, 'pharma');
        
    
    // mysql query to insert data

    $query = "INSERT INTO `user`(`Name`, `Phone`,`username`, `Email`,`Password`,`pass`) VALUES ('".$name."','".$phone."','".$user."','".$email."','".$pass."','".$psw."')";
    
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
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
  <form method="POST" style="border:1px solid #ccc">
  <div class="container" style="text-align: center;">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
   <!--  <div class="Toggle">
      <div id="btn">
        <button type="button" class="toggle-btn">Customer</button>
        <button type="button" class="toggle-btn">Shopkeeper</button>
      </div>
    </div> -->

    <label for="name"><b>Name</b></label><br>
    <input type="text" placeholder="Enter Name" name="name" required><br>

    <label for="Contact"><b>Contact Number</b></label><br>
    <input type="text" placeholder="Enter Contact Number" name="number" required><br>

    <label for="username"><b>Username</b></label><br>
    <input type="text" placeholder="Enter Username" name="username" required><br>

    <label for="email"><b>Email</b></label><br>
    <input type="text" placeholder="Enter Email" name="email" required><br>

    <label for="psw"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="psw" required><br>

    <label for="psw-repeat"><b>Re-Enter Password</b></label><br>
    <input type="password" placeholder="Re-Enter  Password" name="psw-repeat" required><br>


    <div class="clearfix" style="padding-left: 540px;">
      
      <input type="submit" name="insert" value="Register" class="signupbtn">
      <button type="button" class="cancelbtn">Cancel</button>
    
    </div>
  </div>
</form>
</body>
</html> 