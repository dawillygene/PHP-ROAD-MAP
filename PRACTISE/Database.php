<?php

class Database {
    private $host = "localhost";
    private $username = "dawilly";
    private $password = "babalaolau";
    private $db = "users_db";
    private $conn;

    public function __toString() {
        return "[Database Object]";
    }

    // Establish a connection to the database
    public function connection() {
        // Check if a connection already exists
        if ($this->conn) {
            return $this->conn;
        }

        // Create a new connection
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db);

        // Check for connection errors
        if ($this->conn->connect_error) {
            throw new Exception("Connection failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }

    // Close the connection
    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
            $this->conn = null;
        }
    }

    // Ensure the connection is closed when the object is destroyed
    public function __destruct() {
        $this->closeConnection();
    }
}

?>
