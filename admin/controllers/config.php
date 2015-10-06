<?php
namespace HRNParis;
use HRNParis\connect as connect;
use HRNParis\Connection as connection;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require_once('SYS/aaa.php');
require_once('vendor/autoload.php');
require_once('connect.php');

 abstract class config extends connect\aaa{

	protected $dbc;
	protected $host = connect\aaa::HR_HOST;
    protected $user = connect\aaa::HR_USER; 
    protected $password = connect\aaa::HR_PASSWORD;
    protected $database = connect\aaa::HR_DATABASE;
	protected $port = 3306;
	protected $charset = 'utf8';
	protected $pdo;
	public $log;
	public $sitedir;
	public $eventlog;

	
  public function __construct() {
	  	 // create a error log channel
     $this->log = new Logger('HRNParis');
     $this->log->pushHandler(new StreamHandler(__DIR__ .'/errors/error.log', Logger::WARNING));
	 
	 $this->eventlog = new Logger('HRNParis');
     $this->eventlog->pushHandler(new StreamHandler(__DIR__ .'/eventlog/events.log', Logger::WARNING));
	  
	 try {
	 $pdo = connection\PDOConnection::instance();

     $this->pdo = $pdo->getConnection( 'mysql:host='.$this->host.';dbname='.$this->database, $this->user, $this->password);
	
		
	 } catch (\PDOException $e){
		  echo 'Database Connection Failed';
		   $this->log->addError($e->getMessage());
		  
		   exit;
	 }
	  
    $this->basedir = $_SERVER['DOCUMENT_ROOT'].'/HRNParis/';

 
 /*
 		// add records to the log
   $this->log->addWarning('Foo');
   $this->log->addError('Bar');
 
 */  
	  
  }


		  
      
		

                              //this is needed to decode the links from db :)
  public function social_link_decode ($sURL) {
	     $specialis_karekterek = array('HRNCT001'=>'&', 'HRNCT002'=>'@', 'HRNCT003'=>';', 'HRNCT004'=>' ', 'HRNCT005'=>'%', 'HRNCT006'=>'?', 'HRNCT007'=>'=','HRNCT008'=>'+', 'HRNCT009'=>'$');
    $data = strtr($sURL, $specialis_karekterek);
	 return $data;
 }	
 
 
protected function manage_notification($entity_type, $entity_id, $text, $status) {
	
	if ($status === 1 && $text !== '' && isset($entity_id) && isset($entity_type)){
		

		
				 $notification_q = "INSERT INTO notification_center SET notification_text = :text, status = :status";
				 $notification = $this->pdo->prepare($notification_q);
				 
				 $notification->bindValue(':text', $text, \PDO::PARAM_STR);
				 $notification->bindValue(':status', $status, \PDO::PARAM_INT);
				 
				 $notification->execute();
				 
				 $notification_id = $this->pdo->lastInsertId(); 
				 

				 $notification_connect_q = "INSERT INTO notification_center_connection SET notification_center_id = :id, entity_type_id = :type, entity_id = :entity";
				 $notification_connect = $this->pdo->prepare($notification_connect_q);
				 
				 $notification_connect->bindValue(':id', $notification_id, \PDO::PARAM_INT);
				 $notification_connect->bindValue(':type', $entity_type, \PDO::PARAM_INT);
				 $notification_connect->bindValue(':entity', $entity_id, \PDO::PARAM_INT);
				 
				 $notification_connect->execute();				 
				 

				 
	}
	

    if ($status === 0 && isset($entity_id) && isset($entity_type)){
		
				 $notification_q = "SELECT notification_center_id FROM notification_center_connection WHERE entity_id = :entity AND entity_type_id = :type ORDER BY date";
				 $notification = $this->pdo->prepare($notification_q);
				 
				 $notification->bindValue(':entity', $entity_id, \PDO::PARAM_INT);
				 $notification->bindValue(':type', $entity_type, \PDO::PARAM_INT);
				 
				 $notification->execute();
				 
				 if ($notification->rowCount() > 0) {
					$data = $notification->fetch();
					
				 } 
				 
				if (isset($data['notification_center_id'])){
						 $notification_q = "UPDATE notification_center SET status = :status WHERE id = :id";
						 $notification = $this->pdo->prepare($notification_q);
						 
						 $notification->bindValue(':status', $status, \PDO::PARAM_INT);
						 $notification->bindValue(':id', $data['notification_center_id'], \PDO::PARAM_INT);
						 
						 $notification->execute();
					
					
					
				}
		
		
	}
	
	
	
}


public function display_notifications() {
	$output = '';
	
	   $clean_str = function($string) {

		$specialis_karekterek = array('Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ő'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ű'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ő'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ű'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f');
		$string = strtolower(strtr($string, $specialis_karekterek));
		$string = preg_replace("/[^a-z0-9-_\.]/i", '', trim($string));
		if (strlen($string) == 0 || $string == '.' || $string == '..') {
			$string = 'Invalid name';
		}
		return $string;
								};
	
	
	
					 $notification_q = "SELECT nc.notification_text, ncc.entity_type_id, ncc.entity_id FROM notification_center as nc INNER JOIN notification_center_connection as ncc ON nc.id=ncc.notification_center_id WHERE nc.status = 1 ORDER BY nc.date DESC";
				 $notification = $this->pdo->prepare($notification_q);
				 
				 $notification->execute();
				 
				 if ($notification->rowCount() > 0) {
					 while($data = $notification->fetch()){
						 
						 switch ($data['entity_type_id']) {
							  case 1:
							  
									 $get_tag_q = "SELECT st.speaker_tag FROM speakers_tag as st INNER JOIN speakers_data_connection as sdc ON st.id=sdc.speaker_tag_id WHERE sdc.speaker_id= :id ORDER BY sdc.date DESC LIMIT 0,1";
									 $get_tag = $this->pdo->prepare($get_tag_q);
									 $get_tag->bindValue(':id', $data['entity_id'], \PDO::PARAM_INT);
									 $get_tag->execute();
									 
									 if ($get_tag->rowCount() > 0) {
										 $tag_data = $get_tag->fetch();
										 $tag = $tag_data['speaker_tag'];

									 }
										$output .= '<li><a href="speaker-profile/'.$tag.'">'.$data['notification_text'].'</a></li>';		  
								
								  break;
								  
								  
							  case 2:

							  
							  		 $get_tag_q = "SELECT sn.sponsor_name FROM sponsors_name as sn INNER JOIN sponsors_data_connection as sdc ON sn.id=sdc.sponsor_name_id WHERE sdc.sponsor_id= :id ORDER BY sdc.date DESC LIMIT 0,1";
									 $get_tag = $this->pdo->prepare($get_tag_q);
									 $get_tag->bindValue(':id', $data['entity_id'], \PDO::PARAM_INT);
									 $get_tag->execute();
									 
									 if ($get_tag->rowCount() > 0) {
										 $tag_data = $get_tag->fetch();
										 
										 
										 $tag = $clean_str($tag_data['sponsor_name']);
										 
									 }
							  
							     $output .= '<li><a href="sponsors#'.$tag.'">'.$data['notification_text'].'</a></li>';	
								  
								  break;

							  case 5:
							  
							  	    $get_tag_q = "SELECT sn.sponsor_name FROM mediapartners_name as sn INNER JOIN mediapartners_data_connection as sdc ON sn.id=sdc.sponsor_name_id WHERE sdc.sponsor_id= :id ORDER BY sdc.date DESC LIMIT 0,1";
									 $get_tag = $this->pdo->prepare($get_tag_q);
									 $get_tag->bindValue(':id', $data['entity_id'], \PDO::PARAM_INT);
									 $get_tag->execute();
									 
									 if ($get_tag->rowCount() > 0) {
										 $tag_data = $get_tag->fetch();
										 
										 
										 $tag = $clean_str($tag_data['sponsor_name']);
										 
									 }



							     $output .= '<li><a href="press#'.$tag.'Partner">'.$data['notification_text'].'</a></li>';	
								  
								  break;
								  
							  case 6:
							  
									 $get_tag_q = "SELECT st.speaker_tag FROM blogsquad_tag as st INNER JOIN blogsquad_data_connection as sdc ON st.id=sdc.speaker_tag_id WHERE sdc.speaker_id= :id ORDER BY sdc.date DESC LIMIT 0,1";
									 $get_tag = $this->pdo->prepare($get_tag_q);
									 $get_tag->bindValue(':id', $data['entity_id'], \PDO::PARAM_INT);
									 $get_tag->execute();
									 
									 if ($get_tag->rowCount() > 0) {
										 $tag_data = $get_tag->fetch();
										 $tag = $tag_data['speaker_tag'];

									 }
										$output .= '<li><a href="blogger-profile/'.$tag.'">'.$data['notification_text'].'</a></li>';		  
								
								  break;								  
								  

						  }	 

						 
					 }
					 
					
				 } 
		
	
				 
	 return $output;
	
}
	
}


?>