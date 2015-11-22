# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.27)
# Database: passportdb
# Generation Time: 2015-11-22 17:27:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `type`)
VALUES
	(1,'Active'),
	(2,'Creative'),
	(3,'Fun'),
	(4,'Learning'),
	(5,'Outdoor'),
	(6,'Performance'),
	(7,'Reading'),
	(8,'Tasty'),
	(9,'Technology');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


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
  `discount` varchar(10) DEFAULT NULL,
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
	(1,'Central Florida Zoo',5,'The Central Florida Zoo & Botanical Gardens is a 116-acre (47 ha) zoo and botanical garden located north of Orlando, Florida at the intersection of I-4 and Hwy 17-92 near the city of Sanford.',3,'3755 Hwy 17-92','Sanford','FL',34787,16.50,11.95,'n/a'),
	(2,'Orlando Science Center',4,'The Orlando Science Center is a private science museum located in Orlando, Florida. Its purposes are to provide experience-based opportunities for learning about science and technology and to promote public understanding of science.',2,'777 E. Princeton Street','Orlando','FL',32803,27.00,18.00,'n/a'),
	(3,'Busch Gardens Tampa Bay',3,'Busch Gardens Tampa is a 335-acre 19th century African-themed animal theme park located in the city of Tampa, Florida.',4,'10165 N Malcolm McKinley Dr','Tampa','FL',33612,89.00,89.00,'n/a'),
	(4,'The Florida Aquarium',4,'The Florida Aquarium is a 501(c)(3) not-for-profit organization whose mission is to entertain, educate and inspire stewardship about our natural environment.',4,'701 Channelside Drive','Tampa','FL',33602,23.95,18.95,'n/a'),
	(5,'Green Meadows Petting Farm',5,'Petting zoo with farm animals such as cows, pigs & goats, plus pony, hay & train rides.',1,'1368 S. Poinciana Blvd','Kissimmee','FL',34746,21.00,20.00,'n/a'),
	(6,'Let\'s Skate Orlando!',1,'If you\'re looking for your kids to have a fun and exciting time, then you need to give us a try \"Lets Skate Orlando\". We have a great facility, that not only offers roller skating but video games and exciting party rooms as well. In a high tech atmosphere with a blast of colors and music to fit the tempo, an energizing mood will make the fun times.',5,'141 W. Plant Street','Winter Garden','FL',34787,10.00,8.00,'n/a'),
	(7,'Jojo\'s Frozen Yogurt',8,'Frozen yogurt parlor located in the heart of Winter Garden, that has an assorment of wonderful flavors to choose from.',5,'141 W. Plant Street','Winter Garden','FL',34787,5.00,5.00,'n/a'),
	(8,'Monkey Joe\'s',1,'A fun-filled inflatable play center. Our wall-to-wall inflatable slides, jumps, and obstacle courses will keep your kids active, happy, and healthy.',2,'9101 International Drive','Orlando','FL',32819,0.00,11.99,'n/a'),
	(9,'Orlando Repetory Theatre',6,'Creating \"experiences that enlighten, entertain and enrich the lives of family and young audiences.',5,'1001 E Princeton Street','Orlando','FL',32803,20.00,14.00,'n/a'),
	(10,'St. Johns Boat Ride',5,'The St. Johns Rivership Co. operates the most relaxing cruises on the St. Johns River aboard the Rivership Barbara-Lee, an authentic paddlewheeler. Leaving from Monroe Harbour Marina in downtown Sanford, Florida, the Barbara-Lee serves up food, entertainment and fun alongside the best views of wildlife along the storied St. Johns.',3,'433 N. Palmetto Avenue','Sanford','FL',32771,25.00,15.00,'n/a'),
	(11,'ZOOmAir Zipline (Orlando)',1,'Enjoy a treetop adventure at ZOOm Air Adventure Park Orlando, up in the trees of the Central Florida Zoo & Botanical Gardens! ZOOm Airâ€™s aerial adventure courses are deftly woven into the forest of the blackwater river floodplain swamp that is home to the Zoo.',3,'3755 U.S. 17','Sanford','FL',32771,30.95,19.75,'n/a'),
	(12,'ZOOmAir Zipline (Daytona)',1,'Enjoy a treetop adventure at ZOOm Air Adventure Park Daytona, up in the trees.',6,'1000 Orange Avenue','Daytona Beach','FL',32114,30.95,19.75,'n/a'),
	(13,'WOW (Walk on Water) Balls',1,'Come out and “walk on water” with WOW Balls! WOW Balls are large flexible bubbles that make it possible to safely float, walk, run, roll, and jump on the surface of water without getting wet! While inside the transparent bubble you can clearly view everything around you and under water.',3,'3755 U.S. 17','Sanford','FL',32771,6.00,6.00,'n/a');

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


# Dump of table groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`id`, `name`, `description`)
VALUES
	(1,'admin','Administrator'),
	(2,'members','General User');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
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


# Dump of table locations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cities` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;

INSERT INTO `locations` (`id`, `cities`)
VALUES
	(1,'Kissimmee, FL'),
	(2,'Orlando, FL'),
	(3,'Sanford, FL'),
	(4,'Tampa, FL'),
	(5,'Winter Garden, FL'),
	(6,'Daytona, FL');

/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table login_attempts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table travelers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `travelers`;

CREATE TABLE `travelers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `passportid` varchar(128) NOT NULL DEFAULT '',
  `first_name` varchar(50) NOT NULL DEFAULT '',
  `last_name` varchar(50) NOT NULL DEFAULT '',
  `street` varchar(100) DEFAULT '',
  `city` varchar(50) DEFAULT '',
  `state` varchar(3) DEFAULT '',
  `zip` int(5) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` int(11) unsigned DEFAULT NULL,
  `pic` varchar(100) DEFAULT '',
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gender` (`gender`),
  CONSTRAINT `fk_gender` FOREIGN KEY (`gender`) REFERENCES `genders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `travelers` WRITE;
/*!40000 ALTER TABLE `travelers` DISABLE KEYS */;

INSERT INTO `travelers` (`id`, `passportid`, `first_name`, `last_name`, `street`, `city`, `state`, `zip`, `birthday`, `gender`, `pic`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `company`, `phone`)
VALUES
	(1,'6475a028-8dac-11e5-a50d-d5fc6d2fa2a1','Christian','Patrick','537 Hearthglen Blvd','Winter Garden','FL',34787,'2015-06-15',1,'','',NULL,'',NULL,'chris@christianpatrick.me',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),
	(2,'6475a456-8dac-11e5-a50d-d5fc6d2fa2a1','Christine','Rogers','123 Deland Ave','DeLand','FL',32804,'2005-08-31',1,'','',NULL,'',NULL,'chris@cdtdesign.com',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),
	(3,'6475a564-8dac-11e5-a50d-d5fc6d2fa2a1','Patrick','Rogers','1414 Guernsey Street','Orlando','FL',32721,'1969-04-15',2,'','',NULL,'',NULL,'pat@cdtdesign.com',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),
	(4,'6475a5e6-8dac-11e5-a50d-d5fc6d2fa2a1','Johnny','Crawford','654 Altamonte Drive','Altamonte','FL',32804,'2006-01-03',1,'','',NULL,'',NULL,'johnny@me.com',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),
	(5,'6475db60-8dac-11e5-a50d-d5fc6d2fa2a1','Lucy','Smith','123 DeLand Avenue','DeLand','FL',32751,'2006-05-09',2,'','',NULL,'',NULL,'lucy@yahoo.com',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),
	(18,'5ee1f610-8da8-11e5-a50d-d5fc6d2fa2a1','Admin','Admin','123 Admin Ave','Administor','FL',34787,NULL,2,'','127.0.0.1',NULL,'$2y$08$wqkjGRNW3g3W3N5YIcV8leX/W22HEqIAQl.jY43tMGHeuHEacsU/e',NULL,'admin@admin.com',NULL,NULL,NULL,NULL,1447818999,1448065758,1,NULL,NULL),
	(40,'bdb11dc2-9020-11e5-8efd-c5e62e3681e6','Mindy','Moore','123 Blues Lane','Blues Haze','FL',32804,'1974-08-31',3,'','127.0.0.1',NULL,'$2y$08$thsVXW0iFNSVbjxvTj2HQuMBJv3oXdosm3Y4SuS/K1wZA1gkGmG1y',NULL,'Mindy@me.com',NULL,NULL,NULL,NULL,1448090600,1448123157,1,NULL,NULL),
	(61,'1aa8657e-907d-11e5-8efd-c5e62e3681e6','Tommy','Thompson','123 Blues Lane','Blues Haze','FL',32804,'2007-06-15',3,'','127.0.0.1',NULL,'$2y$08$X.SC3.bikNHQb.QyZQRFQ.FKhNvLy7uV60qh/itD/otPOn1HxlPEG',NULL,'tom@me.com',NULL,NULL,NULL,NULL,1448130269,1448151445,1,NULL,NULL),
	(62,'e88df7c4-90d2-11e5-8efd-c5e62e3681e6','Christina','Thorpe-Rogers','537 Hearthglen Blvd','Winter Garden','Flo',34787,'1974-08-31',3,'','127.0.0.1',NULL,'$2y$08$iEpW1PsukdbWtJ4XvXgdqeKj2vM4iDT5yIF.Aq6l2FKjdRM7lcY4e',NULL,'christina@cdtdesign.com',NULL,NULL,NULL,NULL,1448167122,1448212804,1,NULL,NULL);

/*!40000 ALTER TABLE `travelers` ENABLE KEYS */;
UNLOCK TABLES;

DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `generate_passportid` BEFORE INSERT ON `travelers` FOR EACH ROW SET NEW.passportid = UUID() */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table users_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `travelers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`)
VALUES
	(1,1,1),
	(2,1,2),
	(3,2,2),
	(4,3,2),
	(5,4,2),
	(6,5,2),
	(7,6,2),
	(8,9,2),
	(9,18,2),
	(12,40,2),
	(32,61,2),
	(33,62,2);

/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
