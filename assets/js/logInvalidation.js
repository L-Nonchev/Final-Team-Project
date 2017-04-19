//-=-=-=-=-=-=--=---=-= Varibals =-=-=-=-=-=-=--=-=-==-=-=\\
var email = document.getElementById('InputEmail-LogIN');
var logInButton = document.getElementById('log-in-button');
var	password  = document.getElementById('InputPassword');
var passwordLabel = document.getElementById('passwordLabel');


//-=-=-=-=-=-=--=---=-= Chech for exist email =-=-=-=-=-=-=--=-=-==-=-=\\
if (email) {
	email.onblur = function() {
		var currier = new XMLHttpRequest();
		currier.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 200) {
				
				var incomeData = JSON.parse(this.responseText);
				
				// exist email
				if(!incomeData['email'] ){
					email.style.borderColor = "red";
					emailLabel.style.color = "red";
					emailLabel.innerHTML  = "The email is not found. Please enter a valid email.";
					
					logInButton.onclick = function(event){
					    event.preventDefault()
					};
					
				// wrong username	
				} else if (incomeData['exception'] && incomeData['errorMesageEmail'] !== "Empty e-mail") {
					email.style.borderColor = "red";
					emailLabel.style.color = "red";
					emailLabel.innerHTML  = incomeData['errorMesageEmail'];
		
					logInButton.onclick = function(event){
					    event.preventDefault()
					};
				// all is corect	
				} else {
					email.style.borderColor = "#e0e1e2";
					emailLabel.innerHTML  = "Email";
					emailLabel.style.color = "black";
					
					logInButton.onclick = function(event){
					    
					};
				}
				
			}
		}
		var dataSend = 'data=' + JSON.stringify({
			email : email.value
		});
		currier.open('POST', 
				'http://localhost/Final-Team-Project/ajax/logInValidation.php', 
				true);
		currier.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		currier.send(dataSend);
	}
}

//-=-=-=-=-=-=--=---=-= Chech for exist email END=-=-=-=-=-=-=--=-=-==-=-=\\

//-=-=-=-=-=-=--=---=-= Chech for password corect=-=-=-=-=-=-=--=-=-==-=-=\\

//chek for same passord 1 and 2 
function check_password() {
	if (((password.value.length) > 0 )){

		if ((password.value.length) < 8){
			passwordLabel.innerHTML  = "You must enter at last 8 characters for your password!";
			
			password.style.borderColor = "red";
			
			logInButton.onclick = function(event){
				 event.preventDefault()
			};
	
		}else {
			passwordLabel.innerHTML  = "Password";
			
			password.style.borderColor = "#e0e1e2";
			
			logInButton.onclick = function(event){
			};
		}	

	} else {
		passwordLabel.innerHTML  = "Password";
		
		password.style.borderColor = "#e0e1e2";
		
		logInButton.onclick = function(event){
		};
	}
}
if (password) {
	password.onblur =  check_password;
}

//-=-=-=-=-=-=--=---=-= password end =-=-=-=-=-=-=--=-=-==-=-=\\

