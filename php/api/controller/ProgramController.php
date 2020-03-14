<?php

include_once "../config/database.php"; 
include_once "../service/ProgramService.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $db = new Database();
    $dbConnection =  $db->getConnection();
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    $controller = new ProgramController($dbConnection, $requestMethod);
    $controller->processRequest();

class ProgramController {

    private $db;
    private $requestMethod;

    private $programService;

    public function __construct($db, $requestMethod)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->programService = new ProgramService($this->db);
    }   

    public function processRequest()
    {
        switch ($this->requestMethod) {
        case 'GET':
                if (!empty($_GET["programid"])) {
                    $response = $this->getPackage(($_GET["programid"]));
                }else if(!empty($data["programid"])){
                    $response = $this->getPackage(($data["programid"]));
                }else {
                    $response = $this->getAllPackages();
                };
                break;
            case 'POST':
                if (!empty($_POST["programid"])) {
                    $response = $this->getPackage(($_POST["programid"]));
                }else if(!empty($data["programid"])){
                    $response = $this->getPackage(($data["programid"]));
                } else {
                    $response = $this->getAllPackages();
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

    private function getAllPackages()
    {
        $result = $this->programService->findAll();
        $response['body'] = $result;
        return $response;
    }

    private function getPackage($id)
    {
        $result = $this->programService->find($id);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $response['body'] = $result;
        return $response;
    }

    private function createPackageFromRequest()
    {
        $input = json_decode(file_get_contents('php://input'), TRUE);
        $this->PackageService->insert($input);
        $response['body'] = null;
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