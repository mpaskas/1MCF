/*
Navicat MySQL Data Transfer

Source Server         : lokalna
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mcf2

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-01 14:39:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for kontrol
-- ----------------------------
DROP TABLE IF EXISTS `kontrol`;
CREATE TABLE `kontrol` (
  `brpos` int(11) NOT NULL,
  `remake` smallint(3) DEFAULT NULL,
  `krug` smallint(2) NOT NULL,
  PRIMARY KEY (`brpos`,`krug`),
  KEY `kontrol` (`brpos`),
  KEY `kzap` (`krug`),
  CONSTRAINT `kposao` FOREIGN KEY (`brpos`) REFERENCES `posao` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of kontrol
-- ----------------------------

-- ----------------------------
-- Table structure for letersop
-- ----------------------------
DROP TABLE IF EXISTS `letersop`;
CREATE TABLE `letersop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `posaoid` int(11) DEFAULT NULL,
  `remake` smallint(6) DEFAULT NULL,
  `lzapospri` smallint(2) DEFAULT NULL,
  `lzaposzav` smallint(2) DEFAULT NULL,
  `datum` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lposa` (`posaoid`),
  KEY `lzapo` (`lzapospri`),
  KEY `lzapoza` (`lzaposzav`),
  CONSTRAINT `lposa` FOREIGN KEY (`posaoid`) REFERENCES `posao` (`id`),
  CONSTRAINT `lzapo` FOREIGN KEY (`lzapospri`) REFERENCES `zaposleni` (`id`),
  CONSTRAINT `lzapoza` FOREIGN KEY (`lzaposzav`) REFERENCES `zaposleni` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of letersop
-- ----------------------------

-- ----------------------------
-- Table structure for masina
-- ----------------------------
DROP TABLE IF EXISTS `masina`;
CREATE TABLE `masina` (
  `brmasine` tinyint(2) DEFAULT NULL,
  `idposla` int(11) NOT NULL,
  `dobrih` mediumint(4) DEFAULT NULL,
  `losih` mediumint(4) DEFAULT NULL,
  `datum` datetime DEFAULT CURRENT_TIMESTAMP,
  `krug` smallint(2) NOT NULL,
  PRIMARY KEY (`idposla`,`krug`),
  KEY `mas` (`idposla`),
  KEY `zap` (`krug`),
  KEY `masina` (`brmasine`),
  CONSTRAINT `masina` FOREIGN KEY (`brmasine`) REFERENCES `nmasine` (`id`),
  CONSTRAINT `poa` FOREIGN KEY (`idposla`) REFERENCES `posao` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of masina
-- ----------------------------

-- ----------------------------
-- Table structure for nmasine
-- ----------------------------
DROP TABLE IF EXISTS `nmasine`;
CREATE TABLE `nmasine` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of nmasine
-- ----------------------------
INSERT INTO `nmasine` VALUES ('1', 'M1');
INSERT INTO `nmasine` VALUES ('2', 'M3');
INSERT INTO `nmasine` VALUES ('3', 'M5');
INSERT INTO `nmasine` VALUES ('4', 'M6');
INSERT INTO `nmasine` VALUES ('5', 'M39');
INSERT INTO `nmasine` VALUES ('6', 'M40');
INSERT INTO `nmasine` VALUES ('7', 'M501');
INSERT INTO `nmasine` VALUES ('8', 'M43');

-- ----------------------------
-- Table structure for posao
-- ----------------------------
DROP TABLE IF EXISTS `posao`;
CREATE TABLE `posao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brposla` varchar(13) NOT NULL,
  `kolicina` mediumint(4) DEFAULT NULL,
  `datum` datetime DEFAULT NULL,
  `hitan` varchar(2) DEFAULT NULL,
  `kontrola` smallint(2) DEFAULT NULL,
  `operater` smallint(2) DEFAULT NULL,
  `datumkraj` datetime DEFAULT NULL,
  `dobrih` smallint(4) DEFAULT '0',
  `zin` smallint(4) DEFAULT '0',
  `zincip` smallint(4) DEFAULT '0',
  `remake` smallint(4) DEFAULT '0',
  `neproiz` smallint(4) DEFAULT '0',
  `admin` smallint(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brposla` (`brposla`),
  KEY `kontrola` (`kontrola`),
  KEY `operater` (`operater`),
  KEY `admin` (`admin`),
  CONSTRAINT `admin` FOREIGN KEY (`admin`) REFERENCES `zaposleni` (`id`),
  CONSTRAINT `kontrola` FOREIGN KEY (`kontrola`) REFERENCES `zaposleni` (`id`),
  CONSTRAINT `operater` FOREIGN KEY (`operater`) REFERENCES `zaposleni` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of posao
-- ----------------------------
INSERT INTO `posao` VALUES ('17', '170223_123122', '122', '2017-02-23 14:14:00', '', null, null, null, '0', '0', '0', '0', '0', null);
INSERT INTO `posao` VALUES ('18', '170224_123456', '300', '2017-02-24 12:47:14', '', null, null, null, '0', '0', '0', '0', '0', null);
INSERT INTO `posao` VALUES ('19', '170301_155645', '300', '2017-03-01 08:23:54', '1_', null, null, null, '0', '0', '0', '0', '0', null);

-- ----------------------------
-- Table structure for razlozi
-- ----------------------------
DROP TABLE IF EXISTS `razlozi`;
CREATE TABLE `razlozi` (
  `id` tinyint(2) NOT NULL,
  `razlog` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of razlozi
-- ----------------------------

-- ----------------------------
-- Table structure for rezervacija
-- ----------------------------
DROP TABLE IF EXISTS `rezervacija`;
CREATE TABLE `rezervacija` (
  `brrezervacije` int(11) NOT NULL,
  `tip` tinyint(2) NOT NULL,
  `kolicina` mediumint(4) NOT NULL,
  `stanje` tinyint(1) DEFAULT '1',
  `datum` datetime DEFAULT NULL,
  PRIMARY KEY (`brrezervacije`,`tip`),
  KEY `tip` (`tip`),
  KEY `brrezervacije` (`brrezervacije`),
  CONSTRAINT `tip` FOREIGN KEY (`tip`) REFERENCES `tipovi` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rezervacija
-- ----------------------------
INSERT INTO `rezervacija` VALUES ('33170', '3', '520', '2', null);
INSERT INTO `rezervacija` VALUES ('33171', '3', '520', '2', null);
INSERT INTO `rezervacija` VALUES ('33172', '4', '520', '2', null);
INSERT INTO `rezervacija` VALUES ('33173', '4', '70', '2', null);
INSERT INTO `rezervacija` VALUES ('33221', '3', '520', '1', null);
INSERT INTO `rezervacija` VALUES ('33222', '4', '520', '1', null);
INSERT INTO `rezervacija` VALUES ('33230', '4', '2', '1', null);
INSERT INTO `rezervacija` VALUES ('33231', '4', '80', '1', null);
INSERT INTO `rezervacija` VALUES ('41017', '1', '320', '1', null);
INSERT INTO `rezervacija` VALUES ('41019', '1', '320', '1', null);
INSERT INTO `rezervacija` VALUES ('41020', '1', '320', '1', null);
INSERT INTO `rezervacija` VALUES ('41028', '1', '130', '1', null);
INSERT INTO `rezervacija` VALUES ('41030', '1', '320', '1', null);
INSERT INTO `rezervacija` VALUES ('41031', '1', '320', '2', null);
INSERT INTO `rezervacija` VALUES ('41032', '2', '320', '1', null);
INSERT INTO `rezervacija` VALUES ('41033', '2', '320', '1', null);
INSERT INTO `rezervacija` VALUES ('41034', '2', '50', '1', null);
INSERT INTO `rezervacija` VALUES ('41035', '1', '100', '1', null);
INSERT INTO `rezervacija` VALUES ('41138', '1', '320', '1', null);
INSERT INTO `rezervacija` VALUES ('41141', '1', '320', '1', null);
INSERT INTO `rezervacija` VALUES ('41146', '1', '320', '1', null);
INSERT INTO `rezervacija` VALUES ('41147', '1', '320', '1', null);
INSERT INTO `rezervacija` VALUES ('41148', '2', '320', '1', null);
INSERT INTO `rezervacija` VALUES ('41153', '1', '170', '1', null);
INSERT INTO `rezervacija` VALUES ('41155', '2', '320', '1', null);
INSERT INTO `rezervacija` VALUES ('41157', '2', '70', '1', null);
INSERT INTO `rezervacija` VALUES ('41158', '1', '130', '1', null);

-- ----------------------------
-- Table structure for skart
-- ----------------------------
DROP TABLE IF EXISTS `skart`;
CREATE TABLE `skart` (
  `serbr` varchar(10) NOT NULL,
  `brkontrol` int(11) DEFAULT NULL,
  `jmbg` varchar(13) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `razlog` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`serbr`),
  KEY `stat` (`status`),
  KEY `raz` (`razlog`),
  KEY `skont` (`brkontrol`),
  CONSTRAINT `skont` FOREIGN KEY (`brkontrol`) REFERENCES `kontrol` (`brpos`),
  CONSTRAINT `srazlog` FOREIGN KEY (`razlog`) REFERENCES `razlozi` (`id`),
  CONSTRAINT `sstatus` FOREIGN KEY (`status`) REFERENCES `status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of skart
-- ----------------------------

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` tinyint(2) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of status
-- ----------------------------

-- ----------------------------
-- Table structure for tipovi
-- ----------------------------
DROP TABLE IF EXISTS `tipovi`;
CREATE TABLE `tipovi` (
  `Id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `skraceno` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `naziv` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipovi
-- ----------------------------
INSERT INTO `tipovi` VALUES ('1', 'ID', 'Лична карта са чипом - ID');
INSERT INTO `tipovi` VALUES ('2', 'IN', 'Лична карта без чипа - IN');
INSERT INTO `tipovi` VALUES ('3', 'VL', 'Саобраћајна дозвола');
INSERT INTO `tipovi` VALUES ('4', 'DL', 'Возачка дозвола');
INSERT INTO `tipovi` VALUES ('5', 'EL', 'Нова службена картица');
INSERT INTO `tipovi` VALUES ('6', 'OL', 'Оружни лист');
INSERT INTO `tipovi` VALUES ('7', 'WL', 'Дозвола за ношење оружја');

-- ----------------------------
-- Table structure for veza
-- ----------------------------
DROP TABLE IF EXISTS `veza`;
CREATE TABLE `veza` (
  `brr` int(11) NOT NULL,
  `brp` int(11) NOT NULL,
  PRIMARY KEY (`brr`,`brp`),
  KEY `posa` (`brp`),
  CONSTRAINT `rez` FOREIGN KEY (`brr`) REFERENCES `rezervacija` (`brrezervacije`),
  CONSTRAINT `vposa` FOREIGN KEY (`brp`) REFERENCES `posao` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of veza
-- ----------------------------
INSERT INTO `veza` VALUES ('33170', '17');
INSERT INTO `veza` VALUES ('33171', '17');
INSERT INTO `veza` VALUES ('33172', '19');
INSERT INTO `veza` VALUES ('33173', '19');
INSERT INTO `veza` VALUES ('41031', '18');

-- ----------------------------
-- Table structure for zaposleni
-- ----------------------------
DROP TABLE IF EXISTS `zaposleni`;
CREATE TABLE `zaposleni` (
  `id` smallint(2) NOT NULL AUTO_INCREMENT,
  `prezime` varchar(50) DEFAULT NULL,
  `ime` varchar(50) DEFAULT NULL,
  `grupa` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zaposleni
-- ----------------------------
INSERT INTO `zaposleni` VALUES ('1', 'Bojanović', 'Marko', '1');
INSERT INTO `zaposleni` VALUES ('2', 'Manojlović', 'Dušan', '1');
INSERT INTO `zaposleni` VALUES ('3', 'Baštovanović', 'Gordana', '1');

-- ----------------------------
-- View structure for rez
-- ----------------------------
DROP VIEW IF EXISTS `rez`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `rez` AS SELECT
rezervacija.brrezervacije,
rezervacija.tip,
rezervacija.kolicina
FROM
	rezervacija
INNER JOIN veza ON veza.brr = rezervacija.brrezervacije ;
