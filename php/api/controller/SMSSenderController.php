<?php

include_once "../config/database.php"; 
include_once "../service/SMSSenderService.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $db = new Database();
    $dbConnection =  $db->getConnection();
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    $controller = new SMSSenderController($dbConnection, $requestMethod);
    $controller->processRequest();

class SMSSenderController {

    private $db;
    private $requestMethod;
    private $smsSenderService;
    private $bokingService;

    public function __construct($db, $requestMethod)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->smsSenderService = new SMSSenderService($this->db);
    }   

    public function processRequest()
    {
        switch ($this->requestMethod) {
        case 'GET':
                if (!empty($_GET["sendData"])) {
                    $response = $this->bookingSendSMS($_GET);
                }else {
                    $response = $this->notFoundResponse();
                };
                break;
            case 'POST':
                if (!empty($_POST["sendData"])) {
                    $response = $this->bookingSendSMS($_POST);
                } else {
                    $response = $this->notFoundResponse();
                };
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }
        
        if ($response['body']) {
            echo json_encode($response['body']);
        }
    }


    private function bookingSendSMS($reqData)
    {
        $smsresult = $this->smsSenderService->sendSMS($reqData);
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = $smsresult;
        return $response;
    }

   
    private function notFoundResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        return $response;
    }
}