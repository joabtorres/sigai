
-- -----------------------------------------------------
-- Table cca_chamado_status
-- -----------------------------------------------------
DROP TABLE IF EXISTS cca_chamado_status ;

CREATE TABLE IF NOT EXISTS cca_chamado_status (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NULL,
  PRIMARY KEY (id))
ENGINE = InnoDB;

--
-- Extraindo dados da tabela cca_chamado_status
--

INSERT INTO cca_chamado_status (id, nome) VALUES
(1, 'Aguardando o Suporte'),
(2, 'Em Andamento'),
(3, 'Cancelado'),
(4, 'Finalizado');

--
-- Estrutura da tabela cca_chamado
--
DROP TABLE IF EXISTS cca_chamado ;

CREATE TABLE IF NOT EXISTS cca_chamado (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  setor_id INT UNSIGNED NOT NULL,
  usuario_id INT UNSIGNED NOT NULL,
  status_id INT UNSIGNED NOT NULL,
  assunto VARCHAR(255) NULL,
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
    REFERENCES cca_chamado_status (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

--
-- Extraindo dados da tabela cca_chamado
--

INSERT INTO cca_chamado (id, setor_id, usuario_id, status_id, assunto, data, descricao, anexo) VALUES
(1, 4, 10, 4, 'Lentidão no uso do computador', '2020-08-17 11:14:00', 'Solicito suporte técnico para verificar o motivo de lentidão no uso do computador. ', ''),
(2, 4, 11, 4, 'Instalação de programa', '2020-08-20 11:38:00', 'Prezado, gostaria de solicitar a instalação do software Corel Draw na maquina que utilizo. ', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela cca_chamado_historico
--

DROP TABLE IF EXISTS cca_chamado_historico ;

CREATE TABLE IF NOT EXISTS cca_chamado_historico (
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
    REFERENCES cca_chamado (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_chamado_historico_chamado_status1
    FOREIGN KEY (status_id)
    REFERENCES cca_chamado_status (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_chamado_historico_usuario1
    FOREIGN KEY (usuario_id)
    REFERENCES usuario (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

--
-- Extraindo dados da tabela cca_chamado_historico
--

INSERT INTO cca_chamado_historico (id, chamado_id, status_id, usuario_id, data, descricao, anexo) VALUES
(29, 1, 2, 1, '2020-08-17 11:16:54', 'Irei verificar assim que possível', ''),
(30, 2, 4, 1, '2020-08-17 11:17:15', 'Apos analise técnica foi identificado que o problema de lentidão no acessoa a maquina está relacionada a questão da rede, o computador estava no wifi, foi realizado a mudança para modo de cabeamento.', ''),
(33, 2, 4, 1, '2020-08-20 11:41:26', 'Foi realizado a instalação do CorelDRAW versão 2018 na máquina cofisc-06.', '');
