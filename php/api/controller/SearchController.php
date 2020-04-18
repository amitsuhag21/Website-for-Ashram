<?php

include_once "../config/database.php"; 
include_once "../service/SearchService.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $db = new Database();
    $dbConnection =  $db->getConnection();
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    $controller = new SearchController($dbConnection, $requestMethod);
    $controller->processRequest();

class SearchController {

    private $db;
    private $requestMethod;

    private $searchService;

    public function __construct($db, $requestMethod)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->searchService = new SearchService($this->db);
    }   

    public function processRequest()
    {
        switch ($this->requestMethod) {
        case 'GET':
                if (!empty($_GET["searchKey"])) {
                    $response = $this->searchWithName(($_GET["searchKey"]));
                }else {
                    $response = $this->getAll();
                };
                break;
            case 'POST':
                if (!empty($_POST["searchKey"])) {
                    $response = $this->searchWithName(($_POST["searchKey"]));
                } else {
                    $response = $this->getAll();
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

    private function getAll()
    {
        $result = $this->searchService->findAll();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = $result;
        return $response;
    }

    private function searchWithName($searchKey)
    {
        $result = $this->searchService->findbyName($searchKey);
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