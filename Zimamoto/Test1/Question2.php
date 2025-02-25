<?php 
class Registration{
 
    private $db;

    public function __construct(){
        $this->db = new mysqli("localhost","root","12@34","testOneDb");

        if($this->db->connect_error){
            echo "Error in connection database" . $this->db->connect_error;
        }
    }



public function ValidateEmail($email){


$query = "SELECT COUNT(*) AS email_count FROM users WHERE email = ?";
$stmt = $this->db->prepare($query);
$stmt->bind_param('s',$email);
$stmt->execute();
$result =$stmt->get_result();
$row = $result->fetch_assoc();
if($row["email_count"] > 0){
    return "Error: Email already in use.";
}
return true;
}


public function SecurePassword($pass){

$hashed_password = password_hash($pass,PASSWORD_DEFAULT);
return $hashed_password;
}


public function insertUserData($name, $email, $pass) {
    $emailCheck =$this-> ValidateEmail($email);
    if ($emailCheck != true) {
        return $emailCheck;
    }

    
    $hashedPassword = $this->SecurePassword($pass);

    $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $this->db->prepare($query);

    if (!$stmt) {
        return "Error in preparing the statement: " . $this->db->error;
    }

    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        return "User registered successfully!";
    } else {
        return "Error in user registration: " . $stmt->error;
    }
}






}




?>