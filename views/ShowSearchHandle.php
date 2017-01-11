 	<?php 


 		include '/../public/php-mysql/dbConnect.php';
 		if(isset($_POST["search"])){

 			$imgTags = $_POST["search"];
 			$imgTags = explode(",",$imgTags);
 			foreach($imgTags as $imgTag){
 				//echo $imgTag;
 			}
 			$tagCount = 0;
 			while($tagCount<=10){
 				if(!isset($imgTags[$tagCount])){
 				$imgTags[$tagCount] = "~";
 				}
 				$tagCount++;
 			}



 			//gaseste imaginile dupa tag
 			$findTag = "SELECT * from florin.wallpapers 
 			WHERE 
 			(img_tags LIKE '%$imgTags[0]%') OR (img_tags LIKE '%$imgTags[1]%') OR (img_tags LIKE '%$imgTags[2]%') OR (img_tags LIKE '%$imgTags[3]%')
 			OR (img_tags LIKE '%$imgTags[4]%') OR (img_tags LIKE '%$imgTags[5]%') OR (img_tags LIKE '%$imgTags[6]%') OR (img_tags LIKE '%$imgTags[7]%')
 			OR (img_tags LIKE '%$imgTags[8]%') OR (img_tags LIKE '%$imgTags[9]%') OR (img_tags LIKE '%$imgTags[10]%')";
 			$resultFindTag = $conn->query($findTag);
			if ($resultFindTag->num_rows > 0) {
   				 // output data of each row
    				while($row = $resultFindTag->fetch_assoc()) { 
       			 		$imgIdTemp = $row["imgID"];
  					 }
			} else {
   			 	//echo "0 results";
			}

			//se pregateste array pentru preluarea rezultatelor din array fetch_assoc
			$dictionary[0] = '0';
			//gaseste imaginile dupa tagurile din search
			$findSearchedImg = "SELECT * from florin.wallpapers WHERE (img_tags LIKE '%$imgTags[0]%') OR (img_tags LIKE '%$imgTags[1]%') OR
			(img_tags LIKE '%$imgTags[2]%') OR (img_tags LIKE '%$imgTags[3]%') OR (img_tags LIKE '%$imgTags[4]%') OR (img_tags LIKE '%$imgTags[5]%')
			OR (img_tags LIKE '%$imgTags[6]%') OR (img_tags LIKE '%$imgTags[7]%') OR (img_tags LIKE '%$imgTags[8]%') OR
			(img_tags LIKE '%$imgTags[9]%') OR (img_tags LIKE '%$imgTags[10]%')";
			$resultFindSearchedImg = $conn->query($findSearchedImg);
			if ($resultFindSearchedImg->num_rows > 0) {
				while ($row = $resultFindSearchedImg->fetch_assoc()) {
					$dictionaryIndex = $row["img_name"];
					$dictionary[$dictionaryIndex] = $row["img_name"];
				}
			}

			//afiseaza imaginile care apartin userului logat
			$wallpaperFolder = "data/Wallpapers/";
			$wallpapers = glob($wallpaperFolder . "*.{jpg,JPG,jpeg,JPEG,png,PNG}", GLOB_BRACE);
			$rowCount = 1;
			$columnCount = 1;
 			foreach($wallpapers as $wallpaper){
 			$fileNameWithExtension = basename($wallpaper);
 			$fileNameNoExtension = substr($fileNameWithExtension, 0, -4);
 				if(isset($dictionary[$fileNameNoExtension])){
 					if($fileNameNoExtension == $dictionary[$fileNameNoExtension]){
 						switch ($columnCount) {
 							case '1':
 								echo '<div class="col-md-4">';
 								echo '<a href="' . 'views/WallpaperPage.php?wallpaperUrl=' . $wallpaper . '" name="wallpaper"> <img class = "wallpaper-column-1" src="' . $wallpaper . '" name="wallpaper"/></a>';
 								echo "</div>";
 								$columnCount++;
 								break;
 							case '2':
 								echo '<div class="col-md-4">';
 								echo '<a href="' .  'views/WallpaperPage.php?wallpaperUrl=' . $wallpaper . '" name="wallpaper"> <img class = "wallpaper-column-2" src="' . $wallpaper . '" name="wallpaper"/></a>';
 								echo "</div>";
 								$columnCount++;
 								break;
 							case '3':
 								echo '<div class="col-md-4">';
 								echo '<a href="' .  'views/WallpaperPage.php?wallpaperUrl=' . $wallpaper . '" name="wallpaper"> <img class = "wallpaper-column-3" src="' . $wallpaper . '" name="wallpaper"/></a>';
 								echo "</div>";
 								$columnCount = 1;
 								break;
 							
 							default:
 								# code...
 								break;
 						}
 					}
 				}
			}

 		}
 		else {
 			$wallpaperFolder = "data/Wallpapers/";
 			$wallpapers = glob($wallpaperFolder."{*.jpg,*.png}", GLOB_BRACE);
 			$wallpaperCount = 0;
 			$numTableRows = floor(sizeof($wallpapers)/3) + 1;
 				for($row=1;$row<=$numTableRows;$row++){
 					//echo '<div class="row">';
 					for($column=1;$column<=3;$column++){
 						if(isset($wallpapers[$wallpaperCount])){
 							echo '<div class="col-md-4 col-sm-6 col-xs-12">';
 							echo '<div class="image">';
 							echo '<a href="' . 'views/WallpaperPage.php?wallpaperUrl=' . $wallpapers[$wallpaperCount] .  '" name="wallpaper"> <img class = "img-responsive wallpaper-column-' . $column . '" src="' . $wallpapers[$wallpaperCount] . '" name="wallpaper"/></a>';
 							echo "</div>";
 							echo "</div>";
 							$wallpaperCount++;							
 						}

 					}
 					//echo "</div>";
 				}
 		}

 	 ?>


