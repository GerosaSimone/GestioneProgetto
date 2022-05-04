-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 04, 2022 alle 13:52
-- Versione del server: 10.4.6-MariaDB
-- Versione PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `oraInizio` varchar(25) NOT NULL,
  `oraFine` varchar(25) NOT NULL,
  `giorno` varchar(32) NOT NULL,
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
  `linkFotoSquadra` varchar(255) NOT NULL
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
  `foto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Struttura della tabella `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `idTesserato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `mail`
--

INSERT INTO `mail` (`id`, `nome`, `mail`, `idTesserato`) VALUES
(88, 'papa', 'asdasdasd@gmail.com', 0),
(89, '', '', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `costoUnitario` int(11) NOT NULL,
  `linkFoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`id`, `nome`, `costoUnitario`, `linkFoto`) VALUES
(1, 'maglia', 10, 'https://dadasportweb.com/15451-large_default/maglia-calcio-umbro-derby.jpg'),
(2, 'pantaloncini', 15, 'https://www.cisalfasport.it/dw/image/v2/BBVV_PRD/on/demandware.static/-/Sites-cisalfa-master/default/dwdb59c75a/cisalfa/files/S4047472-DKBLUE/WHI/image_sup04/S4047472_DKBLUE_S_WHIcl004.jpg?sw=960&sh=1200'),
(3, 'pantaloni', 30, 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/i1-76a31840-5d2d-47f1-8eb6-4a606cbd207a/pantaloni-da-calcio-fc-essential-0DpQZf.png'),
(4, 'felpa', 30, 'https://images.eprice.it/nobrand/0/hres/003/208180003/felpa-calcio-joma-sudadera-faraon.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `telefono`
--

CREATE TABLE `telefono` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `idTesserato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `telefono`
--

INSERT INTO `telefono` (`id`, `nome`, `telefono`, `idTesserato`) VALUES
(118, 'papa', '23423443234234', 0),
(119, '', '', 0),
(121, '', '', 0),
(122, '', '', 0),
(123, '', '', 0),
(124, '', '', 0),
(125, '', '', 0),
(126, '', '', 0);

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
  `linkFoto` varchar(255) DEFAULT NULL,
  `daPagare` int(11) NOT NULL DEFAULT 0,
  `pagato` int(11) NOT NULL DEFAULT 0,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `tesserato`
--

INSERT INTO `tesserato` (`id`, `cf`, `nome`, `cognome`, `dataNascita`, `luogoNascita`, `tipo`, `ruolo`, `idVisita`, `via`, `provincia`, `citta`, `linkFoto`, `daPagare`, `pagato`, `idCategoria`) VALUES
(0, 'aaaaaaaaaaaaaaaa', 'aaaaaaaaaa', 'aaaaaaaa', '2022-05-05', 'aaaaaaaaa', 0, 'C', 0, 'aaaaaaa', 'aaaaaaaa', 'aaaaaaaaaa', NULL, 100, 0, 2);

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
(3, ' ', ''),
(4, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99'),
(5, ' ', '7215ee9c7d9dc229d2921a40e899ec5f'),
(6, 'admin', 'dc49612c78681cc0903a40f49083447f');

-- --------------------------------------------------------

--
-- Struttura della tabella `visita`
--

CREATE TABLE `visita` (
  `id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `scadenza` date NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `visita`
--

INSERT INTO `visita` (`id`, `tipo`, `scadenza`, `foto`) VALUES
(0, 1, '2022-05-05', 'fotoVisitaaaaaaaaaaaaaaaaa.jpg');

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
  ADD PRIMARY KEY (`id`,`giorno`,`idCategoria`),
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
  ADD UNIQUE KEY `foto` (`foto`);

--
-- Indici per le tabelle `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `telefono`
--
ALTER TABLE `telefono`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
