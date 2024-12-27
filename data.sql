SHOW DATABASES

CREATE DATABASE documentation

USE documentation

CREATE table players (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    team VARCHAR(255) NOT NULL
)

select * from players

