var userId = document.getElementById('user-id');

var videoContainer = document.getElementById('row-video-container');

var offset = document.getElementById('offset');
var orderBy = document.getElementById('orderBy');

var btnMoreVideos = document.getElementById('bnt-more-videos');

// create video
function createVideo(id, duration , poster, title, views) {
	
	//video div
	var div1 = document.createElement("div");
	div1.className = " col-lg-3 col-xs-6 videoitem";
	
		// inner video div
		var div2 = document.createElement("div");
		div2.className = "b-video user-channel";
		
			//image div
			var div3  = document.createElement("div");
			div3.className = "v-img";
				
				var href1 = document.createElement("a");
				href1.href ="singleVideo.php?videoId"+ id;
				
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
			
				var span1 = document.createElement("span");
				span1.className = "v-percent";
				
					var span2 = document.createElement("span");
					span2.className = "v-circle";
					
					
					span1.innerHTML =  views + " views";
					span1.appendChild(span2);
					
					
				div5.appendChild(span1);
				
		div2.appendChild(div3);
		div2.appendChild(div4);
		div2.appendChild(div5);
	

	div1.appendChild(div2);
			
videoContainer.appendChild(div1);
	
}
// send JSON GET request 
function getVideos(userId, offset , orderBy) {
	var currier = new XMLHttpRequest();
	currier.onreadystatechange = function(){
		if (this.readyState === 4 && this.status === 200) {
			
			var incomeData = JSON.parse(this.responseText);
			
			if (incomeData.length < 8) {
				btnMoreVideos.style.display = "none";	
			}else {
				btnMoreVideos.style.display = "inline-block";
			}
			
			for (var int = 0; int < incomeData.length; int++) {
				createVideo(incomeData[int].video_id, incomeData[int].duration , 
				incomeData[int].poster_path , incomeData[int].title, incomeData[int].views );
				
			}			
		}
	}

	currier.open('GET', 
			'http://localhost/Final-Team-Project/ajax/channelVideos.php?@$^^%@@^@^$^@='+userId+'&limit='+offset+'&orderBy='+orderBy, 
			true);
	currier.send(null);
}

//auto load first 8 user videos
if (userId) {
	getVideos(userId.value, offset.value, orderBy.value)
		
	
}

// get more video
if (btnMoreVideos) {
	btnMoreVideos.onclick= function() {
		
		// up offset
		offset.value = Number(offset.value) + Number(8);
		
		// get more videos
		getVideos(userId.value, offset.value, orderBy.value)	
	};
}


// change video ordered
function orderedBy(order) {
	videoContainer.innerHTML  = " ";
	
	// change SQL orderBy
	orderBy.value  = order;	
	// reset offset
	offset.value = Number(0);
	// get new SQL video ordered BY
	getVideos(userId.value, 0, orderBy.value)
}

