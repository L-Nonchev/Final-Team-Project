var userId = document.getElementById('@gdsfdY42$');
var loogedUserId = document.getElementById('EfdsJs@4');
var suscribers = document.getElementById('suscribers');
var channelName = document.getElementById('channel-name');

var btnSubscribers = document.getElementById('subscribers');



if (loogedUserId){
	if(loogedUserId.value > 0){
		
		if (loogedUserId.value === userId.value) {
			btnSubscribers.disabled = true;
			btnSubscribers.innerHTML ="Subscribers";
			
		}else{
			btnSubscribers.disabled = false;
			btnSubscribers.innerHTML ="Subscribe";		
		}
		
		
		btnSubscribers.onclick = function() {
			
			if (btnSubscribers.innerHTML === "Subscribe") {			
				btnSubscribers.innerHTML ="Subscribed";
				btnSubscribers.style.backgroundColor = "#91c1ea";
				btnSubscribers.style.borderColor = "#91c1ea";
				
				suscribers = Number(suscribers.innerHTML) + Number(1);
			}else{
				if (confirm("Unsubscribe from " + channelName.innerHTML + " channel ?") == true) {
					btnSubscribers.innerHTML ="Subscribe";
					btnSubscribers.style.backgroundColor = "#ea2c5a";
					btnSubscribers.style.borderColor = "#ea2c5a";
					suscribers = Number(suscribers.innerHTML) - Number(1);
					
				}
				
			}
			
			var currier = new XMLHttpRequest();
			currier.onreadystatechange = function(){
				if (this.readyState === 4 && this.status === 200) {
					
					console.log(this.responseText);
					var incomeData = JSON.parse(this.responseText);
					
					
				}
			}
			
			var dataSend = 'data=' + JSON.stringify({
				channelId : userId.value,
				userId : loogedUserId.value,
				suscribers : suscribers.innerHTML
			});
			currier.open('POST', 
					'http://localhost/Final-Team-Project/ajax/sucribers.php', 
					true);
			currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			currier.send(dataSend);
			
			
		}
	
	} else {
		btnSubscribers.disabled = true;
		btnSubscribers.innerHTML ="Subscribers";
}
}
