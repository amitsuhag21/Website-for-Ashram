<?php

include_once "connection.php"; 
include_once "PackageFeatureService.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $db = new dbUtils();
    $dbConnection =  $db->getDatabaseConn();
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    $controller = new PackageFeatureController($dbConnection, $requestMethod);
    $controller->processRequest();

class PackageFeatureController {

    private $db;
    private $requestMethod;

    private $PackageFeatureService;

    public function __construct($db, $requestMethod)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->PackageFeatureService = new PackageFeatureService($this->db);
    }   

    public function processRequest()
    {
        switch ($this->requestMethod) {
            case 'GET':
                if (!empty($_GET["id"])) {
                    $response = $this->getPackageFeature($_GET["id"]);
                } else {
                    $response = $this->getAllPackageFeatures();
                };
                break;
            case 'POST':
                $response = $this->createPackageFeatureFromRequest();
                break;
            case 'PUT':
                $response = $this->updatePackageFeatureFromRequest($_PUT["id"]);
                break;
            case 'DELETE':
                $response = $this->deletePackageFeature($_DELETE["id"]);
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

    private function getAllPackageFeatures()
    {
        $result = $this->PackageFeatureService->findAll();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = $result;
        return $response;
    }

    private function getPackageFeature($id)
    {
        $result = $this->PackageFeatureService->find($id);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = $result;
        return $response;
    }

    private function createPackageFeatureFromRequest()
    {
        $input = json_decode(file_get_contents('php://input'), TRUE);
        $this->PackageFeatureService->insert($input);
        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = null;
        return $response;
    }

    private function updatePackageFeatureFromRequest($id)
    {
        $result = $this->PackageFeatureService->find($id);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $input = json_decode(file_get_contents('php://input'), TRUE);
        $this->PackageFeatureService->update($id, $input);
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = null;
        return $response;
    }

    private function deletePackageFeature($id)
    {
        $result = $this->PackageFeatureService->find($id);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $this->PackageFeatureService->delete($id);
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