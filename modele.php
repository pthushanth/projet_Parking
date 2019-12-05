<?php

	function ExecuterRequete($conn,$req)
	{
		$res=mysqli_query($conn,$req) or die("erreur");
		return $res;
	}
	function creerFichierXML($data)
	{
		$xml="<xml version='1.0' encoding='UTF_8'>";
		while ($rep=mysqli_fetch_assoc($data)) 
		{
			foreach ($rep as $c => $v)
			{
				$xml.="<$c>".$v."</$c>";
			}

   		 }
		$xml.="</xml>";
		return $xml;
	}
	
?>