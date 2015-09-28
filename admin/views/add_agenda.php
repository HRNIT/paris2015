<?php 
use HRNParis\main as main;
use HRNParis\agenda as agenda;

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

<!--Include Font Awesome -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">




<script src="js/admin_new_agenda.js"></script> 

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


</head>
<body>
 <!--Main Wrapper-->
	<div class="wrapper">
	  <h1 class="WrapperMainH1">HR Tech Europe - Paris site 2015 |<br /> Add New Sponsor</h1>
	  
	  	        <div id="MenuIconContainer">';
	
  
	if (isset($_SESSION['user'])) {
		

		 $content .= '<a title="Back to mainpage" href="index"><img alt="Back to Main Page" class="MenuIcon" src="img/icons/main.png" onmouseover="this.src=';
		 $content .="'img/icons/main_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/icons/main.png';";
		 $content .='" ></a>';
	 
	}
	 
	 //Local functions
	  $time_display = function($type, $array){
		  $out = '';
		  if($type == 'hour') {
		       foreach ($array[0] as $nums){
			   
				   $out .= '<option value="'.$nums.'">'.$nums.'</option>';
				   
			   }
			   
			   
		  }	   
			   if($type == 'minute'){
				   foreach ($array[1] as $nums){
			   
				        $out .= '<option value="'.$nums.'">'.$nums.'</option>';
				   
			        }
		       }
		 
		 return $out; 
	  };
	 
	 
	$category_display = function($array) {
		$out = '';
		
		foreach ($array as $cat) {
		   $out .= '<option value="'.$cat[0].'">'.$cat[1].'</option>';	
			
		}
		
		return $out;
	};
	
	
	$alphabet = function() {
		$content = '';
		$alphas = range('A', 'Z');
		
		  foreach ($alphas as $abc){
			  $content .= '<option value="'.$abc.'">'.$abc.'</option>';
		  }
		return $content;
	
   };
	 
	 
	 //Display
  $content .='</div>
	  
	 
	<!--Form container-->
	 <div id="container">';
	 
	 	if (isset($_SESSION['user'])) {
			include_once('controllers/main.php');
			$main = new main\main;
			
			include_once('controllers/agenda_main.php');
			$agenda = new agenda\agenda_main;
			
			if (isset($_SESSION['Result']) && $_SESSION['Result'] != '') {
				$content .='<div id="ReturnValue" style="display:none">'.$_SESSION['Result'].'</div>';
				$_SESSION['Result'] = '';
			} else {
				$content .='<div id="ReturnValue" style="display:none"></div>';
			}
             
			 
		 $time = $agenda->display_time_admin();	 
		 $categories = $agenda->get_session_categories();
//Form Start
 $content .='<form class= id="agenda" name="agenda" method="post" action="" enctype="multipart/form-data"><br />
     <fieldset>
	    <legend>Basic</legend>
		
         <input class="AdminInputField" required="required" id="AgendaTitle"  type="text" placeholder="Sesssion Title" /><br /> 
		 
   <div id="TimeTable">';
	  //Start hour select
		$content .='  <label>Start hour:<select id="AgendaTimeStartHour">
		<option value ="" selected="selected" hidden="hidden">Start Hour</option> ';
		 $content .=  $time_display('hour', $time);
		 
	  $content .= ' 
	  </select></label>';
	  
	  //Start minute Select
	   $content .='  <label>Start minute:<select id="AgendaTimeStartMinute">
	   <option value ="" selected="selected" hidden="hidden">Start Minute</option> ';
		$content .=  $time_display('minute', $time);
	 $content .= ' 
	  </select></label>';
	  
	  //End hour select
		$content .='  <label>End hour:<select id="AgendaTimeEndHour">
		<option value ="" selected="selected" hidden="hidden">End Hour</option> ';
		 $content .=  $time_display('hour', $time);
		 
	  $content .= ' 
	  </select></label>';
	  
	  //End minute Select
	   $content .='  <label>End minute:<select id="AgendaTimeEndMinute">
	   <option value ="" selected="selected" hidden="hidden">End Minute</option> ';
		$content .=  $time_display('minute', $time);
	 $content .= ' 
	  </select></label>
	  
	  
	  <br />
  </div>
	  </fieldset>';
	
	
      $content .= '
	  <fieldset>
	    <legend>Stream</legend>
		
	<div id="BreakChkBox"><label>Break Session<input id="Break" type="checkbox" value="1" /></label><br /><br /></div>';
	//<div id="ModeratorChkBox"><label>Moderator Session<input id="Moderator" name="Moderator" type="checkbox" value="1" /></label><br /><br /></div>
	
//Break session options	
	 $content .= '<div id="AgendaIcon" style="display: none;">
		  <label>Break Type<select id="BreakType">
		    <option value="2">Coffee & Networking</option>
		    <option value="3">Lunch & Networking</option>
			<option value="4">Drinks & Networking</option>
			<option value="5">BreakOut</option>
		  </select></label><br /><br />
	</div>
	
	
	
    <label>Day <select id="Day">
	<option value ="" selected="selected" hidden="hidden">Day</option> 
    <option value="1">Day 1</option>
    <option value="2">Day 2</option>
    </select></label><br /><br />
	
	
	
    
    <label>Stream <select id="StreamCategory">
	<option value ="" selected="selected" hidden="hidden">Stage</option>';
   $content .= $category_display($categories);
   $content .= ' 
    </select></label>
	
	
	 </fieldset>
	 
	 
	 
	  <fieldset>
	    <legend>Content</legend><br />
	
  <!--Normal, content upload section-->	
   <div id="SpeakersDiv">
   <div id="SessionAbstract"><label>Abstract<textarea id="Abstract"></textarea></label><br /><br /></div>';
   
   $content .='<input class="AdminInputField" id="SpeakerSearch" name="SpeakerSearch" type="text" placeholder="Search for Speakers" /><br />';
   
   $content .='	<select id="Alphabet" name="Alphabet[]" multiple size=10>';
  $content .= $alphabet();
     
   $content .='</select>';
   
   
   	$content .='<select id="SpeakersListHidden" style="display:none" name="SpeakersListHidden" multiple>';
  $content .= $agenda->get_speakers_for_agenda();
     
   $content .='</select>';
   
	$content .='<label>Speakers <select id="SpeakersList" name="SpeakersList" multiple>';
     
   $content .='</select></label>';
   
   	$content .='<label>Selected <select id="Speakers" name="Speakers[]" multiple>';
     
   $content .='</select></label>
   
   
   <p id="MultipleHelp">In order to select multiple speakers, please hold Ctrl and then click on the speakers</p>
   <p id="NewSpeaker" style="display:none">Can&#180;t find a speaker? You can upload one by pressing the new speaker button</p>
  
   </div>
   
   <a id="NewSpeakerLink" href="new_speakers" style="display:none"><div class="AdminSpeakerButton">New Speaker</div></a>
   
        
		
	   <!--Content upload section end-->
	   	   
   </fieldset>
    <input name="SelectedSpeakers" id="SelectedSpeakers" type="hidden" />
	<input name="AgendaTag" id="AgendaTag" type="hidden" />
    <input class="AdminSubmitButton" id="AgendaSubmit" type="submit" value="Save"/>
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
