<?php 
include 'session.php';
include 'conn.php';
if(isset($_SESSION['login_user'])){
    //  header("location: ../"); // Redirecting To Profile Page
    $wallet="bitcoincash:qz9vydhwjqghp6atd3e59pp4ft5uwmw8xg8mwch2zu";
    $phr="tip steel honey crunch mixture object pupil sock enjoy mushroom december film";
    
    $phr=str_replace(' ', '%20', $phr);
    $rcva="bitcoincash:qr0s44q3pauaj3u0y0h8ptc9725dtyg76ygfdne2c2";
    $am=1000;
    $url="http://localhost:3101/?wallet=$wallet&phr=$phr&leg=toicndkkff&id=g&rcv=$rcva&am=$am";
    $json = file_get_contents($url);
    $json_data = json_decode($json, true);
    //wallet phr rcv
    //print_r($json_data);
    echo "tranx".$json_data[0];
}else {
  echo "error code 403";
}

?>
