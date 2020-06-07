<?php

include_once "../config/database.php"; 
include_once "../service/ScheduleViewService.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $db = new Database();
    $dbConnection =  $db->getConnection();
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    $controller = new ScheduleViewController($dbConnection, $requestMethod);
    $controller->processRequest();

class ScheduleViewController {

    private $db;
    private $requestMethod;
    private $scheduleViewService;

    public function __construct($db, $requestMethod)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->scheduleViewService = new ScheduleViewService($this->db);
    }   

    public function processRequest()
    {
        switch ($this->requestMethod) {
            case 'GET':
                
                if (!empty($_GET["searchView"]=="Online")) {
                    $response = $this->getViewProgScheOnline(($_GET));
                } else if (!empty($_GET["searchView"]=="OnlineSearch")) {
                    $response = $this->getViewProgScheDetail(($_GET));
                }else if (!empty($_GET["programPage"])) {
                    $response = $this->getProgPageSche(($_GET));
                }else if (!empty($_GET["searchById"])) {
                    $response = $this->getScheById($_GET["searchById"]);
                }else if (!empty($_GET["searchView"])) {
                    $response = $this->getScheduleViewSearch(($_GET));
                }else {
                    $response = $this->getAllScheduleView();
                };
                break;


            case 'POST':
                if (!empty($_POST["searchView"]) && $_POST["searchView"] =="Online") {
                    $response = $this->getViewProgScheOnline(($_POST));
                } else if (!empty($_POST["searchView"]) && !empty($_POST["searchView"]=="OnlineSearch")) {
                    $response = $this->getViewProgScheDetail(($_POST));
                } else if (!empty($_POST["programPage"])) {
                    $response = $this->getProgPageSche(($_POST));
                } else if (!empty($_POST["searchById"])) {
                    $response = $this->getScheById(($_POST["searchById"]));
                }else if (!empty($_POST["searchView"])) {
                    $response = $this->getScheduleViewSearch(($_POST));
                } else {
                    $response = $this->getAllScheduleView();
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

    private function getAllScheduleView()
    {
        $result = $this->scheduleViewService->findAll();
        $response['body'] = $result;
        return $response;
    }

    private function getScheduleViewSearch($reqData)
    {
        $result = $this->scheduleViewService->findSearchData($reqData);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $response['body'] = $result;
        return $response;
    }


    private function getViewProgScheDetail($reqData)
    {
        $result = $this->scheduleViewService->getViewProgScheDetail($reqData);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $response['body'] = $result;
        return $response;
    }

    private function getProgPageSche($reqData)
    {
        $result = $this->scheduleViewService->findProgramPage($reqData);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $response['body'] = $result;
        return $response;
    }

    private function getScheById($searchById)
    {
        $result = $this->scheduleViewService->findScheduleById($searchById);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $response['body'] = $result;
        return $response;
    }

    private function getViewProgScheOnline($reqData)
    {
       $result = $this->scheduleViewService->getViewProgScheDetail($reqData);
        //$result = $this->scheduleViewService->findAll($reqData);
        
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