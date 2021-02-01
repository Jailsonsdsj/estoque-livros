-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Fev-2021 às 23:21
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estoquelivros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE `editora` (
  `ideditora` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `editora`
--

INSERT INTO `editora` (`ideditora`, `nome`) VALUES
(1, 'Intrínseca'),
(2, 'Nova Fronteira'),
(3, 'Rocco'),
(4, 'Companhia das Letras'),
(5, 'Pinguim - Companhia das Letras'),
(6, '34'),
(7, 'SUMA'),
(8, 'Versus'),
(9, 'Leya'),
(10, 'Arqueiro'),
(11, 'Biblioteca Azul'),
(12, 'Record'),
(13, 'Harper Collins'),
(14, 'Sextante'),
(15, 'Ciranda Cultural'),
(16, 'Darkside'),
(17, 'Grupo A Educação'),
(18, 'Saraiva Educação'),
(19, 'Ediouro'),
(20, 'Editora Vozes'),
(21, 'Planeta'),
(22, 'Pipoca e Nanquim'),
(23, 'Alta Books'),
(24, 'Zahar'),
(25, 'Gen'),
(53, 'Cengage'),
(54, 'Pearson');

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `idgenero` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`idgenero`, `nome`) VALUES
(1, 'Romance'),
(2, 'Infantojuvenil'),
(3, 'Ficção'),
(4, 'Não Ficção'),
(5, 'Poesia'),
(6, 'Conto'),
(7, 'Fábula'),
(8, 'Romance Policial'),
(9, 'Ensaio'),
(10, 'Terror'),
(11, 'Drama'),
(12, 'Eupopeia'),
(13, 'Biografia'),
(14, 'Auto Biografia'),
(15, 'Literatura Brasileira'),
(16, 'Literatura Estrangeira'),
(17, 'Literatura fantástica'),
(18, 'Novela'),
(19, 'Suspence'),
(20, 'Religioso'),
(21, 'Didático'),
(22, 'Educação'),
(23, 'Mistério'),
(24, 'Literatura Russa'),
(25, 'Literatura Clássica'),
(26, 'Investigação'),
(27, 'Aventura'),
(28, 'Utopia'),
(29, 'Distopia'),
(30, 'História');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `idlivros` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `id_editora` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `isbn` char(10) DEFAULT NULL,
  `preco` float(6,2) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT 'Sem descrição',
  `imagem` varchar(100) DEFAULT NULL,
  `idioma` varchar(30) DEFAULT 'Português',
  `paginas` varchar(100) NOT NULL DEFAULT 'Não Informado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`idlivros`, `titulo`, `autor`, `id_genero`, `id_editora`, `id_tipo`, `isbn`, `preco`, `estoque`, `descricao`, `imagem`, `idioma`, `paginas`) VALUES
(1, 'Os Miseráveis', 'Victor Hugo', 16, 2, 2, '8520942210', 97.99, 500, 'Um dos maiores clássicos da literatura mundial, Os miseráveis é considerado um manifesto contra a desigualdade e as injustiças sociais. Publicado originalmente em 1862, descreve de maneira vívida a sociedade francesa do século XIX, traçando também um panorama político da época. Com narrativa envolvente e trama complexa, a história é centrada em Jean Valjean, que, após cumprir 19 anos de prisão pelo roubo de um pão e ter sido submetido a trabalhos forçados, tem seu destino entrelaçado ao de perso', 'img/livros/os_miseraveis.jpg', 'Português', '1560 '),
(2, 'Guerra e paz ', 'Liev Tolstói', 16, 4, 2, '2536587898', 99.99, 325, 'Sem descrição', 'img/livros/guerra_e_paz.jpg', 'Português', '1544 '),
(3, 'Grande sertão: veredas', 'Guimarães Rosa', 15, 2, 2, '2512142111', 49.90, 25, 'Sem descrição', 'img/livros/grande_sertao_veredas.jpg', 'Português', '496'),
(4, '1984 ', 'George Orwell', 29, 4, 1, '1112121225', 19.99, 214, 'Sem descrição', 'img/livros/1984.jpg', 'Português', '416'),
(5, 'A revolução dos bichos', 'George Orwell', 7, 4, 1, '9555987458', 19.90, 451, 'Sem descrição', 'img/livros/a_revolucao_dos_bichos.jpg', 'Português', '152'),
(6, 'Capitães da areia', 'Jorge Amado', 15, 4, 1, '2325487495', 19.90, 254, 'Sem descrição', 'img/livros/capitaes_de_areia.jpg', 'Português', '280'),
(7, 'O morro dos ventos uivantes', 'Emily Bronte', 25, 1, 1, '8594318235', 9.90, 217, 'Sem descrição', 'img/livros/o_morro_dos_ventos_uivantes.jpg', 'Português', '368'),
(8, 'A Hora da Estrela', 'Clarice Lispector', 15, 3, 1, '853250812X', 19.90, 347, 'Sem descrição', 'img/livros/a_hora_da_estrela.jpg', 'Português', '88'),
(9, 'Fahrenheit 451 ', 'Ray Bradbury', 29, 11, 1, '8525052248', 24.99, 124, 'Sem descrição', 'img/livros/fahrenheit_451.jpg', 'Português', '169'),
(10, 'Admirável mundo novo', 'Aldous Leonard Huxley', 29, 11, 1, '8525056006', 22.99, 369, 'Sem descrição', 'img/livros/admiravel_mundo_novo.jpg', 'Português', '312'),
(11, 'A morte de Ivan Ilitch', 'Lev Tolstói', 24, 6, 1, '8573263598', 27.90, 412, 'Sem descrição', 'img/livros/a_morte_de_ivan_ilitch.jpg', 'Português', '96'),
(12, 'Lolita ', 'Vladimir Nabokov', 16, 7, 1, '9788579620', 43.12, 421, 'Sem descrição', 'img/livros/lolita.jpg', 'Português', '392'),
(13, 'Madame Bovary', 'Gustave Flaubert ', 1, 5, 1, '2252012547', 28.99, 350, 'Sem descrição', 'img/livros/madame_bobary.jpg', 'Português', '496'),
(14, 'David Copperfield', 'Charles Dickens', 25, 5, 1, '2369852014', 46.99, 321, 'Sem descrição', 'img/livros/david_copperfield.jpg', 'Português', '1160'),
(15, 'Misery', 'Stephen King', 10, 7, 1, '2223569855', 39.00, 500, 'Sem descrição', 'img/livros/misery.jpg', 'Português', '328'),
(16, 'Orgulho e preconceito', 'Jane Austen', 1, 14, 1, '8544001823', 44.90, 212, 'Sem descrição', 'img/livros/orgulho_e_preconceito.jpg', 'Português', '424');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `idtipo` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`idtipo`, `nome`) VALUES
(1, 'Capa Comum'),
(2, 'Capa Dura');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`ideditora`);

--
-- Índices para tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idgenero`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`idlivros`),
  ADD KEY `fk_livro_editora` (`id_editora`);

--
-- Índices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idtipo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `ideditora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `idgenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `idlivros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `fk_livro_editora` FOREIGN KEY (`id_editora`) REFERENCES `editora` (`ideditora`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
