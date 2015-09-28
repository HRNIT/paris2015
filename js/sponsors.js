<!-- Modal/list switcher -->

$(document).ready(function() {
	var sSize = $( window ).width();
     if (sSize <= 640) { 
	 
	   $('#SponsorLists').fadeOut('fast');
		$('.SponsorGridAnchor').each(function() {

			   var CurrentTag = $(this).data('sponsornametag');
			   $(this).attr('href','#'); 
			   $(this).attr('data-reveal-id',CurrentTag+'Modal');
               

		   });

      
	} else {
		$('#SponsorModalContainer').css('display','none');
	
	}

});



