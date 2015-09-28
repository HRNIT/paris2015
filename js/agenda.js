// JavaScript Document of the Agenda page

var ColorPalette = {};
ColorPalette.color = '#3E80B3';
ColorPalette.defaultcolor = '#3E80B3';
ColorPalette.colorArray= '';
ColorPalette.active = 1;

$(document).ready(function() {

var url = window.location.href;

var parts = url.split('#');
 if (typeof parts[1] != "undefined" && parts[1] != '' ){
	  
	  					  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
				dataType:"json",
                data: {action:"url_decoder", url_data:parts[1]},
                success: function(data) {	
				
/*************************************************************/				
	
if(data[0] == 'stage'){
	change_stage(data[1]);
}
				
if(data[0] == 'session'){
		
				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"agenda_session_modal", category:data[1]['category'], day:data[1]['day'],  agenda_id:data[1]['agenda_id']},
                success: function(data) {
					
                    $('#SessionInfoModal').html(data);
                    $( "#ModalBigContainer").fadeIn('fast');
					  
                   }
            });
			
			$("#SessionInfoModal").reveal();
			
	
	
}
	
					
				
//Change stage end	


/******************************************************/		
				}
            });// ajax call end
	  
  }

});

/* Tab Panel Buttons Sticky or not Sticky scroll script */
$(document).scroll(function() {
  var y = $(this).scrollTop();
  
  if (screen.width >= 2500) {
	  if (y > 850) {
		  $("#TabPanelNavigationContainer").css("position", "fixed");
		  $("#TabPanelNavigationContainer").css("top", "4.0625vw");
	  } else {
		  $("#TabPanelNavigationContainer").css("position", "static");
	  }
  } else if (screen.width >= 1920) {
	  if (y > 500) {
		  $("#TabPanelNavigationContainer").css("position", "fixed");
		  $("#TabPanelNavigationContainer").css("top", "4.0625vw");
	  } else {
		  $("#TabPanelNavigationContainer").css("position", "static");
	  }
  } else if (screen.width >= 1366) {
	 if (y > 350) {
		  $("#TabPanelNavigationContainer").css("position", "fixed");
		  $("#TabPanelNavigationContainer").css("top", "4.0625vw");
	  } else {
		  $("#TabPanelNavigationContainer").css("position", "static");
	  }  
  } else if (screen.width >= 1000) {
	 if (y > 280) {
		  $("#TabPanelNavigationContainer").css("position", "fixed");
		  $("#TabPanelNavigationContainer").css("top", "4.0625vw");
	  } else {
		  $("#TabPanelNavigationContainer").css("position", "static");
	  }  
  } else if (screen.width > 640) {
	 if (y > 200) {
		  $("#TabPanelNavigationContainer").css("position", "fixed");
		  $("#TabPanelNavigationContainer").css("top", "50px");
	  } else {
		  $("#TabPanelNavigationContainer").css("position", "static");
	  }  
  }
});


$(document).ready(function() {
	
	$('body').on('click', '#StageMenuListTitle .icon-close-icon, .BreakOutTextClass', function(event) {

			 $("#FloatingDesktopMenu").toggleClass("OpenedFloatingMenu");
		$("#StageList").toggleClass("MobileClicked");
		$("#StageMobileBar").toggleClass("invisible");
		
	});
});



$(document).ready(function() {
			 $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
				dataType:"json",
                data: {action:"get_colors"},
                success: function(data) {
					
                ColorPalette.colorArray = data;
                   }
            });
	
	
	});

$(document).ready(function() {
   	$("#StageListButton").click(function() {
        $("#StageList").toggleClass("Clicked"); // when the StageListButton is clicked, sets the left margin to 0. Show agenda.css -> #StageList.Clicked
		$("#StageListButton").toggleClass("StageListButtonClicked");
		$("#ShowSessions").toggleClass("invisible");
		$("#CloseStageList").toggleClass("invisible");
    }); 
	
	$("#BreakoutsButton").click(function() {
		if ($(window).width() > 640) {
			
			$("#FloatingDesktopMenu").toggleClass("OpenedFloatingMenu");
			
			/*var visible = $('#SessionCategoriesDesktop').css('display');
			  if(visible == 'none'){
				  $('#SessionCategoriesDesktop').fadeIn();
				  $('#AgendaStageTitle').fadeOut('slow');	
				  $('.AgendaDateClass').fadeOut('slow');	
				  $('.SessionsList').fadeOut('slow');	
			  } else {
				 $('#SessionCategoriesDesktop').fadeOut();
				  $('#AgendaStageTitle').fadeIn('slow');
				 $('.AgendaDateClass').fadeIn('slow');	
					  $('#SessionsDayOneMobile').fadeIn('slow');	
					  $('#SessionsDayTwoMobile').fadeIn('slow');	  
			  }*/
			  
		} else {
		  $("#StageList").toggleClass("MobileClicked");
		  $("#StageMobileBar").toggleClass("invisible");
			
		}
		
	
    });
	

$("#CloseCategoryPanel").click(function() {
				 $('#AgendaStageTitle').fadeIn('slow');
				 $('.AgendaDateClass').fadeIn('slow');		  

					  $('#SessionsDayOneMobile').fadeIn('slow');	
					  $('#SessionsDayTwoMobile').fadeIn('slow');	  

				  	
	
		});


	$("#MobileStageListButton").click(function() {
		$("#StageList").toggleClass("MobileClicked");
		$("#StageMobileBar").toggleClass("invisible");
	});
	
});

/* Stage menu 640px++ only: if a stage is selected, it keeps the hover state */
$(document).ready(function() {
	if ( screen.width > 640 ) {
		$(".StageButton").click(function() {
			var category = $(this).data('agenda_category');
			$("#StageApplyButton").data('agenda_category', category);
			
			$(".StageButton").attr("class", "StageButton"); // resets the added background-color classes (see 2nd line below) on EVERY button
			$("#" + this.id).toggleClass(this.id + "BgColor"); // when a button is clicked, toggles the specific stage background color on the selected stage button
			$("#" + this.id).toggleClass("StageButtonClicked"); // when a button is clicked, toggles the hover effect (just a color change) on the selected stage button
			
			$("#StageListButton").toggleClass("StageListButtonClicked");
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
		/*$('html, body').animate({
			scrollTop: $("#StageDescriptionAnchor").offset().top
		}, 1000);*/
	});
	
});


/* Tab panel navigation */
$(document).ready(function() {

	$("#iRecruitButton").removeClass("ClickedTabButton");
	$("#disruptHRButton").removeClass("ClickedTabButton");
	$("#BreakoutsButton").removeClass("ClickedTabButton");
	

	
	$("#iRecruitButton").click(function() {

		$("#iRecruitButton").addClass("ClickedTabButton");
		$("#disruptHRButton").removeClass("ClickedTabButton");
		$("#BreakoutsButton").removeClass("ClickedTabButton");
		
		$("#SessionsDayOneMobile").fadeOut('slow');
		$("#SessionsDayTwoMobile").fadeOut('slow');
		$("#iRecruitTabPanelContent").fadeIn('slow');
		$("#disruptHRTabPanelContent").fadeOut('slow');		
		
	});	
	
	$("#disruptHRButton").click(function() {

		$("#iRecruitButton").removeClass("ClickedTabButton");
		$("#disruptHRButton").addClass("ClickedTabButton");
		$("#BreakoutsButton").removeClass("ClickedTabButton");
			
		$("#SessionsDayOneMobile").fadeOut('slow');
		$("#SessionsDayTwoMobile").fadeOut('slow');
		$("#iRecruitTabPanelContent").fadeOut('slow');
		$("#disruptHRTabPanelContent").fadeIn('slow');		
		
	});	
	
   
});


/* Don't open modals 700px and below */

$(window).load(function() {
	
	if ($(window).width() < 700) {
		$("#SessionInfoModal").attr("id", "TurnedOffSessionInfoModal");
	}
	

});


$(document).ready(function() {

$('body').on('click', '.SessionDesktop, .Session', function(event) {		
	
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
	  
	     

/**********************************************************
Desktop Stage Changer
************************************************************/	
$('body').on('click', '.StageMenuItem, #MainStageBreakoutButton, #iRecruitBreakoutButton, #disruptHRBreakoutButton, .PanelConfirmButton', function(e) {	  

				
	
	   var day = 1;	

	
	var category = $(this).data('agenda_category');
	ColorPalette.active = category;
 
    if (typeof category != "undefined" && category != '' && category != 'close'){

		//Fade out the break-out panel
		$('#SessionCategoriesDesktop').fadeOut(); 
		
					  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
				dataType:"json",
                data: {action:"change_agenda_category_mobile_v6", category:category},
                success: function(data) {	
		
		//Active colored state for category selector buttons
               
			   if (typeof data[0] == "undefined" || data[0] == "Nope"){
				                $('#AgendaDayOne').css('display','none');
								$('#SessionsDayOneMobile').css('display','none');
			   } else {
				   			  $('#AgendaDayOne').fadeOut(700, function(){
								  
							  });
							  
							   	$('#AgendaDayOne').fadeIn(1200);	
				   
				   
			   }
			   
			   if (typeof data[1] == "undefined" || data[1] == "Nope"){
				                $('#AgendaDayTwo').css('display','none');
								$('#SessionsDayTwoMobile').css('display','none');
			   } else {
				   			  $('#AgendaDayTwo').fadeOut(700, function(){
								  
							  });
							  
							   	$('#AgendaDayTwo').fadeIn(1200);	
				   
				   
			   }			   
			   
			   

						 	 
			   
			   $('.StageMenuItem').each(function(index, element) {
                    var hovered = $(this).data('agenda_category');
					if (hovered != ColorPalette.active ){
			          $(this).css("background-color","#101010");
		            }
					
               });
			   
			   	 $('.TabPanelButton').each(function(index, element) {
                    var hovered = $(this).data('agenda_category');
					if (hovered != ColorPalette.active ){
			          $(this).css("background-color","#101010");
		            }
					
               });
			   

             //close floating selector (or not? O.o)
			//$("#FloatingDesktopMenu").removeClass("OpenedFloatingMenu");
			 
			

						
					$( "#SelectedStageText" ).fadeOut( "slow", function() {
                              $(this).html(data[4]); 
							  $(this).fadeIn(1200);
							   
                        });					   
			

                               		//for product demo
													  

                      ColorPalette.color = data[3]["main_color"];

                       if (ColorPalette.color != ColorPalette.defaultcolor){
                           $('#BreakoutsButton').css("background-color",ColorPalette.color);
                         }
 
						   $('#AgendaStageTitle').fadeOut(700, function(){
							     if (data[3]["room"] !== '') {
									$( "#AgendaStageTitle" ).html(data[3]["category"]+'<span id="CategoryRoom"><i class="fa fa-map-marker"></i> '+data[3]["room"]+'</span>'); 
								 } else {
									$( "#AgendaStageTitle" ).html(data[3]["category"]); 
								 }
							   
							   $( "#AgendaStageTitle" ).css('color',ColorPalette.color);
							   
							  
							   });
		                       
							   $( "#AgendaStageTitle" ).fadeIn(1200);
							  
							  

							
							
							if (typeof data[0] != "undefined" && data[0] != "Nope"){
							//Content
								 $('#SessionsDayOneMobile').fadeOut(700, function(){
									  $('#SessionsDayOneMobile').html(data[0]);
								 });
							 $('#SessionsDayOneMobile').fadeIn(1200);		
							} 
							  
							   		  
							
						 if (typeof data[1] != "undefined" && data[1] != "Nope"){						  
									if (typeof data[5] != "undefined" && data[5] != ""){
										var productD = '<h2 class="ProductDName">Product Demonstration A</h2>'+data[1]+'<h2 class="ProductDName">Product Demonstration B</h2>'+data[5];
										$('#SessionsDayTwoMobile').fadeOut(700, function(){
										  $('#SessionsDayTwoMobile').html(productD);
										  
										   });
									} else {
										$('#SessionsDayTwoMobile').fadeOut(700, function(){
										 $('#SessionsDayTwoMobile').html(data[1]);
										 });
									}
						   $('#SessionsDayTwoMobile').fadeIn(1200);
						  } 
							   
                         //content end
					
						$( "#SpeakersAndTestimonialsContainer" ).fadeOut( "fast", function() {
                               $('#SpeakersAndTestimonialsContainer').html(data[2]);
							   $('#SpeakersAndTestimonialsContainer').fadeIn('slow');
							   
                        });	
					    
					
					$('#MobileStageName').html(data[3]["category"]);
					$('#MobileStageName').css('color',ColorPalette.color);



  $('html, body').animate({
   scrollTop: $("#AgendaScrollAcnhor").offset().top
  }, 1000);
  
  						$('#SponsorsInnerContainer').fadeOut( "fast", function() {
                               $('#SponsorsInnerContainer').html(data[7][0]);
							   $('#SponsorsInnerContainer').fadeIn('slow');
							   
                        });	
  
  

					 }
				  
						
						//Mobile end
		
		
				
			 });// ajax call end	
	   

	   
	   
	}//if category defined end

    if (typeof category != 'undefined' && category == 'close') {
				//Fade out the break-out panel
		$('#SessionCategoriesDesktop').fadeOut();
		
	}

	  });


/***********************************************
Mobile Stage Changer
**************************************************/
$('.PanelConfirmButton').bind('click', function (e) {
	
	var category = $(this).data('agenda_category');
	
			  		/*Day 1 / Day 2 button changes :D*/
		 if (category == 8 || category == 7 || category == 9) {
			 //ONLY DAY 1
			 	 $('#Day2Button').fadeOut(function(){
					 $('#Day2Button').addClass('NoPanel');
					 

					 });
				 

						  $('#Day1Button').fadeIn(function(){
							   $('#Day1Button').removeClass('NoPanel');				 
						   
							   $('#Day1Button').removeClass('HalfPanel');
							   $('#Day1Button').addClass('FullPanel');
							   
						   });

				 
				 $('#SessionsDayTwoMobile').fadeOut();
				 $('#SessionsDayOneMobile').fadeIn();
				 
				  $("#Day1Button").addClass("ClickedTabButton");
				  $("#Day2Button").removeClass("ClickedTabButton");
				  $("#iRecruitButton").removeClass("ClickedTabButton");
				  $("#disruptHRButton").removeClass("ClickedTabButton");
				  $("#BreakoutsButton").removeClass("ClickedTabButton");
				  
				  $("#iRecruitTabPanelContent").fadeOut('slow');
		          $("#disruptHRTabPanelContent").fadeOut('slow');	
				  
				  var isDayOne = true;
				  var isDayTwo = false;
			 
			 //only day 1 end
		 } else {
			if (category == 10 || category == 11 || category == 13) {
			  //ONLY DAY 2
			     $('#Day1Button').fadeOut(function(){
					 $('#Day1Button').addClass('NoPanel');
					 

					 
					 
				 });
				 

						$('#Day2Button').fadeIn(function(){
						 $('#Day2Button').removeClass('NoPanel');
					 
						 $('#Day2Button').removeClass('HalfPanel');
						 $('#Day2Button').addClass('FullPanel');					 
					 });			 

				 
				 $('#SessionsDayOneMobile').fadeOut();
				 $('#SessionsDayTwoMobile').fadeIn();
				 
				  $("#Day1Button").removeClass("ClickedTabButton");
				  $("#Day2Button").addClass("ClickedTabButton");
				  $("#iRecruitButton").removeClass("ClickedTabButton");
				  $("#disruptHRButton").removeClass("ClickedTabButton");
				  $("#BreakoutsButton").removeClass("ClickedTabButton");

		          $("#iRecruitTabPanelContent").fadeOut('slow');
		          $("#disruptHRTabPanelContent").fadeOut('slow');	
				 
                  var isDayTwo = true;
				  var isDayOne = false;
			  
			  //only day 2 end	
			} else {
				//NORMAL VERSION (DAY 1 & DAY 2)
				 $('#Day1Button').fadeIn(function(){
					 	 $('#Day1Button').removeClass('FullPanel');
				         $('#Day1Button').removeClass('NoPanel');
				         $('#Day1Button').addClass('HalfPanel');
				 });

				 			
				 $('#Day2Button').fadeIn(function(){
					    $('#Day2Button').removeClass('NoPanel');
			            $('#Day2Button').removeClass('FullPanel');
				        $('#Day2Button').addClass('HalfPanel');
					 
				 });

				
				 $('#SessionsDayTwoMobile').fadeOut();
				 $('#SessionsDayOneMobile').fadeIn();
				 
				 
				  $("#Day1Button").addClass("ClickedTabButton");
				  $("#Day2Button").removeClass("ClickedTabButton");
				  $("#iRecruitButton").removeClass("ClickedTabButton");
				  $("#disruptHRButton").removeClass("ClickedTabButton");
				  $("#BreakoutsButton").removeClass("ClickedTabButton");
				  
			            $("#Day2Button").css("background-color","#E0E0E0");
						$("#Day2Button").css("border-bottom","2px solid #E0E0E0");
			            $("#iRecruitButton").css("background-color","#E0E0E0");
						$("#iRecruitButton").css("border-bottom","2px solid #E0E0E0");						
			            $("#disruptHRButton").css("background-color","#E0E0E0");
						$("#disruptHRButton").css("border-bottom","2px solid #E0E0E0");							
	           	$("#iRecruitTabPanelContent").fadeOut('slow');
	        	$("#disruptHRTabPanelContent").fadeOut('slow');							
						
				  var isDayOne = true;
				  var isDayTwo = false;			  
			}//normal version end
			
			 
		 }//day 1 only else end
		
		
		/*END Day 1 /Day 2 css stuff*/ 	
	

				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
				dataType:"json",
                data: {action:"change_agenda_category_mobile_v6", category:category},
                success: function(data) {
					
					
					
				     var isDayOne = $('#Day1Button').hasClass('ClickedTabButton');
				   
				     if (isDayOne == true){
				       	
				   		    $( "#SessionsDayOneMobile" ).fadeOut( "fast", function() {
                               $('#SessionsDayOneMobile').html(data[0]);
							   $('#SessionsDayOneMobile').fadeIn();
							 
							
                        });
						
							
					     $('#SessionsDayTwoMobile').html(data[1]);
						
					 }
                               	
	
	
	              var isDayTwo = $('#Day2Button').hasClass('ClickedTabButton');
				  	  if (isDayTwo == true){
				  
				   		    $( "#SessionsDayTwoMobile" ).fadeOut( "fast", function() {
                               $('#SessionsDayTwoMobile').html(data[1]);
							   $('#SessionsDayTwoMobile').fadeIn();
							
                        });
				
					
				
					       $('#SessionsDayOneMobile').html(data[0]);
						 
					
					 }
				  
                   
				
					
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
							  $(this).addClass(data[3]["color"]+'Color');
							  $(this).fadeIn();
							   
                        });		
						
					$( "#SelectedStageText" ).fadeOut( "slow", function() {
                              $(this).html(data[4]); 
							  $(this).fadeIn();
							   
                        });			
			

					
				if (category > 3) {
						 $( ".TabPanelButton" ).removeClass('MainStageButton');
						
					} else {
						$( ".TabPanelButton" ).removeClass('MainStageButton');
						$( ".TabPanelButton" ).addClass('MainStageButton');
					}
									
						ColorPalette.color = data[3]["main_color"];
					
											//Bottom stripe color change animation
					   var CurrentMainRGB= $( "#StageDescription" ).css('background-color');
					   var CurrentMainColor = rgb2hex(CurrentMainRGB);
					  

                   }
            });// ajax call end

	  

	  });	
 
	
	
	$(".TabPanelButton").mouseover(function() {
		var id = $(this).attr('id');
		
		if (id == "BreakoutsButton"){
			 $(this).css("background-color",ColorPalette.color);
		} else {
			 $(this).css("background-color",ColorPalette.defaultcolor);
		}
      
	   
     }); 
	 
	$(".TabPanelButton").mouseout(function() {
		var category = $(this).data('agenda_category');
		var color = "#101010";
		var id = $(this).attr('id');
		
		if (ColorPalette.active == category){
			$.each(ColorPalette.colorArray, function( key, value ) {
				if (value['id'] == category){
					color = value['main_color'];
				} 
			   });
	  }
	  
	  
	  if (id == "BreakoutsButton" && (typeof ColorPalette.active == "undefined" || ColorPalette.active > 3)) {
		  color = ColorPalette.color;
	  }
	 	   
          $(this).css("background-color", color);
       
     }); 	
	 
	 
	$(".StageMenuItem").mouseover(function() {
		var category = $(this).data('agenda_category');
		var color = '';
		
		$.each(ColorPalette.colorArray, function( key, value ) {
            if (value['id'] == category){
			  color = value['main_color'];
			}
           });
		   
		   
          $(this).css("background-color", color);
	   
     }); 
	 
	$(".StageMenuItem").mouseout(function() {
		   
		
		   var hovered = $(this).data('agenda_category');
	    	if (hovered != ColorPalette.active){
			   $(this).css("background-color","#101010");
		    }
         
     }); 
	 
	 
		$(".TabPanelButton").click(function() {
			var selected = $(this).data('agenda_category');
			var color = ''; 
			var id = $(this).attr('id');
			
			$.each(ColorPalette.colorArray, function( key, value ) {
              if (value['id'] == selected){
			      color = value['main_color'];
			  
			  }
			  
			  if (id == "BreakoutsButton"){
				   color = ColorPalette.color;
			  }
           });
			
			  $(this).css("background-color", color);

       
     });  

	  
});

var hexDigits = new Array
        ("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"); 

//Function to convert hex format to a rgb color
function rgb2hex(rgb) {
	if (typeof rgb !== "undefined"){
         rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
         return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
	}
}

function hex(x) {
  return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
 }
 
 
function change_stage(category){
	
//Change stage				
	ColorPalette.active = category;
 
    if (typeof category != "undefined" && category != '' && category != 'close'){

		//Fade out the break-out panel
		$('#SessionCategoriesDesktop').fadeOut(); 
		
					  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
				dataType:"json",
                data: {action:"change_agenda_category_mobile_v6", category:category},
                success: function(data) {	
		
		//Active colored state for category selector buttons
               
			   
			   $('.StageMenuItem').each(function(index, element) {
                    var hovered = $(this).data('agenda_category');
					if (hovered != ColorPalette.active ){
			          $(this).css("background-color","#101010");
		            }
					
               });
			   
			   	 $('.TabPanelButton').each(function(index, element) {
                    var hovered = $(this).data('agenda_category');
					if (hovered != ColorPalette.active ){
			          $(this).css("background-color","#101010");
		            }
					
               });
			   

             //close floating selector (or not? O.o)
			//$("#FloatingDesktopMenu").removeClass("OpenedFloatingMenu");
			 
			

						
					$( "#SelectedStageText" ).fadeOut( "slow", function() {
                              $(this).html(data[4]); 
							  $(this).fadeIn(1200);
							   
                        });					   
			

                               		//for product demo
													  

                      ColorPalette.color = data[3]["main_color"];

                       if (ColorPalette.color != ColorPalette.defaultcolor){
                           $('#BreakoutsButton').css("background-color",ColorPalette.color);
                         }
 
						   $('#AgendaStageTitle').fadeOut(700, function(){
							   $( "#AgendaStageTitle" ).html(data[3]["category"]);
							   $( "#AgendaStageTitle" ).css('color',ColorPalette.color);
							   
							  
							   });
		                       
							   $( "#AgendaStageTitle" ).fadeIn(1200);
							  
							  
							  $('.AgendaDateClass').fadeOut(700, function(){
								  
							  });
							  
							   	$('.AgendaDateClass').fadeIn(1200);					 
						 	
							
							
							
							//Content
							 $('#SessionsDayOneMobile').fadeOut(700, function(){
								  $('#SessionsDayOneMobile').html(data[0]);
							 });
							  
							   $('#SessionsDayOneMobile').fadeIn(1200);				  
													  
									if (typeof data[5] != "undefined" && data[5] != ""){
										var productD = '<h2 class="ProductDName">Product Demonstration A</h2>'+data[1]+'<h2 class="ProductDName">Product Demonstration B</h2>'+data[5];
										$('#SessionsDayTwoMobile').fadeOut(700, function(){
										  $('#SessionsDayTwoMobile').html(productD);
										  
										   });
									} else {
										$('#SessionsDayTwoMobile').fadeOut(700, function(){
										 $('#SessionsDayTwoMobile').html(data[1]);
										 });
									}
						  
						  
							   $('#SessionsDayTwoMobile').fadeIn(1200);
							   
                         //content end
					
						$( "#SpeakersAndTestimonialsContainer" ).fadeOut( "fast", function() {
                               $('#SpeakersAndTestimonialsContainer').html(data[2]);
							   $('#SpeakersAndTestimonialsContainer').fadeIn('slow');
							   
                        });	
					    
					
					$('#MobileStageName').html(data[3]["category"]);
					$('#MobileStageName').css('color',ColorPalette.color);



  $('html, body').animate({
   scrollTop: $("#AgendaScrollAcnhor").offset().top
  }, 1000);
  
  						$('#SponsorsInnerContainer').fadeOut( "fast", function() {
                               $('#SponsorsInnerContainer').html(data[7][0]);
							   $('#SponsorsInnerContainer').fadeIn('slow');
							   
                        });	
  
  

					 }
				  
						
						//Mobile end
		
		
				
			 });// ajax call end	
	   

	   
	   
	}//if category defined end	
	
}