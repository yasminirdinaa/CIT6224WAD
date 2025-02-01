<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposal Submission Status</title>
    <link rel="stylesheet" href="css/prop_status.css">
</head>

<body>

<?php include('includes/header.php'); ?> 

    <div class="container">
        <h1>Proposal Submission Status</h1>
        <form id="statusForm">
            <label for="studentId">Student ID:</label>
            <input type="text" id="studentId" name="studentId" placeholder="Enter your Student ID" required>
            <button type="submit">Check Status</button>
        </form>

        <div id="statusResult">
            <h2>Status:</h2>
            <p id="proposalStatus">Please enter your Student ID and click "Check Status".</p>
        </div>
        <div id="backButton" style="display: none; margin-top: 20px;">
            <button onclick="window.location.href='studenthomepage.html';">Back to Homepage</button>
        </div>
    </div>

    <script>
        document.getElementById('statusForm').addEventListener('submit', function (event) {
            event.preventDefault();
            const studentId = document.getElementById('studentId').value;

            // Dummy Data
            const proposalStatuses = {
                '1211103227': 'Proposal submitted, awaiting approval.',
                '1211103216': 'Proposal rejected, recontact your supervisor.',
                '1221302357': 'Proposal approved.'
            };

            const statusMessage = proposalStatuses[studentId] || 'Student ID not found or proposal status unavailable.';

            document.getElementById('proposalStatus').innerText = statusMessage;
            document.getElementById('backButton').style.display = 'block';
        });
    </script>
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