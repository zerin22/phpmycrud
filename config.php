<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$db       = "phpmycrud";

$conn = new mysqli($hostName, $userName, $password, $db);

//CHECKING CONNECTION
if($conn->connect_error){
    die("Connection Failed:" . $conn->connect_error);
}
?>