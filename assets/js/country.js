/*
 * get JSON from selectCountryes.php , and insert in to HTML singup.php
 * select options to choise your country, when create new accountr
 */

	var select = document.getElementById('Countres');
	
	if (select) {
	var currier = new XMLHttpRequest();
	currier.onreadystatechange = function(){
		if (this.readyState === 4 && this.status === 200) {
			var data = JSON.parse(this.responseText);
			console.log(data);
			for (var int = 0; int < data.length; int++) {
				 var option = document.createElement("OPTION");
				 	option.setAttribute("value", data[int]['id']);
				 	option.setAttribute("class", "form-control");
				    var value = document.createTextNode(data[int]['name']);
				    option.appendChild(value);
				    select.appendChild(option);
			}
		}
	}
	currier.open('GET', 
			'http://localhost/Final-Team-Project/ajax/selectCountryes.php', 
			true);
	currier.send(null);
}

