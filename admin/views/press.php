<?php 
use HRNParis\mediapartners as mediapartners;
use HRNParis\press_main as press_main;

include_once('controllers/mediapartners_main.php');
include_once('controllers/press_main.php');
$main = new press_main\press_main;

$sponsors = new mediapartners\mediapartners_main;

?>

<!doctype html>
<html lang="en">
<head>
<meta name="description" content="The fastest growing HR event in the world. Paris October 24 - 25">
<meta name="keywords" content="HR Conference, HR Tech Europe, HR Tech Conference, HR Congress, HR Tech Congress, iRecruit, disruptHR ">
<meta name="author" content="HRN Europe - The Pan European HR Network">
<meta name="developer" content="Developed by: TesseracT - bottyan.tamas@web-developer.hu, Benedek Nagy - trialshock@gmail.com, Myrrdhinn - balazs.pentek@web-developer.hu">
<meta charset="utf-8" />
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<title>HR Tech World Congress | Press</title>

<!-- Open Graph data -->
<meta property="og:site_name" content="HR Tech World Congress"/>
<meta property="og:title" content="HR Tech World Congress | Press"/>
<meta property="og:description" content="The fastest growing HR event in the world! Paris October 24 - 25"/>
<meta property="og:url" content="http://hrtechcongress.com/travel">
<meta property="og:type" content="website"/>
<meta property="og:image" content="http://hrtechcongress.com/img/preview-images/preview-image-1.jpg" />
<meta property="og:image" content="http://hrtechcongress.com/img/preview-images/preview-image-2.jpg" />
<meta property="og:image" content="http://hrtechcongress.com/img/preview-images/preview-image-3.jpg" />

<!--Include Raleway Google Font -->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>

<!-- Include Source Sans Prog Google Font -->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

<!--Include Include Proxima Nova Font (Adobe Typekit) -->
<script src="//use.typekit.net/gku8ogo.js"></script>
<script>try{Typekit.load();}catch(e){}</script>

<!--Include Font Awesome -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-touch-icon-144x144.png">
<link rel="icon" type="image/png" href="img/favicon/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="img/favicon/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="img/favicon/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="img/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="img/favicon/mstile-144x144.png">
<meta name="theme-color" content="#ffffff">
<link rel="shortcut icon" href="favicon.ico">

<!-- Include General CSS Definitions -->
<link rel="stylesheet" href="../css/general.css" />

<!-- Include the Navigation Menu`s CSS Definitions -->
<link rel="stylesheet" href="css/menu.css" />

<!-- Include Custom CSS Definitions -->


<link rel="stylesheet" href="css/press.css" />
<link rel="stylesheet" href="../css/travel-icons.css" />

<!-- Include Footer CSS Definitions -->
<link rel="stylesheet" href="../css/footer.css" />


<!-- Include jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


<!-- Scroll to top JS -->
<script src="../js/gotopscroll.js"></script>

<!-- Mobile Menu JS -->
<script src="../js/menu.js"></script>

<!-- Include Reveal Modal -->
<link rel="stylesheet" href="../vendor/reveal/reveal.css">
<script src="../vendor/reveal/jquery.reveal.js" type="text/javascript"></script>

<!-- Travel JS -->
<script src="js/press.js"></script>

<?php 
if(isset($_SESSION['admin'])){
	echo '
	<link rel="stylesheet" href="css/admin_menu.css" />
	<link rel="stylesheet" href="css/admin_socials.css" />
<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<script src="js/admin_edit_press.js"></script>
<script src="js/admin_press_order.js"></script>
<script src="js/admin_mediapartner_order.js"></script>


	';
	
}
?>


<!-- Thank you modal -->
<script type="text/javascript">
$(document).ready(function() {
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
   show_menu('press');
?>
  
<!-- END MAIN MENU -->

<!-- Header -->
<header>
  <div id="HeaderInnerContainer">
      <h1>Press</h1>
      <p id="LightParagraph">A buzzing space for Media, Bloggers, Editors, Journalists and Reporters - from all over the world to share the latest news in HR and Technology.</p>
         
  </div>
</header>
<!-- END Header -->

<!-- Tab Panel Buttons -->
<div id="TabPanelButtonsContainer">
	<div id="MediaPartnersButton" class="TabPanelButton" onClick="_gaq.push(['_trackEvent', 'PressPage', 'OpenCollapsiblePanel', 'MediaPartners']);">
    	<div class="ArrowUp"></div>
    	<span class="DesktopText">Media Partners</span>
        <i class="icon icon-airline"></i>
    </div>
    <div id="BlogSquadButton" class="TabPanelButton" onClick="_gaq.push(['_trackEvent', 'PressPage', 'OpenCollapsiblePanel', 'BlogSquad']);">
    	<div class="ArrowUp"></div>
        <span class="DesktopText">Blog Squad</span>
        <i class="icon icon-hotels"></i>
    </div>
<!--    <div id="AnalystsButton" class="TabPanelButton" onClick="_gaq.push(['_trackEvent', 'PressPage', 'OpenCollapsiblePanel', 'Analysts']);">
    	<div class="ArrowUp"></div>
        <span class="DesktopText">Analysts</span>
        <i class="icon icon-cocktail"></i>
    </div>-->
</div>
<!-- END Tab Panel Buttons -->

<!-- Tab Panels -->
<a id="TabPanelAnchor" style="position: relative; top: -20vw;"></a>
<div id="TabPanelWrapper">

<!-- Media Partners -->
<section class="TabPanel" id="MediaPartners">
      <?php 

  $content = $sponsors->sponsors_grid(1); 
  echo $content;	

  
?>

</section>
<!-- END Media Partners -->

<!-- Blog Squad -->
<section class="TabPanel" id="BlogSquad">
	<h2>Blog Squad</h2>
<div id="BloggerContainer">
    <ul>       
<?php 



  $content = $main->press_display_admin(1); 
    if(isset($content)) {
		  echo $content;	
	}
   


?>
</ul>
</div>
</section>
<!-- END Blog Squad -->

<!-- Analysts -->
<section class="TabPanel" id="Analysts" style="display:none">
	<h2>Analysts</h2>
    
<div id="AnalystsContainer">
    <ul>    
<?php 


/*
  $content = $main->press_display_admin(2); 
    if(isset($content)) {
		  echo $content;	
	}
   */

?>
</ul>
</div>


</section>
<!-- END Analysts -->

</div>
<!-- END Tab Panels -->

<!-- FOOTER -->
<footer>
  <div id="FooterWrapper">
    <div id="FooterLeftWrapper">
      <h2 class="Contact FontRaleway">CONTACT</h2>
      <h3 class="Contact FontProximaNova"><i class="fa fa-phone"></i>+36 1 201 1469</h3>
      <h3 class="Contact FontProximaNova"><i class="fa fa-phone"></i>UK/IE +44 20 34 689 689</h3>
      <h3 class="Contact FontProximaNova"><i class="fa fa-envelope"></i>hrn@hrneurope.com</h3>
      <div id="GetInTouchButtonContainer"> <span data-reveal-id="DownloadBrochureModal" onClick="_gaq.push(['_trackEvent', 'Footer', 'ModalOpen', 'DownloadBrochure']);">
        <button class="BlueButton FontRaleway" id="DownloadBrochureButton" >Request Brochure</button>
        </span> </div>
    </div>
    <div id="FooterRightWrapper">
      <form>
        <h2>SIGN UP FOR NEWSLETTER</h2>
        <input type="text">
        <input type="submit" value="SEND" onClick="_gaq.push(['_trackEvent', 'Footer', 'FormSubmission', 'SignUpForNewsletter']);">
      </form>
      <div id="FooterSocialIconsContainer"> <a href="https://twitter.com/hrtechworld" target="_blank" title="HR Tech World - Twitter" onClick="_gaq.push(['_trackEvent', 'Footer', 'ExternalForward', 'Twitter']);">
        <div id="FooterTwitter" class="FooterSocialIcon"></div>
        </a> <a href="https://www.facebook.com/worldhrtech?ref=hl" target="_blank" title="HR Tech Europe - Facebook" onClick="_gaq.push(['_trackEvent', 'Footer', 'ExternalForward', 'Facebook']);">
        <div id="FooterFacebook" class="FooterSocialIcon"></div>
        </a> <a href="https://www.linkedin.com/grp/home?gid=1909337" target="_blank" title="HR Tech Europe - LinkedIn" onClick="_gaq.push(['_trackEvent', 'Footer', 'ExternalForward', 'LinkedIn']);">
        <div id="FooterLinkedIn" class="FooterSocialIcon"></div>
        </a> <a href="http://www.slideshare.net/hrtecheurope/presentations" target="_blank" title="HR Tech Europe - SlideShare" onClick="_gaq.push(['_trackEvent', 'Footer', 'ExternalForward', 'SlideShare']);">
        <div id="FooterSlideShare" class="FooterSocialIcon"></div>
        </a> <a href="https://www.flickr.com/photos/hrtecheurope/sets/with/72157651210562997" target="_blank" title="HR Tech Europe - Flickr" onClick="_gaq.push(['_trackEvent', 'Footer', 'ExternalForward', 'Flickr']);">
        <div id="FooterFlickr" class="FooterSocialIcon"></div>
        </a> </div>
    </div>
  </div>
  <div id="TransparentFooter">
    <div id="TransparentFooterInnerContainer">
      <div id="TransparentFooterImage"><img src="img/footer/footer-hrtech-logo.png" alt="HR Tech World Congress logo"></div>
      <div id="TransparentFooterTextContainer">
        <h6 class="TransparentFooterText FontRaleway" id="CopyrightText">Copyright &copy; 2015 HRN Europe. All Rights Reserved.</h6>
        <h6 class="TransparentFooterText FontRaleway" id="PrivacyText">Privacy Policy | Terms and Conditions</h6>
      </div>
      <div style="clear: both;"></div>
    </div>
  </div>
</footer>
<!-- END FOOTER --> 
<!-- Go to Top Button --> 
<a href="#" class="GoTopButton">
<div id="GoTopImg"><i class="fa fa-caret-up"></i></div>
</a> 
<!-- END Go to Top Button --> 

<!-- Download Brochure Modal -->
<div id="DownloadBrochureModal" class="reveal-modal" data-reveal> <a class="close-reveal-modal">&#215;</a>
  <h2>Download Brochure</h2>
  <p>Thank you for your request. Please fill in all the fields below!</p>
  <!-- BEGINING of : DOWNLOAD BROCHURE MODAL FORM -->
  <form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">
    <input type=hidden name="oid" value="00DD0000000nwgk">
    <input type=hidden name="retURL" value="http://hrtechcongress.com/travel#ThankYouBrochureModal">

      <input required placeholder="First Name *"  id="first_name" maxlength="40" name="first_name" size="20" type="text" />
      <input required placeholder="Last Name *" id="last_name" maxlength="80" name="last_name" size="20" type="text" />

        <input required placeholder="Email Address *" id="email" maxlength="80" name="email" size="20" type="text" />
        <input required placeholder="Phone Number *" id="phone" maxlength="40" name="phone" size="20" type="text" />
        <input required placeholder="Company *" id="company" maxlength="40" name="company" size="20" type="text" />
        <input required placeholder="Job Title *" id="title" maxlength="40" name="title" size="20" type="text" />
        <select  style="display:none;"   id="lead_source" name="lead_source">
          <option selected="selected" value="HRTechParis2015-DownloadPDF">HRTechParis2015-DownloadPDF</option>
        </select>
        <input onClick="_gaq.push(['_trackEvent', 'DownloadPDFForm', 'FromSubmission', 'InquirySent']);" class="submitbutton" type="submit" name="submit" value="SEND">
  </form>
  <!-- END of : DOWNLOAD BROCHURE MODAL FORM -->
</div>
<!-- END Download Brochure Modal -->

<!-- Partner Program Modal -->
<div id="PartnerProgramModal" class="reveal-modal" data-reveal> <a class="close-reveal-modal">&#215;</a>
  <h2>Partner Program</h2>
  <p>Thank you for your interest. Please fill in the fields below!</p>
  <!-- BEGINING of : PARTNER PROGRAM MODAL FORM -->
  <form method="POST" id="PartnerForm">
    
    <!--<input type=hidden name="retURL" value="http://hrtechcongress.com/travel#ThankYouPartnerProgramModal">-->
    <input type=hidden name="retURL" value="http://dev.hrtechcongress.com/travel.php#ThankYouPartnerProgramModal">

      <input required placeholder="Name *" maxlength="40" id="PartnerName" size="20" type="text" />
      <input required placeholder="Company *" maxlength="40" id="PartnerCompany" size="20" type="text" />
      <input required placeholder="Email Address *" maxlength="80" id="PartnerEmail" size="20" type="text" />
      <input required placeholder="Phone Number *" maxlength="40" id="PartnerPhone" size="20" type="text" />
      <select id="ProgramName">
      	<option value="StGermain" id="StGermainOption">Guided Walking Tour - St. Germain des Pres & Latin Quarter</option>
      	<option value="WineAndCheeseTasting" id="WineAndCheeseTastingOption">Wine and Cheese Tasting</option>
        <option value="LouvreMuseum" id="LouvreMuseumOption">Guided Tour - Louvre Museum</option>
        <option value="Montmartre" id="MontmartreOption">Guided Visit of Montmartre with Lunch and Wine Tasting</option>
     </select>
     <p>Please indicate how many people do you wish to bring along!</p>
     <div id="RadioButtonsContainer">
         <input type="radio" name="ExtraPeople" value="0" id="0person" checked="checked" /><label for="0person">0</label>
         <input type="radio" name="ExtraPeople" value="1" id="1person" /><label for="1person">1</label>
         <input type="radio" name="ExtraPeople" value="2" id="2people" /><label for="2people">2</label>
         <input type="radio" name="ExtraPeople" value="3" id="3people" /><label for="3people">3</label>
      </div>
      <input onClick="_gaq.push(['_trackEvent', 'PartnerProgramForm', 'FromSubmission', 'InquirySent']);" id="PartnerProgramSubmit" class="submitbutton" type="submit" name="submit" value="SEND">
  </form>
  <!-- END of : PARTNER PROGRAM MODAL FORM -->
</div>
<!-- END Partner Program Modal -->

<!-- Thank You Brochure Modal -->
<div id="ThankYouBrochureModal" class="reveal-modal" data-reveal> <a class="close-reveal-modal">&#215;</a>
  <h2>Thank you!</h2>
   <p>You shall receive an email shortly from one of our team.</p>
</div>
<!-- END Thank You Modal -->

<!-- Thank You Partner Program Modal -->
<div id="ThankYouPartnerProgramModal" class="reveal-modal" data-reveal> <a class="close-reveal-modal">&#215;</a>
   <h2>Thank you!</h2>
   <p>Thank you for your interest. <br>We will very shortly confirm your application and send full details via e-mail.</p>
</div>
<!-- END Thank You Modal -->

<!-- Start of Async HubSpot Analytics Code -->
  <script type="text/javascript">
    (function(d,s,i,r) {
      if (d.getElementById(i)){return;}
      var n=d.createElement(s),e=d.getElementsByTagName(s)[0];
      n.id=i;n.src='//js.hs-analytics.net/analytics/'+(Math.ceil(new Date()/r)*r)+'/412210.js';
      e.parentNode.insertBefore(n, e);
    })(document,"script","hs-analytics",300000);
  </script>
<!-- End of Async HubSpot Analytics Code -->

</body>
</html>
