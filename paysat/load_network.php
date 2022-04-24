<?php //load_network.php
$serivce=$_POST["serivce"];

?>
<html>
<head>
<script type="text/javascript" src="js/data_plan.js"></script>
  <script type="text/javascript" src="js/noti.js"></script>
</head>
<body>

<?php 
//01 for MTN

//02 for Glo

//03 for Etisalat

//04 for Airtel
if ($serivce=="Airtime"){
    ?>
<form action="" method="post" id="frm_buy_airtime">


<select class="slect" id="slct_network" name="network">
<option value="">--select network</option>
<option value="04">Airtel NG</option>
<option value="03">Etisalat NG</option>
<option value="02">Glo NG</option>
<option value="01">MTN NG</option>
</select>

    <input type="number" class="slect" placeholder="Amount from 50 NGN to 10,000 NGN" id="txt_amount"  name="txt_amount">
        <input type="number" class="slect" placeholder="Phone number" id="txt_phone_no"  name="txt_phone">
    <input type="submit" value="Buy" class="slect" id="btn_buy">


</form>
    <?php // txt_phone txt_amount network
}else{
    ?>
<select class="slect" id="slect_network">
<option>--select network</option>
<option value="04">Airtel NG</option>
<option value="03">Etisalat NG</option>
<option value="02">Glo NG</option>
<option value="01">MTN NG</option>
</select>    
    <div id="div_return_data_plan">
    
    </div>
    <?php 
    
}
?>
<form action="" method="post" id="frm_load_data">
<input type="hidden" id="netwwork" name="network">
</form>
</body>
</html>