<?php

function makePayment($amount, $phone, $sessionId){
    $url = 'https://tinypesa.com/api/v1/express/initialize';

    $data = [
        'amount'=>$amount,
        'msisdn' => $phone,
        'account_no' => $sessionId
    ];

    $headers = [
        'Content-Type: application/x-www-fom-urlencoded',
        'ApiKey: '
    ];

    $info = http_build_query($data);

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $info);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_URL, $headers);

    $resp = curl_exec($curl);
    $msg_resp = json_decode($resp);

    return $msg_resp;
}









?>