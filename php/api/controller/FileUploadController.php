<?php

include_once "../config/database.php"; 
//include_once "../service/MailService.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $db = new Database();
    $dbConnection =  $db->getConnection();
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    $controller = new FileUploadController($dbConnection, $requestMethod);
    $controller->processRequest();

class FileUploadController {
    private $db;
    private $requestMethod;

    private $mailService;

    public function __construct($db, $requestMethod)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
    }   

    public function processRequest()
    {
        switch ($this->requestMethod) {
        	case 'GET':
                if ($_FILES['file']) {
                    $response = $this->uploadRecipt();
                }
                break;
            case 'POST':
                //$data = json_decode($_POST["data"]);
                if ($_FILES['file']) {
                    $response = $this->uploadRecipt();
                } else {
                    $response = $this->uploadRecipt();
                };
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }
        
        if ($response) {
            echo $response;
            //echo $response['body'];
        }
    }

    private function uploadRecipt()
    {
		if($_FILES['file']['name'] != ''){
		    $test = explode('.', $_FILES['file']['name']);
            $allowed_extension = array("png","jpg","jpeg","pdf", "doc", "docx", "txt","ppt","pptx","odt","png","raw","psd");
		    $extension = end($test);  
            if(in_array(strtolower($extension),$allowed_extension)){
                $mytime=gettimeofday();
                $timeData = "$mytime[sec].$mytime[usec]";
    		    $name = "ProgramReceipt" . $timeData .'.'.$extension;
    		    $location = '../../../upload/'.$name;
    		    move_uploaded_file($_FILES['file']['tmp_name'], $location);
    		    return 'http://localhost/upload/'.$name;        
            }else{
                return "File type Not allowed";
            } 
    	}
	}

}