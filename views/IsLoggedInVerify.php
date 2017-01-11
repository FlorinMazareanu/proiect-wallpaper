<?php 
	session_start();
	function isLoggedInVerify() {
		if(isset($_SESSION["userLoggedIn"])){
			return true;
		}
	}

 ?>