function showMusicGenre(){
	var genre = document.getElementById('category');
	if (genre.value == 3){
		document.getElementById('conteinerMusicGenre').style.display='block';
	}else {
		document.getElementById('conteinerMusicGenre').style.display='none';
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
//------------------------------------------------VIDEO DETAILS-------------------------------------------------------------//


//-=-=-=-=-=-=--=---=-=like video =-=-=-=-=-=-=--=-=-==-=-=\\
function likeVideo(){
	var videoId = $('#qsf').val();
	 $.ajax({
		 url: 'ajax/videoDetails.php',
         type: 'POST',
         dataType: "text",
         contentType: "application/x-www-form-urlencoded",
         data: {likesVideoId: videoId},                        
         statusCode: {
            401:function() {
            	if (confirm("Please, login to liked video!")) {
					 location.href = './LoginController.php';
				}
            },
            400:function() { alert("Bad request!"); },
            200:function() { $('#likeVideo').css("border", "1px solid #ea2c5a"); }
          }
	 });
}

//-=-=-=-=-=-=--=---=-=dislike video =-=-=-=-=-=-=--=-=-==-=-=\\
function disLikeVideo(){
	var videoId = $('#qsf').val();
	 $.ajax({
         url: 'ajax/videoDetails.php',
         type: 'POST',
         dataType: "text",
         contentType: "application/x-www-form-urlencoded",
         data: {disLikesVideoId: videoId},                        
         statusCode: {
             401:function() { 
            	 if (confirm("Please, login to dislike video!")) {
					 location.href = './LoginController.php';
				}
             },
             400:function() { alert("Bad request!"); },
             200:function() { $('#disLikeVideo').css("border", "1px solid red"); }
           }
	 });
}


//-=-=-=-=-=-=--=---=-=add video comment =-=-=-=-=-=-=--=-=-==-=-=\\
var addVideoComment = document.getElementById('addVideoComent');
if (addVideoComment){
	addVideoComment.onclick = function(){
		var comment = $('#videoComent').val();
		var videoId = $('#qsf').val();
		$.ajax({
			url: 'ajax/videoDetails.php',
	         type: 'POST',
	         dataType: "text",
	         contentType: "application/x-www-form-urlencoded",
	         data: {comment: comment, videoId: videoId},                        
	         statusCode: {
	            401:function() {
	            	if (confirm("Please, login to add comments!")) {
						 location.href = './LoginController.php';
					}
	            },
	            400:function() { alert("Incorect coment! Max simbol 500");},
	          },
	         success:function(data) {
	        	  	var response = JSON.parse(data);
	             	$( ".comments-list" ).prepend( "<div id= "+response.commentId+" class='cl-comment'><div class='cl-avatar'><a href='ChannelController.php?@$^^%@@^@^$^@="+response.userId+"&page=Video'><img width='70px' src='assets/images/user-pictures/"+response.userPic+"' alt=''></a></div><div class='cl-comment-text'><div class='cl-name-date'><a href='ChannelController.php?@$^^%@@^@^$^@="+response.userId+"&page=Video'>"+response.username+"</a> . now</div><div class='cl-text'>"+comment+"<a class ='deleteComent'  onclick='event.preventDefault(), deleteComment("+response.commentId+")' href='#'><i class='cvicon-cv-cancel'></i></a></div><div class='cl-meta'><a href='#'>Reply</a></div></div><div class='clearfix'></div></div>" );
	             	document.getElementById('countOfComments').innerHTML=(Number(document.getElementById('countOfComments').innerHTML) + 1)
	         }
		 });
	}
}

//-=-=-=-=-=-=--=---=-=delete video comment =-=-=-=-=-=-=--=-=-==-=-=\\
function deleteComment(id){
	var commentId = id;
	$.ajax({
		url: 'ajax/videoDetails.php',
         type: 'POST',
         dataType: "text",
         contentType: "application/x-www-form-urlencoded",
         data: {commentId: commentId},                        
         statusCode: {
            400:function() { alert("Bad request!");},
            401:function() { location.href = './LoginController.php'},
            200:function() { 
            	document.getElementById(commentId).remove(); 
            	document.getElementById('countOfComments').innerHTML=(Number(document.getElementById('countOfComments').innerHTML) - 1)
            }
          }
	 });
}

function drawComentDiv (index,userPicture,userName, commentText, userId, comentDate){
	var comentContainer = document.getElementById('commentsDiv');
	var divComment = document.createElement("div");
	divComment.className = "cl-comment";
	comentContainer.appendChild(divComment);
	$( ".cl-comment" ).eq(index).prepend("<div class='cl-avatar'><a href='ChannelController.php?@$^^%@@^@^$^@="+userId+"&page=Video'><img width='70px' src='assets/images/user-pictures/"+userPicture+"' alt=''></a></div><div class='cl-comment-text'><div class='cl-name-date'><a href='ChannelController.php?@$^^%@@^@^$^@="+userId+"&page=Video'>"+userName+"</a> "+comentDate+"</div><div class='cl-text'>" +commentText+ "</div><div class='cl-meta'><a href='#'>Reply</a></div></div><div class='clearfix'></div>");
	
}
//=======-=-=-=-==-=-=-=-=get video comments-===--=-=-=-=-=-=-=-=-=-=-=-=//
function getComments() {
	var videoId = $('#qsf').val();
	var userId = $('#asd').val();
	$.ajax({
		url: 'ajax/videoDetails.php',
        type: 'GET',
        dataType: "text",
        contentType: "application/x-www-form-urlencoded",
        data: {showComents: videoId,  userId:userId },                        
        statusCode: {
        	400:function() { alert("Bad request!");},
        },
         success:function(data){      		
      		var videoComents = JSON.parse(data);
      		for (var int = 0; int < videoComents.length; int++) {
      			drawComentDiv (int,videoComents[int].picture, videoComents[int].username, videoComents[int].text, videoComents[int].user_id, videoComents[int].date);
      			if (videoComents[int].deleteComent){
      				$( ".cl-text" ).eq(int).prepend("<a class ='deleteComent' onclick='event.preventDefault(),deleteComment("+videoComents[int].comment_id+")' href='#'><i class='cvicon-cv-cancel'></i></a>")
      				document.getElementsByClassName('cl-comment')[int].id=videoComents[int].comment_id;
      			}      			
      		}
          }
	 });
}
if (document.getElementById('commentsDiv')){
	getComments();
}

//-=-=-=-=-=-=--=---=-= Check for dublicate video name=-=-=-=-=-=-=--=-=-==-=-=\\
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
//------------------------------------------------------------end video deatails---------------------------------------------------//




//------------------------------------------------------------UPLOAD, ADD and DELETE VIDEO-------------------------------------------------//

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
		if (this.status === 400){
			var response = JSON.parse(this.responseText);
			if (response['error']){
				document.getElementById('errorUploded').style.display = 'block';
				document.getElementById('errorUploded').innerHTML = response['error'];
			}else document.getElementById('errorUploded').style.display = 'block';
		}
		if (this.status === 200) {
			var response = JSON.parse(this.responseText);
			document.getElementById('sucssesUploded').style.display = 'block';
			document.getElementById('videoDetails').style.display = 'none';
			document.getElementById('delete').style.display = 'none';
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
        url: 'ajax/uploadController.php',
        dataType: "text", 
        cache: false,
        contentType: false,
        processData: false,
        data: form_data, 
        type: 'post',
        statusCode: {
           400:function(data) {
        	    var response = JSON.parse(data.responseText);
        	    
        	    document.getElementById('videoDetails').style.display = 'none';
           		document.getElementById('type-error').style.display = 'block';
           		document.getElementById('type-error').innerHTML = response['error']; 
           		document.getElementById("videoPoster").src = 'assets/images/error.png';
           		document.getElementById('back').style.display = 'block';
           },
        },   
        success: function(data){  
        	var response = JSON.parse(data);
        	
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

     });
});

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

//--------------------------------------------------------end Video operations------------------------------------------------------//



//-------------------------------------------------------DRAW ASIDE IN HOME PAGE---------------------------------------------------//
var videoAside = document.getElementById('next-video');

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
				
		videoAside.appendChild(div1);
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
        	  	var incomeData = JSON.parse(data);
								
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

//------------------------------------------------------END ASIDE----------------------------------------------------------------//


//------------------------------------------------------SEARCH------------------------------------------------------------------//


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-CREATE video container in search page-=-=-=--=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=//

var searchVideoContainer = document.getElementById('row-search-container');


	//  video HTML
	function drawSearchVideo(container, id, duration , poster, title, views ,videoProcent) {
		
		//video div
		var div1 = document.createElement("div");
		div1.className = "col-lg-3 col-sm-6 videoitem";
		
			// inner video div
			var div2 = document.createElement("div");
			div2.className = "b-video";
			
				//image div
				var div3  = document.createElement("div");
				div3.className = "v-img";
				div3.id = id;	
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
				div4.className = "v-desc";
					
					var href2 = document.createElement("a");
					href2.href ="singleVideo.php";
					href2.innerHTML = title;
					
					div4.appendChild(href2);
					
				//views div
				var div5 = document.createElement("div");
				div5.className = "v-views";
				div5.innerHTML =   views + " views ";
				
					var span1 = document.createElement("span");
					span1.className = "v-percent";
					
						var span2 = document.createElement("span");
						span2.className = "v-circle";
						
						
						span1.innerHTML = videoProcent + "%";
						span1.appendChild(span2);
						
						
					div5.appendChild(span1);
						
			div2.appendChild(div3);
			div2.appendChild(div4);
			div2.appendChild(div5);
		
		div1.appendChild(div2);
				
		container.appendChild(div1);
	}
	// End create video
	
	
document.getElementById("searchButton").addEventListener('click',function ()
	    {
	document.getElementById("search-form").submit();
});
	
	var search = document.getElementById('Search-page');
	if (search){
			document.getElementById('findResults')
			var searchField = $('#search-page').val();
			 $.ajax({
				url: 'ajax/search.php?searchBy='+searchField,
		        type: 'GET',
		        dataType: "text",
		        contentType: "application/x-www-form-urlencoded",                      
		        statusCode: {
		            400:function(data) { 
		        	   var response = JSON.parse(data.responseText);
		        	   document.getElementById('searchField').value = response['error'];
		        	   document.getElementById('searchField').style.color = '#DC143C';
		        	   document.getElementById('search-filter').style.display = 'none';
		            },
			 		500:function(){location.href = './503.php'}
		         },
		        success:function(data) {		        	
		        	var incomeData = JSON.parse(data);
		        	document.getElementById('findResults').innerHTML = (incomeData.length)?(incomeData.length):"no ";
		        	if(incomeData['notFount']){
		        		document.getElementById('not-found').style.display = 'block';
		        		document.getElementById('not-found').innerHTML = "No results found!";
		        		document.getElementById('search-filter').style.display = 'none';
		        	}else{
			        	for (var int = 0; int < incomeData.length; int++) {
			        		drawSearchVideo(searchVideoContainer, incomeData[int].video_id, incomeData[int].duration , 
							incomeData[int].poster_path , incomeData[int].title, incomeData[int].views, incomeData[int].percent );
							
							addAjaxVideoOptions();
						}
		        	}
	   	        }
			 });
	}
	
	
function sortVideoBy(sortBy){
	var sortBy = sortBy;
	var searchField = $('#search-page').val();
	document.getElementById('row-search-container').innerHTML = '';
	 $.ajax({
			url: 'ajax/search.php',
	        type: 'POST',
	        dataType: "text",
	        contentType: "application/x-www-form-urlencoded",   
	        data: {searchBy: searchField, sortBy:sortBy},   
	        statusCode: {
	            400:function(data) { 
	        	   var response = JSON.parse(data.responseText);
	        	   document.getElementById('searchField').value = response['error'];
	        	   document.getElementById('searchField').style.color = '#DC143C';
	        	   document.getElementById('searchField').style.display = 'none';
	        	},
	        	500:function(){location.href = './503.php'}
	         },
	        success:function(data) {
	        	var incomeData = JSON.parse(data);
		        	for (var int = 0; int < incomeData.length; int++) {
		        		drawSearchVideo(searchVideoContainer, incomeData[int].video_id, incomeData[int].duration , 
						incomeData[int].poster_path , incomeData[int].title, incomeData[int].views, incomeData[int].percent );
						
						addAjaxVideoOptions();
					}
	        }
	 });
}
filterSearch = document.getElementById("filter-search");
if (filterSearch){
	filterSearch.addEventListener('click',function (){
		
		document.getElementById('row-search-container').innerHTML = '';
		var searchField = $('#search-page').val();
		var updateDates = document.querySelectorAll('.updateDate > input');
		var timeFilters = document.querySelectorAll('.timeFilter > input');
		var sorts = document.querySelectorAll('.sorted > input');
		var dataUpload = null;
		var timeFilter = null;
		var sortBy = null;
		
		for (var index = 0; index < updateDates.length; index++){
			if (updateDates[index].checked){
				dataUpload = updateDates[index].value; 
				break;
			}
		}	
		for (var index = 0; index < timeFilters.length; index++){
			if (timeFilters[index].checked){
				timeFilter = timeFilters[index].value; 
				break;
			}
		}
		for (var index = 0; index < sorts.length; index++){
			if (sorts[index].checked){
				sortBy = sorts[index].value; 
				break;
			}
		}
		
		 $.ajax({
				url: 'ajax/search.php',
		        type: 'POST',
		        dataType: "text",
		        contentType: "application/x-www-form-urlencoded",   
		        data: {dataUpload: dataUpload, timeFilter:timeFilter, sortsBy:sortBy, searchBy: searchField},   
		        statusCode: {
		            400:function(data) { 
		        	   var response = JSON.parse(data.responseText);
		        	   var response = JSON.parse(data.responseText);
		        	   document.getElementById('searchField').value = response['error'];
		        	   document.getElementById('searchField').style.color = '#DC143C';
		        	   document.getElementById('search-filter').style.display = 'none';
		        	},
		        	500:function(){location.href = './503.php'}
		         },
		        success:function(data) {
		        	var incomeData = JSON.parse(data);
		        	document.getElementById('findResults').innerHTML = (incomeData.length)?(incomeData.length):"no ";
		        	for (var int = 0; int < incomeData.length; int++) {
		        		drawSearchVideo(searchVideoContainer, incomeData[int].video_id, incomeData[int].duration , 
						incomeData[int].poster_path , incomeData[int].title, incomeData[int].views, incomeData[int].percent );
						
						addAjaxVideoOptions();
					}
		        }
		 });
	});
}
//-------------------------------------------------------------end search-------------------------------------------------------------//



//--------------------------------------------------------------Category------------------------------------------------------------------//

var categoryContainer = document.getElementById('all-video-category');
var categoryPage = document.getElementById('category-page');
if (categoryPage){
		var categoryField = $('#category-id').val();
		 $.ajax({
			url: 'ajax/search.php?categoryId='+categoryField,
	        type: 'GET',
	        dataType: "text",
	        contentType: "application/x-www-form-urlencoded",                      
	        statusCode: {
	            400:function(data) {location.href = './404.php'},
		 		500:function(){location.href = './503.php'}
	         },
	        success:function(data) {
	        	var incomeData = JSON.parse(data);
	        	if(incomeData['notFount']){
	        		document.getElementById('not-found').style.display = 'block';
	        		document.getElementById('not-found').innerHTML = "No results found!";
	        		document.getElementById('search-filter').style.display = 'none';
	        	}else{
		        	for (var int = 0; int < incomeData.length; int++) {
		        		drawSearchVideo(categoryContainer, incomeData[int].video_id, incomeData[int].duration , 
						incomeData[int].poster_path , incomeData[int].title, incomeData[int].views, incomeData[int].percent );
						
						addAjaxVideoOptions();
					}
	        	}
   	        }
		 });
}


