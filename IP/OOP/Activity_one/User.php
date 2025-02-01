<?php 
 
 class User{

private $conn;
private $table = 'users';

public function __construct($connection){

     $this->conn = $connection;
}


public function getUsers(){
    $sql  = "SELECT * FROM $this->table";
    $result = $this->conn->query($sql);
    return $result->fetch_all();
}


 }


?>