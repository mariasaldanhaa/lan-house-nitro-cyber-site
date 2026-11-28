-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/11/2026 às 10:06
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_nitro_cyber`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagem_produto`
--

CREATE TABLE `imagem_produto` (
  `id_imagem` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `caminho_imagem` varchar(450) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `imagem_produto`
--

INSERT INTO `imagem_produto` (`id_imagem`, `id_produto`, `caminho_imagem`) VALUES
(1, 1, 'img/produto_6b0a8682267ea4.55555996.jpg'),
(2, 2, 'img/produto_6b0a893dcde8a4.11404200.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cadastro`
--

CREATE TABLE `tb_cadastro` (
  `id_cadastro` int(11) NOT NULL,
  `foto_cadastro` varchar(255) DEFAULT NULL,
  `nome_cadastro` varchar(100) NOT NULL,
  `senha_cadastro` varchar(255) NOT NULL,
  `cidade_cadastro` varchar(100) NOT NULL,
  `endereco_cadastro` varchar(150) NOT NULL,
  `email_cadastro` varchar(100) NOT NULL,
  `telefone_cadastro` varchar(20) NOT NULL,
  `tipo` enum('usuario','funcionario','administrador') NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_cadastro`
--

INSERT INTO `tb_cadastro` (`id_cadastro`, `foto_cadastro`, `nome_cadastro`, `senha_cadastro`, `cidade_cadastro`, `endereco_cadastro`, `email_cadastro`, `telefone_cadastro`, `tipo`) VALUES
(9, 'Nitro.jpg', 'Nitro', '$2y$10$fr6fo9YxSZxflaMKo7gcBe6Q6giZRwjyg2UCN66FAY31igYJ3HVWW', 'Bambuí', 'Rua José', 'mariasaldanha124@gmail.com', '(99) 99999-9999', 'administrador');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_produto`
--

CREATE TABLE `tb_produto` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(250) NOT NULL,
  `descricao_produto` text NOT NULL,
  `preco_produto` decimal(10,2) NOT NULL,
  `categoria_produto` varchar(50) NOT NULL,
  `estoque_produto` int(11) NOT NULL,
  `preco_promocional_produto` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_produto`
--

INSERT INTO `tb_produto` (`id_produto`, `nome_produto`, `descricao_produto`, `preco_produto`, `categoria_produto`, `estoque_produto`, `preco_promocional_produto`) VALUES
(1, 'Mouse Gamer', 'Mouse USB para teste', 100.00, 'Periféricos', 5, 50.00),
(2, 'Teclado Gamer', 'sd', 50.00, 'Periféricos', 6, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `imagem_produto`
--
ALTER TABLE `imagem_produto`
  ADD PRIMARY KEY (`id_imagem`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices de tabela `tb_cadastro`
--
ALTER TABLE `tb_cadastro`
  ADD PRIMARY KEY (`id_cadastro`);

--
-- Índices de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imagem_produto`
--
ALTER TABLE `imagem_produto`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_cadastro`
--
ALTER TABLE `tb_cadastro`
  MODIFY `id_cadastro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `imagem_produto`
--
ALTER TABLE `imagem_produto`
  ADD CONSTRAINT `imagem_produto_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
