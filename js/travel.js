// JavaScript Document of the Travel page

$(document).ready(function() {
	

	
	var speed = 300;
	
	$("#Hotels").slideUp(speed);
	$("#GettingThere").slideUp(speed);
	setTimeout(function(){
		$("#Hotels").css("visibility", "visible");
		$("#GettingThere").css("visibility", "visible");
	}, speed);	
	
	

	
	$("#AirlineButton").addClass("ClickedTabButton");
	$("#AirlineButton .ArrowUp").addClass("ClickedTabButtonArrow");
	$("#HotelsButton").removeClass("ClickedTabButton");
	$("#PartnerProgramButton").removeClass("ClickedTabButton");
	$("#GettingThereButton").removeClass("ClickedTabButton");
	
	$("#AirlineButton").click(function() {
		$("#AirlineButton").addClass("ClickedTabButton");
		$("#HotelsButton").removeClass("ClickedTabButton");
		$("#PartnerProgramButton").removeClass("ClickedTabButton");
		$("#GettingThereButton").removeClass("ClickedTabButton");
		
		$("#AirlineButton .ArrowUp").addClass("ClickedTabButtonArrow");
		$("#HotelsButton .ArrowUp").removeClass("ClickedTabButtonArrow");
		$("#PartnerProgramButton .ArrowUp").removeClass("ClickedTabButtonArrow");
		$("#GettingThereButton .ArrowUp").removeClass("ClickedTabButtonArrow");

		
		$('html, body').animate({
			scrollTop: $("#TabPanelAnchor").offset().top
		}, 0);
		$("#Hotels").slideUp(speed);
		$("#PartnerProgram").slideUp(speed);
		$("#GettingThere").slideUp(speed);
		setTimeout(function(){
			$("#Airline").slideDown(speed);	  
		}, speed);		

	});
	
	$("#HotelsButton").click(function() {
		$("#AirlineButton").removeClass("ClickedTabButton");
		$("#HotelsButton").addClass("ClickedTabButton");
		$("#PartnerProgramButton").removeClass("ClickedTabButton");
		$("#GettingThereButton").removeClass("ClickedTabButton");
		
		$("#AirlineButton .ArrowUp").removeClass("ClickedTabButtonArrow");
		$("#HotelsButton .ArrowUp").addClass("ClickedTabButtonArrow");
		$("#PartnerProgramButton .ArrowUp").removeClass("ClickedTabButtonArrow");
		$("#GettingThereButton .ArrowUp").removeClass("ClickedTabButtonArrow");
		
		$('html, body').animate({
			scrollTop: $("#TabPanelAnchor").offset().top
		}, 0);
		$("#Airline").slideUp(speed);
		$("#PartnerProgram").slideUp(speed);
		$("#GettingThere").slideUp(speed);
		setTimeout(function(){
		  $("#Hotels").slideDown(speed);
		}, speed); 
		
	});
	
	$("#PartnerProgramButton").click(function() {
		$("#AirlineButton").removeClass("ClickedTabButton");
		$("#HotelsButton").removeClass("ClickedTabButton");
		$("#PartnerProgramButton").addClass("ClickedTabButton");
		$("#GettingThereButton").removeClass("ClickedTabButton");
		
		$("#AirlineButton .ArrowUp").removeClass("ClickedTabButtonArrow");
		$("#HotelsButton .ArrowUp").removeClass("ClickedTabButtonArrow");
		$("#PartnerProgramButton .ArrowUp").addClass("ClickedTabButtonArrow");
		$("#GettingThereButton .ArrowUp").removeClass("ClickedTabButtonArrow");
		
		$('html, body').animate({
			scrollTop: $("#TabPanelAnchor").offset().top
		}, 0);
		$("#Hotels").slideUp(speed);
		$("#Airline").slideUp(speed);
		$("#GettingThere").slideUp(speed);
		setTimeout(function(){
		  $("#PartnerProgram").slideDown(speed);
		}, speed); 
		
	});
	
	$("#GettingThereButton").click(function() {
		$("#AirlineButton").removeClass("ClickedTabButton");
		$("#HotelsButton").removeClass("ClickedTabButton");
		$("#PartnerProgramButton").removeClass("ClickedTabButton");
		$("#GettingThereButton").addClass("ClickedTabButton");
		
		$("#AirlineButton .ArrowUp").removeClass("ClickedTabButtonArrow");
		$("#HotelsButton .ArrowUp").removeClass("ClickedTabButtonArrow");
		$("#PartnerProgramButton .ArrowUp").removeClass("ClickedTabButtonArrow");
		$("#GettingThereButton .ArrowUp").addClass("ClickedTabButtonArrow");
		
		$('html, body').animate({
			scrollTop: $("#TabPanelAnchor").offset().top
		}, 0);
		$("#Hotels").slideUp(speed);
		$("#Airline").slideUp(speed);
		$("#PartnerProgram").slideUp(speed);
		setTimeout(function(){
		  $("#GettingThere").slideDown(speed);
		}, speed); 
		
	});
});

/* Specific URL hashtag opens specific tab panel */
$(document).ready(function() {
	var panel = window.location.hash.substr(1);
	switch(panel) {
		/*case "airline":
			$("#Airline").css("display", "block");
			$("#AirlineButton").addClass("ClickedTabButton");
			$("#AirlineButton .ArrowUp").addClass("ClickedTabButtonArrow");
			break;*/
		case "hotels":
			$("#Hotels").css("display", "block");
			$("#Hotels").slideDown(300);
			$("#HotelsButton").addClass("ClickedTabButton");
			$("#HotelsButton .ArrowUp").addClass("ClickedTabButtonArrow");
			
			
			$("#Airline").css("display", "none");
			$("#AirlineButton").removeClass("ClickedTabButton");
			$("#AirlineButton .ArrowUp").removeClass("ClickedTabButtonArrow");
			break;
		case "partnerprogram":
			$("#PartnerProgram").css("display", "block");
			$("#PartnerProgramButton").addClass("ClickedTabButton");
			$("#PartnerProgramButton .ArrowUp").addClass("ClickedTabButtonArrow");
			
			$("#Airline").css("display", "none");
			$("#AirlineButton").removeClass("ClickedTabButton");
			$("#AirlineButton .ArrowUp").removeClass("ClickedTabButtonArrow");
			break;
		case "gettingthere":
			$("#GettingThere").css("display", "block");
			$("#GettingThere").slideDown(300);
			$("#GettingThereButton").addClass("ClickedTabButton");
			$("#GettingThereButton .ArrowUp").addClass("ClickedTabButtonArrow");
			
			$("#Airline").css("display", "none");
			$("#AirlineButton").removeClass("ClickedTabButton");
			$("#AirlineButton .ArrowUp").removeClass("ClickedTabButtonArrow");
			break;					
		default:
			break;
	} 
});

/* Partner Program book now buttons - select the specific program */
$(document).ready(function() {
	$("#StGermainButton").click(function() {
		$("#StGermainOption").attr("selected", true);
		$("#WineAndCheeseTastingOption").attr("selected", false);
		$("#LouvreMuseumOption").attr("selected", false);
		$("#MontmartreOption").attr("selected", false);
	});
	$("#WineAndCheeseTastingButton").click(function() {
		$("#WineAndCheeseTastingOption").attr("selected", true);
		$("#StGermainOption").attr("selected", false);
		$("#LouvreMuseumOption").attr("selected", false);
		$("#MontmartreOption").attr("selected", false);
	});
	$("#LouvreMuseumButton").click(function() {
		$("#LouvreMuseumOption").attr("selected", true);
		$("#WineAndCheeseTastingOption").attr("selected", false);
		$("#StGermainOption").attr("selected", false);
		$("#MontmartreOption").attr("selected", false);
	});	
	$("#MontmartreButton").click(function() {
		$("#MontmartreOption").attr("selected", true);
		$("#LouvreMuseumOption").attr("selected", false);
		$("#WineAndCheeseTastingOption").attr("selected", false);
		$("#StGermainOption").attr("selected", false);
	});		
});


$(document).ready(function() {
	
	$('body').on('click', '#PartnerProgramSubmit', function(event) {
		
			  event.preventDefault();
		      event.stopPropagation(); 
			  
			  var name = $('#PartnerName').val();
			  var company = $('#PartnerCompany').val();
			  var email = $('#PartnerEmail').val();
			  var phone = $('#PartnerPhone').val();
			  var program = $('#ProgramName').val();
			  
			  var number = $('input:radio[name=ExtraPeople]:checked').val();
			
			
		if ((typeof name != "undefined" && name != '') && (typeof company != "undefined" && company != '') && (typeof email != "undefined" && email != '') && (typeof phone != "undefined" && phone != '')) {
			
						
			  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"save_booking_data", name:name, company:company, email:email, phone:phone, program:program, number:number},
                success: function(data) {
					 $(this).trigger('reveal:close');
					 
					  setTimeout(function () {
					       var url= "http://www.hrtechcongress.com/travel.php#ThankYouPartnerProgramModal";
			               location.href = url;
                         // location.reload();
						  } , 500); //set timeout function end
					 

                      
                   }

				   
                 }); //end ajax call
			  

			
			
		} else {
		
			//Name
			if (typeof name == "undefined" || name == ''){
				 $('#PartnerName').css("border","1px solid #9B1515");
			} else {
     			 $('#PartnerName').removeAttr('style');
			}
		
			
			
			//Company
			if (typeof company == "undefined" || company == ''){
				 $('#PartnerCompany').css("border","1px solid #9B1515");
			} else {
     			 $('#PartnerCompany').removeAttr('style');
			}
						

			//email
			if (typeof email == "undefined" || email == ''){
				 $('#PartnerEmail').css("border","1px solid #9B1515");
			} else {
     			 $('#PartnerEmail').removeAttr('style');
			}	
			
		
			//phone
			if (typeof phone == "undefined" || phone == ''){
				 $('#PartnerPhone').css("border","1px solid #9B1515");
			} else {
     			 $('#PartnerPhone').removeAttr('style');
			}
					
			
		} //if things not set end :)

			
			 
			  


		
   });
	
	
	
	
});


