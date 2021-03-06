var userId = document.getElementById('@gdsfdY42$');
var loogedUserId = document.getElementById('EfdsJs@4');
var suscribers = document.getElementById('suscribers');
var btnSubscribers = document.getElementById('subscribers');

if (btnSubscribers){
	//for logged user
	if(loogedUserId.value > 0){
		if (loogedUserId.value === userId.value) {
			btnSubscribers.disabled = true;
			btnSubscribers.innerHTML ="Subscribers";
			btnSubscribers.style.visibility = "visible";
			suscribers.style.visibility = "visible";
		}else{
			//for other users chek is subscrib
			var currier = new XMLHttpRequest();
			currier.onreadystatechange = function(){
				if (this.readyState === 4 && this.status === 200) {
					btnSubscribers.style.visibility = "visible";
					suscribers.style.visibility = "visible";
					
					var incomeData = JSON.parse(this.responseText);
					if (incomeData.result === true) {
						
						btnSubscribers.innerHTML ="Subscribed";
						btnSubscribers.style.backgroundColor = "#91c1ea";
						btnSubscribers.style.borderColor = "#91c1ea";
					}else{
						btnSubscribers.innerHTML ="Subscribe";
						btnSubscribers.style.backgroundColor = "#ea2c5a";
						btnSubscribers.style.borderColor = "#ea2c5a";	
					}
				}
			}
			var dataSend = 'data=' + JSON.stringify({
				suscribers : suscribers.innerHTML,
				channelId : userId.value,
				userId : loogedUserId.value
			});
			currier.open('GET', 
					'ajax/sucribers.php?CH=' + userId.value + '&UID=' + loogedUserId.value, 
					true);
			currier.send(null);
		}
		// change subscribe
		btnSubscribers.onclick = function() {			
			if (btnSubscribers.innerHTML === "Subscribe") {			
				btnSubscribers.innerHTML ="Subscribed";
				btnSubscribers.style.backgroundColor = "#91c1ea";
				btnSubscribers.style.borderColor = "#91c1ea";
				updateSuscribers = true;
			}else{
				if (confirm("Unsubscribe from channel ?") === false) {
					btnSubscribers.innerHTML ="Subscribed";
					btnSubscribers.style.backgroundColor = "#91c1ea";
					btnSubscribers.style.borderColor = "#91c1ea";
					updateSuscribers = false;
				}else{
					btnSubscribers.innerHTML ="Subscribe";
					btnSubscribers.style.backgroundColor = "#ea2c5a";
					btnSubscribers.style.borderColor = "#ea2c5a";
					updateSuscribers = true;
				}				
			}		
			if (updateSuscribers === true) {
				var currier = new XMLHttpRequest();
				currier.onreadystatechange = function(){
					if (this.readyState === 4 && this.status === 200) {										
						var incomeData = JSON.parse(this.responseText);
						if (incomeData.upload === "success") {
							suscribers.innerHTML = incomeData.suscribers;
						}else{
							btnSubscribers.disabled = true;
							btnSubscribers.innerHTML ="Subscribers";
							btnSubscribers.style.backgroundColor = "#ea2c5a";
							btnSubscribers.style.borderColor = "#ea2c5a";
						}
					}
				}
				var dataSend = 'data=' + JSON.stringify({
					suscribers : suscribers.innerHTML,
					channelId : userId.value,
					userId : loogedUserId.value
					
				});
				currier.open('POST', 
						'ajax/sucribers.php', 
						true);
				currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				currier.send(dataSend);	
			}	
		}
		} else {
			// for not logged users
			btnSubscribers.disabled = true;
			btnSubscribers.innerHTML ="Subscribers";
			btnSubscribers.style.visibility = "visible";
			suscribers.style.visibility = "visible";
	}
}