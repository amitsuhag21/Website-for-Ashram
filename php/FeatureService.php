<?php

class FeatureService {
    private $connection;
    public function __construct($db)
    {
        $this->connection = $db;
    }

    function findAll()
    {
        $query="SELECT * FROM feature";
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
        //global $connection;
        $query="SELECT * FROM feature";
        if($id != 0)
        {
            $query.=" WHERE id=".$id." LIMIT 1";
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
        //global $connection;
        $FeatureId=$data["FeatureId"];
        $FeatureName=$data["FeatureName"];
        $xtudyMessage=$data["xtudyMessage"];
        $xtudyConnect=$data["xtudyConnect"];
        $xtudyERP=$data["xtudyERP"];
        $customizePlan=$data["customizePlan"];
        $addOnPrice=$data["addOnPrice"];
        echo $query="INSERT INTO feature SET FeatureId='".$FeatureId."', FeatureName='".$FeatureName."',xtudyMessage='".$xtudyMessage."', xtudyConnect='".$xtudyConnect."',xtudyERP='".$xtudyERP."', customizePlan='".$customizePlan."', addOnPrice='".$addOnPrice."'";
        if(mysqli_query($this->connection, $query))
        {
            $response=array(
                'status' => 1,
                'status_message' =>'Feature Added Successfully.'
            );
        }
        else
        {
            $response=array(
                'status' => 0,
                'status_message' =>'Feature Addition Failed.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function update($id,Array $post_vars)
    {
        //global $connection;
        $data = json_decode(file_get_contents("php://input"),true);
        $FeatureId=$data["FeatureId"];
        $FeatureName=$data["FeatureName"];
        $xtudyMessage=$data["xtudyMessage"];
        $xtudyConnect=$data["xtudyConnect"];
        $xtudyERP=$data["xtudyERP"];
        $customizePlan=$data["customizePlan"];
        $addOnPrice=$data["addOnPrice"];
        $query="UPDATE feature SET FeatureId='".$FeatureId."', FeatureName='".$FeatureName."',xtudyMessage='".$xtudyMessage."', xtudyConnect='".$xtudyConnect."',xtudyERP='".$xtudyERP."', customizePlan='".$customizePlan."', addOnPrice='".$addOnPrice."' WHERE id=".$id;
        if(mysqli_query($this->connection, $query))
        {
            $response=array(
                'status' => 1,
                'status_message' =>'Feature Updated Successfully.'
            );
        }
        else
        {
            $response=array(
                'status' => 0,
                'status_message' =>'Feature Updation Failed.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }


    function delete($id)
    {
        $query="DELETE FROM feature WHERE id=".$id;
        if(mysqli_query($this->connection, $query))
        {
            $response=array(
                'status' => 1,
                'status_message' =>'Feature Deleted Successfully.'
            );
        }
        else
        {
            $response=array(
                'status' => 0,
                'status_message' =>'Feature Deletion Failed.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
}