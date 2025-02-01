<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYP Proposal Submission</title>
    <link rel="stylesheet" href="css/stud_proposal.css">
</head>

<body>

<?php include('includes/header.php'); ?> 

    <div class="container">
        <h1>Final Year Project Proposal Submission</h1>
        <form action="submitted.php" method="post">
            <label for="project-title">Project Title:</label>
            <input type="text" id="project-title" name="project-title" required>

            <label for="supervisor-name">Supervisor Name:</label>
            <input type="text" id="supervisor-name" name="supervisor-name" required>

            <label for="project-status">Project Status:</label>
            <select id="project-status" name="project-status" required>
                <option value="Supervisor-Proposed">Supervisor-Proposed</option>
                <option value="Student-Proposed">Student-Proposed</option>
            </select>

            <label for="project-type">Project Type:</label>
            <select id="project-type" name="project-type" required>
                <option value="Research-based">Research-based</option>
                <option value="Application-based">Application-based</option>
                <option value="Research and Application Based">Research and Application Based</option>
            </select>

            <label for="project-specialisation">Project Specialisation:</label>
            <select id="project-specialisation" name="project-specialisation" required>
                <option value="Cybersecurity">Cybersecurity</option>
                <option value="Game Development">Game Development</option>
                <option value="Software Engineering">Software Engineering</option>
                <option value="Data Science">Data Science</option>
            </select>

            <label for="project-category">Project Category:</label>
            <input type="text" id="project-category" name="project-category" required>

            <label for="project-focus">Project Focus:</label>
            <input type="text" id="project-focus" name="project-focus" required>

            <label for="project-description">Project Description:</label>
            <textarea id="project-description" name="project-description" rows="6" required></textarea>

            <label for="project-objectives">Project Objectives/Outcomes:</label>
            <textarea id="project-objectives" name="project-objectives" rows="4" required></textarea>

            <label for="project-scope">Project Scope:</label>
            <textarea id="project-scope" name="project-scope" rows="6" required></textarea>

            <button type="submit">Submit Proposal</button>
        </form>
    </div>
    <script>
        const menuIcon = document.getElementById('menuIcon');
        const navbarLinks = document.getElementById('navbarLinks');

        menuIcon.addEventListener('click', () => {
            navbarLinks.classList.toggle('active');
        });
    </script>

<?php include('includes/footer.php'); ?>

</body>

</html>