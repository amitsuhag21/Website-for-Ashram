<?php
$servername = "localhost:8889";
$username = "pankaj";
$password = "pankaj";

// Create connection
$link  = new mysqli($servername, $username, $password,'oshodhara');

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}


?>
