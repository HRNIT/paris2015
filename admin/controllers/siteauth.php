<?php 
namespace HRNParis\siteauth;
use HRNParis\config as config;
include_once('config.php');	

//session id lejárat fél órára :)

class siteauth extends config {
	
function rip_tags($string) { 
    
    // ----- remove HTML TAGs ----- 
    $string = preg_replace ('/<[^>]*>/', ' ', $string); 
    
    // ----- remove control characters ----- 
    $string = str_replace("\r", '', $string);    // --- replace with empty space
    $string = str_replace("\n", ' ', $string);   // --- replace with space
    $string = str_replace("\t", ' ', $string);   // --- replace with space
    
    // ----- remove multiple spaces ----- 
    $string = trim(preg_replace('/ {2,}/', ' ', $string));
    
    return $string; 

}	

public function login($username, $password) {
	include_once ('controllers/vendor/PasswordHash.php');
	   
		$user = str_replace(array("'", "-", ";", "#"), array(" ", " ", " "," "),$username);
		$user_pass = $this->rip_tags($password);
		
		 $pass_q = "SELECT id, password, email FROM users WHERE username = :username ORDER BY date DESC LIMIT 0,1";
		 $correct_pass = $this->pdo->prepare($pass_q);
		 $correct_pass->bindValue(':username', $user, \PDO::PARAM_STR);
		 $correct_pass->execute();
		 
		
		 
					if ($correct_pass->rowCount() > 0) {
				        $pass = $correct_pass->fetch();
						$prepared_password = 'sha256:3124:'.$pass['password'];
						
						$compare = validate_password($user_pass, $prepared_password);
						
						if ($compare == 1) {  //The password is good, the user can log in
						
							if (isset($_SESSION)){ //if there is already a session
								 session_unset();
	                             session_destroy();
								 $lifetime=3600;
                                 session_set_cookie_params($lifetime);
								 session_start();
							} else {  //if there's no session
							    $lifetime=3600;
                                session_set_cookie_params($lifetime);
								session_start();
							} //else end
						   
						   $_SESSION['user'] = true;
						   $_SESSION['admin'] = true;
						   
						   $_SESSION['user_id'] = $pass['id'];
						   
						   
				  //get rank
				 $rank_q = "SELECT rank FROM users WHERE id = :id";
				 $rank = $this->pdo->prepare($rank_q);
				 
				 $rank->bindValue(':id', $pass['id'], \PDO::PARAM_INT);
				 
				 $rank->execute();
				 
				 if ($rank->rowCount() > 0) {
					  include_once ('controllers/rank.php');
					 
					  while($uRank = $rank->fetch()){
						   if ($uRank['rank'] == 1) {
								 $_SESSION['developer'] = true; 
							  } //if uRank = 1 (dev :D)
							  
							  $permission = ranking($uRank['rank']);
											 
											   if (isset($permission)) {
												   foreach ($permission as $perm) {
													   switch ($perm) {
														  case "super":
															 $_SESSION['super_admin'] = true;
															  break;
														  case "agenda":
															 $_SESSION['agenda_admin'] = true;
															  break;
														  case "sponsors":
														     $_SESSION['sponsors_admin'] = true;
															  break;
														  case "speakers":
															   $_SESSION['speakers_admin'] = true;
															  break;
														  case "mediapartners":
															   $_SESSION['mediapartners_admin'] = true;
															  break;
														  case "blogsquad":
															   $_SESSION['blogsquad_admin'] = true;
															  break;
													  }//switch perm
												   }
											   }//if isset permission
						  

						   
				     }//While uRank fetch
				 }//if rank row count > 0
	
									 
									  
						  $out =  '<p class="LoginResponse"><i class="fa fa-check"></i> Logged in. You will be redirected to the administration page.</p>';
						  
						  //// Options for login
						  
						      //// basic
						   $page = $_SERVER['PHP_SELF'];
						   $sec = "1";
						   
						   /*
						   $sponsors = array(7,5,8,11);
						   $speakers = array();
						   $mediapartners = array(10);
						   $blogsquad = array(9);
						
					
						   if(in_array($pass['id'],$sponsors) == true) {
							   $page = "http://london.hrtecheurope.com/admin/sponsors";
						   }elseif (in_array($pass['id'],$speakers) == true) {
							   $page = "http://london.hrtecheurope.com/admin/speakers";
						  }elseif (in_array($pass['id'],$mediapartners) == true) {
							   $page = "http://london.hrtecheurope.com/admin/mediapartners";
						  }elseif (in_array($pass['id'],$blogsquad) == true) {
							  $page = "http://london.hrtecheurope.com/admin/blogsquad";
						  } //if - else if chain ends
						   
					
						 /*  
						   if(in_array($pass['id'],$sponsors) == true) {
							   $page = "final_new/admin/sponsors";
						   }elseif (in_array($pass['id'],$speakers) == true) {
							   $page = "final_new/admin/speakers";
						  }elseif (in_array($pass['id'],$mediapartners) == true) {
							   $page = "final_new/admin/mediapartners";
						  }elseif (in_array($pass['id'],$blogsquad) == true) {
							  $page = "final_new/admin/blogsquad";
						  }
						   */
                          header("Refresh:".$sec."; url=".$page);
						   return $out;
						   
						 
						} else { //If the passwords don't mach
						
							 if (!isset($_SESSION)){ //if there's no session
								session_start();
								$_SESSION['failed_login'] = 1;
							 } else { //if there's no session else and end
								if (isset($_SESSION['failed_login'])) { //if this is NOT the first login attempt
									$_SESSION['failed_login']++;
								} else { //if this is the first login attepmt
									$_SESSION['failed_login'] = 1;
								} //first attempt else end
								
							} //if there's no session else end
							  
							  
							  if(isset($_SESSION['failed_login']) && $_SESSION['failed_login'] > 5) { //if there's more than 5 attempts
								 $out = '<p class="LoginResponse"><i class="fa fa-times"></i> Incorrect username or password</p>'; 
								 //for now we do nothing, but later we can add chapcha or something shit :D 
							  } else {//else
								 $out = '<p class="LoginResponse"><i class="fa fa-times"></i> Incorrect username or password</p>'; 
							  } //more then five else ends
							
							return $out;
						} //passwords don't mach else ends
				
				} else { //personal num rows if end  (If we don't even find the user in the db)
				$out = '<p class="LoginResponse"><i class="fa fa-times"></i> No such user</p>';
							return $out;
				}//username not found else ends
			
}

public function logout() {
	
	
	session_unset();
	session_destroy();
	
	$page = $_SERVER['PHP_SELF'];
	$sec = "0.1";
	header("Refresh: $sec; url=$page");
	
}


}
?>