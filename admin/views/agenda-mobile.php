<?php 
namespace HRNParis\agenda;
include_once('controllers/agenda_main.php');

$agenda = new agenda_main;
?>


<!doctype html>
<html lang="en">
<head>
<meta name="description" content="The fastest growing HR event in the world. Paris October 24 - 25">
<meta name="keywords" content="HR Conference, HR Tech Europe, HR Tech Conference, HR Congress, HR Tech Congress, iRecruit, disruptHR ">
<meta name="author" content="HRN Europe - The Pan European HR Network">
<meta name="designer" content="Designed by: Judit Bernat - juditbernat.mail@gmail.com ">
<meta name="developer" content="Developed by: TesseracT - bottyan.tamas@web-developer.hu, Benedek Nagy - trialshock@gmail.com, Myrrdhinn - balazs.pentek@web-developer.hu">
<meta charset="utf-8" />
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<title>HR Tech World Congress | Agenda</title>

<!-- Open Graph data -->
<meta property="og:site_name" content="HR Tech World Congress"/>
<meta property="og:title" content="HR Tech World Congress | Agenda"/>
<meta property="og:description" content="The fastest growing HR event in the world! Paris October 24 - 25"/>
<meta property="og:url" content="http://hrtechcongress.com/agenda">
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
<link rel="stylesheet" href="css/general.css" />

<!-- Include the Navigation Menu`s CSS Definitions -->
<link rel="stylesheet" href="css/menu.css" />

<!-- Include Custom CSS Definitions -->
<link rel="stylesheet" href="css/agenda.css" />
<link rel="stylesheet" href="css/agenda-icons.css">

<!-- Include Footer CSS Definitions -->
<link rel="stylesheet" href="css/footer.css" />

<!-- Include jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<!-- Scroll to top JS -->
<script src="js/gotopscroll.js"></script>

<!-- Mobile Menu JS -->
<script src="js/menu.js"></script>

<!-- Agenda JS -->
<script src="js/agenda.js"></script>

<!-- Include Reveal Modal -->
<link rel="stylesheet" href="vendor/reveal/reveal.css">
<script src="vendor/reveal/jquery.min.js" type="text/javascript"></script>
<script src="vendor/reveal/jquery.reveal.js" type="text/javascript"></script>

<!-- Thank you modal -->
<script type="text/javascript">
$(document).ready(function() {
	if(window.location.href.indexOf('#ThankYouBrochureModal') != -1) {
   		jQuery("#ThankYouBrochureModal").reveal();
  	} 
});
</script>
<!-- END Thank you modal  -->

<!-- Redirects the user to the Agenda Desktop page at 1000px++ -->
<script type="text/javascript">
if ($(window).width() > 1000) {
    window.location = 'agenda';
} 
</script>


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
<nav>
  <div id="MobileMenuContainer"> <a href="http://hrtechcongress.com" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'LogoHome']);">
    <div id="MobileMenuLogo"></div>
    </a>
    <div id="MobileMenuButton" onClick='ShowMobileMenu()'></div>
    <div id="MobileNav" class="sidebar">
      <div id="MobileMenuListContainer"> <img id="MobileMenuCloseButton" src="img/menu/mobile-close-button.png" alt="X" onClick='HideMobileMenu()'>
        <ul id="MobileUl">
          <li><a href="http://hrtechcongress.com#AboutSection" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'About']);" title="About">About</a></li>
          <li><a href="speakers" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Speakers']);" title="Speakers">Speakers</a></li>
          <li><a href="sponsors" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Sponsors']);" title="Sponsors">Sponsors</a></li>
          <li><a href="hotels" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Hotels']);" title="Hotels">Hotels</a></li>
          <li><a href="http://blog.hrtecheurope.com/" onClick="_gaq.push(['_trackEvent', 'Navigation', 'ExternalForward', 'Blog']);" title="Blog">Blog</a></li>
          <li><a href="contact" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Contact']);" title="Get In Touch">Get In Touch</a></li>
          <li><a href="tickets" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Tickets']);" title="Get Tickets"><i class="fa fa-ticket"></i> Get Tickets</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<!-- MAIN MENU -->
<nav id="DesktopMenu">
	<a href="http://hrtechcongress.com" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'LogoHome']);"><div id="HRTechDesktopLogo">   </div></a>
	<ul id="DesktopMenuList">
    	<a href="http://hrtechcongress.com#AboutSection" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'About']);" title="About"><li class="DesktopMenuItem" id="MenuItemAbout">ABOUT</li></a>
        <a href="speakers" title="Speakers" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Speakers']);"><li class="DesktopMenuItem" id="MenuItemSpeakers">SPEAKERS</li></a>
          <li class="DesktopMenuItem TransparentDesktopMenuItem" id="PartnersDD"><a href="sponsors" title="Sponsors" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Sponsors']);">SPONSORS</a>
            <!-- Partners Dropdown 
                <div id="PartnersMenu">
                <div class="ArrowUp"></div>
                 <ul class="Dropdown" id="PartnersDropdown">
                    <a href="sponsor-appendices"><li>Sponsor Appendices</li></a>
                 </ul>   
                </div>
			<!-- Partners Dropdown -->  
          </li> 
        <a href="hotels" title="Hotels" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Hotels']);"><li class="DesktopMenuItem" id="MenuItemHighlights">HOTELS</li></a>
        <a target="_blank"  href="http://blog.hrtecheurope.com/" title="Blog" onClick="_gaq.push(['_trackEvent', 'Navigation', ExternalForward', 'Blog']);"><li class="DesktopMenuItem" id="MenuItemVenue">BLOG</li></a>
        <a href="contact" title="Get in Touch" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Contact']);"><li class="DesktopMenuItem" id="MenuItemGetInTouch">GET IN TOUCH</li></a>
        <a href="tickets" title="Get Tickets" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Tickets']);"><li class="DesktopMenuItem" id="DesktopGetTickets"><i class="fa fa-ticket"></i> GET TICKETS</li></a>
    </ul>
    <div id="DesktopMenuSocialIcons">
    	<a href="https://twitter.com/hrtechworld" target="_blank" title="Twitter" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Twitter']);"><div id="DesktopMenuTwitterIcon" class="DesktopMenuSocialIcon"></div></a>
        <a href="https://www.linkedin.com/grp/home?gid=1909337" target="_blank" title="LinkedIn" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'LinkedIn']);"><div id="DesktopMenuLinkedInIcon" class="DesktopMenuSocialIcon"></div></a>
        <a href="https://www.facebook.com/worldhrtech?ref=hl" target="_blank" title="Facebook" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Facebook']);"><div id="DesktopMenuFacebookIcon" class="DesktopMenuSocialIcon"></div></a>
        <a href="http://www.slideshare.net/hrtecheurope/presentations" target="_blank" title="Slideshare" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Slideshare']);"><div id="DesktopMenuSlideShareIcon" class="DesktopMenuSocialIcon"></div></a>
        <a href="https://www.flickr.com/photos/hrtecheurope/sets/with/72157651210562997" target="_blank" title="Flickr" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Flickr']);"><div id="DesktopMenuFlickrIcon" class="DesktopMenuSocialIcon"></div></a>
    </div>
</nav>
<!-- END MAIN MENU -->

<!-- Stage Mobile Bar -->
<div id="StageMobileBar">
	<span id="MobileStageName" class="TalentSummitColor">Talent Summit</span>
    <i id="MobileStageListButton" class="fa fa-bars"></i>
</div>
<!-- END Stage Mobile Bar -->

<!-- Stage List 1 -->
<div id="StageList">
    <!-- Stage List Button -->
    <div class="StageButton" id="StageListButton">
    	<div id="ShowSessions">
            <i class="icon icon-next-icon"></i>
        	<h6 class="StageName">Sessions</h6>
        </div>
        <div id="CloseStageList" class="invisible">
            <i class="icon icon-close-icon"></i>
        </div>
    </div>
    <!-- END Stage List Button -->
	<!-- Main Stage -->
    <div class="StageButton" id="MainStage">
    	<i class="icon icon-mainstage"></i>
        <h6 class="StageName">Main Stage</h6>
    </div>
    <!-- END Main Stage -->
	<!-- iRecruit -->
    <div class="StageButton" id="IRecruit">
    	<i class="icon icon-irecruit"></i>
        <h6 class="StageName">iRecruit</h6>
    </div>
    <!-- END iRecruit -->  
    <!-- Mobile Close Button 01 -->
    <div class="StageButton" id="MobileCloseButton01">
        <i class="icon icon-close-icon"></i>
    </div>
    <!-- END Mobile Close Button 01 -->  
	<!-- disruptHR -->
    <div class="StageButton" id="DisruptHR">
    	<i class="icon icon-disrupthr"></i>
        <h6 class="StageName">disruptHR</h6>
    </div>
    <!-- END disruptHR -->  
	<!-- HR Technology -->
    <div class="StageButton" id="HRTechnology">
    	<i class="icon icon-hr-technology"></i>
        <h6 class="StageName">HR Technology</h6>
    </div>
    <!-- END HR Technology --> 
	<!-- Talent Summit -->
    <div class="StageButton" id="TalentSummit">
    	<i class="icon icon-talent"></i>
        <h6 class="StageName">Talent Summit</h6>
    </div>
    <!-- END Talent Summit --> 
	<!-- Social Summit -->
    <div class="StageButton" id="SocialSummit">
    	<i class="icon icon-social"></i>
        <h6 class="StageName">Social Summit</h6>
    </div>
    <!-- END Social Summit -->             
	<!-- Services Summit -->
    <div class="StageButton" id="ServicesSummit">
    	<i class="icon icon-services"></i>
        <h6 class="StageName">Services Summit</h6>
    </div>
    <!-- END Services Summit -->     
	<!-- Workforce Summit -->
    <div class="StageButton" id="WorkforceSummit">
    	<i class="icon icon-workforce"></i>
        <h6 class="StageName">Workforce Summit</h6>
    </div>
    <!-- END Workforce Summit --> 
	<!-- User Adoption -->
    <div class="StageButton" id="UserAdoption">
    	<i class="icon icon-user-adoption"></i>
        <h6 class="StageName">User Adoption</h6>
    </div>
    <!-- END User Adoption -->     
	<!-- Cloud Summit -->
    <div class="StageButton" id="CloudSummit">
    	<i class="icon icon-cloud"></i>
        <h6 class="StageName">Cloud Summit</h6>
    </div>
    <!-- END Cloud Summit -->     
	<!-- Analytics Summit -->
    <div class="StageButton" id="AnalyticsSummit">
    	<i class="icon icon-analytics"></i>
        <h6 class="StageName">Analytics Summit</h6>
    </div>
    <!-- END Analytics Summit -->
 	<!-- Future of Work -->
    <div class="StageButton" id="FutureOfWork">
    	<i class="icon icon-future-of-work"></i>
        <h6 class="StageName">Future of Work</h6>
    </div>
    <!-- END Future of Work -->   
  	<!-- Pay & Rewards -->
    <div class="StageButton" id="PayAndRewards">
    	<i class="icon icon-pay-and-rewards"></i>
        <h6 class="StageName">Pay & Rewards</h6>
    </div>
    <!-- END Pay & Rewards -->  
     
    <!-- Mobile Next Button -->
    <div class="StageButton" id="MobileNextButton">
        <i class="icon icon-next-icon"></i>
    </div>
    <!-- END Mobile Next Button -->  
     
  	<!-- Product Demo -->
    <div class="StageButton" id="ProductDemo">
    	<i class="icon icon-product-demo"></i>
        <h6 class="StageName">Product Demo</h6>
    </div>
    <!-- END Product Demo -->     
   	<!-- Labs1 -->
    <div class="StageButton" id="Labs1">
    	<i class="icon icon-labs"></i>
        <h6 class="StageName">Labs 1</h6>
    </div>
    <!-- END Labs1 --> 
    <!-- Labs2 -->
    <div class="StageButton" id="Labs2">
    	<i class="icon icon-labs"></i>
        <h6 class="StageName">Labs 2</h6>
    </div>
    <!-- END Labs2 -->    
    <!-- Executive Summit -->
    <div class="StageButton" id="ExecutiveSummit">
    	<i class="icon icon-executive"></i>
        <h6 class="StageName">Executive Summit</h6>
    </div>
    <!-- END Executive Summit -->            
    <!-- Stage Apply Button -->
    <div class="StageButton" id="StageApplyButton">
        <h6 class="StageName">Apply</h6>
    </div>
    <!-- END Stage Apply Button -->     
</div>
<!-- END Stage List 1 -->

<!-- Stage List 2 -->
<div id="StageList2">
  	<!-- Product Demo -->
    <div class="StageButton" id="ProductDemoMobile">
    	<i class="icon icon-product-demo"></i>
        <h6 class="StageName">Product Demo</h6>
    </div>
    <!-- END Product Demo -->     
   	<!-- Labs1 -->
    <div class="StageButton" id="Labs1Mobile">
    	<i class="icon icon-labs"></i>
        <h6 class="StageName">Labs 1</h6>
    </div>
    <!-- END Labs1 --> 
    
    <!-- Mobile Close Button 01 -->
    <div class="StageButton" id="MobileCloseButton02">
        <i class="icon icon-close-icon"></i>
    </div>
    <!-- END Mobile Close Button 01 -->  
    
    <!-- Mobile Prev Button -->
    <div class="StageButton" id="MobileBackButton">
        <i class="icon icon-back-icon"></i>
    </div>
    <!-- END Mobile Prev Button -->     <!-- Labs2 -->
    <div class="StageButton" id="Labs2Mobile">
    	<i class="icon icon-labs"></i>
        <h6 class="StageName">Labs 2</h6>
    </div>
    <!-- END Labs2 -->    
    <!-- Executive Summit -->
    <div class="StageButton" id="ExecutiveSummitMobile">
    	<i class="icon icon-executive"></i>
        <h6 class="StageName">Executive Summit</h6>
    </div>
    <!-- END Executive Summit -->  
</div>
<!-- END Stage List 2 -->

<!-- Stage Confirm Panels (mobile only) -->
<!-- Panel: Main Stage -->
<div class="Panel MainStageBgColor" id="MainStagePanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-mainstage PanelStageIcon"></i>
        <h3 class="PanelStageName">Main Stage</h3>
        <p class="PanelStageDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget augue molestie, bibendum sem non, consequat dolor. Nam tempus metus quis arcu fringilla, eu tristique nisl egestas. Ut urna neque, lobortis quis accumsan consectetur.</p>
        <button class="PanelConfirmButton" data-agenda_category="1" id="MainStageConfirm">Confirm</button>
    </div>
</div>
<!-- END Panel: Main Stage -->

<!-- Panel: iRecruit -->
<div class="Panel IRecruitBgColor" id="IRecruitPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-irecruit PanelStageIcon"></i>
        <h3 class="PanelStageName">iRecruit</h3>
        <p class="PanelStageDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget augue molestie, bibendum sem non, consequat dolor. Nam tempus metus quis arcu fringilla, eu tristique nisl egestas. Ut urna neque, lobortis quis accumsan consectetur.</p>
        <button class="PanelConfirmButton" data-agenda_category="2" id="IRecruitConfirm">Confirm</button>
    </div>
</div>
<!-- END Panel: iRecruit -->

<!-- Panel: DisruptHR -->
<div class="Panel IRecruitBgColor" id="DisruptHRPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-disrupthr PanelStageIcon"></i>
        <h3 class="PanelStageName">DisruptHR</h3>
        <p class="PanelStageDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget augue molestie, bibendum sem non, consequat dolor. Nam tempus metus quis arcu fringilla, eu tristique nisl egestas. Ut urna neque, lobortis quis accumsan consectetur.</p>
        <button class="PanelConfirmButton" data-agenda_category="3" id="DisruptHRConfirm">Confirm</button>
    </div>
</div>
<!-- END Panel: DisruptHR -->

<!-- Panel: HR Technology -->
<div class="Panel HRTechnologyBgColor" id="HRTechnologyPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-hr-technology PanelStageIcon"></i>
        <h3 class="PanelStageName">HR Technology</h3>
        <p class="PanelStageDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget augue molestie, bibendum sem non, consequat dolor. Nam tempus metus quis arcu fringilla, eu tristique nisl egestas. Ut urna neque, lobortis quis accumsan consectetur.</p>
        <button class="PanelConfirmButton" data-agenda_category="4" id="HRTechnologyConfirm">Confirm</button>
    </div>
</div>
<!-- END Panel: HR Technology -->

<!-- Panel: Talent Summit -->
<div class="Panel TalentSummitBgColor" id="TalentSummitPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-talent PanelStageIcon"></i>
        <h3 class="PanelStageName">Talent Summit</h3>
        <p class="PanelStageDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget augue molestie, bibendum sem non, consequat dolor. Nam tempus metus quis arcu fringilla, eu tristique nisl egestas. Ut urna neque, lobortis quis accumsan consectetur.</p>
        <button class="PanelConfirmButton" data-agenda_category="5" id="TalentSummitConfirm">Confirm</button>
    </div>
</div>
<!-- END Panel: Talent Summit -->

<!-- Panel: Social Summit -->
<div class="Panel SocialSummitBgColor" id="SocialSummitPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-social PanelStageIcon"></i>
        <h3 class="PanelStageName">Social Summit</h3>
        <p class="PanelStageDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget augue molestie, bibendum sem non, consequat dolor. Nam tempus metus quis arcu fringilla, eu tristique nisl egestas. Ut urna neque, lobortis quis accumsan consectetur.</p>
        <button class="PanelConfirmButton" data-agenda_category="6" id="SocialSummitConfirm">Confirm</button>
    </div>
</div>
<!-- END Panel: Social Summit -->

<!-- Panel: Services Summit -->
<div class="Panel ServicesSummitBgColor" id="ServicesSummitPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-services PanelStageIcon"></i>
        <h3 class="PanelStageName">Services Summit</h3>
        <p class="PanelStageDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget augue molestie, bibendum sem non, consequat dolor. Nam tempus metus quis arcu fringilla, eu tristique nisl egestas. Ut urna neque, lobortis quis accumsan consectetur.</p>
        <button class="PanelConfirmButton" data-agenda_category="7" id="ServicesSummitConfirm">Confirm</button>
    </div>
</div>
<!-- END Panel: Services Summit -->

<!-- Panel: Workforce Summit -->
<div class="Panel WorkforceSummitBgColor" id="WorkforceSummitPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-workforce PanelStageIcon"></i>
        <h3 class="PanelStageName">Workforce Summit</h3>
        <p class="PanelStageDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget augue molestie, bibendum sem non, consequat dolor. Nam tempus metus quis arcu fringilla, eu tristique nisl egestas. Ut urna neque, lobortis quis accumsan consectetur.</p>
        <button class="PanelConfirmButton" data-agenda_category="8" id="WorkforceSummitConfirm">Confirm</button>
    </div>
</div>
<!-- END Panel: Workforce Summit -->

<!-- Panel: User Adoption -->
<div class="Panel UserAdoptionBgColor" id="UserAdoptionPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-user-adoption PanelStageIcon"></i>
        <h3 class="PanelStageName">User Adoption</h3>
        <p class="PanelStageDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget augue molestie, bibendum sem non, consequat dolor. Nam tempus metus quis arcu fringilla, eu tristique nisl egestas. Ut urna neque, lobortis quis accumsan consectetur.</p>
        <button class="PanelConfirmButton" data-agenda_category="9" id="UserAdoptionConfirm">Confirm</button>
    </div>
</div>
<!-- END Panel: User Adoption -->

<!-- Panel: Cloud Summit -->
<div class="Panel CloudSummitBgColor" id="CloudSummitPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-cloud PanelStageIcon"></i>
        <h3 class="PanelStageName">Cloud Summit</h3>
        <p class="PanelStageDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget augue molestie, bibendum sem non, consequat dolor. Nam tempus metus quis arcu fringilla, eu tristique nisl egestas. Ut urna neque, lobortis quis accumsan consectetur.</p>
        <button class="PanelConfirmButton" data-agenda_category="10" id="CloudSummitConfirm">Confirm</button>
    </div>
</div>
<!-- END Panel: Cloud Summit -->

<!-- Panel: Analytics Summit -->
<div class="Panel AnalyticsSummitBgColor" id="AnalyticsSummitPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-analytics PanelStageIcon"></i>
        <h3 class="PanelStageName">Analytics Summit</h3>
        <p class="PanelStageDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget augue molestie, bibendum sem non, consequat dolor. Nam tempus metus quis arcu fringilla, eu tristique nisl egestas. Ut urna neque, lobortis quis accumsan consectetur.</p>
        <button class="PanelConfirmButton" data-agenda_category="11" id="AnalyticsSummitConfirm">Confirm</button>
    </div>
</div>
<!-- END Panel: Analytics Summit -->

<!-- Panel: Analytics Summit -->
<div class="Panel FutureOfWorkBgColor" id="FutureOfWorkPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-future-of-work PanelStageIcon"></i>
        <h3 class="PanelStageName">Future of Work</h3>
        <p class="PanelStageDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget augue molestie, bibendum sem non, consequat dolor. Nam tempus metus quis arcu fringilla, eu tristique nisl egestas. Ut urna neque, lobortis quis accumsan consectetur.</p>
        <button class="PanelConfirmButton" data-agenda_category="12" id="FutureOfWorkConfirm">Confirm</button>
    </div>
</div>
<!-- END Panel: Analytics Summit -->

<!-- Panel: Pay & Rewards -->
<div class="Panel PayAndRewardsBgColor" id="PayAndRewardsPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-pay-and-rewards PanelStageIcon"></i>
        <h3 class="PanelStageName">Pay & Rewards</h3>
        <p class="PanelStageDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget augue molestie, bibendum sem non, consequat dolor. Nam tempus metus quis arcu fringilla, eu tristique nisl egestas. Ut urna neque, lobortis quis accumsan consectetur.</p>
        <button class="PanelConfirmButton" data-agenda_category="13" id="PayAndRewardsConfirm">Confirm</button>
    </div>
</div>
<!-- END Panel: Pay & Rewards -->

<!-- Panel: Product Demo -->
<div class="Panel ProductDemoBgColor" id="ProductDemoMobilePanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-product-demo PanelStageIcon"></i>
        <h3 class="PanelStageName">Product Demo</h3>
        <p class="PanelStageDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget augue molestie, bibendum sem non, consequat dolor. Nam tempus metus quis arcu fringilla, eu tristique nisl egestas. Ut urna neque, lobortis quis accumsan consectetur.</p>
        <button class="PanelConfirmButton" data-agenda_category="14" id="ProductDemoMobileConfirm">Confirm</button>
    </div>
</div>
<!-- END Panel: Product Demo -->

<!-- Panel: Labs 1 -->
<div class="Panel Labs1BgColor" id="Labs1MobilePanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-labs PanelStageIcon"></i>
        <h3 class="PanelStageName">Labs 1</h3>
        <p class="PanelStageDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget augue molestie, bibendum sem non, consequat dolor. Nam tempus metus quis arcu fringilla, eu tristique nisl egestas. Ut urna neque, lobortis quis accumsan consectetur.</p>
        <button class="PanelConfirmButton" data-agenda_category="15" id="Labs1MobileConfirm">Confirm</button>
    </div>
</div>
<!-- END Panel: Labs 1 -->

<!-- Panel: Labs 2 -->
<div class="Panel Labs2BgColor" id="Labs2MobilePanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-labs PanelStageIcon"></i>
        <h3 class="PanelStageName">Labs 2</h3>
        <p class="PanelStageDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget augue molestie, bibendum sem non, consequat dolor. Nam tempus metus quis arcu fringilla, eu tristique nisl egestas. Ut urna neque, lobortis quis accumsan consectetur.</p>
        <button class="PanelConfirmButton" data-agenda_category="16" id="Labs2MobileConfirm">Confirm</button>
    </div>
</div>
<!-- END Panel: Labs 2 -->

<!-- Panel: Executive Summit -->
<div class="Panel ExecutiveSummitBgColor" id="ExecutiveSummitMobilePanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-executive PanelStageIcon"></i>
        <h3 class="PanelStageName">Executive Summit</h3>
        <p class="PanelStageDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget augue molestie, bibendum sem non, consequat dolor. Nam tempus metus quis arcu fringilla, eu tristique nisl egestas. Ut urna neque, lobortis quis accumsan consectetur.</p>
        <button class="PanelConfirmButton" id="ExecutiveSummitMobileConfirm">Confirm</button>
    </div>
</div>
<!-- END Panel: Executive Summit -->
<!-- Stage Confirm Panels (mobile only) -->

<!-- Header -->
<header>
	<div id="HeaderInnerContainer">
      <h1 class="FontRaleway">Agenda</h1>
      <h2 class="FontRaleway">Lorem ipsum dolorf sit amet, consectetur adipiscing elit. Donec non nisl eleifend dolor</h2>
      <button class="FontRaleway">Agenda CTA</button>
	</div>
</header>
<!-- END Header -->

<!-- Stage Description -->
<section id="StageDescription" class="TalentSummitBackgroundImage"> <!-- switch the background-image here, and please delete this comment if it is done! -->
	<div id="StageDescriptionInnerContainer">
        <h2 id="SelectedStageName">Talent Summit</h2>
        <p id="SelectedStageText"><?php echo $agenda->get_header_text(1);  ?></p>
    </div>
</section>
<!-- END Stage Description -->

<!-- Tab Panel Navigation -->
<div id="TabPanelNavigation">
    <button class="TabPanelButton" id="Day1Button" onClick="day1();">DAY 1</button>
    <button class="TabPanelButton" id="Day2Button" onClick="day2();">DAY 2</button>
    <button class="TabPanelButton" id="MoreButton" onClick="more();">MORE...</button>
    <button class="TabPanelButton" id="TicketsButton" onClick="window.open('tickets', '_blank');">Tickets</button>
</div>
<!-- END Tab Panel Navigation --> 

<!-- Session List Mobile -->
<section id="SessionListMobile">
    <h2 class="EventDayTitle">DAY 1</h2>
    <!-- Day 1 Sessions -->
    
    <div class="SessionsList" id="SessionsDayOne">
        <?php
       $data = $agenda->agenda_session(1,1);
       $output = $agenda->display_session_mobile($data); 
        echo $output;
?>
    
                         
                
    </div>
    <!-- END Day 1 Sessions -->
    
    <script type="text/javascript">
	$(document).ready(function() {
     	$("#EventDay2Title").click(function() {
			$("#EventDay2Title").css("margin-left", "-50vw");
			$("#Day2TitleMobile").css("margin-left", "0");
			$("#Day2TitleMobile").css("height", "auto");
		});
	});
	</script>
    <script type="text/javascript">
    $(document).scroll(function() {
		  var y = $(this).scrollTop();
		  if (y > 400) {
			  $("#EventDay2Title").css("margin-left", "-50vw");
			 //y = 0;
		  }
		  if (y > 900) {
			  $("#EventDay2Title").css("margin-left", "-50vw");
		  }
	});
  
  	</script>
    <style type="text/css">
	#EventDay2Title {
		display: inline-block;
		position: fixed;
		top: 500px;
		margin-left: 0;
	}
	@media (max-width: 1000px) {
		#EventDay2Title {
			top: 60vw;	
		}
	}
	#Day2TitleMobile {
		height: 0;
		margin-left: -50vw;
		transition: margin-left 0.3s;	
	}
	</style>
    
    <a href="#SessionsDayTwoAnchor"><h2 class="EventDayTitle" id="EventDay2Title">DAY 2 <i class="fa fa-angle-down"></i></h2></a>
    
    
    
    <!-- Day 2 Sessions -->
    <a id="SessionsDayTwoAnchor" style="position: relative; top: -30vw;"></a>
    <h2 class="EventDayTitle" id="Day2TitleMobile">DAY 2</h2>
    <div class="SessionsList" id="SessionsDayTwo">
    	        <?php
       $data = $agenda->agenda_session(1,2);
	   if (isset($data) && $data != ''){
		   
		      $output = $agenda->display_session_mobile($data); 
              echo $output; 
	   }

?>                
    </div>
    <!-- END Day 2 Sessions -->
    
</section>
<!-- END Session List Mobile -->



<!-- Speakers and Testimonials -->
<section id="SpeakersAndTestimonialsContainer">
<?php
$blocks = $agenda->block_display(1,1);

    foreach ($blocks as $elems) {
	  echo  $agenda->get_block_data($elems[0], $elems[1]);	
	}
	


?>
</section>
<!-- END Speakers and Testimonials -->   

<!-- Sponsors -->
<section id="Sponsors">
	<div id="SponsorsInnerContainer">
            <div class="Sponsor">
                <img src="img/agenda/oracle-logo.svg" alt="Oracle Human Capital Management">
            </div>
            <div class="Sponsor WhiteSponsorBg">
               <img src="img/agenda/successfactors-logo.svg" alt="SuccessFactors An SAP Company">
            </div>
            <div class="Sponsor WhiteSponsorBg">
               <img src="img/agenda/wired-logo.svg" alt="Wired">
            </div>
			<div class="Sponsor">
                <img src="img/agenda/ibm-logo.svg" alt="IBM">
            </div>
    </div>
</section>
<!-- END Sponsors -->

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

<!-- Session Info Modal -->
<div id="SessionInfoModal" class="reveal-modal" data-reveal> 
  <i id="SessionInfoModalCloseButton" class="icon icon-close-icon close-reveal-modal"> </i>
  <?php
  $modal = $agenda->agenda_session_modal(3, 1, 2);
  echo $modal;
?>
</div>
<!-- END Session Info Modal -->

<!-- Download Brochure Modal -->
<div id="DownloadBrochureModal" class="reveal-modal" data-reveal> <a class="close-reveal-modal">&#215;</a>
  <h2>Download Brochure</h2>
  <p>Thank you for your request. Please fill in all the fields below!</p>
<!-- BEGINING of : DOWNLOAD BROCHURE MODAL FORM -->
  <form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">
    <input type=hidden name="oid" value="00DD0000000nwgk">
    <input type=hidden name="retURL" value="http://hrtechcongress.com/loyalty-program#ThankYouBrochureModal">

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

<!-- Thank You Brochure Modal -->
<div id="ThankYouBrochureModal" class="reveal-modal" data-reveal> <a class="close-reveal-modal">&#215;</a>
  <h2>Thank you!</h2>
   <p>You shall receive an email shortly from one of our team.</p>
</div>
<!-- END Thank You Modal -->

<!-- Named anchor Hashtag script --> 
<script type="text/javascript">
$('a[href*=#]:not([href=#])').click(function(){
    $('html, body').animate({
        scrollTop: $( $(this).attr('href') ).offset().top
    }, 1000);
    return false;
});
</script> 

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
