function showMusicGenre(){
	var genre = document.getElementById('category');
	if (genre.value == 3){
		document.getElementById('conteinerMusicGenre').style.display='block';
	}else {
		document.getElementById('conteinerMusicGenre').style.display='none';
	}
}

//-=-=-=-=-=-=--=---=-=add video in DB =-=-=-=-=-=-=--=-=-==-=-=\\
function uploded() {
	var videoTitle = document.getElementById('title').value;
	var videoPath = document.getElementById('videoPath').value;
	var videoPoster = document.getElementById('videoPosterPath').value;
	var videoDuration = document.getElementById('duration').value;
	var videoText = document.getElementById('description').value;
	var videoCategory = document.getElementById('category').value;	
	var isPrivace = document.getElementById('privace').value;
	var serverName = document.getElementById('originName').value;
	var musicGenre = null;
	
	var dataGenre = document.querySelectorAll('.genre > input');

	//-=-=-=-=-=-=--=---=-=ckeck for music genre =-=-=-=-=-=-=--=-=-==-=-=\\
	for (var index = 0; index < dataGenre.length; index++){
		if (dataGenre[index].checked){
			musicGenre = dataGenre[index].value;
			break;
		}
	}
	
	//-=-=-=-=-=-=--=---=-=ajax query add video in DB =-=-=-=-=-=-=--=-=-==-=-=\\
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
				document.getElementById('delete').style.display = 'none';
			}else if (response['error']){
				document.getElementById('errorUploded').style.display = 'block';
				document.getElementById('errorUploded').innerHTML = response['error'];
			}else document.getElementById('errorUploded').style.display = 'block';
		}
	}	
};

//-=-=-=-=-=-=--=---=-= Upload video =-=-=-=-=-=-=--=-=-==-=-=\\
$('#UploadForm').on('click', function() {
	document.getElementById('uploading-file').style.display = 'block';
 	document.getElementById('start-upload').style.display = 'none';
    
 	var file_data = $('#video').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('video', file_data);
    
    $.ajax({
                url: 'http://localhost/Final-Team-Project/uploadController.php',
                dataType: "text", 
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(data){
                	var response = JSON.parse(data);
                	console.log(data);
                    if(response['error']){
                    	document.getElementById('videoDetails').style.display = 'none';
                    	document.getElementById('type-error').style.display = 'block';
                    	document.getElementById('type-error').innerHTML = response['error']; 
                    	document.getElementById("videoPoster").src = 'assets/images/error.png';
                    	document.getElementById('back').style.display = 'block';
                    }else{
                    	document.getElementById('videoPath').value = response["videoPath"];
                    	document.getElementById('videoPosterPath').value = response["posterPath"];
                    	document.getElementById('duration').value = response["duration"];
                    	document.getElementById("videoPoster").src = 'assets/images/video-poster/'+response["posterPath"];
                    	document.getElementById("videoPoster").style.width = '180px';
                    	document.getElementById('print-title').innerHTML = response["videoName"];
                    	document.getElementById('print-duration').innerHTML = response["duration"];
                    	document.getElementById('print-size').innerHTML = response["videoSize"];
                    	document.getElementById('type-error').style.display = 'none';
                    	document.getElementById('originName').value = response["originName"];
                    	document.getElementById('delete').style.display = 'block';
                    }               
                	
                }
     });
});

//-=-=-=-=-=-=--=---=-= Chech for dublicate video name=-=-=-=-=-=-=--=-=-==-=-=\\
var title = document.getElementById('title')
if(title){
	title.onblur = function() {
	
		var title = $('#title').val();
		$.post('http://localhost/Final-Team-Project/ajax/checkVideoDataController.php',{ title: title }, 
				function(data){
			var response = JSON.parse(data);
			if (response['error']){
				document.getElementById('titleError').innerHTML = response["error"];
				document.getElementById('title').style.border = '1.3px solid red';
			}else{
				document.getElementById('titleError').innerHTML = '';
				document.getElementById('title').style.border = '1.3px solid green';
			}
		});
	}
}
//-=-=-=-=-=-=--=---=-= Delete video from folder =-=-=-=-=-=-=--=-=-==-=-=\\
var deleteVideo = document.getElementById('deleteVideo');
if (deleteVideo){
	deleteVideo.onclick = function() {
	
		var video = $('#videoPath').val();
		$.post('http://localhost/Final-Team-Project/ajax/checkVideoDataController.php',{ deleteVideo: video }, 
				function(data){
		});
	}
}