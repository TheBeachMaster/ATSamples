<?php
if(!empty($_POST)){
    $transactionId = $_POST['transactionId'];
	$paymentCode = $_POST['providerRefId'];
    $paymentSource = $_POST['source'];
    $paymentStatus = $_POST['status'];
    $paymentAmount = $_POST['value'];
    $paymentMetaData = $_POST['requestMetadata'];
    $providerMetadata = $_POST['providerMetadata'];
    
    $response = "OK";
    header('Content-type: text/plain');
    echo $response;	

    # Save stuff to DB.... 
}
?>