<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/php_error.log');


include_once "Database.php";
include_once "User.php";

try {
 
    $db = new Database();
    $conn = $db->connection();
    $user = new User($conn);
    // $user->insertData("wakala msomi","kanitangaze");

    $data = $user->getdata();

    print_r($data);
    echo "<br />";
    echo "<br />";
    foreach ($data as $row) {
      echo $row['1']; 
      echo "<br />";
      echo $row['2'];
      echo "<br />";
      echo "<br />";
        // print_r($row);
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}



?>
