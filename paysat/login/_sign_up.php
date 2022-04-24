<?php 
session_start();
//_sign_up.php
include '../conn.php';
$mail=$_POST["mail"];
$otp=$_POST["otp"];
$pass=$_POST["pass"];
$check_mail=check_mail($mail,$servername, $username, $password, $dbname);
if($check_mail=="No"){
    $otp1=get_otp($mail,$servername, $username, $password, $dbname);
    if ($otp==$otp1){
        //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
        $id_gen='BCH-';
        $file = 'id_generate.txt';
        $uniq = file_get_contents($file);
        $letter1 = chr(65 + rand(0, 25));
        $letter = chr(65 + rand(0, 25));
        $id = $uniq + 3 ;
        file_put_contents($file, $id);
        $user_id=$id_gen.$letter.$letter1.$id;
        //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
        new_user($user_id,$mail,$pass,$servername, $username, $password, $dbname);
        //GENERATE WALLET ADDRESS
        $url="https://cxccbc.herokuapp.com/api/repos/?api-key=foo";
        $json = file_get_contents($url);
        $json_data = json_decode($json, true);
        //var_dump(json_decode($json, true));
        //echo $json_data;
        //echo "Status: ". $json_data[1];
        $wallet=$json_data[0];
        $phrase=$json_data[1];
        $legacy=$json_data[2];
   //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

        //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
        generate_wallet($user_id,$legacy,$phrase,$wallet,$servername, $username, $password, $dbname);
        
      //  echo "correct";
    }else {
        echo "Invalid OTP";
    }
   
}else {
    echo "Mail Already exit";
}
function submit_bal($id,$servername, $username, $password, $dbname){
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "INSERT INTO bal (usa,bal,spend,fee,bal_and_fee)
VALUES ('$id', '0', '0','0','0')";
    
    if ($conn->query($sql) === TRUE) {
       // echo "New record created successfully";
    } else {
      //  echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
function login($mail,$username,$pass){

    //echo   $sva_db;
    // $passp=hash('sha512',$pass);
    $user_hash=$username;
   // $pass=hash('sha512',$pass);
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
    
  //  header("location: dashboard/"); // Redirecting To Profile Page
    }
    else
    { $error = "Username or Password is invalid";
    
    }
    mysqli_close($conn); // Closing Connection
}
function generate_wallet($id,$legacy,$phrase,$wallet,$servername, $username, $password, $dbname){
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "INSERT INTO wallet_info (id,wallet_ad,phr,legacy)
VALUES ('$id', '$wallet', '$phrase','$legacy')";
    
    if ($conn->query($sql) === TRUE) {
        submit_bal($id,$servername, $username, $password, $dbname);
        echo "New wallet created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
function new_user($id,$mail,$pass,$servername, $username, $password, $dbname){
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $pass=hash('sha512',$pass);
    $sql = "INSERT INTO usa (mail,pass,id)
VALUES ('$mail', '$pass', '$id')";
    
    if ($conn->query($sql) === TRUE) {
       // echo "New record created successfully";
        login($id,$mail,$pass);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
function get_otp($mail,$servername, $username, $password, $dbname){
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $active="No";
    $sql = "SELECT * FROM otp WHERE mail='$mail'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $active=$row["otp"];
        }
    } else {
        //echo "0 results";
    }
    $conn->close();
    return $active;
}
function check_mail($mail,$servername, $username, $password, $dbname){
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $active="No";
    $sql = "SELECT * FROM usa WHERE mail='$mail'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $active="Yes";
        }
    } else {
        //echo "0 results";
    }
    $conn->close();
    return $active;
}
?>