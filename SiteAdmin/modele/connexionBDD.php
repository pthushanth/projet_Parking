
<?php

$conn = mysqli_connect( "localhost" , "root" , "" , "parking" );
// Vérification de la connexion 
if (!$conn)
  {
 	 echo "Echec de la connexion: " . mysqli_connect_error();
  }

?>

