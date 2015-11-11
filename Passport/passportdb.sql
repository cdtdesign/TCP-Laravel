# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: passportdb
# Generation Time: 2015-11-11 22:43:33 +0000
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
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `travelerid` int(11) unsigned NOT NULL,
  `title` varchar(150) NOT NULL DEFAULT '',
  `date` date NOT NULL,
  `body` text NOT NULL,
  `htags` varchar(100) NOT NULL DEFAULT '',
  `img` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_travelerid` (`travelerid`),
  CONSTRAINT `fk_travelerid` FOREIGN KEY (`travelerid`) REFERENCES `travelers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `journeys` WRITE;
/*!40000 ALTER TABLE `journeys` DISABLE KEYS */;

INSERT INTO `journeys` (`id`, `travelerid`, `title`, `date`, `body`, `htags`, `img`)
VALUES
	(1,1,'TC Journey to Pumpkin Patch Farm','2015-10-24','We needed a pumpkin and a day of family fun, since Monday was a day off from school, so we went to check out the Pumpkin Patch Farm. Here, we all rode the hayride, while Christian had fun on the jumping pillow, a horse ride and their 40-foot zipline. Ended the fun visit with a challenging maze, where we had to locate 12 creepy Halloween characters within the maze.','#TravelingChristian #HappyTravels #fall #pumpkin','2015-10-26 12.10.30.jpg'),
	(2,2,'TC Journey to a Fun Amusement Park!!','2015-10-30','Had an awesome day of fun riding so many great rides, eating yummy cotton candy and goofing off with my family. Can\'t wait to go back!!','#TravelingChristian #HappyTravels #amusementpark','FunDestination_ThemeParks.jpg'),
	(3,3,'TC Journey to the World of Harry Potter!','2015-11-07','Journeyed to Hogwarts School of Witchcraft and Wizardry in the third book of Harry Potter and the Prisoner of Azkaban. Looking forward to see what happens on my next journey in Harry Potter and the Goblet of Fire.','#HappyTravels #TravelingChristian #HarryPotter #readinggoals','ReadingDestination_NewBook_sq.jpg'),
	(4,4,'TC Journey to Orlando Science Center','2015-11-08','Great time at the science center today! Can\'t wait to go back! Saw a friend there and we had a great time.','#HappyTravels #TravelingChristian #science #OrlandoScienceCenter','LearningDestination_ScienceMuseum.jpg'),
	(5,5,'TC Journey to ZOOmAir Zipline','2015-11-09','Fun time zipping along the ziplines of ZOOmAir at the Central Florida Zoo!','#HappyTravels #TravelingChristian #zipline','ActiveDestination_ZiplineCourse_sq.jpg');

/*!40000 ALTER TABLE `journeys` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table travelers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `travelers`;

CREATE TABLE `travelers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `passportid` varchar(128) NOT NULL DEFAULT '',
  `fname` varchar(50) NOT NULL DEFAULT '',
  `lname` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `street` varchar(100) DEFAULT '',
  `city` varchar(50) DEFAULT '',
  `state` varchar(3) DEFAULT '',
  `zip` int(5) DEFAULT NULL,
  `birthday` date NOT NULL,
  `gender` int(11) unsigned NOT NULL,
  `pic` varchar(100) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `fk_gender` (`gender`),
  CONSTRAINT `fk_gender` FOREIGN KEY (`gender`) REFERENCES `genders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `travelers` WRITE;
/*!40000 ALTER TABLE `travelers` DISABLE KEYS */;

INSERT INTO `travelers` (`id`, `passportid`, `fname`, `lname`, `email`, `street`, `city`, `state`, `zip`, `birthday`, `gender`, `pic`)
VALUES
	(1,'','Christian','Patrick','chris@christianpatrick.me','537 Hearthglen Blvd','Winter Garden','FL',34787,'2015-06-15',1,''),
	(2,'0','Christina','Thorpe-Rogers','christina@cdtdesign.com','123 Deland Ave','DeLand','FL',32804,'2005-08-31',1,''),
	(3,'0','Patrick','Rogers','pat@cdtdesign.com','1414 Guernsey Street','Orlando','FL',32721,'1969-04-15',2,''),
	(4,'3fe47988-88c4-11e5-b7f5-ece8c72b830e','Johnny','Crawford','johnny@me.com','654 Altamonte Drive','Altamonte','FL',32804,'2006-01-03',1,''),
	(5,'faf8f902-88c3-11e5-b7f5-ece8c72b830e','Lucy','Smith','lucy@yahoo.com','123 DeLand Avenue','DeLand','FL',32751,'2006-05-09',2,'');

/*!40000 ALTER TABLE `travelers` ENABLE KEYS */;
UNLOCK TABLES;

DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `passportid_uuid_generator` BEFORE INSERT ON `travelers` FOR EACH ROW SET NEW.passportid = UUID() */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;