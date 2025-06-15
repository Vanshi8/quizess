const questionsContainer = document.getElementById('questionsContainer');
const submitQuestionsButton = document.getElementById('submit-questions');
const quizCodeContainer = document.getElementById('quizCodeContainer');
const quizCodeElement = document.getElementById('quizCode');
const reviewContainer = document.getElementById('reviewContainer');
const reviewList = document.getElementById('reviewList');

function generateForm() {
    const numQuestions = parseInt(document.getElementById('numQuestions').value, 10);
    const timeLimit = parseInt(document.getElementById('timeLimit').value, 10);

    if (!numQuestions || numQuestions <= 0) {
        alert('Please enter a valid number of questions.');
        return;
    }

    if (!timeLimit || timeLimit <= 0) {
        alert('Please enter a valid time limit.');
        return;
    }

    const quizCode = generateQuizCode();
    quizCodeContainer.style.display = 'block';
    quizCodeElement.textContent = quizCode;

    questionsContainer.innerHTML = '';
    reviewList.innerHTML = '';
    reviewContainer.style.display = 'none';

    for (let i = 1; i <= numQuestions; i++) {
        const questionForm = document.createElement('div');
        questionForm.className = 'question-form';

        questionForm.innerHTML = `
            <h3>Question ${i}</h3>
            <div class="input-group">
                <label for="question${i}">Enter Question:</label>
                <input type="text" id="question${i}" placeholder="Type your question here">
            </div>
            <div class="question-options">
                <div class="input-group">
                    <label>Option A:</label>
                    <input type="text" id="question${i}OptionA" placeholder="Option A">
                </div>
                <div class="input-group">
                    <label>Option B:</label>
                    <input type="text" id="question${i}OptionB" placeholder="Option B">
                </div>
                <div class="input-group">
                    <label>Option C:</label>
                    <input type="text" id="question${i}OptionC" placeholder="Option C">
                </div>
                <div class="input-group">
                    <label>Option D:</label>
                    <input type="text" id="question${i}OptionD" placeholder="Option D">
                </div>
            </div>
            <div class="input-group correct-answer">
                <label for="correctAnswer${i}">Correct Answer:</label>
                <select id="correctAnswer${i}">
                    <option value="A">Option A</option>
                    <option value="B">Option B</option>
                    <option value="C">Option C</option>
                    <option value="D">Option D</option>
                </select>
            </div>
        `;

        questionsContainer.appendChild(questionForm);
    }

    submitQuestionsButton.style.display = 'block';
}

function generateQuizCode() {
    const characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ123456789';
    let code = '';
    for (let i = 0; i < 6; i++) {
        code += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return code;
}

function reviewQuestions() {
    const numQuestions = parseInt(document.getElementById('numQuestions').value, 10);
    reviewList.innerHTML = ''; 

    for (let i = 1; i <= numQuestions; i++) {
        const question = document.getElementById(`question${i}`).value.trim();
        const optionA = document.getElementById(`question${i}OptionA`).value.trim();
        const optionB = document.getElementById(`question${i}OptionB`).value.trim();
        const optionC = document.getElementById(`question${i}OptionC`).value.trim();
        const optionD = document.getElementById(`question${i}OptionD`).value.trim();
        const correctAnswer = document.getElementById(`correctAnswer${i}`).value;

        if (!question || !optionA || !optionB || !optionC || !optionD || !correctAnswer) {
            alert(`Please complete all fields for Question ${i}.`);
            return;
        }

        const li = document.createElement('li');
        li.innerHTML = `
            <strong>${question}</strong><br>
            A: ${optionA} <br>
            B: ${optionB} <br>
            C: ${optionC} <br>
            D: ${optionD} <br>
            Correct Answer: ${correctAnswer}
        `;
        reviewList.appendChild(li);
    }

    reviewContainer.style.display = 'block';
}

function submitQuestions() {
    const numQuestions = parseInt(document.getElementById('numQuestions').value, 10);
    const timeLimit = parseInt(document.getElementById('timeLimit').value, 10);
    const quizCode = quizCodeElement.textContent;
    const questions = [];

    for (let i = 1; i <= numQuestions; i++) {
        const question = document.getElementById(`question${i}`).value.trim();
        const optionA = document.getElementById(`question${i}OptionA`).value.trim();
        const optionB = document.getElementById(`question${i}OptionB`).value.trim();
        const optionC = document.getElementById(`question${i}OptionC`).value.trim();
        const optionD = document.getElementById(`question${i}OptionD`).value.trim();
        const correctAnswer = document.getElementById(`correctAnswer${i}`).value;

        if (!question || !optionA || !optionB || !optionC || !optionD || !correctAnswer) {
            alert(`Please complete all fields for Question ${i}.`);
            return;
        }

        questions.push({
            question,
            options: { A: optionA, B: optionB, C: optionC, D: optionD },
            correctAnswer,
        });
    }

    const payload = { quizCode, timeLimit, questions };

    fetch('save_quiz.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                alert(`Quiz successfully saved! Quiz Code: ${quizCode}`);
                window.location.reload();
            } else {
                alert(`Error: ${data.message}`);
            }
        })
        .catch((error) => {
            console.error('Error:', error);
            alert('There was an error submitting your quiz.');
        });
}
