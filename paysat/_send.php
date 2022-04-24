<?php 
include 'session.php';
include 'conn.php';
include 'rate.php';
if(isset($_SESSION['login_user'])){
    //  header("location: ../"); // Redirecting To Profile Page
}else {
    header("location: notfound");
}
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.coinranking.com/v2/coins",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "x-access-token: your-api-key"
    ),
));

$response = curl_exec($curl);
curl_close($curl);
$coin_info=json_decode($response,true);
$price=0;
$c=0;
foreach ($coin_info["data"]["coins"] as $key => $value) {
    //>>>>>>>>>>>>>>>>>>>>>>>
    foreach ($coin_info["data"]["coins"][$c] as $key => $value) {
        if ($value=="BCH"){
            //    echo $key . ', ' . $value . "<br>";
            
            // echo '<<<<<<<<<<<<<XXXXXXXXXXX<<<<<<<<<<<<<';
            $price= number_format($coin_info["data"]["coins"][$c]["price"],2);
            
        }
    }
    $c++;
    
}

// FETCH BALANCE>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
$div_sato=100000000;
$ngn_per_dolar=$rate;
$my_stoshi= get_current_balance($usa,$servername, $username, $password, $dbname);
$usd=0;
$converted_sa=0;
$converted_sa=number_format($my_stoshi/$div_sato,8);
$usd=$converted_sa*$price;
//echo $usd;
$ngn=$usd*$ngn_per_dolar;
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/send.css" type="text/css">
    <script type="text/javascript" src="js/lab.js"></script>
   <script type="text/javascript" src="js/send.js"></script>

</head>
<body>
<div id="send_nody">


<div id="div_balance">
<span id="sp_bal"><?php echo '&#8358;'.number_format($ngn,2);?></span>
<span ><?php echo '<br><span id="bch_sp">BCH </span>'.number_format($converted_sa,8) ?></span>
</div>

<div id="div_wallet_addrss">
<span id="sp_bch_title">Send BCH</span>
<form action="" method="post" id="frm_send_sato">
<textarea rows="" cols="" placeholder="past your wallet address here" id="txt_wallet" name="txt_wallet"></textarea>
<input type="hidden" name="fee" value="<?php echo $feee?>">
<input type="hidden" name="rate" value="<?php echo $price?>">
<input type="number" placeholder="Amount in Naira" id="bch_qty" name="amount">
</form>
<div id="div_confirm">
<img alt="" src="pix/pen.png" id="edit_de">
<div id="con_tit">Comfirm Transaction</div>
<span> To wallet Address</span><br>
<div class="confirm_address" id="div_confrm_wallet-adr">djked edkjed edjk</div>
<span>Amount in naira</span><br>
<div class="confirm_address" id="confirm_am_in_naira">555</div>
<span>Fee</span><br>
<div class="confirm_address">NGN <?php echo $feee?></div>
<span>The will receive</span><br>
<div class="confirm_address" id="rcv">NGN <?php echo $feee?></div>

<input type="submit" value="Comfirm" id="btn_send_bch_confirm">
</div>
<?php 
if ($ngn<60){
    echo 'no enough blance. menimum is 60 Naira
<input type="submit" value="Send" id="btn_send_bch_silver">';
}else {
    echo '<input type="submit" value="Send" id="btn_send_bch">';
}
?>


</div>
</div>
<input type="hidden" id="id_fee" value="<?php echo $feee?>">
<input type="hidden" id="txt_hold_balance" value="<?php echo number_format($ngn,2);?>">
</body>
</html>
<?php 
function get_current_balance($usa,$servername, $username, $password, $dbname){
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM bal WHERE usa='$usa'";
    $result = $conn->query($sql);
    $my_bal=0;
    if ($result->num_rows > 0) {
        // usa 	bal 	spend 	fee 	bal_and_fee
        while($row = $result->fetch_assoc()) {
            $my_bal=  $row["bal"];

        }
    } else {
       // echo "0 results";
    }
    $conn->close();
    return $my_bal;
}
function get_satoshi($id,$servername, $username, $password, $dbname){
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT id, firstname, lastname FROM MyGuests";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
}
?>