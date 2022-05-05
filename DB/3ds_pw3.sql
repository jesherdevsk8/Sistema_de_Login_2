-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 14-Abr-2022 às 01:05
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `3ds_pw3`
--
CREATE DATABASE IF NOT EXISTS `3ds_pw3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `3ds_pw3`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) CHARACTER SET utf8 NOT NULL,
  `logradouro` varchar(250) CHARACTER SET utf8 NOT NULL,
  `numero` int(11) NOT NULL,
  `cep` varchar(15) CHARACTER SET utf8 NOT NULL,
  `cidade` varchar(50) CHARACTER SET utf8 NOT NULL,
  `bairro` varchar(150) CHARACTER SET utf8 NOT NULL,
  `telefone` varchar(30) CHARACTER SET utf8 NOT NULL,
  `estado` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `logradouro`, `numero`, `cep`, `cidade`, `bairro`, `telefone`, `estado`) VALUES
(1, 'jesher', 'rua teste', 23, '14350-000', 'AltinÃ³polis', 'Vila Maria', '16991445456', 'Sao Paulo'),
(2, 'Bruno', 'Rua da esperanÃ§a no Batata', 666, '14350-000', 'Batataes', 'Centro', '(16)3761-5613', 'Rio Grande do Sul'),
(3, 'Thiago', 'rua teste', 12, '14350-000', 'Batataes', 'testeeee', '1665548145', 'Minas Gerais');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(150) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(250) CHARACTER SET utf8 NOT NULL,
  `administrador` varchar(1) CHARACTER SET utf8 NOT NULL,
  `data_cadastro` date NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `senha`, `administrador`, `data_cadastro`) VALUES
(1, 'jesher@gmail.com', '4297f44b13955235245b2497399d7a93', 's', '2022-03-24'),
(3, 'bruno@hetzner.com', '4297f44b13955235245b2497399d7a93', 'n', '2022-04-14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
