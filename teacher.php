<!-- teacher.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Registration</title>
    <link rel="stylesheet" href="teacher.css"> 
</head>
<body>
    <div class="registration-container">
        <h1>Teacher Registration</h1>
        <form action="register_teacher.php" method="POST">
            <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" placeholder="Enter your email address" required>
            </div>

            <div class="form-group">
                <label for="subject">Subject: </label>
                <input type="text" name="subject" id="subject" placeholder="Enter the subject you teach" required>
            </div>

            <div class="form-group">
                <label for="topic">Topic: </label>
                <input type="text" name="topic" id="topic" placeholder="Enter the topic you specialize in" required>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Register">
            </div>
        </form>
    </div>
</body>
</html>

