-- database.sql
-- Yung contact form lang talaga yung may database sa portfolio ko.
-- I-import 'tong file na 'to ng isang beses lang (halimbawa sa phpMyAdmin). Gagawa siya ng database at isang table.

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

-- Para mabasa yung mga message na sinend ng mga visitor (pinakabago muna):
-- SELECT * FROM messages ORDER BY id DESC;
