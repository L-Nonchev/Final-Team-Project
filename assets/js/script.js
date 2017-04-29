function showMusicGenre(){
	var genre = document.getElementById('category');
	if (genre.value == 3){
		document.getElementById('conteinerMusicGenre').style.display='block';
	}else {
		document.getElementById('conteinerMusicGenre').style.display='none';
	}
}

//-=-=-=-=-=-=--=---=-=add video comment =-=-=-=-=-=-=--=-=-==-=-=\\
var addVideoComment = document.getElementById('addVideoComent');
if (addVideoComment){
	addVideoComment.onclick = function(){
		var comment = $('#videoComent').val();
		var videoId = $('#qsf').val();
		$.ajax({
			url: 'ajax/checkVideoDetails.php',
	         type: 'POST',
	         dataType: "text",
	         contentType: "application/x-www-form-urlencoded",
	         data: {comment: comment, videoId: videoId},                        
	         statusCode: {
	            401:function() { alert("Please, login to add comments!"); },
	            400:function() { alert("Incorect coment! Max simbol 500");},
	          },
	         success:function(data) {
	        	  	console.log(data);
	        	  	var response = JSON.parse(data);
	             	$( ".comments-list" ).prepend( "<div class='cl-comment'><div class='cl-avatar'><a href='ChannelController.php?@$^^%@@^@^$^@="+response.userId+"&page=Video'><img width='70px' src='assets/images/user-pictures/"+response.userPic+"' alt=''></a></div><div class='cl-comment-text'><div class='cl-name-date'><a href='ChannelController.php?@$^^%@@^@^$^@="+response.userId+"&page=Video'>"+response.username+"</a> . now</div><div class='cl-text'>"+comment+"</div><div class='cl-meta'><a href='#'>Reply</a></div></div><div class='clearfix'></div></div>" );
	          }
		 });
	}
}


//-=-=-=-=-=-=--=---=-=like video =-=-=-=-=-=-=--=-=-==-=-=\\
function likeVideo(){
	var videoId = $('#qsf').val();
	 $.ajax({
		 url: 'ajax/checkVideoDetails.php',
         type: 'POST',
         dataType: "text",
         contentType: "application/x-www-form-urlencoded",
         data: {likesVideoId: videoId},                        
         statusCode: {
            401:function() { alert("Please, login to liked video!"); },
            400:function() { alert("Bad request!"); },
            200:function() { $('#likeVideo').css("border", "1px solid #ea2c5a"); }
          }
	 });
}

//-=-=-=-=-=-=--=---=-=dislike video =-=-=-=-=-=-=--=-=-==-=-=\\
function disLikeVideo(){
	var videoId = $('#qsf').val();
	 $.ajax({
         url: 'ajax/checkVideoDetails.php',
         type: 'POST',
         dataType: "text",
         contentType: "application/x-www-form-urlencoded",
         data: {disLikesVideoId: videoId},                        
         statusCode: {
             401:function() { alert("Please, login to dislike video!"); },
             400:function() { alert("Bad request!"); },
             200:function() { $('#disLikeVideo').css("border", "1px solid red"); }
           },
          success:function(data) {
       	  	console.log(data);
          }
	 });
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
	
	xhr.open('POST', 'ajax/addVideoController.php', true);
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
                url: 'uploadController.php',
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
		$.post('ajax/checkVideoDataController.php',{ title: title }, 
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
		$.post('ajax/checkVideoDataController.php',{ deleteVideo: video }, 
				function(data){
		});
	}
}

var showLess = document.getElementById('showLess');
if (showLess){
	showLess.onclick = function(){
		document.getElementById('aboutVideo').style.display = 'none';
		showMore.style.display = 'block'
			showLess.style.display = 'none';
	}
}
var showMore = document.getElementById('showMore');
if (showMore){
	showMore.onclick = function(){
		document.getElementById('aboutVideo').style.display = 'block';
		showMore.style.display = 'none'
		showLess.style.display = 'block';
	}
}

function drawComentDiv (index,userPicture,userName, commentText, userId, comentDate){
	var comentContainer = document.getElementById('commentsDiv');
	var divComment = document.createElement("div");
	divComment.className = "cl-comment";
	comentContainer.appendChild(divComment);
	$( ".cl-comment" ).eq(index).prepend("<div class='cl-avatar'><a href='ChannelController.php?@$^^%@@^@^$^@="+userId+"&page=Video'><img width='70px' src='assets/images/user-pictures/"+userPicture+"' alt=''></a></div><div class='cl-comment-text'><div class='cl-name-date'><a href='ChannelController.php?@$^^%@@^@^$^@="+userId+"&page=Video'>"+userName+"</a> "+comentDate+"</div><div class='cl-text'>" +commentText+ "</div><div class='cl-meta'><a href='#'>Reply</a></div></div><div class='clearfix'></div>");
	
}
function getComments() {
	var videoId = $('#qsf').val();
	$.post('ajax/showVideoComents.php',{showComents: videoId }, 
			function(data){
		
		var videoComents = JSON.parse(data);
		console.log(data)
		for (var int = 0; int < videoComents.length; int++) {
			drawComentDiv (int,videoComents[int].picture, videoComents[int].username, videoComents[int].text, videoComents[int].user_id, videoComents[int].date);
			if (videoComents[int].deleteComent){
				$( ".cl-name-date" ).eq(int).prepend("<a class ='deleteComent' id= "+videoComents[int].comment_id+" onclick='deleteComent("+videoComents[int].comment_id+")' href='#'><i class='cvicon-cv-cancel'></i></a>")
			}
		}	
		
	});		
}
if (document.getElementById('commentsDiv')){
	getComments();
}
////////VIDEO PAGE CHANNEL :
var videoContainer = document.getElementById('next-video');

var videoOffset = document.getElementById('132Ascasd@gadsa');
var orderBy = document.getElementById('53453Asd!sdgad');
var privacy = document.getElementById('fsd^3S2fsafas');

var btnMoreVideos = document.getElementById('bnt-more-videos');
var praivacyDiv = document.getElementById('privacy');

function drawRightAside(id, duration , poster, title, views, percent){
	// create video
		
		//video div
		var div1 = document.createElement("div");
		div1.className = "h-video row";
		
			// inner video div
			var div2 = document.createElement("div");
			div2.className = "col-lg-6 col-sm-6";
			
				//image div
				var div3  = document.createElement("div");
				div3.className = "v-img";
					
					var href1 = document.createElement("a");
					href1.href ="VideoController.php?físeán%="+ id;
					
					var divTime = document.createElement("div");
					divTime.className = "time";
					divTime.innerHTML = duration;
					
					href1.innerHTML =  '<img src="assets/images/video-poster/'+ poster +'" alt="" >';
					
					div3.appendChild(href1);
					div3.appendChild(divTime);
					
				//title div
				var div4 = document.createElement("div");	
				div4.className = "col-lg-6 col-sm-6";
				
				var div5 = document.createElement("div");	
				div5.className = "v-desc";	
					var href2 = document.createElement("a");
					href2.href ="VideoController.php?físeán%="+ id;
					href2.innerHTML = title;
					
					div5.appendChild(href2);
					
				//views div
				var div6 = document.createElement("div");
				div6.className = "v-views";
				div6.innerHTML = views + " views";
					var viv7 = document.createElement("div");
					viv7.className = "v-percent";
					
						var span2 = document.createElement("span");
						span2.className = "v-circle";
						
						
						viv7.innerHTML =  percent + " %";
						viv7.appendChild(span2);
						

					
			div2.appendChild(div3);
			div4.appendChild(div5);
			div4.appendChild(div6);
			div4.appendChild(viv7);
		
		div1.appendChild(div2);
		div1.appendChild(div4);
				
	videoContainer.appendChild(div1);
}

function getVideoByCategory (){
	var category_id = $('#category').val();
	$.ajax({
		url: 'ajax/showVideoByCategory.php?categoryId='+category_id,
         type: 'GET',
         dataType: "text",
         contentType: "application/x-www-form-urlencoded",                      
         statusCode: {
            400:function() { alert("Bad request!"); },
          },
         success:function(data) {
        	  	console.log(data);
        	  	var incomeData = JSON.parse(data);
				
//				if (incomeData.length < 8) {
//					btnMoreVideos.style.display = "none";	
//				}else {
//					btnMoreVideos.style.display = "inline-block";
//				}
				
				for (var int = 0; int < incomeData.length; int++) {
					drawRightAside(incomeData[int].video_id, incomeData[int].duration , 
					incomeData[int].poster_path , incomeData[int].title, incomeData[int].views,  incomeData[int].percent);
					
					addAjaxVideoOptions();
				}			
          }
	 });
}
if (document.getElementById('next-video')){
	getVideoByCategory ()
}