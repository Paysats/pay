<?php 
$path='qr_pix/';
$file=$path.uniqid().".png";
require_once 'qr/qrlib.php';
$text="asdd";
QRcode::png($text,$file);

?>