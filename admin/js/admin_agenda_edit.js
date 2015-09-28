// JavaScript Document of the Agenda admin page

var tempvar = {};
tempvar.author = '';
$(document).ready(function() {
	/*

 $('body').on('click', '.SessionAbstract', function(event) {		
	
	var agenda_id = $(this).data('agenda_id');
	
	//$('#SessionInfoModal').html('');

	
				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"agenda_session_modal_abstract", agenda_id:agenda_id},
                success: function(data) {
					
                    $('#SessionInfoModal').html(data);
                    $( "#ModalBigContainer").fadeIn('fast');
					  
                   }
            });

	  

	  });
 */

/******************************
  Abstract
*****************************/

     $('body').on('click', '.SessionAbstract', function(event) {	
	     	var agenda_id = $(this).data('agenda_id');
	 
	 				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"get_session_modal_abstract", agenda_id:agenda_id},
                success: function(data) {
					
                  var textarea = '<i id="SessionInfoModalCloseButton" class="icon icon-close-icon close-reveal-modal"> </i><p id="AbstractSaveHelp">Please click on the Save button to save the modification!</p>'+data;
				 $('#SessionInfoModal').html(textarea);  
				
				
				    $('#AbstractEditArea').editable({inlineMode: false,
							inlineMode: false,
							buttons: [
						   'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'align', 'outdent', 'indent', 'insertOrderedList',
						   'insertUnorderedList', 'createLink', 'save'
							],
							saveParams: {action: 'agenda_session_modal_abstract', agenda_id:agenda_id},
							saveURL: "controllers/ajax.php",
							key: 'jgasD7ozD-11ohdnaawcwg1gD1uxu=='
					   })
					   
					   
						  $('#AbstractEditArea').on('editable.afterSave', function (e, editor, data) {
							  
								   $( "#AbstractSaveHelp" ).fadeOut( "fast", function() {
										 $('#AbstractSaveHelp').html('Data Saved!');
										 $('#AbstractSaveHelp').fadeIn();
								   
								 });
						 });
				
				
                   }

				   
                 }); //end ajax call
	 
          //open up the modal and create a froala entity
		  


			


     }); //end on click sessionAbstract 
	 
	 
/******************************
  quote
*****************************/

     $('body').on('click', '#NewQuote', function(event) {	

                  var textarea = '<i id="SessionInfoModalCloseButton" class="icon icon-close-icon close-reveal-modal"> </i><p id="AbstractSaveHelp">Please click on the Save button (inside the editor) to save the quote!</p><input type="text" id="QuoteAuthor" class="AdminInputField" placeholder="Author"/><textarea id="QuoteTextarea"></textarea>';
				 $('#SessionInfoModal').html(textarea);  
		
	
	
				    $('#QuoteTextarea').editable({inlineMode: false,
							inlineMode: false,
							buttons: [
						   'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'align', 'outdent', 'indent', 'insertOrderedList',
						   'insertUnorderedList', 'createLink', 'save'
							],
							saveURL: "controllers/ajax.php",
							key: 'jgasD7ozD-11ohdnaawcwg1gD1uxu=='
					   })
					   
					   
					   $('#QuoteTextarea').on('editable.beforeSave', function (e, editor) {
                            var author = $('#QuoteAuthor').val(); 
						     	 $('#QuoteTextarea').editable('option', 'saveParams', {
                                action: 'add_new_quote',
								author:author
                                      });
						
                       });
					   
					   
						  $('#QuoteTextarea').on('editable.afterSave', function (e, editor, data) {
							  
								   $( "#AbstractSaveHelp" ).fadeOut( "fast", function() {
										// $('#AbstractSaveHelp').html('Data Saved!');
										 $('#AbstractSaveHelp').html(data);
										
										 $('#AbstractSaveHelp').fadeIn();
								   
								 });
						 });
				
				
                  


	 
          //open up the modal and create a froala entity
		  


			


     }); //end on click sessionAbstract 
	
/*--------------
MODAL FUNCTIONS
----------------*/
	
/******************************
  Testimonial
*****************************/

     $('body').on('click', '.AdminBlock', function(event) {	
	     	var day = $(this).data('day');
	        var block_num = $(this).data('blocknum');
			var category = $(this).data('category');
			
	 				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"get_testimonial_data", day:day, block_num:block_num, category:category},
                success: function(data) {
					

				 $('#SessionInfoModal').html(data);  
				

                   }

				   
                 }); //end ajax call
	 
          //open up the modal and create a froala entity
		  

     }); //end on click new speaker

	$('body').on('click', '#EditQuotes', function() {
       
        var style = $('#QuoteEditField').css('display');
		
		if(style == 'none') {
			$('#QuoteEditField').fadeIn();
			$('#EditQuotes').html('Close Edit Quotes Panel');
		}else {
			$('#QuoteEditField').fadeOut();
			$('#EditQuotes').html('Edit Quotes');
		}

});
	
	
	
	

	
	
	/******************************
 	Edit Quote
*****************************/

     $('body').on('click', '.EditQuoteButton', function(event) {	
	     	var quote_id = $(this).data('quoteid');
	 
	 				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"get_quote_data_for_edit", quote_id:quote_id},
                success: function(data) {
					
                  var textarea = '<i id="SessionInfoModalCloseButton" class="icon icon-close-icon close-reveal-modal"> </i><p id="AbstractSaveHelp">Please click on the Save button (inside the editor) to save the modification!</p>'+data;
				 $('#SessionInfoModal').html(textarea);  
				
				
				    $('#QuoteTextarea').editable({inlineMode: false,
							inlineMode: false,
							buttons: [
						   'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'align', 'outdent', 'indent', 'insertOrderedList',
						   'insertUnorderedList', 'createLink', 'save'
							],
							saveURL: "controllers/ajax.php",
							key: 'jgasD7ozD-11ohdnaawcwg1gD1uxu=='
					   })
					   
					   
					   	 $('#QuoteTextarea').on('editable.beforeSave', function (e, editor) {
                                 var author = $('#QuoteAuthor').val(); 
						     	 $('#QuoteTextarea').editable('option', 'saveParams', {
                                action: 'edit_quote',
								author:author, 
								quote_id:quote_id
                                      });
						
                       });
					   
						  $('#QuoteTextarea').on('editable.afterSave', function (e, editor, data) {
							  
								   $( "#AbstractSaveHelp" ).fadeOut( "fast", function() {
										 $('#AbstractSaveHelp').html('Data Saved!');
										 $('#AbstractSaveHelp').fadeIn();
								   
								 });
						 });
				
				
                   }

				   
                 }); //end ajax call
	 
          //open up the modal and create a froala entity
		  


			


     }); //end on click sessionAbstract 
	
/******************************
 Sponsor functions
*****************************/

//Get sponsor data

     $('body').on('click', '#EditSponsorButton', function(event) {	
	     	var day = $(this).data('day');
			var category = $(this).data('category');
			
	 				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"get_agenda_sponsor_data", day:day, category:category},
                success: function(data) {
					

				 $('#SessionInfoModal').html(data);  
				

                   }

				   
                 }); //end ajax call
	 
          //open up the modal and create a froala entity
		  

     }); //end on click new speaker
	
			//Change the type of a testimonial block
	     $('body').on('click', '.AdminSponsorTypeButton', function(event) {	
			 var category = $(this).data('category');
			 var day = $(this).data('day');
			 var type = $(this).data('blocktype');
	 
	 		  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"change_sponsor_type", day:day, category:category, type:type},
                success: function(data) {
					

				 $('#SessionInfoModal').html(data);  
				

                   }

				   
                 }); //end ajax call
	 
        
		  

     }); 
	 
		//add speaker to testimonial
	     $('body').on('click', '.TestimonialSponsorModalButton', function(event) {	
	     	 var block_id = $(this).data('block_id');
			 var sponsor_id = $(this).data('sponsorid');
			 var type = $(this).data('type');
	 
	 		  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"add_sponsor_to_agenda", block_id:block_id, sponsor_id:sponsor_id, type:type},
                success: function(data) {
					

				 $('#SessionInfoModal').html(data);  
				

                   }

				   
                 }); //end ajax call
	 
        
		  

     }); 		
	 
	
	
		//Change the type of a testimonial block
	     $('body').on('click', '.TestimonialSponsorDeleteModalButton', function(event) {	
			 var category = $(this).data('category');
			 var day = $(this).data('day');
			 var sponsor_id = $(this).data('sponsorid');
	 
	 		  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"delete_sponsor_from_agenda", day:day, category:category, sponsor_id:sponsor_id},
                success: function(data) {
					

				 $('#SessionInfoModal').html(data);  
				

                   }

				   
                 }); //end ajax call
	 
        
		  

     }); 
	 	 
	 
	  
	
/******************************
  New Speaker
*****************************/

     $('body').on('click', '.SpeakerInfoAdmin', function(event) {	
	     	var agenda_id = $(this).data('agenda_id');
	 
	 				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"new_speaker_agenda_session", agenda_id:agenda_id},
                success: function(data) {
					

				 $('#SessionInfoModal').html(data);  
				

                   }

				   
                 }); //end ajax call
	 
          //open up the modal and create a froala entity
		  

     }); //end on click new speaker
	
	
	 //Add new speaker to session
     $('body').on('click', '.SpeakerModalButton', function(event) {	
	     	var agenda_id = $(this).data('agendaid');
			var speaker_id = $(this).data('speakerid');
	 
	 		  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"add_speaker_to_session", agenda_id:agenda_id, speaker_id:speaker_id},
                success: function(data) {
					

				 $('#SessionInfoModal').html(data);  
				

                   }

				   
                 }); //end ajax call
	 
         
		  

     }); 
	 
	
	
	//Delete Speaker from session
	     $('body').on('click', '.SpeakerDeleteModalButton', function(event) {	
	     	 var agenda_id = $(this).data('agendaid');
			 var speaker_id = $(this).data('speakerid');
	 
	 		  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"delete_speaker_from_session", agenda_id:agenda_id, speaker_id:speaker_id},
                success: function(data) {
					

				 $('#SessionInfoModal').html(data);  
				

                   }

				   
                 }); //end ajax call
	 
         
		  

     }); 
	
	
		//Change the type of a testimonial block
	     $('body').on('click', '.AdminTestimonialTypeButton', function(event) {	
	     	 var block_num = $(this).data('blocknum');
			 var category = $(this).data('category');
			 var day = $(this).data('day');
			 var type = $(this).data('blocktype');
	 
	 		  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"change_testimonial_type", day:day, category:category, block_num:block_num, type:type},
                success: function(data) {
					

				 $('#SessionInfoModal').html(data);  
				

                   }

				   
                 }); //end ajax call
	 
        
		  

     }); 
	 
		//add speaker to testimonial
	     $('body').on('click', '.TestimonialSpeakerModalButton', function(event) {	
	     	 var block_id = $(this).data('block_id');
			 var speaker_id = $(this).data('speakerid');
			 var type = $(this).data('type');
	 
	 		  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"add_speaker_to_testimonial", block_id:block_id, speaker_id:speaker_id, type:type},
                success: function(data) {
					

				 $('#SessionInfoModal').html(data);  
				

                   }

				   
                 }); //end ajax call
	 
        
		  

     }); 	
	 
		//delete speaker from testimonial
	     $('body').on('click', '.TestimonialSpeakerDeleteModalButton', function(event) {	
	     	 var block_id = $(this).data('block_id');
			 var speaker_id = $(this).data('speakerid');
			 var type = $(this).data('type');
	 
	 		  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"delete_speaker_from_testimonial", block_id:block_id, speaker_id:speaker_id, type:type},
                success: function(data) {
					

				 $('#SessionInfoModal').html(data);  
				

                   }

				   
                 }); //end ajax call
	 
        
		  

     }); 		 
	
	
	
			//add quote to testimonial
	     $('body').on('click', '.TestimonialQuoteModalButton', function(event) {	
	     	 var block_id = $(this).data('block_id');
			 var quote_id = $(this).data('quoteid');
			 var type = $(this).data('type');
	 
	 		  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"add_quote_to_testimonial", block_id:block_id, quote_id:quote_id, type:type},
                success: function(data) {
					

				 $('#SessionInfoModal').html(data);  
				

                   }

				   
                 }); //end ajax call
	 
        
		  

     }); 	
	 
		//delete quote from testimonial
	     $('body').on('click', '.TestimonialQuoteDeleteModalButton', function(event) {	
	     	 var block_id = $(this).data('block_id');
			 var quote_id = $(this).data('quoteid');
			 var type = $(this).data('type');
	 
	 		  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"delete_quote_from_testimonial", block_id:block_id, quote_id:quote_id, type:type},
                success: function(data) {
					

				 $('#SessionInfoModal').html(data);  
				

                   }

				   
                 }); //end ajax call
	 
        
		  

     });   
	 

/*--------------
END MODAL FUNCTIONS
----------------*/

	//Edit time
	     $('body').on('change', '.TimeSelector', function(event) {	
	     	 var agenda_id = $(this).data('agenda_id');
             var edit_type = $(this).data('edittype');
			 var time = $(this).val();
	 
	 		  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"change_session_time", agenda_id:agenda_id, edit_type:edit_type, time:time},
                success: function(data) {
					
					

                   		$('.Response_'+agenda_id).html('<i class="fa fa-check-circle"></i> The time have been changed!');
						$('.Response_'+agenda_id).css("color","#0FB323");
						$('.Response_'+agenda_id).fadeIn('slow');
										
						
					  setTimeout(function () {
								 $('.Response_'+agenda_id).fadeOut('slow');
						  } , 1000); //set timeout function end

										  
                   }

				   
                 }); //end ajax call
	 
          //open up the modal and create a froala entity
		  

     }); //end on click new speaker	 	
	 
	
		//Edit Session category
	     $('body').on('change', '.CategorySelector', function(event) {	
	     	 var agenda_id = $(this).data('agenda_id');
             var category = $(this).val();
	 
	 		  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"change_session_category", agenda_id:agenda_id, category:category},
                success: function(data) {
					
					

                   		$('.Response_'+agenda_id).html('<i class="fa fa-check-circle"></i> The session moved to the specified category! The page will reaload');
						$('.Response_'+agenda_id).css("color","#0FB323");
						$('.Response_'+agenda_id).fadeIn('slow');
										
						
					  setTimeout(function () {
								 $('.Response_'+agenda_id).fadeOut('slow');
								 location.reload();
						  } , 3000); //set timeout function end

										  
                   }

				   
                 }); //end ajax call
	 
        
		  

     }); //end on change category	 	 



		//Edit Session day
	     $('body').on('change', '.DaySelector', function(event) {	
	     	 var agenda_id = $(this).data('agenda_id');
             var day = $(this).val();
	 
	 		  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"change_session_day", agenda_id:agenda_id, day:day},
                success: function(data) {
					
					

                   		$('.Response_'+agenda_id).html('<i class="fa fa-check-circle"></i> The session moved to the specified day! The page will reaload');
						$('.Response_'+agenda_id).css("color","#0FB323");
						$('.Response_'+agenda_id).fadeIn('slow');
										
						
					  setTimeout(function () {
								 $('.Response_'+agenda_id).fadeOut('slow');
								 location.reload();
						  } , 3000); //set timeout function end

										  
                   }

				   
                 }); //end ajax call
	 
        
		  

     }); //end on change day	
	 
	 
		//Delete Session
	     $('body').on('click', '.SessionDelete', function(event) {	
	     	 var agenda_id = $(this).data('agenda_id');
            
	 	var conf = confirm("Are you sure you want to delete this Session?");
		  if (conf == true) {
			  
			  
	 		  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"delete_session", agenda_id:agenda_id},
                success: function(data) {
					
					

                   		$('.Response_'+agenda_id).html('<i class="fa fa-check-circle"></i> The session has been deleted! The page will reaload');
						$('.Response_'+agenda_id).css("color","#0FB323");
						$('.Response_'+agenda_id).fadeIn('slow');
										
						
					  setTimeout(function () {
								 $('.Response_'+agenda_id).fadeOut('slow');
								 location.reload();
						  } , 3000); //set timeout function end

										  
                   }

				   
                 }); //end ajax call
	 
		    }//if confirm true
		  

     }); //Delete Session	  

/*
****************
Modify Session title
*****************
*/ 

$('body').on('click', '.SessionTitleAdmin', function() {
		var content = $(this).html();
		var agenda_id = $(this).data('agenda_id');
		
		//replace the div with an input field
		$(this).replaceWith( '<input type="text" id="EditSessionTitleAdmin" class="SessionTitleEditor" data-agenda_id="'+agenda_id+'" value="'+content+'" />');
		$("#EditSessionTitleAdmin").focus();
		
});



$('body').on('focusout', '#EditSessionTitleAdmin', function() {
		
		
		var content = $(this).val();
		var agenda_id = $(this).data('agenda_id');
		

		
		//Get the DOM element type
        var type = $(this)[0].tagName;
        
		if (type === 'INPUT'){
			
			 //Color nincs meg
			$(this).replaceWith( '<h4 class="SessionTitleAdmin SessionTitleDesktop" data-agenda_id="'+agenda_id+'">'+content+'</h4>');
		}	
		
	 
		
});


$('body').on('keypress keyup', '#EditSessionTitleAdmin', function(event) {
	 //The ajax call
	 
	var alacarteAjax = function(sId, value, type) {
		
		

			  
		
	};
	
	var agenda_id = $(this).data('agenda_id');
	
	       //if the user pressing enter
		 if (event.keyCode === 13) {
			 
			
					//Get the DOM element type
             var type = $(this)[0].tagName;
        	 if (type === 'INPUT'){
				 
				  var value = $(this).val();
				  

			    //if the user wants to delete the alacarte text 
				 
				   if (value !== '' || typeof value !== "undefined"){
					   
								$.ajax({
								  url: 'controllers/ajax.php',
								  type: 'POST',
								  data: {action:"edit_agenda_title", agenda_id:agenda_id, value:value},
								  success: function(data) {
									  
										$('.Response_'+agenda_id).html('<i class="fa fa-check-circle"></i> The title have been changed!');
										$('.Response_'+agenda_id).css("color","#0FB323");
										$('.Response_'+agenda_id).fadeIn('slow');
														
										
									  setTimeout(function () {
												 $('.Response_'+agenda_id).fadeOut('slow');
										  } , 1000); //set timeout function end

									  
									 }
							  });
					   

					   
				    } //if type != undefined
		

				  
				
			  }//if type == input
			 


			 
			$(this).focusout();
			 
		 }//if enter pressed
	
	
	 

	
	//if ESC is pressed
	if (event.keyCode === 27) {
		var content = $(this).val();
		var agenda_id = $(this).data('agenda_id');
		

		
		//Get the DOM element type
        var type = $(this)[0].tagName;
        
		if (type === 'INPUT'){
			
			 //Color nincs meg
			$(this).replaceWith( '<h4 class="SessionTitleAdmin SessionTitleDesktop" data-agenda_id="'+agenda_id+'">'+content+'</h4>');
		}	
		
		
			
	 } //if esc pressed
	 
	 
		
    });


	   

	 
	 
		
});