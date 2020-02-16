<?php
	Class dbUtils{
		var $servername = "localhost";
		var $username = "root";
		var $password = "";
		var $dbname = "xtudy_beta";
		var $conn;
		function getDatabaseConn() {
			$con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
			if (mysqli_connect_errno()) {
				exit();
			} else {
				$this->conn = $con;
			}
			return $this->conn;
		}
	} 
	$conn = new dbUtils();
	$conn->getDatabaseConn();
?>