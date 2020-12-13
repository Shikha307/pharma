<?php
// include 'navbar.php';
$host="localhost";
$user="root";
$password="";
$db="pharma";
$connect = new mysqli('localhost',$user,$password, $db) or die("Unable to connect");
session_start();
$user = $_SESSION['username'];
echo "<script>alert('$user')</script>";
$query = "DELETE FROM `addtocart` WHERE `username`='".$_SESSION['username']."'";
    
    $result = mysqli_query($connect,$query);

    if($result)
    {
        echo "ok";
         header("Location: orders.php");
        
    }
    
    else{
        echo 'Data Not Inserted';
    }

mysqli_close($connect);


// $sql = "DELETE FROM addtocart WHERE name='" . $_GET["name"] . "'";
// if (mysqli_query($conn, $sql)) {
//     echo "Record deleted successfully";
// } else {
//     echo "Error deleting record: " . mysqli_error($conn);
// }
//mysqli_close($conn);
?>