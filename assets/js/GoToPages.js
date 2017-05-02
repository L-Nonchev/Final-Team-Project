////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////// LIKED VIDEOS PAGE :
var likedVideosPage = document.getElementById('likedVideosContainre')
var likedVideosContainer = document.getElementById('likedVideos');
var MoreLikedVideos = document.getElementById('moreLikedVideos');
var offset = document.getElementById('132Ascasd@gadsa');
if (likedVideosPage){
	function createLVideoElement (videoId, videoPoster, time, title, views, date, procent, liked_id){
			
		var div1 = document.createElement("div");
		div1.className = "row";
		div1.id = liked_id
		
			var div2 = document.createElement("div");
			div2.className = "h-video";
				
				var div3 = document.createElement("div");
				div3.className = "col-lg-2 col-xs-12 col-sm-5";
				
					var div4 = document.createElement("div");
					div4.className = "v-img";
					div4.innerHTML = '<a href="VideoController.php?físeán%='+videoId+'"><img src="assets/images/video-poster/'+videoPoster+'" alt=""></a><div class="time">'+time+'</div>';
					
					div3.appendChild(div4);
					
					
				var div5 = document.createElement("div");
				div5.className = "col-lg-8 col-xs-10 col-sm-5";
				
					var div6 = document.createElement("div");
					div6.className = "v-desc";
					div6.innerHTML = '<a href="VideoController.php?físeán%='+videoId+'">'+title+'</a>';
					
					var div7 = document.createElement("div");
					div7.className = "v-views";
					div7.innerHTML = views + " views " + date; 
					
					var div8 = document.createElement("div");
					div8.className = "v-percent";
					div8.innerHTML = '<span class="v-circle"></span>' + procent + '%';
					
					div5.appendChild(div6);
					div5.appendChild(div7);
					div5.appendChild(div8);
					
				var div9 = document.createElement("div");
				div9.className = "col-lg-2 col-xs-2 col-sm-2 h-clear-list";
				div9.innerHTML = '<a href="#" onclick = "event.preventDefault(); deleteLikedVideo('+liked_id+');"><i class="cvicon-cv-cancel"></i></a>';
				
				var div10 = document.createElement("div");
				div10.className = "clearfix";
				
				var div11 = document.createElement("div");
				div11.className = "h-divider";
				
				div2.appendChild(div3);
				div2.appendChild(div5);
				div2.appendChild(div9);
				div2.appendChild(div10);
				div2.appendChild(div11);
				
			div1.appendChild(div2);
			
	likedVideosContainer.appendChild(div1);			
				
	}
	
	function getLikedVideos (offset){
		var currier = new XMLHttpRequest();
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 500) {
				location.href='./503.php';
			}
			if (this.readyState === 4 && this.status === 200) {
				var incomeData = JSON.parse(this.responseText);
				if (incomeData.length < 12) {
					MoreLikedVideos.style.display = "none";	
				}else {
					MoreLikedVideos.style.display = "inline-block";
				}
				var incomeData = JSON.parse(this.responseText);
				
				for (var int = 0; int < incomeData.length; int++) {
					createLVideoElement (incomeData[int].video_id, incomeData[int].poster_path, incomeData[int].duration, 
							incomeData[int].title,incomeData[int].view,  incomeData[int].date, incomeData[int].prcent ,incomeData[int].id);
				}
			}
		}
		currier.open('GET', 
				'ajax/GoToPages.php?page=like-video&offset='+offset,
				true);
		currier.send(null);
	}
	// auto get  first 12 videos
	if (likedVideosPage) {
		getLikedVideos(+offset.value);
	}
	
	MoreLikedVideos.onclick = function(){
		// up offset
		offset.value = Number(offset.value) + Number(12);
		// get more videos
		getLikedVideos (offset.value);
	}
	
	// delete likded video
	function deleteLikedVideo(like_id){
		var currier = new XMLHttpRequest();
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 500) {
				location.href='./503.php';
			}
			if (this.readyState === 4 && this.status === 200) {
				document.getElementById(like_id).remove(like_id);
			}
		}
		var dataSend = 'data=' + JSON.stringify({
			deleteLikedVideo : like_id
		});
			currier.open('DELETE', 
					'ajax/GoToPages.php', 
					true);
			currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			currier.send(dataSend);	
	}
	//delete all likded video
	
	function deleteAllLikedVideos(){
		var currier = new XMLHttpRequest();
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 500) {
				location.href='./503.php';
			}
			if (this.readyState === 4 && this.status === 200) {
				likedVideosContainer.innerHTML = "";
			}
		}
		var dataSend = 'data=' + JSON.stringify({
			deleteAllLikedVideo : "deleteAll"
		});
			currier.open('DELETE', 
					'ajax/GoToPages.php', 
					true);
			currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			currier.send(dataSend);	
	}
}
////////LIKED VIDEOS PAGE END:
////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////WATCH MORE PAGE :
var watchLaterPage = document.getElementById('watchLaterContainer')
var watchMoreVideosContainer = document.getElementById('watchLater');
var MoreWatchLaterVideos = document.getElementById('moreWLVideos');
var offset = document.getElementById('132Ascasd@gadsa');

if (watchLaterPage){
	function createWLVideoElement (videoId, videoPoster, time, title, views, date, procent, watch_later_id){
		
	var div1 = document.createElement("div");
	div1.className = "row";
	div1.id = watch_later_id
	
		var div2 = document.createElement("div");
		div2.className = "h-video";
			
			var div3 = document.createElement("div");
			div3.className = "col-lg-2 col-xs-12 col-sm-5";
			
				var div4 = document.createElement("div");
				div4.className = "v-img";
				div4.innerHTML = '<a href="VideoController.php?físeán%='+videoId+'"><img src="assets/images/video-poster/'+videoPoster+'" alt=""></a><div class="time">'+time+'</div>';
				
				div3.appendChild(div4);
				
				
			var div5 = document.createElement("div");
			div5.className = "col-lg-8 col-xs-10 col-sm-5";
			
				var div6 = document.createElement("div");
				div6.className = "v-desc";
				div6.innerHTML = '<a href="VideoController.php?físeán%='+videoId+'">'+title+'</a>';
				
				var div7 = document.createElement("div");
				div7.className = "v-views";
				div7.innerHTML = views + " views " + date; 
				
				var div8 = document.createElement("div");
				div8.className = "v-percent";
				div8.innerHTML = '<span class="v-circle"></span>' + procent + '%';
				
				div5.appendChild(div6);
				div5.appendChild(div7);
				div5.appendChild(div8);
				
			var div9 = document.createElement("div");
			div9.className = "col-lg-2 col-xs-2 col-sm-2 h-clear-list";
			div9.innerHTML = '<a href="#" onclick = "event.preventDefault(); deleteWatchLaterVideo('+watch_later_id+');"><i class="cvicon-cv-cancel"></i></a>';
			
			var div10 = document.createElement("div");
			div10.className = "clearfix";
			
			var div11 = document.createElement("div");
			div11.className = "h-divider";
			
			div2.appendChild(div3);
			div2.appendChild(div5);
			div2.appendChild(div9);
			div2.appendChild(div10);
			div2.appendChild(div11);
			
		div1.appendChild(div2);
		
	watchMoreVideosContainer.appendChild(div1);			
			
	}
	
	function getWatchMoreVideos (offset){
	var currier = new XMLHttpRequest();
	currier.onreadystatechange = function(){
		if (this.readyState === 4 && this.status === 500) {
			location.href='./503.php';
		}
		if (this.readyState === 4 && this.status === 200) {
			var incomeData = JSON.parse(this.responseText);
			if (incomeData.length < 12) {
				MoreWatchLaterVideos.style.display = "none";	
			}else {
				MoreWatchLaterVideos.style.display = "inline-block";
			}
			var incomeData = JSON.parse(this.responseText);
			
			for (var int = 0; int < incomeData.length; int++) {
				createWLVideoElement (incomeData[int].video_id, incomeData[int].poster_path, incomeData[int].duration, 
						incomeData[int].title,incomeData[int].view,  incomeData[int].date, incomeData[int].prcent ,incomeData[int].id);
			}
		}
	}
	currier.open('GET', 
			'ajax/GoToPages.php?page=watchLater&offset='+offset,
			true);
	currier.send(null);
	}
	// auto get  first 12 videos
	if (watchLaterPage) {
		getWatchMoreVideos(offset.value);
	}
	
	MoreWatchLaterVideos.onclick = function(){
	// up offset
	offset.value = Number(offset.value) + Number(12);
	// get more videos
	getWatchMoreVideos (offset.value);
	}
	
	// delete watch video
	function deleteWatchLaterVideo(watch_later_id){
	var currier = new XMLHttpRequest();
	currier.onreadystatechange = function(){
		if (this.readyState === 4 && this.status === 500) {
			location.href='./503.php';
		}
		if (this.readyState === 4 && this.status === 200) {
			deleteHistoryideo : watch_later_id,
			document.getElementById(watch_later_id).remove(watch_later_id);
		}
	}
	var dataSend = 'data=' + JSON.stringify({
		deleteWatchLaterVido : watch_later_id
	});
		currier.open('DELETE', 
				'ajax/GoToPages.php', 
				true);
		currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		currier.send(dataSend);	
	}
	//delete all watch later video
	
	function deleteAllWatchMoreVideos(){
	var currier = new XMLHttpRequest();
	currier.onreadystatechange = function(){
		if (this.readyState === 4 && this.status === 500) {
			location.href='./503.php';
		}
		if (this.readyState === 4 && this.status === 200) {
			watchMoreVideosContainer.innerHTML = "";
		}
	}
	var dataSend = 'data=' + JSON.stringify({
		deleteAllWatchMoreVideos : "deleteAll"
	});
		currier.open('DELETE', 
				'ajax/GoToPages.php', 
				true);
		currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		currier.send(dataSend);	
	}
}

////////WATCHED LATER PAGE END:
////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////HISTORY PAGE :
var historyPage = document.getElementById('HistoryVideosContainre')
var historyVideosContainer = document.getElementById('historyVideo');
var MoreHistoryVideos = document.getElementById('moreHistoryVideos');
var offset = document.getElementById('132Ascasd@gadsa');

if (historyPage){
	function createHistoryVideoElement (videoId, videoPoster, time, title, views, date, procent){
			
		var div1 = document.createElement("div");
		div1.className = "row";
		div1.id = videoId
		
			var div2 = document.createElement("div");
			div2.className = "h-video";
				
				var div3 = document.createElement("div");
				div3.className = "col-lg-2 col-xs-12 col-sm-5";
				
					var div4 = document.createElement("div");
					div4.className = "v-img";
					div4.innerHTML = '<a href="VideoController.php?físeán%='+videoId+'"><img src="assets/images/video-poster/'+videoPoster+'" alt=""></a><div class="time">'+time+'</div>';
					
					div3.appendChild(div4);
					
					
				var div5 = document.createElement("div");
				div5.className = "col-lg-8 col-xs-10 col-sm-5";
				
					var div6 = document.createElement("div");
					div6.className = "v-desc";
					div6.innerHTML = '<a href="VideoController.php?físeán%='+videoId+'">'+title+'</a>';
					
					var div7 = document.createElement("div");
					div7.className = "v-views";
					div7.innerHTML = views + " views " + date; 
					
					var div8 = document.createElement("div");
					div8.className = "v-percent";
					div8.innerHTML = '<span class="v-circle"></span>' + procent + '%';
					
					div5.appendChild(div6);
					div5.appendChild(div7);
					div5.appendChild(div8);
					
				var div9 = document.createElement("div");
				div9.className = "col-lg-2 col-xs-2 col-sm-2 h-clear-list";
				div9.innerHTML = '<a href="#" onclick = "event.preventDefault(); deleteHistoryideo('+videoId+');"><i class="cvicon-cv-cancel"></i></a>';
				
				var div10 = document.createElement("div");
				div10.className = "clearfix";
				
				var div11 = document.createElement("div");
				div11.className = "h-divider";
				
				div2.appendChild(div3);
				div2.appendChild(div5);
				div2.appendChild(div9);
				div2.appendChild(div10);
				div2.appendChild(div11);
				
			div1.appendChild(div2);
			
	historyVideosContainer.appendChild(div1);			
				
	}
	
	function getHistoryVideos (offset){
		var currier = new XMLHttpRequest();
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 500) {
				location.href='./503.php';
			}
			if (this.readyState === 4 && this.status === 200) {
				var incomeData = JSON.parse(this.responseText);
				if (incomeData.length < 12) {
					MoreHistoryVideos.style.display = "none";	
				}else {
					MoreHistoryVideos.style.display = "inline-block";
				}
				var incomeData = JSON.parse(this.responseText);
				
				for (var int = 0; int < incomeData.length; int++) {
					createHistoryVideoElement (incomeData[int].video_id, incomeData[int].poster_path, incomeData[int].duration, 
							incomeData[int].title,incomeData[int].view,  incomeData[int].date, incomeData[int].prcent);
				}
			}
		}
		currier.open('GET', 
				'ajax/GoToPages.php?page=history-video&offset='+offset,
				true);
		currier.send(null);
	}
	// auto get  first 12 videos
	if (historyPage) {
		getHistoryVideos(offset.value);
	}
	
	MoreHistoryVideos.onclick = function(){
		// up offset
		offset.value = Number(offset.value) + Number(12);
		// get more videos
		getHistoryVideos (offset.value);
	}
	
	// delete likded video
	function deleteHistoryideo(video_id){
		var currier = new XMLHttpRequest();
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 500) {
				location.href='./503.php';
			}
			if (this.readyState === 4 && this.status === 200) {
				document.getElementById(video_id).remove(video_id);
			}
		}
		var dataSend = 'data=' + JSON.stringify({
			deleteHistoryideo : video_id,
		});
			currier.open('DELETE', 
					'ajax/GoToPages.php', 
					true);
			currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			currier.send(dataSend);	
	}
	//delete all likded video
	
	function deleteAllHistoryVideos(){
		var currier = new XMLHttpRequest();
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 500) {
				location.href='./503.php';
			}
			if (this.readyState === 4 && this.status === 200) {
				historyVideosContainer.innerHTML = "";
			}
		}
		var dataSend = 'data=' + JSON.stringify({
			deleteAllHistoryVideos : "deleteAll"
		});
			currier.open('DELETE', 
					'ajax/GoToPages.php', 
					true);
			currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			currier.send(dataSend);	
	}
}
////////HISTORY PAGE END:
////////////////////////////////////////////////////////////////////////////////////////////////////////////