CREATE TABLE `student.loc`.`users` 
(`id` INT NOT NULL AUTO_INCREMENT , 
`email` VARCHAR(255) NOT NULL , 
`name` VARCHAR(70) NOT NULL , 
`lastName` VARCHAR(70) NOT NULL , 
`password` VARCHAR(255) NOT NULL,
`yearBirth` INT NOT NULL , 
`gender` VARCHAR(10) NOT NULL , 
`grade` INT NOT NULL , 
`groupName` VARCHAR(5) 
NOT NULL, PRIMARY KEY (`id`), UNIQUE (`email`)) ENGINE = InnoDB;
