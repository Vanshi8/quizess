document.getElementById('joinQuizForm').addEventListener('submit', function (event) {
    event.preventDefault();

    // Collect form data
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const subject = document.getElementById('subject').value.trim();
    const quizCode = document.getElementById('quizCode').value.trim();

    // Validate form data
    if (!name || !email || !subject || !quizCode) {
        alert("All fields are required!");
        return;
    }

    // Prepare data to send to the backend
    const formData = {
        name: name,
        email: email,
        subject: subject,
        quizCode: quizCode,
    };

    fetch('join-quiz.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect to the instruction page with quiz details
                const instructionURL = `instruction.php?quizCode=${encodeURIComponent(quizCode)}&timeLimit=${encodeURIComponent(data.timeLimit)}`;
                window.location.href = instructionURL;
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error joining quiz:', error);
            alert('There was an error joining the quiz.');
        });
});
