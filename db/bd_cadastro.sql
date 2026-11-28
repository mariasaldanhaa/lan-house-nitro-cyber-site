-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/11/2026 às 20:21
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_cadastro`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cadastro`
--

CREATE TABLE `tb_cadastro` (
  `id_cadastro` int(11) NOT NULL,
  `foto_cadastro` varchar(255) DEFAULT NULL,
  `nome_cadastro` varchar(100) NOT NULL,
  `cidade_cadastro` varchar(100) NOT NULL,
  `endereco_cadastro` varchar(150) NOT NULL,
  `email_cadastro` varchar(100) NOT NULL,
  `telefone_cadastro` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_cadastro`
--

INSERT INTO `tb_cadastro` (`id_cadastro`, `foto_cadastro`, `nome_cadastro`, `cidade_cadastro`, `endereco_cadastro`, `email_cadastro`, `telefone_cadastro`) VALUES
(1, NULL, 'Gabriel', 'Campo belo', 'João', 'gabriel@gmail.com', '35998369345'),
(2, 'sdad.jpg', 'sdad', 'dsadsa', 'sadsaad', 'ga@bteg', 'saaas'),
(3, 'xzczxc.jpg', 'xzczxc', 'wwdqwd', 'sadasd', 'xzczxc@fdsf', '34343443'),
(4, 'ga.jpg', 'ga', 'ca', 'va', 'gab@fdsf', '3435');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_cadastro`
--
ALTER TABLE `tb_cadastro`
  ADD PRIMARY KEY (`id_cadastro`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_cadastro`
--
ALTER TABLE `tb_cadastro`
  MODIFY `id_cadastro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
