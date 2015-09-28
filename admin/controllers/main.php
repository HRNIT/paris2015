<?php 
namespace HRNParis\main;
use HRNParis\config as config;
include_once('config.php');	
if(!isset($_SESSION)) {
	$lifetime=3600;
    session_set_cookie_params($lifetime);
	session_start();
}

class main extends config {

	 //strip strings from special characters
 public function clean_str($string) {

    $specialis_karekterek = array('Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ő'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ű'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ő'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ű'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f');
    $string = strtolower(strtr($string, $specialis_karekterek));
    $string = preg_replace("/[^a-z0-9-_\.]/i", '_', trim($string));
    if (strlen($string) == 0 || $string == '.' || $string == '..') {
    	$string = 'Invalid name';
    }
    return $string;
}

 public function clean_str2($string) {

    $specialis_karekterek = array('Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ő'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ű'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ő'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ű'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f');
    $string = strtolower(strtr($string, $specialis_karekterek));
	$string = ucwords($string);
    $string = preg_replace("/[^a-z0-9-_\.]/i", '', trim($string));
	$string = ucwords($string);
    if (strlen($string) == 0 || $string == '.' || $string == '..') {
    	$string = 'NoLinkYet';
    }
    return $string;
}


	 //strip strings from special characters
 public function clean_tag($string) {

    $specialis_karekterek = array('Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ő'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ű'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ő'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ű'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f');
    $string = strtr($string, $specialis_karekterek);
    $string = preg_replace("/[^a-z0-9-_\.]/i", '', trim($string));
    if (strlen($string) == 0 || $string == '.' || $string == '..') {
    	$string = 'Invalid name';
    }
    return $string;
}

/*****************
File upload
******************/


function file_upload($location, $name){
	
	  $storage = new \Upload\Storage\FileSystem($this->basedir.'img/'.$location, true);
	  $file = new \Upload\File('file', $storage);
	  
	  // Optionally you can rename the file on upload
	  $new_filename = $this->clean_str($name);
	  $file->setName($new_filename);
	  
	  // Validate file upload
	  // MimeType List => http://www.webmaster-toolkit.com/mime-types.shtml
	  $file->addValidations(array(
		  // Ensure file is of type "image/png"
		  new \Upload\Validation\Mimetype(array('image/png', 'image/bmp', 'image/jpeg', 'image/pjpeg', 'image/gif')),
	  
		  //You can also add multi mimetype validation
		  //new \Upload\Validation\Mimetype(array('image/png', 'image/gif'))
	  
		  // Ensure file is no larger than 5M (use "B", "K", M", or "G")
		  new \Upload\Validation\Size('15M')
	  ));
	  
	  // Access data about the file that has been uploaded
	  $data = array(
		  'name'       => $file->getNameWithExtension(),
		  'extension'  => $file->getExtension(),
		  'mime'       => $file->getMimetype(),
		  'size'       => $file->getSize(),
		  'md5'        => $file->getMd5(),
		  'dimensions' => $file->getDimensions()
	  );
	  
	  // Try to upload file
	  try {
		  // Success!
		  $file->upload();
		  
		  return $data;
		  
	  } catch (\Exception $e) {
		  // Fail!
		  $errors = $file->getErrors();

			 $contex[0] = $e->getFile();
			 $contex[1] = $e->getLine();
		  $this->log->addError($e->getMessage(), $contex);
	  }
	
}

public function pic_upload($entity_type, $entity_id, $file, $alt) {
	
								//upload the new image
				 $new_pic_q = "INSERT INTO image_db SET image_url = :url, alt_name = :alt";
				 $new_pic = $this->pdo->prepare($new_pic_q);
				 
				 $new_pic->bindValue(':url', $file, \PDO::PARAM_STR);
				 $new_pic->bindValue(':alt', $alt, \PDO::PARAM_STR);
				 
				 $new_pic->execute();
				 
					$new_pic_id = $this->pdo->lastInsertId(); 	
	
	
		 $picture_q = "SELECT image_db_id FROM image_connection WHERE entity_type_id = :type AND entity_id = :id";
		 $picture = $this->pdo->prepare($picture_q);
		 $picture->bindValue(':type', $entity_type, \PDO::PARAM_INT);
		 $picture->bindValue(':id', $entity_id, \PDO::PARAM_INT);
		 $picture->execute();
		 
				if ($picture->rowCount() > 0) {
					$current_pic = $picture->fetch();
					
					
					//updata the current connection
					 $new_pic_q = "UPDATE image_connection SET image_db_id = :image WHERE entity_type_id = :type AND entity_id = :id";
					 $new_pic = $this->pdo->prepare($new_pic_q);
					 
					 $new_pic->bindValue(':image', $new_pic_id, \PDO::PARAM_INT);
					 $new_pic->bindValue(':type', $entity_type, \PDO::PARAM_INT);
					 $new_pic->bindValue(':id', $entity_id, \PDO::PARAM_INT);
					 
					 $new_pic->execute();

					
				} else {
						//upload a new connection
						 $new_pic_q = "INSERT INTO image_connection SET image_db_id = :image, entity_type_id = :type, entity_id = :id";
						 $new_pic = $this->pdo->prepare($new_pic_q);
						 
						 $new_pic->bindValue(':image', $new_pic_id, \PDO::PARAM_INT);
						 $new_pic->bindValue(':type', $entity_type, \PDO::PARAM_INT);
						 $new_pic->bindValue(':id', $entity_id, \PDO::PARAM_INT);
						 
						 $new_pic->execute();
						 	
					
				}
	

	
}

public function press_pic_upload($entity_type, $entity_id, $file, $alt) {
	if ($entity_type == 6) {
	$entity = 'blogsquad';
	}
	if ($entity_type == 7) {
	$entity = 'analytics';
	}
								//upload the new image
				 $new_pic_q = "INSERT INTO ".$entity."_image_db SET image_url = :url, alt_name = :alt";
				 $new_pic = $this->pdo->prepare($new_pic_q);
				 
				 $new_pic->bindValue(':url', $file, \PDO::PARAM_STR);
				 $new_pic->bindValue(':alt', $alt, \PDO::PARAM_STR);
				 
				 $new_pic->execute();
				 
					$new_pic_id = $this->pdo->lastInsertId(); 	
	
	
		 $picture_q = "SELECT image_db_id FROM ".$entity."_image_connection WHERE entity_type_id = :type AND entity_id = :id";
		 $picture = $this->pdo->prepare($picture_q);
		 $picture->bindValue(':type', $entity_type, \PDO::PARAM_INT);
		 $picture->bindValue(':id', $entity_id, \PDO::PARAM_INT);
		 $picture->execute();
		 
				if ($picture->rowCount() > 0) {
					$current_pic = $picture->fetch();
					
					
					//updata the current connection
					 $new_pic_q = "UPDATE ".$entity."_image_connection SET image_db_id = :image WHERE entity_type_id = :type AND entity_id = :id";
					 $new_pic = $this->pdo->prepare($new_pic_q);
					 
					 $new_pic->bindValue(':image', $new_pic_id, \PDO::PARAM_INT);
					 $new_pic->bindValue(':type', $entity_type, \PDO::PARAM_INT);
					 $new_pic->bindValue(':id', $entity_id, \PDO::PARAM_INT);
					 
					 $new_pic->execute();

					
				} else {
						//upload a new connection
						 $new_pic_q = "INSERT INTO ".$entity."_image_connection SET image_db_id = :image, entity_type_id = :type, entity_id = :id";
						 $new_pic = $this->pdo->prepare($new_pic_q);
						 
						 $new_pic->bindValue(':image', $new_pic_id, \PDO::PARAM_INT);
						 $new_pic->bindValue(':type', $entity_type, \PDO::PARAM_INT);
						 $new_pic->bindValue(':id', $entity_id, \PDO::PARAM_INT);
						 
						 $new_pic->execute();
						 	
					
				}
	

	
}

public function pic_upload_agenda($entity_id, $file, $alt) {
	
	
		 $picture_q = "SELECT id FROM agenda_sponsor_logos WHERE sponsor_id = :id";
		 $picture = $this->pdo->prepare($picture_q);
		 $picture->bindValue(':id', $entity_id, \PDO::PARAM_INT);
		 $picture->execute();
		 
				if ($picture->rowCount() > 0) {
					$current_pic = $picture->fetch();
					
					
					//updata the current connection
					 $new_pic_q = "UPDATE agenda_sponsor_logos SET image_url = :image WHERE id = :id";
					 $new_pic = $this->pdo->prepare($new_pic_q);
					 
					 $new_pic->bindValue(':image', $file, \PDO::PARAM_STR);
					 $new_pic->bindValue(':id', $current_pic['id'], \PDO::PARAM_INT);
					 
					 $new_pic->execute();

					
				} else {
						//upload a new connection
						 $new_pic_q = "INSERT INTO agenda_sponsor_logos SET image_url = :image, sponsor_id = :id";
						 $new_pic = $this->pdo->prepare($new_pic_q);
						 
						 $new_pic->bindValue(':image', $file, \PDO::PARAM_INT);
						 $new_pic->bindValue(':id', $entity_id, \PDO::PARAM_INT);
						 
						 $new_pic->execute();
						 	
					
				}
	

	
}

/**************
Sponsors
***************/

public function save_sponsor() {


	$date = date("j F Y");
	   try {
	      $this->pdo->beginTransaction();
		  
  		  if (isset($_POST['SponsorName'])){
			   //Sponsor
			   $sponsor_q = "INSERT INTO sponsors SET original_name = :name";
			   $sponsor = $this->pdo->prepare($sponsor_q);
			   
			   $sponsor->bindValue(':name', $_POST['SponsorName'], \PDO::PARAM_STR);	
			   
				   
			   $sponsor->execute();
			   $sponsor_id = $this->pdo->lastInsertId(); 
			   
		  } else {
			throw new Exception('Sponsor name is not set in the sponsor upload by:'.$_SESSION['user_id']);  
		  }

           
			

		 //Sponsor Name
		 $name_q = "INSERT INTO sponsors_name SET sponsor_name = :sponsor_name, sponsor_id = :id";
		 $name = $this->pdo->prepare($name_q);
		 
		 $name->bindValue(':sponsor_name', $_POST['SponsorName'], \PDO::PARAM_STR);
		 $name->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
		 $name->execute();

		    $name_id = $this->pdo->lastInsertId();
			
		
		
		if (isset($_POST['SponsorBio'])){	
		
			  //Sponsor Bio	
			   $bio_q = "INSERT INTO sponsors_bio SET sponsor_bio = :bio, sponsor_id = :id";
			   $bio = $this->pdo->prepare($bio_q);
			   
			  
			   $bio->bindValue(':bio', $_POST['SponsorBio'], \PDO::PARAM_STR);
	  
			   $bio->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
			   
			   $bio->execute();
			   
				  $bio_id = $this->pdo->lastInsertId();
			
		  }else {
			throw new Exception('Sponsor Bio is not set in the sponsor upload by:'.$_SESSION['user_id']);  
		  }
		  
		if (isset($_POST['SponsorURL'])){	
		
		        if (strpos($_POST['SponsorURL'], 'http') === FALSE && $_POST['SponsorURL'] != '') {
					$url = 'http://'.$_POST['SponsorURL'];
				} else {
					$url = $_POST['SponsorURL'];
				}
			
				//Sponsor URL	
				 $link_q = "INSERT INTO sponsors_links SET sponsor_link_url = :url, sponsor_id = :id";
				 $link = $this->pdo->prepare($link_q);
				 
				 $link->bindValue(':url', $url, \PDO::PARAM_STR);
				 $link->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
				 
				 $link->execute();
				 
					$link_id = $this->pdo->lastInsertId();
		
		  }else {
			throw new Exception('Sponsor URL is not set in the sponsor upload by:'.$_SESSION['user_id']);  
		  }
		  
		 
		 
		 if (isset($_POST['Category'])){	
		  
						//Sponsor Category
				 $category_q = "INSERT INTO sponsors_category SET category_id = :category, sponsor_id = :id";
				 $category = $this->pdo->prepare($category_q);
				 
				 $category->bindValue(':category', $_POST['Category'], \PDO::PARAM_INT);
				 $category->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
				 
				 $category->execute();
				 
					$category_id = $this->pdo->lastInsertId(); 	
			
			
		 }else {
			throw new Exception('Sponsor Category is not set in the sponsor upload by:'.$_SESSION['user_id']);  
		  }
		  	
			
			
			//AlaCarte
		 if (isset($_POST['AlaCarte']) && $_POST['AlaCarte'] == 1){	
	  
					//Sponsor alacarte
			 $alacarte_q = "INSERT INTO sponsors_alacarte SET sponsor_id = :id";
			 $alacarte = $this->pdo->prepare($alacarte_q);
			 
			 $alacarte->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
			 
			 $alacarte->execute();
			 
			$alacarte_id = $this->pdo->lastInsertId(); 	
			
			
			 if (isset($_POST['AlaCarteText']) && $_POST['AlaCarteText'] != ''){
				 	
										  //Sponsor alacarte text
					   $alacarte_text_q = "INSERT INTO sponsors_alacarte_text SET sponsors_alacarte_id = :id, text = :text";
					   $alacarte_text = $this->pdo->prepare($alacarte_text_q);
					   
					   $alacarte_text->bindValue(':id', $alacarte_id, \PDO::PARAM_INT);
					   $alacarte_text->bindValue(':text', $_POST['AlaCarteText'], \PDO::PARAM_STR);
					   
					   $alacarte_text->execute();
					   
					
			 
			 }
			
			
			
			
		 }
			
			
			
			
				//Sponsor Status
		 $status_q = "INSERT INTO sponsors_status SET status_id = '1', sponsor_id = :id";
		 $status = $this->pdo->prepare($status_q);

		 $status->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
		 
		 $status->execute();
		 
		 
		 				//Sponsor edit permission
	             $this->sponsor_permission_add($sponsor_id, $_SESSION['user_id']);
		 
		 		
			 if (isset($sponsor_id) && isset($bio_id) && isset($name_id) && isset($category_id) && isset($link_id)){	
		 
				 //Sponsor date connection
				 $connection_q = "INSERT INTO sponsors_data_connection SET sponsor_id = :id, sponsor_bio_id = :bio, sponsor_name_id = :name, sponsor_category_id = :category, sponsor_link_id = :link";
				 $connection = $this->pdo->prepare($connection_q);
				 
				 $connection->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
				 $connection->bindValue(':bio', $bio_id, \PDO::PARAM_INT);
				 $connection->bindValue(':name', $name_id, \PDO::PARAM_INT);
				 $connection->bindValue(':category', $category_id, \PDO::PARAM_INT);
				 $connection->bindValue(':link', $link_id, \PDO::PARAM_INT);
				 
				 $connection->execute();
				 
					$connection_id = $this->pdo->lastInsertId();

		 }else {
			throw new Exception('Something is not set in the sponsor upload connection query by:'.$_SESSION['user_id']);  
		  }

		 
		 $this->pdo->commit();
		 
		 if (isset($connection_id)){
			 
			 //upload the logo if the database queries are done
			 $file_info = $this->file_upload('sponsors/logos/', $_POST['SponsorName']);
			 
			 //upload the name of the file to the database
			 $this->pic_upload(2, $sponsor_id, $file_info['name'], $_POST['SponsorName'].' Logo');
			 
			 //And now the social links:
			 if(isset($_POST['Facebook']) && $_POST['Facebook'] != ''){
				 $this->social_link_upload(2, $sponsor_id, 1, $_POST['Facebook']);
			 }

			 if(isset($_POST['Twitter']) && $_POST['Twitter'] != ''){
				 $this->social_link_upload(2, $sponsor_id, 2, $_POST['Twitter']);
			 }
			 
			 if(isset($_POST['Linkedin']) && $_POST['Linkedin'] != ''){
				 $this->social_link_upload(2, $sponsor_id, 3, $_POST['Linkedin']);
			 }
			 
			 if(isset($_POST['Flickr']) && $_POST['Flickr'] != ''){
				 $this->social_link_upload(2, $sponsor_id, 4, $_POST['Flickr']);
			 }
			     
			 if(isset($_POST['Google']) && $_POST['Google'] != ''){
				 $this->social_link_upload(2, $sponsor_id, 5, $_POST['Google']);
			 } 
			 
			 
			 
			  return $connection_id;
			
		 } else {
			throw new Exception('Sponsors_data_connection is not uploaded, by:'.$_SESSION['user_id']);   
		 }
		 
		 
		 
		 } catch (\PDOException $e) {
			 $contex[0] = $e->getFile();
			 $contex[1] = $e->getLine();
			 
		   $this->log->addError($e->getMessage(), $contex);
	          }
			  
			  
		 catch (\Exception $e) {
			 $contex[0] = $e->getFile();
			 $contex[1] = $e->getLine();
		   $this->log->addError($e->getMessage(), $contex);
	          }

	
}

public function edit_sponsor() {

    $sponsor_id = $_POST['sId'];
	
	$date = date("j F Y");
	   try {
          if($_POST['edit_type'] == 'NameEdit'){
			   //Sponsor Name
			   $name_q = "INSERT INTO sponsors_name SET sponsor_name = :sponsor_name, sponsor_id = :id";
			   $name = $this->pdo->prepare($name_q);
			   
			   $name->bindValue(':sponsor_name', $_POST['new_data'], \PDO::PARAM_STR);
			   $name->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
			   $name->execute();
	  
				  $name_id = $this->pdo->lastInsertId();
		 }
		
		
		if ($_POST['edit_type'] == 'BioEdit'){	
		
			  //Sponsor Bio	
			   $bio_q = "INSERT INTO sponsors_bio SET sponsor_bio = :bio, sponsor_id = :id";
			   $bio = $this->pdo->prepare($bio_q);
			   
			  
			   $bio->bindValue(':bio', $_POST['body'], \PDO::PARAM_STR);
	  
			   $bio->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
			   
			   $bio->execute();
			   
				  $bio_id = $this->pdo->lastInsertId();
			
		  }
		  
		  
		  		if ($_POST['edit_type'] == 'CarteTextEdit'){
					
									 						//Get Sponsor Category id
				 $alacartetext_q = "SELECT saat.id FROM sponsors_alacarte_text as saat, sponsors_alacarte as sa WHERE sa.sponsor_id = :id AND sa.id=saat.sponsors_alacarte_id LIMIT 0,1";
				 $alacartetext = $this->pdo->prepare($alacartetext_q);
				 
				 $alacartetext->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
				 
				 $alacartetext->execute();
				 
				 if ($alacartetext->rowCount() > 0) {
                     		while($sName = $alacartetext->fetch()){
								  //Sponsor Bio	
						   $alacartetext_update_q = "UPDATE sponsors_alacarte_text SET text = :text WHERE id = :id";
						   $alacartetext_update = $this->pdo->prepare($alacartetext_update_q);
						   
						  
						   $alacartetext_update->bindValue(':text', $_POST['new_data'], \PDO::PARAM_STR);
				  
						   $alacartetext_update->bindValue(':id', $sName['id'], \PDO::PARAM_INT);
						   
						   $alacartetext_update->execute();
						   
							  
									  
									 
					   }
				 }
						
		

			
		  }
		  
		  
		if ($_POST['edit_type'] == 'LinkEdit'){	
		      if (strpos($_POST['new_data'], 'http') === FALSE && $_POST['new_data'] != '') {
					$url = 'http://'.$_POST['new_data'];
				} else {
					$url = $_POST['new_data'];
				}
			
				//Sponsor URL	
				 $link_q = "INSERT INTO sponsors_links SET sponsor_link_url = :url, sponsor_id = :id";
				 $link = $this->pdo->prepare($link_q);
				 
				 $link->bindValue(':url', $url, \PDO::PARAM_STR);
				 $link->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
				 
				 $link->execute();
				 
					$link_id = $this->pdo->lastInsertId();
		
		  }
		  
		 
		 
		 if ($_POST['edit_type'] == 'CategoryEdit'){	
		  
						//Sponsor Category
				 $category_q = "UPDATE sponsors_category SET category_id = :category WHERE sponsor_id = :id";
				 $category = $this->pdo->prepare($category_q);
				 
				 $category->bindValue(':category', $_POST['new_data'], \PDO::PARAM_INT);
				 $category->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
				 
				 $category->execute();
				 
				 						//Get Sponsor Category id
				 $category_q = "SELECT id FROM sponsors_category WHERE sponsor_id = :id";
				 $category = $this->pdo->prepare($category_q);
				 
				 $category->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
				 
				 $category->execute();
				 
				 if ($category->rowCount() > 0) {
					$cat = $category->fetch();
					$category_id = $cat['id'];
				 }
			
			
		 }
		 
		 
		  if ($_POST['edit_type'] == 'StatusEdit'){
			
					  //Sponsor Status
			   $status_q = "UPDATE sponsors_status SET status_id = '0' WHERE sponsor_id = :id";
			   $status = $this->pdo->prepare($status_q);
	  
			   $status->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
			   
			   $status->execute();
		 
		  }
		 		
		if (isset($bio_id) || isset($name_id) || isset($category_id) || isset($link_id)){	
		
		$CurrentPHPTimeStamp = date('Y-m-d G:i:s');
		 
				 //Sponsor date connection
				$connection_q = "UPDATE sponsors_data_connection SET date = :new_date";
				 
				 if (isset($bio_id)) {
					   $connection_q .=", sponsor_bio_id = :bio";
				 }
				 
				 if (isset($name_id)){
					   $connection_q .=", sponsor_name_id = :name";
				 }
				 
				 if (isset($category_id)){
					   $connection_q .=", sponsor_category_id = :category";
				 }
				 
				 if (isset($link_id)){
					   $connection_q .=", sponsor_link_id = :link";
				 }
				 
				 
				$connection_q .= " WHERE sponsor_id = :id";
				
				 $connection = $this->pdo->prepare($connection_q);
				 
				 $connection->bindValue(':new_date', $CurrentPHPTimeStamp, \PDO::PARAM_STR);
				 
				  if (isset($bio_id)) {
				     $connection->bindValue(':bio', $bio_id, \PDO::PARAM_INT);
				  }
				  
				  if (isset($name_id)){
				     $connection->bindValue(':name', $name_id, \PDO::PARAM_INT);
				  }
				  
				  if (isset($category_id)){
				     $connection->bindValue(':category', $category_id, \PDO::PARAM_INT);
				  }
				  
				  if (isset($link_id)){
				     $connection->bindValue(':link', $link_id, \PDO::PARAM_INT);
				  }
				 
				 $connection->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
				 
				 $connection->execute();
				 
					$connection_id = $sponsor_id;

		  }
		 
		 if (isset($connection_id)){
			 
			 
			  return $connection_id;
			
		 } else {
			throw new Exception('Sponsors_data_connection is not uploaded, by:'.$_SESSION['user_id']);   
		 }
		 
		 
		 
		 } catch (\PDOException $e) {
			 $contex[0] = $e->getFile();
			 $contex[1] = $e->getLine();
		   $this->log->addError($e->getMessage(), $contex);
	          }
			  
			  
		 catch (\Exception $e) {
			 $contex[0] = $e->getFile();
			 $contex[1] = $e->getLine();
		   $this->log->addError($e->getMessage(), $contex);
	          }

	
}

public function alacarte_for_sponsor($sId, $value) {
	
						//Sponsor alacarte
			 $alacarte_q = "INSERT INTO sponsors_alacarte SET sponsor_id = :id";
			 $alacarte = $this->pdo->prepare($alacarte_q);
			 
			 $alacarte->bindValue(':id', $sId, \PDO::PARAM_INT);
			 
			 $alacarte->execute();
			 
			$alacarte_id = $this->pdo->lastInsertId(); 	
			
			
			 if (isset($value) && $value != ''){
				 	
										  //Sponsor alacarte text
					   $alacarte_text_q = "INSERT INTO sponsors_alacarte_text SET sponsors_alacarte_id = :id, text = :text";
					   $alacarte_text = $this->pdo->prepare($alacarte_text_q);
					   
					   $alacarte_text->bindValue(':id', $alacarte_id, \PDO::PARAM_INT);
					   $alacarte_text->bindValue(':text', $value, \PDO::PARAM_STR);
					   
					   $alacarte_text->execute();
					   
					
			 
			 }
	
	
	
}

public function edit_alacarte($sId, $value) {
	
			
			
			 if (isset($value) && $value != ''){
				 	
										  //Sponsor alacarte text
					   $alacarte_text_q = "UPDATE sponsors_alacarte_text SET text = :text WHERE sponsors_alacarte_id = :id";
					   $alacarte_text = $this->pdo->prepare($alacarte_text_q);
					   
					   
					   $alacarte_text->bindValue(':text', $value, \PDO::PARAM_STR);
					   $alacarte_text->bindValue(':id', $sId, \PDO::PARAM_INT);
					   
					   $alacarte_text->execute();
					   
					
			 
			 }
	
	
	
}



public function delete_alacarte($sId) {
	
			 $tag_q = "SELECT id FROM sponsors_alacarte_text WHERE sponsors_alacarte_id = :id  ORDER BY date DESC LIMIT 0,1";
			 $tag = $this->pdo->prepare($tag_q);
			 
			 $tag->bindValue(':id', $sId, \PDO::PARAM_INT);
			
			 
			 $tag->execute();
			 
			 if ($tag->rowCount() > 0) {
			  while($sTags = $tag->fetch()){
				  
			    //Delete alacarte text
				   $delete_q = "DELETE FROM sponsors_alacarte_text WHERE id = :id";
				   $delete = $this->pdo->prepare($delete_q);
				   
				   $delete->bindValue(':id', $sTags['id'], \PDO::PARAM_INT);
				   $delete->execute();

			  }
			  $this->eventlog->addError('admin: '.$_SESSION['user_id'].' , deleted an A La Carte Element');
			 }	
			 
						    //Delete alacarte
				   $delete_q = "DELETE FROM sponsors_alacarte WHERE id = :id";
				   $delete = $this->pdo->prepare($delete_q);
				   
				   $delete->bindValue(':id', $sId, \PDO::PARAM_INT);
				   $delete->execute();
				   
	echo 'Deleted';			    
	
}
public function get_sponsors_permissions($sId) {
		$content = '';
		$content .= '<table>';
						 						//Get Sponsor name
				 $name_q = "SELECT sn.sponsor_name FROM sponsors_name as sn, sponsors_data_connection as sdc WHERE sdc.sponsor_id = :id AND sdc.sponsor_name_id=sn.id";
				 $name = $this->pdo->prepare($name_q);
				 
				 $name->bindValue(':id', $sId, \PDO::PARAM_INT);
				 
				 $name->execute();
				 
				 if ($name->rowCount() > 0) {
					  while($sName = $name->fetch()){
					       $content .= '<h1 data-sponsorid="'.$sId.'" id="SponsorName">'.$sName['sponsor_name'].'</h1>';
				     }
				 }

		
				//Get users
				 $user_q = "SELECT username, id FROM users WHERE rank='11'";
				 $user = $this->pdo->prepare($user_q);
				 
				 $user->bindValue(':id', $sId, \PDO::PARAM_INT);
				 
				 $user->execute();
				 
				 if ($user->rowCount() > 0) {
					  while($data = $user->fetch()){
						  
								//Get permissions
									 $permission_q = "SELECT id FROM sponsors_user_connection WHERE sponsors_id = :sponsor_id AND users_id = :user ORDER BY date DESC LIMIT 0,1";
									 $permission = $this->pdo->prepare($permission_q);
									 
									 $permission->bindValue(':sponsor_id', $sId, \PDO::PARAM_INT);
									 $permission->bindValue(':user', $data['id'], \PDO::PARAM_INT);
									 
									 $permission->execute();
									 
									 if ($permission->rowCount() > 0) {
                                           $checked = 'checked="checked"';   
									 } else {
											$checked = '';   
												}
												
									$content .= '<tr>
									 <td>'.$data['username'].'</td>
									 <td><input class="PermissionCheckbox" type="checkbox" '.$checked.' data-sponsorpermission-user="'.$data['id'].'" /></td>
								   </tr>';
								   												
						//$content .= '<div class="CheckboxDiv"><label>'.$data['username'].' <input type="checkbox" '.$checked.' data-sponsorpermission-user="'.$data['id'].'" /></label></div>';
	
	
						  
						  
						   
				     }
				 }
				 $content .= '</table>';
 $content .= '<div class="PermissionButton PermRemove" data-sponsorid="'.$sId.'">Save</div> ';
		
	return $content;	
}

    //Sponsor  user Permission delete
///----------------------------------------------
function sponsor_permission_delete($sId, $user_id) {
	
							 						//Get Sponsor name
				 $name_q = "SELECT id FROM sponsors_user_connection WHERE sponsors_id = :sponsor AND users_id = :user ORDER BY date DESC LIMIT 0,1";
				 $name = $this->pdo->prepare($name_q);
				 
				 $name->bindValue(':sponsor', $sId, \PDO::PARAM_INT);
				 $name->bindValue(':user', $user_id, \PDO::PARAM_INT);
				 
				 $name->execute();
				 
				 if ($name->rowCount() > 0) {
					  while($data = $name->fetch()){
									//Delete Permission
							   $delete_q = "DELETE FROM sponsors_user_connection WHERE id = :id";
							   $delete = $this->pdo->prepare($delete_q);
							   
							   $delete->bindValue(':id', $data['id'], \PDO::PARAM_INT);
							   $delete->execute();

						   
				     }
				 }
	
	
}


    //Sponsor  user Permission grant
///----------------------------------------------
function sponsor_permission_add($sId, $user_id) {
	
					//Sponsor URL	
				 $link_q = "INSERT INTO sponsors_user_connection SET sponsors_id = :sponsor, users_id = :user";
				 $link = $this->pdo->prepare($link_q);
				 
				 $link->bindValue(':sponsor', $sId, \PDO::PARAM_INT);
				 $link->bindValue(':user', $user_id, \PDO::PARAM_INT);
				 
				 $link->execute();
	
}
	 
function get_sponsors_tags_data($sId){
	$data[0] = '';
	$data[1] = '';
						  //Get data
					   $name_q = "SELECT sn.sponsor_name FROM sponsors_name as sn, sponsors_data_connection as sdc WHERE sdc.sponsor_id = :id AND sdc.sponsor_name_id=sn.id LIMIT 0,1";
					   $name = $this->pdo->prepare($name_q);
					   
					   $name->bindValue(':id', $sId, \PDO::PARAM_INT);
					  
					   
					   $name->execute();
					   
					   if ($name->rowCount() > 0) {
						 $sName = $name->fetch();
					   }
					   
				   $data[0] = $sName['sponsor_name'];
				   
				   
				   						  //Get data
					   $tag_q = "SELECT filter_sub_id FROM sponsors_filter_connection WHERE sponsor_id = :id  ORDER BY date DESC";
					   $tag = $this->pdo->prepare($tag_q);
					   
					   $tag->bindValue(':id', $sId, \PDO::PARAM_INT);
					  
					   
					   $tag->execute();
					   
					   if ($tag->rowCount() > 0) {
						while($sTags = $tag->fetch()){
							
							$data[1].= $sTags['filter_sub_id'].',';
							
							
						}
						
					   }
				   
				   	   
					   
	return $data;
}

function save_sponsor_tags($sId, $tags) {
	$i = 0;
	$delete[0] = 0;
	$upload[0] = 0;
	$d = 0;
	$u = 0;
	$comp[0] = 0;
	
	//if tags is empty, we delete all existing tags
	 if (!isset($tags) || $tags[0] == '' || $tags[0] == "empty"){
										//Get data
			 $tag_q = "SELECT id FROM sponsors_filter_connection WHERE sponsor_id = :id  ORDER BY date DESC";
			 $tag = $this->pdo->prepare($tag_q);
			 
			 $tag->bindValue(':id', $sId, \PDO::PARAM_INT);
			
			 
			 $tag->execute();
			 
			 if ($tag->rowCount() > 0) {
			  while($sTags = $tag->fetch()){
				  
			    //Delete tags
				   $delete_q = "DELETE FROM sponsors_filter_connection WHERE id = :id";
				   $delete = $this->pdo->prepare($delete_q);
				   
				   $delete->bindValue(':id', $sTags['id'], \PDO::PARAM_INT);
				   $delete->execute();

			  }
			  $this->eventlog->addError('admin: '.$_SESSION['user_id'].' , deleted all of the tags from this sponsor: '.$_SESSION['Filter_Edit_SP_Name']);
			 }
		 
		 
		 
	 } else {//not isset tags end
	 
	//if not, we check every one of them and there is no match, we upload the new one, if there's a tag in the db but not in the tags array, we delete that tag
											//Get data
			 $tag_q = "SELECT id, filter_sub_id FROM sponsors_filter_connection WHERE sponsor_id = :id  ORDER BY date DESC";
			 $tag = $this->pdo->prepare($tag_q);
			 
			 $tag->bindValue(':id', $sId, \PDO::PARAM_INT);
			
			 
			 $tag->execute();
			 
			 if ($tag->rowCount() > 0) {
			  while($sTags = $tag->fetch()){
				    //for delete, we need this two dimensional array
				      $data[$i][0] = $sTags['id'];  
                      $data[$i][1] = $sTags['filter_sub_id'];
					  $comp[$i] = $sTags['filter_sub_id'];
					  
					  $i++;
			  }
			  
			 }
			 
			 
  //check if the sponsor have any previous filters
  if (isset($data) && $data[0] != '') {
	  
		  //Get what needs to be deleted  
		 foreach ($data as $vals) {
			  
			  if(in_array($vals[1],$tags)){
				  
			  } else {
				$delete[$d] = $vals[0];
				$dellog[$d] = $vals[1]; 
				$d++; 
			  }
	 
			 
		 } //foreach data ends
		 
		 
       //Get what needs to be uploaded
	     foreach ($tags as $vals) {
			  
			  if(in_array($vals,$comp)){
				  
			  } else {
				$upload[$u] = $vals; 
				$u++; 
			  }
	 
			 
		 } //foreach data ends
	   
	   
	   //Delete the unused tags
	   
	  if (isset($delete) && $delete[0] != '') {
	      $dd = 0;
	    foreach ($delete as $del) {
			 
		   			    //Delete tags
				   $delete_q = "DELETE FROM sponsors_filter_connection WHERE id = :id";
				   $delete = $this->pdo->prepare($delete_q);
				   
				   $delete->bindValue(':id', $del, \PDO::PARAM_INT);
				   $delete->execute();
				  
	       if (isset($dellog[$dd])) {
			 $this->eventlog->addError('admin: '.$_SESSION['user_id'].' , deleted tag: '.$dellog[$dd].' sponsor: '.$_SESSION['Filter_Edit_SP_Name']);
			 $dd++;
		    }//if isset dellog
			
		} //foreach delete
		
	  } //if isset delete
	   
		//upload the new ones 
		
		foreach ($upload as $up) {
						    //Delete tags
				   $insert_q = "INSERT INTO sponsors_filter_connection SET sponsor_id = :id, filter_sub_id = :filter_id";
				   $insert = $this->pdo->prepare($insert_q);
				   
				   $insert->bindValue(':id', $sId, \PDO::PARAM_INT);
				   $insert->bindValue(':filter_id', $up, \PDO::PARAM_INT);
				   $insert->execute();

			
		}

     } else { //check if data have any previous filters 
	 		foreach ($tags as $up) {
						    //Delete tags
				   $insert_q = "INSERT INTO sponsors_filter_connection SET sponsor_id = :id, filter_sub_id = :filter_id";
				   $insert = $this->pdo->prepare($insert_q);
				   
				   $insert->bindValue(':id', $sId, \PDO::PARAM_INT);
				   $insert->bindValue(':filter_id', $up, \PDO::PARAM_INT);
				   $insert->execute();

			
		   } //foreach tags end
	 
	 } //if data have any previous filters else end
   
 } //if tags have elements (else) end
	
	
}



public function sponsor_categories() {
	$content = '';
	

	  $content = '<option value="" hidden="hidden" selected="selected">Select a Category</option>'; 

	 
		 $cat_q = "SELECT id, name FROM sponsor_categories ORDER BY id ASC";
		 $cat = $this->pdo->prepare($cat_q);
		 $cat->execute();
		 
					if ($cat->rowCount() > 0) {
					while($category = $cat->fetch()){
						

                         $content .= '<option value="'.$category['id'].'">'.$category['name'].'</option>';
						 
						
					} //personal fetch assoc end
				}  //personal num rows if end
				
	return $content;	
}


/*************************
Mediapartners
************************/

public function save_mediapartner() {


	$date = date("j F Y");
	   try {
	      $this->pdo->beginTransaction();
		  
  		  if (isset($_POST['SponsorName'])){
			   //Sponsor
			   $sponsor_q = "INSERT INTO mediapartners SET original_name = :name";
			   $sponsor = $this->pdo->prepare($sponsor_q);
			   
			   $sponsor->bindValue(':name', $_POST['SponsorName'], \PDO::PARAM_STR);	
			   
				   
			   $sponsor->execute();
			   $sponsor_id = $this->pdo->lastInsertId(); 
			   
		  } else {
			throw new Exception('Sponsor name is not set in the sponsor upload by:'.$_SESSION['user_id']);  
		  }

           
			

		 //Sponsor Name
		 $name_q = "INSERT INTO mediapartners_name SET sponsor_name = :sponsor_name, sponsor_id = :id";
		 $name = $this->pdo->prepare($name_q);
		 
		 $name->bindValue(':sponsor_name', $_POST['SponsorName'], \PDO::PARAM_STR);
		 $name->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
		 $name->execute();

		    $name_id = $this->pdo->lastInsertId();
			
		
		/*
		if (isset($_POST['SponsorBio'])){	
		
			  //Sponsor Bio	
			   $bio_q = "INSERT INTO mediapartners_bio SET sponsor_bio = :bio, sponsor_id = :id";
			   $bio = $this->pdo->prepare($bio_q);
			   
			  
			   $bio->bindValue(':bio', $_POST['SponsorBio'], \PDO::PARAM_STR);
	  
			   $bio->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
			   
			   $bio->execute();
			   
				  $bio_id = $this->pdo->lastInsertId();
			
		  }
		  
		  */
		  
		  //Currently, there is no bio for Mediapartners
		  $bio_id = 0;
		  
		if (isset($_POST['SponsorURL'])){	
		
		        if (strpos($_POST['SponsorURL'], 'http') === FALSE && $_POST['SponsorURL'] != '') {
					$url = 'http://'.$_POST['SponsorURL'];
				} else {
					$url = $_POST['SponsorURL'];
				}
			
				//Sponsor URL	
				 $link_q = "INSERT INTO mediapartners_links SET sponsor_link_url = :url, sponsor_id = :id";
				 $link = $this->pdo->prepare($link_q);
				 
				 $link->bindValue(':url', $url, \PDO::PARAM_STR);
				 $link->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
				 
				 $link->execute();
				 
					$link_id = $this->pdo->lastInsertId();
		
		  }else {
			throw new Exception('Sponsor URL is not set in the sponsor upload by:'.$_SESSION['user_id']);  
		  }
		  
		 
		 
		 //Currently, there is only one category :)
		$cat = 1;
		  
						//Sponsor Category
				 $category_q = "INSERT INTO mediapartners_category SET category_id = :category, sponsor_id = :id";
				 $category = $this->pdo->prepare($category_q);
				 
				 $category->bindValue(':category', $cat, \PDO::PARAM_INT);
				 $category->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
				 
				 $category->execute();
				 
					$category_id = $this->pdo->lastInsertId(); 	
			
			

			
				//Sponsor Status
		 $status_q = "INSERT INTO mediapartners_status SET status_id = '1', sponsor_id = :id";
		 $status = $this->pdo->prepare($status_q);

		 $status->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
		 
		 $status->execute();
		 
		 
		 				//Sponsor edit permission
	            // $this->sponsor_permission_add($sponsor_id, $_SESSION['user_id']);



		 // ORDER
		 				//speaker Status
		 $order_q = "SELECT COUNT(id) as num FROM mediapartners_order";
		 $order = $this->pdo->prepare($order_q);
		 
		 $order->execute();
		 
		 if ($order->rowCount() > 0) {
			 $order_num = $order->fetch();
			 $num = (int)$order_num[0];
			 $num++;
									//speaker order
				 $ordernew_q = "INSERT INTO mediapartners_order SET order_id = :order, mediapartner_id = :id";
				 $ordernew = $this->pdo->prepare($ordernew_q);
		
				 $ordernew->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
				 $ordernew->bindValue(':order', $num, \PDO::PARAM_INT);
				 
				 $ordernew->execute();
			 
			 
		 }
		 
		 
		 		
			 if (isset($sponsor_id) && isset($name_id) && isset($category_id) && isset($link_id)){	
		 
				 //Sponsor date connection
				 $connection_q = "INSERT INTO mediapartners_data_connection SET sponsor_id = :id, sponsor_bio_id = :bio, sponsor_name_id = :name, sponsor_category_id = :category, sponsor_link_id = :link";
				 $connection = $this->pdo->prepare($connection_q);
				 
				 $connection->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
				 $connection->bindValue(':bio', $bio_id, \PDO::PARAM_INT);
				 $connection->bindValue(':name', $name_id, \PDO::PARAM_INT);
				 $connection->bindValue(':category', $category_id, \PDO::PARAM_INT);
				 $connection->bindValue(':link', $link_id, \PDO::PARAM_INT);
				 
				 $connection->execute();
				 
					$connection_id = $this->pdo->lastInsertId();

		 }else {
			throw new Exception('Something is not set in the sponsor upload connection query by:'.$_SESSION['user_id']);  
		  }

		 
		 $this->pdo->commit();
		 
		 if (isset($connection_id)){
			 
			 //upload the logo if the database queries are done
			 $file_info = $this->file_upload('press/Mediapartners/logos/', $_POST['SponsorName']);
			 
			 //upload the name of the file to the database
			 $this->pic_upload(5, $sponsor_id, $file_info['name'], $_POST['SponsorName'].' Logo');
			 
			 //And now the social links:
			 if(isset($_POST['Facebook']) && $_POST['Facebook'] != ''){
				 $this->social_link_upload(5, $sponsor_id, 1, $_POST['Facebook']);
			 }

			 if(isset($_POST['Twitter']) && $_POST['Twitter'] != ''){
				 $this->social_link_upload(5, $sponsor_id, 2, $_POST['Twitter']);
			 }
			 
			 if(isset($_POST['Linkedin']) && $_POST['Linkedin'] != ''){
				 $this->social_link_upload(5, $sponsor_id, 3, $_POST['Linkedin']);
			 }
			 
			 if(isset($_POST['Flickr']) && $_POST['Flickr'] != ''){
				 $this->social_link_upload(5, $sponsor_id, 4, $_POST['Flickr']);
			 }
			     
			 if(isset($_POST['Google']) && $_POST['Google'] != ''){
				 $this->social_link_upload(5, $sponsor_id, 5, $_POST['Google']);
			 } 
			 
			 
			 
			  return $connection_id;
			
		 } else {
			throw new \Exception('Sponsors_data_connection is not uploaded, by:'.$_SESSION['user_id']);   
		 }
		 
		 
		 
		 } catch (\PDOException $e) {
			 $contex[0] = $e->getFile();
			 $contex[1] = $e->getLine();
			 
		   $this->log->addError($e->getMessage(), $contex);
	          }
			  
			  
		 catch (\Exception $e) {
			 $contex[0] = $e->getFile();
			 $contex[1] = $e->getLine();
		   $this->log->addError($e->getMessage(), $contex);
	          }

	
}

public function edit_mediapartner() {

    $sponsor_id = $_POST['sId'];
	
	$date = date("j F Y");
	   try {
          if($_POST['edit_type'] == 'NameEdit'){
			   //Sponsor Name
			   $name_q = "INSERT INTO mediapartners_name SET sponsor_name = :sponsor_name, sponsor_id = :id";
			   $name = $this->pdo->prepare($name_q);
			   
			   $name->bindValue(':sponsor_name', $_POST['new_data'], \PDO::PARAM_STR);
			   $name->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
			   $name->execute();
	  
				  $name_id = $this->pdo->lastInsertId();
		 }
		
		
		if ($_POST['edit_type'] == 'BioEdit'){	
		
			  //Sponsor Bio	
			   $bio_q = "INSERT INTO mediapartners_bio SET sponsor_bio = :bio, sponsor_id = :id";
			   $bio = $this->pdo->prepare($bio_q);
			   
			  
			   $bio->bindValue(':bio', $_POST['body'], \PDO::PARAM_STR);
	  
			   $bio->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
			   
			   $bio->execute();
			   
				  $bio_id = $this->pdo->lastInsertId();
			
		  }
		  
		  
		  
		  
		if ($_POST['edit_type'] == 'LinkEdit'){	
		      if (strpos($_POST['new_data'], 'http') === FALSE && $_POST['new_data'] != '') {
					$url = 'http://'.$_POST['new_data'];
				} else {
					$url = $_POST['new_data'];
				}
			
				//Sponsor URL	
				 $link_q = "INSERT INTO mediapartners_links SET sponsor_link_url = :url, sponsor_id = :id";
				 $link = $this->pdo->prepare($link_q);
				 
				 $link->bindValue(':url', $url, \PDO::PARAM_STR);
				 $link->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
				 
				 $link->execute();
				 
					$link_id = $this->pdo->lastInsertId();
		
		  }
		  
		 
		 
		  if ($_POST['edit_type'] == 'StatusEdit'){
			
					  //Sponsor Status
			   $status_q = "UPDATE mediapartners_status SET status_id = '0' WHERE sponsor_id = :id";
			   $status = $this->pdo->prepare($status_q);
	  
			   $status->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
			   
			   $status->execute();
		 
		  }
		 		
		if (isset($bio_id) || isset($name_id) || isset($category_id) || isset($link_id)){	
		
		$CurrentPHPTimeStamp = date('Y-m-d G:i:s');
		 
				 //Sponsor date connection
				$connection_q = "UPDATE mediapartners_data_connection SET date = :new_date";
				 
				 if (isset($bio_id)) {
					   $connection_q .=", sponsor_bio_id = :bio";
				 }
				 
				 if (isset($name_id)){
					   $connection_q .=", sponsor_name_id = :name";
				 }
				 
				 if (isset($category_id)){
					   $connection_q .=", sponsor_category_id = :category";
				 }
				 
				 if (isset($link_id)){
					   $connection_q .=", sponsor_link_id = :link";
				 }
				 
				 
				$connection_q .= " WHERE sponsor_id = :id";
				
				 $connection = $this->pdo->prepare($connection_q);
				 
				 $connection->bindValue(':new_date', $CurrentPHPTimeStamp, \PDO::PARAM_STR);
				 
				  if (isset($bio_id)) {
				     $connection->bindValue(':bio', $bio_id, \PDO::PARAM_INT);
				  }
				  
				  if (isset($name_id)){
				     $connection->bindValue(':name', $name_id, \PDO::PARAM_INT);
				  }
				  
				  if (isset($category_id)){
				     $connection->bindValue(':category', $category_id, \PDO::PARAM_INT);
				  }
				  
				  if (isset($link_id)){
				     $connection->bindValue(':link', $link_id, \PDO::PARAM_INT);
				  }
				 
				 $connection->bindValue(':id', $sponsor_id, \PDO::PARAM_INT);
				 
				 $connection->execute();
				 
					$connection_id = $sponsor_id;

		  }
		 
            return "Whee";
		 
		 
		 } catch (\PDOException $e) {
			 $contex[0] = $e->getFile();
			 $contex[1] = $e->getLine();
		   $this->log->addError($e->getMessage(), $contex);
	          }
			  
			  
		 catch (\Exception $e) {
			 $contex[0] = $e->getFile();
			 $contex[1] = $e->getLine();
		   $this->log->addError($e->getMessage(), $contex);
	          }

	
}






public function mediapartner_categories() {
	$content = '';
	

	  $content = '<option value="" hidden="hidden" selected="selected">Select a Category</option>'; 

	 
		 $cat_q = "SELECT id, name FROM sponsor_categories ORDER BY id ASC";
		 $cat = $this->pdo->prepare($cat_q);
		 $cat->execute();
		 
					if ($cat->rowCount() > 0) {
					while($category = $cat->fetch()){
						

                         $content .= '<option value="'.$category['id'].'">'.$category['name'].'</option>';
						 
						
					} //personal fetch assoc end
				}  //personal num rows if end
				
	return $content;	
}


public function mediapartner_order($mediapartner, $order) {

	
						  //speaker Status
			   $status_q = "UPDATE mediapartners_order SET order_id = :order WHERE mediapartner_id = :id";
			   $status = $this->pdo->prepare($status_q);
	  
	           $status->bindValue(':order', $order, \PDO::PARAM_INT);
			   $status->bindValue(':id', $mediapartner, \PDO::PARAM_INT);
			   
			   $status->execute();
	
}

/****************
Social Links
***************/
public function social_link_upload($entity_type, $entity_id, $type_id, $url) {
	
	if($url == -1) {
	  $url = '';	
	}
	
			      if (strpos($url, 'http') === FALSE && $url != '') {
					$link = 'http://'.$url;
				} else {
					$link = $url;
				}
	
								//upload the new image
				 $new_link_q = "INSERT INTO social_links SET social_link_url = :url";
				 $new_link = $this->pdo->prepare($new_link_q);
				 
				 $new_link->bindValue(':url', $link, \PDO::PARAM_STR);
				 
				 $new_link->execute();
				 
					$new_link_id = $this->pdo->lastInsertId(); 	
	
	      //get if there's a social link is uploaded for this entity before
		 $old_link_q = "SELECT id FROM social_links_connection WHERE entity_type_id = :type AND entity_id = :id AND social_link_type_id= :link_type";
		 $old_link = $this->pdo->prepare($old_link_q);
		 $old_link->bindValue(':type', $entity_type, \PDO::PARAM_INT);
		 $old_link->bindValue(':id', $entity_id, \PDO::PARAM_INT);
		 $old_link->bindValue(':link_type', $type_id, \PDO::PARAM_INT);
		 $old_link->execute();
		 
				if ($old_link->rowCount() > 0) {
					$current_pic = $old_link->fetch();
					
					
					//updata the current connection
					 $new_link_q = "UPDATE social_links_connection SET link_id = :link WHERE entity_type_id = :type AND entity_id = :id AND social_link_type_id= :link_type";
					 $new_link = $this->pdo->prepare($new_link_q);
					 
					 $new_link->bindValue(':link', $new_link_id, \PDO::PARAM_INT);
					 $new_link->bindValue(':type', $entity_type, \PDO::PARAM_INT);
					 $new_link->bindValue(':id', $entity_id, \PDO::PARAM_INT);
					 $new_link->bindValue(':link_type', $type_id, \PDO::PARAM_INT);
					 
					 $new_link->execute();

					
				} else {
						//upload a new connection
						 $new_link_q = "INSERT INTO social_links_connection SET link_id = :link, entity_type_id = :type, entity_id = :id, social_link_type_id= :link_type";
						 $new_link = $this->pdo->prepare($new_link_q);
						 
						 $new_link->bindValue(':link', $new_link_id, \PDO::PARAM_INT);
						 $new_link->bindValue(':type', $entity_type, \PDO::PARAM_INT);
						 $new_link->bindValue(':id', $entity_id, \PDO::PARAM_INT);
						 $new_link->bindValue(':link_type', $type_id, \PDO::PARAM_INT);
						 
						 $new_link->execute();
						 	
					
				}
	

	
}

public function get_entity_name($sId, $type_raw) {
	$content = '';
	
	$type = $this->clean_str($type_raw);
	
	$entity_table ='';
	$entity_column = '';
	
	switch ($type) {
               case 2:
						 
					     $name_q = "SELECT sn.id, sn.sponsor_name FROM sponsors_name as sn, sponsors_data_connection as sdc WHERE sdc.sponsor_id = :sponsor AND sdc.sponsor_name_id = sn.id LIMIT 0,1";
						 $name = $this->pdo->prepare($name_q);
						   
						 $name->bindValue(':sponsor', $sId, \PDO::PARAM_INT);
		  
						 $name->execute();
						   
						   if ($name->rowCount() > 0) {
								while($sName = $name->fetch()){
		  
									   $content .= '<h1 data-socialLinkType="'.$type.'" data-socialLinkId="'.$sId.'" id="Name">'.$sName['sponsor_name'].'</h1>';
									 
							   }
						   }
	

      
                  break;
               case 1:
			   			 $name_q = "SELECT sn.id, sn.speaker_name FROM speakers_name as sn, speakers_data_connection as sdc WHERE sdc.speaker_id = :speaker AND sdc.speaker_name_id = sn.id LIMIT 0,1";
						 $name = $this->pdo->prepare($name_q);
						   
						 $name->bindValue(':speaker', $sId, \PDO::PARAM_INT);
		  
						 $name->execute();
						   
						   if ($name->rowCount() > 0) {
								while($sName = $name->fetch()){
		  
									   $content .= '<h1 data-socialLinkType="'.$type.'" data-socialLinkId="'.$sId.'" id="Name">'.$sName['speaker_name'].'</h1>';
									 
							   }
						   }
			   

                  break;
               case 6:
			   			 $name_q = "SELECT sn.id, sn.speaker_name FROM blogsquad_name as sn, blogsquad_data_connection as sdc WHERE sdc.speaker_id = :speaker AND sdc.speaker_name_id = sn.id LIMIT 0,1";
						 $name = $this->pdo->prepare($name_q);
						   
						 $name->bindValue(':speaker', $sId, \PDO::PARAM_INT);
		  
						 $name->execute();
						   
						   if ($name->rowCount() > 0) {
								while($sName = $name->fetch()){
		  
									   $content .= '<h1 data-socialLinkType="'.$type.'" data-socialLinkId="'.$sId.'" id="Name">'.$sName['speaker_name'].'</h1>';
									 
							   }
						   }			   
			   
			   

                 break;
}
	
	

	

					  
	return $content;
}



public function get_socials($sId, $type_raw) {
		$content = '';
		
	   $type = $this->clean_str($type_raw);
	   
	   $link_q = "SELECT id, type FROM social_link_types ORDER BY id ASC";
	   $link = $this->pdo->prepare($link_q);

	   $link->execute();
		 
		 if ($link->rowCount() > 0) {
			  while($link_type = $link->fetch()){
				  
	   
					   $url_q = "SELECT sl.social_link_url FROM social_links as sl, social_links_connection as slc WHERE slc.entity_type_id= :type AND slc.entity_id= :id AND slc.social_link_type_id= :link_type AND slc.link_id=sl.id";
					   $url = $this->pdo->prepare($url_q);
					   
					   $url->bindValue(':type', $type, \PDO::PARAM_INT);	 
					   $url->bindValue(':id', $sId, \PDO::PARAM_INT);
					   $url->bindValue(':link_type', $link_type['id'], \PDO::PARAM_INT);
				
					   $url->execute();
						 
						 if ($url->rowCount() > 0) {
							  while($social_url = $url->fetch()){
								  
								  					 if($social_url['social_link_url'] == '') { //We check if there's an actual link or just empty string
													     //if the string empty:
														     $content .= '<input class="AdminInputField" data-sociallink-typeid="'.$link_type['id'].'" id="'.ucfirst($link_type['type']).'" type="text" placeholder="'.ucfirst($link_type['type']).'"/>';
														   
													  } else { //if there's a link, we display the value
													     //convert back the url
													// $url_raw = $this->social_link_decode($social_url['social_link_url']);
													$url_raw = $social_url['social_link_url'];
													 
														  $content .= '<input class="AdminInputField" data-sociallink-typeid="'.$link_type['id'].'" id="'.ucfirst($link_type['type']).'" type="text" value="'.$url_raw.'"/>';  
													  } //value empty else end
				
									
								   
							 }
						 }  else { //personal num rows if end  //There's no such link
										      $content .= '<input class="AdminInputField" data-sociallink-typeid="'.$link_type['id'].'" id="'.ucfirst($link_type['type']).'" type="text" placeholder="'.ucfirst($link_type['type']).'"/>';
										  } //no such thing else end

					
				   
			 }//while link type
		 } //if link row count


						  
	return $content;	
}


public function save_speaker() {
   //$_SESSION['SpeakerCompanyId']

	$date = date("j F Y");
	   try {
	      $this->pdo->beginTransaction();
		  
  		  if (isset($_POST['SpeakerName'])){
			   //Speaker
			   $speaker_q = "INSERT INTO speakers SET original_name = :name";
			   $speaker = $this->pdo->prepare($speaker_q);
			   
			   $speaker->bindValue(':name', $_POST['SpeakerName'], \PDO::PARAM_STR);	
			   
				   
			   $speaker->execute();
			   $speaker_id = $this->pdo->lastInsertId(); 
			   
			   
						   //speaker Name
			   $name_q = "INSERT INTO speakers_name SET speaker_name = :speaker_name, speaker_id = :id";
			   $name = $this->pdo->prepare($name_q);
			   
			   $name->bindValue(':speaker_name', $_POST['SpeakerName'], \PDO::PARAM_STR);
			   $name->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
			   $name->execute();
	  
				  $name_id = $this->pdo->lastInsertId();
				  
				  $sTag = explode(" ", $_POST['SpeakerName']); 
				   if(isset($sTag[1])) {
					   $speaker_tag = ucfirst($sTag[1]).ucfirst($sTag[0][0]);
				   } else {
					   $speaker_tag = ucfirst($_POST['SpeakerName']); 
				   }
				  
				   $speaker_tag = $this->clean_tag($speaker_tag);
				  
				  
				  						   //speaker tag
			   $tag_q = "INSERT INTO speakers_tag SET speaker_tag = :speaker_tag, speaker_id = :id";
			   $tag = $this->pdo->prepare($tag_q);
			   
			   $tag->bindValue(':speaker_tag', $speaker_tag, \PDO::PARAM_STR);
			   $tag->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
			   $tag->execute();
	  
				  $tag_id = $this->pdo->lastInsertId();
			
			
			   
		  } else {
			throw new Exception('Speaker name is not set in the speaker upload by:'.$_SESSION['user_id']);  
		  }


		
		if (isset($_POST['SpeakerBio'])){	
		
			  //speaker Bio	
			   $bio_q = "INSERT INTO speakers_bio SET speaker_bio = :bio, speaker_id = :id";
			   $bio = $this->pdo->prepare($bio_q);
			   
			  
			   $bio->bindValue(':bio', $_POST['SpeakerBio'], \PDO::PARAM_STR);
	  
			   $bio->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
			   
			   $bio->execute();
			   
				  $bio_id = $this->pdo->lastInsertId();
			
		  }else {
			throw new Exception('Speaker Bio is not set in the speaker upload by:'.$_SESSION['user_id']);  
		  }
		  
		if (isset($_POST['SpeakerTitle'])){	
		
			
				//Sponsor URL	
				 $title_q = "INSERT INTO speakers_title SET title = :title, speaker_id = :id";
				 $title = $this->pdo->prepare($title_q);
				 
				 $title->bindValue(':title', $_POST['SpeakerTitle'], \PDO::PARAM_STR);
				 $title->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
				 
				 $title->execute();
				 
					$title_id = $this->pdo->lastInsertId();
		
		  }else {
			throw new Exception('Speakers Title is not set in the speaker upload by:'.$_SESSION['user_id']);  
		  }
		  
		  
	//Mainpage stuff	
	
	if ($_POST['MainPage'] == 1 && isset($_POST['MainPageBio'])) { 
		     $this->speakers_mainpage($speaker_id, 1);  
		
											  //speaker Bio	
			   $bio_q = "INSERT INTO speakers_mainpage_bio SET text = :bio, speaker_id = :id";
			   $bio = $this->pdo->prepare($bio_q);
			   
			  
			   $bio->bindValue(':bio', $_POST['MainPageBio'], \PDO::PARAM_STR);
	  
			   $bio->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
			   
			   $bio->execute();
	   }
	//-----------------
	   //Company Data	 
		 
		 if (isset($_POST['CompanyName'])){	
		  
			   //Speaker
			   $company_q = "INSERT INTO speakers_company SET original_company_name = :name";
			   $company = $this->pdo->prepare($company_q);
			   
			   $company->bindValue(':name', $_POST['CompanyName'], \PDO::PARAM_STR);	
			   
				   
			   $company->execute();
			   $company_id = $this->pdo->lastInsertId(); 
			   
			   
			   
						 //company Name
			 $company_name_q = "INSERT INTO speakers_company_name SET company_name = :company_name, speaker_company_id = :id";
			 $company_name = $this->pdo->prepare($company_name_q);
			 
			 $company_name->bindValue(':company_name', $_POST['CompanyName'], \PDO::PARAM_STR);
			 $company_name->bindValue(':id', $company_id, \PDO::PARAM_INT);
			 $company_name->execute();
	
				$company_name_id = $this->pdo->lastInsertId();
				  
			
			
		 }else {
			throw new Exception('Company name is not set in the speaker upload by:'.$_SESSION['user_id']);  
		  }
		  

		  
		  		if (isset($_POST['CompanyWebsite'])){	
				
						  if (strpos($_POST['CompanyWebsite'], 'http') === FALSE && $_POST['CompanyWebsite'] != '') {
							  $url = 'http://'.$_POST['CompanyWebsite'];
						  } else {
							  $url = $_POST['CompanyWebsite'];
						  }
		  
							  //compamy websote
					   $website_q = "INSERT INTO speakers_company_website SET company_website = :website, speaker_company_id = :id";
					   $website = $this->pdo->prepare($website_q);
					   
					   $website->bindValue(':website', $url, \PDO::PARAM_STR);
					   $website->bindValue(':id', $company_id, \PDO::PARAM_INT);
					   
					   $website->execute();
					   
						  $website_id = $this->pdo->lastInsertId(); 	
			
			
		          }
				  
				  
			 if (isset($company_id) && isset($company_name_id)){	
		 
				 //Sponsor date connection
				 $connection_q = "INSERT INTO speakers_company_data_connection SET speaker_company_id = :id, speaker_company_name_id = :name";
				   if (isset($website_id)) {
					   $connection_q .= ", speaker_company_website_id= :website";
				   }
				  
				 $connection = $this->pdo->prepare($connection_q);
				 
				 $connection->bindValue(':id', $company_id, \PDO::PARAM_INT);
				 $connection->bindValue(':name', $company_name_id, \PDO::PARAM_INT);
				   if (isset($website_id)) {
					   $connection->bindValue(':website', $website_id, \PDO::PARAM_INT);
				   }
				 
				 $connection->execute();
				 
					$company_connection_id = $this->pdo->lastInsertId();

		 }else {
			throw new Exception('Something is not set in the company connection query by:'.$_SESSION['user_id']);  
		  }
				  
		  
		  //---------------
		    //End Company Data
				
			
				//speaker Status
		 $status_q = "INSERT INTO speakers_status SET speaker_status_id = '1', speaker_id = :id";
		 $status = $this->pdo->prepare($status_q);

		 $status->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
		 
		 $status->execute();
		 
		 
		 // ORDER
		 				//speaker Status
		 $order_q = "SELECT COUNT(id) as num FROM speakers_order";
		 $order = $this->pdo->prepare($order_q);
		 
		 $order->execute();
		 
		 if ($order->rowCount() > 0) {
			 $order_num = $order->fetch();
			 $num = (int)$order_num[0];
			 $num++;
									//speaker order
				 $ordernew_q = "INSERT INTO speakers_order SET order_id = :order, speaker_id = :id";
				 $ordernew = $this->pdo->prepare($ordernew_q);
		
				 $ordernew->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
				 $ordernew->bindValue(':order', $num, \PDO::PARAM_INT);
				 
				 $ordernew->execute();
			 
			 
		 }
		 
		 
		 		
	   if (isset($speaker_id) && isset($bio_id) && isset($name_id) && isset($title_id) && isset($company_id) && isset($tag_id)){	
		 
				 //Sponsor date connection
				 $connection_q = "INSERT INTO speakers_data_connection SET speaker_id = :id, speaker_bio_id = :bio, speaker_name_id = :name, speaker_title_id = :title, speaker_company_id = :company, speaker_tag_id= :tag";
				 $connection = $this->pdo->prepare($connection_q);
				 
				 $connection->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
				 $connection->bindValue(':bio', $bio_id, \PDO::PARAM_INT);
				 $connection->bindValue(':name', $name_id, \PDO::PARAM_INT);
				 $connection->bindValue(':title', $title_id, \PDO::PARAM_INT);
				 $connection->bindValue(':company', $company_id, \PDO::PARAM_INT);
				 $connection->bindValue(':tag', $tag_id, \PDO::PARAM_INT);
				 
				 $connection->execute();
				 
					$connection_id = $this->pdo->lastInsertId();

		 }else {
			throw new Exception('Something is not set in the speaker data connection query by:'.$_SESSION['user_id']);  
		  }

		 
		 $this->pdo->commit();
		 
		 if (isset($connection_id)){
			 
			 //upload the logo if the database queries are done
			 $file_info = $this->file_upload('speakers/SpeakerPhotos/', $speaker_tag);
			 
			 //upload the name of the file to the database
			 $this->pic_upload(1, $speaker_id, $file_info['name'], $speaker_tag);
			 
			 //And now the social links:
			 if(isset($_POST['Facebook']) && $_POST['Facebook'] != ''){
				 $this->social_link_upload(1, $speaker_id, 1, $_POST['Facebook']);
			 }

			 if(isset($_POST['Twitter']) && $_POST['Twitter'] != ''){
				 $this->social_link_upload(1, $speaker_id, 2, $_POST['Twitter']);
			 }
			 
			 if(isset($_POST['Linkedin']) && $_POST['Linkedin'] != ''){
				 $this->social_link_upload(1, $speaker_id, 3, $_POST['Linkedin']);
			 }
			 
			 if(isset($_POST['Flickr']) && $_POST['Flickr'] != ''){
				 $this->social_link_upload(1, $speaker_id, 4, $_POST['Flickr']);
			 }
			     
			 if(isset($_POST['Google']) && $_POST['Google'] != ''){
				 $this->social_link_upload(1, $speaker_id, 5, $_POST['Google']);
			 } 
			 
			
			//Save the company id for the logo upload
			 if (isset($company_connection_id)) {
				 $_SESSION['SpeakerCompanyId'] = $company_id;
			  }
			 
			  return $connection_id;
			
		 } else {
			throw new Exception('speakers_data_connection is not uploaded, by:'.$_SESSION['user_id']);   
		 }
		 
		 
		 
		 } catch (\PDOException $e) {
			 $contex[0] = $e->getFile();
			 $contex[1] = $e->getLine();
		   $this->log->addError($e->getMessage(), $contex);
	          }
			  
			  
		 catch (\Exception $e) {
			 $contex[0] = $e->getFile();
			 $contex[1] = $e->getLine();
		   $this->log->addError($e->getMessage(), $contex);
	          }
			  

	
}


public function edit_speaker() {

    $speaker_id = $_POST['sId'];
	
	$date = date("j F Y");
	   try {
          if($_POST['edit_type'] == 'NameEdit'){
			   //speaker Name
			   $name_q = "INSERT INTO speakers_name SET speaker_name = :speaker_name, speaker_id = :id";
			   $name = $this->pdo->prepare($name_q);
			   
			   $name->bindValue(':speaker_name', $_POST['new_data'], \PDO::PARAM_STR);
			   $name->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
			   $name->execute();
	  
				  $name_id = $this->pdo->lastInsertId();
				  
				  
				  $sTag = explode(" ", $_POST['new_data']); 
				   if(isset($sTag[1])) {
					   $speaker_tag = ucfirst($sTag[1]).ucfirst($sTag[0][0]);
				   } else {
					   $speaker_tag = ucfirst($_POST['new_data']); 
				   }
				  
				     $speaker_tag = $this->clean_tag($speaker_tag);
				  
				  
				  						   //speaker tag
			   $tag_q = "INSERT INTO speakers_tag SET speaker_tag = :speaker_tag, speaker_id = :id";
			   $tag = $this->pdo->prepare($tag_q);
			   
			   $tag->bindValue(':speaker_tag', $speaker_tag, \PDO::PARAM_STR);
			   $tag->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
			   $tag->execute();
	  
				  $tag_id = $this->pdo->lastInsertId();
		 }
		
		
		if ($_POST['edit_type'] == 'BioEdit'){	
		
			  //speaker Bio	
			   $bio_q = "INSERT INTO speakers_bio SET speaker_bio = :bio, speaker_id = :id";
			   $bio = $this->pdo->prepare($bio_q);
			   
			  
			   $bio->bindValue(':bio', $_POST['body'], \PDO::PARAM_STR);
	  
			   $bio->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
			   
			   $bio->execute();
			   
				  $bio_id = $this->pdo->lastInsertId();
			
		  }
		  
		  
		if ($_POST['edit_type'] == 'TitleEdit'){	

			
				//speaker URL	
				 $link_q = "INSERT INTO speakers_title SET title = :title, speaker_id = :id";
				 $link = $this->pdo->prepare($link_q);
				 
				 $link->bindValue(':title', $_POST['new_data'], \PDO::PARAM_STR);
				 $link->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
				 
				 $link->execute();
				 
					$title_id = $this->pdo->lastInsertId();
		
		  }
		  
		  
		  	//-----------------
	   //Company Data	 
		 
		 if ($_POST['edit_type'] == 'CompanyNameEdit'){	
		  

			   
						 //company Name
			 $company_name_q = "INSERT INTO speakers_company_name SET company_name = :company_name, speaker_company_id = :id";
			 $company_name = $this->pdo->prepare($company_name_q);
			 
			 $company_name->bindValue(':company_name', $_POST['new_data'], \PDO::PARAM_STR);
			 $company_name->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
			 $company_name->execute();
	
				$company_name_id = $this->pdo->lastInsertId();
				  
			
			
		 }
		  

		  
		  	 if ($_POST['edit_type'] == 'CompanyWebsiteEdit'){		
				
						  if (strpos($_POST['new_data'], 'http') === FALSE && $_POST['new_data'] != '') {
							  $url = 'http://'.$_POST['new_data'];
						  } else {
							  $url = $_POST['new_data'];
						  }
		  
							  //compamy websote
					   $website_q = "INSERT INTO speakers_company_website SET company_website = :website, speaker_company_id = :id";
					   $website = $this->pdo->prepare($website_q);
					   
					   $website->bindValue(':website', $url, \PDO::PARAM_STR);
					   $website->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
					   
					   $website->execute();
					   
						  $website_id = $this->pdo->lastInsertId(); 	
			
			
		          }
				  
				  
			 if (isset($company_name_id) || isset($website_id)){
				 
				 $CurrentPHPTimeStamp = date('Y-m-d G:i:s');
				 	
		 
				 //Sponsor date connection
				$connection_q = "UPDATE speakers_company_data_connection SET date = :new_date";
	
				  
				 if (isset($company_name_id)) {
					   $connection_q .=", speaker_company_name_id = :nameid";
				 }
				 
				 if (isset($website_id)){
					   $connection_q .=", speaker_company_website_id = :website";
				 }
				 

				 
				 
				$connection_q .= " WHERE speaker_company_id = :id";
				
				 $connection = $this->pdo->prepare($connection_q);
				 
				 $connection->bindValue(':new_date', $CurrentPHPTimeStamp, \PDO::PARAM_STR);
				 
				  if (isset($company_name_id)) {
				     $connection->bindValue(':nameid', $company_name_id, \PDO::PARAM_INT);
				  }
				  
				  if (isset($website_id)){
				     $connection->bindValue(':website', $website_id, \PDO::PARAM_INT);
				  }
				  

				 $connection->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
				 
				 $connection->execute();
				 
					$company_connection_id = $this->pdo->lastInsertId();

		 }
				  
		  
		  //---------------
		    //End Company Data
		  

		 
		  if ($_POST['edit_type'] == 'StatusEdit'){
			
					  //speaker Status
			   $status_q = "UPDATE speakers_status SET speaker_status_id = '0' WHERE speaker_id = :id";
			   $status = $this->pdo->prepare($status_q);
	  
			   $status->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
			   
			   $status->execute();
			   
			   $text = "Deleted";
			   
			   return $text;
		 
		  }
		 		
		if (isset($bio_id) || isset($name_id) || isset($title_id) || isset($tag_id)){	
		
		$CurrentPHPTimeStamp = date('Y-m-d G:i:s');
		 
				 //speaker date connection
				$connection_q = "UPDATE speakers_data_connection SET date = :new_date";
				 
				 if (isset($bio_id)) {
					   $connection_q .=", speaker_bio_id = :bio";

				 }
				 
				 if (isset($name_id)){
					   $connection_q .=", speaker_name_id = :name";
					   $connection_q .=", speaker_tag_id = :tag";
				 }
				 
				 
				 if (isset($title_id)){
					   $connection_q .=", speaker_title_id = :title";
				 }
				 
				 
				$connection_q .= " WHERE speaker_id = :id";
				
				 $connection = $this->pdo->prepare($connection_q);
				 
				 $connection->bindValue(':new_date', $CurrentPHPTimeStamp, \PDO::PARAM_STR);
				 
				  if (isset($bio_id)) {
				     $connection->bindValue(':bio', $bio_id, \PDO::PARAM_INT);
				  }
				  
				  if (isset($name_id)){
				     $connection->bindValue(':name', $name_id, \PDO::PARAM_INT);
					 $connection->bindValue(':tag', $tag_id, \PDO::PARAM_INT);
					   
				  }
				  
				  
				  if (isset($title_id)){
				     $connection->bindValue(':title', $title_id, \PDO::PARAM_INT);
				  }
				 
				 $connection->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
				 
				 $connection->execute();
				 
					$connection_id = $speaker_id;

		  }
		 
		 if (isset($connection_id)){
			 
			 
			  return $connection_id;
			
		 } else {
			throw new Exception('speakers_data_connection is not uploaded, by:'.$_SESSION['user_id']);   
		 }
		 
		 
		 
		 } catch (\PDOException $e) {
			 $contex[0] = $e->getFile();
			 $contex[1] = $e->getLine();
		   $this->log->addError($e->getMessage(), $contex);
	          }
			  
			  
		 catch (\Exception $e) {
			 $contex[0] = $e->getFile();
			 $contex[1] = $e->getLine();
		   $this->log->addError($e->getMessage(), $contex);
	          }

	
}

public function speaker_order($speaker, $order) {
	
						  //speaker Status
			   $status_q = "UPDATE speakers_order SET order_id = :order WHERE speaker_id = :id";
			   $status = $this->pdo->prepare($status_q);
	  
	           $status->bindValue(':order', $order, \PDO::PARAM_INT);
			   $status->bindValue(':id', $speaker, \PDO::PARAM_INT);
			   
			   $status->execute();
	
}

public function speaker_mainpage_order($speaker, $order) {
	
						  //speaker Status
			   $status_q = "UPDATE speakers_mainpage_order SET order_id = :order WHERE speaker_id = :id";
			   $status = $this->pdo->prepare($status_q);
	  
	           $status->bindValue(':order', $order, \PDO::PARAM_INT);
			   $status->bindValue(':id', $speaker, \PDO::PARAM_INT);
			   
			   $status->execute();
	
}

public function speakers_mainpage($sId, $val) {
					 						
				 $mainpage_q = "SELECT id FROM speakers_mainpage WHERE speaker_id = :id ORDER BY date LIMIT 0,1";
				 $mainpage = $this->pdo->prepare($mainpage_q);
				 
				 $mainpage->bindValue(':id', $sId, \PDO::PARAM_INT);
				 
				 $mainpage->execute();
				 
				 if ($mainpage->rowCount() > 0) {
					$main_id = $mainpage->fetch();
					
				 } 
				 
				 //if the user wants to delete the speaker from the main page
		if ($val == 0) {
			
			if (isset($main_id[0])){
							    
				   $delete_q = "DELETE FROM speakers_mainpage WHERE id = :id";
				   $delete = $this->pdo->prepare($delete_q);
				   
				   $delete->bindValue(':id', $main_id[0], \PDO::PARAM_INT);
				   $delete->execute();
				   
				   
				   $delete_order_q = "DELETE FROM speakers_mainpage_order WHERE speaker_id = :id";
				   $delete_order = $this->pdo->prepare($delete_order_q);
				   
				   $delete_order->bindValue(':id', $sId, \PDO::PARAM_INT);
				   $delete_order->execute();
				
				
			}
			
		}//if val == 0
		
		
	 if ($val == 1) {
		 if (!isset($main_id[0])){
									  
				   $website_q = "INSERT INTO speakers_mainpage SET speaker_id = :id";
				   $website = $this->pdo->prepare($website_q);
				   
				   $website->bindValue(':id', $sId, \PDO::PARAM_INT);
				   
				   $website->execute();
				   
				   
				 $order_q = "SELECT id FROM speakers_mainpage_order";
				 $order = $this->pdo->prepare($order_q);

				 $order->execute();
				 
				 if ($order->rowCount() > 0) {
					$order_num = $order->rowCount();
					$order_num++;
				 } else {
					 $order_num = 1;
				 }
				   
				   
				   $website_q = "INSERT INTO speakers_mainpage_order SET speaker_id = :id, order_id = :order";
				   $website = $this->pdo->prepare($website_q);
				   
				   $website->bindValue(':id', $sId, \PDO::PARAM_INT);
				   $website->bindValue(':order', $order_num, \PDO::PARAM_INT);
				   
				   $website->execute();

		 
		 
		 }
		 
	 }//if val == 1
	

	
}

public function speaker_mainpage_bio() {
	
			     $order_q = "SELECT id FROM speakers_mainpage_bio WHERE speaker_id= :id";
				 $order = $this->pdo->prepare($order_q);
                 $order->bindValue(':id', $_POST['sId'], \PDO::PARAM_INT);
				 $order->execute();
				 
				 if ($order->rowCount() > 0) {
					 							
														  //speaker Bio	
			   $bio_q = "UPDATE speakers_mainpage_bio SET text = :bio WHERE speaker_id = :id";
			   $bio = $this->pdo->prepare($bio_q);
			   
			  
			   $bio->bindValue(':bio', $_POST['body'], \PDO::PARAM_STR);
	  
			   $bio->bindValue(':id', $_POST['sId'], \PDO::PARAM_INT);
			   
			   $bio->execute();
					 

				 } else {
									  //speaker Bio	
			   $bio_q = "INSERT INTO speakers_mainpage_bio SET text = :bio, speaker_id = :id";
			   $bio = $this->pdo->prepare($bio_q);
			   
			  
			   $bio->bindValue(':bio', $_POST['body'], \PDO::PARAM_STR);
	  
			   $bio->bindValue(':id', $_POST['sId'], \PDO::PARAM_INT);
			   
			   $bio->execute();
					
					
				 }
	
	

			   
				 
}


/****************
 PRESS
*******************/
public function save_press() {
   //$_SESSION['SpeakerCompanyId']
   if (isset($_POST['entity_id']) && $_POST['entity_id'] != ''){
       $entity_id = preg_replace("/\D/", "", $_POST['entity_id']);
     if ($entity_id == 6){
		 $entity = "blogsquad";
		 $location = "BlogSquad";
	 }
	 
	 if ($entity_id == 7){
		$entity = 'analytics';
		$location = "Analytics";
	 }

if (isset($entity) && $entity != ''){
	$date = date("j F Y");
	   try {
	      $this->pdo->beginTransaction();
		  
  		  if (isset($_POST['SpeakerName'])){
			   //Speaker
			   $speaker_q = "INSERT INTO ".$entity." SET original_name = :name";
			   $speaker = $this->pdo->prepare($speaker_q);
			   
			   $speaker->bindValue(':name', $_POST['SpeakerName'], \PDO::PARAM_STR);	
			   
				   
			   $speaker->execute();
			   $speaker_id = $this->pdo->lastInsertId(); 
			   
			   
						   //speaker Name
			   $name_q = "INSERT INTO ".$entity."_name SET speaker_name = :speaker_name, speaker_id = :id";
			   $name = $this->pdo->prepare($name_q);
			   
			   $name->bindValue(':speaker_name', $_POST['SpeakerName'], \PDO::PARAM_STR);
			   $name->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
			   $name->execute();
	  
				  $name_id = $this->pdo->lastInsertId();
				  
				  $sTag = explode(" ", $_POST['SpeakerName']); 
				   if(isset($sTag[1])) {
					   $speaker_tag = $this->clean_str(ucfirst($sTag[1]).ucfirst($sTag[0][0]));
				   } else {
					   $speaker_tag = $this->clean_str(ucfirst($_POST['SpeakerName'])); 
				   }
				  $file_name = $speaker_tag;
				  
				  $rand_num = mt_rand(1,9999);
				  $speaker_tag .= $rand_num;
				  						   //speaker tag
			   $tag_q = "INSERT INTO ".$entity."_tag SET speaker_tag = :speaker_tag, speaker_id = :id";
			   $tag = $this->pdo->prepare($tag_q);
			   
			   $tag->bindValue(':speaker_tag', $speaker_tag, \PDO::PARAM_STR);
			   $tag->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
			   $tag->execute();
	  
				  $tag_id = $this->pdo->lastInsertId();
			
			
			   
		  } else {
			throw new Exception('Speaker name is not set in the speaker upload by:'.$_SESSION['user_id']);  
		  }


		/*
		if (isset($_POST['SpeakerBio'])){	
		
			  //speaker Bio	
			   $bio_q = "INSERT INTO speakers_bio SET speaker_bio = :bio, speaker_id = :id";
			   $bio = $this->pdo->prepare($bio_q);
			   
			  
			   $bio->bindValue(':bio', $_POST['SpeakerBio'], \PDO::PARAM_STR);
	  
			   $bio->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
			   
			   $bio->execute();
			   
				  $bio_id = $this->pdo->lastInsertId();
			
		  }else {
			throw new Exception('Speaker Bio is not set in the speaker upload by:'.$_SESSION['user_id']);  
		  }
		  */
		  $bio_id = NULL;
		  
		if (isset($_POST['SpeakerTitle'])){	
		
			
				//Sponsor URL	
				 $title_q = "INSERT INTO ".$entity."_title SET title = :title, speaker_id = :id";
				 $title = $this->pdo->prepare($title_q);
				 
				 $title->bindValue(':title', $_POST['SpeakerTitle'], \PDO::PARAM_STR);
				 $title->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
				 
				 $title->execute();
				 
					$title_id = $this->pdo->lastInsertId();
		
		  }else {
			  $title_id = NULL;
		  }
		  
		  
	//Mainpage stuff	
	
	if ($_POST['MainPage'] == 1 && isset($_POST['MainPageBio'])) {
		     //Upload data to the mainpage tables
		     $this->press_mainpage($entity_id, $speaker_id, 1);  
		
											  //speaker Bio	
			   $bio_q = "INSERT INTO ".$entity."_mainpage_bio SET text = :bio, speaker_id = :id";
			   $bio = $this->pdo->prepare($bio_q);
			   
			  
			   $bio->bindValue(':bio', $_POST['MainPageBio'], \PDO::PARAM_STR);
	  
			   $bio->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
			   
			   $bio->execute();
	   }
	//-----------------
	   //Company Data	 
		 
		 if (isset($_POST['CompanyName'])){	
		       $Comp_name = $_POST['CompanyName'];
		  
		   } else {
			   $Comp_name = NULL;
		   }
		   
			   //company
			   $company_q = "INSERT INTO ".$entity."_company SET original_company_name = :name";
			   $company = $this->pdo->prepare($company_q);
			   
			   $company->bindValue(':name', $Comp_name, \PDO::PARAM_STR);	
			   
				   
			   $company->execute();
			   $company_id = $this->pdo->lastInsertId(); 
			   
			   
			   
						 //company Name
			 $company_name_q = "INSERT INTO ".$entity."_company_name SET company_name = :company_name, speaker_company_id = :id";
			 $company_name = $this->pdo->prepare($company_name_q);
			 
			 $company_name->bindValue(':company_name', $Comp_name, \PDO::PARAM_STR);
			 $company_name->bindValue(':id', $company_id, \PDO::PARAM_INT);
			 $company_name->execute();
	
				$company_name_id = $this->pdo->lastInsertId();
				  
			
			
		
		  

		  
		  		if (isset($_POST['CompanyWebsite']) && isset($company_id) && $company_id != NULL){	
				
						  if (strpos($_POST['CompanyWebsite'], 'http') === FALSE && $_POST['CompanyWebsite'] != '') {
							  $url = 'http://'.$_POST['CompanyWebsite'];
						  } else {
							  $url = $_POST['CompanyWebsite'];
						  }
		  
							  //compamy websote
					   $website_q = "INSERT INTO ".$entity."_company_website SET company_website = :website, speaker_company_id = :id";
					   $website = $this->pdo->prepare($website_q);
					   
					   $website->bindValue(':website', $url, \PDO::PARAM_STR);
					   $website->bindValue(':id', $company_id, \PDO::PARAM_INT);
					   
					   $website->execute();
					   
						  $website_id = $this->pdo->lastInsertId(); 	
			
			
		          } else {
					  $website_id = NULL;
				  }
				  
				  
			 if (isset($company_id) && isset($company_name_id) && $company_id != NULL){	
		 
				 //Sponsor date connection
				 $connection_q = "INSERT INTO ".$entity."_company_data_connection SET speaker_company_id = :id, speaker_company_name_id = :name";
				   if (isset($website_id)) {
					   $connection_q .= ", speaker_company_website_id= :website";
				   }
				  
				 $connection = $this->pdo->prepare($connection_q);
				 
				 $connection->bindValue(':id', $company_id, \PDO::PARAM_INT);
				 $connection->bindValue(':name', $company_name_id, \PDO::PARAM_INT);
				   if (isset($website_id)) {
					   $connection->bindValue(':website', $website_id, \PDO::PARAM_INT);
				   }
				 
				 $connection->execute();
				 
					$company_connection_id = $this->pdo->lastInsertId();

		 }else {
			$company_connection_id = NULL;
		  }
				  
		  
		  //---------------
		    //End Company Data
				
			
				//speaker Status
		 $status_q = "INSERT INTO ".$entity."_status SET speaker_status_id = '1', speaker_id = :id";
		 $status = $this->pdo->prepare($status_q);

		 $status->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
		 
		 $status->execute();
		 
		 
		 // ORDER
		 				//speaker Status
		 $order_q = "SELECT COUNT(id) as num FROM ".$entity."_order";
		 $order = $this->pdo->prepare($order_q);
		 
		 $order->execute();
		 
		 if ($order->rowCount() > 0) {
			 $order_num = $order->fetch();
			 $num = (int)$order_num[0];
			 $num++;
									//speaker order
				 $ordernew_q = "INSERT INTO ".$entity."_order SET order_id = :order, speaker_id = :id";
				 $ordernew = $this->pdo->prepare($ordernew_q);
		
				 $ordernew->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
				 $ordernew->bindValue(':order', $num, \PDO::PARAM_INT);
				 
				 $ordernew->execute();
			 
			 
		 }
		 
		 
		 		
	   if (isset($speaker_id) && isset($name_id) && isset($title_id) && isset($company_id) && isset($tag_id)){	
		 
				 //Sponsor date connection
				 $connection_q = "INSERT INTO ".$entity."_data_connection SET speaker_id = :id, speaker_name_id = :name, speaker_title_id = :title, speaker_company_id = :company, speaker_tag_id= :tag";
				 $connection = $this->pdo->prepare($connection_q);
				 
				 $connection->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
				 $connection->bindValue(':name', $name_id, \PDO::PARAM_INT);
				 $connection->bindValue(':title', $title_id, \PDO::PARAM_INT);
				 $connection->bindValue(':company', $company_id, \PDO::PARAM_INT);
				 $connection->bindValue(':tag', $tag_id, \PDO::PARAM_INT);
				 
				 $connection->execute();
				 
					$connection_id = $this->pdo->lastInsertId();

		 }else {
			throw new Exception('Something is not set in the speaker data connection query by:'.$_SESSION['user_id']);  
		  }

		 
		 $this->pdo->commit();
		 
		 if (isset($connection_id)){
	        if(isset($_FILES)){
				 //upload the logo if the database queries are done
				 $file_info = $this->file_upload('press/'.$location.'/Photos/', $file_name);
				 
				 //upload the name of the file to the database
				 $this->press_pic_upload($entity_id, $speaker_id, $file_info['name'], $file_name);
			}
			
			 
			 //And now the social links:
			 if(isset($_POST['Facebook']) && $_POST['Facebook'] != ''){
				 $this->social_link_upload($entity_id, $speaker_id, 1, $_POST['Facebook']);
			 }

			 if(isset($_POST['Twitter']) && $_POST['Twitter'] != ''){
				 $this->social_link_upload($entity_id, $speaker_id, 2, $_POST['Twitter']);
			 }
			 
			 if(isset($_POST['Linkedin']) && $_POST['Linkedin'] != ''){
				 $this->social_link_upload($entity_id, $speaker_id, 3, $_POST['Linkedin']);
			 }
			 
			 if(isset($_POST['Flickr']) && $_POST['Flickr'] != ''){
				 $this->social_link_upload($entity_id, $speaker_id, 4, $_POST['Flickr']);
			 }
			     
			 if(isset($_POST['Google']) && $_POST['Google'] != ''){
				 $this->social_link_upload($entity_id, $speaker_id, 5, $_POST['Google']);
			 } 
			 
			
			//Save the company id for the logo upload
			 if (isset($company_connection_id)) {
				 $_SESSION['SpeakerCompanyId'] = $company_id;
			  }
			 
			  return $connection_id;
			
		 } else {
			throw new \Exception('speakers_data_connection is not uploaded, by:'.$_SESSION['user_id']);   
		 }
		 
		 
		 
		 } catch (\PDOException $e) {
			 $contex[0] = $e->getFile();
			 $contex[1] = $e->getLine();
		   $this->log->addError($e->getMessage(), $contex);
	          }
			  
			  
		 catch (\Exception $e) {
			 $contex[0] = $e->getFile();
			 $contex[1] = $e->getLine();
		   $this->log->addError($e->getMessage(), $contex);
	          }
			  
     }//isset entity
			  
   }//isset entity_id
	
}


public function edit_press() {

   if (isset($_POST['entity_id']) && $_POST['entity_id'] != ''){
       $entity_id = preg_replace("/\D/", "", $_POST['entity_id']);
	   
     if ($entity_id == 6){
		 $entity = "blogsquad";
	 }
	 
	 if ($entity_id == 7){
		$entity = 'analytics';
	 }

if (isset($entity) && $entity != ''){
	
    $speaker_id = $_POST['sId'];
	
	$date = date("j F Y");
	   try {
          if($_POST['edit_type'] == 'NameEdit'){
			   //speaker Name
			   $name_q = "INSERT INTO ".$entity."_name SET speaker_name = :speaker_name, speaker_id = :id";
			   $name = $this->pdo->prepare($name_q);
			   
			   $name->bindValue(':speaker_name', $_POST['new_data'], \PDO::PARAM_STR);
			   $name->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
			   $name->execute();
	  
				  $name_id = $this->pdo->lastInsertId();
				  
				  
				  $sTag = explode(" ", $_POST['new_data']); 
				  
				  if(isset($sTag[1])) {
					   $speaker_tag = $this->clean_str(ucfirst($sTag[1]).ucfirst($sTag[0][0]));
				   } else {
					   $speaker_tag = $this->clean_str(ucfirst($_POST['new_data'])); 
				   }		  
				  
				 
				  
				  $rand_num = mt_rand(1,9999);
				  $speaker_tag .= $rand_num;
				  
				  						   //speaker tag
			   $tag_q = "INSERT INTO ".$entity."_tag SET speaker_tag = :speaker_tag, speaker_id = :id";
			   $tag = $this->pdo->prepare($tag_q);
			   
			   $tag->bindValue(':speaker_tag', $speaker_tag, \PDO::PARAM_STR);
			   $tag->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
			   $tag->execute();
	  
				  $tag_id = $this->pdo->lastInsertId();
		 }
		
	/*	
		if ($_POST['edit_type'] == 'BioEdit'){	
		
			  //speaker Bio	
			   $bio_q = "INSERT INTO speakers_bio SET speaker_bio = :bio, speaker_id = :id";
			   $bio = $this->pdo->prepare($bio_q);
			   
			  
			   $bio->bindValue(':bio', $_POST['body'], \PDO::PARAM_STR);
	  
			   $bio->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
			   
			   $bio->execute();
			   
				  $bio_id = $this->pdo->lastInsertId();
			
		  }
		  
		  */
		  
		if ($_POST['edit_type'] == 'TitleEdit'){	

			
				//speaker URL	
				 $link_q = "INSERT INTO ".$entity."_title SET title = :title, speaker_id = :id";
				 $link = $this->pdo->prepare($link_q);
				 
				 $link->bindValue(':title', $_POST['new_data'], \PDO::PARAM_STR);
				 $link->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
				 
				 $link->execute();
				 
					$title_id = $this->pdo->lastInsertId();
		
		  }
		  
		  
		  	//-----------------
	   //Company Data	 
		 
		 if ($_POST['edit_type'] == 'CompanyNameEdit'){	
		  

			   
						 //company Name
			 $company_name_q = "INSERT INTO ".$entity."_company_name SET company_name = :company_name, speaker_company_id = :id";
			 $company_name = $this->pdo->prepare($company_name_q);
			 
			 $company_name->bindValue(':company_name', $_POST['new_data'], \PDO::PARAM_STR);
			 $company_name->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
			 $company_name->execute();
	
				$company_name_id = $this->pdo->lastInsertId();
				  
			
			
		 }
		  

		  
		  	 if ($_POST['edit_type'] == 'CompanyWebsiteEdit'){		
				
						  if (strpos($_POST['new_data'], 'http') === FALSE && $_POST['new_data'] != '') {
							  $url = 'http://'.$_POST['new_data'];
						  } else {
							  $url = $_POST['new_data'];
						  }
		  
							  //compamy websote
					   $website_q = "INSERT INTO ".$entity."_company_website SET company_website = :website, speaker_company_id = :id";
					   $website = $this->pdo->prepare($website_q);
					   
					   $website->bindValue(':website', $url, \PDO::PARAM_STR);
					   $website->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
					   
					   $website->execute();
					   
						  $website_id = $this->pdo->lastInsertId(); 	
			
			
		          }
				  
				  
			 if (isset($company_name_id) || isset($website_id)){
				 
				 $CurrentPHPTimeStamp = date('Y-m-d G:i:s');
				 	
		 
				 //Sponsor date connection
				$connection_q = "UPDATE ".$entity."_company_data_connection SET date = :new_date";
	
				  
				 if (isset($company_name_id)) {
					   $connection_q .=", speaker_company_name_id = :nameid";
				 }
				 
				 if (isset($website_id)){
					   $connection_q .=", speaker_company_website_id = :website";
				 }
				 

				 
				 
				$connection_q .= " WHERE speaker_company_id = :id";
				
				 $connection = $this->pdo->prepare($connection_q);
				 
				 $connection->bindValue(':new_date', $CurrentPHPTimeStamp, \PDO::PARAM_STR);
				 
				  if (isset($company_name_id)) {
				     $connection->bindValue(':nameid', $company_name_id, \PDO::PARAM_INT);
				  }
				  
				  if (isset($website_id)){
				     $connection->bindValue(':website', $website_id, \PDO::PARAM_INT);
				  }
				  

				 $connection->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
				 
				 $connection->execute();
				 
					$company_connection_id = $this->pdo->lastInsertId();

		 }
				  
		  
		  //---------------
		    //End Company Data
		  

		 
		  if ($_POST['edit_type'] == 'StatusEdit'){
			
					  //speaker Status
			   $status_q = "UPDATE ".$entity."_status SET speaker_status_id = '0' WHERE speaker_id = :id";
			   $status = $this->pdo->prepare($status_q);
	  
			   $status->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
			   
			   $status->execute();
			   
			   $text = "Deleted";
			   
			   return $text;
		 
		  }
		 		
		if (isset($bio_id) || isset($name_id) || isset($title_id) || isset($tag_id)){	
		
		$CurrentPHPTimeStamp = date('Y-m-d G:i:s');
		 
				 //speaker date connection
				$connection_q = "UPDATE ".$entity."_data_connection SET date = :new_date";
				 
				 if (isset($bio_id)) {
					   $connection_q .=", speaker_bio_id = :bio";

				 }
				 
				 if (isset($name_id)){
					   $connection_q .=", speaker_name_id = :name";
					   $connection_q .=", speaker_tag_id = :tag";
				 }
				 
				 
				 if (isset($title_id)){
					   $connection_q .=", speaker_title_id = :title";
				 }
				 
				 
				$connection_q .= " WHERE speaker_id = :id";
				
				 $connection = $this->pdo->prepare($connection_q);
				 
				 $connection->bindValue(':new_date', $CurrentPHPTimeStamp, \PDO::PARAM_STR);
				 
				  if (isset($bio_id)) {
				     $connection->bindValue(':bio', $bio_id, \PDO::PARAM_INT);
				  }
				  
				  if (isset($name_id)){
				     $connection->bindValue(':name', $name_id, \PDO::PARAM_INT);
					 $connection->bindValue(':tag', $tag_id, \PDO::PARAM_INT);
					   
				  }
				  
				  
				  if (isset($title_id)){
				     $connection->bindValue(':title', $title_id, \PDO::PARAM_INT);
				  }
				 
				 $connection->bindValue(':id', $speaker_id, \PDO::PARAM_INT);
				 
				 $connection->execute();
				 
					$connection_id = $speaker_id;

		  }
		 
		 if (isset($connection_id) || isset($company_connection_id)){
			 
			 
			  return "Whee";
			
		 } else {
			throw new \Exception('speakers_data_connection is not uploaded, by:'.$_SESSION['user_id']);   
		 }
		 
		 
		 
		 } catch (\PDOException $e) {
			 $contex[0] = $e->getFile();
			 $contex[1] = $e->getLine();
		   $this->log->addError($e->getMessage(), $contex);
	          }
			  
			  
		 catch (\Exception $e) {
			 $contex[0] = $e->getFile();
			 $contex[1] = $e->getLine();
		   $this->log->addError($e->getMessage(), $contex);
	          }
}

   }
	
}

/*
public function p_order($speaker, $order) {
	
						  //speaker Status
			   $status_q = "UPDATE speakers_order SET order_id = :order WHERE speaker_id = :id";
			   $status = $this->pdo->prepare($status_q);
	  
	           $status->bindValue(':order', $order, \PDO::PARAM_INT);
			   $status->bindValue(':id', $speaker, \PDO::PARAM_INT);
			   
			   $status->execute();
	
}
*/

public function press_order($entity_id, $speaker, $order) {
     if ($entity_id == 6){
		 $entity = "blogsquad";
	 }
	 
	 if ($entity_id == 7){
		$entity = 'analytics';
	 }
	
						  //speaker Status
			   $status_q = "UPDATE ".$entity."_mainpage_order SET order_id = :order WHERE speaker_id = :id";
			   $status = $this->pdo->prepare($status_q);
	  
	           $status->bindValue(':order', $order, \PDO::PARAM_INT);
			   $status->bindValue(':id', $speaker, \PDO::PARAM_INT);
			   
			   $status->execute();
	
}

public function press_mainpage($entity_id, $sId, $val) {
	
	  if ($entity_id == 6){
		 $entity = "blogsquad";
	 }
	 
	 if ($entity_id == 7){
		$entity = 'analytics';
	 }
					 						
				 $mainpage_q = "SELECT id FROM ".$entity."_mainpage WHERE speaker_id = :id ORDER BY date LIMIT 0,1";
				 $mainpage = $this->pdo->prepare($mainpage_q);
				 
				 $mainpage->bindValue(':id', $sId, \PDO::PARAM_INT);
				 
				 $mainpage->execute();
				 
				 if ($mainpage->rowCount() > 0) {
					$main_id = $mainpage->fetch();
					
				 } 
				 
				 //if the user wants to delete the speaker from the main page
		if ($val == 0) {
			
			if (isset($main_id[0])){
							    
				   $delete_q = "DELETE FROM ".$entity."_mainpage WHERE id = :id";
				   $delete = $this->pdo->prepare($delete_q);
				   
				   $delete->bindValue(':id', $main_id[0], \PDO::PARAM_INT);
				   $delete->execute();
				   
				   
				   $delete_order_q = "DELETE FROM ".$entity."_mainpage_order WHERE speaker_id = :id";
				   $delete_order = $this->pdo->prepare($delete_order_q);
				   
				   $delete_order->bindValue(':id', $sId, \PDO::PARAM_INT);
				   $delete_order->execute();
				
				
			}
			
		}//if val == 0
		
		
	 if ($val == 1) {
		 if (!isset($main_id[0])){
									  
				   $website_q = "INSERT INTO ".$entity."_mainpage SET speaker_id = :id";
				   $website = $this->pdo->prepare($website_q);
				   
				   $website->bindValue(':id', $sId, \PDO::PARAM_INT);
				   
				   $website->execute();
				   
				   
				 $order_q = "SELECT id FROM ".$entity."_mainpage_order";
				 $order = $this->pdo->prepare($order_q);

				 $order->execute();
				 
				 if ($order->rowCount() > 0) {
					$order_num = $order->rowCount();
					$order_num++;
				 } else {
					 $order_num = 1;
				 }
				   
				   
				   $website_q = "INSERT INTO ".$entity."_mainpage_order SET speaker_id = :id, order_id = :order";
				   $website = $this->pdo->prepare($website_q);
				   
				   $website->bindValue(':id', $sId, \PDO::PARAM_INT);
				   $website->bindValue(':order', $order_num, \PDO::PARAM_INT);
				   
				   $website->execute();

		 
		 
		 }
		 
	 }//if val == 1
	

	
}

public function press_bio() { 

if (isset($_POST['entity_id'])){

   if ($_POST['entity_id'] == 6){
		 $entity = "blogsquad";
	 }
	 
	 if ($_POST['entity_id'] == 7){
		$entity = 'analytics';
	 }
		
	
			     $order_q = "SELECT id FROM ".$entity."_mainpage_bio WHERE speaker_id= :id";
				 $order = $this->pdo->prepare($order_q);
                 $order->bindValue(':id', $_POST['sId'], \PDO::PARAM_INT);
				 $order->execute();
				 
				 if ($order->rowCount() > 0) {
					 							
														  //speaker Bio	
			   $bio_q = "UPDATE ".$entity."_mainpage_bio SET text = :bio WHERE speaker_id = :id";
			   $bio = $this->pdo->prepare($bio_q);
			   
			  
			   $bio->bindValue(':bio', $_POST['body'], \PDO::PARAM_STR);
	  
			   $bio->bindValue(':id', $_POST['sId'], \PDO::PARAM_INT);
			   
			   $bio->execute();
					 

				 } else {
									  //speaker Bio	
			   $bio_q = "INSERT INTO ".$entity."_mainpage_bio SET text = :bio, speaker_id = :id";
			   $bio = $this->pdo->prepare($bio_q);
			   
			  
			   $bio->bindValue(':bio', $_POST['body'], \PDO::PARAM_STR);
	  
			   $bio->bindValue(':id', $_POST['sId'], \PDO::PARAM_INT);
			   
			   $bio->execute();
					
					
				 }
	
}

			   
				 
}


/**********************
Agenda
***********************/
public function save_agenda() {


	$date = date("j F Y");
	   try {
	      $this->pdo->beginTransaction();
		  
  		  if (isset($_POST['title'])){
			   //session
			   $session_q = "INSERT INTO agenda_session SET title = :name";
			   $session = $this->pdo->prepare($session_q);
			   
			   $session->bindValue(':name', $_POST['title'], \PDO::PARAM_STR);	
			   
				   
			   $session->execute();
			   $agenda_id = $this->pdo->lastInsertId(); 
			   
		  } else {
			throw new \Exception('Agenda Session Title is not set in the agenda upload by:'.$_SESSION['user_id']);  
		  }

           
			

		 //SessionName
		 $name_q = "INSERT INTO agenda_session_title SET title = :title";
		 $name = $this->pdo->prepare($name_q);
		 
		 $name->bindValue(':title', $_POST['title'], \PDO::PARAM_STR);
		 $name->execute();

		    $name_id = $this->pdo->lastInsertId();
			
			
		 $new_title = $this->clean_str2($_POST['title']);	
																//upload the new image
				 $new_link_q = "INSERT INTO agenda_session_url SET agenda_session_id = :id, agenda_url = :url";
				 $new_link = $this->pdo->prepare($new_link_q);
				 
				 $new_link->bindValue(':id', $agenda_id, \PDO::PARAM_INT);
				 $new_link->bindValue(':url', $new_title, \PDO::PARAM_STR);
				 
				 $new_link->execute();
							
		
		
		
		if (isset($_POST['description'])){	
		
		
			  //Session Bio	
			   $bio_q = "INSERT INTO agenda_session_description SET text = :bio";
			   $bio = $this->pdo->prepare($bio_q);
			   
			  
			   $bio->bindValue(':bio', $_POST['description'], \PDO::PARAM_STR);

			   $bio->execute();
			   
				  $bio_id = $this->pdo->lastInsertId();
			
		  }else {
			throw new Exception('Agenda Description is not set in the agenda upload by:'.$_SESSION['user_id']);  
		  }
		  
		  
		  
		if ( isset($_POST['start_hour']) && isset($_POST['start_minute']) && isset($_POST['end_hour']) && isset($_POST['end_minute']) ){	
		
			
				//Sponsor URL	
				 $link_q = "INSERT INTO agenda_session_timeframe SET start_hour = :start_hour, start_minute = :start_minute, end_hour= :end_hour, end_minute= :end_minute ";
				 $link = $this->pdo->prepare($link_q);
				 
				 $link->bindValue(':start_hour', $_POST['start_hour'], \PDO::PARAM_INT);
				 $link->bindValue(':start_minute', $_POST['start_minute'], \PDO::PARAM_INT);
				 $link->bindValue(':end_hour', $_POST['end_hour'], \PDO::PARAM_INT);
				 $link->bindValue(':end_minute', $_POST['end_minute'], \PDO::PARAM_INT);
				 				 
				 $link->execute();
				 
					$timeframe_id = $this->pdo->lastInsertId();
		
		  }else {
			throw new \Exception('Agenda Timeframe is not set in the agenda upload by:'.$_SESSION['user_id']);  
		  }
		  
		 
		 
		 if ( isset($_POST['category']) && isset($_POST['day'])){	
		  
						//Sponsor Category
				 $category_q = "INSERT INTO agenda_category_connection SET agenda_category_id = :category, agenda_day = :day, agenda_session_id = :id";
				 $category = $this->pdo->prepare($category_q);
				 
				 $category->bindValue(':category', $_POST['category'], \PDO::PARAM_INT);
				 $category->bindValue(':day', $_POST['day'], \PDO::PARAM_INT);
				 $category->bindValue(':id', $agenda_id, \PDO::PARAM_INT);
				 
				 $category->execute();
				 
					$category_id = $this->pdo->lastInsertId(); 	
			
			
		 }else {
			throw new \Exception('Agenda Session category is not set in the agenda upload by:'.$_SESSION['user_id']);  
		  }
		  	
			
		
			 if ( isset($_POST['speakers']) && $_POST['speakers'] != ''){
				 
				 $speakers = explode('|', $_POST['speakers']);
				 	
		         foreach ($speakers as $speaker){
					
					if ($speaker != 0){ 
							  //Speaker Connection
					   $agenda_speaker_q = "INSERT INTO agenda_session_speaker_connection SET speaker_id = :speaker, agenda_session_id = :id";
					   $agenda_speaker = $this->pdo->prepare($agenda_speaker_q);
					   
					   $agenda_speaker->bindValue(':speaker', $speaker, \PDO::PARAM_INT);
					   $agenda_speaker->bindValue(':id', $agenda_id, \PDO::PARAM_INT);
					   
					   $agenda_speaker->execute();
					   
					}
						  
				 }
			
			
		 }
			

			
				//Sponsor Status
		 $status_q = "INSERT INTO agenda_session_status SET status = '1', agenda_session_id = :id";
		 $status = $this->pdo->prepare($status_q);

		 $status->bindValue(':id', $agenda_id, \PDO::PARAM_INT);
		 
		 $status->execute();
		 
		 
		 
		 		
			 if (isset($agenda_id) && isset($bio_id) && isset($name_id) && isset($_POST['type']) && isset($timeframe_id)){	
		 
				 //Sponsor date connection
				 $connection_q = "INSERT INTO agenda_session_data_connection SET agenda_session_id = :id, agenda_description_id = :bio, agenda_title_id = :name, agenda_type_id = :type, agenda_timeframe_id = :time";
				 $connection = $this->pdo->prepare($connection_q);
				 
				 $connection->bindValue(':id', $agenda_id, \PDO::PARAM_INT);
				 $connection->bindValue(':bio', $bio_id, \PDO::PARAM_INT);
				 $connection->bindValue(':name', $name_id, \PDO::PARAM_INT);
				 $connection->bindValue(':type', $_POST['type'], \PDO::PARAM_INT);
				 $connection->bindValue(':time', $timeframe_id, \PDO::PARAM_INT);
				 
				 $connection->execute();
				 
					$connection_id = $this->pdo->lastInsertId();

		 }else {
			throw new \Exception('Something is not set in the agenda upload connection query: a_id: '.$_POST['type'].' /by:'.$_SESSION['user_id']);  
		  }

		 
		 $this->pdo->commit();
		 
		 if (isset($connection_id)){

			 
			  return $connection_id;
			
		 } else {
			throw new Exception('Agenda Session is not uploaded, by:'.$_SESSION['user_id']);   
		 }
		 
		 
		 
		 } catch (\PDOException $e) {
			 $contex[0] = $e->getFile();
			 $contex[1] = $e->getLine();
			 
		   $this->log->addError($e->getMessage(), $contex);
	          }
			  
			  
		 catch (\Exception $e) {
			 $contex[0] = $e->getFile();
			 $contex[1] = $e->getLine();
		   $this->log->addError($e->getMessage(), $contex);
	          }

	
}



public function modify_session_abstract($agenda_id) {
	
	    $this->pdo->beginTransaction();
	
				  //Session Bio	
			   $bio_q = "INSERT INTO agenda_session_description SET text = :bio";
			   $bio = $this->pdo->prepare($bio_q);
			   
			  
			   $bio->bindValue(':bio', $_POST['body'], \PDO::PARAM_STR);

			   $bio->execute();
			   
				  $bio_id = $this->pdo->lastInsertId();
				  
				  
				  
						 //Sponsor date connection
			 $connection_q = "UPDATE agenda_session_data_connection SET agenda_description_id = :bio WHERE agenda_session_id = :id";
			 $connection = $this->pdo->prepare($connection_q);
			 
			
			 $connection->bindValue(':bio', $bio_id, \PDO::PARAM_INT);
			 $connection->bindValue(':id', $agenda_id, \PDO::PARAM_INT);
			 
			 $connection->execute();
			 
		 $this->pdo->commit();	
	  
	
}


public function add_speaker_to_session($agenda_id, $speaker_id) {
			if (isset($speaker_id) && $speaker_id != 0 && isset($agenda_id) && $agenda_id != 0){ 
							  //Speaker Connection
					   $agenda_speaker_q = "INSERT INTO agenda_session_speaker_connection SET speaker_id = :speaker, agenda_session_id = :id";
					   $agenda_speaker = $this->pdo->prepare($agenda_speaker_q);
					   
					   $agenda_speaker->bindValue(':speaker', $speaker_id, \PDO::PARAM_INT);
					   $agenda_speaker->bindValue(':id', $agenda_id, \PDO::PARAM_INT);
					   
					   $agenda_speaker->execute();
					   
					}
						  
				
	
	
}

public function delete_speaker_from_session($agenda_id, $speaker_id) {
			if (isset($speaker_id) && $speaker_id != 0 && isset($agenda_id) && $agenda_id != 0){ 
			
					 $agenda_speakers_q = "SELECT id FROM agenda_session_speaker_connection WHERE speaker_id = :speaker AND agenda_session_id = :id";	
								  
					   $agenda_speakers = $this->pdo->prepare($agenda_speakers_q);
					   $agenda_speakers->bindValue(':speaker', $speaker_id, \PDO::PARAM_INT);
					   $agenda_speakers->bindValue(':id', $agenda_id, \PDO::PARAM_INT);
					   $agenda_speakers->execute();
			  
						  if ($agenda_speakers->rowCount() > 0) {
								  while($as = $agenda_speakers->fetch()){

								   $delete_speaker_q = "DELETE FROM agenda_session_speaker_connection WHERE id = :id";
								   $delete_speaker = $this->pdo->prepare($delete_speaker_q);

								   $delete_speaker->bindValue(':id', $as['id'], \PDO::PARAM_INT);
								   
								   $delete_speaker->execute();
								   
								
					   
								  }
								  
						  }
					   
					   
					}//if isset speaker and agenda id
						  
				
	
	
}

 public function modify_session_time($agenda_id, $type, $time) {
    if (isset($agenda_id) && $agenda_id != 0 && isset($type) && isset($time) && $time != '') {
		
			   $agenda_timeframe_q = "SELECT agenda_timeframe_id FROM agenda_session_data_connection WHERE agenda_session_id = :id";	
						  
			   $agenda_timeframe = $this->pdo->prepare($agenda_timeframe_q);
			   $agenda_timeframe->bindValue(':id', $agenda_id, \PDO::PARAM_INT);
			   $agenda_timeframe->execute();
	  
				  if ($agenda_timeframe->rowCount() > 0) {
						  $timeframe_id = $agenda_timeframe->fetch();
					
						  
				  }
				  
		if (isset($timeframe_id)){
		
			 switch ($type) {
				case 'StartHour':
				
				   $agenda_time_q = "UPDATE agenda_session_timeframe SET start_hour = :time WHERE id = :id";			  
				   $agenda_time = $this->pdo->prepare($agenda_time_q);
				   $agenda_time->bindValue(':time', $time, \PDO::PARAM_INT);
				   $agenda_time->bindValue(':id', $timeframe_id['agenda_timeframe_id'], \PDO::PARAM_INT);
				   $agenda_time->execute();
				
					
					break;
				case 'StartMinute':
				
				   $agenda_time_q = "UPDATE agenda_session_timeframe SET start_minute = :time WHERE id = :id";			  
				   $agenda_time = $this->pdo->prepare($agenda_time_q);
				   $agenda_time->bindValue(':time', $time, \PDO::PARAM_INT);
				   $agenda_time->bindValue(':id', $timeframe_id['agenda_timeframe_id'], \PDO::PARAM_INT);
				   $agenda_time->execute();				
					
					break;
				case 'EndHour':

				   $agenda_time_q = "UPDATE agenda_session_timeframe SET end_hour = :time WHERE id = :id";			  
				   $agenda_time = $this->pdo->prepare($agenda_time_q);
				   $agenda_time->bindValue(':time', $time, \PDO::PARAM_INT);
				   $agenda_time->bindValue(':id', $timeframe_id['agenda_timeframe_id'], \PDO::PARAM_INT);
				   $agenda_time->execute();
				   					
					break;
				case 'EndMinute':

				   $agenda_time_q = "UPDATE agenda_session_timeframe SET end_minute = :time WHERE id = :id";			  
				   $agenda_time = $this->pdo->prepare($agenda_time_q);
				   $agenda_time->bindValue(':time', $time, \PDO::PARAM_INT);
				   $agenda_time->bindValue(':id', $timeframe_id['agenda_timeframe_id'], \PDO::PARAM_INT);
				   $agenda_time->execute();
				   					
					break;					
					
			}
		return 'Success';	
		
		}//isset timeframe id
		
	}//isset agenda, type and time id
	
 }


public function modify_session_title($agenda_id, $value) {
		    $this->pdo->beginTransaction();
	
		 $name_q = "INSERT INTO agenda_session_title SET title = :title";
		 $name = $this->pdo->prepare($name_q);
		 
		 $name->bindValue(':title', $value, \PDO::PARAM_STR);
		 $name->execute();

		    $name_id = $this->pdo->lastInsertId();
				  
				  
				  
						 //Sponsor date connection
			 $connection_q = "UPDATE agenda_session_data_connection SET agenda_title_id = :title WHERE agenda_session_id = :id";
			 $connection = $this->pdo->prepare($connection_q);
			 
			
			 $connection->bindValue(':title', $name_id, \PDO::PARAM_INT);
			 $connection->bindValue(':id', $agenda_id, \PDO::PARAM_INT);
			 
			 $connection->execute();
			/* 
              $new_title = $this->clean_str2($value);
														//upload the new image
				 $new_link_q = "UPDATE agenda_session_url SET agenda_url = :url WHERE agenda_session_id = :id";
				 $new_link = $this->pdo->prepare($new_link_q);
				 
				 $new_link->bindValue(':url', $new_title, \PDO::PARAM_STR);
				 $new_link->bindValue(':id', $agenda_id, \PDO::PARAM_INT);
				 
				 $new_link->execute();
				*/						 
			 
		 $this->pdo->commit();	
	  
	
	
}


public function modify_session_category($agenda_id, $category) {
	            if (isset($agenda_id) && $agenda_id != 0 && isset($category) && $category != '') {
					
				   $agenda_category_q = "UPDATE agenda_category_connection SET agenda_category_id = :cat WHERE agenda_session_id = :id";			  
				   $agenda_category = $this->pdo->prepare($agenda_category_q);
				   $agenda_category->bindValue(':cat', $category, \PDO::PARAM_INT);
				   $agenda_category->bindValue(':id', $agenda_id, \PDO::PARAM_INT);
				   $agenda_category->execute();	
				   
	             return 'Success';   
				       
               }
						
   }
   
public function modify_session_day($agenda_id, $day) {
	            if (isset($agenda_id) && $agenda_id != 0 && isset($day) && $day != '') {
					
				   $agenda_time_q = "UPDATE agenda_category_connection SET agenda_day = :day WHERE agenda_session_id = :id";			  
				   $agenda_time = $this->pdo->prepare($agenda_time_q);
				   $agenda_time->bindValue(':day', $day, \PDO::PARAM_INT);
				   $agenda_time->bindValue(':id', $agenda_id, \PDO::PARAM_INT);
				   $agenda_time->execute();	
				   
	             return 'Success';   
				       
               }
						
   }  
   
   
public function delete_session($agenda_id) {
	            if (isset($agenda_id) && $agenda_id != 0) {
					
				   $agenda_delete_q = "UPDATE agenda_session_status SET status=0 WHERE agenda_session_id = :id";			  
				   $agenda_delete = $this->pdo->prepare($agenda_delete_q);
				   $agenda_delete->bindValue(':id', $agenda_id, \PDO::PARAM_INT);
				   $agenda_delete->execute();	
				   
	             return 'Success';   
				       
               }
						
   } 
   
public function change_testimonial_type($day, $category, $block_num, $type) {
	
		//we get the data from the db first 
		$block_q = "SELECT id, type FROM agenda_block_display WHERE agenda_category_id= :category AND agenda_day= :day AND block = :block";	
					
		$block = $this->pdo->prepare($block_q);
		$block->bindValue(':category', $category, \PDO::PARAM_INT);
		$block->bindValue(':day', $day, \PDO::PARAM_INT);
		$block->bindValue(':block', $block_num, \PDO::PARAM_INT);
		$block->execute();

			if ($block->rowCount() > 0) {
				
				
				$i = 0;
				
				while($temp_data = $block->fetch()){
					$data[$i]['id'] = $temp_data['id'];
					$data[$i]['type'] = $temp_data['type'];
					
				}
				
			}
					
			
					
		  switch ($type) {
			  
			case 1:
			  //Random
				  if (isset($data[0]['id']) && $data[0]['id'] != ''){
					   //if there is a record, we delete them from the db
					   
					  foreach ($data as $element) {
						  	   $delete_q = "DELETE FROM agenda_block_entities WHERE agenda_block_id = :id";			  
							   $delete = $this->pdo->prepare($delete_q);
							   $delete->bindValue(':id', $element['id'], \PDO::PARAM_INT);
							   $delete->execute();	
						  
						  
							   $delete_q = "DELETE FROM agenda_block_display WHERE id = :id";			  
							   $delete = $this->pdo->prepare($delete_q);
							   $delete->bindValue(':id', $element['id'], \PDO::PARAM_INT);
							   $delete->execute();	
						  
						  
					  }//foreach end
					   
				
				  }//if isset data end
				
				break;
			case 2:
			 //Prefered
			         //if there is an option there and it's fixed
				  if (isset($data[0]['id']) && $data[0]['type'] == 3){
						   $block_update_q = "UPDATE agenda_block_display SET type=2 WHERE id = :id";			  
						   $block_update = $this->pdo->prepare($block_update_q);
						   $block_update->bindValue(':id', $data[0]['id'], \PDO::PARAM_INT);
						   $block_update->execute();	
						   
						  $delete_q = "DELETE FROM agenda_block_entities WHERE agenda_block_id = :id";			  
						   $delete = $this->pdo->prepare($delete_q);
						   $delete->bindValue(':id', $data[0]['id'], \PDO::PARAM_INT);
						   $delete->execute();
						
					  
				  }
				  
				   if (!isset($data[0]['id'])){
				  							  //Speaker Connection
					   $insert_block_q = "INSERT INTO agenda_block_display SET agenda_category_id = :category, agenda_day = :day, block = :block, type=2";
					   $insert_block = $this->pdo->prepare($insert_block_q);
					   $insert_block->bindValue(':category', $category, \PDO::PARAM_INT);
					   $insert_block->bindValue(':day', $day, \PDO::PARAM_INT);
					   $insert_block->bindValue(':block', $block_num, \PDO::PARAM_INT);
					   $insert_block->execute();
				  
				   }
			   
				break;
			case 3:
			 //Fixed
			    if (isset($data[0]['id']) && $data[0]['type'] == 2){
					foreach ($data as $element) {
							  $delete_q = "DELETE FROM agenda_block_entities WHERE agenda_block_id = :id";			  
							   $delete = $this->pdo->prepare($delete_q);
							   $delete->bindValue(':id', $element['id'], \PDO::PARAM_INT);
							   $delete->execute();
						
						  
						   $block_update_q = "UPDATE agenda_block_display SET type=3 WHERE id = :id";			  
						   $block_update = $this->pdo->prepare($block_update_q);
						   $block_update->bindValue(':id', $element['id'], \PDO::PARAM_INT);
						   $block_update->execute();	
						  
						  
					  }//foreach end

				}
			 
			 	  if (!isset($data[0]['id'])){
				  							  //Speaker Connection
					   $insert_block_q = "INSERT INTO agenda_block_display SET agenda_category_id = :category, agenda_day = :day, block = :block, type=3";
					   $insert_block = $this->pdo->prepare($insert_block_q);
					   $insert_block->bindValue(':category', $category, \PDO::PARAM_INT);
					   $insert_block->bindValue(':day', $day, \PDO::PARAM_INT);
					   $insert_block->bindValue(':block', $block_num, \PDO::PARAM_INT);
					   $insert_block->execute();
				  
				   }
			   
				break;
				
				
		  }//end switch type	
					
	
}

public function add_speaker_to_testimonial($block_id, $speaker_id, $type, $entity_type) {
	
		//we get the data from the db first 
		$block_q = "SELECT agenda_category_id, agenda_day, block FROM agenda_block_display WHERE id = :id";	
					
		$block = $this->pdo->prepare($block_q);
		$block->bindValue(':id', $block_id, \PDO::PARAM_INT);
		$block->execute();

			if ($block->rowCount() > 0) {
				
				
				$i = 0;
				
				while($temp_data = $block->fetch()){
					$output['agenda_category_id'] = $temp_data['agenda_category_id'];
					$output['agenda_day'] = $temp_data['agenda_day'];
					$output['block'] = $temp_data['block'];
				}
				
			}
			
if ($type == 3)	{			
			  						//we get the data from the db first 
				$speaker_q = "SELECT id, entity_id, entity_type_id FROM agenda_block_entities WHERE agenda_block_id = :id";	
							
				$speaker = $this->pdo->prepare($speaker_q);
				$speaker->bindValue(':id', $block_id, \PDO::PARAM_INT);
				$speaker->execute();
		
					if ($speaker->rowCount() > 0) {

						while($speaker_data = $speaker->fetch()){
							if ($speaker_data['entity_type_id'] == $entity_type){
								
								   $delete_q = "DELETE FROM agenda_block_entities WHERE id = :id";			  
								   $delete = $this->pdo->prepare($delete_q);
								   $delete->bindValue(':id', $speaker_data['id'], \PDO::PARAM_INT);
								   $delete->execute();
								
								
							}
							
							
						}
						
					}
				
		  }//if type == 3
			
			
					   $insert_block_q = "INSERT INTO agenda_block_entities SET entity_id = :speaker, entity_type_id= :entity_type, agenda_block_id= :block";
					   $insert_block = $this->pdo->prepare($insert_block_q);
					   $insert_block->bindValue(':speaker', $speaker_id, \PDO::PARAM_INT);
					   $insert_block->bindValue(':entity_type', $entity_type, \PDO::PARAM_INT);
					   $insert_block->bindValue(':block', $block_id, \PDO::PARAM_INT);
					   
					   $insert_block->execute();	
					
  return $output;	
}

public function delete_speaker_from_testimonial($block_id, $speaker_id, $type, $entity_type) {
	
		//we get the data from the db first 
		$block_q = "SELECT agenda_category_id, agenda_day, block FROM agenda_block_display WHERE id = :id";	
					
		$block = $this->pdo->prepare($block_q);
		$block->bindValue(':id', $block_id, \PDO::PARAM_INT);
		$block->execute();

			if ($block->rowCount() > 0) {
				
				
				$i = 0;
				
				while($temp_data = $block->fetch()){
					$output['agenda_category_id'] = $temp_data['agenda_category_id'];
					$output['agenda_day'] = $temp_data['agenda_day'];
					$output['block'] = $temp_data['block'];
				}
				
			}
			
			
			  						//we get the data from the db first 
				$speaker_q = "SELECT id FROM agenda_block_entities WHERE agenda_block_id = :id AND entity_id = :speaker_id AND entity_type_id = :entity_type";	
							
				$speaker = $this->pdo->prepare($speaker_q);
				$speaker->bindValue(':id', $block_id, \PDO::PARAM_INT);
				$speaker->bindValue(':speaker_id', $speaker_id, \PDO::PARAM_INT);
				$speaker->bindValue(':entity_type', $entity_type, \PDO::PARAM_INT);
				
				$speaker->execute();
		
					if ($speaker->rowCount() > 0) {

						while($speaker_data = $speaker->fetch()){

								   $delete_q = "DELETE FROM agenda_block_entities WHERE id = :id";			  
								   $delete = $this->pdo->prepare($delete_q);
								   $delete->bindValue(':id', $speaker_data['id'], \PDO::PARAM_INT);
								   $delete->execute();

							
							
						}
						
					}
				
		
					
  return $output;	
}



public function add_new_quote($author) {
	
     $text = strip_tags($_POST['body']);
	
				  //add new quote
			   $bio_q = "INSERT INTO agenda_quote SET author = :author, quote = :quote";
			   $bio = $this->pdo->prepare($bio_q);
			   
			   $bio->bindValue(':author', $author, \PDO::PARAM_STR);
			   $bio->bindValue(':quote', $text, \PDO::PARAM_STR);

			   $bio->execute();

 return 'asd';
}


public function edit_quote($id) {
	
     $text = strip_tags($_POST['body']);
	
				  //add new quote
			   $bio_q = "UPDATE agenda_quote SET author = :author, quote = :quote WHERE id = :id";
			   $bio = $this->pdo->prepare($bio_q);
			   
			   $bio->bindValue(':author', $_POST['author'], \PDO::PARAM_STR);
			   $bio->bindValue(':quote', $text, \PDO::PARAM_STR);
			   $bio->bindValue(':id', $id, \PDO::PARAM_INT);

			   $bio->execute();

 return 'asd';
}

public function change_agenda_sponsor_type($day, $category, $type) {
	
		//we get the data from the db first 
		$block_q = "SELECT id, type FROM agenda_sponsor_display WHERE agenda_category_id= :category AND agenda_day= :day";	
					
		$block = $this->pdo->prepare($block_q);
		$block->bindValue(':category', $category, \PDO::PARAM_INT);
		$block->bindValue(':day', $day, \PDO::PARAM_INT);
		$block->execute();

			if ($block->rowCount() > 0) {
				
				
				$i = 0;
				
				while($temp_data = $block->fetch()){
					$data[$i]['id'] = $temp_data['id'];
					$data[$i]['type'] = $temp_data['type'];
					
				}
				
			}
					
			
					
		  switch ($type) {
			  
			case 1:
			  //Random
				  if (isset($data[0]['id']) && $data[0]['id'] != ''){
					   //if there is a record, we delete them from the db
					   
					  foreach ($data as $element) {
						  	   $delete_q = "DELETE FROM agenda_sponsor_connection WHERE agenda_sponsor_display_id = :id";			  
							   $delete = $this->pdo->prepare($delete_q);
							   $delete->bindValue(':id', $element['id'], \PDO::PARAM_INT);
							   $delete->execute();	
						  
						  
							   $delete_q = "DELETE FROM agenda_sponsor_display WHERE id = :id";			  
							   $delete = $this->pdo->prepare($delete_q);
							   $delete->bindValue(':id', $element['id'], \PDO::PARAM_INT);
							   $delete->execute();	
						  
						  
					  }//foreach end
					   
				
				  }//if isset data end
				
				break;
			case 2:
			 //Prefered
			         //if there is an option there and it's fixed
				  if (isset($data[0]['id']) && $data[0]['type'] == 3){
						   $block_update_q = "UPDATE agenda_sponsor_display SET type=2 WHERE id = :id";			  
						   $block_update = $this->pdo->prepare($block_update_q);
						   $block_update->bindValue(':id', $data[0]['id'], \PDO::PARAM_INT);
						   $block_update->execute();	
						   
						  $delete_q = "DELETE FROM agenda_sponsor_connection WHERE agenda_sponsor_display_id = :id";			  
						   $delete = $this->pdo->prepare($delete_q);
						   $delete->bindValue(':id', $data[0]['id'], \PDO::PARAM_INT);
						   $delete->execute();
						
					  
				  }
				  
				   if (!isset($data[0]['id'])){
				  							  //Speaker Connection
					   $insert_block_q = "INSERT INTO agenda_sponsor_display SET agenda_category_id = :category, agenda_day = :day, type=2";
					   $insert_block = $this->pdo->prepare($insert_block_q);
					   $insert_block->bindValue(':category', $category, \PDO::PARAM_INT);
					   $insert_block->bindValue(':day', $day, \PDO::PARAM_INT);
					   $insert_block->execute();
				  
				   }
			   
				break;
			case 3:
			 //Fixed
			    if (isset($data[0]['id']) && $data[0]['type'] == 2){
					foreach ($data as $element) {
							  $delete_q = "DELETE FROM agenda_sponsor_connection WHERE agenda_sponsor_display_id = :id";			  
							   $delete = $this->pdo->prepare($delete_q);
							   $delete->bindValue(':id', $element['id'], \PDO::PARAM_INT);
							   $delete->execute();
						
						  
						   $block_update_q = "UPDATE agenda_sponsor_display SET type=3 WHERE id = :id";			  
						   $block_update = $this->pdo->prepare($block_update_q);
						   $block_update->bindValue(':id', $element['id'], \PDO::PARAM_INT);
						   $block_update->execute();	
						  
						  
					  }//foreach end

				}
			 
			 	  if (!isset($data[0]['id'])){
				  							  //Speaker Connection
					   $insert_block_q = "INSERT INTO agenda_sponsor_display SET agenda_category_id = :category, agenda_day = :day, type=3";
					   $insert_block = $this->pdo->prepare($insert_block_q);
					   $insert_block->bindValue(':category', $category, \PDO::PARAM_INT);
					   $insert_block->bindValue(':day', $day, \PDO::PARAM_INT);
					   $insert_block->execute();
				  
				   }
			   
				break;
				
				
		  }//end switch type	
					
	
}

public function add_sponsor_to_agenda($block_id, $sponsor_id, $type) {
	
		//we get the data from the db first 
		$block_q = "SELECT agenda_category_id, agenda_day FROM agenda_sponsor_display WHERE id = :id";	
					
		$block = $this->pdo->prepare($block_q);
		$block->bindValue(':id', $block_id, \PDO::PARAM_INT);
		$block->execute();

			if ($block->rowCount() > 0) {
				
				
				$i = 0;
				
				while($temp_data = $block->fetch()){
					$output['agenda_category_id'] = $temp_data['agenda_category_id'];
					$output['agenda_day'] = $temp_data['agenda_day'];
				}
				
			}
			

			
			
					   $insert_block_q = "INSERT INTO agenda_sponsor_connection SET sponsor_id = :sponsor, agenda_sponsor_display_id= :block";
					   $insert_block = $this->pdo->prepare($insert_block_q);
					   $insert_block->bindValue(':sponsor', $sponsor_id, \PDO::PARAM_INT);
					   $insert_block->bindValue(':block', $block_id, \PDO::PARAM_INT);
					   
					   $insert_block->execute();	
					
  return $output;	
}

public function delete_sponsor_from_agenda($day, $category, $sponsor_id) {
	

			
			  						//we get the data from the db first 
				$sponsor_q = "SELECT id FROM agenda_sponsor_display WHERE agenda_day = :day AND agenda_category_id = :category";	
							
				$sponsor = $this->pdo->prepare($sponsor_q);
				$sponsor->bindValue(':day', $day, \PDO::PARAM_INT);
				$sponsor->bindValue(':category', $category, \PDO::PARAM_INT);
				$sponsor->execute();
		
					if ($sponsor->rowCount() > 0) {

						while($sponsor_data = $sponsor->fetch()){
							
								
								   $delete_q = "DELETE FROM agenda_sponsor_connection WHERE agenda_sponsor_display_id = :id AND sponsor_id = :sponsor";			  
								   $delete = $this->pdo->prepare($delete_q);
								   $delete->bindValue(':id', $sponsor_data['id'], \PDO::PARAM_INT);
								   $delete->bindValue(':sponsor', $sponsor_id, \PDO::PARAM_INT);
								   $delete->execute();
								

							
							
						}
						
					}
				
}

}
?>