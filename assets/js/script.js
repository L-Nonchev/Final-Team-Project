function showMusicGenre(){
	var genre = document.getElementById('category');
	if (genre.value == 3){
		document.getElementById('conteinerMusicGenre').style.display='block';
	}else {
		document.getElementById('conteinerMusicGenre').style.display='none';
	}
}

var hasErrors = true;
var form = document.getElementById('formUpload');
function checkMimeType() {
	var error = document.getElementById('type-error');
	var dublicate = document.getElementById('dublicateName');
	var video = document.getElementById('video').value;
		
	var xhr = new XMLHttpRequest();
	var dataSend = 'fileType=' + JSON.stringify({type:video});
	
	xhr.open('POST', 'http://localhost/Final-Team-Project/ajax/checkMimeType.php', true);
	xhr.setRequestHeader("Content-type", "application/json");
	
	xhr.send(dataSend);
	xhr.onload = function() {
		if (xhr.status === 200) {
			console.log(2)
			var response = JSON.parse(this.responseText);
			if (response['succsess']){
				hasErrors = false;
			}else if(response['dublicate']){
				error.innerHTML = 'Dublicate video name!'
				error.style.display = 'block';					
			}else{
				error.innerHTML = 'Please, enter corect video/type!';
				error.style.display = 'block';
			}				
		}
	}
	
};

form.onsubmit = function(event) {
		if (hasErrors) {
			event.preventDefault();
		}
	}
var musicGenre;
function checked(idGenre){
	musicGenre = idGenre;
}
function uploded() {
	var videoTitle = document.getElementById('title').value;
	var videoPath = document.getElementById('videoPath').value;
	var videoPoster = document.getElementById('videoPosterPath').value;
	var videoText = document.getElementById('description').value;
	var videoCategory = document.getElementById('category').value;	
	var isPrivace = document.getElementById('privace').value;
	if (videoCategory !== 3){
		musicGenre = null;
	}
	
	var xhr = new XMLHttpRequest();
	var dataSend = 'video=' + JSON.stringify({title:videoTitle, pathVideo:videoPath, posterVideo:videoPoster, description:videoText, category:videoCategory, genre:musicGenre, privace:isPrivace});
	
	xhr.open('POST', 'http://localhost/Final-Team-Project/ajax/addVideo.php', true);
	xhr.setRequestHeader("Content-type", "application/json");
	
	xhr.send(dataSend);
	xhr.onload = function() {
		if (xhr.status === 200) {
			console.log(this.responseText);							
		}
	}	
};

