var editor ={};
var original = {};
$(document).ready(function(){

		Dropzone.autoDiscover = false;
	
	$("#SpeakerPhoto").dropzone({ url: "../controllers/ajax.php" });
	
	
	$("#CompanyLogo").dropzone({ url: "../controllers/ajax.php" });
	
	
	
		 var returnval = $('#ReturnValue').html();
	 
	 if (returnval == 'Success') {
		 
		 $("#ReturnValue").html('<i class="fa fa-check-circle"></i> The data have been saved!');
		 $("#ReturnValue").css("color","#0FB323");
		 $("#ReturnValue").fadeIn('slow');
		 
		 setTimeout(function () {
		$("#ReturnValue").fadeOut('slow');
       } , 3000); //set timeout function end
	 }
	

	


	       	/*-----------------------
		 Click on an element
	    ------------------------	*/
      $('.Editable').bind('click', function (e) {
		    //if the save button pressed
			var speaker_id = $(this).data('speaker');
			var edit_type = $(this).data('type');
			
			original.data = $(this).html();
           
		   $(this).css('display','none');
		   $(this).siblings('.'+edit_type).css('display','block');
		   $(this).siblings('.'+edit_type).focus();
	
        })  
		
 	/*-----------------------
		 Click out from an element
	    ------------------------	*/
		
		$('.EditField').bind('focusout', function (e) {
		    //if the save button pressed
			var original_class = $(this).data('mainclass');
			
			var speaker_id =  $(this).siblings('#'+original_class).data('speaker');
			//original.speakerName = $(this).html;
           
		   $(this).css('display','none');
		   $(this).siblings('#'+original_class).css('display','block');
		   //$(this).siblings('.NameEdit').focus();
	
        })  
		
 	    /*-----------------------
		 Press enter
	    ------------------------	*/
		
		   $('.EditField').keypress(function(event) {
               if (event.keyCode == 13) {
					  //if the save button pressed
					  var this_class = $(this);
					  var original_class = $(this).data('mainclass');
					  
					  var sId =  $(this).siblings('#'+original_class).data('speaker');
					  var edit_type = $(this).siblings('#'+original_class).data('type');
					  
					  var new_data = $(this).val();
					  
					  var entity_id = 6;
					  
					  if (new_data != original.data) {
						  
							$.ajax({
								url: '../controllers/ajax.php',
								type: 'POST',
								data: {action:"edit_press", sId:sId, edit_type:edit_type, new_data:new_data, entity_id:entity_id},
								success: function(data) {
									if (data != '' && typeof data != 'undefined'){
										
									
							              this_class.css('display','none');
										  this_class.siblings('#'+original_class).html(new_data);
		                                  this_class.siblings('#'+original_class).css('display','block');
										
										 $('#ReturnValue').html('<i class="fa fa-check-circle"></i> The data have been saved!');
										 $('#ReturnValue').css("color","#0FB323");
										 $('#ReturnValue').fadeIn('slow');
										

										
									  setTimeout(function () {
		                                          $('#ReturnValue').fadeOut('slow');
                                          } , 3000); //set timeout function end
										  
										 
										
									}
									

								}
							});
										  

					  }
					  
			   }
        })
		

	       	/*-----------------------
		 Bio editor
	    ------------------------	*/
      $('#MPBioTextClick').bind('click', function (e) {
		  var sId = $(this).data('speaker');
		  var entity_id = 6;
    $('#MPBioText').fadeIn();
  $('#MPBioTextArea').editable({
	             maxCharacters: 300,
		        inlineMode: false,
				   buttons: [
				'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'align', 'outdent', 'indent', 'insertOrderedList',
				'insertUnorderedList', 'createLink', 'save'
				 ],
				 saveParams: {action: 'edit_press_bio', sId:sId, entity_id:entity_id},
				 saveURL: "../controllers/ajax.php",
				 key: 'jgasD7ozD-11ohdnaawcwg1gD1uxu=='
		    })
						
			 editor.instance = $('#MPBioTextArea');
			 
			 
		 $('#MPBioTextArea').on('editable.afterSave', function (e, editor, data) {
			 
			  $('#ReturnValue').html('<i class="fa fa-check-circle"></i> The data have been saved!');
										 $('#ReturnValue').css("color","#0FB323");
										 $('#ReturnValue').fadeIn('slow');
										

										
									  setTimeout(function () {
		                                          $('#ReturnValue').fadeOut('slow');
                                          } , 2000); //set timeout function end
										  
									 setTimeout(function () {
		                                         location.reload();
                                          } , 1000); //set timeout function end

                  });	

      })  
	  
		
	       	/*-----------------------
		 Bio editor
	    ------------------------	*/
      $('#SpeakerBio').bind('click', function (e) {
		  
		   if (typeof editor.instance != "undefined" && editor.instance != '') {
			     editor.instance.editable('destroy');
				 editor.instance.css('display','none');
				 editor.instance.siblings('#SpeakerBio').css('display','block');
				 editor.instance = '';
		   }
		   
		    //if the save button pressed
			var sId = $(this).data('speaker');
			var this_class = $(this);
			
			original.data = $(this).html();
           
		   $(this).siblings('.HelpText').fadeIn();
		   
		   $(this).css('display','none');
		   
		   var entity_id = 6;
		   
		   $('.BioEdit').editable({
			    maxCharacters: 300,
		        inlineMode: false,
				   buttons: [
				'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'align', 'outdent', 'indent', 'insertOrderedList',
				'insertUnorderedList', 'createLink', 'save'
				 ],
				 saveParams: {action: 'edit_press_bio', sId:sId, entity_id:entity_id},
				 saveURL: "../controllers/ajax.php",
				 key: 'jgasD7ozD-11ohdnaawcwg1gD1uxu=='
		    })
						
			 editor.instance = $('.BioEdit');
			 
			 
		 $('.BioEdit').on('editable.afterSave', function (e, editor, data) {
			 
			  $('#ReturnValue').html('<i class="fa fa-check-circle"></i> The data have been saved!');
										 $('#ReturnValue').css("color","#0FB323");
										 $('#ReturnValue').fadeIn('slow');
										

										
									  setTimeout(function () {
		                                          $('#ReturnValue').fadeOut('slow');
                                          } , 2000); //set timeout function end
										  
									 setTimeout(function () {
		                                         location.reload();
                                          } , 1000); //set timeout function end

                  });	
			
		  // $(this).siblings('.BioEdit').css('display','block');
		   //$(this).siblings('.BioEdit').focus();
	
        })  		
		
		

	
  	/*-----------------------
		Social Link edit
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('.SocialLinkEdit').bind('click', function () {
		
		//get the id of the activated element
		var sId = $(this).data('entity_id');
		var type = $(this).data('entity_type');

	  $.ajax({
                url: '../controllers/ajax.php',
                type: 'POST',
                data: {action:"social_link_edit_request", sId:sId, type:type},
                success: function(data) {
				    setTimeout(function () {
                         window.location.replace("../social_links_edit");
                      }, 200); //will call the function after 1 secs.
					
                   }
            });
			  
          
      

  })			
		
		
	  $('#SpeakerPhoto').bind('click', function (e) {
		  var speaker_id = $(this).data('speaker');
		  var speaker_name = $(this).data('sname');
		  
		  var myDropzone = Dropzone.forElement(this);
		  
		  var entity_id = 6;
		  
		  myDropzone.on("sending", function(file, xhr, formData) {
						formData.append("action", "edit_press_image");
						formData.append("speaker_id", speaker_id);
						formData.append("speaker_name", speaker_name);
						formData.append("entity_id", entity_id);
               });
		  
		  
		  myDropzone.on("addedfile", function(file) {
			 setTimeout(function () {
                  myDropzone.processQueue();
				  
						$('#ReturnValue').html('<i class="fa fa-check-circle"></i> The data have been saved!');
							 $('#ReturnValue').css("color","#0FB323");
							 $('#ReturnValue').fadeIn('slow');
							

							
						  setTimeout(function () {
									  $('#ReturnValue').fadeOut('slow');
							  } , 2000); //set timeout function end
							  
				  
				  			 setTimeout(function () {
                                  location.reload();
				
                           }, 2000); //will call the function after 2 secs.
				
            }, 1000); //will call the function after 2 secs.
			  
				  
              });

     })  	
	 
	 
	 
	 	  $('#CompanyLogo').bind('click', function (e) {
		  var company_id = $(this).data('company');
		  var company_name = $(this).data('cname');
		  
		  var myDropzone = Dropzone.forElement(this);
		  
		  var entity_id = 6;
		  
		  myDropzone.on("sending", function(file, xhr, formData) {
						formData.append("action", "edit_press_company_image");
						formData.append("company_id", company_id);
						formData.append("company_name", company_name);
						formData.append("entity_id", entity_id);
						 
               });
		  
		  
		  myDropzone.on("addedfile", function(file) {
			 setTimeout(function () {
                  myDropzone.processQueue();
				  
				    $('#ReturnValue').html('<i class="fa fa-check-circle"></i> The data have been saved!');
										 $('#ReturnValue').css("color","#0FB323");
										 $('#ReturnValue').fadeIn('slow');
										

										
									  setTimeout(function () {
		                                          $('#ReturnValue').fadeOut('slow');
                                          } , 2000); //set timeout function end
				  
				  			 setTimeout(function () {
                                  location.reload();
				
                           }, 2000); //will call the function after 2 secs.
				
            }, 1000); //will call the function after 2 secs.
			  
				  
              });

     })  	
	 
	/*-----------------------
		Speaker Delete
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('.SysDelete').bind('click', function () {
		
		//get the id of the activated element
		var sId = $(this).data('speaker');
		var entity_id = 6;
		
		var conf = confirm("Are you sure you want to delete this blogger?");
		  if (conf == true) {
			  var edit_type = "StatusEdit";
			  var new_data = "DeleteSpeaker";
	  $.ajax({
                url: '../controllers/ajax.php',
                type: 'POST',
                data: {action:"edit_press", sId:sId, edit_type:edit_type, new_data:new_data, entity_id:entity_id},
                success: function(data) {
					alert('The blogger has been deleted!');
				    setTimeout(function () {
                      window.location.replace("../press#blogsquad");
                      }, 1000); //will call the function after 1 secs.
					
                   }
            });
			  
          
           }

  })
  
	 
	 
   
	 

	   
      });
	  
	  
	  
	  
	  
	$(document).keyup(function(e) {
  if (e.keyCode == 27) {
			if (typeof editor.instance != "undefined" && editor.instance != '') {
			     editor.instance.editable('destroy');
				 editor.instance.css('display','none');
				 editor.instance.siblings('#SpeakerBio').css('display','block');
				 editor.instance = '';
		   }
		 $('.HelpText').fadeOut();   
	 
  }// esc
});