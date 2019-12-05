<?php

  $fn = fopen("listeBadge.txt","r");
  $listeBadge=array();
  while(! feof($fn))  {
	$listeBadge[] = fgets($fn);
	
  }

  fclose($fn);
  var_dump($listeBadge);


$conn = mysqli_connect("localhost","root","","parking");
// Vérification de la connexion 
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$req = array(); 
for($i=1;$i<count($listeBadge)-1;$i++)
{
	$listeBadge[$i]=trim(preg_replace('/\s+/', ' ', $listeBadge[$i]));
	 $listeBadge[$i]="('".$listeBadge[$i]."',0)";

	
}
unset($listeBadge[0]);
$values  = implode(", ", $listeBadge);
$values= substr($values,0,-2);
$values=$values.";";
$req = "INSERT INTO rfid (rfid,utilise) VALUES$values";
echo $req;
mysqli_query($conn,$req);


/*
foreach( $listeBadge as $ligne ) {
    $req[] = '("'.mysqli_real_escape_string($conn,$ligne).'",)';
}
var_dump($req);
//mysqli_query('INSERT INTO rfid (rfid) VALUES '.implode(',', $req))
/*
$req="INSERT INTO rfid (rfid) VALUES ('".$listeBadge[$i]."')";
	if (mysqli_query($conn, $req)) echo"Bien enregistré dans la BDD";
	else $msg="Error: " . mysqli_error($conn);
*/
?>