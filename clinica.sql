-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Jul-2022 às 08:25
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clinica_pet`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(4) NOT NULL,
  `password` varchar(23) NOT NULL,
  `nome_admin` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `admins`
--

INSERT INTO `admins` (`id_admin`, `password`, `nome_admin`) VALUES
(1, '123', 'root');

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `nome_animal` varchar(20) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `id_animal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`nome_animal`, `id_cliente`, `id_animal`) VALUES
('ANIMAL1', 101, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `nome_cliente` varchar(40) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `email_cliente` varchar(20) NOT NULL,
  `cpf_cliente` varchar(15) NOT NULL,
  `celular_cliente` varchar(20) NOT NULL,
  `data_cadastro_cliente` date NOT NULL DEFAULT current_timestamp(),
  `rua_cliente` varchar(40) NOT NULL,
  `bairro_cliente` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`nome_cliente`, `id_cliente`, `email_cliente`, `cpf_cliente`, `celular_cliente`, `data_cadastro_cliente`, `rua_cliente`, `bairro_cliente`) VALUES
('TESTE2 TESTANDO', 101, 'teste2@testando.com', '002', '148814814148', '2022-07-13', 'rua do test 2', 0),
('TEST3', 102, 'teste3@testando.com', '003', '333333', '2022-07-14', 'rua3', 0),
('TES4', 103, 'tes4@tes4.com', '4', '4444', '2022-07-14', 'r4', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(4) NOT NULL,
  `id_animal` int(4) NOT NULL,
  `id_cliente` int(4) NOT NULL,
  `data` varchar(10) NOT NULL,
  `hora` int(2) NOT NULL,
  `observacoes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Índices para tabela `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id_animal`),
  ADD KEY `fk_animal_cliente` (`id_cliente`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `fk_consulta_animal` (`id_animal`),
  ADD KEY `fk_consulta_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de tabela `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(4) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `fk_animal_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Limitadores para a tabela `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `fk_consulta_animal` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`),
  ADD CONSTRAINT `fk_consulta_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
