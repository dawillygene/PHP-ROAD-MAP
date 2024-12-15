<?php

class User{

    private $table ="user_tbl";
    private $conn;


  public function __construct($connection){
    $this->conn = $connection;
  }
 
  public function index(){

  $sql = "SELECT * FROM $this->table";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->get_result();
  return $result->fetch_all(MYSQLI_ASSOC);
  }


public function insertData($username,$password){

$hashpass = password_hash($password,PASSWORD_DEFAULT);
$sql = "INSERT INTO $this->table (username,password) values(?,?)";
$stmt=$this->conn->prepare($sql);
$stmt->bind_param("ss",$username,$hashpass);
if($stmt->execute()){
    echo "Data inserted";
}else{
    echo "something bad occured";
}

}

public function update($id, $username, $password){

    if (!is_int($id) && $id <= 0) {
        echo "Invalid Id: " . htmlspecialchars($id);
        return;
    }


    if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
        echo "Invalid username format.";
        return;
    }


    $hashpass = '';
    if (!empty($password)) {
        $hashpass = password_hash($password, PASSWORD_BCRYPT);
    }


    $sql = "UPDATE $this->table SET username = ?, password = ? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);

    if (!$stmt) {
  
        error_log("Statement preparation failed: " . $this->conn->error);
        echo "Something went wrong. Please try again.";
        return;
    }


    if (empty($password)) {
        $stmt->bind_param("si", $username, $id);
    } else {
        $stmt->bind_param("sss", $username, $hashpass, $id);
    }


    if ($stmt->execute()) {
        echo "Data updated successfully.";
    } else {
 
        error_log("Update failed: " . $stmt->error);
        echo "Something bad occurred. Please try again later.";
    }

    // Close statement
    $stmt->close();
}


public function edit($id){

 if(!is_int($id) || $id <= 0 ){
    echo "Invalid Id".$id;
    return;
 }


$sql = "SELECT id,username,password FROM $this->table WHERE id = ?";

 $stmt = $this->conn->prepare($sql);
 if(!$stmt){
    echo "Statement Preparation Failed" .$this->conn->error;
    return;
 }

 $stmt->bind_param("i",$id);

 $stmt->execute();

 $result = $stmt->get_result();

 $data = $result->fetch_all(MYSQLI_ASSOC);

 $stmt->close();

 return  $data;


}


public function show($id){

    if(!is_int($id) || $id <= 0){
        echo "Invalid Id";
        exit;
    }

$sql = "SELECT username,password FROM $this->table WHERE id = ?";

$stmt = $this->conn->prepare($sql);

if(!$stmt){
    echo "Statement Preparation Failed" . $stmt->error;
    return;
}

$stmt->bind_param("i",$id);

$stmt->execute();

$result = $stmt->get_result();
$data = $result->fetch_assoc();

$stmt->close();

return $data;

}

}