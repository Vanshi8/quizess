<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static HTML Quiz Preview</title>
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
            <p>Quiz Code: <strong>HTML-QUIZ-</strong></p>
        </div>
        <h2>Quiz: HTML Basics</h2>
        <p>This is a static preview of the quiz. Below are the questions, options, and correct answers.</p>

       
        <div class="questions">
            <div class="question">
                <p>1. What does HTML stand for?</p>
                <ul class="options">
                    <li>A. Hyper Text Markup Language </li>
                    <li>B. Hyperlinks and Text Markup Language</li>
                    <li>C. Home Tool Markup Language</li>
                    <li>D. Hyperlink Text Mode Language</li>
                </ul>
            </div>
            <div class="question">
                <p>2. Which tag is used for creating a hyperlink in HTML?</p>
                <ul class="options">
                    <li>A. &lt;link&gt;</li>
                    <li>B. &lt;href&gt;</li>
                    <li>C. &lt;a&gt; </li>
                    <li>D. &lt;hyperlink&gt;</li>
                </ul>
            </div>
            <div class="question">
                <p>3. Which is the correct HTML element for inserting a line break?</p>
                <ul class="options">
                    <li>A. &lt;lb&gt;</li>
                    <li>B. &lt;br&gt; </li>
                    <li>C. &lt;break&gt;</li>
                    <li>D. &lt;linebreak&gt;</li>
                </ul>
            </div>
            <div class="question">
                <p>4. What is the purpose of the &lt;head&gt; tag in HTML?</p>
                <ul class="options">
                    <li>A. To define the main content of the page</li>
                    <li>B. To include metadata and links to resources</li>
                    <li>C. To display a heading</li>
                    <li>D. To create a navigation bar</li>
                </ul>
            </div>
            <div class="question">
                <p>5. Which HTML attribute is used to define inline styles?</p>
                <ul class="options">
                    <li>A. class</li>
                    <li>B. id</li>
                    <li>C. style </li>
                    <li>D. inline</li>
                </ul>
            </div>
            <div class="question">
                <p>6. Which is the largest heading tag in HTML?</p>
                <ul class="options">
                    <li>A. &lt;heading&gt;</li>
                    <li>B. &lt;h6&gt;</li>
                    <li>C. &lt;h1&gt; </li>
                    <li>D. &lt;h0&gt;</li>
                </ul>
            </div>
            <div class="question">
                <p>7. How can you open a link in a new tab in HTML?</p>
                <ul class="options">
                    <li>A. Add target="_tab"</li>
                    <li>B. Add target="new"</li>
                    <li>C. Add target="_blank" </li>
                    <li>D. Add target="_self"</li>
                </ul>
            </div>
            <div class="question">
                <p>8. Which tag is used to define an unordered list?</p>
                <ul class="options">
                    <li>A. &lt;ul&gt; </li>
                    <li>B. &lt;ol&gt;</li>
                    <li>C. &lt;list&gt;</li>
                    <li>D. &lt;unordered&gt;</li>
                </ul>
            </div>
            <div class="question">
                <p>9. Which element is used to specify a title for a table?</p>
                <ul class="options">
                    <li>A. &lt;header&gt;</li>
                    <li>B. &lt;th&gt;</li>
                    <li>C. &lt;caption&gt; </li>
                    <li>D. &lt;title&gt;</li>
                </ul>
            </div>
            <div class="question">
                <p>10. What does the "alt" attribute in the &lt;img&gt; tag specify?</p>
                <ul class="options">
                    <li>A. The image source</li>
                    <li>B. Alternative text to display if the image fails to load </li>
                    <li>C. Image alignment</li>
                    <li>D. Image dimensions</li>
                </ul>
            </div>
        </div>

        <!-- Take Quiz Section -->
        <div class="take-quiz">
            <button onclick="showTakeQuizMessage()">Take Quiz</button>
            <p id="takeQuizMessage" style="display: none; color: red; font-weight: bold;">Enter the quiz code <strong>HTML-QUIZ-</strong> in the "Join Quiz" section to attempt this quiz.</p>
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
