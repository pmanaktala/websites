<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="login_style.css">
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

</head>

<body>
    <style>
        .myinput {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        
        .myinput:focus {
            background-color: #ddd;
            outline: none;
        }
        
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0;
        }
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
    <div id="id01" class="modal" style="display:block">
        <form class="modal-content" action="insert.php" method="post" autocomplete="false" enctype="multipart/form-data">
            <div class="container">
                <h1>Sign Up</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>
                
                <div class="w3-col" style="width:25px; margin-bottom:-1px;"><i class="w3-xlarge fa fa-user"></i></div>
                <div class="w3-rest">
                    <label for="name"><b>Name</b></label>
                </div>
               
                <input type="text" placeholder="Enter Name" name="name" required>

                <div class="w3-col" style="width:25px; margin-bottom:-1px;"><i class="w3-xlarge fa fa-envelope"></i></div>
                <div class="w3-rest">
                    <label for="email"><b>&nbsp;Email</b></label>
                </div>
                <input type="email" placeholder="Enter Email" name="email" required class="myinput">
                
                    <div class="w3-col" style="width:25px; margin-bottom:-1px;"><i class="w3-xlarge fa fa-lock"></i></div>
                    <div class="w3-rest">
                        <label for="psw"><b>Password</b></label>
                    </div>
                        <input type="password" placeholder="Enter Password" name="psw" id="11" onblur="isEmpty()" required>

                    <div class="w3-col" style="width:25px; margin-bottom:-1px;"><i class="w3-xlarge fa fa-lock"></i></div>
                    <div class="w3-rest">
                        <label for="psw"><b>Repeat Password</b></label>
                    </div>
                        <input type="password" placeholder="Enter Password" name="psw-rep" onblur="press()" id="12" required>

                <div class="w3-col" style="width:25px; margin-bottom:-1px;"><i class="w3-xlarge fa fa-phone-square"></i></div>
                <div class="w3-rest">
                    <label for="contact"><b>Phone</b></label>
                </div>
                <input type="number" placeholder="Enter Phone Number" name="contact" required class="myinput">
                <p> Please enter a picture of yours. You do not look nice without it ;)<br>
                 (Do not worry we will allow you to register without picture too)<br>
	        <label for="fileToUpload" class="custom-file-upload">
    <i class="fa fa-cloud-upload"></i> Profile Picture
</label>
<input type="file" name="fileToUpload" id="fileToUpload" onchange='document.getElementById("dummy").innerHTML = "File Selected";'>
</div>
<p id="dummy"><p>
                <a href="login.php" style="text-decoration:none; margin-bottom:1.5px"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Go back to login</a>
                <div class="clearfix">
                    <button type="reset" class="cancelbtn" onclick="myFunction()">Reset</button>
                    <button type="submit" class="signupbtn">Sign Up</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        function isEmpty()
        {
          var b=document.getElementById("11").value;
          if(b=="")
          {
            $("#11").focus();
            alertify.dismissAll();
            alertify.set('notifier','position', 'top-left');
            alertify.error('Password cannot be empty');
            
          }
          
        }
        function press() {
          
          var a=document.getElementById("12").value;
          
          var b=document.getElementById("11").value;

          if(a!=b)
          {
          $("#12").val("");
          $("#11").focus();
          alertify.dismissAll();
          alertify.set('notifier','position', 'top-left');
          alertify.error('Password Do Not Match');
          
          }
          else
          {
          alertify.dismissAll();
          alertify.set('notifier','position', 'top-left');
          alertify.success('Passwords Match');
          }
          
        }

        function myFunction() {

            if (confirm("Are you sure to clear?")) {
                document.getElementByName("name").value = "";
                document.getElementByName("email").value = "";
                document.getElementByName("psw").value = "";
                document.getElementByName("psw-repeat").value = "";
                document.getElementByName("phone").value = "";
            }
        }
    </script>
</body> 
<?php
if(isset($_GET["exists"]))
{
  ?>
  
  <script>
  alertify.dismissAll();
  alertify.set('notifier','position', 'top-left');
  alertify.error('User Already Exists');
  </script>
  
  <?php
}
?>
</html>