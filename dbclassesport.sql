-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Set-2018 às 02:52
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbclassesport`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `desc_cargo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deletado` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `desc_cargo`, `deletado`) VALUES
(1, 'Programador JÃºnior', '0'),
(2, 'Auxiliar Administrativo', '0'),
(3, 'Pedreiro', '0'),
(4, 'Ajudante', '0'),
(5, 'Auxiliar de RH', '0'),
(6, 'Senior em AnÃ¡lise e Desenvolvimento de Sistemas', '0'),
(7, 'Auxilir de ProgramaÃ§Ã£o', '0'),
(8, 'Programador Pleno', '0'),
(9, 'Programador SÃªnior', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cli` int(11) NOT NULL,
  `nome_cli` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel_cli` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email_cli` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpf_cli` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnpj_cli` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deletado` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cli`, `nome_cli`, `tel_cli`, `email_cli`, `cpf_cli`, `cnpj_cli`, `deletado`) VALUES
(17, 'fddfg', '453453', 'thiago@thiago.com', '44654545634', '45355555555555', '0'),
(18, 'dsdas', '233123', 'thiago@thiago.com', '', '', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `nome_dep` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deletado` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`id`, `nome_dep`, `deletado`) VALUES
(1, 'TI', '1'),
(2, 'GerÃªncia', '1'),
(3, 'AdministraÃ§Ã£o', '0'),
(4, 'Setor 7', '0'),
(5, 'Limpeza', '0'),
(6, 'GerÃªncia', '0'),
(7, 'Cozinha', '0'),
(8, 'Biblioteca', '0'),
(9, 'Sala de suprimentos', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escala`
--

CREATE TABLE `escala` (
  `id_esc` int(11) NOT NULL,
  `desc_esc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deletado` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `escala`
--

INSERT INTO `escala` (`id_esc`, `desc_esc`, `deletado`) VALUES
(1, '6 x 1', '0'),
(2, '5 x 2', '0'),
(3, '12 x 36', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque_mtp`
--

CREATE TABLE `estoque_mtp` (
  `id_est_mtp` int(11) NOT NULL,
  `id_mtp` int(11) NOT NULL,
  `valor_compra_mtp` double(10,2) NOT NULL,
  `id_for` int(11) NOT NULL,
  `qtd_est_mtp` double(10,3) NOT NULL,
  `qtd_entrada` double(10,3) NOT NULL,
  `qtd_perda_mtp` double(10,3) NOT NULL DEFAULT '0.000',
  `valor_total` double(10,2) NOT NULL,
  `deletado` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `estoque_mtp`
--

INSERT INTO `estoque_mtp` (`id_est_mtp`, `id_mtp`, `valor_compra_mtp`, `id_for`, `qtd_est_mtp`, `qtd_entrada`, `qtd_perda_mtp`, `valor_total`, `deletado`) VALUES
(1, 10, 500.00, 14, 50.000, 50.000, 0.000, 25000.00, '1'),
(2, 15, 1000.00, 24, 500.000, 500.000, 0.000, 500000.00, '0'),
(3, 17, 60.00, 14, 50.000, 50.000, 0.000, 3000.00, '0'),
(4, 5, 599.00, 10, 99.000, 99.000, 0.000, 59301.00, '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque_prod`
--

CREATE TABLE `estoque_prod` (
  `id_est_prod` int(9) UNSIGNED ZEROFILL NOT NULL,
  `id_prod` int(11) NOT NULL,
  `qtd_est_prod` double(10,3) NOT NULL,
  `qtd_vendido_prod` double(10,3) DEFAULT NULL,
  `qtd_entrada` double(10,3) NOT NULL,
  `valor_venda` double(10,2) NOT NULL,
  `valor_total` double(10,2) NOT NULL,
  `deletado` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `estoque_prod`
--

INSERT INTO `estoque_prod` (`id_est_prod`, `id_prod`, `qtd_est_prod`, `qtd_vendido_prod`, `qtd_entrada`, `valor_venda`, `valor_total`, `deletado`) VALUES
(000000059, 16, 200.000, NULL, 200.000, 9.00, 1800.00, '0'),
(000000060, 25, 50.000, NULL, 50.000, 20.00, 1000.00, '0'),
(000000061, 18, 50.000, NULL, 50.000, 20.50, 1000.00, '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `forma_pagamento`
--

CREATE TABLE `forma_pagamento` (
  `id_fp` int(11) NOT NULL,
  `desc_fp` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `deletado` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `forma_pagamento`
--

INSERT INTO `forma_pagamento` (`id_fp`, `desc_fp`, `deletado`) VALUES
(1, 'Boleto', '0'),
(2, 'Débito', '0'),
(3, 'Crédito', '0'),
(4, 'Dinheiro', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_for` int(11) NOT NULL,
  `nome_for` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel_for` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email_for` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cnpj_for` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `data_cad` date NOT NULL,
  `deletado` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_for`, `nome_for`, `tel_for`, `email_for`, `cnpj_for`, `data_cad`, `deletado`) VALUES
(10, 'Renault', '1111111111', 'sadasdasdas@gmail.com', '111111111111', '2018-07-12', '0'),
(12, 'Lacta', '55555555555', 'lacta@gmail.com', '111111111111', '2018-07-12', '0'),
(13, 'Avon', '1111111111', 'sadasdasdas@gmail.com', '111111111111', '2018-07-12', '0'),
(14, 'NestlÃ©', '55555555555', 'nestle@gmail.com', '111111111111', '2018-07-12', '0'),
(15, 'MarisÃ¡', '561515611', 'asdsadsadsad@gmail.com', '555555555555', '2018-07-13', '0'),
(24, 'Garoto', '1111111111', 'sadasdasdas@gmail.com', '111111111111', '2018-07-14', '0'),
(25, 'Carrefour', '55555555555', 'asdsadsadsad@gmail.com', '555555555555', '2018-07-21', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_func` int(11) NOT NULL,
  `nome_func` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end_func` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel_func` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email_func` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `salario` double(10,2) NOT NULL,
  `data_entrada` date NOT NULL,
  `data_saida` date DEFAULT NULL,
  `turno` int(11) NOT NULL,
  `escala` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `cpf_func` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `departamento` int(11) NOT NULL,
  `deletado` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_func`, `nome_func`, `end_func`, `tel_func`, `email_func`, `id_cargo`, `salario`, `data_entrada`, `data_saida`, `turno`, `escala`, `id_login`, `cpf_func`, `departamento`, `deletado`) VALUES
(10, 'Administrador', 'asdasdasd', '11111111111', 'rafa@gmail.com', 1, 1200.00, '2018-07-13', NULL, 1, 3, 1, '555.555.555-05', 3, '0'),
(11, 'Lucas Zago', 'asdsadasdsad', '11111111111', 'sadasdasdas@gmail.com', 1, 1000.00, '2018-07-13', NULL, 1, 2, 8, '564515154', 2, '0'),
(12, 'Bruno Henrique', 'asasasdasd', '11111111111', 'sadasdasdas@gmail.com', 2, 1500.00, '2018-07-13', NULL, 2, 2, 9, '555.666.777-65', 2, '0'),
(13, 'Termo', 'asasasdasd', '561515611', 'termo@gmail.com', 1, 5500.00, '2018-07-14', NULL, 1, 2, 7, '555.666.777-65', 2, '0'),
(14, 'Thiago', 'asdsadasd', '11111111111', 'thiago@gmail.com', 1, 1500.00, '2018-07-15', NULL, 1, 1, 6, '15165165165', 1, '0'),
(15, 'Joao de Araujo', 'asdsadasd', '11111111111', 'asdasd@asd', 1, 5000.00, '2018-07-18', NULL, 1, 2, 5, '15165165165', 2, '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hist`
--

CREATE TABLE `hist` (
  `id_h` int(11) NOT NULL,
  `acao_h` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `login_alt` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `data_hora` datetime NOT NULL,
  `deletado` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `hist`
--

INSERT INTO `hist` (`id_h`, `acao_h`, `login_alt`, `data_hora`, `deletado`) VALUES
(124, 'Cadastrou um produto com o nome Moto G4', 'admin', '2018-07-20 19:45:41', '1'),
(125, 'Cadastrou um produto com o nome Moto G5', 'admin', '2018-07-20 19:45:47', '1'),
(126, 'Adicionou o produto Moto G3 no estoque', 'admin', '2018-07-20 19:48:39', '1'),
(127, 'Adicionou o produto Moto G2 no estoque', 'admin', '2018-07-20 19:48:51', '1'),
(128, 'Adicionou o produto Moto G4 no estoque', 'admin', '2018-07-20 19:49:02', '0'),
(131, 'Adicionou o produto Capsula no estoque', 'admin', '2018-07-20 20:40:45', '0'),
(132, 'Deletou a refÃªrencia 000000010 do estoque de produtos', 'admin', '2018-07-20 20:41:21', '0'),
(133, 'Deletou a refÃªrencia 000000012 do estoque de produtos', 'admin', '2018-07-20 20:41:38', '0'),
(134, 'Deletou a refÃªrencia 000000016 do estoque de produtos', 'admin', '2018-07-20 20:41:49', '0'),
(135, 'Cadastrou um material com o nome Parafuso', 'admin', '2018-07-20 20:44:18', '0'),
(136, 'Cadastrou um produto com o nome McDonalds', 'admin', '2018-07-20 21:18:00', '0'),
(137, 'Cadastrou um material com o nome Casca de ovo', 'admin', '2018-07-20 22:08:21', '0'),
(138, 'Cadastrou um material com o nome manteiga', 'admin', '2018-07-20 22:08:24', '0'),
(139, 'Cadastrou um material com o nome Chocolate', 'admin', '2018-07-20 22:08:28', '0'),
(140, 'Cadastrou um material com o nome Massa', 'admin', '2018-07-20 22:08:31', '0'),
(141, 'Alterou o nome do material Massa para Massaa', 'admin', '2018-07-20 23:52:30', '0'),
(142, 'Alterou o nome do material Massaa para Massaaa', 'admin', '2018-07-20 23:53:13', '0'),
(143, 'Alterou o nome do material Massaaa para Massaaaa', 'admin', '2018-07-20 23:53:29', '0'),
(144, 'Alterou o nome do material Massaaaa para Massaaa', 'admin', '2018-07-20 23:53:43', '0'),
(145, 'Alterou o nome do material Massaaa para Massaaaa', 'admin', '2018-07-20 23:54:02', '0'),
(146, 'Alterou o nome do material Massaaaa para Massaaaass', 'admin', '2018-07-20 23:54:22', '0'),
(147, 'Alterou o nome do material Massaaaass para Massaaaasas', 'admin', '2018-07-20 23:54:53', '1'),
(148, 'Alterou o nome do material Massaaaasas para Massaaaasass', 'admin', '2018-07-20 23:55:14', '1'),
(149, 'Alterou o nome do material Massaaaasass para Massaaaasassa', 'admin', '2018-07-20 23:55:22', '1'),
(150, 'Alterou o nome do material Massaaaasassa para Massaaaa', 'admin', '2018-07-20 23:55:34', '0'),
(151, 'Alterou o nome do material Massaaaa para Massaaaaa', 'admin', '2018-07-20 23:55:44', '0'),
(152, 'Alterou o nome do material Massaaaaa para Massaaaaaa', 'admin', '2018-07-21 00:03:32', '0'),
(153, 'Alterou o nome do material Massaaaaaa para Massaaaa', 'admin', '2018-07-21 00:05:08', '0'),
(154, 'Alterou o cliente Exemplo - CPF: 1111115111', 'admin', '2018-07-21 00:09:51', '0'),
(155, 'Cadastrou um cliente com o nome Alvin', 'admin', '2018-07-21 00:27:59', '0'),
(156, 'Alterou o cliente Alvin 2 - CPF: 1111111111', 'admin', '2018-07-21 00:28:13', '0'),
(157, 'Deletou o cliente Thiago', 'admin', '2018-07-21 00:29:29', '0'),
(158, 'Cadastrou um fornecedor com o nome Carrefour', 'admin', '2018-07-21 00:44:09', '1'),
(159, 'Deletou o cliente Alvin 2', 'admin', '2018-07-21 00:57:07', '0'),
(160, 'Deletou a refÃªrencia 000000048 do estoque de produtos', 'admin', '2018-07-21 01:23:38', '0'),
(161, 'Adicionou o produto Moto G1 no estoque', 'admin', '2018-07-21 14:31:14', '1'),
(162, 'Cadastrou um material com o nome Sooo', 'admin', '2018-07-21 15:23:19', '1'),
(163, 'Cadastrou um material com o nome Cuuu', 'admin', '2018-07-21 15:23:23', '0'),
(164, 'Cadastrou um material com o nome Teeei', 'admin', '2018-07-21 15:23:27', '0'),
(165, 'Cadastrou um material com o nome Sorvete', 'admin', '2018-07-21 15:32:31', '0'),
(166, 'Cadastrou um material com o nome Cachorro', 'admin', '2018-07-21 15:32:39', '0'),
(167, 'Cadastrou um material com o nome Espuma Satanica', 'admin', '2018-07-21 15:32:45', '1'),
(168, 'Cadastrou um material com o nome Alabassuira', 'admin', '2018-07-21 15:32:48', '1'),
(169, 'Cadastrou um material com o nome Alasbassa', 'admin', '2018-07-21 15:32:53', '0'),
(170, 'Cadastrou um material com o nome Saluimandra', 'admin', '2018-07-21 15:32:58', '0'),
(171, 'Cadastrou um material com o nome sadasd', 'admin', '2018-07-21 15:33:05', '0'),
(172, 'Cadastrou um material com o nome asdsad', 'admin', '2018-07-21 15:33:07', '1'),
(173, 'Cadastrou um material com o nome asdasd', 'admin', '2018-07-21 15:33:10', '1'),
(174, 'Cadastrou um cliente com o nome Termo', 'admin', '2018-07-21 16:48:41', '0'),
(175, 'Adicionou o produto Moto G2 no estoque', 'admin', '2018-07-21 16:50:31', '0'),
(176, 'Cadastrou um material com o nome Rafa', 'admin', '2018-07-21 16:51:55', '0'),
(177, 'Cadastrou um material com o nome CÃº', 'admin', '2018-07-21 16:52:16', '0'),
(178, 'Cadastrou um material com o nome Rafa', 'admin', '2018-07-21 16:52:38', '0'),
(180, 'Deletou o fornecedor Carrefour', 'admin', '2018-07-22 05:00:55', '0'),
(181, 'Cadastrou um material com o nome Colchonete de Ouro', 'admin', '2018-07-22 05:21:56', '0'),
(182, 'Cadastrou um material com o nome xczxcxz', 'admin', '2018-07-22 05:39:01', '0'),
(183, 'Cadastrou um material com o nome sadasdsad', 'admin', '2018-07-22 05:39:34', '0'),
(184, 'Cadastrou um material com o nome Massaaaa', 'admin', '2018-07-22 05:40:39', '0'),
(185, 'Cadastrou um material com o nome aaaa', 'admin', '2018-07-22 05:41:01', '0'),
(186, 'Cadastrou um material com o nome Massaaaa', 'admin', '2018-07-22 05:42:40', '0'),
(187, 'Cadastrou um material com o nome Raul Dias', 'admin', '2018-07-22 05:44:34', '0'),
(188, 'Cadastrou um material com o nome Raul Dias', 'admin', '2018-07-22 05:45:37', '0'),
(189, 'Cadastrou um material com o nome Gustavo', 'admin', '2018-07-22 05:45:53', '0'),
(190, 'Adicionou o produto Moto G4 no estoque', 'rafael.araujo', '2018-07-22 05:59:22', '0'),
(191, 'Adicionou o produto Marlboru no estoque', 'rafael.araujo', '2018-07-22 05:59:39', '0'),
(192, 'Alterou o funcionÃ¡rio Filho da Kita - CPF: 555.666.777-65', 'rafael.araujo', '2018-07-24 12:10:42', '0'),
(193, 'Alterou o funcionÃ¡rio Filho da Put - CPF: 555.666.777-65', 'rafael.araujo', '2018-07-24 12:56:43', '0'),
(194, 'Alterou o fornecedor NestlÃ© - CNPJ: 111111111111', 'admin', '2018-07-24 23:14:05', '0'),
(195, 'O usuÃ¡rio Administrador alterou sua prÃ³pria senha', 'admin', '2018-07-25 13:36:57', '0'),
(196, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 13:37:49', '1'),
(197, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 13:38:29', '0'),
(198, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 13:39:18', '0'),
(199, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 13:40:10', '0'),
(200, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 13:40:34', '0'),
(201, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 13:40:49', '0'),
(202, 'Deletou o usuÃ¡rio Administrador', 'rafael.araujo', '2018-07-25 13:41:34', '0'),
(203, 'Cadastrou um usuÃ¡rio com o nome Administrador', 'rafael.araujo', '2018-07-25 13:41:49', '0'),
(204, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 13:44:12', '0'),
(205, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 13:44:47', '0'),
(206, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 13:47:48', '0'),
(207, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 13:48:29', '0'),
(208, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 13:49:37', '0'),
(209, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 13:49:58', '0'),
(210, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 13:50:08', '0'),
(211, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 13:50:30', '0'),
(212, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 13:50:42', '0'),
(213, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 13:51:57', '0'),
(214, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 13:52:21', '0'),
(215, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 13:54:01', '0'),
(216, 'Cadastrou um usuÃ¡rio com o nome rafael', 'admin', '2018-07-25 13:55:06', '0'),
(217, 'O usuÃ¡rio rafael alterou sua prÃ³pria senha', 'rafa', '2018-07-25 14:12:26', '0'),
(218, 'O usuÃ¡rio rafael alterou sua prÃ³pria senha', 'rafa', '2018-07-25 14:13:05', '0'),
(219, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 14:14:03', '0'),
(220, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 14:15:39', '0'),
(221, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 14:16:53', '0'),
(222, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 14:17:26', '0'),
(223, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 14:17:38', '0'),
(224, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 14:19:09', '0'),
(225, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 14:19:22', '0'),
(226, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 14:19:43', '0'),
(227, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 14:20:09', '0'),
(228, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 14:20:52', '0'),
(229, 'O usuÃ¡rio Rafael de Araujo Procopio alterou sua prÃ³pria senha', 'rafael.araujo', '2018-07-25 14:21:25', '0'),
(230, 'Deletou o usuÃ¡rio Administrador', 'rafael.araujo', '2018-07-25 14:48:46', '0'),
(231, 'Cadastrou um usuÃ¡rio com o nome Administrador', 'rafael.araujo', '2018-07-25 14:48:59', '0'),
(232, 'Deletou o usuÃ¡rio Administrador', 'admin', '2018-07-25 14:50:32', '0'),
(233, 'Cadastrou um usuÃ¡rio com o nome Rafael Araujo', 'admin', '2018-07-25 14:50:58', '0'),
(234, 'Cadastrou um usuÃ¡rio com o nome Administrador', 'rafa.araujo', '2018-07-25 14:54:07', '0'),
(235, 'O usuÃ¡rio Administrador alterou sua prÃ³pria senha', 'admin', '2018-07-25 14:55:37', '0'),
(236, 'O usuÃ¡rio Administrador alterou sua prÃ³pria senha', 'admin', '2018-07-25 14:55:58', '0'),
(237, 'O usuÃ¡rio Administrador alterou sua prÃ³pria senha', 'admin', '2018-07-25 14:56:18', '0'),
(238, 'Deletou o usuÃ¡rio Administrador', 'admin', '2018-07-25 14:58:27', '0'),
(239, 'Cadastrou um usuÃ¡rio com o nome Administrador', 'rafa.araujo', '2018-07-25 14:59:46', '0'),
(240, 'Cadastrou um usuÃ¡rio com o nome Administrador', 'rafa.araujo', '2018-07-25 15:02:00', '0'),
(241, 'Cadastrou um usuÃ¡rio com o nome Rafael de Araujo', 'admin', '2018-07-25 15:07:27', '0'),
(242, 'Cadastrou um usuÃ¡rio com o nome Gustavo', 'admin', '2018-07-25 15:13:41', '0'),
(243, 'Cadastrou um usuÃ¡rio com o nome Joao de Araujo', 'admin', '2018-07-25 15:18:59', '0'),
(244, 'Cadastrou um usuÃ¡rio com o nome teste', 'admin', '2018-07-25 15:28:20', '0'),
(245, 'Cadastrou um usuÃ¡rio com o nome teste', 'admin', '2018-07-25 15:35:55', '0'),
(246, 'Cadastrou um usuÃ¡rio com o nome Maria de Fatima', 'teste', '2018-07-25 15:38:55', '0'),
(247, 'Cadastrou um usuÃ¡rio com o nome Administrador', 'fatima', '2018-07-25 15:45:00', '0'),
(248, 'Cadastrou um usuÃ¡rio com o nome Administrador', 'admin', '2018-07-25 16:53:48', '0'),
(249, 'Cadastrou um usuÃ¡rio com o nome Raul Dias', 'admin', '2018-07-25 16:59:31', '0'),
(250, 'Cadastrou um usuÃ¡rio com o nome Rafael de Araujo', 'raul.dias', '2018-07-25 17:30:57', '0'),
(251, 'Cadastrou um usuÃ¡rio com o nome Maria de Fatima Marcondes', 'rafaeldearaujop95', '2018-07-25 17:33:45', '0'),
(252, 'O usuÃ¡rio Maria de Fatima Marcondes alterou sua prÃ³pria senha', 'm.marcondes', '2018-07-25 17:37:14', '1'),
(256, 'Deletou o produto AAAA', 'admin', '2018-07-28 12:03:21', '0'),
(257, 'Deletou o produto McDonalds', 'admin', '2018-07-28 12:09:54', '0'),
(258, 'Deletou o produto Mc Donalds', 'admin', '2018-07-28 12:10:26', '0'),
(259, 'Deletou o cliente Joao', 'admin', '2018-07-28 21:26:09', '0'),
(260, 'Deletou a refÃªrencia 000000051 do estoque de produtos', 'admin', '2018-07-28 21:40:18', '0'),
(262, 'Alterou o cliente Termo Lino - CPF: 1111111112', 'admin', '2018-07-28 23:26:22', '0'),
(263, 'Alterou o cliente Termo - CPF: 1111111112', 'admin', '2018-07-28 23:26:48', '0'),
(264, 'Alterou o cliente Termo Lino - CPF: 1111111112', 'admin', '2018-07-28 23:27:05', '0'),
(265, 'Cadastrou um produto com o nome Cotonete', 'admin', '2018-07-29 08:15:20', '0'),
(267, 'Alterou o usuario Administrador', 'admin', '2018-07-29 09:48:50', '0'),
(268, 'Deletou o usuÃ¡rio Administrador', 'admin', '2018-07-29 09:52:43', '0'),
(269, 'Deletou o usuÃ¡rio Rafael de Araujo', 'rafaeldearaujop95', '2018-07-29 09:57:05', '1'),
(270, 'Deletou o produto Mc Donalds', 'rafaeldearaujop95', '2018-07-29 09:59:10', '1'),
(271, 'Deletou o cliente Cota', 'rafaeldearaujop95', '2018-07-29 10:28:48', '0'),
(272, 'Adicionou o produto Churros Chocolate no estoque', 'rafaeldearaujop95', '2018-07-29 10:30:52', '0'),
(273, 'Alterou o nome do produto Churros Chocolate para Churros de Chocolate', 'rafaeldearaujop95', '2018-07-29 10:31:26', '0'),
(274, 'Deletou o material Espuma', 'rafaeldearaujop95', '2018-07-29 10:37:57', '0'),
(275, 'Deletou o material Metal', 'rafaeldearaujop95', '2018-07-29 10:39:53', '0'),
(276, 'Deletou o material CÃº', 'rafaeldearaujop95', '2018-07-29 10:40:03', '0'),
(277, 'Deletou o material CÃº', 'rafaeldearaujop95', '2018-07-29 10:40:11', '0'),
(278, 'O usuÃ¡rio Administrador alterou sua prÃ³pria senha', 'admin', '2018-07-29 10:44:55', '0'),
(279, 'Alterou a referÃªncia 000000052 no estoque de produtos', 'admin', '2018-07-29 10:45:35', '0'),
(280, 'Deletou o cliente Termo Lino', 'admin', '2018-07-29 12:38:50', '0'),
(281, 'Alterou o cliente Exemplo - CPF: 1111115111', 'admin', '2018-07-29 12:39:00', '0'),
(282, 'Adicionou o produto Celular no estoque', 'admin', '2018-07-29 13:00:20', '0'),
(283, 'O usuÃ¡rio Administrador alterou sua prÃ³pria senha', 'admin', '2018-07-29 13:08:36', '0'),
(284, 'Adicionou o produto Capsula no estoque', 'admin', '2018-07-29 13:39:52', '0'),
(285, 'Cadastrou um cliente com o nome Flavio Siqueira', 'admin', '2018-07-29 13:40:13', '0'),
(286, 'Deletou o cliente Flavio Siqueira', 'admin', '2018-07-29 13:40:19', '0'),
(287, 'Alterou a descriÃ§Ã£o do cargo Programador Júnior para Programador Junior', 'admin', '2018-07-30 12:12:19', '1'),
(288, 'Alterou a descriÃ§Ã£o do cargo Programador Junior para Programador JÃºnior', 'admin', '2018-07-30 17:50:49', '0'),
(289, 'Cadastrou um cliente com o nome Ruan', 'admin', '2018-07-31 00:06:42', '0'),
(290, 'Cadastrou um cliente com o nome Igreja', 'admin', '2018-07-31 00:07:01', '0'),
(291, 'Cadastrou um cliente com o nome Escola', 'admin', '2018-07-31 00:07:16', '1'),
(292, 'Cadastrou um cargo com a descriÃ§Ã£o Pedreiro', 'admin', '2018-07-31 00:10:09', '0'),
(293, 'Cadastrou um cargo com a descriÃ§Ã£o Ajudante', 'admin', '2018-07-31 00:10:15', '0'),
(294, 'Cadastrou um cargo com a descriÃ§Ã£o Auxiliar de RH', 'admin', '2018-07-31 00:10:29', '0'),
(295, 'Cadastrou um cargo com a descriÃ§Ã£o Senior em AnÃ¡lise e Desenvolvimento de Sistemas', 'admin', '2018-07-31 00:10:45', '0'),
(296, 'Cadastrou um cargo com a descriÃ§Ã£o Auxilir de ProgramaÃ§Ã£o', 'admin', '2018-07-31 00:10:57', '0'),
(297, 'Cadastrou um cargo com a descriÃ§Ã£o Programador Pleno', 'admin', '2018-07-31 00:11:06', '0'),
(298, 'Cadastrou um cargo com a descriÃ§Ã£o Programador SÃªnior', 'admin', '2018-07-31 00:11:14', '0'),
(299, 'Adicionou o produto Moto G2 no estoque', 'admin', '2018-07-31 01:12:41', '0'),
(300, 'O usuÃ¡rio Administrador alterou sua prÃ³pria senha', 'admin', '2018-07-31 01:37:20', '0'),
(301, 'O usuÃ¡rio Administrador alterou sua prÃ³pria senha', 'admin', '2018-07-31 01:37:44', '0'),
(302, 'Alterou o funcionÃ¡rio Administrador - CPF: 555.555.555-05', 'admin', '2018-07-31 10:00:35', '0'),
(303, 'Cadastrou um usuÃ¡rio com o nome Joao de Araujo', 'admin', '2018-07-31 10:00:59', '0'),
(304, 'Cadastrou um usuÃ¡rio com o nome Thiago', 'admin', '2018-07-31 10:01:27', '0'),
(305, 'Cadastrou um usuÃ¡rio com o nome Termo', 'admin', '2018-07-31 10:01:37', '0'),
(306, 'Cadastrou um usuÃ¡rio com o nome Zago ZÃ©', 'admin', '2018-07-31 10:01:48', '0'),
(307, 'Alterou o funcionÃ¡rio Joao de Araujo - CPF: 15165165165', 'admin', '2018-07-31 10:02:09', '0'),
(308, 'Alterou o funcionÃ¡rio Thiago - CPF: 15165165165', 'admin', '2018-07-31 10:02:23', '0'),
(309, 'Alterou o funcionÃ¡rio Termo - CPF: 555.666.777-65', 'admin', '2018-07-31 10:02:31', '0'),
(310, 'Alterou o funcionÃ¡rio Lucas Zago - CPF: 564515154', 'admin', '2018-07-31 10:02:49', '0'),
(311, 'Cadastrou um usuÃ¡rio com o nome Bruno Henrique', 'admin', '2018-07-31 10:03:11', '0'),
(312, 'Deletou a refÃªrencia 000000055 do estoque de produtos', 'admin', '2018-07-31 10:22:33', '0'),
(313, 'Deletou a refÃªrencia 000000054 do estoque de produtos', 'admin', '2018-07-31 10:22:37', '0'),
(314, 'Deletou a refÃªrencia 000000053 do estoque de produtos', 'admin', '2018-07-31 10:22:41', '0'),
(315, 'Deletou a refÃªrencia 000000052 do estoque de produtos', 'admin', '2018-07-31 10:22:44', '0'),
(316, 'Deletou a refÃªrencia 000000049 do estoque de produtos', 'admin', '2018-07-31 10:22:48', '0'),
(317, 'Deletou a refÃªrencia 000000048 do estoque de produtos', 'admin', '2018-07-31 10:22:55', '0'),
(318, 'Deletou a refÃªrencia 000000047 do estoque de produtos', 'admin', '2018-07-31 10:22:58', '0'),
(319, 'Deletou a refÃªrencia 000000046 do estoque de produtos', 'admin', '2018-07-31 10:23:04', '0'),
(320, 'Deletou a refÃªrencia 000000045 do estoque de produtos', 'admin', '2018-07-31 10:23:07', '0'),
(321, 'Deletou a refÃªrencia 000000044 do estoque de produtos', 'admin', '2018-07-31 10:23:15', '0'),
(322, 'Deletou a refÃªrencia 000000043 do estoque de produtos', 'admin', '2018-07-31 10:23:19', '0'),
(323, 'Deletou a refÃªrencia 000000041 do estoque de produtos', 'admin', '2018-07-31 10:23:23', '0'),
(324, 'Deletou a refÃªrencia 000000040 do estoque de produtos', 'admin', '2018-07-31 10:23:26', '0'),
(325, 'Deletou a refÃªrencia 000000032 do estoque de produtos', 'admin', '2018-07-31 10:23:29', '0'),
(326, 'Deletou a refÃªrencia 000000030 do estoque de produtos', 'admin', '2018-07-31 10:23:31', '0'),
(327, 'Deletou a refÃªrencia 000000018 do estoque de produtos', 'admin', '2018-07-31 10:23:34', '0'),
(328, 'Deletou a refÃªrencia 000000017 do estoque de produtos', 'admin', '2018-07-31 10:23:37', '0'),
(329, 'Adicionou o produto Chocolate no estoque', 'admin', '2018-07-31 10:28:47', '0'),
(330, 'Deletou a refÃªrencia 000000056 do estoque de produtos', 'admin', '2018-07-31 10:33:49', '0'),
(331, 'Adicionou o produto Celular no estoque', 'admin', '2018-07-31 10:37:40', '0'),
(332, 'Adicionou o produto Marlboru no estoque', 'admin', '2018-07-31 10:50:31', '0'),
(333, 'Adicionou o produto Celular no estoque', 'admin', '2018-07-31 10:53:12', '0'),
(334, 'Alterou a referÃªncia 000000059 no estoque de produtos', 'admin', '2018-07-31 10:54:13', '0'),
(335, 'O usuÃ¡rio  alterou seu prÃ³prio nome', 'admin', '2018-07-31 11:53:03', '0'),
(336, 'O usuÃ¡rio  alterou seu prÃ³prio nome', 'admin', '2018-07-31 11:54:01', '0'),
(337, 'O usuÃ¡rio  alterou seu prÃ³prio nome', 'admin', '2018-07-31 11:54:59', '0'),
(338, 'O usuÃ¡rio  alterou seu prÃ³prio nome', 'admin', '2018-07-31 11:55:22', '0'),
(339, 'O usuÃ¡rio  alterou seu prÃ³prio nome', 'admin', '2018-07-31 11:57:24', '0'),
(340, 'O usuÃ¡rio  alterou seu prÃ³prio nome', 'admin', '2018-07-31 11:57:43', '0'),
(341, 'O usuÃ¡rio  alterou seu prÃ³prio nome', 'admin', '2018-07-31 11:57:50', '0'),
(342, 'O usuÃ¡rio  alterou seu prÃ³prio nome', 'admin', '2018-07-31 11:58:07', '0'),
(343, 'O usuÃ¡rio  alterou seu prÃ³prio nome', 'admin', '2018-07-31 11:58:46', '0'),
(344, 'O usuÃ¡rio  alterou seu prÃ³prio nome', 'admin', '2018-07-31 11:59:08', '0'),
(345, 'O usuÃ¡rio  alterou seu prÃ³prio nome', 'admin', '2018-07-31 12:05:35', '0'),
(346, 'O usuÃ¡rio  alterou seu prÃ³prio nome', 'admin', '2018-07-31 12:05:42', '0'),
(347, 'O usuÃ¡rio Administradora alterou seu prÃ³prio nome', 'admin', '2018-07-31 12:06:58', '0'),
(348, 'O usuÃ¡rio Administradora alterou seu prÃ³prio nome', 'admin', '2018-07-31 12:07:01', '0'),
(349, 'O usuÃ¡rio Administrador alterou seu prÃ³prio nome', 'admin', '2018-07-31 12:07:38', '0'),
(350, 'O usuÃ¡rio 1 alterou seu prÃ³prio nome', 'admin', '2018-07-31 12:07:48', '0'),
(351, 'Adicionou o produto Marlboru no estoque', 'admin', '2018-07-31 12:08:10', '0'),
(352, 'Alterou a referÃªncia 000000060 no estoque de produtos', 'admin', '2018-07-31 12:10:16', '0'),
(353, 'Deletou o produto Marlboru', 'admin', '2018-07-31 12:10:24', '0'),
(354, 'Alterou a referÃªncia 000000059 no estoque de produtos', 'admin', '2018-07-31 12:10:47', '0'),
(355, 'Cadastrou um cliente com o nome Zago ZÃ©', 'admin', '2018-07-31 13:21:31', '0'),
(356, 'Cadastrou um produto com o nome Negresco', 'admin', '2018-08-01 00:25:35', '0'),
(357, 'Cadastrou um departamento com a descriÃ§Ã£o Almoxarifado', 'admin', '2018-08-01 13:32:08', '0'),
(358, 'Alterou a descriÃ§Ã£o do departamento Administração para AdministraÃ§Ã£o', 'admin', '2018-08-01 13:56:05', '0'),
(359, 'Alterou a descriÃ§Ã£o do departamento Gerência para GerÃªncia', 'admin', '2018-08-01 13:56:15', '0'),
(360, 'Cadastrou um departamento com a descriÃ§Ã£o Limpeza', 'admin', '2018-08-01 13:57:17', '0'),
(361, 'Deletou o departamento GerÃªncia', 'admin', '2018-08-01 13:59:21', '0'),
(362, 'Cadastrou um departamento com a descriÃ§Ã£o GerÃªncia', 'admin', '2018-08-01 13:59:34', '0'),
(363, 'Cadastrou um departamento com a descriÃ§Ã£o Cozinha', 'admin', '2018-08-01 13:59:37', '0'),
(364, 'Cadastrou um departamento com a descriÃ§Ã£o Biblioteca', 'admin', '2018-08-01 13:59:40', '0'),
(365, 'Cadastrou um departamento com a descriÃ§Ã£o Sala de suprimentos', 'admin', '2018-08-01 13:59:49', '0'),
(366, 'Deletou o departamento TI', 'admin', '2018-08-01 13:59:56', '0'),
(367, 'Alterou a descriÃ§Ã£o do departamento Almoxarifado para Setor 7', 'admin', '2018-08-01 14:00:23', '0'),
(368, 'Adicionou o material Parafuso no estoque', 'admin', '2018-08-01 14:52:33', '0'),
(369, 'Adicionou o material Casca de ovo no estoque', 'admin', '2018-08-01 14:54:10', '0'),
(370, 'Adicionou o produto Capsula no estoque', 'admin', '2018-08-01 15:16:54', '0'),
(371, 'Adicionou o material Chocolate no estoque', 'admin', '2018-08-01 15:48:56', '0'),
(372, 'Alterou a referÃªncia 000000003 no estoque de materiais', 'admin', '2018-08-01 16:52:01', '0'),
(373, 'Alterou a referÃªncia 000000003 no estoque de materiais', 'admin', '2018-08-01 16:52:09', '0'),
(374, 'Adicionou o material Casca de ovo no estoque', 'admin', '2018-08-01 17:21:50', '0'),
(375, 'Alterou a referÃªncia 000000001 no estoque de materiais', 'admin', '2018-08-01 17:25:31', '0'),
(376, 'Alterou a referÃªncia 000000001 no estoque de materiais', 'admin', '2018-08-01 17:25:46', '0'),
(377, 'Alterou a referÃªncia 000000001 no estoque de materiais', 'admin', '2018-08-01 17:32:58', '0'),
(378, 'Alterou a referÃªncia 000000001 no estoque de materiais', 'admin', '2018-08-01 22:55:59', '0'),
(379, 'Adicionou o material Cuuu no estoque', 'admin', '2018-08-01 22:58:38', '0'),
(380, 'Deletou a refÃªrencia 000000001 do estoque de materiais', 'admin', '2018-08-01 23:05:21', '0'),
(381, 'Adicionou o material Sooo no estoque', 'admin', '2018-08-01 23:19:50', '0'),
(382, 'Alterou a referÃªncia 000000003 no estoque de materiais', 'admin', '2018-08-01 23:19:55', '0'),
(383, 'O usuÃ¡rio Administrador alterou seu prÃ³prio nome', 'cota.joao', '2018-08-01 23:29:59', '0'),
(384, 'O usuÃ¡rio Administrador alterou seu prÃ³prio nome paraAdministradora', 'admin', '2018-08-01 23:51:19', '1'),
(385, 'O usuÃ¡rio Administradora alterou seu prÃ³prio nome paraAdministrador', 'admin', '2018-08-01 23:51:23', '1'),
(386, 'O usuÃ¡rio Administrador alterou seu prÃ³prio nome para Administradora', 'admin', '2018-08-01 23:51:42', '0'),
(387, 'O usuÃ¡rio Administradora alterou seu prÃ³prio nome para Administrador', 'admin', '2018-08-01 23:51:45', '0'),
(388, 'Adicionou o material Sabonete no estoque', 'admin', '2018-08-02 10:30:40', '0'),
(389, 'O usuÃ¡rio Administrador alterou sua prÃ³pria senha', 'admin', '2018-09-20 11:14:55', '0'),
(390, 'O usuÃ¡rio Administrador alterou sua prÃ³pria senha', 'admin', '2018-09-20 11:17:47', '0'),
(391, 'Cadastrou um usuÃ¡rio com o nome teste', 'admin', '2018-09-20 11:24:06', '0'),
(392, 'O usuÃ¡rio teste alterou sua prÃ³pria senha', 'teste', '2018-09-20 11:24:48', '0'),
(393, 'O usuÃ¡rio teste alterou sua prÃ³pria senha', 'teste', '2018-09-20 11:27:47', '0'),
(394, 'Alterou a referÃªncia 000000061 no estoque de produtos', 'admin', '2018-09-26 11:16:34', '0'),
(395, 'Cadastrou um cliente com o nome asdasd', 'admin', '2018-09-26 11:41:42', '0'),
(396, 'Cadastrou um cliente com o nome fddfg', 'admin', '2018-09-26 11:45:53', '0'),
(397, 'Cadastrou um cliente com o nome dsdas', 'admin', '2018-09-26 11:54:34', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mtp`
--

CREATE TABLE `mtp` (
  `id_mtp` int(11) NOT NULL,
  `desc_mtp` varchar(255) CHARACTER SET latin1 NOT NULL,
  `deletado` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `mtp`
--

INSERT INTO `mtp` (`id_mtp`, `desc_mtp`, `deletado`) VALUES
(2, 'Espuma', '1'),
(3, 'Metal', '1'),
(5, 'Sabonete', '0'),
(8, 'CÃº', '1'),
(9, 'Parafuso', '0'),
(10, 'Casca de ovo', '0'),
(11, 'manteiga', '0'),
(12, 'Chocolate', '0'),
(13, 'Massaaaa', '0'),
(14, 'Sooo', '0'),
(15, 'Cuuu', '0'),
(16, 'Teeei', '0'),
(17, 'Sorvete', '0'),
(18, 'Cachorro', '0'),
(19, 'Espuma Satanica', '0'),
(20, 'Alabassuira', '0'),
(21, 'Alasbassa', '0'),
(22, 'Saluimandra', '0'),
(23, 'sadasd', '0'),
(24, 'asdsad', '0'),
(25, 'asdasd', '0'),
(26, 'Rafa', '0'),
(27, 'CÃº', '1'),
(28, 'Rafa', '0'),
(29, 'Colchonete de Ouro', '0'),
(30, 'xczxcxz', '0'),
(31, 'sadasdsad', '0'),
(32, 'Massaaaa', '0'),
(33, 'aaaa', '0'),
(34, 'Massaaaa', '0'),
(35, 'Raul Dias', '0'),
(36, 'Raul Dias', '0'),
(37, 'Gustavo', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_prod` int(11) NOT NULL,
  `nome_prod` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deletado` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_prod`, `nome_prod`, `deletado`) VALUES
(7, 'Mc Donalds', '1'),
(10, 'Esfirra', '0'),
(15, 'Churros de Chocolate', '0'),
(16, 'Celular', '0'),
(18, 'Capsula', '0'),
(22, 'Marlboru', '1'),
(23, 'Chocolate', '0'),
(25, 'Moto G1', '0'),
(26, 'Moto G2', '0'),
(27, 'Moto G3', '0'),
(28, 'Moto G4', '0'),
(29, 'Moto G5', '0'),
(30, 'McDonalds', '1'),
(31, 'AAAA', '1'),
(32, 'Cotonete', '1'),
(33, 'Negresco', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turno`
--

CREATE TABLE `turno` (
  `id_turno` int(11) NOT NULL,
  `desc_turno` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deletado` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `turno`
--

INSERT INTO `turno` (`id_turno`, `desc_turno`, `deletado`) VALUES
(1, 'Manhã', '0'),
(2, 'Tarde', '0'),
(3, 'Noite', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tema` int(1) NOT NULL DEFAULT '3',
  `nivel` int(1) NOT NULL,
  `deletado` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `login`, `senha`, `tema`, `nivel`, `deletado`) VALUES
(1, 'Administrador', 'admin', '$2y$08$dztaZ9GD/p.4IPs2wbtj/ewjRdSZKiGAoFHS6rg.mx.PJ5wxCQZQO', 1, 1, '0'),
(2, 'Raul Dias', 'raul.dias', '$2y$08$YxiJEbyR3W.0JLKw6R9rM.vfsJuORI8qaTmgRDbLBkPhDXXswVBJu', 3, 1, '0'),
(3, 'Rafael de Araujo', 'rafaeldearaujop95', '$2y$08$AqKuWnTQGy6nsm0JyBgk3e954NPxT7cNHhCQ9YKEjABW0EF9j/9Te', 2, 1, '0'),
(4, 'Maria de Fatima Marcondes', 'm.marcondes', '$2y$08$WQchKJKsOaKHLYrZtgPmOOMylKKKjOT/4WvcJ.oXD98D7cd7fa3ZK', 3, 3, '0'),
(5, 'Joao de Araujo Procopio', 'cota.joao', '$2y$08$gekF2L9QaUrXtva3vLtz/eFiZgfivrPwZa65ZKNWoU68ONYaRmTNq', 2, 3, '0'),
(6, 'Thiago', 'thiago', '$2y$08$a4l2ZKCIU3F2BGFpMLJqOeE9DrOhlfCeTVMDZF3mpjB.EEPHoihz6', 3, 3, '0'),
(7, 'Termo', 'termo', '$2y$08$.bq24PyZwfYEFEgV//Bo7ORB/iOWmkXB5uqwipSCCdu/oOOsu/Hqe', 3, 3, '0'),
(8, 'Zago ZÃ©', 'zago', '$2y$08$YG6qPGegefgth4dtNMtsqeSGy8qGQuH8zeHQmGas9iYur3rSOb0Ra', 2, 3, '0'),
(9, 'Bruno Henrique', 'bruno.m', '$2y$08$a7wZvP/8LC0SebCelx8ereYIMdKj0t7yWqmwtsIm8q1VR4xY2rfmy', 3, 3, '0'),
(10, 'teste', 'teste', '$2y$08$uiTJzfPu0z56zep6h2goGein5MBWF6qJOmhgqTNaxuO4QODKE9Fnq', 3, 1, '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `array` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor_total` double(10,2) NOT NULL,
  `id_fp` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL,
  `data_venda` datetime DEFAULT NULL,
  `deletado` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id_venda`, `id_cli`, `array`, `valor_total`, `id_fp`, `id_usu`, `data_venda`, `deletado`) VALUES
(6, 18, '000000060,Moto G1,50,20,00,10-000000059,Celular,200,9,00,10', 290.00, 1, 1, '2018-09-26 21:32:56', '0'),
(7, 17, '000000059,Celular,200,9,00,10-000000060,Moto G1,50,20,00,10-000000061,Capsula,50,20,50,10', 495.00, 1, 1, '2018-09-26 21:39:31', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cli`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escala`
--
ALTER TABLE `escala`
  ADD PRIMARY KEY (`id_esc`);

--
-- Indexes for table `estoque_mtp`
--
ALTER TABLE `estoque_mtp`
  ADD PRIMARY KEY (`id_est_mtp`),
  ADD KEY `id_for` (`id_for`),
  ADD KEY `id_mtp` (`id_mtp`);

--
-- Indexes for table `estoque_prod`
--
ALTER TABLE `estoque_prod`
  ADD PRIMARY KEY (`id_est_prod`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Indexes for table `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  ADD PRIMARY KEY (`id_fp`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_for`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_func`),
  ADD KEY `id_cargo` (`id_cargo`),
  ADD KEY `id_login` (`id_login`),
  ADD KEY `departamento` (`departamento`),
  ADD KEY `escala` (`escala`),
  ADD KEY `turno` (`turno`);

--
-- Indexes for table `hist`
--
ALTER TABLE `hist`
  ADD PRIMARY KEY (`id_h`);

--
-- Indexes for table `mtp`
--
ALTER TABLE `mtp`
  ADD PRIMARY KEY (`id_mtp`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indexes for table `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id_turno`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `id_cli` (`id_cli`),
  ADD KEY `id_fp` (`id_fp`),
  ADD KEY `id_func` (`id_usu`),
  ADD KEY `id_prod` (`array`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `escala`
--
ALTER TABLE `escala`
  MODIFY `id_esc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `estoque_mtp`
--
ALTER TABLE `estoque_mtp`
  MODIFY `id_est_mtp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `estoque_prod`
--
ALTER TABLE `estoque_prod`
  MODIFY `id_est_prod` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  MODIFY `id_fp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_for` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_func` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hist`
--
ALTER TABLE `hist`
  MODIFY `id_h` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=398;

--
-- AUTO_INCREMENT for table `mtp`
--
ALTER TABLE `mtp`
  MODIFY `id_mtp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `turno`
--
ALTER TABLE `turno`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `estoque_mtp`
--
ALTER TABLE `estoque_mtp`
  ADD CONSTRAINT `estoque_mtp_ibfk_1` FOREIGN KEY (`id_for`) REFERENCES `fornecedor` (`id_for`),
  ADD CONSTRAINT `estoque_mtp_ibfk_2` FOREIGN KEY (`id_mtp`) REFERENCES `mtp` (`id_mtp`);

--
-- Limitadores para a tabela `estoque_prod`
--
ALTER TABLE `estoque_prod`
  ADD CONSTRAINT `estoque_prod_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `produto` (`id_prod`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`),
  ADD CONSTRAINT `funcionario_ibfk_2` FOREIGN KEY (`departamento`) REFERENCES `departamento` (`id`),
  ADD CONSTRAINT `funcionario_ibfk_3` FOREIGN KEY (`escala`) REFERENCES `escala` (`id_esc`),
  ADD CONSTRAINT `funcionario_ibfk_4` FOREIGN KEY (`turno`) REFERENCES `turno` (`id_turno`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`id_cli`) REFERENCES `cliente` (`id_cli`),
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`id_fp`) REFERENCES `forma_pagamento` (`id_fp`),
  ADD CONSTRAINT `venda_ibfk_3` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
