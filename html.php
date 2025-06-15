<?php
header('Content-Type: text/plain');

// Database connection details
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbName = "project";

// Database connection
$conn = new mysqli($servername, $username, $password, $dbName);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Predefined quiz information
$quizCode = "HTML-QUIZ-001";
$timeLimit = 20; // Time limit in minutes
$questions = [
    [
        "question" => "What does HTML stand for?",
        "options" => ["Hyper Text Markup Language", "Hyperlinks and Text Markup Language", "Home Tool Markup Language", "Hyperlink Text Mode Language"],
        "correctAnswer" => 1
    ],
    [
        "question" => "Which tag is used for creating a hyperlink in HTML?",
        "options" => ["<link>", "<href>", "<a>", "<hyperlink>"],
        "correctAnswer" => 3
    ],
    [
        "question" => "Which is the correct HTML element for inserting a line break?",
        "options" => ["<lb>", "<br>", "<break>", "<linebreak>"],
        "correctAnswer" => 2
    ],
    [
        "question" => "What is the purpose of the <head> tag in HTML?",
        "options" => ["To define the main content of the page", "To include metadata and links to resources", "To display a heading", "To create a navigation bar"],
        "correctAnswer" => 2
    ],
    [
        "question" => "Which HTML attribute is used to define inline styles?",
        "options" => ["class", "id", "style", "inline"],
        "correctAnswer" => 3
    ]
];

// Start transaction
$conn->begin_transaction();

try {
    // Insert quiz into the quizzes table
    $insertQuizQuery = "INSERT INTO quizzes (quizCode, time_limit, created_at) VALUES (?, ?, NOW())";
    $stmtQuiz = $conn->prepare($insertQuizQuery);
    $stmtQuiz->bind_param("si", $quizCode, $timeLimit);

    if (!$stmtQuiz->execute()) {
        throw new Exception("Failed to insert quiz: " . $stmtQuiz->error);
    }

    // Insert questions into the questions table
    $insertQuestionQuery = "INSERT INTO questions (quizCode, question, option1, option2, option3, option4, correct_answer) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmtQuestion = $conn->prepare($insertQuestionQuery);

    foreach ($questions as $q) {
        $stmtQuestion->bind_param(
            "ssssssi",
            $quizCode,
            $q['question'],
            $q['options'][0],
            $q['options'][1],
            $q['options'][2],
            $q['options'][3],
            $q['correctAnswer']
        );

        if (!$stmtQuestion->execute()) {
            throw new Exception("Failed to insert question: " . $stmtQuestion->error);
        }
    }

    // Commit transaction
    $conn->commit();
    echo "HTML Quiz and questions successfully saved to the database.\n";

} catch (Exception $e) {
    // Roll back transaction in case of error
    $conn->rollback();
    echo "Error: " . $e->getMessage() . "\n";
}

// Close database connection
$conn->close();
?>
