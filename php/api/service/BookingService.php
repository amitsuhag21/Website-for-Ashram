 <?php

class BookingService {
    private $connection;
    public function __construct($db)
    {
        $this->connection = $db;
    }

    
    function insertBookingDetail($data)
    {
       
        $bookingRef         = 'bookingRef';
        $Booking_Time   = time();


        $ScheduleId         = array_key_exists('scheduleId', $data)? $data['scheduleId']:"";
        $programid          = array_key_exists('programId', $data)? $data['programId']:0;
        $StartDate          = array_key_exists('StartDate', $data)? $data['StartDate']:"";
        $EndDate            = array_key_exists('EndDate', $data) ? $data['EndDate']:"";
        $programName        = array_key_exists('programName', $data) ? $data['programName']:"";
        $programLocation    = array_key_exists('programLocation', $data) ? $data['programLocation']:"";
        $graguatedProgram   = array_key_exists('GraduationLevel', $data) ? $data['GraduationLevel']:"";
        $PaymentDocs        = array_key_exists('paymentRecipt', $data) ? $data['paymentRecipt']:"";
        $DairyNumber        = array_key_exists('dairyNumber', $data)? $data['dairyNumber']:"";
        $phoneNumber        = array_key_exists('phoneNumber', $data)? $data['phoneNumber']:"";
        $EmailId            = array_key_exists('emailId', $data) ? $data['emailId']:"";
        $UserName           = array_key_exists('userName', $data)? $data['userName']:"";
        $bankName           = array_key_exists('bankName', $data)? $data['bankName']:"";
        $transferType           = array_key_exists('transferType', $data)? $data['transferType']:"";
        $transactionId           = array_key_exists('transactionId', $data)? $data['transactionId']:"";
        $comments           = array_key_exists('comments', $data)? $data['comments']:"";

        $state              = array_key_exists('userState', $data)? $data['userState']:"";
        $City               = array_key_exists('city', $data)? $data['city']:"";

        $Address = $UserName.", ".$state.", ".$City;
        $Remark = "Bank Name : ".$bankName.", transfer type : ".$transferType.", transaction Id : ".$transactionId.", comments : ".$comments;

        $GraguatedProgramId = array_key_exists('GraguatedProgramId', $data) ? $data['GraguatedProgramId']:"";
        $PendingProgram = array_key_exists('PendingProgram', $data) ? $data['PendingProgram']:"";
        $PendingProgramId = array_key_exists('PendingProgramId', $data) ? $data['PendingProgramId']:"";

        $query = "INSERT INTO `tb_od_bookingDetail`( `bookingRef`, `ScheduleId`, `StartDate`, `EndDate`, `programid`, `programName`, `programLocation`, `graguatedProgram`, `GraguatedProgramId`, `PendingProgram`, `PendingProgramId`, `PaymentDocs`, `UserName`, `DairyNumber`, `phoneNumber`, `EmailId`, `Address`, `state`, `City`, `Remark`) VALUES ('".$bookingRef."', '".$ScheduleId."', '".$StartDate."', '".$EndDate."', '".$programid."', '".$programName."', '".$programLocation."', '".$graguatedProgram."','".$GraguatedProgramId."', '".$PendingProgram."', '".$PendingProgramId."', '".$PaymentDocs."', '".$UserName."', '".$DairyNumber."', '".$phoneNumber."', '".$EmailId."', '".$Address."', '".$state."', '".$City."', '".$Remark."') ";

        $result =mysqli_query($this->connection, $query);

        if(mysqli_query($this->connection, $query) === TRUE)
        {
            $response=array(
                'bookingId' => $this->connection->insert_id,
                'status' =>$result ,
                'status_message' =>'packagefeature Added Successfully.'
            );
        }
        else
        {
            $response=array(
                'bookingId' => '0',
                'status' => 0,
                'status_message' =>'packagefeature Addition Failed.'
            );
        }
        return $response;
    }
    

    function insertCreateOrderDetail($data) {
       
        $bookingRef         = 'bookingRef';
        $Booking_Time   = time();


        $ScheduleId         = array_key_exists('scheduleId', $data)? $data['scheduleId']:"";
        $programid          = array_key_exists('programId', $data)? $data['programId']:0;
        $StartDate          = array_key_exists('StartDate', $data)? $data['StartDate']:"";
        $EndDate            = array_key_exists('EndDate', $data) ? $data['EndDate']:"";
        $programName        = array_key_exists('programName', $data) ? $data['programName']:"";
        $programLocation    = array_key_exists('programLocation', $data) ? $data['programLocation']:"";
        $graguatedProgram   = array_key_exists('GraduationLevel', $data) ? $data['GraduationLevel']:"";
        $PaymentDocs        = array_key_exists('paymentRecipt', $data) ? $data['paymentRecipt']:"";
        $DairyNumber        = array_key_exists('dairyNumber', $data)? $data['dairyNumber']:"";
        $phoneNumber        = array_key_exists('phoneNumber', $data)? $data['phoneNumber']:"";
        $EmailId            = array_key_exists('emailId', $data) ? $data['emailId']:"";
        $UserName           = array_key_exists('userName', $data)? $data['userName']:"";
        $bankName           = array_key_exists('bankName', $data)? $data['bankName']:"";
        $transferType           = array_key_exists('transferType', $data)? $data['transferType']:"";
        $transactionId           = array_key_exists('transactionId', $data)? $data['transactionId']:"";
        $comments           = array_key_exists('comments', $data)? $data['comments']:"";

        $state              = array_key_exists('userState', $data)? $data['userState']:"";
        $City               = array_key_exists('city', $data)? $data['city']:"";

        $Address = $UserName.", ".$state.", ".$City;
        $Remark = "Bank Name : ".$bankName.", transfer type : ".$transferType.", transaction Id : ".$transactionId.", comments : ".$comments;

        $GraguatedProgramId = array_key_exists('GraguatedProgramId', $data) ? $data['GraguatedProgramId']:"";
        $PendingProgram = array_key_exists('PendingProgram', $data) ? $data['PendingProgram']:"";
        $PendingProgramId = array_key_exists('PendingProgramId', $data) ? $data['PendingProgramId']:"";

        $query = "INSERT INTO `tb_od_bookingDetail`( `bookingRef`, `ScheduleId`, `StartDate`, `EndDate`, `programid`, `programName`, `programLocation`, `graguatedProgram`, `GraguatedProgramId`, `PendingProgram`, `PendingProgramId`, `PaymentDocs`, `UserName`, `DairyNumber`, `phoneNumber`, `EmailId`, `Address`, `state`, `City`, `Remark`) VALUES ('".$bookingRef."', '".$ScheduleId."', '".$StartDate."', '".$EndDate."', '".$programid."', '".$programName."', '".$programLocation."', '".$graguatedProgram."','".$GraguatedProgramId."', '".$PendingProgram."', '".$PendingProgramId."', '".$PaymentDocs."', '".$UserName."', '".$DairyNumber."', '".$phoneNumber."', '".$EmailId."', '".$Address."', '".$state."', '".$City."', '".$Remark."') ";

        $result =mysqli_query($this->connection, $query);

        if(mysqli_query($this->connection, $query) === TRUE)
        {
            $response=array(
                'bookingId' => $this->connection->insert_id,
                'status' =>$result ,
                'status_message' =>'packagefeature Added Successfully.'
            );
        }
        else
        {
            $response=array(
                'bookingId' => '0',
                'status' => 0,
                'status_message' =>'packagefeature Addition Failed.'
            );
        }
        return $response;
    }
}