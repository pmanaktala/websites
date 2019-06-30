<?php
session_start();
$name=$_SESSION["uname"];
$target_dir = $name . "/"; 
if(!is_dir($target_dir))
mkdir($name);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        header("location:images.php?format");
        die();
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    header("location:images.php?exists");
    die();
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    header("location:images.php?type");
    die();
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    header("location:images.php?error");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
       header("location:images.php?error");
       die();
    }
}

$img=$target_dir . basename( $_FILES["fileToUpload"]["name"]);

    extract($_POST);
    $sql="insert into uploads(Email,Path,Description) values('$name','$img', '$desc')";
    $conn=mysqli_connect('localhost','pmanakta_db','pmanaktala;');
    if(!$conn) 
    { 
        die("Error connection to database"); 
    }
    $stat=mysqli_select_db($conn,'pmanakta_db');
    if(!$stat) 
    {
         die("Error selecting table"); 
    }
    $result = mysqli_query($conn, $sql);
    if(!$result)
     {
      echo "Error in inserting the data";
     }
     header("location:images.php?success");
?>