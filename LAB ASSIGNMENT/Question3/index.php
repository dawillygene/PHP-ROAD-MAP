

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="User.php" method="POST">
<input type="text" name="username" id="" placeholder="username">
<input type="password" name="password" id="" placeholder="password">
<input type="submit" name="" id="">
</form>


</body>
</html>

<?php
include "Database.php";
include "User.php";

$db = new Database();
$user = new User($db->connection());

// if($_REQUEST == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user->savedata($username, $password); 
// }

?>