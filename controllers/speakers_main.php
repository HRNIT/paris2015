<?php 
namespace HRNParis\speakers;
use HRNParis\config as config;
include_once('config.php');	
	
class speakers_main extends config {

/****************
This displays the speakers grid on the speakers page
*******************/

  public function speakers() {
	  // The ribbon above the pictures
	   // <!--<div class="SelectedSpeakerColor FutureOfWorkforceLearningColor" style="width: 100%;"></div>-->
	  
		$content = '';
		
	$anal_code = function($location, $type, $title){
		$out = 'onClick="_gaq.push([';
		
		$out .="'_trackEvent', '".$location."', '".$type."', '".$title."']);";
		
		$out .='"';
		
		return $out;
	};
	
		                    
		$stat_q = "SELECT sn.speaker_name, st.title, scn.company_name, idb.image_url, idb.alt_name, sdc.speaker_id, sdc.speaker_company_id, stag.speaker_tag FROM speakers_name as sn, speakers_data_connection as sdc, speakers_status as ss, speakers_title as st, speakers_company_name as scn, speakers_company_data_connection as scdc, image_db as idb, image_connection as ic, speakers_tag as stag, speakers_order as soo WHERE sdc.speaker_name_id=sn.id AND sdc.speaker_id=ss.speaker_id AND ss.speaker_status_id='1' AND ic.entity_type_id='1' AND ic.entity_id=sdc.speaker_id AND idb.id=ic.image_db_id AND sdc.speaker_company_id=scdc.speaker_company_id AND scdc.speaker_company_name_id=scn.id AND sdc.speaker_title_id=st.id AND stag.id=sdc.speaker_tag_id AND sdc.speaker_id=soo.speaker_id ORDER BY soo.order_id ASC";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($speakers = $stat->fetch()){
			
						 $content.='<!-- '.$speakers['speaker_name'].' -->
						  <div class="Speaker">
						  
							 <a class="SpeakerModalTrigger" data-speakertag="'.$speakers['speaker_tag'].'" data-speaker_id="'.$speakers['speaker_id'].'" data-reveal-id="SpeakerModal" href="#" '.$anal_code('SpeakerPage','ScrollToAnchor', $speakers['speaker_tag']).' >
						  	  
							  <div class="SpeakerPhoto" style="background-image: url(img/speakers/SpeakerPhotos/'.$speakers['image_url'].');">
							  </div>
							 
							  <div class="SpeakerInfo">
								  <h6 class="SpeakerName BlueText FontRaleway">'.$speakers['speaker_name'].'</h6>
								  <p class="Jobtitle">'.$speakers['title'].'</p>
								  <p class="CompanyName">'.$speakers['company_name'].'</p>
							</div>
							</a>
						  </div>
						  <!-- END '.$speakers['speaker_name'].' -->';
											  

        	

					} //stat_q fetch
			}  //stat num row end
			
		return $content;
}


/***********************
Not used atm
************************/

  public function speakers_grid_for_profile() {
	  // The ribbon above the pictures
	   // <!--<div class="SelectedSpeakerColor FutureOfWorkforceLearningColor" style="width: 100%;"></div>-->
	  
		$content = '';
		
		                    
		$stat_q = "SELECT sn.speaker_name, st.title, scn.company_name, idb.image_url, idb.alt_name, sdc.speaker_id, sdc.speaker_company_id, stag.speaker_tag FROM speakers_name as sn, speakers_data_connection as sdc, speakers_status as ss, speakers_title as st, speakers_company_name as scn, speakers_company_data_connection as scdc, image_db as idb, image_connection as ic, speakers_tag as stag, speakers_order as soo WHERE sdc.speaker_name_id=sn.id AND sdc.speaker_id=ss.speaker_id AND ss.speaker_status_id='1' AND ic.entity_type_id='1' AND ic.entity_id=sdc.speaker_id AND idb.id=ic.image_db_id AND sdc.speaker_company_id=scdc.speaker_company_id AND scdc.speaker_company_name_id=scn.id AND sdc.speaker_title_id=st.id AND stag.id=sdc.speaker_tag_id AND sdc.speaker_id=soo.speaker_id ORDER BY soo.order_id ASC";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($speakers = $stat->fetch()){
			
						 $content.='<!-- '.$speakers['speaker_name'].' -->
						  <div class="Speaker">
							 <a href="'.$speakers['speaker_tag'].'">
							  <div class="SpeakerPhoto" style="background-image: url(../img/speakers/SpeakerPhotos/'.$speakers['image_url'].');">
							  </div>
							 
							  <div class="SpeakerInfo">
								  <h6 class="SpeakerName BlueText FontRaleway">'.$speakers['speaker_name'].'</h6>
								  <p class="Jobtitle">'.$speakers['title'].'</p>
								  <p class="CompanyName">'.$speakers['company_name'].'</p>
							</div>
							</a>
						  </div>
						  <!-- END '.$speakers['speaker_name'].' -->';
											  

        	

					} //stat_q fetch
			}  //stat num row end
			
		return $content;
}

/********************
Speaker profile page display

Not used atm
*********************/
public function speaker() {
	
	$anal_code = function($location, $type, $title){
		$out = 'onClick="_gaq.push([';
		
		$out .="'_trackEvent', '".$location."', '".$type."', '".$title."']);";
		
		$out .='"';
		
		return $out;
	};	
	
	$content = "";
	
			                    //Name                 Bio         Category              website         image       image alt       speaker_id
		$speaker_q = "SELECT sn.speaker_name, sb.speaker_bio, st.title, scn.company_name, idb.image_url, idb.alt_name, sdc.speaker_id, sdc.speaker_company_id, stag.speaker_tag FROM speakers_name as sn, speakers_bio as sb, speakers_data_connection as sdc, speakers_status as ss, speakers_title as st, speakers_company_name as scn, speakers_company_data_connection as scdc, image_db as idb, image_connection as ic, speakers_tag as stag WHERE sdc.speaker_name_id=sn.id AND sdc.speaker_bio_id=sb.id AND sdc.speaker_id=ss.speaker_id AND ss.speaker_status_id='1' AND ic.entity_type_id='1' AND ic.entity_id=sdc.speaker_id AND idb.id=ic.image_db_id AND sdc.speaker_company_id=scdc.speaker_company_id AND scdc.speaker_company_name_id=scn.id AND sdc.speaker_title_id=st.id AND stag.id=sdc.speaker_tag_id ";	
		
		//company websited and company logo need to be separate
					
		$speaker = $this->pdo->prepare($speaker_q);
		$speaker->execute();

			if ($speaker->rowCount() > 0) {
					while ($data = $speaker->fetch()) {
					
					
					//Logo
					$logo_q = "SELECT idb.image_url, idb.alt_name FROM image_db as idb, image_connection as ic WHERE ic.entity_type_id='3' AND ic.entity_id= :id AND ic.image_db_id=idb.id";	
			
					$logo = $this->pdo->prepare($logo_q);
					$logo->bindValue(':id', $data['speaker_company_id'], \PDO::PARAM_INT);
					$logo->execute();
			
						if ($logo->rowCount() > 0) {
								$CompanyLogo = $logo->fetch();
						} else {
							 $CompanyLogo['image_url'] = '';
							 $CompanyLogo['alt_name'] = '';
						}
								
						  
			         //Website
					 $website_q = "SELECT scw.company_website FROM speakers_company_website as scw, speakers_company_data_connection as scdc WHERE scdc.speaker_company_id= :id AND scdc.speaker_company_website_id=scw.id";	
				
					  //company websited and company logo need to be separate
								  
					  $website = $this->pdo->prepare($website_q);
					  $website->bindValue(':id', $data['speaker_company_id'], \PDO::PARAM_INT);
					  $website->execute();
			  
						  if ($website->rowCount() > 0) {
								  $CompanyWebsite = $website->fetch();
						  }
								
								
					//Social Links
							//Get the social link types
		$s = 0;
				
			               $social_type_q = "SELECT id, type FROM social_link_types";	
										  
							  $stype = $this->pdo->prepare($social_type_q);
							  $stype->execute();
							  
								if ($stype->rowCount() > 0) {	
									while($link_type = $stype->fetch()){ //facebook
									 
											  $social_q = "SELECT sl.social_link_url FROM social_links as sl, social_links_connection as slc WHERE slc.entity_type_id='1' AND slc.entity_id= :id AND slc.link_id=sl.id AND slc.social_link_type_id= :type ORDER BY slc.date DESC LIMIT 0,1";	
												  
									  $socials = $this->pdo->prepare($social_q);
									  $socials->bindValue(':id', $data['speaker_id'], \PDO::PARAM_INT);
									  $socials->bindValue(':type', $link_type['id'], \PDO::PARAM_INT);
									  $socials->execute();
									  
										if ($socials->rowCount() > 0) {	
											$link = $socials->fetch(); //facebook
											 
											 $Socials[$s] = $link['social_link_url'];
											 $s++;
										}else {
											 $Socials[$s] = '';
											 $s++;
										}
											 
									 
									}//link type fetch ends
								}//if stype row count end
								
								
								  
		//if the speaker profile is empty, we don't show it :P						  
			if (isset($data['speaker_bio']) && $data['speaker_bio'] != '' && $data['speaker_bio'] != '<p><br></p>' && $data['speaker_bio'] != '<p><br></p><p><br></p>' && $data['speaker_bio'] != '<p>.</p>') {
			
		
					
					$content .='<section class="SpeakerProfileContainer">
    <div class="SpeakerProfile">
	    <a href="#" id="'.$data['speaker_tag'].'" class="SpeakerListAnchor"></a>
            <!-- Main Speaker Info: it will get 20px/vw padding AND #f4f4f2 background-color on mobile -->
            <div id="MainSpeakerInfo">
                <img id="SpeakerPhoto" src="img/speakers/SpeakerPhotos/'.$data['image_url'].'" alt="'.$data['speaker_name'].' picture">
                <div id="SpeakerInfo">
                    <h2 id="SpeakerName" class="FontRaleway BlueText">'.$data['speaker_name'].'</h2>
                    <p id="Jobtitle">'.$data['title'].'</p>
                    <p id="CompanyName">'.$data['company_name'].'</p>
                    
                    <div id="SpeakerIconsContainer">';
					
					  if (isset($Socials[0]) && $Socials[0] !='') {
						   $content .='<a href="'.$Socials[0].'" target="_blank" title="'.$data['speaker_name'].' - Facebook" '.$anal_code('SpeakerPage', 'ExternalForward', 'SocialSite - '.$data['speaker_tag']).'><div class="SpeakerIcon" id="SpeakerFacebookIcon"></div></a>';
					  }
				
				      if (isset($Socials[1]) && $Socials[1] !='') {
						  $content .='<a href="'.$Socials[1].'" target="_blank" title="'.$data['speaker_name'].' - Twitter" '.$anal_code('SpeakerPage', 'ExternalForward', 'SocialSite - '.$data['speaker_tag']).'><div class="SpeakerIcon" id="SpeakerTwitterIcon"></div></a>'; 
					  }
                      
					  if (isset($Socials[2]) && $Socials[2] !='') {
						   $content .='<a href="'.$Socials[2].'" target="_blank" title="'.$data['speaker_name'].' - LinkedIn" '.$anal_code('SpeakerPage', 'ExternalForward', 'SocialSite - '.$data['speaker_tag']).'><div class="SpeakerIcon" id="SpeakerLinkedInIcon"></div></a>';
					  }

						
						if (isset($CompanyWebsite['company_website']) & $CompanyWebsite['company_website'] != '') {
							$content .='<a href="'.$CompanyWebsite['company_website'].'" target="_blank" title="'.$data['company_name'].'" '.$anal_code('SpeakerPage', 'ExternalForward', 'CompanySite - '.$data['company_name']).'><i class="fa fa-external-link" id="SpeakerWebsiteIcon"></i></a>';
						}
						
                        
                    $content .='</div>';
					 if (isset($CompanyLogo['image_url']) && $CompanyLogo['image_url'] != '') {
						  $content .='<img id="CompanyLogo" src="img/speakers/CompanyLogos/'.$CompanyLogo['image_url'].'" alt="'.$data['company_name'].'">';
					 }
                   
                $content .='</div>
                <!-- Speaker Icons Container Mobile -->
                <div id="SpeakerIconsContainerMobile">';
				
				      if (isset($Socials[0]) && $Socials[0] !='') {
						   $content .='<a href="'.$Socials[0].'" target="_blank" title="'.$data['speaker_name'].' - Facebook" '.$anal_code('SpeakerPage', 'ExternalForward', 'SocialSite - '.$data['speaker_tag']).'><div class="SpeakerIcon" id="SpeakerFacebookIcon"></div></a>';
					  }
				
				      if (isset($Socials[1]) && $Socials[1] !='') {
						  $content .='<a href="'.$Socials[1].'" target="_blank" title="'.$data['speaker_name'].' - Twitter" '.$anal_code('SpeakerPage', 'ExternalForward', 'SocialSite - '.$data['speaker_tag']).'><div class="SpeakerIcon" id="SpeakerTwitterIcon"></div></a>'; 
					  }
                      
					  if (isset($Socials[2]) && $Socials[2] !='') {
						   $content .='<a href="'.$Socials[2].'" target="_blank" title="'.$data['speaker_name'].' - LinkedIn" '.$anal_code('SpeakerPage', 'ExternalForward', 'SocialSite - '.$data['speaker_tag']).'><div class="SpeakerIcon" id="SpeakerLinkedInIcon"></div></a>';
					  }
                       
                       
						
						
						if (isset($CompanyWebsite['company_website']) && $CompanyWebsite['company_website']!= '') {
							$content .=' <a href="'.$CompanyWebsite['company_website'].'" target="_blank" title="'.$data['company_name'].'" '.$anal_code('SpeakerPage', 'ExternalForward', 'CompanySite - '.$data['company_name']).'><i class="fa fa-external-link" id="SpeakerWebsiteIcon"></i></a>';
						}
						
                       
                $content .='</div>
                <!-- END Speaker Icons Container Mobile -->
            </div>
            <!-- END Main Speaker Info -->
            <!-- Speaker Bio -->
            <div id="SpeakerBio" class="FontLato">'.$data['speaker_bio'].'</div>
           <!-- END Speaker Bio -->';
		  
		   
		   
   $content.=' </div>
    <!-- END Speaker Profile -->
</section>';

			}
					
		}//while fetch data
					
			return $content;		
					
			} else {
				return FALSE;
			}
	
	
	
}

public function id_tag_convert($id) {
	
					  $tag_q = "SELECT stag.speaker_tag FROM speakers_tag as stag INNER JOIN speakers_data_connection as sdc ON stag.id=sdc.speaker_tag_id WHERE sdc.speaker_id = :id";	
								  
					  $tag = $this->pdo->prepare($tag_q);
					  $tag->bindValue(':id', $id, \PDO::PARAM_INT);
					  $tag->execute();
					  
						if ($tag->rowCount() > 0) {	
							$tag_data = $tag->fetch();
							$content = $tag_data['speaker_tag'];
						}
	if (isset($content)){
	    return $content;	
	}
	
}
 
public function speaker_modals($stag) {
	$content = "";
	
			                    //Name                 Bio         Category              website         image       image alt       speaker_id
		$speaker_q = "SELECT sn.speaker_name, sb.speaker_bio, st.title, scn.company_name, idb.image_url, idb.alt_name, sdc.speaker_id, sdc.speaker_company_id, stag.speaker_tag FROM speakers_name as sn, speakers_bio as sb, speakers_data_connection as sdc, speakers_status as ss, speakers_title as st, speakers_company_name as scn, speakers_company_data_connection as scdc, image_db as idb, image_connection as ic, speakers_tag as stag WHERE sdc.speaker_name_id=sn.id AND sdc.speaker_bio_id=sb.id AND sdc.speaker_id=ss.speaker_id AND ss.speaker_status_id='1' AND ic.entity_type_id='1' AND ic.entity_id=sdc.speaker_id AND idb.id=ic.image_db_id AND sdc.speaker_company_id=scdc.speaker_company_id AND scdc.speaker_company_name_id=scn.id AND sdc.speaker_title_id=st.id AND stag.id=sdc.speaker_tag_id AND stag.speaker_tag = :tag";	
		
		//company websited and company logo need to be separate
					
		$speaker = $this->pdo->prepare($speaker_q);
		$speaker->bindValue(':tag', $stag, \PDO::PARAM_STR);
		$speaker->execute();

			if ($speaker->rowCount() > 0) {
					while ($data = $speaker->fetch()) {
					
					
					//Logo
					$logo_q = "SELECT idb.image_url, idb.alt_name FROM image_db as idb, image_connection as ic WHERE ic.entity_type_id='3' AND ic.entity_id= :id AND ic.image_db_id=idb.id";	
			
					$logo = $this->pdo->prepare($logo_q);
					$logo->bindValue(':id', $data['speaker_company_id'], \PDO::PARAM_INT);
					$logo->execute();
			
						if ($logo->rowCount() > 0) {
								$CompanyLogo = $logo->fetch();
						} else {
							 $CompanyLogo['image_url'] = '';
							 $CompanyLogo['alt_name'] = '';
						}
								
						  
			         //Website
					 $website_q = "SELECT scw.company_website FROM speakers_company_website as scw, speakers_company_data_connection as scdc WHERE scdc.speaker_company_id= :id AND scdc.speaker_company_website_id=scw.id";	
				
					  //company websited and company logo need to be separate
								  
					  $website = $this->pdo->prepare($website_q);
					  $website->bindValue(':id', $data['speaker_company_id'], \PDO::PARAM_INT);
					  $website->execute();
			  
						  if ($website->rowCount() > 0) {
								  $CompanyWebsite = $website->fetch();
						  }
								
								
					//Social Links
							//Get the social link types
		$s = 0;
				
			               $social_type_q = "SELECT id, type FROM social_link_types";	
										  
							  $stype = $this->pdo->prepare($social_type_q);
							  $stype->execute();
							  
								if ($stype->rowCount() > 0) {	
									while($link_type = $stype->fetch()){ //facebook
									 
											  $social_q = "SELECT sl.social_link_url FROM social_links as sl, social_links_connection as slc WHERE slc.entity_type_id='1' AND slc.entity_id= :id AND slc.link_id=sl.id AND slc.social_link_type_id= :type ORDER BY slc.date DESC LIMIT 0,1";	
												  
									  $socials = $this->pdo->prepare($social_q);
									  $socials->bindValue(':id', $data['speaker_id'], \PDO::PARAM_INT);
									  $socials->bindValue(':type', $link_type['id'], \PDO::PARAM_INT);
									  $socials->execute();
									  
										if ($socials->rowCount() > 0) {	
											$link = $socials->fetch(); //facebook
											 
											 $Socials[$s] = $link['social_link_url'];
											 $s++;
										}else {
											 $Socials[$s] = '';
											 $s++;
										}
											 
									 
									}//link type fetch ends
								}//if stype row count end
								
								
                             $k = 0;
			               $prevnext_q = "SELECT so.speaker_id FROM speakers_order as so INNER JOIN speakers_status as ss ON so.speaker_id=ss.speaker_id, image_db as idb, image_connection as ic  WHERE ss.speaker_status_id='1' AND ic.entity_type_id='1' AND ic.entity_id=so.speaker_id AND idb.id=ic.image_db_id ORDER BY so.order_id ASC";	
										  
							  $prevnext = $this->pdo->prepare($prevnext_q);
							  $prevnext->execute();
							  
								if ($prevnext->rowCount() > 0) {	
								
									while($prevnext_data = $prevnext->fetch()){ //facebook
									     $order[$k] = $prevnext_data['speaker_id'];
										 
							             if($prevnext_data['speaker_id'] == $data['speaker_id']) {
											 
											 $prev_num = $k - 1;
											 if(isset($order[$prev_num])) {
												 $prev =  $order[$prev_num];
											 }
											 $next_num = $k + 1;
											  
										 }
										 
										$k++;
											 
									 
									}//prevnext type fetch ends
								}//if prevnextrow count end								  
								  
					if (isset($order[$next_num])){
					  	$next = $order[$next_num];
					}
							
								  
								  
					
					
					$content .='
				
 <div id="ModalBigContainer">
  <a class="close-reveal-modal" id="CloseSpeakerModal">&#215;</a>';
  
 	     $content.='<!-- Desktop Arrows -->';
	//PREV
	if (isset($prev)){	
        $content.='<i class="DesktopNavigationArrow NavigationArrow icon icon-back-icon" data-speaker_id="'.$prev.'"></i>';
	}
	
	
	//NEXT
	if (isset($next)){	
       $content.='<i class="DesktopNavigationArrow NavigationArrow icon icon-next-icon" data-speaker_id="'.$next.'"></i>';
	}
     $content.='<!-- END Desktop Arrows --> ';
	 
	 
     $content.='<!-- Mobile Arrows -->
    <div id="MobileArrowsContainer">';
	//MOBILE PREV
	if (isset($prev)){	
    	 $content.='<img class="MobileArrow NavigationArrow" id="MobileArrowPrev" src="img/speakers/mobile-arrow-left.png" alt="<<" data-speaker_id="'.$prev.'">';
	}
	
	
	//MOBILE NEXT
	if (isset($next)){		
    	 $content.='<img class="MobileArrow NavigationArrow" id="MobileArrowNext" src="img/speakers/mobile-arrow-right.png" alt=">>" data-speaker_id="'.$next.'">';
	}
	
	
   $content.='  </div>
    <!-- END Mobile Arrows -->';
	
		 
  
   $content .=' <div class="SpeakerProfile">
            <!-- Main Speaker Info: it will get 20px/vw padding AND #f4f4f2 background-color on mobile -->
            <div id="MainSpeakerInfo">
                <img id="SpeakerPhoto" src="img/speakers/SpeakerPhotos/'.$data['image_url'].'" alt="'.$data['speaker_name'].' picture">
                <div id="SpeakerInfo">
                    <h2 id="SpeakerName" class="FontRaleway BlueText">'.$data['speaker_name'].'</h2>
                    <p id="Jobtitle">'.$data['title'].'</p>
                    <p id="CompanyName">'.$data['company_name'].'</p>
                    
                    <div id="SpeakerIconsContainer">';
					
					  if (isset($Socials[0]) && $Socials[0] !='') {
						   $content .='<a href="'.$Socials[0].'" target="_blank" title="'.$data['speaker_name'].' - Facebook"><div class="SpeakerIcon" id="SpeakerFacebookIcon"></div></a>';
					  }
				
				      if (isset($Socials[1]) && $Socials[1] !='') {
						  $content .='<a href="'.$Socials[1].'" target="_blank" title="'.$data['speaker_name'].' - Twitter"><div class="SpeakerIcon" id="SpeakerTwitterIcon"></div></a>'; 
					  }
                      
					  if (isset($Socials[2]) && $Socials[2] !='') {
						   $content .='<a href="'.$Socials[2].'" target="_blank" title="'.$data['speaker_name'].' - LinkedIn"><div class="SpeakerIcon" id="SpeakerLinkedInIcon"></div></a>';
					  }

						
						if (isset($CompanyWebsite['company_website']) & $CompanyWebsite['company_website'] != '') {
							$content .='<a href="'.$CompanyWebsite['company_website'].'" target="_blank" title="'.$data['company_name'].'"><i class="fa fa-external-link" id="SpeakerWebsiteIcon"></i></a>';
						}
						
                        
                    $content .='</div>';
					 if (isset($CompanyLogo['image_url']) && $CompanyLogo['image_url'] != '') {
						  $content .='<img id="CompanyLogo" src="img/speakers/CompanyLogos/'.$CompanyLogo['image_url'].'" alt="'.$data['company_name'].'">';
					 }
                   
                $content .='</div>
                <!-- Speaker Icons Container Mobile -->
                <div id="SpeakerIconsContainerMobile">';
				
				      if (isset($Socials[0]) && $Socials[0] !='') {
						   $content .='<a href="'.$Socials[0].'" target="_blank" title="'.$data['speaker_name'].' - Facebook"><div class="SpeakerIcon" id="SpeakerFacebookIcon"></div></a>';
					  }
				
				      if (isset($Socials[1]) && $Socials[1] !='') {
						  $content .='<a href="'.$Socials[1].'" target="_blank" title="'.$data['speaker_name'].' - Twitter"><div class="SpeakerIcon" id="SpeakerTwitterIcon"></div></a>'; 
					  }
                      
					  if (isset($Socials[2]) && $Socials[2] !='') {
						   $content .='<a href="'.$Socials[2].'" target="_blank" title="'.$data['speaker_name'].' - LinkedIn"><div class="SpeakerIcon" id="SpeakerLinkedInIcon"></div></a>';
					  }
                       
                       
						
						
						if (isset($CompanyWebsite['company_website']) && $CompanyWebsite['company_website']!= '') {
							$content .=' <a href="'.$CompanyWebsite['company_website'].'" target="_blank" title="'.$data['company_name'].'"><i class="fa fa-external-link" id="SpeakerWebsiteIcon"></i></a>';
						}
						
                       
                $content .='</div>
                <!-- END Speaker Icons Container Mobile -->
            </div>
            <!-- END Main Speaker Info -->
            <!-- Speaker Bio -->
            <div id="SpeakerBio" class="FontLato">'.$data['speaker_bio'].'</div>
           <!-- END Speaker Bio -->';
		   

   $content.=' </div>
    <!-- END Speaker Profile -->
</div>
 
';
					
		}//while fetch data
					
			return $content;		
					
			} else {
				return FALSE;
			}
	
	
	
}

}
?>	