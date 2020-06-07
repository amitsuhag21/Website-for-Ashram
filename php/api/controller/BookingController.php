<?php

include_once "../config/database.php"; 
include_once "../service/MailService.php";
include_once "../service/BookingService.php";
include_once "../service/SMSSenderService.php";
include_once "../service/PaymentGatewayService.php";


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $db = new Database();
    $dbConnection =  $db->getConnection();
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    $controller = new BookingController($dbConnection, $requestMethod);
    $controller->processRequest();

class BookingController {

    private $db;
    private $requestMethod;

    private $mailService;
    private $bokingService;
    private $smsSenderService;
    private $paymentGatewayService;

    public function __construct($db, $requestMethod)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->mailService = new MailService($this->db);
        $this->bookingService = new BookingService($this->db);
        $this->smsSenderService = new SMSSenderService($this->db);
        $this->paymentGatewayService = new PaymentGatewayService($this->db);
    }   

    public function processRequest()
    {
        switch ($this->requestMethod) {
        case 'GET':
                if (!empty($_GET["bookService"])) {
                    $response = $this->bookServiceTestMail();
                }else {
                    $response = $this->notFoundResponse();
                };
                break;
            case 'POST':
                if (!empty($_POST["bookService"])) {
                    $response = $this->bookServiceMail($_POST);
                } else if (!empty($_POST["createOrder"])) {
                    $response = $this->bookCreateOrder($_POST);
                } 
                else {
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


    private function bookServiceMail($reqData)
    {

        $finalrespose  = array();
        $result = $this->bookingService->insertBookingDetail($reqData);
        $finalrespose['bookingDetail'] = $result['bookingId'];

        if(array_key_exists('phoneNumber', $reqData)){
           $finalrespose['phoneNumber']= $reqData['phoneNumber'];
           $finalrespose['userName'] = array_key_exists('userName', $reqData)? $reqData['userName']:"";
            $finalrespose['smsresult'] = $this->smsSenderService->sendSMS($finalrespose);
        }
/*        $result['OfficeMail'] = $this->mailService->sendToReceptionMessage($reqData, $result['bookingId']);
        $result['userMail'] = $this->mailService->sendToUserMessage($reqData,  $result['bookingId']);*/
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = $finalrespose;
        return $response;
    }


    private function bookCreateOrder($reqData)
    {
        $finalrespose  = array();
        $result = $this->bookingService->insertCreateOrderDetail($reqData);
        
        $finalrespose['bookingDetail'] = $result['bookingId'];
        $finalrespose['orderIdDetail'] = $this->getPaymentOrderId($reqData, $result['bookingId']);
        if(array_key_exists('phoneNumber', $reqData)){
           $finalrespose['phoneNumber']= $reqData['phoneNumber'];
           $finalrespose['userName'] = array_key_exists('userName', $reqData)? $reqData['userName']:"";
            $finalrespose['smsresult'] = $this->smsSenderService->sendSMS($finalrespose);
        }
/*        $result['OfficeMail'] = $this->mailService->sendToReceptionMessage($reqData, $result['bookingId']);
        $result['userMail'] = $this->mailService->sendToUserMessage($reqData,  $result['bookingId']);*/
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = $finalrespose;
        return $response;
    }

    private function getPaymentOrderId($reqData, $id)
    {
        $result = $this->paymentGatewayService->processOrderInit($reqData,$id);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $response = $result;
        return $response;
    }

    

    private function bookServiceTestMail()
    {
        $result = $this->bookingService->insertBookingDetail($_GET);
        $result['userMail'] = $this->mailService->sendToUserMessage($_GET,  $result['bookingId']);
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