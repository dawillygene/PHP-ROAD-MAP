<?php 


class User{

private $table = "user_tbl";
private $conn;


public function __construct($connection){
    $this->conn = $connection;
}

public function getdata(){
    $sql = "select * from $this->table";
    $result = $this->conn->query($sql);
    // return $result->fetch_all(MYSQLI_ASSOC);
    return $result->fetch_all();
}

public function insertData($name,$pass) : void
{

    $sql = "INSERT into $this->table(username,password) values('$name','$pass')";
    
    if($this->conn->query($sql)){
        echo "data inserted";
    }else{
        echo "failed to insert data";
    }

}



}

