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
$quizCode = "PY-QUIZ-1";
$timeLimit = 15; // Time limit in minutes
$questions = [
    [
        "question" => "Who developed Python?",
        "options" => ["James Gosling", "Guido van Rossum", "Dennis Ritchie", "Bjarne Stroustrup"],
        "correctAnswer" => 2 // B corresponds to 2
    ],
    [
        "question" => "What is the correct file extension for Python files?",
        "options" => [".py", ".python", ".pt", ".pyt"],
        "correctAnswer" => 1 // A corresponds to 1
    ],
    [
        "question" => "Which keyword is used to define a function in Python?",
        "options" => ["function", "def", "func", "define"],
        "correctAnswer" => 2 // B corresponds to 2
    ],
    [
        "question" => "Which data type is immutable in Python?",
        "options" => ["List", "Dictionary", "Set", "Tuple"],
        "correctAnswer" => 4 // D corresponds to 4
    ],
    [
        "question" => "What is the output of print(type(123)) in Python?",
        "options" => ["int", "float", "str", "None"],
        "correctAnswer" => 1 // A corresponds to 1
    ],
    [
        "question" => "Which operator is used for exponentiation in Python?",
        "options" => ["^", "**", "%", "//"],
        "correctAnswer" => 2 // B corresponds to 2
    ],
    [
        "question" => "Which built-in function is used to get the length of a list in Python?",
        "options" => ["count()", "len()", "size()", "length()"],
        "correctAnswer" => 2 // B corresponds to 2
    ],
    [
        "question" => "What is the output of print(10 // 3) in Python?",
        "options" => ["3", "3.33", "10", "Error"],
        "correctAnswer" => 1 // A corresponds to 1
    ],
    [
        "question" => "Which method is used to add an element to the end of a list in Python?",
        "options" => ["append()", "add()", "insert()", "extend()"],
        "correctAnswer" => 1 // A corresponds to 1
    ],
    [
        "question" => "How do you start a comment in Python?",
        "options" => ["//", "<!--", "#", "/*"],
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
