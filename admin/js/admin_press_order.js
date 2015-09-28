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
    $("#BloggerContainer ul").sortable({
        items: '.Speaker',
		update: function(event, ui) {
			
			  var i = 0;
			  var s = 0;
			  var order = new Array;
		      var current;
			  
			  
			  $(".Speaker").each(function() {
				  current = $(this).data('speaker');
				  
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
						$(".Speaker").each(function() {
							speakers.order[i] = $(this).data('speaker'); 
							i++;
						 });
							
					var entity = 6;				   
				   
						   $.ajax({
					  url: 'controllers/ajax.php',
					  type: 'POST',
					  data: {action:"press_order", order:order, entity:entity},
					  success: function(data) {
						  //finished
					  }
					 });
				   
			   }
			
		}
		
    });
});

