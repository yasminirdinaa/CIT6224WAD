CREATE DATABASE fyp_portal;

USE fyp_portal;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    id_number VARCHAR(50) NOT NULL UNIQUE,
    role ENUM('student', 'supervisor') NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20),
    program VARCHAR(100) NOT NULL;
    profile_picture VARCHAR(255) DEFAULT 'uploads/default.png',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE project_goals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id VARCHAR(255) NOT NULL,
    goal_title VARCHAR(255) NOT NULL,
    goal_description TEXT NOT NULL,
    due_date DATE NOT NULL,
    progress ENUM('Not Started', 'In Progress', 'Completed') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    id_number VARCHAR(50) NOT NULL UNIQUE,
    role ENUM('student', 'supervisor') NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE supervisors (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Unique identifier for each supervisor
    fullname VARCHAR(255) NOT NULL, -- Full name of the supervisor
    staff_id VARCHAR(50) NOT NULL UNIQUE, -- Staff ID of the supervisor (unique)
    password VARCHAR(255) NOT NULL, -- Supervisor's password (hashed)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Automatically set the timestamp when the supervisor record is created
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Automatically update the timestamp when the supervisor record is updated
);

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Unique identifier for each student
    fullname VARCHAR(255) NOT NULL, -- Full name of the student
    student_id VARCHAR(50) NOT NULL UNIQUE, -- Student ID (unique)
    supervisor_id INT, -- Foreign key referencing the `supervisors` table
    password VARCHAR(255) NOT NULL, -- Student's password (hashed)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Automatically set the timestamp when the student record is created
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Automatically update the timestamp when the student record is updated
    FOREIGN KEY (supervisor_id) REFERENCES supervisors(id) -- Define the foreign key constraint linking to the supervisors table
);


CREATE TABLE meetings (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Unique identifier for each meeting
    meeting_title VARCHAR(255) NOT NULL, -- Title of the meeting
    meeting_date DATE NOT NULL, -- Date of the meeting (in 'YYYY-MM-DD' format)
    meeting_time TIME NOT NULL, -- Time of the meeting (in 'HH:MM:SS' format)
    meeting_description TEXT, -- Description of the meeting
    status ENUM('Pending', 'Accepted', 'Rejected') NOT NULL, -- Status of the meeting
    meeting_logs VARCHAR(255), -- Path to the uploaded PDF file (could be stored as a filename or URL)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Automatically set the timestamp when the meeting is created
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Automatically update the timestamp when the meeting is updated
);


INSERT INTO users (fullname, id_number, role, password, email, phone_number, program)
VALUES 
('Emily Tan', 'S3456789C', 'student', 'password789', 'emily.tan@example.com', '0145678923', 'Artificial Intelligence'),
('Mohamed Zaid', 'S4567890D', 'student', 'password321', 'mohamed.zaid@example.com', '0176543210', 'Computer Networks'),
('Prof. Katherine Johnson', 'T3456789E', 'supervisor', 'supervisor789', 'katherine.johnson@example.com', '0199988776', 'Mathematical Computing'),
('Dr. Tim Berners-Lee', 'T4567890F', 'supervisor', 'supervisor987', 'tim.berners@example.com', '0132244667', 'Web Technology'),
('Lisa Wong', 'S5678901E', 'student', 'password654', 'lisa.wong@example.com', '0168899007', 'Data Analytics'),
('Alex Chan', 'S6789012F', 'student', 'password852', 'alex.chan@example.com', '0187654329', 'Cloud Computing');
