<?php
/*$servername = "localhost";
$username = "gallerytest";
$password = "CF^xv,*90,$;";*/

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$link  = new mysqli($servername, $username, $password,'oshodhara');

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

?>
