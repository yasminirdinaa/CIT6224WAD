const goalsBody = document.getElementById("goalsBody");
const goalTitleInput = document.getElementById("goalTitle");
const goalDescriptionInput = document.getElementById("goalDescription");
const dueDateInput = document.getElementById("dueDate");
const progressSelect = document.getElementById("progressSelect");
const progressValueDisplay = document.getElementById("progressValue");
const addGoalBtn = document.getElementById("addGoalBtn");

let goals = [];

function renderGoals() {
    goalsBody.innerHTML = "";
    goals.forEach((goal, index) => {
        const row = `
            <tr>
                <td>${goal.title}</td>
                <td>${goal.description}</td>
                <td>${goal.dueDate}</td>
                <td>${goal.progress}</td>
                <td>
                    <button class="update" onclick="editGoal(${index})">Edit</button>
                    <button onclick="deleteGoal(${index})">Delete</button>
                </td>
            </tr>
        `;
        goalsBody.innerHTML += row;
    });
}

addGoalBtn.addEventListener("click", () => {
    const title = goalTitleInput.value.trim();
    const description = goalDescriptionInput.value.trim();
    const dueDate = dueDateInput.value.trim();
    const progress = progressSelect.value;

    if (title && description && dueDate) {
        const existingIndex = goals.findIndex(goal => goal.title === title);
        if (existingIndex > -1) {
            goals[existingIndex].description = description;
            goals[existingIndex].dueDate = dueDate;
            goals[existingIndex].progress = progress;
            alert("Goal updated successfully!");
        } else {
            goals.push({ title, description, dueDate, progress });
            alert("Goal added successfully!");
        }

        goalTitleInput.value = "";
        goalDescriptionInput.value = "";
        dueDateInput.value = "";
        progressSelect.value = "Not Started";
        progressValueDisplay.textContent = "Not Started";
        renderGoals();
    } else {
        alert("Please fill in all fields!");
    }
});

progressSelect.addEventListener("change", () => {
    progressValueDisplay.textContent = progressSelect.value;
});

function editGoal(index) {
    const goal = goals[index];
    goalTitleInput.value = goal.title;
    goalDescriptionInput.value = goal.description;
    dueDateInput.value = goal.dueDate;
    progressSelect.value = goal.progress;
    progressValueDisplay.textContent = goal.progress;
}

function deleteGoal(index) {
    if (confirm("Are you sure you want to delete this goal?")) {
        goals.splice(index, 1);
        renderGoals();
        alert("Goal deleted!");
    }
}

goalTitleInput.addEventListener("change", function () {
    const selectedGoal = goalTitleInput.value;

    switch (selectedGoal) {
        case "Problem Formulation and Project Planning":
            dueDateInput.value = "2024-01-01";
            break;
        case "Background Study or Literature Review":
            dueDateInput.value = "2024-01-15";
            break;
        case "Requirement Analysis or Theoretical Framework":
            dueDateInput.value = "2024-01-29";
            break;
        case "Design or Research Methodology":
            dueDateInput.value = "2024-02-12";
            break;
        case "Prototype Development or Proof of Concept":
            dueDateInput.value = "2024-02-26";
            break;
        case "Draft Report Completion":
            dueDateInput.value = "2024-03-18";
            break;
        default:
            dueDateInput.value = "";
    }
});

dueDateInput.setAttribute("readonly", "true");

renderGoals();

document.getElementById("menuIcon").addEventListener("click", function (event) {
    const menu = document.getElementById("navbarLinks");
    menu.classList.toggle("active");
    event.stopPropagation();
});

document.addEventListener("click", function (event) {
    const menu = document.getElementById("navbarLinks");
    const menuIcon = document.getElementById("menuIcon");

    if (!menu.contains(event.target) && !menuIcon.contains(event.target)) {
        menu.classList.remove("active");
    }
});


