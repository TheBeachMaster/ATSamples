<?php
    require_once('libs/AfricasTalkingGateway.php');
    require_once('conf/accountconfig.php');
    $from = $_POST['from'];
    $to = $_POST['to'];
    $text = $_POST['text'];
    $date = $_POST['date'];
    $id = $_POST['id'];
    $linkId = $_POST['linkId'];
    $recipient = "+254724587654";
    $shortCode = "44005";
    $keyword   = "coolguy";
    $bulkSMSMode = 0;
    $options = array('keyword'=> $keyword,'linkId'=> $linkId, 'retryDurationInHours' => "12");
    $message = "Get your daily message and thats how we roll.";
    $gateway    = new AfricasTalkingGateway($username, $apikey);
    try 
    { 
    $results = $gateway->sendMessage($recipient, $message, $shortCode, $bulkSMSMode, $options);
    foreach($results as $result) {
        echo " Number: " .$result->number;
        echo " Status: " .$result->status;
        echo " MessageId: " .$result->messageId . "\n";
                                 }
    }
    catch ( AfricasTalkingGatewayException $e )
    {
    echo "Encountered an error while sending: ".$e->getMessage();
    }

?>