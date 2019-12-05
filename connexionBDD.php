<?php

$conn = mysqli_connect("localhost","root","","parking");
// Vérification de la connexion 
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>