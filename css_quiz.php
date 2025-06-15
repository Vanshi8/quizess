<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS Basics Quiz Preview</title>
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
            <p>Quiz Code: <strong>CSS-QUIZ-1</strong></p>
        </div>
        <h2>Quiz: CSS Basics</h2>
        <p>This is a static preview of the quiz. Below are the questions, options, and correct answers.</p>

        <!-- Quiz Questions -->
        <div class="questions">
            <div class="question">
                <p>1. What does CSS stand for?</p>
                <ul class="options">
                    <li>A. Computer Style Sheets</li>
                    <li>B. Creative Style Sheets</li>
                    <li>C. Cascading Style Sheets </li>
                    <li>D. Colorful Style Sheets</li>
                </ul>
            </div>
            <div class="question">
                <p>2. Which property is used to change the background color in CSS?</p>
                <ul class="options">
                    <li>A. background-color</li>
                    <li>B. bgcolor</li>
                    <li>C. color</li>
                    <li>D. background</li>
                </ul>
            </div>
            <div class="question">
                <p>3. How do you select an element with the class "example" in CSS?</p>
                <ul class="options">
                    <li>A. #example</li>
                    <li>B. .example li>
                    <li>C. *example</li>
                    <li>D. example</li>
                </ul>
            </div>
            <div class="question">
                <p>4. Which property is used to change the font of an element in CSS?</p>
                <ul class="options">
                    <li>A. font-family </li>
                    <li>B. font-size</li>
                    <li>C. text-style</li>
                    <li>D. font-style</li>
                </ul>
            </div>
            <div class="question">
                <p>5. How do you apply a style to all <code>&lt;h1&gt;</code> elements on a page in CSS?</p>
                <ul class="options">
                    <li>A. h1 { ... } </li>
                    <li>B. &lt;h1&gt; { ... }</li>
                    <li>C. .h1 { ... }</li>
                    <li>D. *h1 { ... }</li>
                </ul>
            </div>
            <div class="question">
                <p>6. Which property is used to change the text color in CSS?</p>
                <ul class="options">
                    <li>A. color </li>
                    <li>B. text-color</li>
                    <li>C. font-color</li>
                    <li>D. background-color</li>
                </ul>
            </div>
            <div class="question">
                <p>7. What is the correct way to add a comment in CSS?</p>
                <ul class="options">
                    <li>A. <!-- Comment --></li>
                    <li>B. // Comment</li>
                    <li>C. /* Comment */ </li>
                    <li>D. // Comment //</li>
                </ul>
            </div>
            <div class="question">
                <p>8. Which CSS property is used to change the font size of text?</p>
                <ul class="options">
                    <li>A. font-size </li>
                    <li>B. font-weight</li>
                    <li>C. text-size</li>
                    <li>D. text-font</li>
                </ul>
            </div>
            <div class="question">
                <p>9. What does the <code>border-radius</code> property do in CSS?</p>
                <ul class="options">
                    <li>A. Rounds the corners of an element </li>
                    <li>B. Creates a border around an element</li>
                    <li>C. Adds a shadow effect</li>
                    <li>D. Defines the width of the border</li>
                </ul>
            </div>
            <div class="question">
                <p>10. How do you create a responsive layout in CSS?</p>
                <ul class="options">
                    <li>A. Using the <code>@media</code> rule </li>
                    <li>B. Using the <code>@responsive</code> rule</li>
                    <li>C. Setting a fixed width for all elements</li>
                    <li>D. Using JavaScript</li>
                </ul>
            </div>
        </div>

        <div class="take-quiz">
            <button onclick="showTakeQuizMessage()">Take Quiz</button>
            <p id="takeQuizMessage" style="display: none; color: red; font-weight: bold;">Enter the quiz code <strong>CSS-QUIZ-1</strong> in the "Join Quiz" section to attempt this quiz.</p>
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
