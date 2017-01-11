<?php 

	session_start();
	$userName = $_SESSION["userLoggedIn"];

 ?>

 <!DOCTYPE html>
 <html>
<head>
  <title>User Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  
  <link href="../public/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="../public/css/home-page.css" rel="stylesheet" type="text/css"/>
  <link href="../public/css/navbar.css" rel="stylesheet" type="text/css"/>

</head>
 <body>
	<?php include '../views/navbar.php'; ?>
 	<h1>User: <?php echo $userName ?></h1>
 	<h3>Uploads:</h3>
 	<?php 
 		echo '<table>';
 		include 'ShowUserUploadsHandle.php';
 		echo '</table>';
 	 ?>
 	 
 	<script src="../public/js/jquery-3.1.0.min.js"></script>
  	<script src="../public/js/bootstrap.min.js"></script>
 </body>
 </html>