<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Proposal Submission</title>
    <link rel="stylesheet" href="css/sv_approval.css">

</head>

<body>
<?php include('includes/header.php'); ?>
<div class="background">

    <div class="container">
        <h1>Student Proposal Submission</h1>
        <form id="searchForm">
            <label for="studentId">Enter Student ID:</label>
            <input type="text" id="studentId" name="studentId" placeholder="Enter Student ID" required>
            <button class="btt" type="submit">Search</button>
        </form>

        <div id="proposalDetails" style="display: none;">
            <h2>Proposal Details</h2>
            <p><strong>Project Title:</strong> <span id="projectTitle"></span></p>
            <p><strong>Supervisor Name:</strong> <span id="supervisorName"></span></p>
            <p><strong>Project Status:</strong> <span id="projectStatus"></span></p>
            <p><strong>Project Type:</strong> <span id="projectType"></span></p>
            <p><strong>Project Specialisation:</strong> <span id="projectSpecialisation"></span></p>
            <p><strong>Project Category:</strong> <span id="projectCategory"></span></p>
            <p><strong>Project Focus:</strong> <span id="projectFocus"></span></p>
            <p><strong>Project Description:</strong> <span id="projectDescription"></span></p>
            <p><strong>Project Objectives/Outcomes:</strong> <span id="projectObjectives"></span></p>
            <p><strong>Project Scope:</strong> <span id="projectScope"></span></p>


            <button id="approveButton" onclick="approveProposal()">Approve</button>
            <button id="rejectButton" onclick="rejectProposal()">Reject</button>
        </div>
    </div>
</div>
    <script>
        document.getElementById('searchForm').addEventListener('submit', function (event) {
            event.preventDefault();
            const studentId = document.getElementById('studentId').value;

            // Dummy data
            const proposalData = {
                '1211103227': {
                    projectTitle: 'Cybersecurity in Cloud Computing',
                    supervisorName: 'Dr. Ahmad Zaki',
                    projectStatus: 'Supervisor-Proposed',
                    projectType: 'Research-based',
                    projectSpecialisation: 'Cybersecurity',
                    projectCategory: 'Cloud Security',
                    projectFocus: 'Focus on enhancing security protocols in cloud computing environments.',
                    projectDescription: 'This project will explore various aspects of cybersecurity in cloud computing, including encryption, access control, and risk management. The goal is to propose a new security model for cloud environments.',
                    projectObjectives: '1. Evaluate current cloud security models. 2. Propose a new security model. 3. Test the proposed model with simulated environments.',
                    projectScope: 'The project will focus on evaluating existing security measures in cloud platforms and proposing improvements. This study is constrained by the availability of cloud service providers for testing.'
                },
                '1211103216': {
                    projectTitle: 'AI for Game Development',
                    supervisorName: 'Prof. John Tan',
                    projectStatus: 'Student-Proposed',
                    projectType: 'Research and Application Based',
                    projectSpecialisation: 'Game Development',
                    projectCategory: 'Game AI',
                    projectFocus: 'Integration of AI technologies in gaming applications to enhance player experience.',
                    projectDescription: 'This project will focus on using artificial intelligence to create more realistic and responsive NPCs in video games.',
                    projectObjectives: '1. Research AI algorithms for NPC behavior. 2. Develop a game prototype using AI. 3. Evaluate the gameplay experience.',
                    projectScope: 'This project will be limited to NPC behavior and will not focus on other AI applications in gaming like procedural generation.'
                }
            };

            const proposal = proposalData[studentId];

            if (proposal) {
                document.getElementById('projectTitle').innerText = proposal.projectTitle;
                document.getElementById('supervisorName').innerText = proposal.supervisorName;
                document.getElementById('projectStatus').innerText = proposal.projectStatus;
                document.getElementById('projectType').innerText = proposal.projectType;
                document.getElementById('projectSpecialisation').innerText = proposal.projectSpecialisation;
                document.getElementById('projectCategory').innerText = proposal.projectCategory;
                document.getElementById('projectFocus').innerText = proposal.projectFocus;
                document.getElementById('projectDescription').innerText = proposal.projectDescription;
                document.getElementById('projectObjectives').innerText = proposal.projectObjectives;
                document.getElementById('projectScope').innerText = proposal.projectScope;
                document.getElementById('proposalDetails').style.display = 'block';
            } else {
                alert('Student ID not found.');
            }
        });

        function approveProposal() {
            window.location.href = 'approve_done.html?status=approved';
        }

        function rejectProposal() {
            window.location.href = 'approve_done.html?status=rejected';
        }
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