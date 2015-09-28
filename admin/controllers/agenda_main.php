<?php 
namespace HRNParis\agenda;
use HRNParis\config as config;
include_once('config.php');	
	if (!isset($_SESSION)){
	  session_start();	
	}
	
class agenda_main extends config {



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
		$pool_end = 10;
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
					  $end_num = $random_check($numbers, $pool_start, $pool_end);
				  }
				 
				  
			  } else {
				  //if we are unlucky, we create a random number

			   $end_num = $random_check($numbers, $pool_start, $pool_end);
			  
				  
			  }
                 if (!isset($numbers) || $numbers == ''){
					
					$numbers[0] =  $end_num;
					 
				 } else {
					array_push($numbers, $end_num); 
				 }
			 
		 	
			
		} else { //if the mode is total random


             $end_num = $random_check($numbers, $pool_start, $pool_end);

                           if (!isset($numbers) || $numbers == ''){
					
					$numbers[0] =  $end_num;
					 
				 } else {
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
			$speakers_q = "SELECT scn.company_name, ast.title, asn.speaker_name, sdc.speaker_id FROM agenda_session_speaker_connection as assc INNER JOIN speakers_data_connection as sdc ON assc.speaker_id=sdc.speaker_id, speakers_company_data_connection as scdc INNER JOIN speakers_company_name as scn ON scdc.speaker_company_name_id=scn.id, speakers_name as asn, speakers_title as ast WHERE assc.agenda_session_id= :agenda_id AND sdc.speaker_title_id=ast.id AND sdc.speaker_name_id=asn.id AND sdc.speaker_company_id=scdc.speaker_company_id ORDER BY sdc.date";	
					
		$speakers = $this->pdo->prepare($speakers_q);
		$speakers->bindValue(':agenda_id', $sessions['agenda_session_id'], \PDO::PARAM_INT);
		$speakers->execute();

			if ($speakers->rowCount() > 0) {
					while($sData = $speakers->fetch()){
						$speakers_data['company_name'] = $sData['company_name'];
						$speakers_data['title'] = $sData['title'];
						$speakers_data['speaker_name'] = $sData['speaker_name'];
						$speakers_data['speaker_id'] = $sData['speaker_id'];
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


public function display_session_mobile($source){
	
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



 $output .='
	        <div class="Session" data-reveal-id="SessionInfoModal">
        	<div class="SessionTimeContainer">
            	<h3 class="SessionStartTime">'.$data['start_hour'].':'.$data['start_minute'].'</h3><i class="fa fa-caret-right TalentSummitColor"></i>
            </div>
            <div class="SessionContent">
            	<h3 class="SessionTitle TalentSummitColor" data-reveal-id="SessionInfoModal">'.$data['title'].'</h3>';
	         $output .= $speaker_data($data);
            $output .=' </div>
        </div>';


			 
		 } //End foreach source
	
	
		}

	return $output;
	
}

/****************************
-----------------------------
Session display for Desktop
------------------------------
****************************/
public function display_sessions($source) {
	
	$output = '';
	$_SESSION['Agenda_height'] = 0;
	
	/*******************
	  Internal Functions
	**********************/
	
	
	    //Display the speaker info(s) if the session have speaker(s)			 
			$speaker_data = function($array){
				$content = '';
				if (isset($array['speaker_data'])){
					foreach ($array['speaker_data'] as $speakers){
						
						$content .='<div class="SpeakerInfoAdmin" data-agenda_id="'.$array['agenda_session_id'].'" data-reveal-id="SessionInfoModal">'.$speakers['speaker_name'].'</div>';
						
					}

				}
				return $content;
				
			};
			
			
//Calculate margins and paddings based on session length			
	$styleCalculator = function($start_hour, $start_minute, $end_hour, $end_minute, $prev_hour, $prev_minute) {
		$margin = '';
		
	
	if (isset($_SESSION['admin'])) {
		
				  $padding = 210;
			  
			  $margin = 10;
			 
			
			$_SESSION['Agenda_height'] += $padding + $margin; 
			 
			 $style = 'height:'.$padding.'px; margin-top:'.$margin.'px;'; 	
		
		//if isset admin end
	} else {
		
		
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

				  $margin = ((36*$margin_cal) - $_SESSION['Agenda_height']);
			  }
			  
			  $padding = 210;
			  
			  $margin = 0;
			 
			
			$_SESSION['Agenda_height'] += $padding + $margin; 
			 
			 $style = 'height:'.$padding.'px; margin-top:'.$margin.'px;'; 
			  
			  
			  
		  }
		  
	}//if not isset admin
		  
		return $style; 
	};
	
	
	
		 //display time stuff
	  $time_display = function($type, $array, $choosen){
		  $out = '';
		  if($type == 'hour') {
		       foreach ($array[0] as $nums){
			   
			            if ($nums == $choosen) {
							$out .= '<option selected="selected" value="'.$nums.'">'.$nums.'</option>';
							
						} else {
							 $out .= '<option value="'.$nums.'">'.$nums.'</option>';
						}
				   
				  
			   }
			   
			   
		  }	   
			   if($type == 'minute'){
				   foreach ($array[1] as $nums){
			   
				        if ($nums == $choosen) {
							$out .= '<option selected="selected" value="'.$nums.'">'.$nums.'</option>';
							
						} else {
							 $out .= '<option value="'.$nums.'">'.$nums.'</option>';
						}
				   
			        }
		       }
		 
		 return $out; 
	  };
	  
	  
	  //display session categories
	  	$category_display = function($array, $choosen) {
		$out = '';
		
		foreach ($array as $cat) {
			
			if ($choosen == $cat[0]) {
				 $out .= '<option selected="selected" value="'.$cat[0].'">'.$cat[1].'</option>';	
			} else {
			    $out .= '<option value="'.$cat[0].'">'.$cat[1].'</option>';		
			}
		  
			
		}
		
		return $out;
	};
	
	
	$day_display = function($day) {
		$out = '';
		$days = array('1' => 'Day 1', '2' => 'Day2'); 
		
		foreach ($days as $ind => $val){
			
			 if ($day == $ind) {
				  $out .= '<option selected="selected" value="'.$ind.'">'.$val.'</option>';	 
			 } else {
				 
				 $out .= '<option value="'.$ind.'">'.$val.'</option>';	  
			 }
			
		}
	
	  return $out;	 
	};
	
	/***********************
	  Displays
	*************************/
	
	$times = $this->display_time_admin();
	$categories = $this->get_session_categories();
	
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
			
			if (isset($_SESSION['admin'])){
				//Admin mode
				
						//This is the output what goes out to live
		//----------------------------------------------------------------	 
			 $output .='
				<!-- '.$data['title'].' -->
				  <div class="SessionDesktop '.$sessionClass.'"  data-agenda_id="'.$data['agenda_session_id'].'" data-agenda_day="'.$data['day'].'" data-agenda_category="'.$data['category'].'" style="'.$styleCalculator($data['start_hour'], $data['start_minute'], $data['end_hour'], $data['end_minute'], $prev_hour, $prev_minute).'">           
				   <span class="Dots '.$color['color_class'].'Color">...</span>
					
					  <div class="SessionContent">
					      <div class="Response_'.$data['agenda_session_id'].'" style="display:none"></div>
						  <h4 class="SessionTitleAdmin '.$sessionTitleClass.'" data-agenda_id="'.$data['agenda_session_id'].'">'.$data['title'].'</h4>
						  
						  <select data-agenda_id="'.$data['agenda_session_id'].'" data-edittype="StartHour" class="StartHour TimeSelector">
						  '.$time_display('hour', $times, $data['start_hour']).'
						  </select>
						  
						  <select data-agenda_id="'.$data['agenda_session_id'].'" data-edittype="StartMinute" class="StartMinute TimeSelector">
						  '.$time_display('minute', $times, $data['start_minute']).'
						  </select>
						  
						  <select data-agenda_id="'.$data['agenda_session_id'].'" data-edittype="EndHour" class="EndHour TimeSelector">
						  '.$time_display('hour', $times, $data['end_hour']).'
						  </select>
						  
						  <select data-agenda_id="'.$data['agenda_session_id'].'" data-edittype="EndMinute" class="EndMinute TimeSelector">
						  '.$time_display('minute', $times, $data['end_minute']).'
						  </select>
					
						  <select data-agenda_id="'.$data['agenda_session_id'].'" class="Category CategorySelector">
						  '.$category_display($categories, $data['category']).'
						  </select>	  
						  
						  
						  <select data-agenda_id="'.$data['agenda_session_id'].'" class="DaySelector">
						  '.$day_display($data['day']).'
						  </select>	  
						  ';
						  
			$output .= '<div class="SessionSpeakerContainerBox">';		
						                 
			   $output .= $speaker_data($data);
			  $output .='<div class="SpeakerInfoAdmin" data-agenda_id="'.$data['agenda_session_id'].'" data-reveal-id="SessionInfoModal">Add/Remove Speaker</div>';
			
			$output .= '</div>';
			
				$output .='<div class="SessionAbstract" data-agenda_id="'.$data['agenda_session_id'].'" data-reveal-id="SessionInfoModal">Edit Abstract</div> 
				
				<div class="SessionDelete" data-agenda_id="'.$data['agenda_session_id'].'">Delete Session</div>';
		$output .='</div>
				  </div>
				  <!-- END '.$data['title'].'-->';
   //-------------------------------------------------------------------------------------	
				
				
				
			} //Admin mode end
			 else {
		//This is the output what goes out to live
		//----------------------------------------------------------------	 
		     //Normal mode
		
			 $output .='
				<!-- '.$data['title'].' -->
				  <div class="SessionDesktop '.$sessionClass.'" data-reveal-id="SessionInfoModal" data-agenda_id="'.$data['agenda_session_id'].'" data-agenda_day="'.$data['day'].'" data-agenda_category="'.$data['category'].'" style="'.$styleCalculator($data['start_hour'], $data['start_minute'], $data['end_hour'], $data['end_minute'], $prev_hour, $prev_minute).'">           
				   <span class="Dots '.$color['color_class'].'Color">...</span>
					
					  <div class="SessionContent">
						  <h4 class="'.$sessionTitleClass.'">'.$data['title'].'</h4>';
			
			$output .= $speaker_data($data);
			
		$output .='</div>
				  </div>
				  <!-- END '.$data['title'].'-->';
   //-------------------------------------------------------------------------------------			 
			
			 }//Normal mode end
			 
			 
			
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
	  
	  $length = 15 * 4; // The number of times we need to run the loop 
	  
	  for ($i=0;$i<$length;++$i){ 
	  
	  if (str_pad($min, 2, "0", STR_PAD_LEFT) == 30 || str_pad($min, 2, "0", STR_PAD_LEFT) == 0){
		 $out .= '<div class="AgendaTimeFull">'.str_pad($hour, 2, "0", STR_PAD_LEFT) .':'. str_pad($min, 2, "0", STR_PAD_LEFT).'</div>'; 
	  } else {
		   $out .= '<div>'.str_pad($min, 2, "0", STR_PAD_LEFT).'</div>';  
	  }
	  
		
		if ($min < 50) { $min = $min + 10; } else { $min = 0; ++$hour; } 
		
		
	  } 
	  
	   $out .= '<div class="AgendaTimeFull">18:00</div>'; // Adds the last line to the end of the array 
	  
	  return $out; 

 }
 
 
 public function display_time_admin(){ 
 
 $length = 19;

$k = 0;
 for ($i=8;$i<$length;++$i){
	 
	  $time[0][$k] = $i;
	  $k++;
	 
 }
 
  $length = 60;
 
 $z = 0;
 for ($i=0;$i<$length;$i++){
	 
	 if (($i % 5) == 0) {
		 
		   if ($i == 5) {
			   $time[1][$z] = '05';
		   }else {
			   if ($i == 0) {
				   $time[1][$z] = '00';
			   }else {
				   $time[1][$z] = $i;
			   }
			    
		   }
		 
		  $z++;
	 }
 }
	  
	
	  
	  return $time; 

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
	 
	 ///NEED MORE POLISH
	 
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
									$choosen[$data['block']][0] = $data['entity_type_id'];
									$choosen[$data['block']][1] = $data['entity_id'];
									$choosen[$data['block']][2] = $data['block'];
									
									//to eliminate duplicates
									$exluded[$ex][0] = $data['entity_type_id'];
									$exluded[$ex][1] = $data['entity_id'];
									$ex++;
									
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
		
			 
			
			 //if we have prefered from both of them
				if (($speaker_db > 0 && $quote_db > 0) || ($speaker_db == 0 && $quote_db == 0)){
					
					  $random_chance = rand(0,20);
					
					if ($random_chance < 15){
					   $choosen_type = 1;	
					} else {
						$choosen_type = 2;
					}
					
				}
				
				
				//if we only have speaker prefered
				if ($speaker_db > 0 && $quote_db == 0){
					
					//we run a rand function. If the random change below 10, then it's a speaker
					$random_chance = rand(0,11);
					
					if ($random_chance < 10){
					   $choosen_type = 1;	
					} else {
						$choosen_type = 2;
					}
					
					
				}//if speaker_db > 0
				
				
				//if we have quote prefered
				if ($speaker_db == 0 && $quote_db > 0){
					
					//we run a rand function. If the random change below 10, then it's a quote
					$random_chance = rand(0,12);
					
					if ($random_chance < 10){
					   $choosen_type = 2;	
					} else {
						$choosen_type = 1;
					}
					
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
			
			    $the_num = $this->randomGenerator($pool,$mode , $prefered ,1 , 2);
				
			
			 //to eliminate duplicates 

			   
				foreach ($exluded as $exludes) {
					
					while ($choosen_type == $exludes[0] && $the_num[0] == $exludes[1]) {
						$the_num = $this->randomGenerator($pool,$mode , $prefered ,1 , 6);
					}

				}
				

												
				$exluded[$ex][0] = $choosen_type;
				$exluded[$ex][1] = $the_num[0];
				$ex++;
			
			// Eliminate duplicates end
			
			$final_num[$block_num][1] = $the_num[0];
			
			
		}//foreach blocks

		
		foreach ($choosen as $chosed) {
			$final_num[$chosed[2]][0] = $chosed[0];
			$final_num[$chosed[2]][1] = $chosed[1];	
					
		}
 
 	} //if isset panels
	 else {
		 
		$final_num[1][0] = ''; 
	 }
	
 $array_check = function($array, $num) {
	 if (!isset($array[$num]) || $array[$num][0] == ''){
		 
		 	$random_chance = rand(0,20);
					
					if ($random_chance < 16){
					   $choosen_type = 1;	
					} else {
						$choosen_type = 2;
					}		
         
		 return $choosen_type; 
	 }//if !isset array[num]
	 
	return -1;
 };
 
$db_num = 2;

for ($x = 0 ; $x <= $db_num; $x++) {
	
	 $chk = $array_check($final_num,$x);
	 
		   if ($chk == 1) {
			  $final_num[$x][0] = 1;
			  
			  	$pool[0] = 1;
				$pool[1] = $speakers_rows;
				$mode = 2;
				$prefered = '';
			  
			  $the_num = $this->randomGenerator($pool,$mode , $prefered ,1 , 6);
			
			 //to eliminate duplicates 

			  if (isset($exluded)) { 
					  foreach ($exluded as $exludes) {
						  
						  while ($chk == $exludes[0] && $the_num[0] == $exludes[1] || $the_num[0] == '') {
							  $the_num = $this->randomGenerator($pool,$mode , $prefered ,1 , 6);
						  }
	  
					  }
				
				  }

												
				$exluded[$ex][0] = $chk;
				$exluded[$ex][1] = $the_num[0];
				$ex++;
				
			
			
			// Eliminate duplicates end
		
			  
			  $final_num[$x][1] = $the_num[0];
			   
		   }
		   
		   if ($chk == 2) {
			  $final_num[$x][0] = 2;
			  
			  	$pool[0] = 1;
				$pool[1] = $quote_rows;
				$mode = 2;
				$prefered = '';
			  
			 $the_num = $this->randomGenerator($pool,$mode , $prefered ,1 , 6);
			
			 //to eliminate duplicates 
            if (isset($exluded)) { 
			   
						foreach ($exluded as $exludes) {
							
							while ($chk == $exludes[0] && $the_num[0] == $exludes[1] || $the_num[0] == '') {
								$the_num = $this->randomGenerator($pool,$mode , $prefered ,1 , 6);
							}
		
						}
			}

												
				$exluded[$ex][0] = $chk;
				$exluded[$ex][1] = $the_num[0];
				$ex++;
			
			// Eliminate duplicates end
			
			  
			  $final_num[$x][1] = $the_num[0];
			   
		   }		   
		   
		 
}

	
return  $final_num;	 
	 
 }
 

public function get_block_data($entity_type, $entity_id) {
	$content = '';
	
	  //if it's a speaker
	 if ($entity_type == 1) {
		 
		 		$stat_q = "SELECT sn.speaker_name, st.title, scn.company_name, idb.image_url, idb.alt_name, sdc.speaker_id, sdc.speaker_company_id, stag.speaker_tag FROM speakers_name as sn, speakers_data_connection as sdc, speakers_status as ss, speakers_title as st, speakers_company_name as scn, speakers_company_data_connection as scdc, image_db as idb, image_connection as ic, speakers_tag as stag, speakers_order as soo WHERE sdc.speaker_name_id=sn.id AND sdc.speaker_id=ss.speaker_id AND ss.speaker_status_id='1' AND ic.entity_type_id='1' AND ic.entity_id=sdc.speaker_id AND idb.id=ic.image_db_id AND sdc.speaker_company_id=scdc.speaker_company_id AND scdc.speaker_company_name_id=scn.id AND sdc.speaker_title_id=st.id AND stag.id=sdc.speaker_tag_id AND sdc.speaker_id=soo.speaker_id AND sdc.speaker_id = :id ORDER BY soo.order_id ASC LIMIT 0,1";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->bindValue(':id', $entity_id, \PDO::PARAM_INT);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($speakers = $stat->fetch()){
			
			           /*EDIT SPEAKER STYLE HERE*/
					   
					$content.='<a href="#" title="'.$speakers['speaker_name'].'">
					  <div class="SpeakerBox">
						  <img class="SpeakerBoxPhoto" src="../img/speakers/SpeakerPhotos/'.$speakers['image_url'].'" alt="'.$speakers['speaker_name'].' Photo">
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
				 //FAILSAFE (if the randomly generated speaker don't have data (uploaded 4-5 times :|) we generate a random from the top 6)
				$content.= $this->get_block_data(1, rand(1,6));
				 
			 }
		return $content;
		 
		 
		 
		 
		 
	 }//if it's a speaker
	 
	 
	 
	 //if it's a quote
   if ($entity_type == 2) {
	   
	   		 		$stat_q = "SELECT quote, author FROM agenda_quote WHERE id = :id";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->bindValue(':id', $entity_id, \PDO::PARAM_INT);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($quote = $stat->fetch()){
			
			           /*EDIT QUOTE STYLE HERE*/
					   
				$content.='<div class="TestimonialBox TalentSummitBgColor">
				  <img src="../img/agenda/quote-sign.svg" alt="Testimonial">
				  <div class="TestimonialTextContainer">
					  <p class="Testimonial">'.$quote['quote'].'</p>
					  <p class="TestimonialSpeakerName">'.$quote['author'].'</p>
				  </div>
			  </div>';
					   
			
											  

        	     /*END EDIT QUOTE STYLE HERE*/
				 
				 

					} //stat_q fetch
			}  //stat num row end
			
		return $content;
	   
	   
	   
	   
   }//if it's a quote
	
}






public function get_block_data_admin($category, $day, $block_num) {
	

	
	for ($i = 0; $i <= $block_num; $i++) {
		                //THIS NEEDS REWORK! NOW not showing the correct info because there are no speakers/testimonials attached!!!
	 		 	$block_q = "SELECT id, type FROM agenda_block_display WHERE agenda_category_id= :category AND agenda_day= :day AND block = :block";	
							
				$block = $this->pdo->prepare($block_q);
				$block->bindValue(':category', $category, \PDO::PARAM_INT);
				$block->bindValue(':day', $day, \PDO::PARAM_INT);
				$block->bindValue(':block', $i, \PDO::PARAM_INT);
				$block->execute();
		
					if ($block->rowCount() > 0) {
						while($temp_data = $block->fetch()){
							 $data[$i][0] = $temp_data['type'];
						
						/**********
	                     Get Speaker Data	
                     	*************/	
				$entity_q = "SELECT entity_id, entity_type_id FROM agenda_block_entities WHERE agenda_block_id= :id";	
								
					$entity = $this->pdo->prepare($entity_q);
					$entity->bindValue(':id', $temp_data['id'], \PDO::PARAM_INT);
					$entity->execute();
			
						if ($entity->rowCount() > 0) {
							
							
							$j = 0;
							
							while($entity_data = $entity->fetch()){
							
													
								  if ($entity_data['entity_type_id'] == 1) {
										   
											  $speakers_q = "SELECT sn.speaker_name FROM speakers_name as sn INNER JOIN speakers_data_connection as sdc ON sn.id=sdc.speaker_name_id WHERE sdc.speaker_id = :id";	
														  
											  $speakers = $this->pdo->prepare($speakers_q);
											  $speakers->bindValue(':id', $entity_data['entity_id'], \PDO::PARAM_INT);
											  $speakers->execute();
									  
												  if ($speakers->rowCount() > 0) {
														  while($as = $speakers->fetch()){
															  if ($entity_data['entity_id'] != 0){
																	$data[$i][1][$j]['speaker_id'] = $entity_data['entity_id'];
																	$data[$i][1][$j]['speaker_name'] = $as['speaker_name'];
																	$j++;
															  }//if speaker_id not 0
														  }//while fetch speakers
														  
												  }//if speakers row count
										  
													  
								  }//if temp data_entity_type = 1 as in speaker
								
								//----------------------------------------------------
								
															             //if it's a quote	
							     if ($entity_data['entity_type_id'] == 2) {
										   
											  $quote_q = "SELECT quote, author FROM agenda_quote WHERE id = :id";	
														  
											  $quote = $this->pdo->prepare($quote_q);
											  $quote->bindValue(':id', $entity_data['entity_id'], \PDO::PARAM_INT);
											  $quote->execute();
									  
												  if ($quote->rowCount() > 0) {
														  while($qu = $quote->fetch()){
															  if ($entity_data['entity_id'] != 0){
																    $data[$i][1][$j]['speaker_id'] = $entity_data['entity_id'];
																	$data[$i][1][$j]['speaker_name'] = $qu['quote'];
																	$j++;
															  }//if speaker_id not 0
														  }//while fetch speakers
														  
												  }//if speakers row count
										  
													  
								  }//if temp data_entity_type = 2 as in quote
								  
								
								
								
							}//While fetch entity_data
							
						}//If num row entity_data
								
	/**********
	 Get Speaker Data End	
	*************/		
	
							
						}
						//while temp data	
							
					}else { //if row count block
		              $data[$i][0] = 1;
					  
					}
		
   
}  //for loop
	  
 	
	
	//MAKE SURE THE FINAL BLOCK IS TESTIMONIAL ONLY!!!!!!
	
	
	$content = '';
	
	
	foreach ($data as $ind => $blocks) {
		
		switch ($blocks[0]) {
			case 1:
			  //totally random
			  $content .='<div class="TestimonialBox TalentSummitBgColor AdminBlock" data-category="'.$category.'" data-day="'.$day.'" data-blocknum="'.$ind.'" data-reveal-id="SessionInfoModal">
				  <div class="TestimonialTextContainer">
					  <p class="Testimonial">Random</p>';
				   $content .='</div>
			  </div>';
			  
			      break;
			case 2:
			  //prefered
			  $content .='<div class="TestimonialBox TalentSummitBgColor AdminBlock" data-category="'.$category.'" data-day="'.$day.'" data-blocknum="'.$ind.'" data-reveal-id="SessionInfoModal">
				  <div class="TestimonialTextContainer">
					  <p class="Testimonial">Prefered</p>';
					if (isset($blocks[1])){  
						foreach ($blocks[1] as $blockSp) {
							$content .=' <p class="TestimonialSpeakerName">'.$blockSp['speaker_name'].'</p>';
						}
					}
					  
				  $content .='</div>
			  </div>';
			  
			  
			      break;
			
			case 3: 
			  //fixed
			  $content .='<div class="TestimonialBox TalentSummitBgColor AdminBlock" data-category="'.$category.'" data-day="'.$day.'" data-blocknum="'.$ind.'" data-reveal-id="SessionInfoModal">
				  <div class="TestimonialTextContainer">
					  <p class="Testimonial">Fixed</p>';
					if (isset($blocks[1])){  
						foreach ($blocks[1] as $blockSp) {
							$content .=' <p class="TestimonialSpeakerName">'.$blockSp['speaker_name'].'</p>';
						}
					}
					  
				  $content .='</div>
			  </div>';
			
			     break;
			
		}
	
		
	}
	
				
			

		return $content;
	   
	   
	   
	   
 
	
}

public function agenda_session_modal($category, $day, $sId) {
	
$i = 0;
	$data = '';
	$output = '';
	
	
			    //Display the speaker info(s) if the session have speaker(s)			 
			$speaker_data = function($array, $color){
				$content = '';
				if (isset($array['speaker_data'])){
					foreach ($array['speaker_data'] as $speakers){
						
    $content .='	<!-- Speaker Info -->
        <div id="SpeakerInfoContainer">
    	<a href="#"><img id="SpeakerPhoto" src="../img/speakers/SpeakerPhotos/'.$speakers['image_url'].'" alt="'.$speakers['speaker_name'].' Photo"></a>
        <div id="SpeakerInfo">
        	<a href="#"><h3 class="'.$color.'Color">'.$speakers['speaker_name'].'</h3></a>
            <h3 id="CompanyName">'.$speakers['title'].'</h3>
            <a href="#"><h3 class="'.$color.'Color">'.$speakers['company_name'].'</h3></a>
        </div>
    </div>
    <!-- END Speaker Info -->';
							

					}

				}
				return $content;
				
			};
	
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
			$speakers_q = "SELECT scn.company_name, ast.title, asn.speaker_name, idb.image_url FROM agenda_session_speaker_connection as assc INNER JOIN speakers_data_connection as sdc ON assc.speaker_id=sdc.speaker_id, speakers_company_data_connection as scdc INNER JOIN speakers_company_name as scn ON scdc.speaker_company_name_id=scn.id, speakers_name as asn, speakers_title as ast, image_db as idb, image_connection as ic WHERE assc.agenda_session_id= :agenda_id AND sdc.speaker_title_id=ast.id AND sdc.speaker_name_id=asn.id AND sdc.speaker_company_id=scdc.speaker_company_id AND ic.entity_type_id='1' AND ic.entity_id=sdc.speaker_id AND idb.id=ic.image_db_id  ORDER BY sdc.date";	
					
		$speakers = $this->pdo->prepare($speakers_q);
		$speakers->bindValue(':agenda_id', $data[$i]['agenda_session_id'], \PDO::PARAM_INT);
		$speakers->execute();

			if ($speakers->rowCount() > 0) {
					while($sData = $speakers->fetch()){
						$speakers_data['company_name'] = $sData['company_name'];
						$speakers_data['title'] = $sData['title'];
						$speakers_data['speaker_name'] = $sData['speaker_name'];
						$speakers_data['image_url'] = $sData['image_url'];
						
						$data[$i]['speaker_data'][$j] = $speakers_data;
						$j++;

					}//while Speakers fetch

					
			}//if speakers row count

		         
				 // End Speaker Data				
						
						
						$i++;
					}
					
					
			}
			
		///Select the category color and name for the modal
			$color_q = "SELECT category, color_class FROM agenda_categories WHERE id = :id";	
					
		$color = $this->pdo->prepare($color_q);
		$color->bindValue(':id', $category, \PDO::PARAM_INT);
		$color->execute();

			if ($color->rowCount() > 0) {
				$colorData = $color->fetch();
				$SessionColor = $colorData['color_class'];
				$SessionCategory = $colorData['category'];
			}
			
	$var = 0;
foreach ($data as $sessions){
       
  if ($sessions['agenda_session_id'] == $sId) { 
               $var--;
			
			  $prev = $var;    
			
			  
			  $var++;
			  $var++;
			  
			  $next = $var;

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
  </div>
  <!-- Day Info Container (left part of the modal) -->
  <!-- Session Info Container (right part of the modal) -->
  <div id="SessionInfoContainer">';
  
  $output .= $speaker_data($sessions, $SessionColor);
                 
    $output .= '<!-- Session Info -->
    <div id="SessionInfo">
    	<h2 id="SessionTitle" class="'.$SessionColor.'Color">'.$sessions['title'].'</h2>
         <div id="SessionAbstract">
		      '.utf8_encode($sessions['text']).'
		  </div>
    </div>
	    <!-- END Session Info -->
	';
	
	if (isset($prev) && isset($data[$prev]['title'])){
		
		

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
			$color_q = "SELECT category, color_class FROM agenda_categories WHERE id = :id";	
					
		$color = $this->pdo->prepare($color_q);
		$color->bindValue(':id', $category, \PDO::PARAM_INT);
		$color->execute();

			if ($color->rowCount() > 0) {
				$colorData = $color->fetch();

			}
	
      return $colorData;	
}

public function get_session_categories() {
	$data = '';
	$i = 0;
			///Select the category color and name for the modal
			$color_q = "SELECT id, category FROM agenda_categories";	
					
		$color = $this->pdo->prepare($color_q);
		$color->execute();

			if ($color->rowCount() > 0) {
				while($colorData = $color->fetch()){
				   $data[$i][0] =  $colorData['id'];	
				   $data[$i][1] =  $colorData['category'];
				   $i++;	
				}
				

			}
	
      return $data;	
}

public function get_speakers_for_agenda() {
	$output = '';
	
		$stat_q = "SELECT sn.speaker_name, st.title, scn.company_name, idb.image_url, idb.alt_name, sdc.speaker_id, sdc.speaker_company_id, stag.speaker_tag FROM speakers_name as sn, speakers_data_connection as sdc, speakers_status as ss, speakers_title as st, speakers_company_name as scn, speakers_company_data_connection as scdc, image_db as idb, image_connection as ic, speakers_tag as stag, speakers_order as soo WHERE sdc.speaker_name_id=sn.id AND sdc.speaker_id=ss.speaker_id AND ss.speaker_status_id='1' AND ic.entity_type_id='1' AND ic.entity_id=sdc.speaker_id AND idb.id=ic.image_db_id AND sdc.speaker_company_id=scdc.speaker_company_id AND scdc.speaker_company_name_id=scn.id AND sdc.speaker_title_id=st.id AND stag.id=sdc.speaker_tag_id AND sdc.speaker_id=soo.speaker_id ORDER BY soo.order_id ASC";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($speakers = $stat->fetch()){
					  	 $output .= '<option value="'.$speakers['speaker_id'].'">'.$speakers['speaker_name'].'</option>';
					}
					
			}
			
			
	return $output;
}


public function get_session_abstract($agenda_id){
	$out = '';
	 if (isset($agenda_id)){
		   			$desc_q = "SELECT asd.text FROM agenda_session_description as asd INNER JOIN agenda_session_data_connection as asdc ON asd.id=asdc.agenda_description_id WHERE asdc.agenda_session_id= :id";	
					
		$desc = $this->pdo->prepare($desc_q);
		$desc->bindValue(':id', $agenda_id, \PDO::PARAM_INT);
		$desc->execute();

			if ($desc->rowCount() > 0) {
					while($Data = $desc->fetch()){
	
	               $out = '<textarea id="AbstractEditArea">'.$Data['text'].'</textarea>';  
					}
					
			} else {
				$out = '<textarea id="AbstractEditArea"></textarea>';  
			}
	
	 return $out;
		  
	 }//if isset agenda_id
	 
 }
 
 public function get_speakers_for_agenda_modal($agenda_id) {
 	$output = '<i id="SessionInfoModalCloseButton" class="icon icon-close-icon close-reveal-modal"> </i><p>Saved Speakers: </p>';
	$i= 0;
	
		$stat_q = "SELECT sn.speaker_name, st.title, scn.company_name, idb.image_url, idb.alt_name, sdc.speaker_id, sdc.speaker_company_id, stag.speaker_tag FROM speakers_name as sn, speakers_data_connection as sdc, speakers_status as ss, speakers_title as st, speakers_company_name as scn, speakers_company_data_connection as scdc, image_db as idb, image_connection as ic, speakers_tag as stag, speakers_order as soo WHERE sdc.speaker_name_id=sn.id AND sdc.speaker_id=ss.speaker_id AND ss.speaker_status_id='1' AND ic.entity_type_id='1' AND ic.entity_id=sdc.speaker_id AND idb.id=ic.image_db_id AND sdc.speaker_company_id=scdc.speaker_company_id AND scdc.speaker_company_name_id=scn.id AND sdc.speaker_title_id=st.id AND stag.id=sdc.speaker_tag_id AND sdc.speaker_id=soo.speaker_id ORDER BY soo.order_id ASC";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($speakers = $stat->fetch()){
						$data[$i]['speaker_id'] =  $speakers['speaker_id'];
						$data[$i]['speaker_name'] =  $speakers['speaker_name'];
						$i++;
					  
					}
					
			}
			
			
	  $j = 0;
		$agenda_speakers_q = "SELECT assc.speaker_id, sn.speaker_name FROM agenda_session_speaker_connection as assc INNER JOIN speakers_data_connection as sdc ON assc.speaker_id=sdc.speaker_id, speakers_name as sn WHERE assc.agenda_session_id= :id AND sdc.speaker_name_id=sn.id";	
					
		$agenda_speakers = $this->pdo->prepare($agenda_speakers_q);
		$agenda_speakers->bindValue(':id', $agenda_id, \PDO::PARAM_INT);
		$agenda_speakers->execute();

			if ($agenda_speakers->rowCount() > 0) {
					while($as = $agenda_speakers->fetch()){
						$agSpeakers[$j]['speaker_id'] = $as['speaker_id'];
						$agSpeakers[$j]['speaker_name'] = $as['speaker_name'];
						$j++;
					}
					
			}

  //if there are choosen speakers, we display them 
if (isset($agSpeakers[0]['speaker_id'])) {
	
	foreach ($agSpeakers as $selected) { 
	
		 $output .= '<div data-speakerid="'.$selected['speaker_id'].'" data-agendaid="'.$agenda_id.'" class="SpeakerDeleteModalButton">'.$selected['speaker_name'].'</div>';
	}

}
			
	
 $output .= '<p>Click on the speakers to add them to the session: </p>';
 
 //We go through the array contains all of the speakers
 foreach ($data as $speakers) {
	 // if there are choosen speakers already, we don't display them in the list
	 
	 if (isset($agSpeakers[0]['speaker_id'])){
		 foreach ($agSpeakers as $ags) {
			 if ($ags['speaker_id'] != $speakers['speaker_id']) {
				 
				   $output .= '<div data-speakerid="'.$speakers['speaker_id'].'" data-agendaid="'.$agenda_id.'" class="SpeakerModalButton">'.$speakers['speaker_name'].'</div>';  
			 }
		 }
		 
		 //if there are no choosen speakers, we display them normally
	 } else {
		 
		$output .= '<div data-speakerid="'.$speakers['speaker_id'].'" data-agendaid="'.$agenda_id.'" class="SpeakerModalButton">'.$speakers['speaker_name'].'</div>'; 
	 }
	 
	 
 }
		
	
	return $output;
 
 }
 
 
 public function get_testimonial_data($day, $category, $blocknum) {
	 switch ($blocknum) {
    case 0:
       $display_blocknum = "Speaker Block 1";
        break;
    case 1:
       $display_blocknum = "Speaker Block 2";
        break;
    case 2:
         $display_blocknum = "Quote Block";
        break;
}
	 
	 
	 $output = '<i id="SessionInfoModalCloseButton" class="icon icon-close-icon close-reveal-modal"> </i>';
	 $output .= '<h2>'.$display_blocknum.'</h2>';
	
	//Type container
	 $output .= '<div id="TestimonialTypeContainer">'; 
	 /*
	 Type: 1 = random
	       2 = prefered
		   3 = fixed
	 */
	 $type_text = '';
	 //Get the choosen speaker(s) for the given block
	 		 	$block_q = "SELECT id, type FROM agenda_block_display WHERE agenda_category_id= :category AND agenda_day= :day AND block = :block";	
							
				$block = $this->pdo->prepare($block_q);
				$block->bindValue(':category', $category, \PDO::PARAM_INT);
				$block->bindValue(':day', $day, \PDO::PARAM_INT);
				$block->bindValue(':block', $blocknum, \PDO::PARAM_INT);
				$block->execute();
		
					if ($block->rowCount() > 0) {
						while($temp_data = $block->fetch()){
							$agenda_block_id = $temp_data['id'];
							
							if($temp_data['type'] == 2){
								$type = 2;
								$type_text = "Prefered";
								$available = '<div class="AdminTestimonialTypeButton" data-day="'.$day.'" data-category="'.$category.'" data-blocknum="'.$blocknum.'" data-blocktype="1">Random</div> <div class="AdminTestimonialTypeButton" data-day="'.$day.'" data-category="'.$category.'" data-blocknum="'.$blocknum.'" data-blocktype="3">Fixed</div>';
							}
						   if($temp_data['type'] == 3){
								$type = 3;
								$type_text = "Fixed";
						        $available = '<div class="AdminTestimonialTypeButton" data-day="'.$day.'" data-category="'.$category.'" data-blocknum="'.$blocknum.'" data-blocktype="1">Random</div> <div class="AdminTestimonialTypeButton" data-day="'.$day.'" data-category="'.$category.'" data-blocknum="'.$blocknum.'" data-blocktype="2">Prefered</div>';
							}
                 							
							
							
							
	/**********
	 Get Speaker AND Quote Data	
	*************/	
		
					$entity_q = "SELECT entity_id, entity_type_id FROM agenda_block_entities WHERE agenda_block_id= :id";	
								
					$entity = $this->pdo->prepare($entity_q);
					$entity->bindValue(':id', $temp_data['id'], \PDO::PARAM_INT);
					$entity->execute();
			
						if ($entity->rowCount() > 0) {
							
							
							$j = 0;
							$k = 0;
							while($entity_data = $entity->fetch()){
							//-----------------------------------------------
							    //if it's a speaker
													
								  if ($entity_data['entity_type_id'] == 1) {
										   
											  $speakers_q = "SELECT sn.speaker_name FROM speakers_name as sn INNER JOIN speakers_data_connection as sdc ON sn.id=sdc.speaker_name_id WHERE sdc.speaker_id = :id";	
														  
											  $speakers = $this->pdo->prepare($speakers_q);
											  $speakers->bindValue(':id', $entity_data['entity_id'], \PDO::PARAM_INT);
											  $speakers->execute();
									  
												  if ($speakers->rowCount() > 0) {
														  while($as = $speakers->fetch()){
															  if ($entity_data['entity_id'] != 0){
																	$agSpeakers[$j]['speaker_id'] = $entity_data['entity_id'];
																	$agSpeakers[$j]['speaker_name'] = $as['speaker_name'];
																	$j++;
															  }//if speaker_id not 0
														  }//while fetch speakers
														  
												  }//if speakers row count
										  
													  
								  }//if temp data_entity_type = 1 as in speaker
								  
							//------------------------------------------------------------
							             //if it's a quote	
							     if ($entity_data['entity_type_id'] == 2) {
										   
											  $quote_q = "SELECT quote, author FROM agenda_quote WHERE id = :id";	
														  
											  $quote = $this->pdo->prepare($quote_q);
											  $quote->bindValue(':id', $entity_data['entity_id'], \PDO::PARAM_INT);
											  $quote->execute();
									  
												  if ($quote->rowCount() > 0) {
														  while($qu = $quote->fetch()){
															  if ($entity_data['entity_id'] != 0){
																    $quote_data[$k]['id'] = $entity_data['entity_id'];
																	$quote_data[$k]['author'] = $qu['author'];
																	$quote_data[$k]['quote'] = $qu['quote'];
																	$k++;
															  }//if speaker_id not 0
														  }//while fetch speakers
														  
												  }//if speakers row count
										  
													  
								  }//if temp data_entity_type = 2 as in quote
								  
								  
								  
								
							}//While fetch entity_data
							
						}//If num row entity_data
								
	/**********
	 Get Speaker and Quote Data End	
	*************/		
	
							
						}
						//while temp data	
							
					} else { //if row count block
		              //if there is no data so the block is total random
					  
					  $type = 1;
					  $type_text = "Random";
					  $agenda_block_id = '';
					  $available = '<div class="AdminTestimonialTypeButton" data-day="'.$day.'" data-category="'.$category.'" data-blocknum="'.$blocknum.'" data-blocktype="2">Prefered</div> <div class="AdminTestimonialTypeButton" data-day="'.$day.'" data-category="'.$category.'" data-blocknum="'.$blocknum.'" data-blocktype="3">Fixed</div>';
					}
	
	
	
	
	
	 $output .= '<p>The current display type of this block: <span class="AdminModalButton">'.$type_text.'</span></p>'; 
	 
	  $output .= '<p>Change the type to: </p>';
	   $output .= $available;
	 
	 
		//Type container
 $output .= '</div>';
 
 
 /******************************************* 
 IF IT'S the FIRST 2 BLOCKS!!!! (SPEAKER BLOCKS)
 ************************************************/
if ($blocknum < 2){
  
	//if it's not random, show the speaker selector
if ($type != 1) {	 
 	
	$i= 0;
	
		$stat_q = "SELECT sn.speaker_name, st.title, scn.company_name, idb.image_url, idb.alt_name, sdc.speaker_id, sdc.speaker_company_id, stag.speaker_tag FROM speakers_name as sn, speakers_data_connection as sdc, speakers_status as ss, speakers_title as st, speakers_company_name as scn, speakers_company_data_connection as scdc, image_db as idb, image_connection as ic, speakers_tag as stag, speakers_order as soo WHERE sdc.speaker_name_id=sn.id AND sdc.speaker_id=ss.speaker_id AND ss.speaker_status_id='1' AND ic.entity_type_id='1' AND ic.entity_id=sdc.speaker_id AND idb.id=ic.image_db_id AND sdc.speaker_company_id=scdc.speaker_company_id AND scdc.speaker_company_name_id=scn.id AND sdc.speaker_title_id=st.id AND stag.id=sdc.speaker_tag_id AND sdc.speaker_id=soo.speaker_id ORDER BY soo.order_id ASC";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($speakers = $stat->fetch()){
						$data[$i]['speaker_id'] =  $speakers['speaker_id'];
						$data[$i]['speaker_name'] =  $speakers['speaker_name'];
						$i++;
					  
					}
					
			}
			
			

 $output .= '<div id="SelectedSpeaker">';
  //if there are choosen speakers, we display them 
if (isset($agSpeakers[0]['speaker_id'])) {
	
 $output .= '<p>The choosen speaker is: </p>';	
	foreach ($agSpeakers as $selected) { 
	
		 $output .= '<div data-speakerid="'.$selected['speaker_id'].'" class="TestimonialSpeakerDeleteModalButton" data-block_id="'.$agenda_block_id.'" data-type="'.$type.'">'.$selected['speaker_name'].'</div>';
	}

} else {
	
 if ($type == 3){
	$output .= '<p class="ModalWarning">No Speakers is selected! Please select one! It will not work until you select one! </p>';	
	
 }	
	
	
	
}

$output .= '</div>';		
	
 $output .= '<p>Click on one of speakers to change the displayed speaker: </p>';
 
 //We go through the array contains all of the speakers
 foreach ($data as $speakers) {
	 // if there are choosen speakers already, we don't display them in the list
	$nope = 0; 
	 if (isset($agSpeakers[0]['speaker_id'])){
		 
		 foreach ($agSpeakers as $ags) {
			 if ($ags['speaker_id'] == $speakers['speaker_id']) {
				  $nope = 1;

			 }
			 
		 }//foreach ags
		
		if ($nope == 0) {
		  				   $output .= '<div data-speakerid="'.$speakers['speaker_id'].'"  class="TestimonialSpeakerModalButton" data-block_id="'.$agenda_block_id.'" data-type="'.$type.'">'.$speakers['speaker_name'].'</div>';  	
			
		}//if nope == 0 end
		
		 
	  //if there are no choosen speakers, we display them normally
	 } else { 
		 
		$output .= '<div data-speakerid="'.$speakers['speaker_id'].'"  class="TestimonialSpeakerModalButton" data-block_id="'.$agenda_block_id.'" data-type="'.$type.'">'.$speakers['speaker_name'].'</div>'; 
	 } // if isset agspeakers else end
	 
	 
 }//foreach data end
	
 }//if type not random	
	
	$output .= '<p class="InfoText"><strong>Random</strong>: The system choose a random speaker. </br> <strong>Prefered</strong>: The system choose a random speaker, but the "Prefered ones" are more likely to be displayed </br> <strong>Fixed</strong>: Display that specified speaker </p>';
	
 }//if blocknum < 2
	
 /******************************************* 
 IF IT'S the LAST BLOCK!!!! (Quote BLOCKS)
 ************************************************/
if ($blocknum == 2){ 
 
	//if it's not random, show the Quote
if ($type != 1) {	 
 	
	$i= 0;
	
	  $quote_q = "SELECT id, quote, author FROM agenda_quote";	
														  
	  $quote = $this->pdo->prepare($quote_q);
	  $quote->execute();
									  
	  if ($quote->rowCount() > 0) {
			 while($qu = $quote->fetch()){
				  $data[$i]['id'] = $qu['id'];
				  $data[$i]['author'] = $qu['author'];
				  $data[$i]['quote'] = $qu['quote'];
				  $i++;
					  
			}
	 }
			
	 //$quote_data[$k]['id'] = $entity_data['entity_id'];
	 //$quote_data[$k]['author'] = $qu['author'];	
	 //$quote_data[$k]['quote']	

 $output .= '<div id="SelectedSpeaker">';
  //if there are choosen speakers, we display them 
if (isset($quote_data[0]['id'])) {
	
 $output .= '<p>The choosen Quote is: </p>';	
	foreach ($quote_data as $selected) { 
	
		 $output .= '<div data-quoteid="'.$selected['id'].'" class="TestimonialQuoteDeleteModalButton" data-block_id="'.$agenda_block_id.'" data-type="'.$type.'">'.$selected['quote'].'</div>';
	}

} else {
	
 if ($type == 3){
	$output .= '<p class="ModalWarning">No Quote is selected! Please select one! It will not work until you select one! </p>';	
	
 }	
	
	
	
}

$output .= '</div>';		
	
 $output .= '<p>Click on one of Quotes to change the displayed quote: </p>';
 
 //We go through the array contains all of the quotes
 foreach ($data as $quote_array) {
	 // if there are choosen speakers already, we don't display them in the list
	$nope = 0; 
	 if (isset($quote_data[0]['id'])){
		 
		 foreach ($quote_data as $ags) {
			 if ($ags['id'] == $quote_array['id']) {
				  $nope = 1;

			 }
			 
		 }//foreach ags
		
		if ($nope == 0) {
		  				   $output .= '<div data-quoteid="'.$quote_array['id'].'"  class="TestimonialQuoteModalButton" data-block_id="'.$agenda_block_id.'" data-type="'.$type.'">'.$quote_array['quote'].'</div>';  	
			
		}//if nope == 0 end
		
		 
	  //if there are no choosen speakers, we display them normally
	 } else { 
		 
		$output .= '<div data-quoteid="'.$quote_array['id'].'"  class="TestimonialQuoteModalButton" data-block_id="'.$agenda_block_id.'" data-type="'.$type.'">'.$quote_array['quote'].'</div>'; 
	 } // if isset agspeakers else end
	 
	 
 }//foreach data end
	
 }//if type not random	
	
	$output .= '<p class="InfoText"><strong>Random</strong>: The system choose a random quote. </br> <strong>Prefered</strong>: The system choose a random quote, but the "Prefered ones" are more likely to be displayed </br> <strong>Fixed</strong>: Display that specified quote </p>';

} //if blocknum == 2

	
/// END 		
	return $output;
 
 }
 
 
 
function display_all_quotes() {
	$output = '';
	$i = 0;
		  $quote_q = "SELECT id, quote, author FROM agenda_quote";	
														  
	  $quote = $this->pdo->prepare($quote_q);
	  $quote->execute();
									  
	  if ($quote->rowCount() > 0) {
			 while($qu = $quote->fetch()){
				  $data[$i]['id'] = $qu['id'];
				  $data[$i]['author'] = $qu['author'];
				  $data[$i]['quote'] = $qu['quote'];
				  $i++;
					  
			}
	 }

 foreach ($data as $quote_array) {
	$output .= '<div data-quoteid="'.$quote_array['id'].'"  class="EditQuoteButton" data-reveal-id="SessionInfoModal">'.$quote_array['quote'].'</div>'; 
	 
 }
	
return 	$output;
}


public function get_quote_data($quote_id){
	$out = '';
	 if (isset($quote_id)){
		   			 $quote_q = "SELECT quote, author FROM agenda_quote WHERE id = :id";	
					
		$desc = $this->pdo->prepare($quote_q);
		$desc->bindValue(':id', $quote_id, \PDO::PARAM_INT);
		$desc->execute();

			if ($desc->rowCount() > 0) {
					while($Data = $desc->fetch()){
	
	               $out = '<input type="text" id="QuoteAuthor" class="AdminInputField" placeholder="Author" value="'.$Data['author'].'"/><textarea id="QuoteTextarea">'.$Data['quote'].'</textarea>';  
					}
					
			} else {
				$out = '<input type="text" id="QuoteAuthor" class="AdminInputField" placeholder="Author"/><textarea id="QuoteTextarea"></textarea>';  
			}
	
	 return $out;
		  
	 }//if isset agenda_id
	 
 }
 
 
public function get_sponsor_data($day, $category) {


         $display_blocknum = "Sponsors";
         $type = 1;
	 
	 
	 $output = '<i id="SessionInfoModalCloseButton" class="icon icon-close-icon close-reveal-modal"> </i>';
	 $output .= '<h2>'.$display_blocknum.'</h2>';
	
	//Type container
	 $output .= '<div id="TestimonialTypeContainer">'; 
	 /*
	 Type: 1 = random
	       2 = prefered
		   3 = fixed
	 */
	 $type_text = '';
	 //Get the choosen speaker(s) for the given block
	 		 	$block_q = "SELECT id, type FROM agenda_sponsor_display WHERE agenda_category_id= :category AND agenda_day= :day";	
							
				$block = $this->pdo->prepare($block_q);
				$block->bindValue(':category', $category, \PDO::PARAM_INT);
				$block->bindValue(':day', $day, \PDO::PARAM_INT);
				$block->execute();
		
					if ($block->rowCount() > 0) {
						while($temp_data = $block->fetch()){
							$agenda_block_id = $temp_data['id'];
							
							if($temp_data['type'] == 2){
								$type = 2;
								$type_text = "Prefered";
								$available = '<div class="AdminSponsorTypeButton" data-day="'.$day.'" data-category="'.$category.'" data-blocktype="1">Random</div> <div class="AdminSponsorTypeButton" data-day="'.$day.'" data-category="'.$category.'" data-blocktype="3">Fixed</div>';
							}
						   if($temp_data['type'] == 3){
								$type = 3;
								$type_text = "Fixed";
						        $available = '<div class="AdminSponsorTypeButton" data-day="'.$day.'" data-category="'.$category.'" data-blocktype="1">Random</div> <div class="AdminSponsorTypeButton" data-day="'.$day.'" data-category="'.$category.'" data-blocktype="2">Prefered</div>';
							}
                 							
							
							
							
	/**********
	 Get Sponsor data	
	*************/	
		
					$entity_q = "SELECT sponsor_id FROM agenda_sponsor_connection WHERE agenda_sponsor_display_id= :id";	
								
					$entity = $this->pdo->prepare($entity_q);
					$entity->bindValue(':id', $temp_data['id'], \PDO::PARAM_INT);
					$entity->execute();
			
						if ($entity->rowCount() > 0) {
							
							
							$j = 0;
							$k = 0;
							while($entity_data = $entity->fetch()){
							//-----------------------------------------------
							    //if it's a speaker
													
								
										   
											  $sponsors_q = "SELECT sn.sponsor_name FROM sponsors_name as sn INNER JOIN sponsors_data_connection as sdc ON sn.id=sdc.sponsor_name_id WHERE sdc.sponsor_id = :id";	
														  
											  $sponsors = $this->pdo->prepare($sponsors_q);
											  $sponsors->bindValue(':id', $entity_data['sponsor_id'], \PDO::PARAM_INT);
											  $sponsors->execute();
									  
												  if ($sponsors->rowCount() > 0) {
														  while($as = $sponsors->fetch()){
															  if ($entity_data['sponsor_id'] != 0){
																	$agSponsors[$j]['sponsor_id'] = $entity_data['sponsor_id'];
																	$agSponsors[$j]['sponsor_name'] = $as['sponsor_name'];
																	$j++;
															  }//if speaker_id not 0
														  }//while fetch speakers
														  
												  }//if speakers row count
										  
													  

								  

								  
								  
								  
								
							}//While fetch entity_data
							
						}//If num row entity_data
								
	/**********
	 Get Speaker and Quote Data End	
	*************/		
	
							
						}
						//while temp data	
							
					} else { //if row count block
		              //if there is no data so the block is total random
					  
					  $type = 1;
					  $type_text = "Random";
					  $agenda_block_id = '';
					  $available = '<div class="AdminSponsorTypeButton" data-day="'.$day.'" data-category="'.$category.'" data-blocktype="2">Prefered</div> <div class="AdminSponsorTypeButton" data-day="'.$day.'" data-category="'.$category.'" data-blocktype="3">Fixed</div>';
					}
	
	
	
	
	
	 $output .= '<p>The current display type of this block: <span class="AdminModalButton">'.$type_text.'</span></p>'; 
	 
	  $output .= '<p>Change the type to: </p>';
	   $output .= $available;
	 
	 
		//Type container
 $output .= '</div>';
 
 
 /******************************************* 
 Sponsor selector
 ************************************************/

  
	//if it's not random, show the speaker selector
if ($type != 1) {	 
 	
	$i= 0;
	
		$stat_q = "SELECT sn.sponsor_name, sb.sponsor_bio, sc.category_id, sl.sponsor_link_url, idb.image_url, idb.alt_name, sdc.sponsor_id FROM sponsors_name as sn, sponsors_bio as sb, sponsors_data_connection as sdc, sponsors_status as ss, sponsors_category as sc, sponsors_links as sl, image_db as idb, image_connection as ic WHERE sdc.sponsor_name_id=sn.id AND sdc.sponsor_bio_id=sb.id AND sdc.sponsor_id=ss.sponsor_id AND ss.status_id='1' AND sdc.sponsor_link_id=sl.id AND ic.entity_type_id='2' AND ic.entity_id=sdc.sponsor_id AND idb.id=ic.image_db_id AND sdc.sponsor_category_id=sc.id ORDER BY sn.sponsor_name ASC";	
					
		$stat = $this->pdo->prepare($stat_q);
		$stat->execute();

			if ($stat->rowCount() > 0) {
					while($sponsors = $stat->fetch()){
						$data[$i]['sponsor_id'] =  $sponsors['sponsor_id'];
						$data[$i]['sponsor_name'] =  $sponsors['sponsor_name'];
						$i++;
					  
					}
					
			}
			
			

 $output .= '<div id="SelectedSpeaker">';
  //if there are choosen speakers, we display them 
if (isset($agSponsors[0]['sponsor_id'])) {
	
 $output .= '<p>The choosen sponsor(s) is/are: </p>';	
	foreach ($agSponsors as $selected) { 
	
		 $output .= '<div data-sponsorid="'.$selected['sponsor_id'].'" class="TestimonialSponsorDeleteModalButton" data-day="'.$day.'" data-category="'.$category.'" data-type="'.$type.'">'.$selected['sponsor_name'].'</div>';
	}

} else {
	
 if ($type == 3){
	$output .= '<p class="ModalWarning">No sponsor is selected! Please select at least one! It will not work until you select at least one! </p>';	
	
 }	
	
	
	
}

$output .= '</div>';		
	
 $output .= '<p>Click on one of sponsors to add them to be displayed: </p>';
 
 //We go through the array contains all of the speakers
 foreach ($data as $sponsors) {
	 // if there are choosen speakers already, we don't display them in the list
	$nope = 0; 
	 if (isset($agSponsors[0]['sponsor_id'])){
		 
		 foreach ($agSponsors as $ags) {
			 if ($ags['sponsor_id'] == $sponsors['sponsor_id']) {
				  $nope = 1;

			 }
			 
		 }//foreach ags
		
		if ($nope == 0) {
		  				   $output .= '<div data-sponsorid="'.$sponsors['sponsor_id'].'"  class="TestimonialSponsorModalButton" data-block_id="'.$agenda_block_id.'" data-type="'.$type.'">'.$sponsors['sponsor_name'].'</div>';  	
			
		}//if nope == 0 end
		
		 
	  //if there are no choosen speakers, we display them normally
	 } else { 
		 
		$output .= '<div data-sponsorid="'.$sponsors['sponsor_id'].'"  class="TestimonialSponsorModalButton" data-block_id="'.$agenda_block_id.'" data-type="'.$type.'">'.$sponsors['sponsor_name'].'</div>'; 
	 } // if isset agspeakers else end
	 
	 
 }//foreach data end
	
 }//if type not random	
	
	$output .= '<p class="InfoText"><strong>Random</strong>: The system choose random sponsors. </br> <strong>Prefered</strong>: The system choose a random sponsors, but the "Prefered ones" are more likely to be displayed </br> <strong>Fixed</strong>: Display specified sponsors </p>';
	

	


	
/// END 		
	return $output;
 
 } 
 
 


}
?>	