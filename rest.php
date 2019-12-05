<?php
error_reporting(0);
include_once('connexionBDD.php');
include_once('modele.php');
include_once('connexionBDD.php');

$req_type=$_SERVER['REQUEST_METHOD'];  //récupère la methode (GET, POST ....)
$req_path=$_SERVER['PATH_INFO'];	//Récupère le contenu de l'URL apres le fichier .php (http://www.example.com/rest.php/autorisation?nom=nom, alors la variable $_SERVER['PATH_INFO'] contiendra /autorisation)   
$req_data=explode("/", $req_path);  //Crée des tableaux à partir d'une chaine de caractère
$header=apache_request_headers();	//Récupère l'entete de la requete

switch($req_type)
{
	case "GET":
            if(isset($req_data[2])) $req="SELECT * FROM $req_data[1] WHERE $req_data[2]='$req_data[3]'";
            else $req="SELECT * FROM $req_data[1] ";
            break;

	case "DELETE":
            if(isset($req_data[2])) $req="DELETE FROM $req_data[1] WHERE $req_data[2]='$req_data[3]'";
            break;   

	case "PUT":
            if(isset($req_data[9])) $req="INSERT INTO $req_data[1]($req_data[2],$req_data[4],$req_data[6],$req_data[8]) VALUES ('$req_data[3]','$req_data[5]','$req_data[7]','$req_data[9]')";
            break;                
}

	$res=ExecuterRequete($conn,$req);
	$donnees=CreerFichierXML($res);
    echo $donnees;

?>