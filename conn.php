<!-- connection.php -->
<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbName = "project";

$conn = mysqli_connect($servername, $username, $password, $dbName); 

if(!$conn){
    die("Sorry, we failed to connect: " . mysqli_connect_error()) . "<br>";
}

$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$conpassword = $_POST['conpassword'];
$user_type = $_POST['user_type'];

if($username != "" && $pass != "" && $user_type != "") {
    $sql = "INSERT INTO signup (username, email, pass, conpassword, user_type) 
            VALUES ('$username', '$email', '$pass', '$conpassword', '$user_type')";
    
    $data = mysqli_query($conn, $sql);
    
    if ($data) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['user_type'] = $user_type;

        if ($user_type === 'Student') {
            header("Location: student.php");  
        } elseif ($user_type === 'Teacher') {
            header("Location: teacher.php");  
        } else {
            echo "Please select a valid user type.<br>";
        }
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Please fill in all required fields.<br>";
}

mysqli_close($conn); 
?>