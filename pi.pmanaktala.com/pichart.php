
<html>
<head>
  <!-- Plotly.js -->
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<?php
//setting header to json
//database
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

//query to get data from the table
$query = sprintf("SELECT Quantity FROM my_tab");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = (int)$row['Quantity'];
	}
	
	$query = sprintf("SELECT Name FROM my_tab");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data2 = array();
foreach ($result as $row) {
	$data2[] = $row['Name'];
	}
	
	print json_encode($data);
?>

<body>
  <div class="w3-center>"
   <p>A Pie Chart of stock</p>
  <div id="myDiv"><!-- Plotly chart will be drawn inside this DIV --></div>
  </div>
  <script>
  var dat = [{
  values: <?php print json_encode($data); ?>,
  labels: <?php print json_encode($data2); ?>,
  type: 'pie'
}];

var layout = {
  height: 700,
  width: 700
};

Plotly.newPlot('myDiv', dat, layout);
  </script>
</body>
</html>
