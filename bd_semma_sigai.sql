-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Ago-2020 às 17:15
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_semma_sigai`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairro`
--

CREATE TABLE `bairro` (
  `id` int(10) UNSIGNED NOT NULL,
  `bairro` varchar(150) DEFAULT NULL,
  `cidade_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bairro`
--

INSERT INTO `bairro` (`id`, `bairro`, `cidade_id`) VALUES
(1, 'Apeú', 1),
(2, 'Área de Invasão', 1),
(3, 'Bairro Novo', 1),
(4, 'Betânia', 1),
(5, 'Bom Jesus', 1),
(6, 'Caiçara', 1),
(7, 'Cariri', 1),
(8, 'Centro', 1),
(9, 'Conjuntos Ypês', 1),
(10, 'Cristo', 1),
(11, 'Distrito Industrial', 1),
(12, 'Estrela', 1),
(13, 'Florestal', 1),
(14, 'Fonte Boa', 1),
(15, 'Heliolândia', 1),
(16, 'Ianetama', 1),
(17, 'Imperador', 1),
(18, 'Imperial', 1),
(19, 'Jaderlândia', 1),
(20, 'Não se Aplica', 1),
(21, 'Nova Olinda', 1),
(22, 'Novo Caiçara', 1),
(23, 'Novo Estrela', 1),
(24, 'Pantanal', 1),
(25, 'Pirapora', 1),
(26, 'Propira', 1),
(27, 'Rouxinol', 1),
(28, 'Sales Jardim', 1),
(29, 'Salgadinho', 1),
(30, 'Santa Catarina', 1),
(31, 'Santa Helena', 1),
(32, 'Santa Lídia', 1),
(33, 'São José', 1),
(34, 'Saudade I', 1),
(35, 'Saudade II', 1),
(36, 'Titanlândia', 1),
(37, 'Tókio', 1),
(38, 'Zona Rural', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cca_chamado`
--

CREATE TABLE `cca_chamado` (
  `id` int(10) UNSIGNED NOT NULL,
  `setor_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `assunto` varchar(255) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `anexo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cca_chamado`
--

INSERT INTO `cca_chamado` (`id`, `setor_id`, `usuario_id`, `status_id`, `assunto`, `data`, `descricao`, `anexo`) VALUES
(1, 4, 10, 4, 'Lentidão no uso do computador', '2020-08-17 11:14:00', 'Solicito suporte técnico para verificar o motivo de lentidão no uso do computador. ', ''),
(2, 4, 11, 4, 'Instalação de programa', '2020-08-20 11:38:00', 'Prezado, gostaria de solicitar a instalação do software Corel Draw na maquina que utilizo. ', ''),
(3, 1, 13, 1, 'Instalação de 1 (um) computador / 1 (uma) cadeira', '2020-08-25 10:43:00', 'Instalação de 1 (um) computador para estagiário / \\\' (uma) cadeira', ''),
(4, 1, 13, 1, 'Criação de Usuário', '2020-08-25 10:43:00', 'Criação de Usuário de estagiário', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cca_chamado_historico`
--

CREATE TABLE `cca_chamado_historico` (
  `id` int(11) NOT NULL,
  `chamado_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `data` datetime DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `anexo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cca_chamado_historico`
--

INSERT INTO `cca_chamado_historico` (`id`, `chamado_id`, `status_id`, `usuario_id`, `data`, `descricao`, `anexo`) VALUES
(29, 1, 2, 1, '2020-08-17 11:16:54', 'Irei verificar assim que possível', ''),
(30, 1, 4, 1, '2020-08-17 11:17:15', 'Apos analise técnica foi identificado que o problema de lentidão no acessoa a maquina está relacionada a questão da rede, o computador estava no wifi, foi realizado a mudança para modo de cabeamento.', ''),
(33, 2, 4, 1, '2020-08-20 11:41:26', 'Foi realizado a instalação do CorelDRAW versão 2018 na máquina cofisc-06.', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cca_chamado_status`
--

CREATE TABLE `cca_chamado_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cca_chamado_status`
--

INSERT INTO `cca_chamado_status` (`id`, `nome`) VALUES
(1, 'Aguardando o Suporte'),
(2, 'Em Andamento'),
(3, 'Cancelado'),
(4, 'Finalizado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `id` int(10) UNSIGNED NOT NULL,
  `cidade` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`id`, `cidade`) VALUES
(1, 'Castanhal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cofisc_anexo_denuncia`
--

CREATE TABLE `cofisc_anexo_denuncia` (
  `id` int(10) UNSIGNED NOT NULL,
  `denuncia_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `anexo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cofisc_anexo_solicitacao`
--

CREATE TABLE `cofisc_anexo_solicitacao` (
  `id` int(10) UNSIGNED NOT NULL,
  `solicitacao_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `anexo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cofisc_denuncia`
--

CREATE TABLE `cofisc_denuncia` (
  `id` int(10) UNSIGNED NOT NULL,
  `protocolo_id` int(10) UNSIGNED NOT NULL,
  `tipo_denuncia_id` int(10) UNSIGNED NOT NULL,
  `denunciado` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `cidade_id` int(10) UNSIGNED NOT NULL,
  `bairro_id` int(10) UNSIGNED NOT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `latitude` varchar(45) DEFAULT NULL,
  `longitude` varchar(45) DEFAULT NULL,
  `denunciante` varchar(255) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cofisc_denuncia`
--

INSERT INTO `cofisc_denuncia` (`id`, `protocolo_id`, `tipo_denuncia_id`, `denunciado`, `descricao`, `cidade_id`, `bairro_id`, `endereco`, `latitude`, `longitude`, `denunciante`, `telefone`, `email`) VALUES
(1, 1, 10, 'empresa x', '', 1, 6, 'Rod. Belém-Brasília, 8304, Castanhal - PA, Brasil', '-1.2979765', '-47.9586203', 'joab torres ', '93 99047173', 'joab@gmail.com'),
(2, 2, 14, '123213', '', 1, 4, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cofisc_historico_denuncia`
--

CREATE TABLE `cofisc_historico_denuncia` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` datetime DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `denuncia_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cofisc_historico_denuncia`
--

INSERT INTO `cofisc_historico_denuncia` (`id`, `data`, `descricao`, `usuario_id`, `denuncia_id`) VALUES
(1, '2020-08-21 09:24:00', 'Foi realizado o cadastro da denúncia no banco de dados', 1, 1),
(2, '2020-08-21 10:38:00', 'Foi realizado o cadastro da denúncia no banco de dados', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cofisc_historico_solicitacao`
--

CREATE TABLE `cofisc_historico_solicitacao` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` datetime DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `solicitacao_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cofisc_origem`
--

CREATE TABLE `cofisc_origem` (
  `id` int(10) UNSIGNED NOT NULL,
  `origem` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cofisc_origem`
--

INSERT INTO `cofisc_origem` (`id`, `origem`) VALUES
(1, 'Denúncia Externa'),
(2, 'Denuncia Interna'),
(3, 'Poder Executivo'),
(4, 'Poder Judiciário'),
(5, 'Poder Legislativo'),
(6, 'Interna'),
(7, 'Externa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cofisc_protocolo`
--

CREATE TABLE `cofisc_protocolo` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_protocolo` date DEFAULT NULL,
  `protocolo_id` int(10) UNSIGNED NOT NULL,
  `tipo_documento_id` int(10) UNSIGNED NOT NULL,
  `origem_id` int(10) UNSIGNED NOT NULL,
  `numero_protocolo` varchar(45) DEFAULT NULL,
  `ano_protocolo` varchar(10) DEFAULT NULL,
  `numero_oficio` varchar(45) DEFAULT NULL,
  `ano_oficio` varchar(10) DEFAULT NULL,
  `numero_memorando` varchar(45) DEFAULT NULL,
  `ano_memorando` varchar(10) DEFAULT NULL,
  `hash` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cofisc_protocolo`
--

INSERT INTO `cofisc_protocolo` (`id`, `data_protocolo`, `protocolo_id`, `tipo_documento_id`, `origem_id`, `numero_protocolo`, `ano_protocolo`, `numero_oficio`, `ano_oficio`, `numero_memorando`, `ano_memorando`, `hash`) VALUES
(1, '2020-08-21', 1, 2, 7, '123', '2019', '', '', '', '', '6232ff32abb4f85c277afdd2329172c6'),
(2, '2020-08-21', 1, 4, 7, '1232131', '1232', '', '', '', '', 'cb28fb65c2f4d9500598337349048f0c');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cofisc_solicitacao`
--

CREATE TABLE `cofisc_solicitacao` (
  `id` int(10) UNSIGNED NOT NULL,
  `protocolo_id` int(10) UNSIGNED NOT NULL,
  `tipo_solicitacao_id` int(11) NOT NULL,
  `solicitante` varchar(255) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cidade_id` int(10) UNSIGNED NOT NULL,
  `bairro_id` int(10) UNSIGNED NOT NULL,
  `latitude` varchar(45) DEFAULT NULL,
  `longitude` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cofisc_tipo_denuncia`
--

CREATE TABLE `cofisc_tipo_denuncia` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_denuncia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cofisc_tipo_denuncia`
--

INSERT INTO `cofisc_tipo_denuncia` (`id`, `tipo_denuncia`) VALUES
(1, 'Animais Domésticos'),
(2, 'Animais Silvestres'),
(3, 'Apreensão de Madeira'),
(4, 'Animais Sinantrópicos'),
(5, 'Corpo Hídrico'),
(6, 'Cumprimento de condicionantes intempestivo'),
(7, 'Desmatamento'),
(8, 'Efluente Doméstico'),
(9, 'Efluente Industrial'),
(10, 'Indeferimento de Licenciamento Ambiental'),
(11, 'Indeferimento de processo de licenciamento'),
(12, 'Indeferimento ou Suspensão de Licença'),
(13, 'Não cumprimento de condicionante'),
(14, 'Outros'),
(15, 'Poda de Indivíduo Arbóreo'),
(16, 'Poluição Atmosférica'),
(17, 'Poluição Sonora'),
(18, 'Poluição Visual'),
(19, 'Queimadas'),
(20, 'Renovação de licença fora do prazo'),
(21, 'Resíduos sólidos'),
(22, 'Sem Licença'),
(23, 'Supressão de Indivíduo Arbóreo'),
(24, 'Suspensão de licença'),
(25, 'Terreno Baldio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cofisc_tipo_documento`
--

CREATE TABLE `cofisc_tipo_documento` (
  `id` int(10) UNSIGNED NOT NULL,
  `documento` varchar(100) DEFAULT NULL,
  `protocolo_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cofisc_tipo_documento`
--

INSERT INTO `cofisc_tipo_documento` (`id`, `documento`, `protocolo_id`) VALUES
(1, 'E-mail', 1),
(2, 'Formulário de Denúncia', 1),
(3, 'Memorando', 1),
(4, 'Ofício', 1),
(5, 'Outros', 1),
(6, 'Processo Administrativo Punitivo', 2),
(7, 'Requerimento', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cofisc_tipo_protocolo`
--

CREATE TABLE `cofisc_tipo_protocolo` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_protocolo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cofisc_tipo_protocolo`
--

INSERT INTO `cofisc_tipo_protocolo` (`id`, `tipo_protocolo`) VALUES
(1, 'Documento'),
(2, 'Processo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cofisc_tipo_solicitacao`
--

CREATE TABLE `cofisc_tipo_solicitacao` (
  `id` int(11) NOT NULL,
  `tipo_solicitacao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cofisc_tipo_solicitacao`
--

INSERT INTO `cofisc_tipo_solicitacao` (`id`, `tipo_solicitacao`) VALUES
(1, 'Armazenamento de Madeira'),
(2, 'Atividade de Fiscalização'),
(3, 'Captura de Animais Domésticos'),
(4, 'Captura de Animais Silvestres'),
(5, 'Colaboração'),
(6, 'Convênio'),
(7, 'Convite'),
(8, 'Convocação'),
(9, 'Doação de Madeira'),
(10, 'Elaboração de Projeto'),
(11, 'Entrega de Defesa de Auto de Infração'),
(12, 'Entrega de Documentações Pendentes'),
(13, 'Informações'),
(14, 'Nota Técnica'),
(15, 'Ofício'),
(16, 'Outros'),
(17, 'Parece Técnico'),
(18, 'Processo'),
(19, 'Prorrogação de Prazo'),
(20, 'Relatório de Fiscalização');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `abreviacao` varchar(45) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `cnpj` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `figura` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `abreviacao`, `endereco`, `cep`, `cnpj`, `telefone`, `email`, `site`, `figura`) VALUES
(1, 'Secretaria Municipal de Meio Ambiente - Castanhal/PA', 'SEMMA', 'R. Quincas Nascimento - Saudade I, Castanhal - PA', ' 68741-040', '05.121.991/0001-84', '(91) 3711-5959', 'semma@castanhal.pa.gov.br', 'semma@castanhal.pa.gov.br', 'uploads/empresa/287f9f983036f22ca580c47aa9be57a8.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `abreviacao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`id`, `nome`, `abreviacao`) VALUES
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
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `setor_id` int(10) UNSIGNED NOT NULL,
  `portaria` varchar(45) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `acesso` int(11) DEFAULT NULL,
  `cadastro` date DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `setor_id`, `portaria`, `cargo`, `nome`, `usuario`, `email`, `senha`, `acesso`, `cadastro`, `imagem`, `status`) VALUES
(1, 10, '1.137/20', 'Coordenador', 'Joab T. Alencar', 'joab.alencar', 'joabtorres1508@gmail.com', '47cafbff7d1c4463bbe7ba972a2b56e3', 10, '2020-08-06', 'uploads/usuarios/387eb1c83175517f64b6ccd6bc6a8567.jpg', 1),
(5, 10, '001/20', 'Acesso de Protocolo', 'Jose Felicio Alencar', 'jose.alencar', 'jose.felicio@hotmail.com', '47cafbff7d1c4463bbe7ba972a2b56e3', 1, '2020-08-10', 'uploads/usuarios/335339072c739ff29a83fc011a8862aa.jpg', 1),
(6, 4, '1.888/2019', 'Coordenador', 'Gabriel Holanda Pereira de Medeiros', 'gabriel.medeiros', 'hpm.gabriel@gmail.com', 'e29e20a474d9dcf311dd5d124789f725', 1, '2020-08-17', 'uploads/usuarios/user.png', 1),
(7, 4, '553-3/2', 'Agente Administrativo', 'Ruth Jemima de O. Lessa', 'ruth.lessa', 'ruthleessa@gmail.com', '471175fe89dddb82feaf65eddbd46f13', 1, '2020-08-17', 'uploads/usuarios/user.png', 1),
(8, 4, '1.444/19', 'Auxiliar de Coordenadoria de Fiscalização', 'Katsumi José Dourado Watanabe', 'katsumi.watanabe', 'katwatanabe@hotmail.com', '42c7bed7d11c52e93705545df7b28d24', 1, '2020-08-17', 'uploads/usuarios/user.png', 1),
(9, 4, '', 'Estagiário de Fiscalização', 'Weslley Vinicius Victor Moura', 'weslley.vinicius', 'weslley.m000@gmail.com', '5facbbff6930c54a5df641c134a2f16c', 1, '2020-08-17', 'uploads/usuarios/user.png', 1),
(10, 4, '1.300/20', 'Engenharia Sanitarista', 'Rafaele Freitas de Oliveira', 'rafaele.freitas', 'rafa.frei.oli@gmail.com', 'ef85eeb588075939963e9a33624f6a9a', 1, '2020-08-17', 'uploads/usuarios/user.png', 1),
(11, 4, '1.301/20', 'Médico veterinário', 'Ludimyla Passos Silva', 'ludimyla.passos', 'ludimylapassos1@hotmail.com', '15fbadf5ee07ab5746c1e8bef2b0134d', 1, '2020-08-17', 'uploads/usuarios/user.png', 1),
(12, 4, '1.758/19', 'Auxiliar da Coordenadoria de Fiscalização', 'Mateus Souza Morais', 'mateus.morais', 'mateussmorais8@gmail.com', 'f62eec8642d0d8e1247d6f275eeae0c8', 1, '2020-08-21', 'uploads/usuarios/user.png', 1),
(13, 1, '2.181/18', 'Coordenador', 'Thiago dos Santos Souza', 'thiago.souza', 'thiago.semmacastanhal@gmail.com', 'ea2d7e8d8c6447f06c8fe1c9e28db794', 1, '2020-08-25', 'uploads/usuarios/user.png', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `bairro`
--
ALTER TABLE `bairro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bairro_cidade1` (`cidade_id`);

--
-- Índices para tabela `cca_chamado`
--
ALTER TABLE `cca_chamado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chamado_setor` (`setor_id`),
  ADD KEY `fk_chamado_usuario1` (`usuario_id`),
  ADD KEY `fk_chamado_chamado_status1` (`status_id`);

--
-- Índices para tabela `cca_chamado_historico`
--
ALTER TABLE `cca_chamado_historico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chamado_historico_chamado1` (`chamado_id`),
  ADD KEY `fk_chamado_historico_chamado_status1` (`status_id`),
  ADD KEY `fk_chamado_historico_usuario1` (`usuario_id`);

--
-- Índices para tabela `cca_chamado_status`
--
ALTER TABLE `cca_chamado_status`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cofisc_anexo_denuncia`
--
ALTER TABLE `cofisc_anexo_denuncia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cofisc_anexo_denuncia_cofisc_denuncia1` (`denuncia_id`);

--
-- Índices para tabela `cofisc_anexo_solicitacao`
--
ALTER TABLE `cofisc_anexo_solicitacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cofisc_anexo_solicitacao_cofisc_solicitacao1` (`solicitacao_id`);

--
-- Índices para tabela `cofisc_denuncia`
--
ALTER TABLE `cofisc_denuncia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cofisc_denuncia_cofisc_tipo_denuncia1` (`tipo_denuncia_id`),
  ADD KEY `fk_cofisc_denuncia_cidade1` (`cidade_id`),
  ADD KEY `fk_cofisc_denuncia_bairro1` (`bairro_id`),
  ADD KEY `fk_cofisc_denuncia_cofisc_protocolo1` (`protocolo_id`);

--
-- Índices para tabela `cofisc_historico_denuncia`
--
ALTER TABLE `cofisc_historico_denuncia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cofisc_historico_usuario1` (`usuario_id`),
  ADD KEY `fk_cofisc_historico_cofisc_denuncia1` (`denuncia_id`);

--
-- Índices para tabela `cofisc_historico_solicitacao`
--
ALTER TABLE `cofisc_historico_solicitacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cofisc_historico_solicitacao_cofisc_solicitacao1` (`solicitacao_id`),
  ADD KEY `fk_cofisc_historico_solicitacao_usuario1` (`usuario_id`);

--
-- Índices para tabela `cofisc_origem`
--
ALTER TABLE `cofisc_origem`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cofisc_protocolo`
--
ALTER TABLE `cofisc_protocolo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_table1_cofisc_protocolo1` (`protocolo_id`),
  ADD KEY `fk_table1_cofisc_tipo_documento1` (`tipo_documento_id`),
  ADD KEY `fk_table1_origem1` (`origem_id`);

--
-- Índices para tabela `cofisc_solicitacao`
--
ALTER TABLE `cofisc_solicitacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cofisc_solicitacao_cofisc_tipo_solicitação1` (`tipo_solicitacao_id`),
  ADD KEY `fk_cofisc_solicitacao_cofisc_protocolo1` (`protocolo_id`),
  ADD KEY `fk_cofisc_solicitacao_bairro1` (`bairro_id`),
  ADD KEY `fk_cofisc_solicitacao_cidade1` (`cidade_id`);

--
-- Índices para tabela `cofisc_tipo_denuncia`
--
ALTER TABLE `cofisc_tipo_denuncia`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cofisc_tipo_documento`
--
ALTER TABLE `cofisc_tipo_documento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cofisc_tipo_documento_cofisc_protocolo1` (`protocolo_id`);

--
-- Índices para tabela `cofisc_tipo_protocolo`
--
ALTER TABLE `cofisc_tipo_protocolo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cofisc_tipo_solicitacao`
--
ALTER TABLE `cofisc_tipo_solicitacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_usuario_setor1` (`setor_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bairro`
--
ALTER TABLE `bairro`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `cca_chamado`
--
ALTER TABLE `cca_chamado`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cca_chamado_historico`
--
ALTER TABLE `cca_chamado_historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `cca_chamado_status`
--
ALTER TABLE `cca_chamado_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cofisc_anexo_denuncia`
--
ALTER TABLE `cofisc_anexo_denuncia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cofisc_anexo_solicitacao`
--
ALTER TABLE `cofisc_anexo_solicitacao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cofisc_denuncia`
--
ALTER TABLE `cofisc_denuncia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cofisc_historico_denuncia`
--
ALTER TABLE `cofisc_historico_denuncia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cofisc_historico_solicitacao`
--
ALTER TABLE `cofisc_historico_solicitacao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cofisc_origem`
--
ALTER TABLE `cofisc_origem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `cofisc_protocolo`
--
ALTER TABLE `cofisc_protocolo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cofisc_solicitacao`
--
ALTER TABLE `cofisc_solicitacao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cofisc_tipo_denuncia`
--
ALTER TABLE `cofisc_tipo_denuncia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `cofisc_tipo_documento`
--
ALTER TABLE `cofisc_tipo_documento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `cofisc_tipo_protocolo`
--
ALTER TABLE `cofisc_tipo_protocolo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `bairro`
--
ALTER TABLE `bairro`
  ADD CONSTRAINT `fk_bairro_cidade1` FOREIGN KEY (`cidade_id`) REFERENCES `cidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cca_chamado`
--
ALTER TABLE `cca_chamado`
  ADD CONSTRAINT `fk_chamado_chamado_status1` FOREIGN KEY (`status_id`) REFERENCES `cca_chamado_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamado_setor` FOREIGN KEY (`setor_id`) REFERENCES `setor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamado_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cca_chamado_historico`
--
ALTER TABLE `cca_chamado_historico`
  ADD CONSTRAINT `fk_chamado_historico_chamado1` FOREIGN KEY (`chamado_id`) REFERENCES `cca_chamado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamado_historico_chamado_status1` FOREIGN KEY (`status_id`) REFERENCES `cca_chamado_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamado_historico_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cofisc_anexo_denuncia`
--
ALTER TABLE `cofisc_anexo_denuncia`
  ADD CONSTRAINT `fk_cofisc_anexo_denuncia_cofisc_denuncia1` FOREIGN KEY (`denuncia_id`) REFERENCES `cofisc_denuncia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cofisc_anexo_solicitacao`
--
ALTER TABLE `cofisc_anexo_solicitacao`
  ADD CONSTRAINT `fk_cofisc_anexo_solicitacao_cofisc_solicitacao1` FOREIGN KEY (`solicitacao_id`) REFERENCES `cofisc_solicitacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cofisc_denuncia`
--
ALTER TABLE `cofisc_denuncia`
  ADD CONSTRAINT `fk_cofisc_denuncia_bairro1` FOREIGN KEY (`bairro_id`) REFERENCES `bairro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cofisc_denuncia_cidade1` FOREIGN KEY (`cidade_id`) REFERENCES `cidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cofisc_denuncia_cofisc_protocolo1` FOREIGN KEY (`protocolo_id`) REFERENCES `cofisc_protocolo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cofisc_denuncia_cofisc_tipo_denuncia1` FOREIGN KEY (`tipo_denuncia_id`) REFERENCES `cofisc_tipo_denuncia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cofisc_historico_denuncia`
--
ALTER TABLE `cofisc_historico_denuncia`
  ADD CONSTRAINT `fk_cofisc_historico_cofisc_denuncia1` FOREIGN KEY (`denuncia_id`) REFERENCES `cofisc_denuncia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cofisc_historico_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cofisc_historico_solicitacao`
--
ALTER TABLE `cofisc_historico_solicitacao`
  ADD CONSTRAINT `fk_cofisc_historico_solicitacao_cofisc_solicitacao1` FOREIGN KEY (`solicitacao_id`) REFERENCES `cofisc_solicitacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cofisc_historico_solicitacao_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cofisc_protocolo`
--
ALTER TABLE `cofisc_protocolo`
  ADD CONSTRAINT `fk_table1_cofisc_protocolo1` FOREIGN KEY (`protocolo_id`) REFERENCES `cofisc_tipo_protocolo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table1_cofisc_tipo_documento1` FOREIGN KEY (`tipo_documento_id`) REFERENCES `cofisc_tipo_documento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table1_origem1` FOREIGN KEY (`origem_id`) REFERENCES `cofisc_origem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cofisc_solicitacao`
--
ALTER TABLE `cofisc_solicitacao`
  ADD CONSTRAINT `fk_cofisc_solicitacao_bairro1` FOREIGN KEY (`bairro_id`) REFERENCES `bairro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cofisc_solicitacao_cidade1` FOREIGN KEY (`cidade_id`) REFERENCES `cidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cofisc_solicitacao_cofisc_protocolo1` FOREIGN KEY (`protocolo_id`) REFERENCES `cofisc_protocolo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cofisc_solicitacao_cofisc_tipo_solicitação1` FOREIGN KEY (`tipo_solicitacao_id`) REFERENCES `cofisc_tipo_solicitacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cofisc_tipo_documento`
--
ALTER TABLE `cofisc_tipo_documento`
  ADD CONSTRAINT `fk_cofisc_tipo_documento_cofisc_protocolo1` FOREIGN KEY (`protocolo_id`) REFERENCES `cofisc_tipo_protocolo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_setor1` FOREIGN KEY (`setor_id`) REFERENCES `setor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
