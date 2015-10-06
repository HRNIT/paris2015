var sendCheck = {};

sendCheck.CanGo = 0;

$(document).ready(function(){

      $(function(){
          $('#SponsorBio').editable({inlineMode: false,
		   buttons: [
        'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'align', 'outdent', 'indent', 'insertOrderedList',
        'insertUnorderedList', 'insertHTML', 'createLink'
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
		 
		 
		 	       //alacarte checkbox
	   $('#Alacarte').bind('click', function () {
		   
           var check = $(this).prop('checked');
					
				if (check == true) {
					$("#AlaCarteField").fadeIn();
				} else {
					
					$("#AlaCarteField").fadeOut();
				}
				
	   
	   
	     }) 

	       	/*-----------------------
		 Change inside the element
	    ------------------------	*/
      $('#NewSponsorSave').bind('click', function (e) {
		    //if the save button pressed
			
			            //prevents the default form submit
		  			e.preventDefault();
		            e.stopPropagation(); 
					
	if (sendCheck.CanGo !== 1) {				
		
		  //get the data
		  var SponsorName = $('#SponsorName').val();
		  var SponsorURL = $('#SponsorURL').val();
		  var SponsorBio = $('#SponsorBio').val();
		  var Facebook = $('#Facebook').val();
		  var Twitter = $('#Twitter').val();
		  var Linkedin = $('#Linkedin').val();
		  var Flickr = $('#Flickr').val();
		  var Google = $('#Google').val();
	      var Category = $('#Category').val();	
		  
		    
		  var AlacarteText = $('#AlaCarteText').val();
		  if (typeof AlacarteText === "undefined"){
			$('#AlaCarteText').val('');
		  }
	 
			var check = $('#Alacarte').prop('checked');
				
			if (check === true) {
				var Alacarte = 1;
			} else {
				
				var Alacarte = 0;
			}
		
		 var OnlyCarte = $('#OnlyAlacarte').prop('checked');	
		 
			if (OnlyCarte === true) {
				Category = 20;
			} 
		  
		  
		  	   //check if the fields are filled out or not
			if ((typeof SponsorName != "undefined") && SponsorName != '' && (typeof SponsorURL != "undefined") && SponsorURL != '' && (typeof SponsorBio != "undefined") && SponsorBio != '' && (typeof Category != "undefined") && Category != '' ) {
				
            									$.ajax({
								url: 'controllers/ajax.php',
								type: 'POST',
								data: {action:"add_new_sponsor", SponsorName:SponsorName, SponsorURL:SponsorURL, SponsorBio:SponsorBio, Category:Category, Facebook:Facebook, Twitter:Twitter, Linkedin:Linkedin, Flickr:Flickr, Google:Google, Alacarte:Alacarte, AlacarteText:AlacarteText},
								success: function(data) {
						           if (typeof data != "undefined"){
										
										
										 $('#ReturnValue').html('<i class="fa fa-check-circle"></i> The data have been saved! The page will reload!');
										 $('#ReturnValue').css("color","#0FB323");
										 $('#ReturnValue').fadeIn('slow');
										

										
									  setTimeout(function () {
		                                          $('#ReturnValue').fadeOut('slow');
                                          } , 3000); //set timeout function end
										  
										setTimeout(function () {
		                                          location.reload();
                                          } , 3000); //set timeout function end
										   
										
									}
							}

								
							});		
				
			} else {
		
			    //if stuff is missing
				window.location.hash = '#ReturnValue';
				$("#ReturnValue").html('<i class="fa fa-exclamation-triangle"></i> Please, fill out the missing fields!');
				$("#ReturnValue").css("color","#F54949");
				$("#ReturnValue").fadeIn('slow');

		        setTimeout(function () {
		            $("#ReturnValue").fadeOut('slow');
                 } , 3000); //set timeout function end
	   
	   
			    if (typeof SponsorName == "undefined" || SponsorName == '') {
					$('#SponsorName').css("border","1px solid #9B1515");
				} else {
					$('#SponsorName').css("border","1px solid #cccccc");
				}
	
	
				if (typeof SponsorURL == "undefined" || SponsorURL == '') {
					$('#SponsorURL').css("border","1px solid #9B1515");
				} else {
					$('#SponsorURL').css("border","1px solid #cccccc");
				}
	
	
			    if (typeof SponsorBio == "undefined" || SponsorBio == '') {
					$('#SponsorBio').css("border","1px solid #9B1515");
				} else {
					$('#SponsorBio').css("border","1px solid #cccccc");
				}
				
			    if (typeof Category == "undefined" || Category == '') {
					$('#Category').css("border","1px solid #9B1515");
				} else {
					$('#Category').css("border","1px solid #cccccc");
				}				
	
               return false;
			}
	   
	}
	
  }); 
  

  
	   
	   
      });


function save_check() {
		  
		  //get the data
		  var SponsorName = $('#SponsorName').val();
		  var SponsorURL = $('#SponsorURL').val();
		  var SponsorBio = $('#SponsorBio').val();
		  var Facebook = $('#Facebook').val();
		  var Twitter = $('#Twitter').val();
		  var Linkedin = $('#Linkedin').val();
		  var Flickr = $('#Flickr').val();
		  var Google = $('#Google').val();
		  var Category = $('#Category').val();
		  
		  var AlacarteText = $('#AlaCarteText').val();
		      if (typeof AlacarteText === "undefined"){
				$('#AlaCarteText').val('');
			  }
		 
		        var check = $('#Alacarte').prop('checked');
					
				if (check === true) {
					Alacarte = 1;
				} else {
					
					Alacarte = 0;
				}
			
			 var OnlyCarte = $('#OnlyAlacarte').prop('checked');	
			 
			 	if (OnlyCarte === true) {
					Category = 20;
				} 
		  
		  
		  	   //check if the fields are filled out or not
			if ((typeof SponsorName != "undefined") && SponsorName != '' && (typeof SponsorURL != "undefined") && SponsorURL != '' 
			&&  (typeof SponsorBio != "undefined") && SponsorBio != '' &&  (typeof Category != "undefined") && Category != '') {
	
            return true;
				
			} else {
		
			    //if stuff is missing
				window.location.hash = '#ReturnValue';
				$("#ReturnValue").html('<i class="fa fa-exclamation-triangle"></i> Please, fill out the missing fields!');
				$("#ReturnValue").css("color","#9B1515");
				$("#ReturnValue").fadeIn('slow');

				
			    if (typeof SponsorName == "undefined" || SponsorName == '') {
					$('#SponsorName').css("border","1px solid #9B1515");
				} else {
					$('#SponsorName').css("border","1px solid #cccccc");
				}
	
	
				if (typeof SponsorURL == "undefined" || SponsorURL == '') {
					$('#CompanyURL').css("border","1px solid #9B1515");
				} else {
					$('#CompanyURL').css("border","1px solid #cccccc");
				}
	
	
			    if (typeof SponsorBio == "undefined" || SponsorBio == '') {
					$('#SponsorBio').css("border","1px solid #9B1515");
				} else {
					$('#SponsorBio').css("border","1px solid #cccccc");
				}

			    if (typeof Category == "undefined" || Category == '') {
					$('#Category').css("border","1px solid #9B1515");
				} else {
					$('#Category').css("border","1px solid #cccccc");
				}
	
               return false;
			}
	
}


 // myDropzone is the configuration for the element that has an id attribute
  // with the value my-dropzone (or myDropzone)
  Dropzone.options.DropDiv = {
	   sending: function(file, xhr, formData) {    
        formData.append("action", "add_new_sponsor");
		 formData.append("SponsorName", $("#SponsorName").val());
		formData.append("SponsorURL", $("#SponsorURL").val());
		formData.append("SponsorBio", $("#SponsorBio").val());
		formData.append("Category", $("#Category").val());
		formData.append("Twitter", $("#Twitter").val());
		formData.append("Facebook", $("#Facebook").val());
		formData.append("Linkedin", $("#Linkedin").val());
		formData.append("Flickr", $("#Flickr").val());
		formData.append("Google", $("#Google").val());
		formData.append("AlaCarteText", $('#AlaCarteText').val());
		
			var check = $('#Alacarte').prop('checked');
					
				if (check == true) {
					Alacarte = 1;
				} else {
					
					Alacarte = 0;
				}
				
		
		formData.append("AlaCarte", Alacarte);
		
    },
    init: function() {
      this.on("addedfile", function(file) {
        // Capture the Dropzone instance as closure.
       var dz = this;
	   
	   var canGo = 1;
       sendCheck.CanGo = 1;
          // Listen to the click event
        $('#NewSponsorSave').on("click", function(e) {
			
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
                 document.location.href="sponsors"; //will redirect to speakers
				
            }, 1000); //will call the function after 2 secs.
			
      });	


      });
    }
  };
  
