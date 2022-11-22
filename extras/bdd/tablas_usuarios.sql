
-- -----------------------------------------------------
-- Schema catalogo60314
-- -----------------------------------------------------
USE catalogo ;

-- -----------------------------------------------------
-- Table `catalogo60314`.`roles`
-- -----------------------------------------------------
CREATE TABLE roles (
                       idRol TINYINT primary key NOT NULL auto_increment,
                       rol VARCHAR(45) NOT NULL
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `usuarios`
-- -----------------------------------------------------
CREATE TABLE usuarios (
                          idUsuario smallint primary key NOT NULL AUTO_INCREMENT,
                          nombre VARCHAR(45) NOT NULL,
                          apellido VARCHAR(45) NOT NULL,
                          email VARCHAR(60) NOT NULL unique,
                          clave VARCHAR(76) NOT NULL,
                          idRol TINYINT NOT NULL,
                          CONSTRAINT fk_rol
                              FOREIGN KEY (idRol)
                                  REFERENCES roles (idRol)
                                  ON DELETE NO ACTION
                                  ON UPDATE NO ACTION
)
    ENGINE = InnoDB;