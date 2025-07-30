<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $number = $_POST["number"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Sanitize the input (you can use additional validation if required)
    $name = mysqli_real_escape_string($conn, $name);
    $number = mysqli_real_escape_string($conn, $number);
    $email = mysqli_real_escape_string($conn, $email);
    $subject = mysqli_real_escape_string($conn, $subject);
    $message = mysqli_real_escape_string($conn, $message);

    // Insert data into the database
    $sql = "INSERT INTO contact_form (name, number, email, subject, message) 
            VALUES ('$name', '$number', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION["success_message"] = "Thank you for your message!";
    } else {
        $_SESSION["error_message"] = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
header("Location: contact.html"); // Redirect back to contact.html
exit();
?>
