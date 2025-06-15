<?php
header('Content-Type: application/json');

// Database connection
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]);
    exit;
}

// Log raw input
$rawInput = file_get_contents("php://input");
error_log("RAW INPUT: " . $rawInput);

$data = json_decode($rawInput, true);

if (!$data) {
    echo json_encode(["success" => false, "message" => "Invalid input."]);
    exit;
}

// Validate input
$name = trim($data['name']);
$email = trim($data['email']);
$subject = trim($data['subject']);
$quizCode = trim($data['quizCode']);

error_log("Parsed Input - Name: $name, Email: $email, Subject: $subject, Quiz Code: $quizCode");

if (empty($name) || empty($email) || empty($subject) || empty($quizCode)) {
    echo json_encode(["success" => false, "message" => "All fields are required."]);
    exit;
}

// Insert data into quiz_responses table
$stmt = $conn->prepare("INSERT INTO quiz_responses (name, email, subject, quiz_code) VALUES (?, ?, ?, ?)");
if (!$stmt) {
    error_log("Prepare Failed: " . $conn->error);
    echo json_encode(["success" => false, "message" => "Failed to prepare query: " . $conn->error]);
    exit;
}

$stmt->bind_param("ssss", $name, $email, $subject, $quizCode);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Form data saved successfully."]);
} else {
    error_log("Execute Failed: " . $stmt->error);
    echo json_encode(["success" => false, "message" => "Failed to save data: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
