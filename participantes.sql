-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 10 Mai 2015 à 06:43
-- Version du serveur :  5.5.42-37.1
-- Version de PHP :  5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `kate_Yearbook`
--

-- --------------------------------------------------------

--
-- Structure de la table `cidades`
--

CREATE TABLE IF NOT EXISTS `cidades` (
  `idCidade` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL,
  `nomeCidade` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cidades`
--

INSERT INTO `cidades` (`idCidade`, `idEstado`, `nomeCidade`) VALUES
(1, 1, 'Belo Horizonte'),
(2, 1, 'Araxa'),
(3, 2, 'Brasilia'),
(4, 3, 'Rio de Janeiro'),
(5, 1, 'Barbacena'),
(6, 1, 'Alvinopolis'),
(7, 1, 'Passo Fundo');

-- --------------------------------------------------------

--
-- Structure de la table `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `idEstado` int(11) NOT NULL,
  `sigaEstado` char(2) NOT NULL,
  `nomeEstado` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `estados`
--

INSERT INTO `estados` (`idEstado`, `sigaEstado`, `nomeEstado`) VALUES
(1, 'MG', 'Minas Gerais'),
(2, 'DF', 'Distrito Federal'),
(3, 'RJ', 'Rio de Janeiro'),
(4, 'SP', 'São Paulo');

-- --------------------------------------------------------

--
-- Structure de la table `participantes`
--

CREATE TABLE IF NOT EXISTS `participantes` (
  `login` varchar(20) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nomeCompleto` varchar(50) NOT NULL,
  `arquivoFoto` varchar(50) NOT NULL,
  `cidade` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `descricao` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `participantes`
--

INSERT INTO `participantes` (`login`, `senha`, `nomeCompleto`, `arquivoFoto`, `cidade`, `email`, `descricao`) VALUES
('Alessandro', '81dc9bdb52d04dc20036dbd8313ed055', 'Alessandro Magno de Paula', 'fotos/minhafotojpg.jpg', 6, 'alessandro@amsistemas.com.br', 'Sou Analista de Sistemas há 16 anos, desde 1998 trabalho com WEB, já desenvolvi vários sites, sistemas e aplicações. Para aliviar o &quot;stress&quot; da Área de Tecnologia da Informação, trabalho com música, dando aulas ou tocando em festas e bares.'),
('Cassio', '81dc9bdb52d04dc20036dbd8313ed055', 'Cássio Henrique Borges', 'fotos/f1.png', 2, 'cassiohenriqueborges@hotmail.com', 'Formado em Sistemas de Informação pela faculdade - Centro Universitário do Planalto de Araxá - Pos Graduado pela Uni Minas em Segurança da Informação. Trabalho na Área de ti há 12 anos com infra-estrutura de rede e servidores Windows e Linux. Atualmente decidi mudar um foco e embarquei neste novo desafio da minha vida que é desenvolver Aplicativos para Web.'),
('Daniela', '81dc9bdb52d04dc20036dbd8313ed055', 'Daniela Gondim', 'fotos/Daniela.jpg', 2, 'daniela.gondim2012@gmail.com', 'Sou formada em Sistemas de Informação pela Universidade de Uberaba e trabalho a 2 anos como Analista de Sistemas no setor de desenvolvimento.'),
('daw', '480f52bd6acb8fe9020e845030819823', 'Daw - Usuário de teste', 'fotos/6376aurora.jpg', 1, 'daw@gmail.com', 'Usuário de teste'),
('Fabiano', '81dc9bdb52d04dc20036dbd8313ed055', 'Fabiano Pessoa', 'fotos/1044827_1374547779429655_1328465492_n.jpg', 4, 'Fabiano.pessoa5@gmail.com', 'Tenho 32 anos, Sou bacharel em Administração pela Estácio de Sá, Põs-Graduado em Engenharia de Software pela ULT , formação técnica em Suporte e Segurança em TI, Especialista em Segurança da Informação e Perícia Computacional Forense. Atuo desde 2011 com teste de invasão e análise de vulnerabilidades, atualmente trabalhando como Analista de Infraestrutura Sênior na Embratel do Rio de Janeiro no setor de homologação de software e hardware para o grupo Carso que '),
('JoaoAugusto', '81dc9bdb52d04dc20036dbd8313ed055', 'João Augusto Lima Ferreira', 'fotos/JoaoAugusto.jpg', 1, 'joaoaugusto@gmail.com', 'Possuo vivêcia em análise e desenvolvimento de sistemas, tenho proficiência em data warehouse, fiz cursos oficiais nas ferramentas Business Objects (OLAP) e Power Center (ETL). Também tenho vivência e formação oficial no banco de dados Oracle, além disso, sou certificado no sistema operacional Linux. Venho desenvolvendo aplicativos para WEB desde 2003, já utilizei as linguagens: PHP, Javascript, .Net, C#, Java, Ajax, Xajax. Já passei por micro empresas de desenvolvimento até grandes fábricas de'),
('Juliana', '81dc9bdb52d04dc20036dbd8313ed055', 'Juliana Aparecida da Silva', 'fotos/foto.jpg', 5, 'julianapr.silva@gmail.com', 'Olá, sou formada Sistemas para Internet pelo IF Sudeste MG - Campus Barbacena.\r\n\r\nTenho experiência na Área de desenvolvimento, administração e configuração de sistemas de informações e ambientes operacionais. Sou apaixonada sistema operacional linux e programação. Meu hobbie é ler livros e escutar músicas.\r\n\r\n Só sei que nada sei. Sócrates'),
('kate', '81dc9bdb52d04dc20036dbd8313ed055', 'Klaisler Antunes Santos', 'fotos/Kate.jpg', 1, 'katekas@gmail.com', 'Bacharel em Sistemas de Informação pela PUC Minas - São Gabriel (Belo Horizonte - Minas Gerais) concluído no segundo semestre de 2009. Trabalho com desenvolvimento Web desde 2007 quando participei do programa Proform .NET (student to Business) criado pela Microsoft com o apoio da PUC Minas.                                                                                                         '),
('Leonardo', '81dc9bdb52d04dc20036dbd8313ed055', 'Leonardo Cabral', 'fotos/Leonardo.jpeg', 1, 'mail@larback.com.br', '&quot;In google we trust&quot;'),
('Nikolas', '81dc9bdb52d04dc20036dbd8313ed055', 'Nikolas Rodrigues Teixeira', 'fotos/Nikolas.jpg', 1, 'nikolasrod@gmail.com', 'Formado em Análise e Desenvolvimento de Sistemas, programador Python na empresa Starline Tecnologia. Chrome é o melhor navegador, não odeio o Windows 8, Android é melhor que iOS, Xbox é melhor que PS3. :)'),
('nilson', '81dc9bdb52d04dc20036dbd8313ed055', 'Nilson Aparecido Teodoro', 'fotos/Nilson.jpg', 2, 'nilsonkz22@gmail.com', 'Formado em Sistemas de informação pela Universidade de Araxá, onde concluí o mesmo em Dezembro de 2010. Atuo como Analista de Sistemas desde 2010, onde iniciei como DBA, e atualmente sou desenvolvedor ASP.Net. Optar por essa pós-graduação foi imediata, pois irei adquirir e quem sabe repassar conhecimentos, construir novas alianças, e claro sempre buscando novos desafios.\r\n'),
('Rodrigo', '81dc9bdb52d04dc20036dbd8313ed055', 'Rodrigo Batista Balthazar', 'fotos/rodrigobalthazar.jpg', 3, 'rodrigobalthazar@yahoo.com', 'Olá, sou engenheiro eletricista e entusiasta na Área de linguística. Além dessas Áreas, tenho interesse em diversas outras, como a música, o canto, a literatura, as artes marciais e a corrida, para as quais já dediquei ou dedico certo tempo em minha vida.');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`idCidade`);

--
-- Index pour la table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`idEstado`), ADD UNIQUE KEY `sigaEstado` (`sigaEstado`);

--
-- Index pour la table `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cidades`
--
ALTER TABLE `cidades`
  MODIFY `idCidade` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `estados`
--
ALTER TABLE `estados`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
