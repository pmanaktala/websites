
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <title>P-Memories</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
a:hover{text-decoration:none;}
 
</style>

 <?php
        session_start();
        if(!isset($_SESSION['uname']))
           header("location:login.php");
    $name=$_SESSION['uname'];
    
    $uimg = $_SESSION["profile"];
    $sql="Select Path,Description from uploads where Email='$name'";
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
    $result = mysqli_query($conn, $sql) or die("Error in select");
        
?>

<body class="w3-light-grey">

<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">

<!-- Header -->
<header class="w3-container w3-center w3-padding-32"> 
  <h1><b>P-Memories</b></h1>
  <p>Welcome to the world of  <span class="w3-tag">Memories</span></p>
</header>
<div class="w3-container"style="font-family: Arial, Helvetica, sans-serif;">
<div class="w3-bar w3-card-4 w3-light-grey w3-round">
  <a href="index.php" class="w3-bar-item w3-button w3-grey w3-hover-grey">Home</a>
  <a href="images.php" class="w3-bar-item w3-button">Upload Images</a>
  <a href="http://pmanaktala.com" class="w3-bar-item w3-button">About Me</a>
  <a href="logout.php" class="w3-bar-item w3-button w3-right"><i class="fa fa-sign-in"></i>Logout</a>
</div>
</div>
<!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col l8 s12">
  <!-- Blog entry -->
  <?php 
      if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    echo '<div class="w3-card-4 w3-margin w3-white">';
    $p=$row['Path'];
    echo "<img src='$p' style='width:100%; height:250px;'>";
    echo '<div class="w3-container">';
    echo '<h3><b>Title</b></h3>';
    echo '</div>';
    echo '<div class="w3-container">';
    echo "<p>". $row['Description'] . "</p>";
    echo "</div>";
    echo "</div>";
    echo " <hr> ";
    }
} else {
    echo '<div class="w3-card-4 w3-margin w3-white">';
    //$p=$row['Path'];
    echo '<img src="/w3images/avatar_g.jpg" style="width:100%">';
    echo '<div class="w3-container">';
    echo '<h3><b>Sample Image</b></h3>';
    echo '</div>';
    echo '<div class="w3-container">';
    echo "<p>Please upload images first.This is a sample image.</p>";
    echo "</div>";
    echo "</div>";
    echo " <hr> ";
}
      ?>    
<!-- END BLOG ENTRIES -->
</div>

<!-- Introduction menu -->
<div class="w3-col l4">
  <!-- About Card -->
  <div class="w3-card w3-margin w3-margin-top">
  <img src="<?php echo $uimg ?>" style="width:100%">
    <div class="w3-container w3-white">
      <h4><b><?php echo $name; ?> </b></h4>
      <p>I can now upload photos and description to this website. It will keep all my memories safe.</p>
    </div>
  </div><hr>
  
  <!-- Posts -->
  
  <!-- Labels / tags -->
  
<!-- END Introduction Menu -->
</div>

<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top w3-center">
  <h5>Made with &#10084; </h5>
</footer>

</body>
</html>
