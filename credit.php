<?php
// Start the session
session_start();

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true;

// Ensure session variables for username and email
$username = $isLoggedIn ? $_SESSION['username'] : 'Guest';
$email = $isLoggedIn && isset($_SESSION['email']) ? $_SESSION['email'] : null; // Get email or set to null
$userCredits = $isLoggedIn && isset($_SESSION['credits']) ? $_SESSION['credits'] : 0; // Default credits to 0 if not set

// Initialize results array
$userResults = [];

// Validate email existence for logged-in users
if ($isLoggedIn && $email) {
    // Database connection parameters
    $servername = "localhost:3307";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "project";

    // Connect to the database
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

    // Check database connection
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Fetch user quiz results using email
    $stmt = $conn->prepare("SELECT quiz_code, score, total_questions, percentage FROM results WHERE user_email = ?");
    $stmt->bind_param("s", $email); // Bind email from session

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $userResults[] = $row;
        }
    } else {
        echo "Error fetching results: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credits Page</title>
    <link rel="stylesheet" href="credit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
          crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="nav-logo">
                <p>Quizess</p>
            </div>
            <div class="nav-home">
                <a href="home_page.php">Home</a>
            </div>
            <div class="nav-credits">
                <a href="credit.php">Credits</a>
            </div>
            <div class="nav-signin">
                <a href="<?= $isLoggedIn ? 'logout.php' : 'signup.php'; ?>">
                    <?= $isLoggedIn ? 'Sign Out' : 'Sign In'; ?>
                </a>
            </div>
        </div>
    </header>

    <div class="credits-container">
        <h1>Manage Your Credits</h1>
        
        <?php if ($isLoggedIn): ?>
            <div class="user-info">
                <h2>Welcome, <?= htmlspecialchars($username); ?>!</h2>
                <h3>Your Email: <?= htmlspecialchars($email); ?></h3>
                <h3>Your Credit Balance: <?= htmlspecialchars($userCredits); ?> Credits</h3>
            </div>

            <div class="credit-info">
                <h3>How to Earn Credits:</h3>
                <ul>
                    <li>Complete quizzes</li>
                    <li>Participate in special challenges</li>
                    <li>Refer friends to join</li>
                    <li>Daily login bonuses</li>
                </ul>
            </div>

            <div class="earn-credits">
                <h3>Buy More Credits:</h3>
                <p>If you need more credits, you can purchase them directly through our platform.</p>
                <a href="purchase.php" class="btn-buy-credits">Buy Credits</a>
            </div>

            <div class="results-section">
                <h3>Your Quiz Results:</h3>
                <?php if (!empty($userResults)): ?>
                    <table class="results-table">
                        <thead>
                            <tr>
                                <th>Quiz Code</th>
                                <th>Score</th>
                                <th>Total Questions</th>
                                <th>Percentage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($userResults as $result): ?>
                                <tr>
                                    <td><?= htmlspecialchars($result['quiz_code']); ?></td>
                                    <td><?= htmlspecialchars($result['score']); ?></td>
                                    <td><?= htmlspecialchars($result['total_questions']); ?></td>
                                    <td><?= htmlspecialchars($result['percentage']); ?>%</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>You haven't completed any quizzes yet. Start one now!</p>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <p>Please <a href="signup.php">sign in</a> to view your credits and results!</p>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2024 Quizess. All rights reserved.</p>
    </footer>
</body>
</html>
