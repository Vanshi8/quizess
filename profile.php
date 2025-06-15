<!-- profile.php -->
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: signup.php");
    exit();
}

$username = $_SESSION['username'];
$email = $_SESSION['email'];
$userType = $_SESSION['userType'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="profile-container">
        <h1>Welcome, <?php echo $username; ?>!</h1>
        
        <div class="profile-details">
            <p><strong>Username:</strong> <?php echo $username; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>User Type:</strong> <?php echo $userType; ?></p>

            <form action="logout.php" method="POST">
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>