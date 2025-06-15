<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Generator</title>
    <link rel="stylesheet" href="ques.css">
</head>
<body>
    <h1>Generate Your Quiz</h1>
    <div class="container">
        <div class="input-group">
            <label for="numQuestions">Number of Questions:</label>
            <input type="number" id="numQuestions" placeholder="Enter number of questions">
        </div>
        <div class="input-group">
            <label for="timeLimit">Time Limit (in minutes):</label>
            <input type="number" id="timeLimit" placeholder="Enter time limit">
        </div>
        <button onclick="generateForm()" class="primary-btn">Generate Form</button>

        <div id="quizCodeContainer" style="display: none;">
            <p>Quiz Code: <span id="quizCode"></span></p>
        </div>

        <div id="questionsContainer" class="questions-container">
        </div>

        <div id="reviewContainer" style="display: none;">
            <h3>Review Your Questions</h3>
            <ul id="reviewList">
            </ul>
        </div>

        <button id="submit-questions" class="submit-btn" onclick="submitQuestions()" style="display: none;">Submit Questions</button>
    </div>

    <script src="chotu.js"></script>
</body>
</html>