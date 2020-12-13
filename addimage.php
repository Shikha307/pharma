<?php  
include 'navbarn.php';
// Database configuration  
$dbHost     = "localhost";  
$dbUsername = "root";  
$dbPassword = "";  
$dbName     = "pharma";  
  
// Create database connection  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
  
// Check connection  
if ($db->connect_error) {  
    die("Connection failed: " . $db>connect_error);  

}
$product_id = $_GET['proid'];
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    
    

    if (isset($_SESSION["username"])) {
            $rn = $_SESSION["username"]; 
          }else{
            $rn = "";
                
        } 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // // Insert image content into database 
            // $insert = $db->query("INSERT into images (`name`,`price`,`des`,`image`, `uploaded`) VALUES ('$name','$price','$des','$imgContent', NOW())"); 
            
            $connect = new mysqli('localhost','root','', 'pharma') or die("Unable to connect");
            $query = "INSERT INTO `images`(`image`,`product_id`) VALUES ('".$imgContent."','".$product_id."')";

    
    $result = mysqli_query($connect,$query);
            if($query){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
// $result = $db->query("SELECT image FROM images ORDER BY uploaded DESC"); 
?>


<!DOCTYPE html>
<html>
<head>
    <title>Add images to product</title>
    <script type="text/javascript">
    $(function() {
            $('.pop').on('click', function() {
                $('.imagepreview').attr('src', $(this).find('img').attr('src'));
                $('#imagemodal').modal('show');   
            });     
    });
  </script>
  <style type="text/css">
      
    .split {
  margin-top: 80px;
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
  width: 30%;

  background-color: white;
}
.right {
  right: 0;
  width: 70%;
  height: 90%;

  /*background-color: black;*/
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
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
 $proc_id = $_GET['proid'];
 // echo "$product_id";
// Get image data from database 
$result = $db->query("SELECT * FROM product WHERE p_id='$proc_id' ORDER BY p_id DESC"); 
?>
<?php if($result->num_rows > 0){ ?> 
  <?php while($row = $result->fetch_assoc()){ 
    $id = $row['p_id'];
    $name = $row['product_name'];

          ?> 
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="split left">
            <marquee behavior="scroll" direction="left">Add maximum 4 images for better quality.</marquee>
    <?php
      $result1 = $db->query("SELECT * FROM images WHERE product_id='$id'");
      if($result1->num_rows > 0){
        while($row1 = $result1->fetch_assoc()){ 
          $id1 = $row1['product_id'];
          $imgid = $row1['id'];

    ?>
    <div id="divi" style="margin-left: 80px;">

        <table>
    <tr>
        <td><a href="#" class="pop">
    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row1['image']); ?>" width="50px" height="70px" class="img-responsive" style="margin-left: 20px; margin-top: 20px;"/>
        </a></td>
        <td style="width: 40px"></td>
    <td><a href="deleteimg.php?imgid=<?php echo $imgid; ?>& procid=<?php echo $id1; ?>" class="btnRemoveAction">
        <img src="icon-delete.png" href="deleteimg.php?imgid=<?php echo $imgid; ?>& procid=<?php echo $id1; ?>" name="insert" alt="Remove Item" style="margin-top: 10px;" />
    </a></td>
    </tr>
    </table>
    </div>
    <?php
}}
    ?>
    
    </div>
    <div class="split right">
    <b><label style="margin-left: 120px;"><h3><?php echo $name; ?></h3></label></b>
    <div class="imagemodal" style="margin-left: 200px;">
    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['product_img']); ?>" class="imagepreview" height="400px;" />
  </div>
  <br/>

    <label style="margin-left: 240px; font-family: Verdana">Select Image File:</label>
    <input type="file" name="image"><br/><br/>
    
   <!--  <label>Enter ID:</label>
    <input type="text" name="id"><br/><br/> -->
    <button class="button" name="submit" style="vertical-align:middle; margin-top: -10px; margin-left: 330px;">Upload</button>
    </div>

</form>
<?php
        }
    }
    ?>
</body>
</html>