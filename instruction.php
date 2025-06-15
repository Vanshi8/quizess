<?php
// Retrieve quiz data from the query string
$quizCode = $_GET['quizCode'] ?? null;
$timeLimit = $_GET['timeLimit'] ?? 20; // Default to 20 minutes if not provided

// Validate the quiz data
if (!$quizCode) {
    die("Invalid quiz data. Please try joining the quiz again.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Instructions</title>
    <link rel="stylesheet" href="instruction.css">
</head>
<body>

    <div class="instruction-container">
        <h1>Welcome to the Quiz!</h1>
        <p>Before starting the quiz, please read the instructions below carefully:</p>

        <div class="instructions">
            <h2>Instructions:</h2>
            <ul>
                <li><strong>Time Limit:</strong> You have <?= htmlspecialchars($timeLimit) ?> minutes to complete the quiz.</li>
                <li><strong>Questions:</strong> The quiz contains multiple-choice questions.</li>
                <li><strong>Scoring:</strong> Each correct answer gives you 1 point. There is no penalty for incorrect answers.</li>
                <li><strong>Navigation:</strong> You can navigate between questions during the quiz.</li>
                <li><strong>Submission:</strong> The quiz will be automatically submitted when the time runs out, or you can submit it manually before the time is over.</li>
                <li><strong>Browser Requirements:</strong> Please ensure your browser is up-to-date and does not block pop-ups or new tabs.</li>
            </ul>
        </div>

        <div class="timer" style="display: none;"> <!-- Initially hidden -->
            <h3>Time Remaining:</h3>
            <div id="countdown"><?= htmlspecialchars($timeLimit) ?>:00</div>
        </div>

        <div class="actions">
            <button id="startQuizButton">Start Quiz</button>
        </div>
    </div>

    <script src="instruction.js"></script>
</body>
</html>
