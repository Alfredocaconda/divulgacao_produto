-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/06/2024 às 10:56
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `divulgacao_de_produto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `idproduto` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `categoria` varchar(15) NOT NULL,
  `descricao` varchar(20) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`idproduto`, `nome`, `categoria`, `descricao`, `imagem`, `idusuario`) VALUES
(2, 'IPHONE', 'ELETRONICO', '500MG', '20240606100633.jpeg', 1),
(3, 'SAMSUNG ', 'ELETRONICO', 'GALAXI A 10', '20240606100644.jpeg', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `stock`
--

CREATE TABLE `stock` (
  `idstock` int(11) NOT NULL,
  `idproduto` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `preco` double NOT NULL,
  `tempo_de_duracao` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `stock`
--

INSERT INTO `stock` (`idstock`, `idproduto`, `idusuario`, `preco`, `tempo_de_duracao`, `data`, `quantidade`) VALUES
(1, 3, 1, 5000, 1212, '2024-06-06 10:37:02', 50);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `genero` varchar(20) DEFAULT NULL,
  `telefone` int(11) NOT NULL,
  `funcao` enum('','gestor') DEFAULT NULL,
  `endereco` varchar(20) DEFAULT NULL,
  `bi` varchar(40) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `genero`, `telefone`, `funcao`, `endereco`, `bi`, `data_nascimento`, `senha`) VALUES
(1, 'alfredo', '', 935460590, 'gestor', '', '', '0000-00-00', '4444');

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vproduto`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vproduto` (
`idproduto` int(11)
,`nome` varchar(20)
,`categoria` varchar(15)
,`descricao` varchar(20)
,`imagem` varchar(100)
,`idusuario` int(11)
,`nomef` varchar(100)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vstock`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vstock` (
`idstock` int(11)
,`idproduto` int(11)
,`nome` varchar(20)
,`categoria` varchar(15)
,`descricao` varchar(20)
,`imagem` varchar(100)
,`preco` double
,`tempo_de_duracao` int(11)
,`data` datetime
,`quantidade` int(11)
,`nomef` varchar(100)
);

-- --------------------------------------------------------

--
-- Estrutura para view `vproduto`
--
DROP TABLE IF EXISTS `vproduto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vproduto`  AS SELECT `p`.`idproduto` AS `idproduto`, `p`.`nome` AS `nome`, `p`.`categoria` AS `categoria`, `p`.`descricao` AS `descricao`, `p`.`imagem` AS `imagem`, `f`.`idusuario` AS `idusuario`, `f`.`nome` AS `nomef` FROM (`produto` `p` join `usuario` `f` on(`f`.`idusuario` = `p`.`idusuario`)) ;

-- --------------------------------------------------------

--
-- Estrutura para view `vstock`
--
DROP TABLE IF EXISTS `vstock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vstock`  AS SELECT `s`.`idstock` AS `idstock`, `p`.`idproduto` AS `idproduto`, `p`.`nome` AS `nome`, `p`.`categoria` AS `categoria`, `p`.`descricao` AS `descricao`, `p`.`imagem` AS `imagem`, `s`.`preco` AS `preco`, `s`.`tempo_de_duracao` AS `tempo_de_duracao`, `s`.`data` AS `data`, `s`.`quantidade` AS `quantidade`, `u`.`nome` AS `nomef` FROM ((`stock` `s` join `produto` `p` on(`p`.`idproduto` = `s`.`idproduto`)) join `usuario` `u` on(`u`.`idusuario` = `s`.`idusuario`)) ;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idproduto`),
  ADD KEY `idfuncionario` (`idusuario`);

--
-- Índices de tabela `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idstock`),
  ADD KEY `idf` (`idusuario`),
  ADD KEY `idp` (`idproduto`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `telefone` (`telefone`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `stock`
--
ALTER TABLE `stock`
  MODIFY `idstock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Restrições para tabelas `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`idproduto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
