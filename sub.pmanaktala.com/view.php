<html>
    <head>
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
       <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111404436-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111404436-3');
</script>

    </head>
    <body>
   <div class="w3-bar w3-border w3-card-4 w3-light-grey">
  <a href="index.php" class="w3-bar-item w3-button">Home</a>
  <a href="http://pmanaktala.com" class="w3-bar-item w3-button">About Me</a>
</div>
<br>
     <?php
  
extract($_POST);
    $conn=mysqli_connect('localhost','pmanakta_db','pmanaktala;');
    if(isset($_POST['check']))
    $sql = "SELECT * FROM mytable ORDER BY Strength + 0 DESC";
    else
    {
    if(!$conn) 
    { 
        die("Error connection to database"); 
    }
    $stat=mysqli_select_db($conn,'pmanakta_db');
    if(!$stat) 
    {
         die("Error selecting table"); 
    }
    if($slot=="all" && $type=="all")
      $sql="Select * from mytable order by Slot,Category";
    else if($slot=="all")  
      $sql="Select * from mytable where Category='$type' order by Slot,Category";
    else if($type=="all")
      $sql="Select * from mytable where Slot='$slot' order by Slot,Category";
    else
       $sql="Select * from mytable where Slot='$slot' and Category='$type'";
    }
    $result = mysqli_query($conn, $sql);
    if(!$result) 
    {
     echo "Error executing querry";
     echo $sql;
     die();
    }
    echo '<div class="w3-container w3-card">';
    echo '<table class="w3-table-all">';
    echo "<tr>";
    echo "<th> Slot </th>";
    echo "<th> Coruse Code </th>";
    echo "<th> Course Title </th>";
    echo "<th> Category </th>";
    echo "<th> Credits </th>";
    echo "<th> Strength </th>";
    echo "</tr>";
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       	echo "<tr>";
        echo "<td>" . $row["Slot"] . "</td>";
   	echo "<td>" . $row["Course_Code"] ."</td>";
   	echo "<td>" . $row["Course_Title"] ."</td>";
   	echo "<td>" . $row["Category"] ."</td>";
   	echo "<td>" . $row["Credit"] . "</td>";
   	echo "<td>" . $row["Strength"] ."</td>";
       	echo "</tr>";
    }
    }
    echo "</table>";
    echo "</div>";
?>
    </body>
</html>

