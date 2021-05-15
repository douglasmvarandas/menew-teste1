-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 15-Maio-2021 às 04:01
-- Versão do servidor: 10.5.9-MariaDB
-- versão do PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_test`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_contacts`
--

CREATE TABLE `tbl_contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(30) NOT NULL,
  `city` varchar(150) NOT NULL,
  `state` enum('AL','AP','BA','CE','MA','PB','PE','PI','RN','SE') NOT NULL DEFAULT 'PB',
  `category` enum('client','provider','employee') NOT NULL DEFAULT 'client',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_contacts`
--

INSERT INTO `tbl_contacts` (`id`, `name`, `email`, `number`, `city`, `state`, `category`, `updated_at`, `created_at`) VALUES
(1, 'Feliphe Allef', 'felipheallef@gmail.com', '83996603392', 'Sapé', 'PB', 'employee', '2021-05-15 06:50:26', '2021-05-15 06:50:26'),
(2, 'Nando Heian', 'nando@felipheallef.com', '83996603392', 'Sapé', 'PB', 'provider', '2021-05-15 06:54:39', '2021-05-15 06:52:39'),
(3, 'Maria Soares', 'mary@felipheallef.com', '83999999999', 'Recife', 'PE', 'client', '2021-05-15 06:54:03', '2021-05-15 06:54:03');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
