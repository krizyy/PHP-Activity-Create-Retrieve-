<!DOCTYPE html>
<html>
<head>
  <title>Library Database</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: left;
    }
  </style>
</head>
<body>
  <h1>Library Database</h1>
  <form method="post" action="submit.php">
    <label for="book_title">Book Title:</label>
    <input type="text" id="book_title" name="book_title" required><br>
    <label for="author">Author:</label>
    <input type="text" id="author" name="author" required><br>
    <label for="customer_name">Customer Name:</label>
    <input type="text" id="customer_name" name="customer_name" required><br>
    <input type="submit" value="Submit">
  </form>
  <h2>Books in Library</h2>
 
 <?php
  $mysqli = new mysqli("localhost", "root", "", "library_db");
  

  if ($mysqli->connect_error) {
      die("Connection failed: " . $mysqli->connect_error);
  }
  

  $query = "SELECT * FROM books";
  $result = $mysqli->query($query);
  
  if ($result->num_rows > 0) {
      echo "<table>";
      echo "<tr><th>ID</th><th>Book Title</th><th>Author</th><th>Customer Name</th></tr>";
      while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['book_title'] . "</td>";
          echo "<td>" . $row['author'] . "</td>";
          echo "<td>" . $row['customer_name'] . "</td>";
          echo "</tr>";
      }
      echo "</table>";
  } else {
      echo "No books in library.";
  }

  $mysqli->close();
  ?>
  </body>
  </html>
  