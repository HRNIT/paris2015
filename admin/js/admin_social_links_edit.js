  
   var Socials = {};
   
   $(document).ready(function(){ 
   		 var returnval = $('.ReturnValue').html();
	 
	 if (returnval == 'Success') {
		 
		 $(".ReturnValue").html('<i class="fa fa-check-circle"></i> The data have been saved!');
		 $(".ReturnValue").css("color","#0FB323");
		 $(".ReturnValue").fadeIn('slow');
		 
		 setTimeout(function () {
		$(".ReturnValue").fadeOut('slow');
       } , 3000); //set timeout function end
	 }
	
   
   
   //we check if something is changed, that's why we save those values
    Socials.Facebook = $( "#Facebook" ).val();
	Socials.Twitter = $( "#Twitter" ).val();
	Socials.Linkedin = $( "#Linkedin" ).val();
	Socials.Flickr = $( "#Flickr" ).val();
	Socials.Google = $( "#Google" ).val();
	
	/*
	Next task: Lekezelni a save gombot
	megvizsgálni, hogy történt-e változás bármelyik socialnál
	megnézni, hogy volt-e korábban link és most van-e (ez lesz a törlés)
	https / http ellenőrzés lekezelés
	*/
	
		 
    	 /*-----------------------
		Social Link edit
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('.SocialSubmitButton').bind('click', function () {
		
		var sId = $( "#Name" ).data('sociallinkid'); //sponsor / speaker whatever id.. what's the actual type is :D
		var sType = $( "#Name" ).data('sociallinktype'); // type of what we are editing :D sponsor or speaker or etc..
		
		var i = 0;
		var ChangedLink = new Array;
		var s = 0;
		var DeletedLink = new Array;
		var DelAlert = '';
		
		var sLinks = new Array; //Link types what have been edited / deleted
		var sURLs = new Array; //actual new urls
		var m = 0; //main index variable
		
		$.each(Socials, function(index, value) {
			var NewVal = $('#'+index).val();
             if (NewVal != value) {
				 if (NewVal == '' || typeof NewVal == 'undefined') {
					    DeletedLink[s] =  $('#'+index).data('sociallink-typeid');
						DelAlert += index+" \n";
					    s++;
				   } else { //if there was a link but it got erased
					   ChangedLink[i] = index;
					   i++; 
				   } //erased link else end

				 
			 }//if newVal != value
			 
         }); //each social

		 if (DelAlert != '') {
			  var conf = confirm("Are you sure you want to delete these social links: \n"+DelAlert);
		      if (conf == true) {
				   $.each(DeletedLink, function(index, value) {
			            sLinks[m] = value;
			            sURLs[m] = '-1';
						m++;
                    }); //each deleted
		
			  }
		 }
		 
		 
	   $.each(ChangedLink, function(index, value) {
			  sLinks[m] = $('#'+value).data('sociallink-typeid'); //save the link type to output
			  
				if (value == "Twitter") {
					//convert the @asd to twitter.com/asd
					 var  socUrl = $('#Twitter').val();
					 
					  if (socUrl.charAt(0) == "@") {
						 socUrl = socUrl.slice(1,socUrl.length);
						 socUrl = "https://twitter.com/"+socUrl;
					  }  
					 
					 
				} else {
				     var  socUrl = $('#'+value).val(); //if it's not a twitter link
				}
				
			  sURLs[m] = socUrl;//save the url
			   m++;
		  }); //each changed
		
		
				  $.each(sLinks, function(index, value) {

                    }); //each deleted
					
					$.each(sURLs, function(index, value) {

                    }); //each deleted
		
		 $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"SocialLinkUpdate", sType:sType, sId:sId, sLinks:sLinks, sURLs:sURLs},
                success: function(data) {

		                     location.reload();
                }
            });
  

  })
  

		 
		 

		 
	   
   });
