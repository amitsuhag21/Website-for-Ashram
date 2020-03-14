<?php

include_once "../config/database.php"; 
include_once "../service/ScheduleService.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $db = new Database();
    $dbConnection =  $db->getConnection();
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    $controller = new ScheduleController($dbConnection, $requestMethod);
    $controller->processRequest();

class ScheduleController {

    private $db;
    private $requestMethod;

    private $scheduleService;

    public function __construct($db, $requestMethod)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->scheduleService = new ScheduleService($this->db);
    }   

    public function processRequest()
    {
        switch ($this->requestMethod) {
        case 'GET':
                $data = json_decode(file_get_contents('php://input'), TRUE);
                if (!empty($_GET["search"])) {
                    $response = $this->getScheduleSearch(($_GET["search"]));
                }else if(!empty($data["search"])){
                    $response = $this->getScheduleSearch(($data["search"]));
                }else {
                    $response = $this->getAllSchedule();
                };
                break;
            case 'POST':
                $data = json_decode(file_get_contents('php://input'), TRUE);
                /*if (!empty($_POST["search"])) {
                    $response = $this->getScheduleSearch(($_POST["search"]));
                }else */
                if(!empty($data["search"])){
                    $response = $this->getScheduleSearch(($data["search"]));
                } else {
                    $response = $this->getAllSchedule();
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

    private function getAllSchedule()
    {
        $result = $this->scheduleService->findAll();
        $response['body'] = $result;
        return $response;
    }

    private function getScheduleSearch($id)
    {
        $result = $this->scheduleService->find($id);
        if (! $result) {
            return $this->notFoundResponse();
        }
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