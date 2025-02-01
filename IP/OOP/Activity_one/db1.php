<?php   

class Database{

private $host = "localhost";
private $name = "dawilly";
private $pass = "babalaolau";
private $db = "php_practical";

private $conn;


public function connection(){

$this->conn = mysqli_connect($this->host,$this->name,$this->pass);

  if($this->conn->connect_error){
    return $this->conn->connect_error;
  }

$this->conn->select_db($this->db) or die("Couldn't connect to the databae");

return $this->conn;


}



}





?>