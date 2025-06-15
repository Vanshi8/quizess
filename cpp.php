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

// Predefined quiz information for C++ quiz
$quizCode = "CPP-QUIZ-0";
$timeLimit = 20; // Time limit in minutes
$questions = [
    [
        "question" => "What is C++ primarily known as?",
        "options" => ["Procedural Language", "Functional Language", "Object-Oriented Language", "Scripting Language"],
        "correctAnswer" => 3 // C corresponds to 3
    ],
    [
        "question" => "Which of the following is used to define a class in C++?",
        "options" => ["struct", "class", "define", "typedef"],
        "correctAnswer" => 2 // B corresponds to 2
    ],
    [
        "question" => "What is the scope resolution operator in C++?",
        "options" => ["->", "::", ".", "**"],
        "correctAnswer" => 2 // B corresponds to 2
    ],
    [
        "question" => "Which keyword is used to inherit a class in C++?",
        "options" => ["extends", "inherit", "public", "base"],
        "correctAnswer" => 3 // C corresponds to 3
    ],
    [
        "question" => "What is the default access specifier for class members in C++?",
        "options" => ["public", "private", "protected", "static"],
        "correctAnswer" => 2 // B corresponds to 2
    ],
    [
        "question" => "What does the 'new' operator do in C++?",
        "options" => ["Allocates memory dynamically", "Declares a variable", "Deletes a pointer", "Creates a function"],
        "correctAnswer" => 1 // A corresponds to 1
    ],
    [
        "question" => "What is a virtual function in C++?",
        "options" => ["A function without parameters", "A function that is redefined in a derived class", "A function only used for input/output", "A function declared in a private class"],
        "correctAnswer" => 2 // B corresponds to 2
    ],
    [
        "question" => "What is the output of `cout << 5/2;` in C++?",
        "options" => ["2.5", "2", "5", "None of the above"],
        "correctAnswer" => 2 // B corresponds to 2
    ],
    [
        "question" => "Which library is used for standard input/output in C++?",
        "options" => ["stdio.h", "iostream", "conio.h", "math.h"],
        "correctAnswer" => 2 // B corresponds to 2
    ],
    [
        "question" => "What is the purpose of the 'delete' operator in C++?",
        "options" => ["Declares a variable", "Deletes dynamically allocated memory", "Deletes a file", "Deletes a function"],
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
    echo "Quiz and questions successfully saved to the database.\n";

} catch (Exception $e) {
    // Roll back transaction in case of error
    $conn->rollback();
    echo "Error: " . $e->getMessage() . "\n";
}

// Close database connection
$conn->close();
?>
