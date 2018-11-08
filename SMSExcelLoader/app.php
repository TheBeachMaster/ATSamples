<?php
require_once('excel_reader/excel_reader.php');
require_once('AfricasTalkingGateway.php');
$username   = ""; // Change this to Account username. Found by Clicking your avata or cliecking on your app name.
$apikey     = ""; // Found under your application> Settings> API-KEY> Enter password to reveal or create new one
$gateway    = new AfricasTalkingGateway($username, $apikey);

$message    = "Test Message from .xls file";
$from       = ""; // Change this to your registered sender ID

$excel = new PhpExcelReader;
$excel->read('testfilexl.xls');
   $a = 1;
   for ($a; $a <= $excel->sheets[0]['numRows']; $a++) {
    $b = 1;
  $phoneNumber ='+'. $excel->sheets[0]['cells'][$a][$b];
   try { $results = $gateway->sendMessage($phoneNumber, $message, $from); echo $results; }
     catch ( AfricasTalkingGatewayException $e ) {echo "Encountered an error while sending: ".$e->getMessage(); }
  echo $phoneNumber;
}

?>