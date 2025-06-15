<?php
header('Content-Type: application/json');

// Database connection details
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbName = "project";

$conn = new mysqli($servername, $username, $password, $dbName);

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]);
    exit();
}

// Decode the JSON request
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['quizCode'])) {
    echo json_encode(["success" => false, "message" => "Quiz code not provided."]);
    exit();
}

$quizCode = $data['quizCode'];

// Check if the quiz code exists
$query = "SELECT quizCode FROM quizzes WHERE quizCode = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $quizCode);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(["success" => true, "message" => "Quiz code is valid."]);
} else {
    echo json_encode(["success" => false, "message" => "Quiz code is invalid."]);
}

$stmt->close();
$conn->close();
?>
