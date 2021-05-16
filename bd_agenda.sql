SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `agenda_php` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `agenda_php`;

CREATE TABLE `agenda` (
  `cod_contato` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `cidade` varchar(40) DEFAULT NULL,
  `estado` varchar(40) DEFAULT NULL,
  `categoria` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `usuarios` (
  `cod_user` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `usuarios` (`cod_user`, `login`, `senha`, `nome`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrador', 'admin@mail.com.br');

ALTER TABLE `agenda`
  ADD PRIMARY KEY (`cod_contato`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_user`);

ALTER TABLE `agenda`
  MODIFY `cod_contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `usuarios`
  MODIFY `cod_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;
