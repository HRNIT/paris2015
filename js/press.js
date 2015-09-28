// JavaScript Document of the Press page

$(document).ready(function() {
	
	var speed = 300;
	
	$("#BlogSquadButton").addClass("ClickedTabButton");
	$("#BlogSquadButton .ArrowUp").addClass("ClickedTabButtonArrow");
	$("#MediaPartnersButton").removeClass("ClickedTabButton");
	
	
	$("#MediaPartnersButton").click(function() {
		$("#MediaPartnersButton").addClass("ClickedTabButton");
		$("#BlogSquadButton").removeClass("ClickedTabButton");
		$("#AnalystsButton").removeClass("ClickedTabButton");
		
		$("#MediaPartnersButton .ArrowUp").addClass("ClickedTabButtonArrow");
		$("#BlogSquadButton .ArrowUp").removeClass("ClickedTabButtonArrow");
		$("#AnalystsButton .ArrowUp").removeClass("ClickedTabButtonArrow");

		
		$('html, body').animate({
			scrollTop: $("#TabPanelAnchor").offset().top
		}, 0);
		$("#BlogSquad").css("opacity", "0");
		$("#BlogSquad").slideUp(speed);
		$("#Analysts").slideUp(speed);
		setTimeout(function(){
			$("#MediaPartners").slideDown(speed);	  
		}, speed);		

	});
	
	$("#BlogSquadButton").click(function() {
		$("#MediaPartnersButton").removeClass("ClickedTabButton");
		$("#BlogSquadButton").addClass("ClickedTabButton");
		$("#AnalystsButton").removeClass("ClickedTabButton");
		
		$("#MediaPartnersButton .ArrowUp").removeClass("ClickedTabButtonArrow");
		$("#BlogSquadButton .ArrowUp").addClass("ClickedTabButtonArrow");
		$("#AnalystsButton .ArrowUp").removeClass("ClickedTabButtonArrow");
		
		$('html, body').animate({
			scrollTop: $("#TabPanelAnchor").offset().top
		}, 0);
		$("#MediaPartners").slideUp(speed);
		$("#Analysts").slideUp(speed);
		setTimeout(function(){
		  $("#BlogSquad").css("opacity", "1");
		  $("#BlogSquad").slideDown(speed);
		}, speed); 
		
	});
	
	$("#AnalystsButton").click(function() {
		$("#MediaPartnersButton").removeClass("ClickedTabButton");
		$("#BlogSquadButton").removeClass("ClickedTabButton");
		$("#AnalystsButton").addClass("ClickedTabButton");
		
		$("#MediaPartnersButton .ArrowUp").removeClass("ClickedTabButtonArrow");
		$("#BlogSquadButton .ArrowUp").removeClass("ClickedTabButtonArrow");
		$("#AnalystsButton .ArrowUp").addClass("ClickedTabButtonArrow");
		
		$('html, body').animate({
			scrollTop: $("#TabPanelAnchor").offset().top
		}, 0);
		$("#BlogSquad").slideUp(speed);
		$("#MediaPartners").slideUp(speed);
		setTimeout(function(){
		  $("#Analysts").slideDown(speed);
		}, speed); 
		
	});
	
});

/* Specific URL hashtag opens specific tab panel */
$(document).ready(function() {
	var panel = window.location.hash.substr(1);
	switch(panel) {
		case "blogsquad":
			$("#BlogSquad").css("display", "block");
			$("#BlogSquadButton").addClass("ClickedTabButton");
			$("#BlogSquadButton .ArrowUp").addClass("ClickedTabButtonArrow");
			
			
			$("#MediaPartners").css("display", "none");
			$("#MediaPartnersButton").removeClass("ClickedTabButton");
			$("#MediaPartnersButton .ArrowUp").removeClass("ClickedTabButtonArrow");
			break;
		case "mediapartners":

			$("#MediaPartners").css("display", "block");
			$("#MediaPartnersButton").addClass("ClickedTabButton");
			$("#MediaPartnersButton .ArrowUp").addClass("ClickedTabButtonArrow");
			
			$("#BlogSquad").css("display", "none");
			$("#BlogSquadButton").removeClass("ClickedTabButton");
			$("#BlogSquadButton .ArrowUp").removeClass("ClickedTabButtonArrow");
						
			break;			
			
		case "analysts":
			$("#Analysts").css("display", "block");
			$("#AnalystsButton").addClass("ClickedTabButton");
			$("#AnalystsButton .ArrowUp").addClass("ClickedTabButtonArrow");
			
			$("#MediaPartners").css("display", "none");
			$("#MediaPartnersButton").removeClass("ClickedTabButton");
			$("#MediaPartnersButton .ArrowUp").removeClass("ClickedTabButtonArrow");
			break;				
		default:
		
			$("#BlogSquad").css("display", "block");
			$("#BlogSquadButton").addClass("ClickedTabButton");
			$("#BlogSquadButton .ArrowUp").addClass("ClickedTabButtonArrow");
			
			
			$("#MediaPartners").css("display", "none");
			$("#MediaPartnersButton").removeClass("ClickedTabButton");
			$("#MediaPartnersButton .ArrowUp").removeClass("ClickedTabButtonArrow");
		
			break;
	} 
});


$(function() { 
	
	$('body').on('click', '#JoinPressButton', function(event) {
		
			  event.preventDefault();
		      event.stopPropagation(); 
			  
			  var first_name = $('#press_first_name').val();
			  var last_name = $('#press_last_name').val();
			  var company = $('#press_company').val();
			  var email = $('#press_email').val();
			  var phone = $('#press_phone').val();
			  var title = $('#press_title').val();
			
			
		if ((typeof first_name != "undefined" && first_name != '') && (typeof last_name != "undefined" && last_name != '') && (typeof company != "undefined" && company != '') && (typeof email != "undefined" && email != '') && (typeof phone != "undefined" && phone != '') && (typeof title != "undefined" && title != '')) {
			
						
			  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"save_press_data", first_name:first_name, last_name:last_name, company:company, email:email, phone:phone, title:title},
                success: function(data) {
					 $(this).trigger('reveal:close');
					 
					  setTimeout(function () {
					       var url= "http://www.hrtechcongress.com/press.php#ThankYouJoinModal";
			               location.href = url;
                         // location.reload();
						  } , 500); //set timeout function end
					 

                      
                   }

				   
                 }); //end ajax call
			  

			
			
		} else {
		
			//Name
			if (typeof first_name == "undefined" || first_name == ''){
				 $('#press_first_name').css("border","1px solid #9B1515");
			} else {
     			 $('#press_first_name').removeAttr('style');
			}
		
			//Name
			if (typeof last_name == "undefined" || last_name == ''){
				 $('#press_last_name').css("border","1px solid #9B1515");
			} else {
     			 $('#press_last_name').removeAttr('style');
			}			
			
			//Company
			if (typeof company == "undefined" || company == ''){
				 $('#press_company').css("border","1px solid #9B1515");
			} else {
     			 $('#press_company').removeAttr('style');
			}
						

			//email
			if (typeof email == "undefined" || email == ''){
				 $('#press_email').css("border","1px solid #9B1515");
			} else {
     			 $('#press_email').removeAttr('style');
			}	
			
		
			//phone
			if (typeof phone == "undefined" || phone == ''){
				 $('#press_phone').css("border","1px solid #9B1515");
			} else {
     			 $('#press_phone').removeAttr('style');
			}
			
			//phone
			if (typeof title == "undefined" || title == ''){
				 $('#press_title').css("border","1px solid #9B1515");
			} else {
     			 $('#press_title').removeAttr('style');
			}			
					
			
		} //if things not set end :)

			
			 
			  


		
   });
	
	
	
	
});
