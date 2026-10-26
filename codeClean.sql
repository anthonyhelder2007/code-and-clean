-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 26-Out-2026 às 18:51
-- Versão do servidor: 13.0.2-MariaDB
-- versão do PHP: 8.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dados: `codeClean`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `id_adm` int(10) UNSIGNED NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`id_adm`, `senha`, `email`) VALUES
(1, '1234', 'anthony@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE `orcamento` (
  `id_orcamento` int(10) UNSIGNED NOT NULL,
  `descricao` text NOT NULL,
  `email` varchar(254) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`id_orcamento`, `descricao`, `email`, `tipo`, `nome`, `numero`, `status`) VALUES
(1, 'Landing page', 'joao1@gmail.com', 'criaSite', 'João Silva', '71999900001', 'em andamento'),
(2, 'Manutenção PCs', 'maria2@gmail.com', 'manutencao', 'Maria Souza', '71999900002', 'em avaliacao'),
(3, 'Loja virtual', 'carlos3@gmail.com', 'criaSite', 'Carlos Pereira', '71999900003', 'em avaliacao'),
(4, 'Formatação', 'ana4@gmail.com', 'limpeza', 'Ana Oliveira', '71999900004', 'em avaliacao'),
(5, 'Site clínica', 'pedro5@gmail.com', 'criaSite', 'Pedro Lima', '71999900005', 'em avaliacao'),
(6, 'Instala programas', 'julia6@gmail.com', 'manutencao', 'Julia Costa', '71999900006', 'em andamento'),
(7, 'Site portfólio', 'lucas7@gmail.com', 'criaSite', 'Lucas Mendes', '71999900007', 'em avaliacao'),
(8, 'Limpeza notebook', 'fernanda8@gmail.com', 'limpeza', 'Fernanda Rocha', '71999900008', 'em avaliacao'),
(9, 'Criação blog', 'rafael9@gmail.com', 'criaSite', 'Rafael Santos', '71999900009', 'em avaliacao'),
(10, 'Pasta térmica', 'beatriz10@gmail.com', 'manutencao', 'Beatriz Almeida', '71999900010', 'em avaliacao'),
(11, 'Site restaurante', 'roberto11@gmail.com', 'criaSite', 'Roberto Dias', '71999900011', 'em andamento'),
(12, 'Manutenção 5 PCs', 'patricia12@gmail.com', 'manutencao', 'Patricia Gomes', '71999900012', 'em andamento'),
(13, 'E-commerce roupas', 'thiago13@gmail.com', 'criaSite', 'Thiago Ribeiro', '71999900013', 'em andamento'),
(14, 'Limpeza e backup', 'camila14@gmail.com', 'limpeza', 'Camila Martins', '71999900014', 'em andamento'),
(15, 'Site institucional', 'eduardo15@gmail.com', 'criaSite', 'Eduardo Ferreira', '71999900015', 'em andamento'),
(16, 'Troca HD p/ SSD', 'leticia16@gmail.com', 'manutencao', 'Leticia Barros', '71999900016', 'em andamento'),
(17, 'Landing evento', 'gabriel17@gmail.com', 'criaSite', 'Gabriel Lopes', '71999900017', 'em andamento'),
(18, 'Remoção vírus', 'amanda18@gmail.com', 'limpeza', 'Amanda Teixeira', '71999900018', 'em andamento'),
(19, 'Site barbearia', 'felipe19@gmail.com', 'criaSite', 'Felipe Andrade', '71999900019', 'em andamento'),
(20, 'Windows + Office', 'isabela20@gmail.com', 'manutencao', 'Isabela Nunes', '71999900020', 'em andamento'),
(21, 'Orçado e desistiu', 'ricardo21@gmail.com', 'criaSite', 'Ricardo Castro', '71999900021', 'desistiu'),
(22, 'Formatação cara', 'simone22@gmail.com', 'manutencao', 'Simone Melo', '71999900022', 'desistiu'),
(23, 'Cliente sumiu', 'bruno23@gmail.com', 'limpeza', 'Bruno Carvalho', '71999900023', 'desistiu'),
(24, 'Loja desistência', 'tania24@gmail.com', 'criaSite', 'Tania Pires', '71999900024', 'desistiu'),
(25, 'Não aprovada', 'marcos25@gmail.com', 'manutencao', 'Marcos Azevedo', '71999900025', 'desistiu'),
(26, 'Limpeza não aprovada', 'valeria26@gmail.com', 'limpeza', 'Valeria Cunha', '71999900026', 'desistiu'),
(27, 'Site igreja', 'diego27@gmail.com', 'criaSite', 'Diego Ramos', '71999900027', 'desistiu'),
(28, 'Upgrade cancelado', 'renata28@gmail.com', 'manutencao', 'Renata Duarte', '71999900028', 'desistiu'),
(29, 'Site pessoal', 'leandro29@gmail.com', 'criaSite', 'Leandro Moura', '71999900029', 'desistiu'),
(30, 'Achou caro', 'sandra30@gmail.com', 'limpeza', 'Sandra Vieira', '71999900030', 'desistiu');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id_adm`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `orcamento`
--
ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`id_orcamento`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id_adm` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `id_orcamento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
