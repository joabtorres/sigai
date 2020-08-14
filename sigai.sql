-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Ago-2020 às 18:51
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
-- Banco de dados: `sigai`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamado`
--

CREATE TABLE `chamado` (
  `id` int(10) UNSIGNED NOT NULL,
  `setor_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `assunto` varchar(255) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `descricao` text NOT NULL,
  `anexo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `chamado`
--

INSERT INTO `chamado` (`id`, `setor_id`, `usuario_id`, `status_id`, `assunto`, `data`, `descricao`, `anexo`) VALUES
(11, 7, 0, 1, 'asdas', '2020-08-07 13:30:00', '', ''),
(19, 10, 1, 4, 'assadas', '2020-08-13 14:16:00', 'dasdasdsadas', ''),
(20, 10, 1, 1, 'assadas', '2020-08-13 14:16:00', 'dasdasdsadas', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamado_historico`
--

CREATE TABLE `chamado_historico` (
  `id` int(11) NOT NULL,
  `chamado_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `data` datetime DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `anexo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `chamado_historico`
--

INSERT INTO `chamado_historico` (`id`, `chamado_id`, `status_id`, `usuario_id`, `data`, `descricao`, `anexo`) VALUES
(28, 19, 4, 1, '2020-08-13 14:16:57', 'aaaaaaaaaaaaaaaaaaaaa', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamado_status`
--

CREATE TABLE `chamado_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `chamado_status`
--

INSERT INTO `chamado_status` (`id`, `nome`) VALUES
(1, 'Aguardando o Suporte'),
(2, 'Em Andamento'),
(3, 'Cancelado'),
(4, 'Finalizado');

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
(1, 'Secretaria Municipal de Meio Ambiente - Castanhal/PA', 'SEMMA', 'R. Quincas Nascimento - Saudade I, Castanhal - PA', ' 68741-040', '05.121.991/0001-84', '(91) 3711-5959', 'semma@castanhal.pa.gov.br', NULL, NULL);

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
(5, 10, '001/20', 'Acesso de Protocolo', 'Jose Felicio Alencar', 'jose.alencar', 'jose.felicio@hotmail.com', '47cafbff7d1c4463bbe7ba972a2b56e3', 1, '2020-08-10', 'uploads/usuarios/335339072c739ff29a83fc011a8862aa.jpg', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chamado`
--
ALTER TABLE `chamado`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `chamado_historico`
--
ALTER TABLE `chamado_historico`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `chamado_status`
--
ALTER TABLE `chamado_status`
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
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chamado`
--
ALTER TABLE `chamado`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `chamado_historico`
--
ALTER TABLE `chamado_historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `chamado_status`
--
ALTER TABLE `chamado_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
