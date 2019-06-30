<?php
$target_dir = "Profile/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
echo $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
        $img="http://jennstrends.com/wp-content/uploads/2013/10/bad-profile-pic-2.jpeg";
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $uploadOk = 0;
    $img="http://jennstrends.com/wp-content/uploads/2013/10/bad-profile-pic-2.jpeg";
}
// Check file size
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $uploadOk = 0;
    $img="http://jennstrends.com/wp-content/uploads/2013/10/bad-profile-pic-2.jpeg";
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $img="http://jennstrends.com/wp-content/uploads/2013/10/bad-profile-pic-2.jpeg";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $img=$target_dir . basename( $_FILES["fileToUpload"]["name"]);
    } else {
        echo "Sorry, there was an error uploading your file.";
        $img="http://jennstrends.com/wp-content/uploads/2013/10/bad-profile-pic-2.jpeg";
    }
}
?>

<?php
    extract($_POST);
    $sql="insert into my_tab(Name,Email,Password,Contact,Profile) values('$name','$email','$psw',$contact,'$img')";
    $sql1="Select * from my_tab where Email='$email'";
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
    $result = mysqli_query($conn, $sql1);
    if(!$result) 
    {
     echo "Error executing querry";
    }
    $num= mysqli_num_rows($result);
    
    if($num>0) 
    {
     header("location:register.php?exists");
    }
    else
    {
     $result = mysqli_query($conn, $sql);
     if(!$result)
     {
      echo "Error in inserting the data";
     }
     else
     {
      session_start();
      $_SESSION["email"]=$email;
      $_SESSION["pass"]=$psw;
      echo $sql; 
      header("location:login.php?success");
     }
    }
?>