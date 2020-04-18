 <?php

class SearchService {
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


    function findbyName($searchKey)
    {
        $result['programData'] = $this->findbyProgramName($searchKey);
        $result['centerData'] = $this->findbyCenterName($searchKey);
        return $result;

    }
    function findbyProgramName($searchKey){

        $query="SELECT * FROM tb_od_program";
        $queryparam = "";
        $searchResponse=array();
        if($searchKey)
        {
            $queryparam.=" WHERE programname like '%".$searchKey."%'";
        }
        $queryparam.=" ORDER BY programname ASC";

        $query.=$queryparam;
        $programResult=mysqli_query($this->connection, $query);
        if($programResult){            
            while($row=mysqli_fetch_array($programResult))
            {
                $searchResponse[]=$row;
            }
        }else{
            
            $searchResponse =$query;
        }
        return $searchResponse;
    }

    function findbyCenterName($searchKey){

        $query="SELECT * FROM tb_od_dhyankendra  WHERE ";
        $queryparam = "";
        $searchResponse=array();
        if($searchKey)
        {
            $queryparam.=" dhyankendraname like '%".$searchKey."%'  or Address1 like '%".$searchKey."%'  or Address2  like '%".$searchKey."%'";
        } 
        $queryparam.=" ORDER BY dhyankendraname ASC";
        $query.=$queryparam;
        $programResult=mysqli_query($this->connection, $query);
        if($programResult){            
            while($row=mysqli_fetch_array($programResult))
            {
                $searchResponse[]=$row;
            }
        }else{
            
            $searchResponse =$query;
        }
        return $searchResponse;
    }
    
}