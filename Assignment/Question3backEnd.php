<?php
$books = [
    [
        "title" => "Kufa Kuzikana",
        "author" => "Euphrase Kezilahabi",
        "genre" => "Novel",
        "year" => 2017,
        "isbn" => "9789976603239"
    ],
    [
        "title" => "Dunia Uwanja wa Fujo",
        "author" => "Ebrahim Hussein",
        "genre" => "Play",
        "year" => 2001,
        "isbn" => "9789976911204"
    ],
    [
        "title" => "Rosa Mistika",
        "author" => "Mathias E. Mnyampala",
        "genre" => "Poetry",
        "year" => 2024,
        "isbn" => "9789976911211"
    ],
    [
        "title" => "Siku Njema",
        "author" => "Ken Walibora",
        "genre" => "Novel",
        "year" => 2010,
        "isbn" => "9789987871081"
    ],
    [
        "title" => "Mstahiki Meya",
        "author" => "Ebrahim Hussein",
        "genre" => "Play",
        "year" => 1999,
        "isbn" => "9789976911198"
    ],
    [
        "title" => "Kilio cha Haki",
        "author" => "Julius K. Nyerere",
        "genre" => "Poetry",
        "year" => 1979,
        "isbn" => "9789976911228"
    ]
];


$headers = getallheaders();

if (!isset($headers["Authorization"]) || $headers["Authorization"] !== "Bearer LibraryBearerToken123") {
    http_response_code(401);
    echo json_encode(["success" => false, "message" => "invalid token"]);
    exit;
}

$requestBody = json_decode(file_get_contents("php://input"), true);

if (!isset($requestBody["requester"]) || $requestBody["requester"] !== "library_user") {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "invalid Requester"]);
    exit;
}

if (!isset($requestBody["action"]) || $requestBody["action"] !== "fetch_books") {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "invalid action"]);
    exit;
}

http_response_code(200);
echo json_encode(["success" => true, "books" => $books]);

?>