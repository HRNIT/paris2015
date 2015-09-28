$(document).ready(function(){

      $(function(){
          $('#SpeakerBio').editable({inlineMode: false,
		   buttons: [
        'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'align', 'outdent', 'indent', 'insertOrderedList',
        'insertUnorderedList', 'insertHTML'
         ], 
		 key: 'jgasD7ozD-11ohdnaawcwg1gD1uxu=='
		  })
      });
	  
	     $(function(){
          $('#SpeakerMPBio').editable({inlineMode: false,
		   buttons: [
        'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'align', 'outdent', 'indent', 'insertOrderedList',
        'insertUnorderedList', 'insertHTML'
         ], 
		 key: 'jgasD7ozD-11ohdnaawcwg1gD1uxu=='
		  })
      });

Dropzone.autoDiscover = false;
	
	$("div#DropDiv").dropzone({ url: "controllers/ajax.php" });
	
	$("div#DropDivCompany").dropzone({ url: "controllers/ajax.php" });

	 
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

	       	/*-----------------------
		 Change inside the element
	    ------------------------	*/
      $('#NewSpeakerSave').bind('click', function (e) {
		    //if the save button pressed
			
			            //prevents the default form submit
		  			e.preventDefault();
		            e.stopPropagation(); 
		
             save_check();
	
  })  
  
          // Listen to the click event
        $('#NewSpeakerSave').on("click", function(e) {
          // Make sure the button click doesn't submit the form:
          // Remove the file preview.
		    e.preventDefault();
            e.stopPropagation();
			
			if (typeof canGo == "undefined") {
							    //if stuff is missing
				window.location.hash = '#ReturnValue';
				$("#ReturnValue").html('<i class="fa fa-exclamation-triangle"></i> Please, upload a logo!');
				$("#ReturnValue").css("color","#9B1515");
				$("#ReturnValue").fadeIn('slow');
			}
           
		 
        });
  
	   
	   
      });


function save_check() {
		  
		  //get the data
		  var SpeakerName = $('#SpeakerName').val();
		  var SpeakerTitle = $('#SpeakerTitle').val();
		  var SpeakerBio = $('#SpeakerBio').val();
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
			if ((typeof SpeakerName != "undefined") && SpeakerName != '' && (typeof SpeakerTitle != "undefined") && SpeakerTitle != '' 
			&&  (typeof SpeakerBio != "undefined") && SpeakerBio != '' &&  (typeof CompanyName != "undefined") && CompanyName != '') {
				
				if (MainPage == true && typeof SpeakerMPBio != "undefined" && SpeakerMPBio != ''){
					 return true;
				} else {
				   if (MainPage == false) {
						 return true;
					} else {
						
						window.location.hash = '#ReturnValue';
						$("#ReturnValue").html('<i class="fa fa-exclamation-triangle"></i> Please, fill out the missing fields!');
						$("#ReturnValue").css("color","#9B1515");
						$("#ReturnValue").fadeIn('slow');
							  
					  if (typeof SpeakerMPBio == "undefined" || SpeakerMPBio == '') {
						  $('#SpeakerMPBio').css("border","1px solid #9B1515");
					  } else {
						  $('#SpeakerMPBio').css("border","1px solid #cccccc");
					  }
						
						
						
						
					}
					
					

				}
				
				
            
				
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
	
	
			    if (typeof SpeakerBio == "undefined" || SpeakerBio == '') {
					$('#SponsorBio').css("border","1px solid #9B1515");
				} else {
					$('#SponsorBio').css("border","1px solid #cccccc");
				}
				
				if (typeof CompanyName == "undefined" || CompanyName == '') {
					$('#CompanyName').css("border","1px solid #9B1515");
				} else {
					$('#CompanyName').css("border","1px solid #cccccc");
				}
	
	
               return false;
			}
	
}

  Dropzone.options.DropDivCompany = {
	  sending: function(file, xhr, formData) {    
		  formData.append("action", "add_new_speaker_company_logo");
		  formData.append("Name", $('#CompanyName').val());

		}, 
	success: function(file, response) {
		  
					 setTimeout(function () {
						   
						   document.location.href="speakers"; //will redirect to speakers
						  
					  }, 1000); //will call the function after 2 secs.
				

	  }
  }
  



 // myDropzone is the configuration for the element that has an id attribute
  // with the value my-dropzone (or myDropzone)
  Dropzone.options.DropDiv = {
	   sending: function(file, xhr, formData) {    
        formData.append("action", "add_new_speaker");
		 formData.append("SpeakerName", $("#SpeakerName").val());
		formData.append("SpeakerTitle", $("#SpeakerTitle").val());
		formData.append("SpeakerBio", $("#SpeakerBio").val());
		formData.append("CompanyName", $("#CompanyName").val());
		formData.append("CompanyWebsite", $("#CompanyWebsite").val());
		formData.append("Twitter", $("#Twitter").val());
		formData.append("Facebook", $("#Facebook").val());
		formData.append("Linkedin", $("#Linkedin").val());
		formData.append("Flickr", $("#Flickr").val());
		formData.append("Google", $("#Google").val());
		
		var MainPage = $('#MainCheckbox').prop('checked');
		if (MainPage == true) {
		  formData.append("MainPage", 1);
		} else {
		  formData.append("MainPage", 0);
		}
		
		formData.append("MainPageBio", $('#SpeakerMPBio').val());
		
    },
    init: function() {
      this.on("addedfile", function(file) {
        // Capture the Dropzone instance as closure.
       var dz = this;
	   
	   var canGo = 1;

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
		  
       		  setTimeout(function () {
				 // alert(response);
                 //document.location.href="sponsors"; //will redirect to speakers
				 
					  var rawElement = $("div#DropDivCompany").get(0);
					  var myDropzone = rawElement.dropzone;
					  var files = myDropzone.getQueuedFiles();
					
					  if (files.length == 0) {
						  document.location.href="speakers"; //will redirect to speakers
					  } else {
						  myDropzone.processQueue(); 
					  }
					 
					 
				
            }, 300); //will call the function after 2 secs.
			
      });	


      });
    }
  };
  
