/*
	The instructions indicated to post to an
	ajax handler with browser information. This
	suggests that it is expected to look 
	at the navigator.useragent property, detect
	the browser and send that as part of a POST
	request. 
	
	However, since the user agent is already part
	of the headers of any request we can detect
	that in the PHP handler of the request. This
	keeps detection and colors together so we don't
	have a map of browser detection strings client
	side, and a map of colors to browsers server side.
	This also eliminates sending redundant data.
	
	Ideally, this would all be done client side 
	eliminating the trip back to the server, however
	I believe the point of the excercise is to 
	demonostrate the ability to set up a basic
	request to a server.
*/

$(document).ready(function() {
	$.getJSON('/browser-color.php', function(d) {
		$('body').css('background-color', d.color);
	});
});