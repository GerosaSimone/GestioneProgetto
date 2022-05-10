-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2022 at 08:08 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcanzese`
--

-- --------------------------------------------------------

--
-- Table structure for table `acquistigiocatori`
--

CREATE TABLE `acquistigiocatori` (
  `id` int(11) NOT NULL,
  `idMagazzino` int(11) NOT NULL,
  `idGiocatore` int(11) NOT NULL,
  `Quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `acquistimagazzino`
--

CREATE TABLE `acquistimagazzino` (
  `id` int(11) NOT NULL,
  `idMagazzino` int(11) NOT NULL,
  `quantita` int(11) NOT NULL,
  `prezzototale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `acquistimateriale`
--

CREATE TABLE `acquistimateriale` (
  `id` int(11) NOT NULL,
  `descrizione` varchar(32) NOT NULL,
  `Quantita` int(11) NOT NULL,
  `prezzoTotale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `allenamento`
--

CREATE TABLE `allenamento` (
  `id` int(11) NOT NULL,
  `oraInizio` varchar(25) NOT NULL,
  `oraFine` varchar(25) NOT NULL,
  `giorno` varchar(32) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `allenamento`
--

INSERT INTO `allenamento` (`id`, `oraInizio`, `oraFine`, `giorno`, `idCategoria`) VALUES
(5, '12:00', '13:00', 'Martedi', 5),
(6, '11:00', '23:00', 'Mercoledi', 5),
(7, '13:00', '13:00', 'Mercoledi', 1),
(8, '11:00', '23:00', 'Mercoledi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `palloni` int(11) NOT NULL,
  `pettorine` int(11) NOT NULL,
  `linkFotoSquadra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `palloni`, `pettorine`, `linkFotoSquadra`) VALUES
(1, 'PrimaSquadra', 66, 111, ''),
(2, 'Juniores', 0, 0, ''),
(3, 'Allievi', 0, 0, ''),
(4, 'Giovanissimi', 0, 0, ''),
(5, 'Esordienti', 67, 56, ''),
(6, 'Pulcini', 0, 0, ''),
(7, 'PiccoliAmici', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `galleria`
--

CREATE TABLE `galleria` (
  `id` int(10) UNSIGNED NOT NULL,
  `titolo` varchar(32) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galleria`
--

INSERT INTO `galleria` (`id`, `titolo`, `foto`) VALUES
(5, '3', 'fotoGalleria3.jpg'),
(6, '4', 'fotoGalleria4.jpg'),
(7, '4', 'fotoGalleria4.png'),
(8, '5', 'fotoGalleria5.jpg'),
(11, '5', 'fotoGalleria5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `magazzino`
--

CREATE TABLE `magazzino` (
  `id` int(11) NOT NULL,
  `idProdotto` int(11) NOT NULL,
  `quantita` int(11) NOT NULL,
  `taglia` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `maglia`
--

CREATE TABLE `maglia` (
  `id` int(11) NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `titolo` varchar(50) NOT NULL,
  `descrizione` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `maglia`
--

INSERT INTO `maglia` (`id`, `foto`, `titolo`, `descrizione`) VALUES
(32, 'fotoDivisaPrimaSquadrasdfsafsdfsdfsdf.jpg', 'sdfsafsdfsdfsdf', ''),
(33, 'fotoDivisaPrimaSquadrafffffffff.jpg', 'fffffffff', 'fffffffffffffffff'),
(35, 'fotoDivisaPrimaSquadraaaaaaaa.jpg', 'aaaaaaa', 'vbbbbbbbb'),
(36, 'fotoDivisaPrimaSquadrabbbbbbb.jpg', 'bbbbbbb', 'bbbbbbbbb'),
(37, 'fotoDivisaAllieviaaaa.jpg', 'aaaa', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `idTesserato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `nome`, `mail`, `idTesserato`) VALUES
(103, 'papa', 'hedrghrd@gmail.com', 120),
(104, 'papa', 'hedrghrd@gmail.com', 121),
(112, 'fratello', 'andrea@gmail.com', 121),
(125, 'giocatore', 'andreamauri@gmail.com', 129),
(126, 'giocatore', 'andreamauri@gmail.com', 133),
(127, 'fratello', 'andrea@gmail.com', 133),
(156, 'aaaaa', 'andreamauri@gmail.com', 137),
(157, 'bbbbb', 'asdas@gmail.com', 137);

-- --------------------------------------------------------

--
-- Table structure for table `prodotto`
--

CREATE TABLE `prodotto` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `costoUnitario` int(11) NOT NULL,
  `linkFoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `prodotto`
--

INSERT INTO `prodotto` (`id`, `nome`, `descrizione`, `costoUnitario`, `linkFoto`) VALUES
(1, 'maglia', '', 10, 'https://dadasportweb.com/15451-large_default/maglia-calcio-umbro-derby.jpg'),
(2, 'pantaloncini', '', 15, 'https://www.cisalfasport.it/dw/image/v2/BBVV_PRD/on/demandware.static/-/Sites-cisalfa-master/default/dwdb59c75a/cisalfa/files/S4047472-DKBLUE/WHI/image_sup04/S4047472_DKBLUE_S_WHIcl004.jpg?sw=960&sh=1200'),
(3, 'pantaloni', '', 30, 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/i1-76a31840-5d2d-47f1-8eb6-4a606cbd207a/pantaloni-da-calcio-fc-essential-0DpQZf.png'),
(4, 'felpa', '', 30, 'https://images.eprice.it/nobrand/0/hres/003/208180003/felpa-calcio-joma-sudadera-faraon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `telefono`
--

CREATE TABLE `telefono` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `idTesserato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `telefono`
--

INSERT INTO `telefono` (`id`, `nome`, `telefono`, `idTesserato`) VALUES
(147, 'mgh', '34345634675', 120),
(148, 'papa', '5757575757', 120),
(149, 'mamma', '45656445645', 121),
(161, 'mamma', '3390456712', 129),
(162, 'papa', '3981278345', 129),
(163, 'mamma', '3390456712', 133),
(189, 'aaaa', '3390456712', 137),
(190, 'bbbbb', '1111111111111', 137),
(193, 'mamma', '3390456712', 138),
(194, 'papa', '23452356346', 138);

-- --------------------------------------------------------

--
-- Table structure for table `tesserato`
--

CREATE TABLE `tesserato` (
  `id` int(11) NOT NULL,
  `cf` varchar(16) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `cognome` varchar(32) NOT NULL,
  `dataNascita` date NOT NULL,
  `luogoNascita` varchar(32) NOT NULL,
  `tipo` int(11) NOT NULL,
  `ruolo` char(1) DEFAULT NULL,
  `idVisita` int(11) DEFAULT NULL,
  `via` varchar(32) NOT NULL,
  `provincia` varchar(32) NOT NULL,
  `citta` varchar(32) NOT NULL,
  `linkFoto` varchar(255) DEFAULT NULL,
  `daPagare` int(11) NOT NULL DEFAULT '0',
  `pagato` int(11) NOT NULL DEFAULT '0',
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tesserato`
--

INSERT INTO `tesserato` (`id`, `cf`, `nome`, `cognome`, `dataNascita`, `luogoNascita`, `tipo`, `ruolo`, `idVisita`, `via`, `provincia`, `citta`, `linkFoto`, `daPagare`, `pagato`, `idCategoria`) VALUES
(120, 'cf1awdawdawdawda', 'simone', 'gerosa', '2022-05-06', 'erba', 0, 'C', 33, 'via verza 116', 'co', 'canzo', 'fotoProfilocf1awdawdawdawda.png', 20, 20, 4),
(121, 'awdawdawdawdawda', 'davide', 'Gerosa', '2022-04-29', 'awdawdawdawd', 0, 'N', NULL, 'VIA A. VERZA', 'fe', 'efwqewf', NULL, 12, 8, 2),
(127, 'asdasdasdasdasda', 'asda', 'dasd', '2022-05-01', 'asdasdasd', 0, 'N', NULL, 'sdas', 'as', 'asd', NULL, 0, 0, 1),
(128, '1111111111111111', 'andrea', '111111', '2022-05-14', '11111111', 0, 'N', NULL, '111111111', '11', '111111111', NULL, 0, 0, 1),
(129, 'provaprovaprovap', 'prova', 'prova', '2000-01-01', 'prova', 0, 'D', NULL, 'prova', 'pr', 'prova', NULL, 100, 100, 1),
(130, '3333333333333333', 'aaaaaaaaaaaaaaaa', '3', '2022-05-15', '3', 0, 'N', NULL, '3', '33', '3', 'fotoProfilo3333333333333333.jpg', 0, 0, 1),
(131, 'tentativo2tentat', 'tentativo2', 'tentativo2', '1111-11-11', 'tentativo2', 1, 'P', NULL, 'tentativo2', 'te', 'tentativo2', 'fotoProfilocf1awdawdawdawda.jpg', 0, 0, 1),
(132, 'asdasdasd', 'tentativo1', 'sdasdasdasd', '2022-05-02', 'asdasdasdasd', 1, 'D', NULL, 'asd', 'adasdas', 'asdasd', 'fotoProfiloasdasdasd.jpg', 0, 0, 1),
(133, 'asdddddddddddddd', 'a', 'as', '2022-04-28', 'asdasd', 0, 'M', NULL, 'Via Parini 6/b', 'as', 'asd', 'fotoProfiloasdddddddddddddd.jpg', 0, 0, 1),
(134, 'dasdasdasdasdasd', 'asdas', 'dasdas', '2022-05-01', 'asdasda', 0, 'M', NULL, 'dasd', 'as', 'asdasd', NULL, 0, 0, 1),
(137, 'provaprovaprovap', 'prova', 'prova', '2022-05-12', 'prova', 1, 'M', NULL, 'prova', 'pr', 'prova', 'fotoProfiloprovaprovaprovap.jpg', 0, 0, 1),
(138, 'aaaaaaaaaaaaaaaa', 'a', 'a', '2022-05-11', 'aa', 1, 'N', NULL, 'a', 'aa', 'a', NULL, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usa`
--

CREATE TABLE `usa` (
  `idMaglia` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `usa`
--

INSERT INTO `usa` (`idMaglia`, `idCategoria`) VALUES
(32, 1),
(33, 1),
(35, 1),
(36, 1),
(37, 3);

-- --------------------------------------------------------

--
-- Table structure for table `utenti`
--

CREATE TABLE `utenti` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` varchar(32) NOT NULL,
  `password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utenti`
--

INSERT INTO `utenti` (`id`, `user`, `password`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, ' ', ''),
(4, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99'),
(5, ' ', '7215ee9c7d9dc229d2921a40e899ec5f'),
(6, 'admin', 'dc49612c78681cc0903a40f49083447f');

-- --------------------------------------------------------

--
-- Table structure for table `visita`
--

CREATE TABLE `visita` (
  `id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `scadenza` date NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `visita`
--

INSERT INTO `visita` (`id`, `tipo`, `scadenza`, `foto`) VALUES
(33, 0, '2022-05-07', 'fotoVisitacf1awdawdawdawda.png'),
(36, 0, '2022-05-06', 'fotoVisitaaaaaaaaaaaaaaaaa.jpg'),
(37, 0, '2022-05-18', 'fotoVisita2222222222222222.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acquistigiocatori`
--
ALTER TABLE `acquistigiocatori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `magazzino` (`idMagazzino`),
  ADD KEY `giocatore` (`idGiocatore`);

--
-- Indexes for table `acquistimagazzino`
--
ALTER TABLE `acquistimagazzino`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maga` (`idMagazzino`);

--
-- Indexes for table `acquistimateriale`
--
ALTER TABLE `acquistimateriale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allenamento`
--
ALTER TABLE `allenamento`
  ADD PRIMARY KEY (`id`,`giorno`,`idCategoria`),
  ADD KEY `idcategoria` (`idCategoria`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`,`nome`);

--
-- Indexes for table `galleria`
--
ALTER TABLE `galleria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `magazzino`
--
ALTER TABLE `magazzino`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodotto` (`idProdotto`);

--
-- Indexes for table `maglia`
--
ALTER TABLE `maglia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `foto` (`foto`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtesserato` (`idTesserato`);

--
-- Indexes for table `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtesse` (`idTesserato`);

--
-- Indexes for table `tesserato`
--
ALTER TABLE `tesserato`
  ADD PRIMARY KEY (`id`,`cf`),
  ADD KEY `relazione3` (`idVisita`),
  ADD KEY `relazione4` (`idCategoria`);

--
-- Indexes for table `usa`
--
ALTER TABLE `usa`
  ADD PRIMARY KEY (`idMaglia`),
  ADD KEY `relazione1` (`idCategoria`);

--
-- Indexes for table `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acquistigiocatori`
--
ALTER TABLE `acquistigiocatori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acquistimagazzino`
--
ALTER TABLE `acquistimagazzino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `allenamento`
--
ALTER TABLE `allenamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `galleria`
--
ALTER TABLE `galleria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `magazzino`
--
ALTER TABLE `magazzino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maglia`
--
ALTER TABLE `maglia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `telefono`
--
ALTER TABLE `telefono`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `tesserato`
--
ALTER TABLE `tesserato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visita`
--
ALTER TABLE `visita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acquistigiocatori`
--
ALTER TABLE `acquistigiocatori`
  ADD CONSTRAINT `giocatore` FOREIGN KEY (`idGiocatore`) REFERENCES `tesserato` (`id`),
  ADD CONSTRAINT `magazzino` FOREIGN KEY (`idMagazzino`) REFERENCES `magazzino` (`id`);

--
-- Constraints for table `acquistimagazzino`
--
ALTER TABLE `acquistimagazzino`
  ADD CONSTRAINT `maga` FOREIGN KEY (`idMagazzino`) REFERENCES `magazzino` (`id`);

--
-- Constraints for table `allenamento`
--
ALTER TABLE `allenamento`
  ADD CONSTRAINT `idcategoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`);

--
-- Constraints for table `magazzino`
--
ALTER TABLE `magazzino`
  ADD CONSTRAINT `prodotto` FOREIGN KEY (`idProdotto`) REFERENCES `prodotto` (`id`);

--
-- Constraints for table `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `idtesserato` FOREIGN KEY (`idTesserato`) REFERENCES `tesserato` (`id`);

--
-- Constraints for table `telefono`
--
ALTER TABLE `telefono`
  ADD CONSTRAINT `idtesse` FOREIGN KEY (`idTesserato`) REFERENCES `tesserato` (`id`);

--
-- Constraints for table `tesserato`
--
ALTER TABLE `tesserato`
  ADD CONSTRAINT `relazione3` FOREIGN KEY (`idVisita`) REFERENCES `visita` (`id`),
  ADD CONSTRAINT `relazione4` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`);

--
-- Constraints for table `usa`
--
ALTER TABLE `usa`
  ADD CONSTRAINT `relazione1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `relazione2` FOREIGN KEY (`idMaglia`) REFERENCES `maglia` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
