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
