<?php 
use HRNParis\main as main;

   if (!isset($_SESSION['user'])) {
       require_once('login.php');
	   
   } else {
	   
	   //$new = new locations();
	//<link rel="stylesheet" href="css/new_speaker.css" />   
	   $content ='
	   <!--Jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<link href="css/admin_general.css" rel="stylesheet">
<link rel="stylesheet" href="css/admin_index.css" />
<link href="css/general.css" rel="stylesheet">

<!--Include Font Awesome -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">



<!-- Dropzone -->
<script src="vendor/dropzone/dropzone.js"></script> 
<link href="vendor/dropzone/dropzone.css" rel="stylesheet">
<link href="vendor/dropzone/basic.css" rel="stylesheet">

<script src="js/admin_new_press.js"></script> 

<!-- Froala Editor -->
<link href="vendor/froala/css/froala_editor.min.css" rel="stylesheet" type="text/css">
<link href="vendor/froala/css/froala_style.min.css" rel="stylesheet" type="text/css">
  <script src="vendor/froala/js/froala_editor.min.js"></script>
  <!--[if lt IE 9]>
    <script src="vendor/froala/js/froala_editor_ie8.min.js"></script>
  <![endif]-->
  <script src="vendor/froala/js/plugins/tables.min.js"></script>
  <script src="vendor/froala/js/plugins/lists.min.js"></script>
  <script src="vendor/froala/js/plugins/colors.min.js"></script>
  <script src="vendor/froala/js/plugins/char_counter.min.js"></script>
  

<link href="css/speakers/admin_add_speakers.css" rel="stylesheet">
</head>
<body>
 <!--Main Wrapper-->
	<div class="wrapper">
	  <h1 class="WrapperMainH1">HR Tech Europe - Paris site 2015 |<br /> Add New Blogger</h1>
	  
	  	        <div id="MenuIconContainer">';
	
  
	if (isset($_SESSION['user'])) {
		

		 $content .= '<a title="Back to Press page" href="press"><img alt="Back to Main Page" class="MenuIcon" src="img/icons/main.png" onmouseover="this.src=';
		 $content .="'img/icons/main_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/icons/main.png';";
		 $content .='" ></a>';
	 
	}
	 
  $content .='</div>
	  
	 
	<!--Form container-->
	 <div id="container">';
	 
	 	if (isset($_SESSION['user'])) {
			include_once('controllers/main.php');
			$main = new main\main;
			
			if (isset($_SESSION['Result']) && $_SESSION['Result'] != '') {
				$content .='<div id="ReturnValue" style="display:none">'.$_SESSION['Result'].'</div>';
				$_SESSION['Result'] = '';
			} else {
				$content .='<div id="ReturnValue" style="display:none"></div>';
			}
             

	     $content .='<form id="speakers" action="#" name="speakers" method="post"><br />';
  
  
 /*
 		<select class="SelectClass" id="PersonType">
		  <option hidden="hidden">Select a category</option>
		  <option value="6">Blogger</option>
		  <option value="7">Analyst</option>
		</select>
		
 <textarea class="TextAreaClass" id="SpeakerBio" placeholder="Bio"></textarea><br />		
 
 */ 
     $content .='
	 <fieldset>
	    <legend>Personal Data</legend>
		<input class="AdminInputField" required="required" id="SpeakerName" type="text" placeholder="Name" /><br />
		<input class="AdminInputField" id="SpeakerTitle" type="text" placeholder="Job Title" /><br />
         <textarea class="MainPageBio" id="SpeakerMPBio" placeholder="Short Bio"></textarea><br />		
     </fieldset>';

   	  $content .='
	  <fieldset>';
	      $content .="<legend>Person's Image</legend>";
		 $content .='<div class="dropzone" id="DropDiv"></div><br />
		 <input type="file" name="file" style="display:none" />
     </fieldset>';
	 

	 
	 $content .='
	 <fieldset>';
	    $content .="<legend>Social Links</legend>";
		 $content .='<input class="AdminInputField" id="Facebook" type="text" placeholder="Facebook" /><br />
		<input class="AdminInputField" id="Twitter" type="text" placeholder="Twitter" /><br />
		<input class="AdminInputField" id="Linkedin" type="text" placeholder="Linkedin" /><br />
		<input class="AdminInputField" id="Flickr" type="text" placeholder="Flicker" /><br />
		<input class="AdminInputField" id="Google" type="text" placeholder="Google+" /><br />
     </fieldset>';
	 
	 	 $content .='
	 <fieldset>';
	     $content .="<legend>Workplace Data</legend>";
		$content .='<input class="AdminInputField" id="CompanyName" type="text" placeholder="Company Name" /><br />
		<input class="AdminInputField" id="CompanyWebsite" type="text" placeholder="Company or Blog URL" /><br />';
		 $content .='
     </fieldset>';

	 
	/* 
   	  $content .='
	  <fieldset>';
	  
	  
	      $content .="<legend>Main Page</legend>";
       $content .='<label><input type="checkbox" id="MainCheckbox"> Display on Main Page</label><br /><br />
	     <textarea class="MainPageBio" id="SpeakerMPBio" placeholder="Main Page Bio"></textarea><br />
     </fieldset>';*/

    $content .= '<button class="AdminSubmitButton" name="NewSpeakerSave" id="NewSpeakerSave" type="Submit">Save</button>';
	
 $content .= '

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
  <style>
    .dz-message {
		display:none;
	}
  </style>
<?php
echo $content;

?> 
</body>
</html>
