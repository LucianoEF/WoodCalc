-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2019 at 09:31 PM
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
(1, 'Físico', 'Luciano Eduardo Ferreira', '1970-01-01', '3025', '(45) 99107-7185', 'Luciano', 'Avenida Felipe Wandscheer', '3195', '85856660', 'Jardim Dom Pedro I', 'Casa', 'Foz do Iguaçu', 'PR', '092.079.829-27', '9.413.767-5'),
(5, 'Físico', '1a não funciona o apagar', '1970-01-01', '', 'não funciona o apagar', 'Não funciona o apagar', 'teste', '', 'teste', '', '', '', '', 'teste', 'teste'),
(6, 'Físico', '2a em diante funciona o apagar', '1970-01-01', '', 'funciona o apagar', 'funciona o apagar', 'teste', '', 'teste', '', '', '', '', 'teste', 'teste');

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
(1, 'madeiramacica', '1.3'),
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
  `classeservico` varchar(250) NOT NULL,
  `permanente` varchar(150) NOT NULL,
  `longaduracao` varchar(150) NOT NULL,
  `mediaduracao` varchar(150) NOT NULL,
  `curtaduracao` varchar(150) NOT NULL,
  `instantanea` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kmod_tbl`
--

INSERT INTO `kmod_tbl` (`id`, `tipomadeira`, `classeservico`, `permanente`, `longaduracao`, `mediaduracao`, `curtaduracao`, `instantanea`) VALUES
(1, 'macica', '1', '0.6', '0.7', '0.8', '0.9', '1.1'),
(3, 'macica', '2', '0.6', '0.7', '0.8', '0.9', '1.1'),
(4, 'macica', '3', '0.5', '0.55', '0.65', '0.7', '0.9'),
(5, 'lameladacolada', '1', '0.6', '0.7', '0.8', '0.9', '1.1'),
(6, 'lameladacolada', '2', '0.6', '0.7', '0.8', '0.9', '1.1'),
(7, 'lameladacolada', '3', '0.5', '0.55', '0.65', '0.7', '1.1'),
(8, 'lvl', '1', '0.6', '0.7', '0.8', '0.9', '1.1'),
(9, 'lvl', '2', '0.6', '0.7', '0.8', '0.9', '1.1'),
(10, 'lvl', '3', '0.5', '0.55', '0.65', '0.7', '0.9'),
(11, 'contraplacado', '1', '0.6', '0.7', '0.8', '0.9', '1.1'),
(12, 'contraplacado', '2', '0.6', '0.7', '0.8', '0.9', '1.1'),
(13, 'contraplacado', '3', '0.5', '0.55', '0.65', '0.7', '0.9'),
(14, 'osb2', '1', '0.3', '0.45', '0.65', '0.85', '1.1'),
(15, 'osb3-osb4', '1', '0.4', '0.5', '0.7', '0.9', '1.1'),
(16, 'osb3-osb4', '2', '0.3', '0.4', '0.55', '0.7', '0.9'),
(17, 'aglomeradoparticulasparte4', '1', '0.3', '0.45', '0.65', '0.85', '1.1'),
(18, 'aglomeradoparticulasparte5', '2', '0.2', '0.3', '0.45', '0.6', '0.8'),
(19, 'aglomeradoparticulasparte6', '1', '0.4', '0.5', '0.7', '0.9', '1.1'),
(20, 'aglomeradoparticulasparte7', '2', '0.3', '0.4', '0.55', '0.7', '0.9'),
(21, 'aglomeradosfibrasduro', '1', '0.3', '0.45', '0.65', '0.85', '1.1'),
(22, 'aglomeradosfibrasduro', '2', '0.2', '0.3', '0.45', '0.6', '0.8'),
(23, 'aglomeradosfibrasmediola', '1', '0.2', '0.4', '0.6', '0.8', '1.1'),
(24, 'aglomeradosfibrasmediohls', '1', '0.2', '0.4', '0.6', '0.8', '1.1'),
(25, 'aglomeradosfibrasmediohls', '2', '0', '0', '0', '0.45', '0.8'),
(26, 'aglomeradosfibrasmdf', '1', '0.2', '0.4', '0.6', '0.8', '1.1'),
(27, 'aglomeradosfibrasmdf', '2', '0', '0', '0', '0.45', '0.8');

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

INSERT INTO `madeira_tbl` (`id`, `categoria`, `tipo`, `nome`, `genero`, `especie`, `descricao`, `rbas`, `lmtproporcionalidade`, `ec0`, `fc0`, `fm`, `ft0`, `ft90`, `fv`) VALUES
(3, 'Madeira', 'Maciça', '1a não funciona o apagar', 'eucalypto', 'eucalypto-grandis', '1a não funciona o apagar', '12', '10', '13', '10', '10', '12', '32', '21');

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

--
-- Dumping data for table `prego_tbl`
--

INSERT INTO `prego_tbl` (`id`, `categoria`, `nome`, `tipo`, `descricao`) VALUES
(2, 'Prego', 'Prego tipo', 'prego 18x36', 'prego de cabeça dupla'),
(4, 'Prego', 'Prego tipo', 'prego 18x36', 'prego de cabeça dupla');

-- --------------------------------------------------------

--
-- Table structure for table `telha_tbl`
--

CREATE TABLE `telha_tbl` (
  `id` int(11) NOT NULL,
  `categoria` varchar(150) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `tipo` varchar(150) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `expessura` varchar(5) NOT NULL,
  `qtdapoios` varchar(5) NOT NULL,
  `distapoios` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `telha_tbl`
--

INSERT INTO `telha_tbl` (`id`, `categoria`, `nome`, `tipo`, `descricao`, `expessura`, `qtdapoios`, `distapoios`) VALUES
(1, 'Telha', '2a em diante funciona o apagar', 'Trapezoidal', '2a em diante funciona o apagar', '43', '2', '2,00');

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
(5, 'Luciano Eduardo Ferreira', '1995-05-08', '(45) 991077185', '(45) 99107-7185', 'Luciano', 'Avenida Felipe Wandscheer', '3195', '85856660', 'Jardim Dom Pedro I', 'Casa', 'Foz do Iguaçu', 'PR', '092.079.829-27', '9.413.767-5', 'Luciano', '24fc5715c26a0f8f11e84b9803b227e7', 'Administrador', 'Ativo'),
(7, '1a Nao funciona o apagar', '1970-01-01', '', 'xxxxx', 'Não funciona o apagar', 'não funciona o apagar', '', 'apagar nao funciona', '', '', '', '', 'nao funciona o apagar', 'nao funciona o apagar', 'nao funciona o apagar', 'e8d95a51f3af4a3b134bf6bb680a213a', 'Administrador', 'Ativo'),
(8, '2a em diante funciona', '1970-01-01', '', 'xxxxxxxxxxxxxx', 'funciona', 'funciona', '', 'funciona', '', '', '', '', 'funciona', 'funciona', 'funciona', 'e8d95a51f3af4a3b134bf6bb680a213a', 'Administrador', 'Ativo');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `madeiraum_tbl`
--
ALTER TABLE `madeiraum_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `madeira_tbl`
--
ALTER TABLE `madeira_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
