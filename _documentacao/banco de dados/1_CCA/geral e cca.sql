
--
-- Estrutura da tabela empresa
--

DROP TABLE IF EXISTS empresa ;

CREATE TABLE IF NOT EXISTS empresa (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NULL,
  abreviacao VARCHAR(45) NULL,
  endereco VARCHAR(255) NULL,
  cep VARCHAR(45) NULL,
  cnpj VARCHAR(45) NULL,
  telefone VARCHAR(45) NULL,
  email VARCHAR(255) NULL,
  site VARCHAR(255) NULL,
  figura VARCHAR(255) NULL,
  PRIMARY KEY (id))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

--
-- Extraindo dados da tabela empresa
--

INSERT INTO empresa (id, nome, abreviacao, endereco, cep, cnpj, telefone, email, site, figura) VALUES
(1, 'Secretaria Municipal de Meio Ambiente - Castanhal/PA', 'SEMMA', 'R. Quincas Nascimento - Saudade I, Castanhal - PA', ' 68741-040', '05.121.991/0001-84', '(91) 3711-5959', 'semma@castanhal.pa.gov.br', 'semma@castanhal.pa.gov.br', 'uploads/empresa/287f9f983036f22ca580c47aa9be57a8.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela setor
--
DROP TABLE IF EXISTS setor ;

CREATE TABLE IF NOT EXISTS setor (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NULL,
  abreviacao VARCHAR(45) NULL,
  PRIMARY KEY (id))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

--
-- Extraindo dados da tabela setor
--

INSERT INTO setor (id, nome, abreviacao) VALUES
(1, 'Coordenadoria de Conservação de Áreas Verdes', 'CCAV'),
(2, 'Coordenadoria Administrativa e Financeira', 'COAF'),
(3, 'Coordenadoria de Gestão de Agrossilvipastoris', 'CGA'),
(4, 'Coordenadoria de Fiscalização Ambiental', 'COFISC'),
(5, 'Assessoria Jurídica', 'ASJUR'),
(6, 'Arquivos da Secretária', 'AR-SEC'),
(7, 'Protocolo da Secretária', 'PRO-SEC'),
(8, 'Assessoria Técnica', 'ASTEC'),
(9, 'Gabinete da Secretária', 'GAB-SEC'),
(10, 'Coordenação de Controle Ambiental', 'CCA');

-- --------------------------------------------------------

--
-- Estrutura da tabela usuario
--

DROP TABLE IF EXISTS usuario ;

CREATE TABLE IF NOT EXISTS usuario (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  setor_id INT UNSIGNED NOT NULL,
  portaria VARCHAR(45) NULL,
  cargo VARCHAR(45) NULL,
  nome VARCHAR(255) NOT NULL,
  usuario VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  senha VARCHAR(255) NOT NULL,
  acesso INT NULL,
  cadastro DATE NULL,
  imagem VARCHAR(255) NULL,
  status INT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX usuario_UNIQUE (usuario ASC),
  UNIQUE INDEX email_UNIQUE (email ASC),
  CONSTRAINT fk_usuario_setor1
    FOREIGN KEY (setor_id)
    REFERENCES setor (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

--
-- Extraindo dados da tabela usuario
--

INSERT INTO usuario (id, setor_id, portaria, cargo, nome, usuario, email, senha, acesso, cadastro, imagem, status) VALUES
(1, 10, '1.137/20', 'Coordenador', 'Joab T. Alencar', 'joab.alencar', 'joabtorres1508@gmail.com', '47cafbff7d1c4463bbe7ba972a2b56e3', 10, '2020-08-06', 'uploads/usuarios/387eb1c83175517f64b6ccd6bc6a8567.jpg', 1),
(5, 10, '001/20', 'Acesso de Protocolo', 'Jose Felicio Alencar', 'jose.alencar', 'jose.felicio@hotmail.com', '47cafbff7d1c4463bbe7ba972a2b56e3', 1, '2020-08-10', 'uploads/usuarios/335339072c739ff29a83fc011a8862aa.jpg', 1),
(6, 4, '1.888/2019', 'Coordenador', 'Gabriel Holanda Pereira de Medeiros', 'gabriel.medeiros', 'hpm.gabriel@gmail.com', 'e29e20a474d9dcf311dd5d124789f725', 1, '2020-08-17', 'uploads/usuarios/user.png', 1),
(7, 4, '553-3/2', 'Agente Administrativo', 'Ruth Jemima de O. Lessa', 'ruth.lessa', 'ruthleessa@gmail.com', '471175fe89dddb82feaf65eddbd46f13', 1, '2020-08-17', 'uploads/usuarios/user.png', 1),
(8, 4, '1.444/19', 'Auxiliar de Coordenadoria de Fiscalização', 'Katsumi José Dourado Watanabe', 'katsumi.watanabe', 'katwatanabe@hotmail.com', '42c7bed7d11c52e93705545df7b28d24', 1, '2020-08-17', 'uploads/usuarios/user.png', 1),
(9, 4, '', 'Estagiário de Fiscalização', 'Weslley Vinicius Victor Moura', 'weslley.vinicius', 'weslley.m000@gmail.com', '5facbbff6930c54a5df641c134a2f16c', 1, '2020-08-17', 'uploads/usuarios/user.png', 1),
(10, 4, '1.300/20', 'Engenharia Sanitarista', 'Rafaele Freitas de Oliveira', 'rafaele.freitas', 'rafa.frei.oli@gmail.com', '7c235d85eb54aed62ec05bb250b284bb', 1, '2020-08-17', 'uploads/usuarios/user.png', 1),
(11, 4, '1.301/20', 'Médico veterinário', 'Ludimyla Passos Silva', 'ludimyla.passos', 'ludimylapassos1@hotmail.com', '15fbadf5ee07ab5746c1e8bef2b0134d', 1, '2020-08-17', 'uploads/usuarios/user.png', 1);

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
(11, 7, 1, 1, 'asdas', '2020-08-07 13:30:00', '', ''),
(21, 4, 10, 4, 'Lentidão no uso do computador', '2020-08-17 11:14:00', 'Solicito suporte técnico para verificar o motivo de lentidão no uso do computador. ', '');

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
(29, 21, 2, 1, '2020-08-17 11:16:54', 'Irei verificar assim que possível', ''),
(30, 21, 4, 1, '2020-08-17 11:17:15', 'Apos analise técnica foi identificado que o problema de lentidão no acessoa a maquina está relacionada a questão da rede, o computador estava no wifi, foi realizado a mudança para modo de cabeamento.', '');

-- --------------------------------------------------------


