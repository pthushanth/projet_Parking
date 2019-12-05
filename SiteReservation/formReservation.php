<?php
session_start(); 
include_once('testQrcode.php');
include_once('facturePDF.php');
include('connexionBDD.php');

if(isset($_GET["reserver"]))
{
	$nom=htmlspecialchars($_GET["nom"]);	
	$type=htmlspecialchars($_GET["type"]);
  $debutD=htmlspecialchars($_GET["debutD"]);
  $finD=htmlspecialchars($_GET["finD"]);

	
	//Génère une chaîne de caractères pseudo-aléatoire de 4 octets
	$bytes = openssl_random_pseudo_bytes(4, $cstrong);
	//convertir binaire en hexa
    $hex   = bin2hex($bytes);

    $hex = substr($hex, 1);  // supprimer premiere valeur ($hex contiendra 28bits (7 caracteres)) 
    $requete=NULL;
    $message=NULL;
    $rfid=NULL;
    $qrcode=NULL;
    $tabRfid=array();
    $numero=NULL;

    if($_GET['type']=="abonner")
    {
      $req="SELECT * FROM rfid WHERE utilise=0";
      $res=mysqli_query($conn, $req);
      if (mysqli_num_rows($res) > 0)
      {
        while($ligne = mysqli_fetch_array($res))
        {
          $tabRfid[]=$ligne['rfid'];
        }
      }

      //$rfid=rand(8,15);    // le rfid commence  par 1,2,3,4,5,6 ou 7
    	//$rfid=$rfid.$hex;   

      $numero=rand(0,count($tabRfid)-1);
      $rfid=$tabRfid[$numero];
    /*  var_dump($tabRfid);
      var_dump($numero);
     */ var_dump($rfid);

		  $requete="INSERT INTO autorisation (type,rfid,debut,fin,nom) VALUES ('".$type."','".$rfid."','".$debutD."','".$finD."','".$nom."')";
      $requete2="UPDATE rfid SET utilise=1 WHERE rfid='".$rfid."'";
	
	}
	 if($_GET['type']=="journalier")
    {
  
		  $qrcode=dechex( rand(0,7) );
    	$qrcode=strtoupper($qrcode.$hex);
		  $requete="INSERT INTO autorisation (type,qrcode,debut,fin,nom) VALUES ('".$type."','".$qrcode."','".$debutD."','".$finD."','".$nom."')";
	}

	if (mysqli_query($conn, $requete))
	{
    	//echo "Bien enregistré dans la BDD";
    	if (mysqli_query($conn, $requete2))
    {
   	if($type=="abonner")
   		{


      // Create Image From Existing File
     $img = imagecreatefromjpeg('carteRfid.jpg');

      // Allocate A Color For The Text
      $blanc = imagecolorallocate($img, 255, 255, 255);
      $noir = imagecolorallocate($img, 0, 0, 0);


      // Set Path to Font File
      $font = "C:\Windows\Fonts\arial.ttf"; 

      // Set Text to Be Printed On Image
      $txt = $rfid;
      $txt1= "Nom : ".$nom;
      // Print Text On Image
     imagettftext($img, 24, 0, 85, 265, $blanc, $font, $txt);
     imagettftext($img, 18, 0, 45, 300, $noir, $font, $txt1);

     // OUTPUT IMAGE
     // header('Content-type: image/jpeg');
        // Send Image to Browser
      imagejpeg($img,"test.jpg",100);
      imagedestroy($img);
  
   			//echo 'Votre identifiant RFID est : <h1 color="red">'.$rfid.'</h1>';


//echo' <h3> Votre Carte RFID </h3><img src="test.jpg"/>';
    $_SESSION['qrcode']="afficher";
header('location:index.php');

   		}
    }
   	if($type=="journalier") 
   		{
   			creerQRcode($qrcode);
   			echo '<img src="qrcode.png" alt=""/>';
   			$imgQrcode="qrcode.png";
   			$debut=$debutD;
   			$fin=$finD;
   			creerFacture($nom,$debut,$fin,$imgQrcode);
   		}
	}
	else 
	{
    	echo "Error: " . mysqli_error($conn);
	}
}
?>