-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 24, 2022 alle 14:48
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 8.1.2

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
-- Struttura della tabella `acquistigiocatori`
--

CREATE TABLE `acquistigiocatori` (
  `id` int(11) NOT NULL,
  `idMagazzino` int(11) NOT NULL,
  `idGiocatore` int(11) NOT NULL,
  `Quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Struttura della tabella `acquistimagazzino`
--

CREATE TABLE `acquistimagazzino` (
  `id` int(11) NOT NULL,
  `idMagazzino` int(11) NOT NULL,
  `quantita` int(11) NOT NULL,
  `prezzototale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Struttura della tabella `acquistimateriale`
--

CREATE TABLE `acquistimateriale` (
  `id` int(11) NOT NULL,
  `descrizione` varchar(32) NOT NULL,
  `Quantita` int(11) NOT NULL,
  `prezzoTotale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Struttura della tabella `allenamento`
--

CREATE TABLE `allenamento` (
  `id` int(11) NOT NULL,
  `OraInzio` time NOT NULL,
  `OraFine` time NOT NULL,
  `Giorno` varchar(32) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `palloni` int(11) NOT NULL,
  `pettorine` int(11) NOT NULL,
  `linkFotoSquadra` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `palloni`, `pettorine`, `linkFotoSquadra`) VALUES
(1, 'PrimaSquadra', 0, 0, ''),
(2, 'Juniores', 0, 0, ''),
(3, 'Allievi', 0, 0, ''),
(4, 'Giovanissimi', 0, 0, ''),
(5, 'Esordienti', 0, 0, ''),
(6, 'Pulcini', 0, 0, ''),
(7, 'PiccoliAmici', 0, 0, '');

-- --------------------------------------------------------

--
-- Struttura della tabella `magazzino`
--

CREATE TABLE `magazzino` (
  `id` int(11) NOT NULL,
  `idProdotto` int(11) NOT NULL,
  `quantita` int(11) NOT NULL,
  `taglia` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Struttura della tabella `maglia`
--

CREATE TABLE `maglia` (
  `id` int(11) NOT NULL,
  `foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Struttura della tabella `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `mail` varchar(32) NOT NULL,
  `idTesserato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `costoUnitario` int(11) NOT NULL,
  `linkFoto` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Struttura della tabella `telefono`
--

CREATE TABLE `telefono` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `telefono` double NOT NULL,
  `idTesserato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Struttura della tabella `tesserato`
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
  `linkFoto` blob DEFAULT NULL,
  `daPagare` int(11) NOT NULL DEFAULT 0,
  `pagato` int(11) NOT NULL DEFAULT 0,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `tesserato`
--

INSERT INTO `tesserato` (`id`, `cf`, `nome`, `cognome`, `dataNascita`, `luogoNascita`, `tipo`, `ruolo`, `idVisita`, `via`, `provincia`, `citta`, `linkFoto`, `daPagare`, `pagato`, `idCategoria`) VALUES
(9, ' GRSMTT06S13D416', 'matteo', 'gerosa', '2006-11-13', 'erba', 0, 'D', 6, 'via  verza 4 b', 'como', 'canzo', 0x000000660000006f000000740000006f00000070000000720000006f00000066000000690000006c0000006f0000002e0000006a0000007000000067, 20, 100, 4),
(11, 'LRNRCR03B14D416S', 'lorenzo', 'roncareggi', '2003-02-14', 'erba', 0, 'D', 8, 'via  della grigna ', 'como', 'valbrona', '', 100, 20, 2),
(12, 'MRCSPT05L07D416F', 'marco', 'sanpietro', '2005-10-14', 'erba', 0, 'A', 9, 'via  mornerino 5 a', 'CO', 'pusiano', 0x000000660000006f000000740000006f00000070000000720000006f00000066000000690000006c0000006f0000002e0000006a0000007000000067, 0, 150, 3),
(14, 'FCRPLA03D29D416A', 'paolo', 'ficara', '2003-04-29', 'erba', 0, 'D', 11, 'via per caslino 45 b', 'CO', 'scarenna', 0x000000660000006f000000740000006f00000070000000720000006f00000066000000690000006c0000006f0000002e0000006a0000007000000067, 30, 30, 2),
(15, 'RSPFPP12T20D416V', 'filippo', 'ruspi', '2012-12-22', 'erba', 0, 'P', 12, 'via chiesa  5 a ', 'CO', 'erba', 0x000000660000006f000000740000006f00000070000000720000006f00000066000000690000006c0000006f0000002e0000006a0000007000000067, 200, 50, 6),
(16, 'GRSLSS10M13D416J', 'tommaso', 'gerosa', '2010-10-22', 'lecco', 0, 'C', 13, 'via  della grigna ', 'CO', 'canzo', '', 20, 10, 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `usa`
--

CREATE TABLE `usa` (
  `idMaglia` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` varchar(32) NOT NULL,
  `password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `user`, `password`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, ' ', '7215ee9c7d9dc229d2921a40e899ec5f');

-- --------------------------------------------------------

--
-- Struttura della tabella `visita`
--

CREATE TABLE `visita` (
  `id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `scadenza` date NOT NULL,
  `foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `visita`
--

INSERT INTO `visita` (`id`, `tipo`, `scadenza`, `foto`) VALUES
(5, 1, '2022-09-10', ''),
(6, 1, '2022-10-13', ''),
(7, 1, '2022-11-16', ''),
(8, 1, '2022-12-08', ''),
(9, 1, '2022-04-14', ''),
(10, 0, '2022-05-05', ''),
(11, 1, '2022-06-16', ''),
(12, 0, '2022-04-30', ''),
(13, 0, '2022-08-10', ''),
(14, 1, '2022-07-01', 0x57686174736170702e73656e7a612e696d6d6167696e652e323031392e31343030783834302e6a7067),
(15, 1, '2022-07-01', 0x57686174736170702e73656e7a612e696d6d6167696e652e323031392e31343030783834302e6a7067),
(16, 1, '2022-05-01', 0x57686174736170702e73656e7a612e696d6d6167696e652e323031392e31343030783834302e6a7067),
(17, 1, '2022-05-01', 0x57686174736170702e73656e7a612e696d6d6167696e652e323031392e31343030783834302e6a7067),
(19, 0, '0000-00-00', ''),
(20, 0, '0000-00-00', ''),
(21, 0, '2022-04-07', ''),
(22, 0, '2022-04-13', ''),
(23, 0, '2022-04-13', ''),
(24, 0, '2022-04-13', ''),
(25, 0, '2022-04-13', ''),
(26, 0, '2022-04-13', ''),
(27, 1, '0000-00-00', ''),
(28, 0, '0000-00-00', ''),
(29, 1, '0000-00-00', '');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `acquistigiocatori`
--
ALTER TABLE `acquistigiocatori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `magazzino` (`idMagazzino`),
  ADD KEY `giocatore` (`idGiocatore`);

--
-- Indici per le tabelle `acquistimagazzino`
--
ALTER TABLE `acquistimagazzino`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maga` (`idMagazzino`);

--
-- Indici per le tabelle `acquistimateriale`
--
ALTER TABLE `acquistimateriale`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `allenamento`
--
ALTER TABLE `allenamento`
  ADD PRIMARY KEY (`id`,`Giorno`,`idCategoria`),
  ADD KEY `idcategoria` (`idCategoria`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`,`nome`);

--
-- Indici per le tabelle `magazzino`
--
ALTER TABLE `magazzino`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodotto` (`idProdotto`);

--
-- Indici per le tabelle `maglia`
--
ALTER TABLE `maglia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `foto` (`foto`) USING HASH;

--
-- Indici per le tabelle `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD KEY `idtesserato` (`idTesserato`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Telefono` (`telefono`),
  ADD KEY `idtesse` (`idTesserato`);

--
-- Indici per le tabelle `tesserato`
--
ALTER TABLE `tesserato`
  ADD PRIMARY KEY (`id`,`cf`),
  ADD KEY `relazione3` (`idVisita`),
  ADD KEY `relazione4` (`idCategoria`);

--
-- Indici per le tabelle `usa`
--
ALTER TABLE `usa`
  ADD PRIMARY KEY (`idMaglia`),
  ADD KEY `relazione1` (`idCategoria`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `acquistigiocatori`
--
ALTER TABLE `acquistigiocatori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `acquistimagazzino`
--
ALTER TABLE `acquistimagazzino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `allenamento`
--
ALTER TABLE `allenamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `magazzino`
--
ALTER TABLE `magazzino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `maglia`
--
ALTER TABLE `maglia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `telefono`
--
ALTER TABLE `telefono`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `tesserato`
--
ALTER TABLE `tesserato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `visita`
--
ALTER TABLE `visita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `acquistigiocatori`
--
ALTER TABLE `acquistigiocatori`
  ADD CONSTRAINT `giocatore` FOREIGN KEY (`idGiocatore`) REFERENCES `tesserato` (`id`),
  ADD CONSTRAINT `magazzino` FOREIGN KEY (`idMagazzino`) REFERENCES `magazzino` (`id`);

--
-- Limiti per la tabella `acquistimagazzino`
--
ALTER TABLE `acquistimagazzino`
  ADD CONSTRAINT `maga` FOREIGN KEY (`idMagazzino`) REFERENCES `magazzino` (`id`);

--
-- Limiti per la tabella `allenamento`
--
ALTER TABLE `allenamento`
  ADD CONSTRAINT `idcategoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`);

--
-- Limiti per la tabella `magazzino`
--
ALTER TABLE `magazzino`
  ADD CONSTRAINT `prodotto` FOREIGN KEY (`idProdotto`) REFERENCES `prodotto` (`id`);

--
-- Limiti per la tabella `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `idtesserato` FOREIGN KEY (`idTesserato`) REFERENCES `tesserato` (`id`);

--
-- Limiti per la tabella `telefono`
--
ALTER TABLE `telefono`
  ADD CONSTRAINT `idtesse` FOREIGN KEY (`idTesserato`) REFERENCES `tesserato` (`id`);

--
-- Limiti per la tabella `tesserato`
--
ALTER TABLE `tesserato`
  ADD CONSTRAINT `relazione3` FOREIGN KEY (`idVisita`) REFERENCES `visita` (`id`),
  ADD CONSTRAINT `relazione4` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`);

--
-- Limiti per la tabella `usa`
--
ALTER TABLE `usa`
  ADD CONSTRAINT `relazione1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `relazione2` FOREIGN KEY (`idMaglia`) REFERENCES `maglia` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
