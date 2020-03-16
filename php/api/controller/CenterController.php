<?php

include_once "../config/database.php"; 
include_once "../service/CenterService.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $db = new Database();
    $dbConnection =  $db->getConnection();
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    $controller = new CenterController($dbConnection, $requestMethod);
    $controller->processRequest();

class CenterController {

    private $db;
    private $requestMethod;

    private $centerService;

    public function __construct($db, $requestMethod)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->centerService = new CenterService($this->db);
    }   

    public function processRequest()
    {
        switch ($this->requestMethod) {
        case 'GET':
                if (!empty($_GET["centerid"])) {
                    $response = $this->getCenter(($_GET["centerid"]));
                }else if(!empty($data["centerid"])){
                    $response = $this->getCenter(($data["centerid"]));
                }else {
                    $response = $this->getAllCenter();
                };
                break;
            case 'POST':
                //$data = json_decode($_POST["data"]);
                if (!empty($_POST["centerid"])) {
                    $response = $this->getCenter(($_POST["centerid"]));
                }else if(!empty($data["centerid"])){
                    $response = $this->getCenter(($data["centerid"]));
                } else {
                    $response = $this->getAllCenter();
                };
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }
        
        if ($response['body']) {
            echo json_encode($response['body']);
            //echo $response['body'];
        }
    }

    private function getAllCenter()
    {
        $result = $this->centerService->findAll();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = $result;
        return $response;
    }

    private function getCenter($id)
    {
        $result = $this->centerService->find($id);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = $result;
        return $response;
    }

    private function notFoundResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        return $response;
    }
}