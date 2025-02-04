<?php

$getUrl = 'http://localhost/PHP%20CODING/IP/API/api.php?registrationNo=T22-03-13063';  

$getResponse = file_get_contents($getUrl);
echo "GET Response:\n";
echo $getResponse . "\n\n";

// --- Example 2: Sending a POST request to the API ---

// Prepare the POST data
$postData = http_build_query([
    'action' => 'greet',
    // 'name'   => 'DAWILLY GENE'
]);

// Create a stream context for a POST request
$options = [
    'http' => [
        'method'  => 'POST',
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'content' => $postData,
    ]
];
$context  = stream_context_create($options);
$postUrl = 'http://localhost/PHP%20CODING/IP/API/api.php';  // Adjust the URL if needed.
$postResponse = file_get_contents($postUrl, false, $context);
echo "POST Response:\n";
echo $postResponse . "\n";
