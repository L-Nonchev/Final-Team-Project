
var btnUsername = document.getElementById('username-button');
var oldUsername = document.getElementById('oldUsername');
var labelOldUsername = document.getElementById('username-old-label')
var newUsername = document.getElementById('newUsername');
var labelNewUsername = document.getElementById('username-new-label')

////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////// Upate username :

newUsername.onblure = function() {
	var currier = new XMLHttpRequest();
	currier.onreadystatechange = function(){
		if (this.readyState === 4 && this.status === 401) {
			console.log(this.responseText);
			var incomeData = JSON.parse(this.responseText);
			
			newUsername.style.borderColor = "red";
			labelNewUsername.style.color = "red";
			labelNewUsername.innerHTML  ="Usename " + newUsername.value + " alredy exist!"
			
			btnMoreVideos.style.display = "none";
		}
		
		if (this.readyState === 4 && this.status === 200) {
			console.log(this.responseText);
			var incomeData = JSON.parse(this.responseText);
			
			username.style.borderColor = "#e0e1e2";
			usernameLabel.innerHTML  = "Username";
			usernameLabel.style.color = "black";
			
			btnMoreVideos.style.display = "inline-block";
		}
	}
	console.log(newUsername.value);
	var dataSend = 'data=' + JSON.stringify({
		newUsername : newUsername.value
	});
		currier.open('POST', 
				'ajax/changeSettings.php', 
				true);
		currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		currier.send(dataSend);	
}