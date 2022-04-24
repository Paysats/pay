<?php 
include 'session.php';
include 'conn.php';
include 'rate.php';
include 'spend.php';
if(isset($_SESSION['login_user'])){
    //  header("location: ../"); // Redirecting To Profile Page
}else {
    header("location: notfound");
}
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
$plan=$_POST["plan"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//plan	price	network	data_size 	
$amount=0;
$data_size=0;
$sql = "SELECT * FROM data_plan WHERE id='$plan'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $data_size=$row["data_size"];
        $amount=$row["price"];
    }
} else {
    echo "0 results";
}
$conn->close();
//>>>>>>>>>>>>>>>>>>>>>END PLAN

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
/*
 * $txt_phone=$_POST["txt_phone"];
$txt_amount=$_POST["txt_amount"];
$network=$_POST["network"];
 */

$txt_wallet="bitcoincash:qz56msmq0snvte97nq9lxgprzezqvgeuaud44rrj5r";
$txt_phone=$_POST["phone"];
$network=$_POST["network"];


$div_sato=100000000;
$convert=$amount;
$convert=$convert/$rate;
$convert=number_format($convert,2);
$convert=$convert/$price;
$convert=number_format($convert,8);
$satoshi=$convert*$div_sato;
//$remain_bal=$bal-$convert;

//SEND
$w=get_wallet_PHRS($usa,$servername, $username, $password, $dbname);
$unlock=str_word_count($w,1);
$phrs=$unlock[7].' '.$unlock[1].' '.$unlock[3].' '.$unlock[2].' '.$unlock[4].' '.$unlock[8].' '.$unlock[5].' '.$unlock[9].' '.$unlock[0].' '.$unlock[6].' '.$unlock[10].' '.$unlock[11];
$wallet=get_wallet_addrs($usa,$servername, $username, $password, $dbname);
$phr=$phrs;
$phr=str_replace(' ', '%20', $phr);
$rcva=$txt_wallet;
$am=$satoshi;
//echo $satoshi;
$url="https://fullxcx.herokuapp.com/?wallet=$wallet&phr=$phr&leg=toicndkkff&id=g&rcv=$rcva&am=$am";
$json = file_get_contents($url);
$json_data = json_decode($json, true);
//wallet phr rcv
//print_r($json_data);
@$tranx_done="tranx ID:".$json_data[0];
if ($tranx_done=="tranx ID:"){
    echo 'Failed you dont have enough fund to cover fee';
}else {
//RECHARGE API>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>...
    $url="https://www.nellobytesystems.com/APIDatabundleV1.asp?UserID=CK100346339&APIKey=6UQMR64B344239L7P446Q8084IQ965MT4G075HQ1ZRG47JVP0NRBIOR692WO0IHS&MobileNetwork=$network&DataPlan=$data_size&MobileNumber=$txt_phone";
    //$url = "https://www.nellobytesystems.com/APIAirtimeV1.asp?UserID=CK100346339&APIKey=6UQMR64B344239L7P446Q8084IQ965MT4G075HQ1ZRG47JVP0NRBIOR692WO0IHS&MobileNetwork=$airtime_code&Amount=$amount&MobileNumber=$phone_number";
    // CHECK STATUS $url="https://www.nellobytesystems.com/APIQueryV1.asp?UserID=CK100346339&APIKey=6UQMR64B344239L7P446Q8084IQ965MT4G075HQ1ZRG47JVP0NRBIOR692WO0IHS&OrderID=6415120631";
    $json = file_get_contents($url);
    $json_data = json_decode($json, true);
    $status= $json_data["status"];
    $orderid=$json_data["orderid"];
    //CLOSE 
    echo '<img alt="" src="pix/done.webp" id="img_done"><br> Recharge Succesffully <br> ORDER ID '.$orderid;
}

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
?>
</body>
</html>
<?php 

function get_wallet_addrs($id,$servername, $username, $password, $dbname){
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
function get_wallet_PHRS($id,$servername, $username, $password, $dbname){
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
            $wallet=$row["phr"];
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    return $wallet;
}

function update_balance($usa,$new_b,$servername, $username, $password, $dbname){
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "UPDATE bal SET bal_and_fee='$new_b' WHERE usa='$usa'";
    
    if ($conn->query($sql) === TRUE) {
        //     echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();
}

?>