-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2019 at 04:45 AM
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
(1, 'Físico', 'Fulano de tal', '1995-05-08', '(11) 1111-1111', '(99) 99999-9999', 'Ciclano', 'Rua X', '123', '85.855-555', 'Bairro Y', 'Casa', 'Foz do Iguaçu', 'PR', '222.222.222-22', '33.333.333-3');

-- --------------------------------------------------------

--
-- Table structure for table `coeficienteym_tbl`
--

CREATE TABLE `coeficienteym_tbl` (
  `id` int(11) NOT NULL,
  `tipomadeira` varchar(150) NOT NULL,
  `ym` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coeficienteym_tbl`
--

INSERT INTO `coeficienteym_tbl` (`id`, `tipomadeira`, `ym`) VALUES
(1, 'macica', '1.3'),
(2, 'lameadacolada', '1.25'),
(3, 'lvl', '1.20'),
(4, 'contraplacado', '1.2'),
(5, 'osb', '1.2'),
(6, 'aglparticulas', '1.3');

-- --------------------------------------------------------

--
-- Table structure for table `kmod_tbl`
--

CREATE TABLE `kmod_tbl` (
  `id` int(11) NOT NULL,
  `tipomadeira` varchar(150) NOT NULL,
  `classeserv` varchar(250) NOT NULL,
  `classeduracao` varchar(150) NOT NULL,
  `kmod` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kmod_tbl`
--

INSERT INTO `kmod_tbl` (`id`, `tipomadeira`, `classeserv`, `classeduracao`, `kmod`) VALUES
(1, 'macica', 'classe1', 'permanente', '0.6'),
(3, 'macica', 'classe1', 'longoprazo', '0.7'),
(4, 'macica', 'classe1', 'medioprazo', '0.8'),
(5, 'macica', 'classe1', 'curtoprazo', '0.9'),
(6, 'macica', 'classe1', 'instantanea', '1.1'),
(7, 'macica', 'classe2', 'permanente', '0.6'),
(8, 'macica', 'classe2', 'longoprazo', '0.7'),
(9, 'macica', 'classe2', 'medioprazo', '0.8'),
(10, 'macica', 'classe2', 'curtoprazo', '0.9'),
(11, 'macica', 'classe2', 'instantanea', '1.1'),
(12, 'macica', 'classe3', 'permanente', '0.5'),
(13, 'macica', 'classe3', 'longoprazo', '0.55'),
(14, 'macica', 'classe3', 'medioprazo', '0.65'),
(15, 'macica', 'classe3', 'curtoprazo', '0.7'),
(16, 'macica', 'classe3', 'instantanea', '0.9'),
(17, 'lameladacolada', 'classe1', 'permanente', '0.6'),
(18, 'lameladacolada', 'classe1', 'longoprazo', '0.7'),
(19, 'lameladacolada', 'classe1', 'medioprazo', '0.8'),
(20, 'lameladacolada', 'classe1', 'curtoprazo', '0.9'),
(21, 'lameladacolada', 'classe1', 'instantanea', '1.1'),
(22, 'lameladacolada', 'classe2', 'permanente', '0.6'),
(23, 'lameladacolada', 'classe2', 'longoprazo', '0.7'),
(24, 'lameladacolada', 'classe2', 'medioprazo', '0.8'),
(25, 'lameladacolada', 'classe2', 'curtoprazo', '0.9'),
(26, 'lameladacolada', 'classe2', 'instantanea', '1.1'),
(27, 'lameladacolada', 'classe3', 'permanente', '0.5'),
(29, 'lameladacolada', 'classe3', 'longoprazo', '0.55'),
(30, 'lameladacolada', 'classe3', 'medioprazo', '0.65'),
(31, 'lameladacolada', 'classe3', 'curtoprazo', '0.7'),
(32, 'lameladacolada', 'classe3', 'instantanea', '0.9');

-- --------------------------------------------------------

--
-- Table structure for table `madeiraum_tbl`
--

CREATE TABLE `madeiraum_tbl` (
  `id` int(11) NOT NULL,
  `categoria` varchar(150) NOT NULL,
  `tipo` varchar(250) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `madeira_tbl`
--

CREATE TABLE `madeira_tbl` (
  `id` int(11) NOT NULL,
  `categoria` varchar(150) NOT NULL,
  `tipo` varchar(250) NOT NULL,
  `genero` varchar(150) NOT NULL,
  `especie` varchar(150) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `rbas` varchar(20) NOT NULL,
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

INSERT INTO `madeira_tbl` (`id`, `categoria`, `tipo`, `genero`, `especie`, `descricao`, `rbas`, `ec0`, `fc0`, `fm`, `ft0`, `ft90`, `fv`) VALUES
(8, '1', 'Maciça', 'E. grandis', 'Eucalypto-grandis', 'Eucalipto', '640', '12813', '40.3', '50', '70.2', '2.6', '7.0'),
(9, '1', 'Lamelada Colada', 'E. europhylla', 'Eucalyptus europhylla', 'Eucalipto', '739', '13166', '46', '50', '85.1', '4.1', '8.3');

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
  `tipo` varchar(150) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `telha_tbl`
--

CREATE TABLE `telha_tbl` (
  `id` int(11) NOT NULL,
  `categoria` varchar(150) NOT NULL,
  `tipo` varchar(150) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `pesoproprio` varchar(10) NOT NULL,
  `expessura` varchar(5) NOT NULL,
  `qtdapoios` varchar(5) NOT NULL,
  `distapoios` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `telha_tbl`
--

INSERT INTO `telha_tbl` (`id`, `categoria`, `tipo`, `descricao`, `pesoproprio`, `expessura`, `qtdapoios`, `distapoios`) VALUES
(3, '3', 'Trapezoidal', 'Telha de cobertura', '5', '43', '2', '2.00'),
(4, '3', 'Ondulada', 'Telha de cobertura', '6', '50', '2', '2.50');

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
(5, 'Luciano Eduardo Ferreira', '1995-05-08', '(45) 991077185', '(45) 99107-7185', 'Luciano', 'Avenida Felipe Wandscheer', '3195', '85856660', 'Jardim Dom Pedro I', 'Casa', 'Foz do Iguaçu', 'PR', '092.079.829-27', '9.413.767-5', 'Luciano', '24fc5715c26a0f8f11e84b9803b227e7', 'Administrador', 'Ativo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes_tbl`
--
ALTER TABLE `clientes_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coeficienteym_tbl`
--
ALTER TABLE `coeficienteym_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kmod_tbl`
--
ALTER TABLE `kmod_tbl`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coeficienteym_tbl`
--
ALTER TABLE `coeficienteym_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kmod_tbl`
--
ALTER TABLE `kmod_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `madeiraum_tbl`
--
ALTER TABLE `madeiraum_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `madeira_tbl`
--
ALTER TABLE `madeira_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios_tbl`
--
ALTER TABLE `usuarios_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
