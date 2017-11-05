<?php 
$servername = 'localhost';
$username = 'root';
$password = "Infrared@1944";
$database = "atussd";
$dbport = 3306;
    $db = new mysqli($servername, $username, $password, $database, $dbport);
    if ($db->connect_error) {
        header('Content-type: text/plain');
        die("END An error was encountered. Please try again later");
    } 
?>