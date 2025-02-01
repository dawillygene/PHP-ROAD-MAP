<?php 
 
 class Database{
    private $host = "localhost";
    private $username = "dawilly";
    private $pass = "babalaolau";
    private $db = "users_db";
    private $conn;


    public function connection(){

    if($this->conn){
        return $this->conn;
    }

    $this->conn = new mysqli($this->host,$this->username,$this->pass);

    if($this->conn->connect_error){
        echo "There is no connection";
        exit;
    }
    $this->conn->select_db($this->db) or die("There is no connection to the database");
    return $this->conn;
         
    }

 }
?>