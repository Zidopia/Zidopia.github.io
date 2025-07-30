<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Retrieve the comment data from the form
    $blog_id = $_POST['blog_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    // Database connection
    $host = 'localhost';
    $database = 'user_db';
    $username = 'root';
    $password = '';

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die('Database connection error: ' . mysqli_connect_error());
    }

    // Insert the comment into the database
    $query = "INSERT INTO comments (blog_id, name, email, comment) VALUES ('$blog_id', '$name', '$email', '$comment')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Comment submitted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid request!";
}
?>
