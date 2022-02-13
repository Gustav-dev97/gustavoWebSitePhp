CREATE TABLE IF NOT EXISTS `gustavowebsite`.`usuarios` 
( `id` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(250) NOT NULL , 
`email` VARCHAR(250) NOT NULL , `telefone` VARCHAR(250) NOT NULL , 
`assunto` VARCHAR(250) NOT NULL , 
`mensagem` VARCHAR(1000) NOT NULL, 
PRIMARY KEY (`id`)) ENGINE = InnoDB;