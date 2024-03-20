-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Nov-2022 às 15:47
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

create database site;
use site;

--
-- Banco de dados: `site`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `cod` int(11) NOT NULL,
  `nome` varchar(90) DEFAULT NULL,
  `frequencia` int(11) DEFAULT NULL,
  `turma` varchar(60) DEFAULT NULL,
  `periodo` varchar(30) DEFAULT NULL,
  `dtNasc` date DEFAULT NULL,
  `fone` char(11) NOT NULL,
  `cpf` char(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `path` varchar(100) NOT NULL,
  `senha` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`cod`, `nome`, `frequencia`, `turma`, `periodo`, `dtNasc`, `fone`, `cpf`, `email`, `path`, `senha`) VALUES
(1, 'Matheus da Silva', 85, 'DS', 'Manhã', NULL, '', '', '', '', ''),
(3, 'Daniel Modesto', 75, 'ADM', 'Manhã', NULL, '', '', '', '', ''),
(4, 'Daniel Gomes', 78, 'DS', 'Noite', NULL, '', '', '', '', ''),
(5, 'David Henrique', 76, 'ADM', 'Noite', NULL, '', '', '', '', ''),
(6, 'Diogo Almeida', 82, 'DS', 'Manhã', NULL, '', '', '', '', ''),
(7, 'Pedro Augosto', 67, 'DS', 'Noite', NULL, '', '', '', '', ''),
(8, 'Rogério Carlos', 83, 'ADM', 'Manhã', NULL, '', '', '', '', ''),
(9, 'Carlos Rogério', 73, 'DS', 'Noite', NULL, '', '', '', '', ''),
(10, 'Augusto Pedro', 62, 'DS', 'Manhã', NULL, '', '', '', '', ''),
(11, 'Roberto Wilian', 81, 'ADM', 'Noite', NULL, '', '', '', '', ''),
(12, 'Wilian Roberto', 65, 'ADM', 'Manhã', NULL, '', '', '', '', ''),
(14, 'Daniel', 0, 'DS', 'Manhã', '2000-05-05', '45125454884', '48641545484', 'daniel@gmail.com', 'Fotos_Aluno/63813bded7aea.jpg', '12345678aB!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartao`
--

CREATE TABLE `cartao` (
  `cod` int(11) NOT NULL,
  `nm_cartao` varchar(100) NOT NULL,
  `cod_pessoa` int(11) NOT NULL,
  `cod_aluno` int(11) NOT NULL,
  `cod_visitante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cartao`
--

INSERT INTO `cartao` (`cod`, `nm_cartao`, `cod_pessoa`, `cod_aluno`, `cod_visitante`) VALUES
(1, '03312519', 0, 0, 2),
(3, '0445AL445', 0, 14, 0),
(4, '0011AABB', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcao`
--

CREATE TABLE `funcao` (
  `Cod_Funcao` char(2) NOT NULL,
  `Nm_Funcao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcao`
--

INSERT INTO `funcao` (`Cod_Funcao`, `Nm_Funcao`) VALUES
('1', 'Master'),
('2', 'Coordenador'),
('3', 'Secretário'),
('4', 'Professor'),
('5', 'Funcionário'),
('6', 'Aluno');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mediasemana`
--

CREATE TABLE `mediasemana` (
  `cod` int(11) NOT NULL,
  `nome` varchar(90) DEFAULT NULL,
  `frequencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mediasemana`
--

INSERT INTO `mediasemana` (`cod`, `nome`, `frequencia`) VALUES
(1, 'Domingo', 11),
(2, 'Segunda', 9),
(3, 'Terça', 3),
(4, 'Quarta', 10),
(5, 'Quinta', 14),
(6, 'Sexta', 9),
(7, 'Sábado', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `CodPessoa` int(5) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `DataNasc` date NOT NULL,
  `Fone` char(11) NOT NULL,
  `CPF` char(11) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Senha` int(8) NOT NULL,
  `path` varchar(100) NOT NULL,
  `Cod_Funcao` char(2) DEFAULT NULL,
  `frenquecia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`CodPessoa`, `Nome`, `DataNasc`, `Fone`, `CPF`, `Email`, `Senha`, `path`, `Cod_Funcao`, `frenquecia`) VALUES
(1, 'David', '2000-10-10', '12345678912', '12345678912', 'david@gmail.com', 12345678, 'Fotos_Fun/David.jpg', '1', 0),
(2, 'Mateeus Silva', '2000-02-05', '48454545124', '84184121564', 'mateus.silva@gmail.com', 12345678, 'Fotos_Fun/637c0291d4fc7.jpg', '5', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_validacao`
--

CREATE TABLE `pessoa_validacao` (
  `CodPessoa` int(5) DEFAULT NULL,
  `Cod_Validacao` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `statusled`
--

CREATE TABLE `statusled` (
  `ID` int(10) NOT NULL,
  `Stat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `statusled`
--

INSERT INTO `statusled` (`ID`, `Stat`) VALUES
(0, '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbrfidwifi`
--

CREATE TABLE `tbrfidwifi` (
  `name` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbrfidwifi`
--

INSERT INTO `tbrfidwifi` (`name`, `id`, `gender`, `email`, `mobile`) VALUES
('Matheus', '01020304', 'Male', 'matheus@gmail.com', '011'),
('maicon', '03312519', 'Male', 'mainco', '123'),
('giygihg', '725F2213', 'Male', 'iyvg', ' jb ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `validacao`
--

CREATE TABLE `validacao` (
  `cod_validacao` int(5) NOT NULL,
  `Id_Cartao` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Data_Hora_Entrada` varchar(30) DEFAULT NULL,
  `Data_Hora_Saida` varchar(30) DEFAULT NULL,
  `CodPessoa` int(5) NOT NULL,
  `CodAluno` int(11) NOT NULL,
  `CodVisitante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `validacao`
--

INSERT INTO `validacao` (`cod_validacao`, `Id_Cartao`, `Status`, `Data_Hora_Entrada`, `Data_Hora_Saida`, `CodPessoa`, `CodAluno`, `CodVisitante`) VALUES
(1, '03312519', 'Desativado', '2022-11-27 14:24:03', '2022-11-27 14:28:28', 0, 0, 2),
(2, '03312519', 'Desativado', '2022-11-27 14:29:06', '2022-11-27 14:29:24', 0, 0, 2),
(3, '03312519', 'Desativado', '2022-11-27 14:36:19', '2022-11-27 14:47:23', 0, 0, 2),
(4, '03312519', 'Desativado', '2022-11-27 14:50:01', '2022-11-27 14:52:10', 0, 0, 2),
(5, '03312519', 'Desativado', '2022-11-27 14:52:38', '2022-11-27 14:54:07', 0, 0, 2),
(6, '03312519', 'Desativado', '2022-11-28 19:00:51', '2022-11-28 19:06:10', 0, 0, 2),
(7, '03312519', 'Desativado', '2022-11-28 19:07:14', '2022-11-28 19:12:37', 0, 0, 2),
(8, '03312519', 'Desativado', '2022-11-28 19:13:53', '2022-11-28 19:17:12', 0, 0, 2),
(9, '03312519', 'Desativado', '2022-11-28 19:20:34', '2022-11-28 19:24:05', 0, 0, 2),
(10, '03312519', 'Desativado', '2022-11-28 20:25:00', '2022-11-29 01:48:23', 0, 0, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitante`
--

CREATE TABLE `visitante` (
  `cod` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `fone` char(11) NOT NULL,
  `cpf` char(11) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `visitante`
--

INSERT INTO `visitante` (`cod`, `nome`, `fone`, `cpf`, `path`) VALUES
(2, 'Diogo', '12345678912', '12345678912', '../Fotos_Visitante/63839bc526f63.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `cartao`
--
ALTER TABLE `cartao`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `funcao`
--
ALTER TABLE `funcao`
  ADD PRIMARY KEY (`Cod_Funcao`);

--
-- Índices para tabela `mediasemana`
--
ALTER TABLE `mediasemana`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`CodPessoa`);

--
-- Índices para tabela `statusled`
--
ALTER TABLE `statusled`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `tbrfidwifi`
--
ALTER TABLE `tbrfidwifi`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `validacao`
--
ALTER TABLE `validacao`
  ADD PRIMARY KEY (`cod_validacao`);

--
-- Índices para tabela `visitante`
--
ALTER TABLE `visitante`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `cartao`
--
ALTER TABLE `cartao`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `mediasemana`
--
ALTER TABLE `mediasemana`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `CodPessoa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `validacao`
--
ALTER TABLE `validacao`
  MODIFY `cod_validacao` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `visitante`
--
ALTER TABLE `visitante`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
