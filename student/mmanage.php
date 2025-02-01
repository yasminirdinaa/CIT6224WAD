<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Management System</title>
    <link rel="stylesheet" href="css/mmanagee.css">
</head>

<body>

<?php include('includes/header.php'); ?>
        <div class="container">
            <h1>Schedule Entry Form</h1>
            <form>
                <div class="form-group">
                    <label for="meetingTitle">Meeting Title:</label>
                    <input type="text" id="meetingTitle" placeholder="Enter Meeting Title">
                </div>
                <div class="form-group">
                    <label>Date:</label>
                    <input type="date" id="startDate">
                </div>
                <div class="form-group">
                    <label>Time:</label>
                    <input type="time" id="Time">
                </div>
                <div class="form-group">
                    <label for="meetingDescription">Meeting Description:</label>
                    <textarea id="meetingDescription" rows="3" placeholder="Enter meeting description"></textarea>
                </div>
            </form>

            <h2>Approved Meetings</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Agenda</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                        <th>Meeting Log</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Discussion on Introduction FYP</td>
                        <td>1/12/2024</td>
                        <td>11:00 AM</td>
                        <td>
                            <button class="save-btn">Reschedule</button>
                            <button class="save-btn">Cancel Meeting</button>
                        </td>
                        <td>
                            <input type="file" id="meetingLog1" class="file-upload">
                            <button class="upload-btn" onclick="uploadFile('meetingLog1')">Upload</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Discussion on Literature Review</td>
                        <td>13/12/2024</td>
                        <td>12:30 PM</td>
                        <td>
                            <button class="save-btn">Reschedule</button>
                            <button class="save-btn">Cancel Meeting</button>
                        </td>
                        <td>
                            <input type="file" id="meetingLog2" class="file-upload">
                            <button class="upload-btn" onclick="uploadFile('meetingLog2')">Upload</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    <script>
        const menuIcon = document.querySelector('.menu-icon');
        const navbarRight = document.querySelector('.navbar-right');

        menuIcon.addEventListener('click', () => {
            navbarRight.classList.toggle('active');
        });

        function uploadFile(fileInputId) {
            const fileInput = document.getElementById(fileInputId);
            const file = fileInput.files[0];

            if (file) {
                alert(`File "${file.name}" uploaded successfully!`);
            } else {
                alert("Please select a file before uploading.");
            }
        }
    </script>
<?php include('includes/footer.php'); ?>

</body>

</html>