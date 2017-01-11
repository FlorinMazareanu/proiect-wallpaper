<?php

$serverNameDB = "localhost";
$userNameDB = "AdminDB";
$dbPasswordDB = "";

$conn = new mysqli($serverNameDB,$userNameDB,$dbPasswordDB);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "Connection failed";
}
else
//echo "Connected successfully";

 ?>