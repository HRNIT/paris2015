var sendCheck = {};

sendCheck.CanGo = 0;

$(document).ready(function(){
/*
      $(function(){
          $('#SpeakerBio').editable({inlineMode: false,
		   buttons: [
        'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'align', 'outdent', 'indent', 'insertOrderedList',
        'insertUnorderedList', 'insertHTML'
         ], 
		 key: 'jgasD7ozD-11ohdnaawcwg1gD1uxu=='
		  })
      });
	  */
	  
	  
	     $(function(){
          $('#SpeakerMPBio').editable({maxCharacters: 300, inlineMode: false,
		   buttons: [
        'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'align', 'outdent', 'indent', 'insertOrderedList',
        'insertUnorderedList', 'insertHTML'
         ], 
		 key: 'jgasD7ozD-11ohdnaawcwg1gD1uxu=='
		  })
      });

Dropzone.autoDiscover = false;
	
	$("div#DropDiv").dropzone({ url: "controllers/ajax.php" });
	
	 
	 var returnval = $('#ReturnValue').html();
	 
	 if (returnval == 'Success') {
		 
		 $("#ReturnValue").html('<i class="fa fa-check-circle"></i> The data have been saved!');
		 $("#ReturnValue").css("color","#0FB323");
		 $("#ReturnValue").fadeIn('slow');
		 
		 setTimeout(function () {
		$("#ReturnValue").fadeOut('slow');
       } , 3000); //set timeout function end
	 }
	 

	   
	       //if they are red (content is missing), but the content changes
	   $('.AdminInputField').bind('change', function () {
		   var content = $(this).val();
		   
		   if (content !== '' && typeof content != 'undefined') {
			   $(this).css("border","1px solid #cccccc");
		   }
	   
	   
	     }) 


  
          // Listen to the click event
        $('#NewSpeakerSave').on("click", function(e) {
          // Make sure the button click doesn't submit the form:
          // Remove the file preview.
		    e.preventDefault();
            e.stopPropagation();
				
			
			if (sendCheck.CanGo != 1) {
							    //if stuff is missing
								
				/*				
				window.location.hash = '#ReturnValue';
				$("#ReturnValue").html('<i class="fa fa-exclamation-triangle"></i> Please, upload a logo!');
				$("#ReturnValue").css("color","#9B1515");
				$("#ReturnValue").fadeIn('slow');*/
				
				//If no picutre is uploaded!!!
						  //get the data
		  var SpeakerName = $('#SpeakerName').val();
		  var SpeakerTitle = $('#SpeakerTitle').val();
		 // var SpeakerBio = $('#SpeakerBio').val();
		  var CompanyName = $('#CompanyName').val();
		  var CompanyWebsite = $('#CompanyWebsite').val();
		  var Facebook = $('#Facebook').val();
		  var Twitter = $('#Twitter').val();
		  var Linkedin = $('#Linkedin').val();
		  var Flickr = $('#Flickr').val();
		  var Google = $('#Google').val();
		  var MainPage = 1;
		  var MainPageBio = $('#SpeakerMPBio').val();
		  var entity_id = 6;
				

				//Ide kell majd egy ajax ami továbbítja az adatokat :D   add_new_press actionnal :)
	
if ((typeof SpeakerName != "undefined") && SpeakerName != '') {	
				
									$.ajax({
								url: 'controllers/ajax.php',
								type: 'POST',
								data: {action:"add_new_press", SpeakerName:SpeakerName, SpeakerTitle:SpeakerTitle, CompanyName:CompanyName, CompanyWebsite:CompanyWebsite, Facebook:Facebook, Twitter:Twitter, Linkedin:Linkedin, Flickr:Flickr, Google:Google, MainPage:MainPage, MainPageBio:MainPageBio, entity_id:entity_id},
								success: function(data) {
									if (data != '' && typeof data != 'undefined'){
										
										
										 $('#ReturnValue').html('<i class="fa fa-check-circle"></i> The data have been saved!');
										 $('#ReturnValue').css("color","#0FB323");
										 $('#ReturnValue').fadeIn('slow');
										

										
									  setTimeout(function () {
		                                          $('#ReturnValue').fadeOut('slow');
                                          } , 3000); //set timeout function end
										  
										setTimeout(function () {
		                                          location.reload();
                                          } , 5000); //set timeout function end
										   
										
									}
									

								}
							});	
							
    }//if speakerName != undefined
	else {
		
			    //if stuff is missing
				window.location.hash = '#ReturnValue';
				$("#ReturnValue").html('<i class="fa fa-exclamation-triangle"></i> Please, fill out the missing fields!');
				$("#ReturnValue").css("color","#9B1515");
				$("#ReturnValue").fadeIn('slow');

				
			    if (typeof SpeakerName == "undefined" || SpeakerName == '') {
					$('#SpeakerName').css("border","1px solid #9B1515");
				} else {
					$('#SpeakerName').css("border","1px solid #cccccc");
				}
				
	}// speaker name != else
				
}//sendCheck.CanGo != 1
				
	
           
		 
        });//$('#NewSpeakerSave').on("click"
  
	   
	   
      });


function save_check() {
		  
		  //get the data
		  var SpeakerName = $('#SpeakerName').val();
		  var SpeakerTitle = $('#SpeakerTitle').val();
		 // var SpeakerBio = $('#SpeakerBio').val();
		  var CompanyName = $('#CompanyName').val();
		  var CompanyWebsite = $('#CompanyWebsite').val();
		  var Facebook = $('#Facebook').val();
		  var Twitter = $('#Twitter').val();
		  var Linkedin = $('#Linkedin').val();
		  var Flickr = $('#Flickr').val();
		  var Google = $('#Google').val();
		  var MainPage = $('#MainCheckbox').prop('checked');
		  var SpeakerMPBio = $('#SpeakerMPBio').val();
		  
		  
		  
		  	   //check if the fields are filled out or not
			if ((typeof SpeakerName != "undefined") && SpeakerName != '') {
				return true;
			
				
            
				
			} else {
		
			    //if stuff is missing
				window.location.hash = '#ReturnValue';
				$("#ReturnValue").html('<i class="fa fa-exclamation-triangle"></i> Please, fill out the missing fields!');
				$("#ReturnValue").css("color","#9B1515");
				$("#ReturnValue").fadeIn('slow');

				
			    if (typeof SpeakerName == "undefined" || SpeakerName == '') {
					$('#SpeakerName').css("border","1px solid #9B1515");
				} else {
					$('#SpeakerName').css("border","1px solid #cccccc");
				}
	
	
				if (typeof SpeakerTitle == "undefined" || SpeakerTitle == '') {
					$('#SpeakerTitle').css("border","1px solid #9B1515");
				} else {
					$('#SpeakerTitle').css("border","1px solid #cccccc");
				}
	
	
				

               return false;
			}
	
}





 // myDropzone is the configuration for the element that has an id attribute
  // with the value my-dropzone (or myDropzone)
  Dropzone.options.DropDiv = {
	   sending: function(file, xhr, formData) {    
        formData.append("action", "add_new_press");
		 formData.append("SpeakerName", $("#SpeakerName").val());
		formData.append("SpeakerTitle", $("#SpeakerTitle").val());
		formData.append("CompanyName", $("#CompanyName").val());
		formData.append("CompanyWebsite", $("#CompanyWebsite").val());
		formData.append("Twitter", $("#Twitter").val());
		formData.append("Facebook", $("#Facebook").val());
		formData.append("Linkedin", $("#Linkedin").val());
		formData.append("Flickr", $("#Flickr").val());
		formData.append("Google", $("#Google").val());
		formData.append("entity_id", 6);
	    formData.append("MainPage", 1);
        formData.append("MainPageBio", $('#SpeakerMPBio').val());
		
    },
    init: function() {
      this.on("addedfile", function(file) {
        // Capture the Dropzone instance as closure.
       var dz = this;
	   
	   var canGo = 1;
        sendCheck.CanGo = 1;
		
		
          // Listen to the click event
        $('#NewSpeakerSave').on("click", function(e) {
			
          // Make sure the button click doesn't submit the form:
          // Remove the file preview.
		    e.preventDefault();
            e.stopPropagation();
			
			var Check = save_check();

			if (Check == true) {
				   dz.processQueue();
			
          
			
		  //maybe we send aaaaaaaall the data with ajax instead of post
          // If you want to the delete the file on the server as well,
          // you can do the AJAX request here.
	  

		 }
		 
		 
        });
		
	  this.on("success", function(file, response) {
		      $('#NewSpeakerSave').css('display','none');
			  
       		  setTimeout(function () {
				 // alert(response);
                 //document.location.href="sponsors"; //will redirect to speakers
				 
	
					
				
						   $('#ReturnValue').html('<i class="fa fa-check-circle"></i> The data have been saved! The page will reload!');
						   $('#ReturnValue').css("color","#0FB323");
						   $('#ReturnValue').fadeIn('slow'); 
			
						  setTimeout(function () {
									location.reload();
							} , 3000); //set timeout function end

				
            }, 300); //will call the function after 2 secs.
			
      });	


      });
    }
  };
  
