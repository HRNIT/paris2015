var editor ={};
$(document).ready(function(){

	


		//Hide the element and show the input field associated with the element + focus the input box
    $('.SponsorGridAnchor').bind('click', function () {
		
		//get the id of the activated element
		var sId = $(this).data('sponsornum');

		 
	  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"mediapartner_edit_request", sId:sId},
                success: function(data) {
				    setTimeout(function () {
                         window.location.replace("mediapartner-profile");
                      }, 200); //will call the function after 1 secs.
					
                   }
            });
			  
          
      

  });			
		
		
	
});