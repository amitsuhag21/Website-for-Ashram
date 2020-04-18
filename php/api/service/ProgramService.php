 <?php

class ProgramService {
    private $connection;
    public function __construct($db)
    {
        $this->connection = $db;
    }

    function findAll()
    {
        $query="SELECT * FROM tb_od_program";
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
        $query="SELECT * FROM tb_od_program";
        if($id != 0)
        {
            $query.=" WHERE programid=".$id." LIMIT 1";
        }
        $response;
        $result=mysqli_query($this->connection, $query);
        if($result){            
            while($row=mysqli_fetch_array($result))
            {
                $response[]=$row;
            }
        }
/*        header('Content-Type: application/json');
        echo json_encode($response);*/
        return $response;
    }

    function insert(Array $data)
    {
        $PackageId=$data["PackageId"];
        $FeatureId=$data["FeatureId"];
        echo $query="INSERT INTO packagefeature SET PackageId='".$PackageId."', FeatureId='".$FeatureId."'";
        if(mysqli_query($this->connection, $query))
        {
            $response=array(
                'status' => 1,
                'status_message' =>'packagefeature Added Successfully.'
            );
        }
        else
        {
            $response=array(
                'status' => 0,
                'status_message' =>'packagefeature Addition Failed.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function update($id,Array $post_vars)
    {
        $post_vars = json_decode(file_get_contents("php://input"),true);
        $PackageId=$data["PackageId"];
        $FeatureId=$data["FeatureId"];
        echo $query="UPDATE packagefeature SET PackageId='".$PackageId."', FeatureId='".$FeatureId." WHERE PackageId=".$id;
        if(mysqli_query($this->connection, $query))
        {
            $response=array(
                'status' => 1,
                'status_message' =>'packagefeature Updated Successfully.'
            );
        }
        else
        {
            $response=array(
                'status' => 0,
                'status_message' =>'packagefeature Updation Failed.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }


    function delete($id)
    {
        $query="DELETE FROM packagefeature WHERE PackageId=".$id;
        if(mysqli_query($this->connection, $query))
        {
            $response=array(
                'status' => 1,
                'status_message' =>'Package Feature Deleted Successfully.'
            );
        }
        else
        {
            $response=array(
                'status' => 0,
                'status_message' =>'Package Feature Deletion Failed.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
}