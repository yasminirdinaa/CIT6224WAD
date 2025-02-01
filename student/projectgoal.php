<?php
session_start();
include('includes/db_connection.php');

// Check if the user is logged in
if (!isset($_SESSION['id_number'])) {
    echo "You need to log in first. <a href='studentlogin.php'>Login</a>";
    exit();
}

$user_id = $_SESSION['id_number'];

// Retrieve goals for the logged-in user
$query = "SELECT id, goal_title, goal_description, due_date, progress FROM project_goals WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id); // Bind user_id to the query
$stmt->execute();
$result = $stmt->get_result();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_progress'])) {
    if (isset($_POST['goal_id']) && isset($_POST['progress'])) {
        $goal_id = $_POST['goal_id'];
        $progress = $_POST['progress'];

        // Update the progress in the database
        $updateQuery = "UPDATE project_goals SET progress = ? WHERE id = ? AND user_id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("sii", $progress, $goal_id, $user_id);

        if ($stmt->execute()) {
            echo "<script>alert('Progress updated successfully.'); window.location.href='projectgoals.php';</script>";
        } else {
            echo "Error updating progress: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Invalid input.";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if all fields are provided
    if (!isset($_POST['project_id']) || !isset($_POST['goal_title']) || !isset($_POST['goal_description']) || !isset($_POST['due_date']) || !isset($_POST['progress'])) {
        echo "All fields are required.";
        exit();
    }

    $project_id = $_POST['project_id'];
    $goal_title = $_POST['goal_title'];
    $goal_description = $_POST['goal_description'];
    $due_date = $_POST['due_date'];
    $progress = $_POST['progress'];
    $user_id = $_SESSION['id_number']; // Get the logged-in user's ID

    // Check if project_id is empty
    if (empty($project_id)) {
        echo "Project ID is required.";
        exit();
    }

    // Prepare the SQL query to insert the data into the project_goals table
    $stmt = $conn->prepare("INSERT INTO project_goals (project_id, goal_title, goal_description, due_date, progress, user_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssi", $project_id, $goal_title, $goal_description, $due_date, $progress, $user_id);

    if ($stmt->execute()) {
        echo "Goal added successfully.";
    } else {
        echo "Error adding goal: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="css/projectgoal.css">
</head>

<body>
 <?php include('includes/header.php'); ?> 

 <div class="background">

    <div class="container">
        <h3>Project Goals</h3>
        <form method="POST" action="projectgoals.php">
    <div class="form-group">
        <label for="projectID">Project ID:</label>
        <input type="text" id="projectID" name="project_id" placeholder="Enter your project ID" required>
    </div>
<br />
    <div class="form-group">
        <label for="goalTitle">Goal Title:</label>
        <select id="goalTitle" name="goal_title" required>
            <option value="" disabled selected>Select a goal</option>
            <option value="Problem Formulation and Project Planning">Problem Formulation and Project Planning</option>
            <option value="Background Study or Literature Review">Background Study or Literature Review</option>
            <option value="Requirement Analysis or Theoretical Framework">Requirement Analysis or Theoretical Framework</option>
            <option value="Design or Research Methodology">Design or Research Methodology</option>
            <option value="Prototype Development or Proof of Concept">Prototype Development or Proof of Concept</option>
            <option value="Draft Report Completion">Draft Report Completion</option>
        </select>
    </div>
    <br />

    <div class="form-group">
        <label for="goalDescription">Goal Description:</label>
        <textarea id="goalDescription" name="goal_description" rows="5" placeholder="Describe your goal in detail" required></textarea>
    </div>
    <br />

    <div class="form-group">
        <label for="dueDate">Due Date:</label>
        <input type="date" id="dueDate" name="due_date" required>
    </div>
    <br />

    <div class="form-group">
        <label for="progress">Progress:</label>
        <select id="progressSelect" name="progress">
            <option value="Not Started">Not Started</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select>
    </div>
    <br />

    <button type="submit">Add/Update Goal</button>
</form>
<table>
<thead>
        <tr>
            <th>Goal Title</th>
            <th>Description</th>
            <th>Due Date</th>
            <th>Progress</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="goalsdisplay">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['goal_title']) . "</td>";
            echo "<td>" . htmlspecialchars($row['goal_description']) . "</td>";
            echo "<td>" . htmlspecialchars($row['due_date']) . "</td>";
            echo "<form method='POST' action='projectgoals.php'>";
            echo "<input type='hidden' name='goal_id' value='" . $row['id'] . "'>";
            echo "<td>";
            echo "<select name='progress'>";
            echo "<option value='Not Started'" . ($row['progress'] == 'Not Started' ? ' selected' : '') . ">Not Started</option>";
            echo "<option value='In Progress'" . ($row['progress'] == 'In Progress' ? ' selected' : '') . ">In Progress</option>";
            echo "<option value='Completed'" . ($row['progress'] == 'Completed' ? ' selected' : '') . ">Completed</option>";
            echo "</select>";
            echo "</td>";
            echo "<td><button type='submit' name='update_progress'>Update</button></td>";
            echo "</form>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No goals found.</td></tr>";
    }
    ?>
</tbody>

</table>
    </div>
</div>


<?php include('includes/footer.php'); ?>

<script>document.getElementById("menuIcon").addEventListener("click", function (event) {
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
});</script>
<script src="js/projectgoal.js"></script>

</body>
</html>
