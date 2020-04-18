 <?php

class ScheduleService {
    private $connection;
    public function __construct($db)
    {
        $this->connection = $db;
    }

    function findAll()
    {
        $query="SELECT * FROM tb_od_programschedule ORDER BY start_date ASC";
        $response=array();
        $result=mysqli_query( $this->connection, $query);
        if($result){ 
            while($row=mysqli_fetch_array($result))
            {
                $response[]=$row;
            }
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }


    function find($reqData)
    {
        $query="SELECT * FROM tb_od_programschedule  WHERE  ";
        $queryparam = "";
        $response=array();
        if(array_key_exists('programid', $reqData) )
        {
            $queryparam.=" programid=".$reqData['programid'];
        }else if(array_key_exists('categoryid', $reqData)){
            $queryparam.=" programid in (SELECT programid FROM tb_od_program  WHERE categoryid like '%".$reqData['categoryid']."%')";
        }else{
            $queryparam.=" programid like '%%'";
        }
        if(array_key_exists('venueId', $reqData))
        {
            $queryparam.=" and dhyankendraid =".$reqData['venueId'];
        }else{
            $queryparam.=" and dhyankendraid like '%%'";
        }
        if(array_key_exists('startDate', $reqData))
        {
            $queryparam.=" and start_date >='".$reqData['startDate']."'";
        }else{
            $queryparam.=" and start_date >='".date('Y-m-d H:i:s')."'";
        }
        if(array_key_exists('endDate', $reqData))
        {
            $queryparam.=" and end_date <='".$reqData['endDate']."'";
        }else{
            $queryparam.=" ";
        }
        $queryparam.=" ORDER BY start_date ASC";

        $query.=$queryparam;
        $result=mysqli_query($this->connection, $query);
        if($result){            
            while($row=mysqli_fetch_array($result))
            {
                $response[]=$row;
            }
        }else{
            
            $response =[];
        }
        return $response;
    }

       function findbyId($programid)
    {
        $query="SELECT * FROM tb_od_programschedule  WHERE  ";
        $queryparam = "";
        $response=array();
        if($programid )
        {
            $queryparam.=" programid=".$programid;
        }

        $queryparam.=" and start_date >='".date('Y-m-d H:i:s')."'";
        $queryparam.=" ORDER BY start_date ASC";

        $query.=$queryparam;
        $result=mysqli_query($this->connection, $query);
        if($result){            
            while($row=mysqli_fetch_array($result))
            {
                $response[]=$row;
            }
        }else{
            
            $response =[];
        }
        return $response;
    }
    
}