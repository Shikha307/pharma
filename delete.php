<?php
$host="localhost";
$user="root";
$password="";
$db="pharma";
$connect = new mysqli('localhost',$user,$password, $db) or die("Unable to connect");

$query = "DELETE FROM `addtocart` WHERE name='".$_GET['name']."'";
    
    $result = mysqli_query($connect,$query);

    if($result)
    {
         header("Location: basket.php");
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