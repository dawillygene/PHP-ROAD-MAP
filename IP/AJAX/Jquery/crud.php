<?php
// Database connection settings
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "ajax_crud";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Determine which action to perform
$action = isset($_POST['action']) ? $_POST['action'] : '';

switch($action) {

    case 'create':
        // Create a new user
        $name  = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $phone = $conn->real_escape_string($_POST['phone']);
        $sql = "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')";
        if ($conn->query($sql) === TRUE) {
            echo "User added successfully.";
        } else {
            echo "Error: " . $conn->error;
        }
        break;

    case 'read':
        // Read and display all users
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['phone']."</td>
                        <td>
                          <button class='editUser' data-id='".$row['id']."'>Edit</button>
                          <button class='deleteUser' data-id='".$row['id']."'>Delete</button>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No users found.</td></tr>";
        }
        break;

    case 'getUser':
        // Retrieve data for a single user (for editing)
        $id = intval($_POST['id']);
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo json_encode($result->fetch_assoc());
        } else {
            echo json_encode([]);
        }
        break;

    case 'update':
        // Update user details
        $id    = intval($_POST['id']);
        $name  = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $phone = $conn->real_escape_string($_POST['phone']);
        $sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "User updated successfully.";
        } else {
            echo "Error: " . $conn->error;
        }
        break;

    case 'delete':
        // Delete a user
        $id = intval($_POST['id']);
        $sql = "DELETE FROM users WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "User deleted successfully.";
        } else {
            echo "Error: " . $conn->error;
        }
        break;

    default:
        echo "Invalid action.";
        break;
}

$conn->close();
?>
