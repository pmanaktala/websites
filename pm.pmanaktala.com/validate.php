<?php
    session_start();
extract($_POST);
$_SESSION['uname']= $username;
//$_SESSION['password']= $mypassword;
 
if (isset($_POST["remember"]))
{
    setcookie("username",$_POST["username"], time() + (60*60*24));
    setcookie("password",$_POST["password"], time() + (60*60*24));
}
else
{
    setcookie("username",$_POST["username"], 1);
    setcookie("password",$_POST["username"], 1);
}
    $sql="Select * from my_tab where Email='$username' and Password='$password'";
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
     if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $img=$row["Profile"];
    }
} else {
    $img="http://jennstrends.com/wp-content/uploads/2013/10/bad-profile-pic-2.jpeg";
}

 $_SESSION["profile"]=$img;
     if (mysqli_num_rows($result) == 1) 
         header("location:index.php");
     else
     	 header("location:login.php?incorrect");

?>