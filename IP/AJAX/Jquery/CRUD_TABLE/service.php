<?php 

header("Content-Type:application/json");

function connection(){
    $host = "localhost";
    $user = "dawilly";
    $pass = "babalaolau";
    $db = "ajax_crud";

    $conn = new mysqli($host,$user,$pass,$db);
    if($conn->connect_error){
        echo json_encode(["status" => "error","message"=>$conn->connect_error]);
    }
    return $conn;
}


function sanitize($conn,$data){
 return $conn->real_escape_string(trim($data));
}


$method = $_SERVER["REQUEST_METHOD"];

if($method == "POST"){

$conn = connection();
$json_data = file_get_contents("php://input");
$data = json_decode($json_data,true);

$name = sanitize($conn,$data['username']);
$pass = sanitize($conn,$data['password']);
$email = sanitize($conn,$data['email']);

$password = password_hash($pass,PASSWORD_DEFAULT);

$sql = "INSERT INTO MYDETAIL(username,email,password) VALUES('$name','$email','$password')";
if($conn->query($sql) == TRUE){
     echo json_encode(["status"=>"success","message"=>"Data inserted successfuly"]);
}else{
    echo json_encode(["status"=>"error","message"=>$conn->error]);
}

}

if($method == "GET"){
    $conn = connection();
    $sql = "SELECT * FROM MYDETAIL ORDER BY id DESC";
    $result = $conn->query($sql);
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
}

?>