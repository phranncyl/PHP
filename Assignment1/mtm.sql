-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Dez-2021 às 22:32
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

CREATE TABLE `bairros` (
  `id_bairro` int(11) NOT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `distancia_base` decimal(16,2) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tabela antes do insert `bairros`
--

TRUNCATE TABLE `bairros`;
--
-- Extraindo dados da tabela `bairros`
--

INSERT INTO `bairros` (`id_bairro`, `cidade`, `nome`, `distancia_base`, `status`) VALUES
(1, 'Matão', 'CENTRO', '12.00', 'A'),
(2, 'Matão', 'NOVA MATAO', '23.00', 'A'),
(3, 'Matão', 'BAIRRO ALTO', '13.00', 'A'),
(4, 'Taquaritinga', 'CENTRO TAQ', '1999.00', 'A');

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

--
-- Truncar tabela antes do insert `corridas`
--

TRUNCATE TABLE `corridas`;
--
-- Extraindo dados da tabela `corridas`
--

INSERT INTO `corridas` (`id_corrida`, `nome_cliente`, `data_atendimento`, `data_corrida`, `horario`, `endereco_saida`, `numero_saida`, `id_bairro_saida`, `endereco_chegada`, `numero_chegada`, `id_bairro_chegada`, `tipo_pagamento`, `valor`, `id_motorista`, `observacao`, `tipo_atendimento`) VALUES
(2, 'ertry5y', '2021-12-28 15:25:45', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(3, 'ertry5y', '2021-12-28 15:32:50', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(4, 'ertry5y', '2021-12-28 15:33:23', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(5, 'ertry5y', '2021-12-28 15:34:55', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(6, 'ertry5y', '2021-12-28 15:37:46', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(7, 'ertry5y', '2021-12-28 15:42:20', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(8, 'ertry5y', '2021-12-28 15:44:34', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(9, 'ertry5y', '2021-12-28 15:45:24', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(10, 'ertry5y', '2021-12-28 15:47:08', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(11, 'ertry5y', '2021-12-28 15:48:35', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(12, 'ertry5y', '2021-12-28 15:48:48', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(13, 'ertry5y', '2021-12-28 15:49:08', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(14, 'ertry5y', '2021-12-28 15:49:38', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(15, 'ertry5y', '2021-12-28 15:50:03', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(16, 'ertry5y', '2021-12-28 15:51:26', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(17, 'ertry5y', '2021-12-28 15:53:38', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(18, 'ertry5y', '2021-12-28 15:53:52', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(19, 'ertry5y', '2021-12-28 15:54:00', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(20, 'ertry5y', '2021-12-28 15:54:36', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(21, 'ertry5y', '2021-12-28 15:55:28', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(22, 'ertry5y', '2021-12-28 15:55:39', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(23, 'ertry5y', '2021-12-28 15:58:29', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(24, 'ertry5y', '2021-12-28 16:01:00', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(25, 'ertry5y', '2021-12-28 16:02:52', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL),
(26, 'ertry5y', '2021-12-28 16:03:51', '2021-12-28', '15:24:00', 'Rua Pastor Lester Stoner', '24343', 1, 'efrttre', '245', 2, 'DINHEIRO', '0.00', 2, 'rtt5t4', NULL);

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
-- Truncar tabela antes do insert `motoristas`
--

TRUNCATE TABLE `motoristas`;
--
-- Extraindo dados da tabela `motoristas`
--

INSERT INTO `motoristas` (`id_motorista`, `nome`, `apelido`, `telefone1`, `telefone2`, `data_nasc`, `status`, `data_atualizacao`) VALUES
(1, 'FRANCIELLE CUSTODIO GARCIA', '1qweet4t', '55169919935', '+5516991993534', '2021-12-19', 'A', '2021-12-24 02:04:31'),
(2, 'ALINE CUSTODIO LEITE', 'PRETINHA', '12345', '12345', '2021-12-24', 'A', '2021-12-24 01:36:51');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_motoristas`
--

CREATE TABLE `status_motoristas` (
  `id_statusmotorista` int(11) NOT NULL,
  `id_motorista` int(11) NOT NULL,
  `ordem` int(11) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tabela antes do insert `status_motoristas`
--

TRUNCATE TABLE `status_motoristas`;
--
-- Extraindo dados da tabela `status_motoristas`
--

INSERT INTO `status_motoristas` (`id_statusmotorista`, `id_motorista`, `ordem`, `status`) VALUES
(1, 1, 134, 'A'),
(2, 2, 2, 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `data_atualizacao` datetime DEFAULT current_timestamp(),
  `dir_photo` varchar(1000) DEFAULT 'img\\portfolio\\padrao.png'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Truncar tabela antes do insert `usuarios`
--

TRUNCATE TABLE `usuarios`;
--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `usuario`, `senha`, `status`, `data_atualizacao`, `dir_photo`) VALUES
(7, 'FRANCIELLE CUSTODIO GARCIA', 'francielle.phrann@gmail.com', 'Fran', '1234', 'A', '2021-12-27 16:18:42', 'img/portfolio/profile7.jpg'),
(8, 'FRANCIELLE CUSTODIO GARCIA', 'tese@1', 'root', 'toor', 'A', '2021-12-27 16:24:11', 'imgportfoliopadrao.png'),
(10, 'TESTE', '72635@DUUS', 'rtfyg7g8', '1234', 'A', '2021-12-28 14:01:57', 'img/portfolio/profile10.jpg'),
(11, 'FRANCIELLE CUSTODIO GARCIA', 'francielle.phrann@gmail.com', 'Fran', '1234', 'A', '2021-12-28 14:29:30', 'imgportfoliopadrao.png'),
(12, 'TESTE', '72635@DUUS', 'celke', 'celke', 'A', '2021-12-28 14:30:25', 'imgportfoliopadrao.png');

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
-- Truncar tabela antes do insert `valores`
--

TRUNCATE TABLE `valores`;
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
-- Índices para tabela `status_motoristas`
--
ALTER TABLE `status_motoristas`
  ADD PRIMARY KEY (`id_statusmotorista`),
  ADD KEY `FK_statusmotortistas` (`id_motorista`);

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
  MODIFY `id_bairro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `corridas`
--
ALTER TABLE `corridas`
  MODIFY `id_corrida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `motoristas`
--
ALTER TABLE `motoristas`
  MODIFY `id_motorista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `status_motoristas`
--
ALTER TABLE `status_motoristas`
  MODIFY `id_statusmotorista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `valores`
--
ALTER TABLE `valores`
  MODIFY `id_valor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `status_motoristas`
--
ALTER TABLE `status_motoristas`
  ADD CONSTRAINT `FK_statusmotortistas` FOREIGN KEY (`id_motorista`) REFERENCES `motoristas` (`id_motorista`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
