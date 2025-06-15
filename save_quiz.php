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

if (!isset($data['quizCode'], $data['timeLimit'], $data['questions']) || empty($data['questions'])) {
    echo json_encode(["success" => false, "message" => "Invalid or missing quiz data."]);
    exit;
}

$quizCode = $data['quizCode'];
$timeLimit = intval($data['timeLimit']); 
$questions = $data['questions'];

$conn->begin_transaction();

try {
    $insertQuizQuery = "INSERT INTO quizzes (quizCode, time_limit, created_at) VALUES (?, ?, NOW())";
    $stmtQuiz = $conn->prepare($insertQuizQuery);

    if (!$stmtQuiz) {
        file_put_contents('debug_log.txt', "Quiz Insert Error: " . $conn->error . "\n", FILE_APPEND);
        throw new Exception("Failed to prepare quiz insert query: " . $conn->error);
    }

    $stmtQuiz->bind_param("si", $quizCode, $timeLimit);

    if (!$stmtQuiz->execute()) {
        file_put_contents('debug_log.txt', "Quiz Insert Execution Error: " . $stmtQuiz->error . "\n", FILE_APPEND);
        throw new Exception("Failed to insert quiz: " . $stmtQuiz->error);
    }

    $insertQuestionQuery = "INSERT INTO questions (quizCode, question, option1, option2, option3, option4, correct_answer) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmtQuestion = $conn->prepare($insertQuestionQuery);

    if (!$stmtQuestion) {
        file_put_contents('debug_log.txt', "Question Insert Error: " . $conn->error . "\n", FILE_APPEND);
        throw new Exception("Failed to prepare question insert query: " . $conn->error);
    }

    foreach ($questions as $q) {
        $question = $q['question'];
        $option1 = $q['options']['A'];
        $option2 = $q['options']['B'];
        $option3 = $q['options']['C'];
        $option4 = $q['options']['D'];
        $correctAnswer = $q['correctAnswer'];

        $stmtQuestion->bind_param("sssssss", $quizCode, $question, $option1, $option2, $option3, $option4, $correctAnswer);

        if (!$stmtQuestion->execute()) {
            file_put_contents('debug_log.txt', "Question Insert Execution Error: " . $stmtQuestion->error . "\n", FILE_APPEND);
            throw new Exception("Failed to insert question: " . $stmtQuestion->error);
        }
    }

    $conn->commit();

    echo json_encode(["success" => true, "quizCode" => $quizCode]);
} catch (Exception $e) {
    
    $conn->rollback();
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}


$conn->close();
?>
