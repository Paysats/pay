<?php 
include 'session.php';
include 'conn.php';
if(isset($_SESSION['login_user'])){
    //  header("location: ../"); // Redirecting To Profile Page
}else {
    header("location: login/");
}

$wallet=get_wallet_address($usa,$servername, $username, $password, $dbname);
$path='qr_pix/';
$file=$path.$usa.".png";
require_once 'qr/qrlib.php';
$barcode="asdd";
QRcode::png($wallet,$file);

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/index.css" type="text/css">
  <link rel="stylesheet" href="css/process.css" type="text/css">
    <script type="text/javascript" src="js/lab.js"></script>
   <script type="text/javascript" src="js/home.js"></script>
 
<style type="text/css">
#div_processing{
display: block;
}
</style>
</head>
<body>
<div id="div_body">

<div id="div_barcode">
<img alt="" src="qr_pix/<?php echo $usa.'.png'?>" id="barcode">
<div id="copy_parent">
<input type="text" value="<?php echo $wallet?>" id="txt_wallet">
<div id="sp_copy">COPY</div>
</div>
Deposit
</div>

</div>
<div id="div_meno">
<img alt="" src="pix/buy.png" class="menu_icon" id="btn_services">
<img alt="" src="pix/send.png" class="menu_icon" id="btn_send">
<img alt="" src="pix/rcv.png" class="menu_icon" id="btn_dep">
</div>
<div id="div_processing">
<div id="div_pro_posi">
<div class="loader"></div>

</div>
Please wait
</div>

<div id="noti">
success
</div>

</body>
</html>
<?php 

function get_wallet_address($id,$servername, $username, $password, $dbname){
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM wallet_info WHERE id='$id'";
    $result = $conn->query($sql);
    $wallet="";
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $wallet=$row["wallet_ad"];
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    return $wallet;
}
?>