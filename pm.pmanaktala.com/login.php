<!DOCTYPE html>
<html>
<title>P-Memories</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/bootstrap.min.css"/>

<!-- 
    RTL version
-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/default.rtl.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/semantic.rtl.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/bootstrap.rtl.min.css"/>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #474e5d;
    overflow: auto;
}

@media screen and (max-width: 300px) {
    .cancelbtn,
    .signupbtn {
        width: 100%;
    }
}

</style>

<body>

<div class="w3-card-4 w3-half w3-display-middle">
    <header class="w3-container w3-white w3-border-bottom">
      <h2>Enter your details</h2>
    </header>

    <div class="w3-container w3-white w3-text-dark-grey">
      <form action="validate.php" method="post"> 
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="username" type="text" placeholder="Username" id="name" value=<?php echo getUserFromCookie(1)?>>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-lock"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" type="password" placeholder="Password" name="password" id="pss" value=<?php echo getUserFromCookie(2)?>>
    </div>
    <br>
    <label class="w3-left">
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:-5px" > Remember me
</label>
<a href="forgot.php" style="text-decoration:none;" class="w3-right"> Forgot Password? </a>
</div>
<button class="w3-button w3-block w3-section w3-red w3-ripple w3-padding w3-half cancelbtn">Clear</button>
<button class="w3-button w3-block w3-section w3-green w3-ripple w3-padding w3-half signupbtn">Login</button>

</form>
    </div>
    <footer class="w3-container w3-white w3-border-top">
      <h5><a href="register.php" style="text-decoration:none;">New user? Sign up</a></h5>
    </footer>
  </div>
</div>
<?php
if(isset($_GET["success"]))
{
    session_start();
    ?>
    <script> 
    alertify.dismissAll();
    alertify.set('notifier','position', 'top-left');
    alertify.success('Account Created');
    $('#name').val('<?php echo $_SESSION["email"] ?>' );
    $('#pss').val('<?php echo $_SESSION["pass"] ?>' );
    </script>
    <?php
    session_close();
}

if(isset($_GET["incorrect"]))
{
    session_start();
    
    ?>
    <script>
     alertify.dismissAll();
    alertify.set('notifier','position', 'top-left');
    alertify.error('Incorrect Username or Password');
    </script>
    <?php
}
?>

<?php 
  function getUserFromCookie($var)
 {
 	if($var==1)
 	{
	if(!isset($_COOKIE["username"])) 
		return "";
	else 
		return $_COOKIE["username"];
	}
	if($var==2)
	{
	if(!isset($_COOKIE["password"])) 
		return "";
	else 
		return $_COOKIE["password"];
	}
 }
 ?>
</body>
</html> 
