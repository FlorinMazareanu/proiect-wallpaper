<?php 
		session_start();
if(isset($_POST["userName"]) && isset($_POST["userPassword"]) ){
  include 'LoginResultPage.php';
}

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  
  <link href="../public/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="../public/css/login-register.css" rel="stylesheet" type="text/css"/>
  <link href="../public/css/navbar.css" rel="stylesheet" type="text/css"/>

</head>
<body>

<style>
	.highlight-click {
    
	}
  .input-error {
    background-color: red;
    color: white;
  }
</style>

<?php include '../views/navbar.php'; ?>


<div class = "container">
  <div class="col-md-6 col-md-offset-3 text-center">
    <h2>LOGIN</h2>
  </div>
  <div class="col-md-6 col-md-offset-3">
  	<form role="form" id = "login-form" action = "" onsubmit="return validateForm()" method = "POST">
    <div class="form-group">
  		<input class = "form-control" type="text" name="userName" placeholder="Username" id="input-user-name">
    </div>
    <div class="form-group">
  		<input class = "form-control" type="password" name="userPassword" placeholder="Password" id="input-password">
    </div>
  		<button class="btn btn-primary" type="submit" id="submit">Login</button>
  	</form>	
  </div>
</div>

<div>
  <?php
    echo '<div class = "login-result">';
    $usernamePasswordCheck = 2;
    if(!isset($_SESSION["userLoggedIn"]) && isset($_POST["userName"])){
      echo "<h2>Login failed. Check fi the user exists and if the password is correct</h2>";
    }
    if(isset($_SESSION["userLoggedIn"])) {
      echo "<h2>Login successfull. Welcome back, " . $_SESSION["userLoggedIn"] . "</h2>";
    } 
    echo '</div>';
  ?>
</div>

  <div class = "bottom-space">
    
  </div>

  <script src="../public/js/jquery-3.1.0.min.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function(){
        $("input").focusin(function(){
          $(this).toggleClass("highlight-click");
          var errorClassToggled = $(this).hasClass("input-error");
          if(errorClassToggled){
            $(this).toggleClass("input-error"); 
          }
        })
    });;

    $(document).ready(function(){
        $("input").focusout(function(){
          $(this).toggleClass("highlight-click");
        })
    });

    function validateForm(){
      var userNameV = document.forms["login-form"]["userName"].value;
      var userPasswordV = document.forms["login-form"]["userPassword"].value;
      if (userNameV == null || userNameV == "") {
          $("#input-user-name").attr("placeholder", "Type your user name here");
          $("#input-user-name").toggleClass("input-error");
            return false;
        } 
        if (userPasswordV == null || userPasswordV == "") {
          $("#input-password").attr("placeholder", "Type the password here");
          $("#input-password").toggleClass("input-error");
            return false;
        } 
    }

  </script>

</body>
</html>