<?php

class SMSSenderService {

    private $smsMsg;

    public function __construct()
    {
       
    }   

	
	public function sendSMS($data){

		$url = 'https://www.kookoo.in/outbound/outbound_sms.php';
		$param = array('api_key' => 'KK2eb663516edae12c5c3429fcca39de61',
		    'phone_no' => $data['phoneNumber'],
		    'message' => 'Dear '. $data['userName'].'Your booking reference number is ref_'.$data['bookingDetail']
		);

		$url = $url . "?" . http_build_query($param, '&');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$datares = curl_exec($ch);
		curl_close($ch);
		return $datares;
	}

}
