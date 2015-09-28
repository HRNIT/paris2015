<?php 
namespace HRNParis\agenda;
use HRNParis\config as config;
include_once('config.php');	
	if (!isset($_SESSION)){
	  session_start();	
	}
	
class agenda_main extends config {

 public function clean_str($string) {

    $specialis_karekterek = array('Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ő'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ű'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ő'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ű'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f');
    $string = strtolower(strtr($string, $specialis_karekterek));
    $string = preg_replace("/[^a-z0-9-_\.]/i", '', trim($string));
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


 public function clean_modal_bio($string) {

    $specialis_karekterek = array('&nbsp;'=>' ', 'â¨' => ' ', 'â€¨' => ' ');
    $string = strtr($string, $specialis_karekterek);

    return $string;
}


public function randomGenerator($pool, $type, $prefered, $limit, $chance_modifier) {
	/*
	*********************************
      This function will generate random or prefered numbers depending on the $type
	  
	  $pool - The range of the random numbers (start and end point) 
	  $type - random or prefered
	  $prefered - an Array containing the prefered numbers
	  $limit - how many numbers do we need to generate
	
	*********************************
	*/
	
	//the end results
$numbers = '';
	
	//set the number of results
	if (isset($limit) && $limit != '' && $limit > 0){
		
		$db_num = $limit;
	} else {
		$db_num = 1;
	}
	
	
	//Make sure we have a start and end value 
	if (isset($pool) && $pool[0] != ''){
	   $pool_start = $pool[0];	
	} else {
		$pool_start = 0;
	}
	
    if (isset($pool) && $pool[1] != ''){
	   $pool_end = $pool[1];	
	} else {
		$pool_end = 50;
	}
	

    if (!isset($type) || $type == ''){
	   	$type = 0;
	} 
	
	
	
	//Function that makes sure there are no duplicate entries
	 $random_check = function($num_array, $pool_start, $pool_end){
		 
		$rand_number = -1;
		 $out = true; 
		 
		 while ($rand_number < 0 || $out == true){
			 $out = false;
			 
				 $rand_number = mt_rand($pool_start, $pool_end);

                  if ($num_array != ''){
						  foreach ($num_array as $nums){
							if ($nums == $rand_number){
								$out = true;
							}
						 }
						  
				  }

					   
		 }
		 
		
		 
		if ($out == false){
			return $rand_number;
		}
		 
	  };


	  //check how many prefered items are
	  $pref_num = 0;
	  if (isset($prefered) && $prefered != '') {
		$pref_num++;
	  }
	
	
	$array_trim = function($target_array, $value){
		
	    if(($key = array_search($value, $target_array)) !== false) {
         unset($target_array[$key]);
        }
		
		$target_array = array_values($target_array);
	return $target_array;
		
	};
	
	

	
  //generate db_num numbers
for ($x = 0 ; $x <= $db_num; $x++) {
	    
		 //if the mode is prefered
		if ($type == 1){
			
			  $chance = mt_rand(0, $chance_modifier);
			  
			  
			  if ($chance == 1 && $pref_num > -1){
				  
                 //we genereate a random number based on how many 
				  $rand = mt_rand(0, $pref_num);
				  
				  //if there even a number like this
				  if (isset($prefered[$rand])) {

						  $end_num = $prefered[$rand];
						  
						  //trim array with the choosen value
						 $prefered = $array_trim($prefered, $prefered[$rand]);
						 $pref_num--;
				  } else {
					  //if not, generate an another
							if (isset($numbers) && $numbers != ''){
								  //eliminate duplicates
								   $end_num = mt_rand($pool_start, $pool_end);
								   
								   while (in_array($end_num, $numbers) == true){
									   $end_num = mt_rand($pool_start, $pool_end);
								    }
									
							 } else {
								  $end_num = mt_rand($pool_start, $pool_end);
							 }
				  }
				 
				  
			  } else {
				  //if we are unlucky, we create a random number
                       if (isset($numbers) && $numbers != ''){
						    //eliminate duplicates
						    $end_num = mt_rand($pool_start, $pool_end);
							
						     while (in_array($end_num, $numbers) == true){
						         $end_num = mt_rand($pool_start, $pool_end);
					        }
							
					   } else {
						    $end_num = mt_rand($pool_start, $pool_end);
					   }
                    
			  
			
				  
			  }
                 if (!isset($numbers) || $numbers == ''){
					
					$numbers[0] =  $end_num;
					 
				 } else {
					array_push($numbers, $end_num); 
				 }
			 
		 	
			
		} else { //if the mode is total random


             $end_num = mt_rand($pool_start, $pool_end);

               if (!isset($numbers) || $numbers == ''){
					
					$numbers[0] =  $end_num;
					 
				 } else {
					   while (in_array($end_num, $numbers) == true){
						  $end_num = mt_rand($pool_start, $pool_end);
					    }
					 
					array_push($numbers, $end_num); 
				 }
			
		}
	


} 


return $numbers;	
	
}


public function agenda_session($category, $day) {
	
	$i = 0;
	$data = '';
	
	//Get the general data about the sessions specified by the parameters
	$agenda_session_q ="SELECT asdc.agenda_session_id, asd.text, ast.title, asti.start_hour, asti.start_minute, asti.end_hour, asti.end_minute, asdc.agenda_type_id FROM agenda_session_title as ast, agenda_session_description as asd, agenda_session_timeframe as asti, agenda_session_data_connection as asdc, agenda_category_connection as acc, agenda_session_status as ass WHERE acc.agenda_category_id= :category AND acc.agenda_day= :day AND acc.agenda_session_id=asdc.agenda_session_id AND asdc.agenda_title_id=ast.id AND asdc.agenda_description_id=asd.id AND asdc.agenda_timeframe_id=asti.id AND asdc.agenda_session_id=ass.agenda_session_id AND ass.status=1 ORDER BY asti.start_hour, asti.start_minute";
	
		$agenda_session = $this->pdo->prepare($agenda_session_q);
		$agenda_session->bindValue(':category', $category, \PDO::PARAM_INT);
		$agenda_session->bindValue(':day', $day, \PDO::PARAM_INT);
		$agenda_session->execute();

			if ($agenda_session->rowCount() > 0) {
					while($sessions = $agenda_session->fetch()){
						$data[$i]['agenda_session_id'] = $sessions['agenda_session_id'];
						$data[$i]['text'] = $sessions['text'];
						$data[$i]['title'] = $sessions['title'];
						$data[$i]['start_hour'] = $sessions['start_hour'];
						$data[$i]['start_minute'] = $sessions['start_minute'];
						$data[$i]['end_hour'] = $sessions['end_hour'];
						$data[$i]['end_minute'] = $sessions['end_minute'];
						$data[$i]['agenda_type_id'] = $sessions['agenda_type_id'];
						$data[$i]['category'] = $category;
						$data[$i]['day'] = $day;
						
						//Get the speaker connection data
			
				
		$j = 0;
			$speakers_q = "SELECT scn.company_name, ast.title, asn.speaker_name FROM agenda_session_speaker_connection as assc INNER JOIN speakers_data_connection as sdc ON assc.speaker_id=sdc.speaker_id, speakers_company_data_connection as scdc INNER JOIN speakers_company_name as scn ON scdc.speaker_company_name_id=scn.id, speakers_name as asn, speakers_title as ast WHERE assc.agenda_session_id= :agenda_id AND sdc.speaker_title_id=ast.id AND sdc.speaker_name_id=asn.id AND sdc.speaker_company_id=scdc.speaker_company_id ORDER BY assc.date, sdc.date";	
					
		$speakers = $this->pdo->prepare($speakers_q);
		$speakers->bindValue(':agenda_id', $sessions['agenda_session_id'], \PDO::PARAM_INT);
		$speakers->execute();

			if ($speakers->rowCount() > 0) {
					while($sData = $speakers->fetch()){
						$speakers_data['company_name'] = $sData['company_name'];
						$speakers_data['title'] = $sData['title'];
						$speakers_data['speaker_name'] = $sData['speaker_name'];
                        $data[$i]['speaker_data'][$j] = $speakers_data;
						$j++;
					}
					
				
				
				
					
			}

		         
				 // End Speaker Data				
						
						
						$i++;
					}
					
					
			}
	
	return $data;
	
	
}

/**********************
New Display functions v6+
**********************/

public function display_session_mobile_v6($source){
	
		$anal_code = function($location, $type, $title){
		$out = 'onClick="_gaq.push([';
		
		$out .="'_trackEvent', '".$location."', '".$type."', '".$title."']);";
		
		$out .='"';
		
		return $out;
	};
	
	$output = '';
	
		    //Display the speaker info(s) if the session have speaker(s)			 
			$speaker_data = function($array){
				$content = '';
				if (isset($array['speaker_data'])){
					foreach ($array['speaker_data'] as $speakers){
						
					$content .='<h4 class="SessionSpeaker"><strong>'.$speakers['speaker_name'].'</strong> '.$speakers['title'].' <strong>'.$speakers['company_name'].'</strong></h4>';
						

					}

				}
				return $content;
				
			};
	
	
		if(isset($source) && $source != ''){

		//We go through the data :)
foreach ($source as $data){
			 
			  //if the end minute is 0 then display 00
			 if ($data['start_minute'] == 0 || $data['start_minute'] == '0'){
				$data['start_minute'] = '00';
			 }

			 if ($data['start_minute'] == 5){
				$data['start_minute'] = '05';
			 }

 $color = $this->get_category_styles($data['category']);
 $extra_text = '';
 
 if ($data['agenda_type_id'] > 1) {
	 //if it's a break session
	 
	 $reveal = '';
	 $session_class = ' BreakTextColor BreakTextClass';
	 
	 if ($data['agenda_type_id'] == 2) {
		  $break_session = '<i class="fa fa-coffee"></i> ';
		 
	 }

	 if ($data['agenda_type_id'] == 3) {
		  $break_session = '<i class="fa fa-cutlery"></i> ';
		 
	 }
	 	 
	 if ($data['agenda_type_id'] == 4) {
		  $break_session = '<i class="fa fa-glass"></i> ';
		 
	 }	 
	 
	 if ($data['agenda_type_id'] == 5) {
		 $session_class = ' BreakoutTextColor BreakOutTextClass';
		 $extra_text = '<span class="ExtraBreakoutText">Click to choose Breakout Session</span>';
	 }	
	 
	
 } else {
   //Normal session
   
 	 $break_session = '';
	 $break_text = '';
	 $reveal = 'data-reveal-id="SessionInfoModal"';
	 
	$session_class = $color['color_class'].'Color';
	 
 }

 $output .='
	        <div class="Session '.$session_class.'" '.$reveal.' data-agenda_id="'.$data['agenda_session_id'].'" data-agenda_day="'.$data['day'].'" data-agenda_category="'.$data['category'].'">
        	<div class="SessionTimeContainer">
            	<h3 class="SessionStartTime">'.$data['start_hour'].':'.$data['start_minute'].'</h3>
            </div>
            <div class="SessionContent">
            	<h3 class="SessionTitle" '.$reveal.' '.$anal_code('Agenda','ModalOpen', $this->clean_str2($data['title'])).'>'.$data['title'].$extra_text.'</h3>';
	         $output .= $speaker_data($data);
            $output .=' </div>
        </div>';


			 
		 } //end foreach source
	
		}  else {
		   $output = 'Nope';
		 }

	return $output;
	
}

public function display_sessions_v6($source) {
	
	$anal_code = function($location, $type, $title){
		$out = 'onClick="_gaq.push([';
		
		$out .="'_trackEvent', '".$location."', '".$type."', '".$title."']);";
		
		$out .='"';
		
		return $out;
	};	
	
	$output = '';
	$_SESSION['Agenda_height'] = 0;
	
	    //Display the speaker info(s) if the session have speaker(s)			 
			$speaker_data = function($array){
				$content = '';
				if (isset($array['speaker_data'])){
					foreach ($array['speaker_data'] as $speakers){
						
						$content .='<p class="SpeakerInfo"><strong>'.$speakers['speaker_name'].' </strong>'.$speakers['title'].'<strong> '.$speakers['company_name'].' </strong></p>';
						
					}

				}
				return $content;
				
			};
			
			
//Calculate margins and paddings based on session length			
	$styleCalculator = function($start_hour, $start_minute, $end_hour, $end_minute, $prev_hour, $prev_minute) {
		$margin = '';
		
		
		//NEED TO RECALCULATE
		  if ($start_hour == 8 && $start_minute == 0){
			  
			  $start = ($start_hour*60)+$start_minute; 
			  $end = ($end_hour*60)+$end_minute; 
			  $difference = ($end-$start)/10;
			  
			  $padding = (36*($difference)-5);
			  
			 $margin = ''; 
			 
			 	$_SESSION['Agenda_height'] += $padding; 
			 
			 $style = 'height:'.$padding.'px;';
		  } else {
			  $eight = 480;
			  
			  $start = ($start_hour*60)+$start_minute; 
			  $end = ($end_hour*60)+$end_minute; 
			  $difference = ($end-$start)/10;
			  
			  $padding = (36*($difference)-5);
			  
			  
			  $margin_cal = ($start-$eight)/10; 
			 
			  if ($prev_hour == $start_hour && $prev_minute == $start_minute) {
				  $margin = ((36*$margin_cal) - $_SESSION['Agenda_height']);
			  } else {
				  
				  $margin = (36*$margin_cal) - $_SESSION['Agenda_height'];
			  }
			  
			 
			 
			 
			
			$_SESSION['Agenda_height'] += $padding + $margin; 
			 
			 $style = 'height:'.$padding.'px; margin-top:'.$margin.'px;'; 
			  
			  
			  
		  }
		  
		  
		return $style; 
	};
	
	
	
	

	
	if(isset($source) && $source != ''){
         $prev_hour = 0;
		 $prev_minute = 0;

		//We go through the data :)
		 foreach ($source as $data){
			 
			  //if the end minute is 0 then display 00
			 if ($data['start_minute'] == 0 || $data['start_minute'] == '0'){
				$data['start_minute'] = '00';
			 }


           $color = $this->get_category_styles($data['category']);

            if ($data['agenda_type_id'] > 1) {
				$sessionClass = "BreakSession";
				$sessionTitleClass = "BreakSessionTitleDesktop";
			} else {
			    $sessionClass = $color['color_class']."BorderColor NormalSession ".$color['color_class']."SessionBgColor";
				$sessionTitleClass = "SessionTitleDesktop ".$color['color_class']."Color";
				
			}
			
		//This is the output what goes out to live
		//----------------------------------------------------------------	 
			 $output .='
				<!-- '.$data['title'].' -->
				  <div class="SessionDesktop '.$sessionClass.'" data-reveal-id="SessionInfoModal" data-agenda_id="'.$data['agenda_session_id'].'" data-agenda_day="'.$data['day'].'" data-agenda_category="'.$data['category'].'" style="'.$styleCalculator($data['start_hour'], $data['start_minute'], $data['end_hour'], $data['end_minute'], $prev_hour, $prev_minute).'">           
				   <span class="Dots '.$color['color_class'].'Color">...</span>
					
					  <div class="SessionContent">
						  <h4 class="'.$sessionTitleClass.'" '.$anal_code('Agenda','ModalOpen', $this->clean_str2($data['title'])).'>'.$data['title'].'</h4>';
			
			$output .= $speaker_data($data);
			
		$output .='</div>
				  </div>
				  <!-- END '.$data['title'].'-->';
   //-------------------------------------------------------------------------------------			 
			
			
			      $prev_hour = $data['end_hour'];
		          $prev_minute = $data['end_minute'];
			 
		 } //End foreach source

		
	}
	

return $output;	

	
 }


/********************

Old Display functions (v1 - v5)
********************/

public function display_session_mobile($source){
	
		$anal_code = function($location, $type, $title){
		$out = 'onClick="_gaq.push([';
		
		$out .="'_trackEvent', '".$location."', '".$type."', '".$title."']);";
		
		$out .='"';
		
		return $out;
	};
	
	$output = '';
	
		    //Display the speaker info(s) if the session have speaker(s)			 
			$speaker_data = function($array){
				$content = '';
				if (isset($array['speaker_data'])){
					foreach ($array['speaker_data'] as $speakers){
						
					$content .='<h4 class="SessionSpeaker"><strong>'.$speakers['speaker_name'].'</strong> '.$speakers['title'].' <strong>'.$speakers['company_name'].'</strong></h4>';
						

					}

				}
				return $content;
				
			};
	
	
		if(isset($source) && $source != ''){

		//We go through the data :)
		 foreach ($source as $data){
			 
			  //if the end minute is 0 then display 00
			 if ($data['start_minute'] == 0 || $data['start_minute'] == '0'){
				$data['start_minute'] = '00';
			 }


 $color = $this->get_category_styles($data['category']);
 
 if ($data['agenda_type_id'] > 1) {
	 //if it's a break session
	  $break_text = ' BreakTextClass';
	 
	 if ($data['agenda_type_id'] == 2) {
		  $break_session = '<i class="fa fa-coffee"></i> ';
		 
	 }

	 if ($data['agenda_type_id'] == 3) {
		  $break_session = '<i class="fa fa-cutlery"></i> ';
		 
	 }
	 	 
	 if ($data['agenda_type_id'] == 4) {
		  $break_session = '<i class="fa fa-glass"></i> ';
		 
	 }	 
	 
	
 } else {
   //Normal session
   
 	 $break_session = '';
	 $break_text = '';
 }

 $output .='
	        <div class="Session" data-reveal-id="SessionInfoModal" data-agenda_id="'.$data['agenda_session_id'].'" data-agenda_day="'.$data['day'].'" data-agenda_category="'.$data['category'].'">
        	<div class="SessionTimeContainer">
            	<h3 class="SessionStartTime">'.$data['start_hour'].':'.$data['start_minute'].'</h3><i class="fa fa-caret-right '.$color['color_class'].'Color"></i>
            </div>
            <div class="SessionContent">
            	<h3 class="SessionTitle '.$color['color_class'].'Color'.$break_text.'" data-reveal-id="SessionInfoModal" '.$anal_code('Agenda','ModalOpen', $this->clean_str2($data['title'])).'>'.$break_session.$data['title'].'</h3>';
	         $output .= $speaker_data($data);
            $output .=' </div>
        </div>';


			 
		 } //End foreach source
	
	
		}

	return $output;
	
}

public function display_sessions($source) {
	
		$anal_code = function($location, $type, $title){
		$out = 'onClick="_gaq.push([';
		
		$out .="'_trackEvent', '".$location."', '".$type."', '".$title."']);";
		
		$out .='"';
		
		return $out;
	};
	
	$output = '';
	$_SESSION['Agenda_height'] = 0;
	
	    //Display the speaker info(s) if the session have speaker(s)			 
			$speaker_data = function($array){
				$content = '';
				if (isset($array['speaker_data'])){
					foreach ($array['speaker_data'] as $speakers){
						
						$content .='<p class="SpeakerInfo"><strong>'.$speakers['speaker_name'].' </strong>'.$speakers['title'].'<strong> '.$speakers['company_name'].' </strong></p>';
						
					}

				}
				return $content;
				
			};
			
			
//Calculate margins and paddings based on session length			
	$styleCalculator = function($start_hour, $start_minute, $end_hour, $end_minute, $prev_hour, $prev_minute) {
		$margin = '';
		
		
		//NEED TO RECALCULATE
		  if ($start_hour == 8 && $start_minute == 0){
			  
			  $start = ($start_hour*60)+$start_minute; 
			  $end = ($end_hour*60)+$end_minute; 
			  $difference = ($end-$start)/10;
			  
			  $padding = (36*($difference)-5);
			  
			 $margin = ''; 
			 
			 	$_SESSION['Agenda_height'] += $padding; 
			 
			 $style = 'height:'.$padding.'px;';
		  } else {
			  $eight = 480;
			  
			  $start = ($start_hour*60)+$start_minute; 
			  $end = ($end_hour*60)+$end_minute; 
			  $difference = ($end-$start)/10;
			  
			  $padding = (36*($difference)-5);
			  
			  
			  $margin_cal = ($start-$eight)/10; 
			 
			  if ($prev_hour == $start_hour && $prev_minute == $start_minute) {
				  $margin = ((36*$margin_cal) - $_SESSION['Agenda_height']);
			  } else {
				  
				  $margin = (36*$margin_cal) - $_SESSION['Agenda_height'];
			  }
			  
			 
			 
			 
			
			$_SESSION['Agenda_height'] += $padding + $margin; 
			 
			 $style = 'height:'.$padding.'px; margin-top:'.$margin.'px;'; 
			  
			  
			  
		  }
		  
		  
		return $style; 
	};
	
	
	
	
	
	if(isset($source) && $source != ''){
         $prev_hour = 0;
		 $prev_minute = 0;

		//We go through the data :)
		 foreach ($source as $data){
			 
			  //if the end minute is 0 then display 00
			 if ($data['start_minute'] == 0 || $data['start_minute'] == '0'){
				$data['start_minute'] = '00';
			 }


           $color = $this->get_category_styles($data['category']);

            if ($data['agenda_type_id'] > 1) {
				$sessionClass = "BreakSession";
				$sessionTitleClass = "BreakSessionTitleDesktop";
			} else {
			    $sessionClass = $color['color_class']."BorderColor NormalSession ".$color['color_class']."SessionBgColor";
				$sessionTitleClass = "SessionTitleDesktop ".$color['color_class']."Color";
				
			}
			
		//This is the output what goes out to live
		//----------------------------------------------------------------	 
			 $output .='
				<!-- '.$data['title'].' -->
				  <div class="SessionDesktop '.$sessionClass.'" data-reveal-id="SessionInfoModal" data-agenda_id="'.$data['agenda_session_id'].'" data-agenda_day="'.$data['day'].'" data-agenda_category="'.$data['category'].'" style="'.$styleCalculator($data['start_hour'], $data['start_minute'], $data['end_hour'], $data['end_minute'], $prev_hour, $prev_minute).'">           
				   <span class="Dots '.$color['color_class'].'Color">...</span>
					
					  <div class="SessionContent">
						  <h4 class="'.$sessionTitleClass.'" '.$anal_code('Agenda','ModalOpen', $this->clean_str2($data['title'])).'>'.$data['title'].'</h4>';
			
			$output .= $speaker_data($data);
			
		$output .='</div>
				  </div>
				  <!-- END '.$data['title'].'-->';
   //-------------------------------------------------------------------------------------			 
			
			
			      $prev_hour = $data['end_hour'];
		          $prev_minute = $data['end_minute'];
			 
		 } //End foreach source

		
	}
	

return $output;	

	
 }
  
 
public function display_time(){ 
   //display the time from 8:00 - 18:00 
   // 10 minute intervalls

	  $out = '';; 
	  
	  $hour = 8; 
	  $min = 0; // Lets start at "8:00" 
	  
	  $length = 16 * 4; // The number of times we need to run the loop 
	  
	  for ($i=0;$i<$length;++$i){ 
	  
	  if (str_pad($min, 2, "0", STR_PAD_LEFT) == 30 || str_pad($min, 2, "0", STR_PAD_LEFT) == 0){
		 $out .= '<div class="AgendaTimeFull">'.str_pad($hour, 2, "0", STR_PAD_LEFT) .':'. str_pad($min, 2, "0", STR_PAD_LEFT).'</div>'; 
	  } else {
		   $out .= '<div>'.str_pad($min, 2, "0", STR_PAD_LEFT).'<p class="TimeDivider"></p></div>';  
	  }
	  
		
		if ($min < 50) { $min = $min + 10; } else { $min = 0; ++$hour; } 
		
		
	  } 
	  
	   //$out .= '<div class="AgendaTimeFull">18:00</div>'; // Adds the last line to the end of the array 
	  
	  return $out; 

 }
 
 
 /*
 
 OLD
 
 public function get_header_text(){
	 
	 $i = 0;
	 
	    //Get all the header texts first and check if there are any prefered
	 	$header_q = "SELECT id, text, prefered FROM agenda_header_text";	
					
		$header = $this->pdo->prepare($header_q);
		
		$header->execute();

			if ($header->rowCount() > 0) {
					while($data = $header->fetch()){
                         if ($data['prefered'] == 1){
							  $prefered[$i] = $data['id']; 
							  $i++;
						 }
						
					}
					
					
			$pool[0] = 1;	
			$pool[1] = $header->rowCount();	
			
			//if yes, then add that parameter to the random generator
			if (isset($prefered)){
			  $type = 1;	
			} else {
			   $type = 0;	
			}
					
             $num = $this->randomGenerator($pool, $type, $prefered, 1, 5);	
		 
	
			if (isset($num) && $num != ''){
				//get the text choosen by the random generator
				$chosen_q = "SELECT text FROM agenda_header_text WHERE id= :id";	
							
				$chosen = $this->pdo->prepare($chosen_q);
				$chosen->bindValue(':id', $num[0], \PDO::PARAM_INT);
				$chosen->execute();
		
					if ($chosen->rowCount() > 0) {
							while($data = $chosen->fetch()){
								$output = $data['text'];
								
							}//while chosen
							 
					} //if choosen row count
				
		
          	}//if isset num
	
			

		}//if row count header
	 
	
	if (isset($output)){
		 return $output;
	  	
	}
	 
 }
 */
 
 
 
  public function get_header_text($category){
	 
	 $i = 0;
	 
	    //Get all the header texts first and check if there are any prefered
	 	$header_q = "SELECT aht.id, aht.text FROM agenda_header_text as aht INNER JOIN agenda_header_text_connection as ahtc ON aht.id=ahtc.agenda_header_text_id WHERE ahtc.agenda_category_id = :category";	
					
		$header = $this->pdo->prepare($header_q);
		$header->bindValue(':category', $category, \PDO::PARAM_INT);
		$header->execute();

			if ($header->rowCount() > 0) {
							while($data = $header->fetch()){
								$output = utf8_encode($data['text']);
								
							}//while chosen

		}//if row count header
	 
	
	if (isset($output)){
		 return $output;
	  	
	}
	 
 }
 
 
 public function block_display($category, $day) {
	 //by default, the blocks will be random and there will be 3 blocks
	
		$anal_code = function($location, $type, $title){
		$out = 'onClick="_gaq.push([';
		
		$out .="'_trackEvent', '".$location."', '".$type."', '".$title."']);";
		
		$out .='"';
		
		return $out;
	};
	 
	 
	  $final_num[0][0] = $final_num[1][0]= $final_num[2][0] = '';
	 
	            $i = 0;
				$ex = 0; //for exluded
			
				
	 		    $block_q = "SELECT abe.entity_type_id, abe.entity_id, abd.block, abd.type FROM agenda_block_display as abd INNER JOIN agenda_block_entities as abe ON abd.id=abe.agenda_block_id WHERE abd.agenda_category_id= :category AND abd.agenda_day= :day";	
							
				$block = $this->pdo->prepare($block_q);
				$block->bindValue(':category', $category, \PDO::PARAM_INT);
				$block->bindValue(':day', $day, \PDO::PARAM_INT);
				$block->execute();
		
					if ($block->rowCount() > 0) {
							while($data = $block->fetch()){


								//This means that for block x there is a fixed element. We don't need the random for that one!
								if($data['type'] == 3) {
									$final_num[$data['block']][0] = $data['entity_type_id'];
									$final_num[$data['block']][1] = $data['entity_id'];
									

									//to eliminate duplicates
										   if($data['entity_type_id'] == 1) {
												  $exluded[$ex] = $data['entity_id'];
												  $ex++; 
										   }
								
									
								} else {
							      $panels[$data['block']][$i]['entity_type_id'] = $data['entity_type_id'];
								  $panels[$data['block']][$i]['entity_id'] = $data['entity_id'];
								  $panels[$data['block']][$i]['block'] = $data['block'];
									$i++;
									
								}
								
								
								
							} //while data fetch
							
					}//if block row count
	
	
			//Get the number of speakers and quotes
			 		    $speakers_q = "SELECT id FROM speakers";	
							
				$speakers = $this->pdo->prepare($speakers_q);
				$speakers->execute();
		        $speakers_rows = $speakers->rowCount();
		
		
		
					   $quote_q = "SELECT id FROM agenda_quote";	
							
				$quote = $this->pdo->prepare($quote_q);
				$quote->execute();
		        $quote_rows = $quote->rowCount(); 			
	 
	       //Reset the variable
	      $quote = '';
					
		$speaker_db = 0;
		$quote_db = 0;	
		
	if (isset($panels))	{	
		foreach ($panels as $block_num =>$element) {
			
			 foreach ($element as $entities){
				 
				 
				 //prepare the arrays for either scenarios for random generator
				 if ($entities['entity_type_id'] == 1){
					 $speaker[$speaker_db] = $entities['entity_id']; 
					 $speaker_db++;
				 }
				 
				 if ($entities['entity_type_id'] == 2){
					 $quote[$quote_db] = $entities['entity_id']; 
					 $quote_db++;
				 }	
				 			 

				 
			 }//foreach entities
		
			 
			
			if ($block_num == 2) {
				
				$choosen_type = 2;
			} else {
				$choosen_type = 1;
				
			}
				
			    //if the choosen type is speakers, set up the parameters for the random generator
			if ($choosen_type == 1){
				$pool[0] = 1;
				$pool[1] = $speakers_rows;
				if (isset($speaker)){
					$prefered =  $speaker;
					$mode = 1;
				} else {
					$mode = 2;
					$prefered = '';
				}
				
				//if the choosen type is quote, set up the parameters for the random generator
			} else {
				$pool[0] = 1;
				$pool[1] = $quote_rows;
				 if (isset($quote)){
					$prefered =  $quote;
					$mode = 1;
				} else {
					$prefered = '';
					$mode = 2;
				}
				
			}
				
			$final_num[$block_num][0] = $choosen_type;
			
			$the_num = $this->randomGenerator($pool,$mode , $prefered ,1 , 1); 
			
		//Make sure to not post duplicates	
			if ($choosen_type == 1 && isset($exluded)) {
				
				  while (in_array($the_num[0], $exluded)  == true){
					 $the_num = $this->randomGenerator($pool,$mode , $prefered ,1 , 1); 
				  }
				
				//if there is no fixed block set, generate a random number
			} else {	
			    $the_num = $this->randomGenerator($pool,$mode , $prefered ,1 , 1);
			}

			
			$final_num[$block_num][1] = $the_num[0];
		   
		    //save the number to eliminate duplicates
			$exluded[$ex] = $the_num[0];
			$ex++;
			
			
		}//foreach blocks


 
 	} //if isset panels
	 

$db_num = 2;

for ($x = 0 ; $x <= $db_num; $x++) {
	
	
	if (!isset($final_num[$x][0]) || $final_num[$x][0] == ''){
	
	       //if it's a speaker
		   if ($x == 1 || $x == 0) {
			  $final_num[$x][0] = 1;
			  
			  	$pool[0] = 1;
				$pool[1] = $speakers_rows;
				$mode = 2;
				$prefered = '';
			  
			     $the_num = $this->randomGenerator($pool,$mode , $prefered ,1 , 6);
				 
			      if (isset($exluded)){
						  while (in_array($the_num[0], $exluded) == true){
							 $the_num = $this->randomGenerator($pool,$mode , $prefered ,1 , 6);
						  }
				  }
				  
	
			  $final_num[$x][1] = $the_num[0];
			  
			  $exluded[$ex] = $the_num[0];
			  $ex++;
			   
		   } //if it's a speaker
		   
		   
		   //if it's a quote
		   if ($x == 2) {
			  $final_num[$x][0] = 2;
			  
			  	$pool[0] = 1;
				$pool[1] = $quote_rows;
				$mode = 2;
				$prefered = '';
			  
			 $the_num = $this->randomGenerator($pool,$mode , $prefered ,1 , 6);
			

			  $final_num[$x][1] = $the_num[0];
			   
		   }//if it's a quote	
		   
	}//if not isset finalnum[x]
		   
		 
}

   $sortArray = function($array){
	    $key = 0;
		$out = array();
		
	foreach ($array as $index=>$elem) {	
		foreach ($array as $index=>$elem) {
			if ($index == $key) {
				
				array_push($out,$elem);
				$key++;
			}
			
		 }
		}
		
	   return $out;
   };

 $sorted_final = $sortArray($final_num);
	
return  $sorted_final;	 
	 
 }
 
public function get_block_data($entity_type, $entity_id) {
	$content = '';
	
	$anal_code = function($location, $type, $title){
		$out = 'onClick="_gaq.push([';
		
		$out .="'_trackEvent', '".$location."', '".$type."', '".$title."']);";
		
		$out .='"';
		
		return $out;
	};	
	
	  //if it's a speaker
	 if ($entity_type == 1) {
		 
		 		$stat_q = "SELECT sn.speaker_name, st.title, scn.company_name, idb.image_url, idb.alt_name, sdc.speaker_id, sdc.speaker_company_id, stag.speaker_tag FROM speakers_name as sn, speakers_data_connection as sdc, speakers_status as ss, speakers_title as st, speakers_company_name as scn, speakers_company_data_connection as scdc, image_db as idb, image_connection as ic, speakers_tag as stag, speakers_order as soo WHERE sdc.speaker_name_id=sn.id AND sdc.speaker_id=ss.speaker_id AND ss.speaker_status_id='1' AND ic.entity_type_id='1' AND ic.entity_id=sdc.speaker_id AND idb.id=ic.image_db_id AND sdc.speaker_company_id=scdc.speaker_company_id AND scdc.speaker_company_name_id=scn.id AND sdc.speaker_title_id=st.id AND stag.id=sdc.speaker_tag_id AND sdc.speaker_id=soo.speaker_id AND sdc.speaker_id = :id ORDER BY soo.order_id ASC LIMIT 0,1";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->bindValue(':id', $entity_id, \PDO::PARAM_INT);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($speakers = $stat->fetch()){
			
			           /*EDIT SPEAKER STYLE HERE*/
					   
					$content.='<a href="speakers#'.$speakers['speaker_tag'].'" title="'.$speakers['speaker_name'].' Profile Page" target="_blank" '.$anal_code('Agenda','InternalForward', $speakers['speaker_tag']).'>
					  <div class="SpeakerBox">
						  <img class="SpeakerBoxPhoto" src="img/speakers/SpeakerPhotos/'.$speakers['image_url'].'" alt="'.$speakers['speaker_name'].' Photo">
						  <h4 class="SpeakerBoxSpeakerInfo">
							  <strong>'.$speakers['speaker_name'].'</strong><br>
							  '.$speakers['title'].'<br>
							  <strong>'.$speakers['company_name'].'</strong>
						  </h4>
					  </div>
					  </a>';
						  

        	     /*END EDIT SPEAKER STYLE HERE*/
				 
				 

					} //stat_q fetch
			}  //stat num row end
			 else {
		$Spname[0] = '';		 
				 
		$get_name_q = "SELECT original_name FROM speakers WHERE id= :id";	
					
		$get_name = $this->pdo->prepare($get_name_q);
		$get_name->bindValue(':id', $entity_id, \PDO::PARAM_INT);
		$get_name->execute();
		if ($get_name->rowCount() > 0) {
			$Spname = $get_name->fetch();
		}
				 
				 
				 //FAILSAFE (if the randomly generated speaker don't have data (uploaded 4-5 times :|) we generate a random from the top 6)
									$stat_q = "SELECT sn.speaker_name, st.title, scn.company_name, idb.image_url, idb.alt_name, sdc.speaker_id, sdc.speaker_company_id, stag.speaker_tag FROM speakers_name as sn, speakers_data_connection as sdc, speakers_status as ss, speakers_title as st, speakers_company_name as scn, speakers_company_data_connection as scdc, image_db as idb, image_connection as ic, speakers_tag as stag, speakers_order as soo WHERE sdc.speaker_name_id=sn.id AND sdc.speaker_id=ss.speaker_id AND ss.speaker_status_id='1' AND ic.entity_type_id='1' AND ic.entity_id=sdc.speaker_id AND idb.id=ic.image_db_id AND sdc.speaker_company_id=scdc.speaker_company_id AND scdc.speaker_company_name_id=scn.id AND sdc.speaker_title_id=st.id AND stag.id=sdc.speaker_tag_id AND sdc.speaker_id=soo.speaker_id AND sn.speaker_name= :name ORDER BY soo.order_id ASC LIMIT 0,1";	
									  
						  $stat = $this->pdo->prepare($stat_q);
						  $stat->bindValue(':name', $Spname[0], \PDO::PARAM_INT);
						  $stat->execute();
				  
							  if ($stat->rowCount() > 0) {
									  while($speakers = $stat->fetch()){
							  
										 /*EDIT SPEAKER STYLE HERE*/
										 
									  $content.='<a href="speakers#'.$speakers['speaker_tag'].'" title="'.$speakers['speaker_name'].' Profile Page" target="_blank" '.$anal_code('Agenda','InternalForward', $speakers['speaker_tag']).'>
										<div class="SpeakerBox">
											<img class="SpeakerBoxPhoto" src="img/speakers/SpeakerPhotos/'.$speakers['image_url'].'" alt="'.$speakers['speaker_name'].' Photo">
											<h4 class="SpeakerBoxSpeakerInfo">
												<strong>'.$speakers['speaker_name'].'</strong><br>
												'.$speakers['title'].'<br>
												<strong>'.$speakers['company_name'].'</strong>
											</h4>
										</div>
										</a>';
											
				  
								   /*END EDIT SPEAKER STYLE HERE*/
								   
								   
				  
									  } //stat_q fetch
							  }  //stat num row end
				             else {
								 //FAILSAFE Failsafe O.o 
								$content.= $this->get_block_data(1, rand(1,50)); 
							 }
				 
				 
			 }//if the original query don't have rows
		return $content;
		 
		 
		 
		 
		 
	 }//if it's a speaker
	 
	 
	 
	 //if it's a quote
   if ($entity_type == 2) {
	   
	  $color = $this->get_category_styles($_SESSION['Category']);
	   
	   		 		$stat_q = "SELECT quote, author FROM agenda_quote WHERE id = :id";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->bindValue(':id', $entity_id, \PDO::PARAM_INT);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($quote = $stat->fetch()){
			
			           /*EDIT QUOTE STYLE HERE*/
					   
				$content.='<div class="TestimonialBox '.$color[1].'BgColor">
				  <img src="img/agenda/quote-sign.svg" alt="Testimonial">
				  <div class="TestimonialTextContainer">
					  <p class="Testimonial">'.$quote['quote'].'</p>
					  <p class="TestimonialSpeakerName">'.$quote['author'].'</p>
				  </div>
			  </div>';
					   
			
											  

        	     /*END EDIT QUOTE STYLE HERE*/
				 
				 

					} //stat_q fetch
			}  //stat num row end
			 else {
		$stat_q = "SELECT quote, author FROM agenda_quote WHERE RAND() LIMIT 0,1";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($quote = $stat->fetch()){
			
			           /*EDIT QUOTE STYLE HERE*/
					   
				$content.='<div class="TestimonialBox '.$color[1].'BgColor">
				  <img src="img/agenda/quote-sign.svg" alt="Testimonial">
				  <div class="TestimonialTextContainer">
					  <p class="Testimonial">'.$quote['quote'].'</p>
					  <p class="TestimonialSpeakerName">'.$quote['author'].'</p>
				  </div>
			  </div>';
					   
			
											  

        	     /*END EDIT QUOTE STYLE HERE*/
				 
				 

					} //stat_q fetch
			}  //stat num row end
				
				 
				 
			 }
		return $content;
	   
	   
	   
	   
   }//if it's a quote
	
}

public function agenda_session_modal($category, $day, $sId) {

	$anal_code = function($location, $type, $title){
		$out = 'onClick="_gaq.push([';
		
		$out .="'_trackEvent', '".$location."', '".$type."', '".$title."']);";
		
		$out .='"';
		
		return $out;
	};
	
$i = 0;
	$data = '';
	$output = '';
	
	
			    //Display the speaker info(s) if the session have speaker(s)			 
			$speaker_data = function($array, $color){
				
	$anal_code = function($location, $type, $title){
		$out = 'onClick="_gaq.push([';
		
		$out .="'_trackEvent', '".$location."', '".$type."', '".$title."']);";
		
		$out .='"';
		
		return $out;
	};				
				
				$content = '';
				if (isset($array['speaker_data'])){
					foreach ($array['speaker_data'] as $speakers){
						
    $content .='	<!-- Speaker Info -->
        <div id="SpeakerInfoContainer">
    	<a href="speakers#'.$speakers['speaker_tag'].'" target="_blank" '.$anal_code('Agenda','InternalForward', $speakers['speaker_tag']).'><img id="SpeakerPhoto" src="img/speakers/SpeakerPhotos/'.$speakers['image_url'].'" alt="'.$speakers['speaker_name'].' Photo"></a>
        <div id="SpeakerInfo">
        	<a href="speakers#'.$speakers['speaker_tag'].'" target="_blank" title="View " '.$anal_code('Agenda','InternalForward', $speakers['speaker_tag']).'><h3 class="'.$color.'Color">'.$speakers['speaker_name'].'</h3></a>
            <h3 id="CompanyName">'.$speakers['title'].'</h3>
            <a href="'.$speakers['company_website'].'" target="_blank" title="Company website" '.$anal_code('Agenda','ExternalForward', $speakers['company_name']).'><h3 class="'.$color.'Color">'.$speakers['company_name'].'</h3></a>
        </div>
    </div>
    <!-- END Speaker Info -->';
							

					}

				}
				return $content;
				
			};
	
	//Get the general data about the sessions specified by the parameters
	$agenda_session_q ="SELECT asdc.agenda_session_id, asd.text, ast.title, asti.start_hour, asti.start_minute, asti.end_hour, asti.end_minute, asdc.agenda_type_id FROM agenda_session_title as ast, agenda_session_description as asd, agenda_session_timeframe as asti, agenda_session_data_connection as asdc, agenda_category_connection as acc, agenda_session_status as ass WHERE acc.agenda_category_id= :category AND acc.agenda_day= :day AND acc.agenda_session_id=asdc.agenda_session_id AND asdc.agenda_title_id=ast.id AND asdc.agenda_description_id=asd.id AND asdc.agenda_timeframe_id=asti.id AND asdc.agenda_session_id=ass.agenda_session_id AND ass.status=1 AND asdc.agenda_type_id = 1 ORDER BY asti.start_hour, asti.start_minute";
	
		$agenda_session = $this->pdo->prepare($agenda_session_q);
		$agenda_session->bindValue(':category', $category, \PDO::PARAM_INT);
		$agenda_session->bindValue(':day', $day, \PDO::PARAM_INT);
		$agenda_session->execute();

			if ($agenda_session->rowCount() > 0) {
					while($sessions = $agenda_session->fetch()){
						$data[$i]['agenda_session_id'] = $sessions['agenda_session_id'];
						$data[$i]['text'] = $sessions['text'];
						$data[$i]['title'] = $sessions['title'];
						$data[$i]['start_hour'] = $sessions['start_hour'];
						$data[$i]['start_minute'] = $sessions['start_minute'];
						$data[$i]['end_hour'] = $sessions['end_hour'];
						$data[$i]['end_minute'] = $sessions['end_minute'];
						$data[$i]['agenda_type_id'] = $sessions['agenda_type_id'];
						$data[$i]['category'] = $category;
						$data[$i]['day'] = $day;
						
			
			
		
				//Get the speaker connection data
		$j = 0;
			$speakers_q = "SELECT scn.company_name, scw.company_website, ast.title, asn.speaker_name, idb.image_url, stag.speaker_tag FROM agenda_session_speaker_connection as assc INNER JOIN speakers_data_connection as sdc ON assc.speaker_id=sdc.speaker_id, speakers_company_data_connection as scdc INNER JOIN speakers_company_name as scn ON scdc.speaker_company_name_id=scn.id, speakers_name as asn, speakers_title as ast, image_db as idb, image_connection as ic, speakers_tag as stag, speakers_company_website as scw WHERE assc.agenda_session_id= :agenda_id AND sdc.speaker_title_id=ast.id AND sdc.speaker_name_id=asn.id AND sdc.speaker_company_id=scdc.speaker_company_id AND ic.entity_type_id='1' AND ic.entity_id=sdc.speaker_id AND idb.id=ic.image_db_id AND sdc.speaker_tag_id=stag.id AND scw.id=scdc.speaker_company_website_id ORDER BY assc.date, sdc.date";	
					
		$speakers = $this->pdo->prepare($speakers_q);
		$speakers->bindValue(':agenda_id', $data[$i]['agenda_session_id'], \PDO::PARAM_INT);
		$speakers->execute();

			if ($speakers->rowCount() > 0) {
					while($sData = $speakers->fetch()){
						$speakers_data['company_name'] = $sData['company_name'];
						$speakers_data['title'] = $sData['title'];
						$speakers_data['speaker_name'] = $sData['speaker_name'];
						$speakers_data['image_url'] = $sData['image_url'];
						$speakers_data['speaker_tag'] = $sData['speaker_tag'];
						$speakers_data['company_website'] = $sData['company_website'];
						$data[$i]['speaker_data'][$j] = $speakers_data;
						$j++;

					}//while Speakers fetch

					
			}//if speakers row count

		         
				 // End Speaker Data				
						
						
						$i++;
					}
					
					
			}
			
		///Select the category color and name for the modal
			$color_q = "SELECT category, color_class, room FROM agenda_categories WHERE id = :id";	
					
		$color = $this->pdo->prepare($color_q);
		$color->bindValue(':id', $category, \PDO::PARAM_INT);
		$color->execute();

			if ($color->rowCount() > 0) {
				$colorData = $color->fetch();
				$SessionColor = $colorData['color_class'];
				$SessionCategory = $colorData['category'];
				$room = $colorData['room'];
			}
			
	$var = 0;
foreach ($data as $sessions){
       
  if ($sessions['agenda_session_id'] == $sId) { 
               $var--;
			
			  $prev = $var;    
			
			  
			  $var++;
			  $var++;
			  
			  $next = $var;
			  
	if($sessions['start_minute'] == 0){
		$sessions['start_minute'] = '00';
	}
	
   if($sessions['end_minute'] == 0){
		$sessions['end_minute'] = '00';
	}
	
if ($SessionCategory == 'Product Demonstration' && $day == '2'){
	$room = "Room 252 A";
}
	
if (!isset($room) || $room == '' || $room == NULL){
  $room_data = '';	
} else {
	$room_data = '<h2 class="RoomNum">'.$room.'</h2>';
}
	$output = '
	
	<div id="ModalBigContainer" style="display:none">
	<i id="SessionInfoModalCloseButton" class="icon icon-close-icon close-reveal-modal"> </i>

	
 <!-- Day Info Container (left part of the modal) -->
  <div id="DayInfoContainer">
    <h2>DAY '.$day.'</h2>
    <h3 class="'.$SessionColor.'Color" id="ModalStageName">'.$SessionCategory.'</h3>
    <h2>Start Time</h2>
    <h3 id="SessionStartTime">'.$sessions['start_hour'].':'.$sessions['start_minute'].'</h3>
    <h2>End Time</h2>
    <h3>'.$sessions['end_hour'].':'.$sessions['end_minute'].'</h3>
	 '.$room_data.'
  </div>
  <!-- Day Info Container (left part of the modal) -->
  <!-- Session Info Container (right part of the modal) -->
  <div id="SessionInfoContainer">';
  
  $output .= $speaker_data($sessions, $SessionColor);
                 
    $output .= '<!-- Session Info -->
    <div id="SessionInfo">
    	<h2 id="SessionTitle" class="'.$SessionColor.'Color">'.$sessions['title'].'</h2>
         <div id="SessionAbstract">
		      '.utf8_encode($this->clean_modal_bio($sessions['text'])).'
		  </div>
    </div>
	    <!-- END Session Info -->
	';
	
	if (isset($prev) && isset($data[$prev]['title'])){
		
		  if($data[$prev]['start_minute'] == 0){
			  $data[$prev]['start_minute'] = '00';
		  }
		  
		 if($data[$prev]['end_minute'] == 0){
			  $data[$prev]['end_minute'] = '00';
		  }
		

    $output .= ' <!-- Previous, Next Sessions -->
    <div id="PreviousSession" class="PrevNextSession" data-agenda_id="'.$data[$prev]['agenda_session_id'].'" data-agenda_category="'.$data[$prev]['category'].'" data-agenda_day="'.$data[$prev]['day'].'">
    	<h3>Previous</h3>
         <h4 id="PreviousSessionTitle" class="'.$SessionColor.'Color">'.$data[$prev]['title'].'</h4>
        <p>'.$data[$prev]['start_hour'].':'.$data[$prev]['start_minute'].' - '.$data[$prev]['end_hour'].':'.$data[$prev]['end_minute'].'</p>
    </div>';
	
	} else {
		    $output .= ' <!-- Previous, Next Sessions -->
    <div id="PreviousSession" class="FillerPrevNextDiv">
    	
        <a href="#"><h4 id="PreviousSessionTitle"></h4></a>
        <p></p>
    </div>';
		
	}
	
	if (isset($next) && isset($data[$next]['title'])){
		
		  if($data[$next]['start_minute'] == 0){
			  $data[$next]['start_minute'] = '00';
		  }
		  
		 if($data[$next]['end_minute'] == 0){
			  $data[$next]['end_minute'] = '00';
		  }
				
		  
		
     $output .= '<div id="NextSession" class="PrevNextSession"data-agenda_id="'.$data[$next]['agenda_session_id'].'" data-agenda_category="'.$data[$next]['category'].'" data-agenda_day="'.$data[$next]['day'].'">
    	<h3>Next</h3>
        <h4 id="NextSessionTitle" class="'.$SessionColor.'Color">'.$data[$next]['title'].'</h4>
        <p>'.$data[$next]['start_hour'].':'.$data[$next]['start_minute'].' - '.$data[$next]['end_hour'].':'.$data[$next]['end_minute'].'</p>
    </div>';
	
	}
	
    $output .= ' <!-- Previous, Next Sessions -->
  </div>

  <!-- END Session Info Container (right part of the modal) -->
  </div>';
  } //if sId = session id
  
  $var++;
}//foreach data ends
	
	return $output;
	
}


public function get_category_styles($category) {
	$colorData = '';
	
			///Select the category color and name for the modal
			$color_q = "SELECT category, color_class, main_color, second_color, room FROM agenda_categories WHERE id = :id";	
					
		$color = $this->pdo->prepare($color_q);
		$color->bindValue(':id', $category, \PDO::PARAM_INT);
		$color->execute();

			if ($color->rowCount() > 0) {
				$colorData = $color->fetch();

			}
	
      return $colorData;	
}


public function display_categories() {
	
	$output = '';
	

		 $agenda_q = "SELECT id, category, color_class FROM agenda_categories WHERE id > 3 AND id <> 12 AND id <> 18 AND id <> 20";	
					
		$agenda = $this->pdo->prepare($agenda_q);
		$agenda->execute();

			if ($agenda->rowCount() > 0) {
					while($sData = $agenda->fetch()){


 $output .='
 
	        	<!-- '.$sData['category'].' -->
    <div class="StageButtonAG3" data-agenda_category="'.$sData['id'].'" id="'.$sData['color_class'].'">
    	<i class="icon icon-ag3-'.$sData['color_class'].'"></i>
        <h6 class="StageNameAG3">'.$sData['category'].'</h6>
    </div>
    <!-- END '.$sData['category'].' -->';


					}//While sData fetch
					
					
			}//if row count
			 

 $output .='
	        	<!-- Close -->
    <div class="StageButtonAG3" data-agenda_category="close" id="CloseCategoryPanel">
    	<i class="icon icon-close-icon"></i>
        <h6 class="StageNameAG3">Close</h6>
    </div>
    <!-- END Close -->';


	return $output;
	
}

public function display_categories_v7() {
	
	$output = '';
	
		$anal_code = function($location, $type, $title){
		$out = 'onClick="_gaq.push([';
		
		$out .="'_trackEvent', '".$location."', '".$type."', '".$title."']);";
		
		$out .='"';
		
		return $out;
	};

		 $agenda_q = "SELECT id, category, color_class FROM agenda_categories WHERE id > 3 AND id <> 12 AND id <> 18 AND id <> 20";	
					
		$agenda = $this->pdo->prepare($agenda_q);
		$agenda->execute();

			if ($agenda->rowCount() > 0) {
					while($sData = $agenda->fetch()){


   $output .='<li class="StageMenuItem" data-agenda_category="'.$sData['id'].'" id="'.$sData['color_class'].'Floating" '.$anal_code('Agenda','Toggle', $sData['color_class']).'>'.$sData['category'].'</li>';


					}//While sData fetch
					
					
			}//if row count
			 


	return $output;
	
}


public function get_category_colors() {
	$colorData = '';
	$i= 0;
			///Select the category color and name for the modal
			$color_q = "SELECT id, main_color FROM agenda_categories";	
					
		$color = $this->pdo->prepare($color_q);
		$color->execute();

			if ($color->rowCount() > 0) {
				while($sData = $color->fetch()){
				   $colorData[$i]['id'] = $sData['id'];
				   $colorData[$i]['main_color'] = $sData['main_color'];
				   $i++;
				}
			}
	
      return $colorData;	
}


 protected function agenda_sponsor_get_data($income_array) {
	 
	 $i = 0;
	 
	if (isset($income_array) && $income_array[0] != ''){
		foreach ($income_array as $elem){

	 
	 	$stat_q = "SELECT sn.sponsor_name, sb.sponsor_bio, sc.category_id, sl.sponsor_link_url, idb.image_url, idb.alt_name FROM sponsors_name as sn, sponsors_bio as sb, sponsors_data_connection as sdc, sponsors_status as ss, sponsors_category as sc, sponsors_links as sl, image_db as idb, image_connection as ic WHERE sdc.sponsor_name_id=sn.id AND sdc.sponsor_bio_id=sb.id AND sdc.sponsor_id=ss.sponsor_id AND ss.status_id='1' AND sdc.sponsor_link_id=sl.id AND ic.entity_type_id='2' AND ic.entity_id=sdc.sponsor_id AND idb.id=ic.image_db_id AND sdc.sponsor_category_id=sc.id AND sdc.sponsor_id = :id ORDER BY sn.sponsor_name ASC";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->bindValue(':id', $elem, \PDO::PARAM_INT);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($sponsors = $stat->fetch()){
	
					   $logo_q = "SELECT image_url FROM agenda_sponsor_logos WHERE sponsor_id = :sponsor";
					   $logo = $this->pdo->prepare($logo_q);
					   
					   $logo->bindValue(':sponsor', $elem, \PDO::PARAM_INT);
					   $logo->execute();
					   
					   if ($logo->rowCount() > 0) {
						    $image = $logo->fetch();
							$data[$i]['image_url'] = $image['image_url'];
							$data[$i]['grayscaled'] = 1;
					   } else {
						  $data[$i]['image_url'] =  $sponsors['image_url'];
						  $data[$i]['grayscaled'] = 0;  
					   }
						
						
						$data[$i]['sponsor_id'] =  $elem;
						$data[$i]['alt_name'] =  $sponsors['alt_name'];
						$data[$i]['sponsor_name'] = $this->clean_str($sponsors['sponsor_name']);
						$i++;
					  
					}//while sponsors
					
			 }//if stat row count
		
		
		}
		
	}
			
return $data;			
	 
 }
 
 
public function agenda_sponsor_display($day, $category){
	
		$anal_code = function($location, $type, $title){
		$out = 'onClick="_gaq.push([';
		
		$out .="'_trackEvent', '".$location."', '".$type."', '".$title."']);";
		
		$out .='"';
		
		return $out;
	};
	
	$rows = 4;
	$out = '';
	$i = 0;
	$type = 1;
	$final_sponsors[0] = '';
	
	$x = 0;
		$stat_q = "SELECT sn.sponsor_name, sb.sponsor_bio, sc.category_id, sl.sponsor_link_url, idb.image_url, idb.alt_name, sdc.sponsor_id FROM sponsors_name as sn, sponsors_bio as sb, sponsors_data_connection as sdc, sponsors_status as ss, sponsors_category as sc, sponsors_links as sl, image_db as idb, image_connection as ic WHERE sdc.sponsor_name_id=sn.id AND sdc.sponsor_bio_id=sb.id AND sdc.sponsor_id=ss.sponsor_id AND ss.status_id='1' AND sdc.sponsor_link_id=sl.id AND ic.entity_type_id='2' AND ic.entity_id=sdc.sponsor_id AND idb.id=ic.image_db_id AND sdc.sponsor_category_id=sc.id ORDER BY sn.sponsor_name ASC";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->execute();

			if ($stat->rowCount() > 0) {
				$all_sponsors = $stat->rowCount();
				$all_sponsors--;
				while($all_s_temp = $stat->fetch()){
				   $SponsorIdData[$x] = $all_s_temp['sponsor_id'];
				   $x++;
			}
	
	
	
		 		//we get the data from the db first 
				$sponsor_q = "SELECT agsc.sponsor_id, agsd.type FROM agenda_sponsor_display as agsd INNER JOIN agenda_sponsor_connection as agsc ON agsd.id=agsc.agenda_sponsor_display_id WHERE agenda_day = :day AND agenda_category_id = :category";	
							
				$sponsor = $this->pdo->prepare($sponsor_q);
				$sponsor->bindValue(':day', $day, \PDO::PARAM_INT);
				$sponsor->bindValue(':category', $category, \PDO::PARAM_INT);
				$sponsor->execute();
		
					if ($sponsor->rowCount() > 0) {
					 	 
						while($sponsor_data = $sponsor->fetch()){
							$data[$i]['sponsor_id'] =  $sponsor_data['sponsor_id'];
							$type =  $sponsor_data['type'];
							$i++;
							
						}
						
					}
	

$prefered[0] = '';	
$pref_num = 0;
if (isset($data)){	
	$j = 0;
	foreach ($data as $elems){
	  $prefered[$j] = $elems['sponsor_id'];	
	  $j++;
	}
$pref_num = count($prefered);
$pref_num--;	
} 	
		
	
if (!isset($type) || $type == 1){
	$z = 0;
	for ($x = 0 ; $x <= 3; $x++) {
		$checker = 1;
		  $rand_num = $SponsorIdData[mt_rand(0, $all_sponsors)];
		  
		  while ($checker != 0) {
			  if (!in_array($rand_num, $final_sponsors)){
				   $checker = 0;
				 
			  }else {
				  $rand_num = $SponsorIdData[mt_rand(0, $all_sponsors)];
			  }
			
		  }
		  
		 $final_sponsors[$z] = $rand_num;
		$z++;
	}
}
	
} 
	
	
if ($type == 3){
	if ($i < 4){
		
	   $missing = 3 - $i;
	   if ($missing < 0){
		  $missing = 1; 
	   }
	   
	   $z = 0;
	   
	   	for ($x = 0 ; $x <= $missing; $x++) {
		  $checker = 1;
		  $rand_num = $SponsorIdData[mt_rand(0, $all_sponsors)];
		  
		  while ($checker != 0) {
			  if (!in_array($rand_num, $final_sponsors)){
				   $checker = 0;
				 
			  }else {
				  $rand_num = $SponsorIdData[mt_rand(0, $all_sponsors)];
			  }
			
		  }
		  
		 $final_sponsors[$z] = $rand_num;
		 $z++;
	   }
		
    }//if i < 4
	   if (isset($prefered[0])){
		   		$reversed_pref = array_reverse($prefered);
		        foreach ($reversed_pref as $items){
					 if (!in_array($items, $final_sponsors)){
		                 array_unshift($final_sponsors, $items);
					 }
		        }
		   
	   }

				
}//if type == 3





if ($type == 2){


	$z = 0;
	for ($x = 0 ; $x <= 3; $x++) {
		$checker = 1;
		$choose = mt_rand(1, 10);
		
		if ($choose > 4 && isset($pref_num) && $pref_num > 0){
	  
			$num = $prefered[mt_rand(0, $pref_num)];
			 
			if (in_array($num, $final_sponsors)){ 
			
			   $num = $SponsorIdData[mt_rand(0, $all_sponsors)];
				  while ($checker != 0) {
					if (!in_array($num, $final_sponsors)){
						 $checker = 0;
					   
					}else { //if !in_array num
						$num = $SponsorIdData[mt_rand(0, $all_sponsors)];
					}
			
		          }//while checker
			
			
			}//if in array num
			
			 
			 
			$final_sponsors[$z] = $num;
			
		}  //if choose > 2
		 else {
			   $num = $SponsorIdData[mt_rand(0, $all_sponsors)];
				  while ($checker != 0) {
					if (!in_array($num, $final_sponsors)){
						 $checker = 0;
					   
					}else {
						$num = $SponsorIdData[mt_rand(0, $all_sponsors)];
					}
			
		          }
			 $final_sponsors[$z] = $num;
		}
		
		
		$z++;
	}

	
}

	
	$data = $this->agenda_sponsor_get_data($final_sponsors);
	

	
	if (isset($data) && $data[0]['sponsor_id'] != ''){
		foreach ($data as $elem){
	
	if($elem['grayscaled'] == 0){
			
/** GrayScale image  **/

	if(file_exists('img/sponsors/logos/'.$elem['image_url'])){
			$ext = explode('.', $elem['image_url']);
			if (end($ext) == 'jpg' || end($ext) == 'jpeg' || end($ext) == 'JPG' || end($ext) == 'JPEG'){
				$im = imagecreatefromjpeg('img/sponsors/logos/'.$elem['image_url']);
			} else {
			  $im = imagecreatefrompng('img/sponsors/logos/'.$elem['image_url']);	
			}
		
	} else {
	   $im = '';	
	}
	

if(isset($im) && $im != '' && imagefilter($im, IMG_FILTER_COLORIZE, 0,0,0) && imagefilter($im, IMG_FILTER_GRAYSCALE))
{

    imagepng($im, 'img/agenda/sponsors/'.$elem['image_url']);
	//imagedestroy($im);
}



/** END Grayscale image***/	
	}
			
			$out .='
		    <div class="Sponsor">
                <a href="http://www.hrtechcongress.com/sponsors#'.$elem['sponsor_name'].'" '.$anal_code('Agenda','InternalForward', $elem['sponsor_name']).'><img class="AgendaSponsorLogo" src="img/agenda/sponsors/'.$elem['image_url'].'" alt="'.$elem['alt_name'].'"></a>
            </div>
			';
			
		}
		
	}
	
	
return $out;

}

public function decode_url($url){
	$out[0] = '';
	
			///Select the category color and name for the modal
			$color_q = "SELECT id FROM agenda_categories WHERE url = :url";	
					
		$color = $this->pdo->prepare($color_q);
		$color->bindValue(':url', $url, \PDO::PARAM_STR);
		$color->execute();

			if ($color->rowCount() > 0) {
				 $category = $color->fetch();
              $out[0] = 'stage';
			  $out[1] = $category['id'];
			} else {
			//if it's not a stage	

			  
				  $i = 0;
				  $data = '';
				  
				  
		/*
			  
				  //Get the general data about the sessions specified by the parameters
				  $agenda_session_q ="SELECT asdc.agenda_session_id, ast.title, acc.agenda_category_id, acc.agenda_day FROM agenda_session_title as ast, agenda_session_description as asd, agenda_session_timeframe as asti, agenda_session_data_connection as asdc, agenda_category_connection as acc, agenda_session_status as ass WHERE acc.agenda_session_id=asdc.agenda_session_id AND asdc.agenda_title_id=ast.id AND asdc.agenda_description_id=asd.id AND asdc.agenda_timeframe_id=asti.id AND asdc.agenda_session_id=ass.agenda_session_id AND ass.status=1 AND asdc.agenda_type_id=1 ORDER BY asti.start_hour, asti.start_minute";
				  
					  $agenda_session = $this->pdo->prepare($agenda_session_q);
					  $agenda_session->execute();
			  
						  if ($agenda_session->rowCount() > 0) {
								  while($sessions = $agenda_session->fetch()){
									  $data[$i]['agenda_session_id'] = $sessions['agenda_session_id'];
									  $data[$i]['title'] = $sessions['title'];
									  $data[$i]['category'] = $sessions['category_id'];
									  $data[$i]['day'] = $sessions['agenda_day'];
									  
									  //Get the speaker connection data

							   
					   // End Speaker Data	
					
					//This is only needed for the data insert 
								
						$new_title = $this->clean_str2($data[$i]['title']);			  
						
														//upload the new image
				 $new_link_q = "INSERT INTO agenda_session_url SET agenda_session_id = :id, agenda_url = :url";
				 $new_link = $this->pdo->prepare($new_link_q);
				 
				 $new_link->bindValue(':id', $sessions['agenda_session_id'], \PDO::PARAM_INT);
				 $new_link->bindValue(':url', $new_title, \PDO::PARAM_STR);
				 
				 $new_link->execute();
							
						
						
						
									  
									  $i++;
								  }
								  
								  
						  }		
						  */		
			
			
	
		
	
				///Select the category color and name for the modal
	 $session_q = "SELECT agenda_session_id FROM agenda_session_url WHERE agenda_url = :url";	
					
		$session = $this->pdo->prepare($session_q);
		$session->bindValue(':url', $url, \PDO::PARAM_STR);
		$session->execute();

			if ($session->rowCount() > 0) {
				 $agenda_id = $session->fetch();
              $out[0] = 'session';
			  
 $agenda_session_q ="SELECT ast.title, acc.agenda_category_id, acc.agenda_day FROM agenda_session_title as ast, agenda_session_description as asd, agenda_session_timeframe as asti, agenda_session_data_connection as asdc, agenda_category_connection as acc, agenda_session_status as ass WHERE acc.agenda_session_id=asdc.agenda_session_id AND asdc.agenda_title_id=ast.id AND asdc.agenda_description_id=asd.id AND asdc.agenda_timeframe_id=asti.id AND asdc.agenda_session_id=ass.agenda_session_id AND ass.status=1 AND asdc.agenda_type_id=1 AND asdc.agenda_session_id = :id ORDER BY asti.start_hour, asti.start_minute LIMIT 0,1";
				  
					  $agenda_session = $this->pdo->prepare($agenda_session_q);
					  $agenda_session->bindValue(':id',  $agenda_id['agenda_session_id'], \PDO::PARAM_INT);
					  $agenda_session->execute();
			  
						  if ($agenda_session->rowCount() > 0) {
								  while($sessions = $agenda_session->fetch()){
									  $out[1]['agenda_id'] = $agenda_id['agenda_session_id'];
									  $out[1]['category'] = $sessions['agenda_category_id'];
									  $out[1]['day'] = $sessions['agenda_day'];
									  
									  //Get the speaker connection data

								  }
								  
								  
						  }						

			
			}	
				

			
			}// if it's not a stage end
	
	
return $out;	
}

}
?>	