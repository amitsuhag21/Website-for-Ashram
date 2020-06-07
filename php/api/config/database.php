<?php
class Database{
  
    // specify your own database credentials
    private $servername = "localhost";
    private $dbname = "oshodhara";
/*    private $username = "gallerytest";
    private $password = "CF^xv,*90,$;";*/
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection(){  
        $this->conn = null;  
        try{
            $con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
            if (mysqli_connect_errno()) {
                exit();
            } else {
                $this->conn = $con;
            }           
        }catch(Exception $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
?>
