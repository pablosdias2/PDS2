-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/11/2023 às 11:27
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `seu_banco_de_dados`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `data_publicacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `noticias`
--

INSERT INTO `noticias` (`id`, `autor`, `descricao`, `titulo`, `categoria`, `texto`, `imagem`, `data_publicacao`) VALUES
(5, 'Humberto', 'Meia-atacante fez dois gols na classificação do Brasil às quartas do Mundial da categoria', 'Estêvão, do Palmeiras, chama a atenção na Europa e é comparado a Neymar na Seleção sub-17', 'Futebol', 'Estêvão, do Palmeiras, tem chamado a atenção dos europeus enquanto brilha no Mundial sub-17 com a seleção brasileira. Autor de dois gols na vitória por 3 a 1 sobre o Equador, que classificou a equipe para as quartas de final, nesta segunda-feira, o jovem de 16 anos foi comparado a Neymar.', 'caminho/do/seu/diretorio/', '2023-11-20 19:54:41'),
(8, 'Humberto', 'De acordo com \"Olé\", técnico está insatisfeito com diretoria da federação argentina', 'Possível saída de Scaloni da Argentina seria motivada por desgaste interno', 'FUTEBOL ARGENTINO', 'Um desgaste interno seria o motivo para Lionel Scaloni ter sugerido uma possível saída do comando da seleção da Argentina. De acordo com o jornal argentino \"Olé\", o técnico campeão mundial tem uma relação deteriorada com a diretoria da Associação de Futebol Argentino (AFA), especialmente com o presidente Claudio Tapia.', 'caminho/do/seu/diretorio/LmpwZw.jpg', '2023-11-22 18:38:30'),
(10, 'Humberto', 'De acordo com \"Olé\", técnico está insatisfeito com diretoria da federação argentina', 'Possível saída de Scaloni da Argentina seria motivada por desgaste interno', 'Argentina', 'Um desgaste interno seria o motivo para Lionel Scaloni ter sugerido uma possível saída do comando da seleção da Argentina. De acordo com o jornal argentino \"Olé\", o técnico campeão mundial tem uma relação deteriorada com a diretoria da Associação de Futebol Argentino (AFA), especialmente com o presidente Claudio Tapia.', 'INFO/img/', '2023-11-22 18:41:15'),
(11, 'Pablo', 'Joia do Santos tem interesse em se transferir para Europa na próxima janela, mas prioriza a seleção brasileira e quer manter o protagonismo que possui no Peixe', 'Na mira de europeus, Marcos Leonardo impõe condições para deixar o Santos', 'Santos Futebol Clube', 'Marcos Leonardo é um dos alvos do mercado europeu na próxima janela de transferências. Aos 20 anos, a joia do Santos vem sendo sondada por alguns clubes e, antes de abrir qualquer negociação com os interessados, tem deixado claro seus objetivos: jogar a Olimpíada de Paris em 2024 e ser colocado em um projeto esportivo de longo prazo. \r\n', 'INFO/img/', '2023-11-22 19:17:40');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(12, 'Humberto de Oliveira Mendes', 'humbertomacoi@gmail.com', '123'),
(18, 'Humberto de Oliveira Mendes', 'humbertomacoi1@gmail.com', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
