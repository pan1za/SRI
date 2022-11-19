-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema SRI
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema SRI
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `SRI` DEFAULT CHARACTER SET utf8 ;
USE `SRI` ;

-- -----------------------------------------------------
-- Table `SRI`.`restaurante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SRI`.`restaurante` (
  `idRestaurante` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `nit` INT NOT NULL,
  `ubicacion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idRestaurante`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SRI`.`sede`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SRI`.`sede` (
  `idSede` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `idRestaurante` INT NOT NULL,
  PRIMARY KEY (`idSede`),
  INDEX `idRestaurante_idx` (`idRestaurante` ASC) INVISIBLE,
  CONSTRAINT `idRestaurante`
    FOREIGN KEY (`idRestaurante`)
    REFERENCES `SRI`.`restaurante` (`idRestaurante`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SRI`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SRI`.`usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `usertype` VARCHAR(45) NOT NULL DEFAULT 'user',
  `foto` VARCHAR(50) NULL DEFAULT 'user.png',
  `idSede` INT NULL,
  `idRestaurante` INT NULL,
  PRIMARY KEY (`idUsuario`),
  INDEX `idSede_idx` (`idSede` ASC) VISIBLE,
  INDEX `idRestaurante_idx` (`idRestaurante` ASC) VISIBLE,
  CONSTRAINT `idSede`
    FOREIGN KEY (`idSede`)
    REFERENCES `SRI`.`sede` (`idSede`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `idRestaurante_`
    FOREIGN KEY (`idRestaurante`)
    REFERENCES `SRI`.`restaurante` (`idRestaurante`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SRI`.`info_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SRI`.`info_usuario` (
  `idInfoUsuario` INT NOT NULL AUTO_INCREMENT,
  `cargo` VARCHAR(45) NOT NULL,
  `inicioContrato` DATE NULL,
  `tipoContrato` VARCHAR(45) NULL,
  `sueldo` VARCHAR(45) NULL,
  `pension` VARCHAR(45) NULL,
  `salud` VARCHAR(45) NULL,
  `arl` VARCHAR(45) NULL,
  `idUsuario` INT NOT NULL,
  PRIMARY KEY (`idInfoUsuario`),
  INDEX `idUsuario_idx` (`idUsuario` ASC) INVISIBLE,
  CONSTRAINT `idUsuario`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `SRI`.`usuario` (`idUsuario`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SRI`.`hoja_de_vida`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SRI`.`hoja_de_vida` (
  `idHojaDeVida` INT NOT NULL AUTO_INCREMENT,
  `nombreArchivo` VARCHAR(100) NOT NULL,
  `idUsuario` INT NOT NULL,
  PRIMARY KEY (`idHojaDeVida`),
  INDEX `idUsuario_idx` (`idUsuario` ASC) VISIBLE,
  CONSTRAINT `idUsuario_`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `SRI`.`usuario` (`idUsuario`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SRI`.`incapacidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SRI`.`incapacidad` (
  `idIncapacidad` INT NOT NULL AUTO_INCREMENT,
  `tipoIncapacidad` VARCHAR(50) NOT NULL,
  `evidencia` VARCHAR(100) NOT NULL,
  `diaInicio` DATE NOT NULL,
  `diaFinal` DATE NOT NULL,
  `historiaClinica` VARCHAR(100) NULL,
  `cedula` VARCHAR(100) NULL,
  `observaciones` VARCHAR(200) NULL DEFAULT 'Sin observaciones',
  `idUsuario` INT NOT NULL,
  PRIMARY KEY (`idIncapacidad`),
  INDEX `idUsuario_idx` (`idUsuario` ASC) VISIBLE,
  CONSTRAINT `idUsuario__`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `SRI`.`usuario` (`idUsuario`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SRI`.`hora_extra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SRI`.`hora_extra` (
  `idHoraExtra` INT NOT NULL AUTO_INCREMENT,
  `tipoHoraExtra` VARCHAR(45) NOT NULL,
  `jornada` VARCHAR(45) NOT NULL,
  `fecha` DATE NOT NULL,
  `inicio` TIME NOT NULL,
  `fin` TIME NOT NULL,
  `observaciones` VARCHAR(200) NULL DEFAULT 'Sin observaciones',
  `idUsuario` INT NOT NULL,
  PRIMARY KEY (`idHoraExtra`),
  INDEX `idUsuario_idx` (`idUsuario` ASC) VISIBLE,
  CONSTRAINT `idUsuario___`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `SRI`.`usuario` (`idUsuario`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SRI`.`recargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SRI`.`recargo` (
  `idRecargo` INT NOT NULL AUTO_INCREMENT,
  `tipoRecargo` VARCHAR(45) NOT NULL,
  `jornada` VARCHAR(45) NOT NULL,
  `fecha` DATE NOT NULL,
  `inicio` TIME NOT NULL,
  `fin` TIME NOT NULL,
  `observaciones` VARCHAR(200) NULL DEFAULT 'Sin observaciones',
  `idUsuario` INT NOT NULL,
  PRIMARY KEY (`idRecargo`),
  INDEX `idUsuario_idx` (`idUsuario` ASC) VISIBLE,
  CONSTRAINT `idUsuario____`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `SRI`.`usuario` (`idUsuario`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
