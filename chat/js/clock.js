$(document).ready(function (){
	window.setInterval(
		function () {
	var datetime = new Date();
	//document.getElementsById('clock').innerHTML = datetime.toLocaleTimeString();
	$('#clock').html(datetime.toLocaleTimeString());
	})
})
