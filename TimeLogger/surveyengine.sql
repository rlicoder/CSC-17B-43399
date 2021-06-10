-- 
-- Create database and set to default
-- 
DROP SCHEMA IF EXISTS `timelogger`;
CREATE SCHEMA `timelogger`;
USE `timelogger`;


-- 
-- Create user table
-- 
CREATE TABLE `entity_users` (
	`user_id` INT NOT NULL AUTO_INCREMENT, 
    `user_username` VARCHAR(30) NOT NULL,
    `user_password` VARCHAR(30) NOT NULL,
    `user_type` VARCHAR(10) NOT NULL DEFAULT 'user',
    PRIMARY KEY(`user_id`)
);

-- 
-- Insert myself as admin user and include a default survey
--
INSERT INTO `entity_users` (`user_username`, `user_password`, `user_type`) VALUES ('rlnguyen', 'Abc12345', 'admin');

