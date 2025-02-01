<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Task Assignment</title>
    <link rel="stylesheet" href="css/sv_assgn.css">

</head>

<body>
<?php include('includes/header.php'); ?>
<div class="background">
    <div class="container">
        <h1>Student Task Assignment</h1>
        <div class="student-id-section">
            <label for="studentId">Enter Student ID:</label>
            <input type="text" id="studentId" placeholder="Enter student ID">
            <button onclick="fetchProjectId()">Enter ID</button>
        </div>

        <div id="project-section" class="project-section">
            <h2>Project Information</h2>
            <p>Project ID: <span id="projectId"></span></p>

            <form id="task-form" class="task-form">
                <label for="task">Assign Task:</label>
                <textarea id="task" rows="4" placeholder="Enter task description"></textarea>

                <button type="submit">Assign Task</button>
            </form>
        </div>
    </div>
    </div>
    <script>
        function fetchProjectId() {
            const studentId = document.getElementById('studentId').value;

            if (studentId) {
                const projectId = `P-${studentId.slice(-3)}`;
                document.getElementById('projectId').textContent = projectId;
                document.getElementById('project-section').style.display = 'block';
            } else {
                alert('Please enter a valid Student ID');
            }
        }

        document.getElementById('task-form').addEventListener('submit', function (e) {
            e.preventDefault();
            const taskDescription = document.getElementById('task').value;
            if (taskDescription) {
                alert('Task Assigned Successfully!');
                window.location.href = 'sv_assign.php';
            } else {
                alert('Please enter a task description');
            }
        });
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
    </script>
    <?php include('includes/footer.php'); ?>

</body>

</html>