<?php 
function connection(){
    $server = "localhost";
    $username = "dawilly";
    $password = "babalaolau";
    $db = "URL";

    $conn = new mysqli($server,$username,$password);
    if($conn->connect_error){ 
        return "error in connection to database";
    }
    $conn->select_db($db) or die("Cant select database");
    return $conn;
}

if($_SERVER['REQUEST_METHOD']==="POST"){

    $conn = connection();

    $url =$conn->real_escape_string(trim($_POST['url']));

    $desc =$conn->real_escape_string(trim($_POST['desc']));

    $sql = "INSERT INTO Urltable(url,des) values('$url','$desc')";
    
    if($conn->query($sql)){

        echo "data inserted successfully";

    }else{

        echo "error occured during data insertion";

    }
$conn->close();
}

$conn = connection();

$sql = "select * from Urltable ORDER BY id desc";

$result =$conn->query($sql);

if($result->num_rows > 0){

    echo "<table><thead><th>URL</th><th>description</th></thead><tbody>";   

    while($row = $result->fetch_assoc()):
        echo "<tr><td>{$row['url']}</td><td>{$row['des']}</td></tr>";    
    endwhile;
    echo "</tbody></table>";

}
?>