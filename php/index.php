<?php

// include database and object files
include_once "connection.php"; 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );


$db = new dbUtils();
$dbConnection =  $db->getDatabaseConn();
$requestMethod = $_SERVER["REQUEST_METHOD"];

// all of our endpoints start with /person
// everything else results in a 404 Not Found
if ($uri[1] == 'feature') {
	echo 'hello';
	$controller = new FeatureController($dbConnection, $requestMethod);
	$controller->processRequest();
}else if($uri[1] == 'package'){

}else if($uri[1] == 'featurePackage'){
	
}else{
	header("HTTP/1.1 404 Not Found");
    exit();
}


// pass the request method and user ID to the PersonController and process the HTTP request:
