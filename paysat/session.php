<?php
//include 'hold.php';
//seeaan mode
session_start();
if (isset($_SESSION['login_user'])){
$conn = mysqli_connect("localhost", "root", "",   "pays");
//Starting Session // Storing Session

$user_check = $_SESSION['login_user'];
//usaname 	pass 	full_name 	mobile 	mail 	addrss 	city 	state 	nationality
//mail 	pass 	id 	
$query = "SELECT * from usa where mail = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$usa = $row['id'];


//$hold_pass=$row['pass'];
//$admin_type=$row['admin_type'];
//user_id 	pass 	user_type 	full_name 
//echo $user_check;

}
?>