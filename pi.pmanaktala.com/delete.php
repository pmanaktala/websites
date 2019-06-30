<?php
    extract($_POST);
    $sql="update my_tab set Quantity=Quantity-$quantity where Pid='$pid'";
    $conn=mysqli_connect('pmanaktala.com','pmanakta_db','pmanaktala;');
    if(!$conn) 
    { 
        die("Error connection to database"); 
    }
    $stat=mysqli_select_db($conn,'pmanakta_pi');
    if(!$stat) 
    {
         die("Error selecting table"); 
    }
    $result = mysqli_query($conn, $sql);
    if(!$result) 
    {
     echo "Error executing querry";
    }

?>