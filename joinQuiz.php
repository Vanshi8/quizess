<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Quiz</title>
    <link rel="stylesheet" href="joinQuiz.css">
</head>
<body>
    <div class="container">
        <h1>Join Quiz</h1>
        <form id="joinQuizForm">
            <label for="name">Name:</label>
            <input type="text" id="name" placeholder="Enter your name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" placeholder="Enter your email" required>
            
            <label for="subject">Subject:</label>
            <input type="text" id="subject" placeholder="Enter subject" required>
            
            <label for="quizCode">Quiz Code:</label>
            <input type="text" id="quizCode" placeholder="Enter quiz code" required>
            
            <button type="submit">Join Quiz</button>
        </form>
    </div>

    <script src="joinQuiz.js"></script>
</body>
</html>
