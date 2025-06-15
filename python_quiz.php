<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static Python Quiz Preview</title>
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
            <p>Quiz Code: <strong>PY-QUIZ-1</strong></p>
        </div>
        <h2>Quiz: Python Basics</h2>
        <p>This is a static preview of the quiz. Below are the questions, options, and correct answers.</p>

        <!-- Quiz Questions -->
        <div class="questions">
            <div class="question">
                <p>1. Who developed Python?</p>
                <ul class="options">
                    <li>A. James Gosling</li>
                    <li>B. Guido van Rossum </li>
                    <li>C. Dennis Ritchie</li>
                    <li>D. Bjarne Stroustrup</li>
                </ul>
            </div>
            <div class="question">
                <p>2. What is the correct file extension for Python files?</p>
                <ul class="options">
                    <li>A. .py </li>
                    <li>B. .python</li>
                    <li>C. .pt</li>
                    <li>D. .pyt</li>
                </ul>
            </div>
            <div class="question">
                <p>3. Which keyword is used to define a function in Python?</p>
                <ul class="options">
                    <li>A. function</li>
                    <li>B. def </li>
                    <li>C. func</li>
                    <li>D. define</li>
                </ul>
            </div>
            <div class="question">
                <p>4. Which data type is immutable in Python?</p>
                <ul class="options">
                    <li>A. List</li>
                    <li>B. Dictionary</li>
                    <li>C. Set</li>
                    <li>D. Tuple </li>
                </ul>
            </div>
            <div class="question">
                <p>5. What is the output of print(type(123)) in Python?</p>
                <ul class="options">
                    <li>A. int</li>
                    <li>B. float</li>
                    <li>C. str</li>
                    <li>D. None</li>
                </ul>
            </div>
            <div class="question">
                <p>6. Which operator is used for exponentiation in Python?</p>
                <ul class="options">
                    <li>A. ^</li>
                    <li>B. ** </li>
                    <li>C. %</li>
                    <li>D. //</li>
                </ul>
            </div>
            <div class="question">
                <p>7. Which built-in function is used to get the length of a list in Python?</p>
                <ul class="options">
                    <li>A. count()</li>
                    <li>B. len() </li>
                    <li>C. size()</li>
                    <li>D. length()</li>
                </ul>
            </div>
            <div class="question">
                <p>8. What is the output of print(10 // 3) in Python?</p>
                <ul class="options">
                    <li>A. 3 </li>
                    <li>B. 3.33</li>
                    <li>C. 10</li>
                    <li>D. Error</li>
                </ul>
            </div>
            <div class="question">
                <p>9. Which method is used to add an element to the end of a list in Python?</p>
                <ul class="options">
                    <li>A. append() </li>
                    <li>B. add()</li>
                    <li>C. insert()</li>
                    <li>D. extend()</li>
                </ul>
            </div>
            <div class="question">
                <p>10. How do you define a comment in Python?</p>
                <ul class="options">
                    <li>A. //</li>
                    <li>B. <!</li>
                    <li>C. # </li>
                    <li>D. /*</li>
                </ul>
            </div>
        </div>

        <!-- Take Quiz Section -->
        <div class="take-quiz">
            <button onclick="showTakeQuizMessage()">Take Quiz</button>
            <p id="takeQuizMessage" style="display: none; color: red; font-weight: bold;">Enter the quiz code <strong>PY-QUIZ-1</strong> in the "Join Quiz" section to attempt this quiz.</p>
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
