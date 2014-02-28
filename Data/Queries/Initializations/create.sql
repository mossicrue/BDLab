-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generato il: Feb 25, 2014 alle 16:00
-- Versione del server: 5.6.14
-- Versione PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_progetto`
--
CREATE DATABASE IF NOT EXISTS `db_progetto` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_progetto`;

-- --------------------------------------------------------

--
-- Struttura della tabella `bilancio`
--

DROP TABLE IF EXISTS `bilancio`;
CREATE TABLE IF NOT EXISTS `bilancio` (
  `id_bilancio` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `saldo` float NOT NULL,
  `scadenza` date NOT NULL,
  PRIMARY KEY (`id_bilancio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `bilancio_categoria`
--

DROP TABLE IF EXISTS `bilancio_categoria`;
CREATE TABLE IF NOT EXISTS `bilancio_categoria` (
  `id_bilancio` int(11) unsigned NOT NULL,
  `id_categoria` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_bilancio`,`id_categoria`),
  KEY `fk_bilancio_categoria` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `bilancio_conto`
--

DROP TABLE IF EXISTS `bilancio_conto`;
CREATE TABLE IF NOT EXISTS `bilancio_conto` (
  `id_bilancio` int(11) unsigned NOT NULL,
  `id_conto` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_bilancio`,`id_conto`),
  KEY `fk_bilancio_conto` (`id_conto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descrizione` varchar(50) NOT NULL,
  `id_padre` int(10) unsigned DEFAULT NULL COMMENT 'Id categoria padre di quella scelta',
  PRIMARY KEY (`id_categoria`),
  KEY `fk_categoria_categoria` (`id_padre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `conto`
--

DROP TABLE IF EXISTS `conto`;
CREATE TABLE IF NOT EXISTS `conto` (
  `id_conto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `saldo` float NOT NULL,
  `perc_attivo` float DEFAULT NULL COMMENT 'Percentuale per lasciare attivo il conto, se NULL il minimo del conto è di 10 euro',
  `id_utente` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_conto`),
  KEY `fk_conto_utente` (`id_utente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `conto_credito`
--

DROP TABLE IF EXISTS `conto_credito`;
CREATE TABLE IF NOT EXISTS `conto_credito` (
  `id_conto_credito` int(11) unsigned NOT NULL,
  `numero_carta` varchar(16) NOT NULL,
  `scadenza` date NOT NULL,
  `id_conto` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_conto_credito`),
  KEY `fk_credito_conto` (`id_conto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `lingue`
--

DROP TABLE IF EXISTS `lingue`;
CREATE TABLE IF NOT EXISTS `lingue` (
  `id_lingua` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descrizione` varchar(25) NOT NULL,
  `codice` varchar(2) NOT NULL,
  PRIMARY KEY (`id_lingua`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `movimento`
--

DROP TABLE IF EXISTS `movimento`;
CREATE TABLE IF NOT EXISTS `movimento` (
  `id_movimento` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `programmato` tinyint(1) DEFAULT '0',
  `importo` float NOT NULL COMMENT 'Se negativo spesa, se positivo entrata',
  `causale` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `id_conto` int(11) unsigned NOT NULL,
  `id_carta` int(11) unsigned DEFAULT NULL,
  `id_categoria` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_movimento`),
  KEY `fk_movimento_conto` (`id_conto`),
  KEY `fk_movimento_categoria` (`id_categoria`),
  KEY `fk_movimento_credito` (`id_carta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

DROP TABLE IF EXISTS `utente`;
CREATE TABLE IF NOT EXISTS `utente` (
  `id_utente` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `c_f` varchar(16) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `indirizzo` varchar(20) NOT NULL,
  `p_iva` varchar(11) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `id_lingua` int(11) unsigned DEFAULT NULL,
  `id_valuta` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_utente`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `c_f` (`c_f`),
  KEY `fk_utente_lingue` (`id_lingua`),
  KEY `fk_utente_valuta` (`id_valuta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `valuta`
--

DROP TABLE IF EXISTS `valuta`;
CREATE TABLE IF NOT EXISTS `valuta` (
  `id_valuta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descrizione` varchar(25) NOT NULL,
  `tasso_cambio` float NOT NULL COMMENT 'Rapporto valore moneta / euro per il cambio',
  `simbolo` varchar(10) DEFAULT NULL COMMENT 'Codifica HTML del simbolo della valuta',
  `codice_fa` varchar(25) DEFAULT NULL COMMENT 'Codice del simbolo della valuta utilizzando font awesome',
  PRIMARY KEY (`id_valuta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `bilancio_categoria`
--
ALTER TABLE `bilancio_categoria`
  ADD CONSTRAINT `fk_bilancio_categoria_2` FOREIGN KEY (`id_bilancio`) REFERENCES `bilancio` (`id_bilancio`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bilancio_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limiti per la tabella `bilancio_conto`
--
ALTER TABLE `bilancio_conto`
  ADD CONSTRAINT `fk_bilancio_conto` FOREIGN KEY (`id_conto`) REFERENCES `conto` (`id_conto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bilancio_conto_2` FOREIGN KEY (`id_bilancio`) REFERENCES `bilancio` (`id_bilancio`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limiti per la tabella `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `fk_categoria_categoria` FOREIGN KEY (`id_padre`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limiti per la tabella `conto`
--
ALTER TABLE `conto`
  ADD CONSTRAINT `fk_conto_utente` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id_utente`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limiti per la tabella `conto_credito`
--
ALTER TABLE `conto_credito`
  ADD CONSTRAINT `fk_credito_conto` FOREIGN KEY (`id_conto`) REFERENCES `conto` (`id_conto`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limiti per la tabella `movimento`
--
ALTER TABLE `movimento`
  ADD CONSTRAINT `fk_movimento_credito` FOREIGN KEY (`id_carta`) REFERENCES `conto_credito` (`id_conto_credito`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_movimento_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_movimento_conto` FOREIGN KEY (`id_conto`) REFERENCES `conto` (`id_conto`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limiti per la tabella `utente`
--
ALTER TABLE `utente`
  ADD CONSTRAINT `fk_utente_lingue` FOREIGN KEY (`id_lingua`) REFERENCES `lingue` (`id_lingua`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_utente_valuta` FOREIGN KEY (`id_valuta`) REFERENCES `valuta` (`id_valuta`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
