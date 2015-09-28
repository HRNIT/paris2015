var currentPerm = {};   
   currentPerm.users = new Array;
   currentPerm.vals = new Array;
   
   $(document).ready(function(){ 
   
      $('.PermissionCheckbox').each(function(i, obj) {
		  
		     var user = $(this).data('sponsorpermission-user');
		     var check = $(this).prop('checked');
			 
			 currentPerm.users[i] = user;
             currentPerm.vals[i] = check;
             
        });
		 
		 
    	 /*-----------------------
		Sponsor Permission remove
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('.PermissionButton').bind('click', function () {
		
		  var sId = $(this).data('sponsorid');
		
		$('.PermissionCheckbox').each(function(i, obj) {
		  
		     var user_id = $(this).data('sponsorpermission-user');
		     var check = $(this).prop('checked');
			 
			  
			   //if the value changed
              if (check != currentPerm.vals[i] && user_id == currentPerm.users[i]) {
				        //if the checkbox unchecked
				       if (check == false) {
						   
						   
								$.ajax({
									url: 'controllers/ajax.php',
									type: 'POST',
									data: {action:"SponsorPermissionDelete", user_id:user_id, sId:sId},
									success: function(data) {
										
									}
								});
								
						   
						   
					   }
					   
					    //if the checkbox checked
					   if (check == true) {
								$.ajax({
								  url: 'controllers/ajax.php',
								  type: 'POST',
								  data: {action:"SponsorPermissionAdd", user_id:user_id, sId:sId},
								  success: function(data) {
									  
								  }
							  });
											 
						   
						   
					   }
					   
				  
			  }//value change check
			  
        }); //each
		
	     $("#ReturnValue").html('<i class="fa fa-check-circle"></i> The data have been saved!');
		 $("#ReturnValue").css("color","#0FB323");
		 $("#ReturnValue").fadeIn('slow');
		 
		 setTimeout(function () {
		$("#ReturnValue").fadeOut('slow');
       } , 2000); //set timeout function end
		
		
	setTimeout(function(){
		
		 location.reload();
		 
		 }, 2000);
				
 
			
			
      

  })
  
  
		 
	   
   });
