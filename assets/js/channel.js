// pages
var videoPage = document.getElementById('videos');
var channelPage = document.getElementById('channels');
var palyListPage = document.getElementById('Playlist');
var discusPage = document.getElementById('discussion');
var aboutPage = document.getElementById('about');
// user data
var channelId = document.getElementById('@gdsfdY42$');
var logedUserId = document.getElementById('EfdsJs@4');

////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////// VIDEO PAGE CHANNEL :
var videoContainer = document.getElementById('row-video-container');

var videoOffset = document.getElementById('132Ascasd@gadsa');
var orderBy = document.getElementById('53453Asd!sdgad');
var privacy = document.getElementById('fsd^3S2fsafas');

var btnMoreVideos = document.getElementById('bnt-more-videos');
var praivacyDiv = document.getElementById('privacy');

if (videoPage) {
	if (channelId.value === logedUserId.value) {
		praivacyDiv.style.visibility = "visible";
	}
	//  video HTML
	function createVideo(id, duration , poster, title, views ,videoProcent , date) {
		
		//video div
		var div1 = document.createElement("div");
		div1.className = " col-lg-3 col-xs-6 videoitem";
		
			// inner video div
			var div2 = document.createElement("div");
			div2.className = "b-video user-channel";
			
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
					
				var div6 = document.createElement("div");
				div6.innerHTML = "Uploaded " +  date;
				
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
			div2.appendChild(div6);
			div2.appendChild(div5);
		div1.appendChild(div2);
				
	videoContainer.appendChild(div1);
	}
	// End create video
	
	// send JSON GET request for video
	function getVideos(channelId, offset , orderBy, privacy) {
		var currier = new XMLHttpRequest();
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 500) {
				location.href='./503.php';
			}
			if (this.readyState === 4 && this.status === 200) {
				var incomeData = JSON.parse(this.responseText);
				if (incomeData.length < 16) {
					btnMoreVideos.style.display = "none";	
				}else {
					btnMoreVideos.style.display = "inline-block";
				}
			
				for (var int = 0; int < incomeData.length; int++) {
					if (Number(incomeData[int].dliked) === 0){
						incomeData[int].dliked = 1;
					}
					if(Number(incomeData[int].liked) === 0) {
						incomeData[int].liked = 1;
					}	
					var videoProcent = (Math.round(100 - ((incomeData[int].dliked / incomeData[int].liked) * 100)));
					if(videoProcent < 0){
						videoProcent = 0;
					}
					createVideo(incomeData[int].video_id, incomeData[int].duration , 
					incomeData[int].poster_path , incomeData[int].title, incomeData[int].views, incomeData[int].prcent, incomeData[int].date );
					
					addAjaxVideoOptions();
				}			
			}
		}
		currier.open('GET', 
				'ajax/channelVideos.php?@$^^%@@^@^$^@='+channelId+'&limit='+offset+'&orderBy='+orderBy+'&privacy='+privacy, 
				true);
		currier.send(null);
	}

	//auto load first 8 user videos
	if (channelId && videoOffset && orderBy) {
		getVideos(channelId.value, videoOffset.value, orderBy.value, privacy.value)	
	}

	// get more video
	if (btnMoreVideos) {
		btnMoreVideos.onclick= function() {
			
			// up offset
			videoOffset.value = Number(videoOffset.value) + Number(16);
			
			// get more videos
			getVideos(channelId.value, videoOffset.value, orderBy.value, privacy.value)	
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
		getVideos(channelId.value, videoOffset.value, orderBy.value, privacy.value)
	}
	
	// change video privacy
	if (praivacyDiv){
		if(channelId.value === channelId.value){
			praivacyDiv.style.opacity = "1";
			
			function showVideo(privacyId) {
				videoContainer.innerHTML  = " ";
				// change SQL privacy
				privacy.value  = privacyId;	
				// reset offset
				videoOffset.value = Number(0);
				// get new SQL video ordered BY
				getVideos(channelId.value, videoOffset.value, orderBy.value, privacy.value)
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

	//  channel HTML
	function createChannel(channelId, banner , pircture, username, suscribers, cntVideos, country, views, videoProcent) {
		
		//channel div
		var div1 = document.createElement("div");
		div1.className = " col-md-3 col-sm-4 col-xs-6";
		
			// inner channel div
			var div2 = document.createElement("div");
			div2.className = "cns-block";
			
				//channel banner
				var href1 = document.createElement("a");
				href1.className = "cns-image";
				href1.href ="ChannelController.php?@$^^%@@^@^$^@="+ channelId +"&page=Video";
				href1.innerHTML =  '<img src="assets/images/user-banners/'+ banner +'" alt="" >';
				
				//user picture
				var div3  = document.createElement("div");
				div3.className = "cns-img-small";
						
					var href2  = document.createElement("a");
					href2.className = "cns-small-wrapp";
					href2.href ="ChannelController.php?@$^^%@@^@^$^@="+ channelId +"&page=Video";
					href2.innerHTML =  '<img src="assets/images/user-pictures/'+ pircture +'" alt="small">';
					
				div3.appendChild(href2);	
					
				//data div
				var div5 = document.createElement("div");	
				div5.className = "cns-info";
					
					var href3  = document.createElement("a");
					href3.className = "cns-small-wrapp";
					href3.href ="ChannelController.php?@$^^%@@^@^$^@="+ channelId +"&page=Video";					
					href3.innerHTML =  "<h5>" + username + "<h5>";
					
					var span0 = document.createElement("span");
					span0.innerHTML = suscribers + " Subscribers";
					
					var span1 = document.createElement("span");
					span1.innerHTML = country;
					
					var span2 = document.createElement("span");
					span2.innerHTML = cntVideos + " Videos";
					
					var span3 = document.createElement("span");
					span3.innerHTML = views + " Views";
					
					var span4 = document.createElement("span");
					span4.className = "cv-percent";
					
						var span5 = document.createElement("span");
						span5.className = "cv-circle";
						
					span4.innerHTML = '<span class="cv-circle"></span>' + videoProcent  + ' % <span class="cv-circle"></span> ';
					
				div5.appendChild(href3);
				div5.appendChild(span0);
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
	function getChannels(channelId, channelOffset) {
		var currier = new XMLHttpRequest();
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 500) {
				location.href='./503.php';
			}
			if (this.readyState === 4 && this.status === 200) {
				var incomeData = JSON.parse(this.responseText);
				if (incomeData.length < 8) {
					btnMoreChannels.style.display = "none";	
				}else {
					btnMoreChannels.style.display = "inline-block";
				}
				for (var int = 0; int < incomeData.length; int++) {
					if (Number(incomeData[int].subscribers) === 0 ){
						incomeData[int].subscribers = 1;
					}
					if (Number(incomeData[int].views) === 0) {
						incomeData[int].views = 1;
					}
					var videoProcent = (Math.round(100 - ((Number(incomeData[int].subscribers) / Number(incomeData[int].views)) * 100)))
					createChannel(incomeData[int].userId, incomeData[int].profilBanner , incomeData[int].profilPic, incomeData[int].username, 
							incomeData[int].subscribers, incomeData[int].cntVideos, incomeData[int].country, incomeData[int].views, videoProcent);
				}			
			}
		}
		currier.open('GET', 
				'ajax/channelFollowedPages.php?@$^^%@@^@^$^@='+channelId+'&offset='+channelOffset,
				true);
		currier.send(null);
	}
	
	// auto load channels
	if (channelId && channelOffset) {
		getChannels(channelId.value, channelOffset.value)	
	};

	//get more channels
	if (btnMoreChannels) {
		btnMoreChannels.onclick= function() {
			// up offset
			channelOffset.value = Number(channelOffset.value) + Number(8);
			// get more videos
			getChannels(channelId.value, channelOffset.value)	
		};
	};
};
////////END LIKED CHANNELS PAGE CHANNEL :
////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////DISCUSION PAGE CHANNEL :
var comentList = document.getElementById('comments-list');
var discusionOffset = document.getElementById('o23fdsdf$54et');
var bntAddComent = document.getElementById('btnAddCometn');
var btnMoreComents = document.getElementById('load-more-coments');
var textArea = document.getElementById('textAreaComent');
var comentDiv = document.getElementById('comments-list')
var cntComents = document.getElementById('rc-header');
if (discusPage) {
// coment HTML
function createDiscusion (user_discussant_id ,userpic, username, text , date , discusionId){

	var div1 = document.createElement("div");
	div1.className = "cl-comment"
	div1.id = discusionId
		
		
		var div2 = document.createElement("div");
		div2.className = "cl-avatar"
		div2.innerHTML  = '<a href="./ChannelController.php?@$^^%@@^@^$^@='+ user_discussant_id +'&page=Video"><img src="./assets/images/user-pictures/'+ userpic +'" alt="" style="width: 70px"></a>';
		
		var div3 = document.createElement("div");
		
			var div4 = document.createElement("div");
			div4.className = "cl-name-date";
			div4.innerHTML = '<a href="./ChannelController.php?@$^^%@@^@^$^@='+ user_discussant_id +'&page=Video">' + username + '</a>' + " " +date;
			
			var div5 = document.createElement("div");
			div5.className = "cl-text";
			if (channelId.value === logedUserId.value) {
				div5.innerHTML = '<a class="deleteComent" onclick="event.preventDefault(), deleteDiscusComment('+ discusionId+')" href="#"><i class="cvicon-cv-cancel"></i></a>';
			} else if (user_discussant_id == logedUserId.value)		{
				div5.innerHTML = '<a class="deleteComent" onclick="event.preventDefault(), deleteDiscusComment('+ discusionId+')" href="#"><i class="cvicon-cv-cancel"></i></a>';
			}	
			div5.innerHTML = div5.innerHTML + text;
			
			var div6 = document.createElement("div");
			div6.className = "cl-meta";
			
			div3.appendChild(div4);
			div3.appendChild(div5);
			div3.appendChild(div6);
		
		var div7 = document.createElement("div");
		div7.className = "clearfix";
		
		
	div1.appendChild(div2);
	div1.appendChild(div3);
	div1.appendChild(div7);	
	
	comentDiv.appendChild(div1);
	
	}
	// HTML coment
	function createNewComent (user_discussant_id ,userpic, username, text , date , discusionId){

		var div1 = document.createElement("div");
		div1.className = "cl-comment"
		div1.id = discusionId
			
			var div2 = document.createElement("div");
			div2.className = "cl-avatar"
			div2.innerHTML  = '<a href="./ChannelController.php?@$^^%@@^@^$^@='+ user_discussant_id +'&page=Video"><img src="./assets/images/user-pictures/'+ userpic +'" alt="" style="width: 70px"></a>';
			
			var div3 = document.createElement("div");
			
				var div4 = document.createElement("div");
				div4.className = "cl-name-date";
				div4.innerHTML = '<a href="./ChannelController.php?@$^^%@@^@^$^@='+ user_discussant_id +'&page=Video">' + username + '</a>' + " " +date;
				
				var div5 = document.createElement("div");
				div5.className = "cl-text";
				div5.innerHTML = '<a class="deleteComent" onclick="event.preventDefault(), deleteDiscusComment('+ discusionId+')" href="#"><i class="cvicon-cv-cancel"></i></a>';
				div5.innerHTML = div5.innerHTML + text;
				
				var div6 = document.createElement("div");
				div6.className = "cl-meta";
				
				div3.appendChild(div4);
				div3.appendChild(div5);
				div3.appendChild(div6);
			
			var div7 = document.createElement("div");
			div7.className = "clearfix";
			
			
		div1.appendChild(div2);
		div1.appendChild(div3);
		div1.appendChild(div7);	
		comentDiv.insertBefore(div1, comentDiv.childNodes[3]);
	}
	
	if (btnMoreComents) {
	bntAddComent.onclick = function(){
		var currier = new XMLHttpRequest();
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 400) {
				var incomeData = JSON.parse(this.responseText);
				if (confirm(incomeData.error) == true) {
					location.href='./LogInController.php';
				}
			}
			if (this.readyState === 4 && this.status === 401) {
				var incomeData = JSON.parse(this.responseText);
				alert(incomeData.error);
			}
			if (this.readyState === 4 && this.status === 500) {
				location.href='./503.php';
			}
			
			if (this.readyState === 4 && this.status === 200) {
				var incomeData = JSON.parse(this.responseText);
				cntComents.innerHTML = Number(cntComents.innerHTML) + Number(1);
				createNewComent (channelId.value, incomeData.userpic, incomeData.username, incomeData.text , " Now", incomeData.discussion_id);
			}
		}
		var dataSend = 'data=' + JSON.stringify({
			text : textArea.value,
			channelId : channelId.value
		});
			currier.open('POST', 
					'ajax/channelDiscussion.php', 
					true);
			currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			currier.send(dataSend);	
		}		
	}

	// auto lodat last 8 comen
	if (bntAddComent && btnMoreComents) {
		
	function getComents (channelId, discusionOffset){
		var currier = new XMLHttpRequest();
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 400) {
				var incomeData = JSON.parse(this.responseText);
				if (confirm(incomeData.error) == true) {
					location.href='./LogInController.php';
				}
			}
			if (this.readyState === 4 && this.status === 200) {
				var incomeData = JSON.parse(this.responseText);
				if (incomeData.length < 8) {
					btnMoreComents.style.display = "none";	
				}else {
					btnMoreComents.style.display = "inline-block";
				}
				cntComents.innerHTML = incomeData[0].cntDiscussions;
				for (var int = 0; int < incomeData.length; int++) {
					createDiscusion (incomeData[int].user_discussant_id ,incomeData[int].picture, incomeData[int].username, 
							incomeData[int].text , incomeData[int].date , incomeData[int].discussion_id);
				}			
			}
		}
		currier.open('GET', 
				'ajax/channelDiscussion.php?@$^^%@@^@^$^@='+channelId+'&offset='+discusionOffset, 
				true);
		currier.send(null);
		
		}	
	}

	// auto load coments
	if (channelId && comentList) {
	getComents (channelId.value, discusionOffset.value);
	};
	
	//get more coments
	if (btnMoreComents) {
		btnMoreComents.onclick= function() {
			// up offset
			discusionOffset.value = Number(discusionOffset.value) + Number(8);
			// get more videos
			getComents (channelId.value, discusionOffset.value);
		};
	};
	// delete coment
	function deleteDiscusComment (commentId){
		var currier = new XMLHttpRequest();
		currier.onreadystatechange = function(){
	
			if (this.readyState === 4 && this.status === 200) {
					document.getElementById(commentId).remove(commentId);
					cntComents.innerHTML = Number(cntComents.innerHTML) - Number(1);
			}
		}
		var dataSend = 'data=' + JSON.stringify({
			userId : logedUserId.value,
			commentId : commentId
		});
			currier.open('DELETE', 
					'ajax/channelDiscussion.php', 
					true);
			currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			currier.send(dataSend);			 
	}
};
////////END DISCUSION PAGE CHANNEL :
////////////////////////////////////////////////////////////////////////////////////////////////////////////
