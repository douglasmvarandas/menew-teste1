-- Criando a Base de Dados
CREATE DATABASE menew;
-- usando a Base de Dados
use menew;
-- Criando a Tabela agendars
CREATE TABLE agendars (
	id INT NOT NULL AUTO_INCREMENT,
	nome VARCHAR(158) NOT NULL,
	telefone VARCHAR(15) NOT NULL,
	email VARCHAR(158) NOT NULL,
	cidade VARCHAR(158) NOT NULL,
	estado VARCHAR(40) NOT NULL,
	categoria VARCHAR(20) NOT NULL,
	PRIMARY KEY (id)
);
-- Inserindo Agendamento
INSERT INTO `menew`.`agendars` (`id`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES ('1', 'Nathan Andrade', '83988743102', 'nathan@email.com', 'João Pessoa', 'Paraíba', 'Cliente');
INSERT INTO `menew`.`agendars` (`id`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES ('2', 'Lidia Araújo', '83988887777', 'lidia@email.com', 'Natal', 'Rio Grande Do Norte', 'Fornecedor');
INSERT INTO `menew`.`agendars` (`id`, `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`, `created_at`) VALUES ('3', 'Jonathan Andrade', '83955221144', 'jonathan@email.com', 'Recife', 'Pernambuco', 'Cliente', '');