-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 21/05/2021 às 13:52
-- Versão do servidor: 8.0.25-0ubuntu0.20.04.1
-- Versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste_menew`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `category_client`
--
-- Criação: 21/05/2021 às 11:20
-- Última atualização: 21/05/2021 às 10:59
--

CREATE TABLE `category_client` (
  `id_category_client` int NOT NULL,
  `name_category_client` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- RELACIONAMENTOS PARA TABELAS `category_client`:
--

--
-- Despejando dados para a tabela `category_client`
--

INSERT INTO `category_client` (`id_category_client`, `name_category_client`) VALUES
(1, 'Cliente'),
(2, 'Fornecedor'),
(3, 'Funcionário');

-- --------------------------------------------------------

--
-- Estrutura para tabela `client`
--
-- Criação: 21/05/2021 às 15:17
--

CREATE TABLE `client` (
  `id_client` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name_city` varchar(25) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `id_category_client` int NOT NULL,
  `id_state` int NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 = ativado | 2 = desativado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- RELACIONAMENTOS PARA TABELAS `client`:
--   `id_state`
--       `state` -> `id_state`
--   `id_category_client`
--       `category_client` -> `id_category_client`
--

--
-- Despejando dados para a tabela `client`
--

INSERT INTO `client` (`id_client`, `name`, `name_city`, `phone`, `email`, `id_category_client`, `id_state`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PAULO VITOR BATISTA', 'Maracanaú', '(87) 98989-8989', 'paulovitor-100-@outlook.com', 1, 1, 1, '2021-05-21 18:18:52', '2021-05-21 19:44:23'),
(2, 'PAULO VITOR', 'Maracanaú', '(88) 88888-8888', 'paulovitor@outlook.com', 2, 1, 1, '2021-05-21 18:26:37', '2021-05-21 19:35:53');

-- --------------------------------------------------------

--
-- Estrutura para tabela `state`
--
-- Criação: 21/05/2021 às 11:02
--

CREATE TABLE `state` (
  `id_state` int NOT NULL,
  `name_state` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- RELACIONAMENTOS PARA TABELAS `state`:
--

--
-- Despejando dados para a tabela `state`
--

INSERT INTO `state` (`id_state`, `name_state`) VALUES
(1, 'Ceará'),
(2, 'Minas Gerais'),
(3, 'Rio Grande do Norte'),
(4, 'Bahia'),
(5, 'Paraíba');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `category_client`
--
ALTER TABLE `category_client`
  ADD PRIMARY KEY (`id_category_client`);

--
-- Índices de tabela `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `fk_client_type_client_idx` (`id_category_client`),
  ADD KEY `fk_client_state_idx` (`id_state`);

--
-- Índices de tabela `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id_state`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `category_client`
--
ALTER TABLE `category_client`
  MODIFY `id_category_client` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `state`
--
ALTER TABLE `state`
  MODIFY `id_state` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_client_state` FOREIGN KEY (`id_state`) REFERENCES `state` (`id_state`),
  ADD CONSTRAINT `fk_client_type_client` FOREIGN KEY (`id_category_client`) REFERENCES `category_client` (`id_category_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
