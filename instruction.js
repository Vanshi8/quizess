// Countdown timer variables
let timeRemaining = 20 * 60; // Default to 20 minutes in seconds
let countdownElement = document.getElementById("countdown");
let timerInterval;

// Function to format time in MM:SS
function formatTime(seconds) {
    let minutes = Math.floor(seconds / 60);
    let remainingSeconds = seconds % 60;
    return `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
}

// Function to update countdown
function updateCountdown() {
    countdownElement.textContent = formatTime(timeRemaining);
    if (timeRemaining > 0) {
        timeRemaining--;
    } else {
        clearInterval(timerInterval);
        alert("Time is up! The quiz will now be submitted.");
        // Redirect to submission page or handle auto-submit
        window.location.href = "save_response.php";
    }
}

// Function to start the timer
function startTimer() {
    timerInterval = setInterval(updateCountdown, 1000);
}

// Start Quiz button functionality
document.getElementById("startQuizButton").addEventListener("click", function () {
    // Start the timer and redirect to the quiz page
    startTimer();
    const quizCode = new URLSearchParams(window.location.search).get('quizCode');
    window.location.href = `quiz.php?quizCode=${encodeURIComponent(quizCode)}`;
});
