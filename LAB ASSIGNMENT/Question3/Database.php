<?php 
class Database{
private $host = 'localhost';
private $username = 'dawilly';
private $password = 'babalaolau';
private $dbname = 'users_db';

private $conn;

public function connection(){
    $this->conn = mysqli_connect($this->host,$this->username,$this->password);
    if(!$this->conn){
      echo "No DB COnnection ";
      exit;
    }
   $this->conn->select_db($this->dbname) or die("Couldn't connect to database");
   return $this->conn;
}

}

?>