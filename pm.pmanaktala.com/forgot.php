<!DOCTYPE html>
<html>
<title>Reset</title>
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
      <h2>Reset Password</h2>
    </header>

    <div class="w3-container w3-white w3-text-dark-grey">
      <form method="post"> 
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="em" type="text" placeholder="Enter the email" id="em">
    </div>
</div>
<button class="w3-button w3-block w3-section w3-red w3-ripple w3-padding w3-full signupbtn" name="submit" id="submit">Send Mail</button>
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-tags"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="text" type="text" placeholder="Enter the code" id="text" disabled>
    </div>

<button class="w3-button w3-block w3-section w3-green w3-ripple w3-padding w3-full signupbtn" name="check" id="check" disabled>Verify Code</button>

  </div>
</div>
<?php
if(isset($_POST["submit"]))
{
session_start();
$_SESSION["verify"]=substr(md5(uniqid(rand(), true)), 6, 6);
$msg = "The verification code is " . $_SESSION["verify"];
$msg = wordwrap($msg,70);
$email = $_POST["em"];
mail($email,"Reset Password - pm.pmanaktala.com",$msg);

?>
<script>
    alertify.dismissAll();
    alertify.set('notifier','position', 'top-left');
    alertify.success('Mail Sent');
    $('#text').prop('disabled', false);
    $('#check').prop('disabled', false);
    $('#em').prop('disabled', true);
    $('#submit').prop('disabled', true);
    $('#em').val('<?php echo $email ?>');
    
</script>
<?php
}

if(isset($_POST["check"]))
{
  if($_POST["text"]==$_SESSION["verify"])
 {
     header("location:change.php");
 }
  else
  {
      ?>
      <script>
          alertify.dismissAll();
          alertify.set('notifier','position', 'top-left');
          alertify.error('Code do not match');
      </script>
      <?php
  }
}
?>