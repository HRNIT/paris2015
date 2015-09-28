<?php 
use HRNParis\mediapartners as mediapartners;
use HRNParis\main as main;

include_once('controllers/mediapartners_main.php');
include_once('controllers/main.php');
$main = new main\main;

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
<meta property="og:url" content="http://hrtechcongress.com/press">
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
<link rel="stylesheet" href="css/press.css" />
<link rel="stylesheet" href="css/travel-icons.css" />

<!-- Include Footer CSS Definitions -->
<link rel="stylesheet" href="css/footer.css" />


<!-- Include jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


<!-- Scroll to top JS -->
<script src="js/gotopscroll.js"></script>

<!-- Mobile Menu JS -->
<script src="js/menu.js"></script>

<!-- Include Reveal Modal -->
<link rel="stylesheet" href="vendor/reveal/reveal.css">
<script src="vendor/reveal/jquery.reveal.js" type="text/javascript"></script>

<!-- Travel JS -->
<script src="js/press.js"></script>

<!-- Thank you modal -->
<script type="text/javascript">
$(document).ready(function() {
	if(window.location.href.indexOf('#ThankYouBrochureModal') != -1) {
   		jQuery("#ThankYouBrochureModal").reveal();
  	} 
	if(window.location.href.indexOf('#ThankYouJoinModal') != -1) {
   		jQuery("#ThankYouJoinModal").reveal();
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
          <li><a href="press" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Press']);" title="Press" id="MobileMenuItemHovered">Press</a></li>
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
    <li class="DesktopMenuItem" id="MenuItemSponsors">SPONSORS</li>
    </a>
    <a href="press" title="Press" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Press']);">
        <li class="DesktopMenuItem DesktopMenuItemHovered">PRESS</li>
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
<a href="http://www.facebook.com/share.php?u=http://hrtechcongress.com/press&title=HRTechCongress" target="_blank" onClick="_gaq.push(['_trackEvent', 'FloatingSocialShare', 'ExternalForward', 'Facebook']);">
  <div id="FacebookShare"><i class="fa fa-facebook"></i></div>
  </a>
   <a href="https://twitter.com/home?status=Journalist+%26+Bloggers+of+HR+Tech+World+-+Sharing+News+and+Updates+Live%21%0Ahttp://hrtechcongress.com/press%0A%23hrtechworld %23hrtech" class="twittershare twitter" data-text="HR Tech World Congress 2015 – Unleash Your People!" onClick="_gaq.push(['_trackEvent', 'FloatingSocialShare', 'ExternalForward', 'Twitter']);">
  <div id="TwitterShare"><i class="fa fa-twitter"></i></div>
  </a> <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=http://hrtechcongress.com/press&title=HR Tech World Congress 2015 – Unleash Your People!" onClick="_gaq.push(['_trackEvent', 'FloatingSocialShare', 'ExternalForward', 'LinkedIn']);">
  <div id="LinkedInShare"><i class="fa fa-linkedin"></i></div>
  </a> </div>
<!--END Social Share Widget -->

<!-- Header -->
<header>
  <div id="HeaderInnerContainer">
      <h1>Press</h1>
      <p id="LightParagraph">A buzzing space for Media, Bloggers, Editors, Journalists and Reporters - from all over the world to share the latest news in HR and Technology.</p>
         <a href="" title="Join Press" data-reveal-id="JoinPressModal" onClick="_gaq.push(['_trackEvent', 'PressPage', 'ExternalForward', 'JoinPress']);"><div id="BookNowHeaderButton" class="FontRaleway">Join Press</div></a>
         <div id="ScrollDownHeaderLinkContainer">
             <a href="#TabPanelAnchor" title="Scroll down for more..." >
                 <span>Scroll Down For More...</span>
                 <img id="ScrollDownIcon" src="img/press/scroll-down-icon.png" alt="Scroll Down">
             </a>
         </div> 
  </div>
</header>
<!-- END Header -->

<!-- Tab Panel Buttons -->
<div id="TabPanelButtonsContainer">
	<div id="MediaPartnersButton" class="TabPanelButton" onClick="_gaq.push(['_trackEvent', 'PressPage', 'OpenCollapsiblePanel', 'MediaPartners']);">
    	<div class="ArrowUp"></div>
    	<span class="DesktopText">Media Partners</span>
        <i class="icon icon-media-partners"></i>
    </div>
    <div id="BlogSquadButton" class="TabPanelButton" onClick="_gaq.push(['_trackEvent', 'PressPage', 'OpenCollapsiblePanel', 'BlogSquad']);">
    	<div class="ArrowUp"></div>
        <span class="DesktopText">Blog Squad</span>
        <i class="icon icon-blog-squad"></i>
    </div>
</div>
<!-- END Tab Panel Buttons -->

<!-- Tab Panels -->
<a id="TabPanelAnchor" style="position: relative; top: -8vw;"></a>
<div id="TabPanelWrapper">

<!-- Media Partners -->
<section class="TabPanel" id="MediaPartners">
    <h2 class="InvisibleHeadline">Media Partners</h2>
           <?php 

  $content = $sponsors->sponsors_grid(1); 
  echo $content;	

  
?>
</section>
<!-- END Media Partners -->

<!-- Blog Squad -->
<section class="TabPanel" id="BlogSquad">
	<h2 class="InvisibleHeadline">Blog Squad</h2>
<div id="BloggerContainer">
    <ul>       
<?php 



  $content = $main->press(1); 
    if(isset($content)) {
		  echo $content;	
	}
   


?>

</ul>
</div>
  <script src="vendor/sliphover/jquery.sliphover.js"></script> 
  <script type="text/javascript">
          $(function(){
        
        $('#BlogSquad').sliphover({
           
        });
        })
        </script> 
</section>
<!-- END Blog Squad -->

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
    <input type=hidden name="retURL" value="http://hrtechcongress.com/press#ThankYouBrochureModal">
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
<!-- Join Press Modal -->
<div id="JoinPressModal" class="reveal-modal" data-reveal> <a class="close-reveal-modal">&#215;</a>
  <h2>Join Press</h2>
  <!-- BEGINING of : JOIN PRESS MODAL FORM -->
  <form method="POST">
    <input type=hidden name="retURL" value="http://hrtechcongress.com/press#ThankYouJoinModal">
	<div class="InputFieldsContainer">
        <input required placeholder="First Name *"  id="press_first_name" maxlength="40" name="first_name" size="20" type="text" />
        <input required placeholder="Last Name *" id="press_last_name" maxlength="80" name="last_name" size="20" type="text" />
	</div>
	<div class="InputFieldsContainer">
        <input required placeholder="Email Address *" id="press_email" maxlength="80" name="email" size="20" type="text" />
        <input required placeholder="Phone Number *" id="press_phone" maxlength="40" name="phone" size="20" type="text" />
    </div>
	<div class="InputFieldsContainer">        
        <input required placeholder="Company *" id="press_company" maxlength="40" name="company" size="20" type="text" />
        <input required placeholder="Job Title *" id="press_title" maxlength="40" name="title" size="20" type="text" />
	</div>
        <input onClick="_gaq.push(['_trackEvent', 'JoinPressForm', 'FromSubmission', 'InquirySent']);" class="submitbutton" id="JoinPressButton" type="submit" name="submit" value="SEND">
  </form>
  <!-- END of : JOIN PRESS MODAL FORM -->
</div>
<!-- END Join Press Modal -->



<!-- Thank You Brochure Modal -->
<div id="ThankYouJoinModal" class="reveal-modal" data-reveal> <a class="close-reveal-modal">&#215;</a>
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
