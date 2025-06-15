<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static Quiz Preview</title>
    <link rel="stylesheet" href="quiz.css"> <!-- Link to your CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .quiz-code {
            text-align: center;
            padding: 10px;
            background-color: #007bff;
            color: white;
            font-size: 1.5rem;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .question {
            margin-bottom: 20px;
        }
        .question p {
            font-weight: bold;
        }
        .options {
            list-style-type: none;
            padding: 0;
        }
        .options li {
            margin-bottom: 10px;
        }
        .take-quiz {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }
        .take-quiz button {
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .take-quiz button:hover {
            background-color: #0056b3;
        }
        .take-quiz p {
            margin-top: 10px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="quiz-code">
            <p>Quiz Code: <strong>C-QUIZ-001</strong></p>
        </div>
        <h2>Quiz: C Programming Basics</h2>
        <p>This is a static preview of the quiz. Below are the questions, options, and correct answers.</p>
        
        <!-- Quiz Questions -->
        <div class="questions">
        <div class="questions">
    <div class="question">
        <p>1. What is the size of an int on a 32-bit system?</p>
        <ul class="options">
            <li>A. 2 bytes</li>
            <li>B. 4 bytes</li>
            <li>C. 8 bytes</li>
            <li>D. 1 byte</li>
        </ul>
    </div>
    <div class="question">
        <p>2. Which operator is used to access a member of a structure?</p>
        <ul class="options">
            <li>A. .li>
            <li>B. -></li>
            <li>C. #</li>
            <li>D. &</li>
        </ul>
    </div>
    <div class="question">
        <p>3. Which keyword is used to define a constant in C?</p>
        <ul class="options">
            <li>A. const</li>
            <li>B. #define</li>
            <li>C. constant</li>
            <li>D. static</li>
        </ul>
    </div>
    <div class="question">
        <p>4. Which data type is typically used to store decimal numbers?</p>
        <ul class="options">
            <li>A. int</li>
            <li>B. floatli>
            <li>C. char</li>
            <li>D. double</li>
        </ul>
    </div>
    <div class="question">
        <p>5. Which function is used to print to the screen in C?</p>
        <ul class="options">
            <li>A. print()</li>
            <li>B. printf()</li>
            <li>C. output()</li>
            <li>D. echo()</li>
        </ul>
    </div>
    <div class="question">
        <p>6. Which header file is needed for input/output functions?</p>
        <ul class="options">
            <li>A. stdlib.h</li>
            <li>B. string.h</li>
            <li>C. stdio.h</li>
            <li>D. conio.h</li>
        </ul>
    </div>
    <div class="question">
        <p>7. What is the starting index of an array in C?</p>
        <ul class="options">
            <li>A. 0li>
            <li>B. 1</li>
            <li>C. -1</li>
            <li>D. Any value</li>
        </ul>
    </div>
    <div class="question">
        <p>8. What does the sizeof operator return?</p>
        <ul class="options">
            <li>A. Size of memory in bytes</li>
            <li>B. Number of elements</li>
            <li>C. Address of variable</li>
            <li>D. None of the above</li>
        </ul>
    </div>
    <div class="question">
        <p>9. What is a pointer in C?</p>
        <ul class="options">
            <li>A. A variable</li>
            <li>B. A function</li>
            <li>C. A memory address</li>
            <li>D. None of the above</li>
        </ul>
    </div>
    <div class="question">
        <p>10. Which keyword is used to exit a loop?</p>
        <ul class="options">
            <li>A. exit</li>
            <li>B. continue</li>
            <li>C. break</li>
            <li>D. return</li>
        </ul>
    </div>
</div>

        </div>

        <!-- Take Quiz Section -->
        <div class="take-quiz">
            <button onclick="showTakeQuizMessage()">Take Quiz</button>
            <p id="takeQuizMessage" style="display: none; color: red; font-weight: bold;">Enter the quiz code <strong>C-QUIZ-001</strong> in the "Join Quiz" section to attempt this quiz.</p>
        </div>
    </div>

    <script>
        function showTakeQuizMessage() {
            const message = document.getElementById('takeQuizMessage');
            message.style.display = 'block';
        }
    </script>
</body>
</html>
