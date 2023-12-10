-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Dez-2021 às 05:08
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mtm`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairros`
--

CREATE DATABASE MTM;
USE MTM;

CREATE TABLE `bairros` (
  `id_bairro` int(11) NOT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `distancia_base` decimal(16,2) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `bairros`
--

INSERT INTO `bairros` (`id_bairro`, `cidade`, `nome`, `distancia_base`, `status`) VALUES
(1, 'Matão', 'CENTRO', '12.00', 'A'),
(2, 'Matão', 'NOVA MATAO', '23.00', 'A'),
(3, 'Matão', 'BAIRRO ALTO', '13.00', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `corridas`
--

CREATE TABLE `corridas` (
  `id_corrida` int(11) NOT NULL,
  `nome_cliente` varchar(200) DEFAULT NULL,
  `data_atendimento` datetime DEFAULT NULL,
  `data_corrida` date DEFAULT NULL,
  `horario` time DEFAULT NULL,
  `endereco_saida` varchar(500) DEFAULT NULL,
  `numero_saida` varchar(20) DEFAULT NULL,
  `id_bairro_saida` int(11) DEFAULT NULL,
  `endereco_chegada` varchar(500) DEFAULT NULL,
  `numero_chegada` varchar(20) DEFAULT NULL,
  `id_bairro_chegada` int(11) DEFAULT NULL,
  `tipo_pagamento` varchar(100) DEFAULT NULL,
  `valor` decimal(16,2) DEFAULT NULL,
  `id_motorista` int(11) DEFAULT NULL,
  `observacao` varchar(1000) DEFAULT NULL,
  `tipo_atendimento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `motoristas`
--

CREATE TABLE `motoristas` (
  `id_motorista` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `apelido` varchar(50) DEFAULT NULL,
  `telefone1` varchar(20) DEFAULT NULL,
  `telefone2` varchar(20) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `data_atualizacao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `motoristas`
--

INSERT INTO `motoristas` (`id_motorista`, `nome`, `apelido`, `telefone1`, `telefone2`, `data_nasc`, `status`, `data_atualizacao`) VALUES
(1, 'FRANCIELLE CUSTODIO GARCIA', '1qweet4t', '55169919935', '+5516991993534', '2021-12-21', 'A', '2021-12-21 15:52:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--
usuarios
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL ,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `data_atualizacao` datetime DEFAULT current_timestamp(),
  `dir_photo` varchar(1000) DEFAULT 'mtm\\img\\portfolio'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `usuario`, `senha`, `status`, `data_atualizacao`, `dir_photo`) VALUES
(7, 'FRANCIELLE CUSTODIO GARCIA', 'francielle.phrann@gmail.com', 'Fran', '1234', 'A', '2021-12-21 15:14:38', NULL),
(8, 'CENTRO', 'francielle.phrann@gmail.com', 'root', 'toor', 'A', '2021-12-21 15:29:16', 'C:\\xampp\\htdocs\\mtm\\img\\portfolio\\padrao.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `valores`
--

CREATE TABLE `valores` (
  `id_valor` int(11) NOT NULL,
  `id_bairro_saida` int(11) DEFAULT NULL,
  `id_bairro_chegada` int(11) DEFAULT NULL,
  `valor` decimal(16,2) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `data_atualizacao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `valores`
--

INSERT INTO `valores` (`id_valor`, `id_bairro_saida`, `id_bairro_chegada`, `valor`, `status`, `data_atualizacao`) VALUES
(1, 1, 2, '100.00', NULL, '2021-12-21 16:02:47');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `bairros`
--
ALTER TABLE `bairros`
  ADD PRIMARY KEY (`id_bairro`);

--
-- Índices para tabela `corridas`
--
ALTER TABLE `corridas`
  ADD PRIMARY KEY (`id_corrida`);

--
-- Índices para tabela `motoristas`
--
ALTER TABLE `motoristas`
  ADD PRIMARY KEY (`id_motorista`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices para tabela `valores`
--
ALTER TABLE `valores`
  ADD PRIMARY KEY (`id_valor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bairros`
--
ALTER TABLE `bairros`
  MODIFY `id_bairro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `corridas`
--
ALTER TABLE `corridas`
  MODIFY `id_corrida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `motoristas`
--
ALTER TABLE `motoristas`
  MODIFY `id_motorista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `valores`
--
ALTER TABLE `valores`
  MODIFY `id_valor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
