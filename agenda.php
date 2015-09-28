<?php 
namespace HRNParis\agenda;
include_once('controllers/agenda_main.php');

$agenda = new agenda_main;

if(!isset($_SESSION)){
  session_start();		
}

   $_SESSION['Category'] = 1;	

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

<!-- Social widget mobile controller -->
<script src="js/social.js"></script>

<!-- Include Reveal Modal -->
<link rel="stylesheet" href="vendor/reveal/reveal.css">
<script src="vendor/reveal/jquery.min.js" type="text/javascript"></script>
<script src="vendor/reveal/jquery.reveal2.js" type="text/javascript"></script>

<!-- Keyframes  -->
<link rel="stylesheet" href="vendor/reveal/reveal.css">
<script src="vendor/keyframes/jquery.keyframes.min.js" type="text/javascript"></script>




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
          <li><a href="press" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Press']);" title="Press">Press</a></li>
          <li><a href="agenda" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Agenda']);" title="Agenda" id="MobileMenuItemHovered">Agenda</a></li>
          <li><a href="travel" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Travel']);" title="Travel">Travel</a></li>
          <li><a href="floorplan" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Floorplan']);" title="Floorplan">Floorplan</a></li>
          <li><a href="http://blog.hrtecheurope.com/" onClick="_gaq.push(['_trackEvent', 'Navigation', 'ExternalForward', 'Blog']);" title="Blog">Blog</a></li>
          <li><a href="contact" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Contact']);" title="Get In Touch">Get In Touch</a></li>
          <li><a href="tickets" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Tickets']);" title="Get Tickets"><i class="fa fa-ticket"></i> Get Tickets</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<!-- MAIN MENU -->
<nav id="DesktopMenu"> <a href="http://hrtechcongress.com" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'LogoHome']);">
  <div id="HRTechDesktopLogo"> </div>
  </a>
  <ul id="DesktopMenuList">
    <a href="http://hrtechcongress.com#AboutSection" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'About']);" title="About">
    <li class="DesktopMenuItem" id="MenuItemAbout">ABOUT</li>
    </a> <a href="speakers" title="Speakers" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Speakers']);">
    <li class="DesktopMenuItem" id="MenuItemSpeakers">SPEAKERS</li>
    </a>
    <a href="sponsors" title="Sponsors" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Sponsors']);">
    <li class="DesktopMenuItem" id="MenuItemSponsors">SPONSORS</li>
    </a>
    <a href="press" title="Press" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Press']);">
        <li class="DesktopMenuItem" id="MenuItemSponsors">PRESS</li>
    </a> 
    <a href="agenda" title="Agenda" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Agenda']);">
    <li class="DesktopMenuItem DesktopMenuItemHovered">AGENDA</li>
    </a>
    <li class="DesktopMenuItem" id="InfoDD"><a href="#" title="" >INFORMATION</a> 
      <!-- Information Dropdown -->
            <div id="InformationMenu">
            <div class="ArrowUpDD"></div>
             <ul class="Dropdown" id="InformationDropdown">
                <a href="travel" title="Travel" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Travel']);"><li>Travel</li></a>
                <a href="floorplan" title="Floorplan" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Floorplan']);"><li>Floorplan</li></a>
                <a href="contact" title="Get in Touch" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Contact']);"><li>Get in Touch</li></a>
                <a href="http://blog.hrtecheurope.com/" title="Blog" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Blog']);"><li>Blog</li></a>
             </ul>   
            </div>
        </li> 
        <!-- Information Dropdown --> 
 <a href="tickets" title="Get Tickets" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Tickets']);">
    <li class="DesktopMenuItem" id="DesktopGetTickets"><i class="fa fa-ticket"></i> GET TICKETS</li>
    </a>
  </ul>
  <div id="DesktopMenuSocialIcons"> <a href="https://twitter.com/hrtechworld" target="_blank" title="Twitter" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Twitter']);">
    <div id="DesktopMenuTwitterIcon" class="DesktopMenuSocialIcon"></div>
    </a> <a href="https://www.linkedin.com/grp/home?gid=1909337" target="_blank" title="LinkedIn" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'LinkedIn']);">
    <div id="DesktopMenuLinkedInIcon" class="DesktopMenuSocialIcon"></div>
    </a> <a href="https://www.facebook.com/worldhrtech?ref=hl" target="_blank" title="Facebook" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Facebook']);">
    <div id="DesktopMenuFacebookIcon" class="DesktopMenuSocialIcon"></div>
    </a> <a href="http://www.slideshare.net/hrtecheurope/presentations" target="_blank" title="Slideshare" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Slideshare']);">
    <div id="DesktopMenuSlideShareIcon" class="DesktopMenuSocialIcon"></div>
    </a> <a href="https://www.flickr.com/photos/hrtecheurope/sets/with/72157651210562997" target="_blank" title="Flickr" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Flickr']);">
    <div id="DesktopMenuFlickrIcon" class="DesktopMenuSocialIcon"></div>
    </a> </div>
</nav>
<!-- END MAIN MENU --> 

<!-- Social Share Widget -->
<!-- Twitter share Link --> 
<script>
$(document).ready(function() {
  $('.twittershare').click(function(event) {
    var width  = 575,
        height = 400,
        left   = ($(window).width()  - width)  / 2,
        top    = ($(window).height() - height) / 2,
        url    = this.href,
        opts   = 'status=1' +
                 ',width='  + width  +
                 ',height=' + height +
                 ',top='    + top    +
                 ',left='   + left;
    
    window.open(url, 'twitter', opts);
    return false;
  })
});
</script> 
<!-- Twitter share Link -->
<div id="SocialWidgetWrapper"> 
  <a href="http://www.facebook.com/share.php?u=http://hrtechcongress.com/agenda&title=HRTechCongress" target="_blank" onClick="_gaq.push(['_trackEvent', 'FloatingSocialShare', 'ExternalForward', 'Facebook']);">
  <div id="FacebookShare"><i class="fa fa-facebook"></i></div>
  </a>
   <a href="https://twitter.com/home?status=Check+out+the+2015+Agenda+-+13+stages+to+choose+from%21%0Ahttp://hrtechcongress.com/agenda%0A%23hrtechworld %23hrtech" class="twittershare twitter" data-text="HR Tech World Congress 2015 – Unleash Your People!" onClick="_gaq.push(['_trackEvent', 'FloatingSocialShare', 'ExternalForward', 'Twitter']);">
  <div id="TwitterShare"><i class="fa fa-twitter"></i></div>
  </a> <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=http://hrtechcongress.com/agenda&title=HR Tech World Congress 2015 – Unleash Your People!" onClick="_gaq.push(['_trackEvent', 'FloatingSocialShare', 'ExternalForward', 'LinkedIn']);">
  <div id="LinkedInShare"><i class="fa fa-linkedin"></i></div>
  </a> </div>
<!--END Social Share Widget --> 

<!-- Floating Desktop Menu -->
<nav id="FloatingDesktopMenu">
	<ul id="StageMenu">
    	<li class="StageMenuItem" id="StageMenuListTitle">Breakout Sessions <i class="icon icon-close-icon"></i></li>
        <?php
            $output = $agenda->display_categories_v7(); 
            echo $output;
       ?>
    </ul>
</nav>
<!-- END Floating Desktop Menu -->

<!-- Stage Mobile Bar -->
<div id="StageMobileBar">
	<span id="MobileStageName" class="MainStageColor">Main Stage</span>
    <i id="MobileStageListButton" class="fa fa-bars"></i>
</div>
<!-- END Stage Mobile Bar -->

<!-- Stage List -->
<div id="StageList">
	<!-- HR Technology -->
    <div class="StageButton" data-agenda_category="4" id="HRTechnology">
    	<i class="icon icon-hr-technology"></i>
        <h6 class="StageName">HR Technology</h6>
    </div>
    <!-- END HR Technology -->     
	<!-- Main Stage -->
    <div class="StageButton" data-agenda_category="1" id="MainStage">
    	<i class="icon icon-mainstage"></i>
        <h6 class="StageName">Main Stage</h6>
    </div>
    <!-- END Main Stage -->
    
	<!-- Talent Summit -->
    <div class="StageButton" data-agenda_category="5" id="TalentSummit">
    	<i class="icon icon-talent"></i>
        <h6 class="StageName">Talent & Recruitment </h6>
    </div>
    <!-- END Talent Summit --> 
	<!-- Social Summit -->
    <div class="StageButton" data-agenda_category="6" id="SocialSummit">
    	<i class="icon icon-social"></i>
        <h6 class="StageName">Social</h6>
    </div>
    <!-- END Social Summit -->             
	<!-- Services Summit -->
    <div class="StageButton" data-agenda_category="7" id="ServicesSummit">
    	<i class="icon icon-services"></i>
        <h6 class="StageName">HR SS & Payroll </h6>
    </div>
    <!-- END Services Summit -->     
	<!-- Workforce Summit -->
    <div class="StageButton" data-agenda_category="8" id="WorkforceSummit">
    	<i class="icon icon-workforce"></i>
        <h6 class="StageName">Learning</h6>
    </div>
    <!-- END Workforce Summit --> 
	<!-- User Adoption -->
    <div class="StageButton" data-agenda_category="9" id="UserAdoption">
    	<i class="icon icon-user-adoption"></i>
        <h6 class="StageName">Adoption</h6>
    </div>
    <!-- END User Adoption -->     
	<!-- Cloud Summit -->
    <div class="StageButton" data-agenda_category="10" id="CloudSummit">
    	<i class="icon icon-cloud"></i>
        <h6 class="StageName">Cloud</h6>
    </div>
    <!-- END Cloud Summit -->     
	<!-- Analytics Summit -->
    <div class="StageButton" data-agenda_category="11" id="AnalyticsSummit">
    	<i class="icon icon-analytics"></i>
        <h6 class="StageName">Data & Analytics </h6>
    </div>
    <!-- END Analytics Summit -->
 	<!-- Future of Work 
    <div class="StageButton" data-agenda_category="12" id="FutureOfWork">
    	<i class="icon icon-future-of-work"></i>
        <h6 class="StageName">Future of Work</h6>
    </div>
    <!-- END Future of Work -->   
  	<!-- Pay & Rewards -->
    <div class="StageButton" data-agenda_category="13" id="PayAndRewards">
    	<i class="icon icon-pay-and-rewards"></i>
        <h6 class="StageName">Pay & Rewards</h6>
    </div>
    <!-- END Pay & Rewards -->  
        
  	<!-- Product Demo -->
    <div class="StageButton" data-agenda_category="14" id="ProductDemo">
    	<i class="icon icon-product-demo"></i>
        <h6 class="StageName">Product Demonstration</h6>
    </div>
    <!-- END Product Demo -->     
   	<!-- Labs1 -->
    <div class="StageButton" data-agenda_category="15" id="Labs1">
    	<i class="icon icon-labs"></i>
        <h6 class="StageName">Labs 1</h6>
    </div>
    <!-- END Labs1 --> 
           
    <!-- Labs2 -->
    <div class="StageButton" data-agenda_category="16" id="Labs2">
    	<i class="icon icon-labs"></i>
        <h6 class="StageName">Labs 2</h6>
    </div>
    <!-- END Labs2 --> 
    
    <!-- Labs3 -->
    <div class="StageButton" data-agenda_category="17" id="Labs3">
    	<i class="icon icon-labs"></i>
        <h6 class="StageName">Labs3</h6>
    </div>
    <!-- END Labs3 -->
    
    <!-- Unconference -->
    <div class="StageButton" data-agenda_category="19" id="Unconference">
    	<i class="icon icon-unconference"></i>
        <h6 class="StageName">UnConference</h6>
    </div>
    <!-- END Unconference -->    
    
</div>
<!-- END Stage List-->

<!-- Stage Confirm Panels (mobile only) -->
<!-- Panel: Main Stage -->
<div class="Panel MainStageBgColor" id="MainStagePanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-mainstage PanelStageIcon"></i>
        <h3 class="PanelStageName">Main Stage</h3>
        <p class="PanelStageDescription">Innovativion and entertainment will rock our 2015 Main Stage! This is where the industry movers and shakers will pump up the volume and give the you insights and perspectives you need to meet the challenge of technology, see where it’s all going, and what it means for the Future of Work.  Our Keynote Speakers are the best to be found anywhere in the World of HR and Technology.</p>
        <button class="PanelConfirmButton" data-agenda_category="1" id="MainStageConfirm" onClick="_gaq.push(['_trackEvent', 'Agenda', 'Toggle', 'MainStage']);">Confirm</button>
    </div>
</div>
<!-- END Panel: Main Stage -->

<!-- Panel: HR Technology -->
<div class="Panel HRTechnologyBgColor" id="HRTechnologyPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-hr-technology PanelStageIcon"></i>
        <h3 class="PanelStageName">HR Technology</h3>
        <p class="PanelStageDescription">It’s time shine a light on the array of solution experiences that deliver HR transformation, cloud transitions, predictive analytics etc. Join with senior enterprise practitioners, and industry thought leaders and analysts, for the latest insights and perspectives that will give you the knowledge and confidence to make the right decisions when choosing solutions and services.</p>
        <button class="PanelConfirmButton" data-agenda_category="4" id="HRTechnologyConfirm" onClick="_gaq.push(['_trackEvent', 'Agenda', 'Toggle', 'HRTechnology']);">Confirm</button>
    </div>
</div>
<!-- END Panel: HR Technology -->

<!-- Panel: Talent Summit -->
<div class="Panel TalentSummitBgColor" id="TalentSummitPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-talent PanelStageIcon"></i>
        <h3 class="PanelStageName">Talent & Recruitment </h3>
        <p class="PanelStageDescription">Whether it’s war, peace or attrition how can technology and applications help out when it comes to efficient and effective approaches to recruitment and talent management? What is the link between a successful organisation and its people, its purpose and its technology? These are a few of the questions to be addressed by leading Talent and Recruitment practitioners and experts, as well as shedding light on the future technologies talent and recruitment professionals need to be using.</p>
        <button class="PanelConfirmButton" data-agenda_category="5" id="TalentSummitConfirm" onClick="_gaq.push(['_trackEvent', 'Agenda', 'Toggle', 'TalentSummit']);">Confirm</button>
    </div>
</div>
<!-- END Panel: Talent Summit -->

<!-- Panel: Social Summit -->
<div class="Panel SocialSummitBgColor" id="SocialSummitPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-social PanelStageIcon"></i>
        <h3 class="PanelStageName">Social</h3>
        <p class="PanelStageDescription">In the networked world greater workforce collaboration is the key to the future; how you get there, manage the transition and select from the myriad of available applications are just a few of the issues to be discussed in this session. You’ll enjoy expert perspectives and real life case studies on the role and place of collaborative workplace technologies in today’s organisations.</p>
        <button class="PanelConfirmButton" data-agenda_category="6" id="SocialSummitConfirm" onClick="_gaq.push(['_trackEvent', 'Agenda', 'Toggle', 'SocialSummit']);">Confirm</button>
    </div>
</div>
<!-- END Panel: Social Summit -->

<!-- Panel: Services Summit -->
<div class="Panel ServicesSummitBgColor" id="ServicesSummitPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-services PanelStageIcon"></i>
        <h3 class="PanelStageName">HR SS & Payroll</h3>
        <p class="PanelStageDescription">Companies are being challenged to leverage their internal processes and talent more efficiently.  Get into the reality of the issues!  Join a showcase of candid, real-world case studies, that uncover actionable tactics and techniques, and highlight the best practices for successfully putting HR shared services and payroll models into the driving seat of enterprise-wide efficiency, effectiveness and agility.</p>
        <button class="PanelConfirmButton" data-agenda_category="7" id="ServicesSummitConfirm" onClick="_gaq.push(['_trackEvent', 'Agenda', 'Toggle', 'ServicesSummit']);">Confirm</button>
    </div>
</div>
<!-- END Panel: Services Summit -->

<!-- Panel: Workforce Summit -->
<div class="Panel WorkforceSummitBgColor" id="WorkforceSummitPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-workforce PanelStageIcon"></i>
        <h3 class="PanelStageName">Learning</h3>
        <p class="PanelStageDescription">Stay ahead of the game - In the fast-paced, always ON world of work learning and development need to be several moves ahead!  We take a look at some of the technologies out there and examine, from the perspective of senior learning leaders with practical experience, how technology is bringing about a revolution in the world of workplace learning and it’s positive impact on organisations.</p>
        <button class="PanelConfirmButton" data-agenda_category="8" id="WorkforceSummitConfirm" onClick="_gaq.push(['_trackEvent', 'Agenda', 'Toggle', 'WorkforceSummit']);">Confirm</button>
    </div>
</div>
<!-- END Panel: Workforce Summit -->

<!-- Panel: User Adoption -->
<div class="Panel UserAdoptionBgColor" id="UserAdoptionPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-user-adoption PanelStageIcon"></i>
        <h3 class="PanelStageName">Adoption</h3>
        <p class="PanelStageDescription">User adoption of technology and applications is all about people, culture, behaviours, skills and the software UI. It’s time to put adoption on the HCM map!  This interactive stream explores everything from understanding adoption in its entirety, to assessing adoption best practices and creating the most powerful business case.</p>
        <button class="PanelConfirmButton" data-agenda_category="9" id="UserAdoptionConfirm" onClick="_gaq.push(['_trackEvent', 'Agenda', 'Toggle', 'UserAdoption']);">Confirm</button>
    </div>
</div>
<!-- END Panel: User Adoption -->

<!-- Panel: Cloud Summit -->
<div class="Panel CloudSummitBgColor" id="CloudSummitPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-cloud PanelStageIcon"></i>
        <h3 class="PanelStageName">Cloud</h3>
        <p class="PanelStageDescription">Cloud technology is the new normal, but is it really the heaven it’s touted to be?  Can you enjoy the benefits of cloud technology while keeping core HR intact? How secure is the cloud? What about Data Privacy? This stream brings together leading experts and senior cloud users to examine the challenges posed by the cloud and what it means for the way businesses operate.</p>
        <button class="PanelConfirmButton" data-agenda_category="10" id="CloudSummitConfirm" onClick="_gaq.push(['_trackEvent', 'Agenda', 'Toggle', 'CloudSummit']);">Confirm</button>
    </div>
</div>
<!-- END Panel: Cloud Summit -->

<!-- Panel: Analytics Summit -->
<div class="Panel AnalyticsSummitBgColor" id="AnalyticsSummitPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-analytics PanelStageIcon"></i>
        <h3 class="PanelStageName">Data & Analytics</h3>
        <p class="PanelStageDescription">The complex issue of reporting, metrics & analytics leaves companies with no other option than to move beyond the standard HR reporting systems, to enable simpler reporting, without having to spend too much time and money. The cases presented in this session will leave you with an in depth understanding of both how and why you need to transform your processes now, for faster and better results that guarantee you stay ahead of the game.</p>
        <button class="PanelConfirmButton" data-agenda_category="11" id="AnalyticsSummitConfirm" onClick="_gaq.push(['_trackEvent', 'Agenda', 'Toggle', 'AnalyticsSummit']);">Confirm</button>
    </div>
</div>
<!-- END Panel: Analytics Summit -->

<!-- Panel: Future of Work -->
<div class="Panel FutureOfWorkBgColor" id="FutureOfWorkPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-future-of-work PanelStageIcon"></i>
        <h3 class="PanelStageName">Future of Work</h3>
        <p class="PanelStageDescription">Staff bring their own devices to the office, mobile / handheld technology is so much the norm that we barely give it a second thought.  Gamification, social networks, an abundance of data and information, the consumerisation of IT, and wearable technology - workplace technologies are evolving faster than at any time ever before. Find out what the future holds and how to make sense of it all for your organization and it’s employees.</p>
        <button class="PanelConfirmButton" data-agenda_category="12" id="FutureOfWorkConfirm" onClick="_gaq.push(['_trackEvent', 'Agenda', 'Toggle', 'FutureOfWork']);">Confirm</button>
    </div>
</div>
<!-- END Panel: Future of Work -->

<!-- Panel: Pay & Rewards -->
<div class="Panel PayAndRewardsBgColor" id="PayAndRewardsPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-pay-and-rewards PanelStageIcon"></i>
        <h3 class="PanelStageName">Pay & Rewards</h3>
        <p class="PanelStageDescription">Motivation, Recognition, Performance, Enagagement – pay and rewards go right to the heart of the organisation.  High performing organisations are those with a committed and motivated staff, but is there an app for that?! This track will explore approaches to pay & rewards that ensure motivation and performance remain high, and will take a close look at the role technology can play developing and maintaining a sustainable rewards strategy that meets the needs of the C21st organisaton.</p>
        <button class="PanelConfirmButton" data-agenda_category="13" id="PayAndRewardsConfirm" onClick="_gaq.push(['_trackEvent', 'Agenda', 'Toggle', 'PayAndRewards']);">Confirm</button>
    </div>
</div>
<!-- END Panel: Pay & Rewards -->

<!-- Panel: Product Demo -->
<div class="Panel ProductDemoBgColor" id="ProductDemoPanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-product-demo PanelStageIcon"></i>
        <h3 class="PanelStageName">Product Demonstration</h3>
        <p class="PanelStageDescription">Keep yourself up to date with the latest innovations and developments from the key vendors. Hosted by our event sponsors these product demonstrations and launches provide an unparalleled and unique opportunity to get practical information, and to put your questions and challenges direct to those developing and selling the products.</p>
        <button class="PanelConfirmButton" data-agenda_category="14" id="ProductDemoMobileConfirm" onClick="_gaq.push(['_trackEvent', 'Agenda', 'Toggle', 'ProductDemo']);">Confirm</button>
    </div>
</div>
<!-- END Panel: Product Demo -->

<!-- Panel: Labs 1 -->
<div class="Panel Labs1BgColor" id="Labs1Panel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-labs PanelStageIcon"></i>
        <h3 class="PanelStageName">Labs 1</h3>
        <p class="PanelStageDescription">Developed to be more interactive, these sessions enable you to drill deeper.  Labs will be led and presented by some of the most well-known thought leaders and experts in the global HR Tech marketplace; a unique opportunity to share experiences and challenges in a smaller and more intimate environment.</p>
        <button class="PanelConfirmButton" data-agenda_category="15" id="Labs1MobileConfirm" onClick="_gaq.push(['_trackEvent', 'Agenda', 'Toggle', 'Labs1']);">Confirm</button>
    </div>
</div>
<!-- END Panel: Labs 1 -->

<!-- Panel: Labs 2 -->
<div class="Panel Labs2BgColor" id="Labs2Panel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-labs PanelStageIcon"></i>
        <h3 class="PanelStageName">Labs 2</h3>
        <p class="PanelStageDescription">Developed to be more interactive, these sessions enable you to drill deeper.  Labs will be led and presented by some of the most well-known thought leaders and experts in the global HR Tech marketplace; a unique opportunity to share experiences and challenges in a smaller and more intimate environment.</p>
        <button class="PanelConfirmButton" data-agenda_category="16" id="Labs2MobileConfirm" onClick="_gaq.push(['_trackEvent', 'Agenda', 'Toggle', 'Labs2']);">Confirm</button>
    </div>
</div>
<!-- END Panel: Labs 2 -->

<!-- Panel: Labs 3 -->
<div class="Panel Labs3BgColor" id="Labs3Panel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-labs PanelStageIcon"></i>
        <h3 class="PanelStageName">Labs 3</h3>
        <p class="PanelStageDescription">Limited attendance and by invitation only!  These predominantly practitioner attended group meetings offer a chance to get to know others facing the same challenges and choices, to exchange ideas, approaches to problems and opinions on solutions in a relaxed and informal environment.  These groups are led and moderated by some of the most reputed thought leaders in the HR Tech space.</p>
        <button class="PanelConfirmButton" data-agenda_category="17" id="Labs3MobileConfirm" onClick="_gaq.push(['_trackEvent', 'Agenda', 'Toggle', 'Labs3']);">Confirm</button>
    </div>
</div>
<!-- END Panel: Labs 3 -->

<!-- Panel: Unconference -->
<div class="Panel UnconferenceBgColor" id="UnconferencePanel">
    <i class="icon icon-close-icon PanelCloseButton"> </i>
	<div class="PanelInnerContainer">
        <i class="icon icon-unconference PanelStageIcon"></i>
        <h3 class="PanelStageName">UnConference</h3>
        <p class="PanelStageDescription">Limited attendance and by invitation only!  These predominantly practitioner attended group meetings offer a chance to get to know others facing the same challenges and choices, to exchange ideas, approaches to problems and opinions on solutions in a relaxed and informal environment.  These groups are led and moderated by some of the most reputed thought leaders in the HR Tech space.</p>
        <button class="PanelConfirmButton" data-agenda_category="19" id="UnconferenceConfirm" onClick="_gaq.push(['_trackEvent', 'Agenda', 'Toggle', 'UnConference']);">Confirm</button>
    </div>
</div>
<!-- END Panel: Unconference -->

<!-- Stage Confirm Panels (mobile only) -->

<!-- Header -->
<header>
	<div id="HeaderInnerContainer">
      <h1 class="FontRaleway">Agenda</h1>
      <h2 class="FontRaleway">Gain Insight and Ideas, and get the low down on what’s new, what’s works and what doesn’t from experts who’ve been there and done it.</h2>
     
           <div id="AgendaButtonContainer"> <span data-reveal-id="DownloadBrochureModal" onClick="_gaq.push(['_trackEvent', 'Header', 'ModalOpen', 'DownloadBrochure']);">
       <button class="FontRaleway">Download Brochure</button>
        </span> </div>
     
      <div id="ScrollDownHeaderLinkContainer">
             <a href="#Agenda" title="Scroll down for more..." >
                 <span>Scroll Down For More...</span>
                 <img id="ScrollDownIcon" src="img/agenda/scroll-down-icon.png" alt="Scroll Down">
             </a>
         </div>
      
	</div>
</header>
<!-- END Header -->
<a id="Agenda" style="position: relative; top: -8vw;"></a>
<div id="AgendaScrollAcnhor"> </div>
<!-- Tab Panel Navigation -->
<div id="TabPanelNavigationContainer">
    <div id="TabPanelNavigation">
        <button class="TabPanelButton MainStageButton" data-agenda_category="1" id="MainStageBreakoutButton"  style="background-color:#3E80B3">Main Stage</button>
        <button class="TabPanelButton MainStageButton" data-agenda_category="2" id="iRecruitBreakoutButton" >iRecruit</button>
        <button class="TabPanelButton MainStageButton" data-agenda_category="3" id="disruptHRBreakoutButton" >disruptHR</button>
        <button class="TabPanelButton MainStageButton" id="BreakoutsButton">Breakout<span class="HiddenText"> Sessions</span></button>
    </div>
</div>   
<!-- END Tab Panel Navigation --> 

<script type="text/javascript">

</script>




<!-- Session List Mobile -->
<section id="SessionListMobile">

<div id="SessionCategoriesDesktop">
        <?php
      // $output = $agenda->display_categories(); 
       // echo $output;
?>


</div>


    <!-- Day 1 Sessions -->
    <h2 id="AgendaStageTitle" style="color:#3E80B3">Main Stage <span id="CategoryRoom"><i class="fa fa-map-marker"></i> Grand Amphitheatre
</span></h2>
     <p id="SelectedStageText"><?php echo $agenda->get_header_text(1);  ?></p>  
	<h3 class="AgendaDateClass" id="AgendaDayOne">Tuesday, October 27, 2015 <span class="AgendaDateDay">DAY 1</span></h3>
    <div class="SessionsList" id="SessionsDayOneMobile">
<?php
       $data = $agenda->agenda_session(1,1);
       $output = $agenda->display_session_mobile_v6($data); 
        echo $output;
?>
       
    </div>
    <!-- END Day 1 Sessions -->


    <!-- Day 2 Sessions -->
       <h3 class="AgendaDateClass" id="AgendaDayTwo">Wednesday, October 28, 2015 <span class="AgendaDateDay">DAY 2</span></h3> 
       <div class="SessionsList" id="SessionsDayTwoMobile">   
<?php
       $data = $agenda->agenda_session(1,2);
	   if (isset($data) && $data != ''){
		   
		      $output = $agenda->display_session_mobile_v6($data); 
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
	 echo $agenda->get_block_data($elems[0], $elems[1]);	
	}


?>
</section>
<!-- END Speakers and Testimonials -->   

<!-- Sponsors -->
<section id="Sponsors">
	<h2 class="InvisibleHeadline">Sponsors</h2>
	<div id="SponsorsInnerContainer">
    
<?php


$sponsors = $agenda->agenda_sponsor_display(1,1);

	 echo $sponsors;	

?>    
    

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
<div id="SessionInfoModal" class="reveal-modal" data-reveal style="top: 500px;"> 
   	<div id="ModalBigContainer">
    
     </div> 
</div>
<!-- END Session Info Modal -->

<!-- Download Brochure Modal -->
<div id="DownloadBrochureModal" class="reveal-modal" data-reveal> <a class="close-reveal-modal">&#215;</a>
  <h2>Download Brochure</h2>
  <p>Thank you for your request. Please fill in all the fields below!</p>
<!-- BEGINING of : DOWNLOAD BROCHURE MODAL FORM -->
  <form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">
    <input type=hidden name="oid" value="00DD0000000nwgk">
    <input type=hidden name="retURL" value="http://hrtechcongress.com/agenda#ThankYouBrochureModal">
	<div class="InputFieldsContainer">
        <input required placeholder="First Name *"  id="first_name" maxlength="40" name="first_name" size="20" type="text" />
        <input required placeholder="Last Name *" id="last_name" maxlength="80" name="last_name" size="20" type="text" />
    </div>  
	<div class="InputFieldsContainer">
        <input required placeholder="Email Address *" id="email" maxlength="80" name="email" size="20" type="text" />
        <input required placeholder="Phone Number *" id="phone" maxlength="40" name="phone" size="20" type="text" />
    </div>    
	<div class="InputFieldsContainer">        
        <input required placeholder="Company *" id="company" maxlength="40" name="company" size="20" type="text" />
        <input required placeholder="Job Title *" id="title" maxlength="40" name="title" size="20" type="text" />
    </div>    
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
