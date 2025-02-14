<?php
class Book {
    private $title;
    private $author;
    private $price;

    public function __construct($title = "", $author = "", $price = 0.0) {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getPrice() {
        return $this->price;
    }


    public function saveToDatabase() {
        
        $host = "10.10.10.8";
        $username = "bookUser";
        $password = "book123";
        $dbname = "bookApp";

    
        $conn = new mysqli($host, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO books (title, author, price) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $this->title, $this->author, $this->price);

        if ($stmt->execute()) {
            echo "book saved successfully.";
        } else {
            echo "Error has occured : " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}

$book = new Book();
$book->setTitle("Mbala The Farmer");
$book->setAuthor("Richard Mabala");
$book->setPrice(7000);
$book->saveToDatabase();

?>