<?php 

class Database{

private  $host = 'localhost';
private  $username = 'dawilly';

private  $password = 'babalaolau';

private $dbname = 'php_practical';

private $conn;



public function connection(){

$this->conn = mysqli_connect($this->host,$this->username,$this->password);


if($this->conn->connect_error){
  echo "fail to connect";
}
$this->conn->select_db($this->dbname) or die($this->conn->connect_error);

return $this->conn;

}


}


?>