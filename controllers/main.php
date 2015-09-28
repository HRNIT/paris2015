<?php 
namespace HRNParis\main;
use HRNParis\config as config;
use Drewm as mailchimp;
include_once('config.php');	
	
class main extends config {
	 


public function speakers() {
	$content = "";
	
		   $mainpage_q = "SELECT sm.speaker_id FROM speakers_mainpage as sm, speakers_mainpage_order as smo WHERE smo.speaker_id=sm.speaker_id ORDER BY smo.order_id ASC";	
					  
		  $mainpage = $this->pdo->prepare($mainpage_q);
		  $mainpage->execute();
		  
			if ($mainpage->rowCount() > 0) {	
				while($main_id = $mainpage->fetch()){ 
	
	
			                    //Name                 Bio         Category              website         image       image alt       speaker_id
		$speaker_q = "SELECT sn.speaker_name, sb.speaker_bio, st.title, scn.company_name, idb.image_url, idb.alt_name, sdc.speaker_id, sdc.speaker_company_id, stag.speaker_tag FROM speakers_name as sn, speakers_bio as sb, speakers_data_connection as sdc, speakers_status as ss, speakers_title as st, speakers_company_name as scn, speakers_company_data_connection as scdc, image_db as idb, image_connection as ic, speakers_tag as stag WHERE sdc.speaker_name_id=sn.id AND sdc.speaker_bio_id=sb.id AND sdc.speaker_id=ss.speaker_id AND ss.speaker_status_id='1' AND ic.entity_type_id='1' AND ic.entity_id=sdc.speaker_id AND idb.id=ic.image_db_id AND sdc.speaker_company_id=scdc.speaker_company_id AND scdc.speaker_company_name_id=scn.id AND sdc.speaker_title_id=st.id AND stag.id=sdc.speaker_tag_id AND sdc.speaker_id = :id";	
		
		//company websited and company logo need to be separate
					
		$speaker = $this->pdo->prepare($speaker_q);
		$speaker->bindValue(':id', $main_id[0], \PDO::PARAM_INT);
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
						  
						  
											//Mainpage bio
					$mpbio_q = "SELECT text FROM speakers_mainpage_bio WHERE speaker_id = :id";	
			
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
								


      $content .='<li id="Speakers'.$data['speaker_tag'].'">
        <div class="SpeakersImageContainer">
			  <div class="SpeakerOverlay">
	            <h3 class="FontRaleway">'.$data['speaker_name'].'</h3>
		        <h4 class="FontRaleway">'.$data['company_name'].'</h4>
	         </div>
	   <img class="Square" alt="'.$data['speaker_name'].'" src="img/speakers/SpeakerPhotos/'.$data['image_url'].'" title="'; 
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
	
	
	
}
 


public function press($type) {
	if (isset($type) && $type != ''){
	        if ($type == 1) {
				$entity = 'blogsquad';
				$entity_id = 6;
				$entity_company_id = 8;
				$location = "BlogSquad";
			} else {
			  	$entity = 'analytics';
				$entity_id = 7;
				$entity_company_id = 9;
				$location = "Analytics";
			}
			
		$anal_code = function($location, $type, $title){
		$out = "onClick='_gaq.push([";
		
		$out .='"_trackEvent", "'.$location."', '".$type."', '".$title."']);";
		
		$out .="'";
		
		return $out;
	};		
	
	$content = "";
	
		   $mainpage_q = "SELECT sm.speaker_id FROM ".$entity."_mainpage as sm, ".$entity."_mainpage_order as smo WHERE smo.speaker_id=sm.speaker_id ORDER BY smo.order_id ASC";	
					  
		  $mainpage = $this->pdo->prepare($mainpage_q);
		  $mainpage->execute();
		  
			if ($mainpage->rowCount() > 0) {	
				while($main_id = $mainpage->fetch()){ 
	
	
			                    //Name                 Bio         Category              website         image       image alt       speaker_id
		$speaker_q = "SELECT sn.speaker_name, st.title, idb.image_url, idb.alt_name, sdc.speaker_id, stag.speaker_tag FROM ".$entity."_name as sn, ".$entity."_data_connection as sdc, ".$entity."_status as ss, ".$entity."_title as st, ".$entity."_image_db as idb, ".$entity."_image_connection as ic, ".$entity."_tag as stag WHERE sdc.speaker_name_id=sn.id AND sdc.speaker_id=ss.speaker_id AND ss.speaker_status_id='1' AND ic.entity_type_id='6' AND ic.entity_id=sdc.speaker_id AND idb.id=ic.image_db_id AND sdc.speaker_title_id=st.id AND stag.id=sdc.speaker_tag_id AND sdc.speaker_id = :id";	
		
		//company websited and company logo need to be separate
					
		$speaker = $this->pdo->prepare($speaker_q);
		$speaker->bindValue(':id', $main_id[0], \PDO::PARAM_INT);
		$speaker->execute();

			if ($speaker->rowCount() > 0) {
					while ($data = $speaker->fetch()) {
	
						$company_q = "SELECT sdc.speaker_company_id, scn.company_name  FROM ".$entity."_company_name as scn, ".$entity."_company_data_connection as scdc, ".$entity."_data_connection as sdc WHERE sdc.speaker_company_id=scdc.speaker_company_id AND scdc.speaker_company_name_id=scn.id AND sdc.speaker_id = :id";	
			
					$company = $this->pdo->prepare($company_q);
					$company->bindValue(':id', $data['speaker_id'], \PDO::PARAM_INT);
					$company->execute();
			
						if ($company->rowCount() > 0) {
								$spcompany = $company->fetch();
								$data['company_name'] = $spcompany['company_name'];
								$data['speaker_company_id'] = $spcompany['speaker_company_id'];
								
						} else {
							 		$data['company_name'] = '';
									$data['speaker_company_id'] = '';
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
                     								
                 if (!isset($Socials[2]) || $Socials[2] === ''){
					 $hiddener = "style='display:none'"; 
				 } else {
					 $hiddener = '';
				 }

      $content .='<li id="Speakers'.$data['speaker_tag'].'">
        <div class="SpeakersImageContainer">
			  <div class="SpeakerOverlay">
	            <h3 class="FontRaleway">'.$data['speaker_name'].'</h3>
		        <h4 class="FontRaleway">'.$data['title'].'</h4>
				<h4 class="FontRaleway">'.$data['company_name'].'</h4>
	         </div>
	   <img class="Square" alt="'.$data['speaker_name'].'" src="img/press/'.$location.'/Photos/'.$data['image_url'].'" title="'; 
		$content .= "<a href='".$CompanyWebsite['company_website']."' target=".'_blank'."><h3 class='SpeakerName'>".$data['speaker_name']."</h3><p class='SpeakerJobTitle'>".$data['title']."</p> <p class='SpeakerCompany'>".$data['company_name']."</p><p class='SpeakerInfo'>".$mpbio_text[0]."</p><p class='SpeakerHoverLinks'></p></a><p class='SpeakerHoverLinks'><a title='".$Socials[1]."' target='_blank' href='".$Socials[1]."'><i class='fa fa-twitter TwitterColor'></i></a><a ".$hiddener." title='".$data['speaker_name']." Linkedin Profile' target='_blank' href='".$Socials[2]."'><i class='fa fa-linkedin TwitterColor'></i></a></p>";
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

public function save_booking($name, $company, $email, $phone, $type, $number) {
			   $booking_q = "INSERT INTO booking_data SET name = :name, company = :company, email = :email, phone = :phone, type = :type, number = :number";
			   $booking = $this->pdo->prepare($booking_q);
			   
			   $booking->bindValue(':name', $name, \PDO::PARAM_STR);
			   $booking->bindValue(':company', $company, \PDO::PARAM_STR);
			   $booking->bindValue(':email', $email, \PDO::PARAM_STR);
			   $booking->bindValue(':phone', $phone, \PDO::PARAM_STR);
			   $booking->bindValue(':type', $type, \PDO::PARAM_STR);
			   $booking->bindValue(':number', $number, \PDO::PARAM_INT);
			   $booking->execute();
	
	
}

public function marketing_email($name, $company, $email, $phone, $type, $number) {
	
	$sanitize = function ($data){
       //$data = htmlentities(strip_tags(trim($data)));
		
		$bad = array("content-type","bcc:","to:","cc:","href","$","SELECT","<",">",";","INSERT INTO","UPDATE","DELETE");
		
		$data = str_replace($bad,"",$data);
		
        $search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript
                   '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
                   '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
                   '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including CDATA
    ); 
    $data = preg_replace($search, '', $data); 
        return $data;
    };
	
	
	
	 $email_to = "test@worldhrtech.com";
 
     $email_subject = "Partner Program";
	

	
	
	$email_message = "Form details below.\n\n";
	
	
	$email_message .= "Name: ".$sanitize(utf8_decode($name))."\n";
	
    $email_message .= "Company: ".$sanitize($company)."\n";
 
    $email_message .= "Email: ".$sanitize($email)."\n";
 
    $email_message .= "Telephone: ".$sanitize($phone)."\n";
 
    $email_message .= "Program: ".$sanitize(utf8_decode($type))."\n";
	
	$email_message .= "Guest Number: ".$sanitize($number)."\n";
	
  $from_mail = 'form';
  
  $headers = 'From: '.$from_mail."\r\n".
 
'Reply-To: '.$email."\r\n" .
 
'X-Mailer: PHP/';
 
//@mail($email_to, $email_subject, $email_message, $headers);
	include_once('vendor/drewm/mailchimp-api/src/Drewm/MailChimp.php');
	
$MailChimp = new \Drewm\MailChimp('79cc34986146d7dcdc34345a9f907ca0-us4');
$result = $MailChimp->call('lists/subscribe', array(
                'id'                => 'fd9e2ebe08',
                'email'             => array('email'=>$sanitize($email)),
                'merge_vars'        => array('NAME'=>$sanitize(utf8_decode($name)), 'COMPANY'=>$sanitize($company), 'PHONE'=>$sanitize($phone), 'PROGRAM'=>$sanitize(utf8_decode($type)), 'DELEGATES'=>$sanitize($number)),
                'double_optin'      => false,
                'update_existing'   => true,
                'replace_interests' => false,
                'send_welcome'      => false,
            ));
	
}


public function press_email($first_name,$last_name ,$company, $email, $phone, $title) {
	
	$sanitize = function ($data){
       //$data = htmlentities(strip_tags(trim($data)));
		
		$bad = array("content-type","bcc:","to:","cc:","href","$","SELECT","<",">",";","INSERT INTO","UPDATE","DELETE");
		
		$data = str_replace($bad,"",$data);
		
        $search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript
                   '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
                   '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
                   '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including CDATA
    ); 
    $data = preg_replace($search, '', $data); 
        return $data;
    };
	
	
	

	include_once('vendor/drewm/mailchimp-api/src/Drewm/MailChimp.php');
	
$MailChimp = new \Drewm\MailChimp('79cc34986146d7dcdc34345a9f907ca0-us4');
$result = $MailChimp->call('lists/subscribe', array(
                'id'                => '04cb5d4836',
                'email'             => array('email'=>$sanitize($email)),
                'merge_vars'        => array('FNAME'=>$sanitize(utf8_decode($first_name)), 'LNAME'=>$sanitize(utf8_decode($last_name)), 'COMPANY'=>$sanitize($company), 'PHONE'=>$sanitize($phone), 'TITLE'=>$sanitize(utf8_decode($title))),
                'double_optin'      => false,
                'update_existing'   => true,
                'replace_interests' => false,
                'send_welcome'      => false,
            ));
	
}

}
?>	