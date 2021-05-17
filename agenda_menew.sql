-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Maio-2021 às 17:46
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agenda_menew`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`id`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`, `created_at`) VALUES
(1, 'Vinicius', '98787-4005', 'vmarv@hotmail.com', 'João pessoa', 'PB', 'cliente', '2021-05-17 00:49:00'),
(2, 'Marcos', '987987-635465', 'adm@teste.com.br', 'Joao pessoa', 'PB', 'cliente', '2021-05-17 00:51:34'),
(4, 'Alisson alterado', '988754-95651', 'alisson@email.com', 'Recife', 'PE', 'funcionario', '2021-05-17 13:28:39'),
(5, 'Paulo', '988754-9565', 'paulo@email.com', 'Maceio', 'AL', 'cliente', '2021-05-17 13:28:58'),
(6, 'Pedro', '988754-9565', 'pedro@email.com', 'Fortaleza', 'CE', 'cliente', '2021-05-17 13:30:32'),
(7, 'Lucas', '6565-4562', 'lucas@gmail.com', 'João Pessoa', 'PB', 'funcionario', '2021-05-17 13:34:23'),
(8, 'Ricardo', '98787-54546', 'ricardo@gmail.com', 'João Pessoa', 'PB', 'cliente', '2021-05-17 13:43:32');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
