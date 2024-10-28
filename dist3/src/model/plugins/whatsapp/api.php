<?php
require_once './vendor/autoload.php'; 
 
use Twilio\Rest\Client; 

if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET')
{

    $sid = "ACbd4eb90f572ee0538a9bbca919e3e998";
    $token = "b5beebf1fb125e4bde87ebcf1fa5dfa5";
    $twilio = new Client($sid, $token); 
    $input = array();
    
    if($_POST){
        echo "POST";
        $data = json_decode(file_get_contents('php://input'), true);
       
    }else if($_GET){
        echo "GET";
        $data = $_GET;
    }
    
    //$data = json_decode(file_get_contents('php://input'), true);
    
    //+14155238886
    $message = $twilio->messages 
    ->create("whatsapp:+57".$data['numero'], // to 
        array( 
            "from" => "whatsapp:+14155238886",       
            "body" => $data["mensaje"]
        ) 
    );
    
    echo json_encode($data);
    print_r($message->sid);


}
?>