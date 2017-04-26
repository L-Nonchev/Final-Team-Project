// pages
var videoPage = document.getElementById('videos');
var channelPage = document.getElementById('channels');
var palyListPage = document.getElementById('Playlist');
var discusPage = document.getElementById('discussion');
var aboutPage = document.getElementById('about');
// user data
var userId = document.getElementById('@gdsfdY42$');
var loogedUserId = document.getElementById('EfdsJs@4');


////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////// VIDEO PAGE CHANNEL :
var videoContainer = document.getElementById('row-video-container');

var videoOffset = document.getElementById('132Ascasd@gadsa');
var orderBy = document.getElementById('53453Asd!sdgad');
var privacy = document.getElementById('fsd^3S2fsafas');

var btnMoreVideos = document.getElementById('bnt-more-videos');
var praivacyDiv = document.getElementById('privacy');



if (videoPage) {
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
	// End create video
	
	// send JSON GET request for video
	function getVideos(userId, offset , orderBy, privacy) {
		var currier = new XMLHttpRequest();
		
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 200) {
				console.log(this.responseText);
				var incomeData = JSON.parse(this.responseText);
					
				if (incomeData.length < 8) {
					btnMoreVideos.style.display = "none";	
				}else {
					btnMoreVideos.style.display = "inline-block";
				}
				
				for (var int = 0; int < incomeData.length; int++) {
					createVideo(incomeData[int].video_id, incomeData[int].duration , 
					incomeData[int].poster_path , incomeData[int].title, incomeData[int].views );
					
					addAjaxVideoOptions();
				}			
			}
		}
		
		currier.open('GET', 
				'http://localhost/Final-Team-Project/ajax/getChannelVideos.php?@$^^%@@^@^$^@='+userId+'&limit='+offset+'&orderBy='+orderBy+'&privacy='+privacy, 
				true);
		currier.send(null);
	}

	//auto load first 8 user videos
	if (userId && videoOffset && orderBy) {
		getVideos(userId.value, videoOffset.value, orderBy.value, privacy.value)	
	}

	// get more video
	if (btnMoreVideos) {
		btnMoreVideos.onclick= function() {
			
			// up offset
			videoOffset.value = Number(videoOffset.value) + Number(8);
			
			// get more videos
			getVideos(userId.value, videoOffset.value, orderBy.value, privacy.value)	
		};
	}


	// change video ordered
	function orderedBy(order) {
		videoContainer.innerHTML  = " ";
		
		// change SQL orderBy
		orderBy.value  = order;	
		// reset offset
		videoOffset.value = Number(0);
		// get new SQL video ordered BY
		getVideos(userId.value, videoOffset.value, orderBy.value, privacy.value)
	}

	// change video privacy
	if (praivacyDiv){
		if(userId.value === loogedUserId.value){
			praivacyDiv.style.opacity = "1";
			
			function showVideo(privacyId) {
				videoContainer.innerHTML  = " ";
				
				// change SQL privacy
				privacy.value  = privacyId;	
				// reset offset
				videoOffset.value = Number(0);
				// get new SQL video ordered BY
				getVideos(userId.value, videoOffset.value, orderBy.value, privacy.value)
			}
		}
	}
}
//////// END VIDEO PAGE CHANNEL :
////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////LIKED CHANNELS PAGE CHANNEL :
var channelsContainer = document.getElementById('row-channels-container');

var channelOffset = document.getElementById('assaeac2');

var btnMoreChannels = document.getElementById('bnt-more-channels');


if (channelPage) {

	// create channel
	function createChannel(userId, banner , pircture, username, suscribers, cntVideos, country) {
		
		//channel div
		var div1 = document.createElement("div");
		div1.className = " col-md-3 col-sm-4 col-xs-6";
		
			// inner channel div
			var div2 = document.createElement("div");
			div2.className = "cns-block";
			
				//channel banner
				var href1 = document.createElement("a");
				href1.className = "cns-image";
				href1.href ="ChannelController.php?@$^^%@@^@^$^@="+ userId +"&page=Video";
				href1.innerHTML =  '<img src="assets/images/user-banners/'+ banner +'" alt="" >';
				
				//user picture
				var div3  = document.createElement("div");
				div3.className = "cns-img-small";
						
					var href2  = document.createElement("a");
					href2.className = "cns-small-wrapp";
					href2.href ="ChannelController.php?@$^^%@@^@^$^@="+ userId +"&page=Video";
					href2.innerHTML =  '<img src="assets/images/user-pictures/'+ pircture +'" alt="small">';
					
				div3.appendChild(href2);	
					
				//data div
				var div5 = document.createElement("div");	
				div5.className = "cns-info";
					
					var href3  = document.createElement("a");
					href3.className = "cns-small-wrapp";
					href3.href ="ChannelController.php?@$^^%@@^@^$^@="+ userId +"&page=Video";					
					href3.innerHTML =  "<h5>" + username + "<h5>";
						
					var span1 = document.createElement("span");
					span1.innerHTML = country;
					
					var span2 = document.createElement("span");
					span2.innerHTML = cntVideos + " Videos";
					
					var span3 = document.createElement("span");
//					span3.innerHTML = country + " Views";
					
					var span4 = document.createElement("span");
					span4.className = "cv-percent";
					
						var span5 = document.createElement("span");
						span5.className = "cv-circle";
						
					span4.innerHTML = suscribers + " Subscribers";
					
					
				div5.appendChild(href3);
				div5.appendChild(span1);
				div5.appendChild(span2);
				div5.appendChild(span3);		
				div5.appendChild(span4);			
		
			div2.appendChild(href1);
			div2.appendChild(div3);
			div2.appendChild(div5);
		
		div1.appendChild(div2);
				
	channelsContainer.appendChild(div1);
	}
	// end create channel
	
	// send JSON GET request for channel
	function getChannels(userId, channelOffset) {
		var currier = new XMLHttpRequest();
		
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 200) {
				
				
				var incomeData = JSON.parse(this.responseText);
		
				if (incomeData.length < 2) {
					btnMoreChannels.style.display = "none";	
				}else {
					btnMoreChannels.style.display = "inline-block";
				}
				
				for (var int = 0; int < incomeData.length; int++) {
					
					createChannel(incomeData[int].userId, incomeData[int].profilBanner , incomeData[int].profilPic, incomeData[int].username, 
							incomeData[int].subscribers, incomeData[int].cntVideos, incomeData[int].country);
					
				}			
			}
		}
		
		currier.open('GET', 
				'http://localhost/Final-Team-Project/ajax/getChannels.php?@$^^%@@^@^$^@='+userId+'&offset='+channelOffset,
				true);
		currier.send(null);
	}

};
// auto load channels
if (userId && channelOffset) {

	getChannels(userId.value, channelOffset.value)	
};


//get more channels
if (btnMoreChannels) {
	btnMoreChannels.onclick= function() {
		
		// up offset
		channelOffset.value = Number(channelOffset.value) + Number(2);
		
		// get more videos
		getChannels(userId.value, channelOffset.value)	
	};
};