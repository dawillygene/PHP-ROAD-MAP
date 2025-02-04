<?php 

class User {

    private $conn;
    private $table;

    public function __construct($connection, $table = 'users'){
        $this->conn = $connection;
        $this->table = $table;
    }

    public function sanitize($data){
        return $this->conn->real_escape_string($data);
    }

    public function create($name, $email, $phone){

        $name  = $this->sanitize($name);
        $email = $this->sanitize($email);
        $phone = $this->sanitize($phone);

        $sql = "INSERT INTO " . $this->table . " (name, email, phone) VALUES ('$name', '$email', '$phone')";

        if ($this->conn->query($sql)) {
            echo "User added successfully.";
        } else {
            echo "Error: " . $this->conn->error;
        }
    }


public function readAlldata(){

$sql = "select * from ". $this->table ." ORDER BY id DESC";
$result = $this->conn->query($sql);
$users = array();  
        
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $users[] = $row; 
    }
}
echo json_encode($users);

}


public function delete($id){

$sql = "delete from ".$this->table ." where id = $id";
if($this->conn->query($sql)){
    echo "The data is successfully deleted";
}
else{
    echo "error has occured";
}

 }


}




?>
