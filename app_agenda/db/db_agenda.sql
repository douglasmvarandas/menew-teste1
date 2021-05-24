-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Maio-2021 às 02:57
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_agenda`
--
CREATE DATABASE IF NOT EXISTS `db_agenda` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `db_agenda`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_contatos`
--

CREATE TABLE `tb_contatos` (
  `id_contatos` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `data_hora` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_contatos`
--

INSERT INTO `tb_contatos` (`id_contatos`, `nome`, `email`, `telefone`, `cidade`, `estado`, `categoria`, `data_hora`, `ativo`) VALUES
(5, 'Daniel liberato da silva', 'daniel.bacellar022@gmail.com', '(92) 99240-4172', 'Manaus', 'Amazonas', 'Funcionario', '2021-05-22 14:15:54', 1),
(6, 'kezia neide de souza gomes', 'kezianeide022@gmail.com', '(92) 99820-5222', 'Manaus', 'Amazonas', 'Cliente', '2021-05-22 14:59:50', 1),
(8, 'jhonatas', 'jhon022@gmail.com', '(92) 99240-4172', 'Manaus', 'Amazonas', 'Funcionario', '2021-05-22 15:01:44', 1),
(9, 'Alexandre da silva gomes e silva', 'alexandre312@gmail.com', '(92) 99900-0444', 'SÃ£o Paulo', 'Amazonas', 'Cliente', '2021-05-22 20:23:45', 1),
(11, 'Lazaro  timoteo  andrade', 'Lazaro337@gmail.com', '(92) 99983-8390', 'Manaus', 'Rio de Janeiro', 'Fornecedor', '2021-05-22 20:33:55', 1),
(12, 'marcos da silva andrade', 'marcos@gmail.com', '(92) 99912-3244', 'Manaus', 'Amazonas', 'Cliente', '2021-05-22 20:35:18', 1),
(31, 'gabriel felipe', 'gabriel@gmail.com', '(92) 99998-2442', 'manaus', 'Amazonas', 'Cliente', '2021-05-22 21:21:25', 1),
(33, 'lucineide de souza  serrÃ£o', 'lucineides@gmail.com', '(92) 93645-9720', 'Manaus', 'Amazonas', 'Fornecedor', '2021-05-23 00:09:12', 1),
(34, 'Guilherme da silva gomes', 'guilheme.gomes@gmail.com', '(92) 99456-7899', 'Manaus', 'Amazonas', 'Fornecedor', '2021-05-23 14:27:42', 1),
(38, 'junior da  silva gomes', 'junior@gmail.com', '(55) 92982-0522', 'Manaus ', 'Amazonas', 'FuncionÃ¡rio', '2021-05-23 20:46:31', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_contatos`
--
ALTER TABLE `tb_contatos`
  ADD PRIMARY KEY (`id_contatos`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_contatos`
--
ALTER TABLE `tb_contatos`
  MODIFY `id_contatos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
