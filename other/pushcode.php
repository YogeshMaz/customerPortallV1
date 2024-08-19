<?php

function createRecord(){

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
   

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://creator.zoho.in/api/v2.1/arun.ramu_machinemaze/machinemaze-project-management/form/Trigger_user_data',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "data": {
        "Name": {
            "prefix": "Mr",
            "last_name": "Ponding",
            "suffix": "",
            "first_name": "Ricky",
        },
        "Email": "ricky@gmail.com",
        "Enter_Password": "abc123"
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Zoho-oauthtoken 1000.6a1264c06833e75032208b1c2f745959.7c8906860cc6f41619c614450c176771',
    'Content-Type: application/json',
    'Cookie: ZCNEWLIVEUI=true; _zcsr_tmp=b451eca6-6321-4a12-b81e-b9d87897881f; f8176abf63=ac0bf5971029d5628fd013d3a9099af0; zccpn=b451eca6-6321-4a12-b81e-b9d87897881f'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

    }
}

?>