<?php
    extract($_POST);
    $sql3="insert into my_tab(Tag,Name,Quantity,Batch,Pid) values('$tagid','$name','$quantity','$batch','$pid')";
    $sql1="select * from my_tab where Pid = '$pid'";
    $sql2="update my_tab set Quantity=Quantity+$quantity where Pid='$pid'";
    $conn=mysqli_connect('localhost','pmanakta_db','pmanaktala;');
    if(!$conn) 
    { 
        die("Error connection to database"); 
    }
    $stat=mysqli_select_db($conn,'pmanakta_pi');
    if(!$stat) 
    {
         die("Error selecting table"); 
    }
    $result = mysqli_query($conn, $sql1);
    if(!$result) 
    {
     echo "Error executing querry 1";
    }
    
    if(mysqli_num_rows($result)>0)
    {
        $result = mysqli_query($conn, $sql2);
        echo $sql2;
    }
    else
    {
     $result = mysqli_query($conn, $sql3);
     echo $sql3;
    }
    ?>