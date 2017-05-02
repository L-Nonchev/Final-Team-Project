////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////ALL CHANNELS PAGE :
var allChannelsContainer = document.getElementById('all-channels-container');
var channelsOffset = document.getElementById('assaeac2');
var channelOrderBy = document.getElementById('or123by')
var btnMoreChannels = document.getElementById('bnt-more-channels');
if (allChannelsContainer) {

	//  channel HTML
	function createChannels(channelId, banner , pircture, username, suscribers, cntVideos, country, views, videoProcent) {
		
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
				
		allChannelsContainer.appendChild(div1);
	}
	// end create channel
	
	// send JSON GET request for channel
	function getChannels(channelOrderBy, channelOffset) {
		var currier = new XMLHttpRequest();
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 500) {
				location.href='./503.php';
			}
			if (this.readyState === 4 && this.status === 200) {				
				var incomeData = JSON.parse(this.responseText);
				if (incomeData.length < 12) {
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
					createChannels(incomeData[int].user_id, incomeData[int].banner , incomeData[int].picture, incomeData[int].username, 
							incomeData[int].subscribers, incomeData[int].videoCnt, incomeData[int].country_name, incomeData[int].views, videoProcent);
				}			
			}
		}
		currier.open('GET', 
				'ajax/allChannelsPage.php?offset='+channelOffset+'&orderBy='+channelOrderBy,
				true);
		currier.send(null);
	}
	
	// auto load channels
	if (channelOrderBy && channelsOffset) {
		getChannels(channelOrderBy.value, channelsOffset.value)	
	};
	// get more channels
	if (btnMoreChannels) {
		btnMoreChannels.onclick= function() {
			
			// up offset
			channelsOffset.value = Number(channelsOffset.value) + Number(12);
			
			// get more videos
			getChannels(channelOrderBy.value, channelsOffset.value)	
		};
	}
	// change channel ordered
	function orderedByChannels(OrderBy) {
		allChannelsContainer.innerHTML  = " ";
		// change SQL orderBy
		channelOrderBy.value  = OrderBy;	
		// reset offset
		channelsOffset.value = Number(0);
		// get new SQL video ordered BY
		getChannels(OrderBy, channelsOffset.value)	
	}
	
	// serch 
	$('#serchForm').bind('submit',function()
			{
		var like = document.getElementById('serchInput');
		var order = document.getElementById('or123by')
		if (like.value) {
		var currier = new XMLHttpRequest();
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 400) {
				var incomeData = JSON.parse(this.responseText);
				document.getElementById('serchInput').style.border.color = "red";
				document.getElementById('serchInput').value = incomeData;
			}
			if (this.readyState === 4 && this.status === 200) {
				allChannelsContainer.innerHTML  = " ";				
				var incomeData = JSON.parse(this.responseText);
					btnMoreChannels.style.display = "none";	
				for (var int = 0; int < incomeData.length; int++) {
					if (Number(incomeData[int].subscribers) === 0 ){
						incomeData[int].subscribers = 1;
					}
					if (Number(incomeData[int].views) === 0) {
						incomeData[int].views = 1;
					}
					var videoProcent = (Math.round(100 - ((Number(incomeData[int].subscribers) / Number(incomeData[int].views)) * 100)))
					createChannels(incomeData[int].user_id, incomeData[int].banner , incomeData[int].picture, incomeData[int].username, 
							incomeData[int].subscribers, incomeData[int].videoCnt, incomeData[int].country_name, incomeData[int].views, videoProcent);
				}			
			}
		}
		currier.open('GET', 
				'ajax/allChannelsPage.php?usesho='+like.value+'&orderBy='+order.value,
				true);
		currier.send(null);
		}
	});
};
////////ALL CHANNELS PAGE END
////////////////////////////////////////////////////////////////////////////////////////////////////////////