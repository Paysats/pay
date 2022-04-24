<?php
$path='qr_pix/';
$file=$path.uniqid().".png";
require_once 'qr/qrlib.php';
$text=$_POST["qr"];
QRcode::png($text,$file);

echo $file;
?>