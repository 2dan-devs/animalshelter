"use strict";

$(document).ready(function(){

	$('.top-bar-menu-item').hover(function(){
	    $(this).toggleClass('active')
	})

	// Remove session mesasge alert box.
	$(document).on('click', '#session-message-alert', function() {
    	$(this).parent().remove()
	})
})