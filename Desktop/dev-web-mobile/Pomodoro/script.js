const start = document.getElementById("start");
const stop = document.getElementById("stop");
const reset = document.getElementById("reset");
const timer = document.getElementById("timer");
const statusText = document.getElementById("statusText"); 

let timeLeft = 3;
let interval;
let sessionCount = 0;
let isBreak = false; 

const updateTimer = () => {
    const minutes = Math.floor(timeLeft / 60);
    const seconds = timeLeft % 60;
    timer.innerHTML = `${minutes.toString().padStart(2, "0")} : ${seconds.toString().padStart(2, "0")}`;
};

const startTimer = () => {
    if (interval) return; 

    interval = setInterval(() => {
        timeLeft--;
        updateTimer();

        if (timeLeft === 0) {
            clearInterval(interval);
            interval = null;

            if (isBreak) {
                
                alert("Pause terminée !");
                timeLeft = 3; 
                isBreak = false;
                statusText.innerText = "💼 Travail en cours...";
            } else {
                
                sessionCount++;
                isBreak = true;

                if (sessionCount % 4 === 0) {
                    timeLeft = 900; 
                    alert("Session terminée ! Prenez une pause de 15 minutes.");
                    statusText.innerText = "😌 Longue pause de 15 min...";
                } else {
                    timeLeft = 300; 
                    alert("Session terminée ! Prenez une pause de 5 minutes.");
                    statusText.innerText = "☕ Pause de 5 min...";
                }
            }

            updateTimer();
        }
    }, 1000);
};

const stopTimer = () => {
    clearInterval(interval);
    interval = null;
};

const resetTimer = () => {
    clearInterval(interval);
    interval = null;
    timeLeft = 3;
    isBreak = false;
    sessionCount = 0;
    statusText.innerText = "💼 Travail en cours...";
    updateTimer();
};


start.addEventListener("click", startTimer);
stop.addEventListener("click", stopTimer);
reset.addEventListener("click", resetTimer);


const taskInput = document.getElementById("taskInput");
const addTask = document.getElementById("addTask");
const taskList = document.getElementById("taskList");


addTask.addEventListener("click", () => {
    const taskText = taskInput.value.trim();                                                
    if (taskText === "") return;

    const li = document.createElement("li");
    li.innerHTML = `
        <span class="task-text">${taskText}</span>
        <button class="edit">✏️</button>
        <button class="delete">❌</button>
    `;

    taskList.appendChild(li);
    taskInput.value = "";

    li.querySelector(".edit").addEventListener("click", () => {
        const newText = prompt("Modifier la tâche :", taskText);
        if (newText !== null && newText.trim() !== "") {
            li.querySelector(".task-text").innerText = newText;
        }
    });

    li.querySelector(".delete").addEventListener("click", () => {
        taskList.removeChild(li);
    });
});
