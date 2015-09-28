// Horizontal menu float in from the top
/*
function menuLoad() {
	// Floats in the main menu from the top 
	if ( (screen.width > 1000)  ) { 
		$("#SecondStateMainMenuContainer").css("margin-top", "0");
		$("#AboutHRTechiRecruit").css("margin-top", "4.1666666vw");
		// Floats in the menuitems from top after the menu float-in animation is finished
		setTimeout( function() {
				$("#MenuContainer a:nth-child(2)").css('top','1vw');}, 500);
		setTimeout( function() {
				$("#MenuContainer a:nth-child(3)").css('top','1vw');}, 800);
		setTimeout( function() {
				$("#MenuContainer a:nth-child(4)").css('top','1vw');}, 1100);
		setTimeout( function() {
				$("#MenuContainer a:nth-child(5)").css('top','1vw');}, 1400);
		setTimeout( function() {
				$("#MenuContainer a:nth-child(6)").css('top','1vw');}, 1700);
		setTimeout( function() {
				$("#MenuContainer a:nth-child(7)").css('top','1vw');}, 2000);
	}
}
*/
// Play video button

$(function(){
	var myElement = document.getElementById('AboutHRTechiRecruit');
	
	var hammertime = new Hammer(myElement);
    hammertime.on('swiperight', function(ev) {
      swipeHandler('right');
     });
    hammertime.on('swipeleft', function(ev) {
      swipeHandler('left');
     });	


 
  // Callback function references the event target and adds the 'swipe' class to it
  function swipeHandler(direction){
	
	if (direction == 'right'){
		 var current = $('#SliderArrowRight').data('current');
         var nextslide = $('#SliderArrowRight').data('next');	
	} else {
		  var current = $('#SliderArrowLeft').data('current');
          var nextslide = $('#SliderArrowLeft').data('next');
		
	}

		
			if (nextslide == 1) {
				   if (current == 3){ 				
						$('#AboutHRTechFadingContentThree').fadeOut('slow', function(){
						$('#AboutHRTechFadingContentOne').fadeIn('slow');
						$('#AboutHRTechiRecruit').css('background-image', 'none');
						$('#FadeThree').removeClass('ActiveFadingControll');
						$('#FadeOne').addClass('ActiveFadingControll');
					   });
						 
				   }
				   
				   if (current == 2){ 				   
						  $('#AboutHRTechFadingContentTwo').fadeOut('slow', function(){
						  $('#AboutHRTechFadingContentOne').fadeIn('slow');
						  $('#AboutHRTechiRecruit').css('background-image', 'none');
						  $('#FadeTwo').removeClass('ActiveFadingControll');
						  $('#FadeOne').addClass('ActiveFadingControll');
					  });
				   }
				   
				
                $('#SliderArrowLeft').data('current','1');
				$('#SliderArrowRight').data('current','1');
				
				$('#SliderArrowLeft').data('next','3');
				$('#SliderArrowRight').data('next','2');
				
			} 
			
			if (nextslide == 2) {
				   if (current == 1){ 
			
						  $('#AboutHRTechFadingContentOne').fadeOut('slow', function(){
						  $('#AboutHRTechFadingContentTwo').fadeIn('slow');
						  $('#AboutHRTechiRecruit').css('background-image', 'url(img/mainpage/abouthrtechirecruitexpo/irecruit.jpg)');
						  $('#FadeOne').removeClass('ActiveFadingControll');
						  $('#FadeTwo').addClass('ActiveFadingControll');
						 });
			   
				   }
					
					
					 if (current == 3){ 	   
						 
							$('#AboutHRTechFadingContentThree').fadeOut('slow', function(){
							$('#AboutHRTechFadingContentTwo').fadeIn('slow');
							$('#AboutHRTechiRecruit').css('background-image', 'url(img/mainpage/abouthrtechirecruitexpo/irecruit.jpg)');
							$('#FadeThree').removeClass('ActiveFadingControll');
							$('#FadeTwo').addClass('ActiveFadingControll');
						   });
						
					 }
				 
			    $('#SliderArrowLeft').data('current','2');
				$('#SliderArrowRight').data('current','2');
				
				$('#SliderArrowLeft').data('next','1');
				$('#SliderArrowRight').data('next','3');
					 			
			} 
			
			
			if (nextslide == 3) {
				   if (current == 1){ 
			
						$('#AboutHRTechFadingContentOne').fadeOut('slow', function(){
							$('#AboutHRTechFadingContentThree').fadeIn('slow');
							$('#AboutHRTechiRecruit').css('background-image', 'url(img/mainpage/abouthrtechirecruitexpo/disruptHR.jpg)');
							$('#FadeOne').removeClass('ActiveFadingControll');
							$('#FadeThree').addClass('ActiveFadingControll');
						});
			   
				   }
					
					
					 if (current == 2){ 	   
						 
						  $('#AboutHRTechFadingContentTwo').fadeOut('slow', function(){
						  $('#AboutHRTechFadingContentThree').fadeIn('slow');
						  $('#AboutHRTechiRecruit').css('background-image', 'url(img/mainpage/abouthrtechirecruitexpo/disruptHR.jpg)');
						  $('#FadeTwo').removeClass('ActiveFadingControll');
						  $('#FadeThree').addClass('ActiveFadingControll');
						 });
						
					 }
					 
				 
				$('#SliderArrowLeft').data('current','3');
				$('#SliderArrowRight').data('current','3');
				
				$('#SliderArrowLeft').data('next','2');
				$('#SliderArrowRight').data('next','1');
					 
				
			} 
			
  }
  
 
});
/*
$(document).ready(function() {
	
	$('#VideoButton').bind('click', function (e) {
		e.preventDefault();
		 $('#FeaturedContentSection').fadeOut();
		 $('#VideoSection').fadeIn('slow');
		 $("html, body").animate({ scrollTop: $('#VideoSection').offset().top }, 1000);
		 
		    var slide = $('#FadeTwo').attr('class');
			
			if (typeof slide !="undefined" && slide == "ActiveFadingControll") {
				 var myVideo = document.getElementById("HRNVideo");
				  $('#HRNVideoTwo').css('display','none');
				  $('#HRNVideo').css('display','block');
			} else {
				 var myVideo = document.getElementById("HRNVideoTwo"); 
				 $('#HRNVideo').css('display','none');
				 $('#HRNVideoTwo').css('display','block');
			}
		   
		// var myVideo = document.getElementById("HRNVideo"); 
		 
          myVideo.load();
		  myVideo.play(); 
	  })

	$('#HRNVideoPause').bind('click', function (e) {
		
				e.preventDefault();
		 
		 $('#VideoSection').fadeOut();
		 $('#FeaturedContentSection').fadeIn('slow');
		 
		 	 var slide = $('#FadeTwo').attr('class');
			
			if (typeof slide !="undefined" && slide == "ActiveFadingControll") {
				 var myVideo = document.getElementById("HRNVideo"); 
			} else {
				 var myVideo = document.getElementById("HRNVideoTwo"); 
			}
		
	//var myVideo = document.getElementById("HRNVideo"); 
		 

           myVideo.pause(); 
 
	   
	 })
	 	
		
});

*/
$(document).ready(function() {
	
	$('.SliderNavigationArrow').bind('click', function (e) {
		
		var  nextslide = $(this).data('next');
		var current = $(this).data('current');
		
			if (nextslide == 1) {
				   if (current == 3){ 				
						$('#AboutHRTechFadingContentThree').fadeOut('slow', function(){
						$('#AboutHRTechFadingContentOne').fadeIn('slow');
						$('#AboutHRTechiRecruit').css('background-image', 'url(img/mainpage/abouthrtechirecruitexpo/hrtechworld.jpg)');
						$('#FadeThree').removeClass('ActiveFadingControll');
						$('#FadeOne').addClass('ActiveFadingControll');
					   });
						 
				   }
				   
				   if (current == 2){ 				   
						  $('#AboutHRTechFadingContentTwo').fadeOut('slow', function(){
						  $('#AboutHRTechFadingContentOne').fadeIn('slow');
						  $('#AboutHRTechiRecruit').css('background-image', 'url(img/mainpage/abouthrtechirecruitexpo/hrtechworld.jpg)');
						  $('#FadeTwo').removeClass('ActiveFadingControll');
						  $('#FadeOne').addClass('ActiveFadingControll');
					  });
				   }
                $('#SliderArrowLeft').data('current','1');
				$('#SliderArrowRight').data('current','1');
				
				$('#SliderArrowLeft').data('next','3');
				$('#SliderArrowRight').data('next','2');
				
			} 
			
			if (nextslide == 2) {
				   if (current == 1){ 
			
						  $('#AboutHRTechFadingContentOne').fadeOut('slow', function(){
						  $('#AboutHRTechFadingContentTwo').fadeIn('slow');
						  $('#AboutHRTechiRecruit').css('background-image', 'url(img/mainpage/abouthrtechirecruitexpo/irecruit.jpg)');
						  $('#FadeOne').removeClass('ActiveFadingControll');
						  $('#FadeTwo').addClass('ActiveFadingControll');
						 });
			   
				   }
					
					
					 if (current == 3){ 	   
						 
							$('#AboutHRTechFadingContentThree').fadeOut('slow', function(){
							$('#AboutHRTechFadingContentTwo').fadeIn('slow');
							$('#AboutHRTechiRecruit').css('background-image', 'url(img/mainpage/abouthrtechirecruitexpo/irecruit.jpg)');
							$('#FadeThree').removeClass('ActiveFadingControll');
							$('#FadeTwo').addClass('ActiveFadingControll');
						   });
						
					 }
					 
			    $('#SliderArrowLeft').data('current','2');
				$('#SliderArrowRight').data('current','2');
				
				$('#SliderArrowLeft').data('next','1');
				$('#SliderArrowRight').data('next','3');
					 			
			} 
			
			
			if (nextslide == 3) {
				   if (current == 1){ 
			
						$('#AboutHRTechFadingContentOne').fadeOut('slow', function(){
							$('#AboutHRTechFadingContentThree').fadeIn('slow');
							$('#AboutHRTechiRecruit').css('background-image', 'url(img/mainpage/abouthrtechirecruitexpo/disruptHR.jpg)');
							$('#FadeOne').removeClass('ActiveFadingControll');
							$('#FadeThree').addClass('ActiveFadingControll');
						});
			   
				   }
					
					
					 if (current == 2){ 	   
						 
						  $('#AboutHRTechFadingContentTwo').fadeOut('slow', function(){
						  $('#AboutHRTechFadingContentThree').fadeIn('slow');
						  $('#AboutHRTechiRecruit').css('background-image', 'url(img/mainpage/abouthrtechirecruitexpo/disruptHR.jpg)');
						  $('#FadeTwo').removeClass('ActiveFadingControll');
						  $('#FadeThree').addClass('ActiveFadingControll');
						 });
						
					 }
				$('#SliderArrowLeft').data('current','3');
				$('#SliderArrowRight').data('current','3');
				
				$('#SliderArrowLeft').data('next','2');
				$('#SliderArrowRight').data('next','1');
					 
				
			} 
			
			
 
	   
	 })
	
	

	 	
		
});




function ShowMobileMenu () {
	/*$("#MobileUl").addClass("active");*/
	$(".sidebar").fadeIn(100);
	$("#MobileUl").addClass("active");
	$("#MobileNav").addClass("active");
	$(".nav-social").fadeIn(100);
	
}

function HideMobileMenu () {

	$("#MobileNav").fadeOut(500);
	
	  setTimeout(function () {
		 $("#MobileNav").removeClass("active");
		$(".nav-social").fadeOut(100);
		$("#MobileUl").removeClass("active");
	    $(".sidebar").fadeOut(100);


	 }, 800); //will call the function after 4 secs. 
}
