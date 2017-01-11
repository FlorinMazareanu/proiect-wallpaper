<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p>Upload post</p>
<?php
	
	session_start();

	//echo "imagine: " . pathinfo($_FILES['imgFile']['name'], PATHINFO_FILENAME);
	//echo "tags: " . $_POST["imgTags"];
	$userName = $_SESSION["userLoggedIn"];
	//echo "USER----  " . $userName;

	include '../public/php-mysql/dbConnect.php';
	//gaseste user ID
	$findID = "SELECT userID, user_name FROM florin.users WHERE user_name = '$userName'";
	$resultFindID = $conn->query($findID);
		if ($resultFindID->num_rows > 0) {
   			 // output data of each row
    		while($row = $resultFindID->fetch_assoc()) { 
       			 //echo "username: " . $row["user_name"]. "<br>";
       			 //echo "user id: " . $row["userID"]. "<br>";
       			 $userIDtemp = $row["userID"]; //are temp pt ca va deveni userID la setarea parametrilor pt prepared statement
  			 }
		} else {
   			 //echo "0 results pt username";
		}

	//gaseste id-ul ultimei imagini si o salveaza intr-o variabila ca sa fie folosit la numele filei (sa poate fi uploadate imagini cu acelasi nume)
	$findLastImgID = "SELECT MAX(imgID) as lastImgID FROM florin.wallpapers";
	$resultFindLastImgID = $conn->query($findLastImgID);
		if ($resultFindLastImgID->num_rows > 0){
			while($row = $resultFindLastImgID->fetch_assoc()){
				$lastImgID = $row["lastImgID"];
				$lastImgID++;
				echo $lastImgID;
			}
		}

	//introducerea datelor pt wallpaper (imaginea propriu-zisa nu se trimite in baza de date, ci in folder)
	$stmtImg = $conn->prepare("INSERT INTO florin.wallpapers(img_name,userID,img_tags) VALUES(?,?,?)");
	$stmtImg->bind_param("sis",$imgName,$userID,$imgTags);

		//set parameters
		$imgName = $lastImgID . "_" . pathinfo($_FILES['imgFile']['name'], PATHINFO_FILENAME);
		$userID = $userIDtemp;
		$imgTags =  $_POST["imgTags"];

		//executa statement
		$stmtImg->execute();
		//inchide stmtImg si conexiune
		$stmtImg->close();
		$conn->close();

	//upload img in folder
		$destinationFolder = "../data/Wallpapers/";
		$fileName = $destinationFolder . $lastImgID . "_" . basename($_FILES["imgFile"]["name"]);
		    if (move_uploaded_file($_FILES["imgFile"]["tmp_name"], $fileName)) {
        		//echo "The file ". basename( $_FILES["imgFile"]["name"]). " has been uploaded.";
    		} else {
       			 echo "Sorry, there was an error uploading your file.";
   			 }
   	
   	header("Location:../views/UploadWallpaperPage.php");
	exit();

  ?>

</body>
</html>