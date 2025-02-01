<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
    <link rel="stylesheet" href="css/adminhomepage.css">
</head>

<body>
    <nav class="navbar">
        <div class="logo">FYP Portal</div>
        <ul class="nav-links">

            <li><a href="adminlogin.php"><img src="../images/logout.png" alt="Logout" class="logout-img"></a></li>
        </ul>
    </nav>
    <div class="container">
        <div class="welcome-text">
            <h2>WELCOME BACK ADMIN,</h2>
            <h1>FYP Portal</h1>
        </div>
        <div class="image-container">
            <img src="../images/homepage.jpg" alt="Campus Image">
            <div class="button-grid">
                <a href=usermanagement.php class="btn" style="top: 20%; left: 50%;">User Management</a>
                <a href=admin_proposal.php class="btn" style="top: 35%; left: 55%;">Proposal Status</a>
                <a href=admin_update.php class="btn" style="top: 50%; left: 50%;">Update & Manage Proposal</a>
            </div>
        </div>
</body>

</html>