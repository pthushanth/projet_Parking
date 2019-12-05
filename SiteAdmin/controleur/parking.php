<?php
	session_start();
	include_once "../modele/requeteBDD.php"; 
    
	if(isset($_GET['ajouterP']))
	{
	$nomP=htmlspecialchars($_GET["nomP"]);	
	$nbPlace=htmlspecialchars($_GET["nbPlace"]);
	$message=envoyerRequeteAjouterParking($nomP,$nbPlace);
	header("location:../index.php?page=parkingVue&msg=".$message);
	}

	if(isset($_GET['modifierP']))
	{
	  $idParking=htmlspecialchars($_GET["parking"]);
 	  $_SESSION["idParking"] =$idParking ;
 	  echo $idParking;
  	  header("location:../index.php?page=parkingVue&msg=".$message."&modifierP");

	}
if(isset($_GET['modifierLeParking']))
  { 
  	
  $nomP=htmlspecialchars($_GET["nomP"]);  
  $nbPlaceTotal=htmlspecialchars($_GET["nbPlace"]);
  $message=envoyerRequeteModifierParking($nomP,$_SESSION['idParking'],$nbPlaceTotal);
  //var_dump($message);
  header("location:../index.php?page=parkingVue&msg=".$message);

}

?>
