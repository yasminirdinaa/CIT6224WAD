<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor Meeting Management</title>
    <link rel="stylesheet" href="../student/css/projectgoal.css">
</head>

<body>

<?php include('includes/header.php'); ?>


    <div class="background">
        <div class="container">
            <h1>Meeting Requests</h1>
            <h2>Pending Student Meeting Requests</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Student Name</th>
                        <th>Meeting Title</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>Discussion on Literature Review</td>
                        <td>20/12/2024</td>
                        <td>10:00 AM</td>
                        <td>
                            <button class="approve-btn">Approve</button>
                            <button class="reject-btn">Reject</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jane Smith</td>
                        <td>Discussion on Project Scope</td>
                        <td>22/12/2024</td>
                        <td>2:00 PM</td>
                        <td>
                            <button class="approve-btn">Approve</button>
                            <button class="reject-btn">Reject</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <h2>Approved Meetings</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Student Name</th>
                        <th>Agenda</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                        <th>Meeting Log (PDF)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Tengku Rafael</td>
                        <td>Discussion on Introduction FYP</td>
                        <td>1/12/2024</td>
                        <td>11:00 AM</td>
                        <td>
                            <button class="cancel-btn">Cancel Meeting</button>
                        </td>
                        <td>
                            <a href="path_to_pdf_file.pdf" target="_blank" class="pdf-btn">View PDF</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Dongmin Iskandar</td>
                        <td>Discussion on Literature Review</td>
                        <td>13/12/2024</td>
                        <td>12:30 PM</td>
                        <td>
                            <button class="cancel-btn">Cancel Meeting</button>
                        </td>
                        <td>
                            <a href="path_to_pdf_file.pdf" target="_blank" class="pdf-btn">View PDF</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        const menuIcon = document.querySelector('.menu-icon');
        const navbarRight = document.querySelector('.navbar-right');

        menuIcon.addEventListener('click', () => {
            navbarRight.classList.toggle('active');
        });

        const approveBtns = document.querySelectorAll('.approve-btn');
        const rejectBtns = document.querySelectorAll('.reject-btn');
        const cancelBtns = document.querySelectorAll('.cancel-btn');
    
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