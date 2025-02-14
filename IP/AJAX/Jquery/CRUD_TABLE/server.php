<?php
header("Content-Type: application/json");
function connection() {
    $host = "localhost";
    $username = "dawilly";
    $pass = "babalaolau";
    $db = "ajax_crud";

    $conn = new mysqli($host, $username, $pass, $db);
    if ($conn->connect_error) {
        die(json_encode(["status" => "error", "message" => $conn->connect_error]));
    }
    return $conn;
}

function sanitize($conn, $data) {
    return $conn->real_escape_string($data);
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "POST") {
    $conn = connection();

    // Read the JSON input
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data, true); 


 


    // Check if all required fields exist
    if (!isset($data['username'], $data['email'], $data['password'])) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        exit;
    }
    

    // Sanitize inputs
    $username = sanitize($conn, $data['username']);
    $email = sanitize($conn, $data['email']);
    $password = sanitize($conn, $data['password']);

    $sql = "INSERT INTO MYDETAIL (username, email, password) VALUES ('$username', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Data inserted successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error inserting data"]);
    }
} 

else if ($method == "GET") {
    $conn = connection();
    $sql = "SELECT * FROM MYDETAIL ORDER BY id DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_all(MYSQLI_ASSOC)); // Return all rows as JSON
    } else {
        echo json_encode([]); // Return an empty array if no data found
    }
}
?>
