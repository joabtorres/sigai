
-- -----------------------------------------------------
-- Table cofisc_tipo_protocolo
-- -----------------------------------------------------
DROP TABLE IF EXISTS cofisc_tipo_protocolo ;

CREATE TABLE IF NOT EXISTS cofisc_tipo_protocolo (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  tipo_protocolo VARCHAR(100) NULL,
  PRIMARY KEY (id))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table cofisc_tipo_documento
-- -----------------------------------------------------
DROP TABLE IF EXISTS cofisc_tipo_documento ;

CREATE TABLE IF NOT EXISTS cofisc_tipo_documento (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  documento VARCHAR(100) NULL,
  protocolo_id INT UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_cofisc_tipo_documento_cofisc_protocolo1
    FOREIGN KEY (protocolo_id)
    REFERENCES cofisc_tipo_protocolo (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table cofisc_tipo_denuncia
-- -----------------------------------------------------
DROP TABLE IF EXISTS cofisc_tipo_denuncia ;

CREATE TABLE IF NOT EXISTS cofisc_tipo_denuncia (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  tipo_denuncia VARCHAR(100) NULL,
  PRIMARY KEY (id))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table cidade
-- -----------------------------------------------------
DROP TABLE IF EXISTS cidade ;

CREATE TABLE IF NOT EXISTS cidade (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  cidade VARCHAR(100) NULL,
  PRIMARY KEY (id))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table bairro
-- -----------------------------------------------------
DROP TABLE IF EXISTS bairro ;

CREATE TABLE IF NOT EXISTS bairro (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  bairro VARCHAR(150) NULL,
  cidade_id INT UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_bairro_cidade1
    FOREIGN KEY (cidade_id)
    REFERENCES cidade (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table cofisc_origem
-- -----------------------------------------------------
DROP TABLE IF EXISTS cofisc_origem ;

CREATE TABLE IF NOT EXISTS cofisc_origem (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  origem VARCHAR(100) NULL,
  PRIMARY KEY (id))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table cofisc_tipo_solicitacao
-- -----------------------------------------------------
DROP TABLE IF EXISTS cofisc_tipo_solicitacao ;

CREATE TABLE IF NOT EXISTS cofisc_tipo_solicitacao (
  id INT NOT NULL,
  tipo_solicitacao VARCHAR(100) NULL,
  PRIMARY KEY (id))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table cofisc_protocolo
-- -----------------------------------------------------
DROP TABLE IF EXISTS cofisc_protocolo ;

CREATE TABLE IF NOT EXISTS cofisc_protocolo (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  data_protocolo DATETIME NULL,
  protocolo_id INT UNSIGNED NOT NULL,
  tipo_documento_id INT UNSIGNED NOT NULL,
  origem_id INT UNSIGNED NOT NULL,
  numero_protocolo VARCHAR(45) NULL,
  ano_protocolo VARCHAR(10) NULL,
  numero_oficio VARCHAR(45) NULL,
  ano_oficio VARCHAR(10) NULL,
  numero_memorando VARCHAR(45) NULL,
  ano_memorando VARCHAR(10) NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_table1_cofisc_protocolo1
    FOREIGN KEY (protocolo_id)
    REFERENCES cofisc_tipo_protocolo (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_table1_cofisc_tipo_documento1
    FOREIGN KEY (tipo_documento_id)
    REFERENCES cofisc_tipo_documento (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_table1_origem1
    FOREIGN KEY (origem_id)
    REFERENCES cofisc_origem (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table cofisc_solicitacao
-- -----------------------------------------------------
DROP TABLE IF EXISTS cofisc_solicitacao ;

CREATE TABLE IF NOT EXISTS cofisc_solicitacao (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  protocolo_id INT UNSIGNED NOT NULL,
  tipo_solicitacao_id INT NOT NULL,
  solicitante VARCHAR(255) NULL,
  telefone VARCHAR(45) NULL,
  email VARCHAR(150) NULL,
  descricao VARCHAR(255) NULL,
  endereco VARCHAR(255) NULL,
  cidade_id INT UNSIGNED NOT NULL,
  bairro_id INT UNSIGNED NOT NULL,
  latitude VARCHAR(45) NULL,
  longitude VARCHAR(45) NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_cofisc_solicitacao_cofisc_tipo_solicitação1
    FOREIGN KEY (tipo_solicitacao_id)
    REFERENCES cofisc_tipo_solicitacao (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_cofisc_solicitacao_cofisc_protocolo1
    FOREIGN KEY (protocolo_id)
    REFERENCES cofisc_protocolo (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_cofisc_solicitacao_bairro1
    FOREIGN KEY (bairro_id)
    REFERENCES bairro (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_cofisc_solicitacao_cidade1
    FOREIGN KEY (cidade_id)
    REFERENCES cidade (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table cofisc_denuncia
-- -----------------------------------------------------
DROP TABLE IF EXISTS cofisc_denuncia ;

CREATE TABLE IF NOT EXISTS cofisc_denuncia (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  protocolo_id INT UNSIGNED NOT NULL,
  tipo_denuncia_id INT UNSIGNED NOT NULL,
  denunciado VARCHAR(255) NULL,
  descricao VARCHAR(255) NULL,
  cidade_id INT UNSIGNED NOT NULL,
  bairro_id INT UNSIGNED NOT NULL,
  endereco VARCHAR(255) NULL,
  latitude VARCHAR(45) NULL,
  longitude VARCHAR(45) NULL,
  denunciante VARCHAR(255) NULL,
  telefone VARCHAR(45) NULL,
  email VARCHAR(150) NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_cofisc_denuncia_cofisc_tipo_denuncia1
    FOREIGN KEY (tipo_denuncia_id)
    REFERENCES cofisc_tipo_denuncia (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_cofisc_denuncia_cidade1
    FOREIGN KEY (cidade_id)
    REFERENCES cidade (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_cofisc_denuncia_bairro1
    FOREIGN KEY (bairro_id)
    REFERENCES bairro (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_cofisc_denuncia_cofisc_protocolo1
    FOREIGN KEY (protocolo_id)
    REFERENCES cofisc_protocolo (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table cofisc_historico_denuncia
-- -----------------------------------------------------
DROP TABLE IF EXISTS cofisc_historico_denuncia ;

CREATE TABLE IF NOT EXISTS cofisc_historico_denuncia (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  data DATETIME NULL,
  descricao VARCHAR(255) NULL,
  usuario_id INT UNSIGNED NOT NULL,
  denuncia_id INT UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_cofisc_historico_usuario1
    FOREIGN KEY (usuario_id)
    REFERENCES usuario (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_cofisc_historico_cofisc_denuncia1
    FOREIGN KEY (denuncia_id)
    REFERENCES cofisc_denuncia (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table cofisc_historico_solicitacao
-- -----------------------------------------------------
DROP TABLE IF EXISTS cofisc_historico_solicitacao ;

CREATE TABLE IF NOT EXISTS cofisc_historico_solicitacao (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  data DATETIME NULL,
  descricao VARCHAR(255) NULL,
  usuario_id INT UNSIGNED NOT NULL,
  solicitacao_id INT UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_cofisc_historico_solicitacao_cofisc_solicitacao1
    FOREIGN KEY (solicitacao_id)
    REFERENCES cofisc_solicitacao (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_cofisc_historico_solicitacao_usuario1
    FOREIGN KEY (usuario_id)
    REFERENCES usuario (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table cofisc_anexo_denuncia
-- -----------------------------------------------------
DROP TABLE IF EXISTS cofisc_anexo_denuncia ;

CREATE TABLE IF NOT EXISTS cofisc_anexo_denuncia (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  denuncia_id INT UNSIGNED NOT NULL,
  nome VARCHAR(255) NULL,
  anexo VARCHAR(255) NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_cofisc_anexo_denuncia_cofisc_denuncia1
    FOREIGN KEY (denuncia_id)
    REFERENCES cofisc_denuncia (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table cofisc_anexo_solicitacao
-- -----------------------------------------------------
DROP TABLE IF EXISTS cofisc_anexo_solicitacao ;

CREATE TABLE IF NOT EXISTS cofisc_anexo_solicitacao (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  solicitacao_id INT UNSIGNED NOT NULL,
  nome VARCHAR(255) NULL,
  anexo VARCHAR(255) NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_cofisc_anexo_solicitacao_cofisc_solicitacao1
    FOREIGN KEY (solicitacao_id)
    REFERENCES cofisc_solicitacao (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
