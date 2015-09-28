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
								data: {action:"edit_mediapartner", sId:sId, edit_type:edit_type, new_data:new_data},
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
                data: {action:"edit_mediapartner", sId:sId, edit_type:edit_type, new_data:new_data},
                success: function(data) {
					alert('The Sponsor has been deleted!');
				    setTimeout(function () {
                        window.location.replace("../press");
                      }, 1000); //will call the function after 1 secs.
					
                   }
            });
			  
          
           }

  })
  

    
	
	
	

    
	
  	/*-----------------------
		Social Link edit
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('.SocialLinkEdit').bind('click', function () {
		
		//get the id of the activated element
		var sId = $(this).data('entity_id');
		var type = 5;
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
						formData.append("action", "edit_mediapartner_image");
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
	 




	   
      });
	  


