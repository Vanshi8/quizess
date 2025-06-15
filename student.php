<!-- student.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="student.css">  
</head>
<body>
    <div class="registration-container">
        <h1>Student Registration</h1>
        <form action="register.php" method="POST" onsubmit="redirectAfterSubmit(event)">
            <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" placeholder="Enter your full name" required>
            </div>
             
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" placeholder="Enter your email address" required>
            </div>

            <div class="form-group">
                <label for="age">Age: </label>
                <input type="number" name="age" id="age" placeholder="Enter your age" required min="1">
            </div>

            <div class="form-group">
                <label for="gender">Gender: </label>
                <select name="gender" id="gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="course">Class/Course: </label>
                <input type="text" name="course" id="course" placeholder="Enter your class or course" required>
            </div>

            <div class="form-group">
                <label for="section">Section (Optional): </label>
                <input type="text" name="section" id="section" placeholder="Enter your section (optional)">
            </div>

            <div class="form-group">
                <label for="quizCode">Code: </label>
                <input type="text" name="quizCode" id="quizCode" placeholder="Enter your unique code" required>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Register" >
            </div>
        </form>
    </div>
</body>
</html>
