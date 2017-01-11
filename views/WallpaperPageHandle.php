<?php  

	include '../public/php-mysql/dbConnect.php';

	$wallpaperUrl =  $_GET['wallpaperUrl'];	
	//echo $wallpaperUrl;
	$wallpaperOfPage = basename($wallpaperUrl);
	//echo '===' . $wallpaperOfPage . '===';
	$wallpaperFolder = "../data/Wallpapers/";
	$wallpapers = glob($wallpaperFolder . "*.{jpg,JPG,jpeg,JPEG,png,PNG}", GLOB_BRACE);
	foreach($wallpapers as $wallpaper){
		$fileNameWithExtension = basename($wallpaper);
			if($wallpaperOfPage == $fileNameWithExtension){
				//echo '---' . $fileNameWithExtension . '---';
				$fileNameNoExtension = substr($fileNameWithExtension, 0, -4);
				//echo '+++' . $fileNameNoExtension . '+++';
				echo '<div class="container">';
				echo '<div class="col-md-12 col-sm-12 col-xs-12">';
				echo '<div class="main-img-wrap">';
					echo '<a href="' . $wallpaper . '" class= "img-responsive wallpaper-a" name="wallpaper" download> <img class="wallpaper-main" src="' . $wallpaper . '" name="wallpaper"/></a>';
				echo "</div>";
				echo "</div>";
				echo "</div>";
			}
	}


	//gaseste id-ul userului care a uploadad imaginea mare
	$findID = "SELECT userID FROM florin.wallpapers WHERE img_name='$fileNameNoExtension'";
	$resultFindID = $conn->query($findID);
	if($resultFindID->num_rows > 0){
		while($row = $resultFindID->fetch_assoc()){
			//echo "user id: " . $row["userID"]. "<br>";
			$userIDtemp = $row["userID"];
		}
	}

	$userIDcurent = $userIDtemp;

	$findUsernameByID = "SELECT user_name FROM florin.users WHERE userID = '$userIDcurent'";
	$resultFindUsernameByID = $conn->query($findUsernameByID);
	if($resultFindUsernameByID->num_rows > 0){
		while($row = $resultFindUsernameByID->fetch_assoc()){
			//echo "user name:" . $row["user_name"];
			$uploadedBy = $row["user_name"];
		}
	}
		echo		'<div class = "uploaded-by">	
				<h2 id = "uploaded-by-username">Uploaded by:' .  $uploadedBy . '</h2>
				<h3>More wallpapers from the uploader:</h3>		
			</div>';

	$userIDcurent = $userIDtemp;

	//se pregateste array pentru preluarea rezultatelor din array fetch_assoc
	$dictionary[0] = '0';
	//gaseste imaginile userului
	$findUserUploads = "SELECT img_name, userID from florin.wallpapers where userID='$userIDcurent'";
	$resultFindUploads = $conn->query($findUserUploads);
		if ($resultFindUploads->num_rows > 0) {
			while ($row = $resultFindUploads->fetch_assoc()) {
			//	echo "img_name: " . $row["img_name"]. "<br>";
				$dictionaryIndex = $row["img_name"];
			//	echo "user id: " . $row["userID"]. "<br>";
				$dictionary[$dictionaryIndex] = $row["img_name"];
			//	echo "???dictionary[" . $dictionaryIndex . "]= " . $dictionary[$dictionaryIndex] . "????" . "<br>";
			}
		}

		//afiseaza imaginile care apartin userului logat
		echo '<div class="container">';
		echo '<div class="more-wallpapers">';
		$wallpaperFolder = "../data/Wallpapers/";
		$wallpapers = glob($wallpaperFolder . "*.{jpg,JPG,jpeg,JPEG,png,PNG}", GLOB_BRACE);
		$rowCount = 1;
		$columnCount = 1;
 		foreach($wallpapers as $wallpaper){
 			$fileNameWithExtension = basename($wallpaper);
 		//	echo "---" . $fileNameWithExtension;
 			$fileNameNoExtension = substr($fileNameWithExtension, 0, -4);
 		//	echo "===" . $fileNameNoExtension;
 			if(isset($dictionary[$fileNameNoExtension])){
 				if($fileNameNoExtension == $dictionary[$fileNameNoExtension]){
					//echo '<img src="'.$wallpaper.'" /><br />';
 					 switch ($columnCount) {
 						case '1':
							echo '<div class="col-md-4 col-sm-6 col-xs-12">';
							echo '<div class="more-wallpapers-wrap">';
 							echo '<a href="' . $wallpaper . '" name="wallpaper" download> <img src="' . $wallpaper . '" name="wallpaper"/></a>';
 							echo '</div>';
 							echo '</div>';
 							$columnCount++;
 							break;
 						case '2':
							echo '<div class="col-md-4 col-sm-6 col-xs-12">';
							echo '<div class="more-wallpapers-wrap">';
 							echo '<a href="' . $wallpaper . '" name="wallpaper" download> <img src="' . $wallpaper . '" name="wallpaper"/></a>';
 							echo '</div>';
 							echo '</div>';
 							$columnCount++;
 							break;
 						case '3':
							echo '<div class="col-md-4 col-sm-6 col-xs-12">';
							echo '<div class="more-wallpapers-wrap">';
 							echo '<a href="' . $wallpaper . '" name="wallpaper" download> <img src="' . $wallpaper . '" name="wallpaper"/></a>';
 							echo '</div>';
 							echo '</div>';
 							$columnCount = 1;
 							break;							
 						default:
 								# code...
 								break;
 						}
 				}
 			}


 		}

	echo '</div>';
	echo '</div>';

?>