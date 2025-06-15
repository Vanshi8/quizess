<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();

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

// Validate POST data
if (!isset($_POST['quizCode']) || !isset($_POST['answer']) || !is_array($_POST['answer'])) {
    echo "<div class='error-message'>Invalid or missing data.</div>";
    exit;
}

$quizCode = $_POST['quizCode'];
$userAnswers = $_POST['answer']; // Associative array (question_id => selected_option)
$userEmail = $_SESSION['email']; // Assume email is stored in session

// Fetch correct answers from the database
$correctAnswersQuery = "SELECT id, correct_answer FROM questions WHERE quizCode = ?";
$stmt = $conn->prepare($correctAnswersQuery);
$stmt->bind_param("s", $quizCode);
$stmt->execute();
$result = $stmt->get_result();

$correctAnswers = [];
while ($row = $result->fetch_assoc()) {
    $correctAnswers[$row['id']] = $row['correct_answer'];
}

// Calculate score
$totalQuestions = count($correctAnswers);
$correctCount = 0;

foreach ($userAnswers as $questionId => $userAnswer) {
    if (isset($correctAnswers[$questionId]) && $correctAnswers[$questionId] == $userAnswer) {
        $correctCount++;
    }
}

// Prepare the result for display
$percentage = round(($correctCount / $totalQuestions) * 100, 2);
$scoreMessage = "You answered {$correctCount} out of {$totalQuestions} questions correctly.";
$percentageMessage = "Your score: {$percentage}%";

// Insert result into the database
$insertResultQuery = "INSERT INTO results (user_email, quiz_code, score, total_questions, percentage) VALUES (?, ?, ?, ?, ?)";
$stmtResult = $conn->prepare($insertResultQuery);
$stmtResult->bind_param("ssiii", $userEmail, $quizCode, $correctCount, $totalQuestions, $percentage);

if ($stmtResult->execute()) {
    // Success message after saving to the database
} else {
    echo "<div class='error-message'>Error saving your result. Please try again later.</div>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    <link rel="stylesheet" href="result.css">
</head>
<body>
    <div class="result-container">
        <h1 class="result-title">Quiz Result</h1>
        <div class="result-details">
            <p class="score-message"><?= htmlspecialchars($scoreMessage) ?></p>
            <p class="percentage-message"><?= htmlspecialchars($percentageMessage) ?></p>
        </div>
        <div class="result-actions">
            <a href="home_page.php" class="home-btn">Go to Home</a>
        </div>
    </div>
</body>
</html>
