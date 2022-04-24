<?php 
include 'session.php';
include 'conn.php';
if(isset($_SESSION['login_user'])){
    //  header("location: ../"); // Redirecting To Profile Page
}else {
    header("location: login/");
}
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
$wallet=get_wallet_address($usa,$servername, $username, $password, $dbname);
$url="https://get-balannce.herokuapp.com/?id=$wallet&name=rfvvvv";
$json = file_get_contents($url);
$json_data = json_decode($json, true);
//var_dump(json_decode($json, true));
$current_b=$json_data ["balance"]["confirmed"]+$json_data ["balance"]["unconfirmed"];
$my_balance=0;
$all_spend=0;
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM bal WHERE usa='$usa'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // usa 	bal 	spend 	fee 	bal_and_fee
    while($row = $result->fetch_assoc()) {
        $my_balance=  $row["bal"];
        $all_spend=$row["bal_and_fee"];
    }
} else {
      echo "0 results";
}
$conn->close();
$new_balance=$current_b-$all_spend;
update_balance($usa,$current_b,$servername, $username, $password, $dbname);
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

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

function update_balance($usa,$new_b,$servername, $username, $password, $dbname){
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "UPDATE bal SET bal='$new_b' WHERE usa='$usa'";
    
    if ($conn->query($sql) === TRUE) {
        //     echo "Record updated successfully";
    } else {
       echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();
}
?>