-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jul-2019 às 07:04
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `product_order`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `order`
--

INSERT INTO `order` (`id`, `data`, `status`) VALUES
(8, '2019-07-28 21:41:42', 0),
(9, '2019-07-28 22:23:42', 0),
(10, '2019-07-28 23:52:10', 0),
(11, '2019-07-28 23:52:15', 0),
(12, '2019-07-28 23:52:19', 0),
(13, '2019-07-29 00:59:07', 1),
(14, '2019-07-29 00:59:34', 1),
(15, '2019-07-29 00:59:41', 1),
(16, '2019-07-29 01:48:39', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `sku` varchar(45) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `descricao` longtext DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `product`
--

INSERT INTO `product` (`id`, `sku`, `nome`, `descricao`, `preco`, `status`) VALUES
(4, 'Sku', 'Nome', '1', '10.00', '0'),
(5, 'tee', 'tste', '<p>12</p>', '12.00', '0'),
(6, 'ss', 'form', '<p>tesete</p>', '12.00', '0'),
(7, 'a', 'a', '<p>a</p>', '1.00', '0'),
(8, 'as', 'as', '<p><b>as</b></p>', '1.00', '0'),
(9, 'botao', 'novo', '<p>sdad</p>', '123213.00', '0'),
(10, 'ex', 'ex', 'ex', '2.00', '0'),
(11, 'novos', 'novos', '<p>aaa</p>', '12.00', '0'),
(12, '100010', 'Camiseta', '<p>Camiseta vermelha</p>', '50.00', '0'),
(13, 'Gol G2 96 1.0', 'Carro', '<p>Motor CHT</p>', '5000.00', '0'),
(14, '19022', 'Tenis Adidas', '<p><b><span style=\"font-size: 36px;\">Bonitao</span></b><span style=\"font-size: 36px;\">﻿</span></p>', '212.90', '0'),
(15, '001', 'Produto 1', '<p><b>Produto - 1: </b>Descriptions<br></p>', '10.00', '1'),
(16, '002', 'Produto 2', '', '13.90', '1'),
(17, '003', 'Produto 3', '', '17.23', '1'),
(18, '004', 'Produto 4', '', '5.15', '1'),
(19, 'excluir', 'Produto 5', '', '12.00', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qtd` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `product_order`
--

INSERT INTO `product_order` (`id`, `order_id`, `product_id`, `product_qtd`) VALUES
(2, 8, 4, 2),
(3, 8, 5, 1),
(4, 9, 12, 2),
(5, 9, 13, 1),
(6, 9, 14, 1),
(7, 10, 12, 1),
(8, 10, 13, 1),
(9, 10, 14, 1),
(10, 11, 12, 1),
(11, 12, 14, 1),
(12, 13, 15, 1),
(13, 14, 15, 2),
(14, 14, 16, 3),
(15, 14, 17, 3),
(16, 14, 18, 1),
(17, 15, 15, 1),
(18, 15, 18, 1),
(19, 16, 19, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_po_idx` (`order_id`),
  ADD KEY `product_po_idx` (`product_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `order_po` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_po` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
