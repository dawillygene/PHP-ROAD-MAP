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

    public function connection() {
        if ($this->conn) {
            return $this->conn;
        }

        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db);

    
        if ($this->conn->connect_error) {
            throw new Exception("Connection failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }

    
    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
            $this->conn = null;
        }
    }

  
    public function __destruct() {
        $this->closeConnection();
    }
}

?>
