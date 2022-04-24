<?php 
include 'conn.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$rate=0;
$feee=0;
$sql = "SELECT * FROM price";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    //usdt_to_naira 	fee 	
    while($row = $result->fetch_assoc()) {
        $rate=$row["usdt_to_naira"];
        $feee=$row["fee"];
    }
} else {
 //   echo "0 results";
}
$conn->close();
?>