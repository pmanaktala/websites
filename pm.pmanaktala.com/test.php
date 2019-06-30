
<html>
<body>
<form method="post" action="check.php">
<input type="text" name="text">
<input type="submit" value="submit">
</form>
</body>
<?php


if(isset($_POST["submit"]))
{
  echo $_POST["text"];
  echo $_SESSION["verify"];
  
  if($_POST["text"]==$_SESSION["verify"])
  echo "Successful";
  else
  echo "Wrong";
}
?>