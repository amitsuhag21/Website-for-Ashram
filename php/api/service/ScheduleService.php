 <?php

class ScheduleService {
    private $connection;
    public function __construct($db)
    {
        $this->connection = $db;
    }

    function findAll()
    {
        $query="SELECT * FROM tb_od_programschedule";
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
        $response=array();
        if($reqData[0]['programid'] )
        {
            $query.="programid=".$reqData[0]['programid'];
        }
        if($reqData['venuId'] )
        {
            $query.="dhyankendraid=".$reqData[0]['venuId'];
        }
        $result=mysqli_query($this->connection, $query);
        if($result){            
            while($row=mysqli_fetch_array($result))
            {
                $response[]=$row;
            }
        }else{
            
            $response =$reqData[0]['programid'];
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
}