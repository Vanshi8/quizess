<?php
session_start();

// Debugging session variables
if (!isset($_SESSION['email']) || !isset($_SESSION['username'])) {
    echo "Session not set. Debugging info:<br>";
    print_r($_SESSION); // Display session content for debugging
    exit;
}

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbName = "project";

// Database connection
$conn = mysqli_connect($servername, $username, $password, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['topic'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $topic = mysqli_real_escape_string($conn, $_POST['topic']);

    // Ensure required fields are not empty
    if (!empty($name) && !empty($email) && !empty($subject)) {
        $sql = "INSERT INTO teacher (name, email, subject, topic) 
                VALUES ('$name', '$email', '$subject', '$topic')";
        if (mysqli_query($conn, $sql)) {
            // Redirect after successful registration
            header("Location: home_page.php");
            exit; // Stop further script execution
        } else {
            echo "Error inserting data: " . mysqli_error($conn);
        }
    } else {
        echo "Required fields are missing.";
    }
} else {
    echo "Form data not submitted.";
}

mysqli_close($conn);
?>
