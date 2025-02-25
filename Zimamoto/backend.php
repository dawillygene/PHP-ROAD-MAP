<?php

header('Content-Type: application/json');

$headers = getallheaders();
$bearerToken = $headers["Authorization"];
$requester = $_POST['requester'] ?? '';
$action = $_POST['action'] ?? '';

$validToken = "LibraryBearerToken123";
$validRequester = "library_user";
$validAction = "fetch_books";

if ($bearerToken !== "Bearer $validToken" || $requester !== $validRequester || $action !== $validAction) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized access.']);
    exit;
}

// Simulated database of books
$books = [
    ['title' => '1984', 'author' => 'George Orwell', 'genre' => 'Dystopian', 'year' => '1949', 'ISBN' => '1234567890'],
    ['title' => 'To Kill a Mockingbird', 'author' => 'Harper Lee', 'genre' => 'Southern Gothic', 'year' => '1960', 'ISBN' => '0987654321'],
    // Add more books as needed
];

// Respond with a JSON object containing the list of books
echo json_encode($books);

?>