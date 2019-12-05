 <?php
 	session_start();
 	echo $_SESSION['ListeAnnee'];
 	//var_dump($_SESSION['ListeAnnee']);
	 header('../index.php?page=statistiqueVue');
 ?>