-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Tempo de geração: 08/03/2020 às 00:12
-- Versão do servidor: 5.7.29
-- Versão do PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dse`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `product`
--

CREATE TABLE `product` (
  `id_product` int(20) UNSIGNED NOT NULL,
  `id_product_type` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `createAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `product`
--

INSERT INTO `product` (`id_product`, `id_product_type`, `name`, `description`, `price`, `createAt`, `updateAt`) VALUES
(1, 1, 'adasdasdsffdsfsasdasdasd', 'asdasd', 23.34, '2020-03-07 23:51:23', '2020-03-07 23:52:43'),
(2, 1, 'asdasd', 'asdasda', 33, '2020-03-07 23:53:06', '2020-03-07 23:53:06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produt_type`
--

CREATE TABLE `produt_type` (
  `id_product_type` int(10) UNSIGNED NOT NULL COMMENT 'id da tabela',
  `title` varchar(50) NOT NULL COMMENT 'titulo do tipo do produto',
  `description` varchar(250) DEFAULT NULL COMMENT 'descrição do tipo do produto',
  `tax` float NOT NULL COMMENT 'imposto do tipo do produto',
  `createAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data e hora em que o tipo do produto foi criado',
  `updateAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Data e hora em que o tipo do produto foi atualizado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='tipo do produto';

--
-- Despejando dados para a tabela `produt_type`
--

INSERT INTO `produt_type` (`id_product_type`, `title`, `description`, `tax`, `createAt`, `updateAt`) VALUES
(1, 'casasdasdas', 'asdas dasd d sad sad asfdfdfdf', 3, '2020-03-07 23:39:37', '2020-03-07 23:41:24');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sale`
--

CREATE TABLE `sale` (
  `id_sale` int(30) NOT NULL,
  `id_product` int(20) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `original_price` float NOT NULL,
  `tax` float NOT NULL,
  `final_price` float NOT NULL,
  `createAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(11) UNSIGNED NOT NULL,
  `id_product` int(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `createAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `createAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `product_product_type` (`id_product_type`);

--
-- Índices de tabela `produt_type`
--
ALTER TABLE `produt_type`
  ADD PRIMARY KEY (`id_product_type`),
  ADD UNIQUE KEY `product_type_title_unique` (`title`);

--
-- Índices de tabela `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id_sale`),
  ADD KEY `sale_product` (`id_product`),
  ADD KEY `sale_user` (`id_user`);

--
-- Índices de tabela `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `stock_product` (`id_product`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produt_type`
--
ALTER TABLE `produt_type`
  MODIFY `id_product_type` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id da tabela', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sale`
--
ALTER TABLE `sale`
  MODIFY `id_sale` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_product_type` FOREIGN KEY (`id_product_type`) REFERENCES `produt_type` (`id_product_type`);

--
-- Restrições para tabelas `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `sale_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Restrições para tabelas `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
