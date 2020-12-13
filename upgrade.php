<?php include 'navbarn.php'; ?>
<?php

	$hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "pharma";
    $connect = new mysqli('localhost',$username,$password, $databaseName) or die("Unable to connect");
    if (isset($_SESSION["username"])) {
            $rn = $_SESSION["username"]; 
            echo "$rn";
     $query = "UPDATE user SET type='admin' WHERE username='$rn'";
         //$query = "INSERT INTO user (`type`) VALUES('admin') WHERE username=$rn" ;

    $result = mysqli_query($connect,$query);
    if($result)
    {
        echo 'Data Inserted';
    }
    
    else{
        echo 'Data Not Updated';
    }
}
    mysqli_close($connect);
?>