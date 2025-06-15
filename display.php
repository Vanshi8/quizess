<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Quiz</title>
    <link rel="stylesheet" href="display.css">
</head>
<body>
    <div class="container">
        <h1>Join Quiz</h1>
        <form id="joinQuizForm">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" placeholder="Enter subject" required>
            
            <label for="quizCode">Quiz Code:</label>
            <input type="text" id="quizCode" name="quizCode" placeholder="Enter quiz code" required>
            
            <button type="submit">Join Quiz</button>
        </form>
    </div>

    <script>
        document.getElementById('joinQuizForm').addEventListener('submit', function (event) {
            event.preventDefault();

            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const subject = document.getElementById('subject').value.trim();
            const quizCode = document.getElementById('quizCode').value.trim();

            if (!name || !email || !subject || !quizCode) {
                alert("All fields are required!");
                return;
            }

            const formData = { name, email, subject, quizCode };

            fetch('save_user.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(formData),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("User information saved successfully.");
                    // Redirect to quiz.php
                    window.location.href = `quiz.php?quizCode=${encodeURIComponent(quizCode)}`;
                } else {
                    alert("Error: " + data.message);
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("An error occurred. Please try again.");
            });
        });
    </script>
</body>
</html>
