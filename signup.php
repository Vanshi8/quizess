<!-- signup.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="signup-container">
        <div class="signup">
            <div class="leftsign">
                <h1>Create an Account</h1>
                <form action="connection.php" method="POST" id="signup-form">
                    <div class="input-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="input-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Password:</label>
                        <input type="password" id="pass" name="pass" required>
                    </div>
                    <div class="input-group">
                        <label for="confirm-password">Confirm Password:</label>
                        <input type="password" id="confirm-pass" name="conpassword" required>
                    </div>
                    <div class="input-group">
                        <label for="user_type">Type:</label>
                        <select name="user_type" id="user_type" required>
                            <option value="">Select user type</option>
                            <option value="Student">Student</option>
                            <option value="Teacher">Teacher</option>
                        </select>
                    </div>
                    <button type="submit" id="submit">Signup</button>
                </form>
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
            <div class="rightsign">
                <img src="lap.jpg" alt="img" id="img1">
            </div>
        </div>
    </div>

    <script>
        document.getElementById('signup-form').addEventListener('submit', function (e) {
            const password = document.getElementById('pass').value;
            const confirmPassword = document.getElementById('confirm-pass').value;

            if (password !== confirmPassword) {
                alert("Passwords do not match. Please try again.");
                e.preventDefault();
            }
        });
    </script>
</body>
</html>
