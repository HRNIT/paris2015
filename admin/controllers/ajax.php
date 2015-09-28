<?php 
namespace HRNParis\ajax;
use HRNParis\main as main;
use HRNParis\agenda as agenda;
include_once('main.php');
include_once('agenda_main.php');
	
if(!isset($_SESSION)) {
	session_start();
}

/*///////////// 
Add new Sponsor
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'add_new_sponsor'){
	$the_main = new main\main;
	

    $result = $the_main->save_sponsor();
	if (isset($result)) {
	  $_SESSION['Result'] =  'Success';
	  echo 'Success';	
	}


}


/*///////////// 
Change sponsor image
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'edit_sponsor_image'){
	$the_main = new main\main;
	

    $result = $the_main->file_upload('sponsors/logos/', $_POST['sponsor_name']);
	
	if (isset($result['name'])) {
	    $the_main->pic_upload(2, $_POST['sponsor_id'], $result['name'], $_POST['sponsor_name'].' Logo');
	}


}


 if(isset($_POST['action']) && $_POST['action'] == 'edit_agenda_sponsor_image'){
	$the_main = new main\main;
	

    $result = $the_main->file_upload('agenda/sponsors/', $_POST['sponsor_name']);
	
	if (isset($result['name'])) {
	    $the_main->pic_upload_agenda($_POST['sponsor_id'], $result['name'], $_POST['sponsor_name'].' Logo');
	}


}

/*///////////// 
Edit Sponsor Data
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'edit_sponsor'){
	$the_main = new main\main;
	
   if(isset($_POST['sId']) && isset($_POST['edit_type'])){
	    $result = $the_main->edit_sponsor();
 
  
	if (isset($result)) {
	  $_SESSION['Result'] =  'Success';
	  echo 'Success';	
	}
	
  }

}



/*///////////// 
Sponsor Permission Request
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'sponsor_permission_request'){

	if (isset($_POST['sId'])) {
	  $_SESSION['Permission_Edit'] =  $_POST['sId'];
	}


}


 /*///////////// 
Sponsor Permission Delete
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'SponsorPermissionDelete' && isset($_POST['sId']) && isset($_POST['user_id'])){
	$the_main = new main\main;
    $the_main->sponsor_permission_delete($_POST['sId'], $_POST['user_id']);
	

}// delete sponsors permission 


 /*///////////// 
Sponsor Permission Add
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'SponsorPermissionAdd' && isset($_POST['sId']) && isset($_POST['user_id'])){
	$the_main = new main\main;
    $the_main->sponsor_permission_add($_POST['sId'], $_POST['user_id']);
	

}// delete sponsors permission 


/*///////////// 
Social Link Edit Request
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'social_link_edit_request'){

	if (isset($_POST['sId'])) {
	  $_SESSION['SocialLinkEntityId'] =  $_POST['sId'];
	  $_SESSION['SocialLinkEntityType'] =  $_POST['type'];
	}
   
   if (isset($_POST['prev_url'])) {
	   $_SESSION['SocialLinkPrevUrl'] =  $_POST['prev_url'];
	   
   }

}


 /*///////////// 
Social Link update
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'SocialLinkUpdate'){
	$the_main = new main\main;
    //$the_main->sponsor_permission_add($_POST['sId'], $_POST['user_id']);
	
	if(isset($_POST['sLinks'][0]) && isset($_POST['sURLs'][0]) && isset($_POST['sType']) && isset($_POST['sId'])) {
		$i = 0;
		
		foreach ($_POST['sLinks'] as $links){
		   $the_main->social_link_upload($_POST['sType'], $_POST['sId'], $links, $_POST['sURLs'][$i]);
		   $i++;	
		}
		$_SESSION['SocialResponse'] = "Success";
		echo 'Success';
	}
	

}// delete sponsors permission 

/*///////////// 
Sponsor Permission Request
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'sponsor_tag_request'){

	if (isset($_POST['sId'])) {
	  $_SESSION['Filter_Edit'] =  $_POST['sId'];
	}


}

/*///////////// 
Sponsor Permission edit
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'sponsor_tag_save'){
	 $the_main = new main\main;

	if (isset($_POST['sId'])) {
	  $the_main->save_sponsor_tags($_POST['sId'], $_POST['tags']);
	}


}// sponsor permission edit

/*///////////// 
Sponsor A La Carte Create
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'add_alacarte_data'){
	 $the_main = new main\main;

	if (isset($_POST['sId']) && isset($_POST['type'])) {
		if ($_POST['type'] == 'new' ){
			$the_main->alacarte_for_sponsor($_POST['sId'], $_POST['value']);
		}
		
		
	  
	}


}

/*///////////// 
Sponsor A La Carte Modify
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'edit_alacarte_data'){
	 $the_main = new main\main;

	if (isset($_POST['sId']) && isset($_POST['type'])) {
		if ($_POST['type'] == 'modify' ){
			$the_main->edit_alacarte($_POST['sId'], $_POST['value']);
		}
		
		if ($_POST['type'] == 'delete' ){
			$the_main->delete_alacarte($_POST['sId']);
		}		
		
	  
	}


}



/************************
Mediapartners
**************************/

/*///////////// 
Add new media partner
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'add_new_mediapartner'){
	$the_main = new main\main;
	

    $result = $the_main->save_mediapartner();
	if (isset($result)) {
	  $_SESSION['Result'] =  'Success';
	  echo 'Success';	
	}


}


/*///////////// 
Change media partner image
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'edit_mediapartner_image'){
	$the_main = new main\main;
	

    $result = $the_main->file_upload('press/Mediapartners/logos/', $_POST['sponsor_name']);
	
	if (isset($result['name'])) {
	    $the_main->pic_upload(5, $_POST['sponsor_id'], $result['name'], $_POST['sponsor_name'].' Logo');
	}


}




/*///////////// 
Edit media partner Data
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'edit_mediapartner'){
	$the_main = new main\main;
	
   if(isset($_POST['sId']) && isset($_POST['edit_type'])){
	    $result = $the_main->edit_mediapartner();
 
  
	if (isset($result)) {
	  $_SESSION['Result'] =  'Success';
	  echo 'Success';	
	}
	
  }

}


 if(isset($_POST['action']) && $_POST['action'] == 'mediapartner_edit_request'){

	if (isset($_POST['sId'])) {
	  $_SESSION['mediapartner_edit'] =  $_POST['sId'];
	}

}


 if(isset($_POST['action']) && $_POST['action'] == 'mediapartner_order'){
	$the_main = new main\main;
	
          foreach ($_POST['order'] as $order) {
			 $the_main->mediapartner_order($order[0], $order[1]);
			  
		  }
 }
/*
**************************
Speakers
***************************
*/

/*///////////// 
Add new speaker
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'add_new_speaker'){
	$the_main = new main\main;
	

    $result = $the_main->save_speaker();
	if (isset($result)) {
	  $_SESSION['Result'] =  'Success';
	  echo 'Success';	
	}
 


}


/*///////////// 
Add speaker company logo
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'add_new_speaker_company_logo'){
	$the_main = new main\main;
	
         if (isset($_SESSION['SpeakerCompanyId'])) {
			 
			    $result = $the_main->file_upload('speakers/CompanyLogos/', $_POST['Name']);
	
				  if (isset($result['name'])) {
					  $the_main->pic_upload(3, $_SESSION['SpeakerCompanyId'], $result['name'], $_POST['Name']);
				  }
			 
			 
		 }
 


}

/*///////////// 
Edit Speaker Data
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'edit_speakers'){
	$the_main = new main\main;
	
   if(isset($_POST['sId']) && isset($_POST['edit_type'])){
	    $result = $the_main->edit_speaker();
 
  
	if (isset($result) && $result != "Deleted") {
	  $_SESSION['Result'] =  'Success';
	  echo 'Success';	
	}
	
	
	
  }


}


/*///////////// 
Change speaker image
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'edit_speaker_image'){
	$the_main = new main\main;
	
   				  $sTag = explode(" ", $_POST['speaker_name']); 
				   if(isset($sTag[0])) {
					   $speaker_tag = ucfirst($sTag[1]).ucfirst($sTag[0][0]);
				   } else {
					   $speaker_tag = ucfirst($_POST['speaker_name']); 
				   }
  

    $result = $the_main->file_upload('speakers/SpeakerPhotos/', $speaker_tag);
	
	if (isset($result['name'])) {
	    $the_main->pic_upload(1, $_POST['speaker_id'], $result['name'], $speaker_tag.' Picture');
	}


}


/*///////////// 
Change company image
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'edit_company_image'){
	$the_main = new main\main;
	

    $result = $the_main->file_upload('speakers/CompanyLogos/', $_POST['company_name']);
	
	if (isset($result['name'])) {
	    $the_main->pic_upload(3, $_POST['company_id'], $result['name'], $_POST['company_name']);
	}


}// company image

/*///////////// 
Speaker order
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'speaker_order'){
	$the_main = new main\main;
	
          foreach ($_POST['order'] as $order) {
			 $the_main->speaker_order($order[0], $order[1]);
			  
		  }

	/*
	if (isset($result)) {
	  $_SESSION['Result'] =  'Success';
	  echo 'Success';	
	}
 */


}// speaker order

/*///////////// 
Speaker mainpage order
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'speaker_mainpage_order'){
	$the_main = new main\main;
	
          foreach ($_POST['order'] as $order) {
			 $the_main->speaker_mainpage_order($order[0], $order[1]);
			  
		  }

	/*
	if (isset($result)) {
	  $_SESSION['Result'] =  'Success';
	  echo 'Success';	
	}
 */


}// speaker order


/*///////////// 
Speaker mainpage bio edit
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'edit_mainpage_speaker_bio'){
	$the_main = new main\main;

			 $the_main->speaker_mainpage_bio();


}// speaker order

 /*///////////// 
Main page display
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'speakers_mainpage' && isset($_POST['sId']) && isset($_POST['val'])){
	$the_main = new main\main;
    $the_main->speakers_mainpage($_POST['sId'], $_POST['val']);
	

}// delete sponsors permission 





/*
**************************
Press
***************************
*/

/*///////////// 
Add new Press member
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'add_new_press'){
	$the_main = new main\main;
	

    $result = $the_main->save_press();
	if (isset($result)) {
	  $_SESSION['Result'] =  'Success';
	  echo 'Success';	
	}
 


}


/*///////////// 
Add company logo to press member
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'add_new_press_company_logo'){
	$the_main = new main\main;

	if (isset($_POST['entity_id']) && $_POST['entity_id'] == 6){
	  $location = "BlogSquad";	
	} else {
		 $location = "Analytics";
	}
	
		
         if (isset($_SESSION['SpeakerCompanyId'])) {
			 
			    $result = $the_main->file_upload('press/'.$location.'/CompanyLogos/', $_POST['Name']);
	
				  if (isset($result['name'])) {
					  $the_main->press_pic_upload($_POST['entity_id'], $_SESSION['SpeakerCompanyId'], $result['name'], $_POST['Name']);
				  }
			 
			 
		 }
 


}

/*///////////// 
Edit press Data
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'edit_press'){
	$the_main = new main\main;
	
   if(isset($_POST['sId']) && isset($_POST['edit_type'])){
	    $result = $the_main->edit_press();
 
  
	if (isset($result) && $result != "Deleted") {
	  $_SESSION['Result'] =  'Success';
	  echo 'Success';	
	}
	
	
	
  }


}


/*///////////// 
Change speaker image
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'edit_press_image'){
	$the_main = new main\main;
	
	if (isset($_POST['entity_id']) && $_POST['entity_id'] == 6){
	  $location = "BlogSquad";	
	} else {
		 $location = "Analytics";
	}
		
	
   				  $sTag = explode(" ", $_POST['speaker_name']); 
				   if(isset($sTag[0])) {
					   $speaker_tag = ucfirst($sTag[1]).ucfirst($sTag[0][0]);
				   } else {
					   $speaker_tag = ucfirst($_POST['speaker_name']); 
				   }
  

    $result = $the_main->file_upload('press/'.$location.'/Photos/', $speaker_tag);
	
	if (isset($result['name'])) {
	    $the_main->press_pic_upload($_POST['entity_id'], $_POST['speaker_id'], $result['name'], $speaker_tag.' Picture');
	}


}


/*///////////// 
Speaker order
///////////////*/
/*

 if(isset($_POST['action']) && $_POST['action'] == 'speaker_order'){
	$the_main = new main\main;
	
          foreach ($_POST['order'] as $order) {
			 $the_main->speaker_order($order[0], $order[1]);
			  
		  }

	/*
	if (isset($result)) {
	  $_SESSION['Result'] =  'Success';
	  echo 'Success';	
	}
 */


//}// speaker order

/*///////////// 
Press order
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'press_order'){
	$the_main = new main\main;
	
          foreach ($_POST['order'] as $order) {
			 $the_main->press_order($_POST['entity'], $order[0], $order[1]);
			  
		  }

	/*
	if (isset($result)) {
	  $_SESSION['Result'] =  'Success';
	  echo 'Success';	
	}
 */


}// speaker order


/*///////////// 
Speaker mainpage bio edit
///////////////*/


 if(isset($_POST['action']) && $_POST['action'] == 'edit_press_bio'){
	$the_main = new main\main;

			 $the_main->press_bio();


}// speaker order

 /*///////////// 
Main page display
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'press_mainpage' && isset($_POST['sId']) && isset($_POST['val'])){
	$the_main = new main\main;
    $the_main->press_mainpage($_POST['sId'], $_POST['val']);
	

}// delete sponsors permission 




/**********************************
Agenda Frontend
**************************************/

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

 if(isset($_POST['action']) && $_POST['action'] == 'change_agenda_category_desktop'){
	$agenda = new agenda\agenda_main;
	
	     //Session table update
	    $data = $agenda->agenda_session($_POST['category'],1);
        $output[0] = $agenda->display_sessions($data); 
		
		$data2 = $agenda->agenda_session($_POST['category'],2);
        $output[1] = $agenda->display_sessions($data2);
		

	     $output[2] = $agenda->get_block_data_admin($_POST['category'], $_POST['day'],2);	


       //Get the new colors and styles
	  $colorData = $agenda->get_category_styles($_POST['category']);
	   
	   $output[3]['category'] = $colorData['category'];
	   $output[3]['color'] = $colorData['color_class'] ; 

	if (isset($output[0]) && isset($output[1]) && isset($output[3])) {
	   
	    echo json_encode($output);	
	}



}


 if(isset($_POST['action']) && $_POST['action'] == 'change_agenda_category_mobile'){
	$agenda = new agenda\agenda_main;
	
	     //Session table update
	    $data = $agenda->agenda_session($_POST['category'],1);
        $output[0] = $agenda->display_session_mobile($data); 
		
		$data2 = $agenda->agenda_session($_POST['category'],2);
        $output[1] = $agenda->display_session_mobile($data2);
		
		
		//Testimonial update
         $blocks = $agenda->block_display($_POST['category'],1);
		 
		 $output[2] = '';

        foreach ($blocks as $elems) {
	     $output[2] .= $agenda->get_block_data($elems[0], $elems[1]);	
      	}
		 

       //Get the new colors and styles
	  $colorData = $agenda->get_category_styles($_POST['category']);
	   
	   $output[3]['category'] = $colorData['category'];
	   $output[3]['color'] = $colorData['color_class'] ; 

	if (isset($output[0]) && isset($output[1]) && isset($output[3])) {
	   
	    echo json_encode($output);	
	}



}


/**********************
Agenda backend
****************************/

 if(isset($_POST['action']) && $_POST['action'] == 'save_agenda'){
	$the_main = new main\main;
	

    $result = $the_main->save_agenda();
	if (isset($result)) {
	  $_SESSION['Result'] =  'Success';
	  echo 'Success';	
	}


}


//Get abstract
 if(isset($_POST['action']) && $_POST['action'] == 'get_session_modal_abstract'){
	$agenda = new agenda\agenda_main;
	

    $result = $agenda->get_session_abstract($_POST['agenda_id']);
	if (isset($result)) {
	  echo $result;	
	}


}



//Modify abstract
 if(isset($_POST['action']) && $_POST['action'] == 'agenda_session_modal_abstract'){
	$the_main = new main\main;
	

    $result = $the_main->modify_session_abstract($_POST['agenda_id']);
	if (isset($result)) {
	  $_SESSION['Result'] =  'Success';
	  echo 'Success';	
	}


}



//Get speakers for agenda_modal
 if(isset($_POST['action']) && $_POST['action'] == 'new_speaker_agenda_session'){
	$agenda = new agenda\agenda_main;
	

    $result = $agenda->get_speakers_for_agenda_modal($_POST['agenda_id']);
	if (isset($result)) {
	  echo $result;	
	}


}


//Add speaker to session
 if(isset($_POST['action']) && $_POST['action'] == 'add_speaker_to_session'){
	$the_main = new main\main;
	$agenda = new agenda\agenda_main;

    $the_main->add_speaker_to_session($_POST['agenda_id'], $_POST['speaker_id']);

    $result = $agenda->get_speakers_for_agenda_modal($_POST['agenda_id']);
	if (isset($result)) {
	  echo $result;	
	}

}


//delete speaker from session
 if(isset($_POST['action']) && $_POST['action'] == 'delete_speaker_from_session'){
	$the_main = new main\main;
	$agenda = new agenda\agenda_main;

    $the_main->delete_speaker_from_session($_POST['agenda_id'], $_POST['speaker_id']);

    $result = $agenda->get_speakers_for_agenda_modal($_POST['agenda_id']);
	if (isset($result)) {
	  echo $result;	
	}

}



//Change Session Time
 if(isset($_POST['action']) && $_POST['action'] == 'change_session_time'){
	$the_main = new main\main;
	

    $result = $the_main->modify_session_time($_POST['agenda_id'], $_POST['edit_type'], $_POST['time']);
	if (isset($result)) {
	  $_SESSION['Result'] =  'Success';
	  echo 'Success';	
	}


}

//Change Session category
 if(isset($_POST['action']) && $_POST['action'] == 'change_session_category'){
	$the_main = new main\main;
	

    $result = $the_main->modify_session_category($_POST['agenda_id'], $_POST['category']);
	if (isset($result)) {
	  $_SESSION['Result'] =  'Success';
	  echo 'Success';	
	}


}

//Change Session day
 if(isset($_POST['action']) && $_POST['action'] == 'change_session_day'){
	$the_main = new main\main;
	

    $result = $the_main->modify_session_day($_POST['agenda_id'], $_POST['day']);
	if (isset($result)) {
	  $_SESSION['Result'] =  'Success';
	  echo 'Success';	
	}


}


//Delete Session
 if(isset($_POST['action']) && $_POST['action'] == 'delete_session'){
	$the_main = new main\main;
	

    $result = $the_main->delete_session($_POST['agenda_id']);
	if (isset($result)) {
	  $_SESSION['Result'] =  'Success';
	  echo 'Success';	
	}


}


//Edit agenda title
 if(isset($_POST['action']) && $_POST['action'] == 'edit_agenda_title'){
	$the_main = new main\main;
	

    $result = $the_main->modify_session_title($_POST['agenda_id'], $_POST['value']);
	if (isset($result)) {
	  $_SESSION['Result'] =  'Success';
	  echo 'Success';	
	}


}


//Get Testimonial Data
 if(isset($_POST['action']) && $_POST['action'] == 'get_testimonial_data'){
	$agenda = new agenda\agenda_main;
	

    $result = $agenda->get_testimonial_data($_POST['day'], $_POST['category'], $_POST['block_num']);
	if (isset($result)) {
	  echo $result;	
	}


}

//change testimonial type
 if(isset($_POST['action']) && $_POST['action'] == 'change_testimonial_type'){
	$the_main = new main\main;
	$agenda = new agenda\agenda_main;

    $the_main->change_testimonial_type($_POST['day'], $_POST['category'], $_POST['block_num'], $_POST['type']);

    $result = $agenda->get_testimonial_data($_POST['day'], $_POST['category'], $_POST['block_num']);
	if (isset($result)) {
	  echo $result;	
	}

}


//add speaker to testimonial
 if(isset($_POST['action']) && $_POST['action'] == 'add_speaker_to_testimonial'){
	$the_main = new main\main;
	$agenda = new agenda\agenda_main;

    $output = $the_main->add_speaker_to_testimonial($_POST['block_id'], $_POST['speaker_id'], $_POST['type'], 1);


    $result = $agenda->get_testimonial_data($output['agenda_day'], $output['agenda_category_id'], $output['block']);
	if (isset($result)) {
	  echo $result;	
	}

}


//delete speaker from testimonial
 if(isset($_POST['action']) && $_POST['action'] == 'delete_speaker_from_testimonial'){
	$the_main = new main\main;
	$agenda = new agenda\agenda_main;

    $output = $the_main->delete_speaker_from_testimonial($_POST['block_id'], $_POST['speaker_id'], $_POST['type'], 1);


    $result = $agenda->get_testimonial_data($output['agenda_day'], $output['agenda_category_id'], $output['block']);
	if (isset($result)) {
	  echo $result;	
	}

}


//add quote to testimonial
 if(isset($_POST['action']) && $_POST['action'] == 'add_quote_to_testimonial'){
	$the_main = new main\main;
	$agenda = new agenda\agenda_main;

    $output = $the_main->add_speaker_to_testimonial($_POST['block_id'], $_POST['quote_id'], $_POST['type'], 2);


    $result = $agenda->get_testimonial_data($output['agenda_day'], $output['agenda_category_id'], $output['block']);
	if (isset($result)) {
	  echo $result;	
	}

}


//delete quote from testimonial
 if(isset($_POST['action']) && $_POST['action'] == 'delete_quote_from_testimonial'){
	$the_main = new main\main;
	$agenda = new agenda\agenda_main;

    $output = $the_main->delete_speaker_from_testimonial($_POST['block_id'], $_POST['quote_id'], $_POST['type'], 2);


    $result = $agenda->get_testimonial_data($output['agenda_day'], $output['agenda_category_id'], $output['block']);
	if (isset($result)) {
	  echo $result;	
	}

}




//add new quote
 if(isset($_POST['action']) && $_POST['action'] == 'add_new_quote'){
	$the_main = new main\main;
	

  $result = $the_main->add_new_quote($_POST['author']);
 
	if (isset($result)) {
	  $_SESSION['Result'] =  'Success';
	  echo 'Data Saved!';	
	}


}



//Get abstract
 if(isset($_POST['action']) && $_POST['action'] == 'get_quote_data_for_edit'){
	$agenda = new agenda\agenda_main;
	

    $result = $agenda->get_quote_data($_POST['quote_id']);
	if (isset($result)) {
	  echo $result;	
	}


}

//Modify Quote
 if(isset($_POST['action']) && $_POST['action'] == 'edit_quote'){
	$the_main = new main\main;
	

    $result = $the_main->edit_quote($_POST['quote_id']);
	if (isset($result)) {
	  $_SESSION['Result'] =  'Success';
	  echo 'Success';	
	}


}


//Get Sponsor Data
 if(isset($_POST['action']) && $_POST['action'] == 'get_agenda_sponsor_data'){
	$agenda = new agenda\agenda_main;
	

    $result = $agenda->get_sponsor_data($_POST['day'], $_POST['category']);
	if (isset($result)) {
	  echo $result;	
	}


}

//change sponsor type
 if(isset($_POST['action']) && $_POST['action'] == 'change_sponsor_type'){
	$the_main = new main\main;
	$agenda = new agenda\agenda_main;

    $the_main->change_agenda_sponsor_type($_POST['day'], $_POST['category'], $_POST['type']);

    $result = $agenda->get_sponsor_data($_POST['day'], $_POST['category']);
	if (isset($result)) {
	  echo $result;	
	}

}

//add sponsor to agenda
 if(isset($_POST['action']) && $_POST['action'] == 'add_sponsor_to_agenda'){
	$the_main = new main\main;
	$agenda = new agenda\agenda_main;

    $output = $the_main->add_sponsor_to_agenda($_POST['block_id'], $_POST['sponsor_id'], $_POST['type']);


    $result = $agenda->get_sponsor_data($output['agenda_day'], $output['agenda_category_id']);
	if (isset($result)) {
	  echo $result;	
	}

}

//delete sponsor from agenda
 if(isset($_POST['action']) && $_POST['action'] == 'delete_sponsor_from_agenda'){
	$the_main = new main\main;
	$agenda = new agenda\agenda_main;

   $the_main->delete_sponsor_from_agenda($_POST['day'], $_POST['category'], $_POST['sponsor_id']);


    $result = $agenda->get_sponsor_data($_POST['day'], $_POST['category']);
	if (isset($result)) {
	  echo $result;	
	}

}
?>