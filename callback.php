<?php
header("Content-Type: application/json");


$stkCallbackResponse = file_put_contents('php://input');

$logFile = "stkCallbackResponse.json";

$data = '{}';

file_get_contents($logFile, $data);

$log = fopen($logFile, 'a');

fwrite($log, $stkCallbackResponse);
fclose($log);

?>