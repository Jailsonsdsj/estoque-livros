-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Mar-2021 às 04:56
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
  `nome` varchar(50) NOT NULL,
  `cnpj` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `editora`
--

INSERT INTO `editora` (`ideditora`, `nome`, `cnpj`) VALUES
(1, 'Intrínseca', '5125478023'),
(2, 'Nova Fronteira', '5181815151'),
(3, 'Rocco', '0123658749'),
(4, 'Companhia das Letras', '0326587450'),
(5, 'Pinguim - Companhia das Letras', '6589745125'),
(6, '34', '1236523214'),
(7, 'SUMA', '8598745632'),
(8, 'Versus', '5212014788'),
(9, 'Leya', '9658784512'),
(10, 'Arqueiro', '20120235060'),
(11, 'Biblioteca Azul', '8074512032'),
(12, 'Record', '7202145285'),
(13, 'Harper Collins', '3025698741'),
(14, 'Sextante', '02123020120'),
(15, 'Ciranda Cultural', '0000212544'),
(16, 'Darkside', '85869001420'),
(17, 'Grupo A Educação', '023215048293'),
(18, 'Saraiva Educação', '025444478988'),
(19, 'Ediouro', '651561906495'),
(20, 'Editora Vozes', '45646897814'),
(21, 'Planeta', '5645641615'),
(22, 'Pipoca e Nanquim', '65456456654'),
(23, 'Alta Books', '54064554613'),
(24, 'Zahar', '65104896480'),
(25, 'Gen', '8408946460'),
(53, 'Cengage', '3258985478'),
(54, 'Pearson', '2223521458'),
(247, 'Citadel Editora', '5214789630'),
(248, 'Objetiva', '2521478965'),
(249, 'Editora Aleph', '55521236528'),
(250, 'Alfaguara', '2652510032');

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
(30, 'História'),
(31, 'Autoajuda'),
(32, 'Psicologia'),
(33, 'Fantasia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `idiomas`
--

CREATE TABLE `idiomas` (
  `ididioma` int(11) NOT NULL,
  `idioma` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `idiomas`
--

INSERT INTO `idiomas` (`ididioma`, `idioma`) VALUES
(1, 'Português'),
(2, 'Inglês'),
(3, 'Espanhol');

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
  `id_idioma` int(11) DEFAULT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `preco` float(6,2) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  `descricao` varchar(10000) DEFAULT 'Sem descrição',
  `imagem` varchar(100) DEFAULT NULL,
  `paginas` varchar(100) NOT NULL DEFAULT 'Não Informado',
  `amazon` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`idlivros`, `titulo`, `autor`, `id_genero`, `id_editora`, `id_tipo`, `id_idioma`, `isbn`, `preco`, `estoque`, `descricao`, `imagem`, `paginas`, `amazon`) VALUES
(60, 'Leonardo da Vinci', 'Walter Isaacson', 13, 1, 1, 1, '0505615611', 54.90, 500, 'A biografia definitiva do mestre Leonardo da Vinci, assinada pelo autor dos best-sellers Steve Jobs: A biografia e Einstein: sua vida, seu universo.\r\n\r\nCom base em milhares de páginas dos impressionantes cadernos que Leonardo manteve ao longo de boa parte da vida e nas mais recentes descobertas sobre sua obra e sua trajetória, Walter Isaacson, biógrafo de Einstein e Steve Jobs, tece uma narrativa que conecta arte e ciência, revelando faces inéditas da história de Leonardo. Desfazendo-se da aura de super-humano muitas vezes atribuída ao artista, Isaacson mostra que a genialidade de Leonardo estava fundamentada em características bastante palpáveis, como a curiosidade, uma enorme capacidade de observação e uma imaginação tão fértil que flertava com a fantasia. ', 'https://images-na.ssl-images-amazon.com/images/I/516B07o+klL._SX339_BO1,204,203,200_.jpg', '604', 'https://www.amazon.com.br/Leonardo-Vinci-Walter-Isaacson/dp/8551002570/ref=sr_1_1?__mk_pt_BR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=2UG7XD0MPBBHO&dchild=1&keywords=leonardo+da+vinci&qid=1614866346&s=books&sprefix=leonar%2Cstripbooks%2C279&sr=1-1'),
(61, 'O mundo assombrado pelos demônios', 'Carl Sagan', 3, 4, 1, 1, '8941561089141', 26.90, 500, ' Assombrado com as explicações pseudocientíficas e místicas que ocupam cada vez mais os espaços dos meios de comunicação, Carl Sagan reafirma o poder positivo e benéfico da ciência e da tecnologia para iluminar os dias de hoje e recuperar os valores da racionalidade. Como todos os livros do autor, O mundo assombrado pelos demônios está cheio de informações surpreendentes, transmitidas com humor e graça. Seus ataques muitas vezes divertidos à falsa ciência, às concepções excêntricas e aos irracio', 'https://images-na.ssl-images-amazon.com/images/I/51KR6ez4eFL._SX345_BO1,204,203,200_.jpg', '512', 'https://www.amazon.com.br/mundo-assombrado-pelos-dem%C3%B4nios/dp/853590834X/ref=sr_1_1?__mk_pt_BR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=o+mundo+assombrado&qid=1614866412&s=books&sr=1-1'),
(62, 'O guia do mochileiro das galáxias - Livro 1', 'Douglas Adams', 3, 10, 1, 1, '841561891218', 14.90, 500, ' Considerado um dos maiores clássicos da literatura de ficção científica, O guia do mochileiro das galáxias vem encantando gerações de leitores ao redor do mundo com seu humor afiado. Este é o primeiro título da famosa série escrita por Douglas Adams, que conta as aventuras espaciais do inglês Arthur Dent e de seu amigo Ford Prefect. A dupla escapa da destruição da Terra pegando carona numa nave alienígena, graças aos conhecimentos de Prefect, um E.T. que vivia disfarçado de ator desempregado en     ', 'https://images-na.ssl-images-amazon.com/images/I/51536KWgpWL._SX332_BO1,204,203,200_.jpg', '208', 'https://images-na.ssl-images-amazon.com/images/I/51536KWgpWL._SX332_BO1,204,203,200_.jpg'),
(63, 'Sapiens - Uma Breve História da Humanidade', 'Yuval Noah Harari', 30, 9, 1, 1, '181519518158', 69.90, 500, ' O que possibilitou ao Homo sapiens subjugar as demais espécies? O que nos torna capazes das mais belas obras de arte, dos avanços científicos mais impensáveis e das mais horripilantes guerras? Nossa capacidade imaginativa. Somos a única espécie que acredita em coisas que não existem na natureza, como Estados, dinheiro e direitos humanos. Partindo dessa ideia, Yuval Noah Harari, doutor em história pela Universidade de Oxford, aborda em Sapiens a história da humanidade sob uma perspectiva inovado', 'https://images-na.ssl-images-amazon.com/images/I/51fuvXO6wvL._SX346_BO1,204,203,200_.jpg', '464', 'https://www.amazon.com.br/Sapiens-Uma-Breve-Hist%C3%B3ria-Humanidade/dp/8525432180/ref=sr_1_4?__mk_pt_BR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=sapiens&qid=1614946150&s=books&sr=1-4'),
(65, 'Homo Deus', 'Yuval Noah Harari', 30, 9, 1, 1, '5151361256151', 34.90, 500, ' Neste Homo Deus: uma breve história do amanhã, Yuval Noah Harari, autor do estrondoso best-seller Sapiens: uma breve história da humanidade, volta a combinar ciência, história e filosofia, desta vez para entender quem somos e descobrir para onde vamos. Sempre com um olhar no passado e nas nossas origens, Harari investiga o futuro da humanidade em busca de uma resposta tão difícil quanto essencial: depois de séculos de guerras, fome e pobreza, qual será nosso destino na Terra? A partir de uma vi', 'https://images-na.ssl-images-amazon.com/images/I/41bUl4cVKsL._SX346_BO1,204,203,200_.jpg', '500', 'https://www.amazon.com.br/Homo-deus-Yuval-Noah-Harari/dp/8535928197/ref=pd_bxgy_img_2/146-0942222-7413046?_encoding=UTF8&pd_rd_i=8535928197&pd_rd_r=8babe8a6-d9e7-4049-bbcd-9f2604287c73&pd_rd_w=KnpA6&pd_rd_wg=c50j7&pf_rd_p=400138fd-99e3-44de-aed2-5a7aff7ca010&pf_rd_r=NAREJBB8NZK2YGNG1TJW&psc=1&refRID=NAREJBB8NZK2YGNG1TJW'),
(99, 'O morro dos ventos uivantes', 'Emily Bronte', 1, 10, 1, 1, '84891465191', 9.90, 500, ' Único romance da escritora inglesa Emily Bronte, O morro dos ventos uivantes retrata uma trágica historia de amor e obsessão em que os personagens principais são a obstinada e geniosa Catherine Earnshaw e seu irmão adotivo, Heathcliff. Grosseiro, humilhado e rejeitado, ele guarda apenas rancor no coração, mas tem com Catherine um relaciona- mento marcado por amor e, ao mesmo tempo, ódio. Essa ligação perdura mesmo com o casamento de Catherine com Edgar Linton.', 'https://images-na.ssl-images-amazon.com/images/I/51HgwirtaDL._SX346_BO1,204,203,200_.jpg', '368', 'https://www.amazon.com.br/morro-dos-ventos-uivantes/dp/8594318235/ref=pd_sbs_4?pd_rd_w=WONyN&pf_rd_p=9c5ba123-f989-4073-b05c-7d768105df02&pf_rd_r=2JTNEEWFEACV3ETJ7QTB&pd_rd_r=87e228db-9554-428b-984b-100b0d6fa009&pd_rd_wg=SJqJu&pd_rd_i=8594318235&psc=1'),
(100, 'Laranja Mecânica', 'Anthony Burgess', 29, 249, 1, 1, '5236212024826', 29.90, 500, ' Uma das mais brilhantes sátiras distópicas já escritas, Laranja Mecânica ganhou fama ao ser adaptado em uma obra magistral do cinema pelas mãos de Stanley Kubrick. O livro, entretanto, também é um clássico moderno da ficção inglesa e um marco na cultura pop, que ao lado de 1984, de George Orwell, Admirável Mundo Novo, de Aldous Huxley, e Fahrenheit 451, de Ray Bradbury, representa um dos ícones literários da alienação pós-industrial.', 'https://images-na.ssl-images-amazon.com/images/I/51Hb-SqidaL._SX347_BO1,204,203,200_.jpg', '288', 'https://www.amazon.com.br/Laranja-Mec%C3%A2nica-Anthony-Burgess/dp/8576574462/ref=pd_sim_7?pd_rd_w=H2YTJ&pf_rd_p=655513fe-73fe-4de0-b562-0ab27f959660&pf_rd_r=J96B4F9Y9YS9YMVKK0Y1&pd_rd_r=8b374213-f624-47e9-8598-48a72f808879&pd_rd_wg=Gc1CH&pd_rd_i=8576574462&psc=1'),
(101, 'O iluminado', 'Stephen King', 10, 7, 1, 1, '8581050484', 29.37, 500, ' O romance, magistralmente levado ao cinema por Stanley Kubrick, continua apaixonando (e aterrorizando) novas gerações de leitores. A luta assustadora entre dois mundos. Um menino e o desejo assassino de poderosas forças malignas. Uma família refém do mal. Nesta guerra sem testemunhas, vencerá o mais forte. ', 'https://images-na.ssl-images-amazon.com/images/I/51dU+s4FLDL._SX346_BO1,204,203,200_.jpg', '464', 'https://www.amazon.com.br/iluminado-Stephen-King/dp/8581050484/ref=sr_1_2?__mk_pt_BR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=stephen+king&qid=1615240437&sr=8-2'),
(103, 'It: A coisa', 'Stephen King', 10, 7, 1, 1, '8560280944', 59.90, 500, ' Durante as férias de 1958, em uma pacata cidadezinha do Maine, Bill, Richie, Stan, Mike, Eddie, Ben e Beverly aprenderam o real sentido da amizade, do amor, da confiança... e do medo. O mais profundo e tenebroso medo. Naquele verão, eles enfrentaram pela primeira vez a Coisa, um ser sobrenatural e maligno que deixou terríveis marcas de sangue em Derry. Quase trinta anos depois, os amigos voltam a se encontrar. Uma nova onda de terror tomou a pequena cidade. Mike Hanlon, o único que permaneceu em Derry, dá o sinal. Precisam unir forças novamente. A Coisa volta a atacar e eles devem cumprir a promessa selada com sangue que fizeram quando crianças. Só eles têm a chave do enigma. Só eles sabem o que se esconde nas entranhas de Derry. O tempo é curto, mas somente eles podem vencer a Coisa. Neste clássico de Stephen King, os amigos irão até o fim, mesmo que isso signifique ultrapassar os próprios limites.', 'https://images-na.ssl-images-amazon.com/images/I/51hyF8T4iTL._SX346_BO1,204,203,200_.jpg', '1104', 'https://www.amazon.com.br/coisa-Stephen-King/dp/8560280944/ref=sr_1_4?__mk_pt_BR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=stephen+king&qid=1615240437&sr=8-4'),
(104, 'O cemitério', 'Stephen King', 10, 7, 1, 1, '8581050395', 31.35, 500, ' O livro que inspirou o filme O cemitério maldito. Louis Creed, um jovem médico de Chicago, acredita que encontrou seu lugar em uma pequena cidade do Maine. A boa casa, o trabalho na universidade e a felicidade da esposa e dos filhos lhe trazem a certeza de que fez a melhor escolha. Num dos primeiros passeios pela região, conhecem um cemitério no bosque próximo à sua casa. Ali, gerações de crianças enterraram seus animais de estimação. Mas, para além dos pequenos túmulos, há um outro cemitério. Uma terra maligna que atrai pessoas com promessas sedutoras. Um universo dominado por forças estranhas capazes de tornar real o que sempre pareceu impossível. A princípio, Louis Creed se diverte com as histórias fantasmagóricas do vizinho Crandall. No entanto, quando o gato de sua filha Eillen morre atropelado e, subitamente, retorna à vida, ele percebe que há coisas que nem mesmo a sua ciência pode explicar. Que mistérios esconde o cemitério dos bichos? Terá o homem o direito de interferir no mundo dos mortos? Em busca das respostas, Louis Creed é levado por uma trama sobrenatural em que o limite entre a vida e a morte é inexistente. E, quando descobre a verdade, percebe que ela é muito pior que seus mais terríveis pesadelos. Pior que a própria morte - e infinitamente mais poderosa. A Capa Pode Variar.', 'https://images-na.ssl-images-amazon.com/images/I/41JKIysJ4oL._SX338_BO1,204,203,200_.jpg', '424', 'https://www.amazon.com.br/cemit%C3%A9rio-Stephen-King/dp/8581050395/ref=sr_1_6?__mk_pt_BR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=stephen+king&qid=1615240437&sr=8-6'),
(105, 'Harry Potter e a criança amaldiçoada', 'J.K. Rowling', 2, 3, 1, 1, '8532530435', 15.90, 500, ' Sempre foi difícil ser Harry Potter e não é mais fácil agora que ele é um sobrecarregado funcionário do Ministério da Magia, marido e pai de três crianças em idade escolar. Enquanto Harry lida com um passado que se recusa a ficar para trás, seu filho mais novo, Alvo, deve lutar com o peso de um legado de família que ele nunca quis. À medida que passado e presente se fundem de forma ameaçadora, ambos, pai e filho, aprendem uma incômodaverdade: às vezesas trevas vêmde lugares inesperados.', 'https://images-na.ssl-images-amazon.com/images/I/510y5gnHWaL._SX346_BO1,204,203,200_.jpg', '352', 'https://www.amazon.com.br/Harry-Potter-Crian%C3%A7a-Amaldi%C3%A7oada-Parte/dp/8532530435/ref=sr_1_4?__mk_pt_BR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=harry+potter&qid=1615240458&sr=8-4'),
(106, 'Lolita ', 'Vladimir Nabokov', 25, 250, 1, 1, '9788579620560', 39.90, 500, ' Polêmico, irônico e tocante, este romance narra o amor obsessivo de Humbert Humbert, um cínico intelectual de meia-idade, por Dolores Haze, Lolita, 12 anos, uma ninfeta que inflama suas loucuras e seus desejos mais agudos. Através da voz de Humbert Humbert, o leitor nunca sabe ao certo quem é a caça, quem é o caçador. A obra-prima de Nabokov, agora em nova tradução, não é apenas uma assombrosa história de paixão e ruína. É também uma viagem de redescoberta pela América; é a exploração da linguagem e de seus matizes; é uma mostra da arte narrativa em seu auge. Na literatura contemporânea, não existe romance como Lolita.', 'https://images-na.ssl-images-amazon.com/images/I/41J9dHKLUgL._SX319_BO1,204,203,200_.jpg', '392', 'https://www.amazon.com.br/Lolita-Vladimir-Nabokov/dp/8579620562/ref=sr_1_1?__mk_pt_BR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=lolita&qid=1615240502&sr=8-1'),
(107, 'O pequeno príncipe', ' Antoine de Saint-Exupéry', 33, 13, 1, 1, '8595081514', 10.90, 500, ' Nesta clássica história que marcou gerações de leitores em todo o mundo, um piloto cai com seu avião no deserto do Saara e encontra um pequeno príncipe, que o leva a uma jornada filosófica e poética através de planetas que encerram a solidão humana. A edição conta com a clássica tradução do poeta imortal dom Marcos Barbosa, e é a versão mais consagrada da obra, publicada no Brasil desde 1952.', 'https://images-na.ssl-images-amazon.com/images/I/41-TNa2nXtL._SX339_BO1,204,203,200_.jpg', '96', 'https://www.amazon.com.br/pequeno-pr%C3%ADncipe-Antoine-Saint-Exup%C3%A9ry/dp/8595081514/ref=sr_1_1?__mk_pt_BR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=o+pequeno+principe&qid=1615240511&sr=8-1'),
(108, '1984 ', 'George Orwell', 29, 4, 1, 1, '8535914846', 21.90, 500, 'Publicada originalmente em 1949, a distopia futurista 1984 é um dos romances mais influentes do século XX, um inquestionável clássico moderno. Lançada poucos meses antes da morte do autor, é uma obra magistral que ainda se impõe como uma poderosa reflexão ficcional sobre a essência nefasta de qualquer forma de poder totalitário', 'https://images-na.ssl-images-amazon.com/images/I/51feD87yuEL._SX321_BO1,204,203,200_.jpg', '416', 'https://www.amazon.com.br/1984-George-Orwell/dp/8535914846/ref=sr_1_4?__mk_pt_BR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=george+orwell&qid=1615240530&sr=8-4'),
(109, 'A revolução dos bichos', 'George Orwell', 7, 4, 1, 1, '8535909559', 21.40, 500, ' Verdadeiro clássico moderno, concebido por um dos mais influentes escritores do século XX, A revolução dos bichos é uma fábula sobre o poder. Narra a insurreição dos animais de uma granja contra seus donos. Progressivamente, porém, a revolução degenera numa tirania ainda mais opressiva que a dos humanos.', 'https://images-na.ssl-images-amazon.com/images/I/51Qd+WSmRFL._SX321_BO1,204,203,200_.jpg', '152', 'https://www.amazon.com.br/revolu%C3%A7%C3%A3o-dos-bichos-conto-fadas/dp/8535909559/ref=sr_1_12?__mk_pt_BR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=george+orwell&qid=1615240530&sr=8-12');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `tipo` enum('admin','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nome`, `usuario`, `senha`, `tipo`) VALUES
(1, 'Adilson', 'ads', '123', 'admin'),
(2, 'Franklinelson', 'Frank', 'gabi', 'admin'),
(3, 'zac', 'zac', 'zac', 'admin');

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
-- Índices para tabela `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`ididioma`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`idlivros`),
  ADD KEY `fk_livro_editora` (`id_editora`),
  ADD KEY `FK_livro_genero` (`id_genero`),
  ADD KEY `FK_livro_tipo` (`id_tipo`),
  ADD KEY `FK_livro_idioma` (`id_idioma`);

--
-- Índices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idtipo`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `ideditora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `idgenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `ididioma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `idlivros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `FK_livro_genero` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`idgenero`),
  ADD CONSTRAINT `FK_livro_idioma` FOREIGN KEY (`id_idioma`) REFERENCES `idiomas` (`ididioma`),
  ADD CONSTRAINT `FK_livro_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`idtipo`),
  ADD CONSTRAINT `fk_livro_editora` FOREIGN KEY (`id_editora`) REFERENCES `editora` (`ideditora`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
