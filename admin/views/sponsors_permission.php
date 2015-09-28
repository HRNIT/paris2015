<?php 
use HRNParis\main as main;

   if (!isset($_SESSION['user'])) {
       require_once('login.php');
	   
   } else {
	   include_once('controllers/main.php');
	   $main = new main\main;
	   
	   $content ='
	   <!--Jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  
<link href="css/admin_general.css" rel="stylesheet">
<link rel="stylesheet" href="css/admin_index.css" />
<link rel="stylesheet" href="css/admin_permissions.css" />

<script src="js/admin_sponsors_permissions.js"></script>


</head>
<body>
  <!--Main Wrapper-->
	<div class="wrapper">
	  <h1 class="WrapperMainH1">HR Tech Europe - Paris 2015 | Modify Sponsor Permission</h1>
	  	        <div id="MenuIconContainer">';
	
  
	if (isset($_SESSION['admin'])) {

		 $content .= '<a href="sponsors" title="Back To Sponsors"><img class="MenuIcon" src="img/icons/main.png" onmouseover="this.src=';
		 $content .="'img/icons/main_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/icons/main.png';";
		 $content .='" ></a>';
	 
	}
	 
  
  $content .='</div>
	<!--Form container-->
	 <div id="container">
	  <div id="ReturnValue" style="display:none"></div>';
	 
	 	//if (isset($_SESSION['sponsors_admin']) && isset($_SESSION['super_admin'])) {
			
			if (isset($_SESSION['admin'])) {
			
		  if (isset($_SESSION['Permission_Edit'])){
			  
               $content .= $main->get_sponsors_permissions($_SESSION['Permission_Edit']);
			   //unset($_SESSION['Permission_Edit']); 
	       }
		
	
		
		
	     $content .='<form id="sponsors" name="sponsors" method="post" action="controllers/main.php" enctype="multipart/form-data">
  
                  </form>
    	
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
