<?php
session_start();
header('Content-Type: application/json');

// Database connection
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbName = "project";

$conn = new mysqli($servername, $username, $password, $dbName);

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$name = $data['name'];
$email = $data['email'];
$subject = $data['subject'];
$quizCode = $data['quizCode'];

// Save user to the database
$stmt = $conn->prepare("INSERT INTO users (name, email, subject) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE subject = ?");
$stmt->bind_param("ssss", $name, $email, $subject, $subject);

if ($stmt->execute()) {
    // Store user info in session
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $name;

    echo json_encode(["success" => true, "message" => "User saved successfully."]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to save user: " . $stmt->error]);
}

$stmt->close();
$conn->close();
