<?php
namespace HRNParis;
use HRNParis\connect as connect;
use HRNParis\Connection as connection;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require_once('SYS/aaa.php');
require_once('connect.php');
require_once('vendor/autoload.php');

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
	
  public function __construct() {
	  	 // create a log channel
     $this->log = new Logger('HRNParis');
     $this->log->pushHandler(new StreamHandler('controllers/errors/error.log', Logger::WARNING));
	  
	 try {
	 $pdo = connection\PDOConnection::instance();

     $this->pdo = $pdo->getConnection( 'mysql:host='.$this->host.';dbname='.$this->database, $this->user, $this->password );
	 
	 } catch (\PDOException $e){
		  echo 'Database Connection Failed';
		   $this->log->addError($e->getMessage());
		  
		   exit;
	 }
	  
	   
    
	  
	  

 

 
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
	
	
}


?>