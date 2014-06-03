<!DOCTYPE html>

<html>
	<head>
		<title>Album stream</title>
		<meta charset='UTF-8'/>
		<link rel='stylesheet' href='screen.css'/>
		<link rel='shortcut icon' href='favicon.ico'/>
	</head>
	<body>
		<!-- <div id='noJavaScript'>JavaScript is disabled! I suggest turning on JavaScript if you want to play specific albums.</div> -->
		<?php
			$album = $_GET['a']; //Album index
			$index = $_GET['s']; //Song index
			
			$files = glob('music/*/'); //Get all folders in the Music folder
			
			$folder = $files[$album]; //Get a specific folder based on the link you pressed earlier on the home page.
			
			$song;
			$albumArt;
			
			$notUseless = 1;
			if ($folder = opendir($folder)) { //Goes through the album folder and returns the specified song (Based on &s=N where N is a number in the URL).
				while (false !== ($entry = readdir($folder))) {
					if($entry == intval($index)) {
						$song = $entry;
					}
					
					if(strstr($entry, '.jpeg') || strstr($entry, '.jpg') || strstr($entry, '.gif') || strstr($entry, '.png')) {
						if($notUseless == 1) {
							$albumArt = $entry;
							$notUseless = 0;
						}
					}
					
				}
				closedir($folder);
			}
			
			if($notUseless == 1) {
				$albumArt = '../../img/noimg.png';
			}
			
			$files = glob('music/*/'); //For some reason this resets so I set this to the right value again.
			$folder = $files[$album]; //^Same as above
			
			$test1;
			
			$songCount;
			
			if ($folder = opendir($folder)) { //Goes through the album folder and returns the specified song (Based on &s=N where N is a number in the URL).
				while (false !== ($entry = readdir($folder))) {
					if($entry) {
						echo '<p class="songCount" style="display: none;">' . $entry . '</p>';
					}
					
					if(strstr($entry, '.ogg')) {
						$songCount++;
					}
				}
				closedir($folder);
			}
			
			$files = glob('music/*/'); //For some reason this resets so I set this to the right value again.
			$folder = $files[$album]; //^Same as above
			$albumPath = substr($folder, 6, strlen($folder)-strlen($folder)-1);
			echo '<p class="info" id="album"> Album: ' . $albumPath . '</p>';
			
			$specSong = $folder . $song; //This is the full file path for the song that is about to be played (Usually the first song of the album)
			
			$noFileExt = substr($song, 0, strlen($song));
			$noFileExt2 = substr($noFileExt, 0, strlen($noFileExt) - 4);
			
			echo '<p class="info" id="song"> Song: ' . $noFileExt2 . '</p>'; //Tells the user what song is playing.
			
			
			echo '<audio id="music" src="' . $specSong . '" controls="true" autoplay="true" onended="endedSong()"></audio>'; //Creates the audio tag.
			echo '<br>';
			echo '<button id="prevSongButton" class="button" onclick="prevSong()">Previous song</button>';
			echo '<button id="nextSongButton" class="button" onclick="endedSong()">Next song</button>' . '<br>';
			echo '<button id="homeButton" class="button" onclick="window.location.href=\'index.php\'">Home</button>' . '<br>';
			
			echo '<img id="albumImg" src="'.$folder . $albumArt.'"/>';
			?>
			
			<div id="showAlbShowSongCenter">
				<button class="button" id="showAlbumsButton2" onclick="albumToggle()">Show Albums</button>
				<button class="button" id="showSongsButton" onclick="songToggle()">Show Songs</button>
			</div>
			<div id="centerBlock">
			
		<?php
			$images = glob('music/*/*.jp*g');
			
			$folderCounter = 0; //Useful for determining what album is chosen.
			foreach($files as $foldersss) { //Makes links to every album.
				//The id attribute is just a number because I can easily get the correct album when doing this (think of the album determination thingy as an array or something where 0 is the first album and so on) .
				echo '<div><img style="display: none;" class="showAlbumImg" src="'.$images[$folderCounter].'"/><a style="display: none;" album="'.$foldersss.'" class="folder specFolder specFolder2" id='.$folderCounter.'>' . substr($foldersss, 6, strlen($foldersss)-7) . '</a></div>' . '<br>';
				$folderCounter++;
			}
		?>
			</div>
			<div id="centerBlock2">
			<?php
				$songCounter = 0;
				$songArray = array();
				if ($folder = opendir($folder)) { //Goes through the album folder and returns the specified song (Based on &s=N where N is a number in the URL).
					while (false !== ($entry = readdir($folder))) {
						if(strstr($entry, '.ogg')) {
							array_push($songArray, $entry);
						}
					}
				}
				
				if(count($songArray) == $songCount) {
					sort($songArray);
					
					for($i = 0; $i < $songCount; $i++) {
						$songCounter++;
						echo '<a id="'.$songCounter.'" class="folder2" style="display: none;">' . $songArray[$i] . '</a>' . '<br>';
						}
					}
			?>
			</div>
		<script src='songmana.js'></script>
		<script src='js.js'></script>
	</body>
</html>