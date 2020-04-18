<?php
include_once "../../../vendor/phpmailer/phpmailer/src/PHPMailer.php";
include_once '../../../vendor/autoload.php';
class MailService {

    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer\PHPMailer\PHPMailer();
    }   

    public function processRequest($mailid, $bodyTampate, $subject, $UserName)
    {
		$this->mail->isSMTP();
		$this->mail->SMTPDebug = 2;
/*	
		$this->mail->Host = 'localhost';
		$this->mail->Port = 25;*/
		
		$this->mail->Host = 'smtp.gmail.com';
		$this->mail->Port = 587;

		$this->mail->protocol = 'mail';
		$this->mail->SMTPAuth = true;
		$this->mail->SMTPSecure = false;
		$this->mail->SMTPOptions = array(
		    'ssl' => array(
		        'verify_peer' => false,
		        'verify_peer_name' => false,
		        'allow_self_signed' => true
		    )
		);

		$this->mail->Username = 'vikashranjan0000@gmail.com';
		$this->mail->Password = 'vivekJAY00.';
		$this->mail->setFrom('vikashranjan0000@gmail.com', 'Vikash Kumar');
		$this->mail->addReplyTo('vikashranjan0000@gmail.com', 'Vikash Kumar');
/*		$this->mail->Username = 'booking@oshodhara.org.in';
		$this->mail->Password = 'vivekJAY00.';
		$this->mail->setFrom('booking@oshodhara.org.in', 'Oshodhara');
		$this->mail->addReplyTo('booking@oshodhara.org.in', 'Oshodhara');*/

		$this->mail->Subject = $subject;
		if($mailid){
		    $this->mail->addAddress($mailid,$UserName);
		}else{
		   $this->mail->addAddress('booking@oshodhara.org.in', 'Vikash Ranjan'); 
		}
		$this->mail->Body =$bodyTampate;
		$this->mail->AltBody = 'Booking request for the Sent';
		if (!$this->mail->send()) {
		    return 'Mailer Error: ' . $this->mail->ErrorInfo;
		} else {
		    return 'Message sent!';
		}
	}
	
	public function sendToReceptionMessage($data, $bookingId){
		$StartDate          = array_key_exists('StartDate', $data)? $data['StartDate']:"";
		$programName        = array_key_exists('programName', $data) ? $data['programName']:"";
		$programLocation    = array_key_exists('programLocation', $data) ? $data['programLocation']:"";
		$graguatedProgram   = array_key_exists('GraduationLevel', $data) ? $data['GraduationLevel']:"";
		$PaymentDocs        = array_key_exists('paymentRecipt', $data) ? $data['paymentRecipt']:"";
		$DairyNumber        = array_key_exists('dairyNumber', $data)? $data['dairyNumber']:"";
		$phoneNumber        = array_key_exists('phoneNumber', $data)? $data['phoneNumber']:"";
		$EmailId            = array_key_exists('emailId', $data) ? $data['emailId']:"";
		$UserName           = array_key_exists('userName', $data)? $data['userName']:"";
		$programName        = array_key_exists('programName', $data) ? $data['programName']:"";
		$mailid        		= array_key_exists('emailId', $data) ? $data['emailId']:"";
		$subject            = $programName." Booking Confirmation for Ref. No. :".$bookingId;

		$officeMailid  		="vikashranjan0000@gmail.com";
		$bodyTampate = "Dear Team,<br /> Requesting you to address the booking from ".$UserName ." to ".$programName.". <br />Please check booking and payment receipt attched.<br />Booking Ref No. :".$bookingId ."<br />User name  :".$UserName .".<br />Phone No. :".$phoneNumber .".<br />Enmailid :".$EmailId ."<br />Dairy Number :".$DairyNumber ."<br />Start Date:".$StartDate ."<br />Program Name :".$programName ."<br />Payment receipt :".$PaymentDocs."<br />Program Location :".$programLocation;
		return $this->processRequest($officeMailid, $bodyTampate, $subject, $UserName);
	}


	public function sendToUserMessage($data, $bookingId){
		$UserName           = array_key_exists('userName', $data)? $data['userName']:"";
		$programName        = array_key_exists('programName', $data) ? $data['programName']:"";
		$mailid        		= array_key_exists('emailId', $data) ? $data['emailId']:"";
		$Subject            = "Booking Confirmation Mail";
		$bodyTampate = "Dear ".$UserName.",<br /> Thank you for booking to ".$programName.". Your booking and payment receipt has been received.<br />Please use the booking reference number :".$bookingId ." while contacting to reception.<br /> <br /> You can query with us on this email: booking.query@oshodhara.org.in. <br /> Kind Regards, <br /> Oshodhara <br />Oshodhara Nanak Dham, Murthal <br /> N.H.1, 50th Milestone, GT Road, <br /> Murthal Sonepat, <br /> Haryana - 131027 (India) <br /> Mobile No.- 09671400196/3 <br />  Land line No. - 0130-2483911/12 <br /> Email: info@oshodhara.org.in <br />";
		return $this->processRequest($mailid, $bodyTampate, $subject, $UserName);
	}
}
