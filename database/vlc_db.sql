/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.1.38-MariaDB : Database - vlc_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`vlc_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `vlc_db`;

/*Table structure for table `commissioner` */

DROP TABLE IF EXISTS `commissioner`;

CREATE TABLE `commissioner` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(200) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `idnumber` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `suffix` varchar(20) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `commissioner` int(45) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'pending',
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `login_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `designation` */

DROP TABLE IF EXISTS `designation`;

CREATE TABLE `designation` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `designation` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `empid` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `employeedetails` */

DROP TABLE IF EXISTS `employeedetails`;

CREATE TABLE `employeedetails` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `empid` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `is_daily` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `user_logs` */

DROP TABLE IF EXISTS `user_logs`;

CREATE TABLE `user_logs` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `transaction` text,
  `loginuser` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `is_admin` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
