<?php
$servername = "localhost";
$username = "pmanakta_pmanakta";
$password = "pokemongosrm";
$dbname = "pmanakta_pokesrm";
$conn = mysqli_connect($servername, $username,$password, $dbname);
// Check connection
if (!$conn) {
    die("Connection faileds: " . mysqli_connect_error());
}
?>