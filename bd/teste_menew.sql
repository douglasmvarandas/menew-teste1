-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Set-2020 às 04:58
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
(5, 'Ruan', '83994074756', 'ruandiego@mvarandas.com.br', 'asdas', 'RJ', 'FUN'),
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
(19, 'Ruan Diego TESTE', '321651321', 'teste3@menew.com', 'Cabedelo', 'PB', 'FUN'),
(20, 'Jfjsbfjdjfn', '62646894956', 'ruandiegocs18@gmail.com', 'Hdhdhsjcjsjd', 'SP', 'FOR'),
(21, 'Porco pia', '9467616464', 'porcogordo@funnybunny.com', 'Oitizeiro', 'PB', 'CLI');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `idEstado` int(11) NOT NULL,
  `nomeEstado` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`idEstado`, `nomeEstado`, `uf`) VALUES
(1, 'CEARÁ', 'CE'),
(2, 'PARAÍBA', 'PB'),
(3, 'PERNAMBUCO', 'PE'),
(4, 'RIO DE JANEIRO', 'RJ'),
(5, 'SÃO PAULO', 'SP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoentidade`
--

CREATE TABLE `tipoentidade` (
  `idTipoEntidade` int(11) NOT NULL,
  `nomeEntidade` varchar(255) NOT NULL,
  `sigla` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipoentidade`
--

INSERT INTO `tipoentidade` (`idTipoEntidade`, `nomeEntidade`, `sigla`) VALUES
(1, 'Cliente', 'CLI'),
(2, 'Fornecedor', 'FOR'),
(3, 'Funcionário', 'FUN');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `entidade`
--
ALTER TABLE `entidade`
  ADD PRIMARY KEY (`idEntidade`);

--
-- Índices para tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`idEstado`);

--
-- Índices para tabela `tipoentidade`
--
ALTER TABLE `tipoentidade`
  ADD PRIMARY KEY (`idTipoEntidade`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `entidade`
--
ALTER TABLE `entidade`
  MODIFY `idEntidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tipoentidade`
--
ALTER TABLE `tipoentidade`
  MODIFY `idTipoEntidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
