<?php
include "db.php";
$result = $conn->query("SELECT * FROM books");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="hero">
        <div class="container">
            <div class="content">
                <h1 class="hero-text">Book Management System</h1>
            </div>
        </div>
    </section>
    <h2>Book List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['title'] ?></td>
                <td><?= $row['author'] ?></td>
                <td><?= $row['status'] ?></td>
                <td>
                    <?php if ($row['status'] == 'Available') { ?>
                        <a href="borrow-book.php?id=<?= $row['id'] ?>">Borrow</a>
                    <?php } else { ?>
                        <a href="return-book.php?id=<?= $row['id'] ?>">Return</a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </table>

    <h2>Add a Book</h2>
    <form action="add-book.php" method="POST">
        <input type="text" name="title" placeholder="Book Title" required>
        <input type="text" name="author" placeholder="Author" required>
        <button type="submit">Add Book</button>
    </form>
</body>
</html>