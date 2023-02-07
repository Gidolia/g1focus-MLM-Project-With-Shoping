<?php
//DB details
$dbHost = 'localhost';
$dbUsername = 'Gidolia';
$dbPassword = 'Gidolia50750';
$dbName = 'G1focus';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
} 
?>