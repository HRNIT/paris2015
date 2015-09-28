<?php 
namespace HRNParis\press_main;
include_once('controllers/press_main.php');

$press = new press_main;
?>
<!doctype html>
<html lang="en">
<head>
<meta name="description" content="HR Tech World Congress">
<meta name="keywords" content="HR Conference, HR event, HR Tech, HRN Europe">
<meta name="author" content="HRN Europe - The Pan European HR Network">
<meta name="designer" content="Designed by: Judit Bernat - juditbernat.mail@gmail.com ">
<meta name="developer" content="Developed by: TesseracT - bottyan.tamas@web-developer.hu | Benedek Nagy - trialshock@gmail.com | Myrrdhinn - balazs.pentek@web-developer.hu">
<meta charset="utf-8" />
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<title>HR Tech World Congress</title>

<!--Include Raleway Google Font -->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>

<!-- Include Source Sans Prog Google Font -->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

<!--Include Proxima Nova Font (Adobe Typekit) -->
<script src="//use.typekit.net/gku8ogo.js"></script>
<script>try{Typekit.load();}catch(e){}</script>

<!-- Include Lato Google Font -->
<link href='http://fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

<!--Include Font Awesome -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<!-- Favicon setting -->
<link rel="shortcut icon" href="../../favicon.png">

<!-- Include General CSS Definitions -->
<link rel="stylesheet" href="../css/general.css" />

<!-- Include the Navigation Menu`s CSS Definitions -->
<link rel="stylesheet" href="../css/menu.css" />

<!-- Include Custom CSS Definitions -->
<link rel="stylesheet" href="../css/speaker-profile.css" />

<!-- Include Footer CSS Definitions -->
<link rel="stylesheet" href="../css/footer.css" />

<!-- Include jQuery -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<!-- Scroll to top JS -->
<script src="../../js/gotopscroll.js"></script>


<?php 
if(isset($_SESSION['admin'])){
	echo '
	<script src="../vendor/dropzone/dropzone.js"></script>
	<link rel="stylesheet" href="../vendor/dropzone/dropzone_edited.css" />
	<link rel="stylesheet" href="../css/speakers/admin_speakers.css" />
	<link rel="stylesheet" href="../css/admin_menu.css" />
	<link rel="stylesheet" href="../css/admin_socials.css" />
    <link rel="stylesheet" href="../css/admin_general.css" />
	
	<!-- Froala Editor -->
<link href="../vendor/froala/css/froala_editor.min.css" rel="stylesheet" type="text/css">
<link href="../vendor/froala/css/froala_style.min.css" rel="stylesheet" type="text/css">
  <script src="../vendor/froala/js/froala_editor.min.js"></script>
  <!--[if lt IE 9]>
    <script src="../vendor/froala/js/froala_editor_ie8.min.js"></script>
  <![endif]-->
  <script src="../vendor/froala/js/plugins/tables.min.js"></script>
  <script src="../vendor/froala/js/plugins/lists.min.js"></script>
  <script src="../vendor/froala/js/plugins/colors.min.js"></script>
	
	<script src="../js/admin_edit_analyst.js"></script>
	';
	
}
?>


<!-- Include Reveal Modal -->
<link rel="stylesheet" href="../../vendor/reveal/reveal.css">
<script src="../../vendor/reveal/jquery.min.js" type="text/javascript"></script>
<script src="../../vendor/reveal/jquery.reveal.js" type="text/javascript"></script>

<!-- Thank you modal -->
<script type="text/javascript">
$(document).ready(function() {
	if(window.location.href.indexOf('#ThankYouBrochureModal') != -1) {
   		jQuery("#ThankYouBrochureModal").reveal();
 	} 
});
</script>
<!-- END Thank you modal  -->

<!-- Collapsible Stage Panels -->
<script type="text/javascript">
$(document).ready(function(){
	$('.StageHeadline').bind('click', function () {
	  $(this).siblings(".StageContent").fadeToggle(600);
	  if(  $(this).children(".PlusIcon").hasClass("ShowIcon") ) {
		$(this).children(".PlusIcon").removeClass("ShowIcon");
		$(this).children(".PlusIcon").addClass("HideIcon");
		$(this).children(".MinusIcon").addClass("ShowIcon");
		$(this).children(".MinusIcon").removeClass("HideIcon");
	  } else if (  $(this).children(".MinusIcon").hasClass("ShowIcon") ) {
		$(this).children(".MinusIcon").removeClass("ShowIcon");
		$(this).children(".MinusIcon").addClass("HideIcon");
		$(this).children(".PlusIcon").addClass("ShowIcon");
		$(this).children(".PlusIcon").removeClass("HideIcon");
	  }

	});
});
</script>

<!-- GOOGLE ANALYTICS TRACKING SCRIPT 
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-55976467-1']);
  _gaq.push(['_trackPageview']);

  (function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>-->

</head>
<body>
<?php 
include_once('views/menu.php');
   show_menu('press_profile');
?>
  

<!-- Main Content -->
<div id="MainContent">
<!-- Back to Speakers -->
<div id="BackToSpeakersContainer">
	<div id="BackToSpeakersInnerContainer">
         <a href="../press" target="_parent" title="Back to Speakers">      
               <img src="../../img/speakers/back-icon.png" alt="<">
               <span class="FontLato">BACK TO PRESS PAGE</span>
         </a>
    </div>
</div>
<!-- END Back to Speakers -->
<!-- Speaker Profile -->

<?php 
$link = explode("/",$_SERVER['REQUEST_URI']);

 if(isset($link[4])){
  $content = $press->press($link[4], 'Analyst'); 
      if ($content != FALSE){
		  echo $content;	
	  } else {
		  if ($link[4] == "index"){
			  //if the back to index button pressed
			 $content = '';
			 $content .= '
			 <!-- Redirect to the Index page of HRN Europe -->
					<script type="text/javascript">
					
					  window.location.href = "../index";
	
					</script>
					';
			  
		  }else {
		       //if there is no such speaker
			 $content = '';
			 $content .= '
			 <!-- Redirect to the Index page of HRN Europe -->
					<script type="text/javascript">
					
					//  window.location.href = "../404";
	
					</script>
					';
					
		  }
		echo $content;		
	  }
    
 } else {
	           //if there is no speaker tag specified
			 $content = '';
		 $content .= '
		 <!-- Redirect to the Index page of HRN Europe -->
				<script type="text/javascript">
				
				  window.location.href = "../404";
		
				</script>
				';
		echo $content;	 
 }
?>




</div>
<!-- END Main Content -->

<!-- Go to Top Button --> 
<a href="#" class="GoTopButton FontLato">
    <div id="GoTopImg">
    	<i class="fa fa-caret-up"></i>
        <img src="../../img/back-to-top-mobile.png" alt="back to top"><br>
        <span>back to top</span>
    </div>
</a> 
<!-- END Go to Top Button --> 






</body>
</html>