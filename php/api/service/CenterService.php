 <?php

class CenterService {
    private $connection;
    public function __construct($db)
    {
        $this->connection = $db;
    }

    function findAll()
    {
        $query="SELECT * FROM tb_od_dhyankendra where status = 1";
        $response=array();
        $result=mysqli_query( $this->connection, $query);
        if($result){ 
            while($row=mysqli_fetch_array($result))
            {
                $response[]=$row;
            }
        }
        return $response;
    }


    function find($id=0)
    {
        $query="SELECT * FROM tb_od_dhyankendra";
        if($id != 0)
        {
            $query.=" WHERE status =1 and dhyankendraid=".$id." LIMIT 1";
        }
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
    
}