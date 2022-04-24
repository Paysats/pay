<?php 
// Create connection
include '../conn.php';
$mail=$_POST["mail"];
$otp=rand(1000,9999);
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO otp (mail,otp)
VALUES ('$mail', '$otp')";

if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
} else {
    update_otp($mail,$otp,$servername, $username, $password, $dbname);
}

$conn->close();

function update_otp($mail,$otp,$servername, $username, $password, $dbname){
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "UPDATE otp SET otp='$otp' WHERE mail='$mail'";
    
    if ($conn->query($sql) === TRUE) {
      //  echo "Record updated successfully";
    } else {
      //  echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();
}
?>