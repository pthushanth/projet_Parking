<?php
$conn = mysqli_connect("localhost","root","","parking");
// Vérification de la connexion 
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$req="UPDATE rfid SET utilise=0 WHERE utilise=1";
if (mysqli_query($conn, $req)) echo "Bien enregistré dans la table RFID";

$req2="DELETE FROM autorisation WHERE rfid IS NOT NULL";
if (mysqli_query($conn, $req2)) echo "Les abonnées sont bien supprimés de la table autorisation";

?>