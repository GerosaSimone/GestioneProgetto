-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 26, 2022 alle 18:05
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.12

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
  `linkFotoSquadra` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `palloni`, `pettorine`, `linkFotoSquadra`) VALUES
(1, 'juniores', 25, 15, 'fkfggguig'),
(1, 'PrimaSquadra', 0, 0, ''),
(2, 'Juniores', 0, 0, ''),
(2, 'PrimaSquadra', 30, 15, 'aefgvuaeggyj'),
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

--
-- Dump dei dati per la tabella `magazzino`
--

INSERT INTO `magazzino` (`id`, `idProdotto`, `quantita`, `taglia`) VALUES
(1, 1, 36, 'M'),
(2, 2, 22, 'L');

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
  `linkFoto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`id`, `nome`, `costoUnitario`, `linkFoto`) VALUES
(1, 'maglietta', 9, 'https://dadasportweb.com/15451-large_default/maglia-calcio-umbro-derby.jpg'),
(2, 'pantaloncini', 15, 'https://www.iacosport.com/images/stories/virtuemart/product/Z01308-762x1100.jpg'),
(3, 'felpa', 30, 'https://images.eprice.it/nobrand/0/hres/003/208180003/felpa-calcio-joma-sudadera-faraon.jpg'),
(4, 'pantaloni', 40, 'https://www.sportlandweb.it/53115-tm_thickbox_default/joma-sport-pantaloni-allenamento-calcio-atalanta-nero-bambino.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `telefono`
--

CREATE TABLE `telefono` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `Telefono` int(10) NOT NULL,
  `idTesserato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `telefono`
--

INSERT INTO `telefono` (`id`, `nome`, `Telefono`, `idTesserato`) VALUES
(1, 'papa', 333693586, 2),
(2, 'mamma', 4989491, 4);

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
  `ruolo` char(1) NOT NULL,
  `idVisita` int(11) NOT NULL,
  `via` varchar(32) NOT NULL,
  `provincia` varchar(32) NOT NULL,
  `Citta` varchar(32) NOT NULL,
  `linkFoto` varchar(32) NOT NULL,
  `daPagare` int(11) NOT NULL,
  `pagato` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `tesserato`
--

INSERT INTO `tesserato` (`id`, `cf`, `nome`, `cognome`, `dataNascita`, `luogoNascita`, `tipo`, `ruolo`, `idVisita`, `via`, `provincia`, `Citta`, `linkFoto`, `daPagare`, `pagato`, `idCategoria`) VALUES
(2, 'LCTNDR03P170416G', 'andrea', 'locatelli', '2003-09-17', 'erba', 0, 'C', 1, 'leopardi 3 a', 'como', 'canzo', 'sgaegaeg', 100, 50, 1),
(4, 'MRANDR03P02D416J', 'andrea', 'mauri', '2003-09-02', 'erba', 0, 'C', 2, 'parini 6 b', 'como', 'monguzzo', 'qefwegge', 250, 0, 2),
(5, 'GRSSMN03M06D416C', 'simone', 'gerosa', '2003-08-06', 'erba', 0, 'A', 2, 'Via Armando 6', 'CO', 'Canzo', 'asfhujsvhud', 10000000, 0, 2),
(7, 'GRASMN03M06D416C', 'Nome1', 'Cognome1', '2021-12-20', 'erba', 1, 'm', 4, 'Via Manzoni 6', 'LC', 'Lecco', 'adadff', 0, 0, 2);

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
(2, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Struttura della tabella `visita`
--

CREATE TABLE `visita` (
  `id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `scadenza` date NOT NULL,
  `foto` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dump dei dati per la tabella `visita`
--

INSERT INTO `visita` (`id`, `tipo`, `scadenza`, `foto`) VALUES
(1, 1, '2022-10-14', 'sgsdfa'),
(2, 0, '2022-09-16', 'sgggaaea'),
(3, 0, '2022-05-19', 'asdffdvx'),
(4, 1, '2022-05-21', 'vfbdf');

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
  ADD UNIQUE KEY `foto` (`foto`);

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
  ADD UNIQUE KEY `Telefono` (`Telefono`),
  ADD KEY `idtesse` (`idTesserato`);

--
-- Indici per le tabelle `tesserato`
--
ALTER TABLE `tesserato`
  ADD PRIMARY KEY (`id`,`cf`),
  ADD UNIQUE KEY `linkFoto` (`linkFoto`),
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Foto` (`foto`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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