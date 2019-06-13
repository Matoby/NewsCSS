<?php 
include 'connection.php';

$sQuery = "
CREATE TABLE IF NOT EXISTS `kvbaza`.`users` (
`user_id` INT NOT NULL AUTO_INCREMENT, 
`username` VARCHAR(30),
`password` VARCHAR(16),
`admin` ENUM ('Y', 'N') NOT NULL,
PRIMARY KEY (`user_id`)
);

CREATE TABLE IF NOT EXISTS `kvbaza`.`vijesti` (
`vijesti_id` INT NOT NULL AUTO_INCREMENT,
`naslov` VARCHAR(50),
`sadrzaj` VARCHAR(500),
`kategorija` INT,
`autor` INT,
PRIMARY KEY (`vijesti_id`)
);

CREATE TABLE IF NOT EXISTS `kvbaza`.`kategorije` (
`kategorija_id` INT NOT NULL AUTO_INCREMENT,
`ime` VARCHAR(50),
PRIMARY KEY (`kategorija_id`)
);
";

$oConnection->query($sQuery);
/*$oConnection->query("INSERT INTO users (username, password, admin) VALUES (matija@pv', 'matija123', 'Y')");
$oConnection->query("INSERT INTO users (username, password, admin) VALUES (ivana@pv', 'ivana123', 'N')");*/

 ?>