-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Set-2020 às 21:30
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agenda-menew`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `estado` varchar(22) NOT NULL,
  `categoria` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES
(1, 'Nielson Ferreira', '(81)99729-5034', 'nielsonfferreira@hotmail.com', 'Goiana', 'Pernambuco', 'Funcionário'),
(2, 'Paulo Henrique', '(83)98657-4326', 'p.henrique@gmail.com', 'João Pessoa', 'Paraíba', 'Cliente'),
(5, 'Mayara França', '(79)98715-3069', 'mayara.franca@gmail.com', 'Aracaju', 'Sergipe', 'Fornecedor'),
(6, 'Emanuel Lira', '(73)98567-3410', 'emanuel.lira@yahoo.com.br', 'Salvador', 'Bahia', 'Cliente'),
(7, 'Larissa Almeida', '(84)98496-3527', 'lari.almeida@outlook.com.br', 'Natal', 'Rio Grande do Norte', 'Fornecedor'),
(8, 'Amanda Santos', '(81)99753-6412', 'amanda.santos@hotmail.com', 'Recife', 'Pernambuco', 'Funcionário');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
