function submitQuiz(questions, userData) {
    const answers = questions.map((question, index) => {
        const selectedOption = document.querySelector(`input[name="question${index}"]:checked`);
        return {
            questionNumber: index + 1,
            selectedAnswer: selectedOption ? parseInt(selectedOption.value) : null,
        };
    });

    // Prepare JSON payload
    const formData = {
        ...userData,
        answers,
    };

    console.log('Sending JSON payload:', formData);

    fetch('submit-quiz.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Display the result to the user
                alert(`You scored ${data.score} out of ${data.total} questions.`);
                window.location.href = `quiz_completed.php?quizCode=${encodeURIComponent(formData.quizCode)}&score=${data.score}&total=${data.total}`;
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error submitting quiz:', error);
            alert('There was an error submitting the quiz.');
        });
}
