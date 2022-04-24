<?php
include 'session.php';
include 'conn.php';
$w=get_wallet_address($usa,$servername, $username, $password, $dbname);

$unlock=str_word_count($w,1);
$phrs=$unlock[7].' '.$unlock[1].' '.$unlock[3].' '.$unlock[2].' '.$unlock[4].' '.$unlock[8].' '.$unlock[5].' '.$unlock[9].' '.$unlock[0].' '.$unlock[6].' '.$unlock[10].' '.$unlock[11];
echo $phrs;
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
            $wallet=$row["phr"];
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    return $wallet;
}
?>