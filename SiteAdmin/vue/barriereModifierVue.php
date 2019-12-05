<?php
session_start();
include_once('./modele/requeteBDD.php');
$Barriere=envoyerRequeteRecupererBarriere($_SESSION['idBarriere']);
list($barriereNom,$barriereId,$barriereType,$barriereIp,$parkingId)=$Barriere;
echo'<form action="controleur/ajouterBarriere.php" method="GET">
      <label>Entrée ou Sortie:</label>';
      if($barriereType[0]=="e") 
      {
        echo'<input type="radio" name="type" value="e" id="e" checked> <span for="e">E</span>
       <input type="radio" name="type" value="s" id="s"> <span for="s">S</span>
       <input type="radio" name="type" value="es" id="es"><span for="es">ES</span> </br>';
      } 
      else if($barriereType[0]=="es") 
      {
        echo'<input type="radio" name="type" value="e" id="e" > <span for="e">E</span>
       <input type="radio" name="type" value="s" id="s" > <span for="s">S</span>
       <input type="radio" name="type" value="es" id="es" checked><span for="es">ES</span> </br>';
      } 
      else if($barriereType[0]=="s") 
      {
        echo'<input type="radio" name="type" value="e" id="e" > <span for="e">E</span>
       <input type="radio" name="type" value="s" id="s" checked> <span for="s">S</span>
       <input type="radio" name="type" value="es" id="es"><span for="es">ES</span> </br>';
      }     
  echo'<label>Nom :</label>     <input type="text" name="nomB" id="nomB" value="'.$barriereNom[0].'"/></br>
    <label>Adresse IP</label> <input type="text" name="ip" id="ip" value="'.$barriereIp[0].'"/></br>
    <label>ID parking</label> <input type="text" name="idP" id="idP" value="'.$parkingId[0].'"/></br>
    <label> &nbsp; </label><input type="submit" name="modifierLaBarriere" value="Modifier" id="valider">
</form>'

?>