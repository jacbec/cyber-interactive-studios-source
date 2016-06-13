jQuery(function( $ ){

	var cyber = $("#first_body");
	// Bind the link to toggle the slide.
	$("#first_button").click(
		function(event){
			// Prevent the default event.
			event.preventDefault();
			// Toggle the slide based on its current
			// visibility.
			if (cyber.is(":visible")){
				// Hide - slide up.
				document.getElementById('first_button').innerHTML=("<img src=\"http://style.cyberinteractivestudios.comm/img/down.png\" width=\"15\" height=\"15\">");
				cyber.slideUp(2000);
			} else {
				// Show - slide down.
				document.getElementById('first_button').innerHTML=("<img src=\"http://style.cyberinteractivestudios.comm/img/up.png\" width=\"15\" height=\"15\">");
				cyber.slideDown("slow");
			}
		}
	);
	
	var troubleshooting = $("#second_body");
	// Bind the link to toggle the slide.
	$("#second_button").click(
		function(event){
			// Prevent the default event.
			event.preventDefault();
			// Toggle the slide based on its current
			// visibility.
			if (troubleshooting.is(":visible")){
				// Hide - slide up.
				document.getElementById('second_button').innerHTML=("<img src=\"http://style.cyberinteractivestudios.comm/img/down.png\" width=\"15\" height=\"15\">");
				troubleshooting.slideUp(2000);
			} else {
				// Show - slide down.
				document.getElementById('second_button').innerHTML=("<img src=\"http://style.cyberinteractivestudios.comm/img/up.png\" width=\"15\" height=\"15\">");
				troubleshooting.slideDown("slow");
			}
		}
	);
	
	var general = $("#third_body");
	// Bind the link to toggle the slide.
	$("#third_button").click(
		function(event){
			// Prevent the default event.
			event.preventDefault();
			// Toggle the slide based on its current
			// visibility.
			if (general.is(":visible")){
				// Hide - slide up.
				document.getElementById('third_button').innerHTML=("<img src=\"http://style.cyberinteractivestudios.comm/img/down.png\" width=\"15\" height=\"15\">");
				general.slideUp(2000);
			} else {
				// Show - slide down.
				document.getElementById('third_button').innerHTML=("<img src=\"http://style.cyberinteractivestudios.comm/img/up.png\" width=\"15\" height=\"15\">");
				general.slideDown("slow");
			}
		}
	);
}); 