<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static Quiz Preview - C++</title>
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
            background-color: #28a745;
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
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .take-quiz button:hover {
            background-color: #218838;
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
            <p>Quiz Code: <strong>CPP-QUIZ-0</strong></p>
        </div>
        <h2>Quiz: C++ Programming Basics</h2>
        <p>This is a static preview of the quiz. Below are the questions, options, and correct answers.</p>
        
        <!-- Quiz Questions -->
        <div class="questions">
            <div class="question">
                <p>1. What is C++ primarily known as?</p>
                <ul class="options">
                    <li>A. Procedural Language</li>
                    <li>B. Functional Language</li>
                    <li>C. Object-Oriented Language</li>
                    <li>D. Scripting Language</li>
                </ul>
            </div>
            <div class="question">
                <p>2. Which of the following is used to define a class in C++?</p>
                <ul class="options">
                    <li>A. struct</li>
                    <li>B. class</li>
                    <li>C. define</li>
                    <li>D. typedef</li>
                </ul>
            </div>
            <div class="question">
                <p>3. What is the scope resolution operator in C++?</p>
                <ul class="options">
                    <li>A. -></li>
                    <li>B. ::</li>
                    <li>C. .</li>
                    <li>D. **</li>
                </ul>
            </div>
            <div class="question">
                <p>4. Which keyword is used to inherit a class in C++?</p>
                <ul class="options">
                    <li>A. extends</li>
                    <li>B. inherit</li>
                    <li>C. public</li>
                    <li>D. base</li>
                </ul>
            </div>
            <div class="question">
                <p>5. What is the default access specifier for class members in C++?</p>
                <ul class="options">
                    <li>A. public</li>
                    <li>B. private </li>
                    <li>C. protected</li>
                    <li>D. static</li>
                </ul>
            </div>
            <div class="question">
                <p>6. What does the 'new' operator do in C++?</p>
                <ul class="options">
                    <li>A. Allocates memory dynamically </li>
                    <li>B. Declares a variable</li>
                    <li>C. Deletes a pointer</li>
                    <li>D. Creates a function</li>
                </ul>
            </div>
            <div class="question">
                <p>7. What is a virtual function in C++?</p>
                <ul class="options">
                    <li>A. A function without parameters</li>
                    <li>B. A function that is redefined in a derived class</li>
                    <li>C. A function only used for input/output</li>
                    <li>D. A function declared in a private class</li>
                </ul>
            </div>
            <div class="question">
                <p>8. What is the output of `cout << 5/2;` in C++?</p>
                <ul class="options">
                    <li>A. 2.5</li>
                    <li>B. 2 li>
                    <li>C. 5</li>
                    <li>D. None of the above</li>
                </ul>
            </div>
            <div class="question">
                <p>9. Which library is used for standard input/output in C++?</p>
                <ul class="options">
                    <li>A. stdio.h</li>
                    <li>B. iostream</li>
                    <li>C. conio.h</li>
                    <li>D. math.h</li>
                </ul>
            </div>
            <div class="question">
                <p>10. What is the purpose of the 'delete' operator in C++?</p>
                <ul class="options">
                    <li>A. Declares a variable</li>
                    <li>B. Deletes dynamically allocated memory</li>
                    <li>C. Deletes a file</li>
                    <li>D. Deletes a function</li>
                </ul>
            </div>
        </div>

        <!-- Take Quiz Section -->
        <div class="take-quiz">
            <button onclick="showTakeQuizMessage()">Take Quiz</button>
            <p id="takeQuizMessage" style="display: none; color: red; font-weight: bold;">Enter the quiz code <strong>CPP-QUIZ-0</strong> in the "Join Quiz" section to attempt this quiz.</p>
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
