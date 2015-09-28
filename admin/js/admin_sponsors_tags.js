
   
   $(document).ready(function(){ 
   
   $("#FiltersWrapper").css("right", "0vw");
 
  
  
		 
	   
   });

$(document).ready(function(){
	document.getElementById("HRSharedServicesAndPayrollFilters").style.display = "block";
	$("#HRSharedServicesAndPayroll").addClass("SelectedFilterCategory");
});

$(document).ready(function(){
	$( ".FilterCategory" ).bind( "click", function() {
		
		/* hides all filter category list */
		var filterCategories = document.getElementsByClassName("Filters");
		var filterCategoriesLength = filterCategories.length;
		for (i=0; i < filterCategoriesLength; i++) {
			filterCategories[i].style.display = "none";
		}

		/* Gets the ID of the selected Stage */
		var filterCategory = $(this)[0].id;

		$(".FilterCategory").removeClass("SelectedFilterCategory");
		$("#"+filterCategory).addClass("SelectedFilterCategory");
		var filterCategoryName = filterCategory + "Filters";
		
		/* shows the filter category that is selected */
		document.getElementById(filterCategoryName).style.display = "block";
	});
});



<!-- Stage filter selector list based on Screen width -->
var filters = {};
filters.data = new Array;
filters.i = 0; 

$(document).ready(function() {
	var CurrentFilters = $('#SponsorName').data('filters');
	
	if (typeof CurrentFilters != "undefined" && CurrentFilters != ''){
	       var CurrentFiltersSplit = CurrentFilters.split(',');
		    $.each(CurrentFiltersSplit, function(ind, split_value) {
					if (typeof split_value != "undefined" && split_value != ''){
						 $('.Filters ul li').each(function() {
							 
			                 var content =  $(this).html();
				             var filterDataId = $(this).data('category');
							 
							 if (filterDataId == split_value) {
								 $(this).addClass("SelectedFilter");
								  filters.data[filters.i] = new Array;
								  filters.data[filters.i].push(filterDataId);
								  filters.data[filters.i].push(content);
								  filters.i++;

							 }
				         });
				   
						
						
						
					}
                    
					
		    });  //end of CurrentfiltersSplit each
			
			filters.data = getDistinctArray(filters.data);

		   $("#SelectedFiltersList").empty();
				  
				  if (filters.data.length > 0){
	  	 
								 $.each(filters.data, function(ind, selectedTag) {
									
                                              $("#SelectedFiltersList").append('<li class="SelectedFilterTag" data-filterid="'+selectedTag[0]+'" onClick="remove_filter(this)"><img src="../img/sponsors/selected-filter-x-hover.png" alt="X">'+selectedTag[1]+'</li>');
	
									  });  //end of filters

					  
					  
				  }   	
		
	}
	
});	

$(document).ready(function() {

 

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
									
                                              $("#SelectedFiltersList").append('<li class="SelectedFilterTag" data-filterid="'+selectedTag[0]+'" onClick="remove_filter(this)"><img src="../img/sponsors/selected-filter-x-hover.png" alt="X">'+selectedTag[1]+'</li>');
	
									  });  //end of filters

					  
					  
				  } 
		
			  });

/*
************************
Apply the category filter
***********************
*/

 $('#ApplyFiltersButton').on("click", function(e) {

			 var tags = new Array;
             var i = 0;
			 tags[0] = 'empty';
			 var sId = $('#SponsorName').data('sponsorid');
			 
			 if (typeof filters.data != "undefined" && typeof filters.data[0] != "undefined" && typeof filters.data[0][0] != "undefined" && filters.data[0][0] != '')	{		

						 $.each(filters.data, function(ind, selectedTag) {
			                    
							  tags[i] = selectedTag[0];
							  
							  i++;
			
						});  //end of SelectedParams
						
            }

                    
					  
				  $.ajax({
                url: 'controllers/ajax.php',
                type: 'POST',
                data: {action:"sponsor_tag_save", sId:sId, tags:tags},
                success: function(data) {
				  //if no sponsor found
				  
				  $('#FilterResponse').html('Filters have been saved!');
				  $('#FilterResponse').fadeIn('slow');
				  
				    setTimeout(function () {
                          $('#FilterResponse').fadeOut();
                      }, 4000); //will call the function after 1 secs.
					
                   }
            });
			  		  
					  


	

			
         
			 
			   
			   
			  
			  });
	


   //clear all filters
$('#ClearFilters').on("click", function(e) {
	
	           $("#SelectedFiltersList").empty();
			   $('#FilterResponse').html('');
			   
			   $('.Filters ul li').each(function() {
				   $(this).removeClass("SelectedFilter");  
				    });
				   
	
			   //clear out the filter grid
			// $("#FilteredGrid .CategoryContainer").empty();
			 
			  //$('#SponsorGrid').css("display","block");
			 //  $("#FiltersWrapper").css("right", "-100vw");
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
	var returnArray = new Array();
    if (arr.length > 1) {
		filters.i = 0;
        for (i = 0;i < arr.length;i++) {
            if (compareArray.indexOf(arr[i][0]) == -1) {
                compareArray.push(arr[i][0]);
				
				returnArray[filters.i] = new Array();
				returnArray[filters.i].push(arr[i][0]);
				returnArray[filters.i].push(arr[i][1]);
				filters.i++;

            }
        }
    }
    return returnArray;
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
						
								  $("#SelectedFiltersList").append('<li data-filterid="'+selectedTag[0]+'" onClick="remove_filter(this)"><img src="../img/sponsors/selected-filter-x-hover.png" alt="X">'+selectedTag[1]+'</li>');

						  });  //end of filters
						  
				  }
	
	
}