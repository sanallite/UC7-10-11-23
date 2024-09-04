-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/01/2024 às 15:39
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
-- Banco de dados: `gerenciador_de_tarefas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens`
--

CREATE TABLE `imagens` (
  `id_imagem` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imagens`
--

INSERT INTO `imagens` (`id_imagem`, `nome`, `link`, `data`) VALUES
(1, '65a92bf1a4d39', 'apenas_fotos/65a92bf1a4d39.jpg', '2024-01-18 10:47:29'),
(2, '65a92c2172d3f', 'apenas_fotos/65a92c2172d3f.jpg', '2024-01-18 10:48:17'),
(3, '65a93a10d2524', 'apenas_fotos/65a93a10d2524.jpg', '2024-01-18 11:47:44');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id` int(11) NOT NULL,
  `nome_tarefa` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `prazo` varchar(100) DEFAULT NULL,
  `prioridade` varchar(100) DEFAULT NULL,
  `conclusao` varchar(3) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tarefas`
--

INSERT INTO `tarefas` (`id`, `nome_tarefa`, `descricao`, `prazo`, `prioridade`, `conclusao`, `id_usuario`) VALUES
(1, 'Refazer a edição de tarefas', 'feito', 'amanhã', 'Alta', 'Sim', 6),
(4, 'Fazer a edição de usuários', 'Feito', 'amanhã', 'Média', 'Sim', 5),
(5, 'Melhorar o select do html', 'Na criação de tarefas e usuários ter a opção \"Selecione\", mas não permitir que o usuário salve algo sem selecionar um valor válido', 'Sexta', 'Média', 'Sim', 1),
(6, 'Melhor a edição de tarefas', 'Fazer com que o checkbox mude de estado conforme a tarefa foi marcada como concluída ou não.', 'Sexta', 'Média', 'Sim', 10),
(7, 'Exibir nome do responsável', 'Substituir a exibição do id pelo nome do usuário na tabela de tarefas', 'Sexta', 'Alta', '', 1),
(8, 'Melhorar a alteração de senha', 'Para que você possa escolher se irá mudá-la ou não e separar os querys ', 'Sexta', 'Média', 'Não', 1),
(11, 'Detalhes', 'Não existe constraint definida então você pode apagar usuários como quiser, mas isso vai deixar as tarefas orfãs, pois estão ligadas a um id que não existe mais', '', 'Média', 'Não', 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(300) NOT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `link_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `telefone`, `email`, `senha`, `rua`, `cidade`, `estado`, `cep`, `link_foto`) VALUES
(10, 'Márcio', '', '', '$2y$10$aSigjf6mdr8GVpHNEpMhLO2urbueaEZfMDF5yzi2iQfhaWeXrJY4u', '', 'Pinhais', 'PR', '', ''),
(11, 'Márcio Teodoro', '', 'marcio@proton', '$2y$10$OsZHbDh6/NbY3LTPu198TuLwMXb.vLUcG0TvRmXw4SRMeZHLua7ay', '', 'Pinhais', 'PR', '', ''),
(12, 'Emersom Caminhões', '', 'volvo@se', '$2y$10$OUP2MvscJLqPvHiDTEnM7O6L7LTwhVvj0s0XH4Ar04kKqil2ov5tm', '', 'Curitiba', 'PR', '', ''),
(13, 'Aline', '', 'ad@aafdaf.com', '$2y$10$Fg.WgmL9opwytCmxtu0uG.Yy4t4FM7J3J0TPiGwHCQs8cEnkmeWK2', '', 'shgshgs', 'PR', '1474814', 'fotos/65ae79fe17adbjpg'),
(14, 'Yuni', '', '', '$2y$10$eWjQAYLi8jWqG1jBfbWiQuN4.ypjbUftcBXuFf6pgmliVmBwe7DZa', '', 'Landosol', 'NULL', '', 'fotos/65ae7a8925577.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id_imagem`);

--
-- Índices de tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
