<?php
 # This is a quick and dirty USSD application
 # Create your own SMS shortcode from the sandbox dashboard
 # In the conf folder enter your sandbox API key
 # 1. ensure this code runs only after a POST from AT
if(!empty($_POST)){
	require_once('libs/AfricasTalkingGateway.php');
	require_once('conf/accountconfig.php');
	$sessionId=$_POST['sessionId'];
	$serviceCode=$_POST['serviceCode'];
	$phoneNumber=$_POST['phoneNumber'];
    $text=$_POST['text'];
    $code = '44005'; # Change this
    if ( $text == "" ) {
        $response = "CON Karibu " . $phoneNumber . ". Please choose a service.\n";
        $response .= " 1. Send me todays voice tip.\n";
        $response .= " 2. Please call me!\n";
        $response .= " 3. Send me Airtime!\n";
        header('Content-type: text/plain');
        echo $response;	
   }
   else if ( $text == "1" ) {
    $response = "END Please check your SMS inbox.\n";
    $recipients = $phoneNumber;
    $message    = "https://hahahah12-grahamingokho.c9.io/kaka.mp3";
    $gateway    = new AfricasTalkingGateway($username, $apikey);
    try { $results = $gateway->sendMessage($recipients, $message, $code); }
    catch ( AfricasTalkingGatewayException $e ) {echo "Encountered an error while sending: ".$e->getMessage(); }
      header('Content-type: text/plain');
       echo $response;	            						        	
}
    else if($text == "2") {
        $response = "END Please wait while we place your call.\n";
       $from="+254724545678"; $to=$phoneNumber;
        $gateway = new AfricasTalkingGateway($username, $apikey);
        try { $gateway->call($from, $to); }
        catch ( AfricasTalkingGatewayException $e ){echo "Encountered an error when calling: ".$e->getMessage();}
        header('Content-type: text/plain');
         echo $response;	
    }
    else if($text == "3") {
        $response = "CON Select an Option.\n";
        $response .= " 1. Ksh.10.\n";
        $response .= " 2. Ksh.20\n";
        $response .= " 3. Send me text instead!\n";
          header('Content-type: text/plain');
           echo $response;
    }
    else if($text == "3*1") {
        $response = "END Please wait while we load your account.\n";
        $recipients = array( array("phoneNumber"=>"".$phoneNumber."", "amount"=>"KES 10") );
        $recipientStringFormat = json_encode($recipients);
        $gateway = new AfricasTalkingGateway($username, $apikey);    
        try { $results = $gateway->sendAirtime($recipientStringFormat);}
        catch(AfricasTalkingGatewayException $e){ echo $e->getMessage(); }
          header('Content-type: text/plain');
           echo $response;
    }
    else if($text == "3*2") {
        $response = "END Please wait while we load your account.\n";
        $recipients = array( array("phoneNumber"=>"".$phoneNumber."", "amount"=>"KES 20") );
        $recipientStringFormat = json_encode($recipients);
        $gateway = new AfricasTalkingGateway($username, $apikey);    
        try { $results = $gateway->sendAirtime($recipientStringFormat);}
        catch(AfricasTalkingGatewayException $e){ echo $e->getMessage(); }
          header('Content-type: text/plain');
           echo $response;
    }
    else if($text == "3*3") {
        $response = "END Please check your SMS inbox.\n";
        $recipients = $phoneNumber;
        $message    = "LOL.\n No Airtime for you";
        $gateway    = new AfricasTalkingGateway($username, $apikey);
        try { $results = $gateway->sendMessage($recipients, $message, $code); }
        catch ( AfricasTalkingGatewayException $e ) {echo "Encountered an error while sending: ".$e->getMessage(); }
        header('Content-type: text/plain');
        echo $response;	            	
    }
	}
    ?>