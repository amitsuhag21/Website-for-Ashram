<?php
$servername = "localhost:8889";
$username = "pankaj";
$password = "pankaj";

// Create connection
$link  = new mysqli($servername, $username, $password,'osho');

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}


?>
