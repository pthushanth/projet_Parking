 <?php 

 function listeDeroulanteAnnee($tabAnnee)
 {
 	 $html='Année :<select name="annee" id="annee">'; 
 	 $html.=' <option value="">choisissez l\'année</option>';
 	 $listeAnnee=array();
 	 foreach ($tabAnnee as $test) 
 	 {	
 	 	$annee=substr($test,0,4);
 	  	if(!in_array($annee,$listeAnnee))
   		{
      		 array_push($listeAnnee,$annee);
      		 $html.='<option value="'.$annee.'">'.$annee.'</option>';
   		}
	 }
	 $html.='</select>';
	 return $html;
 }

 ?>


  <?php 
/*
 function listeDeroulanteAnnee($annee)
 {
 	 $tailleTab=count($annee);
 	 $i=0;

 	 $html='Année :<select name="annee" id="annee">'; 
 	 $html.=' <option value="">choisissez l\'année</option>';
 	 while($i<$tailleTab)
 	 {
 	 	$a=substr($annee[$i],0,4);
		 $html.='<option value="'.$a.'">'.$a.'</option>';
		 $i++;
	}
	$html.='</select>';
	return $html;
 }
*/
 ?>