<?php 
//include 'session.php';
include 'conn.php';
$bal=0;
$spend=0;
$fee=0;
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
        $bal=  $row["bal"];
        $all_spend=$row["bal_and_fee"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>