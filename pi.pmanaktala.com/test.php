
<html>
<head>
  <!-- Plotly.js -->
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>

<?php
//setting header to json
//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'pmanakta_db');
define('DB_PASSWORD', 'pmanaktala;');
define('DB_NAME', 'pmanakta_pi');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
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
	
	//print json_encode($data2);
	
?>

<body>
  <center>
  <div id="myDiv1"><!-- Plotly chart will be drawn inside this DIV --></div>
  </center>
  <script>
    var data = [
  {
    x: <?php print json_encode($data2); ?>,
    y: <?php print json_encode($data); ?>,
    type: 'bar'
  }
];

Plotly.newPlot('myDiv1', data);
  </script>
</body>
</html>
