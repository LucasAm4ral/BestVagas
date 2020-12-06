-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bestvagas
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bestvagas
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bestvagas` DEFAULT CHARACTER SET utf8 ;
USE `bestvagas` ;

-- -----------------------------------------------------
-- Table `bestvagas`.`candidato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bestvagas`.`candidato` (
  `idcandidato` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `sexo` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcandidato`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bestvagas`.`vaga`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bestvagas`.`vaga` (
  `idvaga` INT NOT NULL AUTO_INCREMENT,
  `nome_empresa` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(300) NOT NULL,
  `salario` FLOAT NOT NULL,
  `nivel_vaga` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idvaga`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bestvagas`.`candidato_has_vaga`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bestvagas`.`candidato_has_vaga` (
  `candidato_idcandidato` INT NOT NULL,
  `vaga_idvaga` INT NOT NULL,
  PRIMARY KEY (`candidato_idcandidato`, `vaga_idvaga`),
  INDEX `fk_candidato_has_vaga_vaga1_idx` (`vaga_idvaga` ASC),
  INDEX `fk_candidato_has_vaga_candidato_idx` (`candidato_idcandidato` ASC),
  CONSTRAINT `fk_candidato_has_vaga_candidato`
    FOREIGN KEY (`candidato_idcandidato`)
    REFERENCES `bestvagas`.`candidato` (`idcandidato`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_candidato_has_vaga_vaga1`
    FOREIGN KEY (`vaga_idvaga`)
    REFERENCES `bestvagas`.`vaga` (`idvaga`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
