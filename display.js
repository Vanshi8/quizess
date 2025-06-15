document.getElementById('joinQuizForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const subject = document.getElementById('subject').value.trim();

    if (!name || !email || !subject) {
        alert("All fields are required!");
        return;
    }

    const formData = { name, email, subject };

    fetch('save_user.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("User information saved successfully.");
                // Store email in session for later use
                sessionStorage.setItem('userEmail', email);
            } else {
                alert("Error: " + data.message);
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An error occurred. Please try again.");
        });
});
