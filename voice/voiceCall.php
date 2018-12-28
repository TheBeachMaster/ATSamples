<?php
// This is your main callback URL
$sessionId = $_POST['sessionId'];
$isActive  = $_POST['isActive'];

if ($isActive == 1)  {
  $callerNumber = $_POST['callerNumber'];

  // Compose the response
  $response  = '<?xml version="1.0" encoding="UTF-8"?>';
  $response .= '<Response>';
  $response .= '<GetDigits timeout="30" finishOnKey="#" callbackUrl="https://www.myhost.com/RegUSSD/voiceMenu.php">'; // Change this to match where the voiceMenu file will be
  $response .= '<Say>"Thank you for calling. Press 0 to talk to sales, 1 to talk to support or 2 to hear this message again."</Say>'; // This will execute actions in the VoiceMenu.php file
  $response .= '</GetDigits>';
  $response .= '<Say>"Thank you for calling. Good bye!"</Say>';
  $response .= '</Response>';
   
  // Print the response onto the page so that our gateway can read it
  header('Content-type: text/plain');
  echo $response;

} else {
  
  // Read in call details (duration, cost). This flag is set once the call is completed.
  // Note that the gateway does not expect a response in thie case
  
  $duration     = $_POST['durationInSeconds'];
  $currencyCode = $_POST['currencyCode'];
  $amount       = $_POST['amount'];
  
  // You can then store this information in the database for your records

}

?>