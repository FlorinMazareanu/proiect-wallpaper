<?php 

	include '../public/php-mysql/dbConnect.php';
	$userName = $_SESSION["userLoggedIn"];
	//gaseste user ID
	$findID = "SELECT userID, user_name FROM florin.users WHERE user_name = '$userName'";
	$resultFindID = $conn->query($findID);
		if ($resultFindID->num_rows > 0) {
   			 // output data of each row
    		while($row = $resultFindID->fetch_assoc()) { 
       			// echo "username: " . $row["user_name"]. "<br>";
       			 //echo "user id: " . $row["userID"]. "<br>";
       			 $userIDtemp = $row["userID"]; //are temp pt ca va deveni userID la setarea parametrilor pt prepared statement
  			 }
		} else {
   			// echo "0 results pt username";
		}

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
 							echo '<tr> <td>';
 							echo '<a href="' . $wallpaper . '" name="wallpaper" download> <img src="' . $wallpaper . '" name="wallpaper"/></a><br />';
 							echo '</td>';
 							$columnCount++;
 							break;
 						case '2':
 							echo '<td>';
 							echo '<a href="' . $wallpaper . '" name="wallpaper" download> <img src="' . $wallpaper . '" name="wallpaper"/></a><br />';
 							echo '</td>';
 							$columnCount++;
 							break;
 						case '3':
 							echo '<td>';
 							echo '<a href="' . $wallpaper . '" name="wallpaper" download> <img src="' . $wallpaper . '" name="wallpaper"/></a><br />';
 							echo '</td> </tr>';
 							$columnCount = 1;
 							break;							
 						default:
 								# code...
 								break;
 						}
 				}
 			}


 		}




 ?>