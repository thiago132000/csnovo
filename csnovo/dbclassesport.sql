-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Set-2018 às 03:44
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
  `desc_cargo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `desc_cargo`) VALUES
(1, 'Programador JÃºnior'),
(2, 'Auxiliar Administrativo'),
(3, 'Pedreiro'),
(4, 'Ajudante'),
(5, 'Auxiliar de RH'),
(6, 'Senior em AnÃ¡lise e Desenvolvimento de Sistemas'),
(7, 'Auxilir de ProgramaÃ§Ã£o'),
(8, 'Programador Pleno');

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
  `cnpj_cli` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cli`, `nome_cli`, `tel_cli`, `email_cli`, `cpf_cli`, `cnpj_cli`) VALUES
(17, 'fddfg', '453453', 'thiago@thiago.com', '44654545634', '45355555555555'),
(18, 'dsdas', '233123', 'thiago@thiago.com', '', ''),
(19, 'Thiago ', '11983645517', 'thiago13115@gmail.com', '44933262802', '44933265847854'),
(20, 'Lucas', '91141780802', 'lucas.zmoura12@gmail.com', '47736705844', ''),
(21, 'Rafael', '11985654645', 'rafaelaraujoze@gmail.com', '', ''),
(22, 'JoÃ£o', '1195886525', 'joao@gmail.com', '11154154523', '65654654465456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `nome_dep` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`id`, `nome_dep`) VALUES
(1, 'TI'),
(2, 'GerÃªncia'),
(3, 'AdministraÃ§Ã£o'),
(4, 'Setor 7'),
(5, 'Limpeza'),
(6, 'GerÃªncia'),
(7, 'Cozinha'),
(8, 'Biblioteca'),
(9, 'Sala de suprimentos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escala`
--

CREATE TABLE `escala` (
  `id_esc` int(11) NOT NULL,
  `desc_esc` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `escala`
--

INSERT INTO `escala` (`id_esc`, `desc_esc`) VALUES
(1, '6 x 1'),
(2, '5 x 2'),
(3, '12 x 36');

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
  `valor_total` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `estoque_mtp`
--

INSERT INTO `estoque_mtp` (`id_est_mtp`, `id_mtp`, `valor_compra_mtp`, `id_for`, `qtd_est_mtp`, `qtd_entrada`, `qtd_perda_mtp`, `valor_total`) VALUES
(12, 43, 10.00, 26, 200.000, 200.000, 0.000, 2000.00),
(13, 44, 10.00, 26, 200.000, 200.000, 0.000, 2000.00);

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
  `valor_total` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `estoque_prod`
--

INSERT INTO `estoque_prod` (`id_est_prod`, `id_prod`, `qtd_est_prod`, `qtd_vendido_prod`, `qtd_entrada`, `valor_venda`, `valor_total`) VALUES
(000000062, 34, 10.000, NULL, 10.000, 50.00, 500.00),
(000000064, 36, 500.000, NULL, 500.000, 5.00, 2500.00),
(000000065, 35, 200.000, NULL, 200.000, 100.00, 20000.00),
(000000066, 37, 100.000, NULL, 100.000, 50.00, 5000.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `forma_pagamento`
--

CREATE TABLE `forma_pagamento` (
  `id_fp` int(11) NOT NULL,
  `desc_fp` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `forma_pagamento`
--

INSERT INTO `forma_pagamento` (`id_fp`, `desc_fp`) VALUES
(1, 'Boleto'),
(2, 'Débito'),
(3, 'Crédito'),
(4, 'Dinheiro');

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
  `data_cad` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_for`, `nome_for`, `tel_for`, `email_for`, `cnpj_for`, `data_cad`) VALUES
(10, 'Renault', '1111111111', 'sadasdasdas@gmail.com', '111111111111', '2018-07-12'),
(12, 'Lacta', '11941780802', 'lacta@gmail.com', '84534154564645', '2018-07-12'),
(13, 'Avon', '1111111111', 'sadasdasdas@gmail.com', '111111111111', '2018-07-12'),
(14, 'NestlÃ©', '11941780802', 'nestle@gmail.com', '54321468476516', '2018-07-12'),
(15, 'MarisÃ¡', '561515611', 'asdsadsadsad@gmail.com', '555555555555', '2018-07-13'),
(24, 'Garoto', '1111111111', 'sadasdasdas@gmail.com', '111111111111', '2018-07-14'),
(25, 'Carrefour', '11941780802', 'Carrefour@gmail.com', '94175232544888', '2018-07-21'),
(26, 'ABC Espumas', '11430924029', 'abcespumas@gmail.com', '98546125487741', '2018-09-27');

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
  `departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_func`, `nome_func`, `end_func`, `tel_func`, `email_func`, `id_cargo`, `salario`, `data_entrada`, `data_saida`, `turno`, `escala`, `id_login`, `cpf_func`, `departamento`) VALUES
(10, 'Administrador', 'asdasdasd', '11111111111', 'rafa@gmail.com', 1, 1200.00, '2018-07-13', NULL, 1, 3, 1, '555.555.555-05', 3),
(11, 'Lucas Zago', 'asdsadasdsad', '11111111111', 'sadasdasdas@gmail.com', 1, 1000.00, '2018-07-13', NULL, 1, 2, 8, '564515154', 2),
(12, 'Bruno Henrique', 'asasasdasd', '11111111111', 'sadasdasdas@gmail.com', 2, 1500.00, '2018-07-13', NULL, 2, 2, 9, '555.666.777-65', 2),
(13, 'Termo', 'asasasdasd', '561515611', 'termo@gmail.com', 1, 5500.00, '2018-07-14', NULL, 1, 2, 7, '555.666.777-65', 2),
(14, 'Thiago', 'asdsadasd', '11111111111', 'thiago@gmail.com', 1, 1500.00, '2018-07-15', NULL, 1, 1, 6, '15165165165', 1),
(15, 'Joao de Araujo', 'asdsadasd', '11111111111', 'asdasd@asd', 1, 5000.00, '2018-07-18', NULL, 1, 2, 5, '15165165165', 2),
(16, 'Paulo', 'Rua Alvaro Alvim', '11941960302', 'paulo@gmail.com', 5, 800.00, '2018-09-26', NULL, 1, 1, 1, '47736705844', 4),
(17, 'Vilma', 'Rua Alvaro Alvim', '11941960302', 'vilma@gmail.com', 5, 20000.00, '2018-09-26', NULL, 3, 3, 6, '41516516431', 3),
(18, 'DamiÃ£o', 'Travessa Flamengo', '1143397754', 'damiao123@gmail.com', 4, 5000.00, '2018-09-26', NULL, 2, 2, 2, '12348978144', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `hist`
--

CREATE TABLE `hist` (
  `id_h` int(11) NOT NULL,
  `acao_h` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `login_alt` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `data_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `hist`
--

INSERT INTO `hist` (`id_h`, `acao_h`, `login_alt`, `data_hora`) VALUES
(444, 'Deletou a refÃªrencia 000000004 do estoque de materiais', 'admin', '2018-09-29 21:54:48'),
(445, 'Deletou a refÃªrencia 000000004 do estoque de materiais', 'admin', '2018-09-29 21:54:57'),
(446, 'Deletou a refÃªrencia 000000004 do estoque de materiais', 'admin', '2018-09-29 21:55:02'),
(447, 'Deletou a refÃªrencia 000000003 do estoque de materiais', 'admin', '2018-09-29 21:55:07'),
(448, 'Alterou a referÃªncia 000000004 no estoque de materiais', 'admin', '2018-09-29 21:55:15'),
(449, 'Alterou a referÃªncia 000000003 no estoque de materiais', 'admin', '2018-09-29 21:55:26'),
(450, 'Alterou a referÃªncia 000000002 no estoque de materiais', 'admin', '2018-09-29 21:55:34'),
(451, 'Deletou a refÃªrencia 000000063 do estoque de produtos', 'admin', '2018-09-29 21:55:50'),
(452, 'Deletou o material AlgodÃ£o', 'admin', '2018-09-29 21:56:30'),
(453, 'Deletou a refÃªrencia 000000002 do estoque de materiais', 'admin', '2018-09-29 21:56:55'),
(454, 'Deletou a refÃªrencia 000000002 do estoque de materiais', 'admin', '2018-09-29 21:58:05'),
(455, 'Deletou a refÃªrencia 000000063 do estoque de produtos', 'admin', '2018-09-29 21:58:18'),
(456, 'Deletou o material Couro', 'admin', '2018-09-29 21:59:42'),
(457, 'Deletou o material Espuma', 'admin', '2018-09-29 21:59:50'),
(458, 'Deletou a refÃªrencia 000000009 do estoque de materiais', 'admin', '2018-09-29 22:00:08'),
(459, 'Deletou a refÃªrencia 000000004 do estoque de materiais', 'admin', '2018-09-29 22:00:15'),
(460, 'Deletou a refÃªrencia 000000003 do estoque de materiais', 'admin', '2018-09-29 22:00:19'),
(461, 'Deletou o material Linha', 'admin', '2018-09-29 22:00:30'),
(462, 'Cadastrou um material com o nome AlgodÃ£o', 'admin', '2018-09-29 22:04:33'),
(463, 'Adicionou o material AlgodÃ£o no estoque', 'admin', '2018-09-29 22:04:57'),
(464, 'Deletou a refÃªrencia 000000010 do estoque de materiais', 'admin', '2018-09-29 22:05:08'),
(465, 'Adicionou o material AlgodÃ£o no estoque', 'admin', '2018-09-29 22:05:55'),
(466, 'Deletou o material AlgodÃ£o', 'admin', '2018-09-29 22:06:04'),
(467, 'Deletou a refÃªrencia 000000011 do estoque de materiais', 'admin', '2018-09-29 22:06:11'),
(468, 'Cadastrou um material com o nome AlgodÃ£o', 'admin', '2018-09-29 22:09:52'),
(469, 'Adicionou o material AlgodÃ£o no estoque', 'admin', '2018-09-29 22:10:31'),
(470, 'Deletou o material AlgodÃ£o', 'admin', '2018-09-29 22:10:43'),
(471, 'Cadastrou um material com o nome AlgodÃ£o', 'admin', '2018-09-29 22:11:25'),
(472, 'Adicionou o material AlgodÃ£o no estoque', 'admin', '2018-09-29 22:11:38'),
(473, 'Cadastrou um produto com o nome ColchÃ£o de Maconha', 'admin', '2018-09-29 22:15:38'),
(474, 'Adicionou o produto ColchÃ£o de Maconha no estoque', 'admin', '2018-09-29 22:15:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mtp`
--

CREATE TABLE `mtp` (
  `id_mtp` int(11) NOT NULL,
  `desc_mtp` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `mtp`
--

INSERT INTO `mtp` (`id_mtp`, `desc_mtp`) VALUES
(44, 'AlgodÃ£o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_prod` int(11) NOT NULL,
  `nome_prod` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_prod`, `nome_prod`) VALUES
(34, 'Colchonete'),
(35, 'ColchÃ£o'),
(36, 'ColchÃ£o Queen Size'),
(37, 'ColchÃ£o de Maconha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turno`
--

CREATE TABLE `turno` (
  `id_turno` int(11) NOT NULL,
  `desc_turno` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `turno`
--

INSERT INTO `turno` (`id_turno`, `desc_turno`) VALUES
(1, 'Manhã'),
(2, 'Tarde'),
(3, 'Noite');

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
  `nivel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `login`, `senha`, `tema`, `nivel`) VALUES
(1, 'Administrador', 'admin', '$2y$08$dztaZ9GD/p.4IPs2wbtj/ewjRdSZKiGAoFHS6rg.mx.PJ5wxCQZQO', 3, 1),
(2, 'Raul Dias', 'raul.dias', '$2y$08$YxiJEbyR3W.0JLKw6R9rM.vfsJuORI8qaTmgRDbLBkPhDXXswVBJu', 3, 1),
(3, 'Rafael de Araujo', 'rafaeldearaujop95', '$2y$08$AqKuWnTQGy6nsm0JyBgk3e954NPxT7cNHhCQ9YKEjABW0EF9j/9Te', 2, 1),
(4, 'Maria de Fatima Marcondes', 'm.marcondes', '$2y$08$WQchKJKsOaKHLYrZtgPmOOMylKKKjOT/4WvcJ.oXD98D7cd7fa3ZK', 3, 3),
(5, 'Joao de Araujo Procopio', 'cota.joao', '$2y$08$gekF2L9QaUrXtva3vLtz/eFiZgfivrPwZa65ZKNWoU68ONYaRmTNq', 2, 3),
(6, 'Thiago', 'thiago', '$2y$08$a4l2ZKCIU3F2BGFpMLJqOeE9DrOhlfCeTVMDZF3mpjB.EEPHoihz6', 3, 3),
(7, 'Termo', 'termo', '$2y$08$.bq24PyZwfYEFEgV//Bo7ORB/iOWmkXB5uqwipSCCdu/oOOsu/Hqe', 3, 3),
(8, 'Zago ZÃ©', 'zago', '$2y$08$YG6qPGegefgth4dtNMtsqeSGy8qGQuH8zeHQmGas9iYur3rSOb0Ra', 2, 3),
(9, 'Bruno Henrique', 'bruno.m', '$2y$08$a7wZvP/8LC0SebCelx8ereYIMdKj0t7yWqmwtsIm8q1VR4xY2rfmy', 3, 3),
(10, 'teste', 'teste', '$2y$08$uiTJzfPu0z56zep6h2goGein5MBWF6qJOmhgqTNaxuO4QODKE9Fnq', 3, 1);

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
  `data_venda` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id_venda`, `id_cli`, `array`, `valor_total`, `id_fp`, `id_usu`, `data_venda`) VALUES
(20, 21, '000000066,ColchÃ£o de Maconha,100,50,00,12', 600.00, 2, 1, '2018-09-29 22:17:02'),
(21, 20, '000000062,Colchonete,10,50,00,10-000000064,ColchÃ£o Queen Size,500,5,00,10', 550.00, 2, 1, '2018-09-29 22:26:28');

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
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id_est_mtp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `estoque_prod`
--
ALTER TABLE `estoque_prod`
  MODIFY `id_est_prod` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  MODIFY `id_fp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_for` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_func` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hist`
--
ALTER TABLE `hist`
  MODIFY `id_h` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=475;

--
-- AUTO_INCREMENT for table `mtp`
--
ALTER TABLE `mtp`
  MODIFY `id_mtp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `estoque_prod`
--
ALTER TABLE `estoque_prod`
  ADD CONSTRAINT `estoque_prod_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `produto` (`id_prod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
