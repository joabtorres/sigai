
-- -----------------------------------------------------
-- Table ti_chamado_status
-- -----------------------------------------------------
DROP TABLE IF EXISTS ti_chamado_status ;

CREATE TABLE IF NOT EXISTS ti_chamado_status (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NULL,
  PRIMARY KEY (id))
ENGINE = InnoDB;

--
-- Extraindo dados da tabela ti_chamado_status
--

INSERT INTO ti_chamado_status (id, nome) VALUES
(1, 'Aguardando o Suporte'),
(2, 'Em Andamento'),
(3, 'Cancelado'),
(4, 'Finalizado');

-- -----------------------------------------------------
-- Table ti_chamado_assunto
-- -----------------------------------------------------
DROP TABLE IF EXISTS ti_chamado_assunto ;

CREATE TABLE IF NOT EXISTS ti_chamado_assunto (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  assunto VARCHAR(45) NULL,
  PRIMARY KEY (id))
ENGINE = InnoDB;

INSERT INTO ti_chamado_assunto (assunto) VALUES
('Instalação, atualização ou remoção da impressora'),
('Instalação, atualização ou remoção de computador'),
('Permissão ou restrinção de acesso a arquivos'),
('Criação, alteração ou desativação de usuário'),
('Recuperação de arquivo'),
('Recarga de tinta ou tone da impressora'),
('Backup de arquivos'),
('Outros');

--
-- Estrutura da tabela ti_chamado
--
DROP TABLE IF EXISTS ti_chamado ;

CREATE TABLE IF NOT EXISTS ti_chamado (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  setor_id INT UNSIGNED NOT NULL,
  usuario_id INT UNSIGNED NOT NULL,
  status_id INT UNSIGNED NOT NULL,
  assunto_id INT UNSIGNED NOT NULL,
  data DATETIME NULL,
  descricao TEXT NULL,
  anexo VARCHAR(255) NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_chamado_setor
    FOREIGN KEY (setor_id)
    REFERENCES setor (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_chamado_usuario1
    FOREIGN KEY (usuario_id)
    REFERENCES usuario (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_chamado_chamado_status1
    FOREIGN KEY (status_id)
    REFERENCES ti_chamado_status (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_ti_chamado_ti_chamado_assunto1
    FOREIGN KEY (assunto_id)
    REFERENCES ti_chamado_assunto (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

--
-- Estrutura da tabela ti_chamado_historico
--

DROP TABLE IF EXISTS ti_chamado_historico ;

CREATE TABLE IF NOT EXISTS ti_chamado_historico (
  id INT NOT NULL AUTO_INCREMENT,
  chamado_id INT UNSIGNED NOT NULL,
  status_id INT UNSIGNED NOT NULL,
  usuario_id INT UNSIGNED NOT NULL,
  data DATETIME NULL,
  descricao TEXT NULL,
  anexo VARCHAR(255) NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_chamado_historico_chamado1
    FOREIGN KEY (chamado_id)
    REFERENCES ti_chamado (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_chamado_historico_chamado_status1
    FOREIGN KEY (status_id)
    REFERENCES ti_chamado_status (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_chamado_historico_usuario1
    FOREIGN KEY (usuario_id)
    REFERENCES usuario (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

