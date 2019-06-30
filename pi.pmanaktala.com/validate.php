<?php

extract($_POST);
$sql1="select * from user where username = '$eml' and passoword='$psw'";
 $conn=mysqli_connect('localhost','pmanakta_db','pmanaktala;');
  if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
    $stat=mysqli_select_db($conn,'pmanakta_pi');
    if(!$stat) 
    {
         die("Error selecting db"); 
    }
    
    $result = mysqli_query($conn, $sql1);
    if(!$result) 
    {
     echo "Error executing querry 1";
    }
    
    if(mysqli_num_rows($result) == 0)
      die("No user found");
    else
      header("location:main.html");
?>