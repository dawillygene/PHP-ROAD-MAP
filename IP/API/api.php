<?php



header('Content-Type: application/json');

$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod === 'GET') {

    $action = isset($_GET['registrationNo']) ? $_GET['registrationNo'] : '';

    if ($action === 'T22-03-13063') {

            echo json_encode(['response' => 'ELIA WILLIAM MARIKI , MALE,25']);
    }else{
        echo json_encode(['response' => 'UNKNOWN STUDENT']);
    }
} elseif ($requestMethod === 'POST') {
 
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if ($action === 'greet') {
       
        $name = isset($_POST['name']) ? $_POST['name'] : 'Guest';
        echo json_encode(['message' => "Hello, $name!"]);
    } else {
        echo json_encode(['error' => 'Invalid action for POST request']);
    }
} else {
    echo json_encode(['error' => 'Unsupported request method']);
}
