CREATE TABLE `users` (
	`user_email` VARCHAR(256) NOT NULL UNIQUE,
	`user_name` VARCHAR(256) NOT NULL UNIQ,
	`password` TEXT NOT NULL,
	`bio` VARCHAR(128),
	`pic` VARCHAR(512),
	PRIMARY KEY (`user_email`)
) ENGINE=InnoDB;
