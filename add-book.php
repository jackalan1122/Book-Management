<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];

    $sql = "INSERT INTO books (title, author) VALUES ('$title', '$author')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Book added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
    
    header("Location: index.php");
    exit();
}
?>