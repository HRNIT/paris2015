<?php 
namespace HRNParis\press_main;
use HRNParis\config as config;
include_once('config.php');	
	
class press_main extends config {
	 
	//This is the function what collets all the sponsors to the content multi dimensional array.
  public function speakers() {
	  // The ribbon above the pictures
	   // <!--<div class="SelectedSpeakerColor FutureOfWorkforceLearningColor" style="width: 100%;"></div>-->
	  
		$content = '';
		
		                    
		$stat_q = "SELECT sn.speaker_name, st.title, scn.company_name, idb.image_url, idb.alt_name, sdc.speaker_id, sdc.speaker_company_id, stag.speaker_tag FROM speakers_name as sn, speakers_data_connection as sdc, speakers_status as ss, speakers_title as st, speakers_company_name as scn, speakers_company_data_connection as scdc, image_db as idb, image_connection as ic, speakers_tag as stag, speakers_order as soo WHERE sdc.speaker_name_id=sn.id AND sdc.speaker_id=ss.speaker_id AND ss.speaker_status_id='1' AND ic.entity_type_id='1' AND ic.entity_id=sdc.speaker_id AND idb.id=ic.image_db_id AND sdc.speaker_company_id=scdc.speaker_company_id AND scdc.speaker_company_name_id=scn.id AND sdc.speaker_title_id=st.id AND stag.id=sdc.speaker_tag_id AND sdc.speaker_id=soo.speaker_id ORDER BY soo.order_id ASC";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($speakers = $stat->fetch()){
			
						 $content.='<!-- '.$speakers['speaker_name'].' -->
						  <div class="Speaker" data-speaker="'.$speakers['speaker_id'].'">
							 <a href="speaker-profile/'.$speakers['speaker_tag'].'">
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


  public function press_display_admin($type) {
	  // The ribbon above the pictures
	   // <!--<div class="SelectedSpeakerColor FutureOfWorkforceLearningColor" style="width: 100%;"></div>-->


	if (isset($type) && $type != ''){
	        if ($type == 1) {
				$entity = 'blogsquad';
				$entity_id = 6;
				$entity_company_id = 8;
				$url = "blogger-profile";
				$photo_url = "../img/press/BlogSquad/Photos/";
			} else {
			  	$entity = 'analytics';
				$entity_id = 7;
				$entity_company_id = 9;
				$url = "analyst-profile";
				$photo_url = "../img/press/Analytics/Photos/";
			}
			
				  
		$content = '';
		
			  $mainpage_q = "SELECT sm.speaker_id FROM ".$entity."_mainpage as sm, ".$entity."_mainpage_order as smo WHERE smo.speaker_id=sm.speaker_id ORDER BY smo.order_id ASC";	
					  
		  $mainpage = $this->pdo->prepare($mainpage_q);
		  $mainpage->execute();
		  
			if ($mainpage->rowCount() > 0) {	
				while($main_id = $mainpage->fetch()){ 	
		
		                    
		$stat_q = "SELECT sn.speaker_name, st.title, sdc.speaker_id, stag.speaker_tag FROM ".$entity."_name as sn, ".$entity."_data_connection as sdc, ".$entity."_status as ss, ".$entity."_title as st, ".$entity."_tag as stag, ".$entity."_order as soo WHERE sdc.speaker_name_id=sn.id AND sdc.speaker_id=ss.speaker_id AND ss.speaker_status_id='1' AND sdc.speaker_title_id=st.id AND stag.id=sdc.speaker_tag_id AND sdc.speaker_id=soo.speaker_id AND sdc.speaker_id= :id ORDER BY soo.order_id ASC";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->bindValue(':id', $main_id[0], \PDO::PARAM_INT);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($speakers = $stat->fetch()){
						
						
	
	//Get Additional data
	
						//Logo
					$logo_q = "SELECT idb.image_url, idb.alt_name FROM ".$entity."_image_db as idb, ".$entity."_image_connection as ic WHERE ic.entity_type_id='".$entity_id."' AND ic.entity_id= :id AND ic.image_db_id=idb.id";	
			
					$logo = $this->pdo->prepare($logo_q);
					$logo->bindValue(':id', $speakers['speaker_id'], \PDO::PARAM_INT);
					$logo->execute();
			
						if ($logo->rowCount() > 0) {
								$spimage = $logo->fetch();
								$speakers['image_url'] = $spimage['image_url'];
								
						} else {
							 $speakers['image_url'] = '';
						}
	
						

						//Logo
					$company_q = "SELECT scn.company_name  FROM ".$entity."_company_name as scn, ".$entity."_company_data_connection as scdc, ".$entity."_data_connection as sdc WHERE sdc.speaker_company_id=scdc.speaker_company_id AND scdc.speaker_company_name_id=scn.id AND sdc.speaker_id = :id";	
			
					$company = $this->pdo->prepare($company_q);
					$company->bindValue(':id', $speakers['speaker_id'], \PDO::PARAM_INT);
					$company->execute();
			
						if ($company->rowCount() > 0) {
								$spcompany = $company->fetch();
								$speakers['company_name'] = $spcompany['company_name'];
								
						} else {
							 		$speakers['company_name'] = '';
						}
	
						
		

			
						 $content.='<!-- '.$speakers['speaker_name'].' -->
						  <div class="Speaker" data-speaker="'.$speakers['speaker_id'].'">
							 <a href="'.$url.'/'.$speakers['speaker_tag'].'">
							  <div class="SpeakerPhoto" style="background-image: url('.$photo_url.$speakers['image_url'].');">
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
			
			
				}//While fetch mainpage 
} // if mainpage isset
			
		return $content;
		
	}
}


public function display_press($type) {
	if (isset($type) && $type != ''){
	        if ($type == 1) {
				$entity = 'blogsquad';
				$entity_id = 6;
				$entity_company_id = 8;
				$photo_url = "img/press/BlogSquad/Photos/";
			} else {
			  	$entity = 'analytics';
				$entity_id = 7;
				$entity_company_id = 9;
				$photo_url = "img/press/Analytics/Photos/";
			}
	
	$content = "";
	
		   $mainpage_q = "SELECT sm.speaker_id FROM ".$entity."_mainpage as sm, ".$entity."_mainpage_order as smo WHERE smo.speaker_id=sm.speaker_id ORDER BY smo.order_id ASC";	
					  
		  $mainpage = $this->pdo->prepare($mainpage_q);
		  $mainpage->execute();
		  
			if ($mainpage->rowCount() > 0) {	
				while($main_id = $mainpage->fetch()){ 
	
	
			                    //Name                 Bio         Category              website         image       image alt       speaker_id
		$speaker_q = "SELECT sn.speaker_name, st.title, sdc.speaker_id, stag.speaker_tag FROM ".$entity."_name as sn, ".$entity."_data_connection as sdc, ".$entity."_status as ss, ".$entity."_title as st, ".$entity."_tag as stag, ".$entity."_order as soo WHERE sdc.speaker_name_id=sn.id AND sdc.speaker_id=ss.speaker_id AND ss.speaker_status_id='1' AND sdc.speaker_title_id=st.id AND stag.id=sdc.speaker_tag_id AND sdc.speaker_id=soo.speaker_id AND sdc.speaker_id= :id ORDER BY soo.order_id ASC";	
		
		//company websited and company logo need to be separate
					
		$speaker = $this->pdo->prepare($speaker_q);
		$speaker->bindValue(':id', $main_id[0], \PDO::PARAM_INT);
		$speaker->execute();

			if ($speaker->rowCount() > 0) {
					while ($data = $speaker->fetch()) {
					

	//Get Additional data
	
						//Logo
					$profile_q = "SELECT idb.image_url, idb.alt_name FROM ".$entity."_image_db as idb, ".$entity."_image_connection as ic WHERE ic.entity_type_id='".$entity_id."' AND ic.entity_id= :id AND ic.image_db_id=idb.id";	
			
					$profile = $this->pdo->prepare($profile_q);
					$profile->bindValue(':id', $data['speaker_id'], \PDO::PARAM_INT);
					$profile->execute();
			
						if ($profile->rowCount() > 0) {
								$spimage = $profile->fetch();
								$data['image_url'] = $spimage['image_url'];
								
						} else {
							 $data['image_url'] = '';
						}
	
						

						//Logo
					$company_q = "SELECT scn.company_name  FROM ".$entity."_company_name as scn, ".$entity."_company_data_connection as scdc, ".$entity."_data_connection as sdc WHERE sdc.speaker_company_id=scdc.speaker_company_id AND scdc.speaker_company_name_id=scn.id AND sdc.speaker_id = :id";	
			
					$company = $this->pdo->prepare($company_q);
					$company->bindValue(':id', $data['speaker_id'], \PDO::PARAM_INT);
					$company->execute();
			
						if ($company->rowCount() > 0) {
								$spcompany = $company->fetch();
								$data['company_name'] = $spcompany['company_name'];
								
						} else {
							 		$data['company_name'] = '';
						}

					
					//Logo
					$logo_q = "SELECT idb.image_url, idb.alt_name FROM ".$entity."_image_db as idb, ".$entity."_image_connection as ic WHERE ic.entity_type_id='".$entity_company_id."' AND ic.entity_id= :id AND ic.image_db_id=idb.id";	
			
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
					 $website_q = "SELECT scw.company_website FROM ".$entity."_company_website as scw, ".$entity."_company_data_connection as scdc WHERE scdc.speaker_company_id= :id AND scdc.speaker_company_website_id=scw.id";	
				
					  //company websited and company logo need to be separate
								  
					  $website = $this->pdo->prepare($website_q);
					  $website->bindValue(':id', $data['speaker_company_id'], \PDO::PARAM_INT);
					  $website->execute();
			  
						  if ($website->rowCount() > 0) {
								  $CompanyWebsite = $website->fetch();
						  }
						  
						  
											//Mainpage bio
					$mpbio_q = "SELECT text FROM ".$entity."_mainpage_bio WHERE speaker_id = :id";	
			
					$mpbio = $this->pdo->prepare($mpbio_q);
					$mpbio->bindValue(':id', $data['speaker_id'], \PDO::PARAM_INT);
					$mpbio->execute();
			
						if ($mpbio->rowCount() > 0) {
								$mpbio_text = $mpbio->fetch();
								
								    $tag = array('<p>'=>'', '</p>'=>'');
                                    $mpbio_text[0] = strtr($mpbio_text[0], $tag);
						} else {
							$mpbio_text[0] = '';
						}	  
								
								
					//Social Links
							//Get the social link types
		$s = 0;
				
			               $social_type_q = "SELECT id, type FROM social_link_types";	
										  
							  $stype = $this->pdo->prepare($social_type_q);
							  $stype->execute();
							  
								if ($stype->rowCount() > 0) {	
									while($link_type = $stype->fetch()){ //facebook
									 
											  $social_q = "SELECT sl.social_link_url FROM social_links as sl, social_links_connection as slc WHERE slc.entity_type_id='".$entity_id."' AND slc.entity_id= :id AND slc.link_id=sl.id AND slc.social_link_type_id= :type ORDER BY slc.date DESC LIMIT 0,1";	
												  
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
								


      $content .='<li id="Speakers'.$data['speaker_tag'].'">
        <div class="SpeakersImageContainer">
			  <div class="SpeakerOverlay">
	            <h3 class="FontRaleway">'.$data['speaker_name'].'</h3>
		        <h4 class="FontRaleway">'.$data['company_name'].'</h4>
	         </div>
	   <img class="Square" alt="'.$data['speaker_name'].'" src="'.$photo_url.$data['image_url'].'" title="'; 
		$content .= "<h3 class='SpeakerName'>".$data['speaker_name']."</h3><p class='SpeakerCompany'>".$data['company_name']."</p><p class='SpeakerInfo'>".$mpbio_text[0]."</p><p class='SpeakerHoverLinks'><a title='".$Socials[1]."' target='_blank' href='".$Socials[1]."'><i class='fa fa-twitter TwitterColor'></i></a><a title='".$data['company_name']."' target='_blank' href='".$CompanyWebsite['company_website']."'><i class='fa fa-link TwitterColor'></i></a></p>";
		$content .='" ></div>
      </li>';


					
		}//while fetch data
		
	}//While fetch mainpage 
} // if mainpage isset
/*
      $content .='</ul>
    <h3 class="BlueText FontRaleway" id="CallForSpeakers">Call for Speakers is Now Open</h3>
    <span data-reveal-id="BecomeASpeakerModal" onClick="_gaq.push([';
	
	
	$content .="'_trackEvent', 'FeaturedSection', 'ModalOpen', 'BecomeASpeaker']);";
	
	$content .='">
    <button title="Become a Speaker" class="BlueButton" id="BecomeASpeakerButton">Become a Speaker</button>
    </span> </div>
  <!-- Include and initiate sliphover, the directional hover effect engine --> 
  <script src="vendor/sliphover/jquery.sliphover.js"></script> 
  <script type="text/javascript">
          $(function(){
        
        $("#SpeakersContainer").sliphover({
           
        });
        })
        </script>';
*/

			return $content;		
					
			} else {
				return FALSE;
			}
			
	}//if isset type
	 else {
		 return FALSE; 
	 }
	
}



public function press($tag, $type) {
	$content = "";
	
 if (isset($type) && $type != ''){	
 
    if ($type == 'Blogger'){
		$entity = "blogsquad";
		$entity_id = 6;
		$entity_company_id = 8;
		$photo_url = "../../img/press/BlogSquad/";
	} else {
	  $entity = "analytics";
	  $entity_id = 7;
      $entity_company_id = 9;
	  $photo_url = "../../img/press/Analytics/";
	}
	
			                    //Name                 Bio         Category              website         image       image alt       speaker_id
		$speaker_q = "SELECT sn.speaker_name, st.title, sdc.speaker_id FROM ".$entity."_name as sn, ".$entity."_data_connection as sdc, ".$entity."_status as ss, ".$entity."_title as st, ".$entity."_tag as stag WHERE sdc.speaker_name_id=sn.id AND sdc.speaker_id=ss.speaker_id AND ss.speaker_status_id='1' AND sdc.speaker_title_id=st.id AND stag.speaker_tag = :tag AND stag.id=sdc.speaker_tag_id LIMIT 0,1";	
		
		//company websited and company logo need to be separate
					
		$speaker = $this->pdo->prepare($speaker_q);
		$speaker->bindValue(':tag', $tag, \PDO::PARAM_STR);
		$speaker->execute();

			if ($speaker->rowCount() > 0) {
					$data = $speaker->fetch();


//Get Additional data
	
						//Logo
					$profile_q = "SELECT idb.image_url, idb.alt_name FROM ".$entity."_image_db as idb, ".$entity."_image_connection as ic WHERE ic.entity_type_id='".$entity_id."' AND ic.entity_id= :id AND ic.image_db_id=idb.id";	
			
					$profile = $this->pdo->prepare($profile_q);
					$profile->bindValue(':id', $data['speaker_id'], \PDO::PARAM_INT);
					$profile->execute();
			
						if ($profile->rowCount() > 0) {
								$spimage = $profile->fetch();
								$data['image_url'] = $spimage['image_url'];
								
						} else {
							 $data['image_url'] = '';
						}
	
						

						//Logo
					$company_q = "SELECT sdc.speaker_company_id, scn.company_name  FROM ".$entity."_company_name as scn, ".$entity."_company_data_connection as scdc, ".$entity."_data_connection as sdc WHERE sdc.speaker_company_id=scdc.speaker_company_id AND scdc.speaker_company_name_id=scn.id AND sdc.speaker_id = :id";	
			
					$company = $this->pdo->prepare($company_q);
					$company->bindValue(':id', $data['speaker_id'], \PDO::PARAM_INT);
					$company->execute();
			
						if ($company->rowCount() > 0) {
								$spcompany = $company->fetch();
								$data['company_name'] = $spcompany['company_name'];
								$data['speaker_company_id'] = $spcompany['speaker_company_id'];
								
						} else {
							 		$data['company_name'] = 'Type here a company name!';
									$data['speaker_company_id'] = '';
						}


   if ($data['company_name'] == NULL || $data['company_name'] == ''){
	      $data['company_name'] = "Type a company name here!";    
   }
					
					
					//Logo
					$logo_q = "SELECT idb.image_url, idb.alt_name FROM ".$entity."_image_db as idb, ".$entity."_image_connection as ic WHERE ic.entity_type_id='8' AND ic.entity_id= :id AND ic.image_db_id=idb.id";	
			
					$logo = $this->pdo->prepare($logo_q);
					$logo->bindValue(':id', $data['speaker_company_id'], \PDO::PARAM_INT);
					$logo->execute();
			
						if ($logo->rowCount() > 0) {
								$CompanyLogo = $logo->fetch();
						}
								
					//Mainpage
					$mainpage_q = "SELECT id FROM ".$entity."_mainpage WHERE speaker_id = :id";	
			
					$mainpage = $this->pdo->prepare($mainpage_q);
					$mainpage->bindValue(':id', $data['speaker_id'], \PDO::PARAM_INT);
					$mainpage->execute();
			
						if ($mainpage->rowCount() > 0) {
								$mainpage_id = $mainpage->fetch();
								$checkmp = 'checked="checked"';
						} else {
							$checkmp = '';
						}
						
											//Mainpage
					$mpbio_q = "SELECT text FROM ".$entity."_mainpage_bio WHERE speaker_id = :id";	
			
					$mpbio = $this->pdo->prepare($mpbio_q);
					$mpbio->bindValue(':id', $data['speaker_id'], \PDO::PARAM_INT);
					$mpbio->execute();
			
						if ($mpbio->rowCount() > 0) {
								$mpbio_text = $mpbio->fetch();
								
						} else {
							$mpbio_text[0] = '';
						}
						
						  
			         //Website
					 $website_q = "SELECT scw.company_website FROM ".$entity."_company_website as scw, ".$entity."_company_data_connection as scdc WHERE scdc.speaker_company_id= :id AND scdc.speaker_company_website_id=scw.id";	
				
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
									 
											  $social_q = "SELECT sl.social_link_url FROM social_links as sl, social_links_connection as slc WHERE slc.entity_type_id='".$entity_id."' AND slc.entity_id= :id AND slc.link_id=sl.id AND slc.social_link_type_id= :type ORDER BY slc.date DESC LIMIT 0,1";	
												  
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
								
								
		/*
		   //Sponsor name			
            	$content .='<h2 class="SponsorName Editable" data-type="NameEdit" data-sponsor="'.$sponsors['sponsor_id'].'">'.$sponsors['sponsor_name'].'</h2>';
				 //Name edit Field
				  $content .='<input class="NameEdit EditField" data-mainclass="SponsorName" style="display:none;" type="text" value="'.$sponsors['sponsor_name'].'">';
		*/						  
								  
	if (isset($_SESSION['speakers_admin'])){
	    //***********************
		//Speaker Admin IS set	
		//**********************
		
				
				$content .='<section id="SpeakerProfileContainer">
    <div id="SpeakerProfile" on>
	<div class="SysDelete" data-speaker="'.$data['speaker_id'].'">Delete</div>

	     <div id="ReturnValue" style="display:none"></div>
            <!-- Main Speaker Info: it will get 20px/vw padding AND #f4f4f2 background-color on mobile -->
            <div id="MainSpeakerInfo">
                <img id="SpeakerPhoto" data-speaker="'.$data['speaker_id'].'" data-sname="'.$data['speaker_name'].'" class="dropzone" src="'.$photo_url.'/Photos/'.$data['image_url'].'" alt="'.$data['speaker_name'].' picture" alt="Profile picture">
                <div id="SpeakerInfo">';
				
				      //Name
                    $content .='<h2 id="SpeakerName" class="FontRaleway BlueText Editable" data-type="NameEdit" data-speaker="'.$data['speaker_id'].'">'.$data['speaker_name'].'</h2>';
					$content .='<input class="NameEdit EditField" data-mainclass="SpeakerName" style="display:none;" type="text" value="'.$data['speaker_name'].'">';
					
					
                    $content .='<p id="Jobtitle" class="Editable" data-type="TitleEdit" data-speaker="'.$data['speaker_id'].'">'.$data['title'].'</p>';
					
					$content .='<input class="TitleEdit EditField" data-mainclass="Jobtitle" style="display:none;" type="text" value="'.$data['title'].'">';
					
					
                     $content .=' <p id="CompanyName" class="Editable" data-type="CompanyNameEdit" data-speaker="'.$data['speaker_company_id'].'">'.$data['company_name'].'</p>';
					 
					 	$content .='<input class="CompanyNameEdit EditField" data-mainclass="CompanyName" style="display:none;" type="text" value=" ">';
                    
                    $content .='<div id="SpeakerIconsContainer">';
					
						if (isset($CompanyWebsite['company_website'])) {
							$content .='<i class="fa fa-external-link Editable" id="SpeakerWebsiteIcon" data-type="CompanyWebsiteEdit" data-speaker="'.$data['speaker_company_id'].'"></i>';
							$content .='<input class="CompanyWebsiteEdit EditField" data-mainclass="SpeakerWebsiteIcon" style="display:none;" type="text" value="'.$CompanyWebsite['company_website'].'">';
						}
					
                         $content .='<p><span data-entity_id="'.$data['speaker_id'].'" data-entity_type="6" class="SocialLinkEdit"><i class="fa fa-comment fa-2x"></i>Social Links</span></p>';
                        
                    $content .='</div>';

                $content .='</div>
                <!-- Speaker Icons Container Mobile -->
                <div id="SpeakerIconsContainerMobile">';
				
                      $content .='<p><span data-entity_id="'.$data['speaker_id'].'" data-entity_type="6" class="SocialLinkEdit"><i class="fa fa-comment fa-2x"></i>Social Links</span></p>';
                       
						
						
						if (isset($CompanyWebsite['company_website'])) {
							$content .=' <a href="'.$CompanyWebsite['company_website'].'" target="_blank" title="'.$data['company_name'].'"><i class="fa fa-external-link" id="SpeakerWebsiteIcon"></i></a>';
						}
						
                       
                $content .='</div>
                <!-- END Speaker Icons Container Mobile -->
            </div>
            <!-- END Main Speaker Info -->
            <!-- Speaker Bio -->';

			
					if (!isset($mpbio_text[0]) || $mpbio_text[0] == '<p><br></p><p><br></p>') {
						   $bio_text = '<p>Type a Bio here!</p><p><br></p>';
						   
					   } else {
						   $bio_text = $mpbio_text[0];
					   }
			
            $content .='<div id="SpeakerBio" class="FontLato" data-type="BioEdit" data-speaker="'.$data['speaker_id'].'">'.$bio_text.'</div>';
			$content .='<div class="HelpText"  data-speaker="'.$data['speaker_id'].'">Press the save icon to save the changes! If you want to close the editor without saving, press ESC!</div>';
			//Bio Edit field
				   $content .='<textarea class="BioEdit" data-mainclass="SpeakerBio" style="display:none;">'.$mpbio_text[0].'</textarea>';
            $content .=' <!-- END Speaker Bio -->';
		   
		   
		
		   
		   
   $content.=' </div>
    <!-- END Speaker Profile -->
</section>';	
		
		
		
		
		//speaker admin end
	} else {
		//***********************
		//Speaker Admin is NOT set	
		//**********************		
					$content .='<section id="SpeakerProfileContainer">
    <div id="SpeakerProfile">
            <!-- Main Speaker Info: it will get 20px/vw padding AND #f4f4f2 background-color on mobile -->
            <div id="MainSpeakerInfo">
                <img id="SpeakerPhoto" src="'.$photo_url.'Photos/'.$data['image_url'].'" alt="'.$data['speaker_name'].' picture">
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

						
						if (isset($CompanyWebsite['company_website'])) {
							$content .='<a href="'.$CompanyWebsite['company_website'].'" target="_blank" title="'.$data['company_name'].'"><i class="fa fa-external-link" id="SpeakerWebsiteIcon"></i></a>';
						}
						
                        
                    $content .='</div>';
					 if (isset($CompanyLogo['image_url'])) {
						  $content .='<img id="CompanyLogo" src="../../img/speakers/CompanyLogos/'.$CompanyLogo['image_url'].'" alt="'.$data['company_name'].'">';
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
                       
                       
						
						
						if (isset($CompanyWebsite['company_website'])) {
							$content .=' <a href="'.$CompanyWebsite['company_website'].'" target="_blank" title="'.$data['company_name'].'"><i class="fa fa-external-link" id="SpeakerWebsiteIcon"></i></a>';
						}
						
                       
                $content .='</div>
                <!-- END Speaker Icons Container Mobile -->
            </div>
            <!-- END Main Speaker Info -->
            <!-- Speaker Bio -->
            <div id="SpeakerBio" class="FontLato">'.$mpbio_text[0].'</div>
           <!-- END Speaker Bio -->';
		   
		   
		   /*
          $content.=' <!-- Collapsible Stage List -->
           <div id="CollapsibleStagesContainer">
               <h2 id="TalksAt" class="FontLato">Talks at...</h2>
               <!-- Talent and Recruitment Technology -->
               <div class="CollapsibleStage">
               		<div class="StageHeadline">
                    	<img class="StageIcon" src="../img/speakers/StageIcons/talent-and-recruitment-technology-icon.png" alt="Icon">
                        <h3 class="StageName LongStageName">Talent and Recruitment Technology</h3> <!-- .LongStageName classes are used 640px and below if the stage name is longer than 25 characters -->
                        <img class="CollapseIcon MinusIcon ShowIcon" src="../img/speakers/minus-icon.png" alt="[-]">
                        <img class="CollapseIcon PlusIcon HideIcon" src="../img/speakers/plus-icon.png" alt="[+]">
                    </div>
                    <!-- Talent and Recruitment Technology Content -->
                    <div class="StageContent" id="OpenedCollapsibleStageContent">
                    	<h4 class="SessionTitle">Build or Destroy Engagement: The Leadership Exercise</h4>
                    	<p class="SessionAbstract FontLato">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eros nulla, faucibus eget sem in, lobortis congue lacus. Mauris varius, ipsum eu rutrum pellentesque, ante justo condimentum leo, ac tempus ex nulla vel odio. Duis ultricies accumsan nulla, sit amet imperdiet nulla malesuada eleifend. Donec vitae mi semper, condimentum magna vitae, aliquam risus. Sed quam arcu, ultrices ut lectus ut, venenatis varius elit. Curabitur vestibulum elit sit amet ultricies placerat. Maecenas massa neque, malesuada vel lectus eu, pharetra suscipit elit. Proin feugiat vehicula risus ac hendrerit. Suspendisse ultrices luctus eros, in viverra urna sodales eget. Ut condimentum nibh sit amet lacinia fermentum. In efficitur facilisis.</p>
                    	<h5 class="MoreSpeakers FontLato">More speakers of this track:</h5>
                        
                        <!-- Related Speakers -->
                        <div class="RelatedSpeakersContainer">
                        	
                            <a href="speaker-profile"><div class="RelatedSpeaker">
                            	<div class="RelatedSpeakerPhoto" style="background-image: url(img/speakers/SpeakerPhotos/ShingD.jpg);" alt="David Shing Photo"></div>
                                <div class="RelatedSpeakerInfo">
                                    <h6 class="RelatedSpeakerName BlueText FontRaleway">David Shing</h6>
                                    <p class="RelatedJobtitle">Digital Prophet</p>
                                    <p class="RelatedCompanyName">AOL</p>
                                </div>
                            </div>
                            </a>
                            
                           

                        </div>
                        <!-- END Related Speakers -->
                    </div>
                    <!-- END Talent and Recruitment Technology Content -->
               </div>
               <!-- END Talent and Recruitment Technology  -->
           
               <!-- HR Technology -->
               <div class="CollapsibleStage">
               		<div class="StageHeadline" onClick="">
                    	<img class="StageIcon" src="../img/speakers/StageIcons/hr-technology-icon.png" alt="Icon">
                        <h3 class="StageName">HR Technology</h3>
                        <img class="CollapseIcon MinusIcon HideIcon" src="../img/speakers/minus-icon.png" alt="[-]">
                        <img class="CollapseIcon PlusIcon ShowIcon" src="../img/speakers/plus-icon.png" alt="[+]">
                    </div>
                    <!-- HR Technology Stage Content -->
                    <div class="StageContent">
                    	<h4 class="SessionTitle">Build or Destroy Engagement: The Leadership Exercise</h4>
                    	<p class="SessionAbstract FontLato">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eros nulla, faucibus eget sem in, lobortis congue lacus. Mauris varius, ipsum eu rutrum pellentesque, ante justo condimentum leo, ac tempus ex nulla vel odio. Duis ultricies accumsan nulla, sit amet imperdiet nulla malesuada eleifend. Donec vitae mi semper, condimentum magna vitae, aliquam risus. Sed quam arcu, ultrices ut lectus ut, venenatis varius elit. Curabitur vestibulum elit sit amet ultricies placerat. Maecenas massa neque, malesuada vel lectus eu, pharetra suscipit elit. Proin feugiat vehicula risus ac hendrerit. Suspendisse ultrices luctus eros, in viverra urna sodales eget. Ut condimentum nibh sit amet lacinia fermentum. In efficitur facilisis.</p>
                    	<h5 class="MoreSpeakers FontLato">More speakers of this track:</h5>
                        
                        <!-- Related Speakers -->
                        <div class="RelatedSpeakersContainer">
                        	
							<a href="speaker-profile">
                            <div class="RelatedSpeaker">
                            	<div class="RelatedSpeakerPhoto" style="background-image: url(img/speakers/SpeakerPhotos/ShingD.jpg);" alt="David Shing Photo"></div>
                                <div class="RelatedSpeakerInfo">
                                    <h6 class="RelatedSpeakerName BlueText FontRaleway">David Shing</h6>
                                    <p class="RelatedJobtitle">Digital Prophet</p>
                                    <p class="RelatedCompanyName">AOL</p>
                                </div>
                            </div>
                            </a>

							<a href="speaker-profile">
                            <div class="RelatedSpeaker">
                            	<div class="RelatedSpeakerPhoto" style="background-image: url(img/speakers/SpeakerPhotos/AverbookJ.jpg);" alt="David Shing Photo"></div>
                                <div class="RelatedSpeakerInfo">
                                    <h6 class="RelatedSpeakerName BlueText FontRaleway">Jason Averbook</h6>
                                    <p class="RelatedJobtitle">Author & Chief Executive Officer</p>
                                    <p class="RelatedCompanyName">The Marcus Buckingham Company</p>
                                </div>
                            </div>
                            </a>

                        </div>
                        <!-- END Related Speakers -->
                    </div>
                    <!-- END HR Technology Stage Content -->
               </div>
               <!-- END HR Technology -->
           </div>
           <!-- END Collapsible Stage List -->';*/
		   
		   
   $content.=' </div>
    <!-- END Speaker Profile -->
</section>';
	} // Speaker Admin is NOT set END
					
					
			return $content;		
					
			} else {
				return FALSE;
			}
	
 }//isset type
	
}
 

}
?>	