CREATE TABLE IF NOT EXISTS `Usuários` (
  `id` INT AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `data_de_registro` DATE NULL,
  `user_name` VARCHAR(100) NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `privilegio` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;