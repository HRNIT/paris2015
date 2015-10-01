var arrowtimer = {};

<!-- Modal/list switcher -->

$(document).ready(function() {
	
$('body').on('click', '.SponsorGridAnchor', function(event) {		
	
	var sponsor_id = $(this).data('sponsor_id');
	var sponsor_mode = 1;

	//$('#SessionInfoModal').html('');

	
				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"sponsor_modal", sponsor_id:sponsor_id, sponsor_mode:sponsor_mode},
                success: function(data) {
					/*
					  if ($(window).width() <= 640) {
                    		$('html, body').animate({scrollTop:0}, 'slow');
					   }
					*/
					
                    $('#SponsorsModal').html(data);
                    $( "#ModalBigContainer").fadeIn('fast');
					  
                   }
				   
				   
            });

	  

	  });
	  
	  
$('body').on('click', '.SponsorGridAnchorAlaCarte', function(event) {		
	
	var sponsor_id = $(this).data('sponsor_id');
	var sponsor_mode = 2;

	//$('#SessionInfoModal').html('');

	
				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"sponsor_modal", sponsor_id:sponsor_id, sponsor_mode:sponsor_mode},
                success: function(data) {
					/*
					  if ($(window).width() <= 640) {
                    		$('html, body').animate({scrollTop:0}, 'slow');
					   }
					*/
					
                    $('#SponsorsModal').html(data);
                    $( "#ModalBigContainer").fadeIn('fast');
					  
                   }
				   
				   
            });

	  

	  });	  
	
	
$('body').on('click', '#CloseSponsorModal', function(event) {		
       $(this).trigger('reveal:close');
 });	  
	  	
	   
 $('body').on('touchmove', '#SponsorsModal', function(event) {
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
 	  
	  
$('body').on('click', '.NavigationArrow', function(event) {
		  
     	if(typeof arrowtimer.modal != "unedfined"){
			clearTimeout(arrowtimer.modal);	
		}
	
	
	
	var sponsor_id = $(this).data('sponsor_id');
	var sponsor_mode = $(this).data('sponsormode');


  //add possible fadeOut effect

	
				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"sponsor_modal", sponsor_id:sponsor_id, sponsor_mode:sponsor_mode},
                success: function(data) {
					
					
					$( "#ModalBigContainer" ).fadeOut( "fast", function() {
                              $('#SponsorsModal').html(data);
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
	var myElement = document.getElementById('SponsorsModal');
	
	var hammertime = new Hammer(myElement);
	

	
	//SWIPE RIGHT
    hammertime.on('swiperight', function(ev) {
		
		var sponsor_id = $('#MobileArrowPrev').data('sponsor_id');
		var sponsor_mode = $('#MobileArrowPrev').data('sponsormode');

		if (typeof sponsor_id != "undefined"){
      				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"sponsor_modal", sponsor_id:sponsor_id, sponsor_mode:sponsor_mode},
                success: function(data) {
					
					
					$( "#ModalBigContainer" ).fadeOut( "fast", function() {
                              $('#SponsorsModal').html(data);
							   $( "#ModalBigContainer").fadeIn('fast');
							   
                        });
					
                    

					  
                   }
            });
			
		}
			
     });
	 
	 //SWIPE LEFT
    hammertime.on('swipeleft', function(ev) {
		
		var sponsor_id = $('#MobileArrowNext').data('sponsor_id');
		var sponsor_mode = $('#MobileArrowNext').data('sponsormode');

		
			if (typeof sponsor_id != "undefined"){
				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"sponsor_modal", sponsor_id:sponsor_id, sponsor_mode:sponsor_mode},
                success: function(data) {
					
					
					$( "#ModalBigContainer" ).fadeOut( "fast", function() {
                              $('#SponsorsModal').html(data);
							   $( "#ModalBigContainer").fadeIn('fast');
							   
                        });
					
                    

					  
                   }
            });
		}
	  
     });	
 });	
 
 function ExternalModal(sponsor_tag) {
	
   var size = 1;
	
	if ($(window).width() <= 640) {	
	  size = 2;  
	}
	
	$('.SponsorGridAnchor').each(function(index, element) {
        var temp_tag = $(this).data('sponsornametag');
	   
		
		if (temp_tag == sponsor_tag){
		   var sponsor_id = $(this).data('sponsor_id');
		   var sponsor_mode = $(this).data('sponsor_reveal_mode');
		   
				jQuery("#SponsorsModal").reveal();
	  
						$.ajax({
					  url: 'controllers/ajax.php',
					  type: 'POST',
					  data: {action:"sponsor_modal", sponsor_id:sponsor_id, sponsor_mode:sponsor_mode},
					  success: function(data) {
						  
	  
						  $('#SponsorsModal').html(data);
						  $( "#ModalBigContainer").fadeIn('fast');
							
						 }
						 
						 
				  }); 
				 
				 
		   
		}
		
    });
	
	
			
}