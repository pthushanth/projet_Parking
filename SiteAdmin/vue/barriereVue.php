<?php include_once ("./modele/requeteBDD.php"); 
include("barriereAfficherListeVue.php");
?>
<div id="ajouterB">
<h3> Ajouter Barrière </h3>
<form action="controleur/ajouterBarriere.php" method="GET">
  <label>Entrée ou Sortie:</label> 
		<input type="radio" name="es" value="e" id="e"> <span for="e">E</span>
		<input type="radio" name="es" value="s" id="s"> <span for="s">S</span>
		<input type="radio" name="es" value="es" id="es"><span for="es">ES</span> </br>
		<label>Nom :</label><input type="text" name="nomB" id="nomB"/></br>
		<label>Adresse IP</label><input type="text" name="ip" id="ip"/></br>
		<label>ID parking</label><input type="text" name="idP" id="idP"/></br>
		<label> &nbsp; </label><input type="submit" name="action" value="Ajouter" id="valider">
</form>
</div>
<div id="ajouterB">
<h3> Modifier Barrière </h3>
	<form action="controleur/ajouterBarriere.php" method="GET">
	<?php echo listeDeroulante( envoyerRequeteRecupererBarriere()); ?>
	</br><label> &nbsp; </label><input type="submit" name="action" value="Modifier" id="valider">
</form>
<?php if(isset($_GET['modifierB'])) include("barriereModifierVue.php"); ?>
</div>

<div id="ajouterB">
<h3> Supprimer Barrière </h3>
<form action="controleur/ajouterBarriere.php" method="GET">
	<?php echo listeDeroulante( envoyerRequeteRecupererBarriere()); ?>
	</br><label> &nbsp; </label><input type="submit" name="action" value="Supprimer" id="valider">
	</form>
</div>
<?php
	if(isset($_GET['msg'])) echo $_GET['msg'];
?>