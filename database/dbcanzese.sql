-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 02, 2022 alle 22:55
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

-- --------------------------------------------------------

--
-- Struttura della tabella `acquistimateriale`
--

CREATE TABLE `acquistimateriale` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `descrizione` text DEFAULT NULL,
  `quantita` int(11) NOT NULL,
  `prezzo` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `data` date NOT NULL,
  `nascosto` tinyint(4) NOT NULL DEFAULT 0
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
  `idCategoria` int(11) NOT NULL,
  `spogliatoio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `allenamento`
--

INSERT INTO `allenamento` (`id`, `oraInizio`, `oraFine`, `giorno`, `idCategoria`, `spogliatoio`) VALUES
(23, '20:00', '22:00', 'Lunedi', 1, ' aaa'),
(24, '20:00', '22:00', 'Lunedi', 1, 'vv'),
(25, '20:00', '22:00', 'Lunedi', 8, 'aaaa'),
(26, '', '', '', 8, '');

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
(1, 'PrimaSquadra', 0, 12, ''),
(2, 'Juniores', 0, 0, ''),
(3, 'Allievi', 0, 0, ''),
(4, 'Giovanissimi', 0, 0, ''),
(5, 'Esordienti', 0, 0, ''),
(6, 'Pulcini', 0, 0, ''),
(7, 'PiccoliAmici', 0, 0, ''),
(8, 'Prova', 0, 12, '');

-- --------------------------------------------------------

--
-- Struttura della tabella `galleria`
--

CREATE TABLE `galleria` (
  `id` int(10) UNSIGNED NOT NULL,
  `titolo` varchar(32) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(198, 1, 0, 'XXS', 0),
(199, 1, 0, 'XS', 0),
(200, 1, 0, 'S', 0),
(201, 1, 0, 'M', 0),
(202, 1, 0, 'L', 0),
(204, 2, 0, 'XXS', 0),
(205, 2, 0, 'XS', 0),
(206, 2, 0, 'S', 0),
(207, 2, 0, 'M', 0),
(208, 2, 0, 'L', 0);

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
(42, 'fotoDivisaProvabbbbb.jpg', 'bbbbb', 'bbbbb');

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
(1, 'aaaaaaaa', 0, 222, 'fotoProdotto1.jpg', 0),
(2, 'dbndfb', 0, 12, 'fotoProdotto2.jpg', 0);

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
(8, 'aaaaa', 12, '2022-06-02'),
(9, 'bbbbb', 12, '2022-06-02');

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

-- --------------------------------------------------------

--
-- Struttura della tabella `tesserato`
--

CREATE TABLE `tesserato` (
  `id` int(11) NOT NULL,
  `cf` varchar(16) NOT NULL,
  `matricola` varchar(20) NOT NULL,
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

INSERT INTO `tesserato` (`id`, `cf`, `matricola`, `nome`, `cognome`, `dataNascita`, `luogoNascita`, `tipo`, `ruolo`, `idVisita`, `via`, `provincia`, `citta`, `linkFoto`, `daPagare`, `pagato`, `idCategoria`, `nascosto`) VALUES
(174, 'aaaaaaaaaaaaaaaa', 'bbbbbbbb', 'aaaaaaaaaaa', 'aaaaaaa', '2022-06-01', 'aaaa', 1, 'N', NULL, 'aaaaa', 'aa', 'aaaaaaa', NULL, 0, 0, 1, 0),
(175, 'bbbbbbbbbbbbbbbb', 'cccccc', 'bbbb', 'bbbbbbbb', '2022-06-19', 'bbbbbb', 0, 'N', NULL, 'bbb', 'bb', 'bbbb', NULL, -122, 122, 1, 0),
(176, 'cccccccccccccccc', 'vvvvv', 'cccccc', 'ccccccc', '2022-06-02', 'ccc', 1, 'N', NULL, 'ccc', 'cc', 'cccc', NULL, 0, 0, 3, 0),
(177, 'dddddddddddddddd', 'bbbbb', 'dddddd', 'ddddddd', '2022-06-18', 'ddddd', 0, 'N', NULL, 'dddd', 'dd', 'ddd', NULL, 0, 0, 6, 0),
(179, 'bbbbbccaaaaaaaaa', 'aaaaaaaaaaa', 'ccccccccccccccccccc', 'aaaaaa', '2022-06-17', 'aaaaaa', 0, 'N', NULL, 'aaaaaa', 'aa', 'aaaaaa', NULL, 0, 0, 8, 1);

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
(42, 8);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` varchar(32) NOT NULL,
  `password` char(32) NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT 0,
  `idCategoria` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `user`, `password`, `tipo`, `idCategoria`) VALUES
(18, 'a', '0cc175b9c0f1b6a831c399e269772661', 1, 1),
(19, 'b', '92eb5ffee6ae2fec3ad71c777531578f', 1, 2),
(20, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 0, NULL),
(21, ' ', '7215ee9c7d9dc229d2921a40e899ec5f', 0, NULL);

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
  ADD UNIQUE KEY `cf` (`cf`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT per la tabella `acquistimagazzino`
--
ALTER TABLE `acquistimagazzino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT per la tabella `acquistimateriale`
--
ALTER TABLE `acquistimateriale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT per la tabella `allenamento`
--
ALTER TABLE `allenamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `galleria`
--
ALTER TABLE `galleria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT per la tabella `magazzino`
--
ALTER TABLE `magazzino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT per la tabella `maglia`
--
ALTER TABLE `maglia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT per la tabella `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `telefono`
--
ALTER TABLE `telefono`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT per la tabella `tesserato`
--
ALTER TABLE `tesserato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT per la tabella `visita`
--
ALTER TABLE `visita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
