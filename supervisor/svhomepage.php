<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor Homepage</title>
    <link rel="stylesheet" href="../admin/css/adminhomepage.css">
</head>

<body>
    <nav class="navbar">
        <div class="logo">FYP Portal</div>
        <ul class="nav-links">

            <li><a href="svlogin.php"><img src="../images/logout.png" alt="Logout" class="logout-img"></a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="welcome-text">
            <h2>WELCOME BACK SUPERVISOR,</h2>
            <h1>FYP Portal</h1>
        </div>
        <div class="image-container">
            <img src="../images/homepage.jpg" alt="Campus Image">
            <div class="button-grid">
                <a href=svprofile.php class="btn" style="top: 20%; left: 50%;">Profile</a>
                <a href=sv_approval.php class="btn" style="top: 35%; left: 55%;">Proposal Approval</a>
                <a href=progresstracking.php class="btn" style="top: 50%; left: 50%;"> Progress Tracking</a>
                <a href=svmmanage.php class="btn" style="top: 50%; left: 50%;">Meeting Management</a>
                <a href=marksheet.php class="btn" style="top: 50%; left: 50%;"> Marksheet</a>
                <a href=sv_assign.php class="btn" style="top: 50%; left: 50%;">Student Assignment</a>
            </div>
        </div>
    </div>
</body>

</html>