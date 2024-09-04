-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jun-2024 às 15:17
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `saep_banco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE `atividades` (
  `codigo` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `turma_codigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `atividades`
--

INSERT INTO `atividades` (`codigo`, `descricao`, `turma_codigo`) VALUES
(1, 'Acesse a apostila de Testes de Sistema na Estante Virtual e faça um trabalho sobre os  tópicos 1 e 2', 1),
(2, 'Desenvolva um trabalho sobre a importância da organização de dados para análise e seus métodos de trabalho', 4),
(3, 'Explique o ciclo de PDCA', 4),
(4, 'Elabore uma sistema de cadastro de clientes com CRUD completo. Seu funcionamento deverá ser demonstrado no computador', 11),
(5, 'Elabore um projeto de inovação. Determine os objetivos do projeto e avaliar as premissas, levantamento soluções e executando testes', 12),
(6, 'Reúna-se com mais dois colegas e, a partir da leitura e reflexão do texto “Escutatória”, reflita e escreva 3 dicas para a melhora de um projeto do ínico', 5),
(7, 'Segue um livro didático usado na U.C. Bons estudos!\r\nlink.livro.com/fundamentoseletrica1', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`codigo`, `nome`, `email`, `senha`) VALUES
(1, 'Allysson Freitas', 'allysson.prof@escola.com', '123'),
(2, 'Danila Gonçalves', 'danila.prof@escola.com', '321'),
(3, 'Francisco Martins', 'chico.prof@escola.com', '456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `professor_codigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`codigo`, `nome`, `professor_codigo`) VALUES
(1, 'Teste de Sistemas - N', 1),
(3, 'Internet das Coisas - T', 3),
(4, 'Modelagem de Sistemas - M', 1),
(5, 'Ideação em Projetos - T', 2),
(6, 'Fundamentos de Eletrônica - T', 3),
(10, 'Circuitos Elétricos - T', 3),
(11, 'Desenvolvimento de Sistemas - M', 1),
(12, 'Criatividade e Inovação - T', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atividades`
--
ALTER TABLE `atividades`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `turma_codigo` (`turma_codigo`);

--
-- Índices para tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `professor_codigo` (`professor_codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atividades`
--
ALTER TABLE `atividades`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `atividades`
--
ALTER TABLE `atividades`
  ADD CONSTRAINT `atividades_ibfk_1` FOREIGN KEY (`turma_codigo`) REFERENCES `turmas` (`codigo`);

--
-- Limitadores para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `turmas_ibfk_1` FOREIGN KEY (`professor_codigo`) REFERENCES `professores` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
