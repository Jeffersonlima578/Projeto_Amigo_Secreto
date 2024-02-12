-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/01/2024 às 21:43
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
-- Banco de dados: `modulo_8`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `amigo_secreto`
--

CREATE TABLE `amigo_secreto` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `amigo_secreto`
--

INSERT INTO `amigo_secreto` (`id`, `nome`, `email`) VALUES
(1, 'Jefferson de Lima Gomes', 'jefferson.limagomes@hotmail.com'),
(2, 'Rosa Maria ', 'rosinhaa@gmail.com'),
(3, 'Bruno Silva', 'bruno.silva@hotmail.com'),
(4, 'Maria Aparecida', 'mariaAparecida@gmail.com'),
(5, 'Carlos Antônio ', 'carlos.antonio@gmail.com'),
(6, 'Isabela Souza', 'isabela.souza@hotmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `amigo_secreto`
--
ALTER TABLE `amigo_secreto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `amigo_secreto`
--
ALTER TABLE `amigo_secreto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
