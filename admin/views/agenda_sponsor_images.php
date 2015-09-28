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

<!--Include Font Awesome -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<!-- Favicon setting -->
<link rel="shortcut icon" href="../favicon.png">

<!-- Include General CSS Definitions -->
<link rel="stylesheet" href="css/general.css" />

<!-- Include the Navigation Menu`s CSS Definitions -->
<link rel="stylesheet" href="css/menu.css" />

<!-- Include Custom CSS Definitions -->
<link rel="stylesheet" href="css/sponsors.css" />



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
	<script src="vendor/dropzone/dropzone.js"></script>
	<link rel="stylesheet" href="vendor/dropzone/dropzone_edited.css" />
	<link rel="stylesheet" href="css/sponsors/admin_sponsors.css" />
	<link rel="stylesheet" href="css/admin_menu.css" />
	<link rel="stylesheet" href="css/admin_socials.css" />
	
	
	<script src="js/admin_edit_sponsor_agenda.js"></script>
	';
	
}
?>



<!-- Include Reveal Modal -->
<link rel="stylesheet" href="../vendor/reveal/reveal.css">
<script src="../vendor/reveal/jquery.min.js" type="text/javascript"></script>
<script src="../vendor/reveal/jquery.reveal.js" type="text/javascript"></script>

<!-- Thank you modal -->
<script type="text/javascript">
$(document).ready(function() {
	if(window.location.href.indexOf('#ThankYouForApplyModal') != -1) {
   		jQuery("#ThankYouForApplyModal").reveal();
  	}
	if(window.location.href.indexOf('#ThankYouBrochureModal') != -1) {
   		jQuery("#ThankYouBrochureModal").reveal();
 	} 
});
</script>
<!-- END Thank you modal  -->

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
   show_menu('agenda_sponsor');
?>
  
  
  <!-- END MAIN MENU -->

<!-- Sponsors -->
<section id="Sponsors">
	<!-- Sponsors List -->
	<div id="SponsorsInnerContainer">
    	<div id="WhosWhoAndDiamondImageContainer">
        	<h2 class="SponsorHeadline FontRaleway"><span>Diamond</span></h2>
    	</div>
<!-- Diamond Sponsors -->

<?php 

  $content = $sponsors->agenda_sponsors_edit(1); 
  echo $content;	

  
?>
       
 
<!-- END Diamond Sponsors -->

<!-- Emerald Sponsors -->
		<h2 class="SponsorHeadline FontRaleway"><span>Emerald</span></h2>  
        
<?php 

  $content = $sponsors->agenda_sponsors_edit(2); 
  echo $content;	

  
?>      
              
     
<!-- END Emerald Sponsors -->  

<!-- Platinum Sponsors --> 
		<h2 class="SponsorHeadline FontRaleway"><span>Platinum</span></h2>
       <?php 

  $content = $sponsors->agenda_sponsors_edit(3); 
  echo $content;	

  
?> 
<!-- END Platinum Sponsors -->  

<!-- Gold Sponsors --> 
		<h2 class="SponsorHeadline FontRaleway"><span>Gold</span></h2>  
<?php 

  $content = $sponsors->agenda_sponsors_edit(4); 
  echo $content;	

  
?> 
        
<!-- END Gold Sponsors -->  

<!-- Silver Sponsors --> 
		<h2 class="SponsorHeadline FontRaleway"><span>Silver</span></h2>  
     <?php 

  $content = $sponsors->agenda_sponsors_edit(5); 
  echo $content;	

  
?> 
        
               
<!-- END Silver Sponsors --> 

<!-- Exhibitors --> 
		<h2 class="SponsorHeadline FontRaleway"><span>Exhibitors</span></h2>
          <?php 

  $content = $sponsors->agenda_sponsors_edit(6); 
  echo $content;	
?> 
  
  
<!-- Exhibitors --> 
		<h2 class="SponsorHeadline FontRaleway"><span>A La Carte</span></h2>
          <?php 

  $content = $sponsors->agenda_sponsors_edit(0); 
  echo $content;	
?> 
  
  
  
 <!-- Exhibitors --> 
<h2 class="SponsorHeadline FontRaleway"><span>disruptHR</span></h2>
          <?php 

  $content = $sponsors->agenda_sponsors_edit(7); 
  echo $content;	
?>      
               
<!-- END Exhibitors -->                                                   
    </div>         
    <!-- END Sponsors List -->

</section>
<!--END Sponsors --> 

<!-- Go to Top Button --> 
<a href="#" class="GoTopButton">
<div id="GoTopImg"><i class="fa fa-caret-up"></i></div>
</a> 
<!-- END Go to Top Button --> 




<!-- Named anchor Hashtag script --> 
<script type="text/javascript">
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
</script>


</body>
</html>
