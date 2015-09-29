<?php 
namespace HRNParis\ajax;
use HRNParis\sponsors as sponsors;
use HRNParis\speakers as speakers;
use HRNParis\agenda as agenda;
use HRNParis\main as main;
include_once('sponsors_main.php');
include_once('speakers_main.php');
include_once('agenda_main.php');
include_once('main.php');


/*///////////// 
Add new Sponsor
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'get_search_data'){
	$the_main = new sponsors\sponsors_main;
	

    $result = $the_main->get_search_data();
	if (isset($result)) {
	 
	 echo $result;	
	}


}// new sponsor

/*///////////// 
Display Sponsor
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'sponsor_display'){
	$the_main = new sponsors\sponsors_main;
	

    $result = $the_main->sponsors2($_POST['tag']);
	if (isset($result)) {
	 
	 echo $result;	
	}


}// new sponsor


/*///////////// 
Display Sponsor
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'get_sponsor'){
	$the_main = new sponsors\sponsors_main;
	

    $result = $the_main->sponsors_modal_first($_POST['sId']);
	if (isset($result)) {
	 
	 echo $result;	
	}


}// new sponsor


/*///////////// 
Display Speaker Modal
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'speaker_modal'){
	$the_main = new speakers\speakers_main;
	

    $result = $the_main->speaker_modals($_POST['speaker_tag'], $_POST['size']);
	if (isset($result)) {
	 
	 echo $result;	
	}


}


/*///////////// 
Display Speaker Modal 2
///////////////*/
 if(isset($_POST['action']) && $_POST['action'] == 'speaker_modal_next'){
	$the_main = new speakers\speakers_main;
	
	$tag = $the_main->id_tag_convert($_POST['speaker_id']);

    if (isset($tag)){
			$result = $the_main->speaker_modals($tag, $_POST['size']);
			if (isset($result)) {
			 
			 echo $result;	
			}
	}

}// new sponsor


/*///////////// 
Display Sponsor Modal
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'sponsor_modal'){
	$the_main = new sponsors\sponsors_main;
	

    $result = $the_main->sponsors_modal($_POST['sponsor_id'], $_POST['sponsor_mode']);
	if (isset($result)) {
	 
	 echo $result;	
	}


}


/*///////////// 
Display Agenda Modal
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'agenda_session_modal'){
	$the_main = new agenda\agenda_main;
	

    $result = $the_main->agenda_session_modal($_POST['category'], $_POST['day'], $_POST['agenda_id']);
	if (isset($result)) {
	 
	 echo $result;	
	}


}

/******************************

Change Agenda Categories V6+

*********************************/
 if(isset($_POST['action']) && $_POST['action'] == 'change_agenda_category_desktop_v6'){
	$agenda = new agenda\agenda_main;
	
	$_SESSION['Category'] = $_POST['category'];
	
	     //Session table update
	    $data = $agenda->agenda_session($_POST['category'],1);
        $output[0] = $agenda->display_sessions_v6($data); 
		
		$data2 = $agenda->agenda_session($_POST['category'],2);
        $output[1] = $agenda->display_sessions_v6($data2);
		
		
		//Testimonial update
         $blocks = $agenda->block_display($_POST['category'],$_POST['day']);
		 
		 $output[2] = '';

        foreach ($blocks as $elems) {
	     $output[2] .= $agenda->get_block_data($elems[0], $elems[1]);	
      	}
		 

       //Get the new colors and styles
	  $colorData = $agenda->get_category_styles($_POST['category']);
	   
	   $output[3]['category'] = $colorData['category'];
	   $output[3]['color'] = $colorData['color_class'] ; 
	   $output[3]['main_color'] = $colorData['main_color'];
	   $output[3]['second_color'] = $colorData['second_color'];
	   $output[3]['room'] = $colorData['room'];  
	   
	    $output[4][0] = $agenda->get_header_text($_POST['category']);

	   $output[7][0] = $agenda->agenda_sponsor_display(1, $_POST['category']);
	   $output[7][1] = $agenda->agenda_sponsor_display(2, $_POST['category']);	

	if (isset($output[0]) && isset($output[1]) && isset($output[3]) && isset($output[4]) && isset($output[7])) {
	   
	    echo json_encode($output);	
	}



}//


 if(isset($_POST['action']) && $_POST['action'] == 'change_agenda_category_mobile_v6'){
	$agenda = new agenda\agenda_main;
	
	$_SESSION['Category'] = $_POST['category'];
	
	     //Session table update
	    $data = $agenda->agenda_session($_POST['category'],1);
        $output[0] = $agenda->display_session_mobile_v6($data); 
	
		$data2 = $agenda->agenda_session($_POST['category'],2);
        $output[1] = $agenda->display_session_mobile_v6($data2);
	
	//Hide Labs3 day 1	 
	if ($_POST['category'] == 17){
		 $output[0] = 'Nope';
	}	
	
		
//if it's Product demo
        if ($_POST['category'] == 14){
				$data3 = $agenda->agenda_session(18,2);
                $output[5] = $agenda->display_session_mobile_v6($data3);
		}
		
		
		//Testimonial update
         $blocks = $agenda->block_display($_POST['category'],1);
		 
		 $output[2] = '';

        foreach ($blocks as $elems) {
	     $output[2] .= $agenda->get_block_data($elems[0], $elems[1]);	
      	}
		 

       //Get the new colors and styles
	  $colorData = $agenda->get_category_styles($_POST['category']);
	   
	   $output[3]['category'] = $colorData['category'];
	   $output[3]['color'] = $colorData['color_class'];
	   $output[3]['main_color'] = $colorData['main_color'];
	   $output[3]['second_color'] = $colorData['second_color']; 
	   $output[3]['room'] = $colorData['room']; 
	   
	   $output[4][0] = $agenda->get_header_text($_POST['category']);
	   
	   $output[7][0] = $agenda->agenda_sponsor_display(1, $_POST['category']);
	   $output[7][1] = $agenda->agenda_sponsor_display(2, $_POST['category']);	

	if (isset($output[0]) && isset($output[1]) && isset($output[3]) && isset($output[4]) && isset($output[7])) {
	   
	    echo json_encode($output);	
	}



}

/******************************

Change Agenda Categories OLD VERSION!!!

*********************************/
 if(isset($_POST['action']) && $_POST['action'] == 'change_agenda_category_desktop'){
	$agenda = new agenda\agenda_main;
	
	$_SESSION['Category'] = $_POST['category'];
	
	     //Session table update
	    $data = $agenda->agenda_session($_POST['category'],1);
        $output[0] = $agenda->display_sessions($data); 
		
		$data2 = $agenda->agenda_session($_POST['category'],2);
        $output[1] = $agenda->display_sessions($data2);
		
		
		//Testimonial update
         $blocks = $agenda->block_display($_POST['category'],$_POST['day']);
		 
		 $output[2] = '';

        foreach ($blocks as $elems) {
	     $output[2] .= $agenda->get_block_data($elems[0], $elems[1]);	
      	}
		 

       //Get the new colors and styles
	  $colorData = $agenda->get_category_styles($_POST['category']);
	   
	   $output[3]['category'] = $colorData['category'];
	   $output[3]['color'] = $colorData['color_class'] ; 
	   $output[3]['main_color'] = $colorData['main_color'];
	   $output[3]['second_color'] = $colorData['second_color'];
	   $output[3]['room'] = $colorData['room'];  
	   
	    $output[4][0] = $agenda->get_header_text($_POST['category']);
		


	if (isset($output[0]) && isset($output[1]) && isset($output[3]) && isset($output[4])) {
	   
	    echo json_encode($output);	
	}



}//


 if(isset($_POST['action']) && $_POST['action'] == 'change_agenda_category_mobile'){
	$agenda = new agenda\agenda_main;
	
	$_SESSION['Category'] = $_POST['category'];
	
	     //Session table update
	    $data = $agenda->agenda_session($_POST['category'],1);
        $output[0] = $agenda->display_session_mobile($data); 
		
		$data2 = $agenda->agenda_session($_POST['category'],2);
        $output[1] = $agenda->display_session_mobile($data2);
		
		
//if it's Product demo
        if ($_POST['category'] == 14){
				$data3 = $agenda->agenda_session(18,2);
                $output[5] = $agenda->display_session_mobile($data3);
		}
		
		
		//Testimonial update
         $blocks = $agenda->block_display($_POST['category'],1);
		 
		 $output[2] = '';

        foreach ($blocks as $elems) {
	     $output[2] .= $agenda->get_block_data($elems[0], $elems[1]);	
      	}
		 

       //Get the new colors and styles
	  $colorData = $agenda->get_category_styles($_POST['category']);
	   
	   $output[3]['category'] = $colorData['category'];
	   $output[3]['color'] = $colorData['color_class'];
	   $output[3]['main_color'] = $colorData['main_color'];
	   $output[3]['second_color'] = $colorData['second_color'];
	   $output[3]['room'] = $colorData['room'];  
	   
	   $output[5] =  $agenda->agenda_sponsor_display(1, $_POST['category']);
	 //  $output[5][1] =  $agenda->agenda_sponsor_display(2, $_POST['category']);
	   
	   $output[4][0] = $agenda->get_header_text($_POST['category']);
	   


	if (isset($output[0]) && isset($output[1]) && isset($output[3]) && isset($output[4])) {
	   
	    echo json_encode($output);	
	}



}

/*///////////// 
Save Booking Data
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'get_colors'){
	$agenda = new agenda\agenda_main;
	

    $result = $agenda->get_category_colors();
	if (isset($result)){
	   echo json_encode($result);
	}
}




/*///////////// 
Save Booking Data
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'save_booking_data'){
	$the_main = new main\main;
	

    $result = $the_main->save_booking($_POST['name'],$_POST['company'], $_POST['email'], $_POST['phone'], $_POST['program'], $_POST['number']);

    $the_main->marketing_email($_POST['name'],$_POST['company'], $_POST['email'], $_POST['phone'], $_POST['program'], $_POST['number']);

}


/*///////////// 
Save press Data
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'save_press_data'){
	$the_main = new main\main;

    $the_main->press_email($_POST['first_name'],$_POST['last_name'] ,$_POST['company'], $_POST['email'], $_POST['phone'], $_POST['title']);

}


/*///////////// 
URL decoder
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'url_decoder'){
	$the_main = new agenda\agenda_main;
	

    $result = $the_main->decode_url($_POST['url_data']);
	if (isset($result)) {
	 
	  echo json_encode($result);
	}


}


?>