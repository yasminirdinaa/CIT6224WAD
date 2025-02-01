CREATE DATABASE fyp_portal;

USE fyp_portal;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    id_number VARCHAR(50) NOT NULL UNIQUE,
    role ENUM('student', 'supervisor') NOT NULL,
    password VARCHAR(255) NOT NULL,  -- Fixed missing comma here
    email VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20),
    program ENUM('Software Engineering', 'Cybersecurity', 'Data Development', 'Data Science') NOT NULL,
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

