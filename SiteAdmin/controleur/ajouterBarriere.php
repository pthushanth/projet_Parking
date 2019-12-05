<?php
session_start();
include("../vue/barriereAfficherListeVue.php");

if(isset($_GET['action']) && $_GET['action']=="Ajouter")
{
	include_once "../modele/requeteBDD.php";
$nomB=htmlspecialchars($_GET["nomB"]);	
$ip=htmlspecialchars($_GET["ip"]);
$idP=htmlspecialchars($_GET["idP"]);
$es=htmlspecialchars($_GET["es"]);

$message=envoyerRequeteAjouterBarriere($nomB,$ip,$idP,$es);
header("location:../index.php?page=barriereVue&msg=".$message);
}

if(isset($_GET['action']) && $_GET['action']=="Supprimer")
{
	include_once "../modele/requeteBDD.php";
  $idBarriere=htmlspecialchars($_GET["barriere"]);
	$message=envoyerRequeteSupprimerBarriere($idBarriere);
  header("location:../index.php?page=barriereVue&msg=".$message);
}

if(isset($_GET['action']) && $_GET['action']=="Modifier")
{ 
  $idBarriere=htmlspecialchars($_GET["barriere"]);
  //var_dump($idBarriere);
  $_SESSION["idBarriere"] =$idBarriere ;
  header("location:../index.php?page=barriereVue&msg=".$message."&modifierB");

}

if(isset($_GET['modifierLaBarriere']))
{ 
  $nomB=htmlspecialchars($_GET["nomB"]);  
  $ip=htmlspecialchars($_GET["ip"]);
  $idP=htmlspecialchars($_GET["idP"]);
  $type=htmlspecialchars($_GET["type"]);
  include_once "../modele/requeteBDD.php";
  $message=envoyerRequeteModifierBarriere($nomB,$ip,$idP,$type,$_SESSION['idBarriere']);
  //var_dump($message);
  header("location:../index.php?page=barriereVue&msg=".$message);

}
?>

