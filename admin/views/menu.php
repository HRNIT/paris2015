<?php 

function show_menu($page) {

$content = '';

	 $content .=' 
	  <nav>
  <div id="MobileMenuContainer">
    <div id="MobileMenuLogo"></div>
    <div id="MobileMenuButton" onClick="ShowMobileMenu()"></div>

  <div id="MobileNav" class="sidebar">

     <div id="MobileMenuListContainer"> <img id="MobileMenuCloseButton" src="../img/menu/mobile-close-button.png" alt="X" onClick="HideMobileMenu()">
        <ul id="MobileUl">';

   if (isset($_SESSION['user'])) {
	   
	    $content .=' <div id="MenuIconContainer">';
		
		
		switch ($page) {
               case 'sponsors':
					 if (isset($_SESSION['sponsors_admin'])) {
						  
						   $content .= '<a href="index" title="Back to Main Page"><img class="MenuIcon" src="img/icons/main.png" onmouseover="this.src=';
						   $content .="'img/icons/main_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/main.png';";
						   $content .='" ></a>';
						  
				  
						   $content .= '<a href="add_sponsors" title="Add a new Sponsor"><img class="MenuIcon" src="img/icons/new.png" onmouseover="this.src=';
						   $content .="'img/icons/new_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/new.png';";
						   $content .='" ></a>';
						   /*
						   $content .= '<a href="sponsors_alacarte" title="Edit A La Carte Sponsors"><img class="MenuIcon" src="img/icons/alacarte.png" onmouseover="this.src=';
						   $content .="'img/icons/alacarte_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/alacarte.png';";
						   $content .='" ></a>';
						   */
						   $content .= '<a target="_blank" href="../sponsors" title="Live Sponsors Page"><img class="MenuIcon" src="img/icons/sponsors.png" onmouseover="this.src=';
						   $content .="'img/icons/sponsors_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/sponsors.png';";
						   $content .='" ></a>';
					   
					  }
			   
      
                  break;
               case 'speakers':
			   
					 if (isset($_SESSION['speakers_admin'])) {
						  
						   $content .= '<a href="index"><img class="MenuIcon" src="img/icons/main.png" onmouseover="this.src=';
						   $content .="'img/icons/main_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/main.png';";
						   $content .='" ></a>';
						  
				  
						   $content .= '<a href="add_speakers"><img class="MenuIcon" src="img/icons/new.png" onmouseover="this.src=';
						   $content .="'img/icons/new_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/new.png';";
						   $content .='" ></a>';
						   
						   $content .= '<a target="_blank" href="../speakers" title="Live Speakers Page"><img class="MenuIcon" src="img/icons/speakers.png" onmouseover="this.src=';
						   $content .="'img/icons/speakers_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/speakers.png';";
						   $content .='" ></a>';
						   
						   $content .= '<a target="_blank" href="speakers_mainpage" title="Speakers Mainpage Order"><img class="MenuIcon" src="img/icons/speakers_mainpage.png" onmouseover="this.src=';
						   $content .="'img/icons/speakers_mainpage_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/speakers_mainpage.png';";
						   $content .='" ></a>';
					   
					  }

                  break;
				  
				  
			  case 'alacarte':
			   
					 if (isset($_SESSION['sponsors_admin'])) {
						  
						   $content .= '<a href="sponsors"><img class="MenuIcon" src="img/icons/main.png" onmouseover="this.src=';
						   $content .="'img/icons/main_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/main.png';";
						   $content .='" ></a>';
						
					   
					  }

                  break;
               case 'speakers-profile':
			   
			   		  if (isset($_SESSION['speakers_admin'])) {
						  
						   $content .= '<a href="../speakers"><img class="MenuIcon" src="../img/icons/main.png" onmouseover="this.src=';
						   $content .="'../img/icons/main_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'../img/icons/main.png';";
						   $content .='" ></a>';
						  
				  
						   $content .= '<a href="add_speakers"><img class="MenuIcon" src="../img/icons/new.png" onmouseover="this.src=';
						   $content .="'../img/icons/new_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'../img/icons/new.png';";
						   $content .='" ></a>';
						   
						   $content .= '<a target="_blank" href="../../speakers" title="Live Speakers Page"><img class="MenuIcon" src="../img/icons/speakers.png" onmouseover="this.src=';
						   $content .="'../img/icons/speakers_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'../img/icons/speakers.png';";
						   $content .='" ></a>';
						   
						   $content .= '<a target="_blank" href="../speakers_mainpage" title="Speakers Mainpage Order"><img class="MenuIcon" src="../img/icons/speakers_mainpage.png" onmouseover="this.src=';
						   $content .="'../img/icons/speakers_mainpage_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'../img/icons/speakers_mainpage.png';";
						   $content .='" ></a>';
					   
					  }

                 break;
               case 'agenda':
			   
					 if (isset($_SESSION['admin'])) {
						  
						   $content .= '<a href="index"><img class="MenuIcon" src="img/icons/main.png" onmouseover="this.src=';
						   $content .="'img/icons/main_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/main.png';";
						   $content .='" ></a>';
						  
				  
						   $content .= '<a href="add_agenda"><img class="MenuIcon" src="img/icons/new.png" onmouseover="this.src=';
						   $content .="'img/icons/new_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/new.png';";
						   $content .='" ></a>';
						   
						   $content .= '<a target="_blank" href="agenda_sponsor_images" title="Upload Agenda Sponsor Logos"><img class="MenuIcon" src="img/icons/sponsors.png" onmouseover="this.src=';
						   $content .="'img/icons/sponsors_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/sponsors.png';";
						   $content .='" ></a>';						   
						   
						   $content .= '<a target="_blank" href="../agenda" title="Live Agenda Page"><img class="MenuIcon" src="img/icons/agenda.png" onmouseover="this.src=';
						   $content .="'img/icons/agenda_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/agenda.png';";
						   $content .='" ></a>';
						   
					   
					  }

                  break;
               case 'agenda_sponsor':
			   
					 if (isset($_SESSION['admin'])) {
						  
						   $content .= '<a href="agenda" title="Back To Agenda"><img class="MenuIcon" src="img/icons/main.png" onmouseover="this.src=';
						   $content .="'img/icons/main_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/main.png';";
						   $content .='" ></a>';
						  
						   
					   
					  }

                  break;				 
				 
               case 'press_profile':
			   
					 if (isset($_SESSION['admin'])) {
						  
						   $content .= '<a href="../press" title="Back To Press page"><img class="MenuIcon" src="../img/icons/main.png" onmouseover="this.src=';
						   $content .="'../img/icons/main_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'../img/icons/main.png';";
						   $content .='" ></a>';
						  
						   
					   
					  }

                  break;
				  
               case 'press':
			   
					 if (isset($_SESSION['admin'])) {
						 
						   $content .= '<a href="add_mediapartners" title="Add Media Partner"><img class="MenuIcon" src="img/icons/mediapartners.png" onmouseover="this.src=';
						   $content .="'img/icons/mediapartners_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/mediapartners.png';";
						   $content .='" ></a>';						 
						  
						   $content .= '<a href="add_press" title="Add Blogger"><img class="MenuIcon" src="img/icons/new.png" onmouseover="this.src=';
						   $content .="'img/icons/new_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/new.png';";
						   $content .='" ></a>';
						  
						   
					   
					  }

                  break;
				  
               case 'mediapartners':
			   
					 if (isset($_SESSION['admin'])) {
						  
						   $content .= '<a href="press" title="Back To Press page"><img class="MenuIcon" src="img/icons/main.png" onmouseover="this.src=';
						   $content .="'img/icons/main_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/main.png';";
						   $content .='" ></a>';
						  
						   
					   
					  }

                  break;				  				  					 
}
		
		
		
		
		
		/*
	  
	if (isset($_SESSION['sponsors_admin'])) {
		

		 $content .= '<a href="sponsors"><img class="MenuIcon" src="img/icons/sponsors.png" onmouseover="this.src=';
		 $content .="'img/icons/sponsors_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/icons/sponsors.png';";
		 $content .='" ></a>';
	 
	}
	 
	if (isset($_SESSION['speakers_admin'])) {
		
		 $content .= '<a href="speakers"><img class="MenuIcon" src="img/icons/speakers.png" onmouseover="this.src=';
		 $content .="'img/icons/speakers_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/icons/speakers.png';";
		 $content .='" ></a>';
	 
	}
	
	if (isset($_SESSION['agenda_admin'])) {
		
		 $content .= '<a href="agenda"><img class="MenuIcon" src="img/icons/agenda.png" onmouseover="this.src=';
		 $content .="'img/icons/agenda_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/icons/agenda.png';";
		 $content .='" ></a>';
	 
	}
	 
	if (isset($_SESSION['blogsquad_admin'])) {
		
		 $content .= '<a href="blogsquad"><img class="MenuIcon" src="img/icons/blogsquad.png" onmouseover="this.src=';
		 $content .="'img/icons/blogsquad_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/icons/blogsquad.png';";
		 $content .='" ></a>';
	 
	}
	 
	if (isset($_SESSION['mediapartners_admin'])) {
		
		 $content .= '<a href="mediapartners"><img class="MenuIcon" src="img/icons/mediapartners.png" onmouseover="this.src=';
		 $content .="'img/icons/mediapartners_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/icons/mediapartners.png';";
		 $content .='" ></a>';
	 
	}
	
		
   if (isset($_SESSION['developer'])) {
		
		 $content .= '<a href="logs"><img class="MenuIcon" src="img/icons/logs.png" onmouseover="this.src=';
		 $content .="'img/icons/logs_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/icons/logs.png';";
		 $content .='" ></a>';
		 
		 
		 $content .= '<a href="bookings"><img class="MenuIcon" src="img/icons/booking.png" onmouseover="this.src=';
		 $content .="'img/icons/booking_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/icons/booking.png';";
		 $content .='" ></a>';
	 
	 
	}
	
	*/
  $content .='</div>';
	   
      
/*
		
            <li><a title="About" href="http://hrtechcongress.com#AboutSection" onClick="HideMobileMenu(); _gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'About']);">About</a></li>
            <li><a title="Speakers" href="http://hrtechcongress.com#SpeakersSection" onClick=" HideMobileMenu(); _gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Speakers']);">Speakers</a></li>
            <li><a title="Sponsors" href="http://hrtechcongress.com#SponsorsSection" onClick="HideMobileMenu(); _gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Sponsors']);">Sponsors</a></li>
            <li><a title="Highlights" href="http://hrtechcongress.com#HighlightsSection" onClick="HideMobileMenu(); _gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Highlights']);">Highlights</a></li>
            <li><a title="Venue" href="http://hrtechcongress.com#VenueSection" onClick="HideMobileMenu(); _gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Venue']);">Venue</a></li>
            <li><a title="Contacts" href="http://hrtechcongress.com#GetInTouchSection" onClick="HideMobileMenu(); _gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Contact']);">Get In Touch</a></li>
            <li><a title="Tickets" href="tickets" onClick="HideMobileMenu(); _gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Tickets']);"><i class="fa fa-ticket"></i> Get Tickets</a></li>
			
			*/
			
			
	}
			
       $content .='  </ul>
</div>
</div>
  </div>
  </nav>

  <!-- MAIN MENU 
This section is controlled by the menu.css 
-->';



  
 $content .=' <nav id="SecondStateMainMenuContainer" class="FixedTop">
  
    <div id="MenuContainer">
	
	<a href="index"><img src="../img/menu/horizontallogo.png" alt="HR Tech Congress Logo"  id="HorizontalLogo"/></a>';
	
	if (isset($_SESSION['user'])) {
	   
	    $content .=' <div id="MenuIconContainer">';
		
		
				switch ($page) {
               case 'sponsors':
					 if (isset($_SESSION['sponsors_admin'])) {
						  
						   $content .= '<a href="index" title="Back to Main Page"><img class="MenuIcon" src="img/icons/main.png" onmouseover="this.src=';
						   $content .="'img/icons/main_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/main.png';";
						   $content .='" ></a>';
						  
				  
						   $content .= '<a href="add_sponsors" title="Add a new Sponsor"><img class="MenuIcon" src="img/icons/new.png" onmouseover="this.src=';
						   $content .="'img/icons/new_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/new.png';";
						   $content .='" ></a>';
						   
						   /*
						   $content .= '<a href="sponsors_alacarte" title="Edit A La Carte Sponsors"><img class="MenuIcon" src="img/icons/alacarte.png" onmouseover="this.src=';
						   $content .="'img/icons/alacarte_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/alacarte.png';";
						   $content .='" ></a>';
						   */
						   
						   $content .= '<a target="_blank" href="../sponsors" title="Live Sponsors Page"><img class="MenuIcon" src="img/icons/sponsors.png" onmouseover="this.src=';
						   $content .="'img/icons/sponsors_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/sponsors.png';";
						   $content .='" ></a>';
					   
					  }
			   
      
                  break;
               case 'speakers':
			   
					 if (isset($_SESSION['speakers_admin'])) {
						  
						   $content .= '<a href="index"><img class="MenuIcon" src="img/icons/main.png" onmouseover="this.src=';
						   $content .="'img/icons/main_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/main.png';";
						   $content .='" ></a>';
						  
				  
						   $content .= '<a href="add_speakers"><img class="MenuIcon" src="img/icons/new.png" onmouseover="this.src=';
						   $content .="'img/icons/new_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/new.png';";
						   $content .='" ></a>';
						   
						   $content .= '<a target="_blank" href="../speakers" title="Live Speakers Page"><img class="MenuIcon" src="img/icons/speakers.png" onmouseover="this.src=';
						   $content .="'img/icons/speakers_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/speakers.png';";
						   $content .='" ></a>';
						   
						   $content .= '<a target="_blank" href="speakers_mainpage" title="Speakers Mainpage Order"><img class="MenuIcon" src="img/icons/speakers_mainpage.png" onmouseover="this.src=';
						   $content .="'img/icons/speakers_mainpage_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/speakers_mainpage.png';";
						   $content .='" ></a>';
					   
					  }

                  break;
				  
				  
			  case 'alacarte':
			   
					 if (isset($_SESSION['sponsors_admin'])) {
						  
						   $content .= '<a href="sponsors"><img class="MenuIcon" src="img/icons/main.png" onmouseover="this.src=';
						   $content .="'img/icons/main_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/main.png';";
						   $content .='" ></a>';
						
					   
					  }

                  break;
				  
               case 'speakers-profile':
			   
			   		  if (isset($_SESSION['speakers_admin'])) {
						  
						   $content .= '<a href="../speakers"><img class="MenuIcon" src="../img/icons/main.png" onmouseover="this.src=';
						   $content .="'../img/icons/main_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'../img/icons/main.png';";
						   $content .='" ></a>';
						  
				  
						   $content .= '<a href="add_speakers"><img class="MenuIcon" src="../img/icons/new.png" onmouseover="this.src=';
						   $content .="'../img/icons/new_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'../img/icons/new.png';";
						   $content .='" ></a>';
						   
						   $content .= '<a target="_blank" href="../../speakers" title="Live Speakers Page"><img class="MenuIcon" src="../img/icons/speakers.png" onmouseover="this.src=';
						   $content .="'../img/icons/speakers_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'../img/icons/speakers.png';";
						   $content .='" ></a>';
						   
						   $content .= '<a target="_blank" href="../speakers_mainpage" title="Speakers Mainpage Order"><img class="MenuIcon" src="../img/icons/speakers_mainpage.png" onmouseover="this.src=';
						   $content .="'../img/icons/speakers_mainpage_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'../img/icons/speakers_mainpage.png';";
						   $content .='" ></a>';
					   
					  }

                 break;
               case 'agenda':
			   
					 if (isset($_SESSION['admin'])) {
						  
						   $content .= '<a href="index"><img class="MenuIcon" src="img/icons/main.png" onmouseover="this.src=';
						   $content .="'img/icons/main_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/main.png';";
						   $content .='" ></a>';
						  
				  
						   $content .= '<a href="add_agenda"><img class="MenuIcon" src="img/icons/new.png" onmouseover="this.src=';
						   $content .="'img/icons/new_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/new.png';";
						   $content .='" ></a>';
						   
						   $content .= '<a target="_blank" href="agenda_sponsor_images" title="Upload Agenda Sponsor Logos"><img class="MenuIcon" src="img/icons/sponsors.png" onmouseover="this.src=';
						   $content .="'img/icons/sponsors_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/sponsors.png';";
						   $content .='" ></a>';
						   
						   $content .= '<a target="_blank" href="../agenda" title="Live Agenda Page"><img class="MenuIcon" src="img/icons/agenda.png" onmouseover="this.src=';
						   $content .="'img/icons/agenda_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/agenda.png';";
						   $content .='" ></a>';
						   
					   
					  }

                  break;
               case 'agenda_sponsor':
			   
					 if (isset($_SESSION['admin'])) {
						  
						   $content .= '<a href="agenda" title="Back To Agenda"><img class="MenuIcon" src="img/icons/main.png" onmouseover="this.src=';
						   $content .="'img/icons/main_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/main.png';";
						   $content .='" ></a>';
						  
						   
					   
					  }

                  break;
				  
               case 'press_profile':
			   
					 if (isset($_SESSION['admin'])) {
						  
						   $content .= '<a href="../press" title="Back To Press page"><img class="MenuIcon" src="../img/icons/main.png" onmouseover="this.src=';
						   $content .="'../img/icons/main_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'../img/icons/main.png';";
						   $content .='" ></a>';
						  
						   
					   
					  }

                  break;	
				  
               case 'press':
			   
					 if (isset($_SESSION['admin'])) {
				
				
						   $content .= '<a href="add_mediapartners" title="Add Media Partner"><img class="MenuIcon" src="img/icons/mediapartners.png" onmouseover="this.src=';
						   $content .="'img/icons/mediapartners_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/mediapartners.png';";
						   $content .='" ></a>';	
						   
						   						  
						   $content .= '<a href="add_press" title="Add Blogger"><img class="MenuIcon" src="img/icons/blogsquad.png" onmouseover="this.src=';
						   $content .="'img/icons/blogsquad_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/blogsquad.png';";
						   $content .='" ></a>';
						      
					   
					  }

                  break;
				  
               case 'mediapartners':
			   
					 if (isset($_SESSION['admin'])) {
						  
						   $content .= '<a href="press" title="Back To Press page"><img class="MenuIcon" src="img/icons/main.png" onmouseover="this.src=';
						   $content .="'img/icons/main_hover.png';";
						   $content .='" onmouseout="this.src=';
						   $content .="'img/icons/main.png';";
						   $content .='" ></a>';
						  
						   
					   
					  }

                  break;				  					  			  					  
				  				 
}
		
		
		
	

	
  $content .='</div>';
	
}
	   
	   
	  $content .=' </div>
  </nav>';
	  

echo $content;

}

?> 

