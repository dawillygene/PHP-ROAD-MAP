<?php 

include "db.php";
include "user.php";

$con = new Database();
$conn= $con->connection();
$user = new User($con->connection());


 $action = isset($_GET['action']) ? $_GET['action'] : $_POST['action'];
 
 switch($action) {
 
    case 'create':
        if($_POST['action'] == "create"){
            $user->create($_POST['name'],$_POST['email'],$_POST['phone']);
        }else{
            $user->create($_GET['name'],$_GET['email'],$_GET['phone']);
        }
    
         break;

    case 'readjson':
            $user->readAlldata();
            break;
        
 
    case 'update':
         $id    = intval($_GET['id']);
         $name  = $conn->real_escape_string($_GET['name']);
         $email = $conn->real_escape_string($_GET['email']);
         $phone = $conn->real_escape_string($_GET['phone']);

         $sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id=$id";

         if ($conn->query($sql) === TRUE) {
             echo "User updated successfully.";
         } else {
             echo "Error: " . $conn->error;
         }
         break;
 
    case 'delete':
        if($_POST['action'] == "delete"){
        $user->delete(intval($_POST['id']));
    }
         break;
 
     default:
         echo "Invalid action.";
         break;
 }
 
 $conn->close();


?>