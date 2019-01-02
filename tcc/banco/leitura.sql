-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Dez-2018 às 22:24
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leitura`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacaolivro`
--

CREATE TABLE `avaliacaolivro` (
  `al_idavaliacaolivro` int(11) NOT NULL,
  `al_idlivro` int(11) DEFAULT NULL,
  `al_idusuario` int(11) DEFAULT NULL,
  `al_datahora` datetime DEFAULT NULL,
  `al_nota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacaolivro`
--

INSERT INTO `avaliacaolivro` (`al_idavaliacaolivro`, `al_idlivro`, `al_idusuario`, `al_datahora`, `al_nota`) VALUES
(5, 87, 19, '2018-12-13 19:34:46', 5),
(6, 88, 19, '2018-12-13 19:34:58', 2),
(7, 88, 19, '2018-12-13 19:35:10', 3),
(8, 88, 19, '2018-12-13 19:38:52', 1),
(10, 88, 19, '2018-12-13 20:19:09', 5),
(11, 88, 19, '2018-12-13 20:19:11', 5),
(12, 88, 19, '2018-12-13 20:19:12', 5),
(13, 88, 19, '2018-12-13 20:19:13', 5),
(14, 88, 19, '2018-12-13 20:19:14', 5),
(15, 88, 19, '2018-12-13 20:19:15', 5),
(16, 88, 19, '2018-12-13 20:19:16', 5),
(17, 89, 19, '2018-12-13 20:21:00', 5),
(18, 89, 19, '2018-12-13 20:21:00', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `biblioteca`
--

CREATE TABLE `biblioteca` (
  `bi_id` int(11) NOT NULL,
  `bi_idlivro` int(11) DEFAULT NULL,
  `bi_idprateleira` int(11) DEFAULT NULL,
  `bi_datainclusao` datetime DEFAULT NULL,
  `bi_observacao` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `cm_id` int(11) NOT NULL,
  `cm_texto` varchar(200) NOT NULL,
  `cm_data` date NOT NULL,
  `cm_curtidas` int(11) DEFAULT NULL,
  `cm_idusuario` int(11) NOT NULL,
  `cm_idlivro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatores`
--

CREATE TABLE `fatores` (
  `fa_id` int(11) NOT NULL,
  `fa_descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='	';

--
-- Extraindo dados da tabela `fatores`
--

INSERT INTO `fatores` (`fa_id`, `fa_descricao`) VALUES
(1, 'Tamanho do Livro'),
(2, 'G?neros do Livro'),
(3, 'Avalia??o dos usuarios'),
(4, 'Ano de Publica??o'),
(5, 'Censura do Livro'),
(6, 'Livros em alta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatorlivro`
--

CREATE TABLE `fatorlivro` (
  `fl_id` int(11) NOT NULL,
  `fl_idfator` int(11) DEFAULT NULL,
  `fl_idlivro` int(11) DEFAULT NULL,
  `fl_idusuario` int(11) DEFAULT NULL,
  `fl_valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fatorlivro`
--

INSERT INTO `fatorlivro` (`fl_id`, `fl_idfator`, `fl_idlivro`, `fl_idusuario`, `fl_valor`) VALUES
(68, 1, 91, 1, 950),
(69, 2, 91, 1, 0),
(70, 4, 91, 1, 2010),
(71, 5, 91, 1, 14),
(76, 1, 96, 1, 540),
(77, 2, 96, 1, 12),
(78, 4, 96, 1, 2002),
(79, 5, 96, 1, 0),
(129, 1, 110, 1, 450),
(130, 2, 110, 1, 20),
(131, 4, 110, 1, 2012),
(132, 5, 110, 1, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatorusuario`
--

CREATE TABLE `fatorusuario` (
  `fu_id` int(11) NOT NULL,
  `fu_idfator` int(11) DEFAULT NULL,
  `fu_idusuario` int(11) DEFAULT NULL,
  `fu_nota` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fatorusuario`
--

INSERT INTO `fatorusuario` (`fu_id`, `fu_idfator`, `fu_idusuario`, `fu_nota`) VALUES
(7, 1, 1, '10000'),
(8, 2, 1, '2'),
(9, 3, 1, ''),
(10, 4, 1, '1999'),
(11, 5, 1, '18'),
(12, 6, 1, ''),
(19, 1, 19, '10000'),
(20, 2, 19, '20'),
(21, 3, 19, 'on'),
(22, 4, 19, '1999'),
(23, 5, 19, '18'),
(24, 6, 19, 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `ge_id` int(11) NOT NULL,
  `ge_descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`ge_id`, `ge_descricao`) VALUES
(1, 'Ambito Religioso'),
(2, 'Ação'),
(3, 'Autobiografia'),
(5, 'Biografia'),
(6, 'Comédia'),
(7, 'Conto'),
(8, 'Crônica'),
(9, 'Drama'),
(10, 'Épico'),
(11, 'Fábula'),
(12, 'Fantasia'),
(13, 'Farsa'),
(14, 'Ficão'),
(16, 'Melodrama'),
(17, 'Novela'),
(18, 'Paródia'),
(19, 'Poesia'),
(20, 'Romance'),
(21, 'Sátira'),
(22, 'Soneto'),
(23, 'Suspense'),
(24, 'Terror'),
(25, 'Tragédia'),
(26, 'Tragicomédia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `generolivro`
--

CREATE TABLE `generolivro` (
  `gl_id` int(11) NOT NULL,
  `gl_idlivro` int(11) DEFAULT NULL,
  `gl_idgenero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `generolivro`
--

INSERT INTO `generolivro` (`gl_id`, `gl_idlivro`, `gl_idgenero`) VALUES
(99, 89, 6),
(137, 91, 24),
(142, 96, 12),
(158, 87, 9),
(159, 87, 20),
(160, 88, 21),
(161, 89, 20),
(173, 110, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `img_id` int(11) NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  `data` datetime NOT NULL,
  `idlivro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`img_id`, `arquivo`, `data`, `idlivro`) VALUES
(17, '7dac1bb1e4db022264f48206342927f1.jpg', '2018-12-11 20:19:19', 87),
(18, '0cf15406b7a7dc4cdcff65508393bf25.jpg', '2018-12-12 16:55:55', 88),
(19, '3915b5e025b5b7695b95366833d9c070.jpg', '2018-12-12 17:16:47', 89),
(21, '665725bd84ffef0c1ec2048effce143f.jpg', '2018-12-13 15:01:01', 91),
(26, '4777617e1128238a39bc629638b611a8.jpg', '2018-12-13 15:07:31', 96),
(33, '77d5e7f33e7db644f2a340e38b4a4395.jpg', '2018-12-13 19:20:45', 110);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `li_idlivro` int(11) NOT NULL,
  `li_titulo` varchar(200) DEFAULT NULL,
  `li_ano` int(11) DEFAULT NULL,
  `li_autor` varchar(100) DEFAULT NULL,
  `li_paginas` int(11) DEFAULT NULL,
  `li_editora` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `li_censura` int(11) DEFAULT NULL,
  `li_idusuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`li_idlivro`, `li_titulo`, `li_ano`, `li_autor`, `li_paginas`, `li_editora`, `li_censura`, `li_idusuario`) VALUES
(87, 'Quem Ã© vocÃª Alasca?', 2012, 'John Green', 230, 'verde', 10, 1),
(88, 'Im a pirate', 2016, 'CordÃ©lia Canabrava', 400, 'Scipione', 0, 1),
(89, 'Como eu era antes de vocÃª', 2013, 'Jojo Moyes', 400, 'Galera', 12, 1),
(91, 'The Walking Dead', 2010, 'Robert Kirkman', 950, 'Galera', 14, 1),
(96, 'O ladrÃ£o de raios', 2002, 'Rick Riordan', 540, 'Intrison', 0, 1),
(110, 'A ultima mÃºsica', 2012, 'Nicholas Sparks', 450, 'Conceito', 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prateleira`
--

CREATE TABLE `prateleira` (
  `pr_id` int(11) NOT NULL,
  `pr_descricao` varchar(150) DEFAULT NULL,
  `pr_idusuario` int(11) DEFAULT NULL,
  `pr_datacriacao` datetime DEFAULT NULL,
  `pr_status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prateleira`
--

INSERT INTO `prateleira` (`pr_id`, `pr_descricao`, `pr_idusuario`, `pr_datacriacao`, `pr_status`) VALUES
(6, 'nova nova', 1, '2018-10-15 03:07:54', NULL),
(7, 'nova nova', 1, '2018-10-15 03:08:24', NULL),
(8, 'nova nova', 1, '2018-10-15 03:08:33', NULL),
(9, 'aaaaaaaaaa', 1, '2018-10-15 03:08:42', NULL),
(10, 'bbb', 1, '2018-10-15 03:09:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `resenha`
--

CREATE TABLE `resenha` (
  `re_id` int(11) NOT NULL,
  `re_idlivro` int(11) DEFAULT NULL,
  `re_idusuario` int(11) DEFAULT NULL,
  `re_data` datetime DEFAULT NULL,
  `re_textoresenha` varchar(4000) DEFAULT NULL,
  `re_status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `us_id` int(11) NOT NULL,
  `us_nome` varchar(100) DEFAULT NULL,
  `us_email` varchar(200) DEFAULT NULL,
  `us_senha` varchar(200) DEFAULT NULL,
  `us_datanascimento` date DEFAULT NULL,
  `us_sexo` char(1) DEFAULT NULL,
  `tip_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`us_id`, `us_nome`, `us_email`, `us_senha`, `us_datanascimento`, `us_sexo`, `tip_usuario`) VALUES
(1, 'Hugo', 'hugo@hugo.com', '123', '2018-07-04', 'm', 2),
(17, 'taina', 'taina@taina.com', '123', '2000-11-04', 'F', 1),
(19, 'cecilia', 'ceci@ceci.com', '123', '2001-11-06', 'F', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariogenero`
--

CREATE TABLE `usuariogenero` (
  `ug_id` int(11) NOT NULL,
  `ug_idgenero` int(11) DEFAULT NULL,
  `ug_idusuario` int(11) DEFAULT NULL,
  `ug_nota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacaolivro`
--
ALTER TABLE `avaliacaolivro`
  ADD PRIMARY KEY (`al_idavaliacaolivro`),
  ADD KEY `al_livro_idx` (`al_idlivro`),
  ADD KEY `al_usuario_idx` (`al_idusuario`);

--
-- Indexes for table `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD PRIMARY KEY (`bi_id`),
  ADD KEY `bi_livro_idx` (`bi_idlivro`),
  ADD KEY `bi_prateleira_idx` (`bi_idprateleira`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `fatores`
--
ALTER TABLE `fatores`
  ADD PRIMARY KEY (`fa_id`);

--
-- Indexes for table `fatorlivro`
--
ALTER TABLE `fatorlivro`
  ADD PRIMARY KEY (`fl_id`),
  ADD KEY `fl_fator_idx` (`fl_idfator`),
  ADD KEY `fl_livro_idx` (`fl_idlivro`),
  ADD KEY `fl_usuario_idx` (`fl_idusuario`);

--
-- Indexes for table `fatorusuario`
--
ALTER TABLE `fatorusuario`
  ADD PRIMARY KEY (`fu_id`),
  ADD KEY `fu_fator_idx` (`fu_idfator`),
  ADD KEY `fu_usuario_idx` (`fu_idusuario`);

--
-- Indexes for table `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`ge_id`);

--
-- Indexes for table `generolivro`
--
ALTER TABLE `generolivro`
  ADD PRIMARY KEY (`gl_id`),
  ADD KEY `gl_livro_idx` (`gl_idlivro`),
  ADD KEY `gl_genero_idx` (`gl_idgenero`);

--
-- Indexes for table `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `im_livro_idx` (`idlivro`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`li_idlivro`);

--
-- Indexes for table `prateleira`
--
ALTER TABLE `prateleira`
  ADD PRIMARY KEY (`pr_id`),
  ADD KEY `pr_usuario_idx` (`pr_idusuario`);

--
-- Indexes for table `resenha`
--
ALTER TABLE `resenha`
  ADD PRIMARY KEY (`re_id`),
  ADD KEY `re_livro_idx` (`re_idlivro`),
  ADD KEY `re_usuario_idx` (`re_idusuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`us_id`);

--
-- Indexes for table `usuariogenero`
--
ALTER TABLE `usuariogenero`
  ADD PRIMARY KEY (`ug_id`),
  ADD KEY `ug_genero_idx` (`ug_idgenero`),
  ADD KEY `ug_usuario_idx` (`ug_idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacaolivro`
--
ALTER TABLE `avaliacaolivro`
  MODIFY `al_idavaliacaolivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `biblioteca`
--
ALTER TABLE `biblioteca`
  MODIFY `bi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fatores`
--
ALTER TABLE `fatores`
  MODIFY `fa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fatorlivro`
--
ALTER TABLE `fatorlivro`
  MODIFY `fl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `fatorusuario`
--
ALTER TABLE `fatorusuario`
  MODIFY `fu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `genero`
--
ALTER TABLE `genero`
  MODIFY `ge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `generolivro`
--
ALTER TABLE `generolivro`
  MODIFY `gl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `imagem`
--
ALTER TABLE `imagem`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `li_idlivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `prateleira`
--
ALTER TABLE `prateleira`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `resenha`
--
ALTER TABLE `resenha`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `usuariogenero`
--
ALTER TABLE `usuariogenero`
  MODIFY `ug_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `avaliacaolivro`
--
ALTER TABLE `avaliacaolivro`
  ADD CONSTRAINT `al_livro` FOREIGN KEY (`al_idlivro`) REFERENCES `livro` (`li_idlivro`),
  ADD CONSTRAINT `al_usuario` FOREIGN KEY (`al_idusuario`) REFERENCES `usuario` (`us_id`);

--
-- Limitadores para a tabela `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD CONSTRAINT `bi_livro` FOREIGN KEY (`bi_idlivro`) REFERENCES `livro` (`li_idlivro`),
  ADD CONSTRAINT `bi_prateleira` FOREIGN KEY (`bi_idprateleira`) REFERENCES `prateleira` (`pr_id`);

--
-- Limitadores para a tabela `fatorlivro`
--
ALTER TABLE `fatorlivro`
  ADD CONSTRAINT `fl_fator` FOREIGN KEY (`fl_idfator`) REFERENCES `fatores` (`fa_id`),
  ADD CONSTRAINT `fl_livro` FOREIGN KEY (`fl_idlivro`) REFERENCES `livro` (`li_idlivro`),
  ADD CONSTRAINT `fl_usuario` FOREIGN KEY (`fl_idusuario`) REFERENCES `usuario` (`us_id`);

--
-- Limitadores para a tabela `fatorusuario`
--
ALTER TABLE `fatorusuario`
  ADD CONSTRAINT `fu_fator` FOREIGN KEY (`fu_idfator`) REFERENCES `fatores` (`fa_id`),
  ADD CONSTRAINT `fu_usuario` FOREIGN KEY (`fu_idusuario`) REFERENCES `usuario` (`us_id`);

--
-- Limitadores para a tabela `generolivro`
--
ALTER TABLE `generolivro`
  ADD CONSTRAINT `gl_genero` FOREIGN KEY (`gl_idgenero`) REFERENCES `genero` (`ge_id`),
  ADD CONSTRAINT `gl_livro` FOREIGN KEY (`gl_idlivro`) REFERENCES `livro` (`li_idlivro`);

--
-- Limitadores para a tabela `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `im_livro` FOREIGN KEY (`idlivro`) REFERENCES `livro` (`li_idlivro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `prateleira`
--
ALTER TABLE `prateleira`
  ADD CONSTRAINT `pr_usuario` FOREIGN KEY (`pr_idusuario`) REFERENCES `usuario` (`us_id`);

--
-- Limitadores para a tabela `resenha`
--
ALTER TABLE `resenha`
  ADD CONSTRAINT `re_livro` FOREIGN KEY (`re_idlivro`) REFERENCES `livro` (`li_idlivro`),
  ADD CONSTRAINT `re_usuario` FOREIGN KEY (`re_idusuario`) REFERENCES `usuario` (`us_id`);

--
-- Limitadores para a tabela `usuariogenero`
--
ALTER TABLE `usuariogenero`
  ADD CONSTRAINT `ug_genero` FOREIGN KEY (`ug_idgenero`) REFERENCES `genero` (`ge_id`),
  ADD CONSTRAINT `ug_usuario` FOREIGN KEY (`ug_idusuario`) REFERENCES `usuario` (`us_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
