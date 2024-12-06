<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['Id']) || !isset($_SESSION['Name'])) {
    echo "You need to log in to borrow a book.";
    exit;
}

// MySQL database configuration
$host = "localhost";  
$username = "root";  
$password = "";  
$database = "e-library";  

// Establish a connection to the MySQL database
$conn = new mysqli($host, $username, $password, $database);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$Book_ID = $_POST['Book_ID'];
$User_ID = $_SESSION['Id'];
$Name = $_SESSION['Name'];
$Title = $_POST['Title'];
$Author = $_POST['Author'];
$Publisher = $_POST['Publisher'];
$Borrow_Date = date('Y-m-d');
$Return_Date = $_POST['Return_Date'];  // Already set by the form as a read-only field

// Check if the book exists and is available
$stmt = $conn->prepare("SELECT Title, Author, Publisher, Number_of_Copies FROM books WHERE Book_ID = ?");
$stmt->bind_param("i", $Book_ID);
$stmt->execute();
$stmt_result = $stmt->get_result();

// Debugging: Check if the book is found
if ($stmt_result->num_rows > 0) {
    $book = $stmt_result->fetch_assoc();

    // Check if copies are available
    if ($book['Number_of_Copies'] > 0) {
        // Prepare and execute the insert for the borrow record
        $borrow_stmt = $conn->prepare("INSERT INTO borrow_records (User_ID, Name, Book_ID, Title, Return_Date, Borrow_Date,  Author , Publisher ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $borrow_stmt->bind_param("isssssss", $User_ID, $Name, $Book_ID, $Title,$Borrow_Date, $Return_Date, $Author, $Publisher, );

        // Debugging: Check if the insert statement executes successfully
        if ($borrow_stmt->execute()) {
            // Update the number of copies in the books table
            $update_stmt = $conn->prepare("UPDATE books SET Number_of_Copies = Number_of_Copies - 1 WHERE Book_ID = ?");
            $update_stmt->bind_param("i", $Book_ID);

            // Debugging: Check if the update statement executes successfully
            if ($update_stmt->execute()) {
                echo "<p>Successfully borrowed the book. It is due back on: " . htmlspecialchars($Return_Date) . "</p>";
            } else {
                echo "Error updating book copies: " . $update_stmt->error; // Show error if update fails
            }
        } else {
            echo "Error borrowing the book: " . $borrow_stmt->error; // Show error if insert fails
        }

        // Close the prepared statements
        $borrow_stmt->close();
        $update_stmt->close();
    } else {
        echo "<p>Sorry, the book is currently unavailable or out of stock.</p>";
    }
} else {
    echo "<p>Book not found in the database.</p>";
}

// Close the main statement and connection
$stmt->close();
$conn->close();
?>
