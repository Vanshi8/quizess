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
$quizCode = "CSS-QUIZ-1";
$timeLimit = 15; // Time limit in minutes
$questions = [
    [
        "question" => "What does CSS stand for?",
        "options" => ["Computer Style Sheets", "Creative Style Sheets", "Cascading Style Sheets", "Colorful Style Sheets"],
        "correctAnswer" => 3 // C corresponds to 3
    ],
    [
        "question" => "Which property is used to change the background color in CSS?",
        "options" => ["background-color", "bgcolor", "color", "background"],
        "correctAnswer" => 1 // A corresponds to 1
    ],
    [
        "question" => "How do you select an element with the class 'example' in CSS?",
        "options" => [".example", "#example", "*example", "example"],
        "correctAnswer" => 1 // A corresponds to 1
    ],
    [
        "question" => "Which property is used to change the font of an element in CSS?",
        "options" => ["font-family", "font-size", "text-style", "font-style"],
        "correctAnswer" => 1 // A corresponds to 1
    ],
    [
        "question" => "How do you apply a style to all <h1> elements in CSS?",
        "options" => ["h1 { ... }", "&lt;h1&gt; { ... }", ".h1 { ... }", "*h1 { ... }"],
        "correctAnswer" => 1 // A corresponds to 1
    ],
    [
        "question" => "Which property is used to change the text color in CSS?",
        "options" => ["color", "text-color", "font-color", "background-color"],
        "correctAnswer" => 1 // A corresponds to 1
    ],
    [
        "question" => "What is the correct way to add a comment in CSS?",
        "options" => ["<!-- Comment -->", "// Comment", "/* Comment */", "// Comment //"],
        "correctAnswer" => 3 // C corresponds to 3
    ],
    [
        "question" => "Which CSS property is used to change the font size?",
        "options" => ["font-size", "font-weight", "text-size", "text-font"],
        "correctAnswer" => 1 // A corresponds to 1
    ],
    [
        "question" => "What does the 'border-radius' property do in CSS?",
        "options" => ["Rounds the corners of an element", "Creates a border around an element", "Adds a shadow effect", "Defines the width of the border"],
        "correctAnswer" => 1 // A corresponds to 1
    ],
    [
        "question" => "How do you create a responsive layout in CSS?",
        "options" => ["Using the @media rule", "Using the @responsive rule", "Setting a fixed width for all elements", "Using JavaScript"],
        "correctAnswer" => 1 // A corresponds to 1
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
            $q['correctAnswer'] // Store numeric value for the correct answer
        );

        if (!$stmtQuestion->execute()) {
            throw new Exception("Failed to insert question: " . $stmtQuestion->error);
        }
    }

    // Commit transaction
    $conn->commit();
    echo "Quiz and questions successfully saved to the database.\n";

} catch (Exception $e) {
    // Roll back transaction in case of error
    $conn->rollback();
    echo "Error: " . $e->getMessage() . "\n";
}

// Close database connection
$conn->close();
?>
