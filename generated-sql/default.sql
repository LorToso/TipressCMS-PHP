
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- autori
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `autori`;

CREATE TABLE `autori`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `cognome` VARCHAR(100),
    `nome` VARCHAR(100),
    `riconoscimenti` LONGTEXT,
    `biografia_breve` LONGTEXT,
    `biografia` LONGTEXT,
    `img_small` VARCHAR(100),
    `img_big` VARCHAR(100),
    `sito` VARCHAR(100),
    PRIMARY KEY (`ID`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- clienti
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `clienti`;

CREATE TABLE `clienti`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `cognome` VARCHAR(100),
    `nome` VARCHAR(100),
    `descrizione` LONGTEXT,
    `img_small` VARCHAR(100),
    `img_big` VARCHAR(100),
    `sito` VARCHAR(100),
    PRIMARY KEY (`ID`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- coagenti
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `coagenti`;

CREATE TABLE `coagenti`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `cognome` VARCHAR(100),
    `nome` VARCHAR(100),
    `area` VARCHAR(100),
    `indirizzo` VARCHAR(100),
    `email` VARCHAR(100),
    `sito` VARCHAR(100),
    PRIMARY KEY (`ID`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- elenco_lingue
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `elenco_lingue`;

CREATE TABLE `elenco_lingue`
(
    `ID` INTEGER NOT NULL,
    `lingua` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- elenco_stati
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `elenco_stati`;

CREATE TABLE `elenco_stati`
(
    `stato` VARCHAR(60) NOT NULL,
    PRIMARY KEY (`stato`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- elenco_tipoutenti
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `elenco_tipoutenti`;

CREATE TABLE `elenco_tipoutenti`
(
    `ID` INTEGER NOT NULL,
    `tipo` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- genere1
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `genere1`;

CREATE TABLE `genere1`
(
    `ID` INTEGER NOT NULL,
    `nome` VARCHAR(255),
    `ordine` INTEGER,
    PRIMARY KEY (`ID`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- genere2
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `genere2`;

CREATE TABLE `genere2`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `ID1` INTEGER,
    `nome` VARCHAR(255),
    `nome_uniq` VARCHAR(255),
    `ordine` INTEGER,
    PRIMARY KEY (`ID`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- libri
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `libri`;

CREATE TABLE `libri`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `titolo` VARCHAR(255),
    `autore1` INTEGER,
    `autore2` INTEGER,
    `autore3` INTEGER,
    `tipo1` INTEGER DEFAULT 0,
    `IDgenere1` INTEGER DEFAULT 0,
    `tipo2` INTEGER DEFAULT 0,
    `IDgenere2` INTEGER DEFAULT 0,
    `tipo3` INTEGER DEFAULT 0,
    `IDgenere3` INTEGER DEFAULT 0,
    `editore` VARCHAR(255),
    `dati_tecnici` LONGTEXT,
    `diritti_controllati` LONGTEXT,
    `diritti_concessi` LONGTEXT,
    `descrizione_breve` TEXT,
    `descrizione` LONGTEXT,
    `pdf1_ita` VARCHAR(100),
    `pdf1_eng` VARCHAR(100),
    `pdf1_deu` VARCHAR(100),
    `pdf1_fra` VARCHAR(100),
    `pdf1_esp` VARCHAR(100),
    `pdf2` VARCHAR(100),
    `pdf3` VARCHAR(100),
    `pdf4` VARCHAR(100),
    `img_small` VARCHAR(100),
    `img_big` VARCHAR(100),
    `vetrina` VARCHAR(2),
    `ordine` INTEGER,
    `vetrinacat` VARCHAR(2),
    `ordinecat` INTEGER,
    PRIMARY KEY (`ID`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- navigazione
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `navigazione`;

CREATE TABLE `navigazione`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `ordine` SMALLINT(3),
    `nome` VARCHAR(255),
    `testo` LONGTEXT,
    `link` VARCHAR(50),
    `data` DATETIME DEFAULT '0000-00-00 00:00:00',
    PRIMARY KEY (`ID`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- news
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `titolo` VARCHAR(200) NOT NULL,
    `testo_breve` LONGTEXT NOT NULL,
    `testo` LONGTEXT NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- newsletter
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `newsletter`;

CREATE TABLE `newsletter`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `titolo` VARCHAR(255),
    `testo` TEXT,
    `lingua` SMALLINT(3),
    `tipologia` SMALLINT(3),
    `datains` DATETIME DEFAULT '0000-00-00 00:00:00',
    PRIMARY KEY (`ID`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- newsletter_utenti
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `newsletter_utenti`;

CREATE TABLE `newsletter_utenti`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(50),
    `cognome` VARCHAR(50),
    `citta` VARCHAR(100),
    `stato` VARCHAR(50),
    `email` VARCHAR(100),
    `lingua` SMALLINT(3),
    `tipologia` SMALLINT(3),
    PRIMARY KEY (`ID`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- utenti
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `utenti`;

CREATE TABLE `utenti`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(100) DEFAULT '' NOT NULL,
    `user` VARCHAR(12) DEFAULT '' NOT NULL,
    `passw` VARCHAR(12) DEFAULT '' NOT NULL,
    `email` VARCHAR(100),
    PRIMARY KEY (`ID`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
