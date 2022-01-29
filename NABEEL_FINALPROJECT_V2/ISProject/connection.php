<?php

$servername = "127.0.0.1:3307";

$username = "root";
$password = "";
$dbname = "isproject2";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($con === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>


