<?php 


class User{
    private $table = "user_tbl";
    private $conn;

public function __construct($connection){
    $this->conn = $connection;
}

public function savedata($username, $pass) {
   
    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
    $stmt = $this->conn->prepare("INSERT INTO $this->table (username, password) VALUES (?, ?)");
    if ($stmt) {
        $stmt->bind_param("ss", $username, $hashedPassword);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing the statement: " . $this->conn->error;
    }
}



}




?>