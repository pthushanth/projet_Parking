 <?php
 session_start();
 include_once ("../modele/requeteBDD.php");
 include("statGraphe.php");

if(isset($_GET["statistique"]))
{
	$annee=NULL;
	$intervalle=$_GET["intervalle"];
	if($intervalle=="mois") $annee=$_GET["annee"];
 	list($tabNbVisiteur,$date) = envoyerRequeteStatistique($intervalle,$annee);
	// creerGrapheStatistique($tabNbVisiteur,$date,$intervalle);
	//var_dump($tabNbVisiteur);
?>
<script>/* var date =<?php echo json_encode($date); ?> ; console.log(date);*/</script>;
<script> /*var nbVisiteur =<?php echo json_encode($tabNbVisiteur); ?> */</script>;
<script>// ajouterDonnees(Chart,date,$tabNbVisiteur);
	// creerStatistique(date,nbVisiteur);
	 //ajouterDonnees(Chart,date,$tabNbVisiteur);

</script>;
<?php
	 $_SESSION['date']=$date;
	 $_SESSION['tabNbVisiteur']=$tabNbVisiteur;
	 $_SESSION['intervalle']=$intervalle;

header("location:../index.php?page=statistiqueVue");

 }

 ?>