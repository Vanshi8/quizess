<?php
session_start();

// Debugging session variables
if (!isset($_SESSION['email']) || !isset($_SESSION['username'])) {
    echo "Session not set. Debugging info:<br>";
    print_r($_SESSION); // Display session content for debugging
    exit;
}

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbName = "project";

// Database connection
$conn = mysqli_connect($servername, $username, $password, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['email'], $_POST['age'], $_POST['gender'], $_POST['course'], $_POST['section'], $_POST['quizCode'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);
    $quizCode = mysqli_real_escape_string($conn, $_POST['quizCode']);

    // Validate quiz code existence
    $quizCheckQuery = "SELECT * FROM quizzes WHERE quizCode = ?";
    $stmt = $conn->prepare($quizCheckQuery);
    $stmt->bind_param("s", $quizCode);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // quizCode is valid, proceed with registration
        if (!empty($name) && !empty($email) && !empty($course)) {
            $sql = "INSERT INTO student (name, email, age, gender, course, section, quizCode) 
                    VALUES ('$name', '$email', '$age', '$gender', '$course', '$section', '$quizCode')";
            if (mysqli_query($conn, $sql)) {
                // Redirect to the quiz page on successful registration
                header("Location: quiz.php?quizCode=$quizCode");
                exit; // Stop further script execution
            } else {
                echo "Error inserting data: " . mysqli_error($conn);
            }
        } else {
            echo "Required fields are missing.";
        }
    } else {
        // Redirect to home page if quiz code is invalid
        echo "Invalid quiz code. Redirecting...";
        header("refresh:3; url=home_page.php"); // Delay before redirect
        exit;
    }
} else {
    echo "Form data not submitted.";
}

mysqli_close($conn);
?>
