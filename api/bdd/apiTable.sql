CREATE DATABASE IF NOT EXISTS api;

USE api;

CREATE TABLE IF NOT EXISTS `user` (
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    `password` VARCHAR(100) NOT NULL
)Engine=InnoDB;