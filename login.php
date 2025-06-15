<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <div class="login">
            <div class="leftlogin">
                <h1>Welcome back</h1>
                <?php
                if (isset($_SESSION['loginError'])) {
                    echo "<p style='color: red;'>" . $_SESSION['loginError'] . "</p>";
                    unset($_SESSION['loginError']); 
                }
                ?>
                <form action="logcon.php" method="POST" id="loginform">
                    <div class="input-group">
                        <label for="username">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Password:</label>
                        <input type="password" id="pass" name="pass" required>
                    </div>
                    <div class="input-group">
                        <label for="user_type">Type:</label>
                        <select name="user_type" id="user_type" required>
                            <option value="">Select user type</option>
                            <option value="Student">Student</option>
                            <option value="Teacher">Teacher</option>
                        </select>
                    </div>
                    <button type="submit" id="submit">Login</button>
                </form>
                <p>Don't have an account? <a href="signup.php">Sign up</a></p>
            </div>
            <div class="rightlogin">
                <img src="lap1.jpg" alt="img" id="img1">
            </div>
        </div>
    </div>
</body>
</html>
