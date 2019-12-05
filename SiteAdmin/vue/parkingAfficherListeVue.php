  <?php 
  function listeDeroulanteParking($tabParking)
 {
 	 $html='<label>Choisissez un Parking: </label><select name="parking" id="parking">'; 
 	 $html.=' <option value="">choisissez un Parking</option>';
 	
 	list($tabParkingNom,$tabParkingId,$tabParkingNbPlaceTotal)=$tabParking;
 	$tabIdNom=array_combine($tabParkingId, $tabParkingNom);
 	 foreach ( $tabIdNom as $id => $nom) 
 	 {	
      	$html.='<option value="'.$id.'">'.$nom.'</option>';
	 }
	 $html.='</select></br>';
	 return $html;
 }
 ?>