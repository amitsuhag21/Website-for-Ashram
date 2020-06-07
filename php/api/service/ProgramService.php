 <?php

class ProgramService {
    private $connection;
    public function __construct($db)
    {
        $this->connection = $db;
    }

    function findAll()
    {
        $query="SELECT * FROM tb_od_program where status = 1";
        $response=array();
        $result=mysqli_query( $this->connection, $query);
        while($row=mysqli_fetch_array($result))
        {
            $response[]=$row;
        }
        return $response;
    }


    function find($id=0)
    {
        $query="SELECT * FROM tb_od_program";
        if($id != 0)
        {
            $query.=" WHERE programid=".$id." LIMIT 1";
        }
        $response =array();
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