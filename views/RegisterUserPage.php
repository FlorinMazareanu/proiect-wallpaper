<?php
	
$inputValid = 1;

if(isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["emailAddress"]) && isset($_POST["userName"]) && isset($_POST["userPassword"]) && isset($_POST["userPassword2"]) && $inputValid){

	include 'RegisterUserSuccess.php';
}


  ?>

<!DOCTYPE html>
<html>
<head>
  <title>Register Page</title>
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

<?php include '../views/navbar.php';?>


		
<div class = "container">
	<div class="col-md-6 col-md-offset-3 text-center">
		<h2>REGISTER</h2>
	</div>
	<div class="col-md-6 col-md-offset-3">
	<form role="form" name="register-form" id ="register-form" action="" onsubmit="return validateForm()" method="post">
		<div class="form-group">
			<input class = "form-control" id="first-name" type = "text" placeholder="First name"   name="firstName"></input>
		</div>
		<div class="form-group">
			<input class = "form-control" id="last-name" type = "text" placeholder="Last name" name="lastName"></input>
		</div>
		<div class="form-group">	
			<input class = "form-control" id="email" type = "text" placeholder="Email address" name="emailAddress"></input>
		</div>
		<div class="form-group">
			<input class = "form-control" id="user-name" type = "text" placeholder="Username" name="userName"></input>	
		</div>
		<div class="form-group">
			<input class = "form-control" id="pass1" type = "password" placeholder="Password" name="userPassword"></input>
		</div>
		<div class="form-group">
			<input class = "form-control" id="pass2" type = "password" placeholder="Retype Password" name="userPassword2"></input>
		</div>	
		<button type="submit" class="btn btn-primary">Register</button>
	</form>
	</div>
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
		});

		$(document).ready(function(){
	   		$("input").focusout(function(){
	   			$(this).toggleClass("highlight-click");
	   		})
		});

	function validateForm() {
	    var firstNameV = document.forms["register-form"]["firstName"].value;
	    var lastNameV = document.forms["register-form"]["lastName"].value;
	    var emailAddressV = document.forms["register-form"]["emailAddress"].value;
	    var userNameV = document.forms["register-form"]["userName"].value;
	    var userPasswordV = document.forms["register-form"]["userPassword"].value;
	    var userPassword2V = document.forms["register-form"]["userPassword2"].value;
	    if (firstNameV == null || firstNameV == "") {
	        $("#first-name").attr("placeholder", "Type your first name here");
	        $("#first-name").toggleClass("input-error");   
	        return false;
	    }
	    if (lastNameV == null || lastNameV == "") {
	        $("#last-name").attr("placeholder", "Type your last name here");
	        $("#last-name").toggleClass("input-error");
	        return false;
	    }
	    if (emailAddressV == null || emailAddressV == "") {
	        $("#email").attr("placeholder", "Type your email address here");
	        $("#email").toggleClass("input-error");
	        return false;
	    }
	    if (userNameV == null || userNameV == "") {
	        $("#user-name").attr("placeholder", "Type your user name here");
	        $("#user-name").toggleClass("input-error");
	        return false;
	    }
	    if (userPasswordV == null || userPasswordV == "") {
	        $("#pass1").attr("placeholder", "Type the password here");
	        $("#pass1").toggleClass("input-error");
	        return false;
	    }
	    if (userPassword2V == null || userPassword2V == "") {
	        $("#pass2").attr("placeholder", "Type the password again here");
	        $("#pass2").toggleClass("input-error");
	        return false;
	    }
	    if (userPasswordV != userPassword2V){
	    	  $("#pass1 , #pass2").attr("placeholder", "The two passwords must be identical");
	        $("#pass1 , #pass2").toggleClass("input-error");
	    	  return false;
	    }

	}
	</script>

</body>
</html>