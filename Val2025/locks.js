let questionIndex = 0;
const questions = [
    { question: "What is the color of love?", answer: "Red" },
    { question: "Which month is Valentine's Day?", answer: "February" },
    { question: "Which shape symbolizes love?", answer: "Heart" }
];

function checkAnswer(button, answer) {
    if (answer === questions[questionIndex].answer) {
        questionIndex++;
        if (questionIndex < questions.length) {
            document.getElementById("question-text").textContent = "Question " + (questionIndex + 1) + ": " + questions[questionIndex].question;
        } else {
            // Unlock all locks
            openEnvelope();
        }
    } else {
        alert("Wrong answer! Try again.");
    }
}

function openEnvelope() {
    document.querySelector(".flap").style.transform = "rotateX(180deg)";
    setTimeout(() => {
        document.querySelector(".letter").style.display = "block";
        document.getElementById("question-container").classList.add("hidden");
        document.getElementById("choice-buttons").classList.remove("hidden");
    }, 500);
}

function noClicked() {
    let noButton = document.getElementById("no-btn");
    let yesButton = document.getElementById("yes-btn");

    if (noButton.textContent === "No") {
        noButton.textContent = "Are you sure?";
    } else if (noButton.textContent === "Are you sure?") {
        noButton.textContent = "Change your mind";
        yesButton.style.transform = "scale(1.5)";
    } else {
        noButton.textContent = "Yes";
        yesButton.style.transform = "scale(2)";
    }
}

function finalStep() {
    document.querySelector(".letter").textContent = "I love you Sae!";
    document.getElementById("choice-buttons").innerHTML = `<button onclick="window.location.href='next.html'">Love Letter</button>`;
}
