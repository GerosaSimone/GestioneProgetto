-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 26, 2022 alle 21:08
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 8.1.6

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
  `idTesserato` int(11) NOT NULL,
  `idProdotto` int(11) NOT NULL,
  `taglia` varchar(3) NOT NULL,
  `dataAcquisto` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `acquistigiocatori`
--

INSERT INTO `acquistigiocatori` (`id`, `idTesserato`, `idProdotto`, `taglia`, `dataAcquisto`) VALUES
(16, 159, 1, 'M', '2022-05-26'),
(22, 163, 2, 'S', '2022-05-26'),
(23, 164, 2, 'L', '2022-05-26'),
(24, 163, 2, 'M', '2022-05-26');

-- --------------------------------------------------------

--
-- Struttura della tabella `acquistimagazzino`
--

CREATE TABLE `acquistimagazzino` (
  `id` int(11) NOT NULL,
  `idMagazzino` int(11) NOT NULL,
  `quantita` int(11) NOT NULL,
  `prezzototale` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `acquistimagazzino`
--

INSERT INTO `acquistimagazzino` (`id`, `idMagazzino`, `quantita`, `prezzototale`, `data`) VALUES
(82, 188, 12, 0, '2022-05-26'),
(83, 189, 2, 0, '2022-05-26'),
(84, 190, 34, 0, '2022-05-26'),
(85, 192, 54, 0, '2022-05-26');

-- --------------------------------------------------------

--
-- Struttura della tabella `acquistimateriale`
--

CREATE TABLE `acquistimateriale` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `descrizione` text NOT NULL,
  `quantita` int(11) NOT NULL,
  `prezzo` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `acquistimateriale`
--

INSERT INTO `acquistimateriale` (`id`, `nome`, `descrizione`, `quantita`, `prezzo`, `foto`, `data`) VALUES
(28, 'dbdfb', 'dfbdfbdf', 1, 124, 'fotoGenerico1.jpg', '2022-05-26');

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

--
-- Dump dei dati per la tabella `allenamento`
--

INSERT INTO `allenamento` (`id`, `oraInizio`, `oraFine`, `giorno`, `idCategoria`) VALUES
(11, '22:00', '22:00', 'Venerdi', 1),
(22, '20:00', '11:00', 'Martedi', 1);

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
(1, 'PrimaSquadra', 0, 111, ''),
(2, 'Juniores', 0, 0, ''),
(3, 'Allievi', 0, 0, ''),
(4, 'Giovanissimi', 0, 0, ''),
(5, 'Esordienti', 0, 0, ''),
(6, 'Pulcini', 0, 0, ''),
(7, 'PiccoliAmici', 0, 0, '');

-- --------------------------------------------------------

--
-- Struttura della tabella `galleria`
--

CREATE TABLE `galleria` (
  `id` int(10) UNSIGNED NOT NULL,
  `titolo` varchar(32) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `galleria`
--

INSERT INTO `galleria` (`id`, `titolo`, `foto`) VALUES
(29, '1', 'fotoGalleria1.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `magazzino`
--

CREATE TABLE `magazzino` (
  `id` int(11) NOT NULL,
  `idProdotto` int(11) NOT NULL,
  `quantita` int(11) NOT NULL,
  `taglia` varchar(3) NOT NULL,
  `nascosto` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `magazzino`
--

INSERT INTO `magazzino` (`id`, `idProdotto`, `quantita`, `taglia`, `nascosto`) VALUES
(183, 1, 0, 'XXS', 1),
(184, 1, 12, 'XS', 1),
(185, 1, 0, 'S', 1),
(186, 1, 11, 'M', 1),
(187, 1, 14, 'L', 1),
(188, 2, 12, 'XXS', 0),
(189, 2, 2, 'XS', 0),
(190, 2, 33, 'S', 0),
(191, 2, 11, 'M', 0),
(192, 2, 12, 'L', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `maglia`
--

CREATE TABLE `maglia` (
  `id` int(11) NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `titolo` varchar(50) NOT NULL,
  `descrizione` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `maglia`
--

INSERT INTO `maglia` (`id`, `foto`, `titolo`, `descrizione`) VALUES
(40, 'fotoDivisaPrimaSquadradfvdfbdfb.jpg', 'dfvdfbdfb', 'dfbdfbdf'),
(41, 'fotoDivisaPrimaSquadrasfbdfb.jpg', 'sfbdfb', 'dfbdfb');

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

-- --------------------------------------------------------

--
-- Struttura della tabella `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `titolo` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `descrizione` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `tipoTaglie` tinyint(4) NOT NULL,
  `costoUnitario` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nascosto` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`id`, `nome`, `tipoTaglie`, `costoUnitario`, `foto`, `nascosto`) VALUES
(1, 'bdgndfbndbndf', 0, 45, 'fotoProdotto1.jpg', 1),
(2, 'dio cane', 0, 2456, 'fotoProdotto2.jpg', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `sponsor`
--

CREATE TABLE `sponsor` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `entrata` int(10) UNSIGNED NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `sponsor`
--

INSERT INTO `sponsor` (`id`, `nome`, `entrata`, `data`) VALUES
(6, 'asdasd', 23, '2022-05-26');

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
(39, 'mamma', '111111111111', 159),
(41, 'mamma', '3390456712', 160),
(44, 'mamma', '3390456712', 161);

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
  `idCategoria` int(11) NOT NULL,
  `nascosto` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `tesserato`
--

INSERT INTO `tesserato` (`id`, `cf`, `nome`, `cognome`, `dataNascita`, `luogoNascita`, `tipo`, `ruolo`, `idVisita`, `via`, `provincia`, `citta`, `linkFoto`, `daPagare`, `pagato`, `idCategoria`, `nascosto`) VALUES
(158, 'asdfsdvsvbsdvsvd', 'dfbdbfd', 'fbdbdfb', '2022-05-04', 'sdvsv', 1, 'P', NULL, 'sdvsdvs', 'vs', 'dvsdvsd', 'fotoProfiloasdfsdvsvbsdvsvd.jpg', 0, 0, 2, 1),
(159, 'bdfbdfbdbdfbdfbd', 'dfbdfb', 'dfbdfbdf', '2022-05-15', 'dfbdfbdfb', 0, 'N', NULL, 'dfbdf', 'df', 'dfbdfb', NULL, 135, 0, 3, 1),
(160, 'dfbdfbdfbdfbdfbd', 'sdfsvbsfbdfbbbbbb', 'bdfbdfb', '2022-05-26', 'dbfdfbdf', 1, 'N', NULL, 'bdfb', 'bd', 'dbdff', NULL, 0, 0, 1, 1),
(161, 'dfbdfbdfbdfbdfbd', 'bbbbbbbbb', 'dfbdfbdfb', '2022-05-28', 'dfbdfbd', 0, 'N', NULL, 'dfbdf', 'bd', 'bdfbdf', NULL, 0, 0, 1, 1),
(162, 'nfgnfgdfgnbfgnfg', 'dfbdfb', 'sdvsdfbg', '2022-04-28', 'fgnfgn', 1, 'N', NULL, 'fgnfgnfg', 'fg', 'nfgnfgn', NULL, 0, 0, 1, 1),
(163, 'fgbnfgnfgnfgnfgn', 'dfbdfbndf', 'nbdfndfn', '2022-04-29', 'fgnfnfgn', 1, 'N', NULL, 'fgn', 'nf', 'fgnfgn', 'fotoProfilofgbnfgnfgnfgnfgn.jpg', 4912, 0, 1, 0),
(164, 'dfbndfbndfbdfbdf', 'dfbdfbn', 'dfnbdfn', '2022-05-12', 'sdfvbsdfb', 0, 'N', NULL, 'dfbdfb', 'df', 'dfbdfb', NULL, 2456, 0, 1, 0),
(165, 'aaaaaaaaaaaaaaaa', 'aaaaaaa', 'aaaaaa', '2022-04-30', 'aaaaa', 0, 'N', NULL, 'Via Parini 6/b', 'aa', 'aaaaa', NULL, 10, 20, 2, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `usa`
--

CREATE TABLE `usa` (
  `idMaglia` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `usa`
--

INSERT INTO `usa` (`idMaglia`, `idCategoria`) VALUES
(40, 1),
(41, 1);

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
(7, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99'),
(8, ' ', '7215ee9c7d9dc229d2921a40e899ec5f');

-- --------------------------------------------------------

--
-- Struttura della tabella `visita`
--

CREATE TABLE `visita` (
  `id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `scadenza` date NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nascosto` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `acquistigiocatori`
--
ALTER TABLE `acquistigiocatori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tesserato` (`idTesserato`),
  ADD KEY `acquistaProdotto` (`idProdotto`);

--
-- Indici per le tabelle `acquistimagazzino`
--
ALTER TABLE `acquistimagazzino`
  ADD PRIMARY KEY (`id`),
  ADD KEY `magazzino` (`idMagazzino`);

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
-- Indici per le tabelle `galleria`
--
ALTER TABLE `galleria`
  ADD PRIMARY KEY (`id`);

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
-- Indici per le tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `sponsor`
--
ALTER TABLE `sponsor`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT per la tabella `acquistimagazzino`
--
ALTER TABLE `acquistimagazzino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT per la tabella `acquistimateriale`
--
ALTER TABLE `acquistimateriale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT per la tabella `allenamento`
--
ALTER TABLE `allenamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `galleria`
--
ALTER TABLE `galleria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT per la tabella `magazzino`
--
ALTER TABLE `magazzino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT per la tabella `maglia`
--
ALTER TABLE `maglia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT per la tabella `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT per la tabella `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT per la tabella `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `telefono`
--
ALTER TABLE `telefono`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT per la tabella `tesserato`
--
ALTER TABLE `tesserato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `visita`
--
ALTER TABLE `visita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `acquistigiocatori`
--
ALTER TABLE `acquistigiocatori`
  ADD CONSTRAINT `acquistaProdotto` FOREIGN KEY (`idProdotto`) REFERENCES `prodotto` (`id`),
  ADD CONSTRAINT `tesserato` FOREIGN KEY (`idTesserato`) REFERENCES `tesserato` (`id`);

--
-- Limiti per la tabella `acquistimagazzino`
--
ALTER TABLE `acquistimagazzino`
  ADD CONSTRAINT `magazzino` FOREIGN KEY (`idMagazzino`) REFERENCES `magazzino` (`id`);

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
