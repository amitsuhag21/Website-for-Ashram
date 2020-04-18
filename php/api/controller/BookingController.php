<?php

include_once "../config/database.php"; 
include_once "../service/MailService.php";
include_once "../service/BookingService.php";

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

    public function __construct($db, $requestMethod)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->mailService = new MailService($this->db);
        $this->bookingService = new BookingService($this->db);
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
                    $response = $this->bookServiceMail();
                } else {
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


    private function bookServiceMail()
    {
        $result = $this->bookingService->insertBookingDetail($_POST);
        $result['OfficeMail'] = $this->mailService->sendToReceptionMessage($_POST, $result['bookingId']);
        $result['userMail'] = $this->mailService->sendToUserMessage($_POST,  $result['bookingId']);
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = $result;
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