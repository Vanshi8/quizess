<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static JavaScript Quiz Preview</title>
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
            <p>Quiz Code: <strong>JS-QUIZ-00</strong></p>
        </div>
        <h2>Quiz: JavaScript Basics</h2>
        <p>This is a static preview of the quiz. Below are the questions, options, and correct answers.</p>

        <!-- Quiz Questions -->
        <div class="questions">
            <div class="question">
                <p>1. Which company developed JavaScript?</p>
                <ul class="options">
                    <li>A. Microsoft</li>
                    <li>B. Netscape </li>
                    <li>C. Google</li>
                    <li>D. Sun Microsystems</li>
                </ul>
            </div>
            <div class="question">
                <p>2. Which keyword is used to define a variable in JavaScript?</p>
                <ul class="options">
                    <li>A. var</li>
                    <li>B. let</li>
                    <li>C. const</li>
                    <li>D. All of the above </li>
                </ul>
            </div>
            <div class="question">
                <p>3. What is the output of typeof null in JavaScript?</p>
                <ul class="options">
                    <li>A. object </li>
                    <li>B. null</li>
                    <li>C. undefined</li>
                    <li>D. error</li>
                </ul>
            </div>
            <div class="question">
                <p>4. Which method is used to add elements to the end of an array?</p>
                <ul class="options">
                    <li>A. push() </li>
                    <li>B. pop()</li>
                    <li>C. shift()</li>
                    <li>D. unshift()</li>
                </ul>
            </div>
            <div class="question">
                <p>5. Which of the following is not a reserved word in JavaScript?</p>
                <ul class="options">
                    <li>A. interface</li>
                    <li>B. throws</li>
                    <li>C. program</li>
                    <li>D. short</li>
                </ul>
            </div>
            <div class="question">
                <p>6. Which symbol is used for comments in JavaScript?</p>
                <ul class="options">
                    <li>A. //</li>
                    <li>B. /* */</li>
                    <li>C. #</li>
                    <li>D. Both A and B</li>
                </ul>
            </div>
            <div class="question">
                <p>7. What is the correct syntax to call an alert box in JavaScript?</p>
                <ul class="options">
                    <li>A. alertBox()</li>
                    <li>B. msg()</li>
                    <li>C. alert()</li>
                    <li>D. msgBox()</li>
                </ul>
            </div>
            <div class="question">
                <p>8. What is the correct way to write an if statement in JavaScript?</p>
                <ul class="options">
                    <li>A. if i = 5</li>
                    <li>B. if (i == 5) </li>
                    <li>C. if i == 5 then</li>
                    <li>D. if (i = 5)</li>
                </ul>
            </div>
            <div class="question">
                <p>9. What is the use of isNaN function in JavaScript?</p>
                <ul class="options">
                    <li>A. Check if value is a number</li>
                    <li>B. Check if value is not a number </li>
                    <li>C. Convert value to number</li>
                    <li>D. None of the above</li>
                </ul>
            </div>
            <div class="question">
                <p>10. Which method is used to convert JSON data into a JavaScript object?</p>
                <ul class="options">
                    <li>A. JSON.stringify()</li>
                    <li>B. JSON.parse() </li>
                    <li>C. JSON.convert()</li>
                    <li>D. JSON.objectify()</li>
                </ul>
            </div>
        </div>

        <!-- Take Quiz Section -->
        <div class="take-quiz">
            <button onclick="showTakeQuizMessage()">Take Quiz</button>
            <p id="takeQuizMessage" style="display: none; color: red; font-weight: bold;">Enter the quiz code <strong>JS-QUIZ-00</strong> in the "Join Quiz" section to attempt this quiz.</p>
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
