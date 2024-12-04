<?php 
@require("db.php");
@require("User.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php learning</title>
</head>
<body>    
<?php 

$db = new Database();
$conn = $db->connection();
$user = new User($conn);
$userList = $user->getUsers();

echo "<ol>";

foreach($userList as $value){

echo "<li>".$value[0] ."<li>";
echo "<li>".$value[1] ."<li>";
echo "<li>".$value[2] ."<li>";
echo "<li>".$value[3] ."<li>";
echo "<br />";
}
echo "<ol>";

?>
</body>
</html>