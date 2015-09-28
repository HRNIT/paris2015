<!-- Stage filter selector list based on Screen width -->
var filters = {};
filters.data = new Array;
filters.i = 0; 
$(document).ready(function() {

 
     //****************************			  
	//INPUT FIELD SEARCH  (rest of it is in the vendor/autocomplete/src)
	//*****************************
		$.ajax({
		url: 'controllers/ajax.php',
		type: 'POST',
		dataType:'json',
		data: {action:"get_search_data"},
		success: function(data) {
		
				
				$("#SearchField").tokenInput(data, {
					theme: "facebook",
					minChars: 2,
					preventDuplicates: true
				});
				 

			

		}
	});
	

	 //****************************			  
	//Filters 
	//*****************************


		 $('.Filters ul li').on("click", function(e) {
			 $('#FilterResponse').html('');
			   //clear out the filter grid
			   var liClass = $(this).attr("class");
			   var id = $(this).data("category");
			   var content =  $(this).html();
			   var ForSelectClass = $(this);
			   
			      if(typeof liClass == "undefined" || liClass == ''){
					  $(this).addClass("SelectedFilter");
					  filters.data[filters.i] = new Array;
					  filters.data[filters.i].push(id);
					  filters.data[filters.i].push(content);
					  getDistinctArray(filters.data);
					  filters.i++;
					  
				  } else {
					          //if the user wants to remove a filter
					  if (liClass == "SelectedFilter") {
							$(this).removeClass("SelectedFilter");  
						   
							  filters.data = remove_elem(filters.data,id);
					  
					  }
					  
					      //if he wants to select all filters
					  if (liClass == "SelectAllClass") {
						      $(this).removeClass('SelectAllClass');
							  $(this).addClass('ClearAllClass');
							  
                                  $(this).siblings('li').each( function () {
									   var siblingClass = $(this).attr("class");
									   var allId = $(this).data("category");
									   var allContent =  $(this).html();
												   									  
									    if(typeof siblingClass == "undefined" || siblingClass == ''){
												   var allId = $(this).data("category");
												   var allContent =  $(this).html();
												
												$(this).addClass("SelectedFilter");
												filters.data[filters.i] = new Array;
												filters.data[filters.i].push(allId);
												filters.data[filters.i].push(allContent);
												getDistinctArray(filters.data);
												filters.i++;
												ForSelectClass.html('<span class="SelectAllFiltersDesktop">Clear All</span>');
										} 
									  
									  
									  
							  });
											
					  } 
					  
					  
					  
					  					      //if he wants to select all filters
					  if (liClass == "ClearAllClass") {
						      $(this).removeClass('ClearAllClass');
						  	  $(this).addClass('SelectAllClass');
							  
							  
                                  $(this).siblings('li').each( function () {
									   var siblingClass = $(this).attr("class");
									   var allId = $(this).data("category");
									   var allContent =  $(this).html();
												   									  
												   var allId = $(this).data("category");
												   var allContent =  $(this).html();

					  
					                        $(this).removeClass("SelectedFilter");  
						   
							                filters.data = remove_elem(filters.data,allId);
											ForSelectClass.html('<span class="SelectAllFiltersDesktop">Select All</span>');					  
					  
										
									  
									  
									  
							  });
											
					  } 
					  

					
				  }
                
				
				  $("#SelectedFiltersList").empty();
				  
				  if (filters.data.length > 0){
	  	 
								 $.each(filters.data, function(ind, selectedTag) {
									
                                              $("#SelectedFiltersList").append('<li class="SelectedFilterTag" data-filterid="'+selectedTag[0]+'" onClick="remove_filter(this)" onMouseOver="ChangeHoverImage(this, 1)" onMouseOut="ChangeHoverImage(this, 2)"><img src="img/sponsors/selected-filter-x.png" alt="X">'+selectedTag[1]+'</li>');
	
									  });  //end of filters

					  
					  
				  } 
		
			  });

/*
************************
Apply the category filter
***********************
*/

 $('#ApplyFiltersButton').on("click", function(e) {
			   
			   
			 var yep = 0;
			 var sponsors = new Array;
			 var i = 0;
			 var displayed = 0;

			 
			  //clear out the filter grid
			 $("#FilteredGrid .CategoryContainer").empty();
			 
			   $(".Sponsor").each(function() {
				   var current = $(this).data('sponsortag');
				   var thisSponsor = $(this).parents("a");
				   var sponsornum = $(this).data('sponsornum');
				   
				   
				  if (typeof current != "undefined" && current != ""){
						  var tags = current.split(",");
						    
									sponsors[i] = new Array; //s[i] is one  /  sponsor s[i][s] - that one sponsors one filter tag 
			                        sponsors[i][0] = 0;

							
							$.each(tags, function(index, sponsorTag) {

									   $.each(filters.data, function(ind, selectedTag) {


												if (sponsorTag == selectedTag[0]) {
												   sponsors[i][0]++;
												   sponsors[i][1] = thisSponsor; 
												   sponsors[i][2] = sponsornum;
												 }


									  });  //end of SelectedParams
										   
								 
							   	  
							});  //end of tags each
							
							
							i++;

					  
					  
					  //thisSponsor.clone().appendTo( "#FilteredGrid .CategoryContainer");
					  
				  } //if current is defined end

				  
			   });   //end of .sponsor Each
			   
			   	   sponsors.sort(function(a, b) {
                         return b[0] - a[0];
                         });
					  
			 var finalList = getDistinctArraySponsor(sponsors);
			  
			$.each(finalList, function(index, value) {
				 if (typeof value != "undefined") {
					 value.clone().appendTo( "#FilteredGrid .CategoryContainer");
					 displayed++;
				 }
                  

			});  //end of finallist each 
			
			 $(".ALaCarteTextContainer").css("display","none");
              
			  //check if there's actually a match for the filters
              if (displayed > 0) {
				   $('#SponsorGrid').css("display","none");
				   $("#FiltersWrapper").css("right", "-100vw"); 
			  } else {
				  //if no sponsor found
				  $('#FilterResponse').html('No match found!');
			  }
         
			 
			   
			   
			  
			  });
	


   //clear all filters
$('#ClearFilters').on("click", function(e) {
	
	           $("#SelectedFiltersList").empty();
			   $('#FilterResponse').html('');
			   
			   $('.Filters ul li').each(function() {
				   $(this).removeClass("SelectedFilter");  
				    });
				   
	
			   //clear out the filter grid
			 $("#FilteredGrid .CategoryContainer").empty();
			 $(".ALaCarteTextContainer").css("display","block");
			 
			  $('#SponsorGrid').css("display","block");
			   $("#FiltersWrapper").css("right", "-100vw");
			   filters.data = new Array;
			   filters.i = 0; 
			  });
	
			  
	


	
		
});

function remove_elem(arr,elem){
	var returnArray = new Array;
	filters.i = 0;
	
	$.each(arr, function(index, value) {
	     if (value[0] != elem){
			 returnArray[filters.i] = new Array;
			 returnArray[filters.i][0] = value[0];
			 returnArray[filters.i][1] = value[1];
			 filters.i++;
		 }
	
	 });  //end of filters
	 
	 return returnArray;
}


function getDistinctArray(arr) {
    var compareArray = new Array();
    if (arr.length > 1) {
        for (i = 0;i < arr.length;i++) {
            if (compareArray.indexOf(arr[i][0]) == -1) {
                compareArray.push(arr[i][0]);
				compareArray.push(arr[i][1]);

            }
        }
    }
    return compareArray;
}


function getDistinctArraySponsor(arr) {
    var compareArray = new Array();
	var sponsors = new Array();
    if (arr.length > 1) {
        for (i = 0;i < arr.length;i++) {
            if (compareArray.indexOf(arr[i][2]) == -1) {
                compareArray.push(arr[i][2]);
				sponsors.push(arr[i][1]);
            }
        }
    }
    return sponsors;
}

function remove_filter(elem) {
			   var id = $(elem).data("filterid");	
       			 
				 
				 $('.Filters ul li').each(function() {
				   $(this).removeClass("SelectedFilter");  
				    });
				   
						   
				filters.data = remove_elem(filters.data,id);
											
											
			$("#SelectedFiltersList").empty();
				  
				  if (filters.data.length > 0){
	  	 
					 $.each(filters.data, function(ind, selectedTag) {
						
								  $("#SelectedFiltersList").append('<li data-filterid="'+selectedTag[0]+'" onClick="remove_filter(this)" onMouseOver="ChangeHoverImage(this, 1)" onMouseOut="ChangeHoverImage(this, 2)"><img src="img/sponsors/selected-filter-x.png" alt="X">'+selectedTag[1]+'</li>');

						  });  //end of filters
						  
				  }
	
	
}

function ChangeHoverImage(elem, id) {
   if (id == 1){
      $(elem).children('img').attr('src', 'img/sponsors/selected-filter-x-hover.png');
   
   } else {
     $(elem).children('img').attr('src', 'img/sponsors/selected-filter-x.png');
   }

}