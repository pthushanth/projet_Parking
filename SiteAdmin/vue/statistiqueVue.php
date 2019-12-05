<?php
session_start();

include("statistiqueListeAnneeVue.php");
include_once ("./modele/requeteBDD.php");
?>

<style>
	#listeAnnee{visibility: hidden;}
</style>
<form action="controleur/statistique.php" method="GET" id="formStats" >
	<span>Nombre de visiteur par</span>	
	<select name="intervalle" id="intervalleID" onchange="afficherListeAnnee()">
		  <option value="jour">jour</option>
		 <!--<option value="semaine">semaine</option> -->
		  <option value="mois">mois</option>
		  <option value="annee">annee</option>
		</select>
		<div id="listeAnnee">
			<?php
				//include("statistiqueAfficherListeAnneeVue.php");
				echo listeDeroulanteAnnee( envoyerRequeteStatistiqueAnnee());
			?>
		</div>
		<input type="submit" name="statistique" value="Valider" id="valider">
</form>
<!-- ?rand=<?php rand()?>      vider le cache navigateur d'une image--> 
<!--<div id="graphe"><img src="public/images/imgGraphe.jpg?rand=<?php echo rand(); ?>"></div> -->


<div>
<canvas id="myChart"> </canvas>
</div>

<script>
	var date =<?php echo json_encode($_SESSION['date']); ?>;
	var nbVisiteur =<?php echo json_encode($_SESSION['tabNbVisiteur']); ?>;
	var intervalle=<?php echo json_encode($_SESSION['intervalle']); ?>;
	console.log(date);
	/*console.log(nbVisiteur);*/

	creerStatistique(date,nbVisiteur,intervalle);

	function afficherListeAnnee()
{
			//alert("hello");
		if(document.getElementById("intervalleID").value=="mois")
			{
			document.getElementById("listeAnnee").style.visibility = "visible";
			}
		else document.getElementById("listeAnnee").style.visibility = "hidden";
}





	/*	function ajouterInput()
		{
			if(document.getElementById("intervalle").value=="mois")
			{
				  var x = document.createElement("input");
  					  x.setAttribute("type", "text");
  					  x.setAttribute("name", "annee");
  					  x.setAttribute("value", "");
  					document.getElementById("formStats").appendChild(x);
				
			}
		}*/

		/*		function ajouterInput()
		{
			if(document.getElementById("intervalle").value=="mois")
			{
				alert("hello");
				  var select = document.createElement("select");
  					  select.setAttribute("name", "annee");
  					  select.setAttribute("id", "annee");
  				  document.getElementById("formStats").appendChild(select);

				  var sel= document.getElementById("annee");
					// create new option element
					var opt = document.createElement('option');

					// create text node to add to option element (opt)
					opt.appendChild( document.createTextNode('2005') );

					// set value property of opt
					opt.value = '2005'; 

					// add opt to end of select box (sel)
					sel.appendChild(opt); 

				
			}
		}*/
</script>












