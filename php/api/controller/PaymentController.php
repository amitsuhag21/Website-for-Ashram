<?php

include_once "../config/database.php"; 
include_once "../service/PaymentGatewayService.php";
include_once "../service/ScheduleService.php";


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $db = new Database();
    $dbConnection =  $db->getConnection();
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    $controller = new PaymentController($dbConnection, $requestMethod);
    $controller->processRequest();

class PaymentController {

    private $db;
    private $requestMethod;

    private $paymentGatewayService;
    private $scheduleService;

    public function __construct($db, $requestMethod)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->paymentGatewayService = new PaymentGatewayService($this->db);
        $this->scheduleService = new ScheduleService($this->db);
        
    }   

    public function processRequest()
    {
        switch ($this->requestMethod) {
        case 'GET':
                if (!empty($_GET["orderId"])) {
                    $response = $this->getPaymentOrderId($_GET["orderId"]);
                }else if(!empty($data["programid"])){
                    $response = $this->getPaymentOrderId(($data["programid"]));
                }else {
                    $response = $this->getPaymentOrderId();
                };
                break;
            case 'POST':
                if (!empty($_POST["programList"])) {
                    $response = $this->getProgramWithSchedule(($_POST["programid"]));
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

    private function getPaymentOrderId($id)
    {
        $result = $this->paymentGatewayService->getOrderId($id);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $response['body'] = $result;
        return $response;
    }
    

    private function getProgramWithSchedule($id)
    {
        $result['programData'] = $this->programService->find($id);
        if (!$result && !$result['programData']) {
            return $this->notFoundResponse();
        }else{
            $result['programList'] = $this->scheduleService->findbyId($id);
        }
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