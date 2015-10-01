var arrowtimer = {};

$(document).ready(function() {
	
	
$('body').on('click', '.SpeakerModalTrigger', function(event) {		
	
	var speaker_tag = $(this).data('speakertag');
	
	var size = 1;
	
	if ($(window).width() <= 640) {	
	  size = 2;  
	}
	
	//$('#SessionInfoModal').html('');

	
				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"speaker_modal", speaker_tag:speaker_tag, size:size},
                success: function(data) {
					/*
					  if ($(window).width() <= 640) {
                    		$('html, body').animate({scrollTop:0}, 'slow');
					   }
					*/
					
                    $('#SpeakerModal').html(data);
                    $( "#ModalBigContainer").fadeIn('fast');
					  
                   }
				   
				   
            });

	  

	  });
	
	
$('body').on('click', '#CloseSpeakerModal', function(event) {		
       $(this).trigger('reveal:close');
 });	  
	  	  
/*	   
 $('body').on('touchmove', '#SpeakerModal', function(event) {
 if ($(window).width() <= 640) {	
 
     	if(typeof arrowtimer.modal != "unedfined"){
			clearTimeout(arrowtimer.modal);
		} 
		
		var dsp = $('#MobileArrowsContainer').css('display');
		 	if (dsp === "none"){	
		         $('#MobileArrowsContainer').fadeIn(400);	
			}
 
	   
	  arrowtimer.modal= setTimeout(function () {
		  $('#MobileArrowsContainer').fadeOut(400);
		 
       } , 5000); //set timeout function end
	   
 }
	   
 });
 	*/  
	  
$('body').on('click', '.NavigationArrow', function(event) {
		  
     	if(typeof arrowtimer.modal != "unedfined"){
			clearTimeout(arrowtimer.modal);	
		}
	
	
	
	var speaker_id = $(this).data('speaker_id');

	var size = 1;
	
	if ($(window).width() <= 640) {	
	  size = 2;  
	}

  //add possible fadeOut effect

	
				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"speaker_modal_next", speaker_id:speaker_id, size:size},
                success: function(data) {
					
					
					$( "#ModalBigContainer" ).fadeOut( "fast", function() {
                              $('#SpeakerModal').html(data);
							   $( "#ModalBigContainer").fadeIn('fast');
							   
                        });
					   if ($(window).width() <= 700) {
                    		$('html, body').animate({scrollTop:0}, 'slow');
					   }
					  
                   }
            });

	  

	  });	
	
});  

$(function(){
	var myElement = document.getElementById('SpeakerModal');
	
	var hammertime = new Hammer(myElement);
	
	var size = 1;
	
	if ($(window).width() <= 640) {	
	  size = 2;  
	}	
	
	//SWIPE RIGHT
    hammertime.on('swiperight', function(ev) {
		
		var speaker_id = $('#MobileArrowPrev').data('speaker_id');
		
		if (typeof speaker_id != "undefined"){
      				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"speaker_modal_next", speaker_id:speaker_id, size:size},
                success: function(data) {
					
					
					$( "#ModalBigContainer" ).fadeOut( "fast", function() {
                              $('#SpeakerModal').html(data);
							   $( "#ModalBigContainer").fadeIn('fast');
							   
                        });
					
                    

					  
                   }
            });
			
		}
			
     });
	 
	 //SWIPE LEFT
    hammertime.on('swipeleft', function(ev) {
		
		var speaker_id = $('#MobileArrowNext').data('speaker_id');
		
			if (typeof speaker_id != "undefined"){
				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"speaker_modal_next", speaker_id:speaker_id, size:size},
                success: function(data) {
					
					
					$( "#ModalBigContainer" ).fadeOut( "fast", function() {
                              $('#SpeakerModal').html(data);
							   $( "#ModalBigContainer").fadeIn('fast');
							   
                        });
					
                    

					  
                   }
            });
		}
	  
     });	
 });	
 
function ExternalModal(speaker_tag) {

   var size = 1;
	
	if ($(window).width() <= 640) {	
	  size = 2;  
	}
	
	jQuery("#SpeakerModal").reveal();

				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"speaker_modal", speaker_tag:speaker_tag, size:size},
                success: function(data) {
					/*
					  if ($(window).width() <= 640) {
                    		$('html, body').animate({scrollTop:0}, 'slow');
					   }
					*/
					
                    $('#SpeakerModal').html(data);
                    $( "#ModalBigContainer").fadeIn('fast');
					  
                   }
				   
				   
            });
			
}