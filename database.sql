# Create database:
CREATE DATABASE summerframework;
USE summerframework;
CREATE TABLE IF NOT EXISTS contact (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    mobile_no VARCHAR(11) NOT NULL,
    address VARCHAR(255) NOT NULL,
    email_address VARCHAR(255) NOT NULL DEFAULT '',
    date_created DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY(id)
);