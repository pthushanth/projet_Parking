<?php
include_once ("./modele/requeteBDD.php"); 
include("parkingAfficherListeVue.php");
?>
<div id="ajouterP">
	<h3> Ajouter un parking </h3>
	<form action="controleur/parking.php" method="GET">
		<label>Nom Parking:</label><input type="text" name="nomP" id="nomP"/></br>
		<label>Nombre de place</label><input type="text" name="nbPlace" id="nbPlace"/></br>
		<label> &nbsp; </label><input type="submit" name="ajouterP" value="Valider" id="valider">
	</form>
</div>

<div id="ajouterP">
<h3> Modifier Parking </h3>
	<form action="controleur/parking.php" method="GET">
	<?php echo listeDeroulanteParking( envoyerRequeteRecupererParking()); ?>
	</br><label> &nbsp; </label><input type="submit" name="modifierP" value="Modifier" id="valider">
</form>
<?php if(isset($_GET['modifierP'])) include("parkingModifierVue.php");?>
</div>
