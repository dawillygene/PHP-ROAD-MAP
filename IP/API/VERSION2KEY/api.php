<?php
// api.php

// Set the content type to JSON.
header('Content-Type: application/json');

// Define your secret API key.
$apiKey = 'geneofficial';

// Get the provided API key from either GET or POST.
$providedKey = isset($_REQUEST['key']) ? $_REQUEST['key'] : '';

// If the API key is missing or invalid, return an error.
if ($providedKey !== $apiKey) {
    echo json_encode(['error' => 'Invalid API key']);
    exit;
}

// Determine the request method.
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod === 'GET') {
    // GET Request: Check the action parameter.
    $action = isset($_GET['action']) ? $_GET['action'] : '';

    if ($action === 'ping') {
        // A simple GET action: return a "pong" response.
        echo json_encode(['response' => 'pong']);
    } else {
        echo json_encode(['error' => 'Invalid action for GET request']);
    }
} elseif ($requestMethod === 'POST') {
    // POST Request: Get the action parameter.
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if ($action === 'greet') {
        // Retrieve the "name" parameter (default to "Guest" if not provided)
        $name = isset($_POST['name']) ? $_POST['name'] : 'Guest';
        echo json_encode(['message' => "Hello, $name!"]);
    } else {
        echo json_encode(['error' => 'Invalid action for POST request']);
    }
} else {
    echo json_encode(['error' => 'Unsupported request method']);
}
