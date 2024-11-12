1.	Database Name: online_voting_system
2.	Tables:
o	users (to store user info and eligibility):
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    is_eligible BOOLEAN DEFAULT TRUE,
    has_voted BOOLEAN DEFAULT FALSE
);
                        candidates (to store candidate information):
                           CREATE TABLE candidates (
    candidate_id INT AUTO_INCREMENT PRIMARY KEY,
    candidate_name VARCHAR(50) NOT NULL,
    party VARCHAR(50) NOT NULL
);

votes (to record votes):
CREATE TABLE votes (
    vote_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    candidate_id INT NOT NULL,
    vote_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (candidate_id) REFERENCES candidates(candidate_id)
);
