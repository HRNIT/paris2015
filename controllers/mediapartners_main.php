<?php 
namespace HRNParis\mediapartners;
use HRNParis\config as config;
include_once('config.php');	
	
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
	 



	
/*
------------------
MEDIAPARTNERS PAGE
-----------------
*/

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
	
  $order_q = "SELECT mediapartner_id FROM mediapartners_order ORDER BY order_id ASC";	
					  
		  $order = $this->pdo->prepare($order_q);
		  $order->execute();
		  
			if ($order->rowCount() > 0) {	
				while($mp_id = $order->fetch()){ 		
		                    
		$stat_q = "SELECT sn.sponsor_name, idb.image_url, idb.alt_name, sdc.sponsor_id, sl.sponsor_link_url FROM mediapartners_name as sn, mediapartners_data_connection as sdc, mediapartners_status as ss, mediapartners_category as sc, image_db as idb, image_connection as ic, mediapartners_links as sl WHERE sdc.sponsor_name_id=sn.id AND sdc.sponsor_id=ss.sponsor_id AND ss.status_id='1' AND ic.entity_type_id='5' AND sdc.sponsor_link_id=sl.id AND ic.entity_id=sdc.sponsor_id AND idb.id=ic.image_db_id AND sdc.sponsor_category_id=sc.id AND sc.category_id= :category AND sdc.sponsor_id = :mediapartner ORDER BY sn.sponsor_name ASC";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->bindValue(':category', $category, \PDO::PARAM_INT);
		$stat->bindValue(':mediapartner', $mp_id['mediapartner_id'], \PDO::PARAM_INT);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($sponsors = $stat->fetch()){
						

					
					$achor = $this->clean_str($sponsors['sponsor_name']);
					
					
						$tempId = 'id="'.$achor.'Sponsor"';
						$tempIdTwo = 'id="'.$achor.'SponsorBox"';
					
	
	
	/*	
	//Old one
				
	     $content .='<div class="SponsorLogoContainer">
            <a href="#'.$achor.'" class="SponsorGridAnchor" data-sponsornametag="'.$achor.'" title="'.$sponsors['sponsor_name'].'"><div class="SponsorLogo" id="'.$tempId.'" style="background-image: url(img/sponsors/logos/'.$sponsors['image_url'].');"></div></a>
        </div>';
	*/
	
 

			 $content .=' <!-- '.$sponsors['sponsor_name'].' -->
            <a '.$anal_code('PressPage','ExternalForward', 'SponsorWebsite - '.$achor).' href="'.$sponsors['sponsor_link_url'].'" target="_blank" class="SponsorGridAnchor" data-sponsornametag="'.$achor.'" data-sponsornum="'.$sponsors['sponsor_id'].'"><div class="Sponsor" '.$tempId.' data-sponsornum="'.$sponsors['sponsor_id'].'">
                <div '.$tempIdTwo.' class="SponsorLogoContainer">
				   <img class="MediapartnerHoverPlus" src="img/press/Mediapartners/sponsor-hover-plus-icon.png" alt="+">
			 	    <img data-img="'.$sponsors['image_url'].'" class="SponsorLogo" src="img/press/Mediapartners/logos/'.$sponsors['image_url'].'" alt="'.$sponsors['sponsor_name'].'">
					 
				</div>
               
            </div>
            </a>
            <!-- END '.$sponsors['sponsor_name'].' --> ';	
			

					} //stat_q fetch
			}  //stat num row end
			
			
				}//order fetch
				
			}//order num rows
		return $content;
}



}
?>	