<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor Marksheet System</title>
    <link rel="stylesheet" href="css/marksheet.css">
</head>

<body>
<?php include('includes/header.php'); ?>

    <div class="background">

        <div class="container">
            <h1>Final Year Project Marksheet</h1>
            <div id="message" class="message"></div>

            <form id="marksheetForm">
                <div class="form-group">
                    <label for="studentID">Student ID:</label>
                    <input type="text" id="studentID" required placeholder="Enter Student ID">
                </div>
                <div class="form-group">
                    <label for="studentName">Student Name:</label>
                    <input type="text" id="studentName" required placeholder="Enter Student Name">
                </div>
                <div class="form-group">
                    <label for="marks">Marks:</label>
                    <input type="number" id="marks" min="0" max="100" required placeholder="Enter Marks">
                </div>
                <button type="button" id="addUpdateBtn">Add/Update</button>
            </form>

            <h2 id="marksheet">Marksheet</h2>
            <table>
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Marks</th>
                        <th>Grade</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
            </table>
            <button type="button" id="downloadPdfBtn" class="center-button">Download Marksheet as PDF</button>

        </div>

        <script src="js/marksheet.js"></script>

    </div>
    <?php include('includes/footer.php'); ?>

</body>

</html>