var uname 	= document.getElementById("uname");
var msg 			= document.getElementById("msg");
var button 	= document.getElementsByTagName('button')[0];

function submitChat() {
	if(uname.value == '' || msg.value == '') {
		alert("ALL FIELDS ARE MANDATORY!!!");
		return;
	}else {
		uname = uname.value;
		msg = msg.value;

		var xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function() {

			if(xmlhttp.status == 200) {
				//if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				//console.log(xmlhttp.responseText);
				console.log('yess');
				document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;

			}
		}

		xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg,true);
		xmlhttp.send('logs.php');
	}


}

button.addEventListener('click', submitChat, false);

function loadChat() {                                  //
	setInterval(function(){
		var textInput = document.getElementById('chatlogs');  // Get
		var xml = new XMLHttpRequest();

		xml.onreadystatechange = function() {

			if(xml.status == 200) {
				document.getElementById('chatlogs').innerHTML = xml.responseText;
			}
		}

		xml.open('GET','logs.php',true);
		xml.send(null);
	}, 2000);

}
window.addEventListener('load', loadChat() , false); // When page loaded call setup()
