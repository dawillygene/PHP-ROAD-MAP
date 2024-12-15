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

$data = $user->index();
?>

<table class="table">
<thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">username</th>
    <th scope="col">password</th>
    <th scope="col">action</th>
    </tr>
</thead>
<tbody>


<?php
foreach($data as $d)
{
    echo "<tr scope='row'>";
    echo "<td>".$d["id"]."</td>";
    echo "<td>".$d["username"]."</td>";
    echo "<td>".$d["password"]."</td>";
    echo "<td><a href='edit.php?id=".$d["id"]."' >Edit</a>
    <a href='view.php?id=".$d["id"]."' >view</a>
     <a href='' >delete</a>
    </td>";
    echo "</tr>";
}

?>
</tbody>
</table>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>






