<?php
session_start();
// Ensure the user is logged in
if (!isset($_SESSION['email'])) {
    echo "You need to join the quiz before attempting it.";
    exit;
}
header('Content-Type: text/html; charset=UTF-8');

$userEmail = $_SESSION['email'];
$userName = $_SESSION['username'];

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

// Get quiz code from query parameters
if (!isset($_GET['quizCode']) || empty($_GET['quizCode'])) {
    echo "Quiz code is missing or invalid.";
    exit;
}

$quizCode = $_GET['quizCode'];

// Fetch quiz details
$quizQuery = "SELECT * FROM quizzes WHERE quizCode = ?";
$stmtQuiz = $conn->prepare($quizQuery);
$stmtQuiz->bind_param("s", $quizCode);
$stmtQuiz->execute();
$quizResult = $stmtQuiz->get_result();

if ($quizResult->num_rows === 0) {
    echo "Quiz not found.";
    exit;
}

$quiz = $quizResult->fetch_assoc();
$timeLimit = $quiz['time_limit'];

// Fetch questions for the quiz
$questionsQuery = "SELECT * FROM questions WHERE quizCode = ?";
$stmtQuestions = $conn->prepare($questionsQuery);
$stmtQuestions->bind_param("s", $quizCode);
$stmtQuestions->execute();
$questionsResult = $stmtQuestions->get_result();

$questions = [];
while ($row = $questionsResult->fetch_assoc()) {
    $questions[] = $row;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($quiz['quizName']) ?> - Quiz</title>
    <link rel="stylesheet" href="quiz.css">
    <script>
        // Timer logic
        let timeRemaining = <?= $timeLimit * 60 ?>; // Convert minutes to seconds
        function formatTime(seconds) {
            const minutes = Math.floor(seconds / 60);
            const secs = seconds % 60;
            return `${minutes}:${secs < 10 ? '0' : ''}${secs}`;
        }
        function startTimer() {
            const timerElement = document.getElementById("timer");
            const interval = setInterval(() => {
                if (timeRemaining <= 0) {
                    clearInterval(interval);
                    alert("Time is up! Submitting the quiz...");
                    document.getElementById("quizForm").submit();
                } else {
                    timerElement.textContent = formatTime(timeRemaining);
                    timeRemaining--;
                }
            }, 1000);
        }
        window.onload = startTimer;
    </script>
</head>
<body>
    <div class="container">
        <div class="user-info">
            <p>Welcome, <?= htmlspecialchars($userName) ?> (<?= htmlspecialchars($userEmail) ?>)</p>
        </div>
        <div id="timer" class="timer">Loading...</div>
        <form id="quizForm" method="POST" action="result.php">
            <input type="hidden" name="quizCode" value="<?= htmlspecialchars($quizCode) ?>">
            <?php foreach ($questions as $index => $question): ?>
                <div class="question">
                    <p><?= ($index + 1) . ". " . htmlspecialchars($question['question']) ?></p>
                    <label><input type="radio" name="answer[<?= $question['id'] ?>]" value="1"> <?= htmlspecialchars($question['option1']) ?></label><br>
                    <label><input type="radio" name="answer[<?= $question['id'] ?>]" value="2"> <?= htmlspecialchars($question['option2']) ?></label><br>
                    <label><input type="radio" name="answer[<?= $question['id'] ?>]" value="3"> <?= htmlspecialchars($question['option3']) ?></label><br>
                    <label><input type="radio" name="answer[<?= $question['id'] ?>]" value="4"> <?= htmlspecialchars($question['option4']) ?></label>
                </div>
            <?php endforeach; ?>
            <button type="submit">Submit Quiz</button>
        </form>
    </div>
</body>
</html>
