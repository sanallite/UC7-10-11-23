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
-- Banco de dados: `gerenciadortarefasprof`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagem`
--

CREATE TABLE `imagem` (
  `id_imagem` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `data` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imagem`
--

INSERT INTO `imagem` (`id_imagem`, `nome`, `link`, `data`) VALUES
(3, '65a92955bd5a8', 'fotos/65a92955bd5a8.jpg', '2024-01-18 10:36:21.000000'),
(4, '65aa70faa8d69', 'fotos/65aa70faa8d69.jpg', '2024-01-19 09:54:18.000000'),
(5, '65aa715470127', 'fotos/65aa715470127.png', '2024-01-19 09:55:48.000000');

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
(34, '', '', '', '', 'não', 0);

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
(5, 'Luiz Marcelo da silva oliveira ', 'luiz@docente.pr.senac.br', '$2y$10$BJuFD15AyF5T7DhigB6YZOOMqbV07wDDUXMEFWvN/Jnqfygy.mhkO', '(41) 8887-7780', 'Rua Caçador, 300', 'Curitiba', 'Pr', '74512-452', ''),
(6, 'Luiz Marcelino novo', 'jose.cruqui@docente.pr.senac.br', '', '777777777', 'Rua fredolin wolf, 450', 'Floripa', 'Sc', '83.780-555', ''),
(14, 'Josielen da silva', 'josielen@gmail.com', '$2y$10$FPbpbMl.AgnN3pR8N3MgGe.b1nsPJOT0UJkt/pdo.ZBpWbaZzAMu.', '4136545215', 'rua espanha, 325', 'Almirante Tamandaré', 'Pr', '83505-230', ''),
(17, 'Giovane Santos Lira', 'giovane@gmail.com', '654321', '4136545215', 'Rua pietro juventus, 450', 'Colombo', 'Pr', '82505-200', ''),
(18, 'Marcia da silva', 'marcia@gm.com', '$2y$10$1Vhn3ur60koLElzkulhDq.Car3eExgPsMSpoStBvkZk.R/TI0hWvq', '4136545215', 'Rua pietro juventus, 450', 'Colomb', 'Pr', '82505-200', ''),
(20, 'Marcelo Campos Lima', 'marcelo@gmail.com', '123456', '413654', 'Rua  juventus, 450', 'curitiba', 'Pr', '82505-200', ''),
(21, 'marcia luiza santos', 'marcia@gmail.com', '', '+554199694444', 'Rua pedro luis, 300', 'Curitiba', 'Pa', '83000-230', ''),
(22, 'marcia luiza', 'marcia@gmail.com', '$2y$10$/Ogt/4KyeK45KXNp3pXqquJspha5gDd/OgwR/kfV550pbdhs77qNu', '+554199694444', 'Rua pedro luis, 300', 'Curitiba', 'Pa', '83000-230', ''),
(34, 'Angelo Marcos da Silva', 'angelo@gmail.com', '$2y$10$RLEEMnK6yZD4ynIbQIMMAu/en9K//TujmS7xWKmFEr1JBHElh/.4S', '(41)4578-44444', 'Rua dois da Silva, 550', 'Curitiba', 'Pr', '80.450-200', ''),
(43, 'José aparecido', 'jcruqui@gmail.com', '$2y$10$ZmuSTiJ8JLJXKHdK4Zki3uCnlAqHeaKPA56R8pV90tSXvTdOJd1eG', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', ''),
(44, 'Gustavo Ferreira Dos Santos', 'gustavo@gmail.com', '$2y$10$yAt2RpB4vxonNuAA8xtKQe8AZGL8hXwEE..8O6Tvq30vo7g5bqdEG', '1213214546', 'Rua MINHA CASA, 450', 'CURITIBA', 'Pr', '83500-111', ''),
(45, 'Gustavo Henrique Mateus dos Santos', 'mateus@gmail.com', '$2y$10$WUncvugZ/ULuatQrunaAG.KQprSE2AbT942G56yXD.lnWxlsdmoqa', '1213214546', 'Rua MINHA CASA, 450', 'CURITIBA', 'Pr', '83500-111', ''),
(49, 'marilia maria', 'marilia@gmail.com', '$2y$10$RywEMbhlL0UlyoV86kSnnOop6TODKq.heWItXjS3.om/l8YIB1.Jy', '4170707070', 'Rua Caçador, 900', 'CURITIBA', 'Pr', '83500-111', ''),
(52, 'Juvenal Antena Parabólica', 'antena@gmail.com', '$2y$10$Ys/7fgOg4eWfbkp8aoZ/teZXs6FSfiVa6yd92pDqhDktslc7qX4Gq', '41 707070-70', 'Rua dos cravos, 333', 'Curitiba', 'Pr', '83250-000', ''),
(61, 'José Carlos', 'jcruqui@gmail.com', '$2y$10$ZJyaz49KxNO2hIk0oWP/OeCN8N520XcKuIkoYgdybz.uJdcgQGqYq', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', ''),
(62, 'José Carlos', 'jcruqui@gmail.com', '$2y$10$7lyNX9bjVDgAJTkYK/ktd.21kgqGaABkMHr1e8XlTaPcbJbVZK.su', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', ''),
(63, 'José Carlos', 'jcruqui@gmail.com', '$2y$10$39o0.6mKTEd7r7Nm28UH0u04P.2Bzmv.WJqYVEYVXbtvraGPgw4.C', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', ''),
(64, 'José Carlos', 'jcruqui@gmail.com', '$2y$10$4vfXvImrfPsA9FN9YZELB.B2Mpq3NyOHxFNU.TMP3DaAbta0Gt8im', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', ''),
(65, 'José Carlos', 'jcruqui@gmail.com', '$2y$10$lwPmlc9vJY6hmLYWErCH/uXIFnQdw7hmN9OEejqRDoiMSDP6HjT/6', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', ''),
(66, 'José Carlos', 'jcruqui@gmail.com', '$2y$10$9cLlRjUmxpG8v01YffdffO3MhZPhIrOBquFZ1zm8xr12pkqoMycOW', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', ''),
(70, 'novo teste', 'jcruqui@gmail.com', '$2y$10$KKtjYJ0nkA9k2jZIscxnw.OgrCCfDbdoGOB9eAR.2YGSi9JKIaENO', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', ''),
(71, 'novo teste', 'jcruqui@gmail.com', '$2y$10$Mer3DbYv4howlY.NDk.3WODNT0AYeSEHz/IdgnOhulnCyChrAUeqy', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', ''),
(72, 'novo teste', 'jcruqui@gmail.com', '$2y$10$aFl8zI6cUMPQENwmqjCHVO3pXviU5okkxYAWz0UZc9jXUYZXgWvjy', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', '65a606d599f06jpg'),
(74, 'novo usuario', 'jcruqui@gmail.com', '$2y$10$ywAWzxDZKwFhBj8.HpQv1uQxyftDi.APbtApCcotTKX1Y6CklAb56', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', '65a606f249035jpg'),
(75, 'novo usuario', 'jcruqui@gmail.com', '$2y$10$Z6UxMnLrHLozf7bHdZU08.ltdpEA2jxWyzmGmRSnshZYCKpWK7EcG', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', '65a607e7b2bff'),
(76, 'novo usuario', 'jcruqui@gmail.com', '$2y$10$g99lT8tJ14qlCQoFkwaC0ud2/x3Lj5KjC7szeaj.vbpDXf.JDIINm', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', '65a607f955de8'),
(77, 'novo usuario', 'jcruqui@gmail.com', '$2y$10$zxlVaSQmqR8u7BQq6ognh.TCv.hXB0DHU/altpAXKugc4s8oq5lZK', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', '65a608836771f'),
(78, 'novo usuario', 'jcruqui@gmail.com', '$2y$10$/c/Kw/UgnwXMQhlgChmX2.A5LkPNeNySS2HPWjqvCUkMPdlHWgwSG', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', '65a608c0d1709'),
(79, 'novo usuario', 'jcruqui@gmail.com', '$2y$10$exAYVF9ksQexgDjBsMTF7.IVGsu24bBwnAe3gjkynGT6/6er/YVJ2', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', '65a60931140a9'),
(80, 'novo usuario', 'jcruqui@gmail.com', '$2y$10$tBLzlc0RnLcOreEMioeL.uYAiKhEPBzjQZmq/r9v8Wi4VxEiT4NzO', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', '65a60ab45591d'),
(81, 'novo usuario', 'jcruqui@gmail.com', '$2y$10$RedlZLhjecXYO.jCG7BtOefMC1Wi0Jvc2EzrBPr/5XEVBerL28rpS', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', '65a60d0497fd6'),
(82, 'novo usuario', 'jcruqui@gmail.com', '$2y$10$0C/YdlfdE3nbucK2s98cSuU2AuU3toN9cmMyOtOEUiVB2rPQ9mONO', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', '65a60d1556f9e'),
(84, 'em teste ', 'teste@gmail.com', '$2y$10$ZfxCZZPzc9YdKCOHLI0LaOzH1qnnlfpglXjreOlnXvv4zEoWVIOKi', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', '65a60d4649c0f'),
(85, 'em teste ', 'teste@gmail.com', '$2y$10$4vcTpW7xd1wVvR5bWyOTIuTWkDAplMnH7w4OUEiLm/yfYBm1fPX2m', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', '65a60d784e781'),
(88, 'Juvenal Antena Parabólica', 'teste@gmail.com', '$2y$10$.CcuZi8d7dJS9t7b1HDlc.vanQIRFoKW6qxwj/ugUV8kEBBAz7gL2', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Al', '83505230', '65a60dc431dda'),
(89, 'Juvenal Antena Parabólica', 'teste@gmail.com', '$2y$10$YfU6posP1OwXt3q7esJ3uOlf/28W2tl9Pollilm61lKljZ0bwjglq', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Al', '83505230', '65a60e1ad4aaa'),
(90, 'Juvenal Antena Parabólica', 'teste@gmail.com', '$2y$10$ZBlGGK.M3WhdEWKSdLVf1.vEo7COWecoiw37i2hOciTAytmf7Bmfq', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Al', '83505230', '65a60e1f15c66'),
(92, 'JOSE CARLOS CRUQUI', 'jcruqui@gmail.com', '$2y$10$0ahXpnycGgUeOY0JEkE2UOB1Jh6T69pZ/LEmLx0CjkE2b0cViYAFO', '+5541996915628', 'sfadfa', 'sdfadfa', 'Al', '83555-555', '65a60e5bf2afd'),
(95, 'José Carlos souza santos', 'jcruqui@gmail.com', '$2y$10$boJiodzE/NwPYS8zjHIlvOXRf.pTYSiAtZ.38GafUwm/vkLFLxjt6', '+5541996915628', 'Rua Espanha, 127', 'almirante tamandare', 'Pr', '83505230', 'imagem1'),
(98, 'pedro lima sobrinho de azeredo', 'pedrinho@gmail.com', '$2y$10$/5pty7zY0MYC7JQKPV3vgui59dKApX9scX5QVyhZkFxuqaXes0i4K', '+5541996666', 'Rua dois ', 'Colombo', 'Pr', '83505-200', '$novoNomedoArquivo.$extensao'),
(99, 'pedro lima sobrinho de azeredo', 'pedrinho@gmail.com', '$2y$10$NL5sm3c0lb.GuGmHXmchvO744G5/4GQFQKU3109p921Caw9Ozkimm', '+5541996666', 'Rua dois ', 'Colombo', 'Pr', '83505-200', '65a61070da6c2.jpg'),
(100, 'pedro lima sobrinho de azeredo', 'pedrinho@gmail.com', '$2y$10$RyA9KmSTc36KzuRpYFmWV.n77xfZZBHbKlgkXcFQDSNmT2W66LTHK', '+5541996666', 'Rua dois ', 'Colombo', 'Pr', '83505-200', '65a610f763e9e.jpg'),
(102, '', '', '', '', '', '', '', '', ''),
(103, '', '', '', '', '', '', '', '', ''),
(104, '', '', '', '', '', '', '', '', ''),
(105, '', '', '', '', '', '', '', '', ''),
(106, '', '', '', '', '', '', '', '', ''),
(107, '', '', '', '', '', '', '', '', ''),
(108, '', '', '', '', '', '', '', '', ''),
(109, '', '', '', '', '', '', '', '', ''),
(110, '', '', '', '', '', '', '', '', ''),
(111, '', '', '', '', '', '', '', '', ''),
(112, '', '', '', '', '', '', '', '', ''),
(113, '', '', '', '', '', '', '', '', ''),
(114, '', '', '', '', '', '', '', '', ''),
(115, 'lucas dos santos', 'jcruqui@gmail.com', '', '4199999999', 'Rua Caçador, 300', 'Curitiba', 'Pr', '83.230-00', ''),
(116, '', '', '', '', '', '', '', '', ''),
(117, '', '', '', '', '', '', '', '', ''),
(118, '', '', '', '', '', '', '', '', ''),
(119, 'Márcio', 'ad@aafdaf.com', '', '13141', 'dgh', 'shgshgs', 'Mt', '1474814', ''),
(120, 'Márcio', 'ad@aafdaf.com', '', '13141', 'dgh', 'shgshgs', 'Mt', '1474814', ''),
(121, 'Aline', 'ad@aafdaf.com', '', '13141', 'dgh', 'shgshgs', 'Pr', '1474814', ''),
(122, '', '', '', '', '', '', '', '', '.'),
(123, 'Aline', 'ad@aafdaf.com', '', '', '', 'shgshgs', 'Pr', '1474814', '65ae78b91bb44.jpg');

--
-- Índices para tabelas despejadas
--

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
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id_tarefas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
