<?php
// $ composer require africastalking/africastalking
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON What would you want to check \n";
    $response .= "1. My Account \n";
    $response .= "2. Choose destination";

} else if ($text == "1") {
    // Business logic for first level response
    $response = "CON Choose account information you want to view \n";
    $response .= "1. Account number \n";

} else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response = "END Your phone number is ".$phoneNumber;

} else if($text == "1*1") { 
    // This is a second level response where the user selected 1 in the first instance
    $accountNumber  = "ACC1001";

    // This is a terminal request. Note how we start the response with END
    $response = "END Your account number is ".$accountNumber;

}else if($text == "2*1") { 
    // This is a second level response where the user selected 2 in the first instance 
    $destinations = [
         'Allsoaps' => 120,
         'TRM' => 100,
         'GCM' => 80,
         'GSU' => 60,
         'KCA' => 40,
         'Muthaiga' => 20
         
    ];
    $response = "CON your destination \n";
    
    $response .= "1. Allsoaps $destinations['TRM'] ";
    $response .= "2. Thika road mall $destinations['TRM']";
    $response .= "3. Garden City Mall $destinations['TRM']";
    $response .= "4. General Service Unit $destinations['TRM']";
    $response .= "5. KCA $destinations['KCA']";
    $response .= "6. Muthaiga $destinations['Muthaiga']";
    

    // This is a terminal request. Note how we start the response with END
    $response = "END Your Destination is ".$accountNumber;

}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
