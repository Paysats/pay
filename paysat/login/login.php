<?php 
session_start();
$username=$_POST["username"];
$pass=$_POST["pass"];
//echo   $sva_db;
// $passp=hash('sha512',$pass);
$user_hash=$username;
$pass=hash('sha512',$pass);
$conn = mysqli_connect("localhost", "root", "",   "pays");
// SQL query to fetch information of registerd users and finds user match.
//user_id
$query = "SELECT mail, pass from usa where mail=? AND pass=? LIMIT 1";
// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $user_hash, $pass);
$stmt->execute();
$stmt->bind_result($user_hash, $pass);
$stmt->store_result();
if($stmt->fetch()) //fetching the contents of the row
{ $_SESSION['login_user'] = $user_hash; // Initializing Session
echo "Login Successfully";
//  header("location: dashboard/"); // Redirecting To Profile Page
}
else
{ echo  "Username or Password is invalid";

}
mysqli_close($conn); // Closing Connection
?>