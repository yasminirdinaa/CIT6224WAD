<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposal Status Update Page - Admin</title>
    <link rel="stylesheet" href="css/admin_proposal.css">


</head>

<body>
<?php include('includes/header.php'); ?>
<div class="background">
    <div class="container">
        <h1>Admin - Proposal Status Update Page</h1>

        <form class="student-form" id="studentForm">
            <label for="studentID">Enter Student ID:</label>
            <input type="text" id="studentID" name="studentID" required>
            <button type="submit">Check Status</button>
        </form>

        <div class="status-display">
            <p id="status-message">Please enter a valid student ID to check the proposal status.</p>
        </div>

        <div class="update-status" style="display: none;">
            <h3>Update Proposal Status</h3>
            <label for="status">Select New Status:</label>
            <select id="status" name="status">
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
                <option value="not_checked">Not Checked</option>
            </select>
            <button type="button" class="update-btn" onclick="updateStatusFromDropdown()">Update Status</button>
        </div>

        <div class="back-button">
            <button onclick="window.location.href = 'adminhomepage.php';">Back to Homepage</button>
        </div>
    </div>
    </div>
    <script>
        // Dummy Database
        const studentDatabase = [
            { studentID: "1211103227", name: "Wan Alia Adlina", proposalStatus: "not_checked" },
            { studentID: "1211103216", name: "Sofea Hazreena", proposalStatus: "approved" },
            { studentID: "1221302357", name: "Yasmin Irdina", proposalStatus: "rejected" }
        ];

        document.getElementById('studentForm').addEventListener('submit', function (event) {
            event.preventDefault();
            const studentID = document.getElementById('studentID').value;
            const student = studentDatabase.find(student => student.studentID === studentID);

            const statusMessage = document.getElementById('status-message');
            const updateStatusSection = document.querySelector('.update-status');

            if (student) {
                statusMessage.textContent = `Proposal Status by Supervisor: ${formatStatus(student.proposalStatus)}`;
                updateStatusSection.style.display = 'block';
            } else {
                statusMessage.textContent = "Student ID not found.";
                updateStatusSection.style.display = 'none';
            }
        });

        function updateStatusFromDropdown() {
            const studentID = document.getElementById('studentID').value;
            const newStatus = document.getElementById('status').value;
            const student = studentDatabase.find(student => student.studentID === studentID);

            if (student) {
                student.proposalStatus = newStatus;
                document.getElementById('status-message').textContent = `Proposal Status: ${formatStatus(student.proposalStatus)}`;

                alert("Status Successfully Updated");

                window.location.href = "admin_proposal.php";
            }
        }

        function formatStatus(status) {
            return status.split('_').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
        }
        const menuIcon = document.getElementById('menuIcon');
        const navbarLinks = document.getElementById('navbarLinks');

        menuIcon.addEventListener('click', () => {
            navbarLinks.classList.toggle('active');
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