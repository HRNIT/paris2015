<?php 
namespace HRNParis\sponsors;
include_once('controllers/sponsors_main.php');

$sponsors = new sponsors_main;
?>

<!doctype html>
<html lang="en">
<head>
<meta name="description" content="HR Tech World Congress">
<meta name="keywords" content="HR Conference, HR event, HR Tech, HRN Europe">
<meta name="author" content="HRN Europe - The Pan European HR Network">
<meta name="designer" content="Designed by: Judit Bernat - juditbernat.mail@gmail.com ">
<meta name="developer" content="Developed by: TesseracT - bottyan.tamas@web-developer.hu">
<meta charset="utf-8" />
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<title>HR Tech World Congress</title>
<!--Include Raleway Google Font -->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>

<!-- Include Source Sans Prog Google Font -->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

<!--Include Include Proxima Nova Font (Adobe Typekit) -->
<script src="//use.typekit.net/gku8ogo.js"></script>
<script>try{Typekit.load();}catch(e){}</script>

<!-- Include Lato Google Font -->
<link href='http://fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

<!--Include Font Awesome -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<!-- Favicon setting -->
<link rel="shortcut icon" href="favicon.png">

<!-- Include General CSS Definitions -->
<link rel="stylesheet" href="css/general.css" />

<!-- Include the Navigation Menu`s CSS Definitions -->
<link rel="stylesheet" href="css/menu.css" />

<!-- Include Custom CSS Definitions -->
<link rel="stylesheet" href="css/sponsors-grid.css" />


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

	
	<script src="js/admin_edit_alacarte.js"></script>
	<link rel="stylesheet" href="css/admin_sponsors_alacarte.css" />
	<link rel="stylesheet" href="css/admin_menu.css" />
	
	';
	
}
?>



<!-- GOOGLE ANALYTICS TRACKING SCRIPT -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-55976467-1']);
  _gaq.push(['_trackPageview']);

  (function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>
<body>
<?php 
include_once('views/menu.php');
   show_menu('alacarte');
?>
  
  
  <!-- END MAIN MENU -->






<!-- Sponsors -->
<section id="Sponsors">
	<!-- Sponsors Grid -->
  <div id="SponsorGrid">
 	<!-- Sponsors Grid Container -->
    


<!-- A La Carte Sponsors -->
		<h2 class="SponsorHeadline FontRaleway"><span>A La Carte Sponsors</span></h2>
        <div class="CategoryContainer" id="AlaCarteWrapper">
<?php 

  $content = $sponsors->sponsors_grid_alacarte();        
  echo $content;	

  
?>
            
        </div>                       
<!-- END A La Carte Sponsors -->

                           
</div>         
<!-- END Sponsors Grid -->


  </div>
  <!-- END Sponsors Grid Container -->
  
  
  <div id="FilteredGrid">
  <!-- Filtered Grid -->
       <div class="CategoryContainer">
       </div>
  
  </div>
   <!-- END Filtered Grid -->
   
   
</section>
<!--END Sponsors --> 
<!--END Sponsors --> 

<!-- Go to Top Button --> 
<a href="#" class="GoTopButton">
<div id="GoTopImg"><i class="fa fa-caret-up"></i></div>
</a> 
<!-- END Go to Top Button --> 






</body>
</html>
