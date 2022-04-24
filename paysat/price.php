<?php 
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.coinranking.com/v2/coins",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "x-access-token: your-api-key"
    ),
));

$response = curl_exec($curl);
curl_close($curl);
$coin_info=json_decode($response,true);
$price=0;
$c=0;
foreach ($coin_info["data"]["coins"] as $key => $value) {
    //>>>>>>>>>>>>>>>>>>>>>>>
    foreach ($coin_info["data"]["coins"][$c] as $key => $value) {
        if ($value=="BCH"){
        //    echo $key . ', ' . $value . "<br>";
            
            // echo '<<<<<<<<<<<<<XXXXXXXXXXX<<<<<<<<<<<<<';
            $price= number_format($coin_info["data"]["coins"][$c]["price"],2);
            
        } 
    }
    $c++;

}

echo "pr:>>>".$price;
