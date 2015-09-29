<?php 
namespace HRNParis\sponsors;
use HRNParis\config as config;
include_once('config.php');	
	
class sponsors_main extends config {
	
		 //strip strings from special characters
 public function clean_str($string) {

    $specialis_karekterek = array('Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ő'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ű'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ő'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ű'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f');
    $string = strtolower(strtr($string, $specialis_karekterek));
    $string = preg_replace("/[^a-z0-9-_\.]/i", '', trim($string));
    if (strlen($string) == 0 || $string == '.' || $string == '..') {
    	$string = 'Invalid name';
    }
    return $string;
}
	 
	//This is the function what collets all the sponsors to the content multi dimensional array.
  public function sponsors($category) {
		$content = '';
	
		
		//ORDER BY CASE sdc.sponsor_id WHEN 14 THEN 1 END DESC, rand()    :O  ilyenkor a 14-es id-jú lesz mindig az első a többi pedig random utána 
		//ha meg fix a sorrend akkor meg ORDER BY sdc.id DESC
	
		//Get basic date about a sponsors
		                    //Name                 Bio         Category              website         image       image alt       sponsor_id
		$stat_q = "SELECT sn.sponsor_name, sb.sponsor_bio, sc.category_id, sl.sponsor_link_url, idb.image_url, idb.alt_name, sdc.sponsor_id FROM sponsors_name as sn, sponsors_bio as sb, sponsors_data_connection as sdc, sponsors_status as ss, sponsors_category as sc, sponsors_links as sl, image_db as idb, image_connection as ic WHERE sdc.sponsor_name_id=sn.id AND sdc.sponsor_bio_id=sb.id AND sdc.sponsor_id=ss.sponsor_id AND ss.status_id='1' AND sdc.sponsor_link_id=sl.id AND ic.entity_type_id='2' AND ic.entity_id=sdc.sponsor_id AND idb.id=ic.image_db_id AND sdc.sponsor_category_id=sc.id AND sc.category_id= :category  ORDER BY sn.sponsor_name ASC";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->bindValue(':category', $category, \PDO::PARAM_INT);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($sponsors = $stat->fetch()){

						
		//Get the social link types
		$s = 10;
				
			               $social_type_q = "SELECT id, type FROM social_link_types";	
										  
							  $stype = $this->pdo->prepare($social_type_q);
							  $stype->execute();
							  
								if ($stype->rowCount() > 0) {	
									while($link_type = $stype->fetch()){ //facebook
									 
											  $social_q = "SELECT sl.social_link_url FROM social_links as sl, social_links_connection as slc WHERE slc.entity_type_id='2' AND slc.entity_id= :id AND slc.link_id=sl.id AND slc.social_link_type_id= :type ORDER BY slc.date DESC LIMIT 0,1";	
												  
									  $socials = $this->pdo->prepare($social_q);
									  $socials->bindValue(':id', $sponsors['sponsor_id'], \PDO::PARAM_INT);
									  $socials->bindValue(':type', $link_type['id'], \PDO::PARAM_INT);
									  $socials->execute();
									  
										if ($socials->rowCount() > 0) {	
											$link = $socials->fetch(); //facebook
											 
											 $data[$s] = $link['social_link_url'];
											 $s++;
										}else {
											 $data[$s] = '';
											 $s++;
										}
											 
									 
									}//link type fetch ends
								}//if stype row count end
								
				$achor = $this->clean_str($sponsors['sponsor_name']);				
								
		$content .='<!-- '.$sponsors['sponsor_name'].' -->
        <div class="SponsorList">
		   <a id="'.$achor.'" class="anchorclass"></a>
            <div class="SponsorListLogo"><img id="'.$achor.'GridLogo" src="img/sponsors/logos/'.$sponsors['image_url'].'" alt="'.$sponsors['alt_name'].'"></div>
            <div class="SponsorListDetails">';

                $content .='<div class="SponsorListSocialIcons">';
				
				 if ($data[10] !='') {
					$content .= '<a href="'.$data[10].'" target="_blank" title="'.$sponsors['sponsor_name'].' - Facebook"'; 
					
					$content .=' onClick="_gaq.push([';
				
				    $content .="'_trackEvent', 'SponsorListSocialSite', 'ExternalForward', 'Facebook-".$sponsors['sponsor_name']."']);";
				
					$content .='">';

					$content .='<div class="SponsorListSocialIcon SponsorListFacebookIcon"></div></a>';
				}
				
				if ($data[11] !='') {
					$content .= '<a href="'.$data[11].'" target="_blank" title="'.$sponsors['sponsor_name'].' - Twitter"'; 
					
					$content .=' onClick="_gaq.push([';
				
				    $content .="'_trackEvent', 'SponsorListSocialSite', 'ExternalForward', 'Twitter-".$sponsors['sponsor_name']."']);";
				
					$content .='">';
					
					
					$content .= '<div class="SponsorListSocialIcon SponsorListTwitterIcon"></div></a>';
				}
				
				if ($data[12] !='') {
					$content .= '<a href="'.$data[12].'" target="_blank" title="'.$sponsors['sponsor_name'].' - Linkedin"'; 
					
					$content .=' onClick="_gaq.push([';
				
				    $content .="'_trackEvent', 'SponsorListSocialSite', 'ExternalForward', 'Linkedin-".$sponsors['sponsor_name']."']);";
				
					$content .='">';
					$content .= '<div class="SponsorListSocialIcon SponsorListLinkedinIcon"></div></a>';
				}
				
				     $content .= '<a class="CompanyLink" href="'.$sponsors['sponsor_link_url'].'" target="_blank" title="'.$sponsors['sponsor_name'].'"';
				
				    $content .=' onClick="_gaq.push([';
				
				    $content .="'_trackEvent', 'SponsorListCompanySite', 'ExternalForward', '".$sponsors['sponsor_name']."']);";
				
					$content .='">';
					
					$content .= ' <div class="SponsorListSocialIcon SponsorListLinkIcon"></div></a>';
					
/*
				if ($data[13] !='') {
					$content .= '<a href="'.$data[13].'" target="_blank" title="'.$sponsors['sponsor_name'].' - Flickr"'; 
					
					$content .=' onClick="_gaq.push([';
				
				    $content .="'_trackEvent', 'SponsorListSocialSite', 'ExternalForward', 'Flickr-".$sponsors['sponsor_name']."']);";
				
					$content .='">';
					$content .= '<div class="SponsorListSocialIcon SponsorListFlickrinIcon"></div></a>';
				}
				*/	
					
                $content .= '</div>';

                $content .= '<div class="SponsorListDescription">'.$sponsors['sponsor_bio'].'</div>';
                
                
					
               
            $content .= '</div>
        </div>
        <!-- END '.$sponsors['sponsor_name'].' --> ';
        	

					} //stat_q fetch
			}  //stat num row end
			
		return $content;
}



	//This is the function what collets all the sponsors to the content multi dimensional array.
  public function sponsors_modal($sId, $sp_mode) {
	  
		$content = '';
		//ORDER BY CASE sdc.sponsor_id WHEN 14 THEN 1 END DESC, rand()    :O  ilyenkor a 14-es id-jú lesz mindig az első a többi pedig random utána 
		//ha meg fix a sorrend akkor meg ORDER BY sdc.id DESC
	
		//Get basic date about a sponsors
		                    //Name                 Bio         Category              website         image       image alt       sponsor_id
		$stat_q = "SELECT sn.sponsor_name, sb.sponsor_bio, sc.category_id, sl.sponsor_link_url, idb.image_url, idb.alt_name, sdc.sponsor_id FROM sponsors_name as sn, sponsors_bio as sb, sponsors_data_connection as sdc, sponsors_status as ss, sponsors_category as sc, sponsors_links as sl, image_db as idb, image_connection as ic WHERE sdc.sponsor_name_id=sn.id AND sdc.sponsor_bio_id=sb.id AND sdc.sponsor_id=ss.sponsor_id AND ss.status_id='1' AND sdc.sponsor_link_id=sl.id AND ic.entity_type_id='2' AND ic.entity_id=sdc.sponsor_id AND idb.id=ic.image_db_id AND sdc.sponsor_category_id=sc.id AND sdc.sponsor_id= :id ORDER BY sn.sponsor_name ASC";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->bindValue(':id', $sId, \PDO::PARAM_INT);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($sponsors = $stat->fetch()){

						
		//Get the social link types
		$s = 10;
				
			               $social_type_q = "SELECT id, type FROM social_link_types";	
										  
							  $stype = $this->pdo->prepare($social_type_q);
							  $stype->execute();
							  
								if ($stype->rowCount() > 0) {	
									while($link_type = $stype->fetch()){ //facebook
									 
											  $social_q = "SELECT sl.social_link_url FROM social_links as sl, social_links_connection as slc WHERE slc.entity_type_id='2' AND slc.entity_id= :id AND slc.link_id=sl.id AND slc.social_link_type_id= :type ORDER BY slc.date DESC LIMIT 0,1";	
												  
									  $socials = $this->pdo->prepare($social_q);
									  $socials->bindValue(':id', $sponsors['sponsor_id'], \PDO::PARAM_INT);
									  $socials->bindValue(':type', $link_type['id'], \PDO::PARAM_INT);
									  $socials->execute();
									  
										if ($socials->rowCount() > 0) {	
											$link = $socials->fetch(); //facebook
											 
											 $data[$s] = $link['social_link_url'];
											 $s++;
										}else {
											 $data[$s] = '';
											 $s++;
										}
											 
									 
									}//link type fetch ends
								}//if stype row count end
								
								
                             $k = 0;
							 
							 if ($sp_mode == 1) {
			               $prevnext_q = "SELECT sn.sponsor_name, sdc.sponsor_id FROM sponsors_name as sn, sponsors_data_connection as sdc, sponsors_status as ss, sponsors_category as sc, image_db as idb, image_connection as ic WHERE sdc.sponsor_name_id=sn.id AND sdc.sponsor_id=ss.sponsor_id AND ss.status_id='1' AND ic.entity_type_id='2' AND ic.entity_id=sdc.sponsor_id AND idb.id=ic.image_db_id AND sdc.sponsor_category_id=sc.id AND sc.category_id <> 0 ORDER BY sc.category_id, sn.sponsor_name ASC";	
							 }
								
							 if ($sp_mode == 2) {
			               $prevnext_q = "SELECT sn.sponsor_name, sdc.sponsor_id FROM sponsors_name as sn, sponsors_data_connection as sdc, sponsors_status as ss, sponsors_category as sc, image_db as idb, image_connection as ic, sponsors_alacarte as sa WHERE sdc.sponsor_name_id=sn.id AND sdc.sponsor_id=ss.sponsor_id AND ss.status_id='1' AND ic.entity_type_id='2' AND ic.entity_id=sdc.sponsor_id AND idb.id=ic.image_db_id AND sdc.sponsor_category_id=sc.id AND sdc.sponsor_id=sa.sponsor_id ORDER BY sn.sponsor_name ASC";	
							 }										  
							  $prevnext = $this->pdo->prepare($prevnext_q);
							  $prevnext->execute();
							  
								if ($prevnext->rowCount() > 0) {	
								
									while($prevnext_data = $prevnext->fetch()){ //facebook
									     $order[$k] = $prevnext_data['sponsor_id'];
										 
							             if($prevnext_data['sponsor_id'] == $sId) {
											 
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
								
								
				$achor = $this->clean_str($sponsors['sponsor_name']);	
				
			
		$content .='<!-- '.$sponsors['sponsor_name'].' -->

 <div id="ModalBigContainer">
		       <a class="close-reveal-modal" id="CloseSponsorModal">&#215;</a>';
			   
 	     $content.='<!-- Desktop Arrows -->';
	//PREV
	if (isset($prev)){	
        $content.='<i class="DesktopNavigationArrow NavigationArrow icon icon-back-icon" data-sponsormode="'.$sp_mode.'" data-sponsor_id="'.$prev.'"></i>';
	}
	
	
	//NEXT
	if (isset($next)){	
       $content.='<i class="DesktopNavigationArrow NavigationArrow icon icon-next-icon" data-sponsormode="'.$sp_mode.'" data-sponsor_id="'.$next.'"></i>';
	}
     $content.='<!-- END Desktop Arrows --> ';
	 
	 
     $content.='<!-- Mobile Arrows -->
    <div id="MobileArrowsContainer">';
	//MOBILE PREV
	if (isset($prev)){	
    	 $content.='<img class="MobileArrow NavigationArrow" id="MobileArrowPrev" src="img/speakers/mobile-arrow-left.png" alt="<<" data-sponsormode="'.$sp_mode.'" data-sponsor_id="'.$prev.'">';
	}
	
	
	//MOBILE NEXT
	if (isset($next)){		
    	 $content.='<img class="MobileArrow NavigationArrow" id="MobileArrowNext" src="img/speakers/mobile-arrow-right.png" alt=">>" data-sponsormode="'.$sp_mode.'" data-sponsor_id="'.$next.'">';
	}
	
	
   $content.='  </div>
    <!-- END Mobile Arrows -->';			   
		
          $content.='<div class="SponsorModalInnerContainer">
            <div class="SponsorModalLogo"><img src="img/sponsors/logos/'.$sponsors['image_url'].'" alt="'.$sponsors['alt_name'].'"></div>
            <div class="SponsorModalDetails">';

                $content .='<div class="SponsorModalSocialIcons">';
				
				 if ($data[10] !='') {
					$content .= '<a href="'.$data[10].'" target="_blank" title="'.$sponsors['sponsor_name'].' - Facebook"'; 
					
					$content .=' onClick="_gaq.push([';
				
				    $content .="'_trackEvent', 'SponsorModalSocialSite', 'ExternalForward', 'Facebook-".$sponsors['sponsor_name']."']);";
				
					$content .='">';

					$content .='<div class="SponsorModalSocialIcon SponsorModalFacebookIcon"></div></a>';
				}
				
				if ($data[11] !='') {
					$content .= '<a href="'.$data[11].'" target="_blank" title="'.$sponsors['sponsor_name'].' - Twitter"'; 
					
					$content .=' onClick="_gaq.push([';
				
				    $content .="'_trackEvent', 'SponsorModalSocialSite', 'ExternalForward', 'Twitter-".$sponsors['sponsor_name']."']);";
				
					$content .='">';
					
					
					$content .= '<div class="SponsorModalSocialIcon SponsorModalTwitterIcon"></div></a>';
				}
				
				if ($data[12] !='') {
					$content .= '<a href="'.$data[12].'" target="_blank" title="'.$sponsors['sponsor_name'].' - Linkedin"'; 
					
					$content .=' onClick="_gaq.push([';
				
				    $content .="'_trackEvent', 'SponsorModalSocialSite', 'ExternalForward', 'Linkedin-".$sponsors['sponsor_name']."']);";
				
					$content .='">';
					$content .= '<div class="SponsorModalSocialIcon SponsorModalLinkedinIcon"></div></a>';
				}
				
				     $content .= '<a class="CompanyLink" href="'.$sponsors['sponsor_link_url'].'" target="_blank" title="'.$sponsors['sponsor_name'].'"';
				
				    $content .=' onClick="_gaq.push([';
				
				    $content .="'_trackEvent', 'SponsorModalCompanySite', 'ExternalForward', '".$sponsors['sponsor_name']."']);";
				
					$content .='">';
					
					$content .= ' <div class="SponsorModalSocialIcon SponsorModalLinkIcon"></div></a>';
					
/*
				if ($data[13] !='') {
					$content .= '<a href="'.$data[13].'" target="_blank" title="'.$sponsors['sponsor_name'].' - Flickr"'; 
					
					$content .=' onClick="_gaq.push([';
				
				    $content .="'_trackEvent', 'SponsorModalSocialSite', 'ExternalForward', 'Flickr-".$sponsors['sponsor_name']."']);";
				
					$content .='">';
					$content .= '<div class="SponsorModalSocialIcon SponsorModalFlickrinIcon"></div></a>';
				}
				*/	
					
                $content .= '</div>';

                $content .= '<div class="SponsorModalDescription">'.$sponsors['sponsor_bio'].'</div>';
                
                
					
               
            $content .= '</div>
        </div>		
	</div>
        <!-- END '.$sponsors['sponsor_name'].' --> ';
        	

					} //stat_q fetch
			}  //stat num row end
			
		return $content;
}



  public function sponsors_grid($category) {
		$content = '';

	$anal_code = function($location, $type, $title){
		$out = 'onClick="_gaq.push([';
		
		$out .="'_trackEvent', '".$location."', '".$type."', '".$title."']);";
		
		$out .='"';
		
		return $out;
	};

		//ORDER BY CASE sdc.sponsor_id WHEN 14 THEN 1 END DESC, rand()    :O  ilyenkor a 14-es id-jú lesz mindig az első a többi pedig random utána 
		//ha meg fix a sorrend akkor meg ORDER BY sdc.id DESC
	
		//Get basic date about a sponsors
		                    
		$stat_q = "SELECT sn.sponsor_name, idb.image_url, idb.alt_name, sdc.sponsor_id FROM sponsors_name as sn, sponsors_data_connection as sdc, sponsors_status as ss, sponsors_category as sc, image_db as idb, image_connection as ic WHERE sdc.sponsor_name_id=sn.id AND sdc.sponsor_id=ss.sponsor_id AND ss.status_id='1' AND ic.entity_type_id='2' AND ic.entity_id=sdc.sponsor_id AND idb.id=ic.image_db_id AND sdc.sponsor_category_id=sc.id AND sc.category_id= :category  ORDER BY sn.sponsor_name ASC";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->bindValue(':category', $category, \PDO::PARAM_INT);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($sponsors = $stat->fetch()){
						
						              $taglist = '';
		 
								      $tags_q = "SELECT filter_sub_id FROM sponsors_filter_connection WHERE sponsor_id = :id";	
												  
									  $tags = $this->pdo->prepare($tags_q);
									  $tags->bindValue(':id', $sponsors['sponsor_id'], \PDO::PARAM_INT);
									  $tags->execute();
									  
										if ($tags->rowCount() > 0) {	
											while($tagArray = $tags->fetch()){
												$taglist .= $tagArray['filter_sub_id'].',';
											}
											
										}
											 
					if ($taglist != '') {
						$tag = 'data-sponsortag="'.$taglist.'"';
					} else {
					   $tag = '';	
					}
					
					$achor = $this->clean_str($sponsors['sponsor_name']);
					
					
						$tempId = 'id="'.$achor.'Sponsor"';
						$tempIdTwo = 'id="'.$achor.'SponsorBox"';
					
					
					//# ez után kell egy url anchor tag
			 $content .=' <!-- '.$sponsors['sponsor_name'].' -->
            <a class="SponsorGridAnchor" data-reveal-id="SponsorsModal" data-sponsor_id="'.$sponsors['sponsor_id'].'" data-sponsornametag="'.$achor.'" '.$anal_code('SponsorPage','ScrollToAnchor', $achor).'><div class="Sponsor" '.$tempId.' data-sponsornum="'.$sponsors['sponsor_id'].'" '.$tag.'>
                <div '.$tempIdTwo.' class="SponsorLogo" style="background-image: url(img/sponsors/logos/'.$sponsors['image_url'].');"></div>
                <img src="img/sponsors/sponsor-hover-plus-icon.png" alt="+">
            </div>
            </a>
            <!-- END '.$sponsors['sponsor_name'].' --> ';		
									 

			/*					
		$content .='<!-- '.$sponsors['sponsor_name'].' -->
        <div class="Sponsor">
            <div class="SponsorLogo" data-sponsortag="'.$taglist.'"><img src="img/sponsors/logos/'.$sponsors['image_url'].'" alt="'.$sponsors['alt_name'].'"></div>

        </div>
        <!-- END '.$sponsors['sponsor_name'].' --> ';
        	*/
			

					} //stat_q fetch
			}  //stat num row end
			
		return $content;
}


  public function sponsors_grid_alacarte() {
		$content = '';
		$taglist = '';
		

	$anal_code = function($location, $type, $title){
		$out = 'onClick="_gaq.push([';
		
		$out .="'_trackEvent', '".$location."', '".$type."', '".$title."']);";
		
		$out .='"';
		
		return $out;
	};		
		//ORDER BY CASE sdc.sponsor_id WHEN 14 THEN 1 END DESC, rand()    :O  ilyenkor a 14-es id-jú lesz mindig az első a többi pedig random utána 
		//ha meg fix a sorrend akkor meg ORDER BY sdc.id DESC
	
		//Get basic date about a sponsors
		                    
		$stat_q = "SELECT sn.sponsor_name, idb.image_url, idb.alt_name, sdc.sponsor_id, sat.text FROM sponsors_name as sn, sponsors_data_connection as sdc, sponsors_status as ss, image_db as idb, image_connection as ic, sponsors_alacarte as sa, sponsors_alacarte_text as sat WHERE sdc.sponsor_name_id=sn.id AND sdc.sponsor_id=ss.sponsor_id AND ss.status_id='1' AND ic.entity_type_id='2' AND ic.entity_id=sdc.sponsor_id AND idb.id=ic.image_db_id AND sdc.sponsor_id=sa.sponsor_id AND sat.sponsors_alacarte_id=sa.id ORDER BY sn.sponsor_name ASC";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($sponsors = $stat->fetch()){
						
	                                  $taglist = '';
									  
									  		 
								      $tags_q = "SELECT filter_sub_id FROM sponsors_filter_connection WHERE sponsor_id = :id";	
												  
									  $tags = $this->pdo->prepare($tags_q);
									  $tags->bindValue(':id', $sponsors['sponsor_id'], \PDO::PARAM_INT);
									  $tags->execute();
									  
										if ($tags->rowCount() > 0) {	
											while($tagArray = $tags->fetch()){
												$taglist .= $tagArray['filter_sub_id'].',';
											}
											
										}
										
					if ($taglist != '') {
						$tag = 'data-sponsortag="'.$taglist.'"';
					} else {
					   $tag = '';	
					}
											 
			$achor = $this->clean_str($sponsors['sponsor_name']);
									 
			 $content .=' <!-- '.$sponsors['sponsor_name'].' -->
            <a class="SponsorGridAnchorAlaCarte" data-reveal-id="SponsorsModal" data-sponsor_id="'.$sponsors['sponsor_id'].'" data-sponsornametag="'.$achor.'" '.$anal_code('SponsorPage','ScrollToAnchor', $achor).'><div class="Sponsor AlaCarteSponsorBox" data-sponsornum="'.$sponsors['sponsor_id'].'" '.$tag.'>
                <div class="SponsorLogo" style="background-image: url(img/sponsors/logos/'.$sponsors['image_url'].');"></div>
                <img src="img/sponsors/sponsor-hover-plus-icon.png" alt="+">
				<p class="ALaCarteTextContainer">'.$sponsors['text'].'</p>
            </div>
            </a>
            <!-- END '.$sponsors['sponsor_name'].' --> ';		
									 
						/*		
		$content .='<!-- '.$sponsors['sponsor_name'].' -->
        <div class="Sponsor">
            <div class="SponsorLogo" data-sponsortag="'.$taglist.'"><img src="img/sponsors/logos/'.$sponsors['image_url'].'" alt="'.$sponsors['alt_name'].'"></div>

        </div>
        <!-- END '.$sponsors['sponsor_name'].' --> ';
        	*/

					} //stat_q fetch
			}  //stat num row end
			
		return $content;
}



}
?>	