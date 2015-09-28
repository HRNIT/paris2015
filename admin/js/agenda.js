// JavaScript Document of the Agenda page


$(document).ready(function() {
   $("#StageListButton").click(function() {
        $("#StageList").toggleClass("Clicked"); // when the StageListButton is clicked, sets the left margin to 0. Show agenda.css -> #StageList.Clicked
		$("#ShowSessions").toggleClass("invisible");
		$("#CloseStageList").toggleClass("invisible");
    }); 
	$("#StageApplyButton").click(function() {
		$("#StageList").toggleClass("Clicked");
		$("#ShowSessions").toggleClass("invisible");
		$("#CloseStageList").toggleClass("invisible");
	});
	
	$("#MobileStageListButton").click(function() {
		$("#StageList").toggleClass("MobileClicked");
		$("#StageMobileBar").toggleClass("invisible");
	});
	$("#MobileCloseButton01").click(function() {
		$("#StageList").toggleClass("MobileClicked");
	});	
	
	$("#MobileNextButton").click(function() {
		$("#StageList2").toggleClass("MobileNextClicked");
	});
	$("#MobileBackButton").click(function() {
		$("#StageList2").toggleClass("MobileNextClicked");
	});
	
	$("#MobileCloseButton02").click(function() {
		$("#StageList").toggleClass("MobileClicked");
		$("#StageList2").toggleClass("MobileNextClicked");
	});	
	
});

/* Stage menu 640px++ only: if a stage is selected, it keeps the hover state */
$(document).ready(function() {
	if ( screen.width > 640 ) {
		$(".StageButton").click(function() {
			var category = $(this).data('agenda_category');
			$("#StageApplyButton").data('agenda_category', category);
			
			$(".StageButton").attr("class", "StageButton"); // resets the added background-color classes (see 2nd line below) on EVERY button
			$("#MobileNextButton").attr("class", "StageButton HiddenOnDesktopInlineBlock"); // give back the HiddenOnDesktopInlineBlock class to the Mobile Next Button ( > ) 
			$("#" + this.id).toggleClass(this.id + "BgColor"); // when a button is clicked, toggles the specific stage background color on the selected stage button
			$("#" + this.id).toggleClass("StageButtonClicked"); // when a button is clicked, toggles the hover effect (just a color change) on the selected stage button
			
		});
	}
});

/* Opening, Confirming, Closing Stage Panels */
$(document).ready(function() {
    /* Open specific Panel */
	$(".StageButton").click(function() {
		$("#" + this.id + "Panel").addClass("PanelClicked");
	});
	
	// Close ALL panel
	$(".PanelCloseButton").click(function() {
		$(".Panel").removeClass("PanelClicked");
	});
	
	// Confirm specific panel
	$(".PanelConfirmButton").click(function() {
		$(".Panel").removeClass("PanelClicked");
		$("#StageList").removeClass("MobileClicked");
		$("#StageList2").removeClass("MobileNextClicked");
	});
	
});

/* Tab panel navigation */
$(document).ready(function() {
	// Default: DAY 1 stream is visible
	$("#Day1Button").addClass("ClickedTabButton");
	$("#Day2Button").removeClass("ClickedTabButton");
	$("#MoreButton").removeClass("ClickedTabButton");
	
	$("#Day1Button").click(function() {
		$("#Day1Button").addClass("ClickedTabButton");
		$("#Day2Button").removeClass("ClickedTabButton");
		$("#MoreButton").removeClass("ClickedTabButton");
		
		$("#SessionsDayTwo").fadeOut('slow');
		$("#SessionsDayOne").fadeIn('slow');
		
	});
	$("#Day2Button").click(function() {
		$("#Day1Button").removeClass("ClickedTabButton");
		$("#Day2Button").addClass("ClickedTabButton");
		$("#MoreButton").removeClass("ClickedTabButton");
		
		$("#SessionsDayOne").fadeOut('slow');
		$("#SessionsDayTwo").fadeIn('slow');
		
	});
	$("#MoreButton").click(function() {
		$("#Day1Button").removeClass("ClickedTabButton");
		$("#Day2Button").removeClass("ClickedTabButton");
		$("#MoreButton").addClass("ClickedTabButton");
	});    
});


/* Don't open modals 700px and below */

$(window).load(function() {
	
	if ($(window).width() < 700) {
		$("#SessionInfoModal").attr("id", "TurnedOffSessionInfoModal");
	}
	

});


$(document).ready(function() {
/*
There's no need for this on the admin site

$('body').on('click', '.SessionDesktop', function(event) {		
	
	var agenda_id = $(this).data('agenda_id');
	var category = $(this).data('agenda_category');
	var day = $(this).data('agenda_day');
	
	//$('#SessionInfoModal').html('');

	
				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"agenda_session_modal", category:category, day:day,  agenda_id:agenda_id},
                success: function(data) {
					
                    $('#SessionInfoModal').html(data);
                    $( "#ModalBigContainer").fadeIn('fast');
					  
                   }
            });

	  

	  });
	  */

$('body').on('click', '#SessionInfoModalCloseButton', function(event) {		
       $(this).trigger('reveal:close');
 });	  
	  
	  
$('body').on('click', '.PrevNextSession', function(event) {	  

	
	var agenda_id = $(this).data('agenda_id');
	var category = $(this).data('agenda_category');
	var day = $(this).data('agenda_day');

  //add possible fadeOut effect

	
				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"agenda_session_modal", category:category, day:day,  agenda_id:agenda_id},
                success: function(data) {
					
					
					$( "#ModalBigContainer" ).fadeOut( "fast", function() {
                              $('#SessionInfoModal').html(data);
							   $( "#ModalBigContainer").fadeIn('fast');
							   
                        });
					
                    

					  
                   }
            });

	  

	  });	  
	

$('#StageApplyButton').bind('click', function (e) {
	
	var category = $(this).data('agenda_category');
	
	
		$('.TabPanelButton').each(function(index, element) {
         var clicked = $(this).hasClass('ClickedTabButton');
		 
		 if (clicked == true){
			var day = $(this).data('day');
		 }
		 
    });
	
	if (typeof day == "undefined"){
	   var day = 1;	
	}

				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
				dataType:"json",
                data: {action:"change_agenda_category_desktop", category:category, day:day},
                success: function(data) {
					
					  $( "#SessionsDayOne .AgendaSessionsContainerDesktop" ).fadeOut( "fast", function() {
                               $('#SessionsDayOne .AgendaSessionsContainerDesktop').html(data[0]);
							   $('#SessionsDayOne .AgendaSessionsContainerDesktop').fadeIn();
							   
                        });
					
                   
					$('#SessionsDayTwo .AgendaSessionsContainerDesktop').html(data[1]);
					
					$( "#SpeakersAndTestimonialsContainer" ).fadeOut( "fast", function() {
                               $('#SpeakersAndTestimonialsContainer').html(data[2]);
							   $('#SpeakersAndTestimonialsContainer').fadeIn();
							   
                        });
	
	
						$( "#SessionsDayOne .EventDayTitle" ).fadeOut( "fast", function() {
							   $(this).removeClass();
							   
							  $(this).addClass('EventDayTitle');
							  $(this).addClass(data[3]["color"]+'Color');
                              $(this).html(data[3]["category"]+' - Day 1'); 
							  $(this).fadeIn();
							   
                        });		
						
						
						$( "#SessionsDayTwo .EventDayTitle" ).fadeOut( "fast", function() {
							   $(this).removeClass();
							   
							  $(this).addClass('EventDayTitle');
							  $(this).addClass(data[3]["color"]+'Color');
                              $(this).html(data[3]["category"]+' - Day 2'); 
							  $(this).fadeIn();
							   
                        });		
					
					$( "#SelectedStageName" ).fadeOut( "fast", function() {
                              $(this).html(data[3]["category"]); 
							  $(this).fadeIn();
							   
                        });		
					
					
					$( "#StageDescription" ).fadeOut( "fast", function() {
						      $(this).removeClass();
                              $(this).addClass(data[3]["color"]+'BackgroundImage');
							  $(this).fadeIn();
							   
                        });	
				  
				  	
						$('#EditSponsorButton').data('day',day);	
						$('#EditSponsorButton').data('category',category);	
					

                   }
            });// ajax call end

	  

	  });



$('.PanelConfirmButton').bind('click', function (e) {
	
	var category = $(this).data('agenda_category');

				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
				dataType:"json",
                data: {action:"change_agenda_category_mobile", category:category},
                success: function(data) {
					
					  $( "#SessionsDayOne" ).fadeOut( "fast", function() {
                               $('#SessionsDayOne').html(data[0]);
							   $('#SessionsDayOne').fadeIn();
							   
                        });
					
                   
					$('#SessionsDayTwo').html(data[1]);
					
					$( "#SpeakersAndTestimonialsContainer" ).fadeOut( "fast", function() {
                               $('#SpeakersAndTestimonialsContainer').html(data[2]);
							   $('#SpeakersAndTestimonialsContainer').fadeIn();
							   
                        });
	
	
						$( "#SessionsDayOne .EventDayTitle" ).fadeOut( "fast", function() {
							   $(this).removeClass();
							   
							  $(this).addClass('EventDayTitle');
							  $(this).addClass(data[3]["color"]);
                              $(this).html(data[3]["category"]+' - Day 1'); 
							  $(this).fadeIn();
							   
                        });		
						
						
						$( "#SessionsDayTwo .EventDayTitle" ).fadeOut( "fast", function() {
							   $(this).removeClass();
							   
							  $(this).addClass('EventDayTitle');
							  $(this).addClass(data[3]["color"]);
                              $(this).html(data[3]["category"]+' - Day 2'); 
							  $(this).fadeIn();
							   
                        });		
					
					$( "#MobileStageName" ).fadeOut( "fast", function() {
						      $(this).removeClass();
                              $(this).html(data[3]["category"]); 
							  $(this).addClass(data[3]["color"]);
							  $(this).fadeIn();
							   
                        });		
					
					
						$('#EditSponsorButton').data('day','1');	
						$('#EditSponsorButton').data('category',category);				
					

                   }
            });// ajax call end

	  

	  });	
 
	 
	  
});