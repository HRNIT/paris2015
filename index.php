<?php 
use HRNParis\main as main;
include_once('controllers/main.php');

$main = new main\main;
?>
<!doctype html>
<html lang="en">
<head>
<meta name="description" content="The World's Leading Conference & Expo on HR and the Future of Work. 27-28 October, Paris.">
<meta name="keywords" content="HR Conference, HR event, HR Tech, HRN Europe">
<meta name="author" content="HRN Europe - The Pan European HR Network">
<meta name="designer" content="Designed by: Judit Bernat - juditbernat.mail@gmail.com ">
<meta name="developer" content="Developed by: TesseracT - bottyan.tamas@web-developer.hu, Benedek Nagy - trialshock@gmail.com, Myrrdhinn - balazs.pentek@web-developer.hu">
<meta charset="utf-8" />
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<title>HR Tech World Congress | 27–28 October | Paris</title>

<!-- Open Graph data -->
<meta property="og:site_name" content="HR Tech World Congress"/>
<meta property="og:title" content="The Future of Work is in Paris this October – HR Tech World Congress 2015"/>
<meta property="og:description" content="HR Tech World Congress 2015 – Unleash Your People!"/>
<meta property="og:url" content="http://hrtechcongress.com/">
<meta property="og:type" content="website"/>
<meta property="og:image" content="http://hrtechcongress.com/img/preview-images/preview-image-1.jpg" />
<meta property="og:image" content="http://hrtechcongress.com/img/preview-images/preview-image-3.jpg" />
<meta property="og:image" content="http://hrtechcongress.com/img/preview-images/preview-image-2.jpg" />
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

<!--Include Raleway Google Font -->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>

<!-- Include Source Sans Prog Google Font -->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

<!--Include Include Proxima Nova Font (Adobe Typekit) -->
<script src="//use.typekit.net/gku8ogo.js"></script>
<script>try{Typekit.load();}catch(e){}</script>

<!--Include Font Awesome -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<!-- Include General CSS Definitions -->
<link rel="stylesheet" href="css/general.css" />

<!-- Include the Navigation Menu`s CSS Definitions -->
<link rel="stylesheet" href="css/menu.css" />

<!-- Include Custom CSS Definitions -->
<link rel="stylesheet" href="css/mainpage.css" />

<!-- Include Footer CSS Definitions -->
<link rel="stylesheet" href="css/footer.css" />

<!-- Include jQuery -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<!-- Hammer JS (swipe) -->
<script src="vendor/hammer/hammer.js" type="text/javascript"></script>

<!-- Mainpage JS -->
<script src="js/mainpage.js"></script>

<!-- Mobile menu JS -->
<script src="js/menu.js"></script>

<!-- Scroll to top JS -->
<script src="js/gotopscroll.js"></script>

<!-- Include Reveal Modal -->
<link rel="stylesheet" href="vendor/reveal/reveal.css">
<script src="vendor/reveal/jquery.min.js" type="text/javascript"></script>
<script src="vendor/reveal/jquery.reveal.js" type="text/javascript"></script>

<!-- Thank you modal -->
<script type="text/javascript">
$(document).ready(function() {
if(window.location.href.indexOf('#DownloadBrochure') != -1) {
   jQuery("#DownloadBrochureModal").reveal();
  }
 
if(window.location.href.indexOf('#ThankYouModal') != -1) {
   jQuery("#ThankYouModal").reveal();
  }
  
if(window.location.href.indexOf('#ThankYouForEnquiryModal') != -1) {
   jQuery("#ThankYouForEnquiryModal").reveal();
  }
  
if(window.location.href.indexOf('#ThankYouBrochureModal') != -1) {
   jQuery("#ThankYouBrochureModal").reveal();
} 
if(window.location.href.indexOf('#BecomeASpeakerModal') != -1) {
   jQuery("#BecomeASpeakerModal").reveal();
}   
if(window.location.href.indexOf('#ThankYouDownloadReportModal') != -1) {
   jQuery("#ThankYouDownloadReportModal").reveal();
} 
});
</script>
<!-- END Thank you modal  -->

<!-- Menu state switch script -->
<script type="text/javascript">
$(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 200) {
    $("#HRTechDesktopLogo").css("width", "10.2604166666666667vw");
	$("#HRTechDesktopLogo").css("height", "2.5vw");
	$("#HRTechDesktopLogo").css("margin-right", "7.8125vw");
	$("#DesktopMenu").css("background-color", "rgba(255,255,255,1)");
	$("#DesktopMenu").css("border-bottom", "1px solid #bfbfbf");	
	$(".DesktopMenuItem").removeClass("TransparentDesktopMenuItem");
	$("#DesktopMenuList #DesktopGetTickets").css("color", "#106ab5");
	$("#InfoDD > a").css("color", "#707070");
	$("#HRTechDesktopLogo").css("background-image", "url(img/menu/horizontallogo.png)");
	$("#DesktopMenuSocialIcons").css("transition-delay", "0.4s");
	$("#DesktopMenuSocialIcons").css("moz-transition-delay", "0.4s");
	$("#DesktopMenuSocialIcons").css("opacity", "1");
	$("#DesktopMenuSocialIcons").css("visibility", "visible");
	
  } else {
	$("#HRTechDesktopLogo").css("width", "14.58333333333333331vw");
	$("#HRTechDesktopLogo").css("height", "3.5vw");
	$("#HRTechDesktopLogo").css("margin-right", "22vw");
	$("#DesktopMenu").css("background-color", "rgba(255,255,255,0)");
	$("#DesktopMenu").css("border-bottom", "none");	
	$(".DesktopMenuItem").addClass("TransparentDesktopMenuItem");
	$("#DesktopMenuList #DesktopGetTickets").css("color", "#fff");	
	$("#InfoDD > a").css("color", "#fff");
	$("#HRTechDesktopLogo").css("background-image", "url(img/menu/transparent-horizontallogo.png)");
	$("#DesktopMenuSocialIcons").css("transition-delay", "0");
	$("#DesktopMenuSocialIcons").css("moz-transition-delay", "0");
	$("#DesktopMenuSocialIcons").css("visibility", "hidden");
  }
});
</script>
<!--END Menu state switch script -->

<!-- Transparent Desktop Menu -->
<style type="text/css">
#DesktopMenu, .DesktopMenuItem, #DesktopGetTickets, #HRTechDesktopLogo {
	-webkit-transition: all 0.4s ease-in-out;
	-moz-transition: all 0.4s ease-in-out;
	-o-transition: all 0.4s ease-in-out;
	transition: all ease-in-out 0.4s;
}
#DesktopMenuSocialIcons {
	-webkit-transition: all 0.1s;
	-moz-transition: all 0.1s;
	-o-transition: all 0.1s;
	transition: all 0.1s;
	opacity: 0;
	visibility: hidden;
}
#DesktopMenu {
	background-color: rgba(255,255,255,0);
	border-bottom: none;
}
#HRTechDesktopLogo {
	background-image: url(img/menu/transparent-horizontallogo.png);
	width: 14.58333333333333331vw;
	height: 3.5vw;
	margin-right: 22vw;
}
#InfoDD > a {
	color: #fff;
	transition: all 0.3s;
}
#InfoDD:hover > a {
	color: #fff !important;
	transition: all 0.3s;
}
.TransparentDesktopMenuItem {
	color: rgba(255,255,255,1);
}
#DesktopMenuList #DesktopGetTickets {
	color: #fff;
}
#DesktopMenuList #DesktopGetTickets:hover {
	color: #fff !important;
	background-color: #106ab5;
}
</style>
<!-- END Transparent Desktop Menu -->

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
  <div id="MobileMenuContainer"><a href="#" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'LogoHome']);"><div id="MobileMenuLogo"></div></a>
    <div id="MobileMenuButton" onClick='ShowMobileMenu()'></div>
    <div id="MobileNav" class="sidebar">
      <div id="MobileMenuListContainer"> <img id="MobileMenuCloseButton" src="img/menu/mobile-close-button.png" alt="X" onClick='HideMobileMenu()'>
        <ul id="MobileUl">
          <li><a href="#AboutSection" onClick="HideMobileMenu(); _gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'About']);" title="About">About</a></li>
          <li><a href="speakers" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Speakers']);" title="Speakers">Speakers</a></li>
          <li><a href="sponsors" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Sponsors']);" title="Sponsors">Sponsors</a></li>
          <li><a href="press" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Press']);" title="Press">Press</a></li>
          <li><a href="agenda" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Agenda']);" title="Agenda">Agenda</a></li>          
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

<!-- MAIN MENU 
transparent menu logo background: img/menu/transparent-horizontallogo.png
not transparent menu logo background: img/menu/horizontallogo.png
-->
<nav id="DesktopMenu"> <a href="http://hrtechcongress.com" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'LogoHome']);">
  <div id="HRTechDesktopLogo" > </div>
  </a>
  <ul id="DesktopMenuList">
    <a href="#AboutSection" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'About']);" title="About">
    <li class="DesktopMenuItem TransparentDesktopMenuItem" id="MenuItemAbout">ABOUT</li>
    </a> <a href="speakers" title="Speakers" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Speakers']);">
    <li class="DesktopMenuItem TransparentDesktopMenuItem" id="MenuItemSpeakers">SPEAKERS</li>
    </a>
    <a href="sponsors" title="Sponsors" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Sponsors']);">
    <li class="DesktopMenuItem TransparentDesktopMenuItem" id="MenuItemSponsors">SPONSORS</li>
    </a>
    <a href="press" title="Press" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Press']);">
    <li class="DesktopMenuItem TransparentDesktopMenuItem" id="MenuItemSponsors">PRESS</li>
    </a>    
    <a href="agenda" title="Agenda" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Agenda']);">
    <li class="DesktopMenuItem TransparentDesktopMenuItem">AGENDA</li>
    </a>
    
    <li class="DesktopMenuItem TransparentDesktopMenuItem" id="InfoDD"><a href="#" title="" >INFORMATION</a> 
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
    <li id="DesktopGetTickets" class="DesktopMenuItem TransparentDesktopMenuItem"><i class="fa fa-ticket"></i> GET TICKETS</li>
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
<div id="SocialWidgetWrapper"> <a href="http://www.facebook.com/share.php?u=http://hrtechcongress.com&title=HRTechCongress" target="_blank" onClick="_gaq.push(['_trackEvent', 'FloatingSocialShare', 'ExternalForward', 'Facebook']);">
  <div id="FacebookShare"><i class="fa fa-facebook"></i></div>
  </a> <a href="https://twitter.com/home?status=The Future of Work is in Paris this October – HR Tech World Congress 2015%0Ahttp://hrtechcongress.com/%0A%23hrtechworld %23hrtech" class="twittershare twitter" data-text="The Future of Work is in Paris this October – HR Tech World Congress 2015" onClick="_gaq.push(['_trackEvent', 'FloatingSocialShare', 'ExternalForward', 'Twitter']);">
  <div id="TwitterShare"><i class="fa fa-twitter"></i></div>
  </a> <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=http://hrtechcongress.com&title=The Future of Work is in Paris this October – HR Tech World Congress 2015" onClick="_gaq.push(['_trackEvent', 'FloatingSocialShare', 'ExternalForward', 'LinkedIn']);">
  <div id="LinkedInShare"><i class="fa fa-linkedin"></i></div>
  </a> </div>
<!--END Social Share Widget --> 

<!-- Video Header -->
<section id="VideoHeader">
  <video autoplay loop muted poster="video/videoposter.jpg">
    <source src="video/roadtoparis.ogv" type='video/ogg; codecs="theora, vorbis"'/>
    <source src="video/roadtoparis.webm" type='video/webm' >
    <source src="video/roadtoparis.mp4" type="video/mp4">
    Your browser does not support the video tag. I suggest you upgrade your browser. </video>
  <div id="HeaderContainer">
    <h1 class="FontRaleway">UNLEASH YOUR PEOPLE!</h1>
    <h2 class="FontLato">27-28 October 2015 | Paris</h2>
    <span onClick="_gaq.push(['_trackEvent', 'Header', 'ModalOpen', 'DownloadBrochure']);" href="#"  data-reveal-id="DownloadBrochureModal" data-animation="fade">
    <button id="VideoHeaderDownloadBrochureButton" class="FontLato">DOWNLOAD BROCHURE</button>
    </span> <img id="SponsorLogos" src="img/mainpage/videoheader/video-header-sponsor-logos.png" alt="ADP, Cornerstone OnDemand, SuccessFactors - An SAP Company, Workday, Infor, CrossKnowledge"> </div>
</section>
<!-- END Video Header --> 

<!-- About HR Tech / iRecruit --> 
<a id="AboutSection"></a>
<section id="AboutHRTechiRecruit">
  <h2 class="InvisibleHeadline">About HR Tech Europe and iRecruit</h2>
  <img class="SliderNavigationArrow" id="SliderArrowLeft" data-next="3" data-current="1" src="img/mainpage/abouthrtechirecruitexpo/arrowleft.png" alt="<"> <img class="SliderNavigationArrow" id="SliderArrowRight" data-next="2" data-current="1" src="img/mainpage/abouthrtechirecruitexpo/arrowright.png" alt=">">
  <div id="AboutHRTechFadingContentOne">
    <div id="HRTechSlideContainer">
      <div class="SlideInnerContainer">
        <h1 class="FontRaleway">The Fastest Growing HR Event in the World!</h1>
        <p><span class="HiddenTextOnMobile">HR Tech World opens in Paris this year. The world's foremost congress & expo for global HR leaders and the largest gathering of its kind on the Future of Work and Technology. Playing host to buyers from over 80 countries worldwide enjoying 16 parallel events over two days; our growing community has influenced over 40 million employees globally. No other community is having such a powerful impact on shaping the future of work.</span> <span class="ShownTextOnMobile">HR Tech World opens in Paris this year. The world's foremost congress for global HR leaders is the largest gathering of its kind on the Future of Work and Technology, playing host to buyers from from 80+ countries enjoying 16 parallel events over 2 days.</span> </p>
      </div>
      <div class="AboutButtonContainer"> <span onClick="_gaq.push(['_trackEvent', 'AboutSection', 'ModalOpen', 'DownloadBrochure']);" data-reveal-id="DownloadBrochureModal">
        <button class="SlideDownloadBrochureButton FontRaleway">DOWNLOAD BROCHURE</button>
        </span>
        <button title="Play 2014 Video" onClick="_gaq.push(['_trackEvent', 'AboutSection', 'ExternalForward', 'PlayVideo']); window.open('https://www.youtube.com/watch?v=2ZCgi2L2eNU', '_blank');" class="FontRaleway SlidePlayVideoButton">PLAY VIDEO<span class="Arrow">→</span></button>
      </div>
    </div>
  </div>
  <div id="AboutHRTechFadingContentTwo">
    <div id="iRecruitSlideContainer">
      <div class="SlideInnerContainer"> <img id="iRecruitLogo" src="img/mainpage/abouthrtechirecruitexpo/irecruitlogo.png"> <span class="VenueAndDate"><strong>Palais des Congrès</strong><br>
        <span class="FontLato">27-28 October 2015</span></span>
        <h2 class="FontRaleway">Where the Talent World Meets</h2>
        <p>Connecting talent with opportunity, our 3rd Annual iRecruit Conference co-locates with HR Tech in 2015. iRecruit is recognized as the World’s best conference on Recruitment & Talent<span class="HiddenTextOnMobile"> where +800 Global Recruiters & Talent Leaders enjoy unprecedented access to the most exciting, compelling and disruptive characters in the industry. Learn what today's industry leaders are doing to find the right people and what trends are shaping their future plans.</span> </p>
      </div>
      <div class="AboutButtonContainer"> <span onClick="_gaq.push(['_trackEvent', 'AboutSection', 'ModalOpen', 'DownloadBrochure']);" data-reveal-id="DownloadBrochureModal">
        <button class="SlideDownloadBrochureButton FontRaleway">DOWNLOAD BROCHURE</button>
        </span> <a href="https://www.youtube.com/tv#/watch?v=2ZCgi2L2eNU" target="_blank">
        <button title="Play 2014 Video" onClick="_gaq.push(['_trackEvent', 'AboutSection', 'ExternalForward', 'PlayVideo']);" class="FontRaleway SlidePlayVideoButton">PLAY VIDEO<span class="Arrow">→</span></button>
        </a> </div>
    </div>
  </div>
  <div id="AboutHRTechFadingContentThree">
    <div id="disruptHRSlideContainer">
      <div class="SlideInnerContainer"> <img id="disruptHRLogo" src="img/mainpage/abouthrtechirecruitexpo/disrupthrlogo.png"> <span class="VenueAndDate FontLato"><strong>Palais des Congrès</strong><br>
        27-28 October 2015</span>
        <h2>The Network Never Stops</h2>
        <p>disruptHR is the evolution of 3 years of our successful start-up competition and this year includes a new standing exhibition and pitching stage.<span class="HiddenTextOnMobile"><br>
          <br>
          The disruptHR Zone provides an environment where start-ups have access to globally acknowledged venture capitalists, market analysts, international media and industry influencers. disruptHR enjoys a track record of success:  our 2012 winner TalentBin was acquired by Monster in 2013, Zao finalists in 2013 were bought by Amris in 2014, and Apploi went on to raise $7m in Series A funding early this year. Our success rate in finding successful start-ups is unparalleled given that 8 out of 10 start-ups fail!</span></p>
      </div>
      <div class="AboutButtonContainer"> <span onClick="_gaq.push(['_trackEvent', 'AboutSection', 'ModalOpen', 'DownloadBrochure']);" data-reveal-id="DownloadBrochureModal">
        <button class="SlideDownloadBrochureButton FontRaleway">DOWNLOAD BROCHURE</button>
        </span>
        <button title="Play 2014 Video" onClick="_gaq.push(['_trackEvent', 'AboutSection', 'ExternalForward', 'PlayVideo']); window.open('https://www.youtube.com/watch?v=2ZCgi2L2eNU', '_blank');" class="FontRaleway SlidePlayVideoButton">PLAY VIDEO<span class="Arrow">→</span></button>
      </div>
    </div>
  </div>
  <div id="FadingControlls">
    <div id="FadeOne" class="ActiveFadingControll" onClick="_gaq.push(['_trackEvent', 'AboutSection', 'Show-Hide', 'HRTechWorld']);"></div>
    <div id="FadeTwo" onClick="_gaq.push(['_trackEvent', 'AboutSection', 'Show-Hide', 'iRecruit']);"></div>
    <div id="FadeThree" onClick="_gaq.push(['_trackEvent', 'AboutSection', 'Show-Hide', 'disruptHR']);"></div>
  </div>
  <script type="text/javascript">
$(document).ready(function(){
$('#FadeTwo').click(function(e){ 
    var one = $('#FadeOne').attr('class');
	var three = $('#FadeThree').attr('class');

	if (one == 'ActiveFadingControll') {
			$('#AboutHRTechFadingContentOne').fadeOut('slow', function(){
			$('#AboutHRTechFadingContentTwo').fadeIn('slow');
			$('#AboutHRTechiRecruit').css('background-image', 'url(img/mainpage/abouthrtechirecruitexpo/irecruit.jpg)');
			$('#AboutHRTechiRecruit').css('background-size', 'cover');
			$('#FadeOne').removeClass('ActiveFadingControll');
			$('#FadeTwo').addClass('ActiveFadingControll');
		   });
		
	} else if (three == 'ActiveFadingControll') {
			$('#AboutHRTechFadingContentThree').fadeOut('slow', function(){
			$('#AboutHRTechFadingContentTwo').fadeIn('slow');
			$('#AboutHRTechiRecruit').css('background-image', 'url(img/mainpage/abouthrtechirecruitexpo/irecruit.jpg)');
			$('#AboutHRTechiRecruit').css('background-size', 'cover');
			$('#FadeThree').removeClass('ActiveFadingControll');
			$('#FadeTwo').addClass('ActiveFadingControll');
		   });
		
	}

});


$('#FadeOne').click(function(e){  
    var two = $('#FadeTwo').attr('class');
	var three = $('#FadeThree').attr('class');
	
  if (two == 'ActiveFadingControll') {
    $('#AboutHRTechFadingContentTwo').fadeOut('slow', function(){
        $('#AboutHRTechFadingContentOne').fadeIn('slow');
		$('#AboutHRTechiRecruit').css('background-image', 'none');
		$('#FadeTwo').removeClass('ActiveFadingControll');
		$('#FadeOne').addClass('ActiveFadingControll');
    });

   } else if (three == 'ActiveFadingControll') {
			$('#AboutHRTechFadingContentThree').fadeOut('slow', function(){
			$('#AboutHRTechFadingContentOne').fadeIn('slow');
			$('#AboutHRTechiRecruit').css('background-image', 'none');
			$('#FadeThree').removeClass('ActiveFadingControll');
			$('#FadeOne').addClass('ActiveFadingControll');
		   });
		
	}	
	
});

$('#FadeThree').click(function(e){  
    var one = $('#FadeOne').attr('class');
	var two = $('#FadeTwo').attr('class');

  if (one == 'ActiveFadingControll') {
    $('#AboutHRTechFadingContentOne').fadeOut('slow', function(){
        $('#AboutHRTechFadingContentThree').fadeIn('slow');
		$('#AboutHRTechiRecruit').css('background-image', 'url(img/mainpage/abouthrtechirecruitexpo/disruptHR.jpg)');
		$('#AboutHRTechiRecruit').css('background-size', 'cover');
		$('#FadeOne').removeClass('ActiveFadingControll');
		$('#FadeThree').addClass('ActiveFadingControll');
    });

   } else if (two == 'ActiveFadingControll') {
			$('#AboutHRTechFadingContentTwo').fadeOut('slow', function(){
			$('#AboutHRTechFadingContentThree').fadeIn('slow');
			$('#AboutHRTechiRecruit').css('background-image', 'url(img/mainpage/abouthrtechirecruitexpo/disruptHR.jpg)');
			$('#AboutHRTechiRecruit').css('background-size', 'cover');
			$('#FadeTwo').removeClass('ActiveFadingControll');
			$('#FadeThree').addClass('ActiveFadingControll');
		   });
		
	}
	
		
	
	
});

});
</script> 
</section>
<!-- END About HR Tech / iRecruit --> 

<!-- Speakers -->
<section id="Speakers">
  <h2 class="BlueText">SPEAKERS</h2>
  <div id="SpeakersContainer">
    <ul>
      <?php 


$content = $main->speakers();
echo $content;
?>
    </ul>
    <h3 class="BlueText FontRaleway" id="CallForSpeakers">Call for Speakers is Now Open</h3>
    <span data-reveal-id="BecomeASpeakerModal" onClick="_gaq.push(['_trackEvent', 'SpeakersSection', 'ModalOpen', 'BecomeASpeaker']);">
    <button title="Become a Speaker" class="BlueButton" id="BecomeASpeakerButton">Become a Speaker</button>
    </span> </div>
  <!-- Include and initiate sliphover, the directional hover effect engine --> 
  <script src="vendor/sliphover/jquery.sliphover.js"></script> 
  <script type="text/javascript">
          $(function(){
        
        $('#SpeakersContainer').sliphover({
           
        });
        })
        </script> 
  
  <!--END Speakers --> 
</section>
<!--END Speakers --> 

<!-- Sneak Peek -->
<a id="DownloadReport"></a>
<section id="SneakPeek">
	<img id="HRTechLogoSneakPeek" src="img/mainpage/sneak-peek/hrtech-logo.png" alt="HR Tech World Congress">
    <h2><img id="HeadlineTextSneakPeek" src="img/mainpage/sneak-peek/headline.png" alt="Take a sneak peek into vendor relationship trends"></h2>
    <h3>"Everyone <strong>HATES</strong> Their HR Software!" <br>
 Find out why this is a <strong>MYTH</strong>.</h3>
 	<button class="BlueButton" data-reveal-id="DownloadReportModal">Download Report</button>
    <a href="https://www.keyinterval.com" target="_blank" title="Visit KeyInterval Research website"><img id="KeyIntervalLogo" src="img/mainpage/sneak-peek/key-interval-logo.png" alt="Key Interval"></a>
</section>
<!--END Sneak Peek --> 

<!-- Social Love -->
<section id="SocialLove">
  <h2 class="BlueText">SOCIAL <img src="img/mainpage/sociallove/heart.png" alt="LOVE"></h2>
  <h3 class="FontRaleway">sponsored by:</h3>
  <img id="SuccessFactorsLogo" src="img/mainpage/sociallove/successfactors-logo.png" alt="SuccessFactors An SAP Company">
  <div id="SocialWrapper"><script async src="https://d36hc0p18k1aoc.cloudfront.net/public/js/modules/tintembed.js"></script>
    <div class="tintup" data-id="hrtechworld" data-columns="" data-expand="true"    data-infinitescroll="true"  style="height:26vw;width:100%;"></div>
  </div>
  <button title="Load More" onClick="window.open('social-love', '_parent'); _gaq.push(['_trackEvent', 'SocialLove', 'InternalForward', 'LoadMore']);" class="BlueButton" id="SocialLoveLoadMoreButton">Load More</button>
</section>
<!-- END Social Love --> 

<!-- Venue -->
<section id="Venue">
  <h2 class="BlueText" id="VenueHeadline">Venue</h2>
  <div id="VenueInnerContainer">
    <div id="VenueInfo"> <img id="Pin" class="PinAnimation" src="img/mainpage/venue/pin.png" alt="Pin" />
      <h3 class="FontLato">27-28 October 2015</h3>
      <p class="FontLato">Le Palais des Congrès, 2 Place de la Porte Maillot, Paris</p>
    </div>
    <button title="View in Google Maps" onClick="window.open('https://www.google.com/maps/place/Le+Palais+des+Congr%C3%A8s+de+Paris/@48.879449,2.283712,17z/data=!3m1!4b1!4m2!3m1!1s0x47e66f8b41cac529:0x3c64b279efb84cbe', '_blank'); _gaq.push(['_trackEvent', 'VenueSection', 'ExternalForward', 'GoogleMaps']);" class="BlueButton FontLato" id="ViewInGoogleMapsButton">VIEW IN GOOGLE MAPS</button>
  </div>
</section>
<!-- END Venue --> 

<!-- FOOTER -->
<footer>
  <div id="FooterWrapper">
    <div id="FooterLeftWrapper">
      <h2 class="Contact FontRaleway">CONTACT</h2>
      <h3 class="Contact FontProximaNova"><a href="tel:003612011469" title="Call +36 1 201 1469"><i class="fa fa-phone"></i>+36 1 201 1469</a></h3>
      <h3 class="Contact FontProximaNova"><a href="tel:00442034689689" title="Call +44 20 34 689 689"><i class="fa fa-phone"></i>UK/IE +44 20 34 689 689</a></h3>
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
    <input type=hidden name="retURL" value="http://hrtechcongress.com/#ThankYouBrochureModal">
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

<!-- Become a Speaker Modal -->
<div id="BecomeASpeakerModal" class="reveal-modal" data-reveal> <a class="close-reveal-modal">&#215;</a>
  <h2>Call for Speakers</h2>
  <p>HR Tech World is seeking submissions for 2016, from expert speakers who can offer key insights into areas of impact in HR, management, technology and the future of work.</p>
  <!-- BEGINING of : BECOME A SPEAKER MODAL FORM -->
  <form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">
    <input type=hidden name="oid" value="00DD0000000nwgk">
    <input type=hidden name="retURL" value="http://hrtechcongress.com/#ThankYouForEnquiryModal">
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
    <textarea placeholder="Proposed Topic *"  id="00ND0000006HM7A" name="00ND0000006HM7A" size="400" type="text" wrap="soft"></textarea>
    <select  style="display:none;"   id="lead_source" name="lead_source">
      <option selected="selected" value="HRTechParis2015-BecomeASpeaker">HRTechParis2015-BecomeASpeaker</option>
    </select>
    <input onClick="_gaq.push(['_trackEvent', 'BecomeASpeaker', 'FromSubmission', 'InquirySent']);" class="submitbutton" type="submit" name="submit" value="SEND">
  </form>
  <!-- END of : BECOME A SPEAKER MODAL FORM --> 
</div>
<!-- END Become a Speaker Modal --> 

<!-- Sneak Peek Modal -->
<div id="DownloadReportModal" class="reveal-modal" data-reveal> <a class="close-reveal-modal">&#215;</a>
  <h2>Download Report</h2>
  <p></p>
  <!-- BEGINING of : SNEAK PEEK MODAL FORM -->
    <!--[if lte IE 8]>
    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
    <![endif]-->
    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
    <script>
      hbspt.forms.create({ 
        css: '',
        portalId: '412210',
        formId: '40df9f84-73bc-4421-9b3d-775d79e7f017'
      });
    </script>
  <!-- END of : SNEAK PEEK MODAL FORM --> 
</div>
<!-- END Sneak Peek Modal -->

<!-- Thank You Modal -->
<div id="ThankYouModal" class="reveal-modal" data-reveal> <a class="close-reveal-modal">&#215;</a>
  <h2>Thank you!</h2>
  <p>You have successfully applied.</p>
</div>
<!-- END Thank You Modal --> 

<!-- Thank You Brochure Modal -->
<div id="ThankYouBrochureModal" class="reveal-modal" data-reveal> <a class="close-reveal-modal">&#215;</a>
  <h2>Thank you!</h2>
  <p>You shall receive an email shortly from one of our team.</p>
</div>
<!-- END Thank You Modal --> 

<!-- Thank You For Apply Modal -->
<div id="ThankYouForEnquiryModal" class="reveal-modal" data-reveal> <a class="close-reveal-modal">&#215;</a>
    <h2>Thank you for your enquiry – <br>we will be in touch within 24 hours.</h2>
    <p style="text-align: left;">
    In the meantime, you can find out more about our range of services and events by visiting the following links:<br>
    <a href="http://hrneurope.com" target="_blank" title="HRN - Our Corporate Website">HRN</a> – Our Corporate Website<br>
    <a href="http://london.hrtechcongress.com" title="HR Tech World 2016 – Spring">HR Tech World 2016</a> – Spring (ExCel London 15-16 March)<br>
    <br>
    Looking for help or answers to a question? Please visit our <a href="http://blog.hrtecheurope.com" target="_blank" title="HR Tech Blog" target="_blank">Blog</a> which is a constant flow of tips and advice from our community and research. Our <a href="https://www.facebook.com/worldhrtech" title="Facebook" target="_blank">Facebook</a> Pages, <a href="https://www.linkedin.com/grp/home?gid=1909337" target="_blank" title="LinkedIn">LinkedIn</a> Groups, <a href="https://www.youtube.com/channel/UCsvarE4VPZa-Z469IYzWWYw" target="_blank" title="Youtube">Youtube</a> and <a href="https://twitter.com/hrtechworld" target="_blank" title="Youtube">Twitter</a> Channels connect you timely information and Who’s Who in HR across the globe.<br>
    <br>
    See you in Paris!</p>
</div>
<!-- END Thank You For Apply Modal --> 

<!-- Thank You Sneak Peek Modal -->
<div id="ThankYouDownloadReportModal" class="reveal-modal" data-reveal> <a class="close-reveal-modal">&#215;</a>
  <h2>Thank you!</h2>
  <p>Thank you for your request. We will send you the report at the indicated e-mail address shortly.<br>
Please contact <a href="mailto:marketing@hrtechcongress.com" title="marketing@hrtechcongress.com">marketing@hrtechcongress.com</a> with any further inquiries.<br>
In the meantime, check out the <a href="speakers" title="Speaker Panel">SPEAKER PANEL</a> of the Fastest Growing HR Event in the World, <br>HR Tech World Congress.</p>
</div>
<!-- END Sneak Peek Modal --> 

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
