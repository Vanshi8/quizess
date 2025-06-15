<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "project";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $satisfaction = $conn->real_escape_string($_POST['satisfaction']);
    $improvements = $conn->real_escape_string($_POST['improvements']);
    $recommend = $conn->real_escape_string($_POST['recommend']);
    $feedback = $conn->real_escape_string($_POST['feedback']);

    
    $sql = "INSERT INTO survey_responses (name, email, satisfaction, improvements, recommend, feedback) 
            VALUES ('$name', '$email', '$satisfaction', '$improvements', '$recommend', '$feedback')";

    if ($conn->query($sql) === TRUE) {
        echo "<h1>Thank you for your feedback!</h1>";
        echo "<p>Your responses have been successfully recorded.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
