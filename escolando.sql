-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 07-Set-2014 às 03:04
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `escolando`
--
CREATE DATABASE IF NOT EXISTS `escolando` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `escolando`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'General'),
(2, '5º ano 1 - Matemática'),
(3, '5º ano 1 - Português'),
(4, '5º ano 1 - Inglês'),
(5, '5º ano 1 - História'),
(6, '5º ano 1 - Geografia'),
(7, '5º ano 1 - Química'),
(8, '5º ano 1 - Física'),
(9, '5º ano 1 - Biologia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` int(11) NOT NULL,
  `post` longtext NOT NULL,
  `groupId` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `author`, `post`, `groupId`, `category`, `date`) VALUES
(1, 3, 'Educação engloba os processos de ensinar e aprender. É um fenômeno observado em qualquer sociedade e nos grupos constitutivos destas, responsável pela sua manutenção e perpetuação a partir da transposição, às gerações que se seguem, dos modos culturais de ser, estar e agir necessários à convivência e ao ajustamento de um membro no seu grupo ou sociedade.', 1, 1, '2014-09-07 00:01:30'),
(2, 3, 'Enquanto processo de sociabilização, a educação é exercida nos diversos espaços de convívio social, seja para a adequação do indivíduo à sociedade, do indivíduo ao grupo ou dos grupos à sociedade.', 1, 1, '2014-09-07 00:01:44'),
(3, 4, 'No caso específico da educação exercida para a utilização dos recursos técnicos e tecnológicos e dos instrumentos e ferramentas de uma determinada comunidade, dá-se o nome de Educação Tecnológica.<br />\r\nNo caso específico da educação exercida para a utilização dos recursos técnicos e tecnológicos e dos instrumentos e ferramentas de uma determinada comunidade, dá-se o nome de Educação Tecnológica.', 1, 1, '2014-09-07 00:02:45'),
(4, 4, 'A principal meta do Plano de Desenvolvimento da Educação (PDE) é uma educação básica de qualidade, para isso deve-se investir na educação profissional e na educação superior.<br />\r\n<br />\r\nA principal meta do Plano de Desenvolvimento da Educação (PDE) é uma educação básica de qualidade, para isso deve-se investir na educação profissional e na educação superior.', 1, 1, '2014-09-07 00:03:21'),
(5, 4, 'A principal meta do Plano de Desenvolvimento da Educação (PDE) é uma educação básica de qualidade, para isso deve-se investir na educação profissional e na educação superior', 2, 1, '2014-09-07 00:03:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts_category`
--

CREATE TABLE IF NOT EXISTS `posts_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `posts_category`
--

INSERT INTO `posts_category` (`id`, `name`) VALUES
(1, 'Dúvida');

-- --------------------------------------------------------

--
-- Estrutura da tabela `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `profile`
--

INSERT INTO `profile` (`id`, `name`) VALUES
(1, 'administrator'),
(2, 'teacher'),
(3, 'student');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `register` varchar(50) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `profile` int(11) NOT NULL,
  `img_profile` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `register`, `mail`, `user`, `pwd`, `profile`, `img_profile`) VALUES
(1, 'Direção Colegial', '', 'direcao@escolando.com', 'direcao_colegial', '123456', 1, ''),
(2, 'Professor Pardal', '45845', 'pardal@escolando.com', 'professor_pardal', '123456', 2, ''),
(3, 'Leandro Leão', '102030', 'leao@escolando.com', 'leandro_leao', '123456', 3, 'profile.jpg'),
(4, 'Vitor Abreu Marques', '102040', 'viabrema@escolando.com', 'vitor_marques', '123456', 3, 'profile.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `users_groups`
--

INSERT INTO `users_groups` (`id`, `user`, `group`) VALUES
(1, 3, 1),
(2, 3, 2),
(3, 4, 1),
(4, 4, 2),
(5, 3, 3),
(6, 3, 4),
(8, 3, 6),
(9, 3, 7),
(10, 3, 8),
(11, 3, 9),
(12, 3, 5),
(13, 4, 3),
(14, 4, 4),
(15, 4, 5),
(16, 4, 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
