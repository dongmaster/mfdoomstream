<!DOCTYPE html>

<html>
	<head>
		<title>Random stream</title>
		<meta charset='UTF-8'/>
		<link rel='stylesheet' href='screen.css'/>
		<link rel='shortcut icon' href='favicon.ico'/>
	</head>
	
	<body>
		<!-- <div id='noJavaScript'>JavaScript is disabled! I suggest turning on JavaScript if you want to play specific albums.</div> -->
		<?php
		echo 'smoke weed everyday';
			echo '<div class="folder3" style="display: none;">stupid div</div>';
			
			$files = glob('music/*/*.ogg'); //Makes an array with every album and song available
			$fname = $files[array_rand($files)]; //Chooses the album and song. 
			$albumPath = substr($fname, strpos($fname, '/', 1)+1, strpos($fname, '/', 7)-6); //Uses magic to get the album.
			echo '<p class="info" id="album"> Album: ' . $albumPath . '</p>'; //Shows the user what song is playing
			$songPath3 = substr($fname, 6, strlen($fname)); //Song path
			$songPath2 = substr($songPath3, strlen($albumPath)+1); //Song path 
			$songPath = substr($songPath2, 0, strlen($songPath2) - 4); //Song path
			echo '<p class="info" id="song">Song: ' . $songPath . '</p>'; //Song path
			
			echo '<audio id="music" src="' . $fname . '" controls autoplay onended="location.reload();"></audio>' . '<br>'; //Creates <audio> tag.
			echo '<button id="switchSongButton" class="button" onclick="location.reload();">Switch song</button>' . '<br></br>'; //Switch song button
			
			
			$folders = glob('music/*'); //Get all the folders.
			
			
			$albumPath = 'music/' . substr($fname, strpos($fname, '/', 1)+1, strpos($fname, '/', 7)-6); //Get album path. uses magic.
			
			$notUseless = 1;
			if ($albumPath = opendir($albumPath)) { //Goes through the album folder and returns the album art.
				while (false !== ($entry = readdir($albumPath))) {
					if(strstr($entry, '.jpeg') || strstr($entry, '.jpg') || strstr($entry, '.gif')) {
						if($notUseless == 1) {
							//echo $entry . '<br>';
							$albumArt = $entry;
							$notUseless = 0;
						}
					}		
				}
				closedir($albumPath);
			}
			
			if($notUseless == 1) {
				$albumArt = '../../img/noimg.png'; //Sets a default album image for albums that do not have an album image (only applies to the currently random song on the main page)
			}
			
			$albumPath = 'music/' . substr($fname, strpos($fname, '/', 1)+1, strpos($fname, '/', 7)-6); //Gets the album path. don't ask why there are several lines of this.
			echo '<img id="albumImg" src="'. $albumPath .'/'. $albumArt . '"/>'; //Album Art.
			
			echo '<button class="button" id="showAlbumsButton" onclick="albumToggle()">Show Albums</button>'; //I don't know why this is in the PHP code
			
			$images = glob('music/*/*.jp*g'); //Get all JPG/JPEG images
			
			?>
			
			<div id="centerBlock3">
			<?php
			
				$folderCounter = 0; //Useful for determining what album is chosen.
				
				foreach($folders as $folder) { //Makes links to every album.
					//The id attribute is just a number because I can easily get the correct album when doing this (think of the album determination thingy as an array or something where 0 is the first album and so on).
					echo '<div><img idNumber="'.$folderCounter.'" album="'.$folder.'" style="display: none;" class="showAlbumImg" src="'.$images[$folderCounter].'"/><a style="display: none;" album="'.$folder.'" class="folder specFolder" id='.$folderCounter.'>' . substr($folder, 6, strlen($folder)) . '</a></div>' . '<br>';
					$folderCounter++;
				}
			?>
			</div>

			<?php
				$albumArt;
				$albumPath = 'music/' . substr($fname, strpos($fname, '/', 1)+1, strpos($fname, '/', 7)-6); //Uses magic to get the name of the album.
			?>
		<script src='js.js'></script>
	</body>
</html>
