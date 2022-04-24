<?php include 'conn.php';
$network=$_POST["network"];
$network_code=$network;
if ($network=="01"){
    $network="mtn";
}else if($network=="02"){
    $network="glo";
}else if($network=="03"){
    $network="etisalat";
}else if($network=="04"){
    $network="airtel";
}
?>
<html>
<head>
  <script type="text/javascript" src="js/buy_data.js"></script>
</head>
<body>
<?php 
get_plan($network,$servername, $username, $password, $dbname);
?>
        <input type="number" class="slect" placeholder="Phone number" id="txt_phone_number">
    <input type="submit" value="Buy" class="slect" id="btn_buy">
    <form action="" method="post" id="frm_buy_data">
    <input type="hidden" name="network" value="<?php echo $network_code?>">
     <input type="hidden" name="phone" id="txt_phone">
      <input type="hidden" name="plan" id="txt_data_plan">
    </form>
</body>
</html>
<?php 
function get_plan($network,$servername, $username, $password, $dbname){
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM data_plan WHERE network='$network'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<select class="slect" id="slc_plan">
<option value="">--select data plan</option>
';
        while($row = $result->fetch_assoc()) {
            //id	plan	price	network 	
            echo '<option value="'.$row["id"].'">'.$row["plan"].'</option>';
        }
        echo '</select>';
    } else {
        echo "0 results";
    }
    $conn->close();
}
?>