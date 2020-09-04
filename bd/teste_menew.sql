-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Set-2020 às 18:16
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

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
-- Estrutura da tabela `entidade`
--

CREATE TABLE `entidade` (
  `idEntidade` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(22) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `tipo` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `entidade`
--

INSERT INTO `entidade` (`idEntidade`, `nome`, `telefone`, `email`, `cidade`, `estado`, `tipo`) VALUES
(5, 'Ruan Teste', '83994074756', 'ruandiego@mvarandas.com.br', 'asdas', 'CE', 'CLI'),
(6, 'Jason Bourne Teste', '8654213546', 'jason@menew.com', 'João Pessoa', 'PB', 'CLI'),
(7, 'Teste', '321654987', 'teste@menew.com.br', 'Cuité', 'PB', 'FUN'),
(8, 'Teste 2', '958492515', 'teste2@menew.com', 'Jampamar', 'RJ', 'FUN'),
(9, 'Teste 3 TESTE', '65416216', 'teste3@menew.com', 'asdasa', 'SP', 'CLI'),
(10, 'Teste 3 TESTE', '65416216', 'teste3@menew.com', 'asdasa', 'SP', 'CLI'),
(11, 'Teste 3 TESTE', '65416216', 'teste3@menew.com', 'asdasa', 'SP', 'CLI'),
(12, 'Teste 2', '958492515', 'teste2@menew.com', 'Jampamar', 'RJ', 'FUN'),
(13, 'Teste 2', '958492515', 'teste2@menew.com', 'Jampamar', 'PB', 'FUN'),
(14, 'Teste', '321654987', 'teste@menew.com.br', 'Cuité', 'PB', 'FUN'),
(15, 'Teste 2', '958492515', 'teste2@menew.com', 'Jampamar', 'PB', 'FUN'),
(16, 'Jason Bourne Teste', '8654213546', 'jason@menew.com', 'João Pessoa', 'PB', 'CLI'),
(17, 'Jason Bourne Teste', '8654213546', 'jason@menew.com', 'João Pessoa', 'PB', 'CLI'),
(18, 'asdasdasd', '65656546', 'teste3@menew.com', 'asdasd', 'RJ', 'FUN'),
(19, 'Ruan Diego TESTE', '321651321', 'teste3@menew.com', 'Cabedelo', 'PB', 'FUN');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `entidade`
--
ALTER TABLE `entidade`
  ADD PRIMARY KEY (`idEntidade`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `entidade`
--
ALTER TABLE `entidade`
  MODIFY `idEntidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
