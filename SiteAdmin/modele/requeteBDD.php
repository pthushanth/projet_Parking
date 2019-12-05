 <?php

function envoyerRequeteAjouterBarriere($nomB,$ip,$idP,$es)
{
	include('connexionBDD.php');
	$requete2="INSERT INTO barriere (type,nomBarriere,ip,idParking) VALUES ('".$es."','".$nomB."','".$ip."','".$idP."')";
	$msg="";
	if (mysqli_query($conn, $requete2)) $msg="Bien enregistré dans la BDD";
	else $msg="Error: " . mysqli_error($conn);
	return $msg;
}
function envoyerRequeteRecupererBarriere($id=NULL)
{
	include('connexionBDD.php');
	$tabBarriereNom=array();
	$tabBarriereId=array();
	$tabBarriereType=array();
	$tabBarriereIp=array();
	$tabParkingId=array();
	if($id==NULL)$req='SELECT * FROM barriere';
	else $req='SELECT * FROM barriere WHERE idBarriere='.$id;
	$res=mysqli_query($conn, $req);
	if (mysqli_num_rows($res) > 0)
	{
		while($ligne = mysqli_fetch_array($res))
		{
			$tabBarriereNom[]=$ligne['nomBarriere'];
			$tabBarriereId[]=$ligne['idBarriere'];
			$tabBarriereType[]=$ligne['type'];
			$tabBarriereIp[]=$ligne['ip'];
			$tabParkingId[]=$ligne['idParking'];

		}
	}
	//var_dump($tabAnnee);
	return array($tabBarriereNom, $tabBarriereId, $tabBarriereType, $tabBarriereIp,$tabParkingId);
}

function envoyerRequeteSupprimerBarriere($idBarriere)
{
	include('connexionBDD.php');
	$msg="";
	$req="DELETE FROM barriere WHERE idBarriere='".$idBarriere."'";
	if(mysqli_query($conn, $req))
	{
		$msg="OK";
	}
	else $msg="Erreur";
	return $msg;
}

function envoyerRequeteModifierBarriere($nomBarriere,$ipBarriere,$idParking,$typeBarriere,$idBarriere)
{
	include('connexionBDD.php');
	$msg="";
	$req="UPDATE barriere SET nomBarriere='".$nomBarriere."',ip='".$ipBarriere."',idParking='".$idParking."',type='".$typeBarriere."' WHERE idBarriere='".$idBarriere."'";
	if(mysqli_query($conn, $req))
	{
		$msg="OK";
	}
	else $msg="Erreur";
	return $msg;
}


function envoyerRequeteAjouterParking($nomP,$nbPlace)
{
	include('connexionBDD.php');
	$requete3="INSERT INTO parking (nomParking,nbPlaceTotal) VALUES ('".$nomP."','".$nbPlace."')";
	$msg="";
	if (mysqli_query($conn, $requete3)) $msg="Bien enregistré dans la BDD";
	else $msg="Error: " . mysqli_error($conn);
	return $msg;
}
function envoyerRequeteRecupererParking($id=NULL)
{
	include('connexionBDD.php');
	$tabParkingNom=array();
	$tabParkingId=array();
	$tabParkingNbPlaceTotal=array();
	if($id==NULL)$req='SELECT * FROM parking';
	else $req='SELECT * FROM parking WHERE idParking='.$id;
	$res=mysqli_query($conn, $req);
	if (mysqli_num_rows($res) > 0)
	{
		while($ligne = mysqli_fetch_array($res))
		{
			$tabParkingNom[]=$ligne['nomParking'];
			$tabParkingId[]=$ligne['idParking'];
			$tabParkingNbPlaceTotal[]=$ligne['nbPlaceTotal'];
		}
	}
	return array($tabParkingNom, $tabParkingId, $tabParkingNbPlaceTotal);
}

function envoyerRequeteModifierParking($nomParking,$idParking,$nbPlaceTotal)
{
	include('connexionBDD.php');
	$msg="";
	$req="UPDATE parking SET nomParking='".$nomParking."',nbPlaceTotal='".$nbPlaceTotal."' WHERE idParking='".$idParking."'";
	if(mysqli_query($conn, $req))
	{
		$msg="OK";
	}
	else $msg="Erreur";
	return $msg;
}



function envoyerRequeteStatistique($duree, $anneeMois=NULL)
{
	include('connexionBDD.php');
	$date = array();
	$tabNbVisiteur= array();
	//$requete="SELECT * FROM stats ";
	if($duree=="jour") $requete='SELECT date, COUNT(action) AS nbVisiteur FROM historique WHERE action="entree" GROUP BY date LIMIT 30';
	if($duree=="semaine") $requete='SELECT WEEKOFYEAR(date) AS date, COUNT(action) AS nbVisiteur FROM historique WHERE action="entree" GROUP BY WEEKOFYEAR(date)';
	if($duree=="mois" && $anneeMois!=NULL) $requete='SELECT MONTHNAME(date) AS date, COUNT(action) AS nbVisiteur FROM historique WHERE action="entree" AND YEAR(date) ="'.$anneeMois.'" GROUP BY MONTH(date)';
	else if($duree=="mois" && $anneeMois==NULL) $requete='SELECT MONTHNAME(date) AS date, COUNT(action) AS nbVisiteur FROM historique WHERE action="entree" GROUP BY MONTH(date)';
	
		if($duree=="annee") $requete='SELECT YEAR(date) AS date, COUNT(action) AS nbVisiteur FROM historique WHERE action="entree" GROUP BY YEAR(date)';
	
	if($duree=="annee") $requete='SELECT YEAR(date) AS date, COUNT(action) AS nbVisiteur FROM historique WHERE action="entree" GROUP BY YEAR(date)';

	$resultat=mysqli_query($conn, $requete);
	if(mysqli_num_rows($resultat) > 0) 
	{
		while($row = mysqli_fetch_array($resultat))
		{
			$tabNbVisiteur[]=$row['nbVisiteur'];
			$date[]=$row['date'];
			//echo $tabNbVisiteur."----------".$date;

		}
	}
	return array($tabNbVisiteur, $date);

}

function envoyerRequeteStatistiqueAnnee()
{
	include('connexionBDD.php');
	$tabAnnee=array();
	$req='SELECT DISTINCT date  FROM historique WHERE action="entree" ORDER BY date DESC';
	$res=mysqli_query($conn, $req);
	if (mysqli_num_rows($res) > 0)
	{
		while($ligne = mysqli_fetch_array($res))
		{
			$tabAnnee[]=$ligne['date'];
		}
	}
	//var_dump($tabAnnee);
	return $tabAnnee;
}

