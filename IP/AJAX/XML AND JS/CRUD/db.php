<?php

class Database{

private $servername = "localhost";
private $username = "dawilly";
private $password = "babalaolau";
private $dbname = "ajax_crud";
private $conn;

function connection(){

if($this->conn){
    return $this->conn;
}

$this->conn = new mysqli($this->servername,$this->username,$this->password);

if($this->conn->connect_error){
    die("connection error " . $this->conn->connect_error);
    exit;
}

$this->conn->select_db($this->dbname) or die("The server fail to connect to the data base");


return $this->conn;
}

}

?>