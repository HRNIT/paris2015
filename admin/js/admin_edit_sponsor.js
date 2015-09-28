var editor ={};
$(document).ready(function(){

	
		 var returnval = $('#ReturnValue').html();
	 
	 if (returnval == 'Success') {
		 
		 $("#ReturnValue").html('<i class="fa fa-check-circle"></i> The data have been saved!');
		 $("#ReturnValue").css("color","#0FB323");
		 $("#ReturnValue").fadeIn('slow');
		 
		 setTimeout(function () {
		$("#ReturnValue").fadeOut('slow');
       } , 3000); //set timeout function end
	 }
	
	Dropzone.autoDiscover = false;
	
	$("div.SponsorLogo").dropzone({ url: "controllers/ajax.php" });
	

var original = {};
	       	/*-----------------------
		 Click on an element
	    ------------------------	*/
      $('.Editable').bind('click', function (e) {
		    //if the save button pressed
			var sponsor_id = $(this).data('sponsor');
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
			
			var sponsor_id =  $(this).siblings('.'+original_class).data('sponsor');
			//original.sponsorName = $(this).html;
           
		   $(this).css('display','none');
		   $(this).siblings('.'+original_class).css('display','block');
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
					  
					  var sId =  $(this).siblings('.'+original_class).data('sponsor');
					  var edit_type = $(this).siblings('.'+original_class).data('type');
					  
					  var new_data = $(this).val();
					  
					  if (new_data != original.data) {
						  
							$.ajax({
								url: 'controllers/ajax.php',
								type: 'POST',
								data: {action:"edit_sponsor", sId:sId, edit_type:edit_type, new_data:new_data},
								success: function(data) {
									if (data != '' && typeof data != 'undefined'){
										
							              this_class.css('display','none');
										  this_class.siblings('.'+original_class).html(new_data);
		                                  this_class.siblings('.'+original_class).css('display','block');
										
										 this_class.parent('.SponsorDetails').siblings('.ReturnValue').html('<i class="fa fa-check-circle"></i> The data have been saved!');
										 this_class.parent('.SponsorDetails').siblings('.ReturnValue').css("color","#0FB323");
										 this_class.parent('.SponsorDetails').siblings('.ReturnValue').fadeIn('slow');
										

										
									  setTimeout(function () {
		                                          this_class.parents('.SponsorDetails').siblings('.ReturnValue').fadeOut('slow');
                                          } , 3000); //set timeout function end
										
									}
									

								}
							});
										  

					  }
					  
			   }
        })
		


         $('.SelectClass').bind('change', function (e) {


					  var this_class = $(this);
					 
					  
					  var sId =  $(this).data('entity_id');
					  var edit_type = "CategoryEdit";
					  
					  var new_data = $(this).val();
					  
					
						  
							$.ajax({
								url: 'controllers/ajax.php',
								type: 'POST',
								data: {action:"edit_sponsor", sId:sId, edit_type:edit_type, new_data:new_data},
								success: function(data) {
									if (data != '' && typeof data != 'undefined'){

										
										 this_class.parent('.SponsorDetails').siblings('.ReturnValue').html('<i class="fa fa-check-circle"></i> The data have been saved!');
										 this_class.parent('.SponsorDetails').siblings('.ReturnValue').css("color","#0FB323");
										 this_class.parent('.SponsorDetails').siblings('.ReturnValue').fadeIn('slow');
										

										
									  setTimeout(function () {
		                                          this_class.parents('.SponsorDetails').siblings('.ReturnValue').fadeOut('slow');
                                          } , 2000); //set timeout function end
										  
										 setTimeout(function () {
		                                          location.reload();
                                          } , 1000); //set timeout function end
										
									}
									

								}
							});
										  

					

  })  
		
	       	/*-----------------------
		 Bio editor
	    ------------------------	*/
      $('.SponsorDescription').bind('click', function (e) {
		  
		   if (typeof editor.instance != "undefined" && editor.instance != '') {
			     editor.instance.editable('destroy');
				 editor.instance.css('display','none');
				 editor.instance.siblings('.SponsorDescription').css('display','block');
				 editor.instance = '';
		   }
		   
		    //if the save button pressed
			var sId = $(this).data('sponsor');
			var edit_type = "BioEdit";
			var this_class = $(this);
			
			original.data = $(this).html();
           
		   $(this).siblings('.HelpText').fadeIn();
		   
		   $(this).css('display','none');
		   $(this).siblings('.BioEdit').editable({
		        inlineMode: false,
				   buttons: [
				'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'align', 'outdent', 'indent', 'insertOrderedList',
				'insertUnorderedList', 'createLink', 'save'
				 ],
				 saveParams: {action: 'edit_sponsor', edit_type:edit_type, sId:sId},
				 saveURL: "controllers/ajax.php",
				 key: 'jgasD7ozD-11ohdnaawcwg1gD1uxu=='
		    })
						
			 editor.instance = $(this).siblings('.BioEdit');
			 
			 
		 $(this).siblings('.BioEdit').on('editable.afterSave', function (e, editor, data) {
			 
			  this_class.parent('.SponsorDetails').siblings('.ReturnValue').html('<i class="fa fa-check-circle"></i> The data have been saved!');
										 this_class.parent('.SponsorDetails').siblings('.ReturnValue').css("color","#0FB323");
										 this_class.parent('.SponsorDetails').siblings('.ReturnValue').fadeIn('slow');
										

										
									  setTimeout(function () {
		                                          this_class.parents('.SponsorDetails').siblings('.ReturnValue').fadeOut('slow');
                                          } , 2000); //set timeout function end
										  
									 setTimeout(function () {
		                                         location.reload();
                                          } , 1000); //set timeout function end

                  });	
			
		  // $(this).siblings('.BioEdit').css('display','block');
		   //$(this).siblings('.BioEdit').focus();
	
        })  		
		
		

	/*-----------------------
		Sponsor Delete
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('.SysDelete').bind('click', function () {
		
		//get the id of the activated element
		var sId = $(this).data('sponsor');
		
		var conf = confirm("Are you sure you want to delete this Sponsor?");
		  if (conf == true) {
			  var edit_type = "StatusEdit";
			  var new_data = 0;
	  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"edit_sponsor", sId:sId, edit_type:edit_type, new_data:new_data},
                success: function(data) {
					alert('The Sponsor has been deleted!');
				    setTimeout(function () {
                      location.reload();
                      }, 1000); //will call the function after 1 secs.
					
                   }
            });
			  
          
           }

  })
  
  	/*-----------------------
		Sponsor permissions
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('.SysOptions').bind('click', function () {
		
		//get the id of the activated element
		var sId = $(this).data('sponsor');
		

	  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"sponsor_permission_request", sId:sId},
                success: function(data) {
				    setTimeout(function () {
                         window.location.replace("sponsors_permission");
                      }, 200); //will call the function after 1 secs.
					
                   }
            });
			  
          
      

  })
    
	
			 	       //alacarte checkbox
	   $('.AddAlaCarteChekbox').bind('click', function () {
		   
           var check = $(this).prop('checked');
					
				if (check == true) {
					$(this).parent("label").siblings(".AlaCarteContainer").fadeIn();
				} else {
					
					$(this).parent("label").siblings(".AlaCarteContainer").fadeOut();
				}
				
	   
	   
	     }) 
		 
		 
		   $('.AlaCarteText').keypress(function(event) {
               if (event.keyCode == 13) {
					  //if the save button pressed
                      var text = $(this).val();
					  
					  var sId =  $(this).data('sponsor');
					  
					  var thisclass = $(this);
					
					 
					  if (typeof text != "undefined" && text != '' && typeof sId != "undefined" && sId != '') {
						  
							$.ajax({
								url: 'controllers/ajax.php',
								type: 'POST',
								data: {action:"add_alacarte_for_sponsor", sId:sId, text:text},
								success: function(data) {
									
										$(".AlaCarteContainer").fadeOut();
										  thisclass.parent(".AlaCarteContainer").siblings(".alacarteReturnValue").html('<i class="fa fa-check-circle"></i> The data have been saved!');
										 thisclass.parent(".AlaCarteContainer").siblings(".alacarteReturnValue").css("color","#0FB323");
										 thisclass.parent(".AlaCarteContainer").siblings(".alacarteReturnValue").fadeIn('slow');
										
									  setTimeout(function () {
		                                           thisclass.parent(".AlaCarteContainer").siblings(".alacarteReturnValue").fadeOut('slow');
                                          } , 2000); //set timeout function end
										  
		                             $('.AddAlaCarteChekbox').prop('checked', false); // Unchecks it
									$('.AlaCarteText').val('');

								}
							});
										  

					  }
					  
			   }
        })		 
		 
	
	  	/*-----------------------
		Sponsor filter tags
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('.SysCategories').bind('click', function () {
		
		//get the id of the activated element
		var sId = $(this).data('sponsor');
		

	  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"sponsor_tag_request", sId:sId},
                success: function(data) {
				    setTimeout(function () {
                         window.location.replace("sponsors_tags");
                      }, 200); //will call the function after 1 secs.
					
                   }
            });
			  
          
      

  })
    
	
  	/*-----------------------
		Social Link edit
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('.SocialLinkEdit').bind('click', function () {
		
		//get the id of the activated element
		var sId = $(this).data('entity_id');
		var type = $(this).data('entity_type');
        var prev_url = $(this).data('pasturl');
		 
	  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"social_link_edit_request", sId:sId, type:type, prev_url:prev_url},
                success: function(data) {
				    setTimeout(function () {
                         window.location.replace("social_links_edit");
                      }, 200); //will call the function after 1 secs.
					
                   }
            });
			  
          
      

  });			
		
		
	  $('.SponsorLogo').bind('click', function (e) {
		  var sponsor_id = $(this).data('sponsor');
		  var sponsor_name = $(this).data('sname');
		  
		  var myDropzone = Dropzone.forElement(this);
		  
		  
		  myDropzone.on("sending", function(file, xhr, formData) {
						formData.append("action", "edit_sponsor_image");
						formData.append("sponsor_id", sponsor_id);
						formData.append("sponsor_name", sponsor_name);
               });
		  
		  
		  myDropzone.on("addedfile", function(file) {
			 setTimeout(function () {
                  myDropzone.processQueue();
				  
				  			 setTimeout(function () {
                                  location.reload();
				
                           }, 2000); //will call the function after 2 secs.
				
            }, 1000); //will call the function after 2 secs.
			  
				  
              });

     }); 	
	 
/*
****************
Create A La Carte
*****************
*/
$('body').on('click', 'div.AlaCarteItemNew', function() {
	
	var data = $(this).data('sponsorid');
          
		//replace the div with an input field
		$(this).replaceWith( '<input type="text" id="NewCarteItem" data-sponsorid="'+data+'" class="AlaCarteItemNew" value="" />');
		$("#NewCarteItem").focus();
		
});


$('body').on('focusout', '.AlaCarteItemNew', function() {
	
		var data = $(this).data('sponsorid');
		
		//Get the DOM element type
        var type = $(this)[0].tagName;
        
		if (type === 'INPUT'){
			$(this).replaceWith( '<div class="AlaCarteItemNew" data-sponsorid="'+data+'">Create new</div>');
		}	
		
	 
		
});

$('body').on('keypress keyup', '.AlaCarteItemNew', function(event) {
	 //The ajax call
	 
	var alacarteAjax = function(sId, value, type) {
		
		
			  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"add_alacarte_data", sId:sId, value:value, type:type},
                success: function(data) {
                     location.reload();
					
                   }
            });
			  
		
	};
	
	
	       //if the user pressing enter
		 if (event.keyCode === 13) {
			 
			var data = $(this).data('sponsorid');
			
					//Get the DOM element type
             var type = $(this)[0].tagName;
        	 if (type === 'INPUT'){
				 
				  var value = $(this).val();
				  

			    //if the user wants to delete the alacarte text 
				 
				   if (value !== '' || typeof value !== "undefined"){
					   
                           alacarteAjax(data, value, 'new');
					   
					   
				   } 

				  
				
			  }
			 


			 
			$(this).focusout();
			 
		 }//if enter pressed
	
	
	
	
	//if ESC is pressed
	if (event.keyCode === 27) {
		
		var data = $(this).data('sponsorid');
		
		//Get the DOM element type
        var type = $(this)[0].tagName;
        
		if (type === 'INPUT'){
			$(this).replaceWith( '<div class="AlaCarteItemNew" data-sponsorid="'+data+'">Create new</div>');
		}	
		
	 
			
	 } 
	 
	 
		
});



/*
****************
Modify A La Carte
*****************
*/ 

$('body').on('click', 'div.AlaCarteItem', function() {
		var content = $(this).html();
		var data = $(this).data('alacarteid');
		
		//replace the div with an input field
		$(this).replaceWith( '<input type="text" id="EditCarteItem" class="AlaCarteItem" data-alacarteid="'+data+'" value="'+content+'" />');
		$("#EditCarteItem").focus();
		
});





$('body').on('focusout', '.AlaCarteItem', function() {
		
		
		var content = $(this).val();
		var data = $(this).data('alacarteid');
		
		//Get the DOM element type
        var type = $(this)[0].tagName;
        
		if (type === 'INPUT'){
			$(this).replaceWith( '<div class="AlaCarteItem" data-alacarteid="'+data+'">'+content+'</div>');
		}	
		
	 
		
});


$('body').on('keypress keyup', '.AlaCarteItem', function(event) {
	 //The ajax call
	 
	var alacarteAjax = function(sId, value, type) {
		
		
			  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"edit_alacarte_data", sId:sId, value:value, type:type},
                success: function(data) {
                    if (data === 'Deleted'){
						 location.reload();
					}
					
                   }
            });
			  
		
	};
	
	var alacarteId = $(this).data('alacarteid');
	
	       //if the user pressing enter
		 if (event.keyCode === 13) {
			 
			
					//Get the DOM element type
             var type = $(this)[0].tagName;
        	 if (type === 'INPUT'){
				 
				  var value = $(this).val();
				  

			    //if the user wants to delete the alacarte text 
				 
				   if (value === '' || typeof value === "undefined"){
					   
					   var conf = confirm("Are you sure you want to delete this A La Carte text?");
		                 if (conf === true) {
							 alacarteAjax(alacarteId, '0', 'delete');
						 } else {
							 location.reload();
						 }
					   
					   
				   } 
		
		            //if the user wants to modify the text
				   else {
					 alacarteAjax(alacarteId, value, 'modify');
					  
				  }
				  
				
			  }
			 


			 
			$(this).focusout();
			 
		 }//if enter pressed
	
	
	 
	  //if delete key pressed pressed
	 if (event.keyCode === 46) {
		 
		   var conf = confirm("Are you sure you want to delete this A La Carte text?");
		        if (conf === true) {
					 alacarteAjax(alacarteId, '0', 'delete');
    			 }
				 else {
					  location.reload();
				 }
		
		 
	 }
	
	//if ESC is pressed
	if (event.keyCode === 27) {
		var content = $(this).val();
		var data = $(this).data('alacarteid');
		
		//Get the DOM element type
        var type = $(this)[0].tagName;
        
		if (type === 'INPUT'){
			$(this).replaceWith( '<div class="AlaCarteItem" data-alacarteid="'+data+'">'+content+'</div>');
		}	
		
			
	 } 
	 
	 
		
});


	   
      });
	  


	$(document).keyup(function(e) {
  if (e.keyCode == 27) {
			if (typeof editor.instance != "undefined" && editor.instance != '') {
			     editor.instance.editable('destroy');
				 editor.instance.css('display','none');
				 editor.instance.siblings('.SponsorDescription').css('display','block');
				 editor.instance = '';
		   }
		 $('.HelpText').fadeOut();   
	 
  }// esc
});