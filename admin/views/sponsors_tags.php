<?php 
use HRNParis\main as main;
use HRNParis\sponsors as sponsors;

   if (!isset($_SESSION['user'])) {
       require_once('login.php');
	   
   } else {
	   include_once('controllers/main.php');
	   include_once('controllers/sponsors_main.php');
	   $main = new main\main;
	   $sponsors = new sponsors\sponsors_main;
	   
	   $content ='
	   <!--Jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  
<link href="css/admin_general.css" rel="stylesheet">
<link rel="stylesheet" href="css/admin_index.css" />


<link rel="stylesheet" href="../css/sponsors-grid.css" />
<link rel="stylesheet" href="css/admin_sponsor_tags.css" />
<script src="js/admin_sponsors_tags.js"></script>


</head>
<body>
  <!--Main Wrapper-->
	<div class="wrapper">
	  <h1 class="WrapperMainH1">HR Tech Europe - Paris 2015 | Modify Sponsor Permission</h1>
	  	        <div id="MenuIconContainer">';
	
  

	 
  
  $content .='</div>
	<!--Form container-->
	 <div id="container">
	  <div id="ReturnValue" style="display:none"></div>';
	 
	 	//if (isset($_SESSION['sponsors_admin']) && isset($_SESSION['super_admin'])) {
			
			if (isset($_SESSION['admin'])) {
			

		
	
		
		
	     $content .='
<!-- Filters Wrapper -->
<div id="FiltersWrapper">
	<!-- Filters List -->
    <div id="FiltersListContainer">
        <!-- Close X -->';
       	if (isset($_SESSION['admin'])) {

		 $content .= '<a href="sponsors" title="Back To Sponsors"><img class="MenuIcon" src="img/icons/main.png" onmouseover="this.src=';
		 $content .="'img/icons/main_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/icons/main.png';";
		 $content .='" ></a>';
	 
	}
        $content .=' <!-- END Close X -->';
		
	   if (isset($_SESSION['Filter_Edit'])){
			  
              $data = $main->get_sponsors_tags_data($_SESSION['Filter_Edit']);
			  $_SESSION['Filter_Edit_SP_Name'] = $data[0];
			  
			   //unset($_SESSION['Permission_Edit']); 
	       }
		   
		$content .='<h1 id="SponsorName" data-sponsorid="'.$_SESSION['Filter_Edit'].'" data-filters="'.$data[1].'">'.$data[0].'</h1> 
		   
        	<div id="FiltersListInnerContainer">
					<!-- Categories -->
                    <ul id="FiltersCategories">
                        <li id="HRSharedServicesAndPayroll" class="FilterCategory LongCategoryName">HR Shared Services & Payroll</li>
                        <li id="HRTechnology" class="FilterCategory">HR Technology</li>
                        <li id="FutureOfWorkforceLearning" class="FilterCategory LongCategoryName">Future of Workforce Learning</li>
                        <li id="TalentAndRecruitmentTechnology" class="FilterCategory LongCategoryName">Talent & Recruitment Technology</li>
                        <li id="SocialEnterprise"  class="FilterCategory">Social Enterprise</li>
                        <li id="FutureOfWork"  class="FilterCategory">Future of Work</li>
                        <li id="CloudTechnology"  class="FilterCategory">Cloud Technology</li>
                        <li id="PayAndRewards"  class="FilterCategory">Pay & Rewards</li>
                        <li id="HRAnalyticsAndReporting"  class="FilterCategory LongCategoryName">HR Analytics & Reporting</li>
                        <!--<li id="HRConsulting"  class="FilterCategory">HR Consulting</li>-->
                    </ul>
                    <!-- END Categories -->
                    
         			<!-- Filters list for each category -->
                    <div class="Filters" id="HRSharedServicesAndPayrollFilters">
                        <ul>
                            <li class="SelectAllClass" data-maincategory="1"><span class="SelectAllFiltersDesktop">Select All</span></li>';
						 
                            
                              $content.= $sponsors->list_sub_filters(1); 
                            
                            
                              
                          
                         $content.='</ul>
                    </div>  
         
                    <div class="Filters" id="HRTechnologyFilters">
                        <ul>
                            <li class="SelectAllClass" data-maincategory="2"><span class="SelectAllFiltersDesktop">Select All</span></li>';
						 
                            
                              $content .= $sponsors->list_sub_filters(2); 
                             	
                            
                              
                          
                        $content .='</ul>
                    </div>            
                    
                    <div class="Filters" id="FutureOfWorkforceLearningFilters">
                        <ul>
                            <li class="SelectAllClass" data-maincategory="3"><span class="SelectAllFiltersDesktop">Select All</span></li>';
						 
                            
                              $content .= $sponsors->list_sub_filters(3); 
                              	
                            
                              
                          
                        $content .='</ul>
                    </div>            
                    
                    <div class="Filters" id="TalentAndRecruitmentTechnologyFilters">
                        <ul>
                            <li class="SelectAllClass" data-maincategory="4"><span class="SelectAllFiltersDesktop">Select All</span></li>';
						 
                            
                              $content .= $sponsors->list_sub_filters(4); 
                             
                            
                              
                           
                       $content .='</ul>
                    </div>
                    
                    <div class="Filters" id="SocialEnterpriseFilters">
                        <ul>
                            <li class="SelectAllClass" data-maincategory="5"><span class="SelectAllFiltersDesktop">Select All</span></li>';
						 
                            
                              $content .= $sponsors->list_sub_filters(5); 
                              	
                            
                              
                           
                       $content .=' </ul>
                    </div>
                    
                    <div class="Filters" id="FutureOfWorkFilters">
                        <ul>
                           <li class="SelectAllClass" data-maincategory="6"><span class="SelectAllFiltersDesktop">Select All</span></li>';
						  
                            
                              $content .= $sponsors->list_sub_filters(6); 
                              	
                            
                              
                           
                       $content .=' </ul>
                    </div>     
                    
                    <div class="Filters" id="CloudTechnologyFilters">
                        <ul>
                            <li class="SelectAllClass" data-maincategory="7"><span class="SelectAllFiltersDesktop">Select All</span></li>';
						 
                            
                              $content .= $sponsors->list_sub_filters(7); 
                            	
                            
                              
                           
                        $content .='</ul>
                    </div>  
                    
                    <div class="Filters" id="PayAndRewardsFilters">
                        <ul>
                            <li class="SelectAllClass" data-maincategory="8"><span class="SelectAllFiltersDesktop">Select All</span></li>';
						   
                            
                              $content .= $sponsors->list_sub_filters(8); 
                             	
                            
                              
                           
                       $content .=' </ul>
                    </div>   
                    
                    <div class="Filters" id="HRAnalyticsAndReportingFilters">
                        <ul>
                            <li class="SelectAllClass" data-maincategory="9"><span class="SelectAllFiltersDesktop">Select All</span></li>';
						 
                            
                              $content .= $sponsors->list_sub_filters(9); 
                              
                            
                              
                       $content .='     
                        </ul>
                    </div>                                                                           
					<!-- END Filters list for each category -->
         </div>
    </div>
    <!-- END Filters List -->
	<!-- Filters SELECTED List -->
    <div id="FiltersSelectedListContainer">
        <div id="FiltersSelectedListInnerContainer">
            <span id="Filter">Filter: </span>
            <ul id="SelectedFiltersList">

            </ul>
            <div id="FilterResponse"></div>
            <div id="ClearFiltersAndApplyContainer">
            	<span id="ClearFilters"><img src="img/sponsors/clear-all-x.png" alt="X"> Clear All</span>
                <div id="ApplyFiltersButton">APPLY</div>
            </div>
            
            
        </div>
    </div>
    <!-- END Filters SELECTED List -->    
</div>
<!-- END Filters Wrapper-->
    	
  	   <!-- End of Form Container-->';
	   
	 } //if isset agenda_admin 
	 else {
		$content.="<h1 style='text-align:center'>Nothing to see here!</h1>"; 
	 }
	 
	 
	$content .=' </div>
	 
	<!--End of Main Wrapper-->
	</div>';
	
 
  	   
	   
   }



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>HR Tech Europe - New Sponsor</title>
<?php
echo $content;

?> 
</body>
</html>
