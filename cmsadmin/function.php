<?php
include_once 'config/database.php';

$getdata = $_GET;
if ($getdata['tbl'] == 'tb_od_programcategory' && !empty($getdata['catid'])) {
    $sql = 'Select * from   tb_od_programcategory where categoryid='.$getdata['catid'];
    $id =(int)$getdata['catid'];
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $status= (($row['status']==1))?0:1;
       $sqlUpd = "UPDATE tb_od_programcategory SET status= $status WHERE categoryid=$id";
        mysqli_query($link, $sqlUpd);
        return json_encode(array("id" => $getdata['catid'], "status" =>(string) $status));
    }
}