var asideVideos = document.getElementsByClassName('h-video');
var autoPlayBtn = document.getElementById('autoPlayBtn');
var nextVideoId ;
// chek for autoplay options
if(autoPlayBtn){
	var currier = new XMLHttpRequest();
	currier.onreadystatechange = function(){
		if (this.readyState === 4 && this.status === 200) {
			var incomeData = JSON.parse(this.responseText);
			if (incomeData.ukuzidlalela === true) {
				autoPlayBtn.innerHTML = 'Autoplay ON <i class="cv cvicon-cv-btn-on" style="color: green"></i>';
			}else{
				autoPlayBtn.innerHTML = 'Autoplay OFF <i class="cv cvicon-cv-btn-off" style="color: red"></i>';
			}
		}
	}
	currier.open('GET', 
			'ajax/autoPlayNextVideo.php?ukuzidlalela=1',
			true);
	currier.send(null);

}
// get next video id
$("#next-video").on('DOMNodeInserted',  function(e) {
	 nextVideoId = asideVideos[0].id;
});

//change auto play 
function changeAutoPlay(){
	var currier = new XMLHttpRequest();
	currier.onreadystatechange = function(){
		if (this.readyState === 4 && this.status === 200) {
			var incomeData = JSON.parse(this.responseText);
			if(incomeData.ukuzidlalela === "ON"){
				autoPlayBtn.innerHTML = 'Autoplay ON <i class="cv cvicon-cv-btn-on" style="color: green"></i>';
			}else{
				autoPlayBtn.innerHTML = 'Autoplay OFF <i class="cv cvicon-cv-btn-off" style="color: red"></i>'
			}
		}
	};
		if (autoPlayBtn.innerHTML == 'Autoplay OFF <i class="cv cvicon-cv-btn-off" style="color: red"></i>') {
			var dataSend = 'data=' + JSON.stringify({
				autoPlay : "on"		
			});
		}else if(autoPlayBtn.innerHTML = 'Autoplay ON <i class="cv cvicon-cv-btn-on" style="color: green"></i>'){
			var dataSend = 'data=' + JSON.stringify({
				autoPlay : "off"	
			});
		}
	currier.open('POST', 
			'ajax/autoPlayNextVideo.php', 
			true);
	currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	currier.send(dataSend);	
}

// detect auto play
$("#autoPlayBtn").bind('DOMNodeInserted', 'DOMNodeDelete', function() {
	if (autoPlayBtn.innerHTML === 'Autoplay ON <i class="cv cvicon-cv-btn-on" style="color: green"></i>') {
		var aud = document.getElementById("video-autoplay");
		aud.onended = function() {
			location.href='VideoController.php?físeán%='+nextVideoId;
		};	
	}else{
		var aud = document.getElementById("video-autoplay");
		aud.onended = function() {
			
		};
	}
});