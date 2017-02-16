/*
Navicat MySQL Data Transfer

Source Server         : Na ESX-u
Source Server Version : 50505
Source Host           : 11.1.2.226:3306
Source Database       : mcf2

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-02-14 14:58:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for kontrol
-- ----------------------------
DROP TABLE IF EXISTS `kontrol`;
CREATE TABLE `kontrol` (
  `id` int(11) NOT NULL,
  `brpos` int(11) DEFAULT NULL,
  `remake` smallint(3) DEFAULT NULL,
  `operater` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kontrol` (`brpos`),
  KEY `kzapos` (`operater`),
  CONSTRAINT `kposao` FOREIGN KEY (`brpos`) REFERENCES `posao` (`id`),
  CONSTRAINT `kzapos` FOREIGN KEY (`operater`) REFERENCES `zaposleni` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of kontrol
-- ----------------------------

-- ----------------------------
-- Table structure for masina
-- ----------------------------
DROP TABLE IF EXISTS `masina`;
CREATE TABLE `masina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brmasine` varchar(4) DEFAULT NULL,
  `idposla` int(11) DEFAULT NULL,
  `dobrih` mediumint(4) DEFAULT NULL,
  `losih` mediumint(4) DEFAULT NULL,
  `datum` datetime DEFAULT CURRENT_TIMESTAMP,
  `operater` smallint(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mas` (`idposla`),
  KEY `zap` (`operater`),
  CONSTRAINT `poa` FOREIGN KEY (`idposla`) REFERENCES `posao` (`id`),
  CONSTRAINT `zap` FOREIGN KEY (`operater`) REFERENCES `zaposleni` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of masina
-- ----------------------------

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of posao
-- ----------------------------
INSERT INTO `posao` VALUES ('1', '170214_434231', '123', '2017-02-14 14:47:32', '1_');

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
INSERT INTO `rezervacija` VALUES ('33170', '3', '520', '1', null);
INSERT INTO `rezervacija` VALUES ('33171', '3', '520', '1', null);
INSERT INTO `rezervacija` VALUES ('33172', '4', '520', '1', null);
INSERT INTO `rezervacija` VALUES ('33173', '4', '70', '1', null);
INSERT INTO `rezervacija` VALUES ('33221', '3', '520', '1', null);
INSERT INTO `rezervacija` VALUES ('33222', '4', '520', '1', null);
INSERT INTO `rezervacija` VALUES ('33230', '4', '2', '1', null);
INSERT INTO `rezervacija` VALUES ('33231', '4', '80', '1', null);
INSERT INTO `rezervacija` VALUES ('41017', '1', '320', '1', null);
INSERT INTO `rezervacija` VALUES ('41019', '1', '320', '2', null);
INSERT INTO `rezervacija` VALUES ('41020', '1', '320', '2', null);
INSERT INTO `rezervacija` VALUES ('41028', '1', '130', '2', null);
INSERT INTO `rezervacija` VALUES ('41030', '1', '320', '2', null);
INSERT INTO `rezervacija` VALUES ('41031', '1', '320', '1', null);
INSERT INTO `rezervacija` VALUES ('41032', '2', '320', '1', null);
INSERT INTO `rezervacija` VALUES ('41033', '2', '320', '1', null);
INSERT INTO `rezervacija` VALUES ('41034', '2', '50', '1', null);
INSERT INTO `rezervacija` VALUES ('41035', '1', '100', '1', null);
INSERT INTO `rezervacija` VALUES ('41138', '1', '320', '2', null);
INSERT INTO `rezervacija` VALUES ('41141', '1', '320', '1', null);
INSERT INTO `rezervacija` VALUES ('41146', '1', '320', '1', null);
INSERT INTO `rezervacija` VALUES ('41147', '1', '320', '2', null);
INSERT INTO `rezervacija` VALUES ('41148', '2', '320', '1', null);
INSERT INTO `rezervacija` VALUES ('41153', '1', '170', '2', null);
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
  KEY `szap` (`brkontrol`),
  CONSTRAINT `srazlog` FOREIGN KEY (`razlog`) REFERENCES `razlozi` (`id`),
  CONSTRAINT `sstatus` FOREIGN KEY (`status`) REFERENCES `status` (`id`),
  CONSTRAINT `szap` FOREIGN KEY (`brkontrol`) REFERENCES `kontrol` (`id`)
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
INSERT INTO `veza` VALUES ('41138', '1');

-- ----------------------------
-- Table structure for zaposleni
-- ----------------------------
DROP TABLE IF EXISTS `zaposleni`;
CREATE TABLE `zaposleni` (
  `id` smallint(2) NOT NULL,
  `prezime` varchar(50) DEFAULT NULL,
  `ime` varchar(50) DEFAULT NULL,
  `grupa` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zaposleni
-- ----------------------------

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
