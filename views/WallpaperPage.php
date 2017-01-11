<!DOCTYPE html>
<html>
<head>
	<title>Wallpaper Page</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<link href="../public/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  	<link href="../public/css/wallpaper-page.css" rel="stylesheet" type="text/css"/>
  	<link href="../public/css/navbar.css" rel="stylesheet" type="text/css"/>
  	<script src="../public/js/jquery-3.1.0.min.js"></script>
</head>
<body>

<?php include '../views/navbar.php'; ?>
	<div class = "wallpaper-output">
		<div class= "wallpaper-info">

		</div>

		<?php 
			include 'WallpaperPageHandle.php';
		?>						
	</div>

	<script src="../public/js/jquery-3.1.0.min.js"></script>
  	<script src="../public/js/bootstrap.min.js"></script>
  	
</body>
</html>