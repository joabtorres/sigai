
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
  data_protocolo DATE NULL,
  protocolo_id INT UNSIGNED NOT NULL,
  tipo_documento_id INT UNSIGNED NOT NULL,
  origem_id INT UNSIGNED NOT NULL,
  numero_protocolo VARCHAR(45) NULL,
  ano_protocolo VARCHAR(10) NULL,
  numero_oficio VARCHAR(45) NULL,
  ano_oficio VARCHAR(10) NULL,
  numero_memorando VARCHAR(45) NULL,
  ano_memorando VARCHAR(10) NULL,
  hash VARCHAR(32) NULL,
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
  usuario_id INT UNSIGNED NOT NULL,
  status INT NULL,
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
    ON UPDATE NO ACTION,
  CONSTRAINT fk_cofisc_solicitacao_usuario1
    FOREIGN KEY (usuario_id)
    REFERENCES usuario (id)
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
  usuario_id INT UNSIGNED NOT NULL,
  status INT NULL,
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
    ON UPDATE NO ACTION,
  CONSTRAINT fk_cofisc_denuncia_usuario1
    FOREIGN KEY (usuario_id)
    REFERENCES usuario (id)
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
-- -----------------------------------------------------
-- Table cofisc_vistoria_denuncia
-- -----------------------------------------------------
DROP TABLE IF EXISTS cofisc_vistoria_denuncia ;

CREATE TABLE IF NOT EXISTS cofisc_vistoria_denuncia (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  data DATE NULL,
  descricao TEXT NULL,
  denuncia_id INT UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_cofisc_vistoria_denuncia_cofisc_denuncia1
    FOREIGN KEY (denuncia_id)
    REFERENCES cofisc_denuncia (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table cofisc_vistoria_solicitacao
-- -----------------------------------------------------
DROP TABLE IF EXISTS cofisc_vistoria_solicitacao ;

CREATE TABLE IF NOT EXISTS cofisc_vistoria_solicitacao (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  data DATE NULL,
  descricao TEXT NULL,
  solicitacao_id INT UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_cofisc_vistoria_solicitacao_cofisc_solicitacao1
    FOREIGN KEY (solicitacao_id)
    REFERENCES cofisc_solicitacao (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- cad tipo de protocolo
INSERT INTO `cofisc_tipo_protocolo` (`id`, `tipo_protocolo`) VALUES 
('1', 'Documento'), ('2', 'Processo');

-- CAD cofisc_tipo_documento
INSERT INTO cofisc_tipo_documento (id, documento, protocolo_id) VALUES
('1', 'E-mail', '1'),
('2', 'Formulário de Denúncia', '1'),
('3', 'Memorando', '1'),
('4', 'Ofício', '1'),
('5', 'Outros', '1'),
('6', 'Processo Administrativo Punitivo', '2'),
('7', 'Requerimento', '1');

-- cad cofisc_origem

INSERT INTO cofisc_origem (id, origem) VALUES 
('1', 'Denúncia Externa'),
('2', 'Denuncia Interna'),
('3', 'Poder Executivo'),
('4', 'Poder Judiciário'),
('5', 'Poder Legislativo'),
('6', 'Interna'),
('7', 'Externa');

 -- CAD cofisc_tipo_denuncia
INSERT INTO cofisc_tipo_denuncia ( id, tipo_denuncia) VALUES
('1', 'Animais Domésticos'),
('2', 'Animais Silvestres'),
('3', 'Apreensão de Madeira'),
('4', 'Animais Sinantrópicos'),
('5', 'Corpo Hídrico'),
('6', 'Cumprimento de condicionantes intempestivo'),
('7', 'Desmatamento'),
('8', 'Efluente Doméstico'),
('9', 'Efluente Industrial'),
('10', 'Indeferimento de Licenciamento Ambiental'),
('11', 'Indeferimento de processo de licenciamento'),
('12', 'Indeferimento ou Suspensão de Licença'),
('13', 'Não cumprimento de condicionante'),
('14', 'Outros'),
('15', 'Poda de Indivíduo Arbóreo'),
('16', 'Poluição Atmosférica'),
('17', 'Poluição Sonora'),
('18', 'Poluição Visual'),
('19', 'Queimadas'),
('20', 'Renovação de licença fora do prazo'),
('21', 'Resíduos sólidos'),
('22', 'Sem Licença'),
('23', 'Supressão de Indivíduo Arbóreo'),
('24', 'Suspensão de licença'),
('25', 'Terreno Baldio');



-- CAD cofisc_tipo_solicitacao
INSERT INTO cofisc_tipo_solicitacao (id, tipo_solicitacao) VALUES
('1', 'Armazenamento de Madeira'),
('2', 'Atividade de Fiscalização'),
('3', 'Captura de Animais Domésticos'),
('4', 'Captura de Animais Silvestres'),
('5', 'Colaboração'),
('6', 'Convênio'),
('7', 'Convite'),
('8', 'Convocação'),
('9', 'Doação de Madeira'),
('10', 'Elaboração de Projeto'),
('11', 'Entrega de Defesa de Auto de Infração'),
('12', 'Entrega de Documentações Pendentes'),
('13', 'Informações'),
('14', 'Nota Técnica'),
('15', 'Ofício'),
('16', 'Outros'),
('17', 'Parece Técnico'),
('18', 'Processo'),
('19', 'Prorrogação de Prazo'),
('20', 'Relatório de Fiscalização');


