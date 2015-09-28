/*  $(function() {
    //$('#Speakers').sortable({
       // update: function(event, ui) {
          //  var list_sortable = $(this).sortable('toArray').toString();
    		// change order in the database using Ajax
          
		  
		  /*  $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"speaker_sort", list_order:list_sortable},
                success: function(data) {
                    //finished
                }
            });*/
        //}
   // }); // fin sortable
	/*$( ".Speaker" ).sortable();
});
*/
var speakers = {};
speakers.order = new Array;


$(document).ready(function(){
   var i = 0;

	$(".Speaker").each(function() {
        speakers.order[i] = $(this).data('speaker'); 
		i++;
     });
	   
	 

	   
});
	  
	  
$(function () {
    $("#MediaPartners").sortable({
        items: '.Sponsor',
		update: function(event, ui) {
			
			  var i = 0;
			  var s = 0;
			  var order = new Array;
		      var current;
			  
			  
			  $(".Sponsor").each(function() {
				  current = $(this).data('sponsornum');
				  
				  if (speakers.order[i] != current) {
					  order[s] = new Array;
					 order[s][0] = current;
					 order[s][1] = i;
					 s++; 
				  }
				  
				  i++;
			   });
			   
			   if (order.length > 0) {
				   //if there is a change
				   
					var i = 0;
					//save the new order
						$(".Sponsor").each(function() {
							speakers.order[i] = $(this).data('sponsornum'); 
							i++;
						 });
							
					var entity = 6;				   
				   
						   $.ajax({
					  url: 'controllers/ajax.php',
					  type: 'POST',
					  data: {action:"mediapartner_order", order:order},
					  success: function(data) {
						  //finished
					  }
					 });
				   
			   }
			
		}
		
    });
});

