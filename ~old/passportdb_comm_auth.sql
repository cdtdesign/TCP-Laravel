# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: passportdb
# Generation Time: 2015-11-15 04:02:02 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ci_sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `ai` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`ai`),
  UNIQUE KEY `ci_sessions_id_ip` (`id`,`ip_address`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table denied_access
# ------------------------------------------------------------

DROP TABLE IF EXISTS `denied_access`;

CREATE TABLE `denied_access` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `IP_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  `reason_code` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table ips_on_hold
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ips_on_hold`;

CREATE TABLE `ips_on_hold` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `IP_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table login_errors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `login_errors`;

CREATE TABLE `login_errors` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username_or_email` varchar(255) NOT NULL,
  `IP_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



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
	(5,'faf8f902-88c3-11e5-b7f5-ece8c72b830e','Lucy','Smith','lucy@yahoo.com','123 DeLand Avenue','DeLand','FL',32751,'2006-05-09',2,''),
	(7,'55471402-8b49-11e5-b828-f8d9582dd9b8','Christina','Thorpe','christina@cdtdesign.com','','','',0,'0000-00-00',2,''),
	(8,'750726ce-8b49-11e5-b828-f8d9582dd9b8','Christina','Thorpe','christina@cdtdesign.com','','','',0,'0000-00-00',2,'');

/*!40000 ALTER TABLE `travelers` ENABLE KEYS */;
UNLOCK TABLES;

DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `passportid_uuid_generator` BEFORE INSERT ON `travelers` FOR EACH ROW SET NEW.passportid = UUID() */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table username_or_email_on_hold
# ------------------------------------------------------------

DROP TABLE IF EXISTS `username_or_email_on_hold`;

CREATE TABLE `username_or_email_on_hold` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username_or_email` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL,
  `user_name` varchar(12) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(60) NOT NULL,
  `user_salt` varchar(32) NOT NULL,
  `user_last_login` datetime DEFAULT NULL,
  `user_login_time` datetime DEFAULT NULL,
  `user_session_id` varchar(40) DEFAULT NULL,
  `user_date` datetime NOT NULL,
  `user_modified` datetime NOT NULL,
  `user_agent_string` varchar(32) DEFAULT NULL,
  `user_level` tinyint(2) unsigned NOT NULL,
  `user_banned` enum('0','1') NOT NULL DEFAULT '0',
  `passwd_recovery_code` varchar(60) DEFAULT NULL,
  `passwd_recovery_date` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_salt`, `user_last_login`, `user_login_time`, `user_session_id`, `user_date`, `user_modified`, `user_agent_string`, `user_level`, `user_banned`, `passwd_recovery_code`, `passwd_recovery_date`)
VALUES
	(2705822988,'cdtdesign','christina@cdtdesign.com.com','$2a$09$2c5924e8c7f0a66682f8aOqRNdcRJ5trDrrTITqehD9aEN0D.z4FG','2c5924e8c7f0a66682f8abfac3db3423','2015-11-15 04:48:21','2015-11-15 04:48:21','389f445f281a7e61aafd2ba287bcd7eec62f421b','2015-11-15 04:47:35','2015-11-15 04:47:35','f8a099bca29aa2c619cac9ba4e343a6b',1,'0',NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
