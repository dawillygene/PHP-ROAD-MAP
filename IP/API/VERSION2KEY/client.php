<?php

$getUrl = 'http://localhost/PHP%20CODING/IP/API/VERSION2KEY/api.php?action=ping&key=geneofficial'; 
$getResponse = file_get_contents($getUrl);
echo "GET Response:\n";
echo $getResponse . "\n\n";

// --- Example 2: Sending a POST request to the API with the API key ---
// Prepare POST data including the API key.
$postData = http_build_query([
    'action' => 'greet',
    'name'   => 'Alice',
    'key'    => 'geneofficial'
]);

$options = [
    'http' => [
        'method'  => 'POST',
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'content' => $postData,
    ]
];
$context  = stream_context_create($options);
$postUrl = 'http://localhost/PHP%20CODING/IP/API/VERSION2KEY/api.php'; // Adjust URL if necessary.
$postResponse = file_get_contents($postUrl, false, $context);
echo "POST Response:\n";
echo $postResponse . "\n";
