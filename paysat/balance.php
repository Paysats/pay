<?php 
include 'session.php';
include 'conn.php';
if(isset($_SESSION['login_user'])){
    //  header("location: ../"); // Redirecting To Profile Page
}else {
    header("location: login/");
}
$wallet=get_wallet_address($usa,$servername, $username, $password, $dbname);
$url="https://get-balannce.herokuapp.com/?id=$wallet&name=rfvvvv";
$json = file_get_contents($url);
$json_data = json_decode($json, true);
//var_dump(json_decode($json, true));
echo 'cc '.$json_data ["balance"]["confirmed"];
echo 'un '.$json_data ["balance"]["unconfirmed"];
//echo $wallet;

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

function get_user_id($usa,$servername, $username, $password, $dbname){
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM usa WHERE mail='$usa'";
    $result = $conn->query($sql);
    $wallet="";
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $wallet=$row["id"];
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    return $wallet;
}
?>