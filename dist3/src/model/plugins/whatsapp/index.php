<?php 
 
// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require_once './vendor/autoload.php'; 
 
use Twilio\Rest\Client; 
 

    $sid    = "ACbd4eb90f572ee0538a9bbca919e3e998"; 
    $token  = "b5beebf1fb125e4bde87ebcf1fa5dfa5"; 

$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create("whatsapp:+573024554814", // to 
                           array( 
                               "from" => "whatsapp:+14155238886",       
                               "body" => "uso ASISTENTE SALAS prueba 06-12-2021" 
                           ) 
                  ); 
 
print($message->sid);