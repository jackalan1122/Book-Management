<?php
include "db.php";

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];

    $sql = "UPDATE books SET status='Borrowed' WHERE id=$book_id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Book borrowed successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    header("Location: index.php");
    exit();
}
?>
