-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/02/2024 às 15:59
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
-- Estrutura para tabela `adm`
--

CREATE TABLE `adm` (
  `id_adm` int(11) NOT NULL,
  `adm` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `adm`
--

INSERT INTO `adm` (`id_adm`, `adm`, `email`, `senha`) VALUES
(1, 'Jose Carlos', 'jcruqui@gmail.com', '$2y$10$7rFbyhQCWn/aazfLF6.oBOIJJJu4jy8qn5mR58ZPkN83MgtlKASEK'),
(2, 'Maria da Silva', 'maria@gmail.com', '$2y$10$X17RU/juNwB.aX39K97nzuifTouyXNze70X.znjEC05jekd2tlWYa'),
(3, 'juvenal', 'maria@gmail.com', '$2y$10$EICLLeYMxWiTKJIiVmJ88OzHhb8nRrApkOYieIAcmFrtUBPnYwP..'),
(4, 'Jose Carlos', 'carlos@gmail.com', '$2y$10$f2aUcujYpu5rdusZxukPWeEd07/fTx9Q45k1k8RQqXsLkqB0C1lP2'),
(5, 'Jose Carlos', 'carlos@gmail.com', '$2y$10$tzEpic4TxYFTY/8by.oeROgRcbTT3YxkFqIO1Kk9u8jjjyoc6QYMe'),
(6, 'pedro antonio', 'pedro@gmail.com', '$2y$10$TGExO73sh0Z.BcvQ7LEXb.9/Tlo.XrM05u4zQgsd0iWTt5W/Rp0FG'),
(7, 'novo cadastro', 'novo@gmail.com', '$2y$10$PUkT5t8tAGp4dAEcQWc.MuIDlulthsWspA8lfkVGNZ54clWvmip7G');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagem`
--

CREATE TABLE `imagem` (
  `id_imagem` int(11) NOT NULL,
  `imagem` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `data` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imagem`
--

INSERT INTO `imagem` (`id_imagem`, `imagem`, `link`, `data`) VALUES
(1, '65a746321cccc', 'arquivos/65a746321cccc.jpg', '2024-01-17 00:14:58.000000'),
(2, '65a746d40aa26', 'arquivos/65a746d40aa26.jpg', '2024-01-17 00:17:40.000000');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id_tarefas` int(11) NOT NULL,
  `tarefa` varchar(100) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `prazo` varchar(150) NOT NULL,
  `prioridade` varchar(10) NOT NULL,
  `conclusao` varchar(3) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tarefas`
--

INSERT INTO `tarefas` (`id_tarefas`, `tarefa`, `descricao`, `prazo`, `prioridade`, `conclusao`, `id_usuario`) VALUES
(15, 'contatar novos clientes', 'cotinuidade da ação de vendas', '1 mes', 'alta', 'não', 1),
(16, 'Luiz Marcelino', 'asdfasdf', 's', 'media', 'sim', 5),
(17, 'contatar possíveis clientes', 'entrar em contato com os possiveis clientes através da rede social e também de forma presencial', '2 meses', 'media', 'não', 1),
(18, 'estudando tudo', 'nova descrição', 'novo prazo para esta tarefa', 'media', 'não', 5),
(19, 'estudando tudo', 'nova descrição', 'novo prazo para esta tarefa', 'media', 'não', 1),
(20, 'segunda feira', 'estamos testando novamente', '6 meses', 'media', 'sim', 5),
(21, 'levantar recursos para o projeto', 'essa pessoa deve buscar subsidios para nosso projeto', '2 meses', 'alta', 'sim', 22),
(22, 'José Carlos', 'sdfadadsafa', 'dsfadfa', 'media', 'sim', 18),
(23, '', '', '', 'baixa', 'sim', 5),
(24, '', '', '', 'baixa', 'sim', 5),
(25, '', '', '', 'baixa', 'sim', 5),
(26, '', '', '', 'baixa', 'sim', 5),
(27, '', '', '', 'baixa', 'sim', 5),
(28, '', '', '', 'baixa', 'sim', 5),
(29, '', '', '', 'baixa', 'sim', 5),
(30, '', '', '', 'baixa', 'sim', 5),
(31, '', '', '', 'baixa', 'sim', 5),
(32, '', '', '', 'baixa', 'sim', 5),
(33, '', '', '', 'baixa', 'sim', 5),
(34, '', '', '', '', 'não', 0),
(35, '', '', '', '', 'não', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `foto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`, `telefone`, `endereco`, `cidade`, `estado`, `cep`, `foto`) VALUES
(82, 'alunos', 'jcruqui@gmail.com', '$2y$10$ekW0S1q5L3aB.9fCG6Wyme6DWbnMcAEflXx/Kx9CUNTDauzhGf6g6', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', '65a60d1556f9e'),
(92, 'JOSE CARLOS CRUQUI', 'jcruqui@gmail.com', '$2y$10$0ahXpnycGgUeOY0JEkE2UOB1Jh6T69pZ/LEmLx0CjkE2b0cViYAFO', '+5541996915628', 'sfadfa', 'sdfadfa', 'Al', '83555-555', '65a60e5bf2afd'),
(98, 'pedro lima sobrinho de azeredo', 'pedrinho@gmail.com', '$2y$10$/5pty7zY0MYC7JQKPV3vgui59dKApX9scX5QVyhZkFxuqaXes0i4K', '+5541996666', 'Rua dois ', 'Colombo', 'Pr', '83505-200', '$novoNomedoArquivo.$extensao'),
(99, 'pedro lima sobrinho de azeredo', 'pedrinho@gmail.com', '$2y$10$NL5sm3c0lb.GuGmHXmchvO744G5/4GQFQKU3109p921Caw9Ozkimm', '+5541996666', 'Rua dois ', 'Colombo', 'Pr', '83505-200', '65a61070da6c2.jpg'),
(100, 'pedro lima sobrinho de azeredo', 'pedrinho@gmail.com', '$2y$10$RyA9KmSTc36KzuRpYFmWV.n77xfZZBHbKlgkXcFQDSNmT2W66LTHK', '+5541996666', 'Rua dois ', 'Colombo', 'Pr', '83505-200', '65a610f763e9e.jpg'),
(104, 'novo usuariobbb', 'jcruqui@gmail.com', '$2y$10$Fz0xVODo15ZcArFLU0gaee.KJ9NneAlTGRD..nxPRj9QyYe3UasGC', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandaré', 'Pr', '83505230', '65aa8b32838ed.jpg'),
(107, 'JOSE CARLOS CRUQUI', 'jcruqui@gmail.com', '$2y$10$VL/z2XOxQAVrXVe8X3OghuhV32RmS6JnjbRRiub8HLhBuCX3cxScW', '+5541996915628', 'sfadfa', 'sdfadfa', 'Ms', '83555-555', '65ae76ec70d87.jpg'),
(111, 'Juvenal', 'juvenal@gmail.com', '$2y$10$ZfweZ48Xq5uwiKE/.PqdI.1qbH9.bvVgZ7j.v1vibEjiaIheC/Eie', '33333333', 'rua curitiba', 'colombo', 'pr', '44444', ''),
(112, 'Lucas Martins da Silva', 'lucas@gmail.com', '$2y$10$0ou141vb9iRcnvCf/XoBFOzhW6uXXG4LNHCWaYFKcrFwPV0e2M4L2', '99999', '88888', 'Curitiba', 'Pr', '83450890', '.'),
(115, '', '', '', '', '', '', '', '', ''),
(116, '', '', '$2y$10$pBYBW6L77gEfJjtYTKXMkOtVWz8W4dJ.7Yh55eeJfU1GCSRCB4yd6', '', '', '', '', '', '.'),
(117, 'claudio da silva', 'claudio@gmail.com', '$2y$10$N0XHcbt7ylmhZFys8STfLuKR4AGXWWfiumjhDgGboYFh07HityxIe', '(99)9999-9999', 'rua dos eucaliptos, 300', 'Curitiba', 'Pr', '900000', ''),
(118, 'leoncio silveira', 'leoncio@gmail.com', '$2y$10$3XjDxuzKS21.geS20S0.HeynVPNqfPlhsgUbAuapOXBQcfCLXjZf6', '(99)9999-9999', 'rua do senac', 'Curitiba', 'Pr', '900000', ''),
(119, 'Marcia Lemos ', 'marcia@gmail.com', '$2y$10$2w2/pYv6XsLA4XerVWgZv.DSyKDZvPB7hm0c8RDmwXz9JfdF.COUW', '888888', 'rua do portao, 300', 'Curitiba', 'Pr', '8888888', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id_adm`);

--
-- Índices de tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`id_imagem`);

--
-- Índices de tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id_tarefas`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id_tarefas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
