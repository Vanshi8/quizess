<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Questionnaire</title>
    <link rel="stylesheet" href="feedback.css">
</head>
<body>
    <div class="container">
        <h1>Customer Satisfaction Survey</h1>
        <p>We value your feedback. Please take a few minutes to fill out this survey.</p>
        <form action="submit-survey.php" method="post">
            
            <h2>Personal Information</h2>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            
            <h2>Survey Questions</h2>
            <div class="form-group">
                <label>1. How satisfied are you with our product/service?</label>
                <div>
                    <input type="radio" id="very-satisfied" name="satisfaction" value="very-satisfied" required>
                    <label for="very-satisfied">Very Satisfied</label>
                </div>
                <div>
                    <input type="radio" id="satisfied" name="satisfaction" value="satisfied">
                    <label for="satisfied">Satisfied</label>
                </div>
                <div>
                    <input type="radio" id="neutral" name="satisfaction" value="neutral">
                    <label for="neutral">Neutral</label>
                </div>
                <div>
                    <input type="radio" id="dissatisfied" name="satisfaction" value="dissatisfied">
                    <label for="dissatisfied">Dissatisfied</label>
                </div>
                <div>
                    <input type="radio" id="very-dissatisfied" name="satisfaction" value="very-dissatisfied">
                    <label for="very-dissatisfied">Very Dissatisfied</label>
                </div>
            </div>
            <div class="form-group">
                <label for="improvements">2. What improvements would you like to see?</label>
                <textarea id="improvements" name="improvements" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label>3. Would you recommend us to others?</label>
                <select id="recommend" name="recommend" required>
                    <option value="">-- Select an option --</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    <option value="maybe">Maybe</option>
                </select>
            </div>

            
            <h2>Additional Feedback</h2>
            <div class="form-group">
                <label for="feedback">Please share any additional comments or suggestions:</label>
                <textarea id="feedback" name="feedback" rows="4"></textarea>
            </div>

            
            <button type="submit">Submit Survey</button>
        </form>
    </div>
</body>
</html>
