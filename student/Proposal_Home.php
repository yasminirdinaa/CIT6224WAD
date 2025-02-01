<!DOCTYPE html>
<html lang="en">

<head>
    <title>FYP Proposal Management</title>
    <link rel="stylesheet" href="css/proposalhomee.css">
</head>

<body>
<?php include('includes/header.php'); ?> 

<div class="background">
        <div class="proposal-home">
            <h1>Final Year Project</h1>
            <h2>Proposal Management</h2>
            <a href="stud_proposal.php" class="main-button">Proposal Submission</a>
            <a href="prop_status.php" class="main-button">Proposal Status</a>
            <a href="studenthomepage.php" class="main-button">Back To Main Page</a>
            </div>

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