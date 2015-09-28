// JavaScript Document of the Press page

$(document).ready(function() {
	
	var speed = 300;
	
	$("#MediaPartnersButton").addClass("ClickedTabButton");
	$("#MediaPartnersButton .ArrowUp").addClass("ClickedTabButtonArrow");
	$("#BlogSquadButton").removeClass("ClickedTabButton");
	$("#AnalystsButton").removeClass("ClickedTabButton");
	
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
		case "analysts":
			$("#Analysts").css("display", "block");
			$("#AnalystsButton").addClass("ClickedTabButton");
			$("#AnalystsButton .ArrowUp").addClass("ClickedTabButtonArrow");
			
			$("#MediaPartners").css("display", "none");
			$("#MediaPartnersButton").removeClass("ClickedTabButton");
			$("#MediaPartnersButton .ArrowUp").removeClass("ClickedTabButtonArrow");
			break;				
		default:
			break;
	} 
});