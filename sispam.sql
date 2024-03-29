-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Out-2021 às 20:06
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sispam`
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
(1, 'Secretaria Municipal de Meio Ambiente - Castanhal/PA', 'SEMMA', 'R. Quincas Nascimento - Saudade I, Castanhal - PA', ' 68741-040', '05.121.991/0001-84', '(91) 3711-5959', 'semma@castanhal.pa.gov.br', 'semma@castanhal.pa.gov.br', 'uploads/empresa/8822d5d6339a368bfe91ed698b960fcc.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fisc_anexo_denuncia`
--

CREATE TABLE `fisc_anexo_denuncia` (
  `id` int(10) UNSIGNED NOT NULL,
  `denuncia_id` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `anexo` varchar(255) DEFAULT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fisc_anexo_solicitacao`
--

CREATE TABLE `fisc_anexo_solicitacao` (
  `id` int(10) UNSIGNED NOT NULL,
  `solicitacao_id` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `anexo` varchar(255) DEFAULT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fisc_denuncia`
--

CREATE TABLE `fisc_denuncia` (
  `id` int(10) UNSIGNED NOT NULL,
  `protocolo_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `tipo_denuncia_id` int(10) UNSIGNED NOT NULL,
  `infracao_id` int(10) UNSIGNED NOT NULL,
  `classificacao_id` int(10) UNSIGNED NOT NULL,
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
-- Extraindo dados da tabela `fisc_denuncia`
--

INSERT INTO `fisc_denuncia` (`id`, `protocolo_id`, `usuario_id`, `status`, `tipo_denuncia_id`, `infracao_id`, `classificacao_id`, `denunciado`, `descricao`, `cidade_id`, `bairro_id`, `endereco`, `latitude`, `longitude`, `denunciante`, `telefone`, `email`) VALUES
(10, 14, 12, 1, 1, 1, 1, '12321321', '', 1, 1, '', '-1.2956441141866817', '-47.94965035501709', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fisc_historico_denuncia`
--

CREATE TABLE `fisc_historico_denuncia` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` date DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `denuncia_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fisc_historico_denuncia`
--

INSERT INTO `fisc_historico_denuncia` (`id`, `data`, `descricao`, `usuario_id`, `denuncia_id`) VALUES
(18, '2021-10-01', 'Foi realizado o cadastro da denúncia no banco de dados', 1, 10),
(19, '2021-10-04', 'Alteração realizada com sucesso!', 1, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fisc_historico_solicitacao`
--

CREATE TABLE `fisc_historico_solicitacao` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` datetime DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `solicitacao_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fisc_historico_solicitacao`
--

INSERT INTO `fisc_historico_solicitacao` (`id`, `data`, `descricao`, `usuario_id`, `solicitacao_id`) VALUES
(3, '2021-09-28 09:59:00', 'Alteração realizada com sucesso!', 1, 1),
(4, '2021-09-28 09:59:00', 'Alteração realizada com sucesso!', 1, 1),
(5, '2021-09-28 10:00:00', 'Alteração realizada com sucesso!', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fisc_origem`
--

CREATE TABLE `fisc_origem` (
  `id` int(10) UNSIGNED NOT NULL,
  `origem` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fisc_origem`
--

INSERT INTO `fisc_origem` (`id`, `origem`) VALUES
(1, 'Denúncia Externa'),
(2, 'Denuncia Interna'),
(3, 'Poder Executivo'),
(4, 'Poder Judiciário'),
(5, 'Poder Legislativo'),
(6, 'Interna'),
(7, 'Externa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fisc_protocolo`
--

CREATE TABLE `fisc_protocolo` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `tramitacao` int(11) NOT NULL,
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
  `id_solicitante` int(3) UNSIGNED NOT NULL,
  `prazo` varchar(255) NOT NULL,
  `hash` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fisc_protocolo`
--

INSERT INTO `fisc_protocolo` (`id`, `tipo`, `tramitacao`, `data_protocolo`, `protocolo_id`, `tipo_documento_id`, `origem_id`, `numero_protocolo`, `ano_protocolo`, `numero_oficio`, `ano_oficio`, `numero_memorando`, `ano_memorando`, `id_solicitante`, `prazo`, `hash`) VALUES
(13, 'solicitacao', 0, '2021-09-15', 2, 6, 2, 'asdasd', 'asdsadsa', '', '', '', '', 3, '', '1f45c68fb04908d5b13197cbc38cafe6'),
(14, 'denuncia', 0, '2021-10-14', 1, 2, 3, '1231', '1232', '', '', '', '', 3, '', '33e5033cdb43cd9e11a8edafaf72eaec');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fisc_solicitacao`
--

CREATE TABLE `fisc_solicitacao` (
  `id` int(10) UNSIGNED NOT NULL,
  `protocolo_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
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

--
-- Extraindo dados da tabela `fisc_solicitacao`
--

INSERT INTO `fisc_solicitacao` (`id`, `protocolo_id`, `usuario_id`, `status`, `tipo_solicitacao_id`, `solicitante`, `telefone`, `email`, `descricao`, `endereco`, `cidade_id`, `bairro_id`, `latitude`, `longitude`) VALUES
(1, 13, 12, 1, 3, '1231', '', '', '', '', 1, 15, '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fisc_solicitante`
--

CREATE TABLE `fisc_solicitante` (
  `id` int(10) UNSIGNED NOT NULL,
  `solicitante` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fisc_solicitante`
--

INSERT INTO `fisc_solicitante` (`id`, `solicitante`) VALUES
(1, 'Prefeitura Municipal de Castanhal'),
(2, 'Ministério Público do Estado do Pará'),
(3, 'Externo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fisc_tipo_classificao`
--

CREATE TABLE `fisc_tipo_classificao` (
  `id` int(10) UNSIGNED NOT NULL,
  `infracao_id` int(10) UNSIGNED NOT NULL,
  `classificacao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fisc_tipo_classificao`
--

INSERT INTO `fisc_tipo_classificao` (`id`, `infracao_id`, `classificacao`) VALUES
(1, 1, 'Animais Domésticos'),
(2, 1, 'Animais Sinantrópicos'),
(3, 1, 'Animais Silvestres'),
(4, 7, 'Em Área de APP'),
(5, 7, 'Em Terreno Particular'),
(6, 7, 'Em Terreno Próprio'),
(7, 7, 'Em Terreno Público'),
(8, 9, 'Em Área de APP'),
(9, 9, 'Em Terreno Particular'),
(10, 9, 'Em Terreno Próprio'),
(11, 9, 'Em Via Pública'),
(12, 12, 'Em Corpo Hídrico'),
(13, 12, 'De Origem Domésticos'),
(14, 12, 'De Origem Industriais'),
(15, 12, 'Em Via Pública'),
(16, 13, 'Em Via Pública'),
(17, 13, 'Em Terreno Particular');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fisc_tipo_denuncia`
--

CREATE TABLE `fisc_tipo_denuncia` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_denuncia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fisc_tipo_denuncia`
--

INSERT INTO `fisc_tipo_denuncia` (`id`, `tipo_denuncia`) VALUES
(1, 'Fauna'),
(2, 'Flora'),
(3, 'Degradação / Poluição'),
(4, 'Efluentes'),
(5, 'Resíduos Sólidos'),
(6, 'Poluição Sonora'),
(7, 'Poluição Atmosférica'),
(8, 'Administrativa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fisc_tipo_documento`
--

CREATE TABLE `fisc_tipo_documento` (
  `id` int(10) UNSIGNED NOT NULL,
  `documento` varchar(100) DEFAULT NULL,
  `protocolo_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fisc_tipo_documento`
--

INSERT INTO `fisc_tipo_documento` (`id`, `documento`, `protocolo_id`) VALUES
(1, 'E-mail', 1),
(2, 'Formulário de Denúncia', 1),
(3, 'Memorando', 1),
(4, 'Ofício', 1),
(5, 'Outros', 1),
(6, 'Processo Administrativo Punitivo', 2),
(7, 'Requerimento', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fisc_tipo_infracao`
--

CREATE TABLE `fisc_tipo_infracao` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_denuncia_id` int(10) UNSIGNED NOT NULL,
  `infracao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fisc_tipo_infracao`
--

INSERT INTO `fisc_tipo_infracao` (`id`, `tipo_denuncia_id`, `infracao`) VALUES
(1, 1, 'Maus Tratos Contra Animais'),
(2, 1, 'Tráfico de Animais '),
(3, 1, 'Caça'),
(4, 1, 'Animal em Cativeiro sem Registro'),
(5, 1, 'Pesca Ilegal'),
(6, 1, 'Outros'),
(7, 2, 'Desmatamento'),
(8, 2, 'Queima Ilegal de Vegetação'),
(9, 2, 'Supressão Vegetal sem Autorização de Orgão Ambiental'),
(10, 3, 'Construção em Área de Preservação Permanente (APP)'),
(11, 3, 'Extração de Mineral Sem Autorização de Orgão Ambiental'),
(12, 4, 'Lançamentos Irregular de Efluentes'),
(13, 5, 'Descarte Irregular'),
(14, 6, 'Fonte: Estabelecimentos Comerciais '),
(15, 6, 'Fonte: Residências'),
(16, 6, 'Fonte: Bar'),
(17, 6, 'Fonte: Casa de Show'),
(18, 6, 'Fonte: Carro Som'),
(19, 6, 'Fonte: Construção '),
(20, 7, 'Fonte: Residências'),
(21, 7, 'Fonte: Estabelecimentos Comerciais '),
(22, 7, 'Fonte: Estabelecimentos Industriais'),
(23, 7, 'Fonte: Queima de Resíduos Domésticos'),
(24, 7, 'Fonte: Emissão de Fumaça'),
(25, 8, 'Cumprimento de Condicionantes Intepestivo'),
(26, 8, 'Indeferimento de Processo de Licenciamento'),
(27, 8, 'Funcionamento de Empreendimento sem Licença Ambiental');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fisc_tipo_protocolo`
--

CREATE TABLE `fisc_tipo_protocolo` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_protocolo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fisc_tipo_protocolo`
--

INSERT INTO `fisc_tipo_protocolo` (`id`, `tipo_protocolo`) VALUES
(1, 'Documento'),
(2, 'Processo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fisc_tipo_solicitacao`
--

CREATE TABLE `fisc_tipo_solicitacao` (
  `id` int(11) NOT NULL,
  `tipo_solicitacao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fisc_tipo_solicitacao`
--

INSERT INTO `fisc_tipo_solicitacao` (`id`, `tipo_solicitacao`) VALUES
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
-- Estrutura da tabela `fisc_vistoria_denuncia`
--

CREATE TABLE `fisc_vistoria_denuncia` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` date DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `instrumento` text NOT NULL,
  `denuncia_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fisc_vistoria_solicitacao`
--

CREATE TABLE `fisc_vistoria_solicitacao` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` date DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `instrumento` text NOT NULL,
  `solicitacao_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `protocolo`
--

CREATE TABLE `protocolo` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_id` int(10) UNSIGNED NOT NULL,
  `objetivo_id` int(10) UNSIGNED NOT NULL,
  `numero_protocolo` varchar(45) NOT NULL,
  `data` date DEFAULT NULL,
  `interessado` varchar(255) DEFAULT NULL,
  `processo` int(11) DEFAULT NULL,
  `contato` varchar(255) DEFAULT NULL,
  `protocolista_id` int(10) UNSIGNED NOT NULL,
  `numero_folhas` varchar(45) DEFAULT NULL,
  `assunto` text DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `cidade` int(11) DEFAULT NULL,
  `bairro` int(11) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `latitude` varchar(45) DEFAULT NULL,
  `longitude` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `protocolo`
--

INSERT INTO `protocolo` (`id`, `tipo_id`, `objetivo_id`, `numero_protocolo`, `data`, `interessado`, `processo`, `contato`, `protocolista_id`, `numero_folhas`, `assunto`, `descricao`, `cidade`, `bairro`, `endereco`, `numero`, `latitude`, `longitude`) VALUES
(2, 2, 24, '00210/2021', '2021-09-28', 'ppf com. serv. eireli', 0, '', 16, '47', 'licença de operação -lo', '', 0, 0, '', '', '', ''),
(3, 1, 4, '01346/2021', '2021-10-04', 'sdfghjmm', 0, '', 16, '44', 'xfgxc nb hgh', '', 0, 0, '', '', '', ''),
(4, 1, 4, '1344/2021', '2021-10-04', 'coordenadoria de fiscalização', 0, '', 16, '2', 'denuncia referente a caça irregular', '', 0, 0, '', '', '', ''),
(5, 1, 10, '1345/2021', '2021-10-04', 'coordenadoria de licenciamento', 0, '', 16, '4', 'juntada de processo ,copia da publicação no jornal', '', 0, 0, '', '', '', ''),
(6, 1, 10, '1346/2021', '2021-10-04', 'FAZENDA CASTANHA', 0, '', 16, '11', 'DOCUMENTOS PARA ANEXAR AO PROCESSO EM RESPOSTA AO TERMO DE NOTIFICAÇÃO Nº 00104/2021\r\n', '', 0, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `protocolo_anexo`
--

CREATE TABLE `protocolo_anexo` (
  `id` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `anexo` varchar(255) DEFAULT NULL,
  `protocolo_id` int(10) UNSIGNED NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `protocolo_historico`
--

CREATE TABLE `protocolo_historico` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` date DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `protocolo_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `protocolo_historico`
--

INSERT INTO `protocolo_historico` (`id`, `data`, `descricao`, `usuario_id`, `protocolo_id`) VALUES
(48, '2021-09-28', 'Realizado o cadastro deste protocolo no banco de dados', 16, 2),
(50, '2021-10-04', 'Realizado o cadastro deste protocolo no banco de dados', 16, 3),
(51, '2021-10-04', 'Realizado o cadastro deste protocolo no banco de dados', 16, 4),
(52, '2021-10-04', 'Realizado o cadastro deste protocolo no banco de dados', 16, 5),
(53, '2021-10-04', 'Realizado o cadastro deste protocolo no banco de dados', 16, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `protocolo_objetivo`
--

CREATE TABLE `protocolo_objetivo` (
  `id` int(10) UNSIGNED NOT NULL,
  `objetivo` varchar(100) DEFAULT NULL,
  `tipo_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `protocolo_objetivo`
--

INSERT INTO `protocolo_objetivo` (`id`, `objetivo`, `tipo_id`) VALUES
(1, 'Carta Consulta', 1),
(2, 'Comunicado', 1),
(3, 'Convite', 1),
(4, 'Denuncia', 1),
(5, 'Devolução', 1),
(6, 'Documento', 1),
(7, 'Encaminhamento', 1),
(8, 'Informação', 1),
(9, 'Informativo', 1),
(10, 'Juntada de Documento', 1),
(11, 'Memorando', 1),
(12, 'Ofício', 1),
(13, 'Ofício Circular', 1),
(14, 'Recurso Auto de Infração', 1),
(15, 'Recurso Penalidade Imposta', 1),
(16, 'Requerimento', 1),
(17, 'Reunião', 1),
(18, 'Solicitação', 1),
(19, 'Autorização de Supressão Vegetal - ASV', 2),
(20, 'Evento Temporário', 2),
(21, 'Licença Ambiental Rural - LAR', 2),
(22, 'Licença de Instalação - LI', 2),
(23, 'Licença de Instalação E Licença De Operação - LIO', 2),
(24, 'Licença de Operação - LO', 2),
(25, 'Licença de Prévia e Licença de Instalação - LP/LI', 2),
(26, 'Licença Prévia - LP', 2),
(27, 'Processo Administrativo Punitivo - PAP', 2),
(28, 'Renovação De Licença De Operação - RLO', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `protocolo_tipo`
--

CREATE TABLE `protocolo_tipo` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `protocolo_tipo`
--

INSERT INTO `protocolo_tipo` (`id`, `tipo`) VALUES
(1, 'Documento'),
(2, 'Processo');

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
(1, 'Coordenadoria de Proteção dos Recursos Naturais e Educação\r\nAmbiental', 'CPRN'),
(2, 'Coordenadoria de Gestão Administrativa e Financeira', 'COAF'),
(3, 'Coordenadoria de Licenciamento Ambiental', 'CLA'),
(4, 'Coordenadoria de Fiscalização Ambiental', 'COFISC'),
(5, 'Assessoria Jurídica', 'ASJUR'),
(6, 'Arquivos da Secretária', 'ARQUIVO'),
(7, 'Protocolo da Secretária', 'PROTOCOLO'),
(8, 'Assessoria Técnica e de Estudos legislativos', 'ASTEC'),
(9, 'Secretário de Meio Ambiente', 'GABINETE'),
(10, 'Assessoria de Tecnologia da Informação e de Geotecnologia', 'ASTIGEO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ti_chamado`
--

CREATE TABLE `ti_chamado` (
  `id` int(10) UNSIGNED NOT NULL,
  `setor_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `assunto_id` int(10) UNSIGNED NOT NULL,
  `data` datetime DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `anexo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ti_chamado_assunto`
--

CREATE TABLE `ti_chamado_assunto` (
  `id` int(10) UNSIGNED NOT NULL,
  `assunto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ti_chamado_assunto`
--

INSERT INTO `ti_chamado_assunto` (`id`, `assunto`) VALUES
(9, 'Instalação, atualização ou remoção da impressora'),
(10, 'Instalação, atualização ou remoção de computador'),
(11, 'Permissão ou restrinção de acesso a arquivos'),
(12, 'Criação, alteração ou desativação de usuário'),
(13, 'Recuperação de arquivo'),
(14, 'Recarga de tinta ou tone da impressora'),
(15, 'Backup de arquivos'),
(16, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ti_chamado_historico`
--

CREATE TABLE `ti_chamado_historico` (
  `id` int(11) NOT NULL,
  `chamado_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `data` datetime DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `anexo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ti_chamado_status`
--

CREATE TABLE `ti_chamado_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ti_chamado_status`
--

INSERT INTO `ti_chamado_status` (`id`, `nome`) VALUES
(1, 'Aguardando o Suporte'),
(2, 'Em Andamento'),
(3, 'Cancelado'),
(4, 'Finalizado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tramitacao`
--

CREATE TABLE `tramitacao` (
  `id` int(10) UNSIGNED NOT NULL,
  `protocolo_id` int(10) UNSIGNED NOT NULL,
  `setor_remetente_id` int(10) UNSIGNED NOT NULL,
  `usuario_remetente_id` int(10) UNSIGNED NOT NULL,
  `setor_destinatario_id` int(10) UNSIGNED NOT NULL,
  `usuario_destinatario_id` int(10) UNSIGNED NOT NULL,
  `data` date DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `anexo` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tramitacao`
--

INSERT INTO `tramitacao` (`id`, `protocolo_id`, `setor_remetente_id`, `usuario_remetente_id`, `setor_destinatario_id`, `usuario_destinatario_id`, `data`, `descricao`, `anexo`, `status`) VALUES
(11, 2, 7, 16, 10, 1, '2021-09-28', '', '', NULL),
(14, 2, 10, 1, 4, 12, '2021-09-28', 'dffg\\\\dfgdf', '', NULL);

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
  `data_cadastro` date DEFAULT NULL,
  `data_finalizacao` date DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `setor_id`, `portaria`, `cargo`, `nome`, `usuario`, `email`, `senha`, `acesso`, `data_cadastro`, `data_finalizacao`, `observacao`, `imagem`, `status`) VALUES
(1, 10, '1.137/20', 'Assessor', 'Joab T. Alencar', 'joab.alencar', 'joabtorres1508@gmail.com', '47cafbff7d1c4463bbe7ba972a2b56e3', 10, '2020-08-06', NULL, '', 'uploads/usuarios/387eb1c83175517f64b6ccd6bc6a8567.jpg', 1),
(12, 4, '225454', 'Auxiliar de Coordenador', 'JOAB TORRES COFISC', 'joab.cofisc', 'joab.alencar@gmail.com', '47cafbff7d1c4463bbe7ba972a2b56e3', 1, '2021-01-17', NULL, '', 'uploads/usuarios/user.png', 1),
(13, 7, '225454', 'Administrativo', 'JOAB PROTOCOLO', 'joab.protocolo', 'joab.torres1508@gmail.com', '6116afedcb0bc31083935c1c262ff4c9', 1, '2021-01-17', NULL, '', 'uploads/usuarios/user.png', 1),
(14, 4, '', 'Assessor Técnico', 'DAVI SILVA COSTALAT', 'davi.costalat', 'dsc@ufpa.br', '1e3be126a341be788765c0acfde946bc', 1, '2021-09-28', NULL, '', 'uploads/usuarios/user.png', 1),
(15, 10, '', 'Agente Administrativo', 'Wilken Kimy Oliveira Alves', 'wilken.kimy', 'wilkenkimyalves@gmail.com', '1e3be126a341be788765c0acfde946bc', 10, '2021-09-28', NULL, '', 'uploads/usuarios/user.png', 1),
(16, 7, '', 'Agente Administrativo', 'Elane Danile Monteiro dos Santos', 'elane.daniele', 'danisantos30360@gmail.com', '1e3be126a341be788765c0acfde946bc', 1, '2021-09-28', NULL, '', 'uploads/usuarios/user.png', 1),
(17, 3, '', 'zelador', 'RUYDERLAN DA CRUZ PANTOJA', 'pantoja', 'ruyderlan2@gmail.com', 'c243341b5a6c0e3a82fa10a3d7c77f19', 1, '2021-09-28', NULL, '', 'uploads/usuarios/user.png', 1),
(18, 1, '', 'Agente Administrativa', 'LUISA PAIXAO DOS SANTOS', 'luisa.santos', 'luisadossantos5636@gmail.com', '547d2cfa9bccac842790ad7d9d7bd17d', 1, '2021-09-28', NULL, '', 'uploads/usuarios/user.png', 1),
(19, 8, '1.890/2021', 'Assessor', 'Gabriel Holanda Pereira de Medeiros', 'gabriel.medeiros', 'hpm.gabriel@gmail.com', '1e3be126a341be788765c0acfde946bc', 1, '2021-09-15', '2021-09-29', '', 'uploads/usuarios/user.png', 1);

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
-- Índices para tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fisc_anexo_denuncia`
--
ALTER TABLE `fisc_anexo_denuncia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fisc_anexo_denuncia_fisc_denuncia1` (`denuncia_id`);

--
-- Índices para tabela `fisc_anexo_solicitacao`
--
ALTER TABLE `fisc_anexo_solicitacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fisc_anexo_solicitacao_fisc_solicitacao1` (`solicitacao_id`);

--
-- Índices para tabela `fisc_denuncia`
--
ALTER TABLE `fisc_denuncia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fisc_denuncia_fisc_tipo_denuncia1` (`tipo_denuncia_id`),
  ADD KEY `fk_fisc_denuncia_cidade1` (`cidade_id`),
  ADD KEY `fk_fisc_denuncia_bairro1` (`bairro_id`),
  ADD KEY `fk_fisc_denuncia_fisc_protocolo1` (`protocolo_id`),
  ADD KEY `fk_fisc_denuncia_usuario1` (`usuario_id`),
  ADD KEY `infracao_id` (`infracao_id`);

--
-- Índices para tabela `fisc_historico_denuncia`
--
ALTER TABLE `fisc_historico_denuncia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fisc_historico_usuario1` (`usuario_id`),
  ADD KEY `fk_fisc_historico_fisc_denuncia1` (`denuncia_id`);

--
-- Índices para tabela `fisc_historico_solicitacao`
--
ALTER TABLE `fisc_historico_solicitacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fisc_historico_solicitacao_fisc_solicitacao1` (`solicitacao_id`),
  ADD KEY `fk_fisc_historico_solicitacao_usuario1` (`usuario_id`);

--
-- Índices para tabela `fisc_origem`
--
ALTER TABLE `fisc_origem`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fisc_protocolo`
--
ALTER TABLE `fisc_protocolo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_table1_fisc_tipo_documento1` (`tipo_documento_id`),
  ADD KEY `fk_table1_origem1` (`origem_id`),
  ADD KEY `fk_table1_fisc_protocolo1` (`protocolo_id`) USING BTREE,
  ADD KEY `fk_table_solicitante` (`id_solicitante`);

--
-- Índices para tabela `fisc_solicitacao`
--
ALTER TABLE `fisc_solicitacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fisc_solicitacao_fisc_tipo_solicitação1` (`tipo_solicitacao_id`),
  ADD KEY `fk_fisc_solicitacao_fisc_protocolo1` (`protocolo_id`),
  ADD KEY `fk_fisc_solicitacao_bairro1` (`bairro_id`),
  ADD KEY `fk_fisc_solicitacao_cidade1` (`cidade_id`),
  ADD KEY `fk_fisc_solicitacao_usuario1` (`usuario_id`);

--
-- Índices para tabela `fisc_solicitante`
--
ALTER TABLE `fisc_solicitante`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fisc_tipo_classificao`
--
ALTER TABLE `fisc_tipo_classificao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infracao_id` (`infracao_id`);

--
-- Índices para tabela `fisc_tipo_denuncia`
--
ALTER TABLE `fisc_tipo_denuncia`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fisc_tipo_documento`
--
ALTER TABLE `fisc_tipo_documento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fisc_tipo_documento_fisc_protocolo1` (`protocolo_id`);

--
-- Índices para tabela `fisc_tipo_infracao`
--
ALTER TABLE `fisc_tipo_infracao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_denuncia_id` (`tipo_denuncia_id`);

--
-- Índices para tabela `fisc_tipo_protocolo`
--
ALTER TABLE `fisc_tipo_protocolo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fisc_tipo_solicitacao`
--
ALTER TABLE `fisc_tipo_solicitacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fisc_vistoria_denuncia`
--
ALTER TABLE `fisc_vistoria_denuncia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fisc_vistoria_denuncia_fisc_denuncia1` (`denuncia_id`);

--
-- Índices para tabela `fisc_vistoria_solicitacao`
--
ALTER TABLE `fisc_vistoria_solicitacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fisc_vistoria_solicitacao_fisc_solicitacao1` (`solicitacao_id`);

--
-- Índices para tabela `protocolo`
--
ALTER TABLE `protocolo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_protocolo_processos_usuario1` (`protocolista_id`),
  ADD KEY `fk_protocolo_protocolo_tipo1` (`tipo_id`),
  ADD KEY `fk_protocolo_protocolo_objetivo1` (`objetivo_id`);

--
-- Índices para tabela `protocolo_anexo`
--
ALTER TABLE `protocolo_anexo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_protocolo_anexo_protocolo1` (`protocolo_id`);

--
-- Índices para tabela `protocolo_historico`
--
ALTER TABLE `protocolo_historico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_protocolo_historico_usuario1` (`usuario_id`),
  ADD KEY `fk_protocolo_historico_protocolo1` (`protocolo_id`);

--
-- Índices para tabela `protocolo_objetivo`
--
ALTER TABLE `protocolo_objetivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_protocolo_objetivo_protocolo_tipo1` (`tipo_id`);

--
-- Índices para tabela `protocolo_tipo`
--
ALTER TABLE `protocolo_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ti_chamado`
--
ALTER TABLE `ti_chamado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chamado_setor` (`setor_id`),
  ADD KEY `fk_chamado_usuario1` (`usuario_id`),
  ADD KEY `fk_chamado_chamado_status1` (`status_id`),
  ADD KEY `fk_ti_chamado_ti_chamado_assunto1` (`assunto_id`);

--
-- Índices para tabela `ti_chamado_assunto`
--
ALTER TABLE `ti_chamado_assunto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ti_chamado_historico`
--
ALTER TABLE `ti_chamado_historico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chamado_historico_chamado1` (`chamado_id`),
  ADD KEY `fk_chamado_historico_chamado_status1` (`status_id`),
  ADD KEY `fk_chamado_historico_usuario1` (`usuario_id`);

--
-- Índices para tabela `ti_chamado_status`
--
ALTER TABLE `ti_chamado_status`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tramitacao`
--
ALTER TABLE `tramitacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tramitacao_protocolo1` (`protocolo_id`),
  ADD KEY `fk_tramitacao_setor1` (`setor_remetente_id`),
  ADD KEY `fk_tramitacao_usuario1` (`usuario_remetente_id`),
  ADD KEY `fk_tramitacao_usuario2` (`usuario_destinatario_id`),
  ADD KEY `fk_tramitacao_setor2` (`setor_destinatario_id`);

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
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `fisc_anexo_denuncia`
--
ALTER TABLE `fisc_anexo_denuncia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `fisc_anexo_solicitacao`
--
ALTER TABLE `fisc_anexo_solicitacao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `fisc_denuncia`
--
ALTER TABLE `fisc_denuncia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `fisc_historico_denuncia`
--
ALTER TABLE `fisc_historico_denuncia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `fisc_historico_solicitacao`
--
ALTER TABLE `fisc_historico_solicitacao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `fisc_origem`
--
ALTER TABLE `fisc_origem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `fisc_protocolo`
--
ALTER TABLE `fisc_protocolo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `fisc_solicitacao`
--
ALTER TABLE `fisc_solicitacao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `fisc_solicitante`
--
ALTER TABLE `fisc_solicitante`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `fisc_tipo_classificao`
--
ALTER TABLE `fisc_tipo_classificao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `fisc_tipo_denuncia`
--
ALTER TABLE `fisc_tipo_denuncia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `fisc_tipo_documento`
--
ALTER TABLE `fisc_tipo_documento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `fisc_tipo_infracao`
--
ALTER TABLE `fisc_tipo_infracao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `fisc_tipo_protocolo`
--
ALTER TABLE `fisc_tipo_protocolo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `fisc_vistoria_denuncia`
--
ALTER TABLE `fisc_vistoria_denuncia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `fisc_vistoria_solicitacao`
--
ALTER TABLE `fisc_vistoria_solicitacao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `protocolo`
--
ALTER TABLE `protocolo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `protocolo_anexo`
--
ALTER TABLE `protocolo_anexo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `protocolo_historico`
--
ALTER TABLE `protocolo_historico`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `protocolo_objetivo`
--
ALTER TABLE `protocolo_objetivo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `protocolo_tipo`
--
ALTER TABLE `protocolo_tipo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `ti_chamado`
--
ALTER TABLE `ti_chamado`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `ti_chamado_assunto`
--
ALTER TABLE `ti_chamado_assunto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `ti_chamado_historico`
--
ALTER TABLE `ti_chamado_historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `ti_chamado_status`
--
ALTER TABLE `ti_chamado_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tramitacao`
--
ALTER TABLE `tramitacao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `bairro`
--
ALTER TABLE `bairro`
  ADD CONSTRAINT `fk_bairro_cidade1` FOREIGN KEY (`cidade_id`) REFERENCES `cidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fisc_anexo_denuncia`
--
ALTER TABLE `fisc_anexo_denuncia`
  ADD CONSTRAINT `fk_fisc_anexo_denuncia_fisc_denuncia1` FOREIGN KEY (`denuncia_id`) REFERENCES `fisc_denuncia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fisc_anexo_solicitacao`
--
ALTER TABLE `fisc_anexo_solicitacao`
  ADD CONSTRAINT `fk_fisc_anexo_solicitacao_fisc_solicitacao1` FOREIGN KEY (`solicitacao_id`) REFERENCES `fisc_solicitacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fisc_denuncia`
--
ALTER TABLE `fisc_denuncia`
  ADD CONSTRAINT `fisc_denuncia_ibfk_1` FOREIGN KEY (`infracao_id`) REFERENCES `fisc_tipo_infracao` (`id`),
  ADD CONSTRAINT `fk_fisc_denuncia_bairro1` FOREIGN KEY (`bairro_id`) REFERENCES `bairro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fisc_denuncia_cidade1` FOREIGN KEY (`cidade_id`) REFERENCES `cidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fisc_denuncia_fisc_protocolo1` FOREIGN KEY (`protocolo_id`) REFERENCES `fisc_protocolo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fisc_denuncia_fisc_tipo_denuncia1` FOREIGN KEY (`tipo_denuncia_id`) REFERENCES `fisc_tipo_denuncia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fisc_denuncia_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fisc_historico_denuncia`
--
ALTER TABLE `fisc_historico_denuncia`
  ADD CONSTRAINT `fk_fisc_historico_fisc_denuncia1` FOREIGN KEY (`denuncia_id`) REFERENCES `fisc_denuncia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fisc_historico_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fisc_historico_solicitacao`
--
ALTER TABLE `fisc_historico_solicitacao`
  ADD CONSTRAINT `fk_fisc_historico_solicitacao_fisc_solicitacao1` FOREIGN KEY (`solicitacao_id`) REFERENCES `fisc_solicitacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fisc_historico_solicitacao_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fisc_protocolo`
--
ALTER TABLE `fisc_protocolo`
  ADD CONSTRAINT `fk_table1_fisc_protocolo1` FOREIGN KEY (`protocolo_id`) REFERENCES `fisc_tipo_protocolo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table1_fisc_tipo_documento1` FOREIGN KEY (`tipo_documento_id`) REFERENCES `fisc_tipo_documento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table1_origem1` FOREIGN KEY (`origem_id`) REFERENCES `fisc_origem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table_solicitante` FOREIGN KEY (`id_solicitante`) REFERENCES `fisc_solicitante` (`id`);

--
-- Limitadores para a tabela `fisc_solicitacao`
--
ALTER TABLE `fisc_solicitacao`
  ADD CONSTRAINT `fk_fisc_solicitacao_bairro1` FOREIGN KEY (`bairro_id`) REFERENCES `bairro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fisc_solicitacao_cidade1` FOREIGN KEY (`cidade_id`) REFERENCES `cidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fisc_solicitacao_fisc_protocolo1` FOREIGN KEY (`protocolo_id`) REFERENCES `fisc_protocolo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fisc_solicitacao_fisc_tipo_solicitação1` FOREIGN KEY (`tipo_solicitacao_id`) REFERENCES `fisc_tipo_solicitacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fisc_solicitacao_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fisc_tipo_classificao`
--
ALTER TABLE `fisc_tipo_classificao`
  ADD CONSTRAINT `fisc_tipo_classificao_ibfk_1` FOREIGN KEY (`infracao_id`) REFERENCES `fisc_tipo_infracao` (`id`);

--
-- Limitadores para a tabela `fisc_tipo_documento`
--
ALTER TABLE `fisc_tipo_documento`
  ADD CONSTRAINT `fk_fisc_tipo_documento_fisc_protocolo1` FOREIGN KEY (`protocolo_id`) REFERENCES `fisc_tipo_protocolo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fisc_tipo_infracao`
--
ALTER TABLE `fisc_tipo_infracao`
  ADD CONSTRAINT `fisc_tipo_infracao_ibfk_1` FOREIGN KEY (`tipo_denuncia_id`) REFERENCES `fisc_tipo_denuncia` (`id`);

--
-- Limitadores para a tabela `fisc_vistoria_denuncia`
--
ALTER TABLE `fisc_vistoria_denuncia`
  ADD CONSTRAINT `fk_fisc_vistoria_denuncia_fisc_denuncia1` FOREIGN KEY (`denuncia_id`) REFERENCES `fisc_denuncia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fisc_vistoria_solicitacao`
--
ALTER TABLE `fisc_vistoria_solicitacao`
  ADD CONSTRAINT `fk_fisc_vistoria_solicitacao_fisc_solicitacao1` FOREIGN KEY (`solicitacao_id`) REFERENCES `fisc_solicitacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `protocolo`
--
ALTER TABLE `protocolo`
  ADD CONSTRAINT `fk_protocolo_processos_usuario1` FOREIGN KEY (`protocolista_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_protocolo_protocolo_objetivo1` FOREIGN KEY (`objetivo_id`) REFERENCES `protocolo_objetivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_protocolo_protocolo_tipo1` FOREIGN KEY (`tipo_id`) REFERENCES `protocolo_tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `protocolo_anexo`
--
ALTER TABLE `protocolo_anexo`
  ADD CONSTRAINT `fk_protocolo_anexo_protocolo1` FOREIGN KEY (`protocolo_id`) REFERENCES `protocolo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `protocolo_historico`
--
ALTER TABLE `protocolo_historico`
  ADD CONSTRAINT `fk_protocolo_historico_protocolo1` FOREIGN KEY (`protocolo_id`) REFERENCES `protocolo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_protocolo_historico_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `protocolo_objetivo`
--
ALTER TABLE `protocolo_objetivo`
  ADD CONSTRAINT `fk_protocolo_objetivo_protocolo_tipo1` FOREIGN KEY (`tipo_id`) REFERENCES `protocolo_tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ti_chamado`
--
ALTER TABLE `ti_chamado`
  ADD CONSTRAINT `fk_chamado_chamado_status1` FOREIGN KEY (`status_id`) REFERENCES `ti_chamado_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamado_setor` FOREIGN KEY (`setor_id`) REFERENCES `setor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamado_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ti_chamado_ti_chamado_assunto1` FOREIGN KEY (`assunto_id`) REFERENCES `ti_chamado_assunto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ti_chamado_historico`
--
ALTER TABLE `ti_chamado_historico`
  ADD CONSTRAINT `fk_chamado_historico_chamado1` FOREIGN KEY (`chamado_id`) REFERENCES `ti_chamado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamado_historico_chamado_status1` FOREIGN KEY (`status_id`) REFERENCES `ti_chamado_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamado_historico_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tramitacao`
--
ALTER TABLE `tramitacao`
  ADD CONSTRAINT `fk_tramitacao_protocolo1` FOREIGN KEY (`protocolo_id`) REFERENCES `protocolo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tramitacao_setor1` FOREIGN KEY (`setor_remetente_id`) REFERENCES `setor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tramitacao_setor2` FOREIGN KEY (`setor_destinatario_id`) REFERENCES `setor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tramitacao_usuario1` FOREIGN KEY (`usuario_remetente_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tramitacao_usuario2` FOREIGN KEY (`usuario_destinatario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_setor1` FOREIGN KEY (`setor_id`) REFERENCES `setor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
