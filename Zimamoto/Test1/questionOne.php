<?php
class Library{

    private $db;

    public function __construct(){
        $this->db = new mysqli("localhost","root","12@34","testOneDb");

        if($this->db->connect_error){
            echo "Error in connection database" . $this->db->connect_error;
        }
    }


 public function borrowBook($userid,$bookid){
    $borrow_date = date('Y-m-d');

    $sql = "INSERT INTO borrowed_books(user_id,book_id,borrow_date,status) VALUES (?,?,?,'borrowed')";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param('isi',$userid,$bookid,$borrow_date);

    if($stmt->execute()){
        return "book borrowed successfully";
    }else{
        return "Error in borrowing book";
    }

 }


 public function validationBorrowLimit($userId){
    $userId = (int) $userId;
    $query = "SELECT COUNT(*) AS borrowed_count FROM borrowed_books 
              WHERE user_id = $userId AND status = 'borrowed'";
    $result = $this->db->query($query);
    $row = $result->fetch_assoc();

    if ($row['borrowed_count'] >= 3) {
        return "Error: You have reached the limit of 3 books.";
    }

    return true;
}

public function returnBook($transactionId) {
   
    $returnBook = date('Y-m-d');
    $sql = "UPDATE borrowed_books SET status = 'returned', return_date = ? WHERE transaction_id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param('si', $returnBook, $transactionId);
    if ($stmt->execute()) {
        return "Book returned successfully";
    } else {
        return "Error returning book: " . $stmt->error;
    }
}







}







?>