-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Maio-2021 às 04:05
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agenda_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `nome` text NOT NULL,
  `tel` int(20) NOT NULL,
  `email` text NOT NULL,
  `cidade` text NOT NULL,
  `estado` text NOT NULL,
  `categoria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `nome`, `tel`, `email`, `cidade`, `estado`, `categoria`) VALUES
(2, 'Anna', 2147483647, 'ana@mail.com', 'Lagoa', 'Bahia', 'Funcionário(a)'),
(5, 'Thiago', 124538678, 'thiago@mail.com', 'Bacabal', 'Maranhão', 'Cliente'),
(6, 'Marcos', 24512015, 'marcos@mail.com', 'Bacabal', 'Maranhão', 'Cliente'),
(7, 'Maria', 2147483647, 'maria@mail.com', 'Bacabal', 'Maranhão', 'Cliente'),
(8, 'Julia', 2147483647, 'julia@mail.com', 'Bacabal', 'Maranhão', 'Fornecedor(a)'),
(9, 'Joao', 2147483647, 'joao@mail.com', 'Bacabal', 'Maranhão', 'Fornecedor(a)'),
(10, 'Joana', 2147483647, 'joana@mail.com', 'Bacabal', 'Maranhão', 'Funcionário(a)'),
(11, 'Vitor', 2147483647, 'vitor@mail.com', 'Bacabal', 'Maranhão', 'Cliente'),
(12, 'Carol', 2147483647, 'carol@mail.com', 'Bacabal', 'Maranhão', 'Cliente'),
(13, 'Flavia', 2147483647, 'flavia@mail.com', 'Bacabal', 'Maranhão', 'Cliente'),
(15, 'Pedro', 2147483647, 'pedro@mail.com', 'Bacabal', 'Maranhão', 'Cliente');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
