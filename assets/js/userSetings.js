
////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////// Upate username :
var btnUsername = document.getElementById('username-button');
var oldUsername = document.getElementById('oldUsername');
var labelOldUsername = document.getElementById('username-old-label')
var newUsername = document.getElementById('newUsername');
var labelNewUsername = document.getElementById('username-new-label')

//if(oldUsername.value === "" && newUsername.value ===""){
//	btnUsername.style.visibility = "hidden";
//}else{
//	btnUsername.style.visibility = "visible";	
//}

if (newUsername) {
	newUsername.onblur = function() {
		var currier = new XMLHttpRequest();
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 400) {
				var incomeData = JSON.parse(this.responseText);
				newUsername.style.borderColor = "red";
				labelNewUsername.style.color = "red";
				labelNewUsername.innerHTML  =incomeData.check
				btnUsername.style.visibility = "hidden";
			}
			if (this.readyState === 4 && this.status === 404) {
				var incomeData = JSON.parse(this.responseText);
				newUsername.style.borderColor = "#e0e1e2";
				labelNewUsername.innerHTML  = "New Username";
				labelNewUsername.style.color = "black";
				btnUsername.style.visibility = "visible";			
			}
			if (this.readyState === 4 && this.status === 200) {
				var incomeData = JSON.parse(this.responseText);
				newUsername.style.borderColor = "red";
				labelNewUsername.style.color = "red";
				labelNewUsername.innerHTML  ="Usename " + newUsername.value + " already exists!"
				btnUsername.style.visibility = "hidden";
			}
		}
		if (!newUsername.value) {
			newUsername.style.borderColor = "#e0e1e2";
			labelNewUsername.innerHTML  = "New Username";
			labelNewUsername.style.color = "black";
			btnUsername.style.visibility = "visible";
		}else {
			var dataSend = 'username=' + JSON.stringify({
				username : newUsername.value
			});
				currier.open('POST', 
						'ajax/changeSettings.php', 
						true);
				currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				currier.send(dataSend);	
		}
	}
}
if(btnUsername){
	btnUsername.onclick = function(){
		var currier = new XMLHttpRequest();
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 400) {
				var incomeData = JSON.parse(this.responseText);
				oldUsername.style.borderColor = "red";
				alert(incomeData.update);	
			}
			if (this.readyState === 4 && this.status === 200) {
				oldUsername.style.borderColor = "#e0e1e2";
				var incomeData = JSON.parse(this.responseText);
				btnUsername.innerHTML = "Changed"; 
				btnUsername.style.backgroundColor ="#2cce8f";
				oldUsername.style.borderColor = "#e0e1e2";
				document.getElementById('dropdownMenu1').innerHTML = newUsername.value;
			}
		}
		var dataSend = 'update=' + JSON.stringify({
			newUsername : newUsername.value,
			oldUsername : oldUsername.value
		});
			currier.open('POST', 
					'ajax/changeSettings.php', 
					true);
			currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			currier.send(dataSend);	
	};
}
////////END Upate username :
////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////Update Email :
var btnEmail = document.getElementById('email-button');
var oldEmail = document.getElementById('oldEmail');
var labelOldEmail = document.getElementById('email-old-label')
var newEmail = document.getElementById('newEmail');
var labelNewEmail = document.getElementById('email-new-label')

//if(oldEmail.value === "" && newEmail.value === ""){
//	btnEmail.style.visibility = "hidden";
//}else{
//	btnEmail.style.visibility = "visible";	
//}

if (newEmail) {
	newEmail.onblur = function() {
		var currier = new XMLHttpRequest();
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 400) {
				var incomeData = JSON.parse(this.responseText);
				newEmail.style.borderColor = "red";
				labelNewEmail.style.color = "red";
				labelNewEmail.innerHTML  =incomeData.check
				btnEmail.style.visibility = "hidden";
			}
			if (this.readyState === 4 && this.status === 404) {
				var incomeData = JSON.parse(this.responseText);
				newEmail.style.borderColor = "#e0e1e2";
				labelNewEmail.innerHTML  = "New Email";
				labelNewEmail.style.color = "black";
				btnEmail.style.visibility = "visible";
			}
			if (this.readyState === 4 && this.status === 200) {
				var incomeData = JSON.parse(this.responseText);
				newEmail.style.borderColor = "red";
				labelNewEmail.style.color = "red";
				labelNewEmail.innerHTML  ="Email " + newEmail.value + " already exists!"
				btnEmail.style.visibility = "hidden";
			}
		}
		if (!newEmail.value) {
			newEmail.style.borderColor = "#e0e1e2";
			labelNewEmail.innerHTML  = "New Email";
			labelNewEmail.style.color = "black";
			btnEmail.style.visibility = "visible";
		}else {
			var dataSend = 'email=' + JSON.stringify({
				email : newEmail.value
			});
				currier.open('POST', 
						'ajax/changeSettings.php', 
						true);
				currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				currier.send(dataSend);	
		}
	}
}
if(btnEmail){
	btnEmail.onclick = function(){
		var currier = new XMLHttpRequest();
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 400) {
				var incomeData = JSON.parse(this.responseText);
				oldEmail.style.borderColor = "red";
				alert(incomeData.update);	
			}
			if (this.readyState === 4 && this.status === 200) {
				oldEmail.style.borderColor = "#e0e1e2";
				var incomeData = JSON.parse(this.responseText);
				btnEmail.innerHTML = "Changed"; 
				btnEmail.style.backgroundColor ="#2cce8f";
				labelOldEmail.style.borderColor = "#e0e1e2";
			}
		}
		var dataSend = 'update-email=' + JSON.stringify({
			newEmail : newEmail.value,
			oldEmail : oldEmail.value
		});
			currier.open('POST', 
					'ajax/changeSettings.php', 
					true);
			currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			currier.send(dataSend);	
	};
}
////////END Email  
////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////Passwor update:
var btnPassword = document.getElementById('password-button');
var oldPassword = document.getElementById('old-password');
var labelOldPassword = document.getElementById('password-old-label')
var newPassword = document.getElementById('new-password');
var labelNewPasswprd = document.getElementById('new-password-label')
var rePassword = document.getElementById('re-newPassword');
var labelRePassword = document.getElementById('re-new-password-label');
//if(oldPassword.value === "" && newPassword.value === ""  && rePassword.value === ""){
//btnEmail.style.visibility = "hidden";
//}else{
//btnEmail.style.visibility = "visible";	
//}

if (btnPassword) {
	// chek for same passord 1 and 2 
	function check_password() {
		if (((newPassword.value.length) > 0 ) || ((rePassword.value.length) > 0)){
			// if password is not the same 
			if(newPassword.value != rePassword.value){
				// singUp button stop word
				btnPassword.style.visibility = "hidden";
				labelNewPasswprd.innerHTML  = "The password you entered does NOT match!";
				labelRePassword.innerHTML  = "The password you entered does NOT match!";
				
				newPassword.style.borderColor = "red";
				rePassword.style.borderColor = "red";		
			}else {
				// passwords is same 
					if ((newPassword.value.length) < 8 && (rePassword.value.length) < 8){
						labelNewPasswprd.innerHTML  = "You must enter at last 8 characters for your password!";
						labelRePassword.innerHTML  = "You must enter at last 8 characters for your password!";
						
						newPassword.style.borderColor = "red";
						rePassword.style.borderColor = "red";
						
						btnPassword.btnPassword.style.visibility = "hidden";
					}else {
						labelNewPasswprd.innerHTML  = "Password";
						labelRePassword.innerHTML  = "Re-type Password";
						
						newPassword.style.borderColor = "#e0e1e2";
						rePassword.style.borderColor = "#e0e1e2";
						
						btnPassword.style.visibility = "visible";
					}
			}
		} else {
			labelNewPasswprd.innerHTML  = "Password";
			labelRePassword.innerHTML  = "Re-type Password";
			
			newPassword.style.borderColor = "#e0e1e2";
			rePassword.style.borderColor = "#e0e1e2";
			
			btnPassword.style.visibility = "visible";
		}
	}
	if (newPassword) {
		newPassword.onblur =  check_password;
	}
	if (rePassword) {
		rePassword.onkeyup =  check_password;
	}	
	if(btnPassword){
		btnPassword.onclick = function(){
			var currier = new XMLHttpRequest();
			currier.onreadystatechange = function(){
				if (this.readyState === 4 && this.status === 400) {
					var incomeData = JSON.parse(this.responseText);
					oldPassword.style.borderColor = "red";
					oldPassword.style.borderColor = "red";
					alert(incomeData.update);	
				}
				if (this.readyState === 4 && this.status === 200) {
					var incomeData = JSON.parse(this.responseText);
					btnPassword.innerHTML = "Changed"; 
					btnPassword.style.backgroundColor ="#2cce8f";
					oldPassword.style.borderColor = "#e0e1e2";
				}
			}
			var dataSend = 'update-password=' + JSON.stringify({
				newPassword : newPassword.value,
				rePassword : rePassword.value,
				oldPassword : oldPassword.value
				
			});
				currier.open('POST', 
						'ajax/changeSettings.php', 
						true);
				currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				currier.send(dataSend);	
		};
	}
}
////////END Password
////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////Picture update:
var btnPic = document.getElementById('picture-button');

$(document).ready(function (e) {
    $('#imageUploadForm').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'ajax/changeSettings.php',
            data:formData,
            cache:false,
            contentType: false,
            statusCode: {
            	 400: function (response) {
                    alert(response.responseText);     
                  },
                  200 :function(response) {
                  	btnPic.innerHTML = "Changed"; 
                  	btnPic.style.backgroundColor ="#2cce8f";      
                  },
              },
            processData: false,
        });
    }));

});
////////END Pictureupdate
////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////Baner update:
var btnBanner = document.getElementById('banner-button');

$(document).ready(function (e) {
    $('#bannerUploadForm').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'ajax/changeSettings.php',
            data:formData,
            cache:false,
            contentType: false,
            statusCode: {
            	 400: function (response) {
                    alert(response.responseText);     
                  },
                  200 :function(response) {
                	  btnBanner.innerHTML = "Changed"; 
                	  btnBanner.style.backgroundColor ="#2cce8f";      
                  },
              },
            processData: false,
        });
    }));

});


