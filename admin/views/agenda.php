<?php 
namespace HRNParis\agenda;
include_once('controllers/agenda_main.php');

$agenda = new agenda_main;

if(!isset($_SESSION)){
  session_start();		
}

if (!isset($_SESSION['Category'])){
   $_SESSION['Category'] = 1;	
}
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
<link rel="stylesheet" href="../css/general.css" />

<!-- Include the Navigation Menu`s CSS Definitions -->
<link rel="stylesheet" href="css/menu.css" />

<!-- Include Custom CSS Definitions -->
<link rel="stylesheet" href="css/agenda.css" />
<link rel="stylesheet" href="../css/agenda-icons.css">

<link rel="stylesheet" href="css/admin_agenda.css" />

<!-- Include Footer CSS Definitions -->
<link rel="stylesheet" href="../css/footer.css" />

<!-- Include jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<!-- Scroll to top JS -->
<script src="../js/gotopscroll.js"></script>

<!-- Mobile Menu JS -->
<script src="../js/menu.js"></script>

<!-- Agenda JS -->
<script src="js/agenda.js"></script>

<?php 

if (isset($_SESSION['admin'])){
	echo '
	<!-- Agenda JS -->
<script src="js/admin_agenda_edit.js"></script>
	
	
<!-- Froala Editor -->
<link href="vendor/froala/css/froala_editor.min.css" rel="stylesheet" type="text/css">
<link href="vendor/froala/css/froala_style.min.css" rel="stylesheet" type="text/css">
  <script src="vendor/froala/js/froala_editor.min.js"></script>
  <!--[if lt IE 9]>
    <script src="vendor/froala/js/froala_editor_ie8.min.js"></script>
  <![endif]-->
  <script src="vendor/froala/js/plugins/tables.min.js"></script>
  <script src="vendor/froala/js/plugins/lists.min.js"></script>
  <script src="vendor/froala/js/plugins/colors.min.js"></script>
  	<link rel="stylesheet" href="css/admin_menu.css" />	
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
	if(window.location.href.indexOf('#ThankYouBrochureModal') != -1) {
   		jQuery("#ThankYouBrochureModal").reveal();
  	} 
});
</script>
<!-- END Thank you modal  -->

<!-- Redirects the user to the Agenda Mobile page at 1000px and below -->
<script type="text/javascript">
$(document).ready(function() {
if ($(window).width() < 1000) {
   console.log('moo');
    window.location = 'agenda-mobile';
} 
});
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
<?php 
include_once('views/menu.php');
   show_menu('agenda');
?>
  
  
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
    <div class="StageButton" data-agenda_category="1" id="MainStage">
    	<i class="icon icon-mainstage"></i>
        <h6 class="StageName">Main Stage</h6>
    </div>
    <!-- END Main Stage -->
	<!-- iRecruit -->
    <div class="StageButton" data-agenda_category="2" id="IRecruit">
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
    <div class="StageButton" data-agenda_category="3" id="DisruptHR">
    	<i class="icon icon-disrupthr"></i>
        <h6 class="StageName">disruptHR</h6>
    </div>
    <!-- END disruptHR -->  
	<!-- HR Technology -->
    <div class="StageButton" data-agenda_category="4" id="HRTechnology">
    	<i class="icon icon-hr-technology"></i>
        <h6 class="StageName">HR Technology</h6>
    </div>
    <!-- END HR Technology --> 
	<!-- Talent Summit -->
    <div class="StageButton" data-agenda_category="5" id="TalentSummit">
    	<i class="icon icon-talent"></i>
        <h6 class="StageName">TALENT & RECRUITMENT</h6>
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
        <h6 class="StageName">HR SS & PAYROLL</h6>
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
        <h6 class="StageName">Data & Analytics</h6>
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
     
    <!-- Mobile Next Button -->
    <div class="StageButton" id="MobileNextButton">
        <i class="icon icon-next-icon"></i>
    </div>
    <!-- END Mobile Next Button -->  
     
  	<!-- Product Demo -->
    <div class="StageButton" data-agenda_category="14" id="ProductDemo">
    	<i class="icon icon-product-demo"></i>
        <h6 class="StageName">Product Demo A</h6>
    </div>
    <!-- END Product Demo -->   
    
    <!-- Executive Summit -->
    <div class="StageButton" data-agenda_category="18" id="ProductDemoB">
    	<i class="icon icon-product-demo"></i>
        <h6 class="StageName">Product Demo B</h6>
    </div>
    <!-- END Executive Summit --> 
          
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
    <!-- Executive Summit -->
    <div class="StageButton" data-agenda_category="17" id="Labs3">
    	<i class="icon icon-executive"></i>
        <h6 class="StageName">Labs 3</h6>
    </div>
    <!-- END Executive Summit -->   

    <!-- Executive Summit -->
    <div class="StageButton" data-agenda_category="19" id="Unconference">
    	<i class="icon icon-unconference"></i>
        <h6 class="StageName">Unconference</h6>
    </div>
    <!-- END Executive Summit -->     

    <div class="StageButton" data-agenda_category="20" id="ExecutiveSummit">
    	<i class="icon icon-executive"></i>
        <h6 class="StageName"></h6>
        <h6 class="StageName">Executive Briefings</h6>
    </div>
    <!-- END Executive Summit --> 
    
    
    <div class="StageButton"  id="ExecutiveSummit">
    	
        <h6 class="StageName"></h6>
    </div>
    <!-- END Executive Summit -->         
                
    <!-- Stage Apply Button -->
    <div class="StageButton" data-agenda_category="1" id="StageApplyButton">
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
        <h2 id="SelectedStageName">Main Stage</h2>
        <p id="SelectedStageText"><?php echo $agenda->get_header_text(1);  ?></p>
    </div>
</section>
<!-- END Stage Description -->

<!-- Tab Panel Navigation -->
<div id="TabPanelNavigation">
    <button class="TabPanelButton" id="Day1Button" >DAY 1</button>
    <button class="TabPanelButton" id="Day2Button" >DAY 2</button>
    <button class="TabPanelButton" id="MoreButton" >MORE...</button>
    <button class="TabPanelButton" id="TicketsButton" onClick="window.open('tickets', '_blank');">Tickets</button>
</div>
<!-- END Tab Panel Navigation --> 

<!-- Session List Mobile -->
<section id="SessionListMobile">
    <h2 class="EventDayTitle">DAY 1</h2>
    <!-- Day 1 Sessions -->
    <div class="SessionsList">
    	<!-- The Future of Performance Appraisal in an Agile Environment -->
        <div class="Session">
        	<div class="SessionTimeContainer">
            	<h3 class="SessionStartTime">8:15</h3><i class="fa fa-caret-right TalentSummitColor"></i>
            </div>
            <div class="SessionContent">
            	<h3 class="SessionTitle TalentSummitColor" data-reveal-id="SessionInfoModal">The Future of Performance Appraisal in an Agile Environment</h3>
                
            </div>
        </div>
        <!-- END The Future of Performance Appraisal in an Agile Environment -->
    	<!-- Yes I Can! - From Service Culture to Mission – Higher Engagement Through Empowerment -->
        <div class="Session">
        	<div class="SessionTimeContainer">
            	<h3 class="SessionStartTime">11:35</h3><i class="fa fa-caret-right TalentSummitColor"></i>
            </div>
            <div class="SessionContent">
            	<h3 class="SessionTitle TalentSummitColor">Yes I Can! - From Service Culture to Mission – Higher Engagement Through Empowerment</h3>
                <h4 class="SessionSpeaker"><strong>Jan Spooren</strong> Director People Development <strong>The Carlson Rezidor Hotel Group</strong></h4>
                <h4 class="SessionSpeaker"><strong>Kathrine Ohm</strong> Director People & Performance Management <strong>The Carlson Rezidor Hotel Group</strong></h4>
            </div>
        </div>
        <!-- END Yes I Can! - From Service Culture to Mission – Higher Engagement Through Empowerment -->
        
    	<!-- Getting Recruiting Booking Right! -->
        <div class="Session">
        	<div class="SessionTimeContainer">
            	<h3 class="SessionStartTime">11:55</h3><i class="fa fa-caret-right TalentSummitColor"></i>
            </div>
            <div class="SessionContent">
            	<h3 class="SessionTitle TalentSummitColor">Getting Recruiting Booking Right!</h3>
                <h4 class="SessionSpeaker"><strong>Jennifer Boulanger</strong> Head of Global Recruitment <strong>Booking.com</strong></h4>
            </div>
        </div>
        <!-- END Getting Recruiting Booking Right! -->
        
    	<!-- Strategic Talent Management for Real Results -->
        <div class="Session">
        	<div class="SessionTimeContainer">
            	<h3 class="SessionStartTime">12:15</h3><i class="fa fa-caret-right TalentSummitColor"></i>
            </div>
            <div class="SessionContent">
            	<h3 class="SessionTitle TalentSummitColor">Strategic Talent Management for Real Results</h3>
            </div>
        </div>
        <!-- END Strategic Talent Management for Real Results -->      

    	<!-- Lunch & Networking -->
        <div class="Session">
        	<div class="SessionTimeContainer">
            	<h3 class="SessionStartTime">12:15</h3><i class="fa fa-caret-right TalentSummitColor"></i>
            </div>
            <div class="SessionContent">
            	<h3 class="SessionTitle BreakSessionTitle">Lunch & Networking</h3>
            </div>
        </div>
        <!-- END Lunch & Networking -->                     
                
    </div>
    <!-- END Day 1 Sessions -->
    <h2 class="EventDayTitle" id="EventDay2Title">DAY 2 <i class="fa fa-angle-down"></i></h2>
    <!-- Day 2 Sessions -->
    <div class="SessionsList">
    	<!-- The Future of Performance Appraisal in an Agile Environment -->
        <div class="Session">
        	<div class="SessionTimeContainer">
            	<h3 class="SessionStartTime">11:15</h3><i class="fa fa-caret-right TalentSummitColor"></i>
            </div>
            <div class="SessionContent">
            	<h3 class="SessionTitle TalentSummitColor">The Future of Performance Appraisal in an Agile Environment</h3>
                
            </div>
        </div>
        <!-- END The Future of Performance Appraisal in an Agile Environment -->
    	<!-- Yes I Can! - From Service Culture to Mission – Higher Engagement Through Empowerment -->
        <div class="Session">
        	<div class="SessionTimeContainer">
            	<h3 class="SessionStartTime">11:35</h3><i class="fa fa-caret-right TalentSummitColor"></i>
            </div>
            <div class="SessionContent">
            	<h3 class="SessionTitle TalentSummitColor">Yes I Can! - From Service Culture to Mission – Higher Engagement Through Empowerment</h3>
                <h4 class="SessionSpeaker"><strong>Jan Spooren</strong> Director People Development <strong>The Carlson Rezidor Hotel Group</strong></h4>
                <h4 class="SessionSpeaker"><strong>Kathrine Ohm</strong> Director People & Performance Management <strong>The Carlson Rezidor Hotel Group</strong></h4>
            </div>
        </div>
        <!-- END Yes I Can! - From Service Culture to Mission – Higher Engagement Through Empowerment -->
        
    	<!-- Getting Recruiting Booking Right! -->
        <div class="Session">
        	<div class="SessionTimeContainer">
            	<h3 class="SessionStartTime">11:55</h3><i class="fa fa-caret-right TalentSummitColor"></i>
            </div>
            <div class="SessionContent">
            	<h3 class="SessionTitle TalentSummitColor">Getting Recruiting Booking Right!</h3>
                <h4 class="SessionSpeaker"><strong>Jennifer Boulanger</strong> Head of Global Recruitment <strong>Booking.com</strong></h4>
            </div>
        </div>
        <!-- END Getting Recruiting Booking Right! -->
        
    	<!-- Strategic Talent Management for Real Results -->
        <div class="Session">
        	<div class="SessionTimeContainer">
            	<h3 class="SessionStartTime">12:15</h3><i class="fa fa-caret-right TalentSummitColor"></i>
            </div>
            <div class="SessionContent">
            	<h3 class="SessionTitle TalentSummitColor">Strategic Talent Management for Real Results</h3>
            </div>
        </div>
        <!-- END Strategic Talent Management for Real Results -->      

    	<!-- Lunch & Networking -->
        <div class="Session">
        	<div class="SessionTimeContainer">
            	<h3 class="SessionStartTime">12:15</h3><i class="fa fa-caret-right TalentSummitColor"></i>
            </div>
            <div class="SessionContent">
            	<h3 class="SessionTitle BreakSessionTitle">Lunch & Networking</h3>
            </div>
        </div>
        <!-- END Lunch & Networking -->                             
    </div>
    <!-- END Day 2 Sessions -->
    
</section>
<!-- END Session List Mobile -->




<!-- Session List Mobile -->
<section id="SessionListDesktop">


    <!-- Day 1 Sessions -->
    <div id="SessionsDayOne" class="SessionsListDesktop">
    
        <h2 class="EventDayTitle MainStageColor">Main Stage - Day 1</h2>

     <!-- TIME CONTAINER -->   
    <div class="AgendaTimeContainerDesktop"> 

<?php
 if (!isset($_SESSION['admin'])){
	 $time = $agenda->display_time();
     echo $time; 
	 
 }
   

?>

   </div>   
 <!-- END TIME CONTAINER -->      
    
 <!-- SESSION CONTAINER -->  
       <div class="AgendaSessionsContainerDesktop"> 
    <?php
       $data = $agenda->agenda_session(1,1);
       $output = $agenda->display_sessions($data); 
        echo $output;
?>
     </div>  

 <!-- END SESSION CONTAINER--> 
                  
                
    </div>
    <!-- END Day 1 Sessions -->
    
    
    


    <div id="SessionsDayTwo" class="SessionsListDesktop" style="display:none">
        <!-- Day 2 Sessions -->
     <h2 class="EventDayTitle MainStageColor">Main Stage - Day 2</h2>
     
     <!-- TIME CONTAINER -->   
    <div class="AgendaTimeContainerDesktop"> 

<?php
 if (!isset($_SESSION['admin'])){
	 $time = $agenda->display_time();
     echo $time; 
	 
 } 

?>

   </div>   
 <!-- END TIME CONTAINER -->      
    
 <!-- SESSION CONTAINER -->  
       <div class="AgendaSessionsContainerDesktop"> 
    <?php
       $data = $agenda->agenda_session(1,2);
       $output = $agenda->display_sessions($data); 
        echo $output;
?>
     </div>  

 <!-- END SESSION CONTAINER--> 
                  
                
    </div>
    <!-- END Day 1 Sessions -->
    
    
</section>
<!-- END Session List Mobile -->

<!-- Speakers and Testimonials -->
<section id="SpeakersAndTestimonialsContainer">
<?php
/*
$blocks = $agenda->block_display(1,1);

    foreach ($blocks as $elems) {
	  echo  $agenda->get_block_data($elems[0], $elems[1]);	
	}
	*/

 echo  $agenda->get_block_data_admin(1, 1, 2);

?>
</section>
<!-- END Speakers and Testimonials -->   

<!-- Sponsors -->
<section id="Sponsors">
	<div id="SponsorsInnerContainer">
         <div id="NewQuote" data-reveal-id="SessionInfoModal">New Quote</div>
         <div id="EditQuotes">Edit Quotes</div>
    </div>
    
     <div id="QuoteEditField">
      <?php  echo  $agenda->display_all_quotes(); ?>
     </div>
     
     <div id="EditSponsorButton" data-reveal-id="SessionInfoModal" data-day="1" data-category="1">Edit Sponsors</div>
     
     <a href="agenda_sponsor_images"><div id="EditAgendaSponsorLogo">Upload Agenda Sponsor Logos</div></a>
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
<div id="SessionInfoModal" class="reveal-modal" > 
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
