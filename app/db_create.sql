CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    user_path VARCHAR(255) NOT NULL,
    admin char(1) DEFAULT "N"
);

CREATE TABLE log (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    username VARCHAR(50),
    archive_name VARCHAR(255) NOT NULL,
    action_type VARCHAR(10) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    INDEX log_ind (user_id),
    FOREIGN KEY (user_id)
    	REFERENCES users(id)
    	ON DELETE CASCADE
);
