<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Tracking</title>
    <link rel="stylesheet" href="css/progresstracking.css">
</head>

<body>
<?php include('includes/header.php'); ?>


    <div class="background">
        <div class="progress-tracking-card">
            <h1>Progress Tracking</h1>

            <div class="student-selection">
                <label for="student-select">Select a Student:</label>
                <select id="student-select" onchange="showProgress()">
                    <option value="" selected disabled>Choose a student...</option>
                    <option value="student1">John Doe</option>
                    <option value="student2">Jane Smith</option>
                </select>
            </div>

            <div id="project-info" class="hidden">
                <h2>Project Information</h2>
                <p id="student-name"><strong>Student Name:</strong></p>
                <p id="student-id"><strong>Student ID:</strong></p>
                <p id="project-title"><strong>Project Title:</strong></p>
                <p id="goal"><strong>Goal:</strong></p>
            </div>

            <div id="timeline" class="hidden">
                <h2>Project Timeline</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Milestone</th>
                            <th>Deadline</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="timeline-data">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        const students = {
            student1: {
                name: "John Doe",
                studentId: "1234",
                title: "Enhancing Password Security Using Cryptographic Techniques",
                goal: "Develop a secure framework for password storage using modern cryptographic algorithms.",
                timeline: [
                    { milestone: "Proposal Submission", deadline: "01 Jan 2024", status: "Completed" },
                    { milestone: "Literature Review", deadline: "15 Feb 2024", status: "In Progress" },
                    { milestone: "Implementation", deadline: "30 Mar 2024", status: "Not Started" },
                    { milestone: "Final Report", deadline: "15 Apr 2024", status: "Not Started" },
                ],
            },
            student2: {
                name: "Jane Smith",
                studentId: "1234",
                title: "Building a Machine Learning Model for Predictive Analytics",
                goal: "Develop and train a predictive analytics model for improving resource allocation.",
                timeline: [
                    { milestone: "Proposal Submission", deadline: "10 Jan 2024", status: "Completed" },
                    { milestone: "Data Collection", deadline: "25 Feb 2024", status: "Not Started" },
                    { milestone: "Model Training", deadline: "20 Mar 2024", status: "Not Started" },
                    { milestone: "Final Report", deadline: "30 Apr 2024", status: "Not Started" },
                ],
            },
        };

        function showProgress() {
            const studentId = document.getElementById("student-select").value;
            const student = students[studentId];

            if (student) {
                document.getElementById("student-name").innerHTML = `<strong>Student Name:</strong> ${student.name}`;
                document.getElementById("student-id").innerHTML = `<strong>Student ID:</strong> ${student.studentId}`;
                document.getElementById("project-title").innerHTML = `<strong>Project Title:</strong> ${student.title}`;
                document.getElementById("goal").innerHTML = `<strong>Goal:</strong> ${student.goal}`;
                const timelineTable = document.getElementById("timeline-data");
                timelineTable.innerHTML = "";
                student.timeline.forEach(item => {
                    const row = `
                        <tr>
                            <td>${item.milestone}</td>
                            <td>${item.deadline}</td>
                            <td class="${item.status.replace(" ", "-").toLowerCase()}">${item.status}</td>
                        </tr>
                    `;
                    timelineTable.innerHTML += row;
                });

                document.getElementById("project-info").classList.remove("hidden");
                document.getElementById("timeline").classList.remove("hidden");
            }
        }
    </script>
    <script>
        const menuIcon = document.querySelector('.menu-icon');
        const navbarRight = document.querySelector('.navbar-right');

        menuIcon.addEventListener('click', () => {
            navbarRight.classList.toggle('active');
        });
        document.addEventListener("click", function (event) {
    const menu = document.getElementById("navbarLinks");
    const menuIcon = document.getElementById("menuIcon");

    if (!menu.contains(event.target) && !menuIcon.contains(event.target)) {
        menu.classList.remove("active");
    }
});
    </script>

<?php include('includes/footer.php'); ?>

</body>

</html>