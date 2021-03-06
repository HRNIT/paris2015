<?php 
namespace HRNParis\mediapartners;
use HRNParis\config as config;
use HRNParis\main as main;
include_once('config.php');	
include_once('main.php');
	
class mediapartners_main extends config {
	
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
	

 public function sponsors_grid($category) {
		$content = '';

		//ORDER BY CASE sdc.sponsor_id WHEN 14 THEN 1 END DESC, rand()    :O  ilyenkor a 14-es id-jú lesz mindig az első a többi pedig random utána 
		//ha meg fix a sorrend akkor meg ORDER BY sdc.id DESC
	
		//Get basic data about a sponsors

	  $order_q = "SELECT mediapartner_id FROM mediapartners_order ORDER BY order_id ASC";	
					  
		  $order = $this->pdo->prepare($order_q);
		  $order->execute();
		  
			if ($order->rowCount() > 0) {	
				while($mp_id = $order->fetch()){ 	
		                    
		$stat_q = "SELECT sn.sponsor_name, sdc.sponsor_id FROM mediapartners_name as sn, mediapartners_data_connection as sdc, mediapartners_status as ss, mediapartners_category as sc WHERE sdc.sponsor_name_id=sn.id AND sdc.sponsor_id=ss.sponsor_id AND ss.status_id='1' AND sdc.sponsor_category_id=sc.id AND sc.category_id= :category AND sdc.sponsor_id= :mediapartner  ORDER BY sn.sponsor_name ASC";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->bindValue(':category', $category, \PDO::PARAM_INT);
		$stat->bindValue(':mediapartner', $mp_id['mediapartner_id'], \PDO::PARAM_INT);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($sponsors = $stat->fetch()){
						
						//Logo
					$sponsor_logo_q = "SELECT idb.image_url, idb.alt_name FROM image_db as idb, image_connection as ic WHERE ic.entity_type_id='5' AND ic.entity_id= :id AND ic.image_db_id=idb.id";	
			
					$sponsor_logo = $this->pdo->prepare($sponsor_logo_q);
					$sponsor_logo->bindValue(':id', $sponsors['sponsor_id'], \PDO::PARAM_INT);
					$sponsor_logo->execute();
			
						if ($sponsor_logo->rowCount() > 0) {
								$spimage = $sponsor_logo->fetch();
								$sponsors['image_url'] = $spimage['image_url'];
								$sponsors['alt_name'] = $spimage['alt_name'];
								
						} else {
							 $sponsors['image_url'] = '';
							 $sponsors['alt_name'] = '';
						}						
						

					$achor = $this->clean_str($sponsors['sponsor_name']);
					
					
						$tempId = 'id="'.$achor.'Partner"';
						$tempIdTwo = 'id="'.$achor.'SponsorBox"';
					
	
	
	/*	
	//Old one
				
	     $content .='<div class="SponsorLogoContainer">
            <a href="#'.$achor.'" class="SponsorGridAnchor" data-sponsornametag="'.$achor.'" title="'.$sponsors['sponsor_name'].'"><div class="SponsorLogo" id="'.$tempId.'" style="background-image: url(img/sponsors/logos/'.$sponsors['image_url'].');"></div></a>
        </div>';
	*/
	
 

			 $content .=' <!-- '.$sponsors['sponsor_name'].' -->
            <a class="SponsorGridAnchor" data-sponsornametag="'.$achor.'" data-sponsornum="'.$sponsors['sponsor_id'].'"><div class="Sponsor" '.$tempId.' data-sponsornum="'.$sponsors['sponsor_id'].'">
                <div '.$tempIdTwo.' class="SponsorLogoContainer">
			 	    <img data-img="'.$sponsors['image_url'].'" class="SponsorLogo" src="../img/press/Mediapartners/logos/'.$sponsors['image_url'].'" alt="'.$sponsors['sponsor_name'].'">
				</div>
               
            </div>
            </a>
            <!-- END '.$sponsors['sponsor_name'].' --> ';	
			

					} //stat_q fetch
			}  //stat num row end
			
			
				}//Order fetch
				
			} //order num rows
		return $content;
}
	
	 

  public function mediapartner($mediapartner) {

          $main = new main\main;	
	  
		$content = '';
	
	//ORDER BY CASE sdc.sponsor_id WHEN 14 THEN 1 END DESC, rand()    :O  ilyenkor a 14-es id-jú lesz mindig az első a többi pedig random utána 
	//ha meg fix a sorrend akkor meg ORDER BY sdc.id DESC
	
		//Get basic date about a sponsors
		                    //Name                 Bio         Category              website         image       image alt       sponsor_id
		$stat_q = "SELECT sn.sponsor_name, sc.category_id, sl.sponsor_link_url, ss.status_id FROM mediapartners_name as sn, mediapartners_data_connection as sdc, mediapartners_status as ss, mediapartners_category as sc, mediapartners_links as sl WHERE sdc.sponsor_name_id=sn.id AND sdc.sponsor_id=ss.sponsor_id AND (ss.status_id='1' OR ss.status_id='3') AND sdc.sponsor_link_id=sl.id AND sdc.sponsor_category_id=sc.id AND sdc.sponsor_id = :id  ORDER BY sn.sponsor_name ASC";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->bindValue(':id', $mediapartner, \PDO::PARAM_INT);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($sponsors = $stat->fetch()){
            $sponsors['sponsor_id'] = $mediapartner;
			
									//Logo
					$sponsor_logo_q = "SELECT idb.image_url, idb.alt_name FROM image_db as idb, image_connection as ic WHERE ic.entity_type_id='5' AND ic.entity_id= :id AND ic.image_db_id=idb.id";	
			
					$sponsor_logo = $this->pdo->prepare($sponsor_logo_q);
					$sponsor_logo->bindValue(':id', $sponsors['sponsor_id'], \PDO::PARAM_INT);
					$sponsor_logo->execute();
			
						if ($sponsor_logo->rowCount() > 0) {
								$spimage = $sponsor_logo->fetch();
								$sponsors['image_url'] = $spimage['image_url'];
								$sponsors['alt_name'] = $spimage['alt_name'];
								
						} else {
							 $sponsors['image_url'] = '';
							 $sponsors['alt_name'] = '';
						}	
			
						
		//Get the social link types
		$s = 10;
				
			$permission = 1; 
	//A La carte data
	
	/*
			   $AlaCarteData = function($sId){
				   
				   
				   $out = '';
				   	 
					
					
				   					  //Get permission
					   $alacarte_q = "SELECT spat.text, spat.id FROM sponsors_alacarte_text as spat INNER JOIN sponsors_alacarte as sac ON spat.sponsors_alacarte_id=sac.id WHERE sac.sponsor_id = :sponsor ORDER BY spat.date";
					   $alacarte = $this->pdo->prepare($alacarte_q);
					   
					   $alacarte->bindValue(':sponsor', $sId, \PDO::PARAM_INT);
					   
					   $alacarte->execute();
					   
					   if ($alacarte->rowCount() > 0) {
							while($aData = $alacarte->fetch()){ 
							 
							 $out .= '<div class="AlaCarteItem" data-alacarteid="'.$aData['id'].'">'.$aData['text'].'</div>';
							
							}
					   } else {
						     $out .= '<div>-</div>';  
					   }
						

				return $out;   
				   

		   };
	
	
	//------
	
	*/
			 
								
		if (isset($_SESSION['sponsors_admin']) && ($permission == 1 || isset($_SESSION['super_admin']))) {
		   /*
		  -----------------------------
		   Admin
		  --------------------------------- 
		  */
		  
		  
		  $achor = $this->clean_str($sponsors['sponsor_name']);
		  
		  $content .='<!-- '.$sponsors['sponsor_name'].' -->
        <div class="Sponsor">';
		 $content .='<a id="'.$achor.'" class="anchorclass"></a>';
	
				$content .='<div class="ReturnValue" style="display:none"></div>';
		       $content .='<div class="SystemIcons">';
			
			        
				    $content .=' <i data-sponsor="'.$sponsors['sponsor_id'].'" class="fa fa-times SysIcon SysDelete"> DELETE</i>';
					
					if (isset($_SESSION['super_admin']) && $sponsors['status_id'] == 3){
	                     $content .='<div class="SysApprove" data-entity_type="5" data-sponsor="'.$data['sponsor_id'].'">Approve Partner</div>';
	                    }
					
					
				 $content.='</div>';

			 		   if (isset($_SESSION['sponsors_admin'])){
               $content .='<div class="SponsorLogo dropzone" data-sponsor="'.$sponsors['sponsor_id'].'" data-sname="'.$sponsors['sponsor_name'].'"><img src="../img/press/Mediapartners/logos/'.$sponsors['image_url'].'" alt="'.$sponsors['alt_name'].'"></div>';
	     	} else {
				$content .=' <div class="SponsorLogoNormal"><img src="../img/press/Mediapartners/logos/'.$sponsors['image_url'].'" alt="'.$sponsors['alt_name'].'"></div>';
			}
			 
            $content .=' <div class="SponsorDetails">';
			
                  //Sponsor name			
            	$content .='<h2 class="SponsorName Editable" data-type="NameEdit" data-sponsor="'.$sponsors['sponsor_id'].'">'.$sponsors['sponsor_name'].'</h2>';
				 //Name edit Field
				  $content .='<input class="NameEdit EditField" data-mainclass="SponsorName" style="display:none;" type="text" value="'.$sponsors['sponsor_name'].'">';
				 
				//Sponsor link
				 $content .='<i class="fa fa-external-link Editable" data-type="LinkEdit" data-sponsor="'.$sponsors['sponsor_id'].'"> Website URL</i>';
				  
				 
				    //Link edit Field
				    $content .='<input class="LinkEdit EditField" data-mainclass="fa-external-link" style="display:none;" type="text" value="'.$sponsors['sponsor_link_url'].'">';
				 
				
	
					
                $content .= '
            </div>
        </div>
        <!-- END '.$sponsors['sponsor_name'].' --> ';
		  
			
		} else {
		  /*
		  -----------------------------
		   Normal user
		  --------------------------------- 
		  */
		$content .='<!-- '.$sponsors['sponsor_name'].' -->
        <div class="Sponsor">
            <div class="SponsorLogo"><img src="../img/press/Mediapartners/logos/'.$sponsors['image_url'].'" alt="'.$sponsors['alt_name'].'"></div>
            <div class="SponsorDetails">
            	<h2 class="SponsorName"><a class="CompanyLink" href="'.$sponsors['sponsor_link_url'].'" target="_blank" title="'.$sponsors['sponsor_name'].'"';
				
				    $content .=' onClick="_gaq.push([';
				
				    $content .="'_trackEvent', 'SponsorCompanySite', 'ExternalForward', '".$sponsors['sponsor_name']."']);";
				
					$content .='">';
					
					$content .= $sponsors['sponsor_name'].' <i class="fa fa-external-link"></i></a></h2>';
			
					
                $content .= '
            </div>
        </div>
        <!-- END '.$sponsors['sponsor_name'].' --> ';
		
		}
        	

					}//while sponsors fetch  
			} //if num rows sponsors 
			
		return $content;
}



	//This is the function what collets all the sponsors to the content multi dimensional array.
  public function agenda_sponsors_edit($category) {

          $main = new main\main;	
	  
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
								
								
				$permission = 0;
				
			 if (isset($_SESSION['user_id'])) {	
				
					  //Get permission
					   $name_q = "SELECT id FROM sponsors_user_connection WHERE sponsors_id = :sponsor AND users_id = :user ORDER BY date DESC LIMIT 0,1";
					   $name = $this->pdo->prepare($name_q);
					   
					   $name->bindValue(':sponsor', $sponsors['sponsor_id'], \PDO::PARAM_INT);
					   $name->bindValue(':user', $_SESSION['user_id'], \PDO::PARAM_INT);
					   
					   $name->execute();
					   
					   if ($name->rowCount() > 0) {
						  $permission = 1;
					   }
				
			 }
			 
	//A La carte data
	
					  //Get agenda_sponsor_image
					   $logo_q = "SELECT image_url FROM agenda_sponsor_logos WHERE sponsor_id = :sponsor";
					   $logo = $this->pdo->prepare($logo_q);
					   
					   $logo->bindValue(':sponsor', $sponsors['sponsor_id'], \PDO::PARAM_INT);
					   $logo->execute();
					   
					   if ($logo->rowCount() > 0) {
						    $image = $logo->fetch();
					   } else {
						 $image['image_url'] = 'none';   
					   }
				
			

  
			 
								
		if (isset($_SESSION['sponsors_admin']) && ($permission == 1 || isset($_SESSION['super_admin']))) {
		   /*
		  -----------------------------
		   Admin
		  --------------------------------- 
		  */
		  
		  
		  $achor = $this->clean_str($sponsors['sponsor_name']);
		  
		  $content .='<!-- '.$sponsors['sponsor_name'].' -->
        <div class="Sponsor">';
		 $content .='<a id="'.$achor.'" class="anchorclass"></a>';
	
				$content .='<div class="ReturnValue" style="display:none"></div>';

		
             $content .='<div class="SponsorLogo dropzone" data-sponsor="'.$sponsors['sponsor_id'].'" data-sname="'.$sponsors['sponsor_name'].'"><img src="../img/agenda/sponsors/'.$image['image_url'].'" alt="'.$sponsors['alt_name'].'"></div>
            <div class="SponsorDetails">';
			
                  //Sponsor name			
            	$content .='<h2 class="SponsorName" data-type="NameEdit">'.$sponsors['sponsor_name'].'</h2>';

					
                $content .= '
            </div>
        </div>
        <!-- END '.$sponsors['sponsor_name'].' --> ';
		  
			
		} else {
		  /*
		  -----------------------------
		   Normal user
		  --------------------------------- 
		  */
		$content .='<!-- '.$sponsors['sponsor_name'].' -->
        <div class="Sponsor">
            <div class="SponsorLogo"><img src="../img/sponsors/logos/'.$sponsors['image_url'].'" alt="'.$sponsors['alt_name'].'"></div>
            <div class="SponsorDetails">
            	<h2 class="SponsorName"><a class="CompanyLink" href="'.$sponsors['sponsor_link_url'].'" target="_blank" title="'.$sponsors['sponsor_name'].'"';
				
				    $content .=' onClick="_gaq.push([';
				
				    $content .="'_trackEvent', 'SponsorCompanySite', 'ExternalForward', '".$sponsors['sponsor_name']."']);";
				
					$content .='">';
					
					$content .= $sponsors['sponsor_name'].' <i class="fa fa-external-link"></i></a></h2>
                <div class="SponsorDescription">'.$sponsors['sponsor_bio'].'</div>
                
                <div class="SponsorSocialIcons">';
				
				 if ($data[10] !='') {
					$content .= '<a href="'.$data[10].'" target="_blank" title="'.$sponsors['sponsor_name'].' - Facebook"'; 
					
					$content .=' onClick="_gaq.push([';
				
				    $content .="'_trackEvent', 'SponsorSocialSite', 'ExternalForward', 'Facebook-".$sponsors['sponsor_name']."']);";
				
					$content .='">';

					$content .='<div class="SponsorSocialIcon SponsorFacebookIcon"></div></a>';
				}
				
				if ($data[11] !='') {
					$content .= '<a href="'.$data[11].'" target="_blank" title="'.$sponsors['sponsor_name'].' - Twitter"'; 
					
					$content .=' onClick="_gaq.push([';
				
				    $content .="'_trackEvent', 'SponsorSocialSite', 'ExternalForward', 'Twitter-".$sponsors['sponsor_name']."']);";
				
					$content .='">';
					
					
					$content .= '<div class="SponsorSocialIcon SponsorTwitterIcon"></div></a>';
				}
				
				if ($data[12] !='') {
					$content .= '<a href="'.$data[12].'" target="_blank" title="'.$sponsors['sponsor_name'].' - Linkedin"'; 
					
					$content .=' onClick="_gaq.push([';
				
				    $content .="'_trackEvent', 'SponsorSocialSite', 'ExternalForward', 'Linkedin-".$sponsors['sponsor_name']."']);";
				
					$content .='">';
					$content .= '<div class="SponsorSocialIcon SponsorLinkedinIcon"></div></a>';
				}

/*
				if ($data[13] !='') {
					$content .= '<a href="'.$data[13].'" target="_blank" title="'.$sponsors['sponsor_name'].' - Flickr"'; 
					
					$content .=' onClick="_gaq.push([';
				
				    $content .="'_trackEvent', 'SponsorSocialSite', 'ExternalForward', 'Flickr-".$sponsors['sponsor_name']."']);";
				
					$content .='">';
					$content .= '<div class="SponsorSocialIcon SponsorFlickrinIcon"></div></a>';
				}
				*/	
					
                $content .= '</div>
            </div>
        </div>
        <!-- END '.$sponsors['sponsor_name'].' --> ';
		
		}
        	

					}//while sponsors fetch  
			} //if num rows sponsors 
			
		return $content;
}

public function list_sub_filters($main_id) {
	 $content = '';
				$category_q = "SELECT sfsc.id, sfsc.sub_category FROM sponsors_filter_sub_categories as sfsc, sponsors_filter_category_connection as sfcc WHERE sfcc.filter_sub_id=sfsc.id AND sfcc.filter_main_id= :id";	
					
		$category = $this->pdo->prepare($category_q);
		$category->bindValue(':id', $main_id, \PDO::PARAM_INT);
		$category->execute();

			if ($category->rowCount() > 0) {
					while($cat = $category->fetch()){
						$content .='<li data-category="'.$cat['id'].'"><span>'.$cat['sub_category'].'</span></li>';
					}
			}
	
	return $content;
}
 

  public function sponsors_grid_alacarte() {
		$content = '';
		$taglist = '';
		//ORDER BY CASE sdc.sponsor_id WHEN 14 THEN 1 END DESC, rand()    :O  ilyenkor a 14-es id-jú lesz mindig az első a többi pedig random utána 
		//ha meg fix a sorrend akkor meg ORDER BY sdc.id DESC
	
		//Get basic date about a sponsors
		                    
		$stat_q = "SELECT sn.sponsor_name, idb.image_url, idb.alt_name, sdc.sponsor_id, sa.id as alacarte_id, sat.text FROM sponsors_name as sn, sponsors_data_connection as sdc, sponsors_status as ss, image_db as idb, image_connection as ic, sponsors_alacarte as sa, sponsors_alacarte_text as sat WHERE sdc.sponsor_name_id=sn.id AND sdc.sponsor_id=ss.sponsor_id AND ss.status_id='1' AND ic.entity_type_id='2' AND ic.entity_id=sdc.sponsor_id AND idb.id=ic.image_db_id AND sdc.sponsor_id=sa.sponsor_id AND sat.sponsors_alacarte_id=sa.id ORDER BY sn.sponsor_name ASC";	
					
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
            <div class="Sponsor" data-sponsornum="'.$sponsors['sponsor_id'].'" '.$tag.'>';
			
			$content .='<i data-sponsor="'.$sponsors['alacarte_id'].'" class="fa fa-times SysIcon SysDelete"></i>';		
			
                $content .='<div class="SponsorLogo" style="background-image: url(../img/sponsors/logos/'.$sponsors['image_url'].');"></div>
                ';
				
				$content .='<p class="ALaCarteTextContainer Editable" data-type="CarteTextEdit" data-sponsor="'.$sponsors['sponsor_id'].'">'.$sponsors['text'].'</p>';
				
				$content .='<input class="CarteTextEdit EditField" data-mainclass="ALaCarteTextContainer" style="display:none;" type="text" value="'.$sponsors['text'].'">';
				
           $content .=' </div>
            
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
			
			$content = 'Disabled for now..';
			
		return $content;
}

}
?>	