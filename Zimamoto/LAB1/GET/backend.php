<?php

$headers = getallheaders();
$bearerToken = isset($headers['Authorization']) ? $headers['Authorization'] : ""; // Extract Authorization header

$username = isset($_GET['username']) ? $_GET['username'] : ""; // Extract username from query parameters

if ($bearerToken === "Bearer 10304050RTD" && $username === "MEMBERS") {
    $teamMembers = [
        ['name' => 'John-Limo', 'role' => 'Developer', 'email' => 'john@example.com'],
    ];

    header("Content-Type: application/json");
    echo json_encode($teamMembers);
} else {
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode(['error' => 'Unauthorized']);
}
?>

