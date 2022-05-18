-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 18, 2022 alle 22:43
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 8.1.1

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
(9, 150, 1, 'S', '2022-05-18'),
(10, 152, 2, 'XL', '2022-05-18'),
(11, 152, 3, 'XXL', '2022-05-18'),
(12, 148, 4, 'S', '2022-05-18'),
(13, 152, 1, 'XS', '2022-05-18'),
(14, 148, 2, 'L', '2022-05-18'),
(15, 146, 6, 'XS', '2022-05-18'),
(16, 150, 5, 'L', '2022-05-18');

-- --------------------------------------------------------

--
-- Struttura della tabella `acquistimagazzino`
--

CREATE TABLE `acquistimagazzino` (
  `id` int(11) NOT NULL,
  `idProdotto` int(11) NOT NULL,
  `quantita` int(11) NOT NULL,
  `prezzototale` int(11) NOT NULL,
  `taglia` varchar(3) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `acquistimagazzino`
--

INSERT INTO `acquistimagazzino` (`id`, `idProdotto`, `quantita`, `prezzototale`, `taglia`, `data`) VALUES
(15, 1, 45, 0, 'XXS', '2022-05-18'),
(16, 1, 78, 0, 'XS', '2022-05-18'),
(17, 1, 34, 0, 'S', '2022-05-18'),
(18, 1, 14, 0, 'M', '2022-05-18'),
(19, 1, 12, 0, 'L', '2022-05-18'),
(20, 6, 54, 0, 'XXS', '2022-05-18'),
(21, 6, 65, 0, 'XS', '2022-05-18'),
(22, 6, 76, 0, 'S', '2022-05-18'),
(23, 1, 34, 0, 'XXS', '2022-05-18'),
(24, 5, 124, 0, 'XS', '2022-05-18'),
(25, 1, 7, 0, 'XXS', '2022-05-18'),
(26, 1, 65, 0, 'S', '2022-05-18'),
(27, 1, 1, 0, 'M', '2022-05-18'),
(28, 6, 42, 0, 'XS', '2022-05-18'),
(29, 6, 4, 0, 'S', '2022-05-18'),
(30, 6, 1, 0, 'M', '2022-05-18'),
(31, 6, 23, 0, 'L', '2022-05-18');

-- --------------------------------------------------------

--
-- Struttura della tabella `acquistimateriale`
--

CREATE TABLE `acquistimateriale` (
  `id` int(11) NOT NULL,
  `descrizione` varchar(32) NOT NULL,
  `quantita` int(11) NOT NULL,
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

--
-- Dump dei dati per la tabella `allenamento`
--

INSERT INTO `allenamento` (`id`, `oraInizio`, `oraFine`, `giorno`, `idCategoria`) VALUES
(9, '18:00', '20:00', 'Martedi', 2),
(10, '18:00', '20:00', 'Giovedi', 2),
(11, '20:00', '22:00', 'Lunedi', 1),
(12, '20:00', '22:00', 'Mercoledi', 1);

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
(1, 'PrimaSquadra', 20, 12, ''),
(2, 'Juniores', 26, 24, ''),
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
(26, '1', 'fotoGalleria1.jpg'),
(27, '2', 'fotoGalleria2.jpg'),
(28, '3', 'fotoGalleria3.jpg'),
(29, '4', 'fotoGalleria4.jpg'),
(30, '5', 'fotoGalleria5.jpeg'),
(31, '6', 'fotoGalleria6.jpg'),
(32, '7', 'fotoGalleria7.jpg'),
(33, '8', 'fotoGalleria8.jpg'),
(34, '9', 'fotoGalleria9.jpg'),
(35, '10', 'fotoGalleria10.jpg'),
(36, '11', 'fotoGalleria11.jpg'),
(37, '12', 'fotoGalleria12.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `magazzino`
--

CREATE TABLE `magazzino` (
  `id` int(11) NOT NULL,
  `idProdotto` int(11) NOT NULL,
  `quantita` int(11) NOT NULL,
  `taglia` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `magazzino`
--

INSERT INTO `magazzino` (`id`, `idProdotto`, `quantita`, `taglia`) VALUES
(177, 1, 86, 'XXS'),
(178, 1, 78, 'XS'),
(179, 1, 99, 'S'),
(180, 1, 15, 'M'),
(181, 1, 12, 'L'),
(182, 2, 0, 'S'),
(183, 2, 0, 'M'),
(184, 2, 0, 'L'),
(185, 2, 0, 'XL'),
(186, 2, 0, 'XXL'),
(187, 3, 0, 'S'),
(188, 3, 0, 'M'),
(189, 3, 0, 'L'),
(190, 3, 0, 'XL'),
(191, 3, 0, 'XXL'),
(192, 4, 0, 'S'),
(193, 4, 0, 'M'),
(194, 4, 0, 'L'),
(195, 4, 0, 'XL'),
(196, 4, 0, 'XXL'),
(197, 5, 0, 'XXS'),
(198, 5, 124, 'XS'),
(199, 5, 0, 'S'),
(200, 5, 0, 'M'),
(201, 5, 0, 'L'),
(202, 6, 54, 'XXS'),
(203, 6, 107, 'XS'),
(204, 6, 80, 'S'),
(205, 6, 1, 'M'),
(206, 6, 23, 'L');

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
(39, 'fotoDivisaPrimaSquadraDivisa Trasferta.jpg', 'Divisa Trasferta', 'Disiva usata dalla squadra in trasferta'),
(40, 'fotoDivisaPrimaSquadraDivisa casa.jpg', 'Divisa casa', 'Disiva usata dalla squadra in casa'),
(41, 'fotoDivisaJunioresDivisa trasferta.png', 'Divisa trasferta', 'Disiva usata dalla squadra in trasferta'),
(42, 'fotoDivisaJunioresDivisa casa.png', 'Divisa casa', 'Disiva usata dalla squadra in casa');

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
(11, 'mister', 'barone.jack@ferretti.com', 143),
(12, 'mister', 'bianco.ninfa@example.com', 144),
(13, 'mister', 'shaira.derosa@example.com', 145),
(14, 'giocatore', 'vrossi@example.org', 146),
(16, 'giocatore', 'martini.orfeo@example.com', 148),
(17, 'papa', 'lino52@example.com', 148),
(20, 'mamma', 'uferri@example.org', 152);

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

--
-- Dump dei dati per la tabella `news`
--

INSERT INTO `news` (`id`, `titolo`, `foto`, `descrizione`) VALUES
(8, 'Festa della mamma', 'fotoNews1.jpg', 'Auguri a tutte le mamme'),
(9, 'Nuovo Evento 8 Maggio', 'fotoNews2.jpg', 'Alle 15.30 si terra un nuovo eventi della societa '),
(10, 'Giornale', 'fotoNews3.jpg', 'Siamo finiti sul giornale per uno speciale evento'),
(11, 'Canzo summer camp', 'fotoNews4.jpg', 'Volantino per la vacanza estiva dedicata a tutti i giocatori di tutte le eta per una cosa incredibile'),
(12, 'Sabato 21 Maggio', 'fotoNews5.jpg', 'Evento esclusivo post partita del 21 Maggio presso il campo di canzo '),
(13, '26 Maggio', 'fotoNews6.png', 'Raduno di tutti gli ex giocatori per una battuta di caccia e partita a pallone poi pizza gratis e buffet');

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `tipoTaglie` tinyint(4) NOT NULL,
  `costoUnitario` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`id`, `nome`, `tipoTaglie`, `costoUnitario`, `foto`) VALUES
(1, 'Felpa Nera', 0, 20, 'fotoProdotto1.jpg'),
(2, 'Felpa Blu', 1, 25, 'fotoProdotto2.jpg'),
(3, 'Maglia Gialla', 1, 5, 'fotoProdotto3.jpg'),
(4, 'Maglia Rossa', 1, 5, 'fotoProdotto4.jpg'),
(5, 'Pantaloncini Azzurri', 0, 15, 'fotoProdotto5.jpg'),
(6, 'Pantaloncini Neri', 0, 15, 'fotoProdotto6.jpg');

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
(9, 'mister', '+39 360 659 64', 143),
(10, 'mister', '034 206 4292', 144),
(11, 'mister', '+39 009 946 62', 145),
(12, 'giocatore', '+20 961 662541', 146),
(13, 'papa', '+39 961 765756', 146),
(15, 'giocatore', '+46 1741 36696', 148),
(16, 'giocatore', '+30 348 11 27 ', 148),
(17, 'mamma', '078 133 6150', 148),
(18, 'giocatore', '078 133 6150', 150),
(19, 'casa', '123 534 4656', 150),
(20, 'giocatore', '+50 600 962774', 151),
(21, 'mamma', '+33 61 5575893', 152);

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
(143, 'QWQGVN33M65C699B', 'Riccardo ', 'Gianetti', '2000-02-01', 'Erba', 1, 'M', NULL, 'Borgo Ruggiero 725', 'TR', 'Sesto Nayade calabro', 'fotoProfiloQWQGVN33M65C699B.jpg', 0, 0, 1),
(144, 'VSTCFK42E52F492V', 'Ione', 'Riva', '1982-08-10', 'Pescara', 1, 'M', NULL, 'Contrada Damico 85 Appartamento ', 'PE', 'Pescara', 'fotoProfiloVSTCFK42E52F492V.jpg', 0, 0, 2),
(145, 'JTVLHU92L50A334U', 'Osvaldo ', 'Rossi', '1999-11-01', 'Pavia', 1, 'M', NULL, 'Strada Pellegrino 71', 'SA', 'Giacinto a mare', NULL, 0, 0, 1),
(146, 'YLTGVW78S25A820F', 'Leonardo', 'Guerra', '1989-07-17', 'Bari', 0, 'P', 39, 'Incrocio Leonardo 14', 'BR', 'Bari', 'fotoProfiloYLTGVW78S25A820F.jpg', 15, 0, 1),
(147, 'YLTGVW78S25A820F', 'Tolomeo ', 'Martinelli', '1983-08-10', 'Savona', 0, 'D', 40, 'Rotonda Damico 761', 'SV', 'Felicia ligure', 'fotoProfiloYLTGVW78S25A820F.jpg', 0, 0, 1),
(148, 'VGEHPL38M06E389E', 'Marino ', 'Costantini', '1999-10-26', 'Salerno', 0, 'C', 41, 'Piazza Pellegrino 2 Piano 8', 'CB', 'Campobasso', 'fotoProfiloVGEHPL38M06E389E.jpg', 30, 0, 1),
(149, 'VGEHPL38M06E389E', 'Edvige ', 'Rossi', '1999-12-07', 'Prato', 0, 'A', 42, 'Contrada Miriana 5 Appartamento ', 'VC', 'Prato', 'fotoProfiloVGEHPL38M06E389E.jpg', 0, 0, 1),
(150, 'CFRHXF71M48H727B', 'Bacchisio ', 'Barone', '1992-12-10', 'Savona', 0, 'C', 43, 'Borgo Morgana 8', 'SV', 'Savona', 'fotoProfiloCFRHXF71M48H727B.jpg', 35, 0, 2),
(151, 'BRMHRH37B03L913O', 'Nunzio', 'Ruggiero', '2000-11-25', 'Crotone', 0, 'P', 44, 'Piazza Ruth 96', 'CR', 'Crotone', 'fotoProfiloBRMHRH37B03L913O.jpg', 0, 0, 2),
(152, 'RPHQSD78A67E281H', 'Fabiano ', 'Palumbo', '2000-03-13', 'Asti', 0, 'C', 45, 'Incrocio Carbone 6 Appartamento ', 'AT', 'Asti', 'fotoProfiloRPHQSD78A67E281H.jpg', 50, 0, 2);

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
(39, 1),
(40, 1),
(41, 2),
(42, 2);

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
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `visita`
--

INSERT INTO `visita` (`id`, `tipo`, `scadenza`, `foto`) VALUES
(39, 0, '2022-06-20', 'fotoVisitaYLTGVW78S25A820F.jpg'),
(40, 0, '2022-09-19', 'fotoVisitaYLTGVW78S25A820F.png'),
(41, 1, '2022-05-19', 'fotoVisitaVGEHPL38M06E389E.jpg'),
(42, 0, '2022-04-19', 'fotoVisitaVGEHPL38M06E389E.png'),
(43, 1, '2022-12-09', 'fotoVisitaCFRHXF71M48H727B.png'),
(44, 1, '2022-06-19', 'fotoVisitaBRMHRH37B03L913O.png'),
(45, 1, '2022-05-19', 'fotoVisitaRPHQSD78A67E281H.png');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `acquistigiocatori`
--
ALTER TABLE `acquistigiocatori`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `acquistimagazzino`
--
ALTER TABLE `acquistimagazzino`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `acquistimagazzino`
--
ALTER TABLE `acquistimagazzino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT per la tabella `allenamento`
--
ALTER TABLE `allenamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `galleria`
--
ALTER TABLE `galleria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT per la tabella `magazzino`
--
ALTER TABLE `magazzino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT per la tabella `maglia`
--
ALTER TABLE `maglia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT per la tabella `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT per la tabella `telefono`
--
ALTER TABLE `telefono`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT per la tabella `tesserato`
--
ALTER TABLE `tesserato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `visita`
--
ALTER TABLE `visita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Limiti per le tabelle scaricate
--

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
