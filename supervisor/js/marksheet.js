const marksheetBody = document.getElementById("marksheetBody");
const studentIDInput = document.getElementById("studentID");
const studentNameInput = document.getElementById("studentName");
const marksInput = document.getElementById("marks");
const addUpdateBtn = document.getElementById("addUpdateBtn");

let marksheet = [];

// Dummy student 
const studentsDatabase = {
    "1211103216": "Sofea Hazreena",
    "1211103217": "John Doe",
    "1211103218": "Jane Smith",
};

function renderMarksheet() {
    marksheetBody.innerHTML = "";
    marksheet.forEach((student, index) => {
        const row = `
            <tr>
                <td>${student.id}</td>
                <td>${student.name}</td>
                <td>${student.marks}</td>
                <td>${student.grade}</td>
                <td>
                    <button class="update" onclick="editStudent(${index})">Edit</button>
                    <button onclick="deleteStudent(${index})">Delete</button>
                </td>
            </tr>
        `;
        marksheetBody.innerHTML += row;
    });
}

function calculateGrade(marks) {
    if (marks >= 80) return "A";
    if (marks >= 70) return "A-";
    if (marks >= 60) return "B+";
    if (marks >= 55) return "B";
    if (marks >= 50) return "B-";
    if (marks >= 45) return "C+";
    if (marks >= 40) return "C";
    if (marks >= 35) return "C-";
    if (marks >= 30) return "D";
    if (marks >= 25) return "D-";
    return "F";
}

studentIDInput.addEventListener("input", () => {
    const studentID = studentIDInput.value.trim();
    if (studentsDatabase[studentID]) {
        studentNameInput.value = studentsDatabase[studentID];
    } else {
        studentNameInput.value = "";
    }
});

addUpdateBtn.addEventListener("click", () => {
    const id = studentIDInput.value.trim();
    const name = studentNameInput.value.trim();
    const marks = parseInt(marksInput.value.trim(), 10);

    if (id && name && !isNaN(marks) && marks >= 0 && marks <= 100) {
        const grade = calculateGrade(marks);
        const existingIndex = marksheet.findIndex(student => student.id === id);
        if (existingIndex > -1) {
            marksheet[existingIndex].name = name;
            marksheet[existingIndex].marks = marks;
            marksheet[existingIndex].grade = grade;
            showMessage("Student record updated successfully!");
        } else {
            marksheet.push({ id, name, marks, grade });
            showMessage("Student record added successfully!");
        }

        studentIDInput.value = "";
        studentNameInput.value = "";
        marksInput.value = "";
        renderMarksheet();
    } else {
        showMessage("Please fill in all fields with valid data!", true);
    }
});

function editStudent(index) {
    const student = marksheet[index];
    studentIDInput.value = student.id;
    studentNameInput.value = student.name;
    marksInput.value = student.marks;
}

function deleteStudent(index) {
    if (confirm("Are you sure you want to delete this record?")) {
        marksheet.splice(index, 1);
        renderMarksheet();
        showMessage("Student record deleted!");
    }
}

const messageDiv = document.getElementById("message");

function showMessage(message, isError = false) {
    messageDiv.textContent = message;
    messageDiv.style.color = isError ? "red" : "green";
    setTimeout(() => {
        messageDiv.textContent = "";
    }, 3000);
}

renderMarksheet();

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

function downloadPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    let y = 20;
    doc.text("Final Year Project Marksheet", 10, y);
    y += 10;

    doc.text('Student ID', 10, y);
    doc.text('Student Name', 60, y);
    doc.text('Marks', 120, y);
    doc.text('Grade', 160, y);
    y += 10;

    marksheet.forEach(student => {
        doc.text(student.id, 10, y);
        doc.text(student.name, 60, y);
        doc.text(student.marks.toString(), 120, y);
        doc.text(student.grade, 160, y);
        y += 10;
    });

    doc.save("marksheet.pdf");
}

document.getElementById("downloadPdfBtn").addEventListener("click", downloadPDF);

function renderMarksheet() {
    marksheetBody.innerHTML = "";

    const emptyRow = `
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    `;
    marksheetBody.innerHTML += emptyRow;

    marksheet.forEach((student, index) => {
        const row = `
            <tr>
                <td>${student.id}</td>
                <td>${student.name}</td>
                <td>${student.marks}</td>
                <td>${student.grade}</td>
                <td>
                    <button class="update" onclick="editStudent(${index})">Edit</button>
                    <button onclick="deleteStudent(${index})">Delete</button>
                </td>
            </tr>
        `;
        marksheetBody.innerHTML += row;
    });
}
