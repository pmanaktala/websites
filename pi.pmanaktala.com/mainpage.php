<?php

$sql="SELECT SUM(quantity) as 'sum' FROM my_tab";
$sql1="SELECT * FROM my_tab";
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
    $result = mysqli_query($conn, $sql);
    
    if(!$result) 
    {
     echo "Error executing querry";
    }
    $row = mysqli_fetch_array($result);
    $quant= $row['sum'];
?>
<html>
    <head> 
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Management</title>
    <link rel="stylesheet" type="text/css" href="a.css">
			<style>
					.button{
						position: fixed;
						text-align: center;
	 					border: none;
						display: inline-block;
						background-color: #bd5d38;
						color: white;
						width: 180px;
						height: 180px;
						font-size: 25px;
						font-weight: bold;
						border-radius: 50%;
						box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
							}
					.button:hover {background-color: #b23201}

					.button:active {
 						 background-color: #1a1a1a;
						 box-shadow: 0 5px #666;
 						 transform: translateY(4px);
						}
					.button1{
						top: 40%;
						left: 18%;
						}
					.button2{
					top:40%;
						left:43%;
						}
					.button3{
						top:40%;
						left:68%;
						}
			</style>
    </head>
    <body>
		<h1>WAREHOUSE STOCK MANAGEMENT</h1>
	<div class="w3-bar w3-border w3-brown">
  <a href="main.html" class="w3-bar-item w3-button">Home</a>
  <a href="add.html" class="w3-bar-item w3-button">Add</a>
  <a href="update.html" class="w3-bar-item w3-button">Update</a>
  <a href="mainpage.php" class="w3-bar-item w3-button">View</a>
  </div><br>
        </div>
        <center>
        <table class="w3-table-all w3-card">
            <tr>
        <th>Name of Product</th>
        <th>Quantity</th>
       </tr>
<?php
        $sql="SELECT * FROM my_tab";
 		$result = mysqli_query($conn,$sql);
 		while($row = mysqli_fetch_array($result)){
 		$name= $row["Name"]; 
 		$quanti= $row["Quantity"];
 		if($quanti < 100)
 		    {
 		        echo "<tr style='background-color:red;'>";
 		        echo "<td>" .$name . "</td>";
 		        echo "<td>" . $quanti . "</td>";
 		        echo "</td>";
 		    }
 		 else
 		 {
 		     	echo "<tr>";
 		        echo "<td>" .$name . "</td>";
 		        echo "<td>" . $quanti . "</td>";
 		        echo "</td>";
 		 }
 		}
 ?>
<tr class="w3-blue">
    <td>
        Total Products
    </td>
    <td>
       <?php echo "$quant" ?>
    </td>
</tr>
</table>
</center>
</div>
<br> <br> <center> Graphical View </center>
<?php include 'test.php'; ?>
<?php include 'pichart.php'; ?>
    </body>
</html>