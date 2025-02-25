<?php

$headers = getallheaders();
$bearerToken = isset($headers['Authorization']) ? $headers['Authorization'] : ''; // Extract Authorization header

$requestBody = json_decode(file_get_contents('php://input'),true);
$username = $requestBody['username'];



$requestBody = json_decode(file_get_contents('php://input'), true); // Get JSON body
 $username = isset($requestBody['username']) ? $requestBody['username'] : ''; // Extract username


if ($bearerToken === "Bearer 10304050RTD" && $username === "MEMBERS") {
    
    $teamMembers = [
        ['name' => 'John-Limo', 'role' => 'Developer', 'email' => 'john@example.com'],
  
    ];

    header('Content-Type: application/json');
    echo json_encode($teamMembers);
} else {
    // Step 5: If invalid, respond with an error
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode(['error' => 'Unauthorized']);
}
?>