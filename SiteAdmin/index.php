
<html>

<head>
	<meta charset="UTF-8">
	<script src="vue/creerStatistique.js" type="text/javascript"></script> 
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<style type="text/css">
html, body{height: 100%;}
	 body
	 {
	 	background-image: radial-gradient(circle at center right,white, #509E8E, #05444D);
		
	 }
	 #BOX
	{
	 	width: 80%;
	    display: block;
		overflow: auto;
	    background-color: #F7F7F7 ;
		box-shadow: 0px 0px 40px 16px rgba(0,0,0,0.22);
	    position:relative; 
	    margin:auto;
	    margin-top: 3%;



   	}
   	#HEAD
   	{
   		background-color: #474A59;
   		height: 50px;
   	}

		 label
		 {
		 	display: block;
			width: 150px;
			float: left;
      		font-size: 17px;
     		
		 }
		 
		 input, select
		 {
		 	width: 200px;
		 	padding-top: 10px;
		 	color:#595959;
		 	margin-bottom: 5px;
		 	text-align: center;
    	  font-size: 15px;
		 }

		 #CONTENU
		 {
		 	position: relative;
		 	height: 100%;
  			width: 100%;
    		color: #474A59;
    		text-align: center;
    		 /*margin: auto auto 5px 300px; */

		 }
		 #ajouterB #e,#s,#es
		 {

		 	width: auto ;
		 	margin-bottom: 20px;
		 	


			/*float: left;*/
		 }
		 #ajouterB span
		 {
		 	margin-right: 20px;
		 	
		 }
		 #ajouterB, #ajouterP
		 {
  		  margin: 0 auto; 
  		  width:50%;
		 }
		 #graphe
		 {
		 	margin: 2%;
		 	width: 100%;
		 }
		 #graphe img
		 {

		 	 width: 85%;
		 	 height: 80%;
		 }

.texte {

  		 color:#509E8E;
		 font-size: 3em;
}

   	ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
   text-align:center;
 /* background-color: #333;*/
 
}

li {
 /* float: left;*/
  display: inline-block;
}

li a {
  display: block;
  color: white;
  font-size: 20px;
  text-align: center;
  padding: 13px 50px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
a.active { background-color:#509E8E; }
</style>

</head>

<body>
	<div id="BOX">
		<div id="HEAD">
			<ul>
			  	<li><a id='barriereVue' href="index.php?page=barriereVue">Barrière</a></li>
			 	<li><a id='parkingVue'href="index.php?page=parkingVue">Parking</a></li>
			  	<li><a id='statistiqueVue'href="index.php?page=statistiqueVue">Statistiques</a></li>
			</ul>
		</div>
		<div id="CONTENU">
			<?php
				if(isset($_GET['page'])) 
				{	include("vue/".$_GET['page'].".php");
				echo"<script>	 
	var element, name, arr;
  element = document.getElementById('".$_GET['page']."');
  name = 'active';
  arr = element.className.split(' ');
  if (arr.indexOf(name) == -1) {
    element.className += ' ' + name;
  }
</script>";
}

			?>
		
		</div>
	</div>
</body>

</html>