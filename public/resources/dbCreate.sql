CREATE TABLE `tag` ( 
  `id_tag` INT UNSIGNED AUTO_INCREMENT NOT NULL,
  `nm_tag` VARCHAR(30) NULL DEFAULT NULL ,
   PRIMARY KEY (`id_tag`)
)
ENGINE = InnoDB;
CREATE TABLE `usuario` ( 
  `id_user` INT AUTO_INCREMENT NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(120) NULL DEFAULT NULL ,
  `password` VARCHAR(255) NOT NULL,
   PRIMARY KEY (`id_user`),
  CONSTRAINT `email` UNIQUE (`email`)
)
ENGINE = InnoDB;
CREATE TABLE `notas` ( 
  `id_nota` INT AUTO_INCREMENT NOT NULL,
  `id_user` INT NOT NULL,
  `title` VARCHAR(50) NOT NULL,
  `body` TEXT NOT NULL,
  `dt_nota` DATE NOT NULL,
   PRIMARY KEY (`id_nota`)
)
ENGINE = InnoDB;
CREATE TABLE `notas_tags` ( 
  `id_nota` INT NOT NULL,
  `id_tag` INT UNSIGNED NOT NULL,
   PRIMARY KEY (`id_nota`, `id_tag`)
)
ENGINE = InnoDB;
ALTER TABLE `notas` ADD CONSTRAINT `fk_usuario_notas` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE ON UPDATE RESTRICT;
ALTER TABLE `notas_tags` ADD CONSTRAINT `fk_tag` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id_tag`) ON DELETE CASCADE ON UPDATE RESTRICT;
ALTER TABLE `notas_tags` ADD CONSTRAINT `fk_notas` FOREIGN KEY (`id_nota`) REFERENCES `notas` (`id_nota`) ON DELETE CASCADE ON UPDATE RESTRICT;
