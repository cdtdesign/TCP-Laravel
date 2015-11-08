# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: passportdb
# Generation Time: 2015-11-07 02:16:09 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table destinations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `destinations`;

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dname` varchar(100) NOT NULL DEFAULT '',
  `dtype` varchar(50) NOT NULL DEFAULT '',
  `dscrptn` varchar(300) NOT NULL DEFAULT '',
  `dstreet` varchar(50) NOT NULL DEFAULT '',
  `dcity` varchar(50) NOT NULL DEFAULT '',
  `dstate` varchar(3) NOT NULL DEFAULT '',
  `dzip` int(5) NOT NULL,
  `adult_cost` decimal(10,2) NOT NULL,
  `child_cost` decimal(10,2) NOT NULL,
  `discount` float(4,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `destinations` WRITE;
/*!40000 ALTER TABLE `destinations` DISABLE KEYS */;

INSERT INTO `destinations` (`id`, `dname`, `dtype`, `dscrptn`, `dstreet`, `dcity`, `dstate`, `dzip`, `adult_cost`, `child_cost`, `discount`)
VALUES
	(1,'Central Florida Zoo','Outdoor','The Central Florida Zoo & Botanical Gardens is a 116-acre (47 ha) zoo and botanical garden located north of Orlando, Florida at the intersection of I-4 and Hwy 17-92 near the city of Sanford.','3755 Hwy 17-92','Sanford','FL',34787,16.50,11.95,0.20),
	(2,'Orlando Science Center','Learning','The Orlando Science Center is a private science museum located in Orlando, Florida. Its purposes are to provide experience-based opportunities for learning about science and technology and to promote public understanding of science.','777 E. Princeton Street','Orlando','FL',32803,27.00,18.00,0.20),
	(3,'Busch Gardens Tampa Bay','Fun','Busch Gardens Tampa is a 335-acre 19th century African-themed animal theme park located in the city of Tampa, Florida.','10165 N Malcolm McKinley Dr','Tampa','FL',33612,89.00,89.00,0.20);

/*!40000 ALTER TABLE `destinations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table genders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `genders`;

CREATE TABLE `genders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `genders` WRITE;
/*!40000 ALTER TABLE `genders` DISABLE KEYS */;

INSERT INTO `genders` (`id`, `gender`)
VALUES
	(1,'Male'),
	(2,'Female'),
	(3,'Decline');

/*!40000 ALTER TABLE `genders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table journeys
# ------------------------------------------------------------

DROP TABLE IF EXISTS `journeys`;

CREATE TABLE `journeys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(150) NOT NULL DEFAULT '',
  `date` date NOT NULL,
  `body` text NOT NULL,
  `htags` varchar(100) NOT NULL DEFAULT '',
  `img` binary(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `journeys` WRITE;
/*!40000 ALTER TABLE `journeys` DISABLE KEYS */;

INSERT INTO `journeys` (`id`, `fname`, `title`, `date`, `body`, `htags`, `img`)
VALUES
	(1,'Christian','Pumkin Patch Farm','2015-11-02','Festive fall TC Journey to Pumpkin Patch Farm.','#TravelingChristian #HappyTravels',NULL),
	(2,'Patrick','Orlando Science Center','2015-10-15','TC Journey to the Orlando Science Center. My favorite part were the dinosaurs!','#TravelingChristian #HappyTravels ',NULL);

/*!40000 ALTER TABLE `journeys` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table travelers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `travelers`;

CREATE TABLE `travelers` (
  `fname` varchar(50) NOT NULL DEFAULT '',
  `lname` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `street` varchar(100) DEFAULT '',
  `city` varchar(50) DEFAULT '',
  `state` varchar(3) DEFAULT '',
  `zip` int(5) DEFAULT NULL,
  `birthday` date NOT NULL,
  `gender` int(11) NOT NULL,
  `pic` varchar(100) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
