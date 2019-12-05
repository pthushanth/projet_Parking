<?php
include_once("phpqrcode/qrlib.php");

/*
$bytes = openssl_random_pseudo_bytes(4 , $cstrong);
$hex   = bin2hex($bytes);
*/
//creerQRcode("111111");
function creerQRcode($data)
{
 
QRcode::png($data,"qrcode.png");

 

}

?>