-- 
-- Create database and set to default
-- 
DROP SCHEMA IF EXISTS `surveyengine`;
CREATE SCHEMA `surveyengine`;
USE `surveyengine`;


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
-- Create surveys table
-- 
CREATE TABLE `entity_surveys` (
	`survey_id` INT NOT NULL AUTO_INCREMENT,
    `survey_name` TEXT NOT NULL,
    `survey_key` TEXT NOT NULL,
    `survey_jsontext` TEXT NOT NULL,
    `survey_user_id` INT NOT NULL,
    FOREIGN KEY(`survey_user_id`) REFERENCES `entity_users`(`user_id`),
    PRIMARY KEY(`survey_id`)
);


-- 
-- Insert myself as admin user and include a default survey
--
INSERT INTO `entity_users` (`user_username`, `user_password`, `user_type`) VALUES ('rlnguyen', 'Coolguy123', 'admin');

