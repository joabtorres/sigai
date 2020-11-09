-- -----------------------------------------------------
-- Table protocolo_tipo
-- -----------------------------------------------------
DROP TABLE IF EXISTS tramitacao;
DROP TABLE IF EXISTS protocolo ;
DROP TABLE IF EXISTS protocolo_objetivo ;
DROP TABLE IF EXISTS protocolo_tipo ;


CREATE TABLE IF NOT EXISTS protocolo_tipo (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  tipo VARCHAR(45) NULL,
  PRIMARY KEY (id))
ENGINE = InnoDB;

INSERT INTO protocolo_tipo(id, tipo) VALUES (1, 'Documento');
INSERT INTO protocolo_tipo(id, tipo) VALUES (2, 'Processo');


-- -----------------------------------------------------
-- Table protocolo_objetivo
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS protocolo_objetivo (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  objetivo VARCHAR(45) NULL,
  tipo_id INT UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_protocolo_objetivo_protocolo_tipo1
    FOREIGN KEY (tipo_id)
    REFERENCES protocolo_tipo (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO protocolo_objetivo (id, obejetivo, tipo_id) VALUES
('1', 'Carta Consulta', '1'),
('2', 'Comunicado', '1'),
('3', 'Convite', '1'),
('4', 'Denuncia', '1'),
('5', 'Devolução', '1'),
('6', 'Documento', '1'),
('7', 'Encaminhamento', '1'),
('8', 'Informação', '1'),
('9', 'Informativo', '1'),
('10', 'Juntada De Documento', '1'),
('11', 'Memorando', '1'),
('12', 'Ofício', '1'),
('13', 'Ofício Circular', '1'),
('14', 'Recurso Auto De Infração', '1'),
('15', 'Recurso Penalidade Imposta', '1'),
('16', 'Requerimento', '1'),
('17', 'Reunião', '1'),
('18', 'Solicitação', '1'),
('19', 'Autorização De Supressão Vegetal - ASV', '2'),
('20', 'Evento Temporário', '2'),
('21', 'Licença Ambiental Rural - LAR', '2'),
('22', 'Licença de Instalação - LI', '2'),
('23', 'Licença de Instalação E Licença De Operação - LIO', '2'),
('24', 'Licença de Operação - LO', '2'),
('25', 'Licença de Prévia E Licença De Instalação - LP/LI', '2'),
('26', 'Licença Prévia - LP', '2'),
('27', 'Processo Administrativo Punitivo - PAP', '2'),
('28', 'Renovação De Licença De Operação - RLO', '2');




-- -----------------------------------------------------
-- Table protocolo
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS protocolo (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  tipo_id INT UNSIGNED NOT NULL,
  objetivo_id INT UNSIGNED NOT NULL,
  numero_protocolo VARCHAR(45) NOT NULL,
  data DATE NULL,
  interessado VARCHAR(255) NULL,
  processo INT NULL,
  contato VARCHAR(255) NULL,
  protocolista_id INT UNSIGNED NOT NULL,
  numero_folhas VARCHAR(45) NULL,
  assunto TEXT NULL,
  descricao TEXT NULL,
  cidade INT NULL,
  bairro INT NULL,
  endereco VARCHAR(255) NULL,
  numero VARCHAR(45) NULL,
  latitude VARCHAR(45) NULL,
  longitude VARCHAR(45) NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_protocolo_processos_usuario1
    FOREIGN KEY (protocolista_id)
    REFERENCES usuario (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_protocolo_protocolo_tipo1
    FOREIGN KEY (tipo_id)
    REFERENCES protocolo_tipo (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_protocolo_protocolo_objetivo1
    FOREIGN KEY (objetivo_id)
    REFERENCES protocolo_objetivo (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table tramitacao
-- -----------------------------------------------------

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