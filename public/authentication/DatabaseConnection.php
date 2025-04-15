<?php
$host = "localhost";
$dbname = "php1db";
$username = "JFCompany";
$password = "";

$connection = new mysqli($host, $username, $password, $dbname);
if ($connection->connect_error){
    die("Connection Failed: ". $connection->connect_error);
}

?>