-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 26, 2019 at 11:04 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `woodcalcdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes_tbl`
--

CREATE TABLE `clientes_tbl` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `dtnasc` date NOT NULL,
  `telfixo` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `contato` varchar(50) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `bairro` varchar(150) NOT NULL,
  `complemento` varchar(150) NOT NULL,
  `cidade` varchar(150) NOT NULL,
  `uf` varchar(3) NOT NULL,
  `cpfcnpj` varchar(20) NOT NULL,
  `rginsest` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientes_tbl`
--

INSERT INTO `clientes_tbl` (`id`, `tipo`, `nome`, `dtnasc`, `telfixo`, `celular`, `contato`, `endereco`, `numero`, `cep`, `bairro`, `complemento`, `cidade`, `uf`, `cpfcnpj`, `rginsest`) VALUES
(1, 'Físico', 'Luciano Eduardo Ferreira', '1995-05-08', '3025', '(45) 99107-7185', 'Luciano', 'Avenida Felipe Wandscheer', '3195', '85856660', 'Jardim Dom Pedro I', 'Casa', 'Foz do Iguaçu', 'PR', '092.079.829-27', '9.413.767-5'),
(2, 'Físico', 'Taciane Alves Ferreira', '1970-01-01', '3025', '(45) 99817-0551', 'Taciane', 'Avenida Felipe Wandscheer', '3195', '85856660', 'Jardim Dom Pedro I', 'Casa', 'Foz do Iguaçu', 'PR', '077.090.929-93', '10.267.260-7'),
(3, 'Físico', 'Taciane Cristina Alves Ferreira', '1970-01-01', '3025', '(45) 99817-0551', 'tac', 'Avenida Felipe Wandscheer', '3195', '85856660', 'Jardim Dom Pedro I', 'Casa', 'Foz do Iguaçu', 'PR', '092.079.829-27', '94137675');

-- --------------------------------------------------------

--
-- Table structure for table `madeiraum_tbl`
--

CREATE TABLE `madeiraum_tbl` (
  `id` int(11) NOT NULL,
  `categoria` varchar(150) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `genero` varchar(150) NOT NULL,
  `especie` varchar(150) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `rap15` varchar(20) NOT NULL,
  `lmtproporcionalidade` varchar(20) NOT NULL,
  `ec0` varchar(20) NOT NULL,
  `fc015` varchar(20) NOT NULL,
  `fm15` varchar(20) NOT NULL,
  `ft0` varchar(20) NOT NULL,
  `ft90` varchar(20) NOT NULL,
  `fv` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `madeiraum_tbl`
--

INSERT INTO `madeiraum_tbl` (`id`, `categoria`, `nome`, `genero`, `especie`, `descricao`, `rap15`, `lmtproporcionalidade`, `ec0`, `fc015`, `fm15`, `ft0`, `ft90`, `fv`) VALUES
(1, 'Madeira', 'Eucalipto', 'eucalypto', 'eucalypto-grandis', 'Eucalipto Úmido', '11', '10', '13', '14', '15', '12', '17', '18');

-- --------------------------------------------------------

--
-- Table structure for table `madeira_tbl`
--

CREATE TABLE `madeira_tbl` (
  `id` int(11) NOT NULL,
  `categoria` varchar(150) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `genero` varchar(150) NOT NULL,
  `especie` varchar(150) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `rbas` varchar(20) NOT NULL,
  `lmtproporcionalidade` varchar(20) NOT NULL,
  `ec0` varchar(20) NOT NULL,
  `fc0` varchar(20) NOT NULL,
  `fm` varchar(20) NOT NULL,
  `ft0` varchar(20) NOT NULL,
  `ft90` varchar(20) NOT NULL,
  `fv` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `madeira_tbl`
--

INSERT INTO `madeira_tbl` (`id`, `categoria`, `nome`, `genero`, `especie`, `descricao`, `rbas`, `lmtproporcionalidade`, `ec0`, `fc0`, `fm`, `ft0`, `ft90`, `fv`) VALUES
(3, 'Madeira', 'Eucalipto', 'eucalypto', 'eucalypto-grandis', 'Eucalipto', '12', '10', '13', '10', '10', '12', '32', '21');

-- --------------------------------------------------------

--
-- Table structure for table `parafuso_tbl`
--

CREATE TABLE `parafuso_tbl` (
  `id` int(11) NOT NULL,
  `norma` varchar(20) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `polegadas` varchar(5) NOT NULL,
  `lmtescoamento` varchar(20) NOT NULL,
  `resistracao` varchar(20) NOT NULL,
  `cargaprova` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prego_tbl`
--

CREATE TABLE `prego_tbl` (
  `id` int(11) NOT NULL,
  `categoria` varchar(150) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `tipoprego` varchar(150) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prego_tbl`
--

INSERT INTO `prego_tbl` (`id`, `categoria`, `nome`, `tipoprego`, `descricao`) VALUES
(1, 'Prego', 'Prego tipo 1', 'prego 18x36', 'prego de cabeça dupla'),
(2, 'Madeira', 'Prego tipo 2', 'prego 18x36', 'prego de cabeça dupla'),
(3, 'Prego', 'Prego tipo 2', 'prego 18x36', 'prego de cabeça dupla'),
(4, 'Prego', 'Prego tipo', 'prego 18x36', 'prego de cabeça dupla');

-- --------------------------------------------------------

--
-- Table structure for table `telha_tbl`
--

CREATE TABLE `telha_tbl` (
  `id` int(11) NOT NULL,
  `categoria` varchar(150) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `tipotelha` varchar(150) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `expessura` varchar(5) NOT NULL,
  `qtdapoios` varchar(5) NOT NULL,
  `distapoios` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `telha_tbl`
--

INSERT INTO `telha_tbl` (`id`, `categoria`, `nome`, `tipotelha`, `descricao`, `expessura`, `qtdapoios`, `distapoios`) VALUES
(1, 'Telha', 'Telha metálica', 'Trapezoidal', 'Telha de cobertura galpao', '43', '2', '2,00'),
(2, 'Telha', 'Telha de Zinco', 'Telha Odulada', '123', '50', '2', '2,50');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_tbl`
--

CREATE TABLE `usuarios_tbl` (
  `id` int(11) NOT NULL,
  `nomeUsuario` varchar(200) NOT NULL,
  `dtNasc` date NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `contato` varchar(50) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `bairro` varchar(150) NOT NULL,
  `complemento` varchar(150) NOT NULL,
  `cidade` varchar(150) NOT NULL,
  `uf` varchar(3) NOT NULL,
  `cpfcnpj` varchar(30) NOT NULL,
  `rginsest` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `tipoUsuario` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios_tbl`
--

INSERT INTO `usuarios_tbl` (`id`, `nomeUsuario`, `dtNasc`, `telefone`, `celular`, `contato`, `endereco`, `numero`, `cep`, `bairro`, `complemento`, `cidade`, `uf`, `cpfcnpj`, `rginsest`, `usuario`, `senha`, `tipoUsuario`, `status`) VALUES
(3, 'l', '2019-10-12', '3025', '(45) 99107-7185', 'luciano', 'Avenida Felipe Wandscheer', '3195', '85856660', 'Jardim Dom Pedro I', 'Casa', 'Foz do Iguaçu', 'PR', '09207982927', '94137675', 'Taciane', 'e8d95a51f3af4a3b134bf6bb680a213a', 'Administrador', 'Ativo'),
(4, 'Luciano Eduardo Ferreira', '1995-05-08', '(45) 991077185', '(45) 991077185', 'Luciano', 'Avenida Felipe Wandscheer', '3195', '85856660', 'Jardim Dom Pedro I', 'Casa', 'Foz do Iguaçu', 'PR', '092.079.829-27', '9.413.767-5', 'Luciano', '24fc5715c26a0f8f11e84b9803b227e7', 'Administrador', 'Ativo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes_tbl`
--
ALTER TABLE `clientes_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `madeiraum_tbl`
--
ALTER TABLE `madeiraum_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `madeira_tbl`
--
ALTER TABLE `madeira_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parafuso_tbl`
--
ALTER TABLE `parafuso_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prego_tbl`
--
ALTER TABLE `prego_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telha_tbl`
--
ALTER TABLE `telha_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios_tbl`
--
ALTER TABLE `usuarios_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes_tbl`
--
ALTER TABLE `clientes_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `madeiraum_tbl`
--
ALTER TABLE `madeiraum_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `madeira_tbl`
--
ALTER TABLE `madeira_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parafuso_tbl`
--
ALTER TABLE `parafuso_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prego_tbl`
--
ALTER TABLE `prego_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `telha_tbl`
--
ALTER TABLE `telha_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios_tbl`
--
ALTER TABLE `usuarios_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
