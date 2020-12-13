<?php
$host="localhost";
$user="root";
$password="";
$db="pharma";
$connect = new mysqli('localhost',$user,$password, $db) or die("Unable to connect");
$proc_id = $_GET['procid'];
echo $proc_id;
$query = "DELETE FROM `images` WHERE id='".$_GET['imgid']."'";
    
    $result = mysqli_query($connect,$query);

    if($result)
    {
         header("Location: addimage.php?proid=".$proc_id);
         exit();
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