<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<?php
require_once "Database.php";
require "User.php";

$conn = new Database();
$user = new User($conn->connection());



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentid = $_POST['id'];
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];   
    $id = $user->update($currentid , $username, $password);
}

$id = (int) $_GET['id'];

$data = $user->show($id);

?>

<div class="container mt-4">
    <h2>Edit User</h2>

    <form action="edit.php?id=<?php echo $id; ?>" method="POST">

    <input type="number" name="id" value="<?php echo $id; ?>" hidden>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($data['username']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Leave empty to keep the same">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
