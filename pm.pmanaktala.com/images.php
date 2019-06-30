<!DOCTYPE html>
<html>
<title>P-Memories</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/alertify.min.css"/> 
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/bootstrap.min.css"/>

<!-- 
    RTL version
-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/default.rtl.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/semantic.rtl.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/bootstrap.rtl.min.css"/>


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
a:hover{text-decoration:none;}

    /* Styling Buttons*/
    input[type="file"] {
    display: none;
	}
	.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
	}
  </style>
<?php
        session_start();
        if(!isset($_SESSION['uname']))
           header("location:login.php");
    $name=$_SESSION['uname'];
    $uimg = $_SESSION["profile"];
        
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
  <a href="index.php" class="w3-bar-item w3-button">Home</a>
  <a href="images.php" class="w3-bar-item w3-button  w3-grey w3-hover-grey">Upload Images</a>
  <a href="http://pmanaktala.com" class="w3-bar-item w3-button">About Me</a>
  <a href="logout.php" class="w3-bar-item w3-button w3-right"><i class="fa fa-sign-in"></i>Logout</a>
</div>
</div>
<!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col l8 s12">
  <!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-white">
    <div class="w3-container">
      <h3><b>Enter The Image </b></h3>
       <form action="upload.php" method="post" enctype="multipart/form-data">
        <h3>Select image to upload:</h3>
        <label for="fileToUpload" class="custom-file-upload">
    <i class="fa fa-cloud-upload"></i> Image Please
</label>
<div class="w3-container">
<div class="w3-third"> 
<input type="file" name="fileToUpload" id="fileToUpload" onchange='document.getElementById("dummy").innerHTML = "File Selected";' required>
</div>
<div class="w3-rest">
<p id="dummy">No image selected</p>
</div>
</div>
        <textarea name="desc" style="width:380px;height:170px; resize: none;" placeholder="Write something about this image.." required></textarea>
        <br>
        <input type="submit" value="Upload Image" name="submit" class="w3-button w3-border w3-light-grey w3-margin-bottom">
    </form>
    </div>
  </div>
  <hr>
<!-- END BLOG ENTRIES -->
</div>

<!-- Introduction menu -->
<div class="w3-col l4">
  <!-- About Card -->
  <div class="w3-card w3-margin w3-margin-top">
  <img src="<?php echo $uimg ?>" style="width:100%">
  <?php echo $uimg ?>
    <div class="w3-container w3-white">
      <h4><b><?php echo $name; ?> </b></h4>
      <p>Just me, myself and I, exploring the universe of uknownment. I have a heart of love and a interest of lorem ipsum and mauris neque quam blog. I want to share my world with you.</p>
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
  <h5>Made with <i class="fas fa-heart"></i></h5>
</footer>

</body>
<?php
if(isset($_GET["success"]))
{
?>
<script>
    alertify.dismissAll();
    alertify.set('notifier','position', 'top-left');
    alertify.success('Image Uploaded');
</script>
<?php
}
?>

<?php
if(isset($_GET["exists"]))
{
?>
<script>
    alertify.dismissAll();
    alertify.set('notifier','position', 'top-left');
    alertify.error('Image Already There');
</script>
<?php
}
?>

<?php
if(isset($_GET["type"]))
{
?>
<script>
    alertify.dismissAll();
    alertify.set('notifier','position', 'top-left');
    alertify.error('Error in Image Type');
</script>
<?php
}
?>

<?php
if(isset($_GET["error"]))
{
?>
<script>
    alertify.dismissAll();
    alertify.set('notifier','position', 'top-left');
    alertify.error('Error Please Try Again');
</script>
<?php
}
?>
</html>
