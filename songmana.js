/*
document.getElementById('noJavaScript').style='display: none;';
document.getElementById('album').style='margin-top: 0px;';
*/

var songIndex = JSON.parse(sessionStorage.getItem('songKey')); //Just getting the global variables
var selectedAlbum = JSON.parse(sessionStorage.getItem('albumKey')); //Just getting the global variables
var selectedAlbumText2 = JSON.parse(sessionStorage.getItem('albumTextKey')); //Just getting the global variables


// var folderCount2 = document.getElementsByClassName('folder3').length; //Check how many folders (albums) there are. (playlist.php)
// var folders3 = document.getElementsByClassName('folder3');
//var selectedAlbumText = selectedAlbumText2.slice(3, selectedAlbumText2.length);

var limit = document.getElementsByClassName('songCount').length; //Amount of songs. I think.

var ptag = document.createElement('div');
var ptext = document.createTextNode('Unfortunately the next song will not play. Please go to the home page and go to the album through there.');
ptag.appendChild(ptext);
ptag.setAttribute('id', 'songIndexError');

if(songIndex === undefined || songIndex === null || songIndex.length === 0) {
	document.body.appendChild(ptag); //Creates a message telling the user that something went wrong (Probably because they didn't press one of the links on the home page).
	document.getElementById('album').setAttribute('style', 'margin-top: 20px;');
}

function endedSong() { //Function for switching the song to the next song in the album. Used by onended <audio> tag and Next song button.
	//if(songIndex < limit-3) {
		songIndex++;
		sessionStorage.setItem('songKey', JSON.stringify(songIndex)); //Global variable. Useful for changing to the next track in the album
		sessionStorage.setItem('albumKey', JSON.stringify(selectedAlbum)); //Global variable. Useful for changing to the next track in the album.
// 		sessionStorage.setItem('albumTextKey', JSON.stringify(selectedAlbumText));
		window.location.href='playlist.php?a='+selectedAlbum+'&s='+songIndex+'&album='+selectedAlbumText2; //Switches to the next song.
	//}
	
	if(songIndex === limit-2) {
		songIndex = 1;
		sessionStorage.setItem('songKey', JSON.stringify(songIndex)); //Global variable. Useful for changing to the next track in the album
		sessionStorage.setItem('albumKey', JSON.stringify(selectedAlbum)); //Global variable. Useful for changing to the next track in the album.
// 		sessionStorage.setItem('albumTextKey', JSON.stringify(selectedAlbumText));
		window.location.href='playlist.php?a='+selectedAlbum+'&s='+songIndex+'&album='+selectedAlbumText2;
	}
}

function prevSong() {//Function for switching the song to the previous song in the album. Used by Previous song button.
	//if(songIndex > 1) {
		songIndex--;
		sessionStorage.setItem('songKey', JSON.stringify(songIndex)); //Global variable. Useful for changing to the next track in the album
		sessionStorage.setItem('albumKey', JSON.stringify(selectedAlbum)); //Global variable. Useful for changing to the next track in the album.
// 		sessionStorage.setItem('albumTextKey', JSON.stringify(selectedAlbumText));
		window.location.href='playlist.php?a='+selectedAlbum+'&s='+songIndex+'&album='+selectedAlbumText2; //Switches to the previous song.
	//}
	
	if(songIndex === 0) {
		songIndex = limit - 3;
		sessionStorage.setItem('songKey', JSON.stringify(songIndex)); //Global variable. Useful for changing to the next track in the album
		sessionStorage.setItem('albumKey', JSON.stringify(selectedAlbum)); //Global variable. Useful for changing to the next track in the album.
// 		sessionStorage.setItem('albumTextKey', JSON.stringify(selectedAlbumText));
		window.location.href='playlist.php?a='+selectedAlbum+'&s='+songIndex+'&album='+selectedAlbumText2;
	}
}
/*
for(var i = 0; i < folderCount2; i++) {
	folders3[i].addEventListener('click', function() {
		selectedAlbum = this.getAttribute('id'); //Specifies what album it is via a number index system. 0 being the first album.
		selectedAlbumText2 = this.getAttribute('album'); //Specifis what album you pressed in clear text (as opposed to numbers).
		selectedAlbumText = selectedAlbumText2.slice(6, selectedAlbumText2.length);
		getPlaylist(); //Calls the function that moves the user to the album play page
	}, false);
}*/

