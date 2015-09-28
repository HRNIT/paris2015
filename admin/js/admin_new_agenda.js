

	  

   
   $(document).ready(function(){ 
 

 

		 
 
		//'<option value="'.$data['id'].'">'.$data['location'].'</option> 
		 
		 		//If user clicks the "Highlighted" checkbox
   $('#Break').on('click', function () {
	   
          // save the button and the select elements in to a variable

 
			var n = $( "#Break:checked" ).length;
			if (n === 1) {
				//if the break session checkbox checked
					$('#AgendaIcon').show(); //show break session div
					//$('#SpeakersDiv').hide();  //hide content
					//$('#ModeratorChkBox').hide(); //hide moderator chkbox
	   
			} else {
				//show everything as normal
	            $('#AgendaIcon').hide();
				//$('#SpeakersDiv').show();
				//$('#ModeratorChkBox').show();
			}

	     })
		
		
		
/*		 
		 /// Moderator session
		 
		 		//If user clicks the "no picture" checkbox
   $('#Moderator').on('click', function () {
	   
          // save the button and the select elements in to a variable

 
			var n = $( "#Moderator:checked" ).length;
			if (n === 1) {
					$('#AgendaIcon').hide();
					$('#SpeakersDiv').show();
					$('#BreakChkBox').hide();
					$('#TimeTable').hide();
					$('#SessionAbstract').hide();
					$('#MultipleHelp').text('You can only choose one speaker as a moderator!'); 
					$('#NewSpeakerLink').show();
					$('#NewSpeaker').show();
					
	   
			} else {
				//show everything as normal
	            $('#AgendaIcon').hide();
				$('#SessionAbstract').show();
				$('#SpeakersDiv').show();
				$('#BreakChkBox').show();
				$('#TimeTable').show();
				$('#NewSpeakerLink').hide();
				$('#NewSpeaker').hide();
				$('#MultipleHelp').text('In order to select multiple speakers, please hold Ctrl and then click on the speakers'); 
			}

	     })		 
		 */
		 
		 
		 
	
var SelectedSpeaker = {};
	      	/*-----------------------
		 Change inside the element
	    ------------------------	*/
      $('#Alphabet').bind('change', function () {
		  
		  var asd = this;
		  var sh = []; //this will contain all the speakers form the speakers hidden list
		  var sh_val = [];  //this stores the speakers id-s form the hidden list
		  
		/*-------------------------------------------------------  */
		// Backup the selected values
		   var sp_backup = []; //this is a backup for the speakers (the actual selected list)
		   var sp_backup_val = []; //this is a value backup for the spakers
		    
		  //save the speaker list content if it has any
		  
		  var sp_backup_l = document.getElementById("Speakers").length;
		  
		  if (sp_backup_l > 0) {
			   for(var spc = 0; spc<sp_backup_l; spc++) {
			      sp_backup[spc] = $('#Speakers option').eq(spc).text();
			    sp_backup_val[spc] = $('#Speakers option').eq(spc).val();
		      } 
			  
			  SelectedSpeaker.SelText = sp_backup; 
			  SelectedSpeaker.SelValue = sp_backup_val;
		  }

		 /*--------------------------------------------------------*/ 
		  var slh_lenght = document.getElementById("SpeakersListHidden").length;;
		  
		  for(var slh = 0; slh<slh_lenght; slh++) {
			sh[slh] = $('#SpeakersListHidden option').eq(slh).text();
			sh_val[slh] = $('#SpeakersListHidden option').eq(slh).val();
		  } 
		   
		   
    $('#SpeakersList')
	.find('option')
    .remove()
    .end();
		


   var items = new Array();
   for (var i = 0, j = asd.options.length; i < j; i++)
   {
       if (asd.options[i].selected)
       {
           items.push(asd.options[i].value);
       }
   }
   // selectObject.id holds the "id"
   var itemsToString = items.toString();
   
   //split and get values.
   var s = itemsToString.split(',');
   for(var k=0; k<s.length; k++)
      {
   
   for (var i = 0, j = sh.length; i < j; i++)
   {	 
   
   
   //to check the last name instead of first name
      var last = sh[i].split(' ');
	  var part_count = last.length -1;

       if (last[part_count][0].toLowerCase() == s[k].toLowerCase())
       {
		   $('#SpeakersList')
         .append($("<option></option>")
         .attr("value",sh_val[i])
         .text(sh[i])); 
		 
          
       }
   } //for var i
		 
      } //for var k

	
  })
	
	
	
	      	/*-----------------------
		 Change inside the element
	    ------------------------	*/
      $('#SpeakersList').bind('change', function () {
		  
		  var asd = this;
		  var sh = [];
		  var sh_val = [];
		  
		 $('#Speakers')
	       .find('option')
           .remove()
            .end();
			var HiddenSpeakersVal = '';
		
		  var moderator = $( "#Moderator:checked" ).length;
			if (moderator === 1) {
					  SelectedSpeaker.SelText = "";
	                  SelectedSpeaker.SelValue = "";
	   
			}
		//	 We add the already selected values to the speaker select
		
		if (typeof SelectedSpeaker.SelText != 'undefined' && SelectedSpeaker.SelText[0] != '') {
			
			  for (var i = 0, j = SelectedSpeaker.SelText.length; i < j; i++){	 
				 if (SelectedSpeaker.SelText[i] != '') {
					 
					  $('#Speakers')
					 .append($('<option></option>')
					 .attr("value",SelectedSpeaker.SelValue[i])
					 .text(SelectedSpeaker.SelText[i])); 
					 
					 HiddenSpeakersVal += SelectedSpeaker.SelValue[i]+"|";
					 
				 }
		     
				   } //for var i
					  SelectedSpeaker.SelText = "";
	                  SelectedSpeaker.SelValue = "";
			} //type not undefined
		
		  var slh_lenght = document.getElementById("SpeakersList").length;;
		  
		  for(var slh = 0; slh<slh_lenght; slh++) {
			   var err = 0;
			   if (typeof SelectedSpeaker.SelText != 'undefined' && SelectedSpeaker.SelText[0] != '') {  
				   for (var i = 0, j = SelectedSpeaker.SelText.length; i < j; i++){	 
					 if (typeof SelectedSpeaker.SelValue[i] != 'undefined') {
							if ($('#SpeakersList option:selected').eq(slh).val() == SelectedSpeaker.SelValue[i]) {
								err = 1;
							}
						 
					 }
				 
					   } //for var i
					 } //type not undefined
			  
			  if (err == 0) {
					sh[slh] = $('#SpeakersList option:selected').eq(slh).text();
					sh_val[slh] = $('#SpeakersList option:selected').eq(slh).val();
					if (typeof sh_val[slh] != 'undefined') {
						HiddenSpeakersVal += sh_val[slh]+"|";
					}
			
			  }

			
			
			
			 
		  } 
		   
		   
		   var SHlength = sh.length;
		   
		  	if (moderator === 1) {
			    SHlength = 1;
	   
			}
		  
   for (var i = 0, j = SHlength; i < j; i++){	 
		 if (sh[i] !== '') {
			   if (moderator === 1) {
				   var modName = 'Moderator: '+sh[i];
				    $('#AgendaTitle').val(modName);	
					tag_create();   
			    }
			
			  $('#Speakers')
			 .append($('<option></option>')
			 .attr("value",sh_val[i])
			 .attr("class","SpeakerSelectOption")
			 .text(sh[i]))
			 .on('click', function () {
				   var ids = '';
               $('#Speakers option:selected').remove();
			  		/*-------------------------------------------------------  */
		// Backup the selected values
		   var sp_backup = []; //this is a backup for the speakers (the actual selected list)
		   var sp_backup_val = []; //this is a value backup for the spakers
		    
		  //save the speaker list content if it has any
		  
		  var sp_backup_l = document.getElementById("Speakers").length;
		  
		  if (sp_backup_l > 0) {
			   for(var spc = 0; spc<sp_backup_l; spc++) {
			      sp_backup[spc] = $('#Speakers option').eq(spc).text();
			      sp_backup_val[spc] = $('#Speakers option').eq(spc).val();
				  if ( sp_backup_val[spc] > -1) {
					  ids +=  sp_backup_val[spc] + "|";
				  }
		      } 
			  
			  SelectedSpeaker.SelText = sp_backup; 
			  SelectedSpeaker.SelValue = sp_backup_val;
			  $('#SelectedSpeakers').val(ids); 
		  } else {
			   $('#SelectedSpeakers').val("-1"); 
			   	  SelectedSpeaker.SelText = "" 
	              SelectedSpeaker.SelValue = "";
		  }

	     }); 
		 }
      

		 
          
 
   } //for var i
   if (HiddenSpeakersVal != '') {
	   $('#SelectedSpeakers').val(HiddenSpeakersVal);
   } else {
	  $('#SelectedSpeakers').val("-1"); 
	  SelectedSpeaker.SelText = "" 
	  SelectedSpeaker.SelValue = "";
   }
 

	
  })
	

	
			 		//If user clicks the "no picture" checkbox
   $('#SpeakerSearch').bind('keyup', function () {
	   
		 // var Starget = $(this).val()+String.fromCharCode(event.keyCode);
		 var Starget = $(this).val();

		  var sh = []; //this will contain all the speakers form the speakers hidden list
		  var sh_val = [];  //this stores the speakers id-s form the hidden list
		  
		/*-------------------------------------------------------  */
		// Backup the selected values
		  var sp_backup = []; //this is a backup for the speakers (the actual selected list)
		   var sp_backup_val = []; //this is a value backup for the spakers
		    
		  //save the speaker list content if it has any
		  
		  var sp_backup_l = document.getElementById("Speakers").length;
		  
		  if (sp_backup_l > 0) {
			   for(var spc = 0; spc<sp_backup_l; spc++) {
			      sp_backup[spc] = $('#Speakers option').eq(spc).text();
			    sp_backup_val[spc] = $('#Speakers option').eq(spc).val();
		      } 
			  
			  SelectedSpeaker.SelText = sp_backup; 
			  SelectedSpeaker.SelValue = sp_backup_val;
		  }

		 /*--------------------------------------------------------*/ 
		  var slh_lenght = document.getElementById("SpeakersListHidden").length;;
		  
		  for(var slh = 0; slh<slh_lenght; slh++) {
			sh[slh] = $('#SpeakersListHidden option').eq(slh).text();
			sh_val[slh] = $('#SpeakersListHidden option').eq(slh).val();
		  } 
		   
		   
    $('#SpeakersList')
	.find('option')
    .remove()
    .end();
		


   var items = new Array();
   
     for (var i = 0, j = sh.length; i < j; i++){	
	    var temp = (sh[i].toLowerCase()).search(Starget.toLowerCase());
	       if (temp > -1) {
	          items.push(sh[i]);
		   }
    	 } //for i till sh.leng
   
   // selectObject.id holds the "id"
   var itemsToString = items.toString();

   //split and get values.
   var s = itemsToString.split(',');
   
   for(var k=0; k<s.length; k++)
      {
   
   for (var i = 0, j = sh.length; i < j; i++){	 
   
   
   //to check the last name instead of first name


       if (sh[i] == s[k])
       {
		   $('#SpeakersList')
         .append($("<option></option>")
         .attr("value",sh_val[i])
         .text(sh[i])); 
		 
          
       }
   } //for var i
		 
      } //for var k

			
			
	     })
 
	   
   });
   
  
   $(document).ready(function(){

     $('#AgendaSubmit').on('click', function (e) {
		 		  	e.preventDefault();
		            e.stopPropagation(); 
		 
		 var title = $('#AgendaTitle').val();
		 var start_hour =  $('#AgendaTimeStartHour').val();
		 var start_minute =  $('#AgendaTimeStartMinute').val();
		 var end_hour =  $('#AgendaTimeEndHour').val();
		 var end_minute =  $('#AgendaTimeEndMinute').val();
		 var day = $('#Day').val();
		 var category = $('#StreamCategory').val(); 
		 var description = $('#Abstract').val();
		      
			   if (typeof description == "undefined"){
				   var description = '';
			   }
		 
		 var speakers = $('#SelectedSpeakers').val();  
		 
		      if (typeof speakers == "undefined"){
				   var speakers = '';
			   }
		 
		 
		
		    var check = $('#Break').prop('checked');
			
				if (check == true) {
					var type = $("#BreakType").val();
				} else {
					
					var type = 1;
				}
				
		if ( (typeof title != "undefined" && title != '') && (typeof start_hour != "undefined" && start_hour != '') && (typeof start_minute != "undefined" && start_minute != '') && (typeof end_hour != "undefined" && end_hour != '') && (typeof end_minute != "undefined" && end_minute != '') && (typeof day != "undefined" && day != '') && (typeof category != "undefined" && category != ''))	{
								
								$.ajax({
								url: 'controllers/ajax.php',
								type: 'POST',
								data: {action:"save_agenda", title:title, start_hour:start_hour, start_minute:start_minute, end_hour:end_hour, end_minute:end_minute, day:day, category:category, description:description, speakers:speakers, type:type},
								success: function(data) {
									if (data != '' && typeof data != 'undefined'){

									
										$('#ReturnValue').html('<i class="fa fa-check-circle"></i> The data have been saved!');
										$('#ReturnValue').css("color","#0FB323");
										$('#ReturnValue').fadeIn('slow');
										
                                         $('#AgendaSubmit').attr('disabled','disabled');
										
									  setTimeout(function () {
		                                          $('#ReturnValue').fadeOut('slow');
                                          } , 2000); //set timeout function end
										  
										 setTimeout(function () {
		                                          location.reload();
                                          } , 1000); //set timeout function end
										

										
									}
									

								}
							});
							
							
			
			
		} else {
			alert('Upload Error! Please refresh the page.');
			//ide kell majd, hogy bepirosozza a hiányzó részeket
		}
				
		 
		  
	  });	  
		  
   });
   
  
   
 $(document).ready(function(){

      $(function(){
          $('#Abstract').editable({inlineMode: false,
		   buttons: [
        'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'align', 'outdent', 'indent', 'insertOrderedList',
        'insertUnorderedList', 'insertHTML', 'createLink'
         ], 
		 key: 'jgasD7ozD-11ohdnaawcwg1gD1uxu=='
		});
		  
	  });	  
		  
   });