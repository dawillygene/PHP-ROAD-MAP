<?php

$username = $_POST['username'];
$password = $_POST["password"];


$host = "192.168.50.34";
$name = "admin";
$pass = "1234ere";
$db = "users_db";


$conn = new mysqli($host,$name,$pass,$db);

if($conn->connect_error){
    die("fail to connect" . $conn->connect_error );

}


$sql = "INSERT INTO user_tb(username,password) values('$username','$password')";

if($conn->query($sql) == TRUE){
    echo "data saved successfully";
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

?>