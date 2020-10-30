
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
(1, 'Coordenadoria de Proteção dos Recursos Naturais e Educação
Ambiental', 'CPRN'),
(2, 'Coordenadoria de Gestão Administrativa e Financeira', 'COAF'),
(3, 'Coordenadoria de Licenciamento Ambiental', 'CLA'),
(4, 'Coordenadoria de Fiscalização Ambiental', 'COFISC'),
(5, 'Assessoria Jurídica', 'ASJUR'),
(6, 'Arquivos da Secretária', 'AR-SEC'),
(7, 'Protocolo da Secretária', 'PRO-SEC'),
(8, 'Assessoria Técnica e de Estudos legislativos', 'ASTEC'),
(9, 'Secretário de Meio Ambiente', 'GAB-SEC'),
(10, 'Assessoria de Tecnologia da Informação e de Geotecnologia', 'ASTIGE');

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


-- cadastro de cidade
INSERT INTO cidade (id, cidade) VALUES ('1', 'Castanhal'); 

-- cadastra bairro
INSERT INTO bairro (id, bairro, cidade_id) VALUES
('1', 'Apeú', '1'),
('2', 'Área de Invasão', '1'),
('3', 'Bairro Novo', '1'),
('4', 'Betânia', '1'),
('5', 'Bom Jesus', '1'),
('6', 'Caiçara', '1'),
('7', 'Cariri', '1'),
('8', 'Centro', '1'),
('9', 'Conjuntos Ypês', '1'),
('10', 'Cristo', '1'),
('11', 'Distrito Industrial', '1'),
('12', 'Estrela', '1'),
('13', 'Florestal', '1'),
('14', 'Fonte Boa', '1'),
('15', 'Heliolândia', '1'),
('16', 'Ianetama', '1'),
('17', 'Imperador', '1'),
('18', 'Imperial', '1'),
('19', 'Jaderlândia', '1'),
('20', 'Não se Aplica', '1'),
('21', 'Nova Olinda', '1'),
('22', 'Novo Caiçara', '1'),
('23', 'Novo Estrela', '1'),
('24', 'Pantanal', '1'),
('25', 'Pirapora', '1'),
('26', 'Propira', '1'),
('27', 'Rouxinol', '1'),
('28', 'Sales Jardim', '1'),
('29', 'Salgadinho', '1'),
('30', 'Santa Catarina', '1'),
('31', 'Santa Helena', '1'),
('32', 'Santa Lídia', '1'),
('33', 'São José', '1'),
('34', 'Saudade I', '1'),
('35', 'Saudade II', '1'),
('36', 'Titanlândia', '1'),
('37', 'Tókio', '1'),
('38', 'Zona Rural', '1');
