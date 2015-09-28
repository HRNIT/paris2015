<?php 


function ranking($rank) { 
    
	 if(isset($rank)){
		   $rn = 0;
			   switch ($rank) {
					case 1: //Developer
						$agenda_i = 1;
						$sponsors_i = 1;
						$speakers_i = 1;
						$blogsquad_i = 1;
						$mediapartners_i = 1;
						$super = 1;
						break;
					case 2: //Admin
						$agenda_i = 1;
						$sponsors_i = 1;
						$speakers_i = 1;
						$blogsquad_i = 1;
						$mediapartners_i = 1;
						$super = 1;
						break;
					case 3: //Agenda Moderator
						$agenda_i = 1;
						$sponsors_i = 0;
						$speakers_i = 0;
						$blogsquad_i = 0;
						$mediapartners_i = 0;
						$super = 0;
						break;
					case 4: //Agenda Super Moderator
						$agenda_i = 1;
						$sponsors_i = 0;
						$speakers_i = 0;
						$blogsquad_i = 0;
						$mediapartners_i = 0;
						$super = 1;
						break;
					case 5: //Blogsquad Moderator
						$agenda_i = 0;
						$sponsors_i = 0;
						$speakers_i = 0;
						$blogsquad_i = 1;
						$mediapartners_i = 0;
						$super = 0;
						break;
					case 6: //Blogsquad Super Moderator
						$agenda_i = 0;
						$sponsors_i = 0;
						$speakers_i = 0;
						$blogsquad_i = 1;
						$mediapartners_i = 0;
						$super = 1;
						break;
					case 7: //Mediapartners Moderator
						$agenda_i = 0;
						$sponsors_i = 0;
						$speakers_i = 0;
						$blogsquad_i = 0;
						$mediapartners_i = 1;
						$super = 0;
						break;
					case 8: //Mediapartners Super Moderator
						$agenda_i = 0;
						$sponsors_i = 0;
						$speakers_i = 0;
						$blogsquad_i = 0;
						$mediapartners_i = 1;
						$super = 1;
						break;
					case 9: //Speakers Moderator
						$agenda_i = 0;
						$sponsors_i = 0;
						$speakers_i = 1;
						$blogsquad_i = 0;
						$mediapartners_i = 0;
						$super = 0;
						break;
					case 10: //Speakers Super Moderator
						$agenda_i = 0;
						$sponsors_i = 0;
						$speakers_i = 1;
						$blogsquad_i = 0;
						$mediapartners_i = 0;
						$super = 1;
						break;
					case 11: //Sponsors Moderator
						$agenda_i = 0;
						$sponsors_i = 1;
						$speakers_i = 0;
						$blogsquad_i = 0;
						$mediapartners_i = 0;
						$super = 0;
						break;
					case 12: //Sponsors Super Moderator
						$agenda_i = 0;
						$sponsors_i = 1;
						$speakers_i = 0;
						$blogsquad_i = 0;
						$mediapartners_i = 0;
						$super = 1;
						break;
					default:
						$agenda_i = 0;
						$sponsors_i = 0;
						$speakers_i = 0;
						$blogsquad_i = 0;
						$mediapartners_i = 0;
						break;
				}//switch r end
				
			  if($super == 1) {
				  $permission[$rn] = 'super';
				  $rn++;
			  }
							  
			  if($agenda_i == 1) {
				  $permission[$rn] = 'agenda';
				  $rn++;
			  }
			  
			  if($sponsors_i == 1) {
				  $permission[$rn] = 'sponsors';
				  $rn++;
			  }
			  
			  
			  if($speakers_i == 1) {
				  $permission[$rn] = 'speakers';
				  $rn++;
			  }
			  
			  if($blogsquad_i == 1) {
				  $permission[$rn] = 'blogsquad';
				  $rn++;
			  }
			  
			 if($mediapartners_i == 1) {
				  $permission[$rn] = 'mediapartners';
				  $rn++;
			  }
			  

		   
	   }//isset rank

	return $permission;
}	


?>