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
<link rel="stylesheet" href="css/admin_socials.css" />

<script src="js/admin_social_links_edit.js"></script>


<!--Include Font Awesome -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">



</head>
<body>
  <!--Main Wrapper-->
	<div class="wrapper">
	  <h1 class="WrapperMainH1">HR Tech Europe - World Congress Site | Edit Social Links</h1>
	  	        <div id="MenuIconContainer">';
	
 	if (isset($_SESSION['admin'])) {
		if (isset($_SESSION['SocialLinkPrevUrl'])) {
		 $back = $_SESSION['SocialLinkPrevUrl'];	
		} else {
		 $back = 'index';	
		}

		 $content .= '<a href="'.$back.'" title="Back To main"><img class="MenuIcon" src="img/icons/main.png" onmouseover="this.src=';
		 $content .="'img/icons/main_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/icons/main.png';";
		 $content .='" ></a>';
	 
	}
  
  $content .='</div>
	<!--Form container-->
	 <div id="container">';
	   

	 
	 
	 	if (isset($_SESSION['admin']) && isset($_SESSION['SocialLinkEntityId']) && isset($_SESSION['SocialLinkEntityType'])) {


			$content .= $main->get_entity_name($_SESSION['SocialLinkEntityId'], $_SESSION['SocialLinkEntityType']);
			
		if(isset($_SESSION['SocialResponse'])){
		   $content .='<div class="ReturnValue" style="display:none">'.$_SESSION['SocialResponse'].'</div>';
		   unset($_SESSION['SocialResponse']);
	   } else {
		  $content .='<div class="ReturnValue" style="display:none"></div>';  
	   }
			
			
	     $content .='<form id="sponsors" name="sponsors" method="post" action="controllers/ajax.php" enctype="multipart/form-data">
    <div>
  
     <fieldset>
	<legend>Social</legend>';
			
		$content .= $main->get_socials($_SESSION['SocialLinkEntityId'], $_SESSION['SocialLinkEntityType']);

	
	$content .= '<div class="SocialSubmitButton">Save</div>
	</fieldset>';
	

 $content .= '
    </div>
  </form>
    	
  	   <!-- End of Form Container-->';
	   
	 } //if isset agenda_admin 
	 else {
		$content.="<h1 style='text-align:center'>You don't have permission to see this page! Naughty! ;)</h1>"; 
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
