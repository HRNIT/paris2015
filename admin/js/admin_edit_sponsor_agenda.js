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

		
		
	  $('.SponsorLogo').bind('click', function (e) {
		  var sponsor_id = $(this).data('sponsor');
		  var sponsor_name = $(this).data('sname');
		  
		  var myDropzone = Dropzone.forElement(this);
		  
		  
		  myDropzone.on("sending", function(file, xhr, formData) {
						formData.append("action", "edit_agenda_sponsor_image");
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