<!-- Modal/list switcher -->

$(document).ready(function() {
	var sSize = $( window ).width();
     if (sSize <= 640) { 
	   $('#SpeakerListSection').fadeOut('fast');
		$('.Speaker a').each(function() {

			   var CurrentTag = $(this).data('speakertag'); 
			   $(this).attr('data-reveal-id',CurrentTag+'Modal');


		   });

      
	} else {
	 	
		$('#SpeakersModalContainer').css('display','none');
	}

});



