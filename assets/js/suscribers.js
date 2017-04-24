var userId = document.getElementById('user-id');

var loogedUserId = document.getElementById('logged-user-id');
var channelName = document.getElementById('channel-name');


var btnSubscribers = document.getElementById('subscribers');



//console.log(channelName.innerHTML);
if(loogedUserId){
	if (loogedUserId.value === userId.value) {
		btnSubscribers.disabled = true;
		btnSubscribers.innerHTML ="Subscribers";
		
	}else{
		btnSubscribers.disabled = false;
		btnSubscribers.innerHTML ="Subscribe";		
	}
	
	
	btnSubscribers.onclick = function() {
		if (btnSubscribers.innerHTML === "Subscribe") {
			
			var currier = new XMLHttpRequest();
			currier.onreadystatechange = function(){
				if (this.readyState === 4 && this.status === 200) {
					
//					console.log(userId.value);
//					console.log(loogedUserId.value);
					console.log(this.responseText);
//					var incomeData = JSON.parse(this.responseText);
					
					
						
				
				}
			}
			
			var dataSend = 'data=' + JSON.stringify({
				channelId : userId.value,
				userId : loogedUserId.value
			});
			currier.open('POST', 
					'http://localhost/Final-Team-Project/ajax/sucribers.php', 
					true);
			currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			currier.send(dataSend);
			
			
			btnSubscribers.innerHTML ="Subscribed";
		}else{
			if (confirm("Unsubscribe from " + channelName.innerHTML + " channel ?") == true) {
				btnSubscribers.innerHTML ="Subscribe";
			} else {
				btnSubscribers.innerHTML ="Subscribed";
			}
			
		}
	}

}
