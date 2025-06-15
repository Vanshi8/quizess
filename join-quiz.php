<?php

header('Content-Type: application/json');

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbName = "project";

$conn = new mysqli($servername, $username, $password, $dbName);

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['quizCode'])) {
    echo json_encode(["success" => false, "message" => "Quiz code is required."]);
    exit;
}

$quizCode = $data['quizCode'];

// Fetch quiz details
$quizQuery = "SELECT time_limit FROM quizzes WHERE quizCode = ?";
$stmtQuiz = $conn->prepare($quizQuery);
$stmtQuiz->bind_param("s", $quizCode);
$stmtQuiz->execute();
$resultQuiz = $stmtQuiz->get_result();

if ($resultQuiz->num_rows === 0) {
    echo json_encode(["success" => false, "message" => "Quiz not found."]);
    exit;
}

$quizData = $resultQuiz->fetch_assoc();
$timeLimit = $quizData['time_limit']; // Assuming time_limit is stored in minutes

// Fetch quiz questions
$questionsQuery = "SELECT question, option1, option2, option3, option4, correct_answer FROM questions WHERE quizCode = ?";
$stmtQuestions = $conn->prepare($questionsQuery);
$stmtQuestions->bind_param("s", $quizCode);
$stmtQuestions->execute();
$resultQuestions = $stmtQuestions->get_result();

$questions = [];
while ($row = $resultQuestions->fetch_assoc()) {
    $questions[] = $row;
}

echo json_encode([
    "success" => true,
    "timeLimit" => $timeLimit,
    "questions" => $questions
]);

$conn->close();
?>
