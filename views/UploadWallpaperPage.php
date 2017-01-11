<?php

	session_start();
	
	$okToUpload = 1;

	if(isset($_POST["imgName"]) && isset($_POST["imgTags"]) ){ 
		$imgName = $_POST["imgName"];
		$acceptedFormats = array('png', 'jpg');
		if(!in_array(pathinfo($imgName, PATHINFO_EXTENSION), $acceptedFormats)) {
    	echo 'error';
    	$okToUpload = 0;
		}
		else {
			//echo "include ";
			include 'UploadResultPage.php';			
		}

	}

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Upload Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  
  <link href="../public/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="../public/css/login-register.css" rel="stylesheet" type="text/css"/>
  <link href="../public/css/navbar.css" rel="stylesheet" type="text/css"/>
  <script src="../public/js/jquery-3.1.0.min.js"></script>

</head>
<body>
<?php include '../views/navbar.php'; ?>

	<div class = "container">
		<div class="col-md-6 col-md-offset-3 text-center">
			<h2>UPLOAD</h2>
		</div>
		<div class="col-md-6 col-md-offset-3">
			<form id = "upload-form" action="UploadResultPage.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<p>Image:</p>
					<label class="btn btn-default btn-file">
    					Browse <input type="file" class="form-control hidden" name="imgFile">
					</label>
				</div>
				<div class="form-group">
					<p>Tags:</p>
					<input type="text" class = "form-control" name="imgTags">
				</div>
				<button type="submit" class="btn btn-primary">Upload</button>
			</form>	
		</div>
	</div>

	<script src="../public/js/jquery-3.1.0.min.js"></script>
  	<script src="../public/js/bootstrap.min.js"></script>

</body>
</html>