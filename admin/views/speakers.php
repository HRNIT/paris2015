<?php 
namespace HRNParis\speakers;
include_once('controllers/speakers_main.php');

$speakers = new speakers_main;
?>

<!doctype html>
<html lang="en">
<head>
<meta name="description" content="HR Tech World Congress">
<meta name="keywords" content="HR Conference, HR event, HR Tech, HRN Europe">
<meta name="author" content="HRN Europe - The Pan European HR Network">
<meta name="designer" content="Designed by: Judit Bernat - juditbernat.mail@gmail.com ">
<meta name="developer" content="Developed by: TesseracT - bottyan.tamas@web-developer.hu | Benedek Nagy - trialshock@gmail.com">
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
<link rel="shortcut icon" href="../favicon.png">

<!-- Include General CSS Definitions -->
<link rel="stylesheet" href="css/general.css" />

<!-- Include the Navigation Menu`s CSS Definitions -->
<link rel="stylesheet" href="css/menu.css" />

<!-- Include Custom CSS Definitions -->
<link rel="stylesheet" href="css/speakers.css" />


<!-- Include jQuery -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


<!-- Scroll to top JS -->
<script src="../js/gotopscroll.js"></script>




<?php 
if(isset($_SESSION['admin'])){
	echo '
	<link rel="stylesheet" href="css/admin_menu.css" />
	<link rel="stylesheet" href="css/admin_socials.css" />
<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="js/admin_speaker_order.js"></script>

	';
	
}
?>

<!-- Include Reveal Modal -->
<link rel="stylesheet" href="../vendor/reveal/reveal.css">
<script src="../vendor/reveal/jquery.min.js" type="text/javascript"></script>
<script src="../vendor/reveal/jquery.reveal.js" type="text/javascript"></script>





</head>
<body>
<?php 
include_once('views/menu.php');
   show_menu('speakers');
?>
  
  
  <!-- END MAIN MENU -->
<!-- Header -->
<header>
  <!-- Place the header here -->
</header>
<!-- END Header -->


<!-- Main Content -->
<div id="MainContent">
<!-- Search bar -->
<div id="SearchBarContainer">
	<div id="SearchBarInnerContainer">
    	<h2 class="FontLato" id="SpeakersMobileHeadlineText">SPEAKERS</h2>
        <div id="FilterSpeakersButton" class="FontLato">
               <img src="../img/speakers/search-icon.png" alt="Search">
               <span>FILTER SPEAKERS</span>
        </div>
    </div>
</div>
<!-- END Search bar -->



<!-- Speakers -->
<section id="Speakers">
	<h2 class="InvisibleHeadline">Speakers</h2>               
        <!-- Speakers Grid -->
        <div id="SpeakersGrid">
        
<?php 



  $content = $speakers->speakers(); 
    if(isset($content)) {
		  echo $content;	
	}
   


?>
        
        </div>
    	<!-- END Speakers Grid -->
</section>
<!--END Speakers --> 
</div>
<!-- END Main Content -->

<!-- Go to Top Button --> 
<a href="#" class="GoTopButton">
<div id="GoTopImg"><i class="fa fa-caret-up"></i></div>
</a> 
<!-- END Go to Top Button --> 






</body>
</html>
