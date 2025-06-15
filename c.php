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
$quizCode = "C-QUIZ-001";
$timeLimit = 15; // Time limit in minutes
$questions = [
    [
        "question" => "What is the size of an int on a 32-bit system?",
        "options" => ["2 bytes", "4 bytes", "8 bytes", "1 byte"],
        "correctAnswer" => 2 // B corresponds to 2
    ],
    [
        "question" => "Which operator is used to access a member of a structure?",
        "options" => [".", "->", "#", "&"],
        "correctAnswer" => 1 // A corresponds to 1
    ],
    [
        "question" => "Which keyword is used to define a constant in C?",
        "options" => ["const", "#define", "constant", "static"],
        "correctAnswer" => 2 // B corresponds to 2
    ],
    [
        "question" => "Which data type is typically used to store decimal numbers?",
        "options" => ["int", "float", "char", "double"],
        "correctAnswer" => 2 // B corresponds to 2
    ],
    [
        "question" => "Which function is used to print to the screen in C?",
        "options" => ["print()", "printf()", "output()", "echo()"],
        "correctAnswer" => 2 // B corresponds to 2
    ],
    [
        "question" => "Which header file is needed for input/output functions?",
        "options" => ["stdlib.h", "string.h", "stdio.h", "conio.h"],
        "correctAnswer" => 3 // C corresponds to 3
    ],
    [
        "question" => "What is the starting index of an array in C?",
        "options" => ["0", "1", "-1", "Any value"],
        "correctAnswer" => 1 // A corresponds to 1
    ],
    [
        "question" => "What does the sizeof operator return?",
        "options" => ["Size of memory in bytes", "Number of elements", "Address of variable", "None of the above"],
        "correctAnswer" => 1 // A corresponds to 1
    ],
    [
        "question" => "What is a pointer in C?",
        "options" => ["A variable", "A function", "A memory address", "None of the above"],
        "correctAnswer" => 3 // C corresponds to 3
    ],
    [
        "question" => "Which keyword is used to exit a loop?",
        "options" => ["exit", "continue", "break", "return"],
        "correctAnswer" => 3 // C corresponds to 3
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
