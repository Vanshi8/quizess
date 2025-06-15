<?php
session_start();

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbName = "project";

$conn = mysqli_connect($servername, $username, $password, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['pass']); // Store as plain text
$confirmPassword = mysqli_real_escape_string($conn, $_POST['conpassword']);
$user_type = mysqli_real_escape_string($conn, $_POST['user_type']);

if ($password !== $confirmPassword) {
    die("Passwords do not match. <a href='signup.php'>Try again</a>");
}

if (empty($username) || empty($email) || empty($password) || empty($user_type)) {
    die("All fields are required. <a href='signup.php'>Try again</a>");
}

// Check if email already exists
$emailCheckQuery = "SELECT * FROM signup WHERE email = ?";
$stmt = $conn->prepare($emailCheckQuery);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    die("This email is already registered. <a href='login.php'>Login</a>");
}

$insertQuery = "INSERT INTO signup (username, email, pass, user_type) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($insertQuery);
$stmt->bind_param("ssss", $username, $email, $password, $user_type); // Password stored as plain text

if ($stmt->execute()) {
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['user_type'] = $user_type;

    if ($user_type === "Student") {
        header("Location: student.php");
    } elseif ($user_type === "Teacher") {
        header("Location: teacher.php");
    }
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
