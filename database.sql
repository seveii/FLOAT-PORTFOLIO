-- database.sql
-- The only database part of the portfolio is the contact form.
-- Import this file once (for example in phpMyAdmin). It creates the database and one table.

CREATE DATABASE IF NOT EXISTS portfolio;

USE portfolio;

CREATE TABLE IF NOT EXISTS messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  need_type VARCHAR(20) NOT NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- To read the messages that visitors sent (newest first):
-- SELECT * FROM messages ORDER BY id DESC;
