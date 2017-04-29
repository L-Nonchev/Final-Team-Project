//-=-=-=-=-=-=--=---=-= Varibals =-=-=-=-=-=-=--=-=-==-=-=\\
var username = document.getElementById('InputUsername');
var emailSinGup = document.getElementById('InputEmail');
var password1 = document.getElementById('InputPassword1');
var password2 = document.getElementById('InputPassword2');
var SingUpButton = document.getElementById('singUpButton');

var usernameLabel = document.getElementById('usernameLabel');
var emailLabel = document.getElementById('emailLabel');
var password1Label = document.getElementById('password1Label');
var password2Label = document.getElementById('password2Label');


//-=-=-=-=-=-=--=---=-= Chech for exist username =-=-=-=-=-=-=--=-=-==-=-=\\
if (username) {
	username.onblur = function() {
		var currier = new XMLHttpRequest();
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 200) {
				var incomeData = JSON.parse(this.responseText);
				// exist username
				if(incomeData['check']){
					
					username.style.borderColor = "red";
					usernameLabel.style.color = "red";
					usernameLabel.innerHTML  = "Username "+  username.value + " alredy exist!"
					
					SingUpButton.onclick = function(event){
					    event.preventDefault()
					};
					
				// wrong username	
				}else if (incomeData['exception']  && incomeData['errorMesageUser'] !=="Empty username") {
					
					username.style.borderColor = "red";
					usernameLabel.style.color = "red";
					usernameLabel.innerHTML  = incomeData['errorMesageUser'];
					
					SingUpButton.onclick = function(event){
					    event.preventDefault()
					};
				// all is corect	
				} else {
					username.style.borderColor = "#e0e1e2";
					usernameLabel.innerHTML  = "Username";
					usernameLabel.style.color = "black";
					SingUpButton.onclick = function(event){
					   
					};
				}
			}
		}
		var dataSend = 'data=' + JSON.stringify({
			username : username.value
		});
		currier.open('POST', 
				'ajax/singUpValidation.php', 
				true);
		currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		currier.send(dataSend);
	}
}
//-=-=-=-=-=-=--=---=-= Chech for exist username END=-=-=-=-=-=-=--=-=-==-=-=\\

//-=-=-=-=-=-=--=---=-= Chech for exist email =-=-=-=-=-=-=--=-=-==-=-=\\
if (emailSinGup) {
	emailSinGup.onblur = function() {
		var currier = new XMLHttpRequest();
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 200) {
				
				var incomeData = JSON.parse(this.responseText);
				
				// exist email
				if(incomeData['email'] ){
					emailSinGup.style.borderColor = "red";
					emailLabel.style.color = "red";
					emailLabel.innerHTML  = "Email alredy exist!";
					
					SingUpButton.onclick = function(event){
					    event.preventDefault()
					};
					
				// wrong username	
				}
				else if (incomeData['exception'] && incomeData['errorMesageEmail'] !== "Empty e-mail") {
					emailSinGup.style.borderColor = "red";
					emailLabel.style.color = "red";
					emailLabel.innerHTML  = incomeData['errorMesageEmail'];
		
					SingUpButton.onclick = function(event){
					    event.preventDefault()
					};
				// all is corect	
				} else {
					emailSinGup.style.borderColor = "#e0e1e2";
					emailLabel.innerHTML  = "Email";
					emailLabel.style.color = "black";
					
					SingUpButton.onclick = function(event){
					    
					};
				}
			}
		}
		var dataSend = 'data=' + JSON.stringify({
			email : emailSinGup.value
		});
		currier.open('POST', 
				'ajax/singUpValidation.php', 
				true);
		currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		currier.send(dataSend);
	}
}
//-=-=-=-=-=-=--=---=-= Chech for exist email END=-=-=-=-=-=-=--=-=-==-=-=\\

//-=-=-=-=-=-=--=---=-= Chech for password corect=-=-=-=-=-=-=--=-=-==-=-=\\

// chek for same passord 1 and 2 
function check_password() {
	if (((password1.value.length) > 0 ) || ((password2.value.length) > 0)){
		// if password is not the same 
		if(password1.value != password2.value){
			// singUp button stop word
			SingUpButton.onclick = function(event){
			    event.preventDefault()
			};
			password1Label.innerHTML  = "The password you entered does NOT match!";
			password2Label.innerHTML  = "The password you entered does NOT match!";
			
			password1.style.borderColor = "red";
			password2.style.borderColor = "red";		
		}else {
			// passwords is same 
				if ((password1.value.length) < 8 && (password2.value.length) < 8){
					password1Label.innerHTML  = "You must enter at last 8 characters for your password!";
					password2Label.innerHTML  = "You must enter at last 8 characters for your password!";
					
					password1.style.borderColor = "red";
					password2.style.borderColor = "red";
					
					SingUpButton.onclick = function(event){
						 event.preventDefault()
					};

				}else {
					password1Label.innerHTML  = "Password";
					password2Label.innerHTML  = "Re-type Password";
					
					password1.style.borderColor = "#e0e1e2";
					password2.style.borderColor = "#e0e1e2";
					
					SingUpButton.onclick = function(event){
					};
				}
		}
	} else {
		password1Label.innerHTML  = "Password";
		password2Label.innerHTML  = "Re-type Password";
		
		password1.style.borderColor = "#e0e1e2";
		password2.style.borderColor = "#e0e1e2";
		
		SingUpButton.onclick = function(event){
		};
	}
}
if (password1) {
	password1.onblur =  check_password;
}
if (password2) {
	password2.onkeyup =  check_password;
}
//-=-=-=-=-=-=--=---=-= password end =-=-=-=-=-=-=--=-=-==-=-=\\