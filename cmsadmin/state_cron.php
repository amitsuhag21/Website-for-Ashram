<?php
include_once 'config/database.php'; 

$indian_states = array (
    'AP' => 'Andhra Pradesh',
    'AR' => 'Arunachal Pradesh',
    'AS' => 'Assam',
    'BR' => 'Bihar',
    'CT' => 'Chhattisgarh',
    'GA' => 'Goa',
    'GJ' => 'Gujarat',
    'HR' => 'Haryana',
    'HP' => 'Himachal Pradesh',
    'JK' => 'Jammu & Kashmir',
    'JH' => 'Jharkhand',
    'KA' => 'Karnataka',
    'KL' => 'Kerala',
    'MP' => 'Madhya Pradesh',
    'MH' => 'Maharashtra',
    'MN' => 'Manipur',
    'ML' => 'Meghalaya',
    'MZ' => 'Mizoram',
    'NL' => 'Nagaland',
    'OR' => 'Odisha',
    'PB' => 'Punjab',
    'RJ' => 'Rajasthan',
    'SK' => 'Sikkim',
    'TN' => 'Tamil Nadu',
    'TR' => 'Tripura',
    'UK' => 'Uttarakhand',
    'UP' => 'Uttar Pradesh',
    'WB' => 'West Bengal',
   );
   foreach($indian_states as $k=>$n){
    $sql = "INSERT INTO tb_od_state( state_name, state_code, country_Id, status)
    VALUES ('" . $n . "','" . $k . "', 1, 1)";
     mysqli_query($link, $sql);
   }


