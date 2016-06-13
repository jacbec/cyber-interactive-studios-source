$(document).ready(function(){
	var t_m = $(".top_menu");
	var b_m = $(".bottom_menu");

	$(window).scroll(function() {
	  if($(this).scrollTop() > 275 ) {
		t_m.addClass('top_menu_sticky');
		b_m.addClass('bottom_menu_sticky');
	  } else {
		t_m.removeClass('top_menu_sticky');
		b_m.removeClass('bottom_menu_sticky');
	  }
	});
});