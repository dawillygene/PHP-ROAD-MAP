<?php
header("Content-Type: application/json");


$valid_token = "1030405TKD";


$headers = getallheaders();
if (!isset($headers["Authorization"])) {
    echo json_encode(["error" => "Missing Authorization header"]);
    exit;
}

$auth_header = $headers["Authorization"];
$token = str_replace("Bearer ", "", $auth_header);

if ($token !== $valid_token) {
    echo json_encode(["error" => "Invalid token"]);
    exit;
}


$teamMembers = [
    ["name" => "John Limo", "role" => "Developer", "email" => "john@example.com"],
    ["name" => "Jane Doe", "role" => "Project Manager", "email" => "jane@example.com"],
    ["name" => "Alice Brown", "role" => "Designer", "email" => "alice@example.com"]
];


echo json_encode(["members" => $teamMembers]);
?>
