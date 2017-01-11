<!--
<!DOCTYPE html>
<html>
<head>
	<title>Welcome, new user!</title>
</head>
<body>

	<h2>Welcome, <?php //echo $_POST["userName"]; ?> </h2>
	<p>First name: <?php // echo $_POST["firstName"]; ?> </p>
	<p>Last name: <?php // echo $_POST["lastName"]; ?></p>
	<p>Email: <?php // echo $_POST["emailAddress"]; ?> </p>
	<p>Password: <?php // echo $_POST["userPassword"];  ?> </p>
	<p>Password2: <?php // echo $_POST["userPassword2"];  ?> </p>
	<?php // $isAdmin = 0; ?>
-->
	<?php 
		
		//initializare
			$firstName = $_POST["firstName"];
			$lastName = $_POST["lastName"];
			$emailAddress = $_POST["emailAddress"];
			$userName = $_POST["userName"];
			$userPassword = $_POST["userPassword"];
			$userPassword2 = $_POST["userPassword2"];
			$hash = password_hash($_POST["userPassword"], PASSWORD_BCRYPT);
			$isAdmin = 0;
			$userCheck = 0;
			$emailCheck = 0;
			$passwordCheck = 0;

		//conexiune
		include '../public/php-mysql/dbConnect.php';

		//verifica daca exista username
		$sql = "SELECT first_name, last_name, user_name FROM florin.users WHERE user_name = '$userName'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
   		 // output data of each row
    	while($row = $result->fetch_assoc()) { 
        //echo "username: " . $row["user_name"]. "<br>";
        $userCheck = 0;
  		 }
		} else {
   			// echo "0 results pt username";
   			 $userCheck = 1;
		}

		//Verifica daca mailul este luat
		$sqlMail = "SELECT email FROM florin.users WHERE email = 'emailAddress'";
		$resultMail = $conn->query($sqlMail);
		if($resultMail->num_rows > 0){
			while($row = $result->fetch_assoc()) {
				//echo "email:" . $row["email"] . "<br>";
				$emailCheck = 0;
			}
		} else {
			//echo "0 results pt email";
			$emailCheck = 1;
		}

		//Verifica daca parola 1 == parola 2
		if($userPassword == $userPassword2) {
			$passwordCheck = 1;
			//echo "pass1 == pass2";
		}
		else {
			$passwordCheck = 0;
			//echo "pass1 != pass2";
		}




		if($userCheck && $emailCheck && $passwordCheck){
			//prepare si bind
			$stmt = $conn->prepare("INSERT INTO florin.users(first_name,last_name,email,user_name,password,is_admin) VALUES(?,?,?,?,?,?)");
			$stmt->bind_param("sssssi",$firstName,$lastName,$emailAddress,$userName,$hash,$isAdmin);

			//set parameters
			$firstName = $_POST["firstName"];
			$lastName = $_POST["lastName"];
			$emailAddress = $_POST["emailAddress"];
			$userName = $_POST["userName"];
			$hash = password_hash($_POST["userPassword"], PASSWORD_BCRYPT);
			$isAdmin = 0;

			//executa statement
			$stmt->execute();

			//inchide stmt si conexiune
			$stmt->close();
			$conn->close();

			//echo "user data OK";
			//echo($hash);
		}
		else {
			//echo "user data not ok";
		};



		
	?>
<!--
</body>
</html>
-->