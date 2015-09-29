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
<title>HR Tech World Congress | Sponsors</title>

<!-- Open Graph data -->
<meta property="og:site_name" content="HR Tech World Congress"/>
<meta property="og:title" content="Who’s Who in HR - The 2015 Sponsors at HR Tech World Congress"/>
<meta property="og:description" content="The fastest growing HR event in the world! Paris October 24 - 25"/>
<meta property="og:url" content="http://hrtechcongress.com/sponsors">
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

<!-- Include Lato Google Font -->
<link href='http://fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

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

<!-- Modal Arrows -->
<link rel="stylesheet" href="css/modal-arrows.css" />

<!-- Include the Navigation Menu`s CSS Definitions -->
<link rel="stylesheet" href="css/menu.css" />

<!-- Include Footer CSS Definitions -->
<link rel="stylesheet" href="css/footer.css" />
<style>
#crossknowledgeSponsor {
	width: 14vw;
}
#crossknowledgeSponsorBox {
	width: 11vw;
}
/*#adpSponsor,*/ #inforSponsor {
	width: 9vw;
}
/*
#adpSponsorBox {
	transform: scale(1.8, 1.8);
}
*/
#ibmSponsor {
	transform: scale(0.8, 0.8);
}
#successfactorsSponsorBox {
	width: 12vw;
}
#successfactorsSponsor {
	margin-left: -1.5vw;
}
#oracleSponsorBox {
	height: 7vw;
}
#oracleSponsor {
	height: 11vw;
	margin-right: 1.5625vw;
	position: relative;
	top: 0.520833vw;
}
#corehrSponsorBox {
	width: 9vw;
	height:9vw;
	}
#corehrSponsor{
	position:relative;
	top:2vw;
	}	
#includeedSponsor {
		position:relative;
	top:2vw;
	}
#includeedSponsorBox {
	width: 9vw;
	height:9vw;
	} 	
@media (max-width: 640px) {
#successfactorsSponsorBox {
	width: 30vw;
}
#successfactorsSponsor {
	margin-left: 0;
}
#oracleSponsorBox {
	height: 17.187vw;
}
#oracleSponsor {
	height: 28.41vw;
}	
}
#ibmGridLogo {
	max-width: 200px;
}
#oracleGridLogo {
	max-height: 210px;
}
#workdayGridLogo {
	max-height: 108px;
	
}
#inforSponsorBox{
    width: 9.17604vw;
    height: 6.58854159vw;
}


@media (max-width: 768px) {
#inforSponsorBox{
    width: 14.17604vw;
    height: 10.588542vw;
	
	}
	
	}

@media (max-width: 640px) {
#inforSponsorBox{
    width: 23.17604vw;
    height: 18.588542vw;
	
	}
	
	}
	
	
</style>

<!-- Include jQuery -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<!-- Swipe :) -->
<script src="vendor/hammer/hammer.js"></script>

<!-- Scroll to top JS -->
<script src="js/gotopscroll.js"></script>

<!-- Sponsors JS -->
<script src="js/sponsors.js"></script>

<!-- Menu JS -->
<script src="js/menu.js"></script>

<!-- Social widget mobile controller -->
<script src="js/social.js"></script>

<!-- Include Reveal Modal -->
<link rel="stylesheet" href="vendor/reveal/reveal.css">
<script src="vendor/reveal/jquery.reveal.js" type="text/javascript"></script>

<!-- Token input -->
<script type="text/javascript" src="vendor/autocomplete/src/jquery.tokeninput.js"></script>
<link rel="stylesheet" href="vendor/autocomplete/styles/token-input.css" type="text/css" />
<link rel="stylesheet" href="vendor/autocomplete/styles/token-input-facebook.css" type="text/css" />

<!-- Include Custom CSS Definitions -->
<link rel="stylesheet" href="css/sponsors.css" />

<!-- Include Custom CSS Definitions -->
<link rel="stylesheet" href="css/sponsors-grid.css" />

<!-- Thank you modal -->
<script type="text/javascript">
$(document).ready(function() {
	if(window.location.href.indexOf('#ThankYouForEnquiryModal') != -1) {
   		jQuery("#ThankYouForEnquiryModal").reveal();
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
          <li><a href="sponsors" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Sponsors']);" title="Sponsors" id="MobileMenuItemHovered">Sponsors</a></li>
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
    <li class="DesktopMenuItem DesktopMenuItemHovered" id="MenuItemSponsors">SPONSORS</li>
    </a>
    <a href="press" title="Press" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Press']);">
        <li class="DesktopMenuItem" id="MenuItemSponsors">PRESS</li>
    </a>     
    <a href="agenda" title="Agenda" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Agenda']);">
    <li class="DesktopMenuItem">AGENDA</li>
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
  <a href="http://www.facebook.com/share.php?u=http://hrtechcongress.com/sponsors&title=HRTechCongress" target="_blank" onClick="_gaq.push(['_trackEvent', 'FloatingSocialShare', 'ExternalForward', 'Facebook']);">
  <div id="FacebookShare"><i class="fa fa-facebook"></i></div>
  </a>
   <a href="https://twitter.com/home?status=Who’s Who in HR - The 2015 Sponsors at HR Tech World Congress%0Ahttp://hrtechcongress.com/sponsors%0A%23hrtechworld %23hrtech" class="twittershare twitter" data-text="Who’s Who in HR - The 2015 Sponsors at HR Tech World Congress" onClick="_gaq.push(['_trackEvent', 'FloatingSocialShare', 'ExternalForward', 'Twitter']);">
  <div id="TwitterShare"><i class="fa fa-twitter"></i></div>
  </a> <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=http://hrtechcongress.com/sponsors&title=Who’s Who in HR - The 2015 Sponsors at HR Tech World Congress" onClick="_gaq.push(['_trackEvent', 'FloatingSocialShare', 'ExternalForward', 'LinkedIn']);">
  <div id="LinkedInShare"><i class="fa fa-linkedin"></i></div>
  </a> </div>
<!--END Social Share Widget -->


<!-- Header -->
<header>
  <h1>SPONSORS</h1>
  <p>A Who's Who of HR Software, Service and Solution leaders offer the best solutions, services and products in the World for you to Optimise, Enable & Unleash Your People!</p>
  <span data-reveal-id="BecomeASponsorModal" onClick="_gaq.push(['_trackEvent', 'SponsorsPage', 'ModalOpen', 'BecomeASponsor']);">
  <button class="FontRaleway">Become a Sponsor</button>
  </span> <img id="HeaderWhosWhoLogo" src="img/sponsors/whos-who-logo-white.png" alt="Who's Who in HR"> 
           <div id="ScrollDownHeaderLinkContainer">
             <a href="#SponsorsContent" title="Scroll down for more..." >
                 <span>Scroll Down For More...</span>
                 <img id="ScrollDownIcon" src="img/sponsors/scroll-down-icon.png" alt="Scroll Down">
             </a>
         </div>  
  </header>
<!-- END Header -->
<a id="SponsorsContent" style="position: relative; top: -8vw;"></a>
<section id="Sponsors"> 
  <!-- Sponsors Grid -->
  <div id="SponsorGrid"> 
    <!-- Diamond Sponsors -->
    <div class="SponsorsInnerContainer">
      <h2 class="SponsorHeadline">Diamond Sponsors</h2>
      <?php 

  $content = $sponsors->sponsors_grid(1); 
  echo $content;	

  
?>
    </div>
    <!-- END Diamond Sponsors --> 
    <!-- Emerald Sponsors -->
    <div class="SponsorsInnerContainer">
      <h2 class="SponsorHeadline">Emerald Sponsors</h2>
      <?php 

  $content = $sponsors->sponsors_grid(2); 
  echo $content;	

  
?>
    </div>
    <!-- END Emerald Sponsors --> 
    <!-- Platinum Sponsors -->
    <div class="SponsorsInnerContainer">
      <h2 class="SponsorHeadline">Platinum Sponsors</h2>
      <?php 

  $content = $sponsors->sponsors_grid(3); 
  echo $content;	

  
?>
    </div>
    <!-- END Platinum Sponsors --> 
    <!-- Gold Sponsors -->
    <div class="SponsorsInnerContainer">
      <h2 class="SponsorHeadline">Gold Sponsors</h2>
      <?php 

  $content = $sponsors->sponsors_grid(4); 
  echo $content;	

  
?>
    </div>
    <!-- END Gold Sponsors --> 
    <!-- Silver Sponsors -->
    <div class="SponsorsInnerContainer">
      <h2 class="SponsorHeadline">Silver Sponsors</h2>
      <?php 

  $content = $sponsors->sponsors_grid(5); 
  echo $content;	

  
?>
    </div>
    <!-- END Silver Sponsors --> 
    <!-- Sponsors -->
    <div class="SponsorsInnerContainer">
      <h2 class="SponsorHeadline">Sponsors</h2>
      <?php 

  $content = $sponsors->sponsors_grid(6); 
  echo $content;	

  
?>
    </div>
    <!-- END Sponsors --> 
    <!-- A La Carte Sponsors -->
    <div class="SponsorsInnerContainer">
      <h2 class="SponsorHeadline">A La Carte Sponsors</h2>
      <?php 

  $content = $sponsors->sponsors_grid_alacarte();        
  echo $content;	

  
?>
    </div>
    <!-- END Sponsors --> 
    
    <!-- disruptHRsponsor -->
    <div class="SponsorsInnerContainer">
      <h2 class="SponsorHeadline" >disruptHR Sponsors</h2>
      <?php 

   $content = $sponsors->sponsors_grid(7);       
  echo $content;	

  
?>
    </div>
    <!-- END disruptHr Sponsors -->    
    
  </div>
  <!-- END Sponsors Grid -->
  </div>
  <!-- END Sponsors Grid Container -->
  
  <div id="FilteredGrid"> 
    <!-- Filtered Grid -->
    <div class="CategoryContainer"> </div>
  </div>
  <!-- END Filtered Grid --> 
  
</section>
<!--END Sponsors -->

<div id="FilteredGrid"> 
  <!-- Filtered Grid -->
  <div class="CategoryContainer"> </div>
</div>
<!-- END Filtered Grid -->

</section>
<!--END Sponsors --> 

<!--END Sponsors --> 
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

<!-- Speaker Modal-->
<div id="SponsorsModal" class="reveal-modal" data-reveal>
   	<div id="ModalBigContainer"></div>
    
  
</div>
<!-- END Speaker Modal --> 

<!-- Download Brochure Modal -->
<div id="DownloadBrochureModal" class="reveal-modal" data-reveal> <a class="close-reveal-modal">&#215;</a>
  <h2>Download Brochure</h2>
  <p>Thank you for your request. Please fill in all the fields below!</p>
  <!-- BEGINING of : DOWNLOAD BROCHURE MODAL FORM -->
  <form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">
    <input type=hidden name="oid" value="00DD0000000nwgk">
    <input type=hidden name="retURL" value="http://hrtechcongress.com/sponsors#ThankYouBrochureModal">
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

<!-- Become a Sponsor Modal -->
<div id="BecomeASponsorModal" class="reveal-modal" data-reveal> <a class="close-reveal-modal">&#215;</a>
  <h2>Apply for Sponsorship</h2>
  <p>Gain direct access to more than 4,000 enterprise HR decision makers.</p>
  <!-- BEGINING of : BECOME A SPONSOR MODAL FORM -->
  <form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">
    <input type=hidden name="oid" value="00DD0000000nwgk">
    <input type=hidden name="retURL" value="http://hrtechcongress.com/sponsors#ThankYouForEnquiryModal">
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
      <option selected="selected" value="HRTechParis2015-BecomeASponsor">HRTechParis2015-BecomeASponsor</option>
    </select>
    <input onClick="_gaq.push(['_trackEvent', 'BecomeASponsorForm', 'FromSubmission', 'InquirySent']);" class="submitbutton" type="submit" name="submit" value="SEND">
  </form>
  <!-- END of : BECOME A SPONSOR MODAL FORM --> 
</div>
<!-- END Become a Sponsor Modal --> 

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
