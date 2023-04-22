<?php
$mysqli = new mysqli("localhost", "root", "", "library_db");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookTitle = $_POST['book_title'];
    $author = $_POST['author'];
    $customerName = $_POST['customer_name'];


    $stmt = $mysqli->prepare("INSERT INTO books (book_title, author, customer_name) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $bookTitle, $author, $customerName);


    if ($stmt->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data: " . $stmt->error;
    }


    $stmt->close();
}

$mysqli->close();

header("Location: books.php");
exit;

?>
