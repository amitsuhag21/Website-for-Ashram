 <?php

class ProgramCategoryService {
    private $connection;
    public function __construct($db)
    {
        $this->connection = $db;
    }

    function findAll()
    {
        $query="SELECT * FROM tb_od_programcategory";
        $response=array();
        $result=mysqli_query( $this->connection, $query);
        while($row=mysqli_fetch_array($result))
        {
            $response[]=$row;
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }


    function find($id=0)
    {
        $query="SELECT * FROM tb_od_programcategory";
        if($id != 0)
        {
            $query.=" WHERE categoryid=".$id." LIMIT 1";
        }
        $response=array();
        $result=mysqli_query($this->connection, $query);
        if($result){            
            while($row=mysqli_fetch_array($result))
            {
                $response[]=$row;
            }
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}