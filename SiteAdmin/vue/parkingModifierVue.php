<?php
session_start();
include_once('./modele/requeteBDD.php');
$Parking=envoyerRequeteRecupererParking($_SESSION['idParking']);
list($parkingNom,$parkingId,$parkingNbPlaceTotal)=$Parking;
//if(isset($_GET[0]))
	echo'<form action="controleur/parking.php" method="GET">
    <label>Nom Parking:</label><input type="text" name="nomP" id="nomP" value="'.$parkingNom[0].'"/></br>
    <label>Nombre de place</label><input type="text" name="nbPlace" id="nbPlace" value="'.$parkingNbPlaceTotal[0].'"/></br>
    <label> &nbsp; </label> <input type="submit" name="modifierLeParking" value="Modifier" id="valider">
</form>';

?>