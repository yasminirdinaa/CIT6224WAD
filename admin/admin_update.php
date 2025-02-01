<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Proposal Update Page</title>
    <link rel="stylesheet" href="css/admin_update.css">

</head>

<body>
<?php include('includes/header.php'); ?>
<div class="background">
    <div class="container">
        <header>
            <h1>Admin - Project ID Assign Page</h1>
        </header>

        <section class="form-section">
            <form action="#" method="POST" id="adminForm">
                <label for="specialisation">Choose Specialisation:</label>
                <select class="specialise" id="specialisation" name="specialisation" onchange="loadProposals()">
                    <option value="">Select a Specialisation</option>
                    <option value="game-development">Game Development</option>
                    <option value="cybersecurity">Cybersecurity</option>
                    <option value="data-science">Data Science</option>
                    <option value="software-engineering">Software Engineering</option>
                </select>

                <div id="proposalList">
                    <p>Select a specialization to view proposals.</p>
                </div>

            </form>
        </section>
    </div>
</div>
<?php include('includes/footer.php'); ?>
<script>
      document.addEventListener("click", function (event) {
    const menu = document.getElementById("navbarLinks");
    const menuIcon = document.getElementById("menuIcon");

    if (!menu.contains(event.target) && !menuIcon.contains(event.target)) {
        menu.classList.remove("active");
    }
});
</script>
    <script src="js/admin_update.js"></script>
</body>

</html>