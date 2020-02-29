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
if ($getdata['tbl'] == 'tb_od_program' && !empty($getdata['id'])) {
    $sql = 'Select * from   tb_od_program where programid='.$getdata['id'];
    $id =(int)$getdata['id'];
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $status= (($row['status']==1))?0:1;
       $sqlUpd = "UPDATE tb_od_program SET status= $status WHERE programid=$id";
        mysqli_query($link, $sqlUpd);
        return json_encode(array("id" => $getdata['catid'], "status" =>(string) $status));
    }
}
if ($getdata['tbl'] == 'tb_od_dhyankendra' && !empty($getdata['id'])) {
    $sql = 'Select * from   tb_od_dhyankendra where dhyankendraid='.$getdata['id'];
    $id =(int)$getdata['id'];
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $status= (($row['status']==1))?0:1;
       $sqlUpd = "UPDATE tb_od_dhyankendra SET status= $status WHERE dhyankendraid=$id";
        mysqli_query($link, $sqlUpd);
        return json_encode(array("id" => $getdata['catid'], "status" =>(string) $status));
    }
}


if ($getdata['tbl'] == 'tb_od_teammember' && !empty($getdata['id'])) {
    $sql = 'Select * from   tb_od_teammember where teammemberid='.$getdata['id'];
    $id =(int)$getdata['id'];
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $status= (($row['status']==1))?0:1;
       $sqlUpd = "UPDATE tb_od_teammember SET status= $status WHERE teammemberid=$id";
        mysqli_query($link, $sqlUpd);
        return json_encode(array("id" => $getdata['catid'], "status" =>(string) $status));
    }
}
