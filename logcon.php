<?php
session_start();

// Database connection
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbName = "project";

$conn = new mysqli($servername, $username, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate and sanitize form data
$email = trim($_POST['email']); // Using email for login
$password = trim($_POST['pass']);
$user_type = trim($_POST['user_type']);

if (empty($email) || empty($password) || empty($user_type)) {
    $_SESSION['loginError'] = "Please fill in all required fields.";
    header("Location: login.php");
    exit();
}

// Prepare statement to fetch user by email and type
$query = "SELECT * FROM signup WHERE email = ? AND user_type = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $email, $user_type);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Compare plain text passwords
    if ($password === $user['pass']) {
        // Set session variables
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['userType'] = $user['user_type'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];

        // Fetch user's quiz results
        $resultsQuery = "SELECT quiz_code, score, total_questions, percentage FROM results WHERE user_email = ?";
        $resultStmt = $conn->prepare($resultsQuery);
        $resultStmt->bind_param("s", $email);
        $resultStmt->execute();
        $userResults = $resultStmt->get_result();

        // Store results in session
        $_SESSION['results'] = $userResults->fetch_all(MYSQLI_ASSOC);

        // Redirect to home page
        header("Location: home_page.php");
        exit();
    } else {
        $_SESSION['loginError'] = "Invalid password.";
    }
} else {
    $_SESSION['loginError'] = "Invalid email or user type.";
}

header("Location: login.php");
$stmt->close();
$conn->close();
?>
