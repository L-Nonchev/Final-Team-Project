function checked(id){
	var idGenre = id;
	genre = idGenre;
}

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
	
	xhr.open('POST', 'http://localhost/Final-Team-Project/ajax/checkVideoDataController.php', true);
	xhr.setRequestHeader("Content-type", "application/json");
	
	xhr.send(dataSend);
	xhr.onload = function() {
		if (xhr.status === 200) {
			var response = JSON.parse(this.responseText);
			
			console.log(response);	
			if (response["success"]){
				hasErrors = false;
			}else if(response["dublicate"]){
				error.innerHTML = 'Dublicate video name!'
				error.style.display = 'block';		
			}else if(response["error"]){
				error.innerHTML = response['error'];
				error.style.display = 'block';					
			}else if(response["incorectName"]){
				error.innerHTML = 'File name ERROR: Only letters ,numbers , - , _ , ( ) and white space allowed.';
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

function uploded() {
	var videoTitle = document.getElementById('title').value;
	var videoPath = document.getElementById('videoPath').value;
	var videoPoster = document.getElementById('videoPosterPath').value;
	var videoDuration = document.getElementById('duration').value;
	var videoText = document.getElementById('description').value;
	var videoCategory = document.getElementById('category').value;	
	var isPrivace = document.getElementById('privace').value;
	var musicGenre = null;
	
	var dataGenre = document.querySelectorAll('.checkbox > input');

	for (var index = 0; index < dataGenre.length; index++){
		if (dataGenre[index].checked){
			musicGenre = dataGenre[index].value;
			break;
		}
	}
	
	var xhr = new XMLHttpRequest();
	var dataSend = 'video=' + JSON.stringify({title:videoTitle, pathVideo:videoPath, posterVideo:videoPoster, duration:videoDuration, description:videoText, category:videoCategory, genre:musicGenre, privacy:isPrivace});
	
	xhr.open('POST', 'http://localhost/Final-Team-Project/ajax/addVideoController.php', true);
	xhr.setRequestHeader("Content-type", "application/json");
	
	xhr.send(dataSend);
	xhr.onload = function() {
		if (xhr.status === 200) {
			console.log(this.responseText);	
			var response = JSON.parse(this.responseText);
			if (response['success']){
				document.getElementById('sucssesUploded').style.display = 'block';
				document.getElementById('videoDetails').style.display = 'none';
			}else if (response['error']){
				document.getElementById('errorUploded').style.display = 'block';
				document.getElementById('errorUploded').innerHTML = response['error'];
			}else document.getElementById('errorUploded').style.display = 'block';
		}
	}	
};




