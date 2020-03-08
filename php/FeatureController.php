<?php

include_once "connection.php"; 
include_once "FeatureService.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $db = new dbUtils();
    $dbConnection =  $db->getDatabaseConn();
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    $controller = new FeatureController($dbConnection, $requestMethod);
    $controller->processRequest();

class FeatureController {

    private $db;
    private $requestMethod;

    private $FeatureService;

    public function __construct($db, $requestMethod)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->FeatureService = new FeatureService($this->db);
    }   

    public function processRequest()
    {
        switch ($this->requestMethod) {
            case 'GET':
                if (!empty($_GET["id"])) {
                    $response = $this->getFeature($_GET["id"]);
                } else {
                    $response = $this->getAllFeatures();
                };
                break;
            case 'POST':
                $response = $this->createFeatureFromRequest();
                break;
            case 'PUT':
                $response = $this->updateFeatureFromRequest($_DELETE["id"]);
                break;
            case 'DELETE':
                $response = $this->deleteFeature($_DELETE["id"]);
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }
        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }

    private function getAllFeatures()
    {
        $result = $this->FeatureService->findAll();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = $result;
        return $response;
    }

    private function getFeature($id)
    {
        $result = $this->FeatureService->find($id);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = $result;
        return $response;
    }

    private function createFeatureFromRequest()
    {
        $input = json_decode(file_get_contents('php://input'), TRUE);
        $this->FeatureService->insert($input);
        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = null;
        return $response;
    }

    private function updateFeatureFromRequest($id)
    {
        $result = $this->FeatureService->find($id);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $input = json_decode(file_get_contents('php://input'), TRUE);
        if (! $this->validatePerson($input)) {
            return $this->unprocessableEntityResponse();
        }
        $this->FeatureService->update($id, $input);
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = null;
        return $response;
    }

    private function deleteFeature($id)
    {
        $result = $this->FeatureService->find($id);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $this->FeatureService->delete($id);
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = null;
        return $response;
    }

    private function validatePerson($input)
    {
        if (! isset($input['firstname'])) {
            return false;
        }
        if (! isset($input['lastname'])) {
            return false;
        }
        return true;
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