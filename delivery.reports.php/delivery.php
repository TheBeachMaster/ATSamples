<?php

if(!empty($_POST)){
    $status = $_POST['status']; //This contains the status as described above
    $messageId = $_POST['id']; //This is the messageId received when the message was sent
    //This parameter is passed when status is Rejected or Failed.
    if($status == "Failed" || $status == "Rejected")
    {
        $failureReason = $_POST['failureReason']; 
        print_r("Failed");
    }else {
        print_r("Okay");
    }

}