<!-- home_page.php -->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page</title>
    <link rel="stylesheet" href="home_page.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <div class="navbar">
            <div class="nav-logo border">
                <div class="logo">
                    <p>Quizess</p>
                </div>
            </div>
            <div class="home border">
                <i class="fa-solid fa-house"></i>
                <div><a href="home_page.php">Home</a></div>
            </div>
            <div class="nav-search">
                <select class="select">
                    <option>All</option>
                </select>
                <input id="quizCodeInput" class="input" type="text" placeholder="Enter Quiz Code" />
                <div class="search-icon">
                    <i class="fa-solid fa-magnifying-glass" id="searchQuiz"></i>
                </div>
            </div>
            <div class="cred border">
                <i class="fa-solid fa-award"></i>
                <p><a href="credit.php">Credits</a></p>
            </div>
            <div class="nav-signin border">
                <p><span></span>Hello</p>
                <a href="signup.php">Sign In</a>
            </div>
            <div class="nav-about border">
                <a href="aboutus.php">About</a>
                <a href="aboutus.php">Us</a>
            </div>
            <div class="nav-profile border">
                <a href="profile.php">
                    <i class="fa-solid fa-user"></i>
                    Profile
                </a>
            </div>
        </div>

        <div class="hero_section">
            <div class="hero_msg">Quizess...</div>
        </div>

        <div class="container">
            <div class="box" id="box1" onclick="handleBoxClick()">
                <h1>Create a New Quiz</h1>
                <p>Creating a new quiz is simple and fun! Start by giving your quiz a title and selecting a category or
                    topic.</p>
                <div class="img img1"></div>
            </div>

            <div class="box" id="box2" onclick="handleJoinBoxClick()">
                <div class="img img2"></div>
                <div id="text">
                <h1>Join Quiz</h1>
                <p>Joining a quiz is quick and easy! Simply enter the code to the quiz you want to participate in.</p>
                </div>
            </div>
        </div>

        </div>

        <div class="container1">
            <div class="row">
                <a href="c_quiz.php">
                    <img src="cp.png" alt="C Quiz" class="image">
                </a>
                <a href="cpp_quiz.php">
                    <img src="cpp.png" alt="C++ Quiz" class="image">
                </a>
                <a href="python_quiz.php">
                    <img src="python.jpeg" alt="Python Quiz" class="image">
                </a>
            </div>
            <div class="row">
                <a href="html_quiz.php">
                    <img src="html.webp" alt="HTML Quiz" class="image">
                </a>
                <a href="css_quiz.php">
                    <img src="css.webp" alt="CSS Quiz" class="image">
                </a>
                <a href="js_quiz.php">
                    <img src="js.jpeg" alt="JavaScript Quiz" class="image">
                </a>
            </div>

            <div class="join">
                <h1>Joining a Quiz</h1>
                <p>Join the excitement of our quiz competition with a special perk – use a referral code to get
                    exclusive access and additional benefits! Entering a referral code when signing up gives you a head
                    start, allowing you to unlock bonus points, hints, or even a chance to preview some quiz topics.
                    Simply sign up, enter the referral code, and dive into challenging questions that test your
                    knowledge and bring out your competitive spirit. Not only does this make the experience more
                    rewarding, but it also adds an extra layer of fun as you compete with friends. Don't miss out – join
                    now with a referral code and level up your quiz journey!</p>
            </div>
            <div class="create">
                <h1>Creating a New Quiz</h1>
                <p>Creating a new quiz is a fantastic way to engage others, test knowledge, and have fun! Start by
                    choosing a theme or topic that excites you—anything from general knowledge and history to pop
                    culture and niche interests. Next, craft your questions, aiming for a mix of difficulty levels to
                    keep it interesting and accessible to a wide range of players. Once your questions are ready,
                    consider adding hints or bonus rounds to make the quiz more dynamic. Finally, set up the quiz on
                    your chosen platform, customize the appearance to reflect your style, and share it with your
                    audience. Whether it’s for a friendly challenge among friends or a larger event, creating a quiz is
                    a great way to bring people together and make learning fun!</p>
            </div>
        </div>

        <!-- FOOTER -->
        <hr />
        <div class="login">
            <p>See personalized recommendations</p>
            <button onclick="window.location.href='signup.php'">Sign in</button>
            <p>New customer? <a href="#">Start here.</a></p>

            <h3>Contact Us</h3>
            <p>Email: support@quizify.com</p>
            <p>Phone: +123 456 7890</p>
            <p>Follow us:</p>
            <!-- <div class="social-icons"> -->
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <br>
            <a href="feedback.php">Feedback</a>
            <!-- </div> -->
        </div>
        <div class="footer-section contact">
            <hr />
    </header>

    <script src="home.js"></script>
    <script>
    const isLoggedIn = <?php echo isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ? 'true' : 'false'; ?>;
    const userType = "<?php echo isset($_SESSION['userType']) ? $_SESSION['userType'] : ''; ?>";

    function handleBoxClick() {
        if (isLoggedIn && userType === 'Teacher') {
            window.location.href = "ques.php";
        } else if (!isLoggedIn) {
            window.location.href = "signup.php";
        } else {
            alert("Only teachers can create a new quiz.");
        }
    }

    function handleJoinBoxClick() {
        if (isLoggedIn) {
            window.location.href = "joinQuiz.php";
        } else {
            window.location.href = "signup.php";
        }
    }
    document.getElementById('searchQuiz').addEventListener('click', function() {
        const quizCode = document.getElementById('quizCodeInput').value.trim();

        if (!quizCode) {
            alert("Please enter a quiz code.");
            return;
        }

        fetch('validate_quiz.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    quizCode
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {

                    window.location.href = `quiz.php?quizCode=${encodeURIComponent(quizCode)}`;
                } else {
                    alert("Invalid quiz code. Please try again.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("An error occurred while validating the quiz code.");
            });
    });
    </script>

</body>

</html>