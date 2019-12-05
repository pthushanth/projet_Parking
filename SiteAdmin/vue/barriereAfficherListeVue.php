 <?php 

 function listeDeroulante($tabBarriere)
 {
 	 $html='<label>Choisissez une Barrière: </label><select name="barriere" id="barriere">'; 
 	 $html.=' <option value="">choisissez une barriere</option>';
 	
 	list($tabBarriereNom,$tabBarriereId,$tabBarriereType,$tabBarriereIp,$tabParkingId)=$tabBarriere;
 	$tabIdNom=array_combine($tabBarriereId, $tabBarriereNom);
 	 foreach ( $tabIdNom as $id => $nom) 
 	 {	
      	$html.='<option value="'.$id.'">'.$nom.'</option>';
	 }
	 $html.='</select></br>';
	 return $html;
 }





 /*
 function listeDeroulante($tabBarriereNom)
 {
 	 $html='Choisissez une Barrière:<select name="barriere" id="barriere">'; 
 	 $html.=' <option value="">choisissez une barriere</option>';
 	 $listeBarriere=array();
 	 foreach ($tabBarriereNom as $barriere) 
 	 {	
 	  	if(!in_array($barriere,$listeBarriere))
   		{
      		 array_push($listeBarriere,$barriere);
      		 $html.='<option value="'.$barriere.'">'.$barriere.'</option>';
   		}
	 }
	 $html.='</select>';
	 return $html;
 }*/

 ?>