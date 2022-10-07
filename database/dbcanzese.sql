-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Ott 07, 2022 alle 19:42
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
  `taglia` varchar(4) NOT NULL,
  `dataAcquisto` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `acquistigiocatori`
--

INSERT INTO `acquistigiocatori` (`id`, `idTesserato`, `idProdotto`, `taglia`, `dataAcquisto`) VALUES
(50, 196, 1, 'XS', '2022-09-24'),
(51, 196, 1, 'XS', '2022-09-24'),
(52, 196, 1, 'XS', '2022-09-24'),
(53, 196, 1, 'XS', '2022-09-24'),
(54, 196, 1, 'XS', '2022-09-24'),
(55, 196, 3, 'XXXS', '2022-10-06'),
(56, 196, 3, 'XXXS', '2022-10-06');

-- --------------------------------------------------------

--
-- Struttura della tabella `acquistimagazzino`
--

CREATE TABLE `acquistimagazzino` (
  `id` int(11) NOT NULL,
  `idMagazzino` int(11) NOT NULL,
  `quantita` int(11) NOT NULL,
  `prezzototale` decimal(10,2) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `acquistimagazzino`
--

INSERT INTO `acquistimagazzino` (`id`, `idMagazzino`, `quantita`, `prezzototale`, `data`) VALUES
(94, 260, 10, '120.01', '2022-10-06');

-- --------------------------------------------------------

--
-- Struttura della tabella `acquistimateriale`
--

CREATE TABLE `acquistimateriale` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `descrizione` text DEFAULT NULL,
  `quantita` int(11) NOT NULL,
  `prezzo` decimal(10,2) NOT NULL,
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
(20, 'h', 0, 0, ''),
(21, 'prima squadra', 0, 0, '');

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
  `taglia` varchar(4) NOT NULL,
  `nascosto` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `magazzino`
--

INSERT INTO `magazzino` (`id`, `idProdotto`, `quantita`, `taglia`, `nascosto`) VALUES
(219, 1, 0, 'XXS', 0),
(220, 1, -5, 'XS', 0),
(221, 1, 0, 'S', 0),
(222, 1, 0, 'M', 0),
(223, 1, 0, 'L', 0),
(224, 2, 0, 'XXS', 0),
(225, 2, 0, 'XS', 0),
(226, 2, 0, 'S', 0),
(227, 2, 0, 'M', 0),
(228, 2, 0, 'L', 0),
(260, 3, 8, 'XXXS', 0),
(261, 3, 0, 'XXS', 0),
(262, 3, 0, 'XS', 0),
(263, 3, 0, 'S', 0),
(264, 3, 0, 'M', 0),
(265, 3, 0, 'L', 0),
(266, 4, 0, 'S', 0),
(267, 4, 0, 'M', 0),
(268, 4, 0, 'L', 0),
(269, 4, 0, 'XL', 0),
(270, 4, 0, 'XXL', 0),
(271, 5, 0, 'XXXS', 0),
(272, 5, 0, 'XXS', 0),
(273, 5, 0, 'XS', 0),
(274, 5, 0, 'S', 0),
(275, 5, 0, 'M', 0),
(276, 5, 0, 'L', 0);

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
(166, 'papa', 'aaaaaaaaaaaaaaaaaaa@gmail.com', 196),
(167, 'asd', 'andrea@gmail.com', 196),
(168, 'mamma', 'cccccccccccccccccccc@gmailc.com', 196),
(169, 'sis', 'dddddd@gmail.com', 196),
(170, 'bbbb', 'bbbbbbbbbbbbbbbbbbbb@gmail.com', 196),
(171, 'ankfcasv', 'asdasd@gmail.com', 196),
(173, 'papa', 'silvano@gmail.com', 197),
(174, 'fratello', 'ad@gmail.com', 197),
(175, 'mamma', 'bbbbbbbbbbbbbbbbbb@gmail.com', 197),
(178, 'mister', 'simonegerisa@gmail.com', 198),
(179, 'mister', 'aaaaaaaaaaaa@gmail.com', 198),
(180, 'papa', 'silvano@gmail.com', 199),
(181, 'fratello', 'andrea@gmail.com', 199),
(182, 'papa', 'silvano@gmail.com', 200),
(183, 'fratello', 'andrea@gmail.com', 200),
(184, 'Monguzzo', 'cccccccccccccccccccc@gmailc.com', 198);

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
  `costoUnitario` float(10,2) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nascosto` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`id`, `nome`, `tipoTaglie`, `costoUnitario`, `foto`, `nascosto`) VALUES
(1, 'a', 0, 0.00, 'fotoProdotto1.jpg', 0),
(2, 'b', 0, 0.00, 'fotoProdotto2.jpg', 0),
(3, 'andrea', 0, 12.00, 'fotoProdotto3.jpg', 0),
(4, 'aaaafcvasdvsd', 1, 2.90, 'fotoProdotto4.jpg', 0),
(5, 'ccccc', 0, 12.00, 'fotoProdotto5.jpg', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `sponsor`
--

CREATE TABLE `sponsor` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `entrata` decimal(10,2) UNSIGNED NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `sponsor`
--

INSERT INTO `sponsor` (`id`, `nome`, `entrata`, `data`) VALUES
(10, 'aaa', '12.00', '2022-09-26'),
(11, 'asfsvsdfvdxc', '13.90', '2022-10-06');

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
(165, 'papa', '3390456712', 196),
(167, 'papa', '3390456712', 198),
(168, 'mama', '3289230216', 198),
(169, 'sor', '1243456456', 198),
(170, 'papa', '3390456712', 199),
(171, 'asdasd', '3289230216', 199),
(172, 'papa', '3390456712', 200),
(173, 'asdasd', '3289230216', 200);

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
  `daPagare` decimal(10,2) NOT NULL DEFAULT 0.00,
  `pagato` decimal(10,2) NOT NULL DEFAULT 0.00,
  `idCategoria` int(11) NOT NULL,
  `nascosto` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `tesserato`
--

INSERT INTO `tesserato` (`id`, `cf`, `matricola`, `nome`, `cognome`, `dataNascita`, `luogoNascita`, `tipo`, `ruolo`, `idVisita`, `via`, `provincia`, `citta`, `linkFoto`, `daPagare`, `pagato`, `idCategoria`, `nascosto`) VALUES
(196, 'aaaaaaaaaaaaaaaa', 'aaaaa', 'aaaaaaaaaaa', 'aaaaaaaaa', '2022-09-18', 'aaa', 0, 'N', 73, 'aa', 'aa', 'aa', NULL, '33.87', '1.99', 20, 0),
(197, 'bbbbbbbbbbbbbbbb', 'bbbb', 'bbbbbb', 'bbbbbbb', '2022-09-15', 'bbb', 0, 'N', 74, 'bb', 'bb', 'bb', NULL, '0.00', '0.00', 20, 0),
(198, 'dddddddddddddddd', 'dddd', 'Andrea', 'Mauri', '2022-09-22', 'ddd', 1, 'N', NULL, 'Via Parini 6/b', 'dd', 'dd', NULL, '0.00', '0.00', 20, 0),
(199, 'cccccccccccccccc', 'cccccccccc', 'cccccccc', 'ccccccccc', '2022-09-10', 'ccc', 0, 'N', 75, 'ccc', 'cc', 'cc', NULL, '0.00', '0.00', 20, 0),
(200, 'eeeeeeeeeeeeeeee', 'eeee', 'eeeeeeeee', 'eeeeeee', '2022-09-03', 'eee', 1, 'N', NULL, 'ee', 'ee', 'ee', NULL, '0.00', '0.00', 20, 0),
(203, 'bdfbdfbdfbdfbdfb', 'dfbfdb', 'savdfsbdf', 'bdfbdf', '2022-10-08', 'dfndfnb', 0, 'N', NULL, 'dfn', 'nd', 'dnd', NULL, '30.80', '80.90', 20, 0),
(207, 'dfbdfbndfndfndnd', 'dfg', 'dbfdfb', 'dbdfb', '2022-10-07', 'dfvdfv', 0, 'N', NULL, 'dfb', 'df', 'dfbdfb', NULL, '12.00', '13.89', 20, 0),
(208, 'vsdvsdvsdvsdvsdv', 'sdvds', 'ascsa', 'casdvsd', '2022-10-01', 'sdvsdv', 0, 'N', NULL, 'svdsd', 'sd', 'vsdv', NULL, '0.00', '0.00', 21, 0);

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
  `password` char(32) NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT 0,
  `idCategoria` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `user`, `password`, `tipo`, `idCategoria`) VALUES
(24, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 0, NULL),
(28, ' ', '7215ee9c7d9dc229d2921a40e899ec5f', 0, NULL);

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
-- Dump dei dati per la tabella `visita`
--

INSERT INTO `visita` (`id`, `tipo`, `scadenza`, `foto`, `nascosto`) VALUES
(73, 0, '2022-09-04', '', 0),
(74, 0, '2022-11-04', '', 0),
(75, 0, '0000-00-00', '', 0);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat` (`idCategoria`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT per la tabella `acquistimagazzino`
--
ALTER TABLE `acquistimagazzino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT per la tabella `galleria`
--
ALTER TABLE `galleria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT per la tabella `magazzino`
--
ALTER TABLE `magazzino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT per la tabella `maglia`
--
ALTER TABLE `maglia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT per la tabella `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `telefono`
--
ALTER TABLE `telefono`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT per la tabella `tesserato`
--
ALTER TABLE `tesserato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT per la tabella `visita`
--
ALTER TABLE `visita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `acquistigiocatori`
--
ALTER TABLE `acquistigiocatori`
  ADD CONSTRAINT `acquistaProdotto` FOREIGN KEY (`idProdotto`) REFERENCES `prodotto` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tesserato` FOREIGN KEY (`idTesserato`) REFERENCES `tesserato` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `acquistimagazzino`
--
ALTER TABLE `acquistimagazzino`
  ADD CONSTRAINT `magazzino` FOREIGN KEY (`idMagazzino`) REFERENCES `magazzino` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `allenamento`
--
ALTER TABLE `allenamento`
  ADD CONSTRAINT `idcategoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `magazzino`
--
ALTER TABLE `magazzino`
  ADD CONSTRAINT `prodotto` FOREIGN KEY (`idProdotto`) REFERENCES `prodotto` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `idtesserato` FOREIGN KEY (`idTesserato`) REFERENCES `tesserato` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `telefono`
--
ALTER TABLE `telefono`
  ADD CONSTRAINT `idtesse` FOREIGN KEY (`idTesserato`) REFERENCES `tesserato` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `tesserato`
--
ALTER TABLE `tesserato`
  ADD CONSTRAINT `relazione3` FOREIGN KEY (`idVisita`) REFERENCES `visita` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `relazione4` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `usa`
--
ALTER TABLE `usa`
  ADD CONSTRAINT `relazione1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `relazione2` FOREIGN KEY (`idMaglia`) REFERENCES `maglia` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `utenti`
--
ALTER TABLE `utenti`
  ADD CONSTRAINT `cat` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
