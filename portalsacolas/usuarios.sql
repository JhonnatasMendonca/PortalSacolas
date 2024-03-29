-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Dez-2021 às 22:25
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `usuarios`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_op`
--

CREATE TABLE `cadastro_op` (
  `id` int(11) NOT NULL,
  `operador` int(4) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadastro_op`
--

INSERT INTO `cadastro_op` (`id`, `operador`, `nome`, `created`, `modified`) VALUES
(31, 331, 'ANA BEATRIZ', '2021-12-03 19:54:48', NULL),
(32, 8953, 'WENE MOURA', '2021-12-03 20:11:24', NULL),
(33, 9254, 'TALITA SUA', '2021-12-03 20:11:50', NULL),
(34, 9236, 'LAUDINEIDE BERNARDO', '2021-12-03 20:12:04', NULL),
(35, 9244, 'LIDIANE BARBOSA', '2021-12-03 20:12:12', NULL),
(36, 9252, 'KARLA MARIA', '2021-12-03 20:12:24', NULL),
(37, 8947, 'ZARA ELIZABETH', '2021-12-03 20:12:40', NULL),
(38, 9259, 'JOANA NUNES', '2021-12-03 20:12:47', NULL),
(39, 8833, 'ANDREY HENRIQUE', '2021-12-03 20:12:56', NULL),
(40, 9247, 'ROSANA NASCIMENTO', '2021-12-03 20:13:05', NULL),
(41, 9242, 'ERICKA CRISTINA', '2021-12-03 20:13:20', NULL),
(42, 333, 'ADRIELLY LETICIA', '2021-12-03 20:13:33', NULL),
(43, 8943, 'CAMILA FERNANDA', '2021-12-03 20:13:43', NULL),
(44, 8948, 'ROSEANE RODRIGUES', '2021-12-03 20:13:52', NULL),
(45, 5080, 'JUCENI SOBRAL', '2021-12-03 20:14:02', NULL),
(46, 5307, 'GLEYCE VARELA', '2021-12-03 20:14:14', NULL),
(47, 3528, 'GRAZIELY GISLAINI', '2021-12-03 20:15:29', NULL),
(48, 5629, 'ARTHUR DOUGLAS', '2021-12-03 20:18:58', NULL),
(49, 6771, 'LEILA MARIA', '2021-12-03 20:19:04', NULL),
(50, 3655, 'KARINA CRISTINE', '2021-12-03 20:19:13', NULL),
(51, 8538, 'JAQUELINE SILVA', '2021-12-03 20:19:22', NULL),
(52, 1165, 'LUCIENE MARIA', '2021-12-03 20:19:29', NULL),
(53, 8961, 'SUZY CARLA', '2021-12-03 20:19:39', NULL),
(54, 8832, 'THAYNA RAFAELA', '2021-12-03 20:19:58', NULL),
(55, 1249, 'DANIELE SANTOS', '2021-12-03 20:21:05', NULL),
(56, 9238, 'SAMUEL DAYWISON', '2021-12-03 20:21:29', NULL),
(57, 3758, 'LETICIA SUELLEN', '2021-12-03 20:21:42', NULL),
(58, 7191, 'LARIANE CARLA', '2021-12-03 20:21:49', NULL),
(59, 5447, 'VITORIA RAMOS', '2021-12-03 20:21:59', NULL),
(60, 1253, 'GEOVANIA FERREIRA', '2021-12-03 20:22:12', NULL),
(61, 1234, 'RIAN CANDIDO', '2021-12-03 20:23:30', NULL),
(62, 1236, 'MIQUEIAS ALMEIDA', '2021-12-03 20:23:41', NULL),
(63, 1229, 'RAFAEL RODRIGUES', '2021-12-03 20:23:50', NULL),
(64, 1243, 'VITOR GABRIEL', '2021-12-03 20:23:57', NULL),
(65, 6449, 'REINALDO ALVES', '2021-12-03 20:24:09', NULL),
(66, 4146, 'MATEUS SANTOS', '2021-12-03 20:24:22', NULL),
(67, 1231, 'LEANDRO DE OLIVEIRA', '2021-12-03 20:24:35', NULL),
(68, 1237, 'VITOR EMMANUEL', '2021-12-03 20:24:44', NULL),
(69, 1052, 'LIDIANE ALBUQUERQUE', '2021-12-03 20:24:53', NULL),
(70, 9250, 'MICHELINE LIMA', '2021-12-03 20:25:21', NULL),
(71, 8838, 'LUCAS LIMA', '2021-12-03 20:25:27', NULL),
(72, 8841, 'MARIA TATIANA', '2021-12-03 20:25:58', NULL),
(73, 8951, 'KATIA CILENE', '2021-12-03 20:26:07', NULL),
(74, 586, 'NATALIA SILVA', '2021-12-03 20:29:50', NULL),
(75, 9255, 'GILVANEIDE GOMES', '2021-12-03 20:30:07', NULL),
(76, 9257, 'JOYCILENNE THALIT', '2021-12-03 20:31:08', NULL),
(77, 8830, 'EMMILY DE ALMEIDA', '2021-12-03 20:32:03', NULL),
(78, 9231, 'ALBENICE ANTONIO', '2021-12-03 20:32:11', NULL),
(79, 9256, 'TIFANY ANDRADE', '2021-12-03 20:32:27', NULL),
(80, 8960, 'THAMIRES CRISTINA', '2021-12-03 20:32:36', NULL),
(81, 8842, 'ANDREIA LUZIA', '2021-12-03 20:33:03', NULL),
(82, 9253, 'ILANE SANTOS', '2021-12-03 20:33:09', NULL),
(83, 1380, 'RAQUEL MARINETE', '2021-12-03 20:33:25', NULL),
(84, 8940, 'LUIZA DA SILVA', '2021-12-03 20:33:33', NULL),
(85, 9240, 'TOMAZ ALVARO', '2021-12-03 20:33:41', NULL),
(86, 8840, 'FLAVIA OLIVEIRA', '2021-12-03 20:33:54', NULL),
(87, 2760, 'GEAN COSTA', '2021-12-03 20:34:02', NULL),
(88, 6020, 'JEFFERSON PEREIRA', '2021-12-03 20:36:14', NULL),
(89, 8949, 'ANA PAULA', '2021-12-03 20:36:23', NULL),
(90, 7180, 'YURI FREIRE', '2021-12-03 20:38:01', NULL),
(91, 7155, 'CLAUDIA MARIA', '2021-12-03 20:38:11', NULL),
(92, 1230, 'VITOR LUCAS', '2021-12-03 20:38:20', NULL),
(93, 8945, 'ANA CELIA', '2021-12-03 20:38:31', NULL),
(94, 8942, 'PRISCILLA PEREIRA', '2021-12-03 20:38:42', NULL),
(95, 8948, 'ROZEANE RODRIGUES', '2021-12-03 20:38:52', NULL),
(96, 1248, 'MAYARA LETICIA', '2021-12-03 20:39:01', NULL),
(97, 2425, 'THIAGO OLIVEIRA', '2021-12-03 20:39:39', NULL),
(98, 9246, 'INGRID LIRA', '2021-12-03 20:39:48', NULL),
(99, 1246, 'CAMILA MACIEL', '2021-12-03 20:39:56', NULL),
(100, 8836, 'SAMARA PESSOA', '2021-12-03 20:40:02', NULL),
(101, 1251, 'ERICA SUELY', '2021-12-03 20:40:12', NULL),
(102, 1041, 'EDILENE NERE', '2021-12-03 20:40:24', NULL),
(103, 6990, 'ROBSON SENA', '2021-12-03 20:40:51', NULL),
(104, 4141, 'BRUNO MACHADO', '2021-12-03 20:40:59', NULL),
(105, 8027, 'JONATAS DE LIMA', '2021-12-03 20:41:13', NULL),
(106, 6986, 'MATEUS LUCAS', '2021-12-03 20:41:25', NULL),
(107, 2766, 'GUILHERME MENDES', '2021-12-03 20:41:32', NULL),
(108, 4143, 'JOSE CARLOS', '2021-12-03 20:41:39', NULL),
(109, 7149, 'JOAO VICTOR', '2021-12-03 20:41:46', NULL),
(110, 4144, 'LEONARDO SANTOS', '2021-12-03 20:44:08', NULL),
(112, 9248, 'DENISE ROBERTO', '2021-12-04 16:15:50', NULL),
(113, 9565, 'MATHEUS FELIPE', '2021-12-06 08:07:45', NULL),
(114, 2425, 'THIAGO OLIVEIRA', '2021-12-06 08:08:04', NULL),
(115, 2425, 'THIAGO OLIVEIRA', '2021-12-06 14:28:50', NULL),
(116, 8632, 'THAYNA RAFAELA', '2021-12-06 14:31:08', NULL),
(117, 2760, 'GEAN COSTA', '2021-12-06 17:53:02', NULL),
(121, 1041, 'EDILENE NERI DA SILVA', '2021-12-07 18:35:54', NULL),
(123, 46, 'TYAGO BATISTA', '2021-12-10 15:11:59', NULL),
(124, 330, 'VERA LUCIA', '2021-12-12 13:27:09', NULL),
(125, 322, 'DEBORA MONIQUE', '2021-12-16 21:17:51', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_usuarios`
--

CREATE TABLE `cadastro_usuarios` (
  `usuario` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `adm` int(11) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadastro_usuarios`
--

INSERT INTO `cadastro_usuarios` (`usuario`, `nome`, `adm`, `senha`, `id`) VALUES
('teste123', 'teste', 0, '123456', 2),
('mateus274895', 'MATEUS SOTERO', 0, '123456', 4),
('ELYFSILVA', 'ELYDEIVSON FARIAS SILVA', 0, '16071996', 5),
('gvicente', 'GENESON', 1, '1065', 6),
('elhsilva', 'ELINALDO HONORIO DA SILVA', 0, '030589', 7),
('cpd264', 'cpd264', 1, '264264', 8),
('david209567', 'DAVID LEANDRO', 0, 'gui1205*', 9),
('katia308829', 'KATIA CRISTINA', 0, 'def@2306', 10),
('deyvis185920', 'DEYVISON ALVES', 0, '8609', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_usuarios_lancamentos`
--

CREATE TABLE `cadastro_usuarios_lancamentos` (
  `usuario` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `adm` int(11) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadastro_usuarios_lancamentos`
--

INSERT INTO `cadastro_usuarios_lancamentos` (`usuario`, `nome`, `adm`, `senha`, `id`) VALUES
('cpd264', 'CPD PAULISTA', 2, '264264', 1),
('ELYFSILVA', 'ELYDEIVSON FARIAS', 2, '16071996', 2),
('elhsilva', 'ELINALDO HONORIO', 2, '030589', 3),
('mateus274895', 'MATEUS SOTERO', 2, '123456', 4),
('gvicente', 'GENESON MARTINS', 2, '1065', 5),
('teste', 'teste', 3, '1234', 6),
('aline273198', 'ALINE ADEILDA', 3, '123456', 7),
('bruna268282', 'BRUNA MARIA', 3, '123456', 8),
('deyvis185920', 'DEYVISON ALVES', 3, '8609', 9),
('IRENE250843', 'IRENE LOURENCO', 3, 'ABC#2022', 13),
('EDGARD287347', 'EDGARD GUERRA', 3, 'ABC@2811', 14);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastro_op`
--
ALTER TABLE `cadastro_op`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cadastro_usuarios`
--
ALTER TABLE `cadastro_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cadastro_usuarios_lancamentos`
--
ALTER TABLE `cadastro_usuarios_lancamentos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro_op`
--
ALTER TABLE `cadastro_op`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de tabela `cadastro_usuarios`
--
ALTER TABLE `cadastro_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `cadastro_usuarios_lancamentos`
--
ALTER TABLE `cadastro_usuarios_lancamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
