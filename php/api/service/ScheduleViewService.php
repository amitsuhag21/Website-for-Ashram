 <?php

class ScheduleViewService {
    private $connection;
    public function __construct($db)
    {
        $this->connection = $db;
    }

    function findAll()
    {

        $query="SELECT * FROM vw_od_programSchedule where  `start_date` > now()  and status = 1  ORDER BY start_date ASC";
        $response=array();
        $result=mysqli_query( $this->connection, $query);
        if($result){ 
            while($row=mysqli_fetch_array($result))
            {
                $response[]=$row;
            }
        }
        //header('Content-Type: application/json');
        //echo json_encode($response);
        return $response;
    }


    function findSearchData($reqData)
    {
        $query="SELECT * FROM vw_od_programSchedule  WHERE `start_date` > now() and ";
        $queryparam = "";
        $response=array();
        if(array_key_exists('programid', $reqData) )
        {
            $queryparam.=" programid=".$reqData['programid'];
        }else if(array_key_exists('categoryid', $reqData)){
            $queryparam.=" categoryid like '%".$reqData['categoryid']."%')";
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


    function getViewProgScheDetail($reqData)
    {

        $response=array();
        $query="SELECT * FROM vw_od_programSchedule  WHERE `start_date` > now()  and programMode like 'Online' and ";
        $queryparam = "";

        if(array_key_exists('programid', $reqData) )
        {
            $queryparam.=" programid=".$reqData['programid'];
        }else{
            $queryparam.=" programid like '%%'";
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

    function findViewProgramResidental($reqData)
    {
        $response=array();
        $query="SELECT * FROM vw_od_programSchedule WHERE `start_date` > now() and programMode <> 'Online' ";
        $queryparam = "";       
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

    function findViewProgromOnline($reqData)
    {
        $response=array();
        $query="SELECT * FROM vw_od_programSchedule WHERE `start_date` > now() and status = 1  and programMode = 'Online' ";
        $queryparam = "";       
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

    function findbyProgramId($programid)
    {
        $query="SELECT * FROM vw_od_programSchedule  WHERE  ";
        $queryparam = "";
        $response=array();
        if($programid )
        {
            $queryparam.=" programid=".$programid;
        }

        $queryparam.=" and start_date >= now() ORDER BY start_date ASC";
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


    function findScheduleById($searchById)
    {
        $query="SELECT * FROM vw_od_programSchedule  WHERE  scheduleid =".$searchById." and status = 1 and start_date >= now() ORDER BY start_date ASC";

        $response=array();
        $result=mysqli_query($this->connection, $query);
        if($result){            
            while($row=mysqli_fetch_array($result))
            {
                $response[]=$row;
            }
        }
        return $response;
    }

    function findProgramPage($programid)
    {
        $query="SELECT * FROM vw_od_programSchedule  WHERE  ";
        $queryparam = "";
        $response=array();
        if($programid )
        {
            $queryparam.=" programid=".$programid;
        }

        $queryparam.=" and start_date >= now() ORDER BY start_date ASC";
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
