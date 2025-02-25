<?php

class Book {
    private $title;
    private $author;
    private $price;
    private $db;

    public function __construct($title = '', $author = '', $price = 0.0) {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;

        // Create a new database connection
        $this->db = new mysqli("10.10.10.8", "bookUser", "book123", "bookApp");
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    public function saveToDatabase() {
        $query = "INSERT INTO books (title, author, price) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sds", $this->title, $this->author, $this->price);

        if ($stmt->execute()) {
            echo "Book saved successfully.";
        } else {
            echo "Error saving book: " . $stmt->error;
        }

        $stmt->close();
    }
}

// Example usage:
$book = new Book("1984", "George Orwell", 8.99);
$book->saveToDatabase();

?>