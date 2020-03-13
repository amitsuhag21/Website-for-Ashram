<?php

include_once "../config/database.php"; 
include_once "../service/ProgramCategoryService.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $db = new Database();
    $dbConnection =  $db->getConnection();
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    $controller = new ProgramCategoryController($dbConnection, $requestMethod);
    $controller->processRequest();

class ProgramCategoryController {

    private $db;
    private $requestMethod;

    private $programCategoryService;

    public function __construct($db, $requestMethod)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->programCategoryService = new ProgramCategoryService($this->db);
    }   

    public function processRequest()
    {
        switch ($this->requestMethod) {
        case 'GET':
                if (!empty($_GET["categoryid"])) {
                    $response = $this->getCategory(($_GET["categoryid"]));
                }else if(!empty($data["categoryid"])){
                    $response = $this->getCategory(($data["categoryid"]));
                }else {
                    $response = $this->getAllPCategory();
                };
                break;
            case 'POST':
                //$data = json_decode($_POST["data"]);
                if (!empty($_POST["categoryid"])) {
                    $response = $this->getCategory(($_POST["categoryid"]));
                }else if(!empty($data["categoryid"])){
                    $response = $this->getCategory(($data["categoryid"]));
                } else {
                    $response = $this->getAllPCategory();
                };
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }
        
        if ($response['body']) {
            echo $response['body'];
        }
    }

    private function getAllPCategory()
    {
        $result = $this->programCategoryService->findAll();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = $result;
        return $response;
    }

    private function getCategory($id)
    {
        $result = $this->programCategoryService->find($id);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = $result;
        return $response;
    }

    private function unprocessableEntityResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 422 Unprocessable Entity';
        $response['body'] = json_encode([
            'error' => 'Invalid input'
        ]);
        return $response;
    }

    private function notFoundResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        return $response;
    }
}