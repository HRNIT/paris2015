<?php 
use HRNParis\NewData as newData;

   if (!isset($_SESSION['user'])) {
	  	 require_once('login.php');
   } else {
	   
	   $content ='
	   <!--Jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="css/admin_general.css" rel="stylesheet">
<link rel="stylesheet" href="css/admin_edit_general.css" />
<link rel="stylesheet" href="css/admin_index.css" />
 
</head>
<body>

 <!--Main Wrapper-->
	<div class="wrapper">
	  <h1 class="WrapperMainH1">HRN - Paris site 2015 | Main Page</h1>
	  
	  <p class="WelcomeTexT">Welcome to the World Congress site Interface of <br> HRN</p>
	   <p class="WelcomeTexT"> Please select the page where you want go</p>
	   
	<!--Form container-->
	 <div id="container">
      <div id="MenuIconContainer">';
	  
	if (isset($_SESSION['admin'])) {

		 $content .= '<a href="sponsors"><img class="MenuIcon" src="img/icons/sponsors.png" onmouseover="this.src=';
		 $content .="'img/icons/sponsors_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/icons/sponsors.png';";
		 $content .='" ></a>';
		 
		  $content .= '<a href="speakers"><img class="MenuIcon" src="img/icons/speakers.png" onmouseover="this.src=';
		 $content .="'img/icons/speakers_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/icons/speakers.png';";
		 $content .='" ></a>';
	 
	}
	

	if (isset($_SESSION['admin'])) {
		
		 $content .= '<a href="agenda"><img class="MenuIcon" src="img/icons/agenda.png" onmouseover="this.src=';
		 $content .="'img/icons/agenda_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/icons/agenda.png';";
		 $content .='" ></a>';
		 
		 $content .= '<a href="press" title="Press Page"><img class="MenuIcon" src="img/icons/mediapartners.png" onmouseover="this.src=';
		 $content .="'img/icons/mediapartners_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/icons/mediapartners.png';";
		 $content .='" ></a>';		 
	 
	}
	 /*
	if (isset($_SESSION['blogsquad_admin'])) {
		
		 $content .= '<a href="blogsquad"><img class="MenuIcon" src="img/admin/blogsquad.png" onmouseover="this.src=';
		 $content .="'img/admin/blogsquad_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/blogsquad.png';";
		 $content .='" ></a>';
	 
	}
	 
	if (isset($_SESSION['mediapartners_admin'])) {
		
		 $content .= '<a href="mediapartners"><img class="MenuIcon" src="img/admin/mediapartners.png" onmouseover="this.src=';
		 $content .="'img/admin/mediapartners_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/mediapartners.png';";
		 $content .='" ></a>';
	 
	}
	
		if (isset($_SESSION['developer'])) {
		
		 $content .= '<a href="logs"><img class="MenuIcon" src="img/admin/logs.png" onmouseover="this.src=';
		 $content .="'img/admin/logs_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/logs.png';";
		 $content .='" ></a>';
		 
		 
		 $content .= '<a href="bookings"><img class="MenuIcon" src="img/admin/booking.png" onmouseover="this.src=';
		 $content .="'img/admin/booking_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/booking.png';";
		 $content .='" ></a>';
	 
	 
	}
	*/
  $content .='</div>
  	   
	<br /><br /><br />
  <a href="logout"><button name="logout">Logout</button></a>

  
  
  	
	   <!-- End of Form Container-->
	 </div>
	 
	<!--End of Main Wrapper-->
	</div>
	
	';  
   }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>HR Tech World Congress Admin site</title>
<?php
echo $content;


?> 
</body>
</html>
