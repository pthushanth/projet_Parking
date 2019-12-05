<?php


//if(isset($_GET['reserver']))
 function creerFacture($nom,$debut,$fin,$imgQrcode="",$rfid="")
{
	// Inclure fdpf
	require('FPDF/fpdf.php'); 
	$buffer = ob_get_clean(); 

	$date = date("d-m-Y");
	$heure = date("H:i");
	$dateHeure=$date."   ".$heure;
	$montant="";
	$dateDebut = new DateTime($debut);
	$dateFin = new DateTime($fin);
	$duree = $dateFin->diff($dateDebut);
	$dureeH=ceil($duree->days*24 + $duree->h +$duree->i/60);

include('connexionBDD.php');
	$requete="SELECT * FROM tarifs ";
	$resultat=mysqli_query($conn, $requete);
	if(mysqli_num_rows($resultat) > 0) 
	{
		while($row = mysqli_fetch_array($resultat))
		{
			$tarif=$row['tarif'];
		}
	}

	$montant=$dureeH*$tarif;

// Création d’un nouveau PDF 
$pdf = new FPDF(); 

// Création d’une page 
$pdf->AddPage(); 
$height=$pdf -> GetPageHeight();
$width=$pdf -> GetPageWidth();
// Définition de la police 
$pdf->SetFont('Arial','',13); 

 $x = $pdf->getX();
 $y = $pdf->getY();

 $pdf->Image('logo.jpg',10,7.5,30);
 $pdf->setX($x);
 $pdf->setX($y+40);
 $pdf->Cell(0,10, $dateHeure,0,1); 
 $pdf->setX($x+10);
 $pdf->setX($y+40);
 $pdf->Cell(0,10, "Tarif : ".$tarif." ".chr(128)."/h",0,1); 
 $pdf->setX($x+10);
 $pdf->setX($y+40);
 $pdf->Cell(0,10, utf8_decode("Durée : ").$dureeH." heures",0,1); 
 $pdf->setX($x+10);
 $pdf->setX($y+40);
 $pdf->Cell(0,10, "Montant : ".$montant." euros",0,1); 
 $pdf->setX($x+10);
 $pdf->setX($y+40);
 $pdf->SetFont('Arial','U',13); 
 $pdf->Cell(0,10, utf8_decode("Ticket client à conserver"),0,1); 
 $pdf->setX($x+10);
 $pdf->setX($y+40);
 $pdf->SetFont('Arial','',13); 
 $pdf->Cell(0,10, "Nom : ".strtoupper($nom),0,1); 
 $pdf->setX($x+10);
 $pdf->setX($y+40);
 $pdf->Cell(0,10, utf8_decode("Date début : ").$debut,0,1); 
 $pdf->setX($x+10);
 $pdf->setX($y+40);
 $pdf->Cell(0,10, "Date fin : ".$fin,0,1); 
 $pdf->setX($x+10);
 $pdf->setX($y+40);
 $pdf->Image($imgQrcode,10,40,30);

// Sortie du PDF  
$pdf->Output();  

}
?> 
