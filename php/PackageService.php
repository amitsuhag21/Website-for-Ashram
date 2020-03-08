<?php

class PackageService {
    private $connection;
    public function __construct($db)
    {
        $this->connection = $db;
    }

    function findAll()
    {
        $query="SELECT * FROM package";
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
        $query="SELECT * FROM package";
        if($id != 0)
        {
            $query.=" WHERE PackageId=".$id." LIMIT 1";
        }
        $response=array();
        $result=mysqli_query($this->connection, $query);
        while($row=mysqli_fetch_array($result))
        {
            $response[]=$row;
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function insert(Array $data)
    {
        $PackageId=$data["PackageId"];
        $PackageName=$data["PackageName"];
        $BasePrice=$data["BasePrice"];
        $PackageDetails=$data["PackageDetails"];
        echo $query="INSERT INTO package SET PackageId='".$PackageId."', PackageName='".$PackageName."', BasePrice='".$BasePrice."', PackageDetails='".$PackageDetails."'";
        if(mysqli_query($this->connection, $query))
        {
            $response=array(
                'status' => 1,
                'status_message' =>'Package Added Successfully.'
            );
        }
        else
        {
            $response=array(
                'status' => 0,
                'status_message' =>'Package Addition Failed.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function update($id,Array $post_vars)
    {
        $post_vars = json_decode(file_get_contents("php://input"),true);
        $PackageId=$post_vars["PackageId"];
        $PackageName=$post_vars["PackageName"];
        $BasePrice=$data["BasePrice"];
        $PackageDetails=$data["PackageDetails"];
        echo $query="UPDATE package SET PackageId='".$PackageId."', PackageName='".$PackageName."', BasePrice='".$BasePrice."', PackageDetails='".$PackageDetails." WHERE id=".$id;
        if(mysqli_query($this->connection, $query))
        {
            $response=array(
                'status' => 1,
                'status_message' =>'Package Updated Successfully.'
            );
        }
        else
        {
            $response=array(
                'status' => 0,
                'status_message' =>'Package Updation Failed.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }


    function delete($id)
    {
        $query="DELETE FROM package WHERE PackageId=".$id;
        if(mysqli_query($this->connection, $query))
        {
            $response=array(
                'status' => 1,
                'status_message' =>'Package Deleted Successfully.'
            );
        }
        else
        {
            $response=array(
                'status' => 0,
                'status_message' =>'Package Deletion Failed.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
}