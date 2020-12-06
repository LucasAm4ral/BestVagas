-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Dez-2020 às 13:46
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bestvagas`
--
CREATE DATABASE IF NOT EXISTS `bestvagas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bestvagas`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidato`
--

CREATE TABLE `candidato` (
  `idcandidato` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `sexo` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `candidato`
--

INSERT INTO `candidato` (`idcandidato`, `nome`, `email`, `sexo`, `senha`) VALUES
(3, 'Lucas Amaral Souza', 'lucasamaralsouza@outlook.com', 'Homem Cis', '123'),
(4, 'teste', 'teste@gmail.com', 'Outros', '1234'),
(5, 'teste2', 'teste2@gmail.com', 'Mulher Cis', 'teste2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidato_has_vaga`
--

CREATE TABLE `candidato_has_vaga` (
  `candidato_idcandidato` int(11) NOT NULL,
  `vaga_idvaga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `candidato_has_vaga`
--

INSERT INTO `candidato_has_vaga` (`candidato_idcandidato`, `vaga_idvaga`) VALUES
(3, 1),
(3, 2),
(5, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vaga`
--

CREATE TABLE `vaga` (
  `idvaga` int(11) NOT NULL,
  `nome_empresa` varchar(45) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `salario` float NOT NULL,
  `nivel_vaga` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vaga`
--

INSERT INTO `vaga` (`idvaga`, `nome_empresa`, `descricao`, `salario`, `nivel_vaga`, `tipo`) VALUES
(1, 'Itau', 'Home office\r\n6h/dia', 1750, 'Estágio', 'Analista de Sistemas'),
(2, 'Bradesco', 'Consultor de Tecnologia', 4800, 'Pleno', 'Outros'),
(3, 'Nubank', 'Desenvolvedor Back-End com experiência', 2300, 'Junior', 'Back-End'),
(5, 'Teste', 'Desc Teste', 9999, 'Senior', 'Web');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `candidato`
--
ALTER TABLE `candidato`
  ADD PRIMARY KEY (`idcandidato`);

--
-- Índices para tabela `candidato_has_vaga`
--
ALTER TABLE `candidato_has_vaga`
  ADD PRIMARY KEY (`candidato_idcandidato`,`vaga_idvaga`),
  ADD KEY `fk_candidato_has_vaga_vaga1_idx` (`vaga_idvaga`),
  ADD KEY `fk_candidato_has_vaga_candidato_idx` (`candidato_idcandidato`);

--
-- Índices para tabela `vaga`
--
ALTER TABLE `vaga`
  ADD PRIMARY KEY (`idvaga`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `candidato`
--
ALTER TABLE `candidato`
  MODIFY `idcandidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `vaga`
--
ALTER TABLE `vaga`
  MODIFY `idvaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `candidato_has_vaga`
--
ALTER TABLE `candidato_has_vaga`
  ADD CONSTRAINT `fk_candidato_has_vaga_candidato` FOREIGN KEY (`candidato_idcandidato`) REFERENCES `candidato` (`idcandidato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candidato_has_vaga_vaga1` FOREIGN KEY (`vaga_idvaga`) REFERENCES `vaga` (`idvaga`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
