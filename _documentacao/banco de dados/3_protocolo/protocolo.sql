-- -----------------------------------------------------
-- Table protocolo
-- -----------------------------------------------------
DROP TABLE IF EXISTS protocolo ;

CREATE TABLE IF NOT EXISTS protocolo (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  tipo VARCHAR(45) NOT NULL,
  objetivo VARCHAR(255) NOT NULL,
  numero_protocolo VARCHAR(45) NOT NULL,
  data DATE NULL,
  interessado VARCHAR(255) NULL,
  cidade INT NULL,
  bairro INT NULL,
  endereco VARCHAR(255) NULL,
  cep VARCHAR(20) NULL,
  numero VARCHAR(45) NULL,
  protocolista_id INT UNSIGNED NOT NULL,
  numero_folhas VARCHAR(45) NULL,
  assunto TEXT NULL,
  descricao TEXT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_protocolo_processos_usuario1
    FOREIGN KEY (protocolista_id)
    REFERENCES usuario (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table tramitacao
-- -----------------------------------------------------
DROP TABLE IF EXISTS tramitacao ;

CREATE TABLE IF NOT EXISTS tramitacao (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  protocolo_id INT UNSIGNED NOT NULL,
  setor_id INT UNSIGNED NOT NULL,
  usuario_id INT UNSIGNED NOT NULL,
  data DATETIME NULL,
  descricao TEXT NULL,
  anexo VARCHAR(255) NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_tramitacao_protocolo1
    FOREIGN KEY (protocolo_id)
    REFERENCES protocolo (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_tramitacao_setor1
    FOREIGN KEY (setor_id)
    REFERENCES setor (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_tramitacao_usuario1
    FOREIGN KEY (usuario_id)
    REFERENCES usuario (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;