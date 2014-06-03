/*
document.getElementById('noJavaScript').style='display: none;';
document.getElementById('album').style='margin-top: 0px;';
document.getElementById('album').setAttribute('style', 'margin-top: 0px;');
*/

var folderCount = document.getElementsByClassName('folder').length; //Check how many folders (albums) there are.
var songCount = document.getElementsByClassName('folder2').length; //Check how many songs there are in a specific album.

var folders = document.getElementsByClassName('folder');
var folders2 = document.getElementsByClassName('folder2');
var folders3 = document.getElementsByClassName('folder3');
var imgs = document.getElementsByClassName('showAlbumImg');
var selectedAlbum;
var selectedSong = 1;
var selectedAlbumText;
var selectedAlbumText2;

var songText = (document.getElementById('song').innerHTML).slice(5, document.getElementById('song').length);
document.title = songText;

for(var i = 0; i < folderCount; i++) {
	folders[i].addEventListener('click', function() {
		selectedAlbum = this.getAttribute('id'); //Specifies what album it is via a number index system. 0 being the first album.
		selectedAlbumText2 = this.getAttribute('album'); //Specifis what album you pressed in clear text (as opposed to numbers).
		selectedAlbumText = selectedAlbumText2.slice(6, selectedAlbumText2.length);
		getPlaylist(); //Calls the function that moves the user to the album play page
	}, false);

	imgs[i].addEventListener('click', function() {
		selectedAlbum = this.getAttribute('idNumber'); //Specifies what album it is via a number index system. 0 being the first album.
		selectedAlbumText2 = this.getAttribute('album'); //Specifis what album you pressed in clear text (as opposed to numbers).
		selectedAlbumText = selectedAlbumText2.slice(6, selectedAlbumText2.length);
		getPlaylist(); //Calls the function that moves the user to the album play page
	}, false);
}

for(var i = 0; i < songCount; i++) {
	folders2[i].addEventListener('click', function() {
		selectedSong = this.getAttribute('id');
		getPlaylist();
	}, false);
}

function getPlaylist() {
	sessionStorage.setItem('songKey', JSON.stringify(selectedSong)); //Global variable. Useful for changing to the next track in the album
	sessionStorage.setItem('albumKey', JSON.stringify(selectedAlbum)); //Global variable. Useful for changing to the next track in the album.
	sessionStorage.setItem('albumTextKey', JSON.stringify(selectedAlbumText));
// 	sessionStorage.setItem('pageKey', JSON.stringify(page));
	window.location.href = 'playlist.php?a='+selectedAlbum+'&s='+selectedSong+'&album='+selectedAlbumText; //Moves the user to the next page.
}

var firstFolder = document.getElementsByClassName('folder')[0]; //Selects the first album in the list

var albumToggleCounter = 0;

function albumToggle() { //Toggles the visibility of the albums.
	albumToggleCounter++;
	if(albumToggleCounter === 1) {
		for(var i = 0; i < folderCount; i++) {
			folders[i].setAttribute('style', 'display: inline-block');
			
			imgs[i].setAttribute('style', 'display: inline-block');
			//folders[i].setAttribute('style', 'height: 100%');
		}
	}
	
	if(albumToggleCounter === 2) {
		for(var i = 0; i < folderCount; i++) {
			folders[i].setAttribute('style', 'display: none');
			
			imgs[i].setAttribute('style', 'display: none');
			//folders[i].setAttribute('style', 'height: 0px');
		}
		albumToggleCounter = 0;
	}
}

var songToggleCounter = 0;

function songToggle() { //Toggles the visibility of the albums.
	songToggleCounter++;
	if(songToggleCounter === 1) {
		for(var i = 0; i < songCount; i++) {
			folders2[i].setAttribute('style', 'display: inline-block');
			//imgs[i].setAttribute('style', 'display: inline-block');
// 			folders3[i].setAttribute('style', 'display: inline-block');
			//folders[i].setAttribute('style', 'height: 100%');
		}
	}
	
	if(songToggleCounter === 2) {
		for(var i = 0; i < songCount; i++) {
			folders2[i].setAttribute('style', 'display: none');
			//imgs[i].setAttribute('style', 'display: none');
// 			folders3[i].setAttribute('style', 'display: none');
			//folders[i].setAttribute('style', 'height: 0px');
		}
		songToggleCounter = 0;
	}
}
