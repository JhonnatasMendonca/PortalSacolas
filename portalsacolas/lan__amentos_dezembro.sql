-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Out-2021 às 23:08
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lançamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `lançamentos_dezembro`
--

CREATE TABLE `lançamentos_dezembro` (
  `id` int(10) UNSIGNED NOT NULL,
  `operador` int(6) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `retirada` int(11) NOT NULL,
  `devolvida` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lançamentos_dezembro`
--

INSERT INTO `lançamentos_dezembro` (`id`, `operador`, `nome`, `retirada`, `devolvida`, `created`) VALUES
(6, 2034, 'josimar gomes mendonça', 45, 2, '2021-10-28 17:13:22'),
(7, 2034, 'josimar gomes mendonça', 45, 2, '2021-10-28 17:14:13');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `lançamentos_dezembro`
--
ALTER TABLE `lançamentos_dezembro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `lançamentos_dezembro`
--
ALTER TABLE `lançamentos_dezembro`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
