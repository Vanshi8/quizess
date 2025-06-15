<?php
header('Content-Type: text/plain');

// Database connection details
$servername = "localhost:3305";
$username = "root";
$password = "";
$dbName = "project";

// Database connection
$conn = new mysqli($servername, $username, $password, $dbName);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Predefined JavaScript quiz information
$quizCode = "JS-QUIZ-00";
$timeLimit = 20; // Time limit in minutes
$questions = [
    [
        "question" => "Which company developed JavaScript?",
        "options" => ["Microsoft", "Netscape", "Google", "Sun Microsystems"],
        "correctAnswer" => 2 // B corresponds to 2
    ],
    [
        "question" => "Which keyword is used to define a variable in JavaScript?",
        "options" => ["var", "let", "const", "All of the above"],
        "correctAnswer" => 4 // D corresponds to 4
    ],
    [
        "question" => "What is the output of typeof null in JavaScript?",
        "options" => ["object", "null", "undefined", "error"],
        "correctAnswer" => 1 // A corresponds to 1
    ],
    [
        "question" => "Which method is used to add elements to the end of an array?",
        "options" => ["push()", "pop()", "shift()", "unshift()"],
        "correctAnswer" => 1 // A corresponds to 1
    ],
    [
        "question" => "Which of the following is not a reserved word in JavaScript?",
        "options" => ["interface", "throws", "program", "short"],
        "correctAnswer" => 3 // C corresponds to 3
    ],
    [
        "question" => "Which symbol is used for comments in JavaScript?",
        "options" => ["//", "/* */", "#", "Both A and B"],
        "correctAnswer" => 4 // D corresponds to 4
    ],
    [
        "question" => "What is the correct syntax to call an alert box in JavaScript?",
        "options" => ["alertBox()", "msg()", "alert()", "msgBox()"],
        "correctAnswer" => 3 // C corresponds to 3
    ],
    [
        "question" => "What is the correct way to write an if statement in JavaScript?",
        "options" => ["if i = 5", "if (i == 5)", "if i == 5 then", "if (i = 5)"],
        "correctAnswer" => 2 // B corresponds to 2
    ],
    [
        "question" => "What is the use of isNaN function in JavaScript?",
        "options" => ["Check if value is a number", "Check if value is not a number", "Convert value to number", "None of the above"],
        "correctAnswer" => 2 // B corresponds to 2
    ],
    [
        "question" => "Which method is used to convert JSON data into a JavaScript object?",
        "options" => ["JSON.stringify()", "JSON.parse()", "JSON.convert()", "JSON.objectify()"],
        "correctAnswer" => 2 // B corresponds to 2
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
    echo "JavaScript quiz and questions successfully saved to the database.\n";

} catch (Exception $e) {
    // Roll back transaction in case of error
    $conn->rollback();
    echo "Error: " . $e->getMessage() . "\n";
}

// Close database connection
$conn->close();
?>
