# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.27)
# Database: passportdb
# Generation Time: 2015-11-22 04:15:56 +0000
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
  `dtype` int(5) unsigned DEFAULT NULL,
  `dscrptn` varchar(350) NOT NULL DEFAULT '',
  `location` int(5) unsigned DEFAULT NULL,
  `dstreet` varchar(50) NOT NULL DEFAULT '',
  `dcity` varchar(50) NOT NULL DEFAULT '',
  `dstate` varchar(3) NOT NULL DEFAULT '',
  `dzip` int(5) NOT NULL,
  `adult_cost` decimal(10,2) NOT NULL,
  `child_cost` decimal(10,2) NOT NULL,
  `discount` float(4,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_location` (`location`),
  KEY `fk_type` (`dtype`),
  CONSTRAINT `fk_location` FOREIGN KEY (`location`) REFERENCES `locations` (`id`),
  CONSTRAINT `fk_type` FOREIGN KEY (`dtype`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `destinations` WRITE;
/*!40000 ALTER TABLE `destinations` DISABLE KEYS */;

INSERT INTO `destinations` (`id`, `dname`, `dtype`, `dscrptn`, `location`, `dstreet`, `dcity`, `dstate`, `dzip`, `adult_cost`, `child_cost`, `discount`)
VALUES
	(1,'Central Florida Zoo',5,'The Central Florida Zoo & Botanical Gardens is a 116-acre (47 ha) zoo and botanical garden located north of Orlando, Florida at the intersection of I-4 and Hwy 17-92 near the city of Sanford.',3,'3755 Hwy 17-92','Sanford','FL',34787,16.50,11.95,0.20),
	(2,'Orlando Science Center',4,'The Orlando Science Center is a private science museum located in Orlando, Florida. Its purposes are to provide experience-based opportunities for learning about science and technology and to promote public understanding of science.',2,'777 E. Princeton Street','Orlando','FL',32803,27.00,18.00,0.20),
	(3,'Busch Gardens Tampa Bay',3,'Busch Gardens Tampa is a 335-acre 19th century African-themed animal theme park located in the city of Tampa, Florida.',4,'10165 N Malcolm McKinley Dr','Tampa','FL',33612,89.00,89.00,0.20),
	(4,'The Florida Aquarium',4,'The Florida Aquarium is a 501(c)(3) not-for-profit organization whose mission is to entertain, educate and inspire stewardship about our natural environment.',4,'701 Channelside Drive','Tampa','FL',33602,23.95,18.95,0.20),
	(5,'Green Meadows Petting Farm',5,'Petting zoo with farm animals such as cows, pigs & goats, plus pony, hay & train rides.',1,'1368 S. Poinciana Blvd','Kissimmee','FL',34746,21.00,20.00,0.20),
	(6,'Let\'s Skate Orlando!',1,'If you\'re looking for your kids to have a fun and exciting time, then you need to give us a try \"Lets Skate Orlando\". We have a great facility, that not only offers roller skating but video games and exciting party rooms as well. In a high tech atmosphere with a blast of colors and music to fit the tempo, an energizing mood will make the fun times.',5,'141 W. Plant Street','Winter Garden','FL',34787,10.00,8.00,0.20),
	(7,'Jojo\'s Frozen Yogurt',8,'Frozen yogurt parlor located in the heart of Winter Garden, that has an assorment of wonderful flavors to choose from.',5,'141 W. Plant Street','Winter Garden','FL',34787,5.00,5.00,0.20),
	(8,'Monkey Joe\'s',1,'A fun-filled inflatable play center. Our wall-to-wall inflatable slides, jumps, and obstacle courses will keep your kids active, happy, and healthy.',2,'9101 International Drive','Orlando','FL',32819,0.00,11.99,0.20),
	(9,'Orlando Repetory Theatre',6,'Creating \"experiences that enlighten, entertain and enrich the lives of family and young audiences.',5,'1001 E Princeton Street','Orlando','FL',32803,20.00,14.00,0.20),
	(10,'St. Johns Boat Ride',5,'The St. Johns Rivership Co. operates the most relaxing cruises on the St. Johns River aboard the Rivership Barbara-Lee, an authentic paddlewheeler. Leaving from Monroe Harbour Marina in downtown Sanford, Florida, the Barbara-Lee serves up food, entertainment and fun alongside the best views of wildlife along the storied St. Johns.',3,'433 N. Palmetto Avenue','Sanford','FL',32771,25.00,15.00,0.20),
	(11,'ZOOmAir Zipline (Orlando)',1,'Enjoy a treetop adventure at ZOOm Air Adventure Park Orlando, up in the trees of the Central Florida Zoo & Botanical Gardens! ZOOm Airâ€™s aerial adventure courses are deftly woven into the forest of the blackwater river floodplain swamp that is home to the Zoo.',3,'3755 U.S. 17','Sanford','FL',32771,30.95,19.75,0.20),
	(12,'ZOOmAir Zipline (Daytona)',1,'Enjoy a treetop adventure at ZOOm Air Adventure Park Daytona, up in the trees.',6,'1000 Orange Avenue','Daytona Beach','FL',32114,30.95,19.75,0.20),
	(13,'WOW (Walk on Water) Balls',1,'Come out and “walk on water” with WOW Balls! WOW Balls are large flexible bubbles that make it possible to safely float, walk, run, roll, and jump on the surface of water without getting wet! While inside the transparent bubble you can clearly view everything around you and under water.',3,'3755 U.S. 17','Sanford','FL',32771,6.00,6.00,0.20);

/*!40000 ALTER TABLE `destinations` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
