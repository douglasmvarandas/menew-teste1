-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Maio-2021 às 00:48
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `idcadastro` int(11) NOT NULL,
  `nome` varchar(70) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `categoria` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`idcadastro`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES(2, 'Teste', '1160616511651', 'asdnfonfionrfwoin@dsnfdsfl.com', 'bnjdbnso', 'Piauí', 'Fornecedor');
INSERT INTO `agenda` (`idcadastro`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES(4, 'Tessa Skywalker', '135316846', 'tessa@asddasf.com', 'Em uma galáxia Distante', 'Piauí', 'Fornecedor');
INSERT INTO `agenda` (`idcadastro`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES(5, 'João de Souza', '4561648464', 'eusoulegal@hdsiadn.com', 'rredfds', 'Piauí', 'Funcionário');
INSERT INTO `agenda` (`idcadastro`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES(6, 'Gilvan Conrado', '7534343643334', 'rergegsdfs', 'sdffdsfsdgd', 'Pernambuco', 'Fornecedor');
INSERT INTO `agenda` (`idcadastro`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES(8, 'Gabriel Souza', '446511884513', 'gabrielsouza@gemfdmsd.com', 'Laranjeiras', 'Rio Grande do Norte', 'Fornecedor');
INSERT INTO `agenda` (`idcadastro`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES(9, 'Claudio Manaira', '6753534345353', 'caudio@dsfdfsdkm.com', 'dsfdfd', 'Piauí', 'Cliente');
INSERT INTO `agenda` (`idcadastro`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES(11, 'Irair', '15616115815', 'wendewkl@dsfnjlf.com', 'ewfweredsf', 'Rio Grande do Norte', 'Cliente');
INSERT INTO `agenda` (`idcadastro`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES(12, 'Thiago Pereira Brito', '83991737898', 'thiagopereira@outlook.com', 'dsfsfsdf', 'Pernambuco', 'Fornecedor');
INSERT INTO `agenda` (`idcadastro`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES(13, 'Anastor', '1561161', 'sdfsdfdsg@vfsv.com', 'dsfsdf', 'Pernambuco', 'Cliente');
INSERT INTO `agenda` (`idcadastro`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES(14, 'diego gouveia de ciclano', '375378245242', 'ewrfvevre@fegerger.com', 'ewfdsfa', 'Pernambuco', 'Fornecedor');
INSERT INTO `agenda` (`idcadastro`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES(15, 'Teovaldo ', '84518212323', 'teovado@ndfos.com', 'cfdsfdfsdf', 'Paraíba', 'Fornecedor');
INSERT INTO `agenda` (`idcadastro`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES(16, 'Maria Joaquina', '548648452', 'wbfjkbewfjk@fdfmkb.com', 'João Pessoa', 'Paraíba', 'Funcionário');
INSERT INTO `agenda` (`idcadastro`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES(17, 'Cristina de Lufa-Lufa', '73753453453', 'fsdfffwfewfds@lufalufa.com', 'dsfdsfdgr', 'Pernambuco', 'Fornecedor');
INSERT INTO `agenda` (`idcadastro`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES(18, 'Donald Gryffindor', '1516511651311', 'grndfel@njknld.com', 'Logo ali', 'Ceará', 'Funcionário');
INSERT INTO `agenda` (`idcadastro`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES(19, 'Mirella Gonçalves ', '57373837838', 'ergdfgfgdgsd', 'dsfdsfsdfdsfs', 'Piauí', 'Fornecedor');
INSERT INTO `agenda` (`idcadastro`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES(20, 'James Steelwall', '5313544445', 'rthuosdfndasni@ndnsfmfdkl.com', 'dsfdffs', 'Rio Grande do Norte', 'Cliente');
INSERT INTO `agenda` (`idcadastro`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES(21, 'Stella Artois', '24', 'rthuosdfndasni@ndnsfmfdkl.com', 'dsfdffs', 'Rio Grande do Norte', 'Cliente');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`idcadastro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `idcadastro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
