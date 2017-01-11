<?php
	session_start();
function logout(){
	if(isset($_SESSION["userLoggedIn"])){
		session_unset();
		session_destroy();
		session_write_close();
		header('Location: ../index.php');
	}
}
logout();

?>
