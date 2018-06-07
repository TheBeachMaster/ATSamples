<?php
if(!empty($_POST)){
    $sessionId=$_POST['status'];
	$serviceCode=$_POST['description'];
    $phoneNumber=$_POST['transactionId'];

    $response = "OK";
    header('Content-type: text/plain');
    echo $response;	

    # Save stuff to DB.... 
}
?>