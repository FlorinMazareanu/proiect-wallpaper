<?php

	//initializare
	$userName = $_POST["userName"];
	$userPassword = $_POST["userPassword"];
	$usernamePasswordCheck = 0;

	
	//conexiune
	include '../public/php-mysql/dbConnect.php';

	//verifica daca exista userul si daca parola corespunde
		$sqlPassword = "SELECT user_name, password FROM florin.users WHERE user_name = '$userName'";
		$resultPassword = $conn->query($sqlPassword);
		if($resultPassword->num_rows > 0){
			while($row = $resultPassword->fetch_assoc()){
				//echo "username:" . $row["user_name"] . "password:" . $row["password"] . "<br>";
				if(password_verify($userPassword,$row["password"])){
					//echo "<br>";
					//echo "pass == hash" . "<br>";
					//echo "$ row password == " . $row["password"] . "<br>";
					$usernamePasswordCheck = 1;
					//echo "user si parola exista in baza de date si corespund" . "<br>";
				}
			}
		} else {
			$usernamePasswordCheck = 0;
			//echo "0 results pt username/password";
		}

	//initializare sesiune (daca username/parola ok)

	if($usernamePasswordCheck){
		$_SESSION["userLoggedIn"] = $_POST["userName"];
		if(isset($_SESSION["userLoggedIn"])){
					//echo "<br>";
					//echo "---SESSION START---";
					//echo "sesiunea userLoggedIn are valoarea " . $_SESSION["userLoggedIn"]; 
		}

		
	}

?>
