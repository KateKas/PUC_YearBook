-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Maio-2014 às 05:53
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `daw_yearbook`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `participantes`
--

CREATE TABLE IF NOT EXISTS `participantes` (
  `login` varchar(20) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nomeCompleto` varchar(50) NOT NULL,
  `arquivoFoto` varchar(50) NOT NULL,
  `cidade` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `descricao` varchar(5000) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `participantes`
--

INSERT INTO `participantes` (`login`, `senha`, `nomeCompleto`, `arquivoFoto`, `cidade`, `email`, `descricao`) VALUES
('Alessandro', '81dc9bdb52d04dc20036dbd8313ed055', 'Alessandro Magno de Paula', 'fotos/minhafotojpg.jpg', 6, 'alessandro@amsistemas.com.br', 'Sou Analista de Sistemas hÃƒÂ¡ 16 anos, desde 1998 trabalho com WEB, jÃƒÂ¡ desenvolvi vÃƒÂ¡rios sites, sistemas e aplicaÃƒÂ§ÃƒÂµes. Para aliviar o &quot;stress&quot; da ÃƒÂ¡rea de Tecnologia da InformaÃƒÂ§ÃƒÂ£o, trabalho com mÃƒÂºsica, dando aulas ou tocando em festas e bares.'),
('Cassio', '81dc9bdb52d04dc20036dbd8313ed055', 'CÃƒÂ¡ssio Henrique Borges', 'fotos/f1.png', 2, 'cassiohenriqueborges@hotmail.com', 'Formado em Sistemas de InformaÃƒÂ§ÃƒÂ£o pela faculdade - Centro UniversitÃƒÂ¡rio do Planalto de AraxÃƒÂ¡ - Pos Graduado pela Uni Minas em SeguranÃƒÂ§a da InformaÃƒÂ§ÃƒÂ£o. Trabalho na ÃƒÂ¡rea de ti hÃƒÂ¡ 12 anos com infra-estrutura de rede e servidores Windows e Linux. Atualmente decidi mudar um foco e embarquei neste novo desafio da minha vida que ÃƒÂ© desenvolver Aplicativos para Web.'),
('Daniela', '81dc9bdb52d04dc20036dbd8313ed055', 'Daniela Gondim', 'fotos/Daniela.jpg', 2, 'daniela.gondim2012@gmail.com', 'Sou formada em Sistemas de InformaÃƒÂ§ÃƒÂ£o pela Universidade de Uberaba e trabalho a 2 anos como Analista de Sistemas no setor de desenvolvimento.'),
('daw', '480f52bd6acb8fe9020e845030819823', 'Daw - UsuÃƒÂ¡rio de teste', 'fotos/6376aurora.jpg', 1, 'daw@gmail.com', 'UsuÃƒÂ¡rio de teste'),
('Fabiano', '81dc9bdb52d04dc20036dbd8313ed055', 'Fabiano Pessoa', 'fotos/1044827_1374547779429655_1328465492_n.jpg', 4, 'Fabiano.pessoa5@gmail.com', 'Tenho 32 anos, Sou bacharel em AdministraÃƒÂ§ÃƒÂ£o pela EstÃƒÂ¡cio de SÃƒÂ¡, PÃƒÂ³s-Graduado em Engenharia de Software pela ULT , formaÃƒÂ§ÃƒÂ£o tÃƒÂ©cnica em Suporte e SeguranÃƒÂ§a em TI, Especialista em SeguranÃƒÂ§a da InformaÃƒÂ§ÃƒÂ£o e PerÃƒÂ­cia Computacional Forense. Atuo desde 2011 com teste de invasÃƒÂ£o e anÃƒÂ¡lise de vulnerabilidades, atualmente trabalhando como Analista de Infraestrutura SÃƒÂªnior na Embratel do Rio de Janeiro no setor de homologaÃƒÂ§ÃƒÂ£o de software e hardware para o grupo Carso que, compÃƒÂµe CLARO, NET entre outras emp'),
('JoaoAugusto', '81dc9bdb52d04dc20036dbd8313ed055', 'JoÃƒÂ£o Augusto Lima Ferreira', 'fotos/JoaoAugusto.jpg', 1, 'joaoaugusto@gmail.com', 'Possuo vivÃƒÂªncia em anÃƒÂ¡lise e desenvolvimento de sistemas, tenho proficiÃƒÂªncia em data warehouse, fiz cursos oficiais nas ferramentas Business Objects (OLAP) e Power Center (ETL). TambÃƒÂ©m tenho vivÃƒÂªncia e formaÃƒÂ§ÃƒÂ£o oficial no banco de dados Oracle, alÃƒÂ©m disso, sou certificado no sistema operacional Linux. Venho desenvolvendo aplicativos para WEB desde 2003, jÃƒÂ¡ utilizei as linguagens: PHP, Javascript, .Net, C#, Java, Ajax, Xajax. JÃƒÂ¡ passei por micro empresas de desenvolvimento atÃƒÂ© grandes fÃƒÂ¡bricas de'),
('Juliana', '81dc9bdb52d04dc20036dbd8313ed055', 'Juliana Aparecida da Silva', 'fotos/foto.jpg', 5, 'julianapr.silva@gmail.com', 'OlÃƒÂ¡, sou formada Sistemas para Internet pelo IF Sudeste MG Ã¢Â€Â“ CÃƒÂ¢mpus Barbacena.\r\n\r\nTenho experiÃƒÂªncia na ÃƒÂ¡rea de desenvolvimento, administraÃƒÂ§ÃƒÂ£o e configuraÃƒÂ§ÃƒÂ£o de sistemas de informaÃƒÂ§ÃƒÂµes e ambientes operacionais. Sou apaixonada sistema operacional linux e programaÃƒÂ§ÃƒÂ£o. Meu hobbie ÃƒÂ© ler livros e escutar mÃƒÂºsicas.\r\n\r\nÃ¢Â€ÂœSÃƒÂ³ que nada sei.Ã¢Â€Â SÃƒÂ³crates'),
('kate', '81dc9bdb52d04dc20036dbd8313ed055', 'Klaisler Antunes Santos', 'fotos/Kate.jpg', 1, 'katekas@gmail.com', 'Bacharel em Sistemas de InformaÃƒÂ§ÃƒÂ£o pela PUC Minas - SÃƒÂ£o Gabriel (Belo Horizonte - Minas Gerais) concluÃƒÂ­do no segundo semestre de 2009. Trabalho com desenvolvimento Web desde 2007 quando participei do programa Proform .NET (student to Business) criado pela Microsoft com o apoio da PUC Minas.                                                                                                         '),
('Leonardo', '81dc9bdb52d04dc20036dbd8313ed055', 'Leonardo Cabral', 'fotos/Leonardo.jpeg', 1, 'mail@larback.com.br', '&quot;In google we trust&quot;'),
('Nikolas', '81dc9bdb52d04dc20036dbd8313ed055', 'Nikolas Rodrigues Teixeira', 'fotos/Nikolas.jpg', 1, 'nikolasrod@gmail.com', 'Formado em AnÃƒÂ¡lise e Desenvolvimento de Sistemas, programador Python na empresa Starline Tecnologia. Chrome ÃƒÂ© o melhor navegador, nÃƒÂ£o odeio o Windows 8, Android ÃƒÂ© melhor que iOS, Xbox ÃƒÂ© melhor que PS3. :)'),
('nilson', '81dc9bdb52d04dc20036dbd8313ed055', 'Nilson Aparecido Teodoro', 'fotos/Nilson.jpg', 2, 'nilsonkz22@gmail.com', 'Formado em Sistemas de informaÃƒÂ§ÃƒÂ£o pela Universidade de AraxÃƒÂ¡, onde concluÃƒÂ­ o mesmo em Dezembro de 2010. Atuo como Analista de Sistemas desde 2010, onde iniciei como DBA, e atualmente sou desenvolvedor ASP.Net. Optar por essa pÃƒÂ³s-graduaÃƒÂ§ÃƒÂ£o foi imediata, pois irei adquirir e quem sabe repassar conhecimentos, construir novas alianÃƒÂ§as, e claro sempre buscando novos desafios.\r\n'),
('Rodrigo', '81dc9bdb52d04dc20036dbd8313ed055', 'Rodrigo Batista Balthazar', 'fotos/rodrigobalthazar.jpg', 3, 'rodrigobalthazar@yahoo.com', 'OlÃƒÂ¡, sou engenheiro eletricista e entusiasta na ÃƒÂ¡rea de linguÃƒÂ­stica. AlÃƒÂ©m dessas ÃƒÂ¡reas, tenho interesse em diversas outras, como a mÃƒÂºsica, o canto, a literatura, as artes marciais e a corrida, para as quais jÃƒÂ¡ dediquei ou dedico certo tempo em minha vida.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
